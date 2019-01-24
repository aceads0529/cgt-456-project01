<?php

class UserGroup
{
    private $id, $name, $can_register, $access_level;
    private $permissions;

    public function __construct($id, $name, $can_register, $access_level, $permissions)
    {
        $this->id = $id;
        $this->name = $name;
        $this->can_register = $can_register;
        $this->access_level = $access_level;
        $this->permissions = $permissions;
    }

    /**
     * @return int
     */
    public function get_id()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function get_name()
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function get_can_register()
    {
        return $this->can_register;
    }

    /**
     * @return mixed
     */
    public function get_access_level()
    {
        return $this->access_level;
    }

    /**
     * @param string $code
     * @return bool
     */
    public function has_permission($code)
    {
        if (isset($this->permissions[$code]) && (bool)$this->permissions[$code])
            return true;
        else
            return false;
    }
}