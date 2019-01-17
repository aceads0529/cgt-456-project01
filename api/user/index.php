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
    case 'create':
        // create($data);
        break;
}

function login($data)
{
    try {
        if ($user = AuthService::login($data['login'], $data['password']))
            exit_response(0);
        else
            exit_response(1, 'Username and passwords do not match');
    } catch (Exception $e) {
        throw $e;
        exit_server_error($e->getMessage());
    }
}

function logout()
{
    AuthService::logout();
    exit_response(0);
}

function _sanitize_user_request(&$data)
{
    $data['acctType'] = AccountType::from_string($data['acctType']);
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