<?php
/*.- Crea un array asociativo para introducir los datos de una persona. Al acabar muestra los datos por 
pantalla.
Nombre: Pedro Torres
Dirección: C/Mayor 37
Telefono: 123456789
*/
$array=array("Nombre"=>"Pedro Torres","Dirección"=>"C/Mayor 37","Telefono"=>"123456789");

foreach ($array as $key => $value) {
    echo "$key: $value<br>";
}
?>