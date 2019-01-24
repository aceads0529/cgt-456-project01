<?php
/**
 * Created by PhpStorm.
 * User: Aaron
 * Date: 1/21/2019
 * Time: 3:59 AM
 */

class CGTField
{
    private $id, $name;

    public function __construct($id, $name)
    {
        $this->id = $id;
        $this->name = $name;
    }

    public function to_json_array()
    {
        return [
            'id' => $this->get_id(),
            'name' => $this->get_name()
        ];
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
}