<?php
include_once __DIR__ . '/../core/includes.php';

function exit_response($error, $message = '', $data = null)
{
    header('Content-Type: application/json');
    echo json_encode(['error' => $error, 'message' => $message, 'data' => $data]);
    exit;
}

function assert_true_or_exit($stmt, $message = '')
{
    if (!$stmt) {
        exit_response(1, $message);
    }
}