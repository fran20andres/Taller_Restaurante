<?php
namespace app\controllers;

use app\models\entities\category;
use app\models\entities\table;
use app\models\entities\dish;
use mysqli_sql_exception;

class deleteController{

    public function deleteCategory($idCategory){
        $category = new Category();
        $category->set('idCategory', $idCategory);

        try {
            $result = $category->delete();
            if ($result) {
                return "Mesa eliminada correctamente.";
            } else {
                return "No se pudo eliminar la mesa.";
            }
        } catch (mysqli_sql_exception $message) {
            if (str_contains($message->getMessage(), 'foreign key constraint fails')) {
                return "No se puede eliminar la categoria porque está relacionada con otros registros.";
            }
        }
    }

    public function deleteTable($idTable){
        $table = new Table();
        $table->set('idTable', $idTable);

        try {
            $result = $table->delete();
            if ($result) {
                return "Mesa eliminada correctamente.";
            } else {
                return "No se pudo eliminar la mesa.";
            }
        } catch (mysqli_sql_exception $message) {
            if (str_contains($message->getMessage(), 'foreign key constraint fails')) {
                return "No se puede eliminar la mesa porque está relacionada con otros registros.";
            }
        }
    }

    public function deletedish($idDish){
        $dish = new Dish();
        $dish->set('idDish', $idDish);

        try {
            $result = $dish->delete();
            if ($result) {
                return "Mesa eliminada correctamente.";
            } else {
                return "No se pudo eliminar la mesa.";
            }
        } catch (mysqli_sql_exception $message) {
            if (str_contains($message->getMessage(), 'foreign key constraint fails')) {
                return "No se puede eliminar la mesa porque está relacionada con otros registros.";
            }
        }
    }
}