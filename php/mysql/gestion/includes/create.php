<?php include "../header.php" ?>

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
  echo "Algo ha ido mal añadiendo la incidencia: ". mysqli_error($conn);
  }
  else
  {
  echo "<script type='text/javascript'>alert('¡Incidencia añadida con éxito!')</script>";
  }         
}
?>
<h1 class="text-center">Añadir incidencia</h1>
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
    <div class="form-group">
      <button type="submit" name="crear" class="btn btn-primary mt-2">Añadir</button>
    </div>
  </form>
</div>
<div class="container text-center mt-5">
  <a href="home.php" class="btn btn-warning mt-5"> Volver </a>
  <div>
    <?php include "../footer.php" ?>