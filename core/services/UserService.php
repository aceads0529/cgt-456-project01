<?php
require_once __DIR__ . '/../includes.php';

class UserService extends EntityService
{
    /**
     * @return string
     */
    public static function get_table_name()
    {
        return 'user';
    }

    /**
     * @param array $row
     * @return User
     * @throws Exception
     */
    protected static function get_entity_from_row($row)
    {
        /** @var UserGroup $user_group */
        $user_group = UserGroupService::select_by_id($row['user_group_id']);

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
     * @param int $advisor_id
     * @param UserGroup $user_group
     * @param string $first_name
     * @param string $last_name
     * @param string $email
     * @param int $phone
     * @return User
     * @throws Exception
     */
    public static function create($login, $passwd, $advisor_id, $user_group, $first_name, $last_name, $email, $phone)
    {
        $passwd_salt = md5(uniqid(rand(), true));
        $passwd_hash = md5($passwd . $passwd_salt);

        $id = DataService::insert(static::get_table_name(),
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

        if ($advisor_id != null) {
            DataService::insert('advisor_students', ['advisor_id' => $advisor_id, 'student_id' => $id]);
        }

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
}
