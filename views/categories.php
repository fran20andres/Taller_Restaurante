<?php
include '../models/drivers/conexDB.php';
include '../models/entities/entity.php';
include '../models/entities/category.php';
include '../controllers/categoriesController.php';

use app\controllers\CategoriesController;

$controller = new CategoriesController();
$categories = $controller->queryAllCategories();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categorías</title>
</head>

<body>
    <h1>Categorías</h1>
    <br>
    <a href="form_category.php">Crear</a>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($categories as $category) {
                echo '<tr>';
                echo '  <td>' . $category->get('id') . '</td>';
                echo '  <td>' . $category->get('name') . '</td>';
                echo '  <td>';
                echo '      <a href="form_category.php?id=' . $category->get('id') . '">Modificar</a> ';
                echo '      <a href="acciones/deleteCategory.php?id=' . $category->get('id') . '">Eliminar</a>';
                echo '  </td>';
                echo '</tr>';
            }
            ?>
        </tbody>
    </table>
</body>

</html>
