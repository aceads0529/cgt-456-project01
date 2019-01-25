<?php

class EmployerService extends EntityService
{
    /**
     * @return string
     */
    public static function get_table_name()
    {
        return 'employer';
    }

    /**
     * @param array $row
     * @return Employer
     * @throws Exception
     */
    protected static function get_entity_from_row($row)
    {
        return new Employer(
            $row['id'],
            $row['name'],
            $row['address'],
            $row['search_str'],
            CgtFieldService::select_by_employer_id($row['id']));
    }

    /**
     * @param string $name
     * @return bool|Employer[]
     * @throws Exception
     */
    public static function find_by_name($name)
    {
        $search = self::create_search_str($name);
        $search = '%' . $search . '%';

        $query_str = sprintf('SELECT * FROM `%s` WHERE `search_str` LIKE ?', self::get_table_name());
        $result = DataService::query($query_str, [$search]);

        if (!$result || $result->num_rows == 0) {
            return false;
        } else {
            $employers = [];
            while ($row = $result->fetch_assoc()) {
                $employers[] = static::get_entity_from_row($row);
            }
            return $employers;
        }
    }

    /**
     * @param string $name
     * @param string $address
     * @param array $cgt_field_ids
     * @return Employer
     * @throws Exception
     */
    public static function create($name, $address, $cgt_field_ids)
    {
        $search_str = self::create_search_str($name);
        $id = DataService::insert(self::get_table_name(),
            [
                'name' => $name,
                'address' => $address,
                'search_str' => $search_str
            ]);

        $fields = self::update_employer_cgt_fields($id, $cgt_field_ids);

        return new Employer(
            $id,
            $name,
            $address,
            $search_str,
            $fields);
    }

    /**
     * @param int $employer_id
     * @param int[] $cgt_field_ids
     * @return CGTField[]
     * @throws Exception
     */
    public static function update_employer_cgt_fields($employer_id, $cgt_field_ids)
    {
        $fields = [];

        foreach ($cgt_field_ids as $field_id) {
            $f = CgtFieldService::select_by_id($field_id);

            if ($f) {
                $fields[] = $f;
                $field_exists = DataService::exists('employer_cgt_fields', [
                    'employer_id' => $employer_id, 'cgt_field_id' => $field_id
                ]);

                if (!$field_exists) {
                    DataService::insert('employer_cgt_fields', [
                        'employer_id' => $employer_id, 'cgt_field_id' => $field_id
                    ]);
                }
            }
        }

        return $fields;
    }

    /**
     * @param string $name
     * @return string
     */
    private static function create_search_str($name)
    {
        $result = preg_replace('/[^a-z0-9]/i', '', $name);
        return $result ? strtolower($result) : '';
    }
}