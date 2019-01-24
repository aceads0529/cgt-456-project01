<?php
/**
 * Created by PhpStorm.
 * User: Aaron
 * Date: 1/23/2019
 * Time: 9:41 PM
 */

class EntityService
{
    /**
     * @return string
     */
    public static function get_table_name()
    {
        return null;
    }

    /**
     * @param array $row
     * @return mixed
     */
    protected static function get_entity_from_row($row)
    {
        return null;
    }

    /**
     * @return IEntity[]
     * @throws Exception
     */
    public static function select_all()
    {
        $result = DataService::select(static::get_table_name());
        $entities = [];

        while ($row = $result->fetch_assoc()) {
            $entities[] = static::get_entity_from_row($row);
        }

        return $entities;
    }

    /**
     * @param string $key
     * @param mixed $value
     * @return bool|IEntity
     * @throws Exception
     */
    public static function select_by_key($key, $value)
    {
        if (!$value)
            return false;

        $result = DataService::select(static::get_table_name(), [$key => $value]);

        if ($result && $result->num_rows > 0) {
            return static::get_entity_from_row($result->fetch_assoc());
        } else {
            return false;
        }
    }
}