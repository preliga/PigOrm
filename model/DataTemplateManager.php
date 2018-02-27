<?php

/**
 * Created by PhpStorm.
 * User: Piotr
 * Date: 2017-12-13
 * Time: 21:40
 */

namespace library\PigOrm\model;

use library\PigOrm\DataTemplate;

class DataTemplateManager
{
    protected $dataTemplate;

    public function __construct(DataTemplate $dataTemplate)
    {
        $this->dataTemplate = $dataTemplate;
    }

    public function find(array $params)
    {
        $where = json_decode($params['where'] ?? null, true);
        $group = json_decode($params['group'] ?? null, true);
        $order = json_decode($params['order'] ?? null, true);
        $variable = json_decode($params['variable'] ?? null, true) ?? [];

        return $this->dataTemplate->find($where, $group, $order, $variable)->getArray();
    }

    public function findOne(array $params)
    {
        $where = json_decode($params['where'] ?? null, true);
        $group = json_decode($params['group'] ?? null, true);
        $order = json_decode($params['order'] ?? null, true);
        $variable = json_decode($params['variable'] ?? null, true) ?? [];

        return $this->dataTemplate->findOne($where, $group, $order, $variable)->getArray();
    }

    public function get(array $params)
    {
        $id = $params['id'] ?? null;
        $variable = json_decode($params['variable'] ?? null, true) ?? [];

        return $this->dataTemplate->get($id, $variable);
    }

    public function getKeyAlias(array $params)
    {
        $table = $params['table'] ?? null;

        return $this->dataTemplate->getKeyAlias($table);
    }

    public function getKeyName(array $params)
    {
        $table = $params['table'] ?? null;

        return $this->dataTemplate->getKeyName($table);
    }

    public function getDefaultValues(array $params)
    {
        $table = $params['table'] ?? null;

        return $this->dataTemplate->getDefaultValues($table);
    }

    public function exists(array $params)
    {
        $where = json_decode($params['where'] ?? null, true);
        $group = json_decode($params['group'] ?? null, true);
        $variable = json_decode($params['variable'] ?? null, true) ?? [];

        return $this->dataTemplate->exists($where, $group, $variable);
    }

    public function count(array $params)
    {

        $column = json_decode($params['column'] ?? null, true) ?? $params['column'];
        $where = json_decode($params['where'] ?? null, true);
        $group = json_decode($params['group'] ?? null, true);
        $order = json_decode($params['order'] ?? null, true);
        $variable = json_decode($params['variable'] ?? null, true) ?? [];

        return $this->dataTemplate->count($column, $where, $group, $order, $variable);
    }

    public function sum(array $params)
    {
        $column = json_decode($params['column'] ?? null, true) ?? $params['column'];
        $where = json_decode($params['where'] ?? null, true);
        $group = json_decode($params['group'] ?? null, true);
        $order = json_decode($params['order'] ?? null, true);
        $variable = json_decode($params['variable'] ?? null, true) ?? [];

        return $this->dataTemplate->sum($column, $where, $group, $order, $variable);
    }

    public function min(array $params)
    {
        $column = json_decode($params['column'] ?? null, true) ?? $params['column'];
        $where = json_decode($params['where'] ?? null, true);
        $group = json_decode($params['group'] ?? null, true);
        $order = json_decode($params['order'] ?? null, true);
        $variable = json_decode($params['variable'] ?? null, true) ?? [];

        return $this->dataTemplate->min($column, $where, $group, $order, $variable);
    }

    public function max(array $params)
    {
        $column = json_decode($params['column'] ?? null, true) ?? $params['column'];
        $where = json_decode($params['where'] ?? null, true);
        $group = json_decode($params['group'] ?? null, true);
        $order = json_decode($params['order'] ?? null, true);
        $variable = json_decode($params['variable'] ?? null, true) ?? [];

        return $this->dataTemplate->max($column, $where, $group, $order, $variable);
    }

    public function avg(array $params)
    {
        $column = json_decode($params['column'] ?? null, true) ?? $params['column'];
        $where = json_decode($params['where'] ?? null, true);
        $group = json_decode($params['group'] ?? null, true);
        $order = json_decode($params['order'] ?? null, true);
        $variable = json_decode($params['variable'] ?? null, true) ?? [];

        return $this->dataTemplate->avg($column, $where, $group, $order, $variable);
    }


}