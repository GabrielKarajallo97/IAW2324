<?php include "../header.php" ?>
<?php 
session_set_cookie_params(0);
session_start(); 
if (isset($_SESSION['user']) && $_SESSION['perfil'] === 'administrador' ){
   
} else{
  header("location: ../index.php");
}
 
if (isset($_POST['crear'])) {
  $descripcion = htmlspecialchars($_POST['descripcion']);
  $usuario = $_SESSION["user"];
  $query = "INSERT INTO aulas(aula) VALUES('{$descripcion}')";
  $resultado = mysqli_query($conn, $query);

  if (!$resultado) {
    echo "Algo ha ido mal añadiendo la incidencia: " . mysqli_error($conn);
  } else {
    echo "<script type='text/javascript'>alert('¡Aula añadida con éxito!')</script>";
  }
 
}

?>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <?php
    $totalq = "SELECT COUNT(*) as total FROM incidencia";
    $resultado = mysqli_query($conn, $totalq);
    $total = mysqli_fetch_assoc($resultado)['total'];

    $totalp = "SELECT COUNT(*) as total FROM incidencia WHERE fecha_resolucion = '0000-00-00'";
    $resultado = mysqli_query($conn, $totalp);
    $totalpendientes = mysqli_fetch_assoc($resultado)['total'];

    $totalr = "SELECT COUNT(*) as total FROM incidencia WHERE fecha_resolucion <> '0000-00-00'";
    $resultado = mysqli_query($conn, $totalr);
    $totalresuelta = mysqli_fetch_assoc($resultado)['total'];

    ?>
    <!-- <a class="navbar-brand" href="#">Incidencias</a> -->
    <div class="collapse navbar-collapse" id="navbarText">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a href="home.php" class='btn  mb-2'> <i class="bi bi-house"></i> Inicio </a>
        </li>
        <li class="nav-item">
          <a href="create.php" class='btn  mb-2'> <i class="bi bi-patch-plus"></i> Añadir
            incidencia</a>
        </li>
        <li class="nav-item">
          <a href="totales.php" class='btn  mb-2'> <i class="bi bi-bookmarks"></i> Incidencias Totales:
            <?php echo $total ?>
          </a>
        </li>
        <li class="nav-item">
          <a href="pendientes.php" class='btn  mb-2'> <i class="bi bi-bookmark-dash"></i> Incidencias Pendientes:
            <?php echo $totalpendientes ?>
          </a>
        </li>
        <li class="nav-item">
          <a href="resueltas.php" class='btn  mb-2'><i class="bi bi-bookmark-check"></i> Incidencias Resueltas:
            <?php echo $totalresuelta ?>
          </a>
        </li>
        <li class="nav-item">
          <a id="enlace_id" href="administracion.php" class='btn  mb-2'> <i class="bi bi-gear"></i> Crear usuario</a>
        </li>
        <li class="nav-item">
          <a id="enlace_id" href="usuarios.php" class='btn  mb-2'> <i class="bi bi-person-badge-fill"></i> Administracion Usuarios</a>
        </li>
        <li class="nav-item">
          <a id="enlace_id" href="cerrar_session.php" class='btn  mb-2'> <i class="bi bi-box-arrow-right"></i> Cerrar sesión
          </a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<div class="caja">
  <div class="container">
    <form action="" method="post">
      <div class="form-group">
        <div class="form-group">
          <label for="descripcion" class="form-label">Nombre aula</label>
          <input type="text" name="descripcion" class="form-control" required>
        </div>
        <div class="form-group boton">
          <button type="submit" name="crear" class="btn btn-primary mt-2">Añadir</button>
        </div>
    </form>
  </div>
</div>
<h1 class="text-center">Añadir Aula</h1>



<style>
  #aula {
    z-index: 9999;
    /* Ajusta el índice Z según sea necesario */
  }

  body {
    display: block;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
    background: #092756;
    background: -moz-radial-gradient(0% 100%, ellipse cover, rgba(104, 128, 138, .4) 10%, rgba(138, 114, 76, 0) 40%), -moz-linear-gradient(top, rgba(57, 173, 219, .25) 0%, rgba(42, 60, 87, .4) 100%), -moz-linear-gradient(-45deg, #670d10 0%, #092756 100%);
    background: -webkit-radial-gradient(0% 100%, ellipse cover, rgba(104, 128, 138, .4) 10%, rgba(138, 114, 76, 0) 40%), -webkit-linear-gradient(top, rgba(57, 173, 219, .25) 0%, rgba(42, 60, 87, .4) 100%), -webkit-linear-gradient(-45deg, #670d10 0%, #092756 100%);
    background: -o-radial-gradient(0% 100%, ellipse cover, rgba(104, 128, 138, .4) 10%, rgba(138, 114, 76, 0) 40%), -o-linear-gradient(top, rgba(57, 173, 219, .25) 0%, rgba(42, 60, 87, .4) 100%), -o-linear-gradient(-45deg, #670d10 0%, #092756 100%);
    background: -ms-radial-gradient(0% 100%, ellipse cover, rgba(104, 128, 138, .4) 10%, rgba(138, 114, 76, 0) 40%), -ms-linear-gradient(top, rgba(57, 173, 219, .25) 0%, rgba(42, 60, 87, .4) 100%), -ms-linear-gradient(-45deg, #670d10 0%, #092756 100%);
    background: -webkit-radial-gradient(0% 100%, ellipse cover, rgba(104, 128, 138, .4) 10%, rgba(138, 114, 76, 0) 40%), linear-gradient(to bottom, rgba(57, 173, 219, .25) 0%, rgba(42, 60, 87, .4) 100%), linear-gradient(135deg, #670d10 0%, #092756 100%);
    filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#3E1D6D', endColorstr='#092756', GradientType=1)
  }

  /*----------NAV--------------------*/
  nav {
    position: absolute;
    left: 50%;
    transform: translate(-50%, -50%);
  }

  .navbar {
    position: absolute;
    top: 5%;

    width: 100%;
  }

  .nav-item a {
    border: 0px;
    color: #fff;
    margin-right: 10px;
  }


  /*-----------Contenedor--------------*/

  .container {
    max-width: 400px;
    background-color: #f3f4f5;
    border-radius: 8px;
    padding: 0px;
    border: 0px;
    box-shadow: 20px 30px 50px rgba(1, 1, 1, 0.5);
    position: absolute;
    left: 50%;
    top: 50%;
    transform: translate(-50%, -50%);
  }



  form {
    padding: 20px;
  }

  /*-------Titulo---------------*/
  h1 {
    font-family: 'Paytone One', sans-serif;
    color: #fff;
    text-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
    letter-spacing: 1px;
    text-align: center;
    margin-bottom: 20px;
    margin-top: 80px
  }

  /*------BOTON------*/
  .boton {
    text-align: center;
  }

  .boton button {
    background-color: #b2bfcf;
    border: 0px;
  }
</style>

<?php include "../footer.php" ?>