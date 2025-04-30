<?php

namespace app\controllers;

use app\models\entities\Table;

class TablesController
{
    public function queryAllTables()
    {
        $table = new Table();
        $data = $table->all();
        return $data;
    }

    public function saveNewTable($request)
    {
        $table = new Table();
        $table->set('name', $request['nombreInput']);
        return $table->save();
    }

    public function updateTable($request)
    {
        $table = new Table();
        $table->set('id', $request['idInput']);
        $table->set('name', $request['nombreInput']);
        return $table->update();
    }

    public function deleteTable($id)
    {
        $table = new Table();
        $table->set('id', $id);
        return $table->delete();
    }
}
