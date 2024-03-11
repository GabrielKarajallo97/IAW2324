<?php
setlocale(LC_TIME, 'es_ES.UTF-8');
$usuario = $_SESSION['user'];
$sql_select = "SELECT ultima_sesion FROM usuarios WHERE username= '$usuario'";
$result = $conn->query($sql_select);
if ($result->num_rows > 0) {
    // Mostrar la última sesión
    while($row = $result->fetch_assoc()) {
        $ultima_sesion = strtotime($row["ultima_sesion"]);
        $timestamp = $ultima_sesion + (5 * 3600);
        $fecha_formato = strftime('%e de %B de %Y a las %H:%M' , $timestamp);
    }
}
?>

<footer class="blockquote-footer fixed-bottom">
<div class="footer">
    <p>Gestión de incidencias del <a class="text-center" href="https://iesamachado.org" target="_blank">IES Antonio Machado</a>. Desarrollado por Gabriel Karajallo</p>
    <p>Conectado como: <?php echo $_SESSION["user"];?> como  <?php echo $_SESSION["perfil"];?></p>
    <p>Última sesión iniciada: <?php echo $fecha_formato; ?></p>
</div>    
</footer>


<style>
    .footer{
        text-align: center;
    }

    p{
        color: #6c757d;
    }
    a{
        color: #6c757d;
    }
</style>
</body>
</html>