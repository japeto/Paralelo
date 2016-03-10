<?php
 require 'app/controller/mvc.controller_no_registrado.php';
 require 'conectado.php';
 $mvc = new mvc_controller_usuario(); //se instancia al controlador  

 if (isset($_GET['action']))     
 {      
         if( $_GET['action'] === 'sesion' ) //muestra el modulo "historia de Bolivia"
         {
             $mvc->adicionar();
         }
 }//FIN ISSET
  
  if (isset($_POST['nombre']) && isset($_POST['apellido']) && isset($_POST['correo']) && isset($_POST['usuario']) && isset($_POST['contrasena1']) && isset($_POST['contrasena2']) && isset($_POST['activo']) )
 {
     $mvc->guardarUsuario($_POST['usuario'], $_POST['contrasena1'], $_POST['contrasena2'], $_POST['correo'], $_POST['nombre'], $_POST['apellido'], $_POST['activo']);
     //echo $_POST['nombre'].", ".$_POST['apellido'].", ".$_POST['correo'].", ".$_POST['usuario'].", ".$_POST['contrasena1'].", ".$_POST['contrasena2']." ".$_POST['activo'];
 }
?>