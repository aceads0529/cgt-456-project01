<?php
/**
 * Created by PhpStorm.
 * User: Aaron
 * Date: 1/21/2019
 * Time: 4:11 AM
 */

class CGTFieldService
{
    const TABLE_CGT_FIELD = 'cgt_field';
    const TABLE_EMPLOYER_CGT_FIELDS = 'employer_cgt_fields';

    /**
     * @return CGTField[]
     * @throws Exception
     */
    public static function select_all()
    {
        $result = DataService::select(self::TABLE_CGT_FIELD);
        $fields = [];

        while ($row = $result->fetch_assoc()) {
            $fields[] = self::create_cgt_field_from_row($row);
        }

        return $fields;
    }

    /**
     * @param int $id
     * @return bool|CGTField
     * @throws Exception
     */
    public static function select_by_id($id)
    {
        $result = DataService::select(self::TABLE_CGT_FIELD, ['id' => $id]);

        if ($result && $result->num_rows > 0)
            return self::create_cgt_field_from_row($result->fetch_assoc());
        else
            return false;
    }

    /**
     * @param int $id
     * @return bool|array
     * @throws Exception
     */
    public static function select_by_employer_id($id)
    {
        $result = DataService::select(self::TABLE_EMPLOYER_CGT_FIELDS, ['employer_id' => $id]);

        if ($result && $result->num_rows > 0) {
            $fields = [];
            while ($row = $result->fetch_assoc())
                $fields[] = self::select_by_id($row['cgt_field_id']);
            return $fields;
        } else {
            return false;
        }
    }

    /**
     * @param array $row
     * @return CGTField
     */
    private static function create_cgt_field_from_row($row)
    {
        return new CGTField(
            $row['id'],
            $row['name']);
    }
}