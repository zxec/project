<?php

class ModelAthlete extends Model
{

    function __construct()
    {
        //$this->db = new Database();
        $this->tableName = 'athletes';
    }

    public function hasRecord($name): bool
    {
        //$conn = $this->db->getConnection();
        // $sth = $conn->prepare('SELECT * FROM ' . $this->tableName . ' WHERE athlete_name=:athlete_name');
        // $sth->bindParam(':athlete_name', $name);
        // $sth->execute();
        // return $sth->rowCount();

        return ORM::forTable($this->tableName)->where('athlete_name', $name)->findOne();
    }

    public function create($name): void
    {
        if (!$this->hasRecord($name)) {
            //$conn = $this->db->getConnection();
            // $sth = $conn->prepare('INSERT INTO ' . $this->tableName . ' SET athlete_name=:athlete_name');
            // $sth->bindParam(':athlete_name', $name);
            // $sth->execute();
            $athlete = ORM::forTable($this->tableName)->create();
            $athlete->athlete_name = $name;
            $athlete->save();
        }
    }

    public function delete($id): void
    {
        // $conn = $this->db->getConnection();
        // $sth = $conn->prepare('DELETE FROM ' . $this->tableName . ' WHERE id=:id');
        // $sth->bindParam(':id', $id, PDO::PARAM_INT);
        // $sth->execute();
        $athlete = ORM::forTable($this->tableName)->findOne($id);
        $athlete->delete();
    }
}
