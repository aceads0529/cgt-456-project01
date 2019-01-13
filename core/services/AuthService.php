<?php
require_once __DIR__ . '/../includes.php';

const AUTH_USER_CREATE = 0;

class AuthService
{
    /**
     * @param string $login
     * @param string $password_hash
     * @return bool|User
     */
    public static function login($login, $password_hash)
    {
        $user = UserService::get_by_login($login);

        if ($user) {
            $hash = md5($password_hash . $user->get_password_salt());
            if ($hash == $user->get_password_hash()) {
                safe_session_start();
                $_SESSION['active_user'] = $user;
                return $user;
            }
        }

        return false;
    }

    /**
     * @return bool
     */
    public static function logout()
    {
        safe_session_start();

        if (isset($_SESSION['active_user'])) {
            unset($_SESSION['active_user']);
            return true;
        } else {
            return false;
        }
    }

    /**
     * @return bool|User
     */
    public static function get_current_user()
    {
        safe_session_start();

        if (isset($_SESSION['active_user']))
            return $_SESSION['active_user'];
        else
            return false;
    }

    /**
     * @param int $acct_type
     * @return bool
     */
    public static function auth_user_create($acct_type)
    {
        $current_user = self::get_current_user();
        $current_user = $current_user ? $current_user->get_acct_type() : AccountType::NONE;

        return AccountType::compare($current_user, AccountType::ADVISOR) >= 0
            && AccountType::compare($current_user, $acct_type) > 0;
    }
}