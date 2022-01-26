<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejemplo fichero</title>
</head>

<body>
    <h1>Fichero de texto</h1>
    <?php
    $nombre_fichero="prueba.txt";
    
    $fichero = fopen('prueba.txt', 'r+');
    fwrite($fichero, ' Hola');
    $fichero = fopen('prueba.txt', 'r');
    $texto = fread($fichero, filesize($nombre_fichero));
    echo $texto;
    fclose($fichero);

    ?>

</body>

</html>