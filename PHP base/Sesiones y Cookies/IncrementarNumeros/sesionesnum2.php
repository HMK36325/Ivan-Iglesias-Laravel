<?php
session_start();

// Si el número no está guardado en la sesión, lo pone a cero (el valor inicial)
if (!isset($_SESSION['numero'])) {
    $_SESSION['numero'] = 0;
}

$accion   = $_POST['accion'];


// Dependiendo de la acción recibida, modifica el número guardado
if ($accion == "cero") {
    $_SESSION["numero"] = 0;
} elseif ($accion == "subir") {
    $_SESSION["numero"] ++;
} elseif ($accion == "bajar") {
    $_SESSION["numero"] --;
}

// y vuelve al formulario
header("Location:sesionesnum1.php");
?>
