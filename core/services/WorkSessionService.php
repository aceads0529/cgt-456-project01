<?php

class WorkSessionService extends EntityService
{
    /**
     * @return string
     */
    public static function get_table_name()
    {
        return 'work_session';
    }

    /**
     * @param array $row
     * @return WorkSession
     */
    protected static function get_entity_from_row($row)
    {
        try {
            $start_date = new DateTime($row['start_date']);
            $end_date = new DateTime($row['end_date']);
        } catch (Exception $e) {
            $start_date = null;
            $end_date = null;
        }

        return new WorkSession(
            $row['id'],
            $row['student_id'],
            $row['supervisor_id'],
            $row['employer_id'],
            $row['job_title'],
            $row['address'],
            $start_date,
            $end_date,
            $row['offsite'],
            $row['total_hours'],
            $row['pay_rate']);
    }

    /**
     * @param int $supervisor_id
     * @return bool|Entity
     * @throws Exception
     */
    public static function select_by_supervisor_id($supervisor_id)
    {
        return self::select_by_key('supervisor_id', $supervisor_id);
    }

    /**
     * @param int $work_session_id
     * @param int $supervisor_id
     * @throws Exception
     */
    public static function update_supervisor($work_session_id, $supervisor_id)
    {
        DataService::update(static::get_table_name(), ['supervisor_id' => $supervisor_id], ['id' => $work_session_id]);
    }

    /**
     * @param int $student_id
     * @param int $supervisor_id
     * @param int $employer_id
     * @param string $job_title
     * @param string $address
     * @param string $start_date
     * @param string $end_date
     * @param bool $offsite
     * @param int $total_hours
     * @param float $pay_rate
     * @return WorkSession
     * @throws Exception
     */
    public static function create($employer_id, $supervisor_id, $student_id, $job_title, $address, $start_date, $end_date, $offsite, $total_hours, $pay_rate)
    {
        $id = DataService::insert(static::get_table_name(),
            [
                'student_id' => $student_id,
                'supervisor_id' => $supervisor_id,
                'employer_id' => $employer_id,
                'job_title' => $job_title,
                'address' => $address,
                'start_date' => $start_date,
                'end_date' => $end_date,
                'offsite' => (bool)$offsite,
                'total_hours' => $total_hours,
                'pay_rate' => $pay_rate
            ]);

        try {
            $start_date = new DateTime($start_date);
            $end_date = new DateTime($end_date);
        } catch (Exception $e) {
            $start_date = null;
            $end_date = null;
        }

        return new WorkSession(
            $id,
            $student_id,
            $supervisor_id,
            $employer_id,
            $job_title,
            $address,
            $start_date,
            $end_date,
            $offsite,
            $total_hours,
            $pay_rate);
    }
}
