<?php
session_name('user');
session_start();
include 'funciones.php';
include 'conexion.php';
cabecera('Eliminar Productos');
?>

<body>
    <?php

    //Compruebo si esta logueado, y si no lo esta lo redirecciono al login, 
    //tmb guardo en una variable de sesion el .php en el q estoy para q cuando se logue vuelva aqui con un header

    if (!isset($_SESSION['cliente']) & !isset($_SESSION['pass'])) {
        $_SESSION['back'] = 'eliminar.php';
        header("Location:login.php");
    } else {
        echo "Usuario: ".$_SESSION['user']."<br>";
        echo "Hora conexión: ".$_SESSION['time']."<br>";
    ?>
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
                        <option value="<?php echo $registro->numero_cat ?>" <?php if (isset($_POST['categoria']) && $_POST['categoria'] == "$registro->numero_cat") {echo "selected";} ?>><?php echo $registro->etiqueta_cat ?></option>
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
                $request = "SELECT * FROM productos";
            } else {
                $request = "SELECT * FROM productos WHERE num_cat_prod like '$categoria'";
            }
            ?>
            <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
            <?php
            //Hacemos la consulta correspondiente e imprimimos
            try {
                $consulta = $conexion->query($request);
                $consulta->execute();
                echo "<table>";
                echo "<tr><th>Eliminar</th><th>Nombre</th><th>Envase</th><th>Precio</th><th>Imagen</th></tr>";
                while ($registro = $consulta->fetch(PDO::FETCH_OBJ)) {
                    echo "<tr><td><input type='checkbox' name='eliminar[]' value='$registro->numero_prod'></td> <td> " . $registro->etiqueta_prod . "</td><td>" . $registro->num_envase_prod . "</td><td> " . $registro->precio_prod . "€</td><td><a target='_blank' href='img/" . $registro->foto_prod .
                        "'><img src='img/ico-fichero.gif' alt='Imagen asociada'></a></td></tr>";
                }
                echo "</table>";
                echo "<input type='submit' name='enviar' value='Eliminar'>";
            } catch (PDOException $e) {
                echo "Error " . $e->getMessage() . "<br />";
            }
            ?>
        </form>
        <?php
        }
        if (isset($_POST['enviar'])) {
            $eliminar= isset($_POST['eliminar']) ? $_POST['eliminar'] : null;
            $productosEliminados="Se eliminaron los productos con id: ";

            foreach ($eliminar as $key => $id) {//Borro los productos con esa id de la base de datos.
                $borrado=true;
                try {
                    $eliminar=$conexion->prepare("delete from productos where numero_prod like :id");
                    $eliminar->execute(array(":id"=>$id));

                } catch (PDOException $e) {
                    echo "Error " . $e->getMessage() . "<br />";
                }
                try {
                    $consulta = $conexion->prepare("SELECT numero_prod FROM productos");//Voy consultando que el id se haya borrado de la base de datos mirando que no esta en ella
                    $consulta->execute();
                    while ($registro = $consulta->fetch(PDO::FETCH_OBJ)) {
        
                        if ($registro->numero_prod == $id) {
                            $borrado = false;
                        }
                    }
                } catch (PDOException $e) {
                    echo "Error " . $e->getMessage() . "<br />";
                }

                if ($borrado) {
                    $productosEliminados.="$id, ";
                }   
            }
 
            echo substr($productosEliminados,0,-2).".";

        }
    }
    echo "<br><a href='index.php'>Volver al menú</a>";
    ?>
</body>