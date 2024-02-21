<?php
    // Conexión al servidor
    include "../db.php";

    $sqlFile = 'actualizausuarios.sql';
    $sqlContents = file_get_contents($sqlFile);
    
    // Ejecutar las instrucciones SQL
    if ($conn->multi_query($sqlContents)) {
        echo "La tabla 'usuarios' ha sido creada exitosamente.";
    } else {
        echo "Error al ejecutar las instrucciones SQL: " . $conn->error;
    }
    
    // Cerrar conexión
    $conn->close();
?>