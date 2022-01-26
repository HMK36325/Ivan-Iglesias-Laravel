<?php
/*Una empresa nos hace la siguiente oferta de trabajo:
El primer año nos paga 1000 euros.
El resto de los años tendremos un aumento de sueldo anual de 4 por ciento.
Escribe una función recursiva que calcule el sueldo que tendremos dentro de X años.*/

function sueldo($año,$sueldo){
    if($año<1){
        return $sueldo;
    }else
    $sueldo+=($sueldo*0.04);
    return sueldo($año-1,$sueldo); // Función reversiva. Se repite hasta que el año sea menor que 1.
}
$sueldo=1000;
$año=5;

$sueldo=sueldo($año,$sueldo);
echo $sueldo;

?>