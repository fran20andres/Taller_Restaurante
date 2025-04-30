<?php
include '../models/drivers/conexDB.php';
include '../models/entities/entity.php';
include '../models/entities/table.php';

use app\models\entities\Table;

$table = new Table();
$tables = $table->all();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gestión de Mesas</title>
</head>
<body>
    <h1>Mesas Registradas</h1>

    <form action="../controllers/guardar_table.php" method="POST">
        <label for="name">Nombre de la Mesa:</label>
        <input type="text" name="name" required>
        <button type="submit">Guardar</button>
    </form>

    <h2>Listado de Mesas</h2>
    <table border="1" cellpadding="5">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($tables as $t): ?>
                <tr>
                    <td><?= $t->get('id') ?></td>
                    <td><?= $t->get('name') ?></td>
                    <td>
                        <a href="editar_table.php?id=<?= $t->get('id') ?>">Editar</a> |
                        <a href="../controllers/delete_table.php?id=<?= $t->get('id') ?>" 
                           onclick="return confirm('¿Estás seguro que deseas eliminar esta mesa?');">
                           Eliminar
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <br>
    <a href="../index.php">Volver al inicio</a>
</body>
</html>
