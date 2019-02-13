<?php
include_once __DIR__ . '\..\includes.php';

class User extends Entity
{
    public $login, $password_hash, $password_salt, $user_group_id,
        $first_name, $last_name, $email, $phone;

    private $constraints;

    public function __construct($arr = null)
    {
        parent::__construct($arr);
    }

    private function fetch_constraints()
    {
        $this->constraints = UserConstraints::get_instance()->create_from($this);
    }

    /**
     * @return EntityConstraintGroup
     */
    public function get_constraints()
    {
        if (!$this->constraints) {
            $this->fetch_constraints();
        }

        return $this->constraints;
    }

    /**
     * @return UserDao
     */
    public static function dao()
    {
        return new UserDao();
    }

    public function set_password($password, $salt = null)
    {
        $salt = $salt ? $salt : md5((string)time());
        $this->password_salt = $salt;
        $this->password_hash = md5($password . $salt);
    }

    /**
     * @param string $password
     * @return bool
     */
    public function try_password($password)
    {
        return $this->password_salt
            && $this->password_hash
            && md5($password . $this->password_salt) == $this->password_hash;
    }
}