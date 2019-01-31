<?php
/**
 * Created by PhpStorm.
 * User: Aaron
 * Date: 1/17/2019
 * Time: 2:33 PM
 */

class DataService
{
    const HOST = 'localhost';
    const USER = 'root';
    const PSWD = '';
    const DATABASE = 'cgt456_project01';

//    const HOST = 'www.aaroneads.com:3306';
//    const USER = 'admin';
//    const PSWD = 'Ascii32';
//    const DATABASE = 'cgt456_project01';

    /**
     * @return mysqli
     */
    private static function connect()
    {
        return new mysqli(self::HOST, self::USER, self::PSWD, self::DATABASE);
    }

    /**
     * @param string $query_str
     * @param array $values
     * @return bool|mysqli_result
     * @throws Exception
     */
    public static function query($query_str, $values)
    {
        $db = self::connect();
        $result = self::query_db($db, $query_str, $values);
        $db->close();
        return $result;
    }

    /**
     * @param mysqli $db
     * @param string $query_str
     * @param array $values
     * @return bool|mysqli_result
     * @throws Exception
     */
    private static function query_db($db, $query_str, $values)
    {
        $stmt = $db->prepare($query_str);

        if (!$stmt)
            throw new Exception($db->error);

        if ($values) {
            $type_str = '';

            foreach ($values as &$v) {
                if (is_integer($v)) {
                    $type_str .= 'i';
                } elseif (is_bool($v)) {
                    $type_str .= 'i';
                    $v = $v ? 1 : 0;
                } elseif (is_double($v)) {
                    $type_str .= 'd';
                } elseif (is_string($v)) {
                    $type_str .= 's';
                } elseif (is_object($v)) {
                    $type_str .= 's';
                    $v = (string)$v;
                }
            }

            array_unshift($values, $type_str);
            call_user_func_array(array($stmt, 'bind_param'), $values);

        }

        if (!$stmt->execute()) {
            throw new Exception($stmt->error);
        }

        $result = $stmt->get_result();
        return $result;
    }

    /**
     * @param string $table
     * @param array $params
     * @param string[] $columns
     * @return bool|mysqli_result
     * @throws Exception
     */
    public static function select($table, $params = null, $columns = null)
    {
        $table = self::enclose($table, '``');

        list($clause, $values) = self::get_select_params_clause($params);
        $columns = $columns ? self::comma($columns) : '*';

        $query_str = sprintf('SELECT %s FROM %s %s', $columns, $table, $clause);
        $result = self::query($query_str, $values);

        if (!$result || $result->num_rows == 0)
            return false;
        else
            return $result;
    }

    /**
     * @param string $table
     * @param string $table_assoc
     * @param string $key
     * @param string $foreign_key
     * @param array $params
     * @param string[] $columns
     * @return bool|mysqli_result
     * @throws Exception
     */
    public static function select_assoc($table, $table_assoc, $key, $foreign_key, $params = null, $columns = null)
    {
        $table_alias = 'A.';
        $assoc_alias = 'B.';

        $table = self::enclose($table, '``') . ' ' . $table_alias[0];
        $table_assoc = self::enclose($table_assoc, '``') . ' ' . $assoc_alias[0];

        $key = $assoc_alias . self::enclose($key, '``');
        $foreign_key = $table_alias . self::enclose($foreign_key, '``');

        list($clause, $values) = self::get_select_params_clause($params);
        $columns = $table_alias . ($columns ? self::comma($columns) : '*');

        $query_str = sprintf('SELECT %s FROM %s, %s %s AND %s = %s', $columns, $table, $table_assoc, $clause, $key, $foreign_key);
        $result = self::query($query_str, $values);

        if (!$result || $result->num_rows == 0)
            return false;
        else
            return $result;
    }

    /**
     * @param string $table
     * @param array $params
     * @return bool
     * @throws Exception
     */
    public static function exists($table, $params = null)
    {
        return (bool)self::select($table, $params);
    }

    /**
     * @param string $table
     * @param array $params
     * @param bool $ignore_err
     * @return mixed
     * @throws Exception
     */
    public static function insert($table, $params, $ignore_err = false)
    {
        $table = self::enclose($table, '``');
        list($clause, $values) = self::get_insert_params_clause($params);

        if ($ignore_err)
            $query_str = sprintf('INSERT INTO %s %s', $table, $clause);
        else
            $query_str = sprintf('INSERT IGNORE INTO %s %s', $table, $clause);

        $db = self::connect();
        self::query_db($db, $query_str, $values);

        $id = mysqli_insert_id($db);
        $num_rows = self::query_db($db, 'SELECT ROW_COUNT() AS rows', null)->fetch_assoc()['rows'];

        $db->close();

        if ($num_rows < 1)
            return false;
        else if ($id !== 0)
            return $id;
        else
            return true;
    }

    /**
     * @param string $table
     * @param array $update_params
     * @param array $select_params
     * @return bool|mysqli_result
     * @throws Exception
     */
    public static function update($table, $update_params, $select_params)
    {
        $table = self::enclose($table, '``');

        list($update_clause, $update_values) = self::get_update_params_clause($update_params);
        list($select_clause, $select_values) = self::get_select_params_clause($select_params);

        $query_str = sprintf('UPDATE %s SET %s %s', $table, $update_clause, $select_clause);
        $values = array_merge($update_values, $select_values);
        return self::query($query_str, $values);
    }

    /**
     * @param string $table
     * @param array $params
     * @return bool|mysqli_result
     * @throws Exception
     */
    public static function delete($table, $params)
    {
        $table = self::enclose($table, '``');

        list($clause, $values) = self::get_select_params_clause($params);
        $query_str = sprintf('DELETE FROM %s %s', $table, $clause);
        return self::query($query_str, $values);
    }

    /**
     * @param array $params
     * @return array
     */
    private static function get_select_params_clause($params)
    {
        if (!$params || sizeof($params) == 0) {
            return ['', null];
        } else {
            $clauses = [];
            $values = [];

            while ($item = current($params)) {
                if (!$item)
                    continue;

                $clauses[] = self::enclose(self::key_value_str(key($params), $item), '()');
                $values[] = $item;

                next($params);
            }

            if ($values)
                return ['WHERE ' . implode(' AND ', $clauses), $values];
            else
                return ['', null];
        }
    }

    /**
     * @param array $params
     * @return array
     */
    private static function get_insert_params_clause($params)
    {
        if (!$params || sizeof($params) == 0) {
            return ['', null];
        } else {
            $columns = [];
            $question_marks = [];

            $values = [];

            while (($item = current($params)) !== false) {
                if ($item != null) {
                    $columns[] = self::enclose(key($params), '``');
                    $values[] = $item;
                    $question_marks[] = '?';
                }

                next($params);
            }

            $columns = self::comma($columns);
            $question_marks = self::comma($question_marks);

            return [sprintf('(%s) VALUES (%s)', $columns, $question_marks), $values];
        }
    }

    /**
     * @param array $params
     * @return array
     */
    private static function get_update_params_clause($params)
    {
        if (!$params || sizeof($params) == 0) {
            return ['', null];
        } else {
            $clauses = [];
            $values = [];

            while ($item = current($params)) {
                if (is_array($item))
                    continue;

                $clauses[] = self::key_value_str(key($params), $item);
                $values[] = $item;

                next($params);
            }

            return [implode(', ', $clauses), $values];
        }
    }

    /**
     * @param string $key
     * @param mixed $value
     * @return string
     */
    private static function key_value_str($key, $value)
    {
        $key = self::enclose($key, '``');

        if (is_array($value)) {
            $question_marks = self::comma(array_fill(0, sizeof($value), '?'));
            return $key . ' IN ' . self::enclose($question_marks, '()');
        } else {
            return $key . ' = ?';
        }
    }

    private static function comma($array)
    {
        return implode(',', $array);
    }

    private static function enclose($str, $ends)
    {
        return $ends[0] . $str . $ends[1];
    }
}