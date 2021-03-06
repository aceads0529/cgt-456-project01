<?php
include_once __DIR__ . '/../core/includes.php';

define('ENABLE_ERR_RESPONSES', true);

/**
 * @param bool $success
 * @param string $message
 * @param null $data
 */
function exit_response($success, $message = '', $data = null)
{
    try {
        $user_id = AuthService::get_active_user();
        if ($user_id)
            $user_id = $user_id->get_id();
        else
            $user_id = null;

        DataService::insert('api_log', [
            'request_uri' => $_SERVER['REQUEST_URI'],
            'action' => isset($_REQUEST['action']) ? $_REQUEST['action'] : null,
            'user_id' => $user_id,
            'success' => (int)$success,
            'message' => $message,
            'data' => $data ? null : json_encode($data)], true);
    } catch (Exception $e) {
    }

    header('Content-Type: application/json');
    echo json_encode(['success' => (bool)$success, 'message' => (string)$message, 'data' => $data]);
    exit;
}


function exit_no_permission()
{
    exit_response(false, 'Permission denied');
}

function exit_no_action()
{
    exit_response(false, 'Missing action parameter');
}

/**
 * @param string $param
 */
function exit_missing_data($param = null)
{
    if ($param)
        exit_response(false, sprintf('Missing required data "%s"', $param));
    else
        exit_response(false, 'Missing required data');
}

/**
 * @param Exception $exception
 */
function exit_server_error($exception = null)
{
    if (ENABLE_ERR_RESPONSES && $exception)
        exit_response(false, 'Internal server error', ['error' => $exception->getMessage()]);
    else
        exit_response(false, 'Internal server error');
}

/**
 * @param string $permission
 */
function api_require_permission($permission = null)
{
    if ($permission == null) {
        if (!AuthService::get_active_user())
            exit_no_permission();
    } elseif (!AuthService::has_permission($permission))
        exit_no_permission();
}

function api_require_data(&$data, ...$fields)
{
    if (!$data)
        exit_missing_data();

    if ($fields) {
        foreach ($fields as $f) {
            if (is_array($f)) {
                if (!isset($data[$f[0]]))
                    exit_missing_data();
                elseif (gettype($data[$f[0]]) != $f[1])
                    exit_response(false, sprintf('Incorrect data type "%s"', $f[0]));
            }

            if (!isset($data[$f])) {
                exit_missing_data($f);
            }
        }
    }
}

/**
 * @return array
 */
function api_get_params()
{
    $action = isset($_POST['action']) ? $_POST['action'] : false;
    $data = isset($_POST['data']) ? $_POST['data'] : false;

    if (!$action)
        exit_no_action();

    return [$action, $data];
}

/**
 * @param mixed $id
 * @param callable $all_callback
 * @param callable $id_callback
 */
function api_select($id, $all_callback, $id_callback)
{
    try {
        if ($id == 'all') {
            $entities = $all_callback();
            foreach ($entities as &$entity)
                $entity = $entity->to_json_array();

            exit_response('true', 'All entities found', $entities);
        } else {
            $entity = $id_callback($id);

            if ($entity)
                exit_response(true, 'Entity found', $entity->to_json_array());
            else
                exit_response(false, 'Entity not found');
        }
    } catch (Exception $e) {
        exit_server_error($e);
    }
}