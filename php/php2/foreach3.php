<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
         $tweets = array(
            "Hola",
            "Adios",
            "Buenas tardes",
            "Buenos dias",
            "Buenas noches");
        foreach ($tweets as $tweet) {
            echo "". $tweet ."<br>";
        };
    ?>
</body>
</html>