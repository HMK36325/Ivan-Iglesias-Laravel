<?php
session_name('user');
session_start();
include 'funciones.php';
include 'conexion.php';
cabecera('LOGOUT'); 

if(isset($_SESSION['cliente']) & isset($_SESSION['pass'])){
    $H=date('H')+1; 
    $date=date("m/d/y $H:i:s") ;
    echo" Desconexion del usuario ".$_SESSION['cliente']."<br> Hora de conexion: ".$_SESSION['time']."<br>Hora desconexion: $date";
    echo "<br><a href='index.php'>Volver al menu</a>";
    session_destroy();
    }
    else{
        echo "No estabas registrado, pincha <a href='index.php'>Aqui para volver al menu</a>";
    }
?>