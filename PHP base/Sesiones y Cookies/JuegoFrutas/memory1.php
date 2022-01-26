<?php
ini_set("session.cookie_lifetime","7200");
ini_set("session.gc_maxlifetime","7200");

// Nos unimos a la sesión
session_name("memory");
session_start();

//var_dump($_SESSION['dibujos']);

// Si no está guardado en la sesión el número de dibujos ....
if (!isset($_SESSION["numeroDibujos"])) {
 $_SESSION["numeroDibujos"] = 10;
}

// Si no están guardado en la sesión los dibujos de la partida ....
if (!isset($_SESSION["dibujos"])) {
// ... creamos una matriz con todos los valores posibles (61 valores)
$valores = [];
    for ($i = 127815; $i <= 127824; $i++) {
        $valores[] = $i;
    }
var_dump($valores);
    // Los barajamos
shuffle($valores);

    // Cogemos los N primeros (N es el número de dibujos)
for ($i = 0; $i < $_SESSION["numeroDibujos"]; $i++) {
        $_SESSION["dibujos"][$i] = $valores[$i];
        // Las fichas estarán boca abajo
        $_SESSION["lado"][$i]   = "dorso";
    }
var_dump($_SESSION);
    // Duplicamos los valores (creamos valores de N a 2N-1)
    for ($i = 0; $i < $_SESSION["numeroDibujos"]; $i++) {
        $_SESSION["dibujos"][$_SESSION["numeroDibujos"] + $i] = $valores[$i];
        $_SESSION["lado"][$_SESSION["numeroDibujos"] + $i]    = "dorso";
    }

    // Los barajamos de nuevo
    shuffle($_SESSION["dibujos"]);

    // No se ha elegido ni la primera carta ni la segunda de la jugada
    $_SESSION["primera"] = -1;
    $_SESSION["segunda"] = -1;
    // No se ha realizado ninguna jugada
    $_SESSION["jugadas"] = 0;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8" />
  <title>
    memory
  </title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="estilo.css" title="Color" />
</head>

<body>
  <h1>Memory</h1>

<form action="memory2.php">
    <p>
      <button type="submit" name="accion" value="nueva">Nueva partida</button>
      <button type="submit" name="accion" value="numero">Cambiar número de dibujos</button>
    </p>

    <p>
<?php
echo "    <p>";
// Mostramos los dibujos seleccionados en botones
for ($i = 0; $i < 2*$_SESSION["numeroDibujos"]; $i++) {
    // La ficha puede estar boca arriba (se ve el dibujo) ...
  if ($_SESSION["lado"][$i] == "dibujo") {
    echo "<button class='uno' type='button'>&#{$_SESSION['dibujos'][$i]};</button>";
  }else
  { // ... o boca abajo (se ve el dibujo común)
    echo  "<button class='uno' type='submit' name='gira' value='$i' >&#10026;</button>";
    }
}

echo "<p>Jugadas realizadas:".$_SESSION['jugadas']."</p>";
?>
  </form>

</body>
</html>
