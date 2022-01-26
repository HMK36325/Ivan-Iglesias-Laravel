<?php

function cabecera($titulo)
{
echo "<!DOCTYPE html>
<html >
<head>
  <meta charset='UTF-8' />
  <title>$titulo</title>
  <link href=\"estilo.css\" rel=\"stylesheet\"  />
</head>
<body>
<h1>$titulo</h1>\n";
}


function calNif($dni){
  $posicion= intval($dni%23);
  $letras= "TRWAGMYFPDXBNJZSQVHLCKEO";
//nos quedamos con el valor que encuentra en la posición indicada dentro de la cadena letras
  $letraNif= substr ($letras, $posicion, 1);
  return $letraNif;
}

function mantenerCheckbox($nombre,$valor){
  $check="";
    if(isset($_POST[$nombre])){
      $afic = $_POST[$nombre];
      if (in_array($valor, $afic)!=false)
          $check = "checked"; 
    }
    return $check;
}



function mantenerCampo($campo){
	$valor=isset($_POST[$campo]) ? $_POST[$campo]:null;
	return $valor;
  
}

function mantenerRadio($nombre,$valor){

$check = "";
if (isset($_POST[$nombre]) && $_POST[$nombre] == $valor) 
      $check = "checked";
 	return $check;
}

function signo_zodiaco(){ 
  if(isset($_POST['enviar'])){
  $fecha=$_POST['fecha'];
  $zodiaco = ''; 
 
           
  list ( $ano, $mes, $dia ) = explode ( "-", $fecha );
  
  if     ( ( $mes == 1 && $dia > 19 )  || ( $mes == 2 && $dia < 19 ) )  
  { $zodiaco = "Acuario"; }
  elseif ( ( $mes == 2 && $dia > 18 )  || ( $mes == 3 && $dia < 21 ) )  
  { $zodiaco = "Piscis"; } 
  elseif ( ( $mes == 3 && $dia > 20 )  || ( $mes == 4 && $dia < 20 ) )  
  { $zodiaco = "Aries"; } 
  elseif ( ( $mes == 4 && $dia > 19 )  || ( $mes == 5 && $dia < 21 ) )  
  { $zodiaco = "Tauro"; } 
  elseif ( ( $mes == 5 && $dia > 20 )  || ( $mes == 6 && $dia < 21 ) )  
  { $zodiaco = "Geminis"; } 
  elseif ( ( $mes == 6 && $dia > 20 )  || ( $mes == 7 && $dia < 23 ) )  
  { $zodiaco = "C?cer"; } 
  elseif ( ( $mes == 7 && $dia > 22 )  || ( $mes == 8 && $dia < 23 ) )  
  { $zodiaco = "Leo"; } 
  elseif ( ( $mes == 8 && $dia > 22 )  || ( $mes == 9 && $dia < 23 ) )  
  { $zodiaco = "Virgo"; } 
  elseif ( ( $mes == 9 && $dia > 22 )  || ( $mes == 10 && $dia < 23 ) ) 
  { $zodiaco = "Libra"; } 
  elseif ( ( $mes == 10 && $dia > 22 ) || ( $mes == 11 && $dia < 22 ) ) 
  { $zodiaco = "Escorpio"; } 
  elseif ( ( $mes == 11 && $dia > 21 ) || ( $mes == 12 && $dia < 22 ) ) 
  { $zodiaco = "Sagitario"; } 
  elseif ( ( $mes == 12 && $dia > 21 ) || ( $mes == 1 && $dia < 20 ) )  
  { $zodiaco = "Capricornio"; } 

  echo $zodiaco; }
}

function mantenerSelect($nombre,$valor){
  $select="";

  if (isset($_POST[$nombre]) && $_POST[$nombre] == $valor ) {
    $select="selected";
  }
  return $select;
  
}
	    
 