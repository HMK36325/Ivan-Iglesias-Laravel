<?php
/*Escribe un programa que invierta horizontalmente cualquier matriz.
Utiliza la función: array_reverse() y recorre el invertido con un foreach().
Por ejemplo:
Matriz Resultado
8 7 6 5   3 4 5 7
1 2 4 9   1 2 4 9
3 4 5 7   8 7 6 5*/

$matriz=array(array(8,7,6,5),array(1,2,4,9),array(3,4,5,7));

$matriz1=array_reverse($matriz);

foreach ($matriz1 as $key => $value) {
    foreach ($value as $val) {
        echo "$val ";
    }
    echo "<br>";
}
?>