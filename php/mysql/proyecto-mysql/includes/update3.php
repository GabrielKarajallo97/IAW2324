<!-- Footer -->
<?php include "../header.php";
session_set_cookie_params(0);
session_start(); 
session_start(); 
if (isset($_SESSION['user']) && $_SESSION['perfil'] === 'direccion' ){
   
} else{
  header("location: ../index.php");
}
?>

<?php
   if(isset($_GET['incidencia_id']))
    {
      $incidenciaid = htmlspecialchars($_GET['incidencia_id']); 
    }
      
      $query="SELECT * FROM incidencia WHERE id = $incidenciaid ";
      $vista_incidencias= mysqli_query($conn,$query);

      while($row = mysqli_fetch_assoc($vista_incidencias))
        {
          $id = $row['id'];                
          $planta = $row['planta'];        
          $aula = $row['aula'];         
          $descripcion = $row['descripcion'];        
          $fecha_alta = $row['fecha_alta'];        
          $fecha_revision = $row['fecha_revision'];        
          $fecha_resolucion = $row['fecha_resolucion'];        
          $comentario = $row['comentario'];
        }
 
    if(isset($_POST['editar'])) 
    {
      $planta = htmlspecialchars($_POST['planta']);
      $aula = htmlspecialchars($_POST['aula']);
      $descripcion = htmlspecialchars($_POST['descripcion']);
      $fecha_alta = htmlspecialchars($_POST['fecha_alta']);
      $fecha_revision = htmlspecialchars($_POST['fecha_revision']);
      $fecha_resolucion = htmlspecialchars($_POST['fecha_resolucion']);
      $comentario = htmlspecialchars($_POST['comentario']);
      $query = "UPDATE incidencia SET planta = '{$planta}' , aula = '{$aula}' , descripcion = '{$descripcion}', fecha_alta = '{$fecha_alta}', fecha_revision = '{$fecha_revision}', fecha_resolucion = '{$fecha_resolucion}', comentario = '{$comentario}' WHERE id = {$id}";
      $incidencia_actualizada = mysqli_query($conn, $query);
      if (!$incidencia_actualizada)
        echo "Se ha producido un error al actualizar la incidencia.";
      else
        echo "<script type='text/javascript'>alert('¡Datos de la incidencia actualizados!')</script>";
    }  
    
    if($_SESSION['user']){

    } else{
      header("location: ../index.php");
    }
?>
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
          <a id="enlace_id" href="cerrar_session.php" class='btn  mb-2'> <i class="bi bi-box-arrow-right"></i> Cerrar sesión
          </a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<h1 class="text-center">Actualizar incidencia</h1>
  <div class="container ">
    <form action="" method="post">
      <div class="form-group">
        <label for="planta" >Planta</label>
        <input type="text" name="planta" class="form-control" value="<?php echo $planta  ?>">
      </div>
      <div class="form-group">
        <label for="aula" >Aula</label>
        <input type="text" name="aula" class="form-control" value="<?php echo $aula  ?>">
      </div>
      <div class="form-group">
        <label for="descripcion" >Descripción</label>
        <input type="text" name="descripcion" class="form-control" value="<?php echo $descripcion  ?>">
      </div>
      <div class="form-group">
        <label for="fecha_alta" >Fecha alta</label>
        <input type="date" name="fecha_alta" class="form-control" value="<?php echo $fecha_alta  ?>">
      </div>
      <div class="form-group">
        <label for="fecha_revision" >Fecha revisión</label>
        <input type="date" name="fecha_revision" class="form-control" value="<?php echo $fecha_revision  ?>">
      </div>
      <div class="form-group">
        <label for="fecha_resolucion" >Fecha solución</label>
        <input type="date" name="fecha_resolucion" class="form-control" value="<?php echo $fecha_resolucion  ?>">
      </div>
      <div class="form-group">
        <label for="comentario" >Comentario</label>
        <input type="text" name="comentario" class="form-control" value="<?php echo $comentario  ?>">
      </div>
      <div class="form-group">
         <input type="submit"  name="editar" class="btn btn-primary mt-2" value="editar">
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
    /* background-color: #534859; */
    background: #092756;
    background: -moz-radial-gradient(0% 100%, ellipse cover, rgba(104, 128, 138, .4) 10%, rgba(138, 114, 76, 0) 40%), -moz-linear-gradient(top, rgba(57, 173, 219, .25) 0%, rgba(42, 60, 87, .4) 100%), -moz-linear-gradient(-45deg, #670d10 0%, #092756 100%);
    background: -webkit-radial-gradient(0% 100%, ellipse cover, rgba(104, 128, 138, .4) 10%, rgba(138, 114, 76, 0) 40%), -webkit-linear-gradient(top, rgba(57, 173, 219, .25) 0%, rgba(42, 60, 87, .4) 100%), -webkit-linear-gradient(-45deg, #670d10 0%, #092756 100%);
    background: -o-radial-gradient(0% 100%, ellipse cover, rgba(104, 128, 138, .4) 10%, rgba(138, 114, 76, 0) 40%), -o-linear-gradient(top, rgba(57, 173, 219, .25) 0%, rgba(42, 60, 87, .4) 100%), -o-linear-gradient(-45deg, #670d10 0%, #092756 100%);
    background: -ms-radial-gradient(0% 100%, ellipse cover, rgba(104, 128, 138, .4) 10%, rgba(138, 114, 76, 0) 40%), -ms-linear-gradient(top, rgba(57, 173, 219, .25) 0%, rgba(42, 60, 87, .4) 100%), -ms-linear-gradient(-45deg, #670d10 0%, #092756 100%);
    background: -webkit-radial-gradient(0% 100%, ellipse cover, rgba(104, 128, 138, .4) 10%, rgba(138, 114, 76, 0) 40%), linear-gradient(to bottom, rgba(57, 173, 219, .25) 0%, rgba(42, 60, 87, .4) 100%), linear-gradient(135deg, #670d10 0%, #092756 100%);
    filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#3E1D6D', endColorstr='#092756', GradientType=1)
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
    background-color: #f3f4f5;
    border-radius: 8px;
    padding: 30px;
    border: 0px;
    box-shadow: 20px 30px 50px rgba(1, 1, 1, 0.5);
    position: relative;
    top: 10%;
    max-width: 700px;
    left: 0%;
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


  .btn-danger {
    color: #fff;
    background-color: #b2bfcf;
    border: 0px;
  }
<?php include "../footer.php" ?>