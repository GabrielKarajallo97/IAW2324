<?php include "../header.php" ?>
<?php 
session_set_cookie_params(0);
session_start(); 
if (!isset($_SESSION['user']) || $_SESSION['perfil'] !== 'administrador' ){
  header("location: ../index.php");
}
 
if (isset($_POST['crear'])) {
  $planta = htmlspecialchars($_POST['planta']);
  $aula = htmlspecialchars($_POST['aula']);
  $descripcion = htmlspecialchars($_POST['descripcion']);
  $comentario = htmlspecialchars($_POST['comentario']);
  $fecha_alta = htmlspecialchars($_POST['fecha_alta']);
  $fecha_revision = htmlspecialchars($_POST['fecha_revision']);
  $fecha_resolucion = htmlspecialchars($_POST['fecha_resolucion']);

  $usuario = $_SESSION["user"];
  $query = "INSERT INTO incidencia(usuario, planta, aula, descripcion, fecha_alta, fecha_revision, fecha_resolucion, comentario) VALUES('{$usuario}', '{$planta}','{$aula}','{$descripcion}','{$fecha_alta}','{$fecha_revision}','{$fecha_resolucion}','{$comentario}')";
  $resultado = mysqli_query($conn, $query);

  if (!$resultado) {
    echo "Algo ha ido mal añadiendo la incidencia: " . mysqli_error($conn);
  } else {
    if (!empty($fecha_resolucion)) {
      // Obtener el correo electrónico del usuario
      $query_usuario = "SELECT email FROM usuario WHERE username = '{$usuario}'";
      $resultado_usuario = mysqli_query($conn, $query_usuario);
      $row_usuario = mysqli_fetch_assoc($resultado_usuario);
      $email_usuario = $row_usuario['email'];

      // Enviar correo electrónico al usuario
      $to = $email_usuario;
      $subject = "Incidencia Resuelta";
      $message = "Estimado $usuario,\n\nTu incidencia ha sido resuelta. ¡Gracias por tu paciencia!";
      $headers = "From: gabrielkarajallo97@iesamachado.org";

      mail($to, $subject, $message, $headers);
    }
    echo "<script type='text/javascript'>alert('¡Incidencia añadida con éxito!')</script>";
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
          <a id="enlace_id" href="administracion.php" class='btn  mb-2'> <i class="bi bi-gear"></i> Administración</a>
        </li>
        <li class="nav-item">
          <a id="enlace_id" href="usuarios.php" class='btn  mb-2'> <i class="bi bi-person-badge-fill"></i> Usuarios</a>
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
        <label for="planta" class="form-label">Planta</label>
        <select name="planta" id="planta" class="form-select" aria-label="Default select example">
        <option value="" selected disabled>Seleccione Planta</option>
          <option value="baja">Baja</option>
          <option value="primera">Primera</option>
          <option value="segunda">Segunda</option>
        </select>
      </div>

      <div class="form-group">
        <label for="aula" class="form-label">Aula</label>
    <select name="aula" id="aula" class="form-select" aria-label="Default select example" required>
      <option value="" selected disabled>Seleccione Aula</option>
    </select>
      </div>
    <script>
  document.getElementById('planta').addEventListener('change', function() {
    var planta = this.value;
    var aulaSelect = document.getElementById('aula');
    aulaSelect.innerHTML = ''; // Limpiar las opciones anteriores

    if (planta === 'baja') {
      addOption(aulaSelect, '1', 'Aula 1');
      addOption(aulaSelect, '2', 'Aula 2');
      addOption(aulaSelect, '3', 'Aula 3');
    } else if (planta === 'primera') {
      addOption(aulaSelect, '10', 'Aula 10');
      addOption(aulaSelect, '20', 'Aula 20');
      addOption(aulaSelect, '30', 'Aula 30');
    } else if (planta === 'segunda') {
      addOption(aulaSelect, '100', 'Aula 100');
      addOption(aulaSelect, '200', 'Aula 200');
      addOption(aulaSelect, '300', 'Aula 300');
    }
  });

  function addOption(selectElement, value, text) {
    var option = document.createElement('option');
    option.value = value;
    option.textContent = text;
    selectElement.appendChild(option);
  }
</script>

        <div class="form-group">
          <label for="descripcion" class="form-label">Descripcion</label>
          <input type="text" name="descripcion" class="form-control" required>
        </div>
        <div class="form-group">
          <label for="fecha_alta" class="form-label">Fecha Alta</label>
          <input type="date" name="fecha_alta" class="form-control" required>
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
</div>
<h1 class="text-center">Añadir Incidencias</h1>



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