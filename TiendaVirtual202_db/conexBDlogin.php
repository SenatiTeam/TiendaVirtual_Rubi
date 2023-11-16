<?php
require_once('conexion.php');

$correo = $_POST['correo'];
$clave = $_POST['clave'];

// echo $correo . " ____ " .$clave;

//Consultamos al usuario mediante un "script" a la base de d
$sql = "SELECT * FROM usuario";
$resultado = $conexion->query($sql);

//Esto es una condicional donde nos brida los numeros de mi 
// if($resultado->num_rows > 0){
//     echo "Las filas devueltas son " .$resultado->num_rows;
//     // die();
// }


$ruta = "";
$encontrados = 0;
//Consultamos todos los datos y mostramos mediante un ARRAY 
while($row=$resultado->fetch_array(MYSQLI_ASSOC))
{
    // print_r($row);
    
    if( ($row['email_user']==$correo) AND ($row['password_user']==$clave)){
        session_start();
        $_SESSION['datos']=$row;
        $encontrados = 1;
        break;
    }else{
        $encontrados = 0;
    }
}
######
/* Hacemos una condicional preguntando si "encontrados" es 1
nos vuelva a pedir nuestro usuario o clave */

if($encontrados == 1) {
    $ruta = 'Location: index.php';
    header($ruta);
    exit();
}else{
    $ruta = 'Location: login.php ';
    header($ruta);
    exit();
}

?>
