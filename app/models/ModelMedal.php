<?php

class ModelMedal extends Model
{

    function __construct()
    {
        $this->db = new Database();
        $this->tableName = 'medals';
    }

    public function getData(): array
    {
        $conn = $this->db->getConnection();
        $data['medals'] = $conn->query('SELECT * FROM view_medals')->fetchAll();
        $data['countries'] = $conn->query('SELECT * FROM `countries` ORDER BY `country_name`')->fetchAll();
        $data['medal_types'] = $conn->query('SELECT * FROM `medal_types` ORDER BY `medal_type`')->fetchAll();
        $data['athletes'] = $conn->query('SELECT * FROM `athletes` ORDER BY `athlete_name`')->fetchAll();
        $data['sports'] = $conn->query('SELECT * FROM `sports` ORDER BY `sport_name`')->fetchAll();

        return $data;
    }

    public function create($medalType, $countryId, $sportId, $athletes): void
    {
        $conn = $this->db->getConnection();

        $sth = $conn->prepare('INSERT INTO ' . $this->tableName . ' 
        SET medal_type_id=:medal_type, 
        country_id=:countryId, 
        sport_id=:sportId,
        athlete_name1=:athletes1,
        athlete_name2=:athletes2,
        athlete_name3=:athletes3,
        athlete_name4=:athletes4,
        athlete_name5=:athletes5');

        $sth->bindParam(':medal_type', $medalType, PDO::PARAM_INT);
        $sth->bindParam(':countryId', $countryId, PDO::PARAM_INT);
        $sth->bindParam(':sportId', $sportId, PDO::PARAM_INT);
        $sth->bindParam(':athletes1', $athletes[0], PDO::PARAM_INT);
        $sth->bindParam(':athletes2', $athletes[1], PDO::PARAM_INT);
        $sth->bindParam(':athletes3', $athletes[2], PDO::PARAM_INT);
        $sth->bindParam(':athletes4', $athletes[3], PDO::PARAM_INT);
        $sth->bindParam(':athletes5', $athletes[4], PDO::PARAM_INT);
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
