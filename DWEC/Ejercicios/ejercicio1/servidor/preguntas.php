<?php

/* preguntas.php. Dado un examen, devuelve un listado de preguntas del mismo.
   * 
   * Recibe [GET]
   *    examen (cadena). Código del examen
   *  
   * Devuelve [JSON]
   *   Si no existe un examen con dicho código:
   *           []
   * 
   *  Si existe un examen con dicho código, un listado de preguntas, cada una de las
   *   cuales contiene los campos idPregunta (cadena), texto (cadena), y respuesta, que
   *   a su vez es un listado de respuestas (parejas de conjunto idRespuesta + texto).   
   * 
   * [  { "idPregunta": "1",
   *   "texto": "La estandarización de JavaScript es realizada por",
   *     "respuestas": [  {"idRespuesta": "121", "texto": "ECMA"},
   *          		     {"idRespuesta": "122", "texto": "Mozilla"},
   *         		     {"idRespuesta": "123", "texto": "Script Consortium"},
   *          		     {"idRespuesta": "124", "texto": "W3C" }]
   *  },
   *  { "idPregunta": "2",
   *   "texto": " En JavaScript, para finalizar un bucle de tipo \"for\" se     recomienda usar ",
   *     "respuestas": [  {"idRespuesta": "125", "texto": "No se puede"},
   *          		     {"idRespuesta": "126", "texto": "Exit for"},
   *         		     {"idRespuesta": "127", "texto": "break"},
   *          		     {"idRespuesta": "128", "texto": "Todas son falsas }]
   *  },
   *  ...
   *  ]
   */

// Para que el navegador no haga cache (fecha de expiración menor a la actual)
header('Cache-Control: no-cache, must-revalidate');
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');

header('Content-Type: application/json');

// Configuración BASE DE DATOS MYSQL
$servidor = "localhost";
$basedatos = "examenes";
$usuario = "root";	
$password = "";


 $salida=array();

if(isset($_GET["examen"])){
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
       $sql="select * from preguntas where examen LIKE '".$_GET["examen"]."'";	
               foreach($conexion->query($sql) as $pregunta){ 
                   $idPregunta=$pregunta["id"];
                   $texto=$pregunta["pregunta"];
                   $respuestas=array();
                   $sql2="select * from respuestas where pregunta = ".$idPregunta;
                   foreach($conexion->query($sql2) as $respuesta){
                       $respuestas[]=array("idRespuesta"=>$respuesta["id"],"texto"=>$respuesta["texto"]);
                   }
     
                   $salida[]=array("idPregunta"=>$idPregunta,"texto"=>$texto,"respuestas"=>$respuestas);       
               }
     } 
    catch (Exception $ex) {
        throw new Exception("No se ha podido recuperar la lista: "+$ex);
    }
    finally{
        $conexion=null;        
    }
}     
echo json_encode($salida);

?>