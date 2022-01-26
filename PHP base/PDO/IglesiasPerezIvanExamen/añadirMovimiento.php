<?php
session_name('user');
session_start();
include 'funciones.php';
include 'conexion.php';
cabecera('Añadir Moviento Cuenta');
?>

<body>
    <?php

    //Compruebo si esta logueado, y si no lo esta lo redirecciono al login, 
    //tmb guardo en una variable de sesion el .php en el q estoy para q cuando se logue vuelva aqui con un header

    if (!isset($_SESSION['user']) & !isset($_SESSION['pass'])) {
        header("Location:login.php");
    } else {
        echo "Usuario: " . $_SESSION['user'] . "<br>";
        echo "Hora conexión: " . $_SESSION['time'] . "<br>";
        echo "Nombre: " . $_SESSION['nombre'] . "<br>";
        $cliente=$_SESSION['user'];
        if ($cliente!='9999X') {
            
    ?>
        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
        <fieldset>
            <label >Cuenta:</label>
            <select onchange="this.form.submit();" name="cuenta">
                <option selected="true" disabled="disabled">Seleccione una cuenta</option>
                <?php
                try {
                    $consulta = $conexion->query("SELECT * FROM cuentas WHERE ID_CLIENTE LIKE '$cliente'");
                    $consulta->execute();
                    while ($registro = $consulta->fetch(PDO::FETCH_OBJ)) {      
                ?>
                        <option value="<?php echo $registro->NUM_CTA ?>" <?php if (isset($_POST['cuenta']) && $_POST['cuenta'] == "$registro->NUM_CTA") {echo "selected";} ?>><?php echo $registro->NUM_CTA ?></option>
                        <!-- Lo imprimimos de esta manera por si tenemos demasiados campos -->
                <?php
        
                    }
                } catch (PDOException $e) {
                    echo "ERROR " . $e->getMessage() . "<br>";
                }
                ?>
            </select>
            </fieldset>
        </form>
    <?php
        }else{
            echo "El administrador no puede hacer movimientos";
            echo "<br><a href='logout.php'>Desconectarse</a>";
        }

        if (isset($_POST['cuenta'])) {
            $cuenta=$_POST['cuenta'];
            $_SESSION['cuenta']=$cuenta;
            try {
                $consulta = $conexion->query("SELECT * from cuentas where NUM_CTA LIKE'$cuenta'");
                $registro = $consulta->fetch(PDO::FETCH_OBJ)
        ?>
                <form action='<?php $_SERVER['PHP_SELF'] ?>' method="POST">
                <fieldset>
                <label>Saldo:</label>
                <input type="text" name="saldoActual" value="<?php echo $registro->SALDO ?>" readonly>
                <br>
                <label>Cantidad:</label>
                <input type="number" name="cantidad" required>
                <br>
                <label >Ingreso</label>
                <input type="radio" required name="tipo" value="I" <?php echo mantenerRadio('envase', 'I'); ?> />
                <label >Reintegro</label>
                <input type="radio" required name="tipo" value="R" <?php echo mantenerRadio('envase', 'R'); ?> />
                <br>
                <input type="submit" name="enviar" value="Añadir">
                </fieldset>
                </form>
    <?php
            } catch (PDOException $e) {
                echo "Error " . $e->getMessage() . "<br />";
            }
        }

        if (isset($_POST['enviar'])) {
            $saldoActual=$_POST['saldoActual'];
            $cantidad=$_POST['cantidad'];
            $tipoMovimiento=$_POST['tipo'];
            $cuenta=$_SESSION['cuenta'];
            $fecha = date("Y-m-d");
            
            if ($tipoMovimiento=='I') {//Ingreso
                $saldo=$saldoActual+$cantidad;
                //Insertamos el nuevo moviento
                try {
                    $consulta = $conexion->prepare("INSERT INTO `movimcu`( `NUM_CTA`, `FECHA_MOV`, `TIPO_MOV`, `IMPORTE`) VALUES (:cuenta, :fecha, :tipoMovimiento, :cantidad)");
                    $consulta->execute(array(':cuenta' => $cuenta, ':fecha'=> $fecha, ':tipoMovimiento' => $tipoMovimiento, ':cantidad' =>$cantidad ));
                } catch (PDOException $e) {
                    echo "Error " . $e->getMessage() . "<br />";
                }

                //Actualizamos el saldo
                try {
                    $consulta = $conexion->prepare("UPDATE `cuentas` SET `SALDO`=:saldo WHERE NUM_CTA LIKE :cuenta");
                    $consulta->execute(array(':saldo' => $saldo, ':cuenta'=> $cuenta));
                    echo "\n<p><b>Se ha realizado el ingreso de $cantidad € a la cuenta Nº:$cuenta<br>El saldo HABER actual es: $saldo €</b></p><br>";
                } catch (PDOException $e) {
                    echo "Error " . $e->getMessage() . "<br />";
                }


            }else{//Reintegro
                if ($saldoActual>=$cantidad) {
                    $saldo=$saldoActual-$cantidad;
                    //Insertamos el nuevo moviento
                    try {
                        $consulta = $conexion->prepare("INSERT INTO `movimcu`( `NUM_CTA`, `FECHA_MOV`, `TIPO_MOV`, `IMPORTE`) VALUES (:cuenta, :fecha, :tipoMovimiento, :cantidad)");
                        $consulta->execute(array(':cuenta' => $cuenta, ':fecha'=> $fecha, ':tipoMovimiento' => $tipoMovimiento, ':cantidad' =>$cantidad ));
                    } catch (PDOException $e) {
                        echo "Error " . $e->getMessage() . "<br />";
                    }

                    //Actualizamos el saldo
                    try {
                        $consulta = $conexion->prepare("UPDATE `cuentas` SET `SALDO`=:saldo WHERE NUM_CTA LIKE :cuenta");
                        $consulta->execute(array(':saldo' => $saldo, ':cuenta'=> $cuenta));
                        echo "\n<p><b>Se ha realizado el reintegro de $cantidad € a la cuenta Nº:$cuenta<br>El saldo HABER actual es: $saldo €</b></p><br>";
                    } catch (PDOException $e) {
                        echo "Error " . $e->getMessage() . "<br />";
                    }
                }else{
                    echo "Tu saldo actual es de: $saldoActual.<br> No tienes saldo suficiente.";
                }
            }


        }

        echo "<br><a href='index.php'>Volver al menú</a>";
    }
    ?>
</body>