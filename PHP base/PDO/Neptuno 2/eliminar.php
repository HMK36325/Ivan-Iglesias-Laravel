<?php
session_name('user');
session_start();
include 'funciones.php';
include 'conexion.php';
cabecera('Eliminar PEDIDO')
?>

<body>
    <?php
    if (!isset($_SESSION['cliente']) & !isset($_SESSION['pass'])) {//Comprobamos que este logeado
        echo "No estas logueado, puedes loguearte <a href='login.php'>Aqui</a><br>";
    } else if ($_SESSION['rol'] != 'administrador') {//comprobamos si es admin para poder borrar
        echo "No eres administrador, loguete como administrador <a href='login.php'>Aqui</a><br> ";
    } else {
        echo "Usuario: " . $_SESSION['cliente'] . "<br> Fecha y hora de conexion: " . $_SESSION['time'] . "<br>";
        
    ?>
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
    ?>
        <!--Elegimos el pedido-->
        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
            <select onchange="this.form.submit();" name="pedidos">
                <option selected="true" disabled="disabled">Seleccione un pedido</option>
                <?php
                try {
                    $consulta = $conexion->query("SELECT idpedido FROM pedidos WHERE idcliente LIKE '$cliente'");
                    while ($registro = $consulta->fetch(PDO::FETCH_OBJ)) {
                ?>
                        <option value='<?php echo "$registro->idpedido" ?>' <?php if (isset($_POST['pedidos']) && $_POST['pedidos'] == "$registro->idpedido") {echo "selected";} ?>><?php echo $registro->idpedido ?></option>
                        <!-- Lo imprimimos de esta manera por si tenemos demasiados campos -->
            <?php
                    }
                } catch (PDOException $e) {
                    echo "ERROR " . $e->getMessage() . "<br>";
                }
            }
            ?>
            </select>
        </form>
    <?php
    if (isset($_POST['pedidos'])) {
        $idPedido=$_POST['pedidos'];

        try {
            $delete=$conexion->query("DELETE FROM pedidos WHERE idpedido LIKE '$idPedido'");
            $delete->execute();
            echo "<p><b>Pedido con ID:$idPedido eliminado con exito.</b></p>";
        } catch (PDOException $e) {
            echo "Error " . $e->getMessage() . "<br />";
        }
    }
}
    echo "<br><a href='index.php'>Volver al menú</a>";
    ?>
</body>