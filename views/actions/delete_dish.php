<?php 
include '../../models/drivers/conexDB.php'; 
include '../../models/entities/entity.php'; 
include '../../models/entities/dish.php'; 
include '../../controllers/deleteController.php'; 

use app\controllers\deleteController;

$controller = new deleteController(); 
$result = $controller->deleteDish($_GET['id'])
?>

<!DOCTYPE html> 
<html lang="es"> 
<head> 
    <meta charset="UTF-8"> 
    <title>Resultado</title> 
</head> 
<body> 
    <h1>Resultado de la operación</h1> 
    <p><?php echo $result; ?></p>
    <a href="../dishes.php">Volver</a>
</body> 
</html>

