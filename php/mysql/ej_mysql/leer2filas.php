<?php
    // Conexión al servidor
    include "conexion.php";
    // Conexión a base de datos mediante PDO
    $result = $conn->query("SELECT * FROM `usuarios` LIMIT 2");
    if ($result->rowCount() > 0) {
        echo "<h1>Resultados</h1>";
        echo "<table><tr><th>ID</th><th>usuario</th><th>contraseña</th></tr>";
        while ($row = $result->fetch()){ // Obtenermos los resultados mediante un bucle
            echo "<tr><td>".$row["id"]."</td><td>".$row["username"]." ".$row["password"]."</td></tr>";
        }
        echo "</table>";
    } else {
    echo "<p>0 results</p>";
    }
    $conn->close();
?>