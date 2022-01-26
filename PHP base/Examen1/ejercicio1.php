<?php
include 'funciones.php';
cabecera("Ejercicio 1 Ivan Iglesias Perez");
?>

<body>
    <h3>Porcentaje según tipo de trabajador</h3>
    <table>
        <tr>
            <th>Tipo</th>
            <th>Porcentaje</th>
        </tr>
        <tr>
            <td>ADMINISTRATIVO</td>
            <td>10%</td>
        </tr>
        <tr>
            <td>COMERCIAL</td>
            <td>15%</td>
        </tr>
        <tr>
            <td>TECNICO</td>
            <td>20%</td>
        </tr>
        <tr>
            <td>DIRECTIVO</td>
            <td>30%</td>
        </tr>
    </table>
    <p> Matrícula: 200€ </p>
    <p> Cuota mensual: 100€</p>
    <p> AMPA(por familia): 50€</p>

    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
        <fieldset>
            <legend>FORMULARIO</legend>
            <label>Nombre:</label><input type="text" name="nombre" value="<?php echo mantenerCampo('nombre');  ?>">
            <br>
            <label>Sueldo:</label> <select name="sueldo">
                <option value="1200" <?php echo mantenerSelect('sueldo', '1200'); ?>>1200</option>
                <option value="1700" <?php echo mantenerSelect('sueldo', '1700'); ?>>1700</option>
                <option value="1900" <?php echo mantenerSelect('sueldo', '1900'); ?>>1900</option>
            </select>
            <br>
            <label>Tipo de trabajador:</label>
            <input type="radio" name="tipoTrabajador" value="administrativo" <?php echo mantenerRadio('tipoTrabajador', 'administrativo'); ?> />Administrativo
            <input type="radio" name="tipoTrabajador" value="comercial" <?php echo mantenerRadio('tipoTrabajador', 'comercial'); ?> />Comercial
            <input type="radio" name="tipoTrabajador" value="tecnico" <?php echo mantenerRadio('tipoTrabajador', 'tecnico'); ?> />Técnico
            <input type="radio" name="tipoTrabajador" value="directivo" <?php echo mantenerRadio('tipoTrabajador', 'directivo'); ?> />Directivo
            <br>
            <label>Número de hijos:</label><input type="text" name="nHijos" value="<?php echo mantenerCampo('nHijos');  ?>">
            <br>
            <label>Prima por hijo: <b>200€</b></label>
            <br>
            <input type="submit" name="enviar" value="Enviar">
            <input type="reset" value="Borrar">
        </fieldset>
    </form>
</body>
<?php
if (isset($_POST['enviar'])) {

    $nombre= isset($_POST['nombre']) ? $_POST['nombre'] : null;
    $sueldo= isset($_POST['sueldo']) ? $_POST['sueldo'] : null;
    $tipoTrabajo= isset($_POST['tipoTrabajador']) ? $_POST['tipoTrabajador'] : null;
    $nHijos= isset($_POST['nHijos']) ? $_POST['nHijos'] : null;


    if ($nHijos < 1) {
        echo "Introduzca un número de hijos mayor que 0";
    }else {
    
        $aumento= $tipoTrabajo=="administrativo" ? $sueldo * 0.1 : ($tipoTrabajo=="comercial" ? $sueldo*0.15 : ($tipoTrabajo=="tecnico" ? $sueldo * 0.2 :$sueldo*0.3));
        $sueldoTotal=$sueldo+$aumento+($nHijos*200);
    
        echo "<h1>Informe:</h1>
        <ul><li>Nombre: $nombre</li></ul>
        <ul><li>Categoria: $tipoTrabajo</li></ul>
        <ul><li>Hijos: $nHijos</li></ul>
        <ul><li>Sueldo base: $sueldo</li></ul>
        <ul><li>Total: $sueldo+$aumento+($nHijos*200) = $sueldoTotal</li></ul>";
    }
    
}
?>