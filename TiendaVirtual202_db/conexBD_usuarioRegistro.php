<?php
//Importamos la conexion; 
require_once("conexion.php");
//Variable¿s
$nombre_usuario = $_POST['nombreU'];
$correo_usuario = $_POST['emaillU'];
$clave_usuario = $_POST['claveU'];
$roles_usuario = $_POST['rolesU'];
/*
echo $nombre_usuario ."____" . $correo_usuario . "<br>";
echo $clave_usuario ."____" . $roles_usuario;
*/


/*====CODIGO sql - MEDIANTE SCRIPT ===*/
$sql_codigo = "INSERT INTO usuario(name_user,email_user,password_user,roles_user) VALUES('$nombre_usuario','$correo_usuario','$clave_usuario','$roles_usuario')";

$resultado = $conexion->query($sql_codigo) or die($conexion->connect_error);
if($resultado){
    echo"Registro insertado exitosamente.";
}else{
    echo"error: " . $conexion->error;
}
//cerramos la conexion, siempre utilizamos esto cada vez que usamos un registro
$conexion->close();
?>