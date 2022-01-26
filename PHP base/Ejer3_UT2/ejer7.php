<?php
/*7.-Rellena un array de 10 enteros con los 10 primeros números naturales. Calcula la media de los que están en posiciones pares y muestra los impares por pantalla.*/
$numeros = array();
$media = 0;
$cont = 0;
for ($i = 1; $i <= 10; $i++) {
    $numeros[$i] = $i;
    $cont++;
}
for ($i = 1; $i <= 10; $i++) {
    if ($i % 2 == 0) {
        $media = $media + $i;
    } else {
        echo " $i <br>";
    }
}
echo "La media de los numeros pares es: " . ($media / $cont);
?>