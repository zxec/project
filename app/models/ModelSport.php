<?php

class ModelSport extends Model
{

    function __construct()
    {
        //$this->db = new Database();
        $this->tableName = 'sports';
    }

    public function hasRecord($name): int
    {
        // $conn = $this->db->getConnection();
        // $sth = $conn->prepare('SELECT * FROM ' . $this->tableName . ' WHERE sport_name=:sport_name');
        // $sth->bindParam(':sport_name', $name);
        // $sth->execute();
        // return $sth->rowCount();
        return ORM::forTable($this->tableName)->where('sport_name', $name)->findOne();
    }

    public function create($name): void
    {
        if (!$this->hasRecord($name)) {
            // $conn = $this->db->getConnection();
            // $sth = $conn->prepare('INSERT INTO ' . $this->tableName . ' SET sport_name=:sport_name');
            // $sth->bindParam(':sport_name', $name);
            // $sth->execute();
            $country = ORM::forTable($this->tableName)->create();
            $country->sport_name = $name;
            $country->save();
        }
    }

    public function delete($id): void
    {
        // $conn = $this->db->getConnection();
        // $sth = $conn->prepare('DELETE FROM ' . $this->tableName . ' WHERE id=:id');
        // $sth->bindParam(':id', $id, PDO::PARAM_INT);
        // $sth->execute();
        $sport = ORM::forTable($this->tableName)->findOne($id);
        $sport->delete();
    }
}
