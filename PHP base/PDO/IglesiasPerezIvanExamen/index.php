<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <title>Banco</title>
  <link rel="stylesheet" href="estilo.css">
</head>

<body>

<?php //Cookie para saber cuantas veces se ha accedido a esta pagina.
session_name('user');
session_start();
?>

  <h1>Banco Monte Naranco</h1> 
  <ul>
    <li><a href="insertarCuenta.php">Crear Cuenta(Solo administrador)</a></li>
    <li><a href="añadirMovimiento.php">Añadir un movimiento a la cuenta(Solo para logueados NO ADMINISTRADORES)</a></li>
    <?php if(isset($_SESSION['user']) && isset($_SESSION['pass'])){
      ?>
      <li><a href="logout.php">Desconectarse</a></li>
      <?php
      }?>
  </ul>



</body>

</html>