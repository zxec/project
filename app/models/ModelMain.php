<?php

class ModelMain extends Model
{

  function __construct()
  {
    //$this->db = new Database();
    $this->tableName = 'medals';
  }

  public function getData(): array
  {
    // $conn = $this->db->getConnection();
    // $data = $conn->query('SELECT ROW_NUMBER() OVER (ORDER BY sum(`medals`.`medal_type_id` = 1) desc, sum(`medals`.`medal_type_id` = 2) desc, sum(`medals`.`medal_type_id` = 3) desc) `place`,
    // `countries`.`id` `country_id`,
    // `countries`.`country_name`,
    // sum(`medals`.`medal_type_id` = 1) `g`,       
    // sum(`medals`.`medal_type_id` = 2) `a`,
    // sum(`medals`.`medal_type_id` = 3) `b`,
    // count(*) `all`
    // FROM `medals`
    // join `countries` on `countries`.`id` = `medals`.`country_id`
    // group by `countries`.`id`')->fetchAll();

    // return $data;

    // $data = $conn->query('SELECT ROW_NUMBER() OVER (ORDER BY sum(`medals`.`medal_type_id` = 1) desc, 
    // sum(`medals`.`medal_type_id` = 2) desc, sum(`medals`.`medal_type_id` = 3) desc) `place`,
    // `countries`.`id` `country_id`,
    // `countries`.`country_name`,
    // sum(`medals`.`medal_type_id` = 1) `g`,       
    // sum(`medals`.`medal_type_id` = 2) `a`,
    // sum(`medals`.`medal_type_id` = 3) `b`,
    // count(*) `all`
    // FROM `medals`
    // join `countries` on `countries`.`id` = `medals`.`country_id`
    // group by `countries`.`id`')->fetchAll();

    // return ORM::forTable($this->tableName)
    //   ->raw_query('SELECT ROW_NUMBER() OVER (ORDER BY sum(medals.medal_type_id = 1) desc, 
    //   sum(medals.medal_type_id = 2) desc, sum(medals.medal_type_id = 3) desc) place,
    //   medals.country_id,
    //   countries.country_name,
    //   sum(medals.medal_type_id = 1) g,       
    //   sum(medals.medal_type_id = 2) a,
    //   sum(medals.medal_type_id = 3) b,
    //   count(*) al')
    //   ->join('countries', array('countries.id', '=', 'medals.country_id'))
    //   ->groupBy('countries.id')
    //   ->find_many();

    return ORM::forTable($this->tableName)
      ->raw_query('SELECT ROW_NUMBER() OVER (ORDER BY sum(`medals`.`medal_type_id` = :id1) desc, 
      sum(`medals`.`medal_type_id` = :id2) desc, sum(`medals`.`medal_type_id` = :id3) desc) `place`,
      `countries`.`id` `country_id`,
      `countries`.`country_name`,
      sum(`medals`.`medal_type_id` = :id1) `g`,       
      sum(`medals`.`medal_type_id` = :id2) `a`,
      sum(`medals`.`medal_type_id` = :id3) `b`,
      count(*) `all`
      FROM `medals`
      join `countries` on `countries`.`id` = `medals`.`country_id`
      group by `countries`.`id`', array('id1' => 1, 'id2' => 2, 'id3' => 3))
      ->find_many();
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
      'all_asc' => '`all`',
      'all_desc' => '`all` DESC',
    ];

    if (array_key_exists($sort, $sortList)) {
      $sortSql = $sortList[$sort];
    } else {
      $sortSql = reset($sortList);
    }

    // $conn = $this->db->getConnection();
    // return $conn->query('SELECT ROW_NUMBER() OVER (ORDER BY sum(`medals`.`medal_type_id` = 1) desc, sum(`medals`.`medal_type_id` = 2) desc, sum(`medals`.`medal_type_id` = 3) desc) `place`,
    // `countries`.`id` `country_id`,
    // `countries`.`country_name`,
    // sum(`medals`.`medal_type_id` = 1) `g`,       
    // sum(`medals`.`medal_type_id` = 2) `a`,
    // sum(`medals`.`medal_type_id` = 3) `b`,
    // count(*) `all`
    // FROM `medals`
    // join `countries` on `countries`.`id` = `medals`.`country_id`
    // group by `countries`.`id` ORDER BY ' . $sortSql)->fetchAll();

    // return ORM::forTable($this->tableName)
    //   ->raw_query('SELECT ROW_NUMBER() OVER (ORDER BY sum(medals.medal_type_id = 1) desc, 
    // sum(medals.medal_type_id = 2) desc, sum(medals.medal_type_id = 3) desc) place,
    // medals.country_id,
    // countries.country_name,
    // sum(medals.medal_type_id = :id1) g,       
    // sum(medals.medal_type_id = :id2) a,
    // sum(medals.medal_type_id = :id3) b,
    // count(*) al', array('id1' => 1, 'id2' => 2, 'id3' => 3))
    //   ->join('countries', array('countries.id', '=', 'medals.country_id'))
    //   ->groupBy('countries.id')
    //   ->rawQuery('ORDER BY :sort', array('sort' => $sortSql))
    //   ->find_many();

    return ORM::forTable($this->tableName)
      ->raw_query('SELECT ROW_NUMBER() OVER (ORDER BY sum(`medals`.`medal_type_id` = :id1) desc, 
    sum(`medals`.`medal_type_id` = :id2) desc, sum(`medals`.`medal_type_id` = :id3) desc) `place`,
    `countries`.`id` `country_id`,
    `countries`.`country_name`,
    sum(`medals`.`medal_type_id` = :id1) `g`,       
    sum(`medals`.`medal_type_id` = :id2) `a`,
    sum(`medals`.`medal_type_id` = :id3) `b`,
    count(*) `all`
    FROM `medals`
    join `countries` on `countries`.`id` = `medals`.`country_id`
    group by `countries`.`id` order by :sort', array('id1' => 1, 'id2' => 2, 'id3' => 3, 'sort' => $sortSql))
      ->find_many();
  }
}
