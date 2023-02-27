<?php

class MedalModel extends CreateDeleteModel
{

    function __construct()
    {
        $this->tableName = 'medals';
    }

    public function getData(): array
    {
        ORM::getDb()->beginTransaction();
        $data['medals'] = ORM::forTable($this->tableName)
            ->selectMany(['id' => 'medals.id', 'medals.country_id', 'country_name' => 'countries.name', 'medals.type_medal_id', 'sport_name' => 'sports.name', 'type' => 'type_medal.name', 'athlete_name' => 'athletes.name'])
            ->leftOuterJoin('countries', ['countries.id', '=', 'medals.country_id'])
            ->leftOuterJoin('sports', ['sports.id', '=', 'medals.sport_id'])
            ->leftOuterJoin('type_medal', ['type_medal.id', '=', 'medals.type_medal_id'])
            ->leftOuterJoin('athlete_medal', ['athlete_medal.medal_id', '=', 'medals.id'])
            ->leftOuterJoin('athletes', ['athletes.id', '=', 'athlete_medal.athlete_id'])
            ->findArray();

        $data['countries'] = ORM::forTable('countries')->orderByAsc('name')->findArray();
        $data['type_medal'] = ORM::forTable('type_medal')->orderByAsc('name')->findArray();
        $data['athletes'] = ORM::forTable('athletes')->orderByAsc('name')->findArray();
        $data['sports'] = ORM::forTable('sports')->orderByAsc('name')->findArray();
        ORM::getDb()->commit();

        return $data;
    }

    public function create($medalType = null, $countryId = null, $sportId = null, $athletes = null): void
    {
        ORM::getDb()->beginTransaction();
        $medal = ORM::forTable($this->tableName)->create();
        $medal->type_medal_id = $medalType;
        $medal->country_id = $countryId;
        $medal->sport_id = $sportId;
        $medal->save();

        $athletes = array_diff($athletes, array('', NULL));

        foreach ($athletes as $athlete) {
            $medalAthlete = ORM::forTable('athlete_medal')->create();
            $medalAthlete->medal_id = $medal->id();
            $medalAthlete->athlete_id = $athlete;
            $medalAthlete->save();
        }
        ORM::getDb()->commit();
    }
}
