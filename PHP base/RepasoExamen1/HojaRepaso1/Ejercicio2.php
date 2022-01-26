<head>
    <meta charset="UTF-8" />
    <title>Ejercicio2Repaso</title>
    <link href="estilo.css" rel="stylesheet" type="text/css" />
</head>

<body>
    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
        <fieldset>
            <legend>Vectores</legend>
            Número filas:<input type="number" name="filas">
            <br>
            <br>
            Número columnas:<input type="number" name="columnas">
            <br>
            <br>
            <input type="submit" name="enviar">
        </fieldset>
    </form>
</body>

<?php
if (isset($_POST['enviar']) && isset($_POST['filas']) && isset($_POST['columnas'])) {
    $vector = array();
    $vectorFilas = array();
    $vectorColumnas = array();

    for ($i = 0; $i < $_POST['filas']; $i++) {
        for ($j = 0; $j < $_POST['columnas']; $j++) {
            $vector[$i][$j] = rand(1, 9);
        }
    }

    for ($i = 0; $i < $_POST['filas']; $i++) {//Recorremos las filas en la i y las columnas en la j para guardar el sumatorio de cada fila
        $sum = 0;
        for ($j = 0; $j < $_POST['columnas']; $j++) {
            $sum += $vector[$i][$j];
        }
        $vectorFilas[$i] = $sum;
    }
    for ($i = 0; $i < $_POST['columnas']; $i++) { //Recorremos las columnas en la i y las filas en la j, ya que queremos guardar el sumatorio de cada columna IMPORTANTE
        $sum = 0;
        for ($j = 0; $j < $_POST['filas']; $j++) {
            $sum += $vector[$j][$i];
        }
        $vectorColumnas[$i] = $sum;
    }
    echo "Vector:<br>";

    foreach ($vector as $key => $value) {
        foreach ($value as $key2 => $value2) {
            echo " " . $value2;
        }
        echo "<br>";
    }

    echo "<br>Vector de filas: <br>";

    foreach ($vectorFilas as $key => $value) {
        echo "La suma de los valores de la fila " . ($key + 1) . " es: $value <br>";
    }

    echo "<br>Vector de columnas: <br>";

    foreach ($vectorColumnas as $key => $value) {
        echo "La suma de los valores de la columna " . ($key + 1) . " es: $value <br>";
    }
    echo "<br><a href='Ejercicio2.php'>Volver al principio </a>";
}
?>