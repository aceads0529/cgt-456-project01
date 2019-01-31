<?php

class FinancialAsstService extends EntityService
{
    public static function get_table_name()
    {
        return 'financial_asst';
    }

    /**
     * @param array $row
     * @return Option
     */
    protected static function get_entity_from_row($row)
    {
        return new Option($row['id'], $row['label']);
    }

    /**
     * @param int $work_session_id
     * @return bool|mysqli_result
     * @throws Exception
     */
    public static function select_by_work_session_id($work_session_id)
    {
        return DataService::select_assoc(
            self::get_table_name(),
            'work_session_financial_assts',
            'financial_asst_id',
            'id',
            ['work_session_id' => $work_session_id]);
    }
}