<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    Hola
    <?php echo htmlspecialchars($_POST['nombre']) ?>
    Hoy es
    <?php echo $fechaHora = date('d/m/Y'); ?>

</body>

</html>