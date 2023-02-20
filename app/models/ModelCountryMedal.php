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

        $query = 'SELECT `md`.`id` AS `id`,
        `ctrs`.`id` AS `country_id`,
        `ctrs`.`country_name` AS `country_name`,
        `mdtype`.`id` AS `medal_type_id`,
        `sprts`.`sport_name` AS `sport_name`,
        `mdtype`.`medal_type` AS `medal_type`,
        `ath`.`athlete_name`
        FROM `medals` `md`
        join `countries` `ctrs` on `ctrs`.`id` = `md`.`country_id`
        join `sports` `sprts` on `sprts`.`id` = `md`.`sport_id`
        join `medal_types` `mdtype` on `mdtype`.`id` = `md`.`medal_type_id`
        left join `medal_athletes` `md_ath` on `md_ath`.`medal_id` = `md`.`id`
        left join `athletes` `ath` on `md_ath`.`athlete_id` =  `ath`.`id`';
        if (!empty($params)) {
            $query .= ' WHERE country_id =' . $params[0];
            if (!empty($params[1])) {
                $query .= ' AND medal_type_id = ' . $params[1];
            }
        }

        return $conn->query($query)->fetchAll();
    }
}
