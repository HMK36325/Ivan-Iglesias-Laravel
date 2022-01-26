<?php
include 'funciones.php';
cabecera("Ejercicio 3 Ivan Iglesias Perez");

$array1=range(100,120,5);
$array2=array('a','f','k','p','u','z');

echo "<p><b>Array 1</b></p>";
foreach ($array1 as $key => $value) {
    echo "$value, ";
}
echo "<p><b>Array 2</b></p>";
foreach ($array2 as $key => $value) {
    echo "$value, ";
}
echo "<p><b>Array 2.Convertido en ASCCI</b></p>";
for ($i=0; $i < count($array2) ; $i++) { 
    $array2[$i]= ord($array2[$i]);
    echo "$array2[$i], ";
}

$merged=array_merge($array1,$array2);
rsort($merged,1);

echo "<br><b>Matriz</b></p><table>";
echo "<th>Índice</th><th>Valor</th>";
foreach ($merged as $key => $value) {
    echo "<tr>";
    echo "<td>$key</td><td>$value</td>";
    echo "</tr>";
}
echo "</table>";







?>