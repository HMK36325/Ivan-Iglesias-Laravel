<?php

/* sugerencia.php. Dado un id de pregunta, devuelve el id de respuesta correcta para la misma.
   * 
   * Recibe [GET]
   *    id-pregunta (cadena). Identificador de pregunta.
   * 
   * Devuelve [JSON]
   *   Si no existe la pregunta:
   *            []
   * 
   *   Si  existe la pregunta, una sugerencia para dicha pregunta
 *             { "idPregunta": "1",
   *   			 "sugerencia": "Consulta los apuntes de estandarización, página 4",
 * 
 */

// Para que el navegador no haga cache (fecha de expiración menor a la actual)
header('Cache-Control: no-cache, must-revalidate');
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Content-Type: application/json');


// Configuración BASE DE DATOS MYSQL
$servidor = "localhost";
$basedatos = "dwec_examenes_reto";
$usuario = "dwec_reto";	
$password = "dwec_reto";

 $salida=array();


if(isset($_GET["id-pregunta"])){
        try{
        $opciones = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");
        $conexion = new PDO('mysql:host='.$servidor.';dbname='.$basedatos,$usuario,$password, $opciones);

         //Configura el nivel de error
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch(PDOException $p){
         echo "<p>Error al conectar ".$p->getMessage()."</p>";
          exit();
    }

    try{
       $sql="select * from preguntas where id=".$_GET["id-pregunta"];
       $resultado=$conexion->query($sql);
       $pregunta=$resultado->fetch(PDO::FETCH_ASSOC);
       if($pregunta!=null){
         $salida=array("id"=>$pregunta["id"],"sugerencia"=>$pregunta["sugerencia"]);
       }
       else{
          $salida=array();
       }
    }
    catch (Exception $ex) {
        throw new Exception("No se ha podido recuperar la lista: ".$ex);
    }
    finally{
        $conexion=null;        
    }      
}

echo json_encode($salida,JSON_UNESCAPED_UNICODE);
