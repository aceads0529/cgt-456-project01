<?php
require_once __DIR__ . '/model/IEntity.php';
require_once __DIR__ . '/model/User.php';
require_once __DIR__ . '/model/UserGroup.php';
require_once __DIR__ . '/model/Employer.php';
require_once __DIR__ . '/model/CGTField.php';
require_once __DIR__ . '/model/WorkSession.php';

require_once __DIR__ . '/services/DataService.php';
require_once __DIR__ . '/services/AuthService.php';
require_once __DIR__ . '/services/UserService.php';
require_once __DIR__ . '/services/UserGroupService.php';
require_once __DIR__ . '/services/EmployerService.php';
require_once __DIR__ . '/services/CGTFieldService.php';
require_once __DIR__ . '/services/WorkSessionService.php';


/**
 * Checks if a session is already active before starting one
 */
function safe_session_start()
{
    if (session_status() != PHP_SESSION_ACTIVE) {
        session_start();
    }
}