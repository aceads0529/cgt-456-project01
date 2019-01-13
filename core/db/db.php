<?php

function db_connect()
{
    static $host = 'localhost';
    static $user = 'aceads';
    static $pswd = 'theQuick32';
    static $db_name = 'pu_interns';

    return mysqli_connect($host, $user, $pswd, $db_name, 3306);
}

/**
 * @param mysqli $db
 * @param string $query
 * @param array $values
 * @return bool|mysqli_result
 * @throws Exception
 */
function db_query($db, $query, $values = null)
{
    $stmt = $db->prepare($query);

    if (!$stmt)
        throw new Exception($db->error);

    if ($values) {
        $typeStr = '';

        foreach ($values as &$v) {
            if (is_integer($v)) {
                $typeStr .= 'i';
            } elseif (is_bool($v)) {
                $typeStr .= 'i';
                $v = $v ? 1 : 0;
            } elseif (is_double($v)) {
                $typeStr .= 'd';
            } elseif (is_string($v)) {
                $typeStr .= 's';
            } elseif (is_object($v)) {
                $typeStr .= 's';
                $v = (string)$v;
            }
        }

        array_unshift($values, $typeStr);
        call_user_func_array(array($stmt, 'bind_param'), $values);

    }

    $stmt->execute();
    return $stmt->get_result();
}

/**
 * @param $query
 * @param array $values
 * @return bool|mysqli_result
 * @throws Exception
 */
function db_query_close($query, $values = null)
{
    $db = db_connect();
    $result = db_query($db, $query, $values);
    $db->close();
    return $result;
}

/**
 * @param mysqli $db
 * @param string $table
 * @param string $key
 * @param mixed $value
 * @return bool|mysqli_result
 * @throws Exception
 */
function db_select_by($db, $table, $key, $value)
{
    return db_query($db, sprintf('SELECT * FROM %s WHERE %s = ?', $table, $key), [$value]);
}

function db_timestamp()
{
    return date("Y-m-d H:i:s");
}

function create_comma_list($items, $prefix = null)
{
    if ($prefix) {
        $prefix = trim($prefix) . '.';

        foreach ($items as &$column) {
            $column = $prefix . $column;
        }
    }

    return implode(', ', $items);
}