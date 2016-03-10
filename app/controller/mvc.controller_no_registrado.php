<?php
require 'app/model/usuario.class.php';

class mvc_controller_usuario
{        
   public function iniciar_sesion()
   {         
      header('location:app/views/default/modules/no_registrado/index.php');
   }   
}
?>