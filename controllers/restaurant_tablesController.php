<?php

namespace app\controllers;

use app\models\entities\restaurant_tables;



class RestaurantTablesController
{
    public function saveNewTable($data)
    {
        return true;
    }

    public function updateTable($data)
    {
        return true;
    }
}


class TablesController
{
    public function queryAllTables()
    {
        $table = new  restaurant_tables();
        return $table->all();
    }

    public function saveNewTable($request)
    {
        $table = new  restaurant_tables();
        $table->set('name', $request['nombreInput']);
        return $table->save();
    }

    public function updateTable($request)
    {
        $table = new restaurant_tables();
        $table->set('id', $request['idInput']);
        $table->set('name', $request['nombreInput']);
        return $table->update();
    }

    public function deleteTable($id)
    {
        try {
            $table = new restaurant_tables();
            $table->set('id', $id);
            return $table->delete();
        } catch (\Exception $e) {
            // Aquí podrías hacer log del error si quieres
            return false;
        }
    }
}
