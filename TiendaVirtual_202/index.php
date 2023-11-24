<?php
session_start();
if (isset($_SESSION['datos'])) {
    //CREAMOS VARIABLES y LLAMAMOS LOS DATOS DEL USUARIO
    $nombre = $_SESSION['datos']['name_user'];
    $rol = $_SESSION['datos']['roles_user'];
} else {
    header('Location: login.php');
}
?>


<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tienda Virtual - Gabriel OL</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="shortcut icon" href="img/icono-tienda.png" type="image/png">
</head>

<body>
    <!--======menu======-->
    <div class="container-fluid bg-dark">
        <nav class="navbar navbar-expand-lg bg-dark border-bottom border-body" data-bs-theme="dark">
            <div class="container">
                <a class="navbar-brand" href="#">
                    <img src="img/icono-tienda.png" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">
                    Tienda Virtual <?php echo $nombre; ?>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarText">
                    <ul class="navbar-nav mb-2 mb-lg-0">
                        <?php
                        if ($rol == "Administrador") {

                        ?>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Ventas</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Productos</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Clientes</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Proveedor</a>
                            </li>

                        <?php
                        } else {

                        ?>

                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="#">Inicio</a>
                            </li>
                        <?php
                        }
                        ?>
                        <li class="nav-item">
                            <a class="nav-link" href="cerrar_sesion.php">
                                <img width="30" height="30" src="https://img.icons8.com/office/80/shutdown--v1.png" alt="shutdown--v1" />
                            </a>
                        </li>

                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <!--===PRINCIPAL===-->
    <div class="container my-5">
        <div class="row">
            <!--====Aqui va ir el formulario de registro de usuario====-->
            <div class="col-md-4">
                <h2 class="text-center">Registrar Usuario</h2>
                <form action="conexBD_usuarioRegistro.php" method="POST">
                    <div class="mb-3">
                        <label for="exampleInputNombre" class="form-label">Nombre</label>
                        <input type="text" name="nombreU" placeholder="Ingrese le nombre del usuario" class="form-control" id="exampleInputNombre" aria-describedby="nombreHelp">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">correo electronico</label>
                        <input type="email" name="emaillU" placeholder="Ingrese su correo electronico" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">contraseña</label>
                        <input type="password" name="claveU" placeholder="Ingrese su contraseña" class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputRoles" class="form-label">Roles</label>
                        <select name="rolesU" id="exampleInputRoles" class="form-select" aria-label="Default select example">
                            <option selected>Seleccionar el rol del usuario</option>
                            <option value="">Administrador</option>
                            <option value="">Cliente</option>
                        </select>

                    </div>
                    <button type="submit" class="btn btn-primary">Enviar datos</button>
                </form>


            </div>
            <!--====Aqui va ir la tablas de rporte====-->
            <div class="col-md-8 border-start border-5 border-dark">
                <?php
                require_once('conexion.php');
                $sql = "SELECT * FROM usuario";
                $resultado = $conexion->query($sql);
                $numeroDeUsuario = $resultado->num_rows; // Consulta la cantidad de datos de la tabla
                echo "<h2>Reporte | Número de registro es : " . $numeroDeUsuario  . "</h2>";
                echo "<table class='table'>
                <thead>
                <tr>
                    <th>#</th>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Roles</th>
                </tr>
                </thead>
                <tbody>";
                while ($datos = $resultado->fetch_array(MYSQLI_ASSOC)) {
                    echo "<tr>";
                    echo "<td>" . $datos['id_usuario'] . "</td>";
                    echo "<td>" . $datos['name_user'] . "</td>";
                    echo "<td>" . $datos['email_user'] . "</td>";
                    echo "<td>" . $datos['roles_user'] . "</td>";
                    echo "</tr>";
                }
                echo "<tbody>
                    </table>";
                ?>

            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>
