<?php
include_once __DIR__ . '\..\..\includes.php';

UserConstraints::get_instance()->create_from(new User(['user_group_id' => 'advisor']));

$api = new RequestEndpoint;

$api->action('login')
    ->requires('login', 'password')
    ->callback(function ($request) {
        /** @var Request $request */
        $login = $request->get_param('login');
        $password = $request->get_param('password');

        if (AuthService::login($login, $password)) {
            return new Response(true, 'Login successful');
        } else {
            return new Response(false, 'Username and password don\'t match');
        }
    });

$api->action('logout', function ($request) {
    return new Response(true, 'Logout successful');
});

$api->action('register')
    ->requires('login', 'password', 'userGroupId', 'firstName', 'lastName', 'email')
    ->callback(function ($request) {
        /** @var Request $request */
        $user = User::from_request($request);
        $success = AuthService::register($user, $request->get_param('password'));
        return $success
            ? new Response(true, 'User successfully registered')
            : new Response(false, 'User not registered');
    });

$api->action('select', function ($request) {
    /** @var Request $request */
    if ($user = AuthService::get_active_user()) {
        $c = $user->get_constraints();

        $query = User::from_request($request);
        $c->filter($query);

        $results = User::dao()->select($query);

        return new Response(true, 'Users selected', $results);
    } else {
        return new Response(false, 'Permission denied');
    }
});

$api->call();