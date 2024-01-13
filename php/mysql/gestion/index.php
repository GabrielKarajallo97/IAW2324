<?php include "header.php" ?>
<div class="container mt-5">
  <h1 class="text-center"> Gestión de incidencias</h1>
  <p class="text-center">
    I.E.S ANTONIO MACHADO
  </p>
  <div class="formulario">
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
      <div class="mb-3">
        <label for="usuario" class="form-label">Usuario</label>
        <input type="text" name="usuario" class="form-control" >
      </div>
      <div class="mb-3">
        <label for="contrasena" class="form-label">Contraseña</label>
        <input type="password" name="contrasena" class="form-control">
      </div>
      <button type="submit" class="btn btn-primary">Iniciar</button>
    </form>
  </div>
</div>



<?php
 if ($_POST){
  $usuario = htmlspecialchars($_POST["usuario"]);
  $contrasena = htmlspecialchars($_POST["contrasena"]);
  // Intentamos la conexión con MySQL
  $enlace = mysqli_connect("sql311.thsite.top","thsi_35760646","?Qy3?f1l","thsi_35760646_proyecto_mysql");

  if ($enlace){
    //$query = "SELECT * FROM usuarios WHERE username='".$_POST['usuario']."' AND password='".$_POST['contrasena']."'";
    $query = "SELECT * FROM usuarios WHERE username='".mysqli_real_escape_string($enlace,$usuario)."' AND password='".mysqli_real_escape_string($enlace,$contrasena)."'";
    $result = mysqli_query($enlace,$query);
    if (mysqli_num_rows($result)==1)
    {
        header("location: includes/home.php");
        //echo "<p>Bienvenido " . $usuario . "</p>";
    }
    else {
        echo "<p>Acceso denegado</p>";
    }
}
else{
    echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
    echo "errno de depuración: " . mysqli_connect_errno() . PHP_EOL;
    echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
}       
}
?>



<style>
  .formulario{
    width: 400px;
    margin: 0 auto;
  }

/*----------------------------*/

</style>
<?php include "footer.php" ?>