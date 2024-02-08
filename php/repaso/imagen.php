<?php
$servername = "sql311.thsite.top";
$username = "thsi_35760646";
$password = "?Qy3?f1l";
$dbname = "thsi_35760646_bdpruebas";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Verificar si se ha enviado una imagen
if(isset($_FILES['imagen'])){
    $nombre_imagen = $_FILES['imagen']['name'];
    $tipo_imagen = $_FILES['imagen']['type'];
    $tamaño_imagen = $_FILES['imagen']['size'];
    
    // Comprobar que sea una imagen
    if($tipo_imagen == "image/jpeg" || $tipo_imagen == "image/jpg" || $tipo_imagen == "image/png" || $tipo_imagen == "image/gif"){
        
        // Ruta de la imagen temporal
        $temp = $_FILES['imagen']['tmp_name'];
        
        // Leer la imagen temporal
        $fp = fopen($temp, 'r');
        $data = fread($fp, filesize($temp));
        $data = addslashes($data);
        fclose($fp);
        
        // Insertar la imagen en la base de datos
        $sql = "INSERT INTO imagenes (nombre, tipo, size, imagen) VALUES ('$nombre_imagen', '$tipo_imagen', $tamaño_imagen, '$data')";
        
        if ($conn->query($sql) === TRUE) {
            echo "La imagen se ha cargado y almacenado en la base de datos correctamente.";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "El archivo seleccionado no es una imagen válida.";
    }
}

// Mostrar todas las imágenes almacenadas en la base de datos
$sql = "SELECT * FROM imagenes";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<h2>Imagen:</h2>";
        echo "<img src='data:" . $row['tipo'] . ";base64," . base64_encode($row['imagen']) . "' />";
    }
} else {
    echo "No se han encontrado imágenes en la base de datos.";
}

// Cerrar conexión
$conn->close();
?>;
