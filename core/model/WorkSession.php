<?php

class WorkSession implements Entity
{
    private $id, $student_id, $supervisor_id, $employer_id, $job_title, $address, $start_date, $end_date, $offsite, $total_hours, $pay_rate;

    /**
     * @param int $id
     * @param int $student_id
     * @param int $supervisor_id
     * @param int $employer_id
     * @param string $job_title
     * @param string $address
     * @param DateTime $start_date
     * @param DateTime $end_date
     * @param bool $offsite
     * @param int $total_hours
     * @param float $pay_rate
     */
    public function __construct($id, $student_id, $supervisor_id, $employer_id, $job_title, $address, $start_date, $end_date, $offsite, $total_hours, $pay_rate)
    {
        $this->id = $id;
        $this->student_id = $student_id;
        $this->supervisor_id = $supervisor_id;
        $this->employer_id = $employer_id;
        $this->job_title = $job_title;
        $this->address = $address;
        $this->start_date = $start_date;
        $this->end_date = $end_date;
        $this->offsite = (bool)$offsite;
        $this->total_hours = $total_hours;
        $this->pay_rate = $pay_rate;
    }

    /**
     * @return array
     */
    function to_json_array()
    {
        return [
            'id' => $this->get_id(),
            'studentId' => $this->get_student_id(),
            'supervisorId' => $this->get_supervisor_id(),
            'employerId' => $this->get_employer_id(),
            'jobTitle' => $this->get_job_title(),
            'address' => $this->get_address(),
            'startDate' => $this->get_start_date(),
            'endDate' => $this->get_end_date(),
            'offsite' => $this->is_offsite(),
            'totalHours' => $this->get_total_hours(),
            'payRate' => $this->get_pay_rate()
        ];
    }

    /**
     * @param array $row
     * @return WorkSession
     */
    static function from_db_row($row)
    {
        return new WorkSession(
            $row['id'],
            $row['student_id'],
            $row['supervisor_id'],
            $row['employer_id'],
            $row['job_title'],
            $row['address'],
            $row['start_date'],
            $row['end_date'],
            $row['offsite'],
            $row['total_hours'],
            $row['pay_rate']);
    }

    /**
     * @return int
     */
    public function get_id()
    {
        return $this->id;
    }

    /**
     * @return int
     */
    public function get_student_id()
    {
        return $this->student_id;
    }

    /**
     * @return int
     */
    public function get_supervisor_id()
    {
        return $this->supervisor_id;
    }

    /**
     * @return int
     */
    public function get_employer_id()
    {
        return $this->employer_id;
    }

    /**
     * @return string
     */
    public function get_job_title()
    {
        return $this->job_title;
    }

    /**
     * @return string
     */
    public function get_address()
    {
        return $this->address;
    }

    /**
     * @return DateTime
     */
    public function get_start_date()
    {
        return $this->start_date;
    }

    /**
     * @return DateTime
     */
    public function get_end_date()
    {
        return $this->end_date;
    }

    /**
     * @return bool
     */
    public function is_offsite()
    {
        return $this->offsite;
    }

    /**
     * @return int
     */
    public function get_total_hours()
    {
        return $this->total_hours;
    }

    /**
     * @return float
     */
    public function get_pay_rate()
    {
        return $this->pay_rate;
    }
}