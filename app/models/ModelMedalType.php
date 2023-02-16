<?php

class ModelMedalType extends Model
{

    function __construct()
    {
        $this->db = new Database();
        $this->tableName = 'medal_types';
    }

    public function getData(): array
    {
        $conn = $this->db->getConnection();
        return $conn->query('SELECT * FROM ' . $this->tableName)->fetchAll();
    }
}
