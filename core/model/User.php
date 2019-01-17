<?php

require_once __DIR__ . '/../includes.php';

class User
{
    private $id, $login, $pswd_hash, $pswd_salt, $first_name, $last_name, $email, $phone;

    /**
     * User constructor.
     * @param int $id
     * @param string $login
     * @param string $password_hash
     * @param string $password_salt
     * @param string $first_name
     * @param string $last_name
     * @param string $email
     * @param string $phone
     */
    public function __construct($id, $login, $password_hash, $password_salt, $first_name, $last_name, $email, $phone)
    {
        $this->id = $id;
        $this->login = $login;
        $this->pswd_hash = $password_hash;
        $this->pswd_salt = $password_salt;
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->email = $email;
        $this->phone = $phone;
    }

    /**
     * @return mixed
     */
    public function get_id()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function get_login()
    {
        return $this->login;
    }

    /**
     * @return mixed
     */
    public function get_password_hash()
    {
        return $this->pswd_hash;
    }

    /**
     * @return mixed
     */
    public function get_password_salt()
    {
        return $this->pswd_salt;
    }

    /**
     * @return mixed
     */
    public function get_first_name()
    {
        return $this->first_name;
    }

    /**
     * @return mixed
     */
    public function get_last_name()
    {
        return $this->last_name;
    }

    /**
     * @return mixed
     */
    public function get_email()
    {
        return $this->email;
    }

    /**
     * @return mixed
     */
    public function get_phone()
    {
        return $this->phone;
    }
}