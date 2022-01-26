<?php
try{
    $features=array(PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES utf8");
    
    $conexion= new PDO('mysql:host=localhost;dbname=banco','root','',$features);
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //PARA EXCEPCIONES
    }
    
    catch(PDOException $e) {
    
    echo "ERROR ".$e->getMessage();
    
    } 
?>
