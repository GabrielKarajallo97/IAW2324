<!-- Footer -->
<?php include "../header.php"?>

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

    <div class="container text-center mt-5">
      <a href="home.php" class="btn btn-warning mt-5"> Volver </a>
    <div>

<?php include "../footer.php" ?>