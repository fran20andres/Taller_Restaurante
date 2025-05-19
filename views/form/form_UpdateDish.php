<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario para actualizar platos</title>
</head>
<body>
    <h1>Actualizar platos</h1>
    <form action="../actions/saveUpdate_dish.php" method="post">
        <div>
            <input type="hidden" name="id" value=" <?php echo $_GET['id']; ?> ">
            <label>descripcion</label>
            <input type="text" name="descripcion" required>
        </div>
        <div>
            <label>precio</label>
            <input type="text" name="price" min="1" step="0.01" required>
        </div>
        <div>
            <button type="submit">Guardar</button>
        </div>
    </form>
</body>
</html>