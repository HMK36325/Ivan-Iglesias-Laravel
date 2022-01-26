<?php
  $accesos=1;
  if(isset($_COOKIE['num_accesos'])){
     $accesos=$_COOKIE['num_accesos']+1;
  }
  setcookie('num_accesos',$accesos,time()+3600);
?>
<HTML>
 <HEAD>
   <TITLE>Trabajando con Cookies</TITLE>
 </HEAD>
 <BODY>
   <CENTER>
     <H2>Trabajando con cookies</H2><br>
     <H3>Contador de accesos</H3>
     <?php
       if(isset($accesos) )
		 if ($accesos>1)
           echo "Has accedido a esta página <B>$accesos</B> veces";
       else
         echo "Es la primera vez que accedes a esta página";
     ?>
     <BR><BR><BR>
     <PRE><A HREF="cookies1.php">Actualizar</A>
   </CENTER>
 </BODY>
</HTML>
