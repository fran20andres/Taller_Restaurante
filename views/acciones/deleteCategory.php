<?php
include '../../models/drivers/conexDB.php';
include '../../models/entities/entity.php';
include '../../models/entities/category.php';
include '../../controllers/categoriesController.php';

use app\controllers\CategoriesController;
use app\models\drivers\ConexDB;

$conex = new ConexDB();

$idCategory = $_GET['id'];

// 1. Buscar todos los platos (dishes) que pertenecen a esta categoría
$sqlSelectDishes = "SELECT id FROM dishes WHERE idCategory = $idCategory";
$resultSelectDishes = $conex->execSQL($sqlSelectDishes);

if ($resultSelectDishes->num_rows > 0) {
    while ($row = $resultSelectDishes->fetch_assoc()) {
        $idDish = $row['id'];
        
        // 2. Eliminar en order_details los pedidos de ese plato
        $sqlDeleteOrderDetails = "DELETE FROM order_details WHERE idDish = $idDish";
        $conex->execSQL($sqlDeleteOrderDetails);

        // 3. Eliminar el plato (dish)
        $sqlDeleteDish = "DELETE FROM dishes WHERE id = $idDish";
        $conex->execSQL($sqlDeleteDish);
    }
}

// 4. Ahora sí, eliminar la categoría
$controller = new CategoriesController();
try {
    $result = $controller->deleteCategory($idCategory);
    $error = false;
} catch (Exception $e) {
    $error = true;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Resultado de la operación</title>
</head>
<body>
    <h1>Resultado de la operación</h1>

    <?php
    if ($error) {
        echo '<p style="color:red;">No se pudo borrar la categoría.</p>';
    } else {
        echo '<p>Categoría, platos y pedidos eliminados correctamente.</p>';
    }
    ?>

    <a href="../categories.php">Volver</a>
</body>
</html>
