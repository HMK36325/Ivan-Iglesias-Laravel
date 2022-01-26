<?php
/*Crea un array llamado deportes e introduce los siguientes valores:
 fútbol, baloncesto, natación y tenis.
  Haz  el  recorrido  de  la  matriz  con  un  forpara  mostrar  sus  valores.
    A  continuación  realiza  las  siguientes operaciones:Muestra el total de valores que contiene.
    Sitúael puntero en el primer elemento del array y muestra el valor actual, es decir,
     en qué posición está situado el puntero actualmente.Avanza una posición  y muestra el valor actual.
     Coloca el puntero en la última posición y muestra su valor.
     */

$deportes = array('futbol', 'natacion', 'baloncesto', 'tenis');

foreach ($deportes as $key => $value) {
    echo "$value ";
}
echo "<br>";
echo $mode = current($deportes) . "<br>"; //muestra la posicion actual del array
echo $mode = next($deportes) . "<br>";   //muestra la siguiente posicion a la actual del array
echo $mode = end($deportes) . "<br>";    //muestra la ultima posicion del array
echo $mode = prev($deportes) . "<br>";   //muestra la posicion anterior a la actual de array
