<?php
include 'conexion.php';
include 'funciones.php';
cabecera('Modificar pedido');
?>

<body>
    <!--Elegimos el cliente-->
    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
        <select onchange="this.form.submit();" name="clientes">
            <option selected="true" disabled="disabled">Seleccione un cliente</option>
            <?php
            try {
                $consulta = $conexion->query("SELECT idcliente from clientes");
                while ($registro = $consulta->fetch(PDO::FETCH_OBJ)) {
            ?>
                    <option value='<?php echo "$registro->idcliente" ?>' <?php if (isset($_POST['clientes']) && $_POST['clientes'] == "$registro->idcliente") {echo "selected";} ?>><?php echo $registro->idcliente ?></option>
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
    if (isset($_POST['clientes'])) {
        $cliente = $_POST['clientes'];
    ?>  <!--Elegimos el pedido-->
        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
            <select onchange="this.form.submit();" name="pedidos">
                <option selected="true" disabled="disabled">Seleccione un pedido</option>
                <?php
                try {
                    $consulta = $conexion->query("SELECT idpedido FROM pedidos WHERE idcliente LIKE '$cliente'");
                    while ($registro = $consulta->fetch(PDO::FETCH_OBJ)) {
                ?>
                        <option value='<?php echo "$registro->idpedido" ?>' <?php if (isset($_POST['pedidos']) && $_POST['pedidos'] == "$registro->idpedido") { echo "selected"; } ?>><?php echo $registro->idpedido ?></option>
                        <!-- Lo imprimimos de esta manera por si tenemos demasiados campos -->
                <?php
                    }
                    echo "<input type='hidden' name='idCliente' value='$cliente'>"; //voy pasando la id del cliente con los hidden
                } catch (PDOException $e) {
                    echo "ERROR " . $e->getMessage() . "<br>";
                }

                ?>

            </select>
        </form>
        <?php
    }
    if (isset($_POST['pedidos'])) {
        $idPedido = $_POST['pedidos'];
        $idCliente = $_POST['idCliente'];

        try {
            $consulta = $conexion->query("SELECT d.idpedido, d.idproducto, p.nombreproducto, p.cantidadporunidad, d.cantidad
            from detallesdepedidos as d inner JOIN productos as p
            ON d.idproducto = p.idproducto
            WHERE d.idpedido LIKE '$idPedido'");
            $consulta->execute();
        ?>
            <!--Elegimos el producto que vamos a actualizar-->
            <form action='<?php $_SERVER['PHP_SELF'] ?>' method="POST">
                <?php
                echo "<table>";
                echo "<tr><th>ID PEDIDO</th><th>ID PRODUCTO</th><th>NOMBRE PRODUCTO</th><th>CANTIDAD/UNIDAD</th><th>CANTIDAD</th></tr>";
                while ($registro = $consulta->fetch(PDO::FETCH_OBJ)) {
                    echo "<input type='hidden' name='idCliente' value='$idCliente'>"; //la id del cliente con hidden
                    echo "<input type ='hidden' name='oldCantidad[]' value='$registro->cantidad'>"; //Voy a pasar el id de todos los productos del pedido, su cantidad vieja, la nueva y los id de los productos marcados en el checkbox
                    echo "<input type ='hidden' name='idProductos[]' value='$registro->idproducto'>"; // de esta forma puedo ir recorriendo el array actulizar(checkbox) y mirando si coincide la id del producto marcado con alguna del array de idproductos. Asi hago el cambio solo a los prodcutos marcados con el checkbox.
                    echo "<tr><td> " . $registro->idpedido . "</td><td>" . $registro->idproducto . "</td><td> " . $registro->nombreproducto . "</td><td> " . $registro->cantidadporunidad . "</td><td><input type='number' name='cantidad[]' value='$registro->cantidad'></td><td><input type='checkbox' name='actualizar[]' value='$registro->idproducto'></td></tr>";
                }
                echo "</table>";
                echo "<input type='submit'name='enviar' value='Actualizar'>";
                ?>
            </form>
    <?php
        } catch (PDOException $e) {
            echo "Error " . $e->getMessage() . "<br />";
        }
    }
    if (isset($_POST['enviar']) && !empty($_POST['actualizar'])) {
        //Guardo los valores que necesito en variables
        $actualizar = $_POST['actualizar'];
        $oldCantidad = $_POST['oldCantidad'];
        $idProductos = $_POST['idProductos'];
        $cantidad = $_POST['cantidad'];
        $idCliente = $_POST['idCliente'];

        foreach ($actualizar as $keyCheckbox => $idCheckbox) { //el idCheckbox es la id del producto marcado con el checkbox
            foreach ($idProductos as $key => $id) { //el id es la id de los productos pasada con el hidden
                if ($idCheckbox == $id) {
                    $totalCantidad = $cantidad[$key] - $oldCantidad[$key]; //Aqui guardo la diferencia entre la que habia y la nueva.
                    try {
                        $consulta = $conexion->query("SELECT * 
                        FROM productos p 
                        inner JOIN detallesdepedidos d 
                        ON p.idproducto = d.idproducto 
                        inner JOIN pedidos pe 
                        ON d.idpedido=pe.idpedido 
                        inner JOIN clientes c 
                        ON pe.idcliente = c.idcliente 
                        WHERE c.idcliente LIKE '$idCliente' 
                        AND p.idproducto LIKE '$id'");

                        $registro = $consulta->fetch(PDO::FETCH_OBJ);
                        //Sirve tanto para aumentar el stock si meten una cantidad inferior como para disminuir el stock si meten una cantidad mayor.
                        //Tambien sirve para disminuir el precio si meten un cantidad inferior o aumentarlo si es superior.  
                        //Con esto guardamos el nuevo stock y el nuevo precio del pedido.
                        $stock = $registro->unidadesexistencia - $totalCantidad;
                        $totalPedido = $registro->totalpedido + ($totalCantidad * $registro->preciounidad);

                        //Ahora verifico que el stock sea mayor q 0 para hacer los cambios

                        if ($stock >= 0) {
                            //Guardo la cantidad que meten por el input para setearla como la nueva cantidad(No es totalcantidad, totalcantidad es la diferencia entre la q habia y la q meten)
                            $cantidadActual = $cantidad[$key];
                            //Hacemos la consulta del update y actulizamos la base de datos
                            $update = $conexion->query("UPDATE 
                            productos p inner JOIN detallesdepedidos d 
                            ON p.idproducto = d.idproducto 
                            inner JOIN pedidos pe 
                            ON d.idpedido=pe.idpedido 
                            inner JOIN clientes c 
                            ON pe.idcliente = c.idcliente 
                            SET p.unidadesexistencia='$stock', d.cantidad='$cantidadActual',pe.totalpedido='$totalPedido' 
                            WHERE c.idcliente LIKE '$idCliente' and p.idproducto LIKE '$id'");

                            //Imrpimo el resultado de la actualizacion
                            echo "\n<p><b>Resultado actualizacion pedido con ID:$registro->idpedido y producto con ID:$id</b></p><br>
                            <ul><li>Nueva cantidad->$cantidadActual</li></ul>
                            <ul><li>Stock restante->$stock</li></ul>
                            <ul><li>Total del pedido->$totalPedido</li></ul>
                            <ul><li>Cliente->$idCliente</li></ul>";
                        } else {
                            echo "No queda stock suficiente para esa cantidad";
                        }
                    } catch (PDOException $e) {
                        echo "ERROR " . $e->getMessage() . "<br>";
                    }
                }
            }
        }
    }
    echo "<br><a href='index.html'>Volver al menú</a>";
    ?>
</body>