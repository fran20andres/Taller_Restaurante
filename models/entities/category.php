<?php

namespace app\models\entities;

use app\models\drivers\conexDB;

class category extends entity
{
    protected $idCategory = null;
    protected $name = "";

    public function all()
    {
        $sql = "SELECT * FROM categories";
        $conex = new conexDB();
        $resultDb = $conex->execSQL($sql);
        $categories = [];
        if ($resultDb->num_rows > 0) {
            while ($rowDb = $resultDb->fetch_assoc()) {
                $category = new category();
                $category->set('id', $rowDb['id']);
                $category->set('name', $rowDb['name']);
                array_push($categories, $category);
            }
        }
        $conex->close();
        return $categories;
    }

    public function save()
    {
        $sql = "INSERT INTO categories (name) VALUES ('" . $this->name . "')";
        $conex = new conexDB();
        $resultDb = $conex->execSQL($sql);
        $conex->close();
        return $resultDb;
    }

    public function update()
    {
        $sql = "UPDATE categories SET name='" . $this->name . "' WHERE id=" . $this->idCategory;
        $conex = new conexDB();
        $resultDb = $conex->execSQL($sql);
        $conex->close();
        return $resultDb;
    }

    public function delete()
    {
        $sql = "DELETE FROM categories WHERE id=" . $this->idCategory;
        $conex = new conexDB();
        $resultDb = $conex->execSQL($sql);
        $conex->close();
        return $resultDb;
    }
}
