<?php
require_once __DIR__ . '/../includes.php';

class UserService
{
    const TABLE_USER = 'user';

    /**
     * @return User[]
     * @throws Exception
     */
    public static function select_all()
    {
        $result = DataService::select(self::TABLE_USER);
        $users = [];

        while ($row = $result->fetch_assoc()) {
            $users[] = self::create_user_from_row($row);
        }

        return $users;
    }

    /**
     * @param int $id
     * @return bool|User
     * @throws Exception
     */
    public static function select_by_id($id)
    {
        return self::select_by_key('id', $id);
    }

    /**
     * @param string $login
     * @return bool|User
     * @throws Exception
     */
    public static function select_by_login($login)
    {
        return self::select_by_key('login', $login);
    }

    /**
     * @param string $login
     * @param string $passwd
     * @param UserGroup $user_group
     * @param string $first_name
     * @param string $last_name
     * @param string $email
     * @param int $phone
     * @return User
     * @throws Exception
     */
    public static function create($login, $passwd, $user_group, $first_name, $last_name, $email, $phone)
    {
        $passwd_salt = md5(uniqid(rand(), true));
        $passwd_hash = md5($passwd . $passwd_salt);

        $id = DataService::insert(self::TABLE_USER,
            [
                'login' => $login,
                'passwd_hash' => $passwd_hash,
                'passwd_salt' => $passwd_salt,
                'user_group_id' => $user_group->get_id(),
                'first_name' => $first_name,
                'last_name' => $last_name,
                'email' => $email,
                'phone' => $phone
            ]);

        return new User(
            $id,
            $login,
            $user_group,
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
    private static function select_by_key($key, $value)
    {
        $result = DataService::select(self::TABLE_USER, [$key => $value]);

        if ($result && $result->num_rows > 0) {
            return self::create_user_from_row($result->fetch_assoc());
        } else {
            return false;
        }
    }

    /**
     * @param array $row
     * @return User
     * @throws Exception
     */
    private static function create_user_from_row($row)
    {
        $user_group = UserGroupService::select_by_id($row['id']);

        return new User(
            $row['id'],
            $row['login'],
            $user_group,
            $row['passwd_hash'],
            $row['passwd_salt'],
            $row['first_name'],
            $row['last_name'],
            $row['email'],
            $row['phone']);
    }
}
