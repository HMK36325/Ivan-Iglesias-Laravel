<?php
include 'funciones.php';
cabecera("Ejercicio1");
?>

<body>
    <h1>INFORMACION</h1>
    <table>
        <tr>
            <th>Número de hijos</th>
            <th>Porcentaje Descuento</th>
        </tr>
        <tr>
            <td>2 hijos</td>
            <td class="derecha">10%</td>
        </tr>
        <tr>
            <td>3 hijos</td>
            <td class="derecha">15%</td>
        </tr>
        <tr>
            <td>más de 3 hijos</td>
            <td class="derecha">20%</td>
        </tr>
    </table>
    <p> Matrícula: 200€ </p>
    <p> Cuota mensual: 100€</p>
    <p> AMPA(por familia): 50€</p>

    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
        <fieldset>
            <legend>FORMULARIO</legend>
            Número de hijos:<input type="text" name="nHijos">
            <br>
            <input type="submit" name="enviar" value="Enviar">
            <input type="reset" value="Borrar">
        </fieldset>
    </form>
</body>
<?php
if (isset($_POST['enviar'])) {
    $nHijos = isset($_POST['nHijos']) ? $_POST['nHijos'] : null;
    if ($nHijos <= 0 || $nHijos > 10) {
        echo "El número de hijos tiene que ser postivo y menor que 10";
    } else {
        $matricula = (200 + 100) * $nHijos + 50;
        $descuento = $nHijos <= 2 ? $matricula * 0.1 : ($nHijos == 3 ? $matricula * 0.15 : $matricula * 0.3);
        $matricula -= $descuento;
        echo "<br> El precio de la matrícula es: (200+100)*$nHijos+50-$descuento= $matricula €";
    }
}
?>