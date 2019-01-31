<?php
/**
 * Created by PhpStorm.
 * User: Aaron
 * Date: 1/21/2019
 * Time: 4:11 AM
 */

class OptionService
{
    /**
     * @param array $row
     * @return Option
     */
    protected static function get_entity_from_row($row)
    {
        return new Option($row['id'], $row['label']);
    }

    /**
     * @param string $table
     * @param string $id
     * @return bool|Option
     * @throws Exception
     */
    public static function select_by_id($table, $id)
    {
        $result = DataService::select($table, ['id' => $id]);
        if ($result)
            return self::get_entity_from_row($result->fetch_assoc());
        else
            return false;
    }

    /**
     * @param string $entity_table
     * @param string $option_table
     * @param array $params
     * @return Option[]
     * @throws Exception
     */
    public static function select_by_entity($entity_table, $option_table, $params)
    {
        $result = DataService::select_assoc(
            $option_table,
            $entity_table . '_' . $option_table,
            $option_table . '_id',
            'id',
            $params);

        $options = [];

        while ($row = $result->fetch_assoc()) {
            $options[] = self::get_entity_from_row($row);
        }

        return $options;
    }

    public static function update_entity_options($assoc_table, $entity_id, $option_ids)
    {
        foreach ($option_ids as $opt_id) {
            $o = OptionService::select_by_id($opt_id);

            if ($o) {
                $options[] = $o;
                $field_exists = DataService::exists('employer_cgt_fields', [
                    'employer_id' => $employer_id, 'cgt_field_id' => $opt_id
                ]);

                if (!$field_exists) {
                    DataService::insert('employer_cgt_fields', [
                        'employer_id' => $employer_id, 'cgt_field_id' => $opt_id
                    ]);
                }
            }
        }
    }
}