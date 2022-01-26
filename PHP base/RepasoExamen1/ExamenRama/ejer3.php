<?php
include 'funciones.php';
cabecera("Ejercicio3");

$productos = array ( 'A4500NUR',  'C5000MKL', 'L0100MSA',  'C1000PQA',  'F8000RES', 'I5600PLU');

for ($i=0; $i <count($productos) ; $i++) { 
    $letra=substr($productos[$i],0,1);
    $num=substr($productos[$i],1,4)+2000;
    $cadenaFin=substr($productos[$i],4,7);

    echo "$letra$num$cadenaFin<br>";
}

?>
