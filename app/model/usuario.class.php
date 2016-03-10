<?php
/*
 CLASE PARA LA GESTION DE LOS UNIVERSITARIOS
*/
//require_once "db.class_postgres.php";
require_once 'db.class.php';

class usuario extends database
{
//FUNCION QUE PERMITE DAR DE ALTA UN USUARIO NUEVO
    function adicionarPerfil($perfil)
    {  
        $conexionDB = $this->conectarse();       
        
        $query = "INSERT INTO perfil(nombre, activo) VALUES (?, ?);";
        $data = array($perfil, 1);
        $valor = $this->insertar($query, $data);
        $this->desconectar(null); 
        return $valor;
    }
    
    function listadoPerfiles($id_usuario)
     {       
      
      $conexionDB = $this->conectarse();  
      $query = "SELECT id, nombre FROM perfil WHERE (1=?) ORDER BY (nombre);";        

      $data=array($id_usuario);
      
      $resultado = $this->consultarConParametrosVarios($query, $data);
      //print_r($resultado);
      $this->desconectar(null);
      return $resultado;   
     }
     function listadoUsuarios($id_usuario)
     {       
      
      $conexionDB = $this->conectarse();  
      $query = "SELECT u.id_usuario, u.nombre, u.apellidos, p.nombre as perfil FROM (usuario  as u INNER JOIN perfil as p ON u.perfil = p.id) WHERE (1=?) AND (u.id_usuario <> 'admin') ORDER BY (nombre);";        

      $data=array($id_usuario);      
      $resultado = $this->consultarConParametrosVarios($query, $data);      
      $this->desconectar(null);
      return $resultado;   
     }
     function actualizarPerfiles($id, $perfil)
     {       
      
      $conexionDB = $this->conectarse();  
      $query = "UPDATE perfil SET nombre=? WHERE (id=?);";        
      $data=array($perfil, $id);
      
      $resultado = $this->insertar($query, $data);
      
      $this->desconectar(null);
      return $resultado;   
     }
     function actualizarUsuarios($id_usuario, $nombre_usuario, $apellidos, $email, $contrasena)
     {       
      
      $conexionDB = $this->conectarse();  
      $query = "UPDATE usuario SET nombre=?, apellidos=?, email=?, contrasena=? WHERE (id_usuario= ?);";
      $data=array($nombre_usuario,$apellidos, $email, md5($contrasena), $id_usuario);
      
      $resultado = $this->insertar($query, $data);
      
      $this->desconectar(null);
      return $resultado;   
     }

     function insertaPin($id_encuesta,$pin){

        $conexionDB = $this->conectarse();       
        $query = "INSERT INTO encuesta".$id_encuesta."(pin) VALUES (?);";
        $data=array($pin);
        $valor = $this->insertar($query, $data);
              
        $query = "INSERT INTO resumen".$id_encuesta."(pin) VALUES (?);";
        $data=array($pin);
        $valor = $this->insertar($query, $data);
        $this->desconectar(null); 
        return $valor;
        
     }

     function activarPerfiles($id, $activo)
     {       
      
      $conexionDB = $this->conectarse();  
      $query = "UPDATE perfil SET activo=? WHERE (id=?);";        
      $data=array($activo, $id);
      
      $resultado = $this->insertar($query, $data);
      
      $this->desconectar(null);
      return $resultado;   
     }
     
     function desactivarPerfiles($id, $activo)
     {       
      
      $conexionDB = $this->conectarse();  
      $query = "UPDATE perfil SET activo=? WHERE (id=?);";        
      $data=array($activo, $id);
      
      $resultado = $this->insertar($query, $data);
      
      $this->desconectar(null);
      return $resultado;   
     }
     
     function activarUsuarios($id, $activo)
     {       
      
      $conexionDB = $this->conectarse();  
      $query = "UPDATE usuario SET activo=? WHERE (id_usuario=?);";        
      $data=array($activo, $id);
      
      $resultado = $this->insertar($query, $data);
      
      $this->desconectar(null);
      return $resultado;   
     }

 function desactivarUsuarios($id, $activo)
     {       
      
      $conexionDB = $this->conectarse();  
      $query = "UPDATE usuario SET activo=? WHERE (id_usuario=?);";        
      $data=array($activo, $id);
      
      $resultado = $this->insertar($query, $data);
      
      $this->desconectar(null);
      return $resultado;   
     }
     
       
      function consultarPerfiles($sql)
     {    
      $conexionDB = $this->conectarse();             
            
      $resultado = $this->consultarConParametrosSinPreparar($sql);
      
      $this->desconectar(null);
      return $resultado;   
     }
    function consultarUsuarios($sql)
     {    
      $conexionDB = $this->conectarse();             
            
      $resultado = $this->consultarConParametrosSinPreparar($sql);
      
      $this->desconectar(null);
      return $resultado;   
     }
 function adicionarEncuestado($user, $pass, $email, $nombres, $apellidos, $activo, $perfil, $id_universidad,$id_encuesta){  

   $v = 0;
   $v1 = 0;
   srand(time());

   $v = rand(100000,1000000);
   $v1 = rand(1000,10000);
   if (  ($id_universidad == 'uvsfpr') || ($id_universidad == 'uvmepr') || ($id_universidad == 'uvpapr') || ($id_universidad == 'uvyupr')|| ($id_universidad == 'uvbupr')|| ($id_universidad == 'uvbgpr')|| ($id_universidad == 'uvtupr')|| ($id_universidad == 'uvcapr')|| ($id_universidad == 'uvzapr')|| ($id_universidad == 'uvcrpr')|| ($id_universidad == 'uvnopr')){
       $aleatorio = "u.".$id_universidad.$v1;
   }else{
       $aleatorio = "u.".$id_universidad.$v;
   }  

  $conexionDB = $this->conectarse();      
  $query = "INSERT INTO encuestados (id_encuestado, contrasena, email, nombre, apellidos, activo, perfil, encuesta, pin) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?);";
  $data = array($user, $pass, $email,$nombres,$apellidos, $activo, ((int)$perfil), $id_encuesta, $aleatorio);
  $valor = $this->insertar($query, $data);
  $this->desconectar(null);

  $conexionDB = $this->conectarse(); 
  $query = "INSERT INTO encuesta".$id_encuesta."(pin) VALUES (?);";
  $data=array($aleatorio);
  $result = $this->insertar($query, $data);
  $this->desconectar(null);

  $conexionDB = $this->conectarse(); 
  $query = "INSERT INTO resumen".$id_encuesta."(pin) VALUES (?);";
  $data=array($aleatorio);
  $result = $this->insertar($query, $data);   
  $this->desconectar(null);

  
  return $valor;
  
 }
 function adicionarUsuarios($user, $pass, $email, $nombres, $apellidos, $activo, $perfil, $id_universidad){  

   $v = 0;
   $v1 = 0;
   srand(time());

   $v = rand(100000,1000000);
   $v1 = rand(1000,10000);
   if (  ($id_universidad == 'uvsfpr') || ($id_universidad == 'uvmepr') || ($id_universidad == 'uvpapr') || ($id_universidad == 'uvyupr')|| ($id_universidad == 'uvbupr')|| ($id_universidad == 'uvbgpr')|| ($id_universidad == 'uvtupr')|| ($id_universidad == 'uvcapr')|| ($id_universidad == 'uvzapr')|| ($id_universidad == 'uvcrpr')|| ($id_universidad == 'uvnopr')){
       $aleatorio = "u.".$id_universidad.$v1;
   }else{
       $aleatorio = "u.".$id_universidad.$v;
   }  

  $conexionDB = $this->conectarse();      
  $query = "INSERT INTO usuario (id_usuario, contrasena, email, nombre, apellidos, activo, perfil, pin) VALUES(?, ?, ?, ?, ?, ?, ?, ?);";
  $data = array($user, $pass, $email,$nombres,$apellidos, $activo, ((int)$perfil),$aleatorio);
  $valor = $this->insertar($query, $data);
  $this->desconectar(null); 
  return $valor;
  
 }

 
 function encuestaActiva($id_encuesta)
 {  
  $conexionDB = $this->conectarse();      
  $query = "SELECT id_encuesta, estado FROM encuesta WHERE (id_encuesta = ?);";
  $data = array($id_encuesta);
  $valor = $this->consultarConParametros($query, $data);
  $this->desconectar(null); 
  return $valor;
 }

 
function loginypassUsuario($user, $pass){       
  $conexionDB = $this->conectarse();  
  $query = "SELECT id_usuario, contrasena, nombre, apellidos, perfil FROM usuario WHERE (id_usuario=?) AND (contrasena=?);";  
  $data=array($user, md5($pass));
  $resultado = $this->consultarConParametros($query, $data);   
  $this->desconectar(null);

  if($resultado == 0){
    $conexionDB = $this->conectarse();  
    $query = "SELECT id_encuestado, contrasena, nombre, apellidos, perfil, pin, encuesta FROM encuestados WHERE (id_encuestado=?) AND (contrasena=?);";
    $data=array($user, md5($pass));
    $resultado = $this->consultarConParametros($query, $data);   
    $this->desconectar(null);
  }
  
  return $resultado;
} 
 
 function searchUser($parametro)
 {       
  $conexionDB = $this->conectarse();  
  $query = "SELECT id_usuario, email, nombre, apellidos FROM usuario WHERE (id_usuario=?) OR (email=?);";  
  $data=array($parametro, $parametro);
  $resultado = $this->consultarConParametros($query, $data);   
  $this->desconectar(null);
  return $resultado;   
 } 

 function actualizarContrasena($id_usuario, $contrasena)
 {       
  $conexionDB = $this->conectarse();      
  $query = "UPDATE usuario SET contrasena=? WHERE (id_usuario = ?);";
  $data = array(md5($contrasena), $id_usuario);
  $valor = $this->insertar($query, $data);
  $this->desconectar(null); 
  return $valor;
 }
 
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
 
 function loginEncuestado($id_encuesta, $pin)
 {       
  $conexionDB = $this->conectarse();  
  $query = "SELECT pin, consentimiento FROM encuesta".$id_encuesta." WHERE (pin=?);";  
  
  $data=array($pin);
  
  $resultado = $this->consultarConParametros($query, $data);   
  $this->desconectar(null);
  return $resultado;   
 }
 
 function insertarConsentimiento($id_encuesta, $consentimiento, $pin)
 {       
  $conexionDB = $this->conectarse();    
  $query1 = "SELECT tipo_dispositivo FROM encuesta".$id_encuesta." WHERE (pin=?);";    
  $data1=array($pin);  
  $resultado = $this->consultarConParametros($query1, $data1);
  //print_r($resultado);

  if($resultado['tipo_dispositivo'] == "")
  {
	  $query = "UPDATE encuesta".$id_encuesta." SET consentimiento=?, tipo_dispositivo=? WHERE pin = ?;";
	  $data = array($consentimiento,'computador', $pin);
	  $valor = $this->insertar($query, $data);

    $query = "UPDATE resumen".$id_encuesta." SET consentimiento=?, tipo_dispositivo=? WHERE pin = ?;";
    $data = array($consentimiento,'computador', $pin);
    $valor = $this->insertar($query, $data);
  }
  else{
	  $dispositivo_a_guardar = $resultado['tipo_dispositivo'].",computador";
	  print $dispositivo_a_guardar;
	  $query = "UPDATE encuesta".$id_encuesta." SET consentimiento=?, tipo_dispositivo=? WHERE pin = ?;";
	  $data = array($consentimiento,$dispositivo_a_guardar, $pin);
	  $valor = $this->insertar($query, $data);

    $dispositivo_a_guardar = $resultado['tipo_dispositivo'].",computador";
    print $dispositivo_a_guardar;
    $query = "UPDATE resumen".$id_encuesta." SET consentimiento=?, tipo_dispositivo=? WHERE pin = ?;";
    $data = array($consentimiento,$dispositivo_a_guardar, $pin);
    $valor = $this->insertar($query, $data);
  }
  
  
  
  $this->desconectar(null); 
  return $valor;
 }
 
 function actualizarFechaInicioEncuesta($id_encuesta, $fecha_inicio, $pin)
 {       
  $conexionDB = $this->conectarse();      
  $query = "UPDATE encuesta".$id_encuesta." SET fecha_de_inicio_de_diligenciada_la_encuesta=? WHERE pin = ?;";
  $data = array($fecha_inicio, $pin);
  $valor = $this->insertar($query, $data);

  $query = "UPDATE resumen".$id_encuesta." SET fecha_de_inicio_de_diligenciada_la_encuesta=? WHERE pin = ?;";
  $data = array($fecha_inicio, $pin);
  $valor = $this->insertar($query, $data);

  $this->desconectar(null); 
  return $valor;
 }
 function actualizarHoraInicioEncuesta($id_encuesta, $hora_inicio, $pin)
 {       
  $conexionDB = $this->conectarse();      
  $query = "UPDATE encuesta".$id_encuesta." SET hora_de_inicio_de_diligenciada_la_encuesta=? WHERE pin = ?;";
  $data = array($hora_inicio, $pin);
  $valor = $this->insertar($query, $data);

  $query = "UPDATE resumen".$id_encuesta." SET hora_de_inicio_de_diligenciada_la_encuesta=? WHERE pin = ?;";
  $data = array($hora_inicio, $pin);
  $valor = $this->insertar($query, $data);

  $this->desconectar(null); 
  return $valor;
 }
 function actualizarFechaFinEncuesta($id_encuesta, $fecha_fin, $pin)
 {       
  $conexionDB = $this->conectarse();      
  $query = "UPDATE encuesta".$id_encuesta." SET fecha_de_fin_de_diligenciada_la_encuesta=? WHERE pin = ?;";
  $data = array($fecha_fin, $pin);
  $valor = $this->insertar($query, $data);

  $query = "UPDATE resumen".$id_encuesta." SET fecha_de_fin_de_diligenciada_la_encuesta=? WHERE pin = ?;";
  $data = array($fecha_fin, $pin);
  $valor = $this->insertar($query, $data);

  $this->desconectar(null); 
  return $valor;
 }
 function actualizarHoraFinEncuesta($encuesta, $hora_fin, $pin)
 {       
  $conexionDB = $this->conectarse();      
  $query = "UPDATE encuesta".$id_encuesta." SET hora_de_fin_de_diligenciada_la_encuesta=? WHERE pin = ?;";
  $data = array($hora_fin, $pin);
  $valor = $this->insertar($query, $data);

  $query = "UPDATE resumen".$id_encuesta." SET hora_de_fin_de_diligenciada_la_encuesta=? WHERE pin = ?;";
  $data = array($hora_fin, $pin);
  $valor = $this->insertar($query, $data);

  $this->desconectar(null); 
  return $valor;
 }
 
 function UsuarioExiste($user, $pass)
 {       
  $conexionDB = $this->conectarse();  
  $query = "SELECT id_usuario, nombre, apellidos, perfil FROM usuario WHERE (id_usuario=?) AND (contrasena=?);";  
  $data=array($user, md5($pass));
  $resultado = $this->consultarConParametros($query, $data);   
  $this->desconectar(null);
  return $resultado;   
 } 
 
 function EncuestadoExiste($user, $pass)
 {       
  $conexionDB = $this->conectarse();  
  $query = "SELECT id_usuario, nombre, apellidos, perfil FROM usuario WHERE (id_usuario=?) AND (contrasena=?);";  
  $data=array($user, md5($pass));
  $resultado = $this->consultarConParametros($query, $data);   
  $this->desconectar(null);
  return $resultado;   
 } 
 
function loginUsuario($user)
 {       
  $conexion = $this->conectar();  
  $query = $this->consulta("SELECT id_usuario, nombre, apellidos, perfil FROM usuario WHERE (id_usuario='".$user."');");  
  $this->disconnect($conexion);
  
  if($this->numero_de_filas($query) > 0)
  {
     return $this->obtenerArreglo($query);    
  }//FIN SI
  else
  {
    return '';
  }//FIN ELSE
 } 
 
 
 
 /**************************************************************************************************************************************/
 
 function usuarios($limit=12)
 {
  //conexion a la base de datos
  $conexion = $this->conectar();
  //$query = $this->consulta("SELECT * FROM universitario WHERE carrera='$carrera' ORDER BY rand() LIMIT $limit;");
  $query = $this->consulta("SELECT id_usuario, contrasena, email, nombre, apellidos, fecha_creacion FROM usuario WHERE activo='si' ORDER BY user LIMIT $limit;");
  //se desconecta de la base de datos.  
  $this->disconnect($conexion);
  if($this->numero_de_filas($query) > 0) // existe -> datos correctos
  {
    //se llenan los datos en un array
    while ( $tsArray = $this->fetch_assoc($query) )
     $data[] = $tsArray;
    return $data;
  }//FIN SI
  else
  {
    return '';
  }//FIN ELSE
  
 }//FIN FUNCION USUARIO
 
 function usuariosTotal()
 {  
  $query = $this->consulta("SELECT id_usuario, contrasena, email, nombre, apellidos, fecha_creacion FROM usuario WHERE activo='si' ORDER BY user;");  
  if($this->numero_de_filas($query) > 0)
  {
    while ( $tsArray = $this->fetch_assoc($query) )
     $data[] = $tsArray;
    return $data;
  }//FIN SI
  else
  {
    return '';
  }//FIN ELSE
  
 }//FIN FUNCION USUARIO
 
 function usuariosTotal1()
 {
  $conexion = $this->conectar();
  $query = $this->consulta("SELECT id_usuario, contrasena, email, nombre, apellidos, fecha_creacion FROM usuario WHERE activo='si' ORDER BY user;");  
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
  }//FIN ELSE
  
 }//FIN FUNCION USUARIO
 function usuariosTotal2()
 {
  $conexion = $this->conectar();
  $query = $this->consulta("SELECT id_usuario, contrasena, email, nombre, apellidos, fecha_creacion FROM usuario WHERE activo='no' ORDER BY user;");  
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
  }//FIN ELSE
  
 }//FIN FUNCION USUARIO
 
 
// function actualizarUsuarios($id, $nombres, $apellidos, $email)
// {       
//  $conexion = $this->conectar();  
//  $query = $this->consulta("UPDATE usuario SET nombre='".$nombres."', apellidos='".$apellidos."', email='".$email."' WHERE id_usuario='".$id."';");  
//  $this->disconnect($conexion);
//  return 1;
// }/*
 /*function desactivarUsuarios($listado_a_eliminar)
 {       
    $conexion = $this->conectar();
    for($i=0; $i<count($listado_a_eliminar); $i++)
    {
        $query = $this->consulta("UPDATE usuario SET activo='no' WHERE id_usuario='".$listado_a_eliminar[$i]."';");  
    }  
  $this->disconnect($conexion);
  return 1;
 }*/
 /*
 function activarUsuarios($listado_a_eliminar)
 {       
    $conexion = $this->conectar();
    for($i=0; $i<count($listado_a_eliminar); $i++)
    {
        $query = $this->consulta("UPDATE usuario SET activo='si' WHERE id_usuario=".$listado_a_eliminar[$i].";");  
    }  
  $this->disconnect($conexion);
  return 1;
 }*/
 
 
 function buscarUsuario($identificador)
 {       
  $conexion = $this->conectar();  
  $query = $this->consulta("SELECT id_usuario, contrasena, email, nombre, apellidos, fecha_creacion FROM usuario WHERE id_usuario='".$identificador."';");  
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
  }//FIN ELSE
 } 
 
}//FIN CLASE USUARIO
?>

