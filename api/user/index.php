<?php
include_once '../includes.php';

try {
    list($action, $data) = api_get_data();

    if (!$action)
        exit_no_action();

    switch ($action) {
        case 'login':
            login($data);
            break;
        case 'logout':
            logout();
            break;
        case 'active':
            active();
            break;
        case 'select':
            select($data);
            break;
        case 'register':
            register($data);
            break;
        case 'create':
            create($data);
            break;
    }
} catch (Exception $e) {
    exit_server_error($e);
}

function login($data)
{
    api_require_data($data, 'login', 'password');

    try {
        if ($user = AuthService::login($data['login'], $data['password']))
            exit_response(true, 'Login successful', [$user]);
        else
            exit_response(false, 'Username and password do not match');
    } catch (Exception $e) {
        exit_server_error($e);
    }
}

function logout()
{
    AuthService::logout();
    exit_response(true, 'User logged out');
}

function active()
{
    api_require_permission('user');

    if ($user = AuthService::get_active_user()->to_json_array())
        exit_response(true, 'Active user found', $user);
    else
        exit_server_error();
}

function select($data)
{
    api_require_permission('user');
    api_require_data($data, 'id');

    api_select($data['id'], ['UserService', 'select_all'], ['UserService', 'select_by_id']);
}

function register($data)
{
    api_require_data(
        $data,
        'login',
        'passwd',
        'userGroup',
        'firstName',
        'lastName',
        'email',
        'phone');

    _sanitize_user_request($data);

    if (!_validate_user_request($data)) {
        exit_response(false, 'Invalid user data');
    } else {
        try {
            AuthService::register_new_user(
                $data['login'],
                $data['passwd'],
                $data['permissions'],
                $data['firstName'],
                $data['lastName'],
                $data['email'],
                $data['phone']);
            exit_response(true);
        } catch (Exception $e) {
            exit_server_error($e);
        }
    }
}

function create($data)
{
    api_require_permission('modify_user');
    api_require_data(
        $data,
        'login',
        'passwd',
        'userGroup',
        'firstName',
        'lastName',
        'email',
        'phone');

    _sanitize_user_request($data);

    if (!_validate_user_request($data)) {
        exit_response(false, 'Invalid user data');
    } else {
        try {
            UserService::create(
                $data['login'],
                $data['passwd'],
                $data['permissions'],
                $data['firstName'],
                $data['lastName'],
                $data['email'],
                $data['phone']);
        } catch (Exception $e) {
            exit_server_error($e);
        }
    }
}

function _sanitize_user_request(&$data)
{
    $data['permissions'] = strtolower($data['permissions']);
    $data['phone'] = preg_replace('/\D+/', '', $data['phone']);
}

function _validate_user_request($data)
{
    if (strlen($data['phone']) < 10)
        return false;
    elseif (!preg_match('/\b[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,}\b/', $data['email']))
        return false;

    return true;
}