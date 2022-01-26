<!DOCTYPE html>
<!--10.-Crea un array con los siguientes valores:
$estadios_futbol = array('Barcelona'=>'Camp Nou', 'Real Madrid'=>'Santiago Bernabeu','Valencia'=>'Mestalla','Real Sociedad'=>'Anoeta');
Muestra los valores del arrayen una tabla, has de mostrar el índice y el valor asociado.
Elimina el estadio asociado al Real Madrid.Vuelve a mostrar los valores para comprobar que el valor ha sido eliminado, esta vez en una lista numerada.
-->
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    $estadios = array('Barcelona' => 'Camp Nou', 'Real Madrid' => 'Santiago Bernabeu', 'Valencia' => 'Mestalla', 'Real Sociedad' => 'Anoeta');
    /*$estadios = array_replace($estadios, array('Real Madrid' => '')); */ /*Para eleminar solo el estadio y dejar el campo vacio*/
    /*unset($estadios['Real Madrid']);*/ /*Para eleminar la posicion del array entera*/
    ?>
    <table style="border-collapse:collapse">
        <?php
        foreach ($estadios as $key => $value) {
            echo "<tr><td style='border: 1px solid black'>$key</td><td style='border: 1px solid black'>$value</td></tr>";
        }
        ?>
    </table>

</body>

</html>