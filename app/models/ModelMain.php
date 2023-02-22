<?php

class ModelMain extends Model
{

  function __construct()
  {
    $this->tableName = 'medals';
  }

  public function getData(): array
  {
    return ORM::forTable($this->tableName)
      ->selectManyExpr([
        'place' => 'ROW_NUMBER() OVER (ORDER BY sum(medals.medal_type_id = 1) desc, 
    sum(medals.medal_type_id = 2) desc, 
    sum(medals.medal_type_id = 3) desc)',
        'g' => 'sum(`medals`.`medal_type_id` = 1)',
        'a' => 'sum(`medals`.`medal_type_id` = 2)',
        'b' => 'sum(`medals`.`medal_type_id` = 3)',
        'all' => 'count(*)',
      ])
      ->selectMany([
        'country_id' => 'countries.id',
        'countries.country_name'
      ])
      ->join('countries', ['countries.id', '=', 'medals.country_id'])
      ->groupBy('countries.id')
      ->findArray();
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

    return ORM::forTable($this->tableName)
      ->selectManyExpr([
        'place' => 'ROW_NUMBER() OVER (ORDER BY sum(medals.medal_type_id = 1) desc, 
  sum(medals.medal_type_id = 2) desc, 
  sum(medals.medal_type_id = 3) desc)',
        'g' => 'sum(`medals`.`medal_type_id` = 1)',
        'a' => 'sum(`medals`.`medal_type_id` = 2)',
        'b' => 'sum(`medals`.`medal_type_id` = 3)',
        'all' => 'count(*)',
      ])
      ->selectMany([
        'country_id' => 'countries.id',
        'countries.country_name'
      ])
      ->join('countries', ['countries.id', '=', 'medals.country_id'])
      ->groupBy('countries.id')
      ->orderByExpr($sortSql)
      ->findArray();
  }
}
