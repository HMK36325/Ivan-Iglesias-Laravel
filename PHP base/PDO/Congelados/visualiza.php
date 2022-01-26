<?php
include 'conexion.php';
include 'funciones.php';
cabecera("Visualizar productos");

?>
<body>
    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
        <select onchange="this.form.submit();" name="categoria" id="">
            <option selected="true" disabled="disabled">Seleccione una opción</option>
            <option value="todas" <?php if (isset($_POST['categoria']) && $_POST['categoria'] == "todas") {echo "selected";} ?>>Todas</option>
            <?php
            try {
                $consulta = $conexion->query("SELECT * FROM categorias");
                $consulta->execute();
                while ($registro = $consulta->fetch(PDO::FETCH_OBJ)) {
            ?>
                    <option value="<?php echo $registro->numero_cat ?>" <?php if (isset($_POST['categoria']) && $_POST['categoria'] == "$registro->numero_cat") {echo "selected"; } ?>><?php echo $registro->etiqueta_cat ?></option>
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
            $request ="SELECT * FROM productos";
        } else {
            $request ="SELECT * FROM productos WHERE num_cat_prod like '$categoria'";
        }
        //Hacemos la consulta correspondiente e imprimimos
            try {
                $consulta=$conexion->query($request);
                $consulta->execute();
                echo "<table>";
                echo "<tr><th>Nombre</th><th>Envase</th><th>Precio</th><th>Imagen</th></tr>";
                while ($registro = $consulta->fetch(PDO::FETCH_OBJ)) {
                    echo "<tr><td> " . $registro->etiqueta_prod . "</td><td>" . $registro->num_envase_prod. "</td><td> " . $registro->precio_prod . "€</td><td><a target='_blank' href='img/" . $registro->foto_prod .
                        "'><img src='img/ico-fichero.gif' alt='Imagen asociada'></a></td></tr>";
                }
                echo "</table>";
            } catch (PDOException $e) {
                echo "Error " . $e->getMessage() . "<br />";
            }
    
    }
    echo "<br><a href='index.php'>Volver al menú</a>";
    ?>

</body>
