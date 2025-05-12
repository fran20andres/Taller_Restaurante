<?php

namespace app\controllers;

use app\models\entities\table;

class tablesController
{
    public function queryAllTables()
    {
        $table = new  table();
        return $table->all();
    }

    public function saveNewTable($request)
    {
        $table = new  table();
        $table->set('name', $request['nombreInput']);
        return $table->save();
    }

    public function updateTable($request)
    {
        $table = new table();
        $table->set('id', $request['idInput']);
        $table->set('name', $request['nombreInput']);
        return $table->update();
    }
    
}
