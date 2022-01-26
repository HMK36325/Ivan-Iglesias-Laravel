<?php
session_name('user');
session_start();
include 'funciones.php';
include 'conexion.php';
cabecera('Index'); 

if(isset($_SESSION['user']) & isset($_SESSION['pass'])){
    echo "Estas registrado como ".$_SESSION['user'].", pincha <a href='logout.php'>Aqui para desconectarte</a>";
    }
    else{
        header("Location:login.php");
    }
?>