<?php
/**
 * Created by PhpStorm.
 * User: Piotr
 * Date: 2017-12-13
 * Time: 22:30
 */

namespace library\PigOrm\model;


use library\PigOrm\{
    Record,
    DataTemplate
};

class RecordManager
{
    protected $dataTemplate;

    public function __construct(DataTemplate $dataTemplate)
    {
        $this->dataTemplate = $dataTemplate;
    }

    public function validate(array $params)
    {
        $data = json_decode($params['data'] ?? null, true);
        $column = $params['column'] ?? null;

        $record = new Record($data, $this->dataTemplate);

        return $record->validate($column);
    }

    public function save(array $params)
    {
        $data = json_decode($params['data'] ?? null, true);
        $notTables = json_decode($params['notTables'] ?? null, true);
        $onlyTables = json_decode($params['onlyTables'] ?? null, true);
        $reload = $params['reload'] ?? null;

        $record = new Record($data, $this->dataTemplate);

        return $record->save($notTables, $onlyTables, $reload);
    }

    public function delete(array $params)
    {
        $data = json_decode($params['data'] ?? null, true);
        $notTables = json_decode($params['notTables'] ?? null, true);
        $onlyTables = json_decode($params['onlyTables'] ?? null, true);

        $record = new Record($data, $this->dataTemplate);

        return $record->delete($notTables, $onlyTables);
    }

    public function reload(array $params)
    {
        $data = json_decode($params['data'] ?? null, true);

        $record = new Record($data, $this->dataTemplate);

        $record->reload();

        return $record->getArray();
    }
}