<?php
/*
 CLASE PARA LA GESTION DE LOS UNIVERSITARIOS
*/
//require_once "db.class_postgres.php";
require_once 'db.class.php';

class encuestado extends database
{ 
     /**********************************************************************************************************************************/
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
     function usuarioEncuesta($id_usuario)
     {       
      
      $conexionDB = $this->conectarse();  
      $query = "SELECT id_encuesta, titulo, fecha_creacion, id_usuario, estado FROM encuesta WHERE (id_usuario=?) ORDER BY (id_encuesta);";        

      $data=array($id_usuario);
      
      $resultado = $this->consultarConParametrosVarios($query, $data);
      //print_r($resultado);
      $this->desconectar(null);
      return $resultado;   
     }
     function finEncuesta($id_usuario)
     {       
      
      $conexionDB = $this->conectarse();  
      $query = "SELECT (now()::TIME - hora_diligenciada_la_encuesta) as hora FROM encuesta1 WHERE pin = ?;";        

      $data=array($id_usuario);
      
      $resultado = $this->consultarConParametrosVarios($query, $data);
      //print_r($resultado);
      $this->desconectar(null);
      return $resultado;   
     }
     
     function modulosEncuesta($id_encuesta)
     {       
      
      $conexionDB = $this->conectarse();  
      $query = "SELECT me.id_modulo, m.descripcion FROM ((encuesta as e INNER JOIN modulos_encuesta as me ON e.id_encuesta = me.id_encuesta) INNER JOIN modulo as m ON me.id_modulo = m.id_modulo) WHERE (e.id_encuesta = ?) ORDER BY (me.id_modulo);";        

      $data=array($id_encuesta);
      
      $resultado = $this->consultarConParametrosVarios($query, $data);
      //print_r($resultado);
      $this->desconectar(null);
      return $resultado;   
     }
     
     function moduloActualEncuesta($id_encuesta, $modulo_actual)
     {       
      
      $conexionDB = $this->conectarse();  
      $query = "SELECT id_modulo FROM modulos_encuesta WHERE (id_encuesta= ?) AND (num_modulo= ?);";        

      $data=array($id_encuesta, $modulo_actual);      
      $resultado = $this->consultarConParametros($query, $data);
      //print_r($resultado);
      $this->desconectar(null);
      return $resultado;   
     }

function EncuestaActiva($valor)
     {          
      
      $conexionDB = $this->conectarse();  
      $query = "SELECT id_encuesta, titulo, consentimiento_informado FROM encuesta WHERE (1=?) AND (estado= ?) ORDER BY (id_encuesta);";        

      $data=array($valor, "Activada");
      
      $resultado = $this->consultarConParametrosVarios($query, $data);
      //print_r($resultado);
      $this->desconectar(null);
      return $resultado;   
     
     }     
     /*PENDIENTE*/
     function consentimiento_Encuesta($id_encuesta){       

      $conexionDB = $this->conectarse();  
      $query = "SELECT titulo, consentimiento_informado FROM encuesta WHERE (id_encuesta=?) AND (estado= ?) ORDER BY (id_encuesta);";        

      $data=array($id_encuesta, "Activada");
      
      $resultado = $this->consultarConParametrosVarios($query, $data);
      //print_r($resultado);
      $this->desconectar(null);
      return $resultado;   
     
     }
     function preguntaEncuestaLimitado($id_modulo, $cantidad_registros_pagina, $rango){       
      
      $conexionDB = $this->conectarse();  
      $query = "SELECT p.id_pregunta, p.id_tipo, p.num_pregunta, p.texto_pregunta FROM (pregunta as p INNER JOIN modulos_encuesta as me ON me.id_modulo = p.id_modulo) WHERE (me.id_modulo = ?) ORDER BY (p.id_pregunta) LIMIT ? OFFSET ?;";       

      $data=array($id_modulo, $cantidad_registros_pagina, $rango);
      
      $resultado = $this->consultarConParametrosVarios($query, $data);
      
      $this->desconectar(null);
      return $resultado;   
     }
     function cantidad_modulos_por_encuesta($id_modulo)
     {       
      
      $conexionDB = $this->conectarse();  
      $query = "SELECT count(*) as num FROM ((encuesta as e INNER JOIN modulos_encuesta as me ON e.id_encuesta = me.id_encuesta) INNER JOIN modulo as m ON me.id_modulo = m.id_modulo) WHERE (e.id_encuesta = ?);";        

      $data=array($id_modulo);
      
      $resultado = $this->consultarConParametrosVarios($query, $data);
      
      $this->desconectar(null);
      return $resultado;   
     }
     function cantidad_preguntas_por_modulo($id_modulo)
     {       
      
      $conexionDB = $this->conectarse();  
      $query = "SELECT count(*) as num FROM pregunta WHERE (id_modulo = ?);";        

      $data=array($id_modulo);
      
      $resultado = $this->consultarConParametrosVarios($query, $data);
      
      $this->desconectar(null);
      return $resultado;   
     }
     
     function preguntasEncuesta($id_encuesta, $id_modulo)
     {       
      
      $conexionDB = $this->conectarse();  
      $query = "SELECT p.id_pregunta, p.num_pregunta, p.id_tipo, p.texto_pregunta FROM (((encuesta as e INNER JOIN modulos_encuesta as me ON e.id_encuesta = me.id_encuesta) INNER JOIN modulo  as m ON me.id_modulo = m.id_modulo) INNER JOIN pregunta as p ON p.id_modulo = m.id_modulo) WHERE ((e.id_encuesta=?) AND (m.id_modulo=?)) ORDER BY (p.id_pregunta);";        

      $data=array($id_encuesta, $id_modulo);
      
      $resultado = $this->consultarConParametrosVarios($query, $data);
      //print_r($resultado);
      $this->desconectar(null);
      return $resultado;   
     }
     
     function consultarTipoTabla($id_pregunta)
     {       
      
      $conexionDB = $this->conectarse();  
      $query = "SELECT cantidad_columnas, cantidad_filas FROM pregunta_tipo_tabla WHERE (id_pregunta=?);";        

      $data=array($id_pregunta);
      
      $resultado = $this->consultarConParametros($query, $data);
      $this->desconectar(null);
      return $resultado;   
     }
     
     function opcionesPregunta($id_pregunta)
     {       
      
      $conexionDB = $this->conectarse();  
      $query = "SELECT opr.codigo_opcion, opr.etiqueta_opcion FROM (pregunta as p INNER JOIN opciones_pregunta as op ON p.id_pregunta = op.id_pregunta) INNER JOIN opciones_respuesta AS opr ON op.id_opcion = opr.id_opcion WHERE (p.id_pregunta=?) ORDER BY(opr.id_opcion);";        

      $data=array($id_pregunta);
      
      $resultado = $this->consultarConParametrosVarios($query, $data);
      $this->desconectar(null);
      return $resultado;   
     }
     
     
     
     function opcionesPreguntaTipoTabla($id_pregunta)
     {       
      
      $conexionDB = $this->conectarse();  
      $query = "SELECT osptt.id, osptt.opcion_columna FROM ((pregunta as p INNER JOIN pregunta_tipo_tabla as ptt ON p.id_pregunta = ptt.id_pregunta) INNER JOIN opciones_seleccion_pregunta_tipo_tabla as osptt ON ptt.id = osptt.id_pregunta_tipo_tabla) WHERE (ptt.id = (SELECT ptt.id  FROM pregunta as p INNER JOIN pregunta_tipo_tabla as ptt ON p.id_pregunta = ptt.id_pregunta WHERE (p.id_pregunta = ?) ));";        

      $data=array($id_pregunta);
      
      $resultado = $this->consultarConParametrosVarios($query, $data);
      $this->desconectar(null);
      return $resultado;   
     }     
     
     function PreguntasVinculadas($id_encuesta, $id_pregunta)
     {       
      
      $conexionDB = $this->conectarse();  
      $query = "SELECT id_pregunta, opcion, vinculo FROM preguntas_vinculadas WHERE (id_encuesta = ?) AND (id_pregunta = ?);";
      $data = array($id_encuesta, $id_pregunta);
      
      $resultado = $this->consultarConParametrosVarios($query, $data);
      $this->desconectar(null);
      return $resultado;   
     }     
     
     
     function consultarPresentacionPregunta($id_pregunta)
     {       
      
      $conexionDB = $this->conectarse();  
      $query = "SELECT cantidad_columnas, cantidad_filas FROM pregunta_presentacion WHERE (id_pregunta=?) ;";        

      $data=array($id_pregunta);
      
      $resultado = $this->consultarConParametros($query, $data);
      $this->desconectar(null);
      return $resultado;   
     }
     
     function adicionarRespuestas($pin ,$respuestas, $id_encuesta)
    {   
         
        $conexionDB = $this->conectarse();
        $query = '';
        foreach ($respuestas as $r):
            $query = "UPDATE encuesta".$id_encuesta." SET pregunta".$r['numero_pregunta']." = ? WHERE pin = '".$pin."';";
            $data = array($r['respuesta']);
            $valor = $this->actualizar1($query, $data);

            $query = "UPDATE resumen".$id_encuesta." SET pregunta".$r['numero_pregunta']." = ? WHERE pin = '".$pin."';";
            $data = array($r['pregunta_tipo']);
            $valor = $this->actualizar1($query, $data);
        endforeach; 

             /*switch ((int)$r['pregunta_tipo']) {
              case 1:
                   array($r['respuesta'])=1;         
                   
                break;

              case 2:
                if ($r['respuesta'] !== '') {
                $data = array($r['1']);
              }else{
                $data = array($r['0']);
              }
                break;

              case 3:
                if ($r['respuesta'] !== '') {
                $data = array($r['respuesta']);
              }else{
                $data = array($r['']);
              }
                break;

              case 4:
              if ($r['respuesta'] !== '') {
                $data = array($r['respuesta']);
              }else{
                $data = array($r['']);
              }
                break;

              case 5:
               if ($r['respuesta'] !== '') {
                $data = array($r['respuesta']);
              }else{
                $data = array($r['']);
              }
                break;

              case 6:
                 if ($r['respuesta'] !== '') {
                $data = array($r['respuesta']);
              }else{
                $data = array($r['']);
              }
                break;

              case 7:
              $rest = 1;
                if ($r['respuesta'] !== '') {
                $data = array($r['rest++']);
              }else{
                $data = array($r['']);
              }                
                break;

              case 8:
                   
                break;
              
              default:
                # code...
                break;
                $data = array($r['respuesta']);
                $valor = $this->actualizar1($query, $data);
            }*/
        //endforeach;                
        $this->desconectar(null); 
        return $query;
    }
        
    /**************************************************************************************************************************************/
    function departamentos($un_valor)
     {       
      
      $conexionDB = $this->conectarse();  
      $query = "SELECT id, nombre_departamento FROM departamentos WHERE (1=?) ORDER BY(nombre_departamento);";        
      $data = array($un_valor);
      $resultado = $this->consultarConParametrosVarios($query, $data);
      
      $this->desconectar(null);
      return $resultado;   
     }
     function municipios($id_dpto)
     {       
      
      $conexionDB = $this->conectarse();  
      $query = "SELECT id, nombre_municipio FROM municipios WHERE (codigo_departamento=?) ORDER BY(nombre_municipio);";        
      $data = array($id_dpto);
      $resultado = $this->consultarConParametrosVarios($query, $data);
      
      $this->desconectar(null);
      return $resultado;   
     }
     /**************************************************************************************************************************************/
     function facultades($id_universidad)
     {       
      
      $conexionDB = $this->conectarse();  
      $query = "SELECT id, nombre_facultad FROM facultad WHERE (codigo_universidad=?) ORDER BY(nombre_facultad);";        
      $data = array($id_universidad);
      $resultado = $this->consultarConParametrosVarios($query, $data);
      
      $this->desconectar(null);
      return $resultado;   
     }
     
     function programaAcademico($id_facultad)
     {       
      
      $conexionDB = $this->conectarse();  
      $query = "SELECT codigo, nombre_programa FROM programa_academico WHERE (codigo_facultad=?) ORDER BY(nombre_programa);";        
      $data = array($id_facultad);
      $resultado = $this->consultarConParametrosVarios($query, $data);
      
      $this->desconectar(null);
      return $resultado;   
     }     
   /***************************************************************************************************************/   
     function cargarPartesEncuesta($id_encuesta)
     {       
      
      $conexionDB = $this->conectarse();  
      $query = "SELECT id_modulo FROM modulos_encuesta WHERE id_encuesta=?;";        
      $data=array($id_encuesta);
      
      $modulos = $this->consultarConParametrosVarios($query, $data);      
      
      if (count($modulos) > 0) 
      {           
          for ($i = 0; $i < count($modulos); $i++) 
          {
             $query = "SELECT id_pregunta  FROM pregunta WHERE id_modulo= ? ORDER BY id_pregunta ASC;";        
             $data = array($modulos[$i]['id_modulo']);      
             $preguntas = $this->consultarConParametrosVarios($query, $data);                
             
             foreach ($preguntas as $pre):
              $todas[] = $pre['id_pregunta'];
             endforeach;             
          }
      }            
      $this->desconectar(null);
      
      return $todas;   
     }
     
     
     function nombreEncuesta($id_encuesta)
     {
        $conexionDB = $this->conectarse();  
        $query = "SELECT titulo FROM encuesta WHERE id_encuesta=?;";
        $data=array($id_encuesta);        
        $nombre_encuesta = $this->consultarConParametros($query, $data); 
        
        $this->desconectar(null);
        return $nombre_encuesta;
    }
    
    
    function cargarTipos($id_encuesta)
     {
        $conexionDB = $this->conectarse();  
        $query = "SELECT id_modulo FROM modulos_encuesta WHERE id_encuesta=?;";
        $data=array($id_encuesta);        
        
        $modulos = $this->consultarConParametrosVarios($query, $data); 
        
        if (count($modulos) > 0) 
        {
            for ($i = 0; $i < count($modulos); $i++) 
            {
                $query = "SELECT id_tipo  FROM pregunta WHERE id_modulo=? ORDER BY id_pregunta ASC;";
                $data = array($modulos[$i]['id_modulo']);      
                $preguntas = $this->consultarConParametrosVarios($query, $data);                
             
                foreach ($preguntas as $pre):              
                    if ($pre['id_tipo'] !== "6")
                    {
                        $todas[] = $pre['id_tipo'];
                    }
                 endforeach;     
            }                     
        }                 
        $this->desconectar(null);
        return $todas;
    }
    
    
    function numero_modulo($id_encuesta, $pin)
     {
        $conexionDB = $this->conectarse();  
        session_start();
        
        $arregloPreguntas = $_SESSION["preguntas"];
               
        for ($k = 0; $k < count($arregloPreguntas); $k++) 
        {
            $query = "SELECT id_pregunta, id_modulo, id_tipo, num_pregunta FROM pregunta WHERE (id_pregunta = ?);";
            $data=array($arregloPreguntas[$k]);
            $preguntas = $this->consultarConParametrosVarios($query, $data);                         

                foreach ($preguntas as $pregunta):
                        if ( ($pregunta['num_pregunta'] == null ) || ($pregunta['num_pregunta'] == "" ))
                        {
                            continue;
                        }

                        $queryRespuestasVacias = "SELECT pregunta".$pregunta['num_pregunta']." FROM encuesta".$id_encuesta." WHERE (pin = ?)";
                        $data1 = array($pin);                            
                        $las_columnas = $this->consultarConParametrosVarios($queryRespuestasVacias, $data1); 

                        
                        foreach ($las_columnas as $una_columna):
                         
                            $valorColumna = $una_columna["pregunta" . $pregunta['num_pregunta']];                        

                            if ($valorColumna != "")
                            {
                                print_r($pregunta['num_pregunta']);
                                print '<br>';
                            }
                            else
                            {
                                session_start();
                                $_SESSION["numero_pregunta_actual"] = $pregunta['num_pregunta'];                                
                                
                                $queryNumeroModulo = "SELECT num_modulo FROM modulos_encuesta WHERE (id_encuesta=".$id_encuesta.") AND (id_modulo= ? );";                               
                                $data2 = array($pregunta['id_modulo']);
                                
                                $modulos = $this->consultarConParametrosVarios($queryNumeroModulo, $data2);
                                print_r($modulos);
                                foreach ($modulos as $mod):
                                    $_SESSION["numero_modulo_actual"] = $mod["num_modulo"];
                                    return $mod["num_modulo"];
                                endforeach;/*fin for each de modulo obtenido*/
                            }
                            endforeach;/*for each de las colunmas tabla respuesta*/            
            endforeach;/*fin for eache de las preguntas*/                    
        }
        $_SESSION["numero_pregunta_actual"] = -1;
        $_SESSION["numero_modulo_actual"] = -1;
        return -1;
    }
    
    function obtenerRespuestas($id_encuesta_a_buscar, $preguntas_a_buscar, $pin) 
    {
        $conexionDB = $this->conectarse();        
        
        $datos = json_decode($preguntas_a_buscar, true);               
        
        for ($i = 0; $i < count($datos); $i++) 
        {
            $queryRespuestasMarcadas = "SELECT pregunta".$datos[$i]." FROM encuesta".$id_encuesta_a_buscar." WHERE (pin = ?)";
            $data3 = array($pin);                                
            
            $respuestasMarcadas = $this->consultarConParametros($queryRespuestasMarcadas, $data3);            
            $arregloRespuestas[] = $respuestasMarcadas["pregunta".$datos[$i]];
        }        
        return $arregloRespuestas;
    }
    
    
    
    }//FIN CLASE 
?>

