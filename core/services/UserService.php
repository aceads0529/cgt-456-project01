<?php
require_once __DIR__ . '/../includes.php';

class UserService extends EntityService
{
    public function sanitize_entity(&$data)
    {
        $data['acctType'] = AccountType::from_string($data['acctType']);
        $data['phone'] = preg_replace('/\D+/', '', $data['phone']);
    }

    public function validate_entity($data)
    {
        if (strlen($data['phone']) < 10)
            return false;
        elseif (!preg_match('/\b[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,}\b/', $data['email']))
            return false;

        return true;
    }

    /**
     * @param User $obj
     * @return array
     */
    public function to_assoc($obj)
    {
        return [
            'id' => $obj->get_id(),
            'login' => $obj->get_login(),
            'pswd_hash' => $obj->get_password_hash(),
            'pswd_salt' => $obj->get_password_hash(),
            'firstName' => $obj->get_first_name(),
            'lastName' => $obj->get_last_name(),
            'acctType' => AccountType::to_string($obj->get_acct_type()),
            'email' => $obj->get_email(),
            'phone' => $obj->get_phone()
        ];
    }

    public function from_assoc($obj)
    {
        return new User(
            $obj['id'],
            $obj['login'],
            $obj['passwordHash'],
            $obj['passwordSalt'],
            $obj['firstName'],
            $obj['lastName'],
            AccountType::from_string($obj['acctType']),
            $obj['email'],
            $obj['phone']);
    }

    protected function on_request_permission($request, $params)
    {
        if ($user = AuthService::get_current_user()) {
            if ($user->get_acct_type() == AccountType::ADMIN) {
                return true;
            } else {
                switch ($request) {
                    case AuthRequest::SELECT:

                }
            }
        } else {
            return false;
        }
    }

    public function create_new($login, $password_hash, $first_name, $last_name, $acct_type, $email, $phone)
    {

    }

    /**
     * @param string $login
     * @param string $password_hash
     * @param string $first_name
     * @param string $last_name
     * @param string $acct_type
     * @param string $email
     * @param string $phone
     * @return bool|User
     */
    public static function create_new($login, $password_hash, $first_name, $last_name, $acct_type, $email, $phone)
    {
        if (!self::is_login_available($login))
            return false;

        $password_salt = md5((string)time());
        $password_hash = md5($password_hash . $password_salt);

        $db = db_connect();
        $acct_type = AccountType::from_string($acct_type);

        try {
            db_query(
                $db,
                'INSERT INTO user (login, passwordHash, passwordSalt, firstName, lastName, acctType, email, phone) VALUES (?, ?, ?, ?, ?, ?, ?, ?)',
                [$login, $password_hash, $password_salt, $first_name, $last_name, $acct_type, $email, $phone]);

            $id = mysqli_insert_id($db);
            $db->close();
            return new User($id, $login, $password_hash, $password_salt, $first_name, $last_name, $acct_type, $email, $phone);
        } catch (Exception $e) {
            return false;
        }
    }

    /**
     * @return User[]|bool
     */
    public static function get_all()
    {
        try {
            $result = db_query_close('SELECT * FROM user');
            $users = [];
            while ($row = $result->fetch_assoc()) {
                $users[] = self::create_from_assoc($row);
            }
            return $users;
        } catch (Exception $e) {
            return false;
        }
    }

    /**
     * @param int $id
     * @return bool|User
     */
    public static function get_by_id($id)
    {
        return self::select_user('id', $id);
    }

    /**
     * @param string $login
     * @return bool|User
     */
    public static function get_by_login($login)
    {
        return self::select_user('login', $login);
    }

    /**
     * @param string $login
     * @return bool
     */
    public static function is_login_available($login)
    {
        try {
            return db_query_close('SELECT id FROM user WHERE login = ?', [$login])->num_rows == 0;
        } catch (Exception $e) {
            return false;
        }
    }

    /**
     * @param string $key
     * @param mixed $value
     * @return bool|User
     */
    private static function select_user($key, $value)
    {
        $db = db_connect();
        try {
            $result = db_query($db, sprintf('SELECT * FROM user WHERE %s = ?', $key), [$value]);
        } catch (Exception $e) {
            return false;
        }

        return self::create_from_assoc($result->fetch_assoc());
    }

    /**
     * @param array $arr
     * @return bool|User
     */
    private static function create_from_assoc($arr)
    {
        if ($arr) {
            return new User(
                $arr['id'],
                $arr['login'],
                $arr['passwordHash'],
                $arr['passwordSalt'],
                $arr['firstName'],
                $arr['lastName'],
                AccountType::from_string($arr['acctType']),
                $arr['email'],
                $arr['phone']);
        } else {
            return false;
        }
    }
}