<?php
/*2.- Imprime los valores del array $v utilizando la estructura de control foreach. Antes cárgalo con los 
siguientes índices y valores:*/

$v=array();
$v[1]=90;$v[30]=7;$v['e']=99;$v['hola']=43;

foreach ($v as $key => $value) {
    echo "$key ==> $value<br>";
}
?>
