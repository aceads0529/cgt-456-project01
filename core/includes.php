<?php
require_once __DIR__ . '/model/User.php';

require_once __DIR__ . '/services/DataService.php';
require_once __DIR__ . '/services/AuthService.php';
require_once __DIR__ . '/services/UserService.php';


/**
 * Checks if a session is already active before starting one
 */
function safe_session_start()
{
    if (session_status() != PHP_SESSION_ACTIVE) {
        session_start();
    }
}