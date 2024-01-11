<?php
//conexion al servidor
include "conexion.php";
  $sql = "INSERT INTO usuarios (username, password) VALUES ('Raul', '1234')";
  if ($conn->query($sql) == True) {
    echo "<p>Registro insertado correctamente</p>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
?>