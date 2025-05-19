<?php  
include '../../models/drivers/conexDB.php';
include '../../models/entities/entity.php';
include '../../models/entities/category.php';
include '../../controllers/categoriesController.php';

use app\controllers\CategoriesController;

$controller = new CategoriesController();
$categories = $controller->queryAllCategories();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario para guardar platos</title>
</head>
<body>
    <h1>Guardar Plato Nuevo</h1>
    <form action="../actions/saveUpdate_dish.php" method="post">
        <div>
            <label>descripcion</label>
            <input type="text" name="description" required>
        </div>
        <div>
            <label>precio</label>
            <input type="text" name="price" required>
        </div>
        <label>categoria</label>
        <?php
        echo '<select name="idCategory" required>';
        foreach ($categories as $category){
            echo '<option value="'. $category->get('id') .'" name="name">'. $category->get('name') .'</option>';
        }
        echo'</select>';
        ?>
        <div>
            <button type="submit">Guardar</button>
        </div>
    </form>
</body>
</html>