<html>

<head>
   <title>Consulta de noticias</title>
   <link rel="stylesheet" type="text/css" href="estilo.css" />
</head>

<body>

   <h1>Consulta de noticias</h1>

   <?php
   include 'conexion.php';

   // Enviar consulta
   $sql = "select * from noticias order by fecha desc";
   //realiza una consulta a la B.D   
   $res = $conexion->query($sql);
   if (!$res)
      die("Error: no se pudo realizar la consulta") . $conexion->error;
   // Mostrar resultados de la consulta 

   $nfilas = $conexion->affected_rows;

   echo "El número de filas de la consulta es:" . $nfilas;
   if ($nfilas > 0) {
      echo "<table>";
      echo "<tr>";
      echo "<th>Título</th>";
      echo "<th>Texto</th>";
      echo "<th>Categoría</th>";
      echo "<th>Fecha</th>";
      echo "<th>Imagen</th>";
      echo "</tr>";

      while ($fila = $res->fetch_object()) {
         echo "<tr>";
         echo "<td>" . $fila->titulo . "</td>";
         echo "<td>" . $fila->texto . "</td>";
         echo "<td>" . $fila->categoria . "</td>";
         echo "<td>" . date("j/n/Y", strtotime($fila->fecha)) . "</td>";

         if ($fila->imagen != "")
            echo "<td><a target='_blank' href='img/" . $fila->imagen .
               "'><img src='img/ico-fichero.gif' alt='Imagen asociada'></a></td>";
         else
            echo "<td>  </td>";
         echo "</tr>";
      }
      echo "</table>";
   } else
      echo "No hay noticias disponibles";

   // Cerrar conexión
   $conexion->close();

   ?>

</body>

</html>