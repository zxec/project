<?php

class ModelCountryMedal extends Model
{

    function __construct()
    {
        $this->tableName = 'medals';
    }

    public function getData($params = null): array
    {
        if (!empty($params[1])) {
            return ORM::forTable($this->tableName)
                ->selectMany('medal_types.medal_type', 'sports.sport_name', 'athletes.athlete_name')
                ->join('countries', ['countries.id', '=', 'medals.country_id'])
                ->join('sports', ['sports.id', '=', 'medals.sport_id'])
                ->join('medal_types', ['medal_types.id', '=', 'medals.medal_type_id'])
                ->join('medal_athletes', ['medal_athletes.medal_id', '=', 'medals.id'])
                ->join('athletes', ['athletes.id', '=', 'medal_athletes.athlete_id'])
                ->where(['country_id' => $params[0], 'medal_type_id' => $params[1]])
                ->findArray();
        }
        return ORM::forTable($this->tableName)
            ->selectMany('medal_types.medal_type', 'sports.sport_name', 'athletes.athlete_name')
            ->join('countries', ['countries.id', '=', 'medals.country_id'])
            ->join('sports', ['sports.id', '=', 'medals.sport_id'])
            ->join('medal_types', ['medal_types.id', '=', 'medals.medal_type_id'])
            ->join('medal_athletes', ['medal_athletes.medal_id', '=', 'medals.id'])
            ->join('athletes', ['athletes.id', '=', 'medal_athletes.athlete_id'])
            ->where(['country_id' => $params[0]])
            ->findArray();
    }
}
