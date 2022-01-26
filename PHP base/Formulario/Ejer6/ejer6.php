<?php
include 'funciones.php';
?>
<html>

<head>
  <meta charset="UTF-8" />
  <title>Datos personales 7 (Formulario)</title>
  <link href="estilo.css" rel="stylesheet" type="text/css" />
</head>

<body>


  <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
    <fieldset>
      <legend>Datos personales</legend>
      <p>Escriba los datos siguientes:</p>
      

      <label>Nombre:</label>
      <input type="text" name="nombre" maxlength="20" value=<?php echo mantenerCampo('nombre'); ?>>
      </br>

      <br><label>Apellidos:</label>
      <input type="text" name="apellidos" size="20" maxlength="20" value=<?php echo mantenerCampo('apellidos'); ?>>
      <br><br><label>Edad:</label>

      <select name="edad">
        <option selected="selected"></option>
        <option value="1 " <?php echo mantenerSelect('edad', '1'); ?>>Menos de 20 años</option>
        <option value="2" <?php echo mantenerSelect('edad', '2'); ?>>Entre 20 y 39 años</option>
        <option value="3" <?php echo mantenerSelect('edad', '3'); ?>>Entre 40 y 59 años</option>
        <option value="4" <?php echo mantenerSelect('edad', '4'); ?>>60 años o mas</option>
      </select><br>

      <br><label>Peso:</label>
      <input type="text" name="peso" size="6" maxlength="5" value=<?php echo mantenerCampo('peso'); ?>>kg<br />

      <br><label>Sexo:</label>
      <input type="radio" name="sexo" value="hombre" <?php echo mantenerRadio('sexo', 'hombre'); ?> />Hombre
      <input type="radio" name="sexo" value="mujer" <?php echo mantenerRadio('sexo', 'mujer'); ?> />Mujer<br />

      <br><label>FechaNacimiento:</label>
      <input type="date" name="fecha" value=<?php echo mantenerCampo('fecha');?>></br>
      <br><label>Zodiaco:</label>
      <input type="text" name="zodiaco" value="<?php signo_zodiaco() ?>" /></br>

      <br><label>Estado Civil:</label>
      <input type="radio" name="estadoCivil" value="soltero" <?php echo mantenerRadio('estadoCivil', 'soltero'); ?> /> Soltero
      <input type="radio" name="estadoCivil" value="casado" <?php echo mantenerRadio('estadoCivil', 'casado'); ?> /> Casado
      <input type="radio" name="estadoCivil" value="otro" <?php echo mantenerRadio('estadoCivil', 'otro'); ?> /> Otro<br />

      <br><label>Aficiones:</label>
      <input type="checkbox" name="aficiones[]" value="cine" <?php echo mantenerCheckbox('aficiones', 'cine'); ?> /> Cine
      <input type="checkbox" name="aficiones[]" value="literatura" <?php echo mantenerCheckbox('aficiones', 'literatura'); ?> /> Literatura
      <input type="checkbox" name="aficiones[]" value="tebeos" <?php echo mantenerCheckbox('aficiones', 'tebeos'); ?> /> Tebeos
      <input type="checkbox" name="aficiones[]" value="deporte" <?php echo mantenerCheckbox('aficiones', 'deporte'); ?> /> Deporte
      <input type="checkbox" name="aficiones[]" value="musica" <?php echo mantenerCheckbox('aficiones', 'musica'); ?> /> Musica
      <input type="checkbox" name="aficiones[]" value="television" <?php echo mantenerCheckbox('aficiones', 'television'); ?> /> Televisión

      <p class="der">
        <input type="submit" value="Enviar" name="enviar" />
        <input type="reset" value="Borrar" name="Reset" /> 
      </p>
    </fieldset>
  </form>
</body>

</html>