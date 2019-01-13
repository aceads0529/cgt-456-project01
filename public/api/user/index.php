<?php
include_once '../../includes.php';

$action = isset($_POST['action']) ? $_POST['action'] : '';
$data = isset($_POST['data']) ? $_POST['data'] : [];

switch ($action) {
    case 'login':
        login($data);
        break;
    case 'logout':
        logout($data);
        break;
    case 'create':
        create($data);
        break;
    case 'get':
        get($data);
        break;
}

function login($data)
{
    $user = AuthService::login($data['login'], $data['passwordHash']);

    if (!$user) {
        exit_response(1, 'Username and password do not match');
    } else {
        exit_response(0, '', ['user' => $user->json()]);
    }
}

function logout($data)
{
    if (AuthService::logout()) {
        exit_response(0);
    } else {
        exit_response(1, 'Logout failed');
    }
}

function create($data)
{
    QueryBuilder::where_clause_from_params(['id' => [5, 10, 25]]);

    _sanitize_user_request($data);
    assert_true_or_exit(
        AuthService::auth_user_create($data['acctType']) && _validate_user_request($data),
        'Permission denied');

    $new_user = UserService::create_new(
        $data['login'],
        $data['passwordHash'],
        $data['firstName'],
        $data['lastName'],
        $data['acctType'],
        $data['email'],
        $data['phone']
    );

    if ($new_user) {
        exit_response(0, '', ['user' => $new_user->json()]);
    } else {
        exit_response(1, 'Error creating new user');
    }
}

function get($data)
{
    if (isset($data['id'])) {
        $user = UserService::get_by_id($data['id']);
        exit_response(0, '', ['user' => $user->json()]);
    } else {
        $users = UserService::get_all();
        foreach ($users as &$user) {
            $user = $user->json();
        }

        exit_response(0, '', ['users' => $users]);
    }
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