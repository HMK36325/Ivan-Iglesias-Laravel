<?php
/*9.-Crea una función que compruebe si un año es bisiesto. Un año es bisiesto si es divisible por 4, excepto los años que son divisibles por 100 pero no por 400.*/
/*function bisiesto($año){
    if(($año % 4==0 && $año % 100!=0) || $año % 400==0){
        return true;
    }else
    return false;
}
$año=2018;
$bol=bisiesto($año);
if($bol){
    echo "El año es $año es bisiesto";
}*/

function bisiesto2 ($año){
    return ($año % 4==0 && $año % 100!=0) || $año % 400==0 ? true : false;
}
$año=2016;
echo (bisiesto2($año) ? "El año  $año es bisiesto</br>" : "El año  $año no es bisiesto</br>");
echo (bisiesto2($año) ? ($año > 2000 ? "El año es $año es bisiesto y mayor que 2000 " : "El año $año es bisiesto y menor que 2000" ): "El año es $año no es bisiesto");

?>