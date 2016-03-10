<?php
/*
 CLASE PARA LA GESTION DE LOS UNIVERSITARIOS
*/
require_once 'db.class.php';

class analisis extends database
{


 function Encuestas($id_usuario)
     {       
      
      $conexionDB = $this->conectarse();  
      $query = "SELECT id_encuesta, titulo FROM encuesta WHERE (1=?) ORDER BY (id_encuesta);";        

      $data=array($id_usuario);
      
      $resultado = $this->consultarConParametrosVarios($query, $data);
      //print_r($resultado);
      $this->desconectar(null);
      return $resultado;   
     }
     function consultarRespuestas($sql)
    {             
      $conexionDB = $this->conectarse();
      $resultado = $this->consultarConParametrosSinPreparar($sql);
      
      $this->desconectar(null);
      return $resultado;   
     }
     
     function consultarGraficos($sql)
    {             
      $conexionDB = $this->conectarse();
      $resultado = $this->consultarConParametrosSinPreparar($sql);
      
      $this->desconectar(null);
      return $resultado;   
     }
}/*fin clase*/

 
?>