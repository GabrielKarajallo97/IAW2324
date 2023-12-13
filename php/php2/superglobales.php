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
      echo "El navegador es: " .$_SERVER['HTTP_USER_AGENT'] . "<br>";
      
      if($_SERVER['HTTP_REFERER'] == null){
        echo "No tiene url previa";
      }else{
        echo "La url de la pagina previa es: " .$_SERVER['HTTP_REFERER'] . "<br>";
      }
    ?>
</body>
</html>