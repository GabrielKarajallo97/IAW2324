<?php
$servername = "sql311.thsite.top";
$username = "thsi_35760646";
$password = "?Qy3?f1l";
$bd = "thsi_35760646_tutorial_crud";

try {
  $conn = new PDO("mysql:host=$servername;dbname=$bd", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo "Conectado correctamente a $servername con usuario $username y contraseña $password";
} catch(PDOException $e) {
  echo "Conexión fallida: " . $e->getMessage();
}
?>