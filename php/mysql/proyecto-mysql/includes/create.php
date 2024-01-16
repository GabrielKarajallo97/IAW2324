<?php include "../header.php" ?>
<?php session_start(); ?>
<?php
if (isset($_POST['crear'])) {
  $planta = htmlspecialchars($_POST['planta']);
  $aula = htmlspecialchars($_POST['aula']);
  $descripcion = htmlspecialchars($_POST['descripcion']);
  $comentario = htmlspecialchars($_POST['comentario']);
  $fecha_alta = htmlspecialchars($_POST['fecha_alta']);
  $fecha_revision = htmlspecialchars($_POST['fecha_revision']);
  $fecha_resolucion = htmlspecialchars($_POST['fecha_resolucion']);

  $query = "INSERT INTO incidencia(planta, aula, descripcion, fecha_alta, fecha_revision, fecha_resolucion, comentario) VALUES('{$planta}','{$aula}','{$descripcion}','{$fecha_alta}','{$fecha_revision}','{$fecha_resolucion}','{$comentario}')";
  $resultado = mysqli_query($conn, $query);

  if (!$resultado) {
    echo "Algo ha ido mal añadiendo la incidencia: " . mysqli_error($conn);
  } else {
    echo "<script type='text/javascript'>alert('¡Incidencia añadida con éxito!')</script>";
  }
}
if($_SESSION['user']){

} else{
  header("location: ../index.php");
}
?>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
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
          <a href="administracion.php" class='btn  mb-2'> <i class="bi bi-gear"></i> Administración</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<h1 class="text-center">Añadir Incidencias</h1>
<div class="container">
  <form action="" method="post">
    <div class="form-group">
      <label for="planta" class="form-label">Planta</label>
      <input type="text" name="planta" class="form-control">
    </div>
    <div class="form-group">
      <label for="aula" class="form-label">Aula</label>
      <input type="text" name="aula" class="form-control">
    </div>
    <div class="form-group">
      <label for="descripcion" class="form-label">Descripcion</label>
      <input type="text" name="descripcion" class="form-control">
    </div>
    <div class="form-group">
      <label for="fecha_alta" class="form-label">Fecha Alta</label>
      <input type="date" name="fecha_alta" class="form-control">
    </div>
    <div class="form-group">
      <label for="fecha_revision" class="form-label">Fecha Revisión</label>
      <input type="date" name="fecha_revision" class="form-control">
    </div>
    <div class="form-group">
      <label for="fecha_resolucion" class="form-label">Fecha Solución</label>
      <input type="date" name="fecha_resolucion" class="form-control">
    </div>
    <div class="form-group">
      <label for="comentario" class="form-label">Comentario</label>
      <input type="text" name="comentario" class="form-control">
    </div>
    <div class="form-group boton">
      <button type="submit" name="crear" class="btn btn-primary mt-2">Añadir</button>
    </div>
  </form>
</div>


    <style>
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
      }

      .nav-item a {
        color: #fff;
        border: 0px;
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
        top: 47%;
        left: 50%;
        transform: translate(-50%, -50%);
      }

      .container2 {
        position: absolute;
        top: 71%;
        left: 51%;
        transform: translate(-50%, -50%);
        height: 5px;
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
      .boton{
        text-align: center;
      }
      .boton button{
        background-color: #b2bfcf;
        border: 0px;
      }
    </style>