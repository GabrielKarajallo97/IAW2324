<!-- Header -->
<?php include "../header.php" ?>
<?php 
session_set_cookie_params(0);
session_start(); 
if (isset($_SESSION['user']) && $_SESSION['perfil'] === 'direccion' ){
  
}else{
  header("location: ../index.php");
}
?>
<header>
<?php
setlocale(LC_TIME, 'es_ES.UTF-8');
$usuario = $_SESSION['user'];
$sql_select = "SELECT ultima_sesion FROM usuarios WHERE username= '$usuario'";
$result = $conn->query($sql_select);
if ($result->num_rows > 0) {
  // Mostrar la última sesión
  while ($row = $result->fetch_assoc()) {
    $ultima_sesion = strtotime($row["ultima_sesion"]);
    $timestamp = $ultima_sesion + (5 * 3600);
    $fecha_formato = strftime('%e de %B de %Y a las %H:%M', $timestamp);
  }
}
?>
    <p class="cabecera">Conectado como: <?php echo $_SESSION["user"];?> como  <?php echo $_SESSION["perfil"];?></p>
    <p class="cabecera">Última sesión iniciada: <?php echo $fecha_formato; ?></p>
</header>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
  <?php
            $user_direc = $_SESSION['user'];

            $totalq = "SELECT COUNT(*) as total FROM incidencia WHERE usuario = '$user_direc'";
            $resultado = mysqli_query($conn, $totalq);
            $total = mysqli_fetch_assoc($resultado)['total'];

            $totalp = "SELECT COUNT(*) as total FROM incidencia WHERE fecha_resolucion = '0000-00-00' AND usuario = '$user_direc'";
            $resultado = mysqli_query($conn, $totalp);
            $totalpendientes = mysqli_fetch_assoc($resultado)['total'];

            $totalr = "SELECT COUNT(*) as total FROM incidencia WHERE fecha_resolucion <> '0000-00-00' AND usuario = '$user_direc'";
            $resultado = mysqli_query($conn, $totalr);
            $totalresuelta = mysqli_fetch_assoc($resultado)['total'];

  ?>
    <!-- <a class="navbar-brand" href="#">Incidencias</a> -->
    <div class="collapse navbar-collapse" id="navbarText">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a href="home3.php" class='btn  mb-2'> <i class="bi bi-house"></i> Inicio </a>
        </li>
        <li class="nav-item">
          <a href="create3.php" class='btn  mb-2'> <i class="bi bi-patch-plus"></i> Añadir
            incidencia</a>
        </li>
        <li class="nav-item">
          <a href="" class='btn  mb-2'> <i class="bi bi-bookmarks"></i> Incidencias Totales: <?php echo $total?></a>
        </li>
        <li class="nav-item">
          <a href="" class='btn  mb-2'> <i class="bi bi-bookmark-dash"></i> Incidencias Pendientes: <?php echo $totalpendientes?></a>
        </li>
        <li class="nav-item">
          <a href="" class='btn  mb-2'><i class="bi bi-bookmark-check"></i> Incidencias Resueltas: <?php echo $totalresuelta?></a>
        </li>
        <li class="nav-item">
          <a id="enlace_id" href="cerrar_session.php" class='btn  mb-2'> <i class="bi bi-person-badge-fill"></i> Cerrar sesión</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<h1 class="text-center">¡Bienvenido  <?php echo $_SESSION["user"] . "!"; ?> </h1>
<div class="container">
  <table class="table table-striped table-bordered table-hover">
    <thead class="table">
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Usuario</th>
        <th scope="col">Planta</th>
        <th scope="col">Aula</th>
        <th scope="col">Descripción</th>
        <th scope="col">Fecha alta</th>
        <th scope="col"><a href="home3_revision.php">Fecha revisión</a></th>
        <th scope="col"><a href="home3_resolucion.php">Fecha solución</a></th>
        <th scope="col">Comentario</th>
        <th scope="col" colspan="3" class="text-center">Operaciones</th>
      </tr>
    </thead>
    <tbody>
      <tr>

        <?php
        $query = "SELECT * FROM incidencia WHERE usuario = '" . $_SESSION['user'] . "'";

        $vista_incidencias = mysqli_query($conn, $query);

        while ($row = mysqli_fetch_assoc($vista_incidencias)) {
          $id = $row['id'];
          $usuario = $row['usuario'];
          $planta = $row['planta'];
          $aula = $row['aula'];
          $descripcion = $row['descripcion'];
          $fecha_alta = $row['fecha_alta'];
          $fecha_revision = $row['fecha_revision'];
          $fecha_resolucion = $row['fecha_resolucion'];
          $comentario = $row['comentario'];
          echo "<tr >";
          echo " <th scope='row' >{$id}</th>";
          echo " <th scope='row' >{$usuario}</th>";
          echo " <td > {$planta}</td>";
          echo " <td > {$aula}</td>";
          echo " <td >{$descripcion} </td>";
          echo " <td >{$fecha_alta} </td>";
          echo " <td >{$fecha_revision} </td>";
          echo " <td >{$fecha_resolucion} </td>";
          echo " <td >{$comentario} </td>";
          echo " <td class='text-center'> <a href='view3.php?incidencia_id={$id}' class='btn btn-primary'> <i class='bi bi-eye'></i>  </a> </td>";
          echo " <td class='text-center' > <a href='update3.php?editar&incidencia_id={$id}' class='btn btn-secondary'><i class='bi bi-pencil'></i>  </a> </td>";
          //echo " <td class='text-center'>  <a href='delete.php?eliminar={$id}' class='btn btn-danger'> <i class='bi bi-trash'></i>  </a> </td>";
          echo " </tr> ";
        }
        
        ?>
      </tr>
    </tbody>
  </table>
</div>
    <style>
      body {
        display: block;
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin: 0;
        /* background-color: #534859; */
        background: #092756;
        background: -moz-radial-gradient(0% 100%, ellipse cover, rgba(104, 128, 138, .4) 10%, rgba(138, 114, 76, 0) 40%), -moz-linear-gradient(top, rgba(57, 173, 219, .25) 0%, rgba(42, 60, 87, .4) 100%), -moz-linear-gradient(-45deg, #670d10 0%, #092756 100%);
        background: -webkit-radial-gradient(0% 100%, ellipse cover, rgba(104, 128, 138, .4) 10%, rgba(138, 114, 76, 0) 40%), -webkit-linear-gradient(top, rgba(57, 173, 219, .25) 0%, rgba(42, 60, 87, .4) 100%), -webkit-linear-gradient(-45deg, #670d10 0%, #092756 100%);
        background: -o-radial-gradient(0% 100%, ellipse cover, rgba(104, 128, 138, .4) 10%, rgba(138, 114, 76, 0) 40%), -o-linear-gradient(top, rgba(57, 173, 219, .25) 0%, rgba(42, 60, 87, .4) 100%), -o-linear-gradient(-45deg, #670d10 0%, #092756 100%);
        background: -ms-radial-gradient(0% 100%, ellipse cover, rgba(104, 128, 138, .4) 10%, rgba(138, 114, 76, 0) 40%), -ms-linear-gradient(top, rgba(57, 173, 219, .25) 0%, rgba(42, 60, 87, .4) 100%), -ms-linear-gradient(-45deg, #670d10 0%, #092756 100%);
        background: -webkit-radial-gradient(0% 100%, ellipse cover, rgba(104, 128, 138, .4) 10%, rgba(138, 114, 76, 0) 40%), linear-gradient(to bottom, rgba(57, 173, 219, .25) 0%, rgba(42, 60, 87, .4) 100%), linear-gradient(135deg, #670d10 0%, #092756 100%);
        filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#3E1D6D', endColorstr='#092756', GradientType=1)
      }

      /*-----------Contenedor--------------*/
      .container {
        background-color: #f3f4f5;
        border-radius: 8px;
        padding: 0px;
        border: 0px;
        box-shadow: 20px 30px 50px rgba(1, 1, 1, 0.5);
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

      /*----------NAV--------------------*/
      nav {
    position: absolute;
    left: 50%;
    margin-top: 50px;
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

      /*------Tabla--------*/
      .nombre-tabla {
        border-style: none;
        vertical-align: middle;
        background-color: #b2bfcf;
        border-top-left-radius: 8px;
      }

      .table>thead {
        vertical-align: middle;
      }

      thead {
        background-color: #b2bfcf;
      }

      tbody,
      td,
      tfoot,
      th,
      thead,
      tr {
        border-color: inherit;
        border-style: none;
        border-width: 0;
        padding: 10px;
      }


      /*------------------Boton VOLVER------------------- */
      .mt-5 a {
        /* margin-top: 3rem!important; */
        border: 0px;
        background-color: #b2bfcf;
        box-shadow: 20px 30px 50px rgba(1, 1, 1, 0.5);
      }

      /*------------OPERACIONES----------------*/
      .btn-primary {
        color: #fff;
        background-color: #b2bfcf;
        border: 0px;
      }

      .btn-secondary {
        color: #fff;
        background-color: #b2bfcf;
        border: 0px;
      }

      .btn-danger {
        color: #fff;
        background-color: #b2bfcf;
        border: 0px;
      }

    </style>

    <?php include "../footer.php" ?>