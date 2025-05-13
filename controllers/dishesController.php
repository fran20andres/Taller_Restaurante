<?php

namespace app\controllers;

use app\models\entities\Dish;

class dishesController{

    public function queryAllDishes(){
        $dish = new Dish();
        $data = $dish->all();
        return $data;
    }
    
    public function saveNewDishes($request){
        $dish = new Dish();
        $dish->set('description', $request['description']);
        $dish->set('price', $request['price']);
        $dish->set('idCategory', $request['idCategory']);
        return $dish->save();
    }
    
    public function updateDishes($request){
        $dish = new Dish();
        $dish->set('idDish', $request['idDish']);
        $dish->set('description', $request['description']);
        $dish->set('price', $request['price']);
        $dish->set('idCategory', $request['idCategory']);
        return $dish->update();
    }
}