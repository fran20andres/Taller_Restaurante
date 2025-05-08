
<?php
// Incluir los archivos necesarios
include '../../models/drivers/conexDB.php';
include '../../models/entities/entity.php';
include '../../models/entities/restaurant_tables.php';  // Incluir la clase Category
include '../../controllers/restaurant_tablesController.php';  // Incluir el controlador de categorías

use app\controllers\RestaurantTablesController;  // Usamos el controlador de categorías

// Crear el controlador
$controller = new RestaurantTablesController();

// Verificamos si es un guardar o actualizar
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
    <?php
    if ($result) {
        echo '<p>Datos guardados correctamente</p>';
    } else {
        echo '<p>No se pudo guardar los datos</p>';
    }
    ?>
    <a href="../restaurant_tables.php">Volver </a>
</body>

</html>


