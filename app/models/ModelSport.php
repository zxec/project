<?php

class ModelSport extends Model
{

    function __construct()
    {
        $this->db = new Database();
        $this->tableName = 'sports';
    }

    public function getData(): array
    {
        $conn = $this->db->getConnection();
        return $conn->query('SELECT * FROM ' . $this->tableName . ' ORDER BY `sport_name`')->fetchAll();
    }

    public function create($name): void
    {
        $conn = $this->db->getConnection();
        $sth = $conn->prepare('INSERT INTO ' . $this->tableName . ' SET sport_name=:sport_name');
        $sth->bindParam(':sport_name', $name);
        $sth->execute();
    }

    public function delete($id): void
    {
        $conn = $this->db->getConnection();
        $sth = $conn->prepare('DELETE FROM ' . $this->tableName . ' WHERE id=:id');
        $sth->bindParam(':id', $id, PDO::PARAM_INT);
        $sth->execute();
    }
}
