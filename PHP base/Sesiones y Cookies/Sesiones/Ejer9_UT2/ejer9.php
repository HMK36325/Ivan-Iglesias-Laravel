<?php
include '../../Funciones/funciones.php';

/*Queremos ir añadiendo contactos a una agenda y quitandolos, usando un array asociativo para ir almacenandolos*/


session_start();
$agenda = array('Mercedes' => '98533434', 'Pedro' => '656232323', 'Ramon' => '676898989');
if (!isset($_SESSION['agenda'])) {
    $_SESSION['agenda'] = $agenda;
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
    <title>Ejercicio 9</title>
</head>

<body>
    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
        <fieldset>
            <legend>Agenda</legend>
            <?php
            foreach ($_SESSION['agenda'] as $key => $value) {
                echo "$key: $value <br>";
            }
            ?>
            <br>
            <h1>Editar/borrar/añadir</h1>
            <br>
            Contacto:<input type="text" name="contacto" value=<?php echo mantenerCampo('nombre'); ?>>
            Teléfono:<input type="text" name="telf" value=<?php echo mantenerCampo('nombre'); ?>>
            <input type="submit" name="enviar" value="Continuar...">
        </fieldset>
    </form>
    <?php
    if (isset($_POST['enviar'])) {
        $contacto = (isset($_POST['contacto'])) ? $_POST['contacto'] : null;
        $telf = (isset($_POST['telf'])) ? $_POST['telf'] : null;
        $cont = 0;

        if ($contacto == null) {
            echo "No ha introducido el nombre del contacto";
        } else {

            foreach ($_SESSION['agenda'] as $key => $value) {
                if ($key == $contacto && $telf == null) { //Si introducimos contacto, pero no telefono, se elimina el contacto de la agenda.
                    unset($_SESSION['agenda'][$key]);
                    
                }
                if ($key == $contacto && $telf != null) { //Si introducimos contacto y numero, se modifica el numero de ese contaco
                    $_SESSION['agenda'][$key] = $telf;
                    ;
                }
                if ($key != $contacto && $telf != null) { //Si metemos contacto y numero no existentes se crea un contacto nuevo, para ello uso el cont porque si no me lo crearia cada vez que recorre el array.
                    $cont++;
                }
            }
            if ($cont == count($_SESSION['agenda'])) {
                $aux = array($contacto => $telf); //con esto es con lo q creo el contacto nuevo, gracias al cont de antes.
                $_SESSION['agenda'] = array_merge($_SESSION['agenda'], $aux);
                
            }
        }
        header("Location:ejer9.php");
    }
    echo "<br><a href='ejer9.php'>Volver al principio</a>";
    ?>

</body>

</html>