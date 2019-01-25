<?php

class UserGroupService extends EntityService
{
    /**
     * @return string
     */
    public static function get_table_name()
    {
        return 'user_group';
    }

    /**
     * @param array $row
     * @return UserGroup
     */
    protected static function get_entity_from_row($row)
    {
        $permissions = $row;

        unset($permissions['id']);
        unset($permissions['name']);

        return new UserGroup(
            $row['id'],
            $row['label'],
            $row['can_register'],
            $row['access_level'],
            $permissions);
    }
}