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
     * @param int $id
     * @return bool|Employer
     * @throws Exception
     */
    public static function select_by_id($id)
    {
        return self::select_by_key('id', $id);
    }

    /**
     * @param int $id
     * @param array $values
     * @throws Exception
     */
    public static function update($id, $values)
    {
        DataService::update(self::TABLE_EMPLOYER, $values, ['id' => $id]);
    }

    /**
     * @param string $name
     * @return Employer[]
     * @throws Exception
     */
    public static function find_by_name($name)
    {
        $search = self::create_search_str($name);
        $search = '%' . $search . '%';

        $query_str = sprintf('SELECT * FROM `%s` WHERE `search_str` LIKE ?', self::TABLE_EMPLOYER);
        $result = DataService::query($query_str, [$search]);

        if (!$result || $result->num_rows == 0) {
            return [];
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
        $id = DataService::insert(self::TABLE_EMPLOYER,
            [
                'name' => $name,
                'address' => $address,
                'search_str' => $search_str
            ]);

        $fields = [];

        foreach ($cgt_field_ids as $field_id) {
            $f = CGTFieldService::select_by_id($field_id);

            if ($f) {
                $fields[] = $f;
                DataService::insert(self::TABLE_EMPLOYER_CGT_FIELDS,
                    [
                        'employer_id' => $id,
                        'cgt_field_id' => $field_id
                    ]);
            }
        }

        return new Employer(
            $id,
            $name,
            $address,
            $search_str,
            $fields);
    }

    /**
     * @param int[] $cgt_field_ids
     * @throws Exception
     */
    private static function update_employer_cgt_fields_table($employer_id, $cgt_field_ids)
    {
        $fields = [];

        foreach ($cgt_field_ids as $field_id) {
            $f = CGTFieldService::select_by_id($field_id);

            if ($f) {
                $fields[] = $f;
                DataService::insert('employer_cgt_fields',
                    [
                        'employer_id' => $employer_id,
                        'cgt_field_id' => $field_id
                    ]);
            }
        }
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
            CGTFieldService::select_by_employer_id($row['id']));
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