<?php

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
     * @return Entity[]
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
     * @param int $id
     * @return bool|Entity
     * @throws Exception
     */
    public static function select_by_id($id)
    {
        return self::select_by_key('id', $id);
    }

    /**
     * @param string $key
     * @param mixed $value
     * @return bool|Entity
     * @throws Exception
     */
    protected static function select_by_key($key, $value)
    {
        if (!$value)
            return false;

        $result = DataService::select(static::get_table_name(), [$key => $value]);

        if ($result) {
            return static::get_entity_from_row($result->fetch_assoc());
        } else {
            return false;
        }
    }

    /**
     * @param int|string $id
     * @return bool
     * @throws Exception
     */
    public static function exists($id)
    {
        return DataService::exists(static::get_table_name(), ['id' => $id]);
    }

    /**
     * @param int $id
     * @param array $values
     * @throws Exception
     */
    public static function update($id, $values)
    {
        DataService::update(static::get_table_name(), $values, ['id' => $id]);
    }
}