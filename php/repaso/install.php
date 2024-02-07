<?php
    $servername = "sql311.thsite.top";
    $username = "thsi_35760646";
    $password = "?Qy3?f1l";
    $dbname = "thsi_35760646_bdpruebas";
    
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
      die("Conección fallida: " . $conn->connect_error);
    }
    
    //  Creamos una variable que redirija al fichero que tiene la orden de crear la tabla 
    $sql = "crear_tabla.php";
    // llamamos al otro fichero con file_get_contents
   $sql_query = file_get_contents($sql);
    
    if ($conn->multi_query($sql_query) === TRUE) {
      echo "Tabla usuarios creada correctamente";
    } else {
      echo "Error en la creación de la tabla: " . $conn->error;
    }
    
    $conn->close();
?>;