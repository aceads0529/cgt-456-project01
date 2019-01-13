<?php

abstract class EntityService
{
    private $table;
    private $db;

    /**
     * EntityService constructor.
     * @param string $table
     */
    public function __construct($table)
    {
        $this->table = $table;
        $this->db = new DbConnection();
    }

    public abstract function sanitize_entity(&$data);

    public abstract function validate_entity($data);

    public abstract function to_assoc($obj);

    public abstract function from_assoc($obj);

    public final function select($params)
    {
        try {
            $this->request_permission(AuthRequest::SELECT, $params);

            $result = $this->db->select($this->table, ['*'], $params);
            $items = [];

            while ($row = $result->fetch_assoc()) {
                $items[] = $this->from_assoc($row);
            }

            return $items;
        } catch (Exception $e) {
            return false;
        }
    }

    protected final function create($data)
    {
        $this->sanitize_entity($data);

        if ($this->validate_entity($data)) {
            $keys = array_keys($data);
            $values = array_values($data);
            $question_marks = array_fill(0, sizeof($data), '?');

            $query = sprintf('INSERT INTO %s (%s) VALUES (%s)', $this->table, $question_marks, $question_marks);

            try {
                $this->db->query($query, array_merge($keys, $values));
                return $this->from_assoc($data);
            } catch (Exception $e) {
                return false;
            }
        }
    }

    /**
     * @param int $request
     * @param array $params
     * @throws Exception
     */
    public final function request_permission($request, $params)
    {
        if (!$this->on_request_permission($request, $params))
            throw new Exception('Permission denied');
    }

    /**
     * @param int $request
     * @param array $params
     * @return bool
     */
    protected function on_request_permission($request, $params)
    {
        return true;
    }
}