<?php

namespace app\models\entities;

use app\models\drivers\conexDB;

class Dish extends Entity{
    protected $idDish = null;
    protected $description = "";
    protected $price = null;
    protected $idCategory = null;

    public function all(){
        $sql = "select dishes.*, categories.name from dishes ";
        $sql .= "inner join categories on dishes.idCategory=categories.id";
        $conecction = new conexDB();
        $resultDB = $conecction->execSQL($sql);
        $dishes = [];
        if ($resultDB->num_rows > 0) {
            while ($rowDB = $resultDB->fetch_assoc()) {
                $dish = new Dish();
                $dish->set('id', $rowDB['id']);
                $dish->set('description', $rowDB['description']);
                $dish->set('price', $rowDB['price']);
                $dish->set('name', $rowDB['name']);
                array_push($dishes,$dish);
            }
        }
        $conecction->close();
        return $dishes;
    }

    public function save(){
        $sql = "insert into dishes (description, price, idCategory) values";
        $sql .= "('" . $this->description . "','";
        $sql .= $this->price . "','";
        $sql .= $this->idCategory . "')";
        $conecction = new  conexDB();
        $resultDB = $conecction->execSQL($sql);
        $conecction->close();
        return $resultDB;
    }

    public function update(){
        $sql = "update dishes set ";
        $sql .= "description='" . $this->description . "',";
        $sql .= "price=" . $this->price;
        $sql .= " where id=" . $this->idDish;
        $conecction = new conexDB();
        $resultDB = $conecction->execSQL($sql);
        $conecction->close();
        return $resultDB;
    }

    public function delete(){
        $sql = "delete from dishes where id=" . $this->idDish;
        $conecction = new conexDB();
        $resultDB = $conecction->execSQL($sql);
        $conecction->close();
        return $resultDB;
    }
}


