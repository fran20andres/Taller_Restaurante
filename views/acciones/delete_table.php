<?php 
include '../../models/drivers/conexDB.php'; 
include '../../models/entities/entity.php'; 
include '../../models/entities/table.php'; 
include '../../controllers/tablesController.php'; 

use app\controllers\TablesController;

$controller = new TablesController(); 
$idTable = $_GET['id']; 

try { 
    $result = $controller->deleteTable($idTable); 
    $error = !$result; 
} catch (Exception $e) { 
    $error = true; 
} 
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
    if ($error) { 
        echo '<p style="color:red;">No se pudo borrar la mesa porque tiene datos relacionados o se produjo un error.</p>'; 
    } else { 
        echo '<p style="color:green;">La mesa fue eliminada correctamente.</p>'; 
    } 
    ?> 
    <a href="../tables_list.php">Volver a la lista de mesas</a>
</body> 
</html>

