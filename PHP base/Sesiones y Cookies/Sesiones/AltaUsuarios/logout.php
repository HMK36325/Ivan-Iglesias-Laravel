<?php
session_name('user');
session_start();
include 'funciones.php';
include 'conexion.php';
cabecera('LOGOUT'); 

if(isset($_SESSION['user']) & isset($_SESSION['pass'])){
    $H=date('H')+1; 
    $date=date("m/d/y $H:i:s") ;
    echo" Desconexion del usuario ".$_SESSION['user']."<br> Hora de conexion: ".$_SESSION['time']."<br>Hora desconexion: $date";
    echo "<br><a href='login.php'>Logearse</a>";
    echo "<br><a href='alta.php'>Registrarse</a>";
    session_destroy();
    }
    else{
        echo "No estabas registrado, pincha <a href='index.php'>Aqui para volver al menu</a>";
    }
?>