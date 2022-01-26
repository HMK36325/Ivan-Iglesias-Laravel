<?php

session_name("memory");
session_start();

// Si no están guardado en la sesión los dibujos de la partida ....
if (!isset($_SESSION["numeroDibujos"])) {
    // ... redirigimos a la primera página
    header("Location:memory1.php");
    exit;
}

// Funciones auxiliares
function recoge($var)
{
    $tmp = (isset($_REQUEST[$var]))
    ? trim(htmlspecialchars($_REQUEST[$var], ENT_QUOTES, "UTF-8"))
    : "";
    return $tmp;
}

// Recogemos los datos (botón y carta)
$accion = recoge("accion");
$gira= recoge("gira");

// Variables auxiliares comprobación de datos
$accionOk = false;
$giraOk = false;

// Validamos el dato recibido, sin hacer nada si el dato no es válido
if ($gira == "") {
} elseif (!is_numeric($gira)) {
} elseif (!ctype_digit($gira)) {
} elseif ($gira < 0 || $gira > 2 * $_SESSION["numeroDibujos"] - 1) {
} else {
    $giraOk = true;
}

// Validamos el dato recibido, sin hacer nada si el dato no es válido
if ($accion != "numero" && $accion != "nueva") {
} else {
    $accionOk = true;
}

// Si el dato es válido ...
if ($giraOk || $accionOk) {
    // Si se ha pulsado "Nueva partida" ...
    if ($accion == "nueva") {
        // ... borramos la partida actual
        unset($_SESSION["dibujos"]);
        // ... y redirigimos a la primera página
        header("Location:memorion-5-1.php");
        exit;
    // Si se ha pulsado "Cambiar número de dibujos" ...
    } elseif ($accion == "numero") {
        // ... redirigimos al formulario correspondiente
        header("Location:memorion-5-3.php");
        exit;
    // Si se ha pulsado una ficha ...
    } else {
        // Si se ha pulsado una ficha que está boca abajo ...
        if ($_SESSION["lado"][$gira] == "dorso") {
            // ... la giramos
            $_SESSION["lado"][$gira] = "dibujo";
            // Si no hay ninguna carta girada ...
            if ($_SESSION["primera"] == -1) {
                // ... guardamos qué ficha hemos girado
                $_SESSION["primera"] = $gira;
            // Si hay sólo una ficha girada ...
            } elseif ($_SESSION["primera"] != -1 && $_SESSION["segunda"] == -1) {
                // ... guardamos qué ficha hemos girado
                $_SESSION["segunda"] = $gira;
                $_SESSION["jugadas"] += 1;
            // Si ya hay dos giradas ...
            } elseif ($_SESSION["primera"] != -1 && $_SESSION["segunda"] != -1) {
                // Si son diferentes
                if ($_SESSION["dibujos"][$_SESSION["primera"]] != $_SESSION["dibujos"][$_SESSION["segunda"]]) {
                    // ... damos la vuelta a las dos fichas
                    $_SESSION["lado"][$_SESSION["primera"]] = "dorso";
                    $_SESSION["lado"][$_SESSION["segunda"]] = "dorso";
                }
                // Guardamos esa ficha como primera ficha de la jugada siguiente
                $_SESSION["primera"] = $gira;
                $_SESSION["segunda"] = -1;
            }
        }
        // Redirigimos a la primera página
        header("Location:memory1.php");
        exit;
    }
// ... y si no, redirigimos a la primera página
} else {
    header("Location:memory1.php");
    exit;
}
