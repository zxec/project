<?php

class ModelSport extends Model
{

    function __construct()
    {
        $this->db = new Database();
        $this->tableName = 'sports';
    }

    public function hasRecord($name): int
    {
        $conn = $this->db->getConnection();
        $sth = $conn->prepare('SELECT * FROM ' . $this->tableName . ' WHERE sport_name=:sport_name');
        $sth->bindParam(':sport_name', $name);
        $sth->execute();
        return $sth->rowCount();
    }

    public function create($name): void
    {
        if (!$this->hasRecord($name)) {
            $conn = $this->db->getConnection();
            $sth = $conn->prepare('INSERT INTO ' . $this->tableName . ' SET sport_name=:sport_name');
            $sth->bindParam(':sport_name', $name);
            $sth->execute();
        }
    }

    public function delete($id): void
    {
        $conn = $this->db->getConnection();
        $sth = $conn->prepare('DELETE FROM ' . $this->tableName . ' WHERE id=:id');
        $sth->bindParam(':id', $id, PDO::PARAM_INT);
        $sth->execute();
    }
}
