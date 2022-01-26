<?php
include 'conexion.php';
include 'funciones.php';
cabecera("Actualizar Noticias","s");
?>

<body>
    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
        <?php
        try {
            $consulta = $conexion->query("SELECT * FROM noticias");
            $consulta->execute();

            //Imprimo en una tabla todos los campos de la tabla noticias con el input editar para editar el campo correspondiente.

            echo "<table>";
            echo "<tr><th>Titulo</th><th>Texto</th><th>Categoria</th><th>Fecha</th><th>Imagen</th><th>Acciones</th></tr>";
            while ($registro = $consulta->fetch(PDO::FETCH_OBJ)) {
                echo "<tr><td> " . $registro->titulo . "</td><td>" . $registro->texto . "</td><td> " . $registro->categoria . "</td><td> " . $registro->fecha . "</td><td><a target='_blank' href='img/" . $registro->imagen .
                    "'><img src='img/ico-fichero.gif' alt='Imagen asociada'></a></td>
                    <td><button name='editar' value='$registro->id'>Editar</button></td></tr>"; //con este boton recojo el id del registro que se quiere editar, para despues apuntar a ese id con la consulta.
            }
            echo "</table>";
        } catch (PDOException $e) {
            echo "Error " . $e->getMessage() . "<br />";
        }
        ?>
    </form>
    <?php
    if (isset($_POST['editar']) && !isset($_POST['enviar'])) {
        $id=$_POST['editar'];
        //Para mantener los campos en necesario realizar una primera consulta en la que guardamos el id del campo que vamos a editar.
        try {
            $consulta= $conexion->prepare("SELECT * FROM noticias where id like :id");
            $consulta->execute(array(":id"=>$id));
            $registro = $consulta->fetch(PDO::FETCH_OBJ);

        
        } catch (PDOException $e) {
            echo "Error " . $e->getMessage() . "<br />";
        }

    ?>
        <h1>Modifica el registro:</h1><br>
        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
            <fieldset>
                Título*<br><input type="text" name="titulo" required value="<?php echo $registro->titulo ?>"><br><br> <!--A la hora de mantener el campo hacemos un registro de ese campo, ya que en registro tenemos el id.-->
                Texto*<br><textarea name="texto" id="" cols="28" required><?php echo $registro->texto ?></textarea><br><br>
                <select name="categoria">
                    <?php
                    try {
                        $consulta2 = $conexion->query("SELECT distinct categoria FROM noticias");
                        $consulta2->execute();
                        while ($registro2 = $consulta2->fetch(PDO::FETCH_OBJ)) {
                    ?>
                    <!--Para mantener la categoria en el select simplemente miramos si este registro2 es igual que el primero que hemos hecho antes, de esta forma lo dejamos selected -->
                    <option value="<?php echo $registro2->categoria ?>" <?php if ( $registro2->categoria == $registro->categoria) {echo "selected";} ?>><?php echo $registro2->categoria ?></option>
                    <?php
                        }
                    } catch (PDOException $e) {
                        echo "ERROR " . $e->getMessage() . "<br>";
                    }
                    ?>

                </select><br><br>
                <input type="hidden" name="id" value="<?php echo $_POST['editar'] ?>">
                <input type="submit" name="enviar" value="Insertar">
            </fieldset>
        </form>
    <?php
    }
    //Aqui simplemente actualizamos los datos.
    if (isset($_POST['enviar'])) {
        $id = $_POST['id'];
        $titulo = $_POST['titulo'];
        $texto = $_POST['texto'];
        $categoria = isset($_POST['categoria']) ? $_POST['categoria'] : null;
        $fecha = date("Y-m-d");

        try {
            $consulta = $conexion->prepare("update noticias set titulo=:titulo,texto=:texto,categoria=:categoria where id like :id");
            $consulta->execute(array(":titulo" => $titulo, ":texto" => $texto, ":categoria" => $categoria, ":id" => $id));

            header("Location:actualizar.php");

        } catch (PDOException $e) {
            echo "Error " . $e->getMessage() . "<br />";
        }
        
    }
    echo "<br><a href='index.html'>Volver al menú</a>";
    ?>
</body>