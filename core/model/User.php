<?php

require_once __DIR__ . '/../includes.php';

class User
{
    private $id, $login, $user_group, $passwd_hash, $passwd_salt, $first_name, $last_name, $email, $phone;

    /**
     * @param int $id
     * @param string $login
     * @param UserGroup $user_group
     * @param string $passwd_hash
     * @param string $passwd_salt
     * @param string $first_name
     * @param string $last_name
     * @param string $email
     * @param string $phone
     */
    public function __construct($id, $login, $user_group, $passwd_hash, $passwd_salt, $first_name, $last_name, $email, $phone)
    {
        $this->id = $id;
        $this->login = $login;
        $this->user_group = $user_group;
        $this->passwd_hash = $passwd_hash;
        $this->passwd_salt = $passwd_salt;
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->email = $email;
        $this->phone = $phone;
    }

    public function to_json_array()
    {
        return [
            'id' => $this->get_id(),
            'login' => $this->get_login(),
            'userGroupId' => $this->get_user_group()->get_id(),
            'passwdHash' => $this->get_password_hash(),
            'passwdSalt' => $this->get_password_salt(),
            'firstName' => $this->get_first_name(),
            'lastName' => $this->get_last_name(),
            'email' => $this->get_email(),
            'phone' => $this->get_phone(),
        ];
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
     * @return UserGroup
     */
    public function get_user_group()
    {
        return $this->user_group;
    }

    /**
     * @return mixed
     */
    public function get_password_hash()
    {
        return $this->passwd_hash;
    }

    /**
     * @return mixed
     */
    public function get_password_salt()
    {
        return $this->passwd_salt;
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