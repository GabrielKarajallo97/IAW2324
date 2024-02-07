<?php
    // Conexión al servidor
    include "conexion.php";
    // Añado columna mediante PDO
    $sql = "ALTER TABLE usuarios ADD email TEXT";
    if ($conn->query($sql) == True) {
        echo "<p>Columna añadida correctamente</p>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
?>