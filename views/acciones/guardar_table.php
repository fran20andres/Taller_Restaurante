<?php
include '../../models/drivers/conexDB.php';
include '../../models/entities/entity.php';
include '../../models/entities/table.php';
include '../../controllers/tablesController.php';

use app\controllers\TablesController;

$controller = new TablesController();

$result = empty($_POST['idInput'])
    ? $controller->saveNewTable($_POST)
    : $controller->updateTable($_POST);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Resultado</title>
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
    <a href="../tables.php">Volver</a>
</body>
</html>
