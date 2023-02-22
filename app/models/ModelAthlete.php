<?php

class ModelAthlete extends ModelCreateDelete
{

    function __construct()
    {
        $this->tableName = 'athletes';
    }
}
