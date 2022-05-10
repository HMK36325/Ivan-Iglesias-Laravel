<?php


// Para que el navegador no haga cache (fecha de expiración menor a la actual)
header('Cache-Control: no-cache, must-revalidate');
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');

header('Content-Type: application/json');

 $salida=array();

 $salida[]=array("id"=>"1","nombre"=>"Gregorio Gómez","tipo"=>"operario","foto"=>"gregorio.jpg");
 $salida[]=array("id"=>"2","nombre"=>"Asterio Pérez","tipo"=>"jefe","foto"=>"asterio.jpg");
 $salida[]=array("id"=>"3","nombre"=>"Federica Mínguez","tipo"=>"operario","foto"=>"federica.jpg");

echo json_encode($salida,JSON_UNESCAPED_UNICODE);

?>