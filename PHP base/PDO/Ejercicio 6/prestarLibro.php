<?php
include 'conexion.php';
include 'funciones.php';
cabecera("Prestar Libro");
?>

<body>
    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
        <fieldset>
            <select name="libro">
                <option value="" disable selected>Seleccione un libro</option>
                <?php
                try {
                    $consulta = $conexion->query("SELECT distinct TITULO FROM libros");
                    while ($registro = $consulta->fetch(PDO::FETCH_OBJ)) {
                ?>
                        <option value="<?php echo $registro->TITULO ?>" <?php if (isset($_POST['TITULO']) && $_POST['TITULO'] == "$registro->TITULO") {echo "selected";} ?>><?php echo $registro->TITULO ?></option>
                        <!-- Lo imprimimos de esta manera por si tenemos demasiados campos -->
                <?php
                    }
                } catch (PDOException $e) {
                    echo "ERROR " . $e->getMessage() . "<br>";
                }
                ?>
            </select>
            <select name="socio">
                <option value="" disable selected>Seleccione un socio</option>
                <?php
                try {
                    $consulta = $conexion->query("SELECT distinct NOMBRE FROM socios");
                    $consulta->execute();
                    while ($registro = $consulta->fetch(PDO::FETCH_OBJ)) {
                ?>
                        <option value="<?php echo $registro->NOMBRE ?>" <?php if (isset($_POST['NOMBRE']) && $_POST['NOMBRE'] == "$registro->NOMBRE") {
                                                                            echo "selected";
                                                                        } ?>><?php echo $registro->NOMBRE ?></option>
                        <!-- Lo imprimimos de esta manera por si tenemos demasiados campos -->
                <?php
                    }
                } catch (PDOException $e) {
                    echo "ERROR " . $e->getMessage() . "<br>";
                }
                ?>
            </select>
            <input type="submit" name="enviar" value="Añadir">
        </fieldset>
    </form>
    <?php
    if (isset($_POST['enviar'])) {

        //Guardo el titulo del libro y el nombre del socio para trabajar con ellos.
        $titulo = $_POST['libro'];
        $socio = $_POST['socio'];


        //Vamos a guardar el id del libro y el de id del socio para trabajar con ellos.
        $consulta1 = $conexion->query("SELECT COD_LIBRO FROM libros WHERE TITULO LIKE '$titulo'");
        $registro1 = $consulta1->fetch(PDO::FETCH_OBJ);
        $tituloId = $registro1->COD_LIBRO; //El id del libro

        $consulta2 = $conexion->query("SELECT COD_SOCIO FROM socios WHERE NOMBRE LIKE '$socio'");
        $registro2 = $consulta2->fetch(PDO::FETCH_OBJ);
        $socioId = $registro2->COD_SOCIO; //El id del socio

        //Vamos a guardar el numero de libros que hay disponibles del libro que queremos prestar en concreto.
        $consulta3 = $conexion->query("SELECT UNIDADES FROM libros WHERE COD_LIBRO LIKE '$tituloId'");
        $registro3 = $consulta3->fetch(PDO::FETCH_OBJ);
        $stockLibro = $registro3->UNIDADES; //El numero de libros que hay disponibles del libro

        //Ahora guardo el resto de campos necesarios para introducirlos en la tabla prestamo.
        $fecha = date("Y-m-d");
        $fechaDev = strtotime('+15 day', strtotime($fecha));
        $fechaDev = date('Y-m-j', $fechaDev);
        $devuelto = 'N';

        //Voy a guardar si el libro ha sido ya alquilado por ese socio y en ese caso q haya sido devuelto.
        $consulta4 = $conexion->query("SELECT DEVUELTO FROM prestamo WHERE COD_SOCIO LIKE '$socioId' and COD_LIBRO LIKE '$tituloId'");
        $comprobarDev=null;
        while ($registro4 = $consulta4->fetch(PDO::FETCH_OBJ)) {
            $comprobarDev = $registro4->DEVUELTO;
        }

        if ($comprobarDev == 'S' || $comprobarDev==null) { //Si el socio ya alquilo ese libro, compruebo que lo devolvio antes de volver a alquilarlo.

            //insertamos el nuevo registro en la tabla prestamo.

            if ($stockLibro > 0) { //Antes de insertar el registro compruebo que haya stock de ese libro.

                try {
                    $consulta = $conexion->prepare("INSERT INTO prestamo (COD_SOCIO,COD_LIBRO,FECHA_PRESTAMO,FECHA_DEVOLUCION,DEVUELTO) VALUES(:socioId,:tituloId,:fecha,:fechaDev,:devuelto)");
                    $consulta->execute(array(":socioId" => $socioId, ":tituloId" => $tituloId, ":fecha" => $fecha, ":fechaDev" => $fechaDev, ":devuelto" => $devuelto));
                    echo "<h1>Resultado del prestamo:</h1><br>
                <ul><li>Título:$titulo</li></ul>
                <ul><li>Socio:$socio</li></ul>
                <ul><li>Fecha:$fecha</li></ul>
                <ul><li>FechaDev:$fechaDev</li></ul>
                <ul><li>Devuelto:$devuelto</li></ul>";
                } catch (PDOException $e) {
                    echo "Error " . $e->getMessage() . "<br />";
                }

                //Por ultimo descuento 1 al stock de ese libro
                $stockLibro--;
                try {
                    $consulta = $conexion->prepare("UPDATE libros SET UNIDADES=:stockLibro WHERE COD_LIBRO LIKE '$tituloId'");
                    $consulta->execute(array(":stockLibro" => $stockLibro));
                } catch (PDOException $e) {
                    echo "Error " . $e->getMessage() . "<br />";
                }
            } else {
                echo "<br><h3>No quedan stock de ese libro..</h3>";
            }
        }else{
            echo "<br><h3>El socio ya tiene alquilado este libro y no ha sido devuelto.</h3>";
        }
    }
    echo "<br><a href='index.html'>Volver al menú</a>";
    ?>
</body>