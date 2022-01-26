<?php

/*Queremos ir añadiendo y quitando valores en una tabla con un array*/

session_start();
$array = array('Alava', 'Bilbao', 'Madrid', 'Valencia', 'Zaragoza'); //para ello necesitamos una sesion que nos guarde el array y lo vaya actualizando.
if (!isset($_SESSION['tabla'])) {
    $_SESSION['tabla'] = $array;
    echo "iniciando la sesion";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="estilo.css" rel="stylesheet" type="text/css" />
    <title>Ejer8Array</title>
</head>

<body>
    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
        <fieldset>
            <h1>Ejercicio para entregar arrays</h1>
            <input type="submit" name="exPrincipio" value="Extraer al principio">
            <input type="text" name="añadirF">
            <input type="submit" name="inFinal" value="Añadir al final">
            <br><br>
            <?php
            echo "<table border='1'>";
            echo "<td>Posición</td><td>Valor</td>";
            for ($i = 0; $i < count($_SESSION['tabla']); $i++) { //imprimimos la tabla mezclando html con php
                echo "<tr>";
                echo "<td>$i</td>";
                echo "<td>" . $_SESSION['tabla'][$i] . "</td>";
                echo "</tr>";
            }
            echo "</table>";
            ?>
            <br><br>
            <input type="submit" name="inPrincipio" value="Añadir al principio">
            <input type="text" name="añadirP">
            <input type="submit" name="exFinal" value="Extraer al final">
        </fieldset>
    </form>
    <?php
    if (isset($_POST['inFinal'])) {
        $valor = $_POST['añadirF'];
        array_push($_SESSION['tabla'], $valor); //muy importante cuando accedemos a los submit usar el header para q refresque la pagina y nos actualice los datos
        header("Location:ejer8Array.php");
    }
    if (isset($_POST['exPrincipio'])) {
        array_shift($_SESSION['tabla']);
        header("Location:ejer8Array.php");
    }
    if (isset($_POST['inPrincipio'])) {
        $valor = $_POST['añadirP'];
        array_unshift($_SESSION['tabla'], $valor);
        header("Location:ejer8Array.php");
    }
    if (isset($_POST['exFinal'])) {
        array_pop($_SESSION['tabla']);
        header("Location:ejer8Array.php");
    }
    echo "<br><a href='ejer8Array.php'>Volver al principio</a>"; //para cerrar la sesion hay q borrarla en el navegador
    
    ?>
</body>

</html>