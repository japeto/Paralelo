<?php
 require 'app/controller/mvc.controller_usuario.php';
 require 'conectado.php';
 $mvc = new mvc_controller_usuario(); //se instancia al controlador  

 if (isset($_GET['action'])){      
         if( $_GET['action'] === 'sesion' ) //muestra el modulo "historia de Bolivia"
         {
             $mvc->iniciar_sesion();
         }
         if( $_GET['action'] === 'resultados' ) //muestra el modulo "historia de Bolivia"
         {
             $mvc->resultados();
         }
          if( $_GET['action'] === 'encuesta' ) //muestra el modulo "historia de Bolivia"
         {
             $mvc->encuesta();
         }
 }//FIN ISSET
   
if (isset($_POST['insertarMiPin']) ){
     $mvc->insertarMiPin($_SESSION['id_encuesta'], $_SESSION['usuario_completo']['pin']);     
} 


 if (isset($_POST['nombre_perfil']) )
 {
     $mvc->guardarPerfil($_POST['nombre_perfil']);     
 } 
 if (isset($_POST['valor']) )
 {
     $mvc->cargarListadoPerfiles($_POST['valor']);     
 }

 if (isset($_POST['cargarPerfilesOpciones']) )
 {
     $mvc->cargarPerfilesOpciones();     
 }

 if (isset($_POST['id_perfil']) )
 {
     $mvc->cargarUnPerfil($_POST['id_perfil']);     
 }
 if (isset($_POST['id_p']) && isset($_POST['nombre_perfil_editar']) )
 {
     $mvc->editarPerfil($_POST['id_p'], $_POST['nombre_perfil_editar']);     
 } 
 if (isset($_POST['sql']))
 {   
    $mvc->consultarPerfiles($_POST['sql']);      
 } 
 if (isset($_GET['id_perfil_desactivar']) )
 {
     $mvc->desactivarPerfil($_GET['id_perfil_desactivar'], 0);     
 } 
 if (isset($_GET['id_perfil_activar']) )
 {
     $mvc->activarPerfil($_GET['id_perfil_activar'], 1);     
 }
 
 
 
 if (isset($_POST['valor_user']) )
 {
     $mvc->cargarListadoUsuarios($_POST['valor_user']);     
 }
 if (isset($_POST['id_user']) )
 {
     $mvc->buscarUsuario($_POST['id_user']);     
 }
 if (isset($_POST['id_u']) && isset($_POST['nombre_usuario_editar']) && isset($_POST['apellido_usuario_editar']) && isset($_POST['correo']) && isset($_POST['contrasena1']))
 {
     $mvc->editarUsuario($_POST['id_u'], $_POST['nombre_usuario_editar'], $_POST['apellido_usuario_editar'], $_POST['correo'], $_POST['contrasena1']);     
 }
 if (isset($_POST['sql_user']))
 {   
    $mvc->consultarUsuarios($_POST['sql_user']);      
 }
 if (isset($_GET['id_user_activar']) )
 {
     $mvc->activarUser($_GET['id_user_activar'], 'si');     
 }
 if (isset($_GET['id_user_desactivar']) )
 {
     $mvc->desactivarUser($_GET['id_user_desactivar'], 'no');     
 } 
 /*if (isset($_POST['nombre']) && isset($_POST['apellido']) && isset($_POST['correo1']) && isset($_POST['user']) && isset($_POST['contrasena10']) && isset($_POST['activo']) )
 {
     $mvc->guardarUsuario($_POST['user'], $_POST['contrasena10'], $_POST['correo1'], $_POST['nombre'], $_POST['apellido'], $_POST['activo']);  
 }*/
 if (isset($_POST['nombre']) && isset($_POST['apellido']) && isset($_POST['correo1']) && isset($_POST['user']) && isset($_POST['contrasena10']) && isset($_POST['activo']) && isset($_POST['modulo']) && isset($_POST['tipousaurio'])  && isset($_POST['universidadparticipante']) ){
    $mvc->guardarUsuario($_POST['user'], $_POST['contrasena10'], $_POST['correo1'], $_POST['nombre'], $_POST['apellido'], $_POST['activo'], $_POST['modulo'], $_POST['tipousaurio'],$_POST['universidadparticipante']);
 }

/*generar los usuarios para encuesta*/
if (isset($_POST['id_encuesta_responder']) && isset($_POST['cantidad']) && isset($_POST['codigo_universidad'])&& isset($_POST['nuevos_usuarios'])){    
    $array = json_decode($_POST['nuevos_usuarios']);
    $cantidad = 0;
    foreach ($array as $valor) {
        $mvc->guardarEncuestado($valor[2], $valor[3], $valor[4], $valor[0], $valor[1], 'si', 'usuarios_varios', '3',$_POST['codigo_universidad'],$_POST['id_encuesta_responder']);
        $cantidad +=1;
    }
    return $cantidad;   
}


?>
