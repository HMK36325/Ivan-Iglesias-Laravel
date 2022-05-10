<?php
 //Array de nombres
$a = array("David","Iván","Ángel","Haoxiang","Antonio","Nacho", "Guillermo", "Sergio", "Álvaro", "Adrián", "Aitor", "Iyán", "Andrea", "Javier");

//Tomamos el valor del input procedente de la URL
$nombre = $_REQUEST["nombre"];
$sugerencia = [];

if ($nombre!==""){
    $nombre = strtolower($nombre); //Pasamos el nombre a minúsculas
    $long = strlen($nombre);
    
    foreach($a as $nom){//Cada elemento del array lo pasa a $nom en cada iteración
        if(stristr($nombre, substr($nom, 0, $long))){ //Si coincide la cadena pasada con los primeros caracteres de algún elemento del array
            $sugerencia[]=array("nombre"=>$nom);
        }
    }
}
echo json_encode($sugerencia);
//Otra forma: echo ($sugerencia ==="") ? "No hay sugerencias" : $sugerencia;

//echo json_encode($sugerencia);
?>