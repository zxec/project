<?php

class ModelCountryMedal extends Model
{

    function __construct()
    {
        //$this->db = new Database();
        $this->tableName = 'medals';
    }

    public function getData($params = null): array
    {
        // $conn = $this->db->getConnection();

        // $query = 'SELECT `md`.`id` AS `id`,
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
        // left join `athletes` `ath` on `md_ath`.`athlete_id` =  `ath`.`id`';
        // if (!empty($params)) {
        //     $query .= ' WHERE country_id =' . $params[0];
        //     if (!empty($params[1])) {
        //         $query .= ' AND medal_type_id = ' . $params[1];
        //     }
        // }

        // return $conn->query($query)->fetchAll();
        //$results = ORM::for_table('person')->join('person_profile', array('person.id', '=', 'person_profile.person_id'))->find_many();

        //return ORM::for_table($this->tableName)->selectMany(array('id' => 'medals.id', 'country_id' => 'countries.id', 'country_name' => 'countries.country_name', 'medal_type_id' => 'medal_types.id', 'sport_name' => 'sports.sport_name', 'medal_type' => 'medal_types.medal_type', 'athletes'.'athlete_name' => 'athlete_name'))->leftJoin('countries', array('person.id', '=', 'person_profile.person_id'))->find_many();

        return ORM::forTable($this->tableName)
            ->selectMany('medals.id', 'medals.country_id', 'countries.country_name', 'medals.medal_type_id', 'sports.sport_name', 'medal_types.medal_type', 'athletes.athlete_name')
            ->join('countries', array('countries.id', '=', 'medals.country_id'))
            ->join('sports', array('sports.id', '=', 'medals.sport_id'))
            ->join('medal_types', array('medal_types.id', '=', 'medals.medal_type_id'))
            ->join('medal_athletes', array('medal_athletes.medal_id', '=', 'medals.id'))
            ->join('athletes', array('athletes.id', '=', 'medal_athletes.athlete_id'))
            ->find_many();
    }
}
