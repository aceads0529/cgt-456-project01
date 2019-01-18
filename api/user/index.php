<?php
include_once '../includes.php';

$action = isset($_POST['action']) ? $_POST['action'] : '';
$data = isset($_POST['data']) ? $_POST['data'] : [];

switch ($action) {
    case 'login':
        login($data);
        break;
    case 'logout':
        logout();
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

function login($data)
{
    try {
        if ($user = AuthService::login($data['login'], $data['password']))
            exit_response(false);
        else
            exit_response(true, 'Username and passwords do not match');
    } catch (Exception $e) {
        exit_server_error($e->getMessage());
    }
}

function logout()
{
    AuthService::logout();
    exit_response(false);
}

function select($data)
{
    // TODO: Authorize API call
}

function register($data)
{
    _sanitize_user_request($data);

    if (!_validate_user_request($data)) {
        exit_response(true, 'Invalid user data');
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
            exit_response(false);
        } catch (Exception $e) {
            exit_server_error($e->getMessage());
        }
    }
}

function create($data)
{
    // TODO: Authorize API call

    _sanitize_user_request($data);

    if (!_validate_user_request($data)) {
        exit_response(true, 'Invalid user data');
    } else {
        try {
            UserService::create_new_user(
                $data['login'],
                $data['passwd'],
                $data['permissions'],
                $data['firstName'],
                $data['lastName'],
                $data['email'],
                $data['phone']);
        } catch (Exception $e) {
            exit_server_error($e->getMessage());
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