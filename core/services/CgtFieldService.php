<?php
/**
 * Created by PhpStorm.
 * User: Aaron
 * Date: 1/21/2019
 * Time: 4:11 AM
 */

class CgtFieldService extends EntityService
{
    const TABLE_EMPLOYER_CGT_FIELDS = 'employer_cgt_fields';

    public static function get_table_name()
    {
        return 'cgt_field';
    }

    /**
     * @param array $row
     * @return CGTField
     */
    protected static function get_entity_from_row($row)
    {
        return new CGTField(
            $row['id'],
            $row['name']);
    }

    /**
     * @param int $employer_id
     * @return bool|array
     * @throws Exception
     */
    public static function select_by_employer_id($employer_id)
    {
        $result = DataService::query('SELECT F.* FROM employer_cgt_fields E, cgt_field F WHERE E.cgt_field_id = F.id AND E.employer_id = ?', [$employer_id]);

        if (!$result || $result->num_rows == 0)
            return [];
        else {
            $fields = [];

            while ($row = $result->fetch_assoc()) {
                $fields[] = self::get_entity_from_row($row);
            }

            return $fields;
        }
    }
}