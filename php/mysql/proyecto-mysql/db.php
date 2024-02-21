<?php
$host = 'sql311.thsite.top';   
$user = 'thsi_35760646';   
$pass = "?Qy3?f1l";   
$database = 'thsi_35760646_proyecto_mysql';     
$conn = mysqli_connect($host,$user,$pass,$database);   
if (!$conn) {                                             
    die("Conexión fallida con base de datos: " . mysqli_connect_error());     
  }
?>;