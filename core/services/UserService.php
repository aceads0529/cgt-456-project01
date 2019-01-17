<?php
require_once __DIR__ . '/../includes.php';

class UserService
{
    /**
     * @param int $id
     * @return bool|User
     * @throws Exception
     */
    public static function get_by_id($id)
    {
        return self::get_by_key('id', $id);
    }

    /**
     * @param string $login
     * @return bool|User
     * @throws Exception
     */
    public static function get_by_login($login)
    {
        return self::get_by_key('login', $login);
    }

    /**
     * @param $login
     * @param $passwd
     * @param $permissions
     * @param $first_name
     * @param $last_name
     * @param $email
     * @param $phone
     * @return User
     * @throws Exception
     */
    public static function create_new_user($login, $passwd, $permissions, $first_name, $last_name, $email, $phone)
    {
        $passwd_salt = md5(uniqid(rand(), true));
        $passwd_hash = md5($passwd . $passwd_salt);
        $permissions = AuthService::get_permission_by_name($permissions);

        if (!$permissions)
            throw new InvalidArgumentException('Permissions not found');

        $id = DataService::insert('user',
            [
                'login' => $login,
                'passwd_hash' => $passwd_hash,
                'passwd_salt' => $passwd_salt,
                'permissions_id' => $permissions['id'],
                'first_name' => $first_name,
                'last_name' => $last_name,
                'email' => $email,
                'phone' => $phone
            ]);

        return new User(
            $id,
            $login,
            $passwd_hash,
            $passwd_salt,
            $first_name,
            $last_name,
            $email,
            $phone);
    }

    /**
     * @param string $key
     * @param mixed $value
     * @return bool|User
     * @throws Exception
     */
    private static function get_by_key($key, $value)
    {
        $result = DataService::select('user', [$key => $value]);

        if ($result && $result->num_rows > 0) {
            return self::user_from_db_row($result->fetch_assoc());
        } else {
            return false;
        }
    }

    /**
     * @param array $row
     * @return User
     */
    private static function user_from_db_row($row)
    {
        return new User(
            $row['id'],
            $row['login'],
            $row['passwd_hash'],
            $row['passwd_salt'],
            $row['first_name'],
            $row['last_name'],
            $row['email'],
            $row['phone']);
    }
}