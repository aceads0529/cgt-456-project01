<?php
require_once __DIR__ . '/db/db.php';
require_once __DIR__ . '/model/User.php';
require_once __DIR__ . '/services/AuthService.php';
require_once __DIR__ . '/services/UserService.php';
require_once __DIR__ . '/db/QueryBuilder.php';
require_once __DIR__ . '/db/DbConnection.php';
require_once __DIR__ . '/types/AccountType.php';
require_once __DIR__ . '/types/AuthRequest.php';

function safe_session_start()
{
    if (session_status() != PHP_SESSION_ACTIVE) {
        session_start();
    }
}