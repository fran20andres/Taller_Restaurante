<?php
include '../../models/drivers/conexDB.php';
include '../../models/entities/entity.php';
include '../../models/entities/dish.php';
include '../../controllers/dishesController.php';

use app\controllers\dishesController;

$controller = new dishesController();
$result = empty($_POST['id'])
    ? $controller->saveNewDishes($_POST)
    : $controller->updateDishes($_POST);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado de la operación</title>
</head>
<body>
    <h1>Resultado de la operación</h1>
    <?php
    if ($result) {
        echo '<p>Datos guardados correctamente</p>';
    } else {
        echo '<p>No se pudo guardar los datos</p>';
    }
    ?>
    <a href="../dishes.php">Volver </a>
</body>
</html>


