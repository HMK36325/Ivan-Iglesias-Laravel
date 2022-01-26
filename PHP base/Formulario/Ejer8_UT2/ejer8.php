<?php
$array = [];
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <title>Casillas de verificación</title>
    <link href="estilo.css" rel="stylesheet" type="text/css" />
</head>

<body>
    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
        <fieldset>
            <!-- Formulario inicial -->
            <h1>Tabla con casillas de verificación</h1>
            <p>Escribe un número y dibujaré una tabla cuadrada de ese tamaño con casillas
                de verificación en cada casilla.</p>

            Tamaño:<input type="text" name="num" required/>
            <input type="submit" value="Dibujar" name="enviar" />

        </fieldset>
    </form>
    <br>
    <br>

    <?php if (isset($_POST['enviar']) || isset($_POST['contar'])) {
    ?>
        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
            <fieldset>
                <h1>Tabla con casillas de verificación</h1>
                <table>
                    <?php
                    $num = $_POST['num'];
                    for ($i = 0; $i < (pow($num, 2)); $i++) {
                        $array[$i] = ($i + 1);
                    }
                    $cont = 1;
                    for ($i = 0; $i < count($array); $i++) {
                        if ($cont > $num) {
                            echo "<tr>";
                            $cont = 1;
                        }
                        echo "<td><input type='checkbox' name='checked[]' value='" . $array[$i] . "'>" . $array[$i] . "</td>";
                        $cont++;
                    }
                    ?>
                </table>
                <input type="hidden" name="num" value=<?php echo $num ?>>
                <!--Este input sirve para pasar un valor de un formulario a otro, en este caso el num-->
                <br><br>
                <input type="submit" name="contar" value="Contar">
                <input type="reset" name="borrar" value="Borrar">
                
            </fieldset>
        </form>
        <br><br>
    <?php
    }
    if (isset($_POST['contar'])) {
        $checked = $_POST['checked'];
        $num = $_POST['num'];
        $contCheck = count($checked);
        $resultado = "";
        for ($i = 0; $i < count($checked); $i++) {
            $resultado .= $checked[$i] . ", ";
        }
        $resultado=substr($resultado,0,(strlen($resultado)-2));
        echo "Has marcado " . $contCheck . " casillas de " . pow($num, 2) . ": " . $resultado.".";
    }

    if (isset($_POST['borrar'])) {
        $checked = $_POST['checked'];
        foreach ($checked as $key => $value) {
            $value="";
        }
    }
    echo "<br><br><a href='ejer8.php'>Volver al principio</a>";
    ?>
</body>

</html>


<?php
/*
$num = 4;
$cont = 1;
$array = [];

for ($i = 0; $i < (pow($num, 2)); $i++) {
    $array[$i] = ($i + 1);
}

for ($i = 0; $i < count($array); $i++) {
    if ($cont > $num) {
        echo "<br>";
        $cont = 1;
    }
    echo '<input type="checkbox" name="array[]" value="' . $array[$i] . ">" . $array[$i];
    $cont++;
}



for ($i=0; $i < $num ; $i++) { 
    for ($j=0; $j < $num ; $j++) { //esta opcion no nos sirve ya que no podemos guardar cada casilla.
        echo "$cont ";
        $cont++;
    }
    echo "<br>";
}
*/
?>