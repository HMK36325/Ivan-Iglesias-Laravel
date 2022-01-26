<?php
include 'funciones.php';
cabecera("Ejercicio 4 Ivan Iglesias Perez");

$matriz;
echo "MATRIZ<table>";
for ($i=0; $i < 5 ; $i++) { 
    echo "<tr>";
    for ($j=0; $j < 5; $j++) { 
        echo "<td>";
        $check=$i+$j;
        if ($i==$j) {
            echo $matriz[$i][$j]="1";
        }elseif ($i%2==0) {
            echo $matriz[$i][$j]=chr(rand(ord('a'),ord('z')));
        }else{
            echo $matriz[$i][$j]=rand(2,9); 
        }
      
        echo "</td>";
    }
    echo "</tr>";
}
?>