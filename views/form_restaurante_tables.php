<?php
// No necesitas incluir nada aquí si solo vas a enviar los datos.
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario Mesas</title>
</head>

<body>
    <h1>
        <?php echo empty($_GET['id']) ? 'Registrar Mesa' : 'Modificar Mesa'; ?>
    </h1>
    <form action="acciones/guardar_table.php" method="post">
        <?php
        if (!empty($_GET['id'])) {
            echo '<input type="hidden" name="idInput" value="' . $_GET['id'] . '">';
        }
        ?>
        <div>
            <label>Nombre de la Mesa</label>
            <input type="text" name="nombreInput" required>
        </div>
        <div>
            <button type="submit">Guardar</button>
        </div>
    </form>
    <a href="restaurant_tables.php">Volver</a>
</body>

</html>