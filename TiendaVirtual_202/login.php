<?php
#ESTO ES PARA QUE CUANDO INGRESE CON MI USUARIO , YA NO ME VUELVA A MOSTRAR LOGIN
session_start();
if (isset($_SESSION['user'])) {
    header('Location: index.php');
}

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="shortcut icon" href="img/icono-tienda.png" type="image/png">
    <link rel="stylesheet" href="css/pageLoader.css">
    <script>
        /* 
        Este código JavaScript se encarga de ocultar una animación de carga (loader) cuando la página ha terminado de cargarse completamente. 
        */
        window.addEventListener("load", () => {
            //Selecciona el elemento HTML que tiene la clase "loader" y lo almacena en la variable loader. 
            const loader = document.querySelector(".loader");
            //Agrega la clase "loader--hidden" al elemento con la clase "loader".
            loader.classList.add("loader--hidden");
            // Agrega un evento que se activa cuando la transición del elemento loader ha finalizado. 
            loader.addEventListener("transitionend", () => {
                // Elimina el elemento loader del DOM (Documento Object Model), es decir, quita el elemento de la página. Esto se hace después de que la transición ha finalizado y la animación de carga se ha ocultado, asegurándose de que el elemento ya no sea necesario.
                document.body.removeChild(loader);
            });
        });
    </script>
</head>

<body>
    <!-- PAGE LOADER -->
    <div class="loader"></div>

    <!--CONTENEDOR DEL LOGIN-->
    <div class="container-fluid py-5 mt-5">
        <div class="row">
            <div class="col-6 col-lg-4 mx-auto">
                <div class="shadow p-4 bg-body-tertiary rounded border border-black">
                    <p class="fw-bold fs-1 text-center">TIENDA VIRTUAL</p>
                    <form action="conexBDLogin.php" method="post">
                        <div class="col-md-12 mt-3">
                            <label for="inputCorreo" class="col-sm-12 col-form-label col-form-label-lg fw-medium">Correo electronico</label>
                            <input type="email" name="correo" class="form-control form-control-lg" id="inputCorreo" aria-describedby="correoHelp">
                        </div>
                        <div class="col-md-12 mt-3">
                            <label for="exampleInputPassword" class="col-sm-12 col-form-label col-form-label-lg fw-medium">Contraseña</label>
                            <input type="password" name="clave" class="form-control form-control-lg" id="exampleInputPassword">
                        </div>
                        <div class="col-md-12 mt-3">
                            <div class="d-grid gap-2 mt-2">
                                <input type="submit" class="btn btn-primary btn-lg" value="INICIAR SESION">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>


</body>

</html>