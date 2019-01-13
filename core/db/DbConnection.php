<?php
/**
 * Created by PhpStorm.
 * User: Aaron
 * Date: 1/13/2019
 * Time: 1:43 AM
 */

class DbConnection
{
    private $connection;

    public function __construct()
    {
        static $host = 'localhost';
        static $user = 'aceads';
        static $pswd = 'theQuick32';
        static $db_name = 'pu_interns';

        $this->connection = mysqli_connect($host, $user, $pswd, $db_name, 3306);
    }

    /**
     * @param string $query
     * @param array $values
     * @return bool|mysqli_result
     * @throws Exception
     */
    public function query($query, $values = null)
    {
        $stmt = $this->connection->prepare($query);

        if (!$stmt)
            throw new Exception($this->connection->error);

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
     * @param string $table
     * @param array $columns
     * @param array $params
     * @return bool|mysqli_result
     * @throws Exception
     */
    public function select($table, $columns, $params = null)
    {
        list($params_clause, $params_values) = self::get_params_clause($params);
        $query = sprintf('SELECT %s FROM %s', implode(',', $columns), $table);

        if (!empty($params_clause)) {
            $query .= ' WHERE ' . $params_clause;
            return self::query($query, $params_values);
        } else {
            return self::query($query);
        }
    }

    /**
     * @param array $params
     * @return array
     */
    private static function get_params_clause($params)
    {
        $clauses = [];
        $values = [];

        while ($p = current($params)) {
            $clauses[] = sprintf('(%s)', self::get_key_values(key($params), $p, $values));
            next($params);
        }

        return [implode(' AND ', $clauses), $values];
    }

    /**
     * @param string $key
     * @param mixed $item
     * @param array $values
     * @return string
     */
    private static function get_key_values($key, $item, &$values)
    {
        if (is_array($item)) {
            foreach ($item as $i) {
                $values[] = $i;
            }

            $question_marks = array_fill(0, sizeof($item), '?');
            return sprintf('`%s` IN (%s)', $key, implode(',', $question_marks));
        } else {
            $values[] = $item;
            return sprintf('`%s`=?', $key);
        }
    }

    public function close()
    {
        $this->connection->close();
    }
}