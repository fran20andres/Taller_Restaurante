<?php
include '../../models/drivers/conexDB.php';
include '../../models/entities/entity.php';
include '../../models/entities/category.php';
include '../../controllers/deleteController.php';

use app\controllers\deleteController;

$controller = new deleteController();
$result = $controller->deleteCategory($_GET['id']);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Resultado de la operación</title>
</head>
<body>
    <h1>Resultado de la operación</h1>
    <p><?php echo $result; ?></p>
    <a href="../categories.php">Volver</a>
</body>
</html>
