<?php
require 'app/model/usuario.class.php';

class mvc_controller_usuario{

   public function guardarEncuestado($usuario, $contrasena1, $correo, $nombre, $apellido, $activo, $modulo,$tipousaurio, $id_universidad,$id_encuesta){
      $unUsuario = new usuario();                  
      $resultado = $unUsuario->adicionarEncuestado($usuario, md5($contrasena1), $correo, $nombre, $apellido, $activo, $tipousaurio,$id_universidad,$id_encuesta);
      return $resultado;
   }


   public function guardarUsuario($usuario, $contrasena1, $correo, $nombre, $apellido, $activo, $modulo,$tipousaurio, $id_universidad){
      $unUsuario = new usuario();                  
      $resultado = $unUsuario->adicionarUsuarios($usuario, md5($contrasena1), $correo, $nombre, $apellido, $activo, $tipousaurio, $id_universidad);
      if ($resultado > 0){
          switch ($modulo){
              case 'no_registrado':{
                  $_SESSION['actualizar'] = $resultado;
                  header('location:app/views/default/modules/no_registrado/adicionar.php');
                  break;
              }case 'usuarios':{
                  $_SESSION['actualizar'] = $resultado;
                  header('location:app/views/default/modules/usuarios/adicionar.php');
                  break;
              }//case 'usuarios_varios':{
                  // $_SESSION['actualizar'] = $resultado;
                  // header('location:app/views/default/modules/usuarios/adicionarvarios.php');
                 // break;
              //}
          }
      }else //en caso de el usuario estar registrado
      {
          switch ($modulo)
          {
              case 'no_registrado':
              {
                  $_SESSION['actualizar'] = -1;
                  header('location:app/views/default/modules/no_registrado/adicionar.php');
                  break;
              }
              case 'usuarios':
              {
                  $_SESSION['actualizar'] = -1;
                  header('location:app/views/default/modules/usuarios/adicionar.php');
                  break;
              }//case 'usuarios_varios':{
                  // $_SESSION['actualizar'] = $resultado;
                  // header('location:app/views/default/modules/usuarios/adicionarvarios.php');
                 // break;
              //}
          }
      }
   } 
   public function insertarMiPin($encuesta, $pin){
       $unUsuario = new usuario();                  
       $insertopin = $unUsuario->insertaPin($encuesta, $pin);       
       // if ($insertopin > 0){  

       // }else{

       // }
   }
   public function guardarPerfil($perfil)
   {
       $unUsuario = new usuario();                  
       $resultado = $unUsuario->adicionarPerfil($perfil);
       
       if ($resultado > 0)
       {           
           $_SESSION['registro'] = $resultado;
           header('location:app/views/default/modules/perfil/adicionar.php');           
       }
       else
       {
           
       }
       
   } 
   public function editarPerfil($id_perfil, $perfil)
  {
      $unUsuario = new usuario();        
      $actualizado = $unUsuario->actualizarPerfiles($id_perfil, $perfil); 
      
      if ($actualizado > 0)
      {
           $_SESSION['actualizar'] = $actualizado;
          header('location:app/views/default/modules/perfil/editar.php');           
      }
      else
     {
          echo 'entro al sino';    
      }
  }
  public function editarUsuario($id_usuario, $nombre_usuario, $apellidos, $email, $contrasena)
  {
      $unUsuario = new usuario();        
      $actualizado = $unUsuario->actualizarUsuarios($id_usuario, $nombre_usuario, $apellidos, $email, $contrasena); 
      
      if ($actualizado > 0)
      {
           $_SESSION['actualizar'] = $actualizado;
          header('location:app/views/default/modules/usuarios/editar.php');           
      }
      else
     {
          echo 'entro al sino';    
      }
  }
  
  public function desactivarPerfil($id_perfil, $desactivado)
  {
      $unUsuario = new usuario();        
      $desactivado = $unUsuario->desactivarPerfiles($id_perfil, $desactivado); 
      
      if ($desactivado > 0)
      {           
          header('location:app/views/default/modules/perfil/consulta.php');           
      }
      else
     {
          echo 'entro al sino';    
     }
  }
  
  public function activarPerfil($id_perfil, $activado)
  {
      $unUsuario = new usuario();        
      $desactivado = $unUsuario->activarPerfiles($id_perfil, $activado); 
      
      if ($desactivado > 0)
      {           
          header('location:app/views/default/modules/perfil/consulta.php');           
      }
      else
     {
          echo 'entro al sino';    
      }
  }
  
   public function activarUser($id_user, $activado)
  {
      $unUsuario = new usuario();        
      $desactivado = $unUsuario->activarUsuarios($id_user, $activado); 
      
      if ($desactivado > 0)
      {           
          header('location:app/views/default/modules/usuarios/consulta.php');           
      }
      else
     {
          echo 'entro al sino';    
      }
  }


 public function desactivarUser($id_user, $desactivado)
  {
      $unUsuario = new usuario();        
      $desactivado = $unUsuario->desactivarUsuarios($id_user, $desactivado); 
      
      if ($desactivado > 0)
      {           
          header('location:app/views/default/modules/usuarios/consulta.php');           
      }
      else
     {
          echo 'entro al sino10';    
      }
  }
  
   public function cargarListadoPerfiles($valor)
  {
      $unUsuario = new usuario();  
      $listado = $unUsuario->listadoPerfiles($valor);
      
      if (count($listado) > 0)
      {
          $opciones = '<thead><tr><th>CODIGO</th><th>PERFIL</th></tr></thead><tbody>';
                foreach ($listado as $lis) 
                {
                    $opciones.="<tr><td>".$lis['id']."</td><td><a href='editar.php?id=".$lis['id']."&perfil=".$lis['nombre']."'>".$lis['nombre']."</a></td>";
                }      
     echo $opciones .= "</tbody><tfoot><tr><td></td><td></td></tr></tfoot>";
     }        
  }
  public function cargarPerfilesOpciones(){
    $unUsuario = new usuario();  
    $listado = $unUsuario->listadoPerfiles(1); // este metodo es copia del de arriba ver perfiles/listado.php
    if (count($listado) > 0){
      $opciones = '';
      foreach ($listado as $lis){
          $opciones.= "<option value=".$lis['id'].">".$lis['nombre']."</option>";
      }
      echo $opciones;
    }        
  }
  public function cargarListadoUsuarios($valor)
  {
      $unUsuario = new usuario();  
      $listado = $unUsuario->listadoUsuarios($valor);
      
      if (count($listado) > 0)
      {
          $opciones = '<thead><tr><th>USUARIO</th><th>NOMBRE COMPLETO</th><th>PERFIL</th></tr></thead><tbody>';
                foreach ($listado as $lis) 
                {
                    $opciones.="<tr><td>".$lis['id_usuario']."</td><td><a href='editar.php?id=".$lis['id_usuario']."&nombre=".$lis['nombre']."'>".$lis['nombre']." ".$lis['apellidos']."</a></td><td>".$lis['perfil']."</td></td>";
                }      
     echo $opciones .= "</tbody><tfoot><tr><td></td><td></td><td></td></tr></tfoot>";
     }        
  }
  
   public function buscarUsuario($id_user)
   {
        $unUsuario = new usuario();
        
        $tsArray = $unUsuario->encontrar_Usuario($id_user);    
        
        if(count($tsArray) > 0)
        {
             $_SESSION['usuario_completo'] = $tsArray;
             echo json_encode($tsArray);
        }
        else
        {
            echo 0;
        }
   }
  public function consultarPerfiles($sql)
  {
      $unUsuario =  new usuario(); 
      $perfiles = $unUsuario->consultarPerfiles($sql);           
      if (count($perfiles) > 0)
      {
         $cadena = '';
         $numcolumnas = 5;               
         $cadena .=  "<center><table id='listadoPerfiles' class='table table-condensed'><thead><tr><th colspan=\"$numcolumnas\">PERFILES REGISTRADOS</th></tr><thead><tbody><tr><td colspan=\"$numcolumnas\">se reportan ".count($perfiles)." perfiles</td></tr>";
         
         $i = 1;
         
         foreach ($perfiles as $p):
             $cadena .= "<tr>";
            $resto = ($i % $numcolumnas);             
         
            if($resto == 1){}               
            
            if ($p['activo'] == 1)
            {
                $cadena .= "<td>".$p['nombre']."</td>"."<td><a href='activarDesactivar.php?nombre=".$p['nombre']."&id=".$p['id']."&t=Desactivar '>Desactivar</a></td>";
            }
            else
            {
                $cadena .= "<td>".$p['nombre']."</td>"."<td><a href='activarDesactivar.php?nombre=".$p['nombre']."&id=".$p['id']."&t=Activar '>Activar</a></td>";
            }
            
            
            if($resto == 0)
            {                
               $cadena .= "</tr>"; 
            }
            
            $i++; 
         endforeach;
                
         
         if($resto != 0)
         {
            for ($j = 0; $j < ($numcolumnas - $resto); $j++)
            {
              $cadena .= "<td></td>";
            }
          $cadena .= "</tr></tbody></table></center>";
         }                             
      }
      else
      { 
           $cadena .= "<tr><td>0 elementos encontrados</td></tr> ";
      } 
      echo $cadena;      
  }
  public function consultarUsuarios($sql)
  {
      $unUsuario =  new usuario(); 
      $perfiles = $unUsuario->consultarUsuarios($sql);           
      if (count($perfiles) > 0)
      {
         $cadena = '';
         $numcolumnas = 5;               
         $cadena .=  "<center><table id='listadoUsuarios' class='table table-condensed'><thead><tr><th colspan=\"$numcolumnas\">USUARIOS REGISTRADOS</th></tr><thead><tbody><tr><td colspan=\"$numcolumnas\">se reportan ".count($perfiles)." usuarios</td></tr>";
         
         $i = 1;
         
         foreach ($perfiles as $p):
             $cadena .= "<tr>";
            $resto = ($i % $numcolumnas);             
         
            if($resto == 1){}               
            
            if ($p['activo'] == 'si')
            {
                $cadena .= "<td>".$p['nombre']." ".$p['apellidos']."</td><td><a href='activarDesactivar.php?nombre=".$p['nombre']."&id=".$p['id_usuario']."&t=Desactivar '>Desactivar</a></td>";
            }
            else
            {
                $cadena .= "<td>".$p['nombre']." ".$p['apellidos']."</td><td><a href='activarDesactivar.php?nombre=".$p['nombre']."&id=".$p['id_usuario']."&t=Activar '>Activar</a></td>";
            }
            
            
            if($resto == 0)
            {                
               $cadena .= "</tr>"; 
            }
            
            $i++; 
         endforeach;
                
         
         if($resto != 0)
         {
            for ($j = 0; $j < ($numcolumnas - $resto); $j++)
            {
              $cadena .= "<td></td>";
            }
          $cadena .= "</tr></tbody></table></center>";
         }                             
      }
      else
      { 
           $cadena .= "<tr><td>0 elementos encontrados</td></tr> ";
      } 
      echo $cadena;      
  }
  public function cargarUnPerfil($id_perfil)
  {
      $unUsuario = new usuario();
      $perfil = $unUsuario->unPerfil($id_perfil);
      echo $perfil['nombre'];      
  }
   
    public function usuarioExiste($user, $pass)
   {
        $unUsuario = new usuario();  
        $tsArray = $unUsuario->UsuarioExiste($user, $pass);
        //print_r($tsArray);
        if(count($tsArray) > 0)
        {                
            echo '1';
        }
        else
        {            
            echo '0';            
        }
   }
   public function iniciar_sesion()
   {         
      header('location:app/views/default/modules/no_registrado/index.php');
   }
   public function resultados()
   {         
      header('location:app/views/default/modules/analiticas_avanzadas/resumen_grafico.php');
   }
   public function encuesta()
   {         
      header('location:app/views/default/modules/encuestado/listado_encuestas.php');
   }
}
?>
