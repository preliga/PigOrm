<?php
/**
 * Created by PhpStorm.
 * User: Piotr
 * Date: 2017-12-13
 * Time: 22:30
 */

namespace library\PigOrm\model;

use library\PigOrm\{
    Collection,
    DataTemplate
};

class CollectionManager
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

        $collection = new Collection($data, $this->dataTemplate);

        return $collection->validate($column);
    }

    public function save(array $params)
    {
        $data = json_decode($params['data'] ?? null, true);
        $notTables = json_decode($params['notTables'] ?? null, true);
        $onlyTables = json_decode($params['onlyTables'] ?? null, true);
        $reload = $params['reload'] ?? null;

        $collection = new Collection($data, $this->dataTemplate);

        return $collection->save($notTables, $onlyTables, $reload);
    }

    public function delete(array $params)
    {
        $data = json_decode($params['data'] ?? null, true);
        $notTables = json_decode($params['notTables'] ?? null, true);
        $onlyTables = json_decode($params['onlyTables'] ?? null, true);

        $collection = new Collection($data, $this->dataTemplate);

        return $collection->delete($notTables, $onlyTables);
    }

    public function reload(array $params)
    {
        $data = json_decode($params['data'] ?? null, true);

        $collection = new Collection($data, $this->dataTemplate);

        $collection->reload();

        return $collection->getArray();
    }
}