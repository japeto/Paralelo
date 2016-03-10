<?php
session_start();
require 'app/model/analisis.class_avanzado.php';

class mvc_controller_analisis_avanzado
{   
   
   public function cargarTodas_las_Encuestas($valor)
  {
      $unAnalisis = new analisis_avanzado();
      $encuestas = $unAnalisis->Encuestas($valor);           
      
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
  
   public function consultarRespuestas($sql)
  {
      $unAnalisis =  new analisis_avanzado(); 
      $respuestas = $unAnalisis->consultarRespuestas($sql);           
      //$_SESSION['codigos'] = $respuestas;     
      //print_r($respuestas);
      if (count($respuestas) > 0)
      {
         $cadena = '';
         $numcolumnas = 120;         
         $cadena .=  "<table class='table table-condensed'><thead><tr><th colspan=\"$numcolumnas\">TABLA DE RESPUESTAS</th></tr><thead><tbody><tr><td colspan=\"$numcolumnas\">se reportan ".count($respuestas)." registros</td></tr>";
         
         $i = 1;
         
         foreach ($respuestas as $p):
             $cadena .= "<tr>";   
             $resto = ($i % $numcolumnas);             
				if($resto == 1){ }
            
            //$cadena .= "<td>".$p['pin']."</td>";
            //$cadena .= "<td>".$p['consentimiento']."</td>";
            $cadena .= "<td>".$p['pin']."</td><td>".$p['pregunta1']."</td><td>".$p['pregunta2']."</td><td>".$p['pregunta3']."</td><td>".$p['pregunta4']."</td><td>".$p['pregunta5']."</td><td>".$p['pregunta6']."</td><td>".$p['pregunta7']."</td><td>".$p['pregunta8']."</td><td>".$p['pregunta9']."</td><td>".$p['pregunta10']."</td><td>".$p['pregunta11']."</td><td>".$p['pregunta12']."</td><td>".$p['pregunta13']."</td><td>".$p['pregunta14']."</td><td>".$p['pregunta15']."</td><td>".$p['pregunta16']."</td><td>".$p['pregunta17']."</td><td>".$p['pregunta18']."</td><td>".$p['pregunta19']."</td><td>".$p['pregunta20']."</td><td>".$p['pregunta21']."</td><td>".$p['pregunta22']."</td>";
            $cadena .= "<td>".$p['pregunta23']."</td><td>".$p['pregunta24']."</td><td>".$p['pregunta25']."</td><td>".$p['pregunta26']."</td><td>".$p['pregunta27']."</td><td>".$p['pregunta28']."</td><td>".$p['pregunta29']."</td><td>".$p['pregunta30']."</td><td>".$p['pregunta31']."</td><td>".$p['pregunta32']."</td><td>".$p['pregunta33']."</td><td>".$p['pregunta34']."</td><td>".$p['pregunta35']."</td><td>".$p['pregunta36']."</td><td>".$p['pregunta37']."</td><td>".$p['pregunta38']."</td><td>".$p['pregunta39']."</td><td>".$p['pregunta40']."</td><td>".$p['pregunta41']."</td><td>".$p['pregunta42']."</td><td>".$p['pregunta43']."</td><td>".$p['pregunta44']."</td><td>".$p['pregunta45']."</td><td>".$p['pregunta46']."</td><td>".$p['pregunta47']."</td><td>".$p['pregunta48']."</td><td>".$p['pregunta49']."</td><td>".$p['pregunta50']."</td>";
            $cadena .= "<td>".$p['pregunta51']."</td><td>".$p['pregunta52']."</td><td>".$p['pregunta53']."</td><td>".$p['pregunta54']."</td><td>".$p['pregunta55']."</td><td>".$p['pregunta56']."</td><td>".$p['pregunta57']."</td><td>".$p['pregunta58']."</td><td>".$p['pregunta59']."</td><td>".$p['pregunta60']."</td><td>".$p['pregunta61']."</td><td>".$p['pregunta62']."</td><td>".$p['pregunta63']."</td><td>".$p['pregunta64']."</td><td>".$p['pregunta65']."</td><td>".$p['pregunta66']."</td><td>".$p['pregunta67']."</td><td>".$p['pregunta68']."</td><td>".$p['pregunta69']."</td><td>".$p['pregunta70']."</td><td>".$p['pregunta71']."</td><td>".$p['pregunta72']."</td><td>".$p['pregunta73']."</td><td>".$p['pregunta74']."</td><td>".$p['pregunta75']."</td><td>".$p['pregunta76']."</td><td>".$p['pregunta77']."</td><td>".$p['pregunta78']."</td>";
            $cadena .= "<td>".$p['pregunta79']."</td><td>".$p['pregunta80']."</td><td>".$p['pregunta81']."</td><td>".$p['pregunta82']."</td><td>".$p['pregunta83']."</td><td>".$p['pregunta84']."</td><td>".$p['pregunta85']."</td><td>".$p['pregunta86']."</td><td>".$p['pregunta87']."</td><td>".$p['pregunta88']."</td><td>".$p['pregunta89']."</td><td>".$p['pregunta90']."</td><td>".$p['pregunta91']."</td><td>".$p['pregunta92']."</td><td>".$p['pregunta93']."</td><td>".$p['pregunta94']."</td><td>".$p['pregunta95']."</td><td>".$p['pregunta96']."</td><td>".$p['pregunta97']."</td><td>".$p['pregunta98']."</td><td>".$p['pregunta99']."</td><td>".$p['pregunta100']."</td><td>".$p['pregunta101']."</td><td>".$p['pregunta102']."</td><td>".$p['pregunta103']."</td><td>".$p['pregunta104']."</td><td>".$p['pregunta105']."</td><td>".$p['pregunta106']."</td>";
            $cadena .= "<td>".$p['pregunta107']."</td><td>".$p['pregunta108']."</td><td>".$p['pregunta109']."</td><td>".$p['pregunta110']."</td><td>".$p['pregunta111']."</td><td>".$p['pregunta112']."</td><td>".$p['pregunta113']."</td><td>".$p['pregunta114']."</td><td>".$p['pregunta115']."</td><td>".$p['pregunta116']."</td><td>".$p['pregunta117']."</td><td>".$p['pregunta119']."</td>";
                
            if($resto == 0)
            {
               $cadena .= "</tr>"; 
            }
            
            $i++; 
         endforeach;
                
         
         if($resto != 0)
         {
            /*for ($j = 0; $j < ($numcolumnas - $resto); $j++)
            {
              $cadena .= "<td></td>";
            }*/
          $cadena .= "</tbody></table>";
         }                             
      }
      else
      { 
           $cadena .= "<tr><td>0 elementos encontrados</td></tr> ";
      } 
      $_SESSION['datos_a_enviar'] = $cadena;
      echo $cadena;      
  }

  public function Grafico1($consulta, $id_pre)
  {
      $unAnalisis =  new analisis_avanzado(); 
      $respuestas = $unAnalisis->consultarGraficos1($consulta);   
            
      $valores = array();
      
      foreach ($respuestas as $r):
                $valores[] = $r['pregunta'.$id_pre];
                $valores[] = (int)$r['cantidad'];                    
                $total[] = $valores;
                $valores = array();
      endforeach;
      
      //echo json_encode(array(array($valores, $valores1, $valores2)) );
      echo json_encode(array($total) );
  }
  
  public function Grafico2($consulta)
  {
      $unAnalisis =  new analisis_avanzado(); 
      $respuestas = $unAnalisis->consultarGraficos1($consulta);   
            
      $valores = array();
      
      foreach ($respuestas as $r):
                $valores[] = $r['pin_u'];
                $valores[] = (int)$r['cantidad'];                    
                $total[] = $valores;
                $valores = array();
      endforeach;
      
      //echo json_encode(array(array($valores, $valores1, $valores2)) );
      echo json_encode(array($total) );
  }
  
  public function Grafico3($consulta, $id_pre)
  {
      $unAnalisis =  new analisis_avanzado(); 
      $respuestas = $unAnalisis->consultarGraficos1($consulta);   
            
      $valores = array();
      
      foreach ($respuestas as $r):
                $valores[] = $r['pregunta'.$id_pre.'a'];
                $valores[] = (int)$r['cantidad'];                    
                $total[] = $valores;
                $valores = array();
      endforeach;
      
      //echo json_encode(array(array($valores, $valores1, $valores2)) );
      echo json_encode(array($total) );
  }
  
   public function Grafico4($consulta, $id_pre, $letra)
  {
      $unAnalisis =  new analisis_avanzado(); 
      $respuestas = $unAnalisis->consultarGraficos1($consulta);   
            
      $valores = array();
      
      foreach ($respuestas as $r):
                $valores[] = $r['pregunta'.$id_pre.$letra];
                $valores[] = (int)$r['cantidad'];                    
                $total[] = $valores;
                $valores = array();
      endforeach;
      
      //echo json_encode(array(array($valores, $valores1, $valores2)) );
      echo json_encode(array($total) );
  }
  
  public function partirRespuestas($sql)
  {
      $unAnalisis = new analisis_avanzado();
      $encuestas = $unAnalisis->consultarRespuestaPorPregunta($sql);           
      echo 'cantidad '.count($encuestas)."<br>";
      foreach ($encuestas as $e):
        //echo $e['pregunta28']."<br>";    
        $cadena = explode(",", $e['pregunta17']);
        //print_r($cadena);
      foreach ($cadena as $c):
          if ($c == 'Padre')
          {
           $cadena1.= '1,';
          }
          elseif ($c == 'Madre')
          {
              $cadena1 .= '2,';
          }
          elseif ($c == 'Ambos Padres')
          {
              $cadena1 .= '3,';
          }
          elseif ($c == 'Padres y Propios')
          {
              $cadena1 .= '4,';
          }
          elseif ($c == 'Solo propios')
          {
              $cadena1 .= '5,';
          }
          elseif ($c == 'Prestamo')
          {
              $cadena1 .= '6,';
          }
           elseif ($c == 'Otro acudiente')
          {
              $cadena1 .= '7,';
          }
          elseif ($c == 'No respondio')
          {
              $cadena1 .= '8,';
          }
          
        endforeach;
            $total[] = $cadena1;
            $cadena1 = '';
        endforeach; 
        foreach ($total as $t):
            echo $t.'<br>';        
        endforeach;
              
  }
  public function cargarResumenGrafico($sql){
    $unAnalisis =  new analisis_avanzado(); 
    $respuestas = $unAnalisis->consultarGraficos1($sql);   
    echo json_encode($respuestas);
  }  
  
  
}/*FIN CLASE*/

 

?>
