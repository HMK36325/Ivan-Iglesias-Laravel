<?php
session_name('user');
session_start();
include 'funciones.php';
include 'conexion.php';
cabecera('Crear Cuenta Para Clietne');
?>

<body>
    <?php

    //Compruebo si esta logueado, y si no lo esta lo redirecciono al login, 
    //tmb guardo en una variable de sesion el .php en el q estoy para q cuando se logue vuelva aqui con un header

    if (!isset($_SESSION['admin'])) {
        header("Location:login.php");
    } else {
        echo "Usuario: " . $_SESSION['user'] . "<br>";
        echo "Hora conexión: " . $_SESSION['time'] . "<br>";
        echo "Nombre: " . $_SESSION['nombre'] . "<br>";
    ?>
        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
        <fieldset>
            <label >ID Cliente:</label>
            <select onchange="this.form.submit();" name="idCliente">
                <option selected="true" disabled="disabled">Seleccione un cliente</option>
                <?php
                try {
                    $consulta = $conexion->query("SELECT * FROM cliente");
                    $consulta->execute();
                    while ($registro = $consulta->fetch(PDO::FETCH_OBJ)) {

                        if ($registro->ID_CLIENTE!='9999X') {//Si es el id del admin que no lo imprima en el select
                            
                ?>
                        <option value="<?php echo $registro->ID_CLIENTE ?>" <?php if (isset($_POST['idCliente']) && $_POST['idCliente'] == "$registro->ID_CLIENTE") {echo "selected";} ?>><?php echo $registro->ID_CLIENTE ?></option>
                        <!-- Lo imprimimos de esta manera por si tenemos demasiados campos -->
                <?php
                        }
                    }
                } catch (PDOException $e) {
                    echo "ERROR " . $e->getMessage() . "<br>";
                }
                ?>
            </select>
            </fieldset>
        </form>
    <?php
        if (isset($_POST['idCliente'])) {
            $_SESSION['id']=$_POST['idCliente'];
            ?>
            <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
            <fieldset>
                <label >Numero de Cuenta:</label>
                <input type="text" name="nCuenta">
                <input type="submit" name="enviar" value="Comprobar Cuenta">
            </fieldset>
        </form>
            <?php
        }
        if (isset($_POST['enviar'])) {
            $nCuenta=isset($_POST['nCuenta']) ? $_POST['nCuenta'] : null;
            $cliente=$_SESSION['id'];
            $existe=true;
            $fecha = date("Y-m-d");
            $tipoMovimiento='I';
            $saldo=100;

            try {
                $consulta=$conexion->query("SELECT * FROM cuentas");
                while ($registro = $consulta->fetch(PDO::FETCH_OBJ)) {
                    if ($registro->NUM_CTA==$nCuenta) {
                        $existe=false;
                    }
                }
            } catch (PDOException $e) {
                echo "Error " . $e->getMessage() . "<br />";
            }

            if ($existe) {
                try {
                    $consulta = $conexion->prepare("INSERT INTO `cuentas`(`NUM_CTA`, `FECHA_APERTURA`, `ID_CLIENTE`, `SALDO`) VALUES (:nCuenta, :fecha, :cliente, :saldo)");
                    $consulta->execute(array(':nCuenta' => $nCuenta, ':fecha'=> $fecha, ':cliente' => $cliente, ':saldo' =>$saldo ));
                } catch (PDOException $e) {
                    echo "Error " . $e->getMessage() . "<br />";
                }

                try {
                    $consulta = $conexion->prepare("INSERT INTO `movimcu`(`NUM_CTA`, `FECHA_MOV`, `TIPO_MOV`, `IMPORTE`) VALUES (:nCuenta, :fecha, :tipoMovimiento, :saldo)");
                    $consulta->execute(array(':nCuenta' => $nCuenta, ':fecha'=> $fecha, ':tipoMovimiento' => $tipoMovimiento, ':saldo' =>$saldo ));
                    echo "\n<p><b>Se ha creado una nueva cuenta con Nº: $nCuenta, al cliente: $cliente</b></p><br>";
                } catch (PDOException $e) {
                    echo "Error " . $e->getMessage() . "<br />";
                }


            }else{
                echo "La cuenta ya existe";
            }
        }

        echo "<br><a href='index.php'>Volver al menú</a>";
    }
    ?>
</body>