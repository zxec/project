<?php

abstract class ModelCreateDelete extends Model
{
    public function create($name, $column_name): void
    {
        ORM::getDb()->beginTransaction();
        if (!$this->hasRecord($name, $column_name)) {
            $record = ORM::forTable($this->tableName)->create();
            $record->$column_name = $name;
            $record->save();
        }
        ORM::getDb()->commit();
    }

    public function delete($id): void
    {
        ORM::getDb()->beginTransaction();
        $record = ORM::forTable($this->tableName)->findOne($id);
        $record->delete();
        ORM::getDb()->commit();
    }
}
