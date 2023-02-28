<?php

class CountryMedalModel extends Model
{

    function __construct()
    {
        $this->tableName = 'medals';
    }

    public function getData($params = null): array
    {
        if (!empty($params[1])) {
            return ORM::forTable($this->tableName)
                ->selectMany(['type' => 'type_medals.name', 'sport_name' => 'sports.name', 'athlete_name' => 'athletes.name'])
                ->join('countries', ['countries.id', '=', 'medals.country_id'])
                ->join('sports', ['sports.id', '=', 'medals.sport_id'])
                ->join('type_medals', ['type_medals.id', '=', 'medals.type_medal_id'])
                ->join('athlete_medal', ['athlete_medal.medal_id', '=', 'medals.id'])
                ->join('athletes', ['athletes.id', '=', 'athlete_medal.athlete_id'])
                ->where(['country_id' => $params[0], 'type_medals_id' => $params[1]])
                ->findArray();
        }
        return ORM::forTable($this->tableName)
            ->selectMany(['type' => 'type_medals.name', 'sport_name' => 'sports.name', 'athlete_name' => 'athletes.name'])
            ->join('countries', ['countries.id', '=', 'medals.country_id'])
            ->join('sports', ['sports.id', '=', 'medals.sport_id'])
            ->join('type_medals', ['type_medals.id', '=', 'medals.type_medal_id'])
            ->join('athlete_medal', ['athlete_medal.medal_id', '=', 'medals.id'])
            ->join('athletes', ['athletes.id', '=', 'athlete_medal.athlete_id'])
            ->where(['country_id' => $params[0]])
            ->findArray();
    }
}
