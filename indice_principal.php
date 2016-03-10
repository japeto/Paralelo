<?php
/*nada*/
 require 'app/controller/mvc.controller_principal.php';    
 require 'conectado.php';
 $mvc = new mvc_controller_principal(); //se instancia al controlador  

 if (isset($_GET['action']))     
 {      
         //$action = $_GET['action'];
         if( $_GET['action'] === 'index' ) //muestra el modulo del buscador
         {             
             $mvc->principal();
         }
         
         if( $_GET['action'] === 'admin' ) //muestra el modulo del buscador
         {
             $mvc->admin();
         }
         if( $_GET['action'] === 'editor' ) //muestra el modulo del buscador
         {
             $mvc->editor();
         }
         if( $_GET['action'] === 'encuestado' ) //muestra el modulo del buscador
         {
            $_SESSION['encuestado'] = true;
            $mvc->encuestado();
         }
         if( $_GET['action'] === 'usuario' ) //muestra el modulo del buscador
         {
             $mvc->usuario();
         }
         if( $_GET['action'] === 'analiticas' ) //muestra el modulo del buscador
         {
             $mvc->analiticas();
         }
         if( $_GET['action'] === 'pines' ) //muestra el modulo del buscador
         {
             $mvc->pines();
         }
         if( $_GET['action'] === 'perfil' ) //muestra el modulo del buscador
         {
             $mvc->perfil();
         }
         if( $_GET['action'] === 'no_registro' ) //muestra el modulo del buscador
         {
             $mvc->no_registro();
         }
         if( $_GET['action'] === 'registrar' ) //muestra el modulo del buscador
         {
            $mvc->registrar();
         }         
         if( $_GET['action'] === 'buscar' ) //muestra el modulo del buscador
         {
             $buscador = $mvc->buscador();
         }
         if( $_GET['action'] === 'adicionar' ) //muestra el modulo "historia de Bolivia"
         {
             $mvc->adicionar();
         }                  
         if( $_GET['action'] === 'eliminar' ) //muestra el modulo "historia de Bolivia"
         {
             $mvc->eliminar();
         }
         if( $_GET['action'] === 'recuperar' ) //muestra el modulo "historia de Bolivia"
         {
             $mvc->recuperar();
         }
 }//FIN ISSET
  
 
 if (isset($_POST['login']) && isset($_POST['pass']))
 {     
     $mvc->loginUsuarios($_POST['login'], $_POST['pass']);     
 }
 if (isset($_POST['login1']) && isset($_POST['pass1']))
 {     
     $mvc->loginUsuarios1($_POST['login1'], $_POST['pass1']);
 }
 if (isset($_POST['parametro']))
 {     
     $mvc->buscarUser($_POST['parametro']);
 }
 if (isset($_POST['id_user']) && isset($_POST['contrasena1']) )
 {     
     $mvc->recuperarPass($_POST['id_user'], $_POST['contrasena1']);
 }
 if (isset($_POST['login_a_buscar']) && isset($_POST['pass_a_buscar']))
 {     
     $mvc->usuarioExiste($_POST['login_a_buscar'], $_POST['pass_a_buscar']);
 }
 if (isset($_POST['id_perfil']) && isset($_POST['nombre']) && isset($_POST['apellido']) && isset($_POST['contrasena1']))
 {     
     $mvc->miPerfil($_POST['id_perfil'], $_POST['nombre'], $_POST['apellido'], $_POST['contrasena1']);
 }
 

?>
