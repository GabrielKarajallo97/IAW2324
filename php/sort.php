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
        echo sort($producto);
        echo"Este es el array ordenado lexicograficamente <br>";
        foreach ($producto as $key => $value) {
            echo $key . " = " . $value ."<br>";
        }
    ?>
</body>
</html>