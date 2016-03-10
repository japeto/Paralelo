<?php
/*
 CLASE PARA LA GESTION DE LOS UNIVERSITARIOS
*/
require_once 'db.class.php';
//require_once 'db.class_bodega.php';

class analisis_avanzado extends database
{


 function Encuestas1($id_usuario)
     {       
      
      //$conexionDB = $this->conectarse();  
      $conexion =$this->conectar_postgres();
      $this->metadatos($conexion, "");
      $query = "SELECT id_encuesta, titulo FROM encuesta WHERE (1=?) ORDER BY (id_encuesta);";        

      $data=array($id_usuario);
      
      $resultado = $this->consultarConParametrosVarios($query, $data);
      //print_r($resultado);
      $this->desconectar(null);
      return $resultado;   
     }
     function consultarRespuestas1($sql)
    {             
      $conexionDB = $this->conectarse();
      $resultado = $this->consultarConParametrosSinPreparar($sql);
      
      $this->desconectar(null);
      return $resultado;   
     }
     
     
    function consultarRespuestaPorPregunta1($sql)
    {             
      $conexionDB = $this->conectarse();
      $resultado = $this->consultarConParametrosSinPreparar($sql);
      
      $this->desconectar(null);
      return $resultado;   
     }
     
     
     function consultarGraficos1($sql){             
      $conexionDB = $this->conectarse();
      $resultado = $this->consultarConParametrosSinPreparar($sql);
      
      $this->desconectar(null);
      return $resultado;   
     }

     function consultaResumen($sql){
        $conexionDB = $this->conectarse();
        $resultado = $this->consultarTodosLosDatos($sql);
        $this->desconectar(null);
        return $resultado;
     }
}/*fin clase*/

 
?>