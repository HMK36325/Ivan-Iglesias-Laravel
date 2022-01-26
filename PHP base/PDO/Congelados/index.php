<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <title>Pedidos</title>
  <link rel="stylesheet" href="estilo.css">
</head>

<body>

<?php //Cookie para saber cuantas veces se ha accedido a esta pagina.
session_name('user');
session_start();

$accesos=1;
if(isset($_COOKIE['visitas'])){
  $accesos=$_COOKIE['visitas']+1;
}
  setcookie('visitas',$accesos,time()+3600);
?>

  <h1>UltraCongelados Naranco</h1>

  <?php if (!isset($_COOKIE['visitas'])) {//Muestro el numero de veces q he accedido y es necesaio el isset para q no de error la primera vez q accedemos
    echo "<p>Ha accededio a la pagina 1 veces</p>"; 
  }else{
    echo "<p>Ha accededio a la pagina ".($_COOKIE['visitas']+1)." veces</p>"; 
  }
  ?>
  
  <ul>
    <li><a href="visualiza.php">Visualizar los productos por categoria</a></li>
    <li><a href="insertar.php">Añadir productos(Solo autorizados)</a></li>
    <li><a href="eliminar.php">Eliminar productos(Solo autorizados)</a></li>
    <li><a href="actualizar.php">Actualizar precios(Solo autorizados)</a></li>
    <li><a href="txt/envase.txt">envase.txt</a></li>
    <?php if(isset($_SESSION['user']) && isset($_SESSION['pass'])){
      ?>
      <li><a href="logout.php">Desconectarse</a></li>
      <?php
      }?>
  </ul>



</body>

</html>