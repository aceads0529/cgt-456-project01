<?php

abstract class AccountType
{
    const NONE = 0;
    const ADMIN = 1;
    const ADVISOR = 2;
    const SUPERVISOR = 3;
    const STUDENT = 4;

    /**
     * @param int $t1
     * @param int $t2
     * @return int
     */
    public static function compare($t1, $t2)
    {
        if ($t1 == AccountType::SUPERVISOR)
            $t1 = AccountType::STUDENT;
        if ($t2 == AccountType::SUPERVISOR)
            $t2 = AccountType::STUDENT;

        $c = $t2 - $t1;
        return ($c > 0) - ($c < 0);
    }

    /**
     * @param int $a
     * @return string
     */
    public static function to_string($a)
    {
        switch ($a) {
            case AccountType::NONE:
            default:
                return 'none';
            case AccountType::STUDENT:
                return 'student';
            case AccountType::SUPERVISOR:
                return 'supervisor';
            case AccountType::ADVISOR:
                return 'advisor';
            case AccountType::ADMIN:
                return 'admin';
        }
    }

    /**
     * @param string $s
     * @return int
     */
    public static function from_string($s)
    {
        $s = trim(strtolower($s));

        switch ($s) {
            case 'none':
            default:
                return AccountType::NONE;
            case 'student':
                return AccountType::STUDENT;
            case 'supervisor':
                return AccountType::SUPERVISOR;
            case 'advisor':
                return AccountType::ADVISOR;
            case 'admin':
                return AccountType::ADMIN;
        }
    }
}