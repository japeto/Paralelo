<?php

require 'app/model/usuario.class.php';
class mvc_controller_principal
{

 /* METODO QUE RECIBE LA ORDEN DE BUSQUEDA, PREPARA LOS DATOS Y SE COMUNICA
 CON EL MODELO PARA REALIZAR LA CONSULTA
 INPUT
 $carrera | nombre de la carrera a buscar
 $limit | cantidad de registros a mostrar
 OUTPUT
 HTML | el resultado obtenido del modelo es procesado y convertido en codigo html para que el VIEW pueda mostrarlo 
 */
   
    //public function buscar($carrera, $cantidad)
//   public function buscar($cantidad)
//   {
//        $unUsuario = new usuario();
//        //carga la plantilla 
//        $pagina=$this->load_template1('LISTADO DE USUARIOS');
//        //carga html del buscador
//       $buscador = $this->load_page('app/views/default/modules/m.buscador.php');
//       //obtiene los registros de la base de datos
//        ob_start();
//    //realiza consulta al modelo
//     //$tsArray = $unUsuario->universitarios($carrera,$cantidad);
//        $tsArray = $unUsuario->usuarios($cantidad);
//      if($tsArray!='')
//      {//si existen registros carga el modulo en memoria y rellena con los datos 
//      //$titulo = 'Resultado de busqueda por "'.$carrera.'" ';
//      $titulo = 'Resultado de busqueda';
//      //carga la tabla de la seccion de VIEW
//      include 'app/views/default/modules/m.table_user.php';
//      $table = ob_get_clean();
//      //realiza el parseado 
//      $pagina = $this->replace_content('/\#CONTENIDO\#/ms', $buscador.$table , $pagina);
//      }
//      else
//      {//si no existen datos -> muestra mensaje de error
//        $pagina = $this->replace_content('/\#CONTENIDO\#/ms' ,$buscador.'<h1>No existen resultados</h1>' , $pagina);
//      }
//      $this->view_page($pagina);
//   }
//   public function adicionar()
//   {        
//        $pagina=$this->load_template1('REGISTRO DE USUARIOS');
//        $adicionar = $this->load_page('app/views/default/modules/usuarios/m.adicionar.php');    
//        $pagina = $this->replace_content('/\#CONTENIDO\#/ms', $adicionar, $pagina);
//        $this->view_page($pagina);
//   }
//   public function eliminar()
//   {   
//        $unUsuario = new usuario();
//        $pagina=$this->load_template1('DESACTIVAR USUARIOS');
//        $listado = $this->load_page('app/views/default/modules/m.eliminar.php');            
//        
//        ob_start();
//        $tsArray = $unUsuario->usuariosTotal1();
//        if($tsArray!='')
//        {          
//            $titulo = 'Resultado de busqueda';      
//            include 'app/views/default/modules/m.table_user_eliminar.php';
//            $table = ob_get_clean();
//            $pagina = $this->replace_content('/\#CONTENIDO\#/ms', $listado.$table , $pagina);            
//        }
//        else
//        {
//            $pagina = $this->replace_content('/\#CONTENIDO\#/ms' ,$listado.'<h1>No existen resultados</h1>' , $pagina);
//        }
//        $this->view_page($pagina);
//   }
//   
//   public function recuperar()
//   {   
//        $unUsuario = new usuario();
//        $pagina=$this->load_template1('REACTIVAR USUARIOS');
//        $listado = $this->load_page('app/views/default/modules/m.recuperar.php');            
//        
//        ob_start();
//        $tsArray = $unUsuario->usuariosTotal2();
//        if($tsArray!='')
//        {          
//            $titulo = 'Resultado de busqueda';      
//            include 'app/views/default/modules/m.table_user_recuperar.php';
//            $table = ob_get_clean();
//            $pagina = $this->replace_content('/\#CONTENIDO\#/ms', $listado.$table , $pagina);            
//        }
//        else
//        {
//            $pagina = $this->replace_content('/\#CONTENIDO\#/ms' ,$listado.'<h1>No existen resultados</h1>' , $pagina);
//        }
//        $this->view_page($pagina);
//   }
//   
   
//   public function guardarUsuario($user, $pass1, $pass2, $email, $nombres, $apellidos)
//   {
//       $unUsuario = new usuario();
//       if ($pass1 == $pass2) 
//        {
//           $adicionarUsuarios = $unUsuario->adicionarUsuarios($user, $pass1, $email, $nombres, $apellidos);
//        }      
//        if ($adicionarUsuarios == 1)
//        {
//             $pagina=$this->load_template1('Iniciar Sesion', 'layout_no_registro.php');
//             $listado = $this->load_page('app/views/default/modules/no_registro/m.index.php');
//             $pagina = $this->replace_content('/\#CONTENIDO\#/ms', $listado , $pagina);            
//             $this->view_page($pagina);            
////            $pagina=$this->load_template1('Usuarios registrados', 'layout_usuarios.php');
////            $listado = $this->load_page('app/views/default/modules/m.listado.php');
////            ob_start();
////            $tsArray = $unUsuario->usuariosTotal();
////            if($tsArray!='')
////            {          
////                $titulo = 'Resultado de busqueda';      
////                include 'app/views/default/modules/m.table_user.php';
////                $table = ob_get_clean();
////                $pagina = $this->replace_content('/\#CONTENIDO\#/ms', $listado.$table , $pagina);            
////            }
////            else
////            {   
////                $pagina = $this->replace_content('/\#CONTENIDO\#/ms' ,$listado.'<h1>No existen resultados</h1>' , $pagina);
////            }
////            $this->view_page($pagina);            
//        }
//        
//   }
   
//   public function encontrarUsuario($id)
//   {
//        $unUsuario = new usuario();       
//        $pagina=$this->load_template1('MODIFICAR');
//        $listado = $this->load_page('app/views/default/modules/m.modificar.php');
//        
//        ob_start();
//        $tsArray = $unUsuario->buscarUsuario($id);
//        
//        if($tsArray != '')
//        {          
//            $titulo = 'Resultado de busqueda';      
//            include 'app/views/default/modules/m.actualizar.php';
//            $table = ob_get_clean();            
//            $pagina = $this->replace_content('/\#CONTENIDO\#/ms', $listado.$table , $pagina);            
//        }
//        else
//        {
//            $pagina = $this->replace_content('/\#CONTENIDO\#/ms' ,$listado.'<h1>No existen resultados</h1>' , $pagina);
//        }
//        $this->view_page($pagina);
//   }
   
//   public function actualizarUsuario($id, $nombres, $apellidos, $email)
//   {
//       $unUsuario = new usuario();                    
//       $unUsuario->actualizarUsuarios($id, $nombres, $apellidos, $email);        
//      
//        $pagina=$this->load_template1('LISTADO');
//        $listado = $this->load_page('app/views/default/modules/m.listado.php');        
//        ob_start();
//        $tsArray = $unUsuario->usuariosTotal();        
//        if($tsArray!='')
//        {          
//            $titulo = 'Resultado de busqueda';      
//            include 'app/views/default/modules/m.table_user.php';
//            $table = ob_get_clean();            
//            $pagina = $this->replace_content('/\#CONTENIDO\#/ms', $listado.$table , $pagina);            
//        }
//        else
//        {
//            $pagina = $this->replace_content('/\#CONTENIDO\#/ms' ,$listado.'<h1>No existen resultados</h1>' , $pagina);
//        }
//        $this->view_page($pagina);
//   }
   
//    public function desactivarUsuarios($listado_a_eliminar)
//   {
//        $unUsuario = new usuario();       
//        $pagina=$this->load_template1('DESACTIVAR USUARIOS');
//        $listado = $this->load_page('app/views/default/modules/m.eliminar.php');
//               
//        $tsArray = $unUsuario->desactivarUsuarios($listado_a_eliminar);
//        
//        $pagina=$this->load_template('LISTADO DE USUARIOS');
//        $listado = $this->load_page('app/views/default/modules/m.listado.php');        
//        ob_start();
//        $tsArray = $unUsuario->usuariosTotal();        
//        if($tsArray!='')
//        {          
//            $titulo = 'Usuarios NO activos actualmente';      
//            include 'app/views/default/modules/m.table_user.php';
//            $table = ob_get_clean();            
//            $pagina = $this->replace_content('/\#CONTENIDO\#/ms', $listado.$table , $pagina);            
//        }
//        else
//        {
//            $pagina = $this->replace_content('/\#CONTENIDO\#/ms' ,$listado.'<h1>No existen resultados</h1>' , $pagina);
//        }
//        $this->view_page($pagina);
//   }

   
//   public function activarUsuarios($listado_a_eliminar)
//   {
//        $unUsuario = new usuario();       
//        $pagina=$this->load_template1('REACTIVAR USUARIOS');
//        $listado = $this->load_page('app/views/default/modules/m.eliminar.php');
//               
//        $tsArray = $unUsuario->activarUsuarios($listado_a_eliminar);
//        
//        $pagina=$this->load_template1('LISTADO DE USUARIOS');
//        $listado = $this->load_page('app/views/default/modules/m.listado.php');        
//        ob_start();
//        $tsArray = $unUsuario->usuariosTotal();        
//        if($tsArray!='')
//        {          
//            $titulo = 'Usuarios activos actualmente';      
//            include 'app/views/default/modules/m.table_user.php';
//            $table = ob_get_clean();            
//            $pagina = $this->replace_content('/\#CONTENIDO\#/ms', $listado.$table , $pagina);            
//        }
//        else
//        {
//            $pagina = $this->replace_content('/\#CONTENIDO\#/ms' ,$listado.'<h1>No existen resultados</h1>' , $pagina);
//        }
//        $this->view_page($pagina);
//   }
   
   public function comprobarloginUsuario($user)
   {
        $unUsuario = new usuario();  
        $tsArray = $unUsuario->loginUsuario($user);
        
        if($tsArray != '')
        {                
            $_SESSION['usuario'] = $tsArray['id_usuario']; 
            $perfil = $tsArray['perfil']; 
            echo $perfil;
        }
        else
        {            
            echo '0';            
        }
   }
   
   /*public function loginUsuarios($user, $pass)
   {
        $unUsuario = new usuario();  
        $encuestado = $unUsuario->loginEncuestado($pin);
        if (count($encuestado) > 0)
        {
            $_SESSION['encuestado'] = $encuestado['pin'];             
                echo 3;
        }
        else
        {
            $tsArray = $unUsuario->loginypassUsuario($user, $pass);    
            if(count($tsArray) > 0)
            {      
                
                $_SESSION['usuario'] = $tsArray['id_usuario']; 
                $perfil = $tsArray['perfil']; 
                echo $perfil;
            }
            else
            {            
               echo '0';            
            }
        }
        
        
   }*/
public function loginUsuarios($user, $pass){
  $unUsuario = new usuario();  
  $tsArray = $unUsuario->loginypassUsuario($user, $pass);    
  if(count($tsArray) > 0){      
      /*revisar contraseña y nombre de usuario*/
      $_SESSION['usuario'] = $tsArray['id_usuario'];
      if (! isset($_SESSION['usuario'])){
        $_SESSION['usuario'] = $tsArray['id_encuestado'];
      }
      $_SESSION['usuario_completo'] = $tsArray;
      $perfil = $tsArray['perfil']; 
      echo $perfil; /*retorna el perfil y con  ello se redirecciona*/
  }else{            
     echo 0;            
  }
}
   public function loginUsuarios1($user, $pass)
   {
        $unUsuario = new usuario();  
        
            $tsArray = $unUsuario->loginypassUsuario($user, $pass);    
            if(count($tsArray) > 0)
            {      
                /*revisar contraseña y nombre de usuario*/
                $_SESSION['usuario'] = $tsArray['id_usuario'];
                $_SESSION['usuario_completo'] = $tsArray;
                switch ($tsArray['perfil'])
                {
                    case 1:
                    {
                        header('location:indice_principal.php?action=admin'); 
                        break;
                    }
                    case 2:
                    {
                        header('location:indice_principal.php?action=editor'); 
                        break;
                    }
                    default :
                    {
                        header('location:indice_principal.php?action=registrar'); 
                        break;
                    }
                }
            }
            else
            {            
               header('location:indice_principal.php?action=registrar');
            
            }        
   }
   
   
   public function buscarUser($valor)
   {
        $unUsuario = new usuario();                  
        $tsArray = $unUsuario->searchUser($valor);          
        if(count($tsArray) > 0)
        {
            $_SESSION['usuario_encontrado'] = $tsArray['nombre']." ".$tsArray['apellidos'];
            $_SESSION['id_u'] = $tsArray['id_usuario'];
            header('location:app/views/default/modules/no_registrado/recuperar_contrasena.php');
        }
        else
        {
            echo 'no se pudo';
        }
   }
   
   public function recuperarPass($id_user, $contrasena)
   {
        $unUsuario = new usuario();                  
        $resultado = $unUsuario->actualizarContrasena( $id_user, $contrasena);  
        echo $resultado;
        if($resultado > 0)
        {
            $_SESSION['recupera'] = 1;
            header('location:app/views/default/modules/no_registrado/index.php');
        }
        else
        {
            echo 'no se pudo';
        }
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
   public function miPerfil($id, $nombre, $apellidos, $contrasena)
   {
        $unUsuario = new usuario();  
        
        $resultado = $unUsuario->actualizar_perfil($id, $nombre, $apellidos, $contrasena);
        if ($resultado > 0)
        {
            $_SESSION['actualizar'] = $resultado;
            $tsArray = $unUsuario->encontrar_Usuario($id);    
            if(count($tsArray) > 0)
            {
                $_SESSION['usuario_completo'] = $tsArray;             
            }
           header('location:app/views/default/modules/administrador/index.php');
        }        
   }
   
   /* METODO QUE MUESTRA LA PAGINA PRINCIPAL CUANDO NO EXISTEN NUEVAS ORDENES
 OUTPUT
 HTML | codigo html de la pagina 
 */
  public function principal()
  {    
      header('location:app/views/default/principal.php');
  }
  public function movil()
  {    
      header('location:http://eisc.univalle.edu.co/m.tramas');
  }
  public function admin()
  {         
      header('location:app/views/default/modules/administrador/index.php');
  } 
   
  public function editor()
  {         
      header('location:app/views/default/modules/encuestas/index.php');
  }
  public function encuestado()
  {         
      header('location:app/views/default/modules/encuestado/index.php');
  }
  public function usuario()
  {         
      header('location:app/views/default/modules/usuarios/index.php');
  }
  public function analiticas()
  {         
      header('location:app/views/default/modules/analiticas/index.php');
  }
  public function perfil()
  {         
      header('location:app/views/default/modules/perfil/index.php');
  }
  public function pines()
  {         
      header('location:app/views/default/modules/pines/index.php');
  }
  public function no_registro()
  {         
      header('location:app/views/default/modules/no_registrado/index.php');
  }
  public function  registrar()
 {  
     header('location:app/views/default/modules/no_registrado/adicionar.php');
 }
  public function load_template($title='Sin Titulo', $plantilla = 'page0.php')
  {  
    $pagina = $this->load_page('app/views/default/'.$plantilla);    
    $pagina = $this->replace_content('/\#TITLE\#/ms' ,$title, $pagina);
      
    $header = $this->load_page('app/views/default/sections/header_principal.php');
    $menu = $this->load_page('app/views/default/sections/menu_principal.php');
    $header_total = $this->replace_content('/\#MENUPRINCIPAL\#/ms' ,$menu, $header);    
    $pagina = $this->replace_content('/\#HEADER\#/ms' ,$header_total, $pagina);
   
  
    $content = $this->load_page('app/views/default/sections/content_principal.php');      
    $pagina = $this->replace_content('/\#CONTENIDO\#/ms' ,$content, $pagina);
  
    $footer = $this->load_page('app/views/default/sections/footer_admin.php');
    $pagina = $this->replace_content('/\#FOOTER\#/ms' ,$footer, $pagina);
      
    ob_start();                
        include 'app/views/default/sections/sesion.php';
    $table = ob_get_clean();    
    $pagina = $this->replace_content('/\#SESION\#/ms' ,$table, $pagina);                
  return $pagina;
 }
 /***************************************************************************************************************/
 public function load_template_admin($title='Sin Titulo', $plantilla='page0.php')
 {  
  $pagina = $this->load_page('app/views/default/'.$plantilla); 
  
  $pagina = $this->replace_content('/\#TITLE\#/ms' ,$title, $pagina);
  
  $header = $this->load_page('app/views/default/sections/header_admin.php');
  //$menu = $this->load_page('app/views/default/sections/menu_admin.php');
  //$header_total = $this->replace_content('/\#MENUPRINCIPAL\#/ms' ,$menu, $header);
  $pagina = $this->replace_content('/\#HEADER\#/ms' ,$header, $pagina);
  
  
  $content = $this->load_page('app/views/default/sections/content_admin.php');
  //$menu_left = $this->load_page('app/views/default/sections/menu_left_admin.php');
  $index = $this->load_page('app/views/default/modules/perfil/index.php');
  //$cont = $this->replace_content('/\#MENULEFT\#/ms' ,$menu_left, $content);
  $contenido = $this->replace_content('/\#CONTENT\#/ms' ,$index, $content);  
  $pagina = $this->replace_content('/\#CONTENIDO\#/ms' ,$contenido, $pagina);
  
  
  $footer = $this->load_page('app/views/default/sections/footer_admin.php');
  $pagina = $this->replace_content('/\#FOOTER\#/ms' ,$footer, $pagina);
   
  //$sesion = $this->load_page('app/views/default/sections/sesion.php');
    ob_start();        
        include 'app/views/default/sections/sesion.php';
    $table = ob_get_clean();
    //$s = $this->replace_content('/\#SESION\#/ms' ,$table, $sesion);
    $pagina = $this->replace_content('/\#SESION\#/ms' ,$table, $pagina);                
  //return $pagina;
  $this->view_page($pagina);
 }
 
 
 
 public function load_template_editor($title='Sin Titulo', $plantilla='page0.php')
 {  
  $pagina = $this->load_page('app/views/default/'.$plantilla); 
  
  $pagina = $this->replace_content('/\#TITLE\#/ms' ,$title, $pagina);
  
  $header = $this->load_page('app/views/default/sections/header_editor.php');
  $menu = $this->load_page('app/views/default/sections/menu_editor.php');
  $header_total = $this->replace_content('/\#MENUPRINCIPAL\#/ms' ,$menu, $header);
  $pagina = $this->replace_content('/\#HEADER\#/ms' ,$header_total, $pagina);
  
    
  
  //$content = $this->load_page('app/views/default/sections/content_editor.php');
  //$menu_left = $this->load_page('app/views/default/sections/menu_left_editor.php');
  $index = $this->load_page('app/views/default/modules/encuestas/index.php');
  //$cont = $this->replace_content('/\#MENULEFT\#/ms' ,$menu_left, $content);
  //$contenido = $this->replace_content('/\#CONTENT\#/ms' ,$index, $cont);  
  $pagina = $this->replace_content('/\#CONTENIDO\#/ms' ,$index, $pagina);
  
  
  
  $footer = $this->load_page('app/views/default/sections/footer_editor.php');
  $pagina = $this->replace_content('/\#FOOTER\#/ms' ,$footer, $pagina);
   
  $sesion = $this->load_page('app/views/default/sections/sesion.php');
    ob_start();        
        include 'app/views/default/sections/prueba0.php';
    $table = ob_get_clean();
    $s = $this->replace_content('/\#SESION\#/ms' ,$table, $sesion);
    $pagina = $this->replace_content('/\#SESION\#/ms' ,$s, $pagina);                
  return $pagina;
 }
 
 
 public function load_template_encuestado($title='Sin Titulo', $plantilla='page0.php')
 {  
  $pagina = $this->load_page('app/views/default/'.$plantilla); 
  
  $pagina = $this->replace_content('/\#TITLE\#/ms' ,$title, $pagina);
  
  $header = $this->load_page('app/views/default/sections/header_encuestado.php');
  $menu = $this->load_page('app/views/default/sections/menu_encuestado.php');
  $header_total = $this->replace_content('/\#MENUPRINCIPAL\#/ms' ,$menu, $header);
  $pagina = $this->replace_content('/\#HEADER\#/ms' ,$header_total, $pagina);
  
  $content = $this->load_page('app/views/default/sections/content_encuestado.php');
  $menu_left = $this->load_page('app/views/default/sections/menu_left_encuestado.php');
  $index = $this->load_page('app/views/default/modules/encuestado/index.php');
  $cont = $this->replace_content('/\#MENULEFT\#/ms' ,$menu_left, $content);
  $contenido = $this->replace_content('/\#CONTENT\#/ms' ,$index, $cont);  
  $pagina = $this->replace_content('/\#CONTENIDO\#/ms' ,$contenido, $pagina);
  
  
  $footer = $this->load_page('app/views/default/sections/footer_encuestado.php');
  $pagina = $this->replace_content('/\#FOOTER\#/ms' ,$footer, $pagina);
   
  $sesion = $this->load_page('app/views/default/sections/sesion.php');
    ob_start();        
        include 'app/views/default/sections/prueba0.php';
    $table = ob_get_clean();
    $s = $this->replace_content('/\#SESION\#/ms' ,$table, $sesion);
    $pagina = $this->replace_content('/\#SESION\#/ms' ,$s, $pagina);                
  return $pagina;
 }
  
 /***************************************************************************************************************/
 /* METODO QUE MUESTRA EN PANTALLA EL FORMULARIO DE BUSQUEDA
 HTML | codigo html de la pagina con el buscador incluido
 */
 public function  buscador()
 {
  $pagina=$this->load_template('Busqueda de registros');
  $buscador = $this->load_page('app/views/default/modules/m.buscador.php');
  $pagina = $this->replace_content('/\#CONTENIDO\#/ms' ,$buscador , $pagina);
  $this->view_page($pagina);
 }

 
 /* METODO QUE CARGA UNA PAGINA DE LA SECCION VIEW Y LA MANTIENE EN MEMORIA
 INPUT
 $page | direccion de la pagina 
 OUTPUT
 STRING | devuelve un string con el codigo html cargado
 */
 private function load_page($page)
 {
  return file_get_contents($page);
 }
 
 /* METODO QUE ESCRIBE EL CODIGO PARA QUE SEA VISTO POR EL USUARIO
 INPUT
 $html | codigo html
 OUTPUT
 HTML | codigo html 
 */
 private function view_page($html)
 {
  echo $html;
 }

 /* PARSEA LA PAGINA CON LOS NUEVOS DATOS ANTES DE MOSTRARLA AL USUARIO
 INPUT
 $out | es el codigo html con el que sera reemplazada la etiqueta CONTENIDO
 $pagina | es el codigo html de la pagina que contiene la etiqueta CONTENIDO
 OUTPUT
 HTML | cuando realiza el reemplazo devuelve el codigo completo de la pagina
 */
 private function replace_content($in='/\#CONTENIDO\#/ms', $out,$pagina)
 {
   return preg_replace($in, $out, $pagina);
 }

}
?>
