<?php
include 'conexion.php';
include 'funciones.php';
cabecera("Consultar Noticias");

?>
<body>
    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
        <select onchange="this.form.submit();" name="categoria" id="">
            <option value="" disable selected>Seleccione una opción</option>
            <option value="todas" <?php if (isset($_POST['categoria']) && $_POST['categoria'] == "todas") {echo "selected";} ?>>Todas</option>
            <?php
            try {
                $consulta = $conexion->query("SELECT distinct categoria FROM noticias");
                $consulta->execute();
                while ($registro = $consulta->fetch(PDO::FETCH_OBJ)) {
            ?>
                    <option value="<?php echo $registro->categoria ?>" <?php if (isset($_POST['categoria']) && $_POST['categoria'] == "$registro->categoria") {echo "selected"; } ?>><?php echo $registro->categoria ?></option>
                    <!-- Lo imprimimos de esta manera por si tenemos demasiados campos -->
            <?php
                }
            } catch (PDOException $e) {
                echo "ERROR " . $e->getMessage() . "<br>";
            }
            ?>
        </select>
    </form>

    <?php
    if (isset($_POST['categoria'])) {

        $categoria = $_POST['categoria']; //recogemos la categoria que nos han introducido

        //Comprobamos que si se ha seleccionado todas las categoria o solo 1
        if ($categoria == 'todas') {
            $request ="SELECT * FROM noticias";
        } else {
            $request ="SELECT * FROM noticias WHERE categoria like '$categoria'";
        }
        //Hacemos la consulta correspondiente e imprimimos
            try {
                $consulta=$conexion->query($request);
                $consulta->execute();
                echo "<table>";
                echo "<tr><th>Titulo</th><th>Texto</th><th>Categoria</th><th>Fecha</th><th>Imagen</th></tr>";
                while ($registro = $consulta->fetch(PDO::FETCH_OBJ)) {
                    echo "<tr><td> " . $registro->titulo . "</td><td>" . $registro->texto. "</td><td> " . $registro->categoria . "</td><td> " . $registro->fecha . "</td><td><a target='_blank' href='img/" . $registro->imagen .
                        "'><img src='img/ico-fichero.gif' alt='Imagen asociada'></a></td></tr>";
                }
                echo "</table>";
            } catch (PDOException $e) {
                echo "Error " . $e->getMessage() . "<br />";
            }
    
    }
    echo "<br><a href='index.html'>Volver al menú</a>";
    ?>

</body>
