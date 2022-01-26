<?php
/*11.-Crea un array multidimensional para poder guardar los componentes de dos familias:
 Los Simpson y los Griffin, dentro de cada familia ha de constar el padre, la madre y los hijos.Familia Los Simpson=>padre: Homer, madre: Marge, hijos: Bart, Lisa y Maggie.
Familia Los Griffin=> padre: Peter, madre: Lois, hijos: Chris, Meg y Stewie
Muestra los valores de las dos familias. */

$familias = array(
    'Los Simpson' => array("Padre" => "Homer", "Madre" => "Marge", "Hijos" => "Bart, Lisa y Maggie"),
    'Los Griffin' => array("Padre" => "Peter", "Madre" => "Lois", "Hijos" => "Chris, Meg y Stewie")
);

foreach ($familias as $key => $value) {
    echo "La familia: $key<br>";
    foreach ($value as $key2 => $value2) {
        echo "$key2:$value2<br>";
    }
    echo "<br>";
}
