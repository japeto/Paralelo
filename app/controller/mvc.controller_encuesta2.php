<?php

require 'app/model/encuesta.class.php';
//require 'app/model/graficos.class.php';
class mvc_controller_encuesta 
{
	
public function consultar_Encuesta_a_Editar($id_encuesta, $id_usuario)
  {
      $unaEncuesta =  new encuesta(); 
      $categorias = $unaEncuesta->Encuesta_encontrada($id_encuesta, $id_usuario);           
      //print_r($categorias);
      if (count($categorias) > 0)
      {          
        echo json_encode($categorias);
      }
      else
      {
	echo json_encode(array('No existen Datos'));
      }
     
  }
  
  public function consultar_Modulo_a_Editar($id_modulo, $id_encuesta, $id_usuario)
  {
      $unaEncuesta =  new encuesta(); 
      $modulo = $unaEncuesta->Modulo_encontrado($id_modulo, $id_encuesta, $id_usuario);                 
      if (count($modulo) > 0)
      {          
        echo json_encode($modulo);
      }
      else
      {
	echo json_encode(array('No existen Datos'));
      }
     
  }
  
   public function consultar_Pregunta_a_Editar($id_pregunta, $id_modulo, $id_encuesta, $id_usuario)
  {
      $unaEncuesta =  new encuesta(); 
      $pregunta = $unaEncuesta->Pregunta_encontrada($id_pregunta, $id_modulo, $id_encuesta, $id_usuario);                 
      if (count($pregunta) > 0)
      {          
        echo json_encode($pregunta);
      }
      else
      {
	echo json_encode(array('No existen Datos'));
      }
     
  }
  
  public function consultar_Opciones_a_Editar($id_pregunta)
  {
      $unaEncuesta =  new encuesta(); 
      $opciones = $unaEncuesta->Opciones_encontradas($id_pregunta);                 
      if (count($opciones) > 0)
      {          
        echo json_encode($opciones);
      }
      else
      {
	echo json_encode(array('No existen Datos'));
      }
     
  }
  
  public function consultar_opciones_pregunta_tipo_tabla_a_Editar($id_pregunta)
  {
      $unaEncuesta =  new encuesta(); 
      $opciones = $unaEncuesta->Opciones_pregunta_tipo_tabla_encontradas($id_pregunta);                 
      if (count($opciones) > 0)
      {          
        echo json_encode($opciones);
      }
      else
      {
	echo json_encode(array('No existen Datos'));
      }
     
  }
   public function consultar_pregunta_1_2_columnas_filas_editar($id_pregunta)
  {
      $unaEncuesta =  new encuesta(); 
      $opciones = $unaEncuesta->Columnas_filas_pregunta_1_2_encontradas($id_pregunta);                 
      if (count($opciones) > 0)
      {          
        echo json_encode($opciones);
      }
      else
      {
	echo json_encode(array("0"=>array("id"=>0, "cantidad_columnas"=>0, "cantidad_filas"=>0)));
      }
     
  }
    
   public function consultar_pregunta_tabla_columnas_filas_editar($id_pregunta)
  {
      $unaEncuesta =  new encuesta(); 
      $opciones = $unaEncuesta->Columnas_filas_pregunta_tabla_encontradas($id_pregunta);                 
      if (count($opciones) > 0)
      {          
        echo json_encode($opciones);
      }
      else
      {
	echo json_encode(array("0"=>array("id"=>0, "cantidad_columnas"=>0, "cantidad_filas"=>0)));
      }
     
  }
  /************************************************************************************************************/
  
  public function cargarComboTipo_Pregunta($valor)
  {
      $unaEncuesta =  new encuesta(); 
      $categorias = $unaEncuesta->tipoPregunta($valor);           
      //print_r($categorias);
      if ($categorias != '')
      {
          $opciones = '<option value="0">Selecciona el tipo de pregunta</option>';
                foreach ($categorias as $cat) 
                {
                    $opciones.='<option value="'.$cat['id_tipo'].'">'.$cat['nombre_tipo'].'</option>';
                }      
     echo $opciones;
     }        
  }
  
  
  public function cargarComboEncuestaEditar($id_usuario)
  {//FUNCION QUE CARGAR EL LISTADO DE ENCUESTAS
      $unaEncuesta =  new encuesta(); 
      $categorias = $unaEncuesta->usuarioEncuestaEditar($id_usuario);           
      //print_r($categorias);
      if ($categorias != '')
      {
          $opciones = '<option value="0">SELECCIONE LA ENCUESTA A EDITAR</option>';
                foreach ($categorias as $cat) 
                {
                    $opciones.='<option value="'.$cat['id_encuesta'].'">'.$cat['titulo'].'</option>';
                }      
     echo $opciones;
     }        
  }
  
  public function cargarComboEncuestaEditar1($id_usuario)
  {//FUNCION QUE CARGAR EL LISTADO DE ENCUESTAS
      $unaEncuesta =  new encuesta(); 
      $categorias = $unaEncuesta->usuarioEncuestaEditar1($id_usuario);           
      //print_r($categorias);
      if ($categorias != '')
      {
          $opciones = '<option value="0">SELECCIONE LA ENCUESTA A EDITAR</option>';
                foreach ($categorias as $cat) 
                {
                    $opciones.='<option value="'.$cat['id_encuesta'].'">'.$cat['titulo'].'</option>';
                }      
     echo $opciones;
     }        
  }
  
public function cargarComboModuloEncuestaEditar($id_encuesta){
    $unaEncuesta =  new encuesta(); 
    $categorias = $unaEncuesta->modulosEncuesta($id_encuesta);           
    if ($categorias != ''){
      $opciones = '<option value="0">SELECCIONA EL MODULO DE LA ENCUESTA</option>';
      foreach ($categorias as $cat){
          $opciones.='<option value="'.$cat['id_modulo'].'" >'.$cat['descripcion'].'</option>';           
      }      
      echo $opciones;
   }        
}
public function cargarComboModuloEncuestaVer($id_encuesta){
    $unaEncuesta =  new encuesta(); 
    $categorias = $unaEncuesta->modulosEncuesta($id_encuesta);           
    if ($categorias != ''){
      $opciones .= '<div class="radio radio-primary">';
      foreach ($categorias as $cat){
        if($_SESSION['id_modulo'] == $cat['id_modulo']){
          // $opciones.='<input type="checkbox" value='.$cat['id_modulo'].'" checked> M&oacute;dulo: <b> '.$cat['descripcion'].' </b> <br/>';
            $opciones .= '<input type="radio" id="radio'.$cat['id_modulo'].'" value="'.$cat['id_modulo'].'" name="'.$cat['descripcion'].'" checked  onclick="seleccione_modulo(this)">
                            <label for="radio'.$cat['id_modulo'].'">
                            M&oacute;dulo: <b> '.$cat['descripcion'].' </b>
                            </label><br/>';
        }else{
            $opciones .= '<input type="radio" id="radio'.$cat['id_modulo'].'" value="'.$cat['id_modulo'].'" name="'.$cat['descripcion'].'" onclick="seleccione_modulo(this)">
                            <label for="radio'.$cat['id_modulo'].'">
                            M&oacute;dulo: <b> '.$cat['descripcion'].' </b>
                            </label><br/>';
          // $opciones.='<input type="checkbox" value='.$cat['id_modulo'].'"> M&oacute;dulo: <b> '.$cat['descripcion'].' </b> <br/>';
        }
      } //foreach
      $opciones .= '</div><br/>';
      echo $opciones;
   }//if        
}

  public function cargarComboPreguntaEncuestaEditar($id_modulo)
  {
      $unaEncuesta =  new encuesta(); 
      $categorias = $unaEncuesta->preguntaModuloEncuesta($id_modulo);           
      //print_r($categorias);
      if ($categorias != '')
      {
          $opciones = '<option value="0">SELECCIONE UNA PREGUNTA</option>';
                foreach ($categorias as $cat) 
                {
                    $opciones.='<option value="'.$cat['id'].'">(#'.$cat['id'].")".$cat['descripcion'].'</option>';
                }      
     echo $opciones;
     }        
  }
  
  public function cargarComboPreguntaEncuestaEditar1($id_modulo, $id_tipo)
  {
      $unaEncuesta =  new encuesta(); 
      $categorias = $unaEncuesta->preguntaModuloEncuesta1($id_modulo, $id_tipo);           
      if ($categorias != '')
      {
          $opciones = '<option value="0">SELECCIONE UNA PREGUNTA</option>';
                foreach ($categorias as $cat) 
                {
                    $opciones.='<option value="'.$cat['id'].'">'.$cat['descripcion'].'</option>';
                }      
     echo $opciones;
     }        
  }
  
  
  public function cargarComboPreguntaFinEncuestaEditar($id_modulo)
  {
      $unaEncuesta =  new encuesta(); 
      $categorias = $unaEncuesta->pregunta_a_vincular_Modulo_Encuesta($id_modulo);           
      //print_r($categorias);
      if ($categorias != '')
      {
          $opciones = '<option value="0">SELECCIONE UNA PREGUNTA</option>';
                foreach ($categorias as $cat) 
                {
                    $opciones.='<option value="'.$cat['id'].'">'.$cat['descripcion'].'</option>';
                }      
     echo $opciones;
     }        
  }
  
  public function cargarComboOpcionesPreguntaInicio($id_pregunta)
  {
      $unaEncuesta =  new encuesta(); 
      $categorias = $unaEncuesta->opciones_pregunta_a_vincular_Modulo_Encuesta($id_pregunta);           
      //print_r($categorias);
      if ($categorias != '')
      {
          $opciones = '<option value="0">SELECCIONE UNA OPCION DE LA PREGUNTA</option>';
                foreach ($categorias as $cat) 
                {
                    $opciones.='<option value="'.$cat['id'].'">'.$cat['descripcion'].'</option>';
                }      
     echo $opciones;
     }        
  }
  
  /*FUNCION QUE REDIRECCION HACIA MODIFICAR LA ENCUESTA*/
  public function redireccionarAdicionarPreguntas($id_encuesta, $titulo, $id_modulo, $nombre_modulo, $opcion)
  {   
      $_SESSION['id_encuesta'] = $id_encuesta;  
      $_SESSION['nombre_encuesta'] = $titulo;        
      $_SESSION['id_modulo'] = $id_modulo;
      $_SESSION['nombre_modulo'] = $nombre_modulo;
      header('location:app/views/default/modules/encuestas/adicionar_pregunta.php');
  } 
  
  public function cargarListadoEncuestas($id_usuario)
  {
      $unaEncuesta =  new encuesta(); 
      $encuestas = $unaEncuesta->usuarioEncuesta($id_usuario);           
      
      if (count($encuestas) > 0)
      {
          $opciones = '<thead><tr><th>TITULO</th><th>FECHA DE CREACION</th><th>PROPIETARIO</th><th>ESTADO</th></tr></thead><tbody>';
                foreach ($encuestas as $enc) 
                {
                    $opciones.="<tr><td><a href='mostrar_encuesta.php?id_encuesta=".$enc['id_encuesta']."&nombre=".$enc['titulo']."&id_modulo=1'>".$enc['titulo']."</a></td><td>".$enc['fecha_creacion']."</td><td>".$enc['id_usuario']."</td><td>".$enc['estado']."</td>";
                }      
     echo $opciones .= "</tbody><tfoot><tr><td></td><td></td><td></td><td></td></tr></tfoot>";
     }        
  }
  
  public function activarEncuesta($id_user, $activado)
  {
      $unaEncuesta =  new encuesta();
      $desactivado = $unaEncuesta->activarEncuestas($id_user, $activado); 
      
      if ($desactivado > 0)
      {           
          header('location:app/views/default/modules/encuestas/consulta.php');           
      }
      else
     {
          echo 'entro al sino';    
      }
  }
  public function desactivarEncuestas($id_user, $desactivado)
  {
      $unaEncuesta =  new encuesta();
      $desactivado = $unaEncuesta->desactivarEncuestas($id_user, $desactivado); 
      
      if ($desactivado > 0)
      {           
          header('location:app/views/default/modules/encuestas/consulta.php');           
      }
      else
     {
          echo 'entro al sino10';    
      }
  }
   public function consultarEncuestas($sql)
  {
      $unaEncuesta =  new encuesta(); 
      $perfiles = $unaEncuesta->consultarEncuestas($sql);           
      if (count($perfiles) > 0)
      {
         $cadena = '';
         $numcolumnas = 5;               
         $cadena .=  "<center><table id='listadoencuestas' class='table table-condensed'><thead><tr><th colspan=\"$numcolumnas\">ENCUESTAS REGISTRADAS</th></tr><thead><tbody><tr><td colspan=\"$numcolumnas\">se reportan ".count($perfiles)." encuestas</td></tr>";
         
         $i = 1;
         
         foreach ($perfiles as $p):
             $cadena .= "<tr>";
            $resto = ($i % $numcolumnas);             
         
            if($resto == 1){}               
            
            if ($p['estado'] == 'Activada')
            {
                $cadena .= "<td>".$p['titulo']."</td><td><a href='activarDesactivar.php?nombre=".$p['titulo']."&id=".$p['id_encuesta']."&t=Desactivar '>Desactivar</a></td>";
            }
            else
            {
                $cadena .= "<td>".$p['titulo']."</td><td><a href='activarDesactivar.php?nombre=".$p['titulo']."&id=".$p['id_encuesta']."&t=Activar '>Activar</a></td>";
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
  
  public function generarPines($id_encuesta, $cantidad, $codigo_universidad)
  {
      $unaEncuesta =  new encuesta(); 
      $codigos = $unaEncuesta->EncuestaPines($id_encuesta, $cantidad, $codigo_universidad);           
      
      //print_r($codigos);
      if (count($codigos) > 0)
      {
          $_SESSION['pines']=$codigos;
          echo 1;
      }
      else
      {
          echo 0;
      }       
  }
  public function contarPines($sql){
      $unaEncuesta =  new encuesta(); 
      $codigos = $unaEncuesta->consultarPines($sql);  
      echo count($codigos);
  }

  public function consultarPines($sql)
  {
      $unaEncuesta =  new encuesta(); 
      $codigos = $unaEncuesta->consultarPines($sql);           
      $_SESSION['codigos'] = $codigos;     
      //print_r($codigos);
      if (count($codigos) > 0)
      {
         $cadena = '';
         $numcolumnas = 5;
         
         $cadena .=  "<center><table class='table table-condensed'><thead><tr><th colspan=\"$numcolumnas\">CONTRASEÑAS GENERADAS</th></tr><thead><tbody><tr><td colspan=\"$numcolumnas\">se reportan ".count($codigos)." contraseñas de acceso</td></tr>";
         
         $i = 1;
         
         foreach ($codigos as $p):
             
             $resto = ($i % $numcolumnas);             
            if($resto == 1)
            { 
                 $cadena .= "<tr>";
            }
            
            $cadena .= "<td>".$p['pin']."</td>";
                   
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
 
 
 
 /*********************************************************************************************************************************/
 public function ListadoPines($sql_listado, $id_consulta, $id_universidad, $id_facultad, $id_programa)
  {
      $unaEncuesta =  new encuesta(); 
      $codigos = $unaEncuesta->listadoPines($sql_listado);  
      
      $_SESSION['codigos'] = $codigos;     
      //print_r($codigos);
      $uvsf =0; $uvme = 0; $uvpa = 0; $puj = 0; $usc = 0;
      $respondidas_sf = 0; $respondidas_me = 0; $respondidas_pa = 0; $respondidas_puj = 0; $respondidas_usc = 0;
      $no_respondidas_sf = 0; $no_respondidas_me = 0; $no_respondidas_pa = 0; $no_respondidas_puj = 0; $no_respondidas_usc = 0;
      $sin_responder_sf = 0; $sin_responder_me = 0; $sin_responder_pa = 0; $sin_responder_puj = 0; $sin_responder_usc = 0;
      $femenino = 0; $masculino = 0;
      $respondidas_femenino = 0; $no_respondidas_femenino = 0;
      $respondidas_masculino = 0; $no_respondidas_masculino = 0;
      $otros_respondidas = 0; $otros_respondidas1 = 0; 
      
      
      $datos = array();
      if (count($codigos) > 0)
      {
         $cadena = '';
         $numcolumnas = 4;
         $i = 1; 

         switch ($id_consulta)
         {
            case 6:
            {
                foreach ($codigos as $p):
                $uni = substr($p['u'], 0, -6);

                switch ($uni)
                {
                    case "uvsf":
                    {
                        $uvsf++;
                        if (($p['consentimiento'] != '') && ($p['fecha_de_fin_de_diligenciada_la_encuesta'] != ''))
                        {
                            $respondidas_sf++;
                        }
                        else if (($p['consentimiento'] != '') && ($p['fecha_de_fin_de_diligenciada_la_encuesta'] == ''))
                        {
                            $no_respondidas_sf++;
                        }
                        else if (($p['consentimiento'] == '') && ($p['fecha_de_fin_de_diligenciada_la_encuesta'] == ''))
                        {
                            $sin_responder_sf++;
                        }
                        break;
                    }
                    case "uvme":
                    {
                        $uvme++;
                        if (($p['consentimiento'] != '') && ($p['fecha_de_fin_de_diligenciada_la_encuesta'] != ''))
                        {
                            $respondidas_me++;
                        }
                        else if (($p['consentimiento'] != '') && ($p['fecha_de_fin_de_diligenciada_la_encuesta'] == ''))
                        {
                            $no_respondidas_me++;
                        }
                        else if (($p['consentimiento'] == '') && ($p['fecha_de_fin_de_diligenciada_la_encuesta'] == ''))
                        {
                            $sin_responder_me++;
                        }
                        break;
                    }
                    case "uvpa":
                    {
                        $uvpa++;
                        if (($p['consentimiento'] != '') && ($p['fecha_de_fin_de_diligenciada_la_encuesta'] != ''))
                        {
                            $respondidas_pa++;
                        }
                        else if (($p['consentimiento'] != '') && ($p['fecha_de_fin_de_diligenciada_la_encuesta'] == ''))
                        {
                            $no_respondidas_pa++;
                        }
                        else if (($p['consentimiento'] == '') && ($p['fecha_de_fin_de_diligenciada_la_encuesta'] == ''))
                        {
                            $sin_responder_pa++;
                        }
                        break;
                    }
                    case "puj":
                    {
                        $puj++;
                        if (($p['consentimiento'] != '') && ($p['fecha_de_fin_de_diligenciada_la_encuesta'] != ''))
                        {
                            $respondidas_puj++;
                        }
                        else if (($p['consentimiento'] != '') && ($p['fecha_de_fin_de_diligenciada_la_encuesta'] == ''))
                        {
                            $no_respondidas_puj++;
                        }
                        else if (($p['consentimiento'] == '') && ($p['fecha_de_fin_de_diligenciada_la_encuesta'] == ''))
                        {
                            $sin_responder_puj++;
                        }
                        break;
                    }
                    case "usc":
                    {
                        $usc++;
                        if (($p['consentimiento'] != '') && ($p['fecha_de_fin_de_diligenciada_la_encuesta'] != ''))
                        {
                            $respondidas_usc++;
                        }
                        else if (($p['consentimiento'] != '') && ($p['fecha_de_fin_de_diligenciada_la_encuesta'] == ''))
                        {
                            $no_respondidas_usc++;
                        }
                        else if (($p['consentimiento'] == '') && ($p['fecha_de_fin_de_diligenciada_la_encuesta'] == ''))
                        {
                            $sin_responder_usc++;
                        }
                        break;
                    }
                }
                $i++; 
                endforeach; 
                $_SESSION['encabezado_tabla'] = '</div><table border="0" align="center"><thead><tr><th colspan="6">RESUMEN DE CONTRASEÑAS</th></tr></thead>';                
                $_SESSION['cuerpo_tabla'] = '<tbody><tr><td>id</td><td>Nombre</td><td>Diligenciados</td><td>No diligenciados</td><td>Sin Diligenciar</td><td>Total</td></tr>';
                
                $uvsf_datos = array("u"=>"uvsf000000","uni"=>"Universidad del Valle sede san fernando","cant"=>$uvsf ,"respondidas"=>$respondidas_sf ,"no_respondidas"=>$no_respondidas_sf, "sin_responder"=>$sin_responder_sf);
                $uvme_datos = array("u"=>"uvme000000","uni"=>"Universidad del Valle sede Melendez","cant"=>$uvme,"respondidas"=>$respondidas_me ,"no_respondidas"=>$no_respondidas_me, "sin_responder"=>$sin_responder_me);
                $uvpa_datos = array("u"=>"uvpa000000","uni"=>"Universidad del Valle sede Palmira","cant"=>$uvpa,"respondidas"=>$respondidas_pa ,"no_respondidas"=>$no_respondidas_pa, "sin_responder"=>$sin_responder_pa);
                $puj_datos = array("u"=>"puj000000","uni"=>"Pontificia Universidad Javeriana","cant"=>$puj,"respondidas"=>$respondidas_puj ,"no_respondidas"=>$no_respondidas_puj, "sin_responder"=>$sin_responder_puj);
                $usc_datos = array("u"=>"usc000000","uni"=>"Universidad Santiago de cali","cant"=>$usc,"respondidas"=>$respondidas_usc,"no_respondidas"=>$no_respondidas_usc, "sin_responder"=>$sin_responder_usc);
                $datos [] =$uvsf_datos;
                $datos [] =$uvme_datos;
                $datos [] =$uvpa_datos;
                $datos [] =$puj_datos;
                $datos [] =$usc_datos;
                $_SESSION['codigos'] = $datos;
                
                $cadena .=  "<center><table class='table table-condensed'><thead><tr><th colspan=\"$numcolumnas\">CONTRASEÑAS GENERADAS</th></tr><tr><td colspan=\"$numcolumnas\">se reportan ".count($codigos)." contraseñas de acceso</td></tr><thead><tbody><tr><td>Codigo</td><td>Universidad</td><td>Diligenciados</td><td>No diligenciados</td><td>Sin diligenciar</td><td>Total</td></tr>";         
                if($resto == 1){}  
                $cadena .= "<tr><td>uvsf</td><td>Universidad del valle Sede San fernando</td><td>".$respondidas_sf."</td><td>".$no_respondidas_sf."</td><td>".$sin_responder_sf."</td><td>".$uvsf."</td></tr>";
                $cadena .= "<tr><td>uvme</td><td>Universidad del valle Sede Melendez</td><td>".$respondidas_me."</td><td>".$no_respondidas_me."</td><td>".$sin_responder_me."</td><td>".$uvme."</td></tr>";
                $cadena .= "<tr><td>uvme</td><td>Universidad del valle Sede Palmira</td><td>".$respondidas_pa."</td><td>".$no_respondidas_pa."</td><td>".$sin_responder_pa."</td><td>".$uvpa."</td></tr>";
                $cadena .= "<tr><td>puj</td><td>Pontificia Universidad Javeriana</td><td>".$respondidas_puj."</td><td>".$no_respondidas_puj."</td><td>".$sin_responder_puj."</td><td>".$puj."</td></tr>";
                $cadena .= "<tr><td>usc</td><td>Universidad Santiago de Cali</td><td>".$respondidas_usc."</td><td>".$no_respondidas_usc."</td><td>".$sin_responder_usc."</td><td>".$usc."</td></tr>";
                if($resto == 0)
                {                
                    //$cadena .= "<tr>";
                   //$cadena .= "</tr>"; 
                }
                break;
            }
            case 7:
            {
                 $resultados = array();                
                $total = 0;
                //foreach ($codigos as $p):
                //$uni = substr($p['u'], 0, -6);

                switch ($id_universidad)
                {
                    case "uvsf":
                    {
                        $todas_las_facultades = $unaEncuesta->facultades($id_universidad);
                        foreach ($todas_las_facultades as $t):
                            $cantidad = 0;
                            $respondidas_sf = 0;
                            $no_respondidas_sf = 0;
                            $sin_responder_sf = 0;
                            $nombre = trim($this->sanear_string($t['nombre_facultad']));
                            foreach ($codigos as $p):
                                $fac = explode(",", $p['p']);                        
                                $valor = $this->sanear_string($fac[0]);
                                if ($nombre == $valor)
                                {                            
                                    $cantidad++;  
                                    if (($p['consentimiento'] != '') && ($p['fecha_de_fin_de_diligenciada_la_encuesta'] != ''))
                                        {
                                            $respondidas_sf++;
                                        }
                                        else if (($p['consentimiento'] != '') && ($p['fecha_de_fin_de_diligenciada_la_encuesta'] == ''))
                                        {
                                            $no_respondidas_sf++;
                                        }
                                        else if (($p['consentimiento'] == '') && ($p['fecha_de_fin_de_diligenciada_la_encuesta'] == ''))
                                        {
                                            $sin_responder_sf++;
                                        }
                                }
                            else{}
                        endforeach;
                        $resultados[] =array("tipo"=>"f1", "u"=>$id_universidad."000000","f"=>$nombre, "cant"=>$cantidad, "respondidas"=>$respondidas_sf, "no_respondidas"=>$no_respondidas_sf, "sin_responder"=>$sin_responder_sf);
                        $u = array();
                        endforeach;
                        break;
                    }
                    case "uvme":
                    {
                        $todas_las_facultades = $unaEncuesta->facultades($id_universidad);
                        foreach ($todas_las_facultades as $t):
                            $cantidad = 0;
                            $respondidas_me = 0;
                            $no_respondidas_me = 0;
                            $sin_responder_me = 0;
                            $nombre = trim($this->sanear_string($t['nombre_facultad']));
                            foreach ($codigos as $p):
                                $fac = explode(",", $p['p']);                        
                                $valor = $this->sanear_string($fac[0]);
                                if ($nombre == $valor)
                                {                            
                                    $cantidad++;  
                                    if (($p['consentimiento'] != '') && ($p['fecha_de_fin_de_diligenciada_la_encuesta'] != ''))
                                        {
                                            $respondidas_me++;
                                        }
                                        else if (($p['consentimiento'] != '') && ($p['fecha_de_fin_de_diligenciada_la_encuesta'] == ''))
                                        {
                                            $no_respondidas_me++;
                                        }
                                        else if (($p['consentimiento'] == '') && ($p['fecha_de_fin_de_diligenciada_la_encuesta'] == ''))
                                        {
                                            $sin_responder_me++;
                                        }
                                }
                            else{}
                        endforeach;
                        $resultados[] =array("tipo"=>"f1", "u"=>$id_universidad."000000", "f"=>$nombre, "cant"=>$cantidad, "respondidas"=>$respondidas_me, "no_respondidas"=>$no_respondidas_me, "sin_responder"=>$sin_responder_me);
                        $u = array();
                        endforeach;
                        break;
                    }
                    case "uvpa":
                    {
                        $todas_las_facultades = $unaEncuesta->facultades($id_universidad);
                        foreach ($todas_las_facultades as $t):
                            $cantidad = 0;
                            $respondidas_pa = 0;
                            $no_respondidas_pa = 0;
                            $sin_responder_pa = 0;
                            $nombre = trim($this->sanear_string($t['nombre_facultad']));
                            foreach ($codigos as $p):
                                $fac = explode(",", $p['p']);                        
                                $valor = $this->sanear_string($fac[0]);
                                if ($nombre == $valor)
                                {                            
                                    $cantidad++;  
                                    if (($p['consentimiento'] != '') && ($p['fecha_de_fin_de_diligenciada_la_encuesta'] != ''))
                                        {
                                            $respondidas_pa++;
                                        }
                                        else if (($p['consentimiento'] != '') && ($p['fecha_de_fin_de_diligenciada_la_encuesta'] == ''))
                                        {
                                            $no_respondidas_pa++;
                                        }
                                        else if (($p['consentimiento'] == '') && ($p['fecha_de_fin_de_diligenciada_la_encuesta'] == ''))
                                        {
                                            $sin_responder_pa++;
                                        }
                                }
                            else{}
                        endforeach;
                        $resultados[] =array("tipo"=>"f1", "u"=>$id_universidad."000000", "f"=>$nombre, "cant"=>$cantidad, "respondidas"=>$respondidas_pa, "no_respondidas"=>$no_respondidas_pa, "sin_responder"=>$sin_responder_pa);
                        $u = array();
                        endforeach;
                        break;
                    }
                    case "puj":
                    {
                        $todas_las_facultades = $unaEncuesta->facultades($id_universidad);
                        foreach ($todas_las_facultades as $t):
                            $cantidad = 0;
                            $respondidas_puj = 0;
                            $no_respondidas_puj = 0;
                            $sin_responder_puj = 0;
                            $nombre = trim($this->sanear_string($t['nombre_facultad']));
                            foreach ($codigos as $p):
                                $fac = explode(",", $p['p']);                        
                                $valor = $this->sanear_string($fac[0]);
                                if ($nombre == $valor)
                                {                            
                                    $cantidad++;  
                                    if (($p['consentimiento'] != '') && ($p['fecha_de_fin_de_diligenciada_la_encuesta'] != ''))
                                        {
                                            $respondidas_puj++;
                                        }
                                        else if (($p['consentimiento'] != '') && ($p['fecha_de_fin_de_diligenciada_la_encuesta'] == ''))
                                        {
                                            $no_respondidas_puj++;
                                        }
                                        else if (($p['consentimiento'] == '') && ($p['fecha_de_fin_de_diligenciada_la_encuesta'] == ''))
                                        {
                                            $sin_responder_puj++;
                                        }
                                }
                            else{}
                        endforeach;
                        $resultados[] =array("tipo"=>"f1", "u"=>$id_universidad."000000", "f"=>$nombre, "cant"=>$cantidad, "respondidas"=>$respondidas_puj, "no_respondidas"=>$no_respondidas_puj, "sin_responder"=>$sin_responder_puj);
                        $u = array();
                        endforeach;
                        break;
                    }
                    case "usc":
                    {
                        $todas_las_facultades = $unaEncuesta->facultades($id_universidad);
                        foreach ($todas_las_facultades as $t):
                            $cantidad = 0;
                            $respondidas_usc = 0;
                            $no_respondidas_usc = 0;
                            $sin_responder_usc = 0;
                            $nombre = trim($this->sanear_string($t['nombre_facultad']));
                            foreach ($codigos as $p):
                                $fac = explode(",", $p['p']);                        
                                $valor = $this->sanear_string($fac[0]);
                                if ($nombre == $valor)
                                {                            
                                    $cantidad++;  
                                    if (($p['consentimiento'] != '') && ($p['fecha_de_fin_de_diligenciada_la_encuesta'] != ''))
                                        {
                                            $respondidas_usc++;
                                        }
                                        else if (($p['consentimiento'] != '') && ($p['fecha_de_fin_de_diligenciada_la_encuesta'] == ''))
                                        {
                                            $no_respondidas_usc++;
                                        }
                                        else if (($p['consentimiento'] == '') && ($p['fecha_de_fin_de_diligenciada_la_encuesta'] == ''))
                                        {
                                            $sin_responder_usc++;
                                        }
                                }
                            else{}
                        endforeach;
                        $resultados[] =array("tipo"=>"f1", "u"=>$id_universidad."000000","f"=>$nombre, "cant"=>$cantidad, "respondidas"=>$respondidas_usc, "no_respondidas"=>$no_respondidas_usc, "sin_responder"=>$sin_responder_usc);
                        $u = array();
                        endforeach;
                        break;
                    }
                };                
                $_SESSION['encabezado_tabla'] = '</div><table border="0" align="center"><thead><tr><th colspan="6">RESUMEN DE CONTRASEÑAS</th></tr></thead>';                
                $_SESSION['cuerpo_tabla'] = '<tbody><tr><td>id</td><td>Nombre</td><td>Diligenciados</td><td>No diligenciados</td><td>Sin Diligenciar</td><td>Total</td></tr>';                
                $_SESSION['codigos'] = $resultados;
                
                
                $cadena .=  "<center><table class='table table-condensed'><thead><tr><th colspan=\"$numcolumnas\">CONTRASEÑAS GENERADAS</th></tr><tr><td colspan=\"$numcolumnas\">se reportan ".count($codigos)." contraseñas de acceso</td></tr><thead><tbody><tr><td>Codigo</td><td>Universidad</td><td>Diligenciados</td><td>No diligenciados</td><td>Sin diligenciar</td><td>Total</td></tr>";         
                if($resto == 1){}
                foreach ($resultados as $r):
                    
                    $uni = substr($r['u'], 0, -6); 
                    switch ($uni)
                    {
                        case "uvsf":
                        {
                            $cadena .= "<tr><td>Universidad del valle Sede San fernando</td><td>".$r['f']."</td><td>".$r['respondidas']."</td><td>".$r['no_respondidas']."</td><td>".$r['sin_responder']."</td><td>".$r['cant']."</td></tr>";        
                            break;
                        }
                        case "uvme":
                        {
                            $cadena .= "<tr><td>Universidad del valle Sede Melendez</td><td>".$r['f']."</td><td>".$r['respondidas']."</td><td>".$r['no_respondidas']."</td><td>".$r['sin_responder']."</td><td>".$r['cant']."</td></tr>";        
                            break;
                        }
                        case "uvpa":
                        {
                            $cadena .= "<tr><td>Universidad del valle Sede Palmira</td><td>".$r['f']."</td><td>".$r['respondidas']."</td><td>".$r['no_respondidas']."</td><td>".$r['sin_responder']."</td><td>".$r['cant']."</td></tr>";        
                            break;
                        }
                        case "puj":
                        {
                            $cadena .= "<tr><td>Pontificia Universidad Javeriana</td><td>".$r['f']."</td><td>".$r['respondidas']."</td><td>".$r['no_respondidas']."</td><td>".$r['sin_responder']."</td><td>".$r['cant']."</td></tr>";        
                            break;
                        }
                        case "usc":
                        {
                            $cadena .= "<tr><td>Universidad Santiago de Cali</td><td>".$r['f']."</td><td>".$r['respondidas']."</td><td>".$r['no_respondidas']."</td><td>".$r['sin_responder']."</td><td>".$r['cant']."</td></tr>";        
                            break;
                        }
                    }                    
                endforeach;                    
                if($resto == 0){}
//                $resultados = array();                
//                $total = 0;
//                
//                $todas_las_facultades = $unaEncuesta->facultades($id_universidad);
//                
//                foreach ($todas_las_facultades as $t):
//                    $cantidad = 0;
//                    $nombre = trim($this->sanear_string($t['nombre_facultad']));
//                                    
//                    foreach ($codigos as $p):
//                        $fac = explode(",", $p['p']);                        
//                        $valor = $this->sanear_string($fac[0]);
//                        if ($nombre == $valor)
//                        {                            
//                            $cantidad++;
//                        }                        
//                        else
//                        {}
//                    endforeach;                    
//                    $resultados[] =array("f"=>$nombre, "r"=>$cantidad);
//                    $u = array();
//                endforeach;              
                break;
            }
            case 8:
            {                   
                switch ($id_universidad)
                {
                    case "uvsf":
                    {
                        $todas_las_facultades = $unaEncuesta->facultades($id_universidad);
                        $todos_los_programas_academicos = $unaEncuesta->programaAcademico($id_facultad);
                        $cantidad = 0;
                        $cantidad1 = 0;
                        $respondidas_sf = 0;
                        $no_respondidas_sf = 0;
                        $sin_responder_sf = 0;  
                        
                        foreach ($todas_las_facultades as $t):                                                   
                                
                                $nombre = trim($this->sanear_string($t['nombre_facultad']));                          
                                
                                foreach ($todos_los_programas_academicos as $pro):
                                    $cantidad = 0;
                                    $cantidad1 = 0;
                                    $respondidas_sf = 0;
                                    $no_respondidas_sf = 0;
                                    $sin_responder_sf = 0;                                    
                                    $nombre_p = trim($this->sanear_string($pro['nombre_programa']));
                                
                                foreach ($codigos as $p):                                    
                                    $fac = explode(",", $p['p']);                        
                                    
                                    $valor = $this->sanear_string($fac[0]);                                    
                                    $valor_p = $this->sanear_string($fac[1]);
                                    
                                    if ($nombre == $valor)/*iguala la facultad*/
                                    {
                                        $cantidad++;                                        
                                        if ($nombre_p == $valor_p)/*iguala el programa*/
                                        {
                                                 $cantidad1++; 
                                                if (($p['consentimiento'] != '') && ($p['fecha_de_fin_de_diligenciada_la_encuesta'] != ''))
                                                {
                                                    $respondidas_sf++;
                                                }
                                                else if (($p['consentimiento'] != '') && ($p['fecha_de_fin_de_diligenciada_la_encuesta'] == ''))
                                                {
                                                    $no_respondidas_sf++;
                                                }
                                                else if (($p['consentimiento'] == '') && ($p['fecha_de_fin_de_diligenciada_la_encuesta'] == ''))
                                                {
                                                    $sin_responder_sf++;
                                               }  
                                            }
                                            else
                                            {}                                                                                    
                                           
                                    }/*fin si facultad*/
                                    else{}
                                    //echo $cantidad1."<br>";
                                endforeach;                            
                                $u[] = array("tipo"=>"p1", "u"=>$id_universidad."000000","f"=>$nombre, "p"=>$nombre_p, "cant"=>$cantidad1, "respondidas"=>$respondidas_sf, "no_respondidas"=>$no_respondidas_sf, "sin_responder"=>$sin_responder_sf);                                                    
                           endforeach;/*for each facultad*/                                                   
                        
                        endforeach;/*cierre universidad*/
                        break;
                    }
                    
                    case "uvme":
                    {
                        $todas_las_facultades = $unaEncuesta->facultades($id_universidad);
                        $todos_los_programas_academicos = $unaEncuesta->programaAcademico($id_facultad);
                        $cantidad = 0;
                        $cantidad1 = 0;
                        $respondidas_me = 0;
                        $no_respondidas_me = 0;
                        $sin_responder_me = 0;  
                        
                        foreach ($todas_las_facultades as $t):                                                   
                                
                                $nombre = trim($this->sanear_string($t['nombre_facultad']));                          
                                
                                foreach ($todos_los_programas_academicos as $pro):
                                    $cantidad = 0;
                                    $cantidad1 = 0;
                                    $respondidas_me = 0;
                                    $no_respondidas_me = 0;
                                    $sin_responder_me = 0;                                     
                                    $nombre_p = trim($this->sanear_string($pro['nombre_programa']));
                                
                                foreach ($codigos as $p):                                    
                                    $fac = explode(",", $p['p']);                        
                                    
                                    $valor = $this->sanear_string($fac[0]);                                    
                                    $valor_p = $this->sanear_string($fac[1]);
                                    
                                    if ($nombre == $valor)/*iguala la facultad*/
                                    {
                                        $cantidad++;                                        
                                        if ($nombre_p == $valor_p)/*iguala el programa*/
                                        {
                                                 $cantidad1++; 
                                                if (($p['consentimiento'] != '') && ($p['fecha_de_fin_de_diligenciada_la_encuesta'] != ''))
                                                {
                                                    $respondidas_me++;
                                                }
                                                else if (($p['consentimiento'] != '') && ($p['fecha_de_fin_de_diligenciada_la_encuesta'] == ''))
                                                {
                                                    $no_respondidas_me++;
                                                }
                                                else if (($p['consentimiento'] == '') && ($p['fecha_de_fin_de_diligenciada_la_encuesta'] == ''))
                                                {
                                                    $sin_responder_me++;
                                               }  
                                            }
                                            else
                                            {}                                                                                    
                                           
                                    }/*fin si facultad*/
                                    else{}
                                    //echo $cantidad1."<br>";
                                endforeach;                            
                                $u[] = array("tipo"=>"p1", "u"=>$id_universidad."000000","f"=>$nombre, "p"=>$nombre_p, "cant"=>$cantidad, "respondidas"=>$respondidas_me, "no_respondidas"=>$no_respondidas_me, "sin_responder"=>$sin_responder_me);                                                    
                           endforeach;/*for each facultad*/                                                   
                        
                        endforeach;/*cierre universidad*/
                        break;
                    }
                    case "uvpa":
                    {
                        $todas_las_facultades = $unaEncuesta->facultades($id_universidad);
                        $todos_los_programas_academicos = $unaEncuesta->programaAcademico($id_facultad);
                        $cantidad = 0;
                        $cantidad1 = 0;
                        $respondidas_pa = 0;
                        $no_respondidas_pa = 0;
                        $sin_responder_pa = 0;  
                        
                        foreach ($todas_las_facultades as $t):                                                   
                                
                                $nombre = trim($this->sanear_string($t['nombre_facultad']));                          
                                
                                foreach ($todos_los_programas_academicos as $pro):
                                    $cantidad = 0;
                                    $cantidad1 = 0;
                                    $respondidas_pa = 0;
                                    $no_respondidas_pa = 0;
                                    $sin_responder_pa = 0;                                     
                                    $nombre_p = trim($this->sanear_string($pro['nombre_programa']));
                                
                                foreach ($codigos as $p):                                    
                                    $fac = explode(",", $p['p']);                        
                                    
                                    $valor = $this->sanear_string($fac[0]);                                    
                                    $valor_p = $this->sanear_string($fac[1]);
                                    
                                    if ($nombre == $valor)/*iguala la facultad*/
                                    {
                                        $cantidad++;                                        
                                        if ($nombre_p == $valor_p)/*iguala el programa*/
                                        {
                                                 $cantidad1++; 
                                                if (($p['consentimiento'] != '') && ($p['fecha_de_fin_de_diligenciada_la_encuesta'] != ''))
                                                {
                                                    $respondidas_pa++;
                                                }
                                                else if (($p['consentimiento'] != '') && ($p['fecha_de_fin_de_diligenciada_la_encuesta'] == ''))
                                                {
                                                    $no_respondidas_pa++;
                                                }
                                                else if (($p['consentimiento'] == '') && ($p['fecha_de_fin_de_diligenciada_la_encuesta'] == ''))
                                                {
                                                    $sin_responder_pa++;
                                               }  
                                            }
                                            else
                                            {}                                                                                    
                                           
                                    }/*fin si facultad*/
                                    else{}
                                    //echo $cantidad1."<br>";
                                endforeach;                            
                                $u[] = array("tipo"=>"p1", "u"=>$id_universidad."000000","f"=>$nombre, "p"=>$nombre_p, "cant"=>$cantidad, "respondidas"=>$respondidas_pa, "no_respondidas"=>$no_respondidas_pa, "sin_responder"=>$sin_responder_pa);                                                    
                           endforeach;/*for each facultad*/                                                   
                        
                        endforeach;/*cierre universidad*/
                        break;
                    }
                     case "puj":
                    {
                        $todas_las_facultades = $unaEncuesta->facultades($id_universidad);
                        $todos_los_programas_academicos = $unaEncuesta->programaAcademico($id_facultad);
                        $cantidad = 0;
                        $cantidad1 = 0;
                        $respondidas_puj = 0;
                        $no_respondidas_puj = 0;
                        $sin_responder_puj = 0;  
                        
                        foreach ($todas_las_facultades as $t):                                                   
                                
                                $nombre = trim($this->sanear_string($t['nombre_facultad']));                          
                                
                                foreach ($todos_los_programas_academicos as $pro):
                                    $cantidad = 0;
                                    $cantidad1 = 0;
                                    $respondidas_puj = 0;
                                    $no_respondidas_puj = 0;
                                    $sin_responder_puj = 0;                                     
                                    $nombre_p = trim($this->sanear_string($pro['nombre_programa']));
                                
                                foreach ($codigos as $p):                                    
                                    $fac = explode(",", $p['p']);                        
                                    
                                    $valor = $this->sanear_string($fac[0]);                                    
                                    $valor_p = $this->sanear_string($fac[1]);
                                    
                                    if ($nombre == $valor)/*iguala la facultad*/
                                    {
                                        $cantidad++;                                        
                                        if ($nombre_p == $valor_p)/*iguala el programa*/
                                        {
                                                 $cantidad1++; 
                                                if (($p['consentimiento'] != '') && ($p['fecha_de_fin_de_diligenciada_la_encuesta'] != ''))
                                                {
                                                    $respondidas_puj++;
                                                }
                                                else if (($p['consentimiento'] != '') && ($p['fecha_de_fin_de_diligenciada_la_encuesta'] == ''))
                                                {
                                                    $no_respondidas_puj++;
                                                }
                                                else if (($p['consentimiento'] == '') && ($p['fecha_de_fin_de_diligenciada_la_encuesta'] == ''))
                                                {
                                                    $sin_responder_puj++;
                                               }  
                                            }
                                            else
                                            {}                                                                                    
                                           
                                    }/*fin si facultad*/
                                    else{}
                                    //echo $cantidad1."<br>";
                                endforeach;                            
                                $u[] = array("tipo"=>"p1", "u"=>$id_universidad."000000","f"=>$nombre, "p"=>$nombre_p, "cant"=>$cantidad1, "respondidas"=>$respondidas_puj, "no_respondidas"=>$no_respondidas_puj, "sin_responder"=>$sin_responder_puj);                                                    
                           endforeach;/*for each facultad*/                                                   
                        
                        endforeach;/*cierre universidad*/
                        break;
                    }
                    
                     case "usc":
                    {
                        $todas_las_facultades = $unaEncuesta->facultades($id_universidad);
                        $todos_los_programas_academicos = $unaEncuesta->programaAcademico($id_facultad);
                        $cantidad = 0;
                        $cantidad1 = 0;
                        $respondidas_usc = 0;
                        $no_respondidas_usc = 0;
                        $sin_responder_usc = 0;  
                        
                        foreach ($todas_las_facultades as $t):                                                   
                                
                                $nombre = trim($this->sanear_string($t['nombre_facultad']));                          
                                
                                foreach ($todos_los_programas_academicos as $pro):
                                    $cantidad = 0;
                                    $cantidad1 = 0;
                                    $respondidas_usc = 0;
                                    $no_respondidas_usc = 0;
                                    $sin_responder_usc = 0;                                     
                                    $nombre_p = trim($this->sanear_string($pro['nombre_programa']));
                                
                                foreach ($codigos as $p):                                    
                                    $fac = explode(",", $p['p']);                        
                                    
                                    $valor = $this->sanear_string($fac[0]);                                    
                                    $valor_p = $this->sanear_string($fac[1]);
                                    
                                    if ($nombre == $valor)/*iguala la facultad*/
                                    {
                                        $cantidad++;                                        
                                        if ($nombre_p == $valor_p)/*iguala el programa*/
                                        {
                                                 $cantidad1++; 
                                                if (($p['consentimiento'] != '') && ($p['fecha_de_fin_de_diligenciada_la_encuesta'] != ''))
                                                {
                                                    $respondidas_usc++;
                                                }
                                                else if (($p['consentimiento'] != '') && ($p['fecha_de_fin_de_diligenciada_la_encuesta'] == ''))
                                                {
                                                    $no_respondidas_usc++;
                                                }
                                                else if (($p['consentimiento'] == '') && ($p['fecha_de_fin_de_diligenciada_la_encuesta'] == ''))
                                                {
                                                    $sin_responder_usc++;
                                               }  
                                            }
                                            else
                                            {}                                                                                    
                                           
                                    }/*fin si facultad*/
                                    else{}
                                    //echo $cantidad1."<br>";
                                endforeach;                            
                                $u[] = array("tipo"=>"p1", "u"=>$id_universidad."000000","f"=>$nombre, "p"=>$nombre_p, "cant"=>$cantidad1, "respondidas"=>$respondidas_usc, "no_respondidas"=>$no_respondidas_usc, "sin_responder"=>$sin_responder_usc);                                                    
                           endforeach;/*for each facultad*/
                        endforeach;/*cierre universidad*/
                        break;
                    }
                };              
                $_SESSION['encabezado_tabla'] = '</div><table border="0" align="center"><thead><tr><th colspan="6">RESUMEN DE CONTRASEÑAS</th></tr></thead>';                
                $_SESSION['cuerpo_tabla'] = '<tbody><tr><td>id</td><td>Nombre</td><td>Diligenciados</td><td>No diligenciados</td><td>Sin Diligenciar</td><td>Total</td></tr>';                
                
                $val = array();
                foreach ($u as $r):
                    
                    if ( ((int) $r['cant'] ) > 0)
                    {
                        $val[] = array("tipo"=>"p1", "u"=>$id_universidad."000000","f"=>$r['f'], "p"=>$r['p'], "cant"=>$r['cant'], "respondidas"=>$r['respondidas'], "no_respondidas"=>$r['no_respondidas'], "sin_responder"=>$r['sin_responder']);
                    }
                endforeach;
                $_SESSION['codigos'] = $val;
                
                $cadena .=  "<center><table class='table table-condensed'><thead><tr><th colspan=\"$numcolumnas\">CONTRASEÑAS GENERADAS</th></tr><tr><td colspan=\"$numcolumnas\">se reportan ".count($codigos)." contraseñas de acceso</td></tr><thead><tbody><tr><td>Codigo</td><td>Universidad</td><td>Facultad</td><td>Programa</td><td>Diligenciados</td><td>No diligenciados</td><td>Sin diligenciar</td><td>Total</td></tr>";         
                if($resto == 1){}
                foreach ($u as $r):
                    
                    if ( ((int) $r['cant'] ) > 0)
                    {
                        $uni = substr($r['u'], 0, -6); 
                        switch ($uni)
                        {
                            case "uvsf":
                            {
                                $cadena .= "<tr><td>Universidad del valle Sede San fernando</td><td>".$r['f']."</td><td>".$r['p']."</td><td>".$r['respondidas']."</td><td>".$r['no_respondidas']."</td><td>".$r['sin_responder']."</td><td>".$r['cant']."</td></tr>";        
                                break;
                            }
                            case "uvme":
                            {
                                $cadena .= "<tr><td>Universidad del valle Sede Melendez</td><td>".$r['f']."</td><td>".$r['p']."</td><td>".$r['respondidas']."</td><td>".$r['no_respondidas']."</td><td>".$r['sin_responder']."</td><td>".$r['cant']."</td></tr>";        
                                break;
                            }
                            case "uvpa":
                            {
                                $cadena .= "<tr><td>Universidad del valle Sede Palmira</td><td>".$r['f']."</td><td>".$r['p']."</td><td>".$r['respondidas']."</td><td>".$r['no_respondidas']."</td><td>".$r['sin_responder']."</td><td>".$r['cant']."</td></tr>";        
                                break;
                            }
                            case "puj":
                            {
                                $cadena .= "<tr><td>Pontificia Universidad Javeriana</td><td>".$r['f']."</td><td>".$r['p']."</td><td>".$r['respondidas']."</td><td>".$r['no_respondidas']."</td><td>".$r['sin_responder']."</td><td>".$r['cant']."</td></tr>";        
                                break;
                            }
                            case "usc":
                            {
                                $cadena .= "<tr><td>Universidad Santiago de Cali</td><td>".$r['f']."</td><td>".$r['p']."</td><td>".$r['respondidas']."</td><td>".$r['no_respondidas']."</td><td>".$r['sin_responder']."</td><td>".$r['cant']."</td></tr>";        
                                break;
                            }
                        } /*fin case*/        
                    }/*fin si*/
                               
                endforeach;                    
                if($resto == 0){}
                break;
            }
            case 9:
            {
				/**nada*/
             $cadena .=  "<center><table class='table table-condensed'><thead><tr><th colspan='4'>CONTRASEÑAS GENERADAS</th></tr><tr><td colspan='4'>se reportan ".count($codigos)." contraseñas de acceso</td></tr><thead><tbody><tr><td>Pin</td><td>Consentimiento</td><td>Fecha inicio</td><td>Fecha fin</td></tr>";            
             //print_r($codigos);
             foreach ($codigos as $p):
                $cadena .= "<tr>";
                $resto = ($i % $numcolumnas);             
         
                if($resto == 1){} 
                $cadena .= "<td>".$p['pin']."</td><td>".$p['consentimiento']."</td><td>".$p['fecha_de_inicio_de_diligenciada_la_encuesta']."</td><td>".$p['fecha_de_fin_de_diligenciada_la_encuesta']."</td>";
                if($resto == 0)
                {                
                   $cadena .= "</tr>"; 
                }

                $i++; 
                endforeach;
             break;
            }            
            case 10:
            {
                switch ($id_universidad)
                {
                    case "uvsf":
                    {
                        foreach ($codigos as $p):                             
                        //$uvsf++;
                        if (($p['consentimiento'] != '') && ($p['fecha_de_fin_de_diligenciada_la_encuesta'] != '') && ($p['pregunta1'] == 'Femenino'))
                        {
                            $respondidas_femenino++;
                        }
                        else if (($p['consentimiento'] != '') && ($p['fecha_de_fin_de_diligenciada_la_encuesta'] == '') && ($p['pregunta1'] == 'Femenino'))
                        {
                            $no_respondidas_femenino++;
                        }                          
                        else if (($p['consentimiento'] != '') && ($p['fecha_de_fin_de_diligenciada_la_encuesta'] != '') && ($p['pregunta1'] == 'Masculino'))
                        {
                            $respondidas_masculino++;
                        }
                        else if (($p['consentimiento'] != '') && ($p['fecha_de_fin_de_diligenciada_la_encuesta'] == '') && ($p['pregunta1'] == 'Masculino'))
                        {
                            $no_respondidas_masculino++;
                        }
                        else /*if (($p['pregunta1'] == 'No respondio') || ($p['pregunta1'] == ''))*/
                        {
                            if (($p['consentimiento'] != '') && ($p['fecha_de_fin_de_diligenciada_la_encuesta'] != ''))
                            {
                                $otros_respondidas++;
                            }
                            else if (($p['consentimiento'] != '') && ($p['fecha_de_fin_de_diligenciada_la_encuesta'] == ''))
                            {
                                $otros_respondidas1++;
                            }
                        } 
                        endforeach; 
                        $datos_sf[]= array("u"=>"uvsf000000","tipo"=>"genero0","g"=>"Femenino","respondidas_f"=>$respondidas_femenino, "no_respondidas_f"=>$no_respondidas_femenino, "cant"=>($respondidas_femenino + $no_respondidas_femenino));
                        $datos_sf[] = array("u"=>"uvsf000000","tipo"=>"genero1","g"=>"Masculino","respondidas_m"=>$respondidas_masculino, "no_respondidas_m"=>$no_respondidas_masculino, "cant"=>($respondidas_masculino + $no_respondidas_masculino));
                        $datos_sf[] = array("u"=>"uvsf000000","tipo"=>"genero2","g"=>"Otros","otros"=>($otros_respondidas + $otros_respondidas1));
                        break;
                    }
                    case "uvme":
                    {                        
                        foreach ($codigos as $p):
                        if($p['pregunta1'] == 'Femenino')
                        {   
                            //$uvme++;
                            if (($p['consentimiento'] != '') && ($p['fecha_de_fin_de_diligenciada_la_encuesta'] != ''))
                            {
                                $respondidas_femenino++;
                            }
                            else if (($p['consentimiento'] != '') && ($p['fecha_de_fin_de_diligenciada_la_encuesta'] == ''))
                            {
                                $no_respondidas_femenino++;
                            }    
                        }                                                  
                        else if ($p['pregunta1'] == 'Masculino')
                        {
                            if (($p['consentimiento'] != '') && ($p['fecha_de_fin_de_diligenciada_la_encuesta'] != ''))
                            {
                                $respondidas_masculino++;
                            }
                            else if (($p['consentimiento'] != '') && ($p['fecha_de_fin_de_diligenciada_la_encuesta'] == ''))
                            {
                                $no_respondidas_masculino++;
                            }
                        }
                        else /*if (($p['pregunta1'] == 'No respondio') || ($p['pregunta1'] == ''))*/
                        {
                            if (($p['consentimiento'] != '') && ($p['fecha_de_fin_de_diligenciada_la_encuesta'] != ''))
                            {
                                $otros_respondidas++;
                            }
                            else if (($p['consentimiento'] != '') && ($p['fecha_de_fin_de_diligenciada_la_encuesta'] == ''))
                            {
                                $otros_respondidas1++;
                            }
                        }
                        endforeach;
                        
                        $datos_me[] = array("u"=>"uvme000000","tipo"=>"genero0","g"=>"Femenino","respondidas_f"=>$respondidas_femenino, "no_respondidas_f"=>$no_respondidas_femenino,"otros"=>($otros_respondidas + $otros_respondidas1), 'cant'=>($respondidas_femenino + $no_respondidas_femenino));
                        $datos_me[] = array("u"=>"uvme000000","tipo"=>"genero1","g"=>"Masculino", "respondidas_m"=>$respondidas_masculino, "no_respondidas_m"=>$no_respondidas_masculino, 'cant'=>($respondidas_masculino + $no_respondidas_masculino));
                        $datos_me[] = array("u"=>"uvme000000","tipo"=>"genero2","g"=>"Otros","otros"=>($otros_respondidas + $otros_respondidas1));
                        break;
                    }
                    case "uvpa":
                    {                        
                        foreach ($codigos as $p):
                        if($p['pregunta1'] == 'Femenino')
                        {   
                            //$uvpa++;
                            if (($p['consentimiento'] != '') && ($p['fecha_de_fin_de_diligenciada_la_encuesta'] != ''))
                            {
                                $respondidas_femenino++;
                            }
                            else if (($p['consentimiento'] != '') && ($p['fecha_de_fin_de_diligenciada_la_encuesta'] == ''))
                            {
                                $no_respondidas_femenino++;
                            }    
                        }                                                  
                        else if ($p['pregunta1'] == 'Masculino')
                        {
                            if (($p['consentimiento'] != '') && ($p['fecha_de_fin_de_diligenciada_la_encuesta'] != ''))
                            {
                                $respondidas_masculino++;
                            }
                            else if (($p['consentimiento'] != '') && ($p['fecha_de_fin_de_diligenciada_la_encuesta'] == ''))
                            {
                                $no_respondidas_masculino++;
                            }
                        }
                        else /*if (($p['pregunta1'] == 'No respondio') || ($p['pregunta1'] == ''))*/
                        {
                            if (($p['consentimiento'] != '') && ($p['fecha_de_fin_de_diligenciada_la_encuesta'] != ''))
                            {
                                $otros_respondidas++;
                            }
                            else if (($p['consentimiento'] != '') && ($p['fecha_de_fin_de_diligenciada_la_encuesta'] == ''))
                            {
                                $otros_respondidas1++;
                            }
                        }
                        endforeach;
                        
                        $datos_pa[] = array("u"=>"uvpa000000","tipo"=>"genero0","g"=>"Femenino","respondidas_f"=>$respondidas_femenino, "no_respondidas_f"=>$no_respondidas_femenino,"otros"=>($otros_respondidas + $otros_respondidas1), 'cant'=>($respondidas_femenino + $no_respondidas_femenino));
                        $datos_pa[] = array("u"=>"uvpa000000","tipo"=>"genero1","g"=>"Masculino", "respondidas_m"=>$respondidas_masculino, "no_respondidas_m"=>$no_respondidas_masculino, 'cant'=>($respondidas_masculino + $no_respondidas_masculino));
                        $datos_pa[] = array("u"=>"uvpa000000","tipo"=>"genero2","g"=>"Otros","otros"=>($otros_respondidas + $otros_respondidas1));
                        break;
                    }
                    case "puj":
                    {
                        foreach ($codigos as $p):
                        if ($p['pregunta1'] == 'Femenino')
                        {
                            $puj++;
                            if (($p['consentimiento'] != '') && ($p['fecha_de_fin_de_diligenciada_la_encuesta'] != '') && ($p['pregunta1'] == 'Femenino'))
                            {
                                $respondidas_femenino++;
                            }
                            else if (($p['consentimiento'] != '') && ($p['fecha_de_fin_de_diligenciada_la_encuesta'] == '') && ($p['pregunta1'] == 'Femenino'))
                            {
                                $no_respondidas_femenino++;
                            }    
                        }
                        else if ($p['pregunta1'] == 'Masculino')
                        {
                            if (($p['consentimiento'] != '') && ($p['fecha_de_fin_de_diligenciada_la_encuesta'] != ''))
                            {
                                $respondidas_masculino++;
                            }
                            else if (($p['consentimiento'] != '') && ($p['fecha_de_fin_de_diligenciada_la_encuesta'] == '') && ($p['pregunta1'] == 'Masculino'))
                            {
                                $no_respondidas_masculino++;
                            }     
                        }
                        else /*if (($p['pregunta1'] == 'No respondio') || ($p['pregunta1'] == ''))*/
                        {
                            if (($p['consentimiento'] != '') && ($p['fecha_de_fin_de_diligenciada_la_encuesta'] != ''))
                            {
                                $otros_respondidas++;
                            }
                            else if (($p['consentimiento'] != '') && ($p['fecha_de_fin_de_diligenciada_la_encuesta'] == ''))
                            {
                                $otros_respondidas1++;
                            }
                        }
                        endforeach;
                        $datos_puj[] = array("u"=>"puj000000","tipo"=>"genero0","g"=>"Femenino","respondidas_f"=>$respondidas_femenino, "no_respondidas_f"=>$no_respondidas_femenino,"cant"=>($respondidas_femenino +$no_respondidas_femenino));
                        $datos_puj[] = array("u"=>"puj000000","tipo"=>"genero1","g"=>"Masculino","respondidas_m"=>$respondidas_masculino, "no_respondidas_m"=>$no_respondidas_masculino,"cant"=>($respondidas_masculino +$no_respondidas_masculino));
                        $datos_puj[] = array("u"=>"puj000000","tipo"=>"genero2","g"=>"Otros","otros"=>($otros_respondidas + $otros_respondidas1));
                        break;
                    }
                    case "usc":
                    {
                        foreach ($codigos as $p):
                        if ($p['pregunta1'] == 'Femenino')
                        {
                            $usc++;
                            if (($p['consentimiento'] != '') && ($p['fecha_de_fin_de_diligenciada_la_encuesta'] != '') && ($p['pregunta1'] == 'Femenino'))
                            {
                                $respondidas_femenino++;
                            }
                            else if (($p['consentimiento'] != '') && ($p['fecha_de_fin_de_diligenciada_la_encuesta'] == '') && ($p['pregunta1'] == 'Femenino'))
                            {
                                $no_respondidas_femenino++;
                            }                            
                        }
                        else if ($p['pregunta1'] == 'Masculino')
                        {
                           if (($p['consentimiento'] != '') && ($p['fecha_de_fin_de_diligenciada_la_encuesta'] != '') && ($p['pregunta1'] == 'Masculino'))
                           {
                               $respondidas_masculino++;
                           }
                           else if (($p['consentimiento'] != '') && ($p['fecha_de_fin_de_diligenciada_la_encuesta'] == '') && ($p['pregunta1'] == 'Masculino'))
                           {
                               $no_respondidas_masculino++;
                           }                           
                        }
                        else /*if (($p['pregunta1'] == 'No respondio') || ($p['pregunta1'] == ''))*/
                        {
                            if (($p['consentimiento'] != '') && ($p['fecha_de_fin_de_diligenciada_la_encuesta'] != ''))
                            {
                                $otros_respondidas++;
                            }
                            else if (($p['consentimiento'] != '') && ($p['fecha_de_fin_de_diligenciada_la_encuesta'] == ''))
                            {
                                $otros_respondidas1++;
                            }
                        }
                        endforeach;
                        $datos_usc[] = array("u"=>"usc000000","tipo"=>"genero0","g"=>"Femenino","respondidas_f"=>$respondidas_femenino, "no_respondidas_f"=>$no_respondidas_femenino, "cant"=> ($respondidas_femenino +$no_respondidas_femenino));
                        $datos_usc[] = array("u"=>"usc000000","tipo"=>"genero1","g">"Masculino", "respondidas_m"=>$respondidas_masculino, "no_respondidas_m"=>$no_respondidas_masculino, "cant"=> ($respondidas_masculino +$no_respondidas_masculino));
                        $datos_usc[] = array("u"=>"usc000000","tipo"=>"genero2","g"=>"Otros","otros"=>($otros_respondidas + $otros_respondidas1));
                        break;
                    }
                }
                $i++; 
                
               foreach ($datos_me as $v):
                $total[] = $v;
               endforeach;
               foreach ($datos_sf as $v):
                $total[] = $v;
               endforeach;
               foreach ($datos_puj as $v):
                $total[] = $v;
               endforeach;
               foreach ($datos_usc as $v):
                $total[] = $v;
               endforeach;
                $_SESSION['encabezado_tabla'] = '</div><table border="0" align="center"><thead><tr><th colspan="6">RESUMEN DE CONTRASEÑAS</th></tr></thead>';                
                $_SESSION['cuerpo_tabla'] = '<tbody><tr><td>id</td><td>Nombre</td><td>Diligenciados</td><td>No diligenciados</td><td>Sin Diligenciar</td><td>Total</td></tr>';//                
                $_SESSION['codigos'] = $total;
                
                $cadena .=  "<center><table class='table table-condensed'><thead><tr><th colspan=\"$numcolumnas\">CONTRASEÑAS GENERADAS</th></tr><tr><td colspan=\"$numcolumnas\">se reportan ".count($codigos)." contraseñas de acceso</td></tr><thead><tbody><tr><td>Universidad</td><td>Genero</td><td>Diligenciados</td><td>No diligenciados</td><td>Total</td></tr>";         
                if($resto == 1){}  
            //print_r($datos_me);

            
                switch ($id_universidad)
                {
                    case 'uvme':
                    {
                       $cadena .= "<tr><td>Universidad del valle Sede Melendez</td><td>Femenino</td><td>".$datos_me[0]['respondidas_f']."</td><td>".$datos_me[0]['no_respondidas_f']."</td><td>".$datos_me[0]['cant']."</td></tr>";
                       $cadena .= "<tr><td>Universidad del valle Sede Melendez</td><td>Masculino</td><td>".$datos_me[1]['respondidas_m']."</td><td>".$datos_me[1]['no_respondidas_m']."</td><td>".$datos_me[1]['cant']."</td></tr>";
                       $cadena .= "<tr><td>Universidad del valle Sede Melendez</td><td>Otros</td><td></td><td></td><td>".$datos_me[2]['otros']."</td></tr>";
                       break;
                    }
                    case 'uvpa':
                    {
                       $cadena .= "<tr><td>Universidad del valle Sede Palmira</td><td>Femenino</td><td>".$datos_pa[0]['respondidas_f']."</td><td>".$datos_pa[0]['no_respondidas_f']."</td><td>".$datos_pa[0]['cant']."</td></tr>";
                       $cadena .= "<tr><td>Universidad del valle Sede Palmira</td><td>Masculino</td><td>".$datos_pa[1]['respondidas_m']."</td><td>".$datos_pa[1]['no_respondidas_m']."</td><td>".$datos_pa[1]['cant']."</td></tr>";
                       $cadena .= "<tr><td>Universidad del valle Sede Palmira</td><td>Otros</td><td></td><td></td><td>".$datos_pa[2]['otros']."</td></tr>";
                       break;
                    }
                    case 'uvsf':
                    {
                        $cadena .= "<tr><td>Universidad del valle Sede San fernando</td><td>Femenino</td><td>".$datos_sf[0]['respondidas_f']."</td><td>".$datos_sf[0]['no_respondidas_f']."</td><td>".$datos_sf[0]['cant']."</td></tr>";
                        $cadena .= "<tr><td>Universidad del valle Sede San fernando</td><td>Masculino</td><td>".$datos_sf[1]['respondidas_m']."</td><td>".$datos_sf[1]['no_respondidas_m']."</td><td>".$datos_sf[1]['cant']."</td></tr>";
                        $cadena .= "<tr><td>Universidad del valle Sede San fernando</td><td>Otros</td><td></td><td></td><td>".$datos_sf[2]['otros']."</td></tr>";
                       break;
                    }
                    case 'puj':
                    {
                        $cadena .= "<tr><td>Pontificia Universidad Javeriana</td><td>Femenino</td><td>".$datos_puj[0]['respondidas_f']."</td><td>".$datos_puj[0]['no_respondidas_f']."</td><td>".$datos_puj[0]['cant']."</td></tr>";
                        $cadena .= "<tr><td>Pontificia Universidad Javeriana</td><td>Masculino</td><td>".$datos_puj[1]['respondidas_m']."</td><td>".$datos_puj[1]['no_respondidas_m']."</td><td>".$datos_puj[1]['cant']."</td></tr>";
                        $cadena .= "<tr><td>Pontificia Universidad Javeriana</td><td>Otros</td><td></td><td></td><td>".$datos_puj[2]['otros']."</td></tr>";
                       break;
                    }
                    case 'usc':
                    {
                        $cadena .= "<tr><td>Universidad Santiago de Cali</td><td>Femenino</td><td>".$datos_usc[0]['respondidas_f']."</td><td>".$datos_usc[0]['no_respondidas_f']."</td><td>".$datos_usc[0]['cant']."</td></tr>";
                        $cadena .= "<tr><td>Universidad Santiago de Cali</td><td>Masculino</td><td>".$datos_usc[1]['respondidas_m']."</td><td>".$datos_usc[1]['no_respondidas_m']."</td><td>".$datos_usc[1]['cant']."</td></tr>";
                        $cadena .= "<tr><td>Universidad Santiago de Cali</td><td>Otros</td><td>Otros</td><td></td><td></td><td>".$datos_usc[2]['otros']."</td></tr>";
                       break;
                    }
                }                
                if($resto == 0){}
                break;
            }
            case 11:
            {
                    switch ($id_universidad)  
                    {                        
                        case 'uvsf':
                        {
                            $todas_las_facultades = $unaEncuesta->facultades($id_universidad);
                            $todos_los_programas_academicos = $unaEncuesta->programaAcademico($id_facultad);
                            $facultad ="";
                            foreach ($todas_las_facultades as $t):                                                   

                                    $nombre_facultad = trim($this->sanear_string($t['nombre_facultad']));  
                                   //foreach ($todos_los_programas_academicos as $pro):
                                    //$nombre_programa = trim($this->sanear_string($pro['nombre_programa']));
                                    $respondidas_femenino = 0;
                                    $no_respondidas_femenino = 0;
                                    $respondidas_masculino = 0;
                                    $no_respondidas_masculino= 0;
                                    $otros_respondidas = 0;
                                    $otros_respondidas1 = 0;
                                    
                                    foreach ($codigos as $p):                                    
                                        
                                        $facultad_programa = explode(",", $p['p']);
                                        $nombre_facultad_consulta = $this->sanear_string($facultad_programa[0]);                                    
                                        //$nombre_programa_consuta = $this->sanear_string($facultad_programa[1]);
                                        //echo $nombre_facultad."==".$nombre_facultad_consulta."<br>";
                                        if ($nombre_facultad == $nombre_facultad_consulta)/*iguala la facultad*/
                                        {                                            
//                                            if ($nombre_p == $valor_p)/*iguala el programa*/
//                                            {                                                    
                                                    if ($p['pregunta1'] == 'Femenino')
                                                    {
                                                        $uvme++;
                                                        if (($p['consentimiento'] != '') && ($p['fecha_de_fin_de_diligenciada_la_encuesta'] != '') && ($p['pregunta1'] == 'Femenino'))
                                                        {
                                                            $respondidas_femenino++;
                                                        }
                                                        else if (($p['consentimiento'] != '') && ($p['fecha_de_fin_de_diligenciada_la_encuesta'] == '') && ($p['pregunta1'] == 'Femenino'))
                                                        {
                                                            $no_respondidas_femenino++;
                                                        }    
                                                    }
                                                    else if ($p['pregunta1'] == 'Masculino')
                                                    {
                                                       if (($p['consentimiento'] != '') && ($p['fecha_de_fin_de_diligenciada_la_encuesta'] != '') && ($p['pregunta1'] == 'Masculino'))
                                                       {
                                                           $respondidas_masculino++;
                                                       }
                                                       else if (($p['consentimiento'] != '') && ($p['fecha_de_fin_de_diligenciada_la_encuesta'] == '') && ($p['pregunta1'] == 'Masculino'))
                                                       {
                                                           $no_respondidas_masculino++;
                                                       }                           
                                                    }
                                                    else /*if (($p['pregunta1'] == 'No respondio') || ($p['pregunta1'] == ''))*/
                                                    {
                                                        if (($p['consentimiento'] != '') && ($p['fecha_de_fin_de_diligenciada_la_encuesta'] != ''))
                                                        {
                                                            $otros_respondidas++;
                                                        }
                                                        else if (($p['consentimiento'] != '') && ($p['fecha_de_fin_de_diligenciada_la_encuesta'] == ''))
                                                        {
                                                            $otros_respondidas1++;
                                                        }
                                                    }
//                                                }
//                                                else
//                                                {}                                                                                    

                                        }/*fin si facultad*/
                                        else{}
                                        //echo $cantidad1."<br>";
                                    //endforeach;                            
                                    //$u[] = array("tipo"=>"p1", "u"=>$id_universidad."000000","f"=>$nombre, "p"=>$nombre_p, "cant"=>$cantidad1, "respondidas"=>$respondidas_sf, "no_respondidas"=>$no_respondidas_sf, "sin_responder"=>$sin_responder_sf);                                                                                        
                               endforeach;/*for each facultad*/
                               
                               $datos_me[] = array("u"=>"uvsf000000","tipo"=>"genero00","g"=>"Femenino","facultad"=>$nombre_facultad,"respondidas_f"=>$respondidas_femenino, "no_respondidas_f"=>$no_respondidas_femenino, "cant"=> ($respondidas_femenino +$no_respondidas_femenino));
                               $datos_me[] = array("u"=>"uvsf000000","tipo"=>"genero10","g"=>"Masculino","facultad"=>$nombre_facultad,"respondidas_m"=>$respondidas_masculino, "no_respondidas_m"=>$no_respondidas_masculino, "cant"=> ($respondidas_masculino +$no_respondidas_masculino));
                               $datos_me[] = array("u"=>"uvsf000000","tipo"=>"genero20","g"=>"Otros","facultad"=>$nombre_facultad,"otros"=>($otros_respondidas + $otros_respondidas1));
                            endforeach;/*cierre universidad*/
                            
                           break;
                        }
                        case 'uvme':
                        {
                            $todas_las_facultades = $unaEncuesta->facultades($id_universidad);
                            $todos_los_programas_academicos = $unaEncuesta->programaAcademico($id_facultad);
                            $facultad ="";
                            foreach ($todas_las_facultades as $t):                                                   

                                    $nombre_facultad = trim($this->sanear_string($t['nombre_facultad']));  
                                   //foreach ($todos_los_programas_academicos as $pro):
                                    //$nombre_programa = trim($this->sanear_string($pro['nombre_programa']));
                                    $respondidas_femenino = 0;
                                    $no_respondidas_femenino = 0;
                                    $respondidas_masculino = 0;
                                    $no_respondidas_masculino= 0;
                                    $otros_respondidas = 0;
                                    $otros_respondidas1 = 0;
                                    
                                    foreach ($codigos as $p):                                    
                                        
                                        $facultad_programa = explode(",", $p['p']);
                                        $nombre_facultad_consulta = $this->sanear_string($facultad_programa[0]);                                    
                                        //$nombre_programa_consuta = $this->sanear_string($facultad_programa[1]);
                                        //echo $nombre_facultad."==".$nombre_facultad_consulta."<br>";
                                        if ($nombre_facultad == $nombre_facultad_consulta)/*iguala la facultad*/
                                        {                                            
//                                            if ($nombre_p == $valor_p)/*iguala el programa*/
//                                            {                                                    
                                                    if ($p['pregunta1'] == 'Femenino')
                                                    {
                                                        $uvme++;
                                                        if (($p['consentimiento'] != '') && ($p['fecha_de_fin_de_diligenciada_la_encuesta'] != '') && ($p['pregunta1'] == 'Femenino'))
                                                        {
                                                            $respondidas_femenino++;
                                                        }
                                                        else if (($p['consentimiento'] != '') && ($p['fecha_de_fin_de_diligenciada_la_encuesta'] == '') && ($p['pregunta1'] == 'Femenino'))
                                                        {
                                                            $no_respondidas_femenino++;
                                                        }    
                                                    }
                                                    else if ($p['pregunta1'] == 'Masculino')
                                                    {
                                                       if (($p['consentimiento'] != '') && ($p['fecha_de_fin_de_diligenciada_la_encuesta'] != '') && ($p['pregunta1'] == 'Masculino'))
                                                       {
                                                           $respondidas_masculino++;
                                                       }
                                                       else if (($p['consentimiento'] != '') && ($p['fecha_de_fin_de_diligenciada_la_encuesta'] == '') && ($p['pregunta1'] == 'Masculino'))
                                                       {
                                                           $no_respondidas_masculino++;
                                                       }                           
                                                    }
                                                    else /*if (($p['pregunta1'] == 'No respondio') || ($p['pregunta1'] == ''))*/
                                                    {
                                                        if (($p['consentimiento'] != '') && ($p['fecha_de_fin_de_diligenciada_la_encuesta'] != ''))
                                                        {
                                                            $otros_respondidas++;
                                                        }
                                                        else if (($p['consentimiento'] != '') && ($p['fecha_de_fin_de_diligenciada_la_encuesta'] == ''))
                                                        {
                                                            $otros_respondidas1++;
                                                        }
                                                    }
//                                                }
//                                                else
//                                                {}                                                                                    

                                        }/*fin si facultad*/
                                        else{}
                                        //echo $cantidad1."<br>";
                                    //endforeach;                            
                                    //$u[] = array("tipo"=>"p1", "u"=>$id_universidad."000000","f"=>$nombre, "p"=>$nombre_p, "cant"=>$cantidad1, "respondidas"=>$respondidas_sf, "no_respondidas"=>$no_respondidas_sf, "sin_responder"=>$sin_responder_sf);                                                                                        
                               endforeach;/*for each facultad*/
                               
                               $datos_me[] = array("u"=>"uvme000000","tipo"=>"genero00","g"=>"Femenino","facultad"=>$nombre_facultad,"respondidas_f"=>$respondidas_femenino, "no_respondidas_f"=>$no_respondidas_femenino, "cant"=> ($respondidas_femenino +$no_respondidas_femenino));
                               $datos_me[] = array("u"=>"uvme000000","tipo"=>"genero10","g"=>"Masculino","facultad"=>$nombre_facultad,"respondidas_m"=>$respondidas_masculino, "no_respondidas_m"=>$no_respondidas_masculino, "cant"=> ($respondidas_masculino +$no_respondidas_masculino));
                               $datos_me[] = array("u"=>"uvme000000","tipo"=>"genero20","g"=>"Otros","facultad"=>$nombre_facultad,"otros"=>($otros_respondidas + $otros_respondidas1));
                            endforeach;/*cierre universidad*/
                            
                            break;
                        }
                        case 'uvpa':
                        {
                            $todas_las_facultades = $unaEncuesta->facultades($id_universidad);
                            $todos_los_programas_academicos = $unaEncuesta->programaAcademico($id_facultad);
                            $facultad ="";
                            foreach ($todas_las_facultades as $t):                                                   

                                    $nombre_facultad = trim($this->sanear_string($t['nombre_facultad']));  
                                   //foreach ($todos_los_programas_academicos as $pro):
                                    //$nombre_programa = trim($this->sanear_string($pro['nombre_programa']));
                                    $respondidas_femenino = 0;
                                    $no_respondidas_femenino = 0;
                                    $respondidas_masculino = 0;
                                    $no_respondidas_masculino= 0;
                                    $otros_respondidas = 0;
                                    $otros_respondidas1 = 0;
                                    
                                    foreach ($codigos as $p):                                    
                                        
                                        $facultad_programa = explode(",", $p['p']);
                                        $nombre_facultad_consulta = $this->sanear_string($facultad_programa[0]);                                    
                                        //$nombre_programa_consuta = $this->sanear_string($facultad_programa[1]);
                                        //echo $nombre_facultad."==".$nombre_facultad_consulta."<br>";
                                        if ($nombre_facultad == $nombre_facultad_consulta)/*iguala la facultad*/
                                        {                                            
//                                            if ($nombre_p == $valor_p)/*iguala el programa*/
//                                            {                                                    
                                                    if ($p['pregunta1'] == 'Femenino')
                                                    {
                                                        $uvme++;
                                                        if (($p['consentimiento'] != '') && ($p['fecha_de_fin_de_diligenciada_la_encuesta'] != '') && ($p['pregunta1'] == 'Femenino'))
                                                        {
                                                            $respondidas_femenino++;
                                                        }
                                                        else if (($p['consentimiento'] != '') && ($p['fecha_de_fin_de_diligenciada_la_encuesta'] == '') && ($p['pregunta1'] == 'Femenino'))
                                                        {
                                                            $no_respondidas_femenino++;
                                                        }    
                                                    }
                                                    else if ($p['pregunta1'] == 'Masculino')
                                                    {
                                                       if (($p['consentimiento'] != '') && ($p['fecha_de_fin_de_diligenciada_la_encuesta'] != '') && ($p['pregunta1'] == 'Masculino'))
                                                       {
                                                           $respondidas_masculino++;
                                                       }
                                                       else if (($p['consentimiento'] != '') && ($p['fecha_de_fin_de_diligenciada_la_encuesta'] == '') && ($p['pregunta1'] == 'Masculino'))
                                                       {
                                                           $no_respondidas_masculino++;
                                                       }                           
                                                    }
                                                    else /*if (($p['pregunta1'] == 'No respondio') || ($p['pregunta1'] == ''))*/
                                                    {
                                                        if (($p['consentimiento'] != '') && ($p['fecha_de_fin_de_diligenciada_la_encuesta'] != ''))
                                                        {
                                                            $otros_respondidas++;
                                                        }
                                                        else if (($p['consentimiento'] != '') && ($p['fecha_de_fin_de_diligenciada_la_encuesta'] == ''))
                                                        {
                                                            $otros_respondidas1++;
                                                        }
                                                    }
//                                                }
//                                                else
//                                                {}                                                                                    

                                        }/*fin si facultad*/
                                        else{}
                                        //echo $cantidad1."<br>";
                                    //endforeach;                            
                                    //$u[] = array("tipo"=>"p1", "u"=>$id_universidad."000000","f"=>$nombre, "p"=>$nombre_p, "cant"=>$cantidad1, "respondidas"=>$respondidas_sf, "no_respondidas"=>$no_respondidas_sf, "sin_responder"=>$sin_responder_sf);                                                                                        
                               endforeach;/*for each facultad*/
                               
                               $datos_pa[] = array("u"=>"uvpa000000","tipo"=>"genero00","g"=>"Femenino","facultad"=>$nombre_facultad,"respondidas_f"=>$respondidas_femenino, "no_respondidas_f"=>$no_respondidas_femenino, "cant"=> ($respondidas_femenino +$no_respondidas_femenino));
                               $datos_pa[] = array("u"=>"uvpa000000","tipo"=>"genero10","g"=>"Masculino","facultad"=>$nombre_facultad,"respondidas_m"=>$respondidas_masculino, "no_respondidas_m"=>$no_respondidas_masculino, "cant"=> ($respondidas_masculino +$no_respondidas_masculino));
                               $datos_pa[] = array("u"=>"uvpa000000","tipo"=>"genero20","g"=>"Otros","facultad"=>$nombre_facultad,"otros"=>($otros_respondidas + $otros_respondidas1));
                            endforeach;/*cierre universidad*/
                            
                            break;
                        }
                        case 'puj':
                        {
                                                        $todas_las_facultades = $unaEncuesta->facultades($id_universidad);
                            $todos_los_programas_academicos = $unaEncuesta->programaAcademico($id_facultad);
                            $facultad ="";
                            foreach ($todas_las_facultades as $t):                                                   

                                    $nombre_facultad = trim($this->sanear_string($t['nombre_facultad']));  
                                   //foreach ($todos_los_programas_academicos as $pro):
                                    //$nombre_programa = trim($this->sanear_string($pro['nombre_programa']));
                                    $respondidas_femenino = 0;
                                    $no_respondidas_femenino = 0;
                                    $respondidas_masculino = 0;
                                    $no_respondidas_masculino= 0;
                                    $otros_respondidas = 0;
                                    $otros_respondidas1 = 0;
                                    
                                    foreach ($codigos as $p):                                    
                                        
                                        $facultad_programa = explode(",", $p['p']);
                                        $nombre_facultad_consulta = $this->sanear_string($facultad_programa[0]);                                    
                                        //$nombre_programa_consuta = $this->sanear_string($facultad_programa[1]);
                                        //echo $nombre_facultad."==".$nombre_facultad_consulta."<br>";
                                        if ($nombre_facultad == $nombre_facultad_consulta)/*iguala la facultad*/
                                        {                                            
//                                            if ($nombre_p == $valor_p)/*iguala el programa*/
//                                            {                                                    
                                                    if ($p['pregunta1'] == 'Femenino')
                                                    {
                                                        $uvme++;
                                                        if (($p['consentimiento'] != '') && ($p['fecha_de_fin_de_diligenciada_la_encuesta'] != '') && ($p['pregunta1'] == 'Femenino'))
                                                        {
                                                            $respondidas_femenino++;
                                                        }
                                                        else if (($p['consentimiento'] != '') && ($p['fecha_de_fin_de_diligenciada_la_encuesta'] == '') && ($p['pregunta1'] == 'Femenino'))
                                                        {
                                                            $no_respondidas_femenino++;
                                                        }    
                                                    }
                                                    else if ($p['pregunta1'] == 'Masculino')
                                                    {
                                                       if (($p['consentimiento'] != '') && ($p['fecha_de_fin_de_diligenciada_la_encuesta'] != '') && ($p['pregunta1'] == 'Masculino'))
                                                       {
                                                           $respondidas_masculino++;
                                                       }
                                                       else if (($p['consentimiento'] != '') && ($p['fecha_de_fin_de_diligenciada_la_encuesta'] == '') && ($p['pregunta1'] == 'Masculino'))
                                                       {
                                                           $no_respondidas_masculino++;
                                                       }                           
                                                    }
                                                    else /*if (($p['pregunta1'] == 'No respondio') || ($p['pregunta1'] == ''))*/
                                                    {
                                                        if (($p['consentimiento'] != '') && ($p['fecha_de_fin_de_diligenciada_la_encuesta'] != ''))
                                                        {
                                                            $otros_respondidas++;
                                                        }
                                                        else if (($p['consentimiento'] != '') && ($p['fecha_de_fin_de_diligenciada_la_encuesta'] == ''))
                                                        {
                                                            $otros_respondidas1++;
                                                        }
                                                    }
//                                                }
//                                                else
//                                                {}                                                                                    

                                        }/*fin si facultad*/
                                        else{}
                                        //echo $cantidad1."<br>";
                                    //endforeach;                            
                                    //$u[] = array("tipo"=>"p1", "u"=>$id_universidad."000000","f"=>$nombre, "p"=>$nombre_p, "cant"=>$cantidad1, "respondidas"=>$respondidas_sf, "no_respondidas"=>$no_respondidas_sf, "sin_responder"=>$sin_responder_sf);                                                                                        
                               endforeach;/*for each facultad*/
                               
                               $datos_me[] = array("u"=>"puj000000","tipo"=>"genero00","g"=>"Femenino","facultad"=>$nombre_facultad,"respondidas_f"=>$respondidas_femenino, "no_respondidas_f"=>$no_respondidas_femenino, "cant"=> ($respondidas_femenino +$no_respondidas_femenino));
                               $datos_me[] = array("u"=>"puj000000","tipo"=>"genero10","g"=>"Masculino","facultad"=>$nombre_facultad,"respondidas_m"=>$respondidas_masculino, "no_respondidas_m"=>$no_respondidas_masculino, "cant"=> ($respondidas_masculino +$no_respondidas_masculino));
                               $datos_me[] = array("u"=>"puj000000","tipo"=>"genero20","g"=>"Otros","facultad"=>$nombre_facultad,"otros"=>($otros_respondidas + $otros_respondidas1));
                            endforeach;/*cierre universidad*/
                            
                           break;
                        }
                        case 'usc':
                        {
                                                        $todas_las_facultades = $unaEncuesta->facultades($id_universidad);
                            $todos_los_programas_academicos = $unaEncuesta->programaAcademico($id_facultad);
                            $facultad ="";
                            foreach ($todas_las_facultades as $t):                                                   

                                    $nombre_facultad = trim($this->sanear_string($t['nombre_facultad']));  
                                   //foreach ($todos_los_programas_academicos as $pro):
                                    //$nombre_programa = trim($this->sanear_string($pro['nombre_programa']));
                                    $respondidas_femenino = 0;
                                    $no_respondidas_femenino = 0;
                                    $respondidas_masculino = 0;
                                    $no_respondidas_masculino= 0;
                                    $otros_respondidas = 0;
                                    $otros_respondidas1 = 0;
                                    
                                    foreach ($codigos as $p):                                    
                                        
                                        $facultad_programa = explode(",", $p['p']);
                                        $nombre_facultad_consulta = $this->sanear_string($facultad_programa[0]);                                    
                                        //$nombre_programa_consuta = $this->sanear_string($facultad_programa[1]);
                                        //echo $nombre_facultad."==".$nombre_facultad_consulta."<br>";
                                        if ($nombre_facultad == $nombre_facultad_consulta)/*iguala la facultad*/
                                        {                                            
//                                            if ($nombre_p == $valor_p)/*iguala el programa*/
//                                            {                                                    
                                                    if ($p['pregunta1'] == 'Femenino')
                                                    {
                                                        $uvme++;
                                                        if (($p['consentimiento'] != '') && ($p['fecha_de_fin_de_diligenciada_la_encuesta'] != '') && ($p['pregunta1'] == 'Femenino'))
                                                        {
                                                            $respondidas_femenino++;
                                                        }
                                                        else if (($p['consentimiento'] != '') && ($p['fecha_de_fin_de_diligenciada_la_encuesta'] == '') && ($p['pregunta1'] == 'Femenino'))
                                                        {
                                                            $no_respondidas_femenino++;
                                                        }    
                                                    }
                                                    else if ($p['pregunta1'] == 'Masculino')
                                                    {
                                                       if (($p['consentimiento'] != '') && ($p['fecha_de_fin_de_diligenciada_la_encuesta'] != '') && ($p['pregunta1'] == 'Masculino'))
                                                       {
                                                           $respondidas_masculino++;
                                                       }
                                                       else if (($p['consentimiento'] != '') && ($p['fecha_de_fin_de_diligenciada_la_encuesta'] == '') && ($p['pregunta1'] == 'Masculino'))
                                                       {
                                                           $no_respondidas_masculino++;
                                                       }                           
                                                    }
                                                    else /*if (($p['pregunta1'] == 'No respondio') || ($p['pregunta1'] == ''))*/
                                                    {
                                                        if (($p['consentimiento'] != '') && ($p['fecha_de_fin_de_diligenciada_la_encuesta'] != ''))
                                                        {
                                                            $otros_respondidas++;
                                                        }
                                                        else if (($p['consentimiento'] != '') && ($p['fecha_de_fin_de_diligenciada_la_encuesta'] == ''))
                                                        {
                                                            $otros_respondidas1++;
                                                        }
                                                    }
//                                                }
//                                                else
//                                                {}                                                                                    

                                        }/*fin si facultad*/
                                        else{}
                                        //echo $cantidad1."<br>";
                                    //endforeach;                            
                                    //$u[] = array("tipo"=>"p1", "u"=>$id_universidad."000000","f"=>$nombre, "p"=>$nombre_p, "cant"=>$cantidad1, "respondidas"=>$respondidas_sf, "no_respondidas"=>$no_respondidas_sf, "sin_responder"=>$sin_responder_sf);                                                                                        
                               endforeach;/*for each facultad*/
                               
                               $datos_me[] = array("u"=>"usc000000","tipo"=>"genero00","g"=>"Femenino","facultad"=>$nombre_facultad,"respondidas_f"=>$respondidas_femenino, "no_respondidas_f"=>$no_respondidas_femenino, "cant"=> ($respondidas_femenino +$no_respondidas_femenino));
                               $datos_me[] = array("u"=>"usc000000","tipo"=>"genero10","g"=>"Masculino","facultad"=>$nombre_facultad,"respondidas_m"=>$respondidas_masculino, "no_respondidas_m"=>$no_respondidas_masculino, "cant"=> ($respondidas_masculino +$no_respondidas_masculino));
                               $datos_me[] = array("u"=>"usc000000","tipo"=>"genero20","g"=>"Otros","facultad"=>$nombre_facultad,"otros"=>($otros_respondidas + $otros_respondidas1));
                            endforeach;/*cierre universidad*/
                            
                           break;
                        }
                        default :
                        {
                            break;
                        }
                        
                    }
                    
                    
                        foreach ($datos_me as $v):
                         $total[] = $v;
                       foreach ($datos_pa as $v):
                         $total[] = $v;
                        endforeach;
                        foreach ($datos_sf as $v):
                         $total[] = $v;
                        endforeach;
                        foreach ($datos_puj as $v):
                         $total[] = $v;
                        endforeach;
                        foreach ($datos_usc as $v):
                         $total[] = $v;
                        endforeach;
                        $_SESSION['encabezado_tabla'] = '</div><table border="0" align="center"><thead><tr><th colspan="6">RESUMEN DE CONTRASEÑAS</th></tr></thead>';                
                        $_SESSION['cuerpo_tabla'] = '<tbody><tr><td>id</td><td>Facultad</td><td>Genero</td><td>Diligenciados</td><td>No diligenciados</td><td>Total</td></tr>';//                
                        $_SESSION['codigos'] = $total;
                    $cadena .=  "<center><table class='table table-condensed'><thead><tr><th colspan=\"$numcolumnas\">CONTRASEÑAS GENERADAS</th></tr><tr><td colspan=\"$numcolumnas\">se reportan ".count($codigos)." contraseñas de acceso</td></tr><thead><tbody><tr><td>Universidad</td><td>Facultad</td><td>Genero</td><td>Diligenciados</td><td>No diligenciados</td><td>Total</td></tr>";         
                    if($resto == 1){}  
                    //print_r($datos_me);
            
                    switch ($id_universidad)
                    {
                        case 'uvme':
                        {
                           foreach ($datos_me as $m):
                               if (($m['respondidas_f'] > 0 )|| ($m['respondidas_m'] > 0 ))
                               {
                                   if ($m['tipo'] == 'genero00')
                                   {
                                       $cadena .= "<tr><td>Universidad del valle Sede Melendez</td><td>".$m['facultad']."</td><td>Femenino</td><td>".$m['respondidas_f']."</td><td>".$m['no_respondidas_f']."</td><td>".$m['cant']."</td></tr>";                                  
                                   }
                                   else if($m['tipo'] == 'genero10')
                                   {
                                      $cadena .= "<tr><td>Universidad del valle Sede Melendez</td><td>".$m['facultad']."</td><td>Masculino</td><td>".$m['respondidas_m']."</td><td>".$m['no_respondidas_m']."</td><td>".$m['cant']."</td></tr>";                                  
                                   }
                                   else if($m['tipo'] == 'genero20')
                                   {
                                        $cadena .= "<tr><td>Universidad del valle Sede Melendez</td><td>".$m['facultad']."</td><td>Masculino</td><td>".$m['respondidas_m']."</td><td>".$m['no_respondidas_m']."</td><td>".$m['cant']."</td></tr>";                                       
                                   }
                                
                               }                                
                           endforeach;
                           break;
                        }
                        {
                           foreach ($datos_me as $m):
                               if (($m['respondidas_f'] > 0 )|| ($m['respondidas_m'] > 0 ))
                               {
                                   if ($m['tipo'] == 'genero00')
                                   {
                                       $cadena .= "<tr><td>Universidad del valle Sede Palmira</td><td>".$m['facultad']."</td><td>Femenino</td><td>".$m['respondidas_f']."</td><td>".$m['no_respondidas_f']."</td><td>".$m['cant']."</td></tr>";                                  
                                   }
                                   else if($m['tipo'] == 'genero10')
                                   {
                                      $cadena .= "<tr><td>Universidad del valle Sede Palmira</td><td>".$m['facultad']."</td><td>Masculino</td><td>".$m['respondidas_m']."</td><td>".$m['no_respondidas_m']."</td><td>".$m['cant']."</td></tr>";                                  
                                   }
                                   else if($m['tipo'] == 'genero20')
                                   {
                                        $cadena .= "<tr><td>Universidad del valle Sede Palmira</td><td>".$m['facultad']."</td><td>Masculino</td><td>".$m['respondidas_m']."</td><td>".$m['no_respondidas_m']."</td><td>".$m['cant']."</td></tr>";                                       
                                   }
                                
                               }                                
                           endforeach;
                           break;
                        }
                        case 'uvsf':
                        {
                            foreach ($datos_me as $m):
                               if (($m['respondidas_f'] > 0 )|| ($m['respondidas_m'] > 0 ))
                               {
                                   if ($m['tipo'] == 'genero00')
                                   {
                                       $cadena .= "<tr><td>Universidad del valle Sede San Fernando</td><td>".$m['facultad']."</td><td>Femenino</td><td>".$m['respondidas_f']."</td><td>".$m['no_respondidas_f']."</td><td>".$m['cant']."</td></tr>";                                  
                                   }
                                   else if($m['tipo'] == 'genero10')
                                   {
                                      $cadena .= "<tr><td>Universidad del valle Sede San Fernando</td><td>".$m['facultad']."</td><td>Masculino</td><td>".$m['respondidas_m']."</td><td>".$m['no_respondidas_m']."</td><td>".$m['cant']."</td></tr>";                                  
                                   }
                                   else if($m['tipo'] == 'genero20')
                                   {
                                        $cadena .= "<tr><td>Universidad del valle Sede San Fernando</td><td>".$m['facultad']."</td><td>Masculino</td><td>".$m['respondidas_m']."</td><td>".$m['no_respondidas_m']."</td><td>".$m['cant']."</td></tr>";                                       
                                   }                                
                               }                                
                           endforeach;
//                            $cadena .= "<tr><td>Universidad del valle Sede San fernando</td><td>Femenino</td><td>".$datos_sf[0]['respondidas_f']."</td><td>".$datos_sf[0]['no_respondidas_f']."</td><td>".$datos_sf[0]['cant']."</td></tr>";
//                            $cadena .= "<tr><td>Universidad del valle Sede San fernando</td><td>Masculino</td><td>".$datos_sf[1]['respondidas_m']."</td><td>".$datos_sf[1]['no_respondidas_m']."</td><td>".$datos_sf[1]['cant']."</td></tr>";
//                            $cadena .= "<tr><td>Universidad del valle Sede San fernando</td><td>Otros</td><td></td><td></td><td>".$datos_sf[2]['otros']."</td></tr>";
                           break;
                        }
                        case 'puj':
                        {
                            foreach ($datos_me as $m):
                               if (($m['respondidas_f'] > 0 )|| ($m['respondidas_m'] > 0 ))
                               {
                                   if ($m['tipo'] == 'genero00')
                                   {
                                       $cadena .= "<tr><td>Pontificia Universidad Javeriana</td><td>".$m['facultad']."</td><td>Femenino</td><td>".$m['respondidas_f']."</td><td>".$m['no_respondidas_f']."</td><td>".$m['cant']."</td></tr>";                                  
                                   }
                                   else if($m['tipo'] == 'genero10')
                                   {
                                      $cadena .= "<tr><td>Pontificia Universidad Javeriana</td><td>".$m['facultad']."</td><td>Masculino</td><td>".$m['respondidas_m']."</td><td>".$m['no_respondidas_m']."</td><td>".$m['cant']."</td></tr>";                                  
                                   }
                                   else if($m['tipo'] == 'genero20')
                                   {
                                        $cadena .= "<tr><td>Pontificia Universidad Javeriana</td><td>".$m['facultad']."</td><td>Masculino</td><td>".$m['respondidas_m']."</td><td>".$m['no_respondidas_m']."</td><td>".$m['cant']."</td></tr>";                                       
                                   }                                
                               }                                
                           endforeach;
//                            $cadena .= "<tr><td>Pontificia Universidad Javeriana</td><td>Femenino</td><td>".$datos_puj[0]['respondidas_f']."</td><td>".$datos_puj[0]['no_respondidas_f']."</td><td>".$datos_puj[0]['cant']."</td></tr>";
//                            $cadena .= "<tr><td>Pontificia Universidad Javeriana</td><td>Masculino</td><td>".$datos_puj[1]['respondidas_m']."</td><td>".$datos_puj[1]['no_respondidas_m']."</td><td>".$datos_puj[1]['cant']."</td></tr>";
//                            $cadena .= "<tr><td>Pontificia Universidad Javeriana</td><td>Otros</td><td></td><td></td><td>".$datos_puj[2]['otros']."</td></tr>";
                           break;
                        }
                        case 'usc':
                        {
                            foreach ($datos_me as $m):
                               if (($m['respondidas_f'] > 0 )|| ($m['respondidas_m'] > 0 ))
                               {
                                   if ($m['tipo'] == 'genero00')
                                   {
                                       $cadena .= "<tr><td>Universidad Santiago de Cali</td><td>".$m['facultad']."</td><td>Femenino</td><td>".$m['respondidas_f']."</td><td>".$m['no_respondidas_f']."</td><td>".$m['cant']."</td></tr>";                                  
                                   }
                                   else if($m['tipo'] == 'genero10')
                                   {
                                      $cadena .= "<tr><td>Universidad Santiago de Cali</td><td>".$m['facultad']."</td><td>Masculino</td><td>".$m['respondidas_m']."</td><td>".$m['no_respondidas_m']."</td><td>".$m['cant']."</td></tr>";                                  
                                   }
                                   else if($m['tipo'] == 'genero20')
                                   {
                                        $cadena .= "<tr><td>Universidad Santiago de Cali</td><td>".$m['facultad']."</td><td>Masculino</td><td>".$m['respondidas_m']."</td><td>".$m['no_respondidas_m']."</td><td>".$m['cant']."</td></tr>";                                       
                                   }                                
                               }                                
                           endforeach;
//                            $cadena .= "<tr><td>Universidad Santiago de Cali</td><td>Femenino</td><td>".$datos_usc[0]['respondidas_f']."</td><td>".$datos_usc[0]['no_respondidas_f']."</td><td>".$datos_usc[0]['cant']."</td></tr>";
//                            $cadena .= "<tr><td>Universidad Santiago de Cali</td><td>Masculino</td><td>".$datos_usc[1]['respondidas_m']."</td><td>".$datos_usc[1]['no_respondidas_m']."</td><td>".$datos_usc[1]['cant']."</td></tr>";
//                            $cadena .= "<tr><td>Universidad Santiago de Cali</td><td>Otros</td><td>Otros</td><td></td><td></td><td>".$datos_usc[2]['otros']."</td></tr>";
                           break;
                        }
                    }                
                    if($resto == 0){}
             break;
            }
            default:
            {
                $cadena .=  "<center><table class='table table-condensed'><thead><tr><th colspan=\"$numcolumnas\">CONTRASEÑAS GENERADAS</th></tr><tr><td colspan=\"$numcolumnas\">se reportan ".count($codigos)." contraseñas de acceso</td></tr><thead><tbody><tr><td>Codigo</td><td>Universidad</td><td>Fecha creacion pin</td><td>Fecha fin</td></tr>";         
                foreach ($codigos as $p):
                $cadena .= "<tr>";
                $resto = ($i % $numcolumnas);             
         
                if($resto == 1){}               

                $uni = substr($p['u'], 0, -6);

                switch ($uni)
                {
                    case "uvsf":
                    {
                        $cadena .= "<td>".$p['pin']."</td><td>Universidad del valle sede San Fernando</td><td>".$p['fecha_de_creacion_pin']."</td><td>".$p['fecha_de_fin_de_diligenciada_la_encuesta']."</td>";
                        break;
                    }
                    case "uvme":
                    {
                        $cadena .= "<td>".$p['pin']."</td><td>Universidad del valle sede Melendez</td><td>".$p['fecha_de_creacion_pin']."</td><td>".$p['fecha_de_fin_de_diligenciada_la_encuesta']."</td>";                    
                        break;
                    }
                    case "uvpa":
                    {
                        $cadena .= "<td>".$p['pin']."</td><td>Universidad del valle sede Palmira</td><td>".$p['fecha_de_creacion_pin']."</td><td>".$p['fecha_de_fin_de_diligenciada_la_encuesta']."</td>";                    
                        break;
                    }
                    case "puj":
                    {
                        $cadena .= "<td>".$p['pin']."</td><td>Pontificia Universidad Javeriana</td><td>".$p['fecha_de_creacion_pin']."</td><td>".$p['fecha_de_fin_de_diligenciada_la_encuesta']."</td>";                                        
                        break;
                    }
                    case "usc":
                    {
                        $cadena .= "<td>".$p['pin']."</td><td>Universidad Santiago de Cali</td><td>".$p['fecha_de_creacion_pin']."</td><td>".$p['fecha_de_fin_de_diligenciada_la_encuesta']."</td>";                    
                        break;
                    }
                }

                if($resto == 0)
                {                
                   $cadena .= "</tr>"; 
                }

                $i++; 
                endforeach;
                break;
            }
         }/*FIN CASE id consulta*/
        
         
         
                
         
         
         
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
  
  /**********************************************************************/
 


 
  public function borrarTablaPines($valor, $id_encuesta)
  {
      $unaEncuesta =  new encuesta(); 
      $codigos = $unaEncuesta->borrarPines($valor, $id_encuesta);           
      
      if ($codigos > 0)
      {          
          echo 'la informacion se ha eliminado correctamente';
      }
      else
      {
          echo 'NO SE LOGRO ELIMINAR';
      }  
  }
  
  
  
  
  public function cargarTodas_las_Encuestas($valor)
  {
      $unaEncuesta =  new encuesta(); 
      $encuestas = $unaEncuesta->Encuestas($valor);           
      
      if (count($encuestas) > 0)
      {
          $opciones = "<option value='0'>SELECCIONE LA ENCUESTA<option>";
                foreach ($encuestas as $enc) 
                {
                    $opciones.="<option value='".$enc['id_encuesta']."'>".$enc['titulo']."'<option>";
                }      
     echo $opciones;
     }        
  }
  public function vistaPreviaEncuesta($id_encuesta, $id_modulo)
  {
      $unaEncuesta =  new encuesta();                   
      $modulos = $unaEncuesta->modulosEncuesta($id_encuesta);      
      $opciones = '';
      
      if (count($modulos) > 0)
      {          
          $fila = 0;
          $columna = 1;          
          $num=0;
          $preguntas = $unaEncuesta->preguntaEncuesta($id_modulo); 
          
          if (count($preguntas) > 0) 
          {
      
            foreach ($preguntas as $pre):
                
                $filas_pregunta_tabla = $unaEncuesta->opcionesPregunta($pre['id_pregunta']);
                $columnas_pregunta_tabla = $unaEncuesta->opcionesPreguntaTipoTabla($pre['id_pregunta']);
                
                        switch ($pre['id_tipo']) 
                        {
                            case 1:/*PREGUNTA DE UNICA RESPUESTA*/
                            {
                                /*PERMITE CONSULTAR SI HAN CAMBIADO LA FORMA COMO SE MUESTRA LAS OPCIONES DE LA PREGUNTA*/
                                $cantidad_filas_y_columnas = $unaEncuesta->consultarPresentacionPregunta($pre['id_pregunta']);
                                
                                if (count($cantidad_filas_y_columnas) > 0)/*si tiene valores quiere decir que la pregunta se cambia la forma como se muestra*/
                                {   $k = 0;
                                    $opciones .= "<div id='".$pre['num_pregunta']."' class='pregunta_tipo_".$pre['id_tipo']."'><br><br>";
                                    $opciones .= "<table class='table' id='".$pre['num_pregunta']."'><thead><tr><th colspan='".$cantidad_filas_y_columnas['cantidad_columnas']."'><label>".$pre['num_pregunta'].".".$pre['texto_pregunta']."</label></th></tr></thead><tbody>";
                                    
                                    for ($i = 0; $i < count($filas_pregunta_tabla); $i++) 
                                    {   
                                        $opciones .="<tr>";                                        
                                            for ($j = 0; $j < $cantidad_filas_y_columnas['cantidad_columnas']; $j++) 
                                            {                                                
                                                if ($k < count($filas_pregunta_tabla))
                                                    {
                                                    $opciones .= "<td><label><input type='radio' class='unica_respuesta' id='".$pre['num_pregunta'].($i + 1)."' name='respuesta_".$pre['num_pregunta']."' value='".$this->sanear_string($filas_pregunta_tabla[$k]['etiqueta_opcion'])."'> ".$filas_pregunta_tabla[$k]['etiqueta_opcion']."</label></td>";  
                                                    $radios[] = array("id"=>$pre['num_pregunta'].($i + 1), "t"=>"radio", "numero"=>$pre['num_pregunta']);                                                    
                                                }
                                                $k++;
                                            }
                                            $opciones .="</tr>";                                       
                                      }                                      
                                    $opciones .="</tbody></table></div><br>";                                    
                                }
                                else
                                {
                                    
                                    $opciones .= "<div id='".$pre['num_pregunta']."' class='pregunta_tipo_".$pre['id_tipo']."'><label>".$pre['num_pregunta'].".".$pre['texto_pregunta']."</label><br>";
                                    for ($i = 0; $i < count($filas_pregunta_tabla); $i++) 
                                    {
                                       $opciones .= "<label><input type='radio' class='unica_respuesta' id='".$pre['num_pregunta'].($i + 1)."' name='respuesta_".$pre['num_pregunta']."' value='".$this->sanear_string($filas_pregunta_tabla[$i]['etiqueta_opcion'])."'> ".$filas_pregunta_tabla[$i]['etiqueta_opcion']."</label><br>";  
                                       $radios[] = array("id"=>$pre['num_pregunta'].($i + 1), "t"=>"radio", "numero"=>$pre['num_pregunta']);
                                    }                                
                                    $opciones .="</div><br>";
                                }
                                break;                                 
                            }
                            /*PREGUNTA DE SELECCION MULTIPLE MULTIPLE RESPUESTA*/                         
                            case 2:
                            {   
                                $cantidad_filas_y_columnas = $unaEncuesta->consultarPresentacionPregunta($pre['id_pregunta']);
                                if (count($cantidad_filas_y_columnas) > 0)/*si tiene valores quiere decir que la pregunta se cambia la forma como se muestra*/
                                {   $k = 0;
                                    $opciones .= "<div id='".$pre['num_pregunta']."' class='pregunta_tipo_".$pre['id_tipo']."'><br><br>";
                                    $opciones .= "<table class='table' id='".$pre['num_pregunta']."'><thead><tr><th colspan='".$cantidad_filas_y_columnas['cantidad_columnas']."'><label>".$pre['num_pregunta'].".".$pre['texto_pregunta']."</label></th></tr></thead><tbody>";
                                    
                                    for ($i = 0; $i < count($filas_pregunta_tabla); $i++) 
                                    {   
                                        $opciones .="<tr>";                                                                                
                                            for ($j = 0; $j < $cantidad_filas_y_columnas['cantidad_columnas']; $j++) 
                                            {                                                
                                                if ($k < count($filas_pregunta_tabla))
                                                {
                                                    $opciones .= "<td><label><input type='checkbox' class='respuesta_multiple' id='".$pre['num_pregunta'].($j + 1)."' name='cajas".$pre['num_pregunta']."[]' value='".$this->sanear_string($filas_pregunta_tabla[$k]['etiqueta_opcion'])."'>".$filas_pregunta_tabla[$k]['etiqueta_opcion']."</label></td>";
                                                    $checkbox[] = array("id"=>$pre['num_pregunta'].($j + 1), "t"=>"check", "numero"=>$pre['num_pregunta']);
                                                }
                                                $k++;
                                            }
                                            $opciones .="</tr>";                                       
                                    }
                                    $opciones .="</tbody></table></div><br>";
                                    
                                }
                              else
                              { 
                                $opciones .= "<div id='".$pre['num_pregunta']."' class='pregunta_tipo_".$pre['id_tipo']."'><label>".$pre['num_pregunta'].".".$pre['texto_pregunta']."</label><br>";
                                for ($i = 0; $i < count($filas_pregunta_tabla); $i++)
                                {
                                    $opciones .= "<label><input type='checkbox' class='respuesta_multiple' id='".$pre['num_pregunta'].($i + 1)."' name='cajas".$pre['num_pregunta']."[]' value='".$this->sanear_string($filas_pregunta_tabla[$i]['etiqueta_opcion'])."'>".$filas_pregunta_tabla[$i]['etiqueta_opcion']."</label><br>";
                                    $checkbox[] = array("id"=>$pre['num_pregunta'].($i + 1), "t"=>"check", "numero"=>$pre['num_pregunta']);
                                }
                                $opciones .="</div><br>";                                
                                //$objetos_fomularios[] = array("id_pregunta="=>$pre['num_pregunta'], "tipo"=>"check");
                              }
                                break;
                            }                            
                            case 3:/*PREGUNTA ABIERTA*/
                            {
                                
                                $opciones .= "<div id='".$pre['num_pregunta']."' class='pregunta_tipo_".$pre['id_tipo']."'><label>".$pre['num_pregunta'].".".$pre['texto_pregunta']."</label><br><br>";
                                $opciones .= "<input type='text' class='form-control respuesta_abierta' id='".$pre['num_pregunta'].$num."'><br>"; 
                                $opciones .="</div><br>";
                                $cajas_abierta[] = array("id"=>$pre['num_pregunta'].$num, "tipo"=>"caja_abierta", "numero"=>$pre['num_pregunta']);
                                $num++;
                                break;
                            }
                            case 4:/*PREGUNTA TIPO FECHA*/                         
                            {
                                $opciones .= "<div id='".$pre['num_pregunta']."' class='pregunta_tipo_".$pre['id_tipo']."'><label>".$pre['num_pregunta'].".".$pre['texto_pregunta']."</label><br><br>";
                                $opciones .= "<input type='text' class='caja1 respuesta_fecha' id='alternate'/><input type='hidden' id='fecha".$pre['id_pregunta']."'><br>"; 
                                $opciones .="</div><br>";
                                $cajas_fecha[] = array("id"=>"fecha".$pre['id_pregunta'], "tipo"=>"caja_fecha", "numero"=>$pre['num_pregunta']);
                                break;
                            }
                            case 5:/*PREGUNTA TIPO TABLA*/
                            {
                                $cantidad_filas_y_columnas = $unaEncuesta->consultarTipoTabla($pre['id_pregunta']);
                                $opciones .= "<div id='".$pre['num_pregunta']."' class='pregunta_tipo_".$pre['id_tipo']."'><label>".$pre['num_pregunta'].". ".$pre['texto_pregunta']."</label><br><br>"; 
                                $opciones .="<table class='table table-condensed' id='".$pre['num_pregunta']."'><thead><tr><th><label>Enunciado</label></th>";
                                
                                
                                for ($i = 0; $i < $cantidad_filas_y_columnas['cantidad_columnas']; $i++) 
                                {
                                    $opciones .= "<th><label>".$columnas_pregunta_tabla[$i]['opcion_columna']."</label>";
                                }
                                $opciones .= "</th></tr></thead>";
                                
                                
                                
                                /*CUERPO DE LA TABLA*/
                                $opciones .="<tbody>";
                                
                                $preguntas_tabla[] = array("id_pregunta" => $pre['num_pregunta']);
                                
                                for ($i = 0; $i < $cantidad_filas_y_columnas['cantidad_filas']; $i++) 
                                {
                                    $opciones .= "<tr><td><label>".$filas_pregunta_tabla[$i]['etiqueta_opcion']."</label></td>";                                    
                                    for ($j = 0; $j < count($columnas_pregunta_tabla); $j++) 
                                    {
                                        $opciones .= "<td><label><input type='radio' id='radio_table".($fila + $columna)."' name='radio_tabla_".$columna."' class='opcion_tipo_tabla' id='".$pre['num_pregunta']."' value='". $this->sanear_string($filas_pregunta_tabla[$i]['etiqueta_opcion']).":".$this->sanear_string($columnas_pregunta_tabla[$j]['opcion_columna'])."'></label></td>";
                                        $radio_tabla[] = array("id"=>"radio_table".($fila + $columna)."", "tipo"=>"radio" , "numero"=>$pre['num_pregunta']);
                                        $fila++;
                                    }                                    
                                    $columna++;
                                }
                                
                                $opciones .="</tr></tbody></table></div><br>";
                                
                                break;
                            }
                            case 6:/*PREGUNTA TIPO ENUNCIADO*/
                            {
                                $opciones .= "<div><label id='enunciado".$pre['num_pregunta']."'>".$pre['num_pregunta'].". ".$pre['texto_pregunta']."</label>"; 
                                $opciones .="</div><br>";
                                //$objetos_fomularios[] = array("id_pregunta="=>"enunciado".$pre['num_pregunta']."", "tipo"=>"nada");
                                break;
                            }
                            case 7:/*PREGUNTA TIPO UBICACION*/
                            {
                                $opciones .= "<div id='".$pre['num_pregunta']."' class='pregunta_tipo_".$pre['id_tipo']."'><label>".$pre['num_pregunta'].".".$pre['texto_pregunta']."</label><br><br>";
                                $opciones .= "<select class='selectpicker form-control caja1' id='departamento' data-width='600px' data-live-search='true' data-style='btn btn-primary' data-size='5' tabindex='1'>"
                                          . "     <option value='0'>Selecciona el departamento</option>"
                                          . "     </select>";
                                $opciones .="<br>";
                                $opciones .= "<select class='selectpicker form-control caja1' id='municipio' data-width='600px' data-live-search='true' data-style='btn btn-primary' data-size='5' tabindex='1'>"
                                          . "     <option value='0'>Selecciona el municipio</option>"
                                          . "     </select>";
                                $opciones .="</div><br><br>";
                                break;
                            }
                            case 8:/*PREGUNTA TIPO UNIVERSIDAD*/
                            {
                                $opciones .= "<div id='".$pre['num_pregunta']."' class='pregunta_tipo_".$pre['id_tipo']."'><label>".$pre['num_pregunta'].".".$pre['texto_pregunta']."</label><br><br>";
                                $opciones .= "<select class='selectpicker form-control caja1' id='facultad' data-width='600px' data-live-search='true' data-style='btn btn-primary' data-size='5' tabindex='1'>"
                                          . "     <option value='0'>Selecciona la facultad</option>"
                                          . "     </select></div>";
                                $opciones .="<br>";
                                $opciones .= "<select class='selectpicker form-control caja1' id='programa' data-width='600px' data-live-search='true' data-style='btn btn-primary' data-size='5' tabindex='1'>"
                                          . "     <option value='0'>Selecciona la carrera que estudias</option>"
                                          . "     </select></div>";
                                $opciones .="</div><br><br>";
                                break;
                            }
                            case 9:/*PREGUNTA TIPO SEMESTRE*/
                            {
                             $opciones .= "<div id='".$pre['num_pregunta']."' class='pregunta_tipo_".$pre['id_tipo']."'><label>".$pre['num_pregunta'].".".$pre['texto_pregunta']."</label><br><br>";
                                $opciones .= "<select class='selectpicker form-control caja1' id='semestre' data-width='600px' data-live-search='true' data-style='btn btn-primary' data-size='5' tabindex='1'>"
                                          . "     <option value='0'>Seleccione la cantidad de semestres cursados</option>"                                          
                                          . "     <option value='1'>1</option>"
                                          . "     <option value='2'>2</option>"
                                          . "     <option value='3'>3</option>"
                                          . "     <option value='4'>4</option>"
                                          . "     <option value='5'>5</option>"
                                          . "     <option value='6'>6</option>"
                                          . "     <option value='7'>7</option>"
                                          . "     <option value='8'>8</option>"
                                          . "     <option value='9'>9</option>"
                                          . "     <option value='10'>10</option>"
                                          . "     <option value='11'>11 o m&aacute;s</option>"
                                          . "     </select></div>";
                                $opciones .="<br></div>";
                                break;
                            }
                            case 10:/*PREGUNTA TIPO COMBINADO*/
                            {
                                $opciones .= "<div id='".$pre['num_pregunta']."' class='pregunta_tipo_".$pre['id_tipo']."'><label>".$pre['num_pregunta'].".".$pre['texto_pregunta']."</label><br><br>";
                                $p = 0;/*hacer que esto sea pa cualquier etiqueta*/
                                    for ($i = 0; $i < count($filas_pregunta_tabla); $i++) 
                                    {
                                        if($filas_pregunta_tabla[$i]['etiqueta_opcion'] == 'todos')
                                        {
                                            $opciones .= "<label><input type='radio' class='unica_respuesta' id='".$pre['num_pregunta'].($i + 1)."' name='radios".$pre['num_pregunta']."[]' value='".$this->sanear_string($filas_pregunta_tabla[$i]['etiqueta_opcion'])."'> ".$filas_pregunta_tabla[$i]['etiqueta_opcion']."</label><br>";
                                        }                                        
                                        if($this->sanear_string($filas_pregunta_tabla[$i]['etiqueta_opcion']) == 'cantidad')
                                        {
                                            $opciones .= "<label><input type='radio' class='unica_respuesta' id='".$pre['num_pregunta'].($i + 1)."' name='radios".$pre['num_pregunta']."[]' value='".$this->sanear_string($filas_pregunta_tabla[$i]['etiqueta_opcion'])."'> ".$filas_pregunta_tabla[$i]['etiqueta_opcion']."</label><input type=text class='form-control cajatiempo' placeholder='ingrese un valor' id='cajita".$pre['num_pregunta'].($i + 1)."'><br>";
                                        }                                        
                                        if($this->sanear_string($filas_pregunta_tabla[$i]['etiqueta_opcion']) == 'meses')
                                        {
                                            $opciones .= "<label class='cajatiempo'>".$this->sanear_string($filas_pregunta_tabla[$i]['etiqueta_opcion'])."</label><input type=text class='form-control cajatiempo' placeholder='ingrese un valor' id='cajita".$pre['num_pregunta'].($i + 1)."'><br>";
                                        }
                                       
                                    }
                                    //$pregunta_radio[] = array("name"=>"radios".$pre['num_pregunta'], "t"=>"radio", "numero"=>$pre['num_pregunta']);
                                    $opciones .="</div><br>";
                                 break;
                            }
                            default :
                            {
                               echo 'TIPO NO ADECUADO';
                            }                            
                            
                        }//fin swicth
                
                endforeach;           
          }/*CIERRA IF DE PREGUNTAS*/
          
      }/*CIERRA IF DE MODULOS*/
      else
      {
          //$opciones = "Aun no existen preguntas asociadas a esta encuesta.";
      }
     echo $opciones;
             
  }
  
  
     public function cargarComboFacultad($id_universidad)
  {
     $unEncuestado =  new encuesta(); 
     $fact = $unEncuestado->facultades($id_universidad);           
      
      if (count($fact) > 0)
      {
          $opciones = '<option value="0">Selecciona la facultad</option>';
                foreach ($fact as $fct) 
                {
                    $opciones.='<option value="'.$fct['id'].'">'.$fct['nombre_facultad'].'</option>';
                }      
     //echo $opciones;
     }
     else
     {
         $opciones = '<option value="0">No existen registros</option>';
     }
     echo $opciones;
  }
  
  public function cargarComboProgramaAcademico($id_facultad)
  {
     $unEncuestado =  new encuesta(); 
     
     $fact = $unEncuestado->programaAcademico($id_facultad);                 
      if (count($fact) > 0)
      {
          $opciones = '<option value="0">Selecciona la carrera que estudias</option>';
                foreach ($fact as $fct) 
                {
                    $opciones.='<option value="'.$fct['codigo'].'">'.$fct['nombre_programa'].'</option>';
                }      
        //echo $opciones;
     }
     else
     {
         $opciones = '<option value="0">No existen registros</option>';
     }
     echo $opciones;
  }
  /*********************************************************************************************************************************************/
    public function cargarComboDepartamento($un_valor)
  {
     $unEncuestado =  new encuesta(); 
     $dptos = $unEncuestado->departamentos($un_valor);           
      //print_r($categorias);
      if (count($dptos) > 0)
      {
          $opciones = '<option value="0">Selecciona el departamento</option>';
                foreach ($dptos as $dpto) 
                {
                    $opciones.='<option value="'.$dpto['id'].'">'.$dpto['nombre_departamento'].'</option>';
                }      
        //echo $opciones;
     }
     else
     {
         $opciones = '<option value="0">No existen registros</option>';
     }
     echo $opciones;
  }
  
  public function cargarComboMunicipio($id_dpto)
  {
     $unEncuestado =  new encuesta(); 
     $mcpios = $unEncuestado->municipios($id_dpto);           
      
      if (count($mcpios) > 0)
      {
          $opciones = '<option value="0">Selecciona el municipio</option>';
                foreach ($mcpios as $mcp) 
                {
                    $opciones.='<option value="'.$mcp['id'].'">'.$mcp['nombre_municipio'].'</option>';
                }      
     //echo $opciones;
     } 
     else
     {
         $opciones = '<option value="0">No existen registros</option>';
     }
     echo $opciones;
  }
/*********************************************************************************************************************************************/  
 public function cantidadModulosEncuesta($id_encuesta)
  {
      $unaEncuesta =  new encuesta(); 
      $modulos = $unaEncuesta->modulosEncuesta($id_encuesta);           
      if (count($modulos) > 0)
      {                   
          $cantidad_de_modulos = $unaEncuesta->cantidad_modulos_por_encuesta($id_encuesta);        
          echo $cantidad_de_modulos[0]['num'];      
      }
  }
  
  
  public function cargarEncuesta($id_encuesta, $id_modulo)
  {     
      
      $unaEncuesta =  new encuesta(); 
      //$unUsuario =  new usuario(); 
      $modulos = $unaEncuesta->modulosEncuesta($id_encuesta);           
      
      $moduloActual = $unaEncuesta->moduloActualEncuesta($id_encuesta, $id_modulo);      
      
      $numeroRespuesta = array();
      $tipoRespuesta = array();     
      
      $cantidad_de_modulos = $unaEncuesta->cantidad_modulos_por_encuesta($id_encuesta);        
           
      
      if (($moduloActual['id_modulo'] !== '') && ($moduloActual['id_modulo'] !== null))
      {
          if ($moduloActual['id_modulo'] == 1)
          {
              $opciones .= "<div><center><h3>Instructivo para diligenciamiento de la Encuesta</h3></center></div><br>" ;
              $opciones .= "<div><center><pre>A continuaci&oacute;n encontrar&aacute;s una serie de preguntas relacionadas con tus conceptos sobre sexualidad y pr&aacute;cticas sexuales. Algunas veces es difícil recordar o responder exactamente las preguntas, queremos recomendarte respondas honestamente esta encuesta, que permitir&aacute; tener una aproximaci&oacute;n a las din&aacute;micas de los j&oacute;venes universitarios, y con base en los resultados, proponer servicios de apoyo coherentes con realidades diversas.</pre></center></div><br>" ;
              $opciones .= "<div><center><pre>Recuerda que toda la informaci&oacute;n que consignes en el instrumento es totalmente <label>ANONIMA Y CONFIDENCIAL.</label> Dada la importancia de los temas tratados tendr&aacute;s la oportunidad de contestarla en varios momentos sin que se altere su contenido. Conserva el c&oacute;digo o pin de acceso, es siempre el mismo. Una vez accedas, tienes 7 d&iacute;as para contestarla. Encontrar&aacute;s diferentes tipos de preguntas organizadas en 5 m&oacute;dulos, lee las instrucciones para cada tipo de pregunta.</pre></center></div><br>" ;
              $opciones .= "<div><ul><li>M&oacute;dulo 1: Información general</li><li>M&oacute;dulo 2: Din&aacute;micas sexuales</li><li>M&oacute;dulo 3: M&oacute;dulo: Salud sexual e infecciones de transmisi&oacute;n sexual</li><li>M&oacute;dulo 4: M&oacute;dulo: Vida sexual</li><li>M&oacute;dulo 5: M&oacute;dulo: contexto sociocultural</li></ul></div><br>" ;
              $opciones .= "<div><center><pre>Te agradecemos contestar todas las preguntas, tus respuestas son muy importantes. Al terminar cada m&oacute;dulo recuerda Guardar tus respuestas y hacer clic en Siguiente Modulo. Si sales de la encuesta, el software iniciara en el m&oacute;dulo siguiente al que qued&oacute; guardado.</pre></center></div><br>" ;
              $opciones .= "<div><center><label><h2>".$modulos[($id_modulo - 1)]['descripcion']."</h2></label><center></div>";              
              $opciones .= "<br><br>";
          }
          else
          {
              $opciones .= "<div><center><label><h2>".$modulos[($id_modulo - 1)]['descripcion']."</h2></label><center></div>";              
              $opciones .= "<br><br>";
          }             
                                        
              $fila = 0;
              $columna = 1;
              $opcion_vinculo = "";
              $pregunta_a_vincular = 0;
              $id_pregunta ="";
             // $preguntas = $unaEncuesta->preguntaEncuestaLimitado($id_modulo, $cantidad_registros_por_pagina , $rango  );           
              /*recoge las preguntas por modulo*/ 
              $preguntas = $unaEncuesta->preguntasEncuesta($id_encuesta, $moduloActual['id_modulo']);                                                               
              
              if (count($preguntas) > 0) 
              {                             
                  $num=0;
                  foreach ($preguntas as $pre):                                                                      
                  
                                $filas_pregunta_tabla = $unaEncuesta->opcionesPregunta($pre['id_pregunta']);
                                $columnas_pregunta_tabla = $unaEncuesta->opcionesPreguntaTipoTabla($pre['id_pregunta']);                                
                                $preguntas_vinculadas = $unaEncuesta->PreguntasVinculadas($id_encuesta, $pre['id_pregunta']);                                

                                 if ($pre["num_pregunta"] !== null) 
                                 {
                                     $tipoRespuesta[] = $pre["id_tipo"];
                                     $numeroRespuesta[] = $pre["num_pregunta"];
                                 }
                                
                        switch ($pre['id_tipo']) 
                        {
                            case 1:
                            {
                                $cantidad_filas_y_columnas = $unaEncuesta->consultarPresentacionPregunta($pre['id_pregunta']);                               
                                
                                if (count($cantidad_filas_y_columnas) > 0)/*si tiene valores quiere decir que la pregunta se cambia la forma como se muestra*/
                                {   $k = 0;
                                    $p = 0;
                                
                                    $opciones .= "<div id='".$pre['num_pregunta']."' class='pregunta_tipo_".$pre['id_tipo']."'><br><br>";
                                    $opciones .= "<table class='table' id='".$pre['num_pregunta']."'><thead><tr><th colspan='".$cantidad_filas_y_columnas['cantidad_columnas']."'><label>".$pre['num_pregunta'].".".$pre['texto_pregunta']."</label></th></tr></thead><tbody>";
                                    
                                    for ($i = 0; $i < count($filas_pregunta_tabla); $i++) 
                                    {   
                                        $opciones .="<tr>";
                                            for ($j = 0; $j < $cantidad_filas_y_columnas['cantidad_columnas']; $j++) 
                                            {                                                
                                                if ($k < count($filas_pregunta_tabla))
                                                {
                                                    
                                                   if (  ($this->sanear_string($filas_pregunta_tabla[$k]['etiqueta_opcion']) == 'Otro' ) || ($this->sanear_string($filas_pregunta_tabla[$k]['etiqueta_opcion']) == 'Otra'))
                                                   {
                                                           $opciones .= "<td><label><input type='radio' class='unica_respuesta' id='".$pre['num_pregunta'].$p."' name='radios".$pre['num_pregunta']."[]' value='".$this->sanear_string($filas_pregunta_tabla[$k]['etiqueta_opcion'])."'> ".$filas_pregunta_tabla[$k]['etiqueta_opcion']."</label><br><label>¿Cu&aacute;l?&nbsp;<input type=text class='form-control otro_cual' placeholder='ingrese un valor' name='cajitas' id='cajitas".$pre['num_pregunta'].$p."'></label></tr><br>";
                                                           
                                                           $pregunta_cual[]=array("id"=>"cajitas".$pre['num_pregunta'].$p, "name"=>"radios".$pre['num_pregunta'], "numero_pregunta"=>$pre['num_pregunta'], "id_pregunta"=>$pre['id_pregunta'], "name_caja"=>"cajitas");
                                                   }
                                                   else
                                                   {
                                                        $opciones .= "<td><label><input type='radio' class='unica_respuesta' id='".$pre['num_pregunta'].$p."' name='radios".$pre['num_pregunta']."[]' value='".$this->sanear_string($filas_pregunta_tabla[$k]['etiqueta_opcion'])."'> ".$filas_pregunta_tabla[$k]['etiqueta_opcion']."</label></td>";            
                                                   }
                                                }
                                                $k++;
                                                $p++;
                                            }
                                            $opciones .="</tr>";
                                      }                                      
                                      
                                      if ($pre['id_pregunta'] == $preguntas_vinculadas[0]['id_pregunta'])
                                      {                                          
                                            $pre_vinculadas[] = array("name"=>"radios".$pre['num_pregunta'], "numero_pregunta"=>$pre['num_pregunta'], "opciones"=>$preguntas_vinculadas[0]['opcion'], "pregunta_vinculada"=>$preguntas_vinculadas[0]['vinculo']);
                                      }
                                      else
                                      {
                                          $pregunta_radio[] = array("name"=>"radios".$pre['num_pregunta'], "t"=>"radio", "numero"=>$pre['num_pregunta']);
                                      }
                                      
                                    $opciones .="</tbody></table></div><br>";                                    
                                }/*sino se utiliza para colocar las respuestas en una sola columna*/
                                else
                                {
                                    $p = 0;
                                    $opciones .= "<div id='".$pre['num_pregunta']."' class='pregunta_tipo_".$pre['id_tipo']."'><label>".$pre['num_pregunta'].".".$pre['texto_pregunta']."</label><br>";
                                    for ($i = 0; $i < count($filas_pregunta_tabla); $i++) 
                                    {
                                       
                                       if ( ( $this->sanear_string($filas_pregunta_tabla[$i]['etiqueta_opcion']) == 'Otro' ) || ( $this->sanear_string($filas_pregunta_tabla[$i]['etiqueta_opcion'] == 'Otra') ) )
                                       {                                                                                   
                                           $opciones .= "<label><input type='radio' class='unica_respuesta' id='".$pre['num_pregunta'].($i + 1)."' name='radios".$pre['num_pregunta']."[]' value='".$this->sanear_string($filas_pregunta_tabla[$i]['etiqueta_opcion'])."'> ".$filas_pregunta_tabla[$i]['etiqueta_opcion']."</label><br><label>¿Cu&aacute;l?&nbsp;<input type=text class='form-control otro_cual' placeholder='ingrese un valor' name='cajitas' id='cajitas".$pre['num_pregunta'].($i + 1)."'></label><br>";
                                           $pregunta_cual[]=array("id"=>"cajitas".$pre['num_pregunta'].($i + 1), "name"=>"radios".$pre['num_pregunta'], "numero_pregunta"=>$pre['num_pregunta'], "id_pregunta"=>$pre['id_pregunta'], "name_caja"=>"cajitas");
                                       }                                                   
                                       else
                                       {                                           
                                           $opciones .= "<label><input type='radio' class='unica_respuesta' id='".$pre['num_pregunta'].($i + 1)."' name='radios".$pre['num_pregunta']."[]' value='".$this->sanear_string($filas_pregunta_tabla[$i]['etiqueta_opcion'])."'> ".$filas_pregunta_tabla[$i]['etiqueta_opcion']."</label><br>";  
                                       }                                       
                                       $p++;
                                    }
                                    
                                    if ($pre['id_pregunta'] == $preguntas_vinculadas[0]['id_pregunta'])
                                    {                                                                                    
                                         $pre_vinculadas[] = array("name"=>"radios".$pre['num_pregunta'], "numero_pregunta"=>$pre['num_pregunta'], "opciones"=>$preguntas_vinculadas[0]['opcion'], "pregunta_vinculada"=>$preguntas_vinculadas[0]['vinculo']);
                                    }
                                    else
                                    {
                                        $pregunta_radio[] = array("name"=>"radios".$pre['num_pregunta'], "t"=>"radio", "numero"=>$pre['num_pregunta']);
                                    }
                                    
                                    $opciones .="</div><br>";
                                    }
                                break;                                 
                            }
                            
                            case 2:
                            {
                                $cantidad_filas_y_columnas = $unaEncuesta->consultarPresentacionPregunta($pre['id_pregunta']);
                                if (count($cantidad_filas_y_columnas) > 0)/*si tiene valores quiere decir que la pregunta se cambia la forma como se muestra*/
                                {   $k = 0;
                                    $s = 0;
                                    
                                    $opciones .= "<div id='".$pre['num_pregunta']."' class='pregunta_tipo_".$pre['id_tipo']."'><br><br>";
                                    $opciones .= "<table class='table' id='".$pre['num_pregunta']."'><thead><tr><th colspan='".$cantidad_filas_y_columnas['cantidad_columnas']."'><label>".$pre['num_pregunta'].".".$pre['texto_pregunta']."</label></th></tr></thead><tbody>";
                                    
                                    for ($i = 0; $i < count($filas_pregunta_tabla); $i++) 
                                    {   
                                        $opciones .="<tr>";                                                                                
                                            for ($j = 0; $j < $cantidad_filas_y_columnas['cantidad_columnas']; $j++) 
                                            {                                                
                                                if ($k < count($filas_pregunta_tabla))
                                                {
                                                    if ( $this->sanear_string($filas_pregunta_tabla[$k]['etiqueta_opcion'] == 'Otras') )
                                                    {
                                                        $opciones .= "<td><label><input type='checkbox' class='respuesta_multiple' id='".$pre['num_pregunta'].($s + 1)."' name='cajas".$pre['num_pregunta']."[]' value='".$this->sanear_string($filas_pregunta_tabla[$k]['etiqueta_opcion'])."'>".$filas_pregunta_tabla[$k]['etiqueta_opcion']."</label><br><label>¿Cu&aacute;les?&nbsp;<input type=text class='form-control otro_cual' placeholder='ingrese un valor'  name='cajitas' id='cajitas".$pre['num_pregunta'].($s + 1)."'></label></td>";
                                                        $pregunta_cual[]=array("id"=>$pre['num_pregunta'].($s + 1), "name"=>"cajas".$pre['num_pregunta'], "numero_pregunta"=>$pre['num_pregunta'], "id_pregunta"=>$pre['id_pregunta'], "name_caja"=>"cajitas");
                                                    }
                                                    if ( ( $this->sanear_string($filas_pregunta_tabla[$k]['etiqueta_opcion']) == 'Otro' ) || ( $this->sanear_string($filas_pregunta_tabla[$k]['etiqueta_opcion'] == 'Otra') ) || ( $this->sanear_string($filas_pregunta_tabla[$i]['etiqueta_opcion'] == 'Otros') ) )
                                                    {
                                                        $opciones .= "<td><label><input type='checkbox' class='respuesta_multiple' id='".$pre['num_pregunta'].($s + 1)."' name='cajas".$pre['num_pregunta']."[]' value='".$this->sanear_string($filas_pregunta_tabla[$k]['etiqueta_opcion'])."'>".$filas_pregunta_tabla[$k]['etiqueta_opcion']."</label><br><label>¿Cu&aacute;l?&nbsp;<input type=text class='form-control otro_cual' placeholder='ingrese un valor' name='cajitas' id='cajitas".$pre['num_pregunta'].($s + 1)."'></label></td>";
                                                        $pregunta_cual[]=array("id"=>$pre['num_pregunta'].($s + 1), "name"=>"cajas".$pre['num_pregunta'], "numero_pregunta"=>$pre['num_pregunta'], "id_pregunta"=>$pre['id_pregunta'], "name_caja"=>"cajitas");
                                                    }
                                                    else
                                                    {
                                                        $opciones .= "<td><label><input type='checkbox' class='respuesta_multiple' id='".$pre['num_pregunta'].($s + 1)."' name='cajas".$pre['num_pregunta']."[]' value='".$this->sanear_string($filas_pregunta_tabla[$k]['etiqueta_opcion'])."'>".$filas_pregunta_tabla[$k]['etiqueta_opcion']."</label></td>";
                                                    }                                                    
                                                }
                                                $k++;
                                                $s++;
                                            }
                                            $opciones .="</tr>"; 
                                    }
                                    $pregunta_check[] = array("name"=>"cajas".$pre['num_pregunta'], "t"=>"check", "numero"=>$pre['num_pregunta']);
                                    $opciones .="</tbody></table></div><br>";                                    
                                }
                                else
                                {
                                    $opciones .= "<div id='".$pre['num_pregunta']."' class='pregunta_tipo_".$pre['id_tipo']."'><label>".$pre['num_pregunta'].".".$pre['texto_pregunta']."</label><br>";                                                               
                                    for ($i = 0; $i < count($filas_pregunta_tabla); $i++)
                                    {
                                        if ( $this->sanear_string($filas_pregunta_tabla[$i]['etiqueta_opcion'] == 'Otras') ) 
                                        {
                                            $opciones .= "<label><input type='checkbox' class='respuesta_multiple' id='".$pre['num_pregunta'].($i + 1)."' name='cajas".$pre['num_pregunta']."[]' value='".$this->sanear_string($filas_pregunta_tabla[$i]['etiqueta_opcion'])."'>".$filas_pregunta_tabla[$i]['etiqueta_opcion']."</label><br><label>¿Cu&aacute;les?&nbsp;<input type=text class='form-control otro_cual' placeholder='ingrese un valor' name='cajitas' id='cajitas".$pre['num_pregunta'].($i + 1)."'></label>";
                                            $pregunta_cual[]=array("id"=>$pre['num_pregunta'].($i + 1), "name"=>"cajas".$pre['num_pregunta'], "numero_pregunta"=>$pre['num_pregunta'], "id_pregunta"=>$pre['id_pregunta'], "name_caja"=>"cajitas");
                                        }
                                        if ( ( $this->sanear_string($filas_pregunta_tabla[$i]['etiqueta_opcion']) == 'Otro' ) || ( $this->sanear_string($filas_pregunta_tabla[$i]['etiqueta_opcion'] == 'Otra') ) || ( $this->sanear_string($filas_pregunta_tabla[$i]['etiqueta_opcion'] == 'Otros') ) )
                                        {
                                            $opciones .= "<label><input type='checkbox' class='respuesta_multiple' id='".$pre['num_pregunta'].($i + 1)."' name='cajas".$pre['num_pregunta']."[]' value='".$this->sanear_string($filas_pregunta_tabla[$i]['etiqueta_opcion'])."'>".$filas_pregunta_tabla[$i]['etiqueta_opcion']."</label><br><label>¿Cu&aacute;l?&nbsp;<input type=text class='form-control otro_cual' placeholder='ingrese un valor' name='cajitas' id='cajitas".$pre['num_pregunta'].($i + 1)."'></label>";
                                            $pregunta_cual[]=array("id"=>$pre['num_pregunta'].($i + 1), "name"=>"cajas".$pre['num_pregunta'], "numero_pregunta"=>$pre['num_pregunta'], "id_pregunta"=>$pre['id_pregunta'], "name_caja"=>"cajitas");
                                        }
                                        else
                                        {
                                            $opciones .= "<label><input type='checkbox' class='respuesta_multiple' id='".$pre['num_pregunta'].($i + 1)."' name='cajas".$pre['num_pregunta']."[]' value='".$this->sanear_string($filas_pregunta_tabla[$i]['etiqueta_opcion'])."'>".$filas_pregunta_tabla[$i]['etiqueta_opcion']."</label><br>";
                                        }                                        
                                    }
                                    $pregunta_check[] = array("name"=>"cajas".$pre['num_pregunta'], "t"=>"check", "numero"=>$pre['num_pregunta']);
                                    $opciones .="</div><br>";                                                                
                                    }
                                break;
                            }
                            case 3:
                            {
                                $opciones .= "<div id='".$pre['num_pregunta']."' class='pregunta_tipo_".$pre['id_tipo']."'><label>".$pre['num_pregunta'].".".$pre['texto_pregunta']."</label><br><br>";
                                $opciones .= "<input type='text' class='form-control respuesta_abierta' id='".$pre['num_pregunta'].$num."'><br>"; 
                                $opciones .="</div><br>";
                                $cajas_abierta[] = array("id"=>$pre['num_pregunta'].$num, "tipo"=>"caja_abierta", "numero"=>$pre['num_pregunta']);                                
                                $num++;
                                break;
                            }
                            case 4:
                            {
                                $opciones .= "<div id='".$pre['num_pregunta']."' class='pregunta_tipo_".$pre['id_tipo']."'><label>".$pre['num_pregunta'].".".$pre['texto_pregunta']."</label><br><br>";
                                $opciones .= "<input type='text' class='form-control'id='fecha".$pre['id_pregunta']."'><br>"; 
                                $opciones .="</div><br>";
                                $cajas_fecha[] = array("id"=>"fecha".$pre['id_pregunta'], "tipo"=>"caja_fecha", "numero"=>$pre['num_pregunta']);
                                break;
                            }
                            case 5:
                            {
                                $cantidad_filas_y_columnas = $unaEncuesta->consultarTipoTabla($pre['id_pregunta']);
                                $opciones .= "<div id='".$pre['num_pregunta']."' class='pregunta_tipo_".$pre['id_tipo']."'><label>".$pre['num_pregunta'].". ".$pre['texto_pregunta']."</label><br><br>"; 
                                $opciones .="<table class='table table-condensed' id='".$pre['num_pregunta']."'><thead><tr><th><label>Enunciado</label></th>";
                                
                                
                                for ($i = 0; $i < $cantidad_filas_y_columnas['cantidad_columnas']; $i++) 
                                {
                                    $opciones .= "<th><label>".$columnas_pregunta_tabla[$i]['opcion_columna']."</label>";
                                }
                                $opciones .= "</th></tr></thead>";
                                                                                               
                                /*CUERPO DE LA TABLA*/
                                $opciones .="<tbody>";                                
                                $preguntas_tabla[] = array("id_pregunta" => $pre['num_pregunta']);
                                
                                for ($i = 0; $i < $cantidad_filas_y_columnas['cantidad_filas']; $i++) 
                                {
                                    $opciones .= "<tr><td><label>".$filas_pregunta_tabla[$i]['etiqueta_opcion']."</label></td>";                                    
                                    for ($j = 0; $j < count($columnas_pregunta_tabla); $j++) 
                                    {                                        
                                        $opciones .= "<td><label><input type='radio' id='radio_table".($fila + $columna)."' name='radios_tabla".$columna."[]' class='opcion_tipo_tabla' id='".$pre['num_pregunta']."' value='". $this->sanear_string($filas_pregunta_tabla[$i]['etiqueta_opcion']).":".$this->sanear_string($columnas_pregunta_tabla[$j]['opcion_columna'])."'></label></td>";                                     
                                        $radio_tabla[] = array("id"=>"radio_table".($fila + $columna)."", "tipo"=>"radio" , "numero"=>$pre['num_pregunta'], "name"=>'radios_tabla'.$columna);
                                        $fila++;
                                    }                                    
                                    $columna++;
                                }
                                $opciones .="</tr></tbody></table></div><br>";                                
                                break;
                            }
                            case 6:
                            {
                                $opciones .= "<div><label id='enunciado".$pre['num_pregunta']."'>".$pre['num_pregunta'].". ".$pre['texto_pregunta']."</label>"; 
                                $opciones .="</div><br>";                                
                                break;
                            }
                            case 7:/*PREGUNTA TIPO UBICACION*/
                            {
                                $opciones .= "<div id='".$pre['num_pregunta']."' class='pregunta_tipo_".$pre['id_tipo']."'><label>".$pre['num_pregunta'].".".$pre['texto_pregunta']."</label><br><br>";
                                $opciones .= "<select class='selectpicker form-control caja1' id='departamento' data-width='' data-live-search='true' data-style='btn btn-primary' data-size='5' tabindex='1'>"
                                          . "     <option value='0'>Selecciona el departamento</option>"
                                          . "     </select>";
                                $opciones .="<br>";
                                $opciones .= "<select class='selectpicker form-control caja1' id='municipio' data-width='' data-live-search='true' data-style='btn btn-primary' data-size='5' tabindex='1'>"
                                          . "     <option value='0'>Selecciona el municipio</option>"
                                          . "     </select>";
                                $opciones .="</div><br><br>";
                                $pregunta_combo_ubicacion[] = array("id"=>'departamento', "tipo"=>"combo", "numero"=>$pre['num_pregunta']);
                                $pregunta_combo_ubicacion[] = array("id"=>'municipio', "tipo"=>"combo", "numero"=>$pre['num_pregunta']);
                                 break;
                            }
                            case 8:/*PREGUNTA TIPO UNIVERSIDAD*/
                            {
                                $opciones .= "<div id='".$pre['num_pregunta']."' class='pregunta_tipo_".$pre['id_tipo']."'><label>".$pre['num_pregunta'].".".$pre['texto_pregunta']."</label><br><br>";
                                $opciones .= "<select class='selectpicker form-control caja1' id='facultad' data-width='' data-live-search='true' data-style='btn btn-primary' data-size='5' tabindex='1'>"
                                          . "     <option value='0'>Selecciona la facultad</option>"
                                          . "     </select></div>";
                                $opciones .="<br>";
                                $opciones .= "<select class='selectpicker form-control caja1' id='programa' data-width='' data-live-search='true' data-style='btn btn-primary' data-size='5' tabindex='1'>"
                                          . "     <option value='0'>Selecciona la carrera que estudias</option>"
                                          . "     </select></div>";
                                $opciones .="</div><br><br>";
                                $pregunta_combo_universidad[] = array("id"=>'facultad', "tipo"=>"combo", "numero"=>$pre['num_pregunta']);
                                $pregunta_combo_universidad[] = array("id"=>'programa', "tipo"=>"combo", "numero"=>$pre['num_pregunta']);
                                 break;
                            }
                            case 9:/*PREGUNTA TIPO SEMESTRE*/
                            {
                                $opciones .= "<div id='".$pre['num_pregunta']."' class='pregunta_tipo_".$pre['id_tipo']."'><label>".$pre['num_pregunta'].".".$pre['texto_pregunta']."</label><br><br>";
                                $opciones .= "<select class='selectpicker form-control caja1' id='semestre' data-width='' data-live-search='true' data-style='btn btn-primary' data-size='5' tabindex='1'>"
                                          . "     <option value='0'>Seleccione la cantidad de semestres cursados</option>"                                          
                                          . "     <option value='3'>3</option>"
                                          . "     <option value='4'>4</option>"
                                          . "     <option value='5'>5</option>"
                                          . "     <option value='6'>6</option>"
                                          . "     <option value='7'>7</option>"
                                          . "     <option value='8'>8</option>"
                                          . "     <option value='9'>9</option>"
                                          . "     <option value='10'>10</option>"
                                          . "     <option value='11'>11 o m&aacute;s</option>"
                                          . "     </select></div>";
                                $opciones .="<br></div>";                                
                                $pregunta_combo_semestre[] = array("id"=>'semestre', "tipo"=>"combo", "numero"=>$pre['num_pregunta']);
                                break;
                                
                            }
                            case 10:/*PREGUNTA TIPO COMBINADO*/
                            {
                                $opciones .= "<div id='".$pre['num_pregunta']."' class='pregunta_tipo_".$pre['id_tipo']."'><label>".$pre['num_pregunta'].".".$pre['texto_pregunta']."</label><br><br>";
                                $p = 0;
                                    for ($i = 0; $i < count($filas_pregunta_tabla); $i++) 
                                    {
                                        if($filas_pregunta_tabla[$i]['etiqueta_opcion'] == 'Toda la vida')
                                        {
                                            $opciones .= "<label><input type='radio' class='unica_respuesta' id='".$pre['num_pregunta'].($i + 1)."' name='radios".$pre['num_pregunta']."[]' value='".$this->sanear_string($filas_pregunta_tabla[$i]['etiqueta_opcion'])."'> ".$filas_pregunta_tabla[$i]['etiqueta_opcion']."</label><br>";                                              
                                        }
                                        
                                        if($this->sanear_string($filas_pregunta_tabla[$i]['etiqueta_opcion']) == 'anos')
                                        {
                                            $opciones .= "<label><input type='radio' class='unica_respuesta' id='".$pre['num_pregunta'].($i + 1)."' name='radios".$pre['num_pregunta']."[]' value='".$this->sanear_string($filas_pregunta_tabla[$i]['etiqueta_opcion'])."'> ".$filas_pregunta_tabla[$i]['etiqueta_opcion']."</label><input type=text class='form-control cajatiempo' placeholder='ingrese un valor' id='cajita".$pre['num_pregunta'].($i + 1)."'><br>";
                                            $pregunta_anios_meses[] = array("name"=>"radios".$pre['num_pregunta'], "id"=>"cajita".$pre['num_pregunta'].($i + 1), "numero"=>$pre['num_pregunta']); 
                                        }                                        
                                        if($this->sanear_string($filas_pregunta_tabla[$i]['etiqueta_opcion']) == 'meses')
                                        {
                                            //$opciones .= "<label><input type='radio' class='unica_respuesta' id='".$pre['num_pregunta'].($i + 1)."' name='radios".$pre['num_pregunta']."[]' value='".$this->sanear_string($filas_pregunta_tabla[$i]['etiqueta_opcion'])."'> ".$filas_pregunta_tabla[$i]['etiqueta_opcion']."</label><input type=text class='form-control' placeholder='ingrese un valor' id='cajita".$pre['num_pregunta'].($i + 1)."'><br>";                                              
                                            $opciones .= "<label class='cajatiempo'>".$this->sanear_string($filas_pregunta_tabla[$i]['etiqueta_opcion'])."</label><input type=text class='form-control cajatiempo' placeholder='ingrese un valor' id='cajita".$pre['num_pregunta'].($i + 1)."'><br>";                                              
                                            $pregunta_anios_meses[] = array("name"=>"radios".$pre['num_pregunta'], "id"=>"cajita".$pre['num_pregunta'].($i + 1), "numero"=>$pre['num_pregunta']); 
                                        }
                                       
                                    }
                                    $pregunta_radio[] = array("name"=>"radios".$pre['num_pregunta'], "t"=>"radio", "numero"=>$pre['num_pregunta']);
                                    $opciones .="</div><br>";
                                 break;
                            }
                            default :
                            {
                               /*echo 'TIPO NO ADECUADO';*/
                            }
                        }/*fin swicht*/
                    //$opciones .="<hr><br>";              
                  endforeach;/*FIN FOR PREGUNTAS*/                  
                  
                    session_start();
                    $opciones .="<div><center><h4>Usted se encuentra en el modulo ".$id_modulo." de ".$cantidad_de_modulos[0]['num']." <h3></center></div>";
                    $opciones .="<hr><br>";                      
                    $opciones .= "<div><center><a href='#' id='sig_mod' class='btn btn-primary'>Siguiente Modulo</a></center></div></div> ";                    
                    echo $opciones;
              }/*fin preguntas mayor que cero*/
              else{}
          }/*fin si modulos*/
          else
          {}
             
  }
  
  
  function sanear_string($string_a_sanear) {

        $string_a_sanear = trim($string_a_sanear);

        $string_a_sanear = str_replace(
                array('á', 'à', 'ä', 'â', 'ª', 'Á', 'À', 'Â', 'Ä'), array('a', 'a', 'a', 'a', 'a', 'A', 'A', 'A', 'A'), $string_a_sanear
        );

        $string_a_sanear = str_replace(
                array('é', 'è', 'ë', 'ê', 'É', 'È', 'Ê', 'Ë'), array('e', 'e', 'e', 'e', 'E', 'E', 'E', 'E'), $string_a_sanear
        );

        $string_a_sanear = str_replace(
                array('í', 'ì', 'ï', 'î', 'Í', 'Ì', 'Ï', 'Î'), array('i', 'i', 'i', 'i', 'I', 'I', 'I', 'I'), $string_a_sanear
        );

        $string_a_sanear = str_replace(
                array('ó', 'ò', 'ö', 'ô', 'Ó', 'Ò', 'Ö', 'Ô'), array('o', 'o', 'o', 'o', 'O', 'O', 'O', 'O'), $string_a_sanear
        );

        $string_a_sanear = str_replace(
                array('ú', 'ù', 'ü', 'û', 'Ú', 'Ù', 'Û', 'Ü'), array('u', 'u', 'u', 'u', 'U', 'U', 'U', 'U'), $string_a_sanear
        );

        $string_a_sanear = str_replace(
                array('ñ', 'Ñ', 'ç', 'Ç'), array('n', 'N', 'c', 'C',), $string_a_sanear
        );

        //Esta parte se encarga de eliminar cualquier caracter extraño
        $string_a_sanear = str_replace(
                array("\\", "¨", "º", "-", "~",
            "#", "@", "|", "!", "\"",
            "·", "$", "%", "&", "/", "”", "“",
            "(", ")", "?", "'", "¡",
            "¿", "[", "^", "`", "]",
            "+", "}", "{", "¨", "´",
            ">", "< ", ";", ",", ":",
            "."), '', $string_a_sanear
        );

        return $string_a_sanear;
    }
  /*******************************************************************************************************************************/
    public function guardarEncuestas($titulo, $id_usuario, $estado, $bandera, $consentimiento, $id_encuesta )
    {
      $unaEncuesta =  new encuesta();
      
      switch ($bandera)
      {
          case "adicionar":
          {
              $insertado = $unaEncuesta->adicionarEncuestas($titulo, $id_usuario, $estado, $consentimiento);           
              
              if (count($insertado) > 0)
                  {
                  $_SESSION['id_encuesta'] = $insertado[0];
                  $_SESSION['nombre_encuesta'] = $insertado[1];                            
                  header('location: app/views/default/modules/encuestas/adicionar_modulo.php');
                  }
                  else
                  {
                      header('location: app/views/default/modules/encuestas/no_guardado.php');
                  }
                  
                  break;
           }
          case "editar":
          {
              $actualizado = $unaEncuesta->actualizarEncuestas($titulo, $id_usuario, $estado, $consentimiento, $id_encuesta);
              if ($actualizado > 0)
              {
                  $_SESSION['id_encuesta_a_editar'] = $id_encuesta;
                  $_SESSION['nombre_encuesta_a_editar'] = $titulo;  
                  $_SESSION['estado_encuesta_a_editar'] = $estado;  
                  header('location: app/views/default/modules/encuestas/editar_modulo.php');
              }
              else
              {
                  header('location: app/views/default/modules/encuestas/no_guardado.php');
                  //echo $titulo.",".$id_usuario.", ".$estado.",".$bandera.",".$consentimiento.",".$id_encuesta;
              }
              break;
          }
          default :
          {
             break;
          }
       }/*fin switch*/      
    } 
  
  public function guardarModulo($id_encuesta, $modulo, $bandera, $numero_modulo )
  {
      $unaEncuesta =  new encuesta();      
           
      switch ($bandera)
      {
        case "adicionar":
        {
            $insertado = $unaEncuesta->adicionarModulo($id_encuesta, $modulo);            
            if (count($insertado) > 0)
            {
                $_SESSION['id_modulo'] = $insertado[0];
                $_SESSION['nombre_modulo'] = $insertado[1];                
                
                $insertado1 = $unaEncuesta->adicionarModulo_A_Encuesta($id_encuesta, $insertado[0], $bandera); 
                    if ($insertado1 > 0)
                    {
                        header('location: app/views/default/modules/encuestas/adicionar_pregunta.php');
                        $valor_a_retornar = 1;
                    }
                    else
                    {
                        header('location: app/views/default/modules/encuestas/no_guardado.php');
                    }
            }
            else
            {
                  header('location: app/views/default/modules/encuestas/no_guardado.php');
            }
            break;
        }         
        case "editar":
        {            
            $actualizado = $unaEncuesta->actualizarModulo($id_encuesta, $modulo);
              if ($actualizado > 0)
              {
                  $_SESSION['id_modulo_encuesta_a_editar'] = $id_encuesta;                  
                  $_SESSION['nombre_modulo_encuesta_a_editar'] = $modulo;                  
                  $_SESSION['numero_modulo_encuesta_a_editar'] = $numero_modulo;                  
                  header('location: app/views/default/modules/encuestas/editar_pregunta.php');
              }
              else
              {
                  header('location: app/views/default/modules/encuestas/no_guardado.php');                  
              }
            break;
        }
        default :
        {
            
        }        
      }/*FIN SWITCH*/
      echo $valor_a_retornar;
  }
  
  public function guardarPregunta($id_encuesta, $id_modulo, $texto_pregunta, $tipo_pregunta, $opciones, $cantidad_columnas, $opciones_columna, $cantidad_filas, $fil_pregunta_tipo1, $col_pregunta_tipo1)
  {
      $unaEncuesta =  new encuesta(); 
      $v1 = (int) $fil_pregunta_tipo1;
      $v2 = (int) $col_pregunta_tipo1;
      //echo "-->".$id_encuesta.", ".$id_modulo.", ".$texto_pregunta.", ".$tipo_pregunta.", ".$opciones.", ".$cantidad_columnas.", ".$opciones_columna.", ".$cantidad_filas.",-->".$fil_pregunta_tipo1.",-->".$col_pregunta_tipo1;

      switch ($tipo_pregunta) 
      {
                case 1:/*pregunta de seleccion multiple con unica respuesta*/
                {
                      $id_pregunta = $unaEncuesta->adicionarPregunta($id_encuesta, $id_modulo, $texto_pregunta, $tipo_pregunta, $opciones);           
                      if (count($id_pregunta) > 0)/*INSERTA LA PREGUNTA*/
                      {
                          if (($v1 > 0) && ($v2 > 0))
                          {
                              $s = $unaEncuesta->adicionarPresentacionPregunta($id_pregunta[0], $v1, $v2);
                          }
                          
                          $arreglo_opciones = explode("\n", $opciones);          
                          $conjunto_id_opciones = $unaEncuesta->adicionarOpcionesdeRespuesta($arreglo_opciones);          

                          if (count($conjunto_id_opciones) > 0) /*INSERTA LA OPCIONES DE RESPUESTA*/
                          {
                              $r = $unaEncuesta->adicionarOpciones_a_la_Pregunta( $conjunto_id_opciones, $id_pregunta[0]);/*RELACIONAS LAS OPCIONES CON LA PREGUNTA*/
                              echo $r;                              
                          }
                      }
                      else
                      {
                          echo 0;
                      }
                      break;
                }
                case 2:/*seleccion multiple con multiple respuesta*/
                {
                    $id_pregunta = $unaEncuesta->adicionarPregunta($id_encuesta, $id_modulo, $texto_pregunta, $tipo_pregunta, $opciones);           
                      if (count($id_pregunta) > 0)/*INSERTA LA PREGUNTA*/
                      {
                          if (($v1 > 0) && ($v2 > 0))
                          {
                              $s = $unaEncuesta->adicionarPresentacionPregunta($id_pregunta[0], $v1, $v2);
                          }
                          
                          $arreglo_opciones = explode("\n", $opciones);          
                          $conjunto_id_opciones = $unaEncuesta->adicionarOpcionesdeRespuesta($arreglo_opciones);          

                          if (count($conjunto_id_opciones) > 0) /*INSERTA LA OPCIONES DE RESPUESTA*/
                          {
                              $r = $unaEncuesta->adicionarOpciones_a_la_Pregunta( $conjunto_id_opciones, $id_pregunta[0]);/*RELACIONAS LAS OPCIONES CON LA PREGUNTA*/
                              echo $r;
                          }
                      }
                      else
                      {
                          echo '0';
                      }

                    break;
                }
                case 3:/*pregunta abierta*/
                {
                    $id_pregunta = $unaEncuesta->adicionarPregunta($id_encuesta, $id_modulo, $texto_pregunta, $tipo_pregunta);
                    break;
                }
                case 4:/*pregunta fecha*/
                {
                    $id_pregunta = $unaEncuesta->adicionarPregunta($id_encuesta, $id_modulo, $texto_pregunta, $tipo_pregunta);
                    break;
                }
                case 5:/*pregunta tabla*/
                {
                    /*INSERTO LA PREGUNTA EN LA TABLA PREGUNTA TIPO TABLA*/
                    $id_pregunta = $unaEncuesta->adicionarPregunta($id_encuesta, $id_modulo, $texto_pregunta, $tipo_pregunta, $opciones);
                    if (count($id_pregunta) > 0)
                    {
                        print 'paso el primer if';
                        /*SE INSERTA UN REGISTRO EN  PREGUNTA TIPO TABLA*/
                        $id_pregunta_tipo_tabla = $unaEncuesta->adicionarPreguntaTipoTabla($id_pregunta[0], $cantidad_filas, $cantidad_columnas);
                                                
                        if (count($id_pregunta_tipo_tabla) > 0)
                        {
                            print 'paso el segundo if';
                            /*SE DIVIDE LA CADENA DE OPCIONES PARA LAS COLUMNAS*/
                            $arreglo_opciones_columna_pregunta_tipo_tabla = explode("\n", $opciones_columna);
                            
                            /*SE INSERTAN LAS OPCIONES DE LAS COLUMNAS*/
                            $conjunto_id_opciones_columna_pregunta_tipo_tabla= $unaEncuesta->adicionarOpcionesdeRespuestaPreguntaTipoTabla($id_pregunta_tipo_tabla[0], $arreglo_opciones_columna_pregunta_tipo_tabla);
                                                        

                            if (count($conjunto_id_opciones_columna_pregunta_tipo_tabla) > 0)
                            {
                                print 'paso el tercero if';
                               /*SE DIVIDE LA CADENA DE OPCIONES PARA LAS FILAS*/
                               $arreglo_filas_con_las_opciones_de_respuesta = explode("\n", $opciones);          
                               /**/
                               $conjunto_id_opciones_fila_pregunta_tipo_tabla = $unaEncuesta->adicionarOpcionesdeRespuesta($arreglo_filas_con_las_opciones_de_respuesta);

                               if (count($conjunto_id_opciones_fila_pregunta_tipo_tabla) > 0)
                               {
                                   print 'paso el cuarto if';
                                   $r = $unaEncuesta->adicionarOpciones_a_la_Pregunta( $conjunto_id_opciones_fila_pregunta_tipo_tabla, $id_pregunta[0]);/*RELACIONAS LAS OPCIONES CON LA PREGUNTA*/
                                   echo $r;
                               }/*fin si opciones fila de la pregunta tipo tabla*/
                            }/*fin si opciones columna de pregunta tipo tabla*/
                        }/*fin si pregunta tipo tabla*/
                    }/*fin si id pregunta*/
                    break;
                }
                case 6:/*pregunta enunciado*/
                {
                    $id_pregunta = $unaEncuesta->adicionarPregunta($id_encuesta, $id_modulo, $texto_pregunta, $tipo_pregunta);
                    break;
                }
                case 7:/*pregunta enunciado*/
                {
                    $id_pregunta = $unaEncuesta->adicionarPregunta($id_encuesta, $id_modulo, $texto_pregunta, $tipo_pregunta);
                    break;
                }
                case 8:/*pregunta enunciado*/
                {
                    $id_pregunta = $unaEncuesta->adicionarPregunta($id_encuesta, $id_modulo, $texto_pregunta, $tipo_pregunta);
                    break;
                }
                case 9:/*pregunta enunciado*/
                {
                    $id_pregunta = $unaEncuesta->adicionarPregunta($id_encuesta, $id_modulo, $texto_pregunta, $tipo_pregunta);
                    break;
                }
                case 10:/*pregunta combinada se muestra una opcion radio y otra con una caja de texto*/
                {                    
                    $id_pregunta = $unaEncuesta->adicionarPregunta($id_encuesta, $id_modulo, $texto_pregunta, $tipo_pregunta, $opciones);           
                      if (count($id_pregunta) > 0)/*INSERTA LA PREGUNTA*/
                      {
                          if (($v1 > 0) && ($v2 > 0))
                          {
                              $s = $unaEncuesta->adicionarPresentacionPregunta($id_pregunta[0], $v1, $v2);
                          }
                          
                          $arreglo_opciones = explode("\n", $opciones);          
                          $conjunto_id_opciones = $unaEncuesta->adicionarOpcionesdeRespuesta($arreglo_opciones);          

                          if (count($conjunto_id_opciones) > 0) /*INSERTA LA OPCIONES DE RESPUESTA*/
                          {
                              $r = $unaEncuesta->adicionarOpciones_a_la_Pregunta( $conjunto_id_opciones, $id_pregunta[0]);/*RELACIONAS LAS OPCIONES CON LA PREGUNTA*/
                              echo $r;                              
                          }
                      }
                      else
                      {
                          echo 0;
                      }
                      break;                    
                }
                default:
                {
                    echo "NO SE HA ESTIPULADO EL TIPO";              
                }          
          }/*fin swicht*/
  }
  
  
  
  public function guardarPregunta1($id_encuesta, $id_modulo, $id_pregunta, $texto_pregunta, $ids_opciones, $opciones_editar, $ids_col, $opciones_columnas_tipo5, $tipo_pregunta, $id_registro_tipo_tabla,  $cantidad_columnas_tipo5, $cantidad_filas_tipo5, $id_registro_presentacion, $cantidad_columnas_presentacion, $cantidad_filas_presentacion, $numero_pregunta_vinculada, $numero_modulo, $bandera_pregunta)
  {
      $unaEncuesta =  new encuesta(); 
      $columnas_tipo5 = (int) $cantidad_columnas_tipo5;
      $filas_tipo5 = (int) $cantidad_filas_tipo5;
      $columnas_presentacion = (int) $cantidad_columnas_presentacion;
      $filas_presentacion = (int) $cantidad_filas_presentacion;
      $numero_pregunta_salto = (int) $numero_pregunta_vinculada;
      //echo "-->".$id_encuesta.", ".$id_modulo.", ".$pregunta.", ".$texto_pregunta.", ".$ids_opciones.", ".$opciones_editar.", ".$ids_col.", ".$opciones_columnas_tipo5.", ".$tipo_pregunta.", ".$id_registro_tipo_tabla.", ".$cantidad_columnas_tipo5.", ".$cantidad_filas_tipo5.", ".$id_registro_presentacion.", ".$cantidad_columnas_presentacion.", ".$cantidad_filas_presentacion.", ".$numero_pregunta_vinculada.", ".$bandera_pregunta;

      /*
      for($i=0; $i< count($ids_opciones); $i++) 
      {   
      echo $ids_opciones[$i].", ".$opciones_editar[$i]."<br>";
      } 
      
      for($i=0; $i< count($ids_col); $i++) 
      {   
      echo $ids_col[$i].", ".$opciones_columnas_tipo5[$i]."<br>";
      } */
      switch ($bandera_pregunta) 
      {
          case "adicionar":
          {
              
          }
          case "editar":
          {
          
                switch ($tipo_pregunta) 
                {
                          case 1:/*pregunta de seleccion multiple con unica respuesta*/
                          {
                                $actualizado = $unaEncuesta->actualizarPregunta($id_pregunta, $id_modulo, $texto_pregunta, $tipo_pregunta);           
                                if ($actualizado > 0)/*INSERTA LA PREGUNTA*/
                                {
                                    /*ACTUALIZA LAS OPCIONES DE LA PREGUNTA*/
                                    for($i=0; $i< count($ids_opciones); $i++) 
                                    { 
                                        $unaEncuesta->actualizarOpcionesPregunta($ids_opciones[$i], $opciones_editar[$i]);
                                        //echo $ids_opciones[$i].", ".$opciones_editar[$i]."<br>";
                                    }
                                    
                                    if (($columnas_presentacion > 0) && ($filas_presentacion > 0))
                                    {
                                        $s = $unaEncuesta->actualizarFilasYColumnasPresentacionPregunta($id_pregunta, $columnas_presentacion, $filas_presentacion);
                                    }                                    
                                }
                                else
                                {
                                    echo 0;
                                }
                                header('location:app/views/default/modules/encuestas/mostrar_encuesta.php?id_encuesta='.$id_encuesta.'&id_modulo='.$numero_modulo);
                                break;
                          }
                          case 2:/*pregunta de seleccion multiple con multiple respuesta*/
                          {
                                $actualizado = $unaEncuesta->actualizarPregunta($id_pregunta, $id_modulo, $texto_pregunta, $tipo_pregunta);           
                                if ($actualizado > 0)/*INSERTA LA PREGUNTA*/
                                {
                                    /*ACTUALIZA LAS OPCIONES DE LA PREGUNTA*/
                                    for($i=0; $i< count($ids_opciones); $i++) 
                                    { 
                                        $unaEncuesta->actualizarOpcionesPregunta($ids_opciones[$i], $opciones_editar[$i]);
                                        //echo $ids_opciones[$i].", ".$opciones_editar[$i]."<br>";
                                    }
                                    
                                    if (($columnas_presentacion > 0) && ($filas_presentacion > 0))
                                    {
                                        $s = $unaEncuesta->actualizarFilasYColumnasPresentacionPregunta($id_pregunta, $columnas_presentacion, $filas_presentacion);
                                    }                                    
                                }
                                else
                                {
                                    echo 0;
                                }
                                header('location:app/views/default/modules/encuestas/mostrar_encuesta.php?id_encuesta='.$id_encuesta.'&id_modulo='.$numero_modulo);
                                break;
                          }
                          case 3:/*pregunta tipo 3 pregunta abierta*/
                          {
                            $actualizado = $unaEncuesta->actualizarPregunta($id_pregunta, $id_modulo, $texto_pregunta, $tipo_pregunta);
                            if ($actualizado > 0)/*INSERTA LA PREGUNTA*/
                            {
                                header('location:app/views/default/modules/encuestas/mostrar_encuesta.php?id_encuesta='.$id_encuesta.'&id_modulo='.$numero_modulo);
                            }
                            else
                            {
                                echo 'O SE PUDO';
                            }
                            
                            break;
                          }
                          case 4:/*pregunta tipo 4 regunta fecha*/
                          {
                            $actualizado = $unaEncuesta->actualizarPregunta($id_pregunta, $id_modulo, $texto_pregunta, $tipo_pregunta);
                            header('location:app/views/default/modules/encuestas/mostrar_encuesta.php?id_encuesta='.$id_encuesta.'&id_modulo='.$numero_modulo);
                            break;
                          }
                          case 5:/*pregunta tipo 5 pregunta tabla*/
                          {
                            $actualizado = $unaEncuesta->actualizarPregunta($id_pregunta, $id_modulo, $texto_pregunta, $tipo_pregunta);
                            if ($actualizado > 0)/*INSERTA LA PREGUNTA*/
                            {
                                /*ACTUALIZA LAS OPCIONES FILA DE LA PREGUNTA TABLA*/
                                    for($i=0; $i< count($ids_opciones); $i++) 
                                    { 
                                        $unaEncuesta->actualizarOpcionesPregunta($ids_opciones[$i], $opciones_editar[$i]);
                                        //echo $ids_opciones[$i].", ".$opciones_editar[$i]."<br>";
                                    }
                                    /*ACTUALIZA LAS OPCIONES COLUMNA DE LA PREGUNTA TABLA*/
                                    for($i=0; $i< count($ids_col); $i++) 
                                    {   
                                        $unaEncuesta->actualizarOpcionesColumnaPregunta($id_registro_tipo_tabla, $ids_col[$i], $opciones_columnas_tipo5[$i]);
                                    }
                            }
                            header('location:app/views/default/modules/encuestas/mostrar_encuesta.php?id_encuesta='.$id_encuesta.'&id_modulo='.$numero_modulo);
                            break;
                          }
                          case 6:/*pregunta tipo 6 pregunta enunciado*/
                          {
                            $actualizado = $unaEncuesta->actualizarPregunta($id_pregunta, $id_modulo, $texto_pregunta, $tipo_pregunta);
                            header('location:app/views/default/modules/encuestas/mostrar_encuesta.php?id_encuesta='.$id_encuesta.'&id_modulo='.$numero_modulo);
                            break;
                          }
                          case 7:/*pregunta tipo 7 pregunta ubicacion*/
                          {
                            $actualizado = $unaEncuesta->actualizarPregunta($id_pregunta, $id_modulo, $texto_pregunta, $tipo_pregunta);
                            header('location:app/views/default/modules/encuestas/mostrar_encuesta.php?id_encuesta='.$id_encuesta.'&id_modulo='.$numero_modulo);
                            break;
                          }
                          case 8:/*pregunta tipo 8 pregunta universidad*/
                          {
                            $actualizado = $unaEncuesta->actualizarPregunta($id_pregunta, $id_modulo, $texto_pregunta, $tipo_pregunta);
                            header('location:app/views/default/modules/encuestas/mostrar_encuesta.php?id_encuesta='.$id_encuesta.'&id_modulo='.$numero_modulo);
                            break;
                          }
                          case 9:/*pregunta tipo 9 pregunta semestre*/
                          {
                            $actualizado = $unaEncuesta->actualizarPregunta($id_pregunta, $id_modulo, $texto_pregunta, $tipo_pregunta);
                            header('location:app/views/default/modules/encuestas/mostrar_encuesta.php?id_encuesta='.$id_encuesta.'&id_modulo='.$numero_modulo);
                            break;
                          }
                          case 10:/*pregunta tipo 10 pregunta combinada*/
                          {
                            $actualizado = $unaEncuesta->actualizarPregunta($id_pregunta, $id_modulo, $texto_pregunta, $tipo_pregunta);
                            if ($actualizado > 0)/*INSERTA LA PREGUNTA*/
                                {
                                    /*ACTUALIZA LAS OPCIONES DE LA PREGUNTA*/
                                    for($i=0; $i< count($ids_opciones); $i++) 
                                    { 
                                        $unaEncuesta->actualizarOpcionesPregunta($ids_opciones[$i], $opciones_editar[$i]);
                                        //echo $ids_opciones[$i].", ".$opciones_editar[$i]."<br>";
                                    }                             
                                }
                                else
                                {
                                    echo 0;
                                }
                            header('location:app/views/default/modules/encuestas/mostrar_encuesta.php?id_encuesta='.$id_encuesta.'&id_modulo='.$numero_modulo);
                            break;
                          }
                          default:
                          {
                              echo "NO SE HA ESTIPULADO EL TIPO";  
                              break;
                          }          
                    }/*fin swicht*/         
       
         break;           
        }/*fin case editar*/
       default:
       {
           echo 'NO SE ENCONTRO LA OPCION'; 
           break;
       }

 }/*fin swicht adicionar editar*/
   
  
 }/*fin funcion*/
  
  public function guardarVinculos($id_encuesta, $id_modulo, $id_pregunta, $opcion, $vinculo, $bandera )
    { 
      $unaEncuesta =  new encuesta();
      //echo $id_encuesta.", ".$id_modulo.", ".$id_pregunta.", ".$opcion.", ".$vinculo.", ".$bandera;
      switch ($bandera)
      {
          case "adicionar":
          {
              $insertado = $unaEncuesta->adicionarVinculos($id_encuesta, $id_pregunta, $opcion, $vinculo);           
              print_r($insertado);
              if ($insertado > 0)
                  {
                    header('location: app/views/default/modules/encuestas/listado.php');
                  }
                  else
                  {
                    header('location: app/views/default/modules/encuestas/vincular_preguntas.php');
                  }                  
                  break;
           }
          case "editar":
          {
              break;
          }
          default :
          {
             break;
          }
       }/*fin switch*/      
    } 
  
  
   public function miPerfil($id, $nombre, $apellidos, $contrasena)
   {
       $unaEncuesta =  new encuesta();  
        
        $resultado = $unaEncuesta->actualizar_perfil($id, $nombre, $apellidos, $contrasena);
        if ($resultado > 0)
        {
            $_SESSION['actualizar'] = $resultado;
            $tsArray = $unaEncuesta->encontrar_Usuario($id);    
            if(count($tsArray) > 0)
            {
                $_SESSION['usuario_completo'] = $tsArray;             
            }
           header('location:app/views/default/modules/encuestas/mi_perfil.php');
        }        
   }
  /*************************************************************************************************************************************/
  public function modulo()
  {         
      header('location:app/views/default/modules/encuestas/adicionar_modulo.php');
  } 
  public function pregunta()
  {         
      header('location:app/views/default/modules/encuestas/adicionar_pregunta.php');
  }
  public function menu()
  {         
      header('location:menu_principal.php');
  }
  
//  
//    public function listado()
//   {
//        $unaEncuesta = new encuesta();
//        
//        $pagina=$this->load_template_content_editor('LISTADO DE USUARIOS', 'layout_encuestas.php');                        
//        $content = $this->load_page('app/views/default/sections/content_editor.php');
//        $menu_left = $this->load_page('app/views/default/sections/menu_left_editor.php');
//        $buscador = $this->load_page('app/views/default/modules/encuestas/listado.php');
//        ob_start();        
//        $tsArray = $unaEncuesta->consultaEncuestas();         
//        if($tsArray != '')
//        {      
//            $titulo = 'Resultado de busqueda';
//            include 'app/views/default/modules/encuestas/table_encuestas.php';
//            $table = ob_get_clean();                      
//       $cont = $this->replace_content('/\#MENULEFT\#/ms' ,$menu_left, $content);       
//       $contenido = $this->replace_content('/\#CONTENT\#/ms' ,$buscador.$table, $cont);  
//       $pagina = $this->replace_content('/\#CONTENIDO\#/ms' ,$contenido, $pagina);       
//      }
//      else
//      {//si no existen datos -> muestra mensaje de error
//        $pagina = $this->replace_content('/\#CONTENIDO\#/ms' ,$buscador.'<h1>No existen resultados</h1>' , $pagina);
//      }
//      $this->view_page($pagina);
//   }
//   
//   public function adicionar()
//   {        
//        $unaEncuesta = new encuesta();   
//        
//        $pagina=$this->load_template_content_editor('REGISTRAR ENCUESTAS', 'layout_encuestas.php'); 
//        ob_start();        
//         $tsArray = $unaEncuesta->consultaCategorias();
//        if($tsArray != '')
//        {      
//            $titulo = 'NUEVA ENCUESTA';
//             include 'app/views/default/modules/encuestas/form.php';
//             $ejecutado = ob_get_clean();                                      
//             $pagina = $this->replace_content('/\#CONTENIDO\#/ms' ,$ejecutado, $pagina);    
//        }
//        else
//        {
//            $pagina = $this->replace_content('/\#CONTENIDO\#/ms' ,$adicionar.'<h1>No existen resultados</h1>' , $pagina);
//        }
//        $this->view_page($pagina);
//   }
//   
//
//      
//   public function reiniciarIdPregunta()
//   {
//       $unaEncuesta =  new encuesta();              
//       $unaEncuesta->reiniciarNumeroPregunta();
//   }
//    public function guardarEncuesta($titulo, $id_usuario, $categoria, $id_modulo)
//   {       
//       $unaEncuesta =  new encuesta();              
//       $this->reiniciarIdPregunta();
//            
//       $adicionarEncuesta = $unaEncuesta->adicionarEncuesta($titulo, $id_usuario, $categoria);                     
//      
//       if ($adicionarEncuesta != '')
//        {  
//           $_SESSION['id_encuesta'] = $adicionarEncuesta[0]['id_encuesta'];
//           $_SESSION['id_modulo'] = 1;
//           $this->encuestaModulo($adicionarEncuesta[0]['id_encuesta'], $id_modulo);                      
//           header('location:indice_encuestas.php?action=cargar_encuesta');
//        }
//   }
//   
////   public function adicionar_pregunta()
////   {        
////        $unaEncuesta = new encuesta(); 
////        $pagina=$this->load_template_content_editor('REGISTRAR ENCUESTAS', 'layout_encuestas.php');
////        $editar = $this->load_page('app/views/default/modules/encuestas/editar.php');        
////        ob_start();        
////        $tsArray1 = $unaEncuesta->consultaTipoPregunta();
////        if($tsArray1 != '')
////        {   
////            $titulo = 'NUEVA PREGUNTA1';
////             include 'app/views/default/modules/encuestas/form1.php';
////             $ejecutado = ob_get_clean();             
////             $e = $this->replace_content('/\#FORMULARIO\#/ms' ,$ejecutado, $editar);              
////             $pagina = $this->replace_content('/\#CONTENIDO\#/ms' ,$e, $pagina);  
////        }  
////        else
////        {
////            $pagina = $this->replace_content('/\#FORMULARIO\#/ms' ,$ejecutado.'<h1>No existen resultados</h1>' , $pagina);
////        }
////        //header('Location:indice_encuestas.php?action=pregunta');
////        $this->view_page($pagina);
////    }   
//   public function save()
//   {
//       echo 'con opciones';       
//   }
//   public function buscarEncuesta($id_encuesta)
//   {
//       $unaEncuesta = new encuesta();       
//       $unaEncuesta1 = new encuesta();       
//       $unaEncuesta2 = new encuesta();       
//       $pagina=$this->load_template_content_editor('REGISTRAR ENCUESTAS', 'layout_encuestas.php');
//       $editar = $this->load_page('app/views/default/modules/encuestas/editar.php');
//       //CARGA EL TITULO DE LA ENCUESTA
//       ob_start();    
//        $tsArray = $unaEncuesta->buscaEncuesta($id_encuesta);                
//        if ($tsArray != '') 
//            {                
//                 include 'app/views/default/modules/encuestas/secciones/titulo_encuesta.php';                  
//                 $ejecutado1 = ob_get_contents();                                   
//                 $editar = $this->replace_content('/\#UNO\#/ms' ,$ejecutado1, $editar);                                     
//            }                                   
//        //CARGA EL FORMULARIO PARA CREAR LAS PREGUNTAS
//        $tsArray1 = $unaEncuesta1->consultaTipoPregunta();            
//        if ($tsArray1 != '') 
//            {    
//                $titulo ='Registro de preguntas';
//                 include 'app/views/default/modules/encuestas/form1.php'; 
//                 //$ejecutado2 = ob_get_contents();
//                 $ejecutado2 = ob_get_clean();
//                 
//                 $editar = $this->replace_content('/\#FORMULARIO\#/ms' ,$ejecutado2, $editar);
//                 //$pagina = $this->replace_content('/\#CONTENIDO\#/ms' ,$editar, $pagina);  
//            }
//        //CARGA LAS PREGUNTAS REGISTRADAS
//            ob_start();
//            $tsArray2 = $unaEncuesta2->EncuestaCompleta($id_encuesta);
//            if ($tsArray2 != '') 
//            { 
//                
//                //print_r($tsArray2);
//                 include 'app/views/default/modules/encuestas/mostrar_encuesta.php'; 
//                 $ejecutado3 = ob_get_clean();
//                 $editar = $this->replace_content('/\#VALORES\#/ms' ,$ejecutado3, $editar);
//                 //$pagina = $this->replace_content('/\#CONTENIDO\#/ms' ,$editar, $pagina);  
//            }
//            else
//            {
//                $editar = $this->replace_content('/\#VALORES\#/ms' ,"NO EXISTE INFORMACION", $editar);                
//            }
//            $pagina = $this->replace_content('/\#CONTENIDO\#/ms' ,$editar, $pagina);              
//            $this->view_page($pagina);            
//   }
//   
//   
//   public function getIdPregunta()
//   {
//       $unaEncuesta =  new encuesta();       
//       $numeroPregunta = $unaEncuesta->numeroPregunta();      
//       if ($numeroPregunta != '')
//       {    
//           return $numeroPregunta[0]['id'];
//       }
//       return 0;
//   }
//   
//   public function encuestaModulo($id_encuesta, $id_modulo)
//   {
//       $unaEncuesta =  new encuesta();       
//       $unaEncuesta->adicionarEncuestaModulo($id_encuesta, $id_modulo);       
//   }
//   
//   public function guardarOpcionesRespuesta($opciones)
//   {
//       $unaEncuesta =  new encuesta();      
//       return $unaEncuesta->adicionarOpcionesRespuesta($opciones);              
//   }
//   public function guardarOpcionesDePregunta($id_opciones, $id_pregunta)//opciones de cada pregunta
//   {
//       $unaEncuesta =  new encuesta();    
//       $unaEncuesta->adicionarOpcionesdePregunta($id_opciones, $id_pregunta);
//       
//   }
//   
//   
//   
//   
//   public function guardarOpcionRespuestaAbierta($opcion)
//   {
//       $unaEncuesta =  new encuesta();      
//       return $unaEncuesta->adicionarOpcionRespuestaAbierta($opcion);              
//   }
//   public function guardarOpcionDePreguntaAbierta($id_opcion, $id_pregunta)//opciones de cada pregunta
//   {
//       $unaEncuesta =  new encuesta();    
//       $unaEncuesta->adicionarOpciondePreguntaAbierta($id_opcion, $id_pregunta);              
//   }
//   
//   public function guardarPregunta($texto_pregunta, $id_tipo, $opciones)
//   {       
//       $unaEncuesta =  new encuesta();
//       $id_pregunta = $this->getIdPregunta();
//       if ($id_tipo === '1')//preguntas de unica respuesta
//           {                                           
//                if ($id_pregunta > 0)
//                {
//                    $adicionarPregunta = $unaEncuesta->adicionarPregunta($_SESSION['id_modulo'], $id_pregunta , $texto_pregunta, $id_tipo, $_SESSION['id_encuesta']);                           
//                         if ($adicionarPregunta != '')
//                             {                              
//                                 $id_opciones = $this->guardarOpcionesRespuesta($opciones); 
//                                 $this->guardarOpcionesDePregunta($id_opciones, $adicionarPregunta[0]['id_pregunta']);                                                                  
//                                 //header('location:indice_encuestas.php?action=cargar_encuesta');
//                             }           
//                }
//       }//FIN SI TIPO 1
//       if ($id_tipo === '2')
//       {
//           if ($id_pregunta > 0)
//                {
//                    $adicionarPregunta = $unaEncuesta->adicionarPregunta($_SESSION['id_modulo'], $id_pregunta , $texto_pregunta, $id_tipo, $_SESSION['id_encuesta']);       
//                         if ($adicionarPregunta != '')
//                             {                             
//                                $id_opciones = $this->guardarOpcionesRespuesta($opciones); 
//                                 $this->guardarOpcionesDePregunta($id_opciones, $adicionarPregunta[0]['id_pregunta']);                                 
//                                 //header('location:indice_encuestas.php?action=cargar_encuesta');
//                             }           
//                }
//       }
//       if ($id_tipo === '3')
//       {           
//           if ($id_pregunta > 0)
//                {
//                    $adicionarPregunta = $unaEncuesta->adicionarPregunta($_SESSION['id_modulo'], $id_pregunta , $texto_pregunta, $id_tipo, $_SESSION['id_encuesta']);       
//                         if ($adicionarPregunta != '')
//                             {                             
//                                $id_opcion = $this->guardarOpcionRespuestaAbierta('Abierta');
//                                $this->guardarOpcionDePreguntaAbierta($id_opcion[0]['id_opcion'], $adicionarPregunta[0]['id_pregunta']);
//                                //header('location:indice_encuestas.php?action=cargar_encuesta');
//                             }
//                }
//       }
//   }
//   public function buscarEncuestaPregunta($id_encuesta)
//   {
//       $unaEncuesta = new encuesta();       
//       $pagina=$this->load_template_content_editor('REGISTRAR ENCUESTAS', 'layout_encuestas.php');
//       $content = $this->load_page('app/views/default/sections/content_editor.php');
//       $menu_left = $this->load_page('app/views/default/sections/menu_left_editor.php');       
//       $editar = $this->load_page('app/views/default/modules/encuestas/editar.php');
//       ob_start();         
//        $tsArray = $unaEncuesta->EncuestaCompleta($id_encuesta);
//        if($tsArray!='')
//        {
//            //print_r($tsArray);
//                $titulo = '';
//                include 'app/views/default/modules/encuestas/mostrar_encuesta.php'; 
//                 $ejecutado = ob_get_clean();
//                 
//                 
//                 $con = $this->replace_content('/\#VALORES\#/ms' ,$ejecutado, $editar);   
//                 $cont = $this->replace_content('/\#MENULEFT\#/ms' ,$menu_left, $content);                         
//                 $contenido = $this->replace_content('/\#CONTENT\#/ms' ,$cont, $content);  
//                 $c = $this->replace_content('/\#CONTENT\#/ms' ,$con, $contenido);  
//                 $pagina = $this->replace_content('/\#CONTENIDO\#/ms' ,$c, $pagina);  
//        }
//        else
//        {
//            $pagina = $this->replace_content('/\#CONTENIDO\#/ms' ,$ejecutado.'<h1>No existen resultados</h1>' , $pagina);
//        }
//        $this->view_page($pagina);
//   }
//   
//   
//   
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
//   
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
//   
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
//
//   
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
//   
//   public function graficobarras()
//   {      
//        $graficos = new graficos();
//        
//        $pagina=$this->load_template_content_editor('REGISTRAR ENCUESTAS', 'layout_encuestas.php');
//        $content = $this->load_page('app/views/default/sections/content_analiticas.php');
//        $menu_left = $this->load_page('app/views/default/sections/menu_left_analiticas.php');       
//        $mostrar = $this->load_page('app/views/default/modules/analiticas/mostrar_graficos.php');                                     
//        $grafico1 = $this->load_page('app/views/default/modules/analiticas/barras.php');
//             
//        $cont = $this->replace_content('/\#MENULEFT\#/ms' ,$menu_left, $content);       
//        $m = $this->replace_content('/\#CONTENIDO\#/ms' ,$grafico1, $mostrar);  
//        $contenido = $this->replace_content('/\#CONTENT\#/ms' ,$m, $cont);  
//        $pagina = $this->replace_content('/\#CONTENIDO\#/ms' ,$contenido, $pagina);
//        
//        $this->view_page($pagina);
//   }
//   
//   public function loginUsuarios($user, $pass)
//   {
//
//         $unUsuario = new usuario();  
//         $tsArray = $unUsuario->loginUsuario($user, $pass);
//         print_r($tsArray);
//         if($tsArray != '')
//        {                
//            $_SESSION['usuario'] = $tsArray[0]['id_usuario'];              
//            $pagina=$this->load_template1('Modulo Usuarios');
//            $html = $this->load_page('app/views/default/modules/usuarios/m.principal_usuarios.php');
//            $pagina = $this->replace_content('/\#CONTENIDO\#/ms' ,$html , $pagina);
//            $this->view_page($pagina);
//        }
//        else
//        {
//            $_SESSION['usuario'] = '';
//            $pagina=$this->load_template('');
//            $listado = $this->load_page('app/views/default/modules/m.bienvenida.php');        
//            $pagina = $this->replace_content('/\#CONTENIDO\#/ms' ,$html , $pagina);
//            $this->view_page($pagina);            
//        }
//   }
//   /* METODO QUE MUESTRA LA PAGINA PRINCIPAL CUANDO NO EXISTEN NUEVAS ORDENES
// OUTPUT
// HTML | codigo html de la pagina 
// */
// public function principal()
//  {
//    $pagina=$this->load_template_editor('Modulo Encuestas', 'layout_encuestas.php');    
//    //$pagina = $this->replace_content('/\#CONTENIDO\#/ms' ,$html , $pagina);        
//    $this->view_page($pagina);
//  }
//  public function analiticas()
//  {
//    $pagina=$this->load_template_analiticas('Modulo de An&aacute;lisis', 'layout_encuestas.php');    
//    //$pagina = $this->replace_content('/\#CONTENIDO\#/ms' ,$html , $pagina);        
//    $this->view_page($pagina);
//  }
//  //CARGA LA PAGINA DEL PROYECTO  
//  public function load_template($title='Sin Titulo', $plantilla = 'page0.php')
//  {  
//    $pagina = $this->load_page('app/views/default/'.$plantilla);    
//    $pagina = $this->replace_content('/\#TITLE\#/ms' ,$title, $pagina);
//      
//    $header = $this->load_page('app/views/default/sections/header_principal.php');
//    $menu = $this->load_page('app/views/default/sections/menu_principal.php');
//    $header_total = $this->replace_content('/\#MENUPRINCIPAL\#/ms' ,$menu, $header);    
//    $pagina = $this->replace_content('/\#HEADER\#/ms' ,$header_total, $pagina);
//   
//  
//    $content = $this->load_page('app/views/default/sections/content_principal.php');      
//    $pagina = $this->replace_content('/\#CONTENIDO\#/ms' ,$content, $pagina);
//  
//    $footer = $this->load_page('app/views/default/sections/footer_admin.php');
//    $pagina = $this->replace_content('/\#FOOTER\#/ms' ,$footer, $pagina);
//                
//    
//    $sesion = $this->load_page('app/views/default/sections/sesion.php');
//    ob_start();        
//        include 'app/views/default/sections/prueba0.php';
//    $table = ob_get_clean();
//    $s = $this->replace_content('/\#SESION\#/ms' ,$table, $sesion);
//    $pagina = $this->replace_content('/\#SESION\#/ms' ,$s, $pagina);                
//  return $pagina;
// }
// /***************************************************************************************************************/
// //FUNCION QUE CARGA LA PAGINA INCIAL DE MODULO ADMINISTRADOR
// public function load_template_admin($title='Sin Titulo', $plantilla='page0.php')
// {  
//  $pagina = $this->load_page('app/views/default/'.$plantilla); 
//  
//  $pagina = $this->replace_content('/\#TITLE\#/ms' ,$title, $pagina);
//  
//  $header = $this->load_page('app/views/default/sections/header_admin.php');
//  $menu = $this->load_page('app/views/default/sections/menu_admin.php');
//  $header_total = $this->replace_content('/\#MENUPRINCIPAL\#/ms' ,$menu, $header);
//  $pagina = $this->replace_content('/\#HEADER\#/ms' ,$header_total, $pagina);
//  
//  
//  $content = $this->load_page('app/views/default/sections/content_admin.php');
//  $menu_left = $this->load_page('app/views/default/sections/menu_left_admin.php');
//  $index = $this->load_page('app/views/default/modules/perfil/index.php');
//  $cont = $this->replace_content('/\#MENULEFT\#/ms' ,$menu_left, $content);
//  $contenido = $this->replace_content('/\#CONTENT\#/ms' ,$index, $cont);  
//  $pagina = $this->replace_content('/\#CONTENIDO\#/ms' ,$contenido, $pagina);
//  
//  
//  $footer = $this->load_page('app/views/default/sections/footer_admin.php');
//  $pagina = $this->replace_content('/\#FOOTER\#/ms' ,$footer, $pagina);
//   
//  $sesion = $this->load_page('app/views/default/sections/sesion.php');
//    ob_start();        
//        include 'app/views/default/sections/prueba0.php';
//    $table = ob_get_clean();
//    $s = $this->replace_content('/\#SESION\#/ms' ,$table, $sesion);
//    $pagina = $this->replace_content('/\#SESION\#/ms' ,$s, $pagina);                
//  return $pagina;
// }
// 
// 
// ///ESTA FUNCION CARGA LA PAGINA INCIAL DE EL MODULO ENCUESTAS
// public function load_template_editor($title='Sin Titulo', $plantilla='page0.php')
// {  
//  $pagina = $this->load_page('app/views/default/'.$plantilla); 
//  
//  $pagina = $this->replace_content('/\#TITLE\#/ms' ,$title, $pagina);
//  
//  $header = $this->load_page('app/views/default/sections/header_editor.php');
//  $menu = $this->load_page('app/views/default/sections/menu_editor.php');
//  $header_total = $this->replace_content('/\#MENUPRINCIPAL\#/ms' ,$menu, $header);
//  $pagina = $this->replace_content('/\#HEADER\#/ms' ,$header_total, $pagina);
//  
//    
//  
//  //$content = $this->load_page('app/views/default/sections/content_editor.php');
//  //$menu_left = $this->load_page('app/views/default/sections/menu_left_editor.php');
//  $index = $this->load_page('app/views/default/modules/encuestas/index.php');
//  //$cont = $this->replace_content('/\#MENULEFT\#/ms' ,$menu_left, $content);
//  //$contenido = $this->replace_content('/\#CONTENT\#/ms' ,$index, $cont);  
//  $pagina = $this->replace_content('/\#CONTENIDO\#/ms' ,$index, $pagina);
//  
//  
//  
//  $footer = $this->load_page('app/views/default/sections/footer_editor.php');
//  $pagina = $this->replace_content('/\#FOOTER\#/ms' ,$footer, $pagina);
//   
//  $sesion = $this->load_page('app/views/default/sections/sesion.php');
//    ob_start();        
//        include 'app/views/default/sections/prueba0.php';
//    $table = ob_get_clean();
//    $s = $this->replace_content('/\#SESION\#/ms' ,$table, $sesion);
//    $pagina = $this->replace_content('/\#SESION\#/ms' ,$s, $pagina);                
//  return $pagina;
// }
// 
//public function load_template_content_editor($title='Sin Titulo', $plantilla='page0.php')
// {  
//  $pagina = $this->load_page('app/views/default/'.$plantilla); 
//  
//  $pagina = $this->replace_content('/\#TITLE\#/ms' ,$title, $pagina);
//  
//  $header = $this->load_page('app/views/default/sections/header_editor.php');
//  $menu = $this->load_page('app/views/default/sections/menu_editor.php');
//  $header_total = $this->replace_content('/\#MENUPRINCIPAL\#/ms' ,$menu, $header);
//  $pagina = $this->replace_content('/\#HEADER\#/ms' ,$header_total, $pagina);
//  
//    
//  
////  $content = $this->load_page('app/views/default/sections/content_editor.php');
////  $menu_left = $this->load_page('app/views/default/sections/menu_left_editor.php');
////  $index = $this->load_page('app/views/default/modules/encuestas/index.php');
////  $cont = $this->replace_content('/\#MENULEFT\#/ms' ,$menu_left, $content);
////  $contenido = $this->replace_content('/\#CONTENT\#/ms' ,$index, $cont);  
////  $pagina = $this->replace_content('/\#CONTENIDO\#/ms' ,$contenido, $pagina);
//  
//  
//  
//  $footer = $this->load_page('app/views/default/sections/footer_editor.php');
//  $pagina = $this->replace_content('/\#FOOTER\#/ms' ,$footer, $pagina);
//   
//  $sesion = $this->load_page('app/views/default/sections/sesion.php');
//    ob_start();        
//        include 'app/views/default/sections/prueba0.php';
//    $table = ob_get_clean();
//    $s = $this->replace_content('/\#SESION\#/ms' ,$table, $sesion);
//    $pagina = $this->replace_content('/\#SESION\#/ms' ,$s, $pagina);                
//  return $pagina;
// } 
// public function load_template_analiticas($title='Sin Titulo', $plantilla='page0.php')
// {  
//  $pagina = $this->load_page('app/views/default/'.$plantilla); 
//  
//  $pagina = $this->replace_content('/\#TITLE\#/ms' ,$title, $pagina);
//  
//  $header = $this->load_page('app/views/default/sections/header_editor.php');
//  $menu = $this->load_page('app/views/default/sections/menu_analiticas.php');
//  $header_total = $this->replace_content('/\#MENUPRINCIPAL\#/ms' ,$menu, $header);
//  $pagina = $this->replace_content('/\#HEADER\#/ms' ,$header_total, $pagina);
//  
//    
//  
//  $content = $this->load_page('app/views/default/sections/content_analiticas.php');
//  $menu_left = $this->load_page('app/views/default/sections/menu_left_analiticas.php');
//  $index = $this->load_page('app/views/default/modules/analiticas/index.php');
//  $cont = $this->replace_content('/\#MENULEFT\#/ms' ,$menu_left, $content);
//  $contenido = $this->replace_content('/\#CONTENT\#/ms' ,$index, $cont);  
//  $pagina = $this->replace_content('/\#CONTENIDO\#/ms' ,$contenido, $pagina);
//  
//  
//  
//  $footer = $this->load_page('app/views/default/sections/footer_analiticas.php');
//  $pagina = $this->replace_content('/\#FOOTER\#/ms' ,$footer, $pagina);
//   
//  $sesion = $this->load_page('app/views/default/sections/sesion.php');
//    ob_start();        
//        include 'app/views/default/sections/prueba0.php';
//    $table = ob_get_clean();
//    $s = $this->replace_content('/\#SESION\#/ms' ,$table, $sesion);
//    $pagina = $this->replace_content('/\#SESION\#/ms' ,$s, $pagina);                
//  return $pagina;
// }
// 
// public function load_template_content_analiticas($title='Sin Titulo', $plantilla='page0.php')
// {  
//  $pagina = $this->load_page('app/views/default/'.$plantilla); 
//  
//  $pagina = $this->replace_content('/\#TITLE\#/ms' ,$title, $pagina);
//  
//  $header = $this->load_page('app/views/default/sections/header_editor.php');
//  $menu = $this->load_page('app/views/default/sections/menu_analiticas.php');
//  $header_total = $this->replace_content('/\#MENUPRINCIPAL\#/ms' ,$menu, $header);
//  $pagina = $this->replace_content('/\#HEADER\#/ms' ,$header_total, $pagina);
//  
//    
//  
////  $content = $this->load_page('app/views/default/sections/content_analiticas.php');
////  $menu_left = $this->load_page('app/views/default/sections/menu_left_analiticas.php');
////  $index = $this->load_page('app/views/default/modules/analiticas/index.php');
////  $cont = $this->replace_content('/\#MENULEFT\#/ms' ,$menu_left, $content);
////  $contenido = $this->replace_content('/\#CONTENT\#/ms' ,$index, $cont);  
////  $pagina = $this->replace_content('/\#CONTENIDO\#/ms' ,$contenido, $pagina);
//  
//  
//  
//  $footer = $this->load_page('app/views/default/sections/footer_analiticas.php');
//  $pagina = $this->replace_content('/\#FOOTER\#/ms' ,$footer, $pagina);
//   
//  $sesion = $this->load_page('app/views/default/sections/sesion.php');
//    ob_start();        
//        include 'app/views/default/sections/prueba0.php';
//    $table = ob_get_clean();
//    $s = $this->replace_content('/\#SESION\#/ms' ,$table, $sesion);
//    $pagina = $this->replace_content('/\#SESION\#/ms' ,$s, $pagina);                
//  return $pagina;
// }
// //ESTA PAGINA CARGA EL CONTENIDO DEL MODULO DE ENCUESTAS
// 
// 
// 
// 
// 
// //ESTA FUNCION CARGA LA PAGINA INICIAL DEL MODULO DE ENCUESTADO
// public function load_template_encuestado($title='Sin Titulo', $plantilla='page0.php')
// {  
//  $pagina = $this->load_page('app/views/default/'.$plantilla); 
//  
//  $pagina = $this->replace_content('/\#TITLE\#/ms' ,$title, $pagina);
//  
//  $header = $this->load_page('app/views/default/sections/header_encuestado.php');
//  $menu = $this->load_page('app/views/default/sections/menu_encuestado.php');
//  $header_total = $this->replace_content('/\#MENUPRINCIPAL\#/ms' ,$menu, $header);
//  $pagina = $this->replace_content('/\#HEADER\#/ms' ,$header_total, $pagina);
//  
//  $content = $this->load_page('app/views/default/sections/content_encuestado.php');
//  $menu_left = $this->load_page('app/views/default/sections/menu_left_encuestado.php');
//  $index = $this->load_page('app/views/default/modules/encuestado/index.php');
//  $cont = $this->replace_content('/\#MENULEFT\#/ms' ,$menu_left, $content);
//  $contenido = $this->replace_content('/\#CONTENT\#/ms' ,$index, $cont);  
//  $pagina = $this->replace_content('/\#CONTENIDO\#/ms' ,$contenido, $pagina);
//  
//  
//  $footer = $this->load_page('app/views/default/sections/footer_encuestado.php');
//  $pagina = $this->replace_content('/\#FOOTER\#/ms' ,$footer, $pagina);
//   
//  $sesion = $this->load_page('app/views/default/sections/sesion.php');
//    ob_start();        
//        include 'app/views/default/sections/prueba0.php';
//    $table = ob_get_clean();
//    $s = $this->replace_content('/\#SESION\#/ms' ,$table, $sesion);
//    $pagina = $this->replace_content('/\#SESION\#/ms' ,$s, $pagina);                
//  return $pagina;
// } 
//
// /* METODO QUE MUESTRA EN PANTALLA EL FORMULARIO DE BUSQUEDA
// HTML | codigo html de la pagina con el buscador incluido
// */
// public function  buscador()
// {
//  $pagina=$this->load_template('Busqueda de registros');
//  $buscador = $this->load_page('app/views/default/modules/m.buscador.php');
//  $pagina = $this->replace_content('/\#CONTENIDO\#/ms' ,$buscador , $pagina);
//  $this->view_page($pagina);
// }
//
// public function  registrar()
// {  
//  $datos = 'layout_no_registro.php';
//  $pagina=$this->load_template1('Registrar usuarios', $datos);
//  $buscador = $this->load_page('app/views/default/modules/no_registro/m.adicionar.php');
//  $pagina = $this->replace_content('/\#CONTENIDO\#/ms' ,$buscador , $pagina);
//  $this->view_page($pagina);
// }
// /* METODO QUE CARGA UNA PAGINA DE LA SECCION VIEW Y LA MANTIENE EN MEMORIA
// INPUT
// $page | direccion de la pagina 
// OUTPUT
// STRING | devuelve un string con el codigo html cargado
// */
// private function load_page($page)
// {
//  return file_get_contents($page);
// }
// 
// /* METODO QUE ESCRIBE EL CODIGO PARA QUE SEA VISTO POR EL USUARIO
// INPUT
// $html | codigo html
// OUTPUT
// HTML | codigo html 
// */
// private function view_page($html)
// {
//     //echo $html;
//     print $html;
// }
//
// /* PARSEA LA PAGINA CON LOS NUEVOS DATOS ANTES DE MOSTRARLA AL USUARIO
// INPUT
// $out | es el codigo html con el que sera reemplazada la etiqueta CONTENIDO
// $pagina | es el codigo html de la pagina que contiene la etiqueta CONTENIDO
// OUTPUT
// HTML | cuando realiza el reemplazo devuelve el codigo completo de la pagina
// */
// private function replace_content($in='/\#CONTENIDO\#/ms', $out, $pagina)
// {
//   return preg_replace($in, $out, $pagina);
// }

}
?>
