<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <title>Pedidos</title>
  <link rel="stylesheet" href="estilo.css">

</head>

<body>
  <h1>Gestión de PEDIDOS (NEPTUNO)</h1>
  <?php
  session_name('user');
  session_start();

  //En función de si esta registrado muestro el login o el logout.

  if (!isset($_SESSION['cliente']) & !isset($_SESSION['pass'])) {
    echo "No has iniciado sesion.";
    echo "<p><a href='login.php'>Iniciar sesion</a></p>";
  } else {
    echo "BIENVENIDO " . $_SESSION['cliente']." (".$_SESSION['rol'].")";
    echo "<br><a href='logout.php'>Desconectarse</a>";
  }

  ?>

  <ul>
    <li><a href="visualiza.php">Visualizar los productos por categoria</a></li>
    <li><a href="eliminar.php">Eliminar un pedido(Solo admin)</a></li>
    <li><a href="modificar.php">Modificar campo cantidad de detallespedidos</a></li>
    <li><a href="insertar.php">Insertar nuevo pedido</a></li>
  </ul>



</body>

</html>