<?php
session_start();
// Si el número no está guardado en la sesión, lo pone a cero
if (!isset($_SESSION['numero'])) {
    $_SESSION['numero'] = 0;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8" />
  <title>
  </title>
  <link rel="stylesheet" href="estilo.css" title=" " />
</head>
<body>
<h1>Subir y bajar número</h1>

<form action="sesionesnum2.php" method="POST">
	<p>Haga clic en los botones para modificar el valor:</p>
	<p>
		<button type="submit" name="accion" value="bajar" >&#x1F447;</button>
		<?php
		// Muestra el número, guardado en la sesión
			echo '<span style="font-size:4rem">'.$_SESSION['numero'].'</span>';
		?>
		<button type="submit" name="accion" value="subir">&#x1F446;</button>
	</p>
	<p>
		<button class="peque" type="submit" name="accion" value="cero">poner a cero</button>
	</p>
</form>
</body>
</html>
