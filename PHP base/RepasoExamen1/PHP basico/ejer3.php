<?php
/*El método simple de cifrado de información consiste en sustituir cada letra del abecedario por otra que está 3 posiciones por delante de ella.
Ejemplo, la A se sustituye por la C, la B se sustituye por la D, la C por la E y así sucesivamente.
 NOTA: convertir la cadena a mayúsculas,usar ord() y chr()
Ejemplo:
Texto original : JAVIER
Texto codificado: LCXKGT*/ 

$usuario="javier";
$usuario=strtoupper($usuario);
$aux="";

for ($i=0; $i <strlen($usuario) ; $i++) { 
    $c=ord($usuario[$i])+2;
    $aux.=chr($c);
}

echo $aux;


?>