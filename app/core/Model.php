<?php

abstract class Model
{
    protected Database $db;
    protected string $tableName;

    public function getData(): array
    {
        $conn = $this->db->getConnection();
        return $conn->query('SELECT * FROM ' . $this->tableName)->fetchAll();
    }
}