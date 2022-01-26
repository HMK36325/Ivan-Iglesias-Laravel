<?php
//Creacion del objeto mysqli

$conexion = new mysqli("localhost", "root", "", "inmobiliaria");
$conexion->set_charset("utf8");
if($conexion -> connect_errno){
    die("Conexion con la base de datos errónea: ".$conexion->connect_error);
    

}

echo "Host info:".$conexion->host_info;


?>