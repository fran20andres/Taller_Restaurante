<?php 
include '../../models/drivers/conexDB.php'; 
include '../../models/entities/entity.php'; 
include '../../models/entities/table.php'; 
include '../../controllers/deleteController.php'; 

use app\controllers\deleteController;

$controller = new deleteController(); 
$result = $controller->deleteTable($_GET['id'])
?>

<!DOCTYPE html> 
<html lang="es"> 
<head> 
    <meta charset="UTF-8"> 
    <title>Resultado</title> 
</head> 
<body> 
    <h1>Resultado de la operación</h1> 
    <p><?= htmlspecialchars($result) ?></p> 
    <a href="../tables.php">Volver</a>
</body> 
</html>

