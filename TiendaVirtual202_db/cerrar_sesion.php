<?php
// Iniciar la sesión si no está iniciada
session_start(); 
// Destruir la sesión
session_destroy();
// Redireccionar a la página de inicio de sesión u otra página
header("Location: login.php");
exit();
?>