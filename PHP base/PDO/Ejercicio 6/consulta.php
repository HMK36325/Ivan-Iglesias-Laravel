<?php
include 'conexion.php';
include 'funciones.php';
cabecera("Consultar Prestamo");

?>
<body>
  <?php
  try {
    $consulta = $conexion->query("SELECT libros.TITULO, prestamo.* FROM prestamo INNER JOIN libros on prestamo.COD_LIBRO = libros.COD_LIBRO ORDER BY prestamo.FECHA_PRESTAMO ASC;");
    $consulta->execute();

    //Imprimo en una tabla todos los campos de la tabla prestamo.

    echo "<table>";
    echo "<tr><th>Título</th><th>COD_SOCIO</th><th>COD_LIBRO</th><th>Fecha_Prestamo</th><th>Fecha_Devolución</th><th>Devuelto</th></tr>";
    while ($registro = $consulta->fetch(PDO::FETCH_OBJ)) {
      echo "<tr><td> " . $registro->TITULO . "</td><td> " . $registro->COD_SOCIO . "</td><td>" . $registro->COD_LIBRO. "</td><td> " . $registro->FECHA_PRESTAMO . "</td><td> " . $registro->FECHA_DEVOLUCION. "</td><td>" . $registro->DEVUELTO ."</td></tr>";
    }
    echo "</table>";
} catch (PDOException $e) {
    echo "Error " . $e->getMessage() . "<br />";
} 

echo "<br><a href='index.html'>Volver al menú</a>";
  ?> 

</body>
