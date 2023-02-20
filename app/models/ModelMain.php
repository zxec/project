<?php

class ModelMain extends Model
{

  function __construct()
  {
    $this->db = new Database();
    $this->tableName = 'view_competitions';
  }

  public function getData(): array
  {
    $conn = $this->db->getConnection();
    $data = $conn->query('SELECT ROW_NUMBER() OVER () `place`,
    `countries`.`id` `country_id`,
    `countries`.`country_name`,
    sum(`medals`.`medal_type_id` = 1) `g`,       
    sum(`medals`.`medal_type_id` = 2) `a`,
    sum(`medals`.`medal_type_id` = 3) `b`,
    count(*) `all`
    FROM `medals`
    join `countries` on `countries`.`id` = `medals`.`country_id`
    group by `countries`.`id`')->fetchAll();

    return $data;
  }

  public function getDataSort($sort): array
  {
    $sortList = [
      'place_asc' => '`place`',
      'place_desc' => '`place` DESC',
      'country_name_asc' => '`country_name`',
      'country_name_desc' => '`country_name` DESC',
      'g_asc' => '`g`',
      'g_desc' => '`g` DESC',
      'a_asc' => '`a`',
      'a_desc' => '`a` DESC',
      'b_asc' => '`b`',
      'b_desc' => '`b` DESC',
      'al_asc' => '`al`',
      'al_desc' => '`al` DESC',
    ];

    if (array_key_exists($sort, $sortList)) {
      $sortSql = $sortList[$sort];
    } else {
      $sortSql = reset($sortList);
    }

    $conn = $this->db->getConnection();
    return $conn->query('SELECT ROW_NUMBER() OVER () `place`,
    `countries`.`id` `country_id`,
    `countries`.`country_name`,
    sum(`medals`.`medal_type_id` = 1) `g`,       
    sum(`medals`.`medal_type_id` = 2) `a`,
    sum(`medals`.`medal_type_id` = 3) `b`,
    count(*) `all`
    FROM `medals`
    join `countries` on `countries`.`id` = `medals`.`country_id`
    group by `countries`.`id` ORDER BY ' . $sortSql)->fetchAll();
  }
}
