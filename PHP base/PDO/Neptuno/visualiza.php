<?php
include 'conexion.php';
include 'funciones.php';
cabecera('Visualizar Productos');
?>

<body>
    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
        <select onchange="this.form.submit();" name="categoria">
            <option selected="true" disabled="disabled">Seleccione una categoria</option>
            <?php
            try {
                $consulta = $conexion->query("SELECT DISTINCT * FROM categorias");
                $consulta->execute();
                while ($registro = $consulta->fetch(PDO::FETCH_OBJ)) {
            ?>
                    <option value='<?php echo "$registro->idcategoria/$registro->nombrecategoria" ?>' <?php if (isset($_POST['categoria']) && $_POST['categoria'] == "$registro->idcategoria/$registro->nombrecategoria") {echo "selected";} ?>><?php echo $registro->nombrecategoria ?></option>
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

        $datos =explode("/",$_POST['categoria']); //recogemos el id de la categoria y el nombre de la categoria y lo separamos en idCategoria y nombreCategoria
        $idcategoria=$datos[0]; 
        $nombreCategoria=$datos[1]; 

       echo "<p><b>Categoria: $nombreCategoria</b></p>"; 

        //Hacemos la consulta correspondiente e imprimimos a los productos con ese idcategoria
        try {
            $consulta = $conexion->query(
                "SELECT p.nombreproducto, pr.nombrecompañia, p.cantidadporunidad, p.preciounidad 
                FROM productos AS p inner JOIN proveedores as pr
                ON p.idproveedor = pr.idproveedor 
                WHERE p.idcategoria LIKE '$idcategoria'"
            );
            $consulta->execute();
            echo "<table>";
            echo "<tr><th>Nombre Producto</th><th>Nombre Compañia</th><th>Cantidad x Unidad</th><th>Precio x Unidad</th></tr>";
            while ($registro = $consulta->fetch(PDO::FETCH_OBJ)) {
                echo "<tr><td> " . $registro->nombreproducto . "</td><td>" . $registro->nombrecompañia . "</td><td> " . $registro->cantidadporunidad . "</td><td> " . $registro->preciounidad . "</td></tr>";
            }
            echo "</table>";
        } catch (PDOException $e) {
            echo "Error " . $e->getMessage() . "<br />";
        }
    }
    echo "<br><a href='index.html'>Volver al menú</a>";
    ?>
</body>