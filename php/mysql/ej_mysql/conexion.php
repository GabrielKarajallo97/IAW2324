
<?php
$servername = "gabrielkarajallo.thsite.top";
$username = "gabriel";
$password = "1234";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
  die("Conexión fallida: " . $conn->connect_error);
}
echo "Conectado correctamente";
?>