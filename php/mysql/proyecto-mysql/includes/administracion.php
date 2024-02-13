<?php include "../header.php" ?>
<?php session_start(); 
if ($_SESSION['user']) {

} else {
  header("location: ../index.php");
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


<div class="titulo">
  <h1 class="text-center">Crear Usuario</h1>
</div>
<div class="container mt-5">
  <h3 class="text-center"> IES Antonio Machado</h3>
  <div class="formulario">
    <form method="post">
    <div class="mb-3">
        <label for="usuario" class="form-label">Perfil</label>
        <select name="perfil" class="form-select" aria-label="Default select example">
          <option selected>Seleccione Perfil</option>
          <option value="direccion">Dirección</option>
          <option value="profesor">Profesor</option>
          <option value="administrador">Administrador</option>
      </select>
      </div>
      <div class="mb-3">
        <label for="usuario" class="form-label">Usuario</label>
        <input type="text" name="username" class="form-control">
      </div>
      <div class="mb-3">
        <label for="gmail" class="form-label">Gmail</label>
        <input type="email" name="gmail" class="form-control">
      </div>
      <div class="mb-3">
        <label for="contrasena" class="form-label">Contraseña</label>
        <input type="password" name="password" class="form-control">
      </div>
      <div class="mb-2">
        <button type="submit" class="boton btn btn-primary">Crear</button>
      </div>
    </form>
  </div>
</div>


<?php

    // Conexion con la base de datos
    if (array_key_exists('username',$_POST) OR array_key_exists('password',$_POST))
    {
        $enlace = mysqli_connect("sql311.thsite.top","thsi_35760646","?Qy3?f1l","thsi_35760646_proyecto_mysql");
        if (mysqli_connect_error()) {
            die("Hubo un error en la conexión, inténtelo más tarde");
        }
        if ($_POST['username']=='')
        {
            echo "<p>El nombre de usuario es obligatorio</p>";
        }
        else if ($_POST['gmail']=='')
        {
            echo "<p>El gmail es obligatorio</p>";
        }
        else if ($_POST['perfil']=='')
        {
            echo "<p>El perfil es obligatorio</p>";
        }
        else if ($_POST['password']=='')
        {
            echo "<p>La contraseña es obligatoria</p>";
        }
        else
        {
            // El usuario ha rellenado ambos campos
            $query = "SELECT username FROM usuarios WHERE username='".mysqli_real_escape_string($enlace,$_POST['username'])."'";
            $result = mysqli_query($enlace,$query);

            if (mysqli_num_rows($result)> 0)
            {
                echo "<p>Ese nombre de usuario ya está registrado. Intenta con otro</p>";

              } else {

                // Añadir a nuestro usuario a la BD
                $query="INSERT INTO usuarios (username, password, perfil, gmail) VALUES('".mysqli_real_escape_string($enlace,$_POST['username'])."','".mysqli_real_escape_string($enlace,base64_encode($_POST['password']))."','".mysqli_real_escape_string($enlace,$_POST['perfil'])."', '".mysqli_real_escape_string($enlace,$_POST['gmail'])."')";
               if (mysqli_query($enlace,$query)){
                    echo "<p>Usuario añadido</p>";     
                }
                else
                {
                    echo "<p>Hubo algún problema al añadir el usuario. Inténtelo más tarde</p>";
                }
            }
        }
    }

?>

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
        
        width: 100%;
      }

      .nav-item a {
        border: 0px;
        color: #fff;
        margin-right: 10px;
      }
 /*-------------Formulario-----------*/
 .formulario {
    width: 90%;
    margin: 0 auto;
  }

  .form-control {
    width: 100%;
    /* Ocupa todo el ancho del contenedor */
    height: 40px;
    padding: 10px;
    /* Ajusta el relleno según tus necesidades */
    border-radius: 10px;
  }

  @keyframes fadeIn {
    from {
      opacity: 0;
      transform: translateY(-10px);
    }

    to {
      opacity: 1;
      transform: translateY(0);
    }
  }

  .custom-alert {
    display: flex;
    align-items: center;
    background-color: #e2f1ff;
    /* Cambia el color de fondo según tus preferencias */
    border: 1px solid #4b85bb;
    /* Borde ligero */
    border-radius: 5px;
    /* Bordes redondeados */
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    /* Sombra con color transparente */
    padding: 10px;
    /* Relleno interno */
    max-width: 250px;
    /* Ancho máximo del contenedor */
    animation: fadeIn 0.5s ease-out;
    /* Aplica la animación */
  }

  .custom-alert svg {
    width: 20px;
    /* Tamaño del icono */
    height: 20px;
    margin-right: 8px;
    /* Espacio entre el icono y el texto */
    fill: #1c5a91;
    /* Color del icono */
  }

  .custom-alert div {
    font-size: 14px;
    /* Tamaño del texto */
    color: #1c5a91;
    /* Color del texto */
  }

  /*----------Contenedor--------*/
  .container {
    width: 100%;
    max-width: 300px;
    padding: 30px;
    border-radius: 7px;
    /* Bordes redondeados */
    box-shadow: 20px 30px 50px rgba(1, 1, 1, 0.3);
    margin: 20px;
    background-color: #f3f4f5;
    position: absolute;
    top: 40%;
    left: 50%;
    transform: translate(-50%, -50%);
  }

  .container2 {
    position: absolute;
    top: 53%;
    left: 51%;
    transform: translate(-50%, -50%);
    height: 5px;
  }

  /*------------Titulo------------*/
  .titulo {
    position: absolute;
    top: 10%;
    left: 50%;
    transform: translate(-50%, -50%);
  }

  h1 {
    font-family: 'Paytone One', sans-serif;
    color: #fff;
    text-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
    letter-spacing: 1px;
    text-align: center;
    margin-bottom: 20px;
  }

  h3 {
    font-family: 'Norican', cursive;
    color: #25424c;
    margin-bottom: 30px;
  }

  /*----------Boton------------*/
  .mb-2 {
    text-align: center;
  }

  .boton {
    background-color: #b2bfcf;
    border: 0px;
    padding: 10px;
    font-weight: bold;
  }
</style>

<?php include "../footer.php" ?>