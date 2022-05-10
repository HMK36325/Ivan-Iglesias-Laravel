<?php
// Para que el navegador no haga cache (fecha de expiración menor a la actual)
header('Cache-Control: no-cache, must-revalidate');
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');

header('Content-Type: application/json');


 $salida=array();

 $salida[]=array("id"=>"1","titulo"=>"Reparación de equipo","fecha"=>"12/06/2018","descripcion"=>"El equipo no arranca");
 $salida[]=array("id"=>"2","titulo"=>"Pantalla rota","fecha"=>"14/06/2018","descripcion"=>"Pantalla rota por impacto");
 $salida[]=array("id"=>"3","titulo"=>"Error del SO","fecha"=>"15/06/2018","descripcion"=>"Pantallazo azul");
 $salida[]=array("id"=>"4","titulo"=>"Ratón averiado","fecha"=>"18/06/2018","descripcion"=>"Funciona a tirones");
 $salida[]=array("id"=>"5","titulo"=>"Error de disco","fecha"=>"13/06/2018","descripcion"=>"El disco hace mucho ruido");
   
echo json_encode($salida,JSON_UNESCAPED_UNICODE);
?>