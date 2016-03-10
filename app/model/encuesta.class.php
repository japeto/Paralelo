<?php
/*
 CLASE PARA LA GESTION DE LOS UNIVERSITARIOS
*/
//require_once "db.class_postgres.php";
require_once 'db.class.php';

class encuesta extends database
{ 
      function actualizar_perfil($id, $nombre, $apellidos, $contrasena)
 {       
    $conexionDB = $this->conectarse();  
    $query = "UPDATE usuario SET nombre=?, apellidos=?, contrasena=? WHERE (id_usuario = ?);";  
    $data=array($nombre, $apellidos, md5($contrasena), $id);  
    $resultado = $this->insertar($query, $data);   
    $this->desconectar(null);
    return $resultado;   
 }    
 function encontrar_Usuario($id_user)
 {       
  $conexionDB = $this->conectarse();  
  $query = "SELECT id_usuario, nombre, apellidos, email, perfil FROM usuario WHERE (id_usuario=?);";  
  $data=array($id_user);
  $resultado = $this->consultarConParametros($query, $data);   
  $this->desconectar(null);
  return $resultado;     
 } 
     function reiniciarId($nombre_secuencia, $valor_reinicio)
     {       
      
      $conexionDB = $this->conectarse();             
      $this->reiniciarNumeroId($nombre_secuencia, $valor_reinicio);
      $this->desconectar(null);      
     }
     /**********************************************************************************************************************************/
     function Encuestas($id_usuario)
     {       
      
      $conexionDB = $this->conectarse();  
      $query = "SELECT id_encuesta, titulo, consentimiento_informado FROM encuesta WHERE (1=?) ORDER BY (id_encuesta);";        

      $data=array($id_usuario);
      
      $resultado = $this->consultarConParametrosVarios($query, $data);
      //print_r($resultado);
      $this->desconectar(null);
      return $resultado;   
     }
     /**********************************************************************************************************************************/
     function Encuesta_encontrada($id_encuesta, $id_usuario)
     {       
      
      $conexionDB = $this->conectarse();  
      $query = "SELECT id_encuesta, titulo, consentimiento_informado, estado FROM encuesta WHERE (id_encuesta =?) AND (id_usuario =?);";        
      $data=array($id_encuesta, $id_usuario);      
      $resultado = $this->consultarConParametrosVarios($query, $data);
      
      $this->desconectar(null);
      return $resultado;   
     }
     function Modulo_encontrado($id_modulo, $id_encuesta, $id_usuario)
     {       
      
      $conexionDB = $this->conectarse();  
      $query = "SELECT me.id_modulo, m.descripcion, me.num_modulo, e.id_encuesta, e.titulo, e.estado, e.id_usuario FROM ((encuesta as e INNER JOIN modulos_encuesta as me ON e.id_encuesta = me.id_encuesta) INNER JOIN modulo as m ON me.id_modulo = m.id_modulo) WHERE (me.id_modulo = ?) AND (e.id_encuesta = ?) AND (e.id_usuario = ?);";
      $data=array($id_modulo, $id_encuesta, $id_usuario);      
      $resultado = $this->consultarConParametrosVarios($query, $data);
      
      $this->desconectar(null);
      return $resultado;   
     }
     function Pregunta_encontrada($id_pregunta, $id_modulo, $id_encuesta, $id_usuario)
     {       
      
      $conexionDB = $this->conectarse();  
      $query = "SELECT p.id_pregunta, p.num_pregunta, p.texto_pregunta, p.id_modulo, p.id_tipo FROM (((encuesta as e INNER JOIN modulos_encuesta as me ON e.id_encuesta = me.id_encuesta) INNER JOIN pregunta as p ON p.id_modulo = me.id_modulo) INNER JOIN modulo as m ON m.id_modulo = me.id_modulo) WHERE (p.id_pregunta = ?) AND (me.id_modulo = ?) AND (e.id_encuesta = ?) ORDER BY p.id_pregunta ASC;";
      $data=array($id_pregunta, $id_modulo, $id_encuesta);      
      $resultado = $this->consultarConParametrosVarios($query, $data);
      
      $this->desconectar(null);
      return $resultado;   
     }
     function Opciones_encontradas($id_pregunta)
     {       
      
      $conexionDB = $this->conectarse();  
      $query = "SELECT op.id_opcion, opr.codigo_opcion, opr.etiqueta_opcion FROM ((pregunta as p INNER JOIN opciones_pregunta AS op ON p.id_pregunta=op.id_pregunta) INNER JOIN opciones_respuesta as opr ON opr.id_opcion = op.id_opcion) WHERE (p.id_pregunta= ?) ORDER BY (op.id_opcion);";
      $data=array($id_pregunta);      
      $resultado = $this->consultarConParametrosVarios($query, $data);
      
      $this->desconectar(null);
      return $resultado;   
     }
     
     function Opciones_pregunta_tipo_tabla_encontradas($id_pregunta)
     {       
      
      $conexionDB = $this->conectarse();  
      $query = "SELECT osptt.id, ptt.id_pregunta, osptt.opcion_columna FROM (pregunta_tipo_tabla as ptt INNER JOIN opciones_seleccion_pregunta_tipo_tabla as osptt ON ptt.id = osptt.id_pregunta_tipo_tabla) WHERE (ptt.id_pregunta = ?);";
      $data=array($id_pregunta);      
      $resultado = $this->consultarConParametrosVarios($query, $data);
      
      $this->desconectar(null);
      return $resultado;   
     }
     function Columnas_filas_pregunta_1_2_encontradas($id_pregunta)
     {       
      
      $conexionDB = $this->conectarse();  
      $query = "SELECT id, id_pregunta, cantidad_columnas, cantidad_filas FROM pregunta_presentacion WHERE (id_pregunta= ?);";
      $data=array($id_pregunta);      
      $resultado = $this->consultarConParametrosVarios($query, $data);
      
      $this->desconectar(null);
      return $resultado;   
     }
     
     function Columnas_filas_pregunta_tabla_encontradas($id_pregunta)
     {       
      
      $conexionDB = $this->conectarse();  
      $query = "SELECT id, id_pregunta, cantidad_columnas, cantidad_filas FROM pregunta_tipo_tabla WHERE (id_pregunta= ?);";
      $data=array($id_pregunta);      
      $resultado = $this->consultarConParametrosVarios($query, $data);
      
      $this->desconectar(null);
      return $resultado;   
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
     function cantidad_modulos_por_encuesta($id_modulo)
     {       
      
      $conexionDB = $this->conectarse();  
      $query = "SELECT count(*) as num FROM ((encuesta as e INNER JOIN modulos_encuesta as me ON e.id_encuesta = me.id_encuesta) INNER JOIN modulo as m ON me.id_modulo = m.id_modulo) WHERE (e.id_encuesta = ?);";        

      $data=array($id_modulo);
      
      $resultado = $this->consultarConParametrosVarios($query, $data);
      
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
     
     function usuarioEncuestaEditar($id_usuario)
     {       
      
      $conexionDB = $this->conectarse();  
      $query = "SELECT id_encuesta, titulo FROM encuesta WHERE (id_usuario=?) ORDER BY (id_encuesta);";        

      $data=array($id_usuario);
      
      $resultado = $this->consultarConParametrosVarios($query, $data);
      //print_r($resultado);
      $this->desconectar(null);
      return $resultado;   
     }
     
     
     function usuarioEncuestaEditar1($id_usuario)
     {       
      
      $conexionDB = $this->conectarse();  
      $query = "SELECT id_encuesta, titulo FROM encuesta WHERE (id_usuario=?) AND (estado='Editar') ORDER BY (id_encuesta);";        

      $data=array($id_usuario);
      
      $resultado = $this->consultarConParametrosVarios($query, $data);
      //print_r($resultado);
      $this->desconectar(null);
      return $resultado;   
     }
     
     function borrarPines($valor, $id_encuesta)
     {   
         $conexionDB = $this->conectarse();
         $query = "DELETE FROM encuesta".$id_encuesta." WHERE (1=?);";
         $data=array($valor);
         $result = $this->eliminarRegistros($query, $data);         
         $this->desconectar(null);      
         return $result;
     }
      function consultarEncuestas($sql)
     {    
      $conexionDB = $this->conectarse();             
            
      $resultado = $this->consultarConParametrosSinPreparar($sql);
      
      $this->desconectar(null);
      return $resultado;   
     }
     function editarEncuestas($id, $activo)
     {       
      
      $conexionDB = $this->conectarse();  
      $query = "UPDATE encuesta SET estado=? WHERE (id_encuesta=?);";        
      $data=array($activo, $id);
      
      $resultado = $this->insertar($query, $data);
      
      $this->desconectar(null);
      return $resultado;   
     }
     function activarEncuestas($id, $activo)
     {       
      
      $conexionDB = $this->conectarse();  
      $query = "UPDATE encuesta SET estado=? WHERE (id_encuesta=?);";        
      $data=array($activo, $id);
      
      $resultado = $this->insertar($query, $data);
      
      $this->desconectar(null);
      return $resultado;   
     }
     function desactivarEncuestas($id, $activo)
     {       
      
      $conexionDB = $this->conectarse();  
      $query = "UPDATE encuesta SET estado=? WHERE (id_encuesta=?);";        
      $data=array($activo, $id);
      
      $resultado = $this->insertar($query, $data);
      
      $this->desconectar(null);
      return $resultado;   
     }
     function EncuestaPines($id_encuesta, $cantidad, $id_universidad)
     {
         $aleatorio = array();    
         $v = 0;
         $v1 = 0;
         srand(time());
         
         for ($i = 0; $i < $cantidad; $i++) 
         {
             $v = rand(100000,1000000);
             $v1 = rand(1000,10000);
             if (  ($id_universidad == 'uvsfpr') || ($id_universidad == 'uvmepr') || ($id_universidad == 'uvpapr') || ($id_universidad == 'uvyupr')|| ($id_universidad == 'uvbupr')|| ($id_universidad == 'uvbgpr')|| ($id_universidad == 'uvtupr')|| ($id_universidad == 'uvcapr')|| ($id_universidad == 'uvzapr')|| ($id_universidad == 'uvcrpr')|| ($id_universidad == 'uvnopr'))
             {
                 $aleatorio[] = $id_universidad.$v1;
             }
             else
             {
                 $aleatorio[] = $id_universidad.$v;
             }             
         }
         
         $conexionDB = $this->conectarse();
         //$data=array($id_encuesta);
         
         foreach ($aleatorio as $ram ):
            $query = "INSERT INTO encuesta".$id_encuesta."(pin) VALUES (?);";
            $data=array($ram);
            $result = $this->insertar($query, $data);

            $query = "INSERT INTO resumen".$id_encuesta."(pin) VALUES (?);";
            $data=array($ram);
            $result = $this->insertar($query, $data);      
         endforeach;
         $this->desconectar(null);
      
         return $aleatorio;
     }
     
     
     function consultarPreguntasUbicacion($sql){
        $conexionDB = $this->conectarse();
        $resultado = $this->consultarConParametrosSinPreparar($sql);
        $this->desconectar(null);
        return $resultado;   
     }
     
     function consultarPines($sql)
     {       
      
      $conexionDB = $this->conectarse();             
            
      $resultado = $this->consultarConParametrosSinPreparar($sql);
      
      $this->desconectar(null);
      return $resultado;   
     }
     
     
     function listadoPines($sql)
     {       
      
      $conexionDB = $this->conectarse();             
            
      $resultado = $this->consultarConParametrosSinPreparar($sql);
      
      $this->desconectar(null);
      return $resultado;   
     }

     /*
     function modulosEncuesta($id_encuesta)
     {       
      
      $conexionDB = $this->conectarse();  
      $query = "SELECT me.id_modulo, m.descripcion FROM ((encuesta as e INNER JOIN modulos_encuesta as me ON e.id_encuesta = me.id_encuesta) INNER JOIN modulo as m ON me.id_modulo = m.id_modulo) WHERE (e.id_encuesta = ?) ORDER BY (me.id_modulo);";        

      $data=array($id_encuesta);
      
      $resultado = $this->consultarConParametrosVarios($query, $data);
      //print_r($resultado);
      $this->desconectar(null);
      return $resultado;   
     }*/
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
     
     function preguntaModuloEncuesta($id_modulo)
     {       
      
      $conexionDB = $this->conectarse();  
      $query = "SELECT p.id_pregunta as id , p.num_pregunta, p.texto_pregunta as descripcion FROM (pregunta as p INNER JOIN modulo as me ON me.id_modulo = p.id_modulo) WHERE (me.id_modulo = ?) ORDER BY (p.id_pregunta);";        

      $data=array($id_modulo);
      
      $resultado = $this->consultarConParametrosVarios($query, $data);
      
      $this->desconectar(null);
      return $resultado;   
     }
     
     
     function preguntaModuloEncuesta1($id_modulo, $id_tipo)
     {       
      
      $conexionDB = $this->conectarse();  
      $query = "SELECT p.id_pregunta as id , p.texto_pregunta as descripcion FROM (pregunta as p INNER JOIN modulo as me ON me.id_modulo = p.id_modulo) INNER JOIN tipo_pregunta as tp ON tp.id_tipo = p.id_tipo WHERE (me.id_modulo = ?) AND (p.id_tipo = ?) ORDER BY (p.id_pregunta);";        

      $data=array($id_tipo, $id_modulo);
      
      $resultado = $this->consultarConParametrosVarios($query, $data);
      
      $this->desconectar(null);
      return $resultado;   
     }
     
     function pregunta_a_vincular_Modulo_Encuesta($id_modulo)
     {       
      
      $conexionDB = $this->conectarse();  
      $query = "SELECT p.num_pregunta as id , p.texto_pregunta as descripcion FROM (pregunta as p INNER JOIN modulo as me ON me.id_modulo = p.id_modulo) WHERE (me.id_modulo = ?) ORDER BY (p.num_pregunta);";        

      $data=array($id_modulo);
      
      $resultado = $this->consultarConParametrosVarios($query, $data);
      
      $this->desconectar(null);
      return $resultado;   
     }
     
     function opciones_pregunta_a_vincular_Modulo_Encuesta($id_pregunta)
     {       
      
      $conexionDB = $this->conectarse();  
      $query = "SELECT op.id_opcion as id, orep.etiqueta_opcion as descripcion FROM (opciones_pregunta as op INNER JOIN opciones_respuesta as orep ON op.id_opcion = orep.id_opcion) WHERE (op.id_pregunta = ?) ORDER BY op.id_opcion ASC";        

      $data=array($id_pregunta);
      
      $resultado = $this->consultarConParametrosVarios($query, $data);
      
      $this->desconectar(null);
      return $resultado;   
     }
     
     function preguntaEncuesta($id_modulo)
     {       
      
      $conexionDB = $this->conectarse();  
      $query = "SELECT p.id_pregunta, p.id_tipo, p.num_pregunta, p.texto_pregunta FROM (pregunta as p INNER JOIN modulos_encuesta as me ON me.id_modulo = p.id_modulo) WHERE (me.id_modulo = ?) ORDER BY (p.num_pregunta);";        

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
     
     function opcionesPregunta($id_pregunta)
     {       
      
      $conexionDB = $this->conectarse();  
      $query = "SELECT opr.codigo_opcion, opr.etiqueta_opcion FROM (pregunta as p INNER JOIN opciones_pregunta as op ON p.id_pregunta = op.id_pregunta) INNER JOIN opciones_respuesta AS opr ON op.id_opcion = opr.id_opcion WHERE (p.id_pregunta=?) ORDER BY(opr.codigo_opcion);;";        

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
     function consultarTipoTabla($id_pregunta)
     {       
      
      $conexionDB = $this->conectarse();  
      $query = "SELECT cantidad_columnas, cantidad_filas FROM pregunta_tipo_tabla WHERE (id_pregunta=?);";        

      $data=array($id_pregunta);
      
      $resultado = $this->consultarConParametros($query, $data);
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
     /**********************************************************************************************************************/
     function tipoPregunta($valor)
     {       
      
      $conexionDB = $this->conectarse();  
      $query = "SELECT id_tipo, nombre_tipo FROM tipo_pregunta WHERE (1=?) ORDER BY(id_tipo);";        
      $data = array($valor);
      $resultado = $this->consultarConParametrosVarios($query, $data);
      
      $this->desconectar(null);
      return $resultado;   
     }
     
   /***************************************************************************************************************/ 
    function adicionarEncuestas($titulo, $id_usuario, $estado, $consentimiento)
    {  
        $conexionDB = $this->conectarse();
        $this->reiniciarNumeroId('numero_modulo', 1);/*REINICIO EL NUMERO DEL MODULO*/
        $resto = '<div class="inferior"> <label><h4><input type="checkbox" id="revisar1" name="revisar_1" value="true">&nbsp;Despu&eacute;s de haber le&iacute;do y comprendido la informaci&oacute;n anteriormente expuesta acepto participar en este proyecto.</h4></label><label><h4><input type="checkbox" id="revisar2" name="revisar_2" value="true">&nbsp;Declaro que he sido informado de los riesgos y beneficios que me representa participar en esta investigaci&oacute;n y reconozco que mi participación es voluntaria y la información es totalmente confidencial.</h4></label></div><div><center><a href="#" id="aceptar" class="btn btn-primary" tabindex="1">Continuar</a>&nbsp;</center></div>';
        $query = "INSERT INTO encuesta(titulo, id_usuario, estado, consentimiento_informado) VALUES(?, ?, ?,?) RETURNING id_encuesta, titulo;";
        $data = array($titulo, $id_usuario, $estado, $consentimiento.$resto);
        $valor = $this->insertarDevuelveId($query, $data);
        
        /*CONTRUYE LA TABLA DE RESPUESTAS*/
        $this->crearTabla("encuesta".$valor[0]);

        /*CONSTRUYE LA TABLA DE RESUMEN*/
        $this->crearTabla("resumen".$valor[0]);
        
        $this->desconectar(null); 
        return $valor;
    }
    function adicionarModulo($id_encuesta, $modulo)
    {  
        $conexionDB = $this->conectarse();
        $this->reiniciarNumeroId('numero_pregunta', 1);
        
        $query = "INSERT INTO modulo(descripcion) VALUES(?) RETURNING id_modulo, descripcion;";
        $data = array($modulo);
        $valor = $this->insertarDevuelveId($query, $data);
        $this->desconectar(null); 
        return $valor;
    }   
    
    function editarModuloEncuesta($id_encuesta, $id_modulo)
    {  
        $conexionDB = $this->conectarse();
        
        $numero_modulo = $this->obtenerId('numero_modulo');
        $numero = $numero_modulo['0'];                       
        
        $query = "INSERT INTO modulos_encuesta(id_encuesta, id_modulo, num_modulo) VALUES (?, ?, ?);";        
        $data = array($id_encuesta, $id_modulo, $numero++);                
        $retorno = $this->insertar($query, $data);
        
        $this->reiniciarId('numero_modulo', $numero);
        return $retorno;
    }   
    
    function adicionarModulo_A_Encuesta($id_encuesta, $id_modulo)
    {  
        $conexionDB = $this->conectarse();                        
                $numero_modulo = $this->obtenerId('numero_modulo');
                $query = "INSERT INTO modulos_encuesta(id_encuesta, id_modulo, num_modulo) VALUES (?, ?, ?);";        
                $data = array($id_encuesta, $id_modulo, $numero_modulo[0]);        
                $retorno = $this->insertar($query, $data);
        $this->desconectar(null);         
        return $retorno;
    }
    function adicionarVinculos($id_encuesta, $id_pregunta, $opcion, $vinculo)
    {  
        $conexionDB = $this->conectarse();       
        //echo $id_encuesta.", ".$id_pregunta.", ".$opcion.", ".$vinculo;
        $query = "INSERT INTO preguntas_vinculadas(id_encuesta, id_pregunta, opcion, vinculo) VALUES (?, ?, ?, ?);";
        $data = array($id_encuesta, $id_pregunta, $opcion, $vinculo);
        $valor = $this->actualizar1($query, $data);
        echo $valor;
        $this->desconectar(null); 
        return $valor;
    }
//    function  reiniciarEditarModulo($id)
//    {        
//         $query = "SELECT num_modulo FROM modulos_encuesta WHERE (id_encuesta = ?);";                
//         $data = array($id);                 
//         $resultado = $this->consultarConParametros($query, $data);  
//         return $resultado;
//           // $resultado1 = $this->reiniciarNumeroId("numero_modulo", $resultado['num_modulo']);   
//    }
    
    /***************************************************************************************************************************/
    function adicionarPregunta($id_encuesta, $id_modulo, $texto_pregunta, $id_tipo_pregunta)
    {  
        $conexionDB = $this->conectarse(); 
        
        $numero_pregunta = $this->obtenerId('numero_pregunta');
        $this->reiniciarNumeroId('numero_opcion', 1 );
        
        $query = "INSERT INTO pregunta(id_modulo, id_tipo, num_pregunta, texto_pregunta) VALUES (?, ?, ?, ?) RETURNING id_pregunta;";
        
        $data = array($id_modulo, $id_tipo_pregunta, $numero_pregunta[0], $texto_pregunta);
        
        $valor = $this->insertarDevuelveId($query, $data);
        
        if (count($valor) > 0)
        {   /*CONSTRUYE LOS CAMPOS EN LA TABLA RESPUESTA ENCUESTA*/
            if ($id_tipo_pregunta != 6)/*IDENTIFICA SI EL TIPO DE PREGUNTA ES ENUNCIADO SI ES ASI NO GENERA UN CAMPO ADICIONAL EN LA TABLA RESPUESTAS*/
            {
                $this->adicionarCampos_a_la_Tabla("encuesta".$id_encuesta, "pregunta".$numero_pregunta[0], "VARCHAR(10000)");
                $this->adicionarCampos_a_la_Tabla("resumen".$id_encuesta, "pregunta".$numero_pregunta[0], "VARCHAR(10000)");
            } 
        }        
        $this->desconectar(null); 
        return $valor;
    }
        /***************************************************************************************************************/
    function adicionarPreguntaTipoTabla($id_pregunta, $cantidad_filas, $cantidad_columnas)
    {  
        $conexionDB = $this->conectarse();                
               
        $query = "INSERT INTO pregunta_tipo_tabla(id_pregunta, cantidad_columnas, cantidad_filas) VALUES (?, ?, ?) RETURNING id;";
        
        $data = array($id_pregunta, $cantidad_columnas, $cantidad_filas);
        
        $valor = $this->insertarDevuelveId($query, $data);
        
        if (count($valor) > 0)
        {
            $this->desconectar(null); 
            return $valor;    
        }        
        
    }
    function adicionarOpcionesdeRespuestaPreguntaTipoTabla($id_pregunta_tipo_tabla, $opciones)
    {  
        $conexionDB = $this->conectarse();
        
        $ids = array();
        foreach ($opciones as $r):                        
            $query = "INSERT INTO opciones_seleccion_pregunta_tipo_tabla(id_pregunta_tipo_tabla, opcion_columna) VALUES (?, ?) RETURNING id;";
            $data = array($id_pregunta_tipo_tabla, trim($r));            
            $valor = $this->insertarDevuelveId($query, $data);
            
            $ids[] = $valor[0];
         endforeach;        
                
        $this->desconectar(null); 
        return $ids;
    }
    /***************************************************************************************************************/
    
    function adicionarOpcionesdeRespuesta($arreglo_etiqueta_opcion)
    {  
        $conexionDB = $this->conectarse();
        $ids = array();
        foreach ($arreglo_etiqueta_opcion as $r):            
            $numero_opcion = $this->obtenerId('numero_opcion');
            $query = "INSERT INTO opciones_respuesta(codigo_opcion, etiqueta_opcion) VALUES (?, ?) RETURNING id_opcion;";
            $data = array($numero_opcion[0], trim($r));            
            $valor = $this->insertarDevuelveId($query, $data);
            
            $ids[] = $valor[0];
         endforeach;        
                
        $this->desconectar(null); 
        return $ids;
    }
    
    function adicionarOpciones_a_la_Pregunta($id_opciones, $id_pregunta)
    {  
        $conexionDB = $this->conectarse();     
        foreach ($id_opciones as $id_opcion):
            $query = "INSERT INTO opciones_pregunta(id_opcion, id_pregunta) VALUES (?, ?);";
            $data = array($id_opcion, $id_pregunta);                         
            $valor = $this->insertar($query, $data);            
        endforeach;
        
        $this->desconectar(null); 
        return $valor;
    }
    
    function adicionarPresentacionPregunta($id_pregunta, $filas, $columnas )
    {  
        $conexionDB = $this->conectarse();             
        $query = "INSERT INTO pregunta_presentacion(id_pregunta, cantidad_filas, cantidad_columnas) VALUES (?, ?, ?);";
        $data = array($id_pregunta, $filas, $columnas);                         
        $valor = $this->insertar($query, $data);                   
        
        $this->desconectar(null); 
        return $valor;
    }
    
    
    /*editar */
    function actualizarEncuestas($titulo, $id_usuario, $estado, $consentimiento, $id_encuesta)
    {  
        $conexionDB = $this->conectarse();
        if ($estado == 'Editar')
        {
            $query = "UPDATE encuesta SET titulo=?, consentimiento_informado=?, fecha_de_modificacion=? WHERE (id_usuario= ?) AND (id_encuesta= ?);";
            $data = array($titulo, $consentimiento, "now()", $id_usuario, $id_encuesta);
            $valor = $this->insertar($query, $data);
            $this->desconectar(null);             
            return $valor;
        }
        else
        {
           return 0;
        }        
    }   
    
     function actualizarModulo($id_modulo, $titulo)
    {  
        $conexionDB = $this->conectarse();        
        $query = "UPDATE modulo SET descripcion=? WHERE (id_modulo= ?);";
        $data = array($titulo, $id_modulo);
        $valor = $this->insertar($query, $data);
        $this->desconectar(null);             
        return $valor;
    }        
    
    
    function actualizarPregunta($id_pregunta, $id_modulo, $texto_pregunta, $id_tipo_pregunta)
    {  
        $conexionDB = $this->conectarse();        
        $query = "UPDATE pregunta SET texto_pregunta=? WHERE (id_modulo= ?) AND (id_pregunta= ?) AND (id_tipo= ?);";        
        $data = array($texto_pregunta, $id_modulo, $id_pregunta, $id_tipo_pregunta);              
        $valor = $this->insertar($query, $data);
        $this->desconectar(null); 
        return $valor;
    }
    
    function actualizarOpcionesPregunta($id_opcion, $texto_opcion)
    {  
        $conexionDB = $this->conectarse();        
        $query = "UPDATE opciones_respuesta SET etiqueta_opcion=? WHERE (id_opcion= ?);";        
        $data = array($texto_opcion, $id_opcion);              
        $valor = $this->insertar($query, $data);               
        $this->desconectar(null); 
        return $valor;
    }
    function actualizarOpcionesColumnaPregunta($id_pregunta_tipo_tabla, $id, $texto_opcion)
    {  
        $conexionDB = $this->conectarse();        
        $query = "UPDATE opciones_seleccion_pregunta_tipo_tabla SET opcion_columna=? WHERE (id = ?) AND (id_pregunta_tipo_tabla= ?);";        
        $data = array($texto_opcion, $id, $id_pregunta_tipo_tabla);              
        $valor = $this->insertar($query, $data);               
        $this->desconectar(null); 
        return $valor;
    }
    
    function actualizarFilasYColumnasPresentacionPregunta($id_opcion, $texto_opcion)
    {  
        $conexionDB = $this->conectarse();        
        $query = "UPDATE opciones_respuesta SET etiqueta_opcion=? WHERE (id_opcion= ?);";        
        $data = array($texto_opcion, $id_opcion);              
        $valor = $this->insertar($query, $data);               
        $this->desconectar(null); 
        return $valor;
    }
    
    function actualizarFilasYColumnasPreguntaTipo5($id_opcion, $texto_opcion)
    {  
        $conexionDB = $this->conectarse();        
        $query = "UPDATE opciones_respuesta SET etiqueta_opcion=? WHERE (id_opcion= ?);";        
        $data = array($texto_opcion, $id_opcion);              
        $valor = $this->insertar($query, $data);               
        $this->desconectar(null); 
        return $valor;
    }
    
        
    }//FIN CLASE USUARIO
?>

