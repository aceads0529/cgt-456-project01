<?php
require_once __DIR__ . '/model/Entity.php';
require_once __DIR__ . '/model/User.php';
require_once __DIR__ . '/model/UserGroup.php';
require_once __DIR__ . '/model/Employer.php';
require_once __DIR__ . '/model/CGTField.php';
require_once __DIR__ . '/model/WorkSession.php';
require_once __DIR__ . '/model/Form.php';

require_once __DIR__ . '/services/EntityService.php';
require_once __DIR__ . '/services/InviteService.php';
require_once __DIR__ . '/services/DataService.php';
require_once __DIR__ . '/services/AuthService.php';
require_once __DIR__ . '/services/UserService.php';
require_once __DIR__ . '/services/UserGroupService.php';
require_once __DIR__ . '/services/EmployerService.php';
require_once __DIR__ . '/services/CgtFieldService.php';
require_once __DIR__ . '/services/WorkSessionService.php';
require_once __DIR__ . '/services/FormService.php';


/**
 * Checks if a session is already active before starting one
 */
function safe_session_start()
{
    if (session_status() != PHP_SESSION_ACTIVE) {
        session_start();
    }
}