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
        $_SESSION['user'] = $_POST['user'];
        $_SESSION['pass'] = $_POST['pass'];

        try {
            $consulta = $conexion->prepare("SELECT * FROM usuarios");
            $consulta->execute();
            while ($registro = $consulta->fetch(PDO::FETCH_OBJ)) {

                if ($registro->usuario == $_SESSION["user"]  &&  $registro->clave == $_SESSION["pass"]) {
                    $registrado = true;
                }
            }
            header("Location:index.php");
        } catch (PDOException $e) {
            echo "Error " . $e->getMessage() . "<br />";
        }

        if ($registrado == true) {
            $H = date('H') + 1;
            $date = date("m/d/y $H:i:s");
            $_SESSION['time'] = $date;
        } else {

            echo "Usuario no registrado";
            session_unset();
        }
    }
    echo "<br><a href='alta.php'>Registrarse</a>";
    ?>
</body>