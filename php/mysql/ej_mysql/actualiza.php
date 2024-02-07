<?php
    // Conexión al servidor
    include "conexion.php";
    // Actualizamos mediante PDO
    $sql = "UPDATE usuarios SET password='4321' WHERE id=2";
    if ($conn->query($sql) == True) {
        echo "<p>Registro actulizado correctamente</p>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
?>