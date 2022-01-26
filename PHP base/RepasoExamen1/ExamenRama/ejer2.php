<?php
include 'funciones.php';
cabecera("Ejercicio2");
?>
<body>
<form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
        <fieldset>
            Frase:<input type="text" name="frase" value="<?php echo mantenerCampo("frase") ?>">
            <br>
            <input type="submit" name="enviar" value="Enviar">
        </fieldset>
    </form>
</body>
<?php
if (isset($_POST['enviar'])) {
    $frase = isset($_POST['frase']) ? $frase=$_POST['frase'] : null ;
    $frase=strtolower($frase);
    $frase=str_replace(" ","",$frase);
    $fraseRev=strrev($frase);

    if ($frase==$fraseRev) {
        echo "La frase es palíndroma";
    }else{
        echo "La frase no es palindroma";
    }
}
?>
