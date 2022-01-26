<?php
/*6.-Repite el ejercicio anterior, pero creando índices con dos iniciales para cada ciudad, por ejemploEl índice delarray que contiene como valor Madrid es MD */
$ciudades = array("Madrid"=>"MD", "Barcelona"=>"BD", "Londres"=>"LN", "New York"=>"NY", "Los Angeles"=>"LA", "Chicado"=>"CC");
foreach ($ciudades as $key => $value) {
    echo "$key: $value<br>";
}

?>
