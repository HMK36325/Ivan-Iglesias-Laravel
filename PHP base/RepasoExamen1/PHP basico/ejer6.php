<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 6</title>
</head>

<body>

    <form action="ejer6.php" method="post">

        <fieldset>

            <legend>Formulario</legend>
            <p>Introduzca la frase:</p>
            <input type="text" name="frase">
            <br><br>
            <p>Introduzca la palabra a buscar:</p>
            <input type="text" name="palabra">
            <br><br>
            <input type="submit" name="enviar" value="Enviar">

        </fieldset>

    </form>
    <?php
/*Escribe un programa que busque una palabra dentro de una frase y nos indique la posición donde la encontró.
Tanto la palabra como la frase la introducimos nosotros desde el teclado.
FRASE : Quiero buscar una palabra en esta frase.
PALABRA : una
POSICION: 15*/

if (isset($_POST['enviar'])) {
    $frase = $_POST['frase'];
    $palabra = $_POST['palabra'];
    echo "La frase es: $frase <br> La palabra es: $palabra<br>";

    $posicion=strpos($frase,$palabra);
    echo "La posición de la palabra '$palabra' es: $posicion";
    
}
echo "<br><a href='ejer6.php'>Volver al principio</a>";
?>

</body>

</html>