<?php
session_name('user');
session_start();
include 'funciones.php';
include 'conexion.php';
cabecera('LOGIN');
?>

<body>
    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
        Usuario:<input type="text" name="user">
        Contraseña:<input type="text" name="pass">
        <input type="submit" name="enviar" value="Entrar">
    </form>
    <?php
    if (isset($_POST['enviar'])) {
        $registrado = false;
        $_SESSION['cliente'] = $_POST['user'];
        $_SESSION['pass'] = $_POST['pass'];

        try {
            $consulta = $conexion->prepare("SELECT * FROM clientes");
            $consulta->execute();
            while ($registro = $consulta->fetch(PDO::FETCH_OBJ)) {

                if ($registro->idcliente == $_SESSION["cliente"]  &&  $registro->password == $_SESSION["pass"]) {
                    $registrado = true;
                    $_SESSION['rol']=$registro->rol;//guardo su rol en una variable de sesion
                }
            }
        } catch (PDOException $e) {
            echo "Error " . $e->getMessage() . "<br />";
        }

        if ($registrado == true) {
            $H = date('H') + 1;
            $date = date("m/d/y $H:i:s");
            $_SESSION['time'] = $date;
            header("Location:index.php");
        } else {

            echo "Usuario no registrado";
            session_unset();
        }
    }
    echo "<br><a href='index.php'>Volver al menú</a>";
    ?>
</body>