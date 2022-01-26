

<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
        <fieldset>
            <legend>Factorial Y Sumatorio</legend>
            <br />
            <p>Ingrese un numero</p>
            <input type="number" name="numero" required >
            <br />
             Calcular: 
             Factorial<input type="checkbox"  name="funcion[]" value="factorial" /> 
             Sumatorio<input type="checkbox"  name="funcion[]" value="sumatorio"  /> <br>
             <input class="derecha" type="submit" name="enviar" value="Calcular">
             <input class="derecha" type="reset" name="borrar" value="Borrar">
<br><br>
            <?php 


if(isset($_POST['enviar'])){   
if(!empty($_POST['funcion'])){    //HICE BOTON CHECKBOX POR SI EL USUARIO QUIERE VER LAS DOS FUNCIONES A LA VEZ EN LUGAR DE VER UNA U OTRA
    foreach($_POST['funcion'] as $ind=>$val){
        if($val=="factorial" ){
            echo" El factorial es ".($_POST["numero"]."<br>");
        }
        echo "<br>";
        if($val=="sumatorio" ){
            echo" El sumatorio es ".($_POST["numero"]."<br>");
        }
    }
}
else{
    echo "Seleccione una funcion!";
}



    }

    echo "<br><a href='ejer5.php'>Volver al principio </a>";
?>
</fieldset>
</form>
</body>
</html>
