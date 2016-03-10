<?php
session_start();
require 'app/model/encuestado.class.php';
require 'app/model/usuario.class.php';
//require 'app/model/graficos.class.php';
class mvc_controller_encuestado 
{
  /*************************************************************************************************************************************************/
   public function cargarComboFacultad($id_universidad)
  {
     $unEncuestado =  new encuestado(); 
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
     $unEncuestado =  new encuestado(); 
     
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
     $unEncuestado =  new encuestado(); 
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
     $unEncuestado =  new encuestado(); 
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
  
  
  /*************************************************************************************/
  public function cargarComboEncuesta($valor)
  {//FUNCION QUE CARGAR EL LISTADO DE ENCUESTAS
      $unaEncuesta =  new encuestado(); 
      $encuestas = $unaEncuesta->EncuestaActiva($valor);           
      
      if (count($encuestas) > 0)
      {
          $opciones = "<option value='0'>SELECCIONE UNA ENCUESTA <option>";
                foreach ($encuestas as $enc) 
                {
                    $opciones.="<option value='".$enc['id_encuesta']."'>".$enc['titulo']."'<option>";
                }      
     echo $opciones;
     }        
  }  
  public function cargarListaEncuesta()
  {//FUNCION QUE CARGAR EL LISTADO DE ENCUESTAS
      $unaEncuesta =  new encuestado(); 
      $encuestas = $unaEncuesta->EncuestaActiva(1); //esta funcion es copia de la anterior
      if (count($encuestas) > 0){
          $opciones = "<tr><th>ENCUESTA</th><th>ACCION</th></tr>";
                foreach ($encuestas as $enc) 
                {
                    $opciones.="<tr><td>".$enc['titulo']."'</td><td><a href='#' onclick='redireccion(".$enc['id_encuesta'].")' ><span class='label label-success'>Responder</span></a></td></tr>";
                    // $opciones.="<option value='".$enc['id_encuesta']."'>".$enc['titulo']."'<option>";
                }      
        echo $opciones;
     }        
  }
  
  public function cargarConsentimientoEncuesta($id_encuesta)
  {//FUNCION QUE CARGAR EL CONSENTIMIENTO INFORMADO DE ENCUESTA
      $unaEncuesta =  new encuestado(); 
      $encuestas = $unaEncuesta->consentimiento_Encuesta($id_encuesta);           
      
      if (count($encuestas) > 0)
      {
		  //$opciones = $encuestas[0]['consentimiento_informado']; 
		  //print_r($encuestas)                  ;
		 // echo json_encode($opciones);		  
		 echo json_encode($encuestas);
     }        
  }
  public function cargardatosEncuesta($id_encuesta){
      $unEncuestado =  new encuestado();
      $_SESSION['id_encuesta'] = $id_encuesta;
      $nombre_encuesta = $unEncuestado->nombreEncuesta($id_encuesta);
      $_SESSION["usuario_completo"]['nombre_encuesta'] = $nombre_encuesta;
      echo json_encode($_SESSION["usuario_completo"]['nombre_encuesta']);
  }
  public function redireccionarEncuesta($id_encuesta)
  {
      $unEncuestado =  new encuestado();
      $_SESSION['id_encuesta'] = $id_encuesta;
      $nombre_encuesta = $unEncuestado->nombreEncuesta($id_encuesta);
      $_SESSION["nombre_encuesta"] = $nombre_encuesta;
      header('location:app/views/default/modules/encuestado/consentimiento.php');
  }

/*********************************************************************************************************************************************/  
  public function cargar_Total_Encuestas($valor)
  {
      $unaEncuestado =  new encuestado(); 
      $encuestas = $unaEncuestado->Encuestas($valor);           
      
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
  
   
  public function cantidadModulosEncuesta($id_encuesta)
  {
      $unaEncuesta =  new encuestado(); 
      $modulos = $unaEncuesta->modulosEncuesta($id_encuesta);           
      if (count($modulos) > 0)
      {                   
          $cantidad_de_modulos = $unaEncuesta->cantidad_modulos_por_encuesta($id_encuesta);        
          echo $cantidad_de_modulos[0]['num'];      
      }
  }
  
  public function cantidadPreguntasModuloEncuesta($id_modulo)
  {
      $unaEncuesta =  new encuestado();    
      
      $cantidad_de_preguntas = $unaEncuesta->cantidad_preguntas_por_modulo($id_modulo);        
      //print_r($cantidad_de_preguntas);
      echo $cantidad_de_preguntas[0]['num'];         
  }
  
  public function cargandoMiEncuesta($id_encuesta,$id_modulo, $pin)
  {         
      $unaEncuesta =  new encuestado(); 
      $unUsuario =  new usuario(); 
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
              $opciones .= "<div><center><h2>".$modulos[($id_modulo - 1)]['descripcion']."</h2><center></div>";              
              $opciones .= "<br><br>";
          }
          else
          {
              $opciones .= "<div><center><h2>".$modulos[($id_modulo - 1)]['descripcion']."</h2><center></div>";              
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
                                $opciones .= "<input type='text' class='form-control' id='fecha".$pre['id_pregunta']."'/><br>"; 
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
                                $opciones .= "<select class='selectpicker form-control caja1' id='departamento' data-width='600px' data-live-search='true' data-style='btn btn-primary' data-size='5' tabindex='1'>"
                                          . "     <option value='0'>Selecciona el departamento</option>"
                                          . "     </select>";
                                $opciones .="<br>";
                                $opciones .= "<select class='selectpicker form-control caja1' id='municipio' data-width='600px' data-live-search='true' data-style='btn btn-primary' data-size='5' tabindex='1'>"
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
                                $opciones .= "<select class='selectpicker form-control caja1' id='facultad' data-width='600px' data-live-search='true' data-style='btn btn-primary' data-size='5' tabindex='1'>"
                                          . "     <option value='0'>Selecciona la facultad</option>"
                                          . "     </select></div>";
                                $opciones .="<br>";
                                $opciones .= "<select class='selectpicker form-control caja1' id='programa' data-width='600px' data-live-search='true' data-style='btn btn-primary' data-size='5' tabindex='1'>"
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
                    $opciones .= "<div><center><button class='btn btn-primary' id='recoger'>Guardar</button>&nbsp;&nbsp;<a href='#' id='sig_mod' class='btn btn-primary'>Siguiente Modulo</a></center></div></div> ";                    
                    $_SESSION['pregunta_radio'] = $pregunta_radio;  
                    $_SESSION['preguntas_vinculadas'] = $pre_vinculadas;
                    $_SESSION['radios_tabla'] = $radio_tabla;                    
                    $_SESSION['pregunta_check'] = $pregunta_check;
                    $_SESSION['cajas_abierta'] = $cajas_abierta;
                    $_SESSION['cajas_fecha'] = $cajas_fecha;
                    $_SESSION['preguntas_tabla'] = $preguntas_tabla;          
                    $_SESSION['preguntas_combo_ubicacion'] = $pregunta_combo_ubicacion;
                    $_SESSION['preguntas_combo_universidad'] = $pregunta_combo_universidad;
                    $_SESSION['preguntas_combo_semestre'] = $pregunta_combo_semestre;

                    $_SESSION['preguntas_modulo'] = $preguntas;
                    $_SESSION['tipo_de_respuesta'] = $tipoRespuesta;
                    $_SESSION['numero_de_respuesta'] = $numeroRespuesta;              
                    $_SESSION['pregunta_cual'] = $pregunta_cual;
                    $_SESSION['pregunta_anios_meses'] = $pregunta_anios_meses;
                    echo $opciones;
              }/*fin preguntas mayor que cero*/
              else{}
          }/*fin si modulos*/
          else
          {
                $retorno1 = $unUsuario->actualizarFechaFinEncuesta(1, 'now()', $pin);
                $retorno2 = $unUsuario->actualizarHoraFinEncuesta(1, 'now()', $pin);
                echo "<section class='contacto'><center><h3>Haz Finalizado la Encuesta</h3><br><h3>MUCHAS GRACIAS POR PARTICIPAR!!!</h3></center><div><center><a href='../../../../../index.php' id='main' class='btn btn-primary boton' tabindex='1'>Terminar</a></center></div></section><br>";                
          }
  }
  
  public function guardarRespuestasEncuesta($todas_las_respuestas, $id_encuesta)
  {   
      $data = json_decode($todas_las_respuestas, true);     
      //print_r($data);
      $unEncuestado =  new encuestado();
      $respuestas_insertadas = $unEncuestado->adicionarRespuestas($_SESSION['encuestado'], $data, $id_encuesta);           
      return $respuestas_insertadas;
  }
  
  /******************************************************************************************************************************************************************************************************/
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
  /******************************************************************************************************************************************************************************************************/
  public function verificarPIN($id_encuesta, $pin)
  {
      $unUsuario =  new usuario(); 
      $unEncuestado =  new encuestado(); 
      
      $encuestado = $unUsuario->loginEncuestado($id_encuesta, $pin);        
      $estado = $unUsuario->encuestaActiva($id_encuesta);

      // echo $encuestado." ".$estado;
      // return;

      if ((count($encuestado) > 0) && ($estado['estado'] == 'Activada'))/*verifica si la encuesta esta activada*/
      //if (count($encuestado) > 0) /*verifica si la encuesta esta activada*/
      {   
        
          if ($encuestado['consentimiento'] == 'Acepto')/*continuar con la encuesta*/
          {


                $_SESSION['encuestado'] = $encuestado['pin'];
                //header('location: app/views/default/modules/encuestado/encuesta_pag2.php');
                $preguntas = $unEncuestado->cargarPartesEncuesta($id_encuesta);                
                
                $nombre_encuesta = $unEncuestado->nombreEncuesta($id_encuesta);
                
                $tipos = $unEncuestado->cargarTipos($id_encuesta);

                session_start();
                
                if (!isset($_SESSION["encuesta"])) 
                {
                    $_SESSION["nombre_encuesta"] = $nombre_encuesta;
                }
                
                if (!isset($_SESSION["id_encuesta"])) 
                {
                    $_SESSION["id_encuesta"] = $id_encuesta;
                }
                
                if (!isset($_SESSION["preguntas"])) 
                {
                    $_SESSION["preguntas"] = $preguntas;
                }
                
                if (!isset($_SESSION["pin"])) 
                {
                    $_SESSION["encuestado"] = $pin;
                }
                
                if (!isset($_SESSION["tipos"])) 
                {
                    $_SESSION["tipos"] = $tipos;
                }

                $modulo = $unEncuestado->numero_modulo($id_encuesta, $pin);                
            		$retorno0 = $unUsuario->insertarConsentimiento("Acepto", $pin);

                header('location: app/views/default/modules/encuestado/encuesta_pag1.php?mod='.$modulo);
          }
          else
          {
             
              if ($encuestado['consentimiento'] == 'No Acepto')/*no respondera la encuesta*/
              {
                   header('location: app/views/default/modules/encuestado/no_acepto.php');
              }
              else
              {                  
                  $_SESSION['encuestado'] = $encuestado['pin'];
                  $retorno0 = $unUsuario->insertarConsentimiento($id_encuesta, "Acepto", $pin);
                  $retorno1 = $unUsuario->actualizarFechaInicioEncuesta($id_encuesta, 'now()', $pin);
                  $retorno2 = $unUsuario->actualizarHoraInicioEncuesta($id_encuesta, 'now()', $pin);
                  //echo $retorno0.", ".$retorno1.", ".$retorno2;
                  if (($retorno0 > 0) )
                  {                      
                      header('location: app/views/default/modules/encuestado/encuesta_pag1.php?mod=1');                      
                  }
                  else
                  {
                      header('location: app/views/default/modules/encuestado/ingreso_pin.php');
                  }
              }/*fin else no acepto*/
          }/*fin else acepto*/          

      }/*fin si encuestado > 0*/
      else
      {
	      $_SESSION['no_activa'] = 1;
        header('location: app/views/default/modules/encuestado/ingreso_pin.php');
          
      }
  }
  
  public function ObtenerRespuestasEncuesta($id_encuesta, $preguntas_a_buscar, $pin )
  {         
      $unEncuestado =  new encuestado();
      $respuestas_encontradas = $unEncuestado->obtenerRespuestas($id_encuesta, $preguntas_a_buscar, $pin);      
      echo json_encode($respuestas_encontradas);      
  }
  
//  public function insertarConsentimiento($consentimiento, $pin)
//  {
//      $unUsuario =  new usuario(); 
//      $consentido = $unUsuario->insertarConsentimiento($consentimiento, $pin);      
//      if (count($consentido) > 0)
//      {
//          //print_r($consentido);
//           echo 1;
//      }        
//      else
//      {
//          echo 0;
//      }
//  }
  /*************************************************************************************************************************************/
  public function iniciar()
  {         
      //header('location:app/views/default/modules/encuestado/index.php');
      //header('location:app/views/default/modules/encuestado/listado_encuestas.php');
      header('location:app/views/default/modules/encuestado/verResultadosPreliminare.php');
  }
  public function ingreso(){         
    // if($_SESSION['encuestado']){
      // Debo mostrar una pagina donde el acepte que es la encuesta -- puede ser la misma ingreso pin
      // Si acepta debo agregar este pin de usuario a la encuesta
      // puede ponerse en la pagina ingreso_pin una condicion con la variable de session.
      // header('location:app/views/default/modules/encuestado/ingreso_sinpin.php');
    // }else{
      header('location:app/views/default/modules/encuestado/ingreso_pin.php');
    // }
  }
  public function responder()
  {         
      header('location:app/views/default/modules/encuestado/encuesta_pag1.php');
  }
  
  public function continuarRespondiendo()
  {         
      header('location:app/views/default/modules/encuestado/index.php');
  }
  
  public function no_responder()
  {         
      header('location:app/views/default/principal.php');
  }  
}
?>
