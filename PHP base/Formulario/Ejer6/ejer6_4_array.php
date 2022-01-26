<html>
<head>
  <meta charset="UTF-8" />
  <title>Datos personales  (Formulario)</title>
  <link href="../../estilo5ana.css" rel="stylesheet" type="text/css"  />
</head>

<body>
<?php

?>

<form action="<?php	$_SERVER['PHP_SELF']?>" method="post">
  <fieldset>
    <legend>Datos personales</legend>
    <p>Escriba los datos siguientes:</p>

    <table >
      <tbody>
        <tr>
          <td><strong>Nombre:</strong><br />
            <input type="text" name="datos[nombre]" size="20" maxlength="20" /></td>
          <td><strong>Apellidos:</strong><br />
            <input type="text" name="datos[apellidos]" size="20" maxlength="20" /></td>
          <td><strong>Edad:</strong><br />

            <select name="datos[edad]">
              <option selected="selected"></option>
              <option value="1">Menos de 20 años</option>
              <option value="2">Entre 20 y 39 años</option>
              <option value="3">Entre 40 y 59 años</option>
              <option value="4">60 años o más</option>
            </select>
             </td>
        </tr>
        <tr>
          <td><strong>Peso:<br />
            </strong><input type="text" name="datos[peso]" size="6" maxlength="5" />
          kg</td>
          <td><strong>Sexo:</strong><br />
            <input type="radio" name="datos[sexo]" value="hombre" />Hombre 
            <input type="radio" name="datos[sexo]" value="mujer" />Mujer</td>
          <td><strong>Estado Civil:</strong><br />
            <input type="radio" name="datos[estadoCivil]" value="soltero" /> Soltero
            <input type="radio" name="datos[estadoCivil]" value="casado" /> Casado
            <input type="radio" name="datos[estadoCivil]" value="otro" /> Otro</td><br />
        </tr>
        <tr>
          <td rowspan="2" class="borde"><strong>Aficiones:</strong></td>
          <td><input type="checkbox"  name="datos[aficiones][]" value="cine" /> Cine</td>
          <td><input type="checkbox"  name="datos[aficiones][]" value="literatura" /> Literatura</td>
          <td><input type="checkbox"  name="datos[aficiones][]" value="tebeos" /> Tebeos</td>
        </tr>
        <tr>
          <td><input type="checkbox"  name="datos[aficiones][]" value="deporte" /> Deporte</td>
          <td><input type="checkbox"  name="datos[aficiones][]" value="musica" /> Música</td>
          <td><input type="checkbox"  name="datos[aficiones][]" value="television" /> Televisión</td>
        </tr>
		<tr></tr>
		  
  </fieldset>
  <tr><td><input type="submit" value="Enviar" name="enviar"/></td><td>
		<input type="reset" value="Borrar" name="Reset" /></td></tr>
      </tbody>
   
  
   </table>



<?php
if (isset($_POST['enviar']))
{

$datos=$_POST['datos'];
var_dump($datos);
foreach ($datos as $campo=>$valor){ 
    if($campo!='aficiones'){
        if(empty($valor))
            echo "<p class='aviso'>No ha escrito su ".$campo."</p>";
        else
            echo "<p>Su ".$campo." es ".$valor."</p>";
    }
    else
        foreach ($valor as $aficion)
            echo '<br>afición: '.$aficion;
}
}
?>
</form>
</body>
</html>
<?php  
echo "<p><a href='ejer6_4_array.php'>Volver al formulario.</a></p>";
   
?>
