<?php
session_name('user');
session_start();
include 'funciones.php';
include 'conexion.php';
cabecera('LOGIN');
?>

<?php
if (!isset($_SESSION['user']) & !isset($_SESSION['pass']) || !isset($_SESSION['admin'])) {

    if (!isset($_SESSION['admin'])) {
        echo "Para crear una cuenta logueate como ADMINISTRADOR, para añadir movimientos como USUARIO";
    }
?>
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
            $consulta = $conexion->prepare("SELECT * FROM cliente");
            $consulta->execute();
            while ($registro = $consulta->fetch(PDO::FETCH_OBJ)) {

                if ($registro->ID_CLIENTE == $_SESSION["user"]  &&  $registro->CLAVE == $_SESSION["pass"]) {
                    $registrado = true;
                    $_SESSION['nombre']=$registro->NOMBRE;
                    if ($registro->NOMBRE=='administrador') {
                        $_SESSION['admin']='SI';
                    }
                    
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
}
?>