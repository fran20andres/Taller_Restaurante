<?php

namespace app\controllers;

use app\models\entities\Category;

class CategoriesController
{
    public function queryAllCategories()
    {
        $category = new Category();
        $data = $category->all();
        return $data;
    }

    public function saveNewCategory($request)
    {
        $category = new Category();
        $category->set('name', $request['nombreInput']);
        return $category->save();
    }

    public function updateCategory($request)
    {
        $category = new Category();
        $category->set('idCategory', $request['idInput']);
        $category->set('name', $request['nombreInput']);
        return $category->update();
    }
    
}
