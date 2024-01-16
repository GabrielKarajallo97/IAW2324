<?php include "../header.php";
session_start(); ?>
<?php 
     if(isset($_GET['eliminar']))
     {
         $id= htmlspecialchars($_GET['eliminar']);
         $query = "DELETE FROM incidencia WHERE id = {$id}"; 
         $delete_query= mysqli_query($conn, $query);
         // header("Location: home.php");
         echo "<script>window.location='home.php';</script>";
     }

     if($_SESSION['user']){

     } else{
       header("location: ../index.php");
     }
     if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      // Verificar que el botón específico se haya presionado
      if (isset($_POST['nombre_de_tu_boton'])) {
        header("location: ../index.php");
      }
    }
?>
<?php include "../footer.php" ?>