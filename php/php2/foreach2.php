<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
         $producto = array(
            "Ordenador" => "Computer",
            "Telefono"=>"Smartphone",
            "Tableta"=>"Tablet",
            "Camara"=>"Camera", 
            "Televisión"=>"SmarthTV");
        foreach($producto as $espanol => $ingles){
            echo"".$espanol."  en ingles: ".$ingles."<br>";
        };
        $producto = sizeof($producto);
        echo "La cantidad de elementos del array es: " . $producto;  
    ?>
</body>
</html>