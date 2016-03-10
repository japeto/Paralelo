<?php
/*
 CLASE PARA LA GESTION DE LOS UNIVERSITARIOS
*/
require_once "db.class_postgres.php";

class graficos extends database
{ 
 function consultaCategorias()
 {       
   $conexion = $this->conectar();  
   $query = $this->consulta("SELECT id_categoria, nombre FROM categoria ORDER BY nombre;");  
   $this->disconnect($conexion);
  if($this->numero_de_filas($query) > 0)
  {
    while ( $tsArray = $this->fetch_assoc($query) )
    {
        $data[] = $tsArray;        
    }
    return $data;
  }//FIN SI
    else
    {
    return '';
    }
 }
 function consultaTipoPregunta()
 {       
   $conexion = $this->conectar();  
   $query = $this->consulta("SELECT id_tipo, nombre_tipo FROM tipo_pregunta ORDER BY nombre_tipo;");  
   $this->disconnect($conexion);
  if($this->numero_de_filas($query) > 0)
  {
    while ( $tsArray = $this->fetch_assoc($query) )
    {
        $data[] = $tsArray;        
    }
    return $data;
  }//FIN SI
    else
    {
    return '';
    }
 }
 
 function consultaEncuestas()
 {       
    $conexion = $this->conectar();  
    $query = $this->consulta("SELECT id_encuesta, titulo, fecha_creacion, hora_creacion, id_usuario, estado, categoria, fecha_de_modificacion FROM encuesta;");  
    $this->disconnect($conexion);
  if($this->numero_de_filas($query) > 0)
  {
    while ( $tsArray = $this->fetch_assoc($query) )
     $data[] = $tsArray;
    return $data;
  }//FIN SI
    else
    {
    return '';
    }
 }
 
 function adicionarEncuesta($titulo, $id_usuario, $id_categoria)
 {       
    $conexion = $this->conectar();  
    $query = $this->consulta("INSERT INTO encuesta(titulo, id_usuario, categoria, estado) VALUES ('".$titulo."','".$id_usuario."','".$id_categoria."','edicion') RETURNING id_encuesta;");
    $this->disconnect($conexion);
  
  if($this->numero_de_filas($query) > 0)
  {
    while ( $tsArray = $this->fetch_assoc($query) )
    {
        $data[] = $tsArray;        
    }
    return $data;
  }//FIN SI
  else
  {
    return '';
  }//FIN ELSE
 }
 
 
 function buscarEncuesta($id_encuesta)
 {       
    $conexion = $this->conectar();  
    $query = $this->consulta("SELECT id_encuesta, titulo FROM encuesta WHERE (id_encuesta = ".$id_encuesta.");");    
    $this->disconnect($conexion);
  
  if($this->numero_de_filas($query) > 0)
  {
    while ( $tsArray = $this->fetch_assoc($query) )
    {
        $data[] = $tsArray;        
    }
    return $data;
  }//FIN SI
  else
  {
    return '';
  }//FIN ELSE
 }
 
 function buscarPregunta($id_pregunta)
 {       
    $conexion = $this->conectar();  
    $query = $this->consulta("SELECT id_pregunta, id_modulo, id_tipo, num_pregunta, texto_pregunta FROM pregunta WHERE (id_pregunta = ".$id_pregunta.");");    
    $this->disconnect($conexion);
  
  if($this->numero_de_filas($query) > 0)
  {
    while ( $tsArray = $this->fetch_assoc($query) )
    {
        $data[] = $tsArray;        
    }
    return $data;
  }//FIN SI
  else
  {
    return '';
  }//FIN ELSE
 }
 
// function adicionarModulo($descripcion)
// {       
//    $conexion = $this->conectar();      
//    $query = $this->consulta("INSERT INTO modulo(descripcion)  VALUES ('".$descripcion."') RETURNING id_modulo;");
//    $this->disconnect($conexion);
//
//  if($this->numero_de_filas($query) > 0)
//  {
//    while ( $tsArray = $this->fetch_assoc($query) )
//    {
//        $data[] = $tsArray;        
//    }
//    return $data;
//  }//FIN SI
//  else
//  {
//    return '';
//  }//FIN ELSE
// }
 
 function adicionarEncuestaModulo($id_encuesta, $id_modulo)
 {       
    $conexion = $this->conectar();      
    $query = $this->consulta("INSERT INTO modulos_encuesta( id_encuesta, id_modulo) VALUES ('".$id_encuesta."', '".$id_modulo."');");
    $this->disconnect($conexion);
 }
 function adicionarOpcionesdePregunta($id_opciones, $id_pregunta)
 {       
    $conexion = $this->conectar();
    for ($i = 0; $i < count($id_opciones); $i++) 
    {
        $query = $this->consulta("INSERT INTO opciones_pregunta( id_opcion, id_pregunta) VALUES ('".$id_opciones[$i]."', '".$id_pregunta."');");
    }
    $this->disconnect($conexion);
 }
 function adicionarPregunta($id_modulo, $numero_pregunta, $texto_pregunta, $id_tipo, $id_encuesta)
 {       
    $conexion = $this->conectar();      
    $query = $this->consulta("INSERT INTO pregunta (id_modulo, id_tipo, num_pregunta, texto_pregunta, id_encuesta) VALUES ('".$id_modulo."','".$id_tipo."','".$numero_pregunta."','".$texto_pregunta."','".$id_encuesta."') RETURNING id_pregunta;");
    $this->disconnect($conexion);

  if($this->numero_de_filas($query) > 0)
  {
    while ( $tsArray = $this->fetch_assoc($query) )
    {
        $data[] = $tsArray;        
    }
    return $data;
  }//FIN SI
  else
  {
    return '';
  }//FIN ELSE
 }
 
 function adicionarOpcionesRespuesta($opciones)
 {       
    $identificadores = array();
    $conexion = $this->conectar();   
     $texto = nl2br($opciones);       
     $lineas = explode  ( '<br />'  , $texto );       
       foreach ($lineas as $r):           
           $query = $this->consulta("INSERT INTO opciones_respuesta(etiqueta_opcion) VALUES ('".trim($r)."') RETURNING id_opcion;");
           $tsArray = $this->fetch_assoc($query);
               $valores[] = $tsArray;               
       endforeach;    
       foreach ($valores as $v):
           $identificadores[] = $v['id_opcion'];
       endforeach;
    $this->disconnect($conexion);
    //print_r($identificadores);
    $valores = array();
    return $identificadores;
 }
 function numeroOpcion()
 {       
    $conexion = $this->conectar();  
    $query = $this->consulta("SELECT nextval('numero_opcion') as id;");
    $this->disconnect($conexion);
  
  if($this->numero_de_filas($query) > 0)
  {
    while ( $tsArray = $this->fetch_assoc($query) )
    {
        $data[] = $tsArray;        
    }
    return $data;
  }//FIN SI
  else
  {
    return '';
  }//FIN ELSE
 }
 function numeroPregunta()
 {       
    $conexion = $this->conectar();  
    $query = $this->consulta("SELECT nextval('numero_pregunta') as id;");
    $this->disconnect($conexion);
  
  if($this->numero_de_filas($query) > 0)
  {
    while ( $tsArray = $this->fetch_assoc($query) )
    {
        $data[] = $tsArray;        
    }
    return $data;
  }//FIN SI
  else
  {
    return '';
  }//FIN ELSE
 }
 function reiniciarNumeroPregunta()
 {       
    $conexion = $this->conectar();  
    $query = $this->consulta("ALTER SEQUENCE numero_pregunta restart 1;");
    $this->disconnect($conexion);    
 }
 function reiniciarNumeroOpcion()
 {       
    $conexion = $this->conectar();  
    $query = $this->consulta("ALTER SEQUENCE numero_opcion restart 1;");
    $this->disconnect($conexion);    
 }
 
 function EncuestaCompleta($id_encuesta)
 {       
    $conexion = $this->conectar();  
    $query = $this->consulta("SELECT e.titulo, m.descripcion, p.id_pregunta, p.texto_pregunta, ores.etiqueta_opcion FROM (((((encuesta as e INNER JOIN modulos_encuesta as me ON e.id_encuesta = me.id_encuesta) INNER JOIN  modulo as m ON me.id_modulo = m.id_modulo) INNER JOIN pregunta as p ON me.id_modulo = p.id_modulo) INNER JOIN opciones_pregunta as op ON p.id_pregunta = op.id_pregunta) INNER JOIN opciones_respuesta as ores ON op.id_opcion = ores.id_opcion) WHERE (e.id_encuesta = ".$id_encuesta.") ORDER BY p.id_pregunta;");    
    $this->disconnect($conexion);
  
  if($this->numero_de_filas($query) > 0)
  {
    while ( $tsArray = $this->fetch_assoc($query) )
    {
        $data[] = $tsArray;        
    }
    return $data;
  }//FIN SI
  else
  {
    return '';
  }//FIN ELSE
 }
}//FIN CLASE USUARIO
?>

