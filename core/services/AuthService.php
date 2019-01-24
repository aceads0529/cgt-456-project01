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
        $user = UserService::select_by_login($login);

        if ($user) {
            $hash = md5($passwd . $user->get_password_salt());
            if ($hash == $user->get_password_hash()) {
                self::set_active_user($user);
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
     * @param User $user
     */
    private static function set_active_user($user)
    {
        safe_session_start();
        $_SESSION['active_user'] = $user;
    }

    public static function has_permission($permission)
    {
        $user = self::get_active_user();

        if ($user) {
            if ($permission == 'user')
                return true;
            else
                return $user->get_user_group()->has_permission($permission);
        } else {
            return false;
        }
    }

    /**
     * @param string $login
     * @param string $passwd
     * @param int $user_group_id
     * @param string $first_name
     * @param string $last_name
     * @param string $email
     * @param int $phone
     * @return User
     * @throws Exception
     */
    public static function register_new_user($login, $passwd, $user_group_id, $first_name, $last_name, $email, $phone)
    {
        $p = UserGroupService::select_by_id($user_group_id);

        if (!$p)
            throw new InvalidArgumentException('Permissions not found');
        elseif (!$p->get_can_register())
            throw new InvalidArgumentException('Invalid account type');
        else {
            $user = UserService::create($login, $passwd, $user_group_id, $first_name, $last_name, $email, $phone);
            self::set_active_user($user);
        }
    }
}