<?php
session_name('user');
session_start();
include 'funciones.php';
include 'conexion.php';
cabecera('Actualizar Precios');
?>

<body>
    <?php

    //Compruebo si esta logueado, y si no lo esta lo redirecciono al login, 
    //tmb guardo en una variable de sesion el .php en el q estoy para q cuando se logue vuelva aqui con un header

    if (!isset($_SESSION['cliente']) & !isset($_SESSION['pass'])) {
        $_SESSION['back'] = 'actualizar.php';
        header("Location:login.php");
    } else {
        echo "Usuario: " . $_SESSION['user'] . "<br>";
        echo "Hora conexión: " . $_SESSION['time'] . "<br>";
    ?>
        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
            <fieldset>
                <legend>Elige el envase</legend>
                <br>
                <?php
                try {
                    $consulta = $conexion->query("SELECT * FROM envases");
                    while ($registro = $consulta->fetch(PDO::FETCH_OBJ)) {
                ?>

                        <input type="radio" required name="envase" value="<?php echo $registro->numero_env ?>" <?php echo mantenerRadio('envase', $registro->numero_env); ?> />
                        <label><?php echo $registro->etiqueta_env ?></label>
                        <!-- Lo imprimimos de esta manera por si tenemos demasiados campos -->
                <?php
                    }
                } catch (PDOException $e) {
                    echo "ERROR " . $e->getMessage() . "<br>";
                }
                ?>
                <br><br>
                <input type="submit" name="enviar" value="Mostrar">
            </fieldset>
        </form>
        <?php

        if (isset($_POST['enviar'])) {
            $envase = $_POST['envase'];

            try {
                $consulta = $conexion->query("SELECT * from productos as p inner JOIN categorias as c on p.num_cat_prod = c.numero_cat WHERE p.num_envase_prod LIKE '$envase'");
        ?>
                <!--Elegimos el producto que vamos a actualizar-->
                <form action='<?php $_SERVER['PHP_SELF'] ?>' method="POST">
                    <?php
                    echo "<table>";
                    echo "<tr><th>Número</th><th>Etiqueta</th><th>Categoria</th><th>Precio</th><th>Observaciones</th></tr>";
                    while ($registro = $consulta->fetch(PDO::FETCH_OBJ)) {
                        //paso en el array del precio, la id como key y el precio como value, entonces ya se a que productos apunta el checkbox.
                        echo "<tr><td> " . $registro->numero_prod . "</td><td>" . $registro->etiqueta_prod . "</td><td> " . $registro->etiqueta_cat . "</td><td><input type='number' name='precio[$registro->numero_prod]' value='$registro->precio_prod' required ></td><td> " . $registro->observaciones_prod . "</td><td><input type='checkbox' name='productosCheckbox[]' value='$registro->numero_prod'></td></tr>";
                    }
                    echo "</table>";
                    echo "<input type='submit'name='actualizar' value='Actualizar'>";
                    ?>
                </form>
    <?php
            } catch (PDOException $e) {
                echo "Error " . $e->getMessage() . "<br />";
            }
        }

        if (isset($_POST['actualizar'])) {
            if (isset($_POST['productosCheckbox'])) {//Este if es solo para dar un mensaje en caso de que no seleccione ningun producto.
                $productosCheckbox = $_POST['productosCheckbox'];
                $precios = $_POST['precio'];

                foreach ($productosCheckbox as $key => $id) { //el value del array del checkbox son los id de los prodcutos elegidos, por lo tanto poniendo ese id en la key del array precios nos da el precio del prodcuto marcado ene el checkBox
                    try {

                        //Hacemos el update del precio
                        $update = $conexion->prepare("UPDATE productos SET precio_prod=:precio WHERE numero_prod LIKE :id");
                        $update->execute(array(":precio" => $precios[$id], ":id" => $id));

                        //Consulto el nombre para meterlo en el txt
                        $consulta = $conexion->query("SELECT * FROM productos WHERE numero_prod LIKE '$id' AND precio_prod LIKE '$precios[$id]'");
                        //Compruebo q la consulta devolvio un objeto real, por lo tanto cambio el precio.
                        if ($registro = $consulta->fetch(PDO::FETCH_OBJ)) {
                            //imprimo el resultado
                            echo "Producto: $registro->etiqueta_prod, precio: $precios[$id]<br>";

                            //Lo meto en el txt con a para que lo escriba al final del texto, si no existe el archivo lo crea.
                            $file = fopen("txt/envase.txt", "a");

                            fwrite($file, "Producto: $registro->etiqueta_prod, nuevo precio: " . "$precios[$id]" . PHP_EOL);

                            fclose($file);
                        } else {
                            echo "No se realizo el cambio de precio del prodcuto con ID: $id";
                        }
                    } catch (PDOException $e) {
                        echo "ERROR " . $e->getMessage() . "<br>";
                    }
                }
            } else {
                echo "No ha seleccionado ningún producto.";
            }
        }
    }
    echo "<br><a href='index.php'>Volver al menú</a>";
    ?>


</body>