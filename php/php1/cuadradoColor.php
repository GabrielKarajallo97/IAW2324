<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    
    <style>
        p{
            font-size: 100px;
        }
    </style>

    <?php

    
    $emoticono = array('<p>&#128512;</p>','<p>&#128513;</p>', '<p>&#128515;</p>',  '<p>&#128516;</p>',  '<p>&#128517;</p>' );
    $emoticono_aleatorio = $emoticono[rand(0, count($emoticono)-1)];
    
    echo $emoticono_aleatorio;
    
    
   
   

    
    ?>
</body>
</html>