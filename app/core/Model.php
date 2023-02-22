<?php

abstract class Model
{
    protected string $tableName;

    public function getData(): array
    {
        return ORM::forTable($this->tableName)->findArray();
    }

    public function getDataOne($id): ORM
    {
        return ORM::forTable($this->tableName)->findOne($id);
    }

    public function hasRecord($name, $column_name): bool
    {
        return ORM::forTable($this->tableName)->where($column_name, $name)->findOne();
    }
}
