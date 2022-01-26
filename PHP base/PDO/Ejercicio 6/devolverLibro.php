<?php
include 'conexion.php';
include 'funciones.php';
cabecera("Devolver Libro");
?>

<body>
    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
        <?php
        try {   // Consultamos los registros que no han sido devueltos.
            $consulta = $conexion->query("SELECT libros.TITULO, prestamo.*, socios.NOMBRE FROM libros INNER JOIN prestamo on libros.COD_LIBRO = prestamo.COD_LIBRO INNER JOIN socios ON prestamo.COD_SOCIO=socios.COD_SOCIO WHERE prestamo.DEVUELTO LIKE 'N'");
            $consulta->execute();

            //Imprimo en una tabla todos los campos de la tabla prestamo.

            echo "<table>";
            echo "<tr><th>Título</th><th>COD_SOCIO</th><th>COD_LIBRO</th><th>Fecha_Prestamo</th><th>Fecha_Devolución</th><th>Devuelto</th><th>Socio</th></tr>";
            while ($registro = $consulta->fetch(PDO::FETCH_OBJ)) {
                echo "<tr><td> " . $registro->TITULO . "</td><td> " . $registro->COD_SOCIO . "</td><td>" . $registro->COD_LIBRO . "</td><td> " . $registro->FECHA_PRESTAMO . "</td><td> " . $registro->FECHA_DEVOLUCION . "</td><td>" . $registro->DEVUELTO . "</td><td>" . $registro->NOMBRE . "</td><td><input type='checkbox' name='prestamos[]' value='$registro->COD_LIBRO/$registro->COD_SOCIO/$registro->FECHA_PRESTAMO'></td></tr>";
            }
            echo "</table>";
        } catch (PDOException $e) {
            echo "Error " . $e->getMessage() . "<br />";
        }
        ?>
        <input type="submit" name="devolver" value="Devolver">
    </form>
</body>
<?php

if (isset($_POST['devolver']) && !empty($_POST['prestamos'])) {
    foreach ($_POST['prestamos'] as $key => $p) {
        $ids = explode("/", $_POST['prestamos'][$key]);//Guardo en un array los campos que me pasa el checked, idLibro, idSocio y fecha.

         //Guardo el numero de libros que hay en stock de ese libro q van a devolver para sumarle 1 al stock.
        $consulta = $conexion->query("SELECT UNIDADES FROM libros WHERE COD_LIBRO LIKE '$ids[0]'");
        $registro = $consulta->fetch(PDO::FETCH_OBJ);
        $stockLibro = $registro->UNIDADES; //El numero de libros que hay disponibles del libro.
        $stockLibro++;//Le sumo 1 al stock

        //UPDATE prestamo SET DEVUELTO='S' WHERE COD_SOCIO LIKE '220' AND COD_LIBRO LIKE 'IG-120'

        try {
            $consulta = $conexion->prepare("UPDATE prestamo SET DEVUELTO='S' WHERE COD_LIBRO LIKE '$ids[0]' AND COD_SOCIO  LIKE '$ids[1]' AND FECHA_PRESTAMO LIKE '$ids[2]'");
            $consulta->execute();

            //Metemos el segundo try que aumenta el stock en 1 dentro del otro, por si fallase la devolucion que no aumente el stock sin devolver el libro.
            try {
                $consulta2 = $conexion->prepare("UPDATE libros SET UNIDADES=:stockLibro WHERE COD_LIBRO LIKE '$ids[0]'");
                $consulta2->execute(array(":stockLibro" =>$stockLibro));

                header("Location:devolverLibro.php");
    
            } catch (PDOException $e) {
                echo "Error " . $e->getMessage() . "<br />";
            }

        } catch (PDOException $e) {
            echo "Error " . $e->getMessage() . "<br />";
        } 

    }
}
echo "<br><a href='index.html'>Volver al menú</a>";
?>