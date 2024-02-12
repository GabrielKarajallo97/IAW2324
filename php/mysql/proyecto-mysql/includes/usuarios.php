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
                    <a href="totales.php" class='btn  mb-2'> <i class="bi bi-bookmarks"></i> Incidencias Totales:
                        <?php echo $total ?>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="pendientes.php" class='btn  mb-2'> <i class="bi bi-bookmark-dash"></i> Incidencias
                        Pendientes:
                        <?php echo $totalpendientes ?>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="resueltas.php" class='btn  mb-2'><i class="bi bi-bookmark-check"></i> Incidencias
                        Resueltas:
                        <?php echo $totalresuelta ?>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="administracion.php" class='btn  mb-2'> <i class="bi bi-gear"></i> Administración</a>
                </li>
            </ul>
        </div>
    </div>
</nav>


<div class="container">
    <table class="table table-striped table-bordered table-hover">
        <thead class="table">
            <tr>
                <th scope="col">Usuario</th>
                <th scope="col">Perfil</th>
                <th scope="col" colspan="3" class="text-center">Operaciones</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <?php
                $query = "SELECT * FROM usuarios";
                $vista_usuarios = mysqli_query($conn, $query);

                while ($row = mysqli_fetch_assoc($vista_usuarios)) {
                    $username = $row['username'];
                    $perfil = $row['perfil'];
                    echo "<tr >";
                    echo " <td > {$username}</td>";
                    echo " <td > {$perfil}</td>";
                    echo " <td class='text-center'>  <a href='borrar_usuarios.php?eliminar={$username}' class='btn btn-danger'> <i class='bi bi-trash'></i>  </a> </td>";
                    echo " </tr> ";
                }
                ?>


            </tr>
        </tbody>
    </table>
</div>