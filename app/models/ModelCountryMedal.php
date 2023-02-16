<?php

class ModelCountryMedal extends Model
{

    function __construct()
    {
        $this->db = new Database();
        $this->tableName = 'view_medals';
    }

    public function getData($params = null): array
    {
        $conn = $this->db->getConnection();

        $query = 'SELECT * FROM ' . $this->tableName;
        if (!empty($params)) {
            $query .= ' WHERE country_id =' . $params[0];
            if (!empty($params[1])) {
                $query .= ' AND medal_type_id = ' . $params[1];
            }
        }

        return $conn->query($query)->fetchAll();
    }
}
