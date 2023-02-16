<?php

class ModelAthlete extends Model
{
    function __construct()
    {
        $this->db = new Database();
        $this->tableName = 'athletes';
    }

    public function getData(): array
    {
        $conn = $this->db->getConnection();
        return $conn->query('SELECT * FROM ' . $this->tableName . ' ORDER BY `athlete_name`')->fetchAll();
    }

    public function create($name): void
    {
        $conn = $this->db->getConnection();
        $sth = $conn->prepare('INSERT INTO ' . $this->tableName . ' SET athlete_name=:athlete_name');
        $sth->bindParam(':athlete_name', $name);
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
