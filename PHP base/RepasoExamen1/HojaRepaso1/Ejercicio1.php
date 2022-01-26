<head>
  <meta charset="UTF-8" />
  <title>Ejercicio1Repaso</title>
  <link href="estilo.css" rel="stylesheet" type="text/css" />
</head>
<body>
  <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
    <fieldset>
      <legend>Cadenas</legend>
      Cadena1:<input type="text" name="cadena1">
      <br>
      <br>
      Cadena2:<input type="text" name="cadena2">
      <br>
      <br>
      Caracter a buscar:<input type="text" name="caracter">
      <br>
      <br>
      <input type="submit" name="enviar">
    </fieldset>
  </form>
</body>


<?php
if (isset($_POST['enviar'])) {
    $cadena1;
    $cadena2;
    $caracter;
    isset($_POST['cadena1']) ? $cadena1=$_POST['cadena1'] : $cadena1 = null;
    isset($_POST['cadena2']) ? $cadena2=$_POST['cadena2'] : $cadena2 = null;
    isset($_POST['caracter']) ? $caracter=$_POST['caracter'] : $caracter = null;

    $arrayCadena=explode(" ",$cadena1);//guardamos cada palabra separada por un espacio en un array.

    $cadena1=strtoupper($cadena1);//convertimos a mayusculas
    $cadena2=strtoupper($cadena2);
    echo "$cadena1 <br>";
    echo "$cadena2 <br>";

    if (strcmp($cadena1,$cadena2)===0) { //strcmp compara dos strings y devuelve un 0 si son iguales (necesario el === 0)
        echo "Los string coinciden <br>";
    }else{
        echo "Los string no coinciden <br>";
    }

    $caracter=strtoupper($caracter);// convertimos a mayusculas y quitamos los espacios en blanco.
    $cadena1=str_replace(" ","",$cadena1);

    echo "El caracter $caracter se repite ". substr_count($cadena1,$caracter)." veces <br>"; //con substr_count contamos las apariciones de un caracter en un cadena.

    foreach ($arrayCadena as $key => $value) {//imprimimos el array.
        echo "$value <br>";
    }

    echo "<br><a href='Ejercicio1.php'>Volver al principio </a>";
}
?>