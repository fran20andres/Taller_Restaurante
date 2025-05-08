<?php
// Incluir los archivos necesarios
include '../../models/drivers/conexDB.php';
include '../../models/entities/entity.php';
include '../../models/entities/restaurantTables.php';  // Clase RestaurantTable
include '../../controllers/restaurant_tablesController.php';  // Controlador de mesas

use app\controllers\RestaurantTablesController; 

// Crear el controlador
$controller = new RestaurantTablesController();  

// Verificamos si es guardar o actualizar
$result = empty($_POST['idInput'])
    ? $controller->saveNewTable($_POST)
    : $controller->updateTable($_POST);
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
    <?php if ($result): ?>
        <p>Datos guardados correctamente.</p>
    <?php else: ?>
        <p>No se pudo guardar los datos.</p>
    <?php endif; ?>
    
    <a href="../restaurant_tables.php">← Volver a la lista de mesas</a>
</body>

</html>

