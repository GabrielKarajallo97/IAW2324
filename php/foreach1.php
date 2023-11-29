<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <!-- Crea un array con 4 o 5 refranes. Utiliza foreach para mostrar todos los 
    efranes en pantalla cada uno de ellos en un párrafo diferente. -->
    <?php
        $producto = array("Ordenador","Smartphone","Tablet","TV","Radio");

        foreach ($producto as $values) {
            echo"Esto es un: ". $values ."<br>";
        
        };
    ?>
</body>

</html>