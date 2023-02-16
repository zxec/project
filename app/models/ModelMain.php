<?php

class ModelMain extends Model
{

    function __construct()
    {
        $this->db = new Database();
        $this->tableName = 'view_competitions';
    }

    public function getData(): array
    {
        $conn = $this->db->getConnection();
        return $conn->query('SELECT * FROM ' . $this->tableName)->fetchAll();
    }

    public function getDataSort($sort): array
    {
        $sortList = array(
            'place_asc' => '`place`',
            'place_desc' => '`place` DESC',
            'country_name_asc' => '`country_name`',
            'country_name_desc' => '`country_name` DESC',
            'g_asc' => '`g`',
            'g_desc' => '`g` DESC',
            'a_asc' => '`a`',
            'a_desc' => '`a` DESC',
            'b_asc' => '`b`',
            'b_desc' => '`b` DESC',
            'al_asc' => '`al`',
            'al_desc' => '`al` DESC',
        );

        if (array_key_exists($sort, $sortList)) {
            $sortSql = $sortList[$sort];
        } else {
            $sortSql = reset($sortList);
        }

        $conn = $this->db->getConnection();
        return $conn->query('SELECT * FROM ' . $this->tableName . ' ORDER BY ' . $sortSql)->fetchAll();
    }
}
