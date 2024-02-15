<?php include "../header.php";
session_set_cookie_params(0);
session_start(); 
$_SESSION['perfil'] = 'administrador';
if ($_SESSION['user']){
  if ($_SESSION['$perfil'] == 'administrador'){

  }
} else {
  header("location: ../index.php");
}

?>
<?php 
   // Verificar si se ha proporcionado el nombre de usuario a eliminar
if(isset($_GET['eliminar'])) {
    $usuario = $_GET['eliminar'];
    
    // Mostrar un mensaje de confirmación
    echo "<script>
            if(confirm('¿Estás seguro de que deseas eliminar el usuario {$usuario}? Todas las incidencias asociadas a este usuario también serán eliminadas.')) {
                window.location.href = 'borrar_usuarios.php?confirmar={$usuario}';
            } else {
                window.location.href = 'usuarios.php'; // Redirigir de vuelta a la página de usuarios si no se confirma la eliminación
            }
          </script>";
} elseif(isset($_GET['confirmar'])) { // Verificar si se ha confirmado la eliminación
    $usuario = $_GET['confirmar'];
    
    //eliminar las incidencias asociadas al usuario
    $query_incidencias = "DELETE FROM incidencia WHERE usuario = '{$usuario}'";
    $resultado_incidencias = mysqli_query($conn, $query_incidencias);
    
    // sentencia SQL para eliminar al usuario
    $query_usuario = "DELETE FROM usuarios WHERE username = '{$usuario}'";
    $resultado_usuario = mysqli_query($conn, $query_usuario);
    
    // Verificar si la eliminación de usuario y sus incidencias fue exitosa
    if($resultado_usuario ) { //&& $resultado_incidencias
        echo "<script>window.location='usuarios.php';</script>";
    } else {
        echo "Error al eliminar el usuario '{$usuario}' y sus incidencias asociadas.";
    }
} else {
    echo "No se proporcionó un nombre de usuario válido.";
}
     
?>
<?php include "../footer.php" ?>