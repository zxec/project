<?php

class CountryModel extends CreateDeleteModel
{

    function __construct()
    {
        $this->tableName = 'countries';
    }
}
