<?php
include_once __DIR__ . '\..\..\includes.php';

$api = new RequestEndpoint();

$api->action('employer')
    ->requires('name', 'address', 'cgtFields')
    ->callback(function ($request) {
        $dao = Employer::dao();


    });

$api->call();