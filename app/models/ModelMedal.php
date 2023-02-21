<?php

class ModelMedal extends Model
{

    function __construct()
    {
        //$this->db = new Database();
        $this->tableName = 'medals';
    }

    public function getData(): array
    {
        // $conn = $this->db->getConnection();
        // $data['medals'] = $conn->query('SELECT `md`.`id` AS `id`,
        // `ctrs`.`id` AS `country_id`,
        // `ctrs`.`country_name` AS `country_name`,
        // `mdtype`.`id` AS `medal_type_id`,
        // `sprts`.`sport_name` AS `sport_name`,
        // `mdtype`.`medal_type` AS `medal_type`,
        // `ath`.`athlete_name`
        // FROM `medals` `md`
        // left join `countries` `ctrs` on `ctrs`.`id` = `md`.`country_id`
        // left join `sports` `sprts` on `sprts`.`id` = `md`.`sport_id`
        // left join `medal_types` `mdtype` on `mdtype`.`id` = `md`.`medal_type_id`
        // left join `medal_athletes` `md_ath` on `md_ath`.`medal_id` = `md`.`id`
        // left join `athletes` `ath` on `md_ath`.`athlete_id` =  `ath`.`id`')->fetchAll();
        $data['medals'] = ORM::forTable($this->tableName)
            ->selectMany('medals.id', 'medals.country_id', 'countries.country_name', 'medals.medal_type_id', 'sports.sport_name', 'medal_types.medal_type', 'athletes.athlete_name')
            ->leftOuterJoin('countries', array('countries.id', '=', 'medals.country_id'))
            ->leftOuterJoin('sports', array('sports.id', '=', 'medals.sport_id'))
            ->leftOuterJoin('medal_types', array('medal_types.id', '=', 'medals.medal_type_id'))
            ->leftOuterJoin('medal_athletes', array('medal_athletes.medal_id', '=', 'medals.id'))
            ->leftOuterJoin('athletes', array('athletes.id', '=', 'medal_athletes.athlete_id'))
            ->find_many();

        $data['countries'] = ORM::forTable('countries')->orderByAsc('country_name');
        $data['medal_types'] = ORM::forTable('medal_types')->orderByAsc('medal_type');
        $data['athletes'] = ORM::forTable('athletes')->orderByAsc('athlete_name');
        $data['sports'] = ORM::forTable('sports')->orderByAsc('sport_name');

        // $data['countries'] = $conn->query('SELECT * FROM `countries` ORDER BY `country_name`')->fetchAll();
        // $data['medal_types'] = $conn->query('SELECT * FROM `medal_types` ORDER BY `medal_type`')->fetchAll();
        // $data['athletes'] = $conn->query('SELECT * FROM `athletes` ORDER BY `athlete_name`')->fetchAll();
        // $data['sports'] = $conn->query('SELECT * FROM `sports` ORDER BY `sport_name`')->fetchAll();

        return $data;
    }

    public function create($medalType = null, $countryId = null, $sportId = null, $athletes = null): void
    {
        // $conn = $this->db->getConnection();

        // $sth = $conn->prepare('INSERT INTO ' . $this->tableName . ' 
        // SET medal_type_id=:medal_type, 
        // country_id=:countryId, 
        // sport_id=:sportId');

        // $sth->bindParam(':medal_type', $medalType, PDO::PARAM_INT);
        // $sth->bindParam(':countryId', $countryId, PDO::PARAM_INT);
        // $sth->bindParam(':sportId', $sportId, PDO::PARAM_INT);
        // $sth->execute();

        $medal = ORM::forTable($this->tableName)->create();
        $medal->medal_type_id = $medalType;
        $medal->country_id = $countryId;
        $medal->sport_id = $sportId;
        $medal->save();

        //$insertId = $conn->lastInsertId();

        // $sth = $conn->prepare('INSERT INTO `medal_athletes` 
        // SET medal_id=:medal_id, 
        // athlete_id=:athlete_id');

        $athletes = array_diff($athletes, array('', NULL));

        foreach ($athletes as $athlete) {
            $medalAthlete = ORM::forTable('medal_athletes')->create();
            $medalAthlete->medal_id = $medal->id();
            $medalAthlete->athlete_id = $athlete;
            $medalAthlete->save();
        }

        // $insertId = $conn->lastInsertId();

        // $sth = $conn->prepare('INSERT INTO `medal_athletes` 
        // SET medal_id=:medal_id, 
        // athlete_id=:athlete_id');

        // $athletes = array_diff($athletes, array('', NULL));

        // foreach ($athletes as $athlete) {
        //     $sth->bindParam(':medal_id', $insertId, PDO::PARAM_INT);
        //     $sth->bindParam(':athlete_id', $athlete, PDO::PARAM_INT);
        //     $sth->execute();
        // }
    }

    public function delete($id): void
    {
        // $conn = $this->db->getConnection();
        // $sth = $conn->prepare('DELETE FROM ' . $this->tableName . ' WHERE id=:id AND');
        // $sth->bindParam(':id', $id, PDO::PARAM_INT);
        // $sth->execute();
        $country = ORM::forTable($this->tableName)->findOne($id);
        $country->delete();
    }
}
