<?php
function usuario_existe($identificador,$contraseña) {
   if ($identificador=='NARANCO' && $contraseña=='naranco')
     return 0;
   else
     return 1;
}
$users= array('ana' => 'ana','luis' => 'luis');
//var_dump($users);
// Función que muestra la autenticación HTTP.
function autenticacion($mensaje) {
  header("WWW-Authenticate: Basic realm='$mensaje'");
  // Si pulsa cancelar, se ejecutan las líneas siguientes 
  echo 'Debe introducir usuario y contraseña para acceder al sitio <br />';
  echo '<a href="ejer2.php">Vuelva a intentarlo</a>';
  exit;
}

echo "el nombre del server:".$_SERVER['SERVER_NAME']."<BR/>";
echo "el nombre del usuario:".$_SERVER['PHP_AUTH_USER']."<BR/>";
echo "el nombre del PASSWORD:".$_SERVER['PHP_AUTH_PW']."<BR/>";



if (!isset($_SERVER['PHP_AUTH_USER'])) {
  // Ninguna variable $PHP_AUTH_USER = primera llamada del script
  // Solicitud de identificaci�n.
  autenticacion('localhost');
  exit;
} else {
  // Variable $PHP_AUTH_USER existe = llamada despu�s de entrada
  // Recuperar la informaci�n introducida.
  $identificador =$_SERVER['PHP_AUTH_USER'];
  $contraseña = $_SERVER['PHP_AUTH_PW'];
  echo "el nombre del usuario:".$_SERVER['PHP_AUTH_USER']."<BR/>";
echo "el nombre del PASSWORD:".$_SERVER['PHP_AUTH_PW']."<BR/>";
  
    // Verificar que el usuario existe.
	
  if (usuario_existe($identificador,$contraseña)==0) {
    // El usuario existe ...
    echo "Usuario registrado $identificador";
  } else {
     // El usuario no existe ...
     echo "Usuario no registrado $identificador";
  }
  }

?>

