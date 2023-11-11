<?php 
//Nombre del servidor
$server_name = "localhost"; 
//Nombre del Usuario
$user_name = "root";
//Contraseña del usuario
$password = "";
//Nombre de mi base de datos.
$database = "system_senati_tiendavirtual";

$conexion = new mysqli($server_name,$user_name,$password,$database);
if($conexion->connect_error){
    die("ERROR CONEXIÓN: ".$conexion->connect_error);
}
// echo "EXITOSO";

?>