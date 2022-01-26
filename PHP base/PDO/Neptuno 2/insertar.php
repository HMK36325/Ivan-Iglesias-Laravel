<?php
session_name('user');
session_start();
include 'funciones.php';
include 'conexion.php';
cabecera('Insertar PEDIDO')
?>

<body>
    <?php
    if(!isset($_SESSION['cliente']) & !isset($_SESSION['pass'])){
        echo "No estas logueado, puedes loguearte <a href='login.php'> Aqui</a><br>";
    }
    else{
        echo "Usuario: ".$_SESSION['cliente']."<br> Fecha y hora de conexion: ".$_SESSION['time']."<br>";

        $idCliente = $_SESSION["cliente"];
        try {
            $consulta = $conexion->query("SELECT * FROM productos");
            $consulta->execute();
    ?>
            <!--Elegimos los productos-->
            <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
            <?php
            echo "<br>ID del pedido:<input type='number' name='idPedido' value='' required>"; //Aqui pido el id que va tener el pedido
            echo "<table>";
            echo "<tr><th>NOMBRE PRODUCTO</th><th>CANTIDAD/UNIDAD</th><th>ID</th><th>STOCK</th><th>PRECIO/UNIDAD</th><th>CANTIDAD    </th></tr>";
            while ($registro = $consulta->fetch(PDO::FETCH_OBJ)) {
                echo "<input type='hidden' name='idCliente' value='$idCliente'>"; //la id del cliente con hidden
                echo "<input type ='hidden' name='idProductos[]' value='$registro->idproducto'>"; // Al igual q en modificar guardo todos los ids de todos los productos para ir comparandolos en el array de checkbox y ver cuales quiere pedir.
                echo "<tr><td> " . $registro->nombreproducto . "</td><td>" . $registro->cantidadporunidad . "</td><td> " . $registro->idproducto . "</td><td> " . $registro->unidadesexistencia . "</td><td> " . $registro->preciounidad . "</td><td><input type='number' min='1' max='$registro->unidadesexistencia' style='width: 5.5em;' name='cantidad[]' value=''></td><td><input type='checkbox' name='pedido[]' value='$registro->idproducto'></td></tr>";
            }
            echo "</table>";
            echo "<input type='submit'name='enviar' value='Pedir'>";
        } catch (PDOException $e) {
            echo "Error " . $e->getMessage() . "<br />";
        }

            ?>
            </form>
        <?php

    if (isset($_POST['enviar']) && !empty($_POST['pedido'])) {
        $idProductos = $_POST['idProductos']; //array con todas las id de los productos
        $pedido = $_POST['pedido']; //array checkbox
        $cantidad = $_POST['cantidad']; //array con las cantidades
        // Datos que necesito para crear un nuevo registro en la tabla pedido
        //id del cliente q hace el pedido
        $idCliente = $_POST['idCliente'];
        //id del pedido
        $idPedido = $_POST['idPedido'];
        //precio total del pedido, el cual va ser 0 al crear el registro en la tabla pedido ya que no sabemos aun q productos van a formar el pedido(lo actulizaremos despues).
        $totalPedido = 0;
        //Fecha pedido
        $fechaPedido = date("Y-m-d");
        //Fecha envio
        $fechaEnvio = strtotime('+1 day', strtotime($fechaPedido));
        $fechaEnvio = date('Y-m-j', $fechaEnvio);
        //Fecha entrega
        $fechaEntrega = strtotime('+4 day', strtotime($fechaPedido));
        $fechaEntrega = date('Y-m-j', $fechaEntrega);


        //Voy a verificar que el id de pedido q introducen no exista ya en la base de datos
        $consultaId = $conexion->query("SELECT * FROM pedidos");
        $consultaId->execute();
        $arrayIds; //Guardo aqui los id de todos los pedido
        $idRepetida = false; //Una condicion para que si existe esa idpedido no cree el nuevo pedido

        while ($registroId = $consultaId->fetch(PDO::FETCH_OBJ)) {
            $arrayIds[] = $registroId->idpedido;
        }

        foreach ($arrayIds as $key => $value) {
            if ($idPedido == $value) {
                $idRepetida = true;
            }
        }

        if ($idRepetida == false) {//Si el id del pedido no existe creamos el pedido nuevo
            try {
                //Primero introduzco el nuevo pedido en la tabla pedido para que me deje introducir registros en la tabla detallespedido con este id de pedido, ya que en la tabla detallespedido el idpedido es foranea de pedido por lo q requiere q este creada.
                //en un principio total pedido es 0 pero cuando tengamos todos los productos introducidos en detalles pedido lo actulizaremos al valor q tenga la suma de de precio de los productos.
                $insertPedido = $conexion->prepare("INSERT INTO pedidos (idpedido,idcliente,fechapedido,fechaentrega,fechaenvio,totalpedido)
            VALUES (:idPedido,:idCliente,:fechaPedido,:fechaEntrega, :fechaEnvio,:totalPedido)");
                $insertPedido->execute(array(":idPedido" => $idPedido, ":idCliente" => $idCliente, ":fechaPedido" => $fechaPedido, ":fechaEntrega" => $fechaEntrega, ":fechaEnvio" => $fechaEnvio, ":totalPedido" => $totalPedido));

                //Ahora recorro el array de checkbox y dentro el de por productos para saber q productos quiere añadir al pedido e ir insertandolos en detalles pedido.
                foreach ($pedido as $keyPedido => $idCheckbox) {
                    foreach ($idProductos as $key => $id) {
                        if ($idCheckbox == $id) {
                            try {
                                $consulta = $conexion->query("SELECT * 
                            from productos p 
                            WHERE p.idproducto LIKE '$id'");
                                $consulta->execute();
                                $registro = $consulta->fetch(PDO::FETCH_OBJ);

                                //Voy a guardar los campos que necesito para introducir el registro en la tabla detallespedido e ir almacenando el totalpedido
                                $precioUnidad = $registro->preciounidad;
                                $cantidadProducto = $cantidad[$key];
                                $totalPedido += $precioUnidad * $cantidadProducto;
                                //hacemos la inserccion en la tabla detalles pedido
                                $insert = $conexion->prepare("INSERT INTO detallesdepedidos (idpedido,idproducto,preciounidad,cantidad)
                            VALUES (:idPedido,:id,:precioUnidad,:cantidadProducto)");
                                $insert->execute(array(":idPedido" => $idPedido, ":id" => $id, ":precioUnidad" => $precioUnidad, ":cantidadProducto" => $cantidadProducto));

                                //Bajamos el stock de ese producto en la tabla productos
                                $stock = $registro->unidadesexistencia - $cantidadProducto;
                                $updateStock = $conexion->prepare("UPDATE productos SET unidadesexistencia=:stock WHERE idproducto LIKE '$id'");
                                $updateStock->execute(array(":stock" => $stock));
                            } catch (PDOException $e) {
                                echo "Error " . $e->getMessage() . "<br />";
                            }
                        }
                    }
                }

                //Ahora hay q actualizar el campo totalpedido del pedido en la tabla pedidos.
                $updateTotalPedido = $conexion->prepare("UPDATE pedidos SET totalpedido=:totalPedido WHERE idpedido LIKE '$idPedido'");
                $updateTotalPedido->execute(array(":totalPedido" => $totalPedido));
            } catch (PDOException $e) {
                echo "Error jejeje " . $e->getMessage() . "<br />";
            }
        } else {
            echo "Ya hay un pedido con la ID:$idPedido";
        }
    }
}
    echo "<br><a href='index.php'>Volver al menú</a>";
        ?>
</body>