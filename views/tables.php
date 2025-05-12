<?php
include '../models/drivers/conexDB.php';
include '../models/entities/entity.php';
include '../models/entities/table.php';
include '../controllers/tablesController.php';

use app\controllers\tablesController;

$controller = new tablesController();
$tables = $controller->queryAllTables();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gestión de Mesas</title>
</head>
<body>
    <div>
        <h1>Listado de Mesas</h1>
        <a href="form/form_table.php">Crear</a>
    </div>
    <br>
    <table border="1" cellpadding="5">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($tables as $t) {
                echo '<tr>';
                echo '  <td>' . $t->get('id') . '</td>';
                echo '  <td>' . $t->get('name') . '</td>';
                echo '  <td>';
                echo '      <a href="form/form_table.php?id=' . $t->get('id') . '">Modificar</a> ';
                echo '      <a href="acciones/delete_table.php?id=' . $t->get('id') . '">Eliminar</a>';
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
