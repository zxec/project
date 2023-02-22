<?php

class ModelCountry extends ModelCreateDelete
{

    function __construct()
    {
        $this->tableName = 'countries';
    }
}
