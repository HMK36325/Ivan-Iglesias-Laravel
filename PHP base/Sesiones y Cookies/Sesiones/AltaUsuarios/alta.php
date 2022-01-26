<?php
include 'conexion.php';
include 'funciones.php';
cabecera('Alta de usuario');
?>

<body>
    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
        <fieldset>
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" value="<?php echo mantenerCampo('nombre'); ?>" required>
            <br><br>
            <label for="user">Usuario:</label>
            <input type="text" name="user" value="<?php echo mantenerCampo('user'); ?>" required>
            <br><br>
            <label for="pass">Contraseña:</label>
            <input type="text" name="pass" value="<?php echo mantenerCampo('pass'); ?>" required>
            <br><br>
            <label for="profesion">Profesión:</label>
            <select name="profesion" required>
                <option value='informático' <?php echo mantenerSelect('profesion', 'informático'); ?>>Informatico</option>
                <option value='contable' <?php echo mantenerSelect('profesion', 'contable'); ?>>Contable</option>
                <option value='administrativo' <?php echo mantenerSelect('profesion', 'administrativo'); ?>>Administrativo</option>
                <option value='auxiliar' <?php echo mantenerSelect('profesion', 'auxiliar'); ?>>Auxiliar</option>
            </select>
            <br><br>
            <input type="submit" name="enviar" value="Registrarse">
        </fieldset>
    </form>

    <?php
    if (isset($_POST['enviar'])) {
        $nombre = $_POST['nombre'];
        $user = $_POST['user'];
        $pass = $_POST['pass'];
        $profesion = $_POST['profesion'];


        try {
            $conexion->beginTransaction();
            $registrado = true; //Miramos si el usuario ya esta registrado
            $verificacion = $conexion->query("SELECT * FROM usuarios");
            while ($registro = $verificacion->fetch(PDO::FETCH_OBJ)) {
                if ($user == $registro->usuario) {
                    $registrado = false;
                }
            }

            if ($registrado) {
                try {
                    $consulta = $conexion->prepare("INSERT INTO usuarios (nombre, usuario, clave, profesion) VALUES (:nombre,:user,:pass,:profesion)");
                    $consulta->execute(array(':nombre' => $nombre, ':user' => $user, ':pass' => $pass, ':profesion' => $profesion));
                    echo "Usuario: $user registrado correctamente";
                    $conexion->commit();


                } catch (PDOException $e) {
                    $conexion->rollBack();
                    echo "Error " . $e->getMessage() . "<br />";
                }
            } else {
                echo "El usuario ya está registrado";

            }
        } catch (PDOException $e) {
            $conexion->rollBack();
            echo "Error " . $e->getMessage() . "<br />";
        }
    }

    echo "<br><a href='login.php'>Inicia sesion</a>";
    ?>

</body>