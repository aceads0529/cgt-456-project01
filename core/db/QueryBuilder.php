<?php

class QueryBuilder
{
    public static function select_from_params($table, $params, $columns = null)
    {
        $columns = $columns ? implode(',', $columns) : '*';
        return 'SELECT ' . $columns . ' FROM ' . $table . ' ' . self::where_clause_from_params($params);
    }

    public static function where_clause_from_params($params)
    {
        if (!$params || sizeof($params) == 0) {
            return '';
        } else {
            $clauses = [];
            while ($item = current($params)) {
                $clauses[] .= self::wrap(self::key_value_str(key($params), $item), '()');
                next($params);
            }

            return 'WHERE ' . implode(' AND ', $clauses);
        }
    }

    private static function key_value_str($key, $value)
    {
        if (is_array($value)) {
            return self::wrap($key, '``') . ' IN (' . implode(',', $value) . ')';
        } else {
            return self::wrap($key, '``') . '=' . (string)$value;
        }
    }

    private static function wrap($str, $ends)
    {
        return $ends[0] . $str . $ends[1];
    }
}