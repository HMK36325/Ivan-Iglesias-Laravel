<?php
/*5.- Crea un array introduciendo las ciudades: Madrid, Barcelona, Londres, New York, Los Angeles y Chicado, 
sin asignar índices. A continuación muestra el contenido del array indicando el valor correspondiente a cada 
índice.
La ciudad con el índice 0 tiene de nombre Madrid
*/
$ciudades=array("Madrid", "Barcelona", "Londres", "New York", "Los Angeles", "Chicado");
foreach ($ciudades as $key => $value) {
    echo "La ciudad con el índice $key tiene el nombre $value<br><br>";
}
?>