<?php include 'funciones.php' ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/Ejer8_UT2/estilo2.css" rel="stylesheet" type="text/css" />
    <title>Ejercicio 7</title>
</head>

<body>
    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
        <fieldset>
            <legend>RECETAS DE COCINA</legend>
            <p>Indique el número de ingredientes:</p>
            <input type="number" name="num" required value=<?php echo mantenerCampo('num'); ?>>
            <br>
            <br>
            <input type="submit" name="enviar" value="Enviar">
        </fieldset>
    </form>
    <?php
    if (isset($_POST['enviar']) || isset($_POST['enviar2'])) {
    ?>
        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
            <fieldset>
                <br>
                Introduzca el nombre de la receta:<input type="text" name="nombre" value=<?php echo mantenerCampo('nombre'); ?>>
                <br>
                <br>
                <?php
                if (isset($_POST['num'])) {
                    $num=$_POST['num'];

                    for ($i = 0; $i < $_POST['num']; $i++) {
                ?>
                        Ingrediente:<input type="text" name="ingrediente[<?php $i ?>]" required>
                        Cantidad:<input type="number" name="cantidad[<?php $i ?>]" required>
                        <br><br>
                <?php
                    }
                }
                ?>
                <p>Realizacion:</p>
                <textarea name="realizacion" cols="30" rows="5" value=<?php echo mantenerCampo('realizacion'); ?>></textarea>
                <br>
                <input type="submit" name="enviar2" value="Enviar">
                <input type="hidden" name="num" value=<?php echo $num ?>>
            </fieldset>
        </form>
    <?php
    }
    if (isset($_POST['enviar2'])) {
        echo "<fieldset>";
        echo "<b>RECETA INCOPORADA</b><br><br>";
        echo "Receta de <b>" . $_POST['nombre'] . "</b>:<br><br>";
        for ($i = 0; $i < count($_POST['ingrediente']); $i++) {
            echo "Ingrediente: " . $_POST['ingrediente'][$i] . " = " . $_POST['cantidad'][$i] . " gr/l/ml<br><br>";
        }

        echo "<b>Realizacion</b><br>" . $_POST['realizacion'];

        echo "</fieldset>"; //este fieldset con el echo es para q imprima con estilos.
    }
    echo "<br><a href='ejercicio.php'>Volver al principio</a>";
    ?>





</body>

</html>