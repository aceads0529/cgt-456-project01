<?php

class UserGroup
{
    private $id, $label, $can_register, $access_level;
    private $permissions;

    /**
     * UserGroup constructor.
     * @param string $id
     * @param string $label
     * @param bool $can_register
     * @param int $access_level
     * @param array $permissions
     */
    public function __construct($id, $label, $can_register, $access_level, $permissions)
    {
        $this->id = $id;
        $this->label = $label;
        $this->can_register = (bool)$can_register;
        $this->access_level = $access_level;
        $this->permissions = $permissions;
    }

    /**
     * @return string
     */
    public function get_id()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function get_label()
    {
        return $this->label;
    }

    /**
     * @return bool
     */
    public function get_can_register()
    {
        return $this->can_register;
    }

    /**
     * @return int
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