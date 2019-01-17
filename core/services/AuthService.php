<?php
require_once __DIR__ . '/../includes.php';

const AUTH_USER_CREATE = 0;

class AuthService
{
    /**
     * @param string $login
     * @param string $passwd
     * @return bool|User
     * @throws Exception
     */
    public static function login($login, $passwd)
    {
        $user = UserService::get_by_login($login);

        if ($user) {
            $hash = md5($passwd . $user->get_password_salt());
            if ($hash == $user->get_password_hash()) {
                safe_session_start();
                $_SESSION['active_user'] = $user;
                return $user;
            }
        }

        return false;
    }

    public static function logout()
    {
        safe_session_start();
        unset($_SESSION['active_user']);
    }

    /**
     * @return bool|User
     */
    public static function get_active_user()
    {
        safe_session_start();

        if (isset($_SESSION['active_user']))
            return $_SESSION['active_user'];
        else
            return false;
    }

    /**
     * @param string $name
     * @return bool|array
     * @throws Exception
     */
    public static function get_permission_by_name($name)
    {
        $name = strtolower($name);
        $result = DataService::select('permissions', ['name' => $name]);

        if (!$result || $result->num_rows == 0)
            return false;
        else
            return $result->fetch_assoc();
    }
}