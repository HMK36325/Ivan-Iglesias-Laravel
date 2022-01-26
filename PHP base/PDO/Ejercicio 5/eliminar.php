<?php
include 'conexion.php';
include 'funciones.php';
cabecera("Eliminar Noticias");
?>
<body>
<form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
        <?php
        try {
            $consulta = $conexion->query("SELECT * FROM noticias");
            $consulta->execute();

            //Imprimo en una tabla todos los campos de la tabla noticias con el checkbox para marcar  los campos a eleminar.

            echo "<table>";
            echo "<tr><th>Eliminar</th><th>Titulo</th><th>Texto</th><th>Categoria</th><th>Fecha</th><th>Imagen</th></tr>";
            while ($registro = $consulta->fetch(PDO::FETCH_OBJ)) {
                echo "<tr> <td><input type='checkbox' name='noticias[]' value='$registro->id'></td> <td> " . $registro->titulo . "</td><td>" . $registro->texto . "</td><td> " . $registro->categoria . "</td><td> " . $registro->fecha . "</td><td><a target='_blank' href='img/" . $registro->imagen .
                    "'><img src='img/ico-fichero.gif' alt='Imagen asociada'></a></tr>"; //metemos un checkbox para ir almacenando en un array los registro que se vayan marcando.
            }
            echo "</table>";
        } catch (PDOException $e) {
            echo "Error " . $e->getMessage() . "<br />";
        }
        ?>
        <input type="submit" name="eliminar" value="Eliminar">
    </form>
</body>

<?php
if (isset($_POST['eliminar']) && !empty($_POST['noticias'])) {
    foreach ($_POST['noticias'] as $noticias => $n) {
        try {
            $consulta=$conexion->prepare("delete from noticias where id like :n");
            $consulta->execute(array(":n"=>$n));

            header("Location:eliminar.php");

        } catch (PDOException $e) {
            echo "Error " . $e->getMessage() . "<br />";
        }
    }
} 
echo "<br><a href='index.html'>Volver al menú</a>";
?>