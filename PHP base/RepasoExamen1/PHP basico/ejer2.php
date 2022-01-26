<?php
/*Escribe un programa que busque una palabra dentro de una frase y la sustituya por otra palabra. Usa: str_replace()*/
$cadena1="Voy al cine el domingo";
$cadena2="teatro";
$cadena3="cine";
echo $cadena1;
$cadena1=str_replace($cadena3,$cadena2,$cadena1);
echo $cadena1;
?>