<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
      
      echo "El nombre del servidor es: " .$_SERVER['SERVER_ADDR']. "<br>" ;
      echo "La url de la pagina previa es: " .$_SERVER['HTTP_REFERER'];
      

    ?>
</body>
</html>