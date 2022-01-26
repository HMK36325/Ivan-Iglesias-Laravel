<?php
/*Dada la cadena “Voy al cine el domingo”. Visualiza las veces que se repite cada carácter, exceptuando el carácter blanco ( utiliza str_replace()).
Usa las funciones: count_chars(), chr()*/ 
$cadena="Voy al cine el domingo";
$cadena=str_replace(" ","",$cadena);

foreach (count_chars($cadena,1) as $key => $value) {
    echo "El caracter ".chr($key)." se repite: $value<br>";
}

?>