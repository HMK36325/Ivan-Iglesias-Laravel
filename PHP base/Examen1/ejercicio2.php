<?php
include 'funciones.php';
cabecera("Ejercicio 2 Ivan Iglesias Perez");

$deportes= array("Acuáticos" => array("natación", "saltos", "1500braza", "1000mariposa"), "Ateletismo" => array("vallas", "1000m", "salto de altura"));

foreach ($deportes as $key => $value) {
    echo "$key: ";
    foreach ($value as $key2 => $value2) {
        echo "$value2, ";
    }
    echo "<br>";
}




?>