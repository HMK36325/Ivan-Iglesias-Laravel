<?php
/*8.-Rellena  los  siguientes  tres  arraysy  júntalos  en  uno  nuevo.  Muestra el  resultado  por pantalla.
  Utiliza  la función
   array_merge()Lagartija, Araña, Perro, Gato, Ratón,12, 34, 45, 52, 12,Sauce, Pino, Naranjo, Chopo, Perro, 34 */

$array1 = array("Lagartija", "Araña", "Perro", "Gato", "Ratón");
$array2 = array(12, 34, 45, 52, 12);
$array3 = array("Sauce", "Pino", "Naranjo", "Chopo", "Perro", 34);

$merge = array_merge($array1, $array2, $array3);

foreach ($merge as $value) {
    echo "$value<br>";
}

?>