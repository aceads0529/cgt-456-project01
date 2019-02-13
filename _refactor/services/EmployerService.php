<?php

class EmployerService
{
    public static function update_or_create($name, $address, $cgt_fields)
    {
        $search_str = self::get_search_str($name);
    }

    public static function find_by_name($name)
    {
        $search_str = self::get_search_str($name);
        $search_str = '%' . $search_str . '%';


    }

    public static function get_search_str($name)
    {
        return preg_replace('/[^a-z]/', '', strtolower($name));
    }
}