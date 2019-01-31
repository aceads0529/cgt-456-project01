<?php

class Option
{
    private $id, $label;

    public function __construct($id, $label)
    {
        $this->id = $id;
        $this->label = $label;
    }

    public function to_json_array()
    {
        return [
            'id' => $this->get_id(),
            'label' => $this->get_label()
        ];
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
}