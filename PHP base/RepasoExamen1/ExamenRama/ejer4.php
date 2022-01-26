<?php
include 'funciones.php';
cabecera("Ejercicio4");

$matriz;
echo "<table>";
for ($i=0; $i < 4 ; $i++) { 
    echo "<tr>";
    for ($j=0; $j < 5; $j++) { 
        echo "<td>";
        $check=$i+$j;
        if ($check%2==0) {
             echo $matriz[$i][$j]="*";
        }else{
            echo $matriz[$i][$j]=rand(1,100);
        }
        echo "</td>";
    }
    echo "</tr>";
}
echo "</table>";
?>