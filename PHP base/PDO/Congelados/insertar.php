<?php
session_name('user');
session_start();
include 'funciones.php';
include 'conexion.php';
cabecera('Insertar Productos');
?>

<body>
    <?php

    //Compruebo si esta logueado, y si no lo esta lo redirecciono al login, 
    //tmb guardo en una variable de sesion el .php en el q estoy para q cuando se logue vuelva aqui con un header

    if (!isset($_SESSION['cliente']) & !isset($_SESSION['pass'])) {
        $_SESSION['back'] = 'insertar.php';
        header("Location:login.php");
    } else {
        echo "Usuario: ".$_SESSION['user']."<br>";
        echo "Hora conexión: ".$_SESSION['time']."<br>";
    ?>
        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
            <fieldset>
                <legend>Insertar Producto</legend>
                Categoria:<select name="categoria" id="">
                    <?php
                    try {
                        $consulta = $conexion->query("SELECT * FROM categorias");
                        $consulta->execute();
                        while ($registro = $consulta->fetch(PDO::FETCH_OBJ)) {
                    ?>
                            <option value="<?php echo $registro->numero_cat ?>" <?php if (isset($_POST['categoria']) && $_POST['categoria'] == "$registro->numero_cat") {
                                                                                    echo "selected";
                                                                                } ?>><?php echo $registro->etiqueta_cat ?></option>
                            <!-- Lo imprimimos de esta manera por si tenemos demasiados campos -->
                    <?php
                        }
                    } catch (PDOException $e) {
                        echo "ERROR " . $e->getMessage() . "<br>";
                    }
                    ?>

                </select><br><br>
                Nombre:*<input type="text" name="nombre" required value="<?php echo mantenerCampo('nombre'); ?>"><br><br>
                Envase:<select name="envase" id="">
                    <?php

                    try {
                        $consulta = $conexion->query("SELECT * FROM envases");
                        $consulta->execute();
                        while ($registro = $consulta->fetch(PDO::FETCH_OBJ)) {
                    ?>
                            <option value="<?php echo $registro->numero_env ?>" <?php if (isset($_POST['envase']) && $_POST['envase'] == "$registro->numero_env") {
                                                                                    echo "selected";
                                                                                } ?>><?php echo $registro->etiqueta_env ?></option>
                            <!-- Lo imprimimos de esta manera por si tenemos demasiados campos -->
                    <?php
                        }
                    } catch (PDOException $e) {
                        echo "ERROR " . $e->getMessage() . "<br>";
                    }
                    ?>

                </select><br><br>
                Precio:*<input type="number" name="precio" required value="<?php echo mantenerCampo('precio'); ?>"><br><br>
                Imagen:<input type="file" name="imagen"><br><br>
                <input type="submit" name="enviar" value="Insertar">
            </fieldset>
        </form>
    <?php


        if (isset($_POST['enviar'])) {
            $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : null;
            $precio = isset($_POST['precio']) ? $_POST['precio'] : null;
            $categoria = isset($_POST['categoria']) ? $_POST['categoria'] : null;
            $envase = isset($_POST['envase']) ? $_POST['envase'] : null;

            //validar imagen
            $directorio = "img/";
            $directorio  = $directorio . basename($_FILES["imagen"]["name"]);


            //validar que sea jpg 
            if ($_FILES["imagen"]["type"] == "image/jpg" || $_FILES["imagen"]["type"] == "image/jpeg") {
                move_uploaded_file($_FILES["imagen"]["tmp_name"], $directorio); //la muevo a mi carpeta imagenes
                $imagen = $_FILES["imagen"]["name"]; //guardo la imagen en una variable para subir a la base de datos la ruta de la img


                //ahora q ya tengo todos los campos subo el producto a la base de datos.

                try {
                    $consulta = $conexion->prepare("INSERT INTO productos (etiqueta_prod, num_cat_prod, num_envase_prod, precio_prod, observaciones_prod, foto_prod, dispo_prod) VALUES (:nombre, :categoria, :envase, :precio, null, :imagen,1)");
                    $consulta->execute(array(':nombre' => $nombre, ':categoria' => $categoria, ':envase' => $envase, ':precio' => $precio, ':imagen' => $imagen));

                    echo "<h1>Resultado de la inserción:</h1><br>
                     <ul><li>Nombre:$nombre</li></ul>
                     <ul><li>Categoria:$categoria</li></ul>
                     <ul><li>Envase:$envase</li></ul>";
                } catch (PDOException $e) {
                    echo "Error " . $e->getMessage() . "<br />";
                }
            } else {
                echo "Imagen no valida";
            }
        }
        echo "<br><a href='index.php'>Volver al menú</a>";
    }
    ?>
</body>