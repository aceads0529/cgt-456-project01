<?php
include_once '../includes.php';

try {
    list($action, $data) = api_get_data();

    if (!$action)
        exit_no_action();

    switch ($action) {
        case 'select':
            select($data);
        case 'create':
            create($data);
            break;
        case 'find':
            find($data);
            break;
        case 'update':
            update($data);
            break;
    }

    // If no switch blocks are hit, then action is not defined
    exit_response(false, 'Invalid action');

} catch (Exception $e) {
    exit_server_error($e);
}

function select($data)
{
    api_require_permission('user');
    api_require_data($data, 'id');

    api_select($data['id'], ['EmployerService', 'select_all'], ['EmployerService', 'select_by_id']);
}

function create($data)
{
    api_require_permission('modify_employer');
    api_require_data($data, 'name', 'address', 'cgtFields');

    try {
        $employer = EmployerService::create($data['name'], $data['address'], $data['cgtFields']);
        exit_response(true, 'Employer created successfully', $employer);
    } catch (Exception $e) {
        exit_server_error($e);
    }
}

function find($data)
{
    api_require_permission('user');
    api_require_data($data, 'name');

    try {
        $employers = EmployerService::find_by_name($data['name']);

        foreach ($employers as &$e)
            $e = $e->to_json_array();

        exit_response(true, 'Performed employer search', $employers);
    } catch (Exception $e) {
        exit_server_error($e);
    }
}

function update($data)
{
    api_require_permission('modify_employer');
    api_require_data($data, 'id');

    try {
        EmployerService::update($data['id'], $data);
    } catch (Exception $e) {
        exit_server_error($e);
    }
}