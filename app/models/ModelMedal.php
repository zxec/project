<?php

class ModelMedal extends ModelCreateDelete
{

    function __construct()
    {
        $this->tableName = 'medals';
    }

    public function getData(): array
    {
        ORM::getDb()->beginTransaction();
        $data['medals'] = ORM::forTable($this->tableName)
            ->selectMany('medals.id', 'medals.country_id', 'countries.country_name', 'medals.medal_type_id', 'sports.sport_name', 'medal_types.medal_type', 'athletes.athlete_name')
            ->leftOuterJoin('countries', ['countries.id', '=', 'medals.country_id'])
            ->leftOuterJoin('sports', ['sports.id', '=', 'medals.sport_id'])
            ->leftOuterJoin('medal_types', ['medal_types.id', '=', 'medals.medal_type_id'])
            ->leftOuterJoin('medal_athletes', ['medal_athletes.medal_id', '=', 'medals.id'])
            ->leftOuterJoin('athletes', ['athletes.id', '=', 'medal_athletes.athlete_id'])
            ->findArray();

        $data['countries'] = ORM::forTable('countries')->orderByAsc('country_name')->findArray();
        $data['medal_types'] = ORM::forTable('medal_types')->orderByAsc('medal_type')->findArray();
        $data['athletes'] = ORM::forTable('athletes')->orderByAsc('athlete_name')->findArray();
        $data['sports'] = ORM::forTable('sports')->orderByAsc('sport_name')->findArray();
        ORM::getDb()->commit();

        return $data;
    }

    public function create($medalType = null, $countryId = null, $sportId = null, $athletes = null): void
    {
        ORM::getDb()->beginTransaction();
        $medal = ORM::forTable($this->tableName)->create();
        $medal->medal_type_id = $medalType;
        $medal->country_id = $countryId;
        $medal->sport_id = $sportId;
        $medal->save();

        $athletes = array_diff($athletes, array('', NULL));

        foreach ($athletes as $athlete) {
            $medalAthlete = ORM::forTable('medal_athletes')->create();
            $medalAthlete->medal_id = $medal->id();
            $medalAthlete->athlete_id = $athlete;
            $medalAthlete->save();
        }
        ORM::getDb()->commit();
    }
}
