<?php
include '../models/drivers/conexDB.php';
include '../models/entities/entity.php';
include '../models/entities/dish.php';
include '../controllers/dishesController.php';

use app\controllers\dishesController;

$controller = new dishesController();
$dishes = $controller->queryAllDishes();

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Platos</title>
</head>

<body>
    <div>
        <h1>Listado de Platos</h1>
        <a href="form/form_SaveDish.php">Crear</a>
    </div>
    <br>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Description</th>
                <th>Price</th>
                <th>Category</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($dishes as $dish) {
                echo '<tr>';
                echo '  <td>' . $dish->get('id') . '</td>';
                echo '  <td>' . $dish->get('description') . '</td>';
                echo '  <td>' . $dish->get('price') . '</td>';
                echo '  <td>' . $dish->get('name') . '</td>';
                echo '  <td>';
                echo '      <a href="form/form_UpdateDish.php?id=' . $dish->get('id') . '">Modificar</a> ';
                echo '      <a href="actions/delete_dish.php?id=' . $dish->get('id') . '">Eliminar</a>';
                echo '  </td>';
                echo '</tr>';
            }
            ?>
        </tbody>
    </table>
    <br>
    <a href="../index.php">Volver al inicio</a>
</body>
</html>
