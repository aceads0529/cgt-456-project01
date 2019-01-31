<?php

class Employer implements Entity
{
    private $id, $name, $address, $search_str, $cgt_fields;

    public function __construct($id, $name, $address, $search_str, $cgt_fields)
    {
        $this->id = $id;
        $this->name = $name;
        $this->address = $address;
        $this->search_str = $search_str;
        $this->cgt_fields = $cgt_fields;
    }

    public function to_json_array()
    {
        $fields = $this->get_cgt_fields();
        foreach ($fields as &$f)
            $f = $f->to_json_array();

        return [
            'id' => $this->get_id(),
            'name' => $this->get_name(),
            'address' => $this->get_address(),
            'search_str' => $this->get_search_str(),
            'cgt_fields' => $fields
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

    /**
     * @return string
     */
    public function get_address()
    {
        return $this->address;
    }

    /**
     * @return string
     */
    public function get_search_str()
    {
        return $this->search_str;
    }

    /**
     * @return Option[]
     */
    public function get_cgt_fields()
    {
        return $this->cgt_fields;
    }
}