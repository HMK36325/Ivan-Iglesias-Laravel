<?php
/*9.-Muestra el primer array del ejercicio anterior en orden inverso.*/ 
$array1 = array("Lagartija", "Araña", "Perro", "Gato", "Ratón");
$array2 = array(12, 34, 45, 52, 12);
$array3 = array("Sauce", "Pino", "Naranjo", "Chopo", "Perro", 34);

$merge = array_merge($array1, $array2, $array3);

$merge_reverse= array_reverse($merge);

foreach ($merge_reverse as $value) {
    echo "$value<br>";
}

?>