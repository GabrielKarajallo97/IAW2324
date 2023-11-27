<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nacegador Usuario</title>
</head>
<body>
    <h1>Navegador</h1>
    <?php
        $navegador = $_SERVER['HTTP_USER_AGENT'];
        $ip = $_SERVER['REMOTE_ADDR'];
        echo "<p>Estas navegando con $navegador <!p>";
        echo "<p>Estas accediendo con la ip $ip ";
    ?>

</body>
</html>