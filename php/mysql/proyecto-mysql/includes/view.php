<?php  include '../header.php'?>
<?php session_start(); ?>
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
          <a id="enlace_id" href="usuarios.php" class='btn  mb-2'> <i class="bi bi-gear"></i>Usuarios</a>
        </li>
        <li class="nav-item">
          <a id="enlace_id" href="cerrar_session.php" class='btn  mb-2'> <i class="bi bi-gear"></i>Cerrar sesión
          </a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<h1 class="text-center">Detalles de incidencia</h1>
  <div class="container">
    <table class="table table-striped table-bordered table-hover">
      <thead class="table-dark">
        <tr>
              <th  scope="col">ID</th>
              <th  scope="col">Planta</th>
              <th  scope="col">Aula</th>
              <th  scope="col">Descripción</th>
              <th  scope="col">Fecha alta</th>
              <th  scope="col">Fecha revisión</th>
              <th  scope="col">Fecha solución</th>
              <th  scope="col">Comentario</th>
        </tr>  
      </thead>
        <tbody>
          <tr>
               
            <?php
              if (isset($_GET['incidencia_id'])) {
                  $incidenciaid = htmlspecialchars($_GET['incidencia_id']); 
                  $query="SELECT * FROM incidencia WHERE id = {$incidenciaid} LIMIT 1";  
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

                        echo "<tr >";
                        echo " <td >{$id}</td>";
                        echo " <td > {$planta}</td>";
                        echo " <td > {$aula}</td>";
                        echo " <td >{$descripcion} </td>"; 
                        echo " <td >{$fecha_alta} </td>";
                        echo " <td >{$fecha_revision} </td>";
                        echo " <td >{$fecha_resolucion} </td>";
                        echo " <td >{$comentario} </td>";
                        echo " </tr> ";
                  }
                }

                if($_SESSION['user']){

                } else{
                  header("location: ../index.php");
                }
            ?>
          </tr>  
        </tbody>
    </table>
  </div>

  <div class="container text-center mt-5">
    <a href="home.php" class="btn btn-warning mt-5"> Volver </a>
  <div>

<?php include "../footer.php" ?>