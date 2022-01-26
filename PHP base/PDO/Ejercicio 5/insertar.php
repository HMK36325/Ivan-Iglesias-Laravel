<?php
include 'conexion.php';
include 'funciones.php';
cabecera("Insertar Noticias");
?>

<body>
    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
        <fieldset>
            Título*<br><input type="text" name="titulo" required value="<?php echo mantenerCampo('titulo') ?>"><br><br>
            Texto*<br><textarea name="texto" id="" cols="28" required value="<?php echo mantenerCampo('texto') ?>"></textarea><br><br>
            <select name="categoria">
                <option value="" disable selected>Seleccione una categoria</option>
                <?php
                try {
                    $consulta = $conexion->query("SELECT distinct categoria FROM noticias");
                    $consulta->execute();
                    while ($registro = $consulta->fetch(PDO::FETCH_OBJ)) {
                ?>
                        <option value="<?php echo $registro->categoria ?>" <?php if (isset($_POST['categoria']) && $_POST['categoria'] == "$registro->categoria") {
                                                                                echo "selected";
                                                                            } ?>><?php echo $registro->categoria ?></option>
                <?php
                    }
                } catch (PDOException $e) {
                    echo "ERROR " . $e->getMessage() . "<br>";
                }
                ?>
            </select><br><br>

            <input type="file" name="imagen">
            <br><br>

            <input type="submit" name="enviar" value="Insertar">
        </fieldset>
    </form>

    <?php
    //Guardo los datos recogidos en el formulario en variables
    if (isset($_POST['enviar'])) {
        $titulo = $_POST['titulo'];
        $texto = $_POST['texto'];
        $categoria = isset($_POST['categoria']) ? $_POST['categoria'] : null;
        $fecha = date("Y-m-d");

        //validar imagen
        $directorio = "img/";
        $archivo = $directorio . basename($_FILES["imagen"]["name"]);
        $validarImagen = getimagesize($_FILES["imagen"]["tmp_name"]);
        //la subimos a la carpeta donde tenemos las imagenes
        if ($validarImagen != false) {
            move_uploaded_file($_FILES["imagen"]["tmp_name"], $archivo);
        }
        //guardamos la imagen en una variable para subir la ruta de la imagen a la base de datos
        $imagen = $_FILES["imagen"]["name"];

        //subimos los valores a la base de datos
        try {
            $consulta = $conexion->prepare("insert into noticias (titulo,texto,categoria,fecha,imagen) values (:titulo,:texto,:categoria,:fecha,:imagen)");
            $consulta->execute(array(":titulo" => $titulo, ":texto" => $texto, ":categoria" => $categoria, ":fecha" => $fecha, ":imagen" => $imagen));

            echo "<h1>Resultado de la inserción:</h1><br>
                 <ul><li>Título:$titulo</li></ul>
                 <ul><li>Texto:$texto</li></ul>
                 <ul><li>Categoría:$categoria</li></ul>
                 <ul><li>Fecha:$fecha</li></ul>";
                 
        } catch (PDOException $e) {
            echo "Error " . $e->getMessage() . "<br />";
        }
    }
    echo "<br><a href='index.html'>Volver al menú</a>";
    ?>
</body>