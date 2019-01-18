<?php

class UserGroupService
{
    /**
     * @param int $id
     * @return bool|UserGroup
     * @throws Exception
     */
    public static function select_by_id($id)
    {
        $result = DataService::select('user_group');
        return $result ? self::create_user_group_from_row($result->fetch_assoc()) : false;
    }

    /**
     * @param array $row
     * @return UserGroup
     */
    private static function create_user_group_from_row($row)
    {
        return new UserGroup(
            $row['id'],
            $row['name'],
            $row['can_register'],
            $row['access_level']);
    }
}