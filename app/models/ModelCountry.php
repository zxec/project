<?php

class ModelCountry extends Model
{

    function __construct()
    {
        //$this->db = new Database();
        $this->tableName = 'countries';
    }

    public function getDataCountry($id): ORM
    {
        // $conn = $this->db->getConnection();
        // $sth = $conn->prepare('SELECT * FROM ' . $this->tableName . ' WHERE id=:id');
        // $sth->bindParam(':id', $id, PDO::PARAM_INT);
        // $sth->execute();

        // return $sth->fetchAll();

        return ORM::forTable($this->tableName)->findOne($id);
    }

    public function hasRecord($name): bool
    {
        // $conn = $this->db->getConnection();
        // $sth = $conn->prepare('SELECT * FROM ' . $this->tableName . ' WHERE country_name=:country_name');
        // $sth->bindParam(':country_name', $name);
        // $sth->execute();
        // return $sth->rowCount();

        return ORM::forTable($this->tableName)->where('country_name', $name)->findOne();
    }

    public function create($name): void
    {
        if (!$this->hasRecord($name)) {
            // $conn = $this->db->getConnection();
            // $sth = $conn->prepare('INSERT INTO ' . $this->tableName . ' SET country_name=:country_name');
            // $sth->bindParam(':country_name', $name);
            // $sth->execute();
            $country = ORM::forTable($this->tableName)->create();
            $country->country_name = $name;
            $country->save();
        }
    }

    public function delete($id): void
    {
        // $conn = $this->db->getConnection();
        // $sth = $conn->prepare('DELETE FROM ' . $this->tableName . ' WHERE `id`=:id');
        // $sth->bindParam(':id', $id, PDO::PARAM_INT);
        // $sth->execute();
        $country = ORM::forTable($this->tableName)->findOne($id);
        $country->delete();
    }
}
