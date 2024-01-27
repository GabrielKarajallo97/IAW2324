<?php include "../header.php" ?>
<?php session_start(); 
 if ($_SESSION['user']) {

 } else {
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
          <a href="totales.php" class='btn  mb-2'> <i class="bi bi-bookmarks"></i> Incidencias Totales: <?php echo $total?></a>
        </li>
        <li class="nav-item">
          <a href="pendientes.php" class='btn  mb-2'> <i class="bi bi-bookmark-dash"></i> Incidencias Pendientes: <?php echo $totalpendientes?></a>
        </li>
        <li class="nav-item">
          <a href="resueltas.php" class='btn  mb-2'><i class="bi bi-bookmark-check"></i> Incidencias Resueltas: <?php echo $totalresuelta?></a>
        </li>
        <li class="nav-item">
          <a href="administracion.php" class='btn  mb-2'> <i class="bi bi-gear"></i> Administración</a>
        </li>
      </ul>
    </div>
  </div>
</nav>


<h1 class="text-center">Incidencias Totales</h1>
<div class="container">
  <table class="table table-striped table-bordered table-hover">
    <thead class="table">
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Planta</th>
        <th scope="col">Aula</th>
        <th scope="col">Descripción</th>
        <th scope="col">Fecha alta</th>
        <th scope="col">Fecha revisión</th>
        <th scope="col">Fecha solución</th>
        <th scope="col">Comentario</th>
        <th scope="col" colspan="3" class="text-center">Operaciones</th>
      </tr>
    </thead>
    <tbody>
      <tr>

        <?php
        $query = "SELECT * FROM incidencia";
        $vista_incidencias = mysqli_query($conn, $query);

        while ($row = mysqli_fetch_assoc($vista_incidencias)) {
          $id = $row['id'];
          $planta = $row['planta'];
          $aula = $row['aula'];
          $descripcion = $row['descripcion'];
          $fecha_alta = $row['fecha_alta'];
          $fecha_revision = $row['fecha_revision'];
          $fecha_resolucion = $row['fecha_resolucion'];
          $comentario = $row['comentario'];
          echo "<tr >";
          echo " <th scope='row' >{$id}</th>";
          echo " <td > {$planta}</td>";
          echo " <td > {$aula}</td>";
          echo " <td >{$descripcion} </td>";
          echo " <td >{$fecha_alta} </td>";
          echo " <td >{$fecha_revision} </td>";
          echo " <td >{$fecha_resolucion} </td>";
          echo " <td >{$comentario} </td>";
          echo " <td class='text-center'> <a href='view.php?incidencia_id={$id}' class='btn btn-primary'> <i class='bi bi-eye'></i>  </a> </td>";
          echo " <td class='text-center' > <a href='update.php?editar&incidencia_id={$id}' class='btn btn-secondary'><i class='bi bi-pencil'></i>  </a> </td>";
          echo " <td class='text-center'>  <a href='delete.php?eliminar={$id}' class='btn btn-danger'> <i class='bi bi-trash'></i>  </a> </td>";
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
    border: 0px;
    color: #fff;
    margin-right: 10px;
  }

  .config-icon {
    text-align: center;
    position: absolute;
    left: 45%;
    top: 40%;
  }

  .config-icon p {
    color: #fff;
  }

  .config-icon i {
    color: #fff;
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
<?php
if ($_SESSION['user']) {

} else {
  header("location: ../index.php");
}
?>

<?php include "../footer.php" ?>