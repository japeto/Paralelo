    <?php
    require_once('tcpdf/tcpdf.php');
    require_once 'conectado.php';
    
    $mis_pines = $_SESSION['codigos'];  
    

$pdf = new TCPDF('P', 'mm', 'Letter', true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Tramas');
$pdf->SetTitle('Generacion_de_contraseñas');

$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
//set margins
$pdf->SetHeaderMargin(1);
$pdf->SetMargins(10, 47, 10);
$pdf->SetFooterMargin(7);

$pdf->SetAutoPageBreak(TRUE, 15);


//$pdf->setFontSubsetting(true);
$pdf->SetFont('Helvetica', '', 8, '', true);

$pdf->setPrintHeader(true); //no imprime la cabecera ni la linea 
$pdf->setPrintFooter(true); // imprime el pie ni la linea 
$pdf->SetHeaderData('img1.png', 180, "","", array(0,64,255), array(0,64,128));
$pdf->AddPage();
// set cell padding
$pdf->setCellPaddings(0, 0, 2, 0);

// set cell margins
$pdf->setCellMargins(0.5, 0.5, 0.5, 0.5);
//*************
  ob_end_clean();//rompimiento de pagina
//*************   
  $cadena = '';  
  //$cadena .= '<center><div><img src="img10.png" alt="attribute" width="500" height="150" border="0" ></div></center>';
  $cadena .= $_SESSION['encabezado_tabla'];
  $cadena .= $_SESSION['cuerpo_tabla'];
  
  foreach ($mis_pines as $p):
      
    $uni = substr($p['u'], 0, -6);    
            switch ($uni)
            {   
                case "uvsf":
                {                       
                   if ($p['fecha_de_creacion_pin'] != '')
                   {
                       $cadena .= "<tr><td>".$p['pin']."</td><td>Universidad del valle sede San Fernando</td><td>".$p['fecha_de_creacion_pin']."</td><td>".$p['fecha_de_fin_de_diligenciada_la_encuesta']."</td></tr>";
                   }
                   else if($p['tipo'] == 'f1')
                   {
                        $cadena .= "<tr><td>".$p['u']."</td><td>".$p['f']."</td><td>".$p['respondidas']."</td><td>".$p['no_respondidas']."</td><td>".$p['sin_responder']."</td><td>".$p['cant']."</td></tr>";                       
                   }
                   else if($p['tipo'] == 'p1')
                   {
                        $cadena .= "<tr><td>".$p['u']."</td><td>".$p['f']."</td><td>".$p['p']."</td><td>".$p['respondidas']."</td><td>".$p['no_respondidas']."</td><td>".$p['sin_responder']."</td><td>".$p['cant']."</td></tr>";                       
                   }
                   else if($p['tipo'] == 'genero0')
                   {
                        $cadena .= "<tr><td>".$p['u']."</td><td>".$p['g']."</td><td>".$p['respondidas_f']."</td><td>".$p['no_respondidas_f']."</td><td>0</td><td>".$p['cant']."</td></tr>";                                           
                   }
                   else if($p['tipo'] == 'genero1')
                   {                        
                        $cadena .= "<tr><td>".$p['u']."</td><td>".$p['g']."</td><td>".$p['respondidas_m']."</td><td>".$p['no_respondidas_m']."</td><td>0</td><td>".$p['cant']."</td></tr>";
                   }
                   else if($p['tipo'] == 'genero2')
                   {                        
                        $cadena .= "<tr><td>".$p['u']."</td><td>".$p['g']."</td><td>0</td><td>0</td><td>0</td><td>".$p['otros']."</td></tr>";
                   }
                   else if($p['tipo'] == 'genero00')
                   {
                        $cadena .= "<tr><td>".$p['u']."</td><td>".$p['facultad']."</td><td>".$p['g']."</td><td>".$p['respondidas_f']."</td><td>".$p['no_respondidas_f']."</td><td>".$p['cant']."</td></tr>";                                           
                   }
                   else if($p['tipo'] == 'genero10')
                   {                        
                        $cadena .= "<tr><td>".$p['u']."</td><td>".$p['facultad']."</td><td>".$p['g']."</td><td>".$p['respondidas_m']."</td><td>".$p['no_respondidas_m']."</td><td>".$p['cant']."</td></tr>";
                   }
                   else if($p['tipo'] == 'genero20')
                   {                        
                        $cadena .= "<tr><td>".$p['u']."</td><td>".$p['facultad']."</td><td>".$p['g']."</td><td>0</td><td>0</td><td>0</td><td>".$p['otros']."</td></tr>";
                   }
                   else
                   {
                       $cadena .= "<tr><td>".$p['u']."</td><td>".$p['uni']."</td><td>".$p['respondidas']."</td><td>".$p['no_respondidas']."</td><td>".$p['sin_responder']."</td><td>".$p['cant']."</td></tr>";
                   }
                    
                    break;
                }                
                case "uvme":
                {
                    if ($p['fecha_de_creacion_pin'] != '')
                   {
                       $cadena .= "<tr><td>".$p['pin']."</td><td>Universidad del valle sede Melendez</td><td>".$p['fecha_de_creacion_pin']."</td><td>".$p['fecha_de_fin_de_diligenciada_la_encuesta']."</td></tr>";
                   }
                   else if($p['tipo'] == 'f1')
                   {
                        $cadena .= "<tr><td>".$p['u']."</td><td>".$p['f']."</td><td>".$p['respondidas']."</td><td>".$p['no_respondidas']."</td><td>".$p['sin_responder']."</td><td>".$p['cant']."</td></tr>";                       
                   }
                   else if($p['tipo'] == 'p1')
                   {
                        $cadena .= "<tr><td>".$p['u']."</td><td>".$p['f']."</td><td>".$p['p']."</td><td>".$p['respondidas']."</td><td>".$p['no_respondidas']."</td><td>".$p['sin_responder']."</td><td>".$p['cant']."</td></tr>";                       
                   }
                   else if($p['tipo'] == 'genero0')
                   {
                        $cadena .= "<tr><td>".$p['u']."</td><td>".$p['g']."</td><td>".$p['respondidas_f']."</td><td>".$p['no_respondidas_f']."</td><td>0</td><td>".$p['cant']."</td></tr>";                                           
                   }
                   else if($p['tipo'] == 'genero1')
                   {                        
                        $cadena .= "<tr><td>".$p['u']."</td><td>".$p['g']."</td><td>".$p['respondidas_m']."</td><td>".$p['no_respondidas_m']."</td><td>0</td><td>".$p['cant']."</td></tr>";
                   }
                   else if($p['tipo'] == 'genero2')
                   {                        
                        $cadena .= "<tr><td>".$p['u']."</td><td>".$p['g']."</td><td>0</td><td>0</td><td>0</td><td>".$p['otros']."</td></tr>";
                   }
                   else if($p['tipo'] == 'genero00')
                   {
                        $cadena .= "<tr><td>".$p['u']."</td><td>".$p['facultad']."</td><td>".$p['g']."</td><td>".$p['respondidas_f']."</td><td>".$p['no_respondidas_f']."</td><td>".$p['cant']."</td></tr>";                                           
                   }
                   else if($p['tipo'] == 'genero10')
                   {                        
                        $cadena .= "<tr><td>".$p['u']."</td><td>".$p['facultad']."</td><td>".$p['g']."</td><td>".$p['respondidas_m']."</td><td>".$p['no_respondidas_m']."</td><td>".$p['cant']."</td></tr>";
                   }
                   else if($p['tipo'] == 'genero20')
                   {                        
                        $cadena .= "<tr><td>".$p['u']."</td><td>".$p['facultad']."</td><td>".$p['g']."</td><td>0</td><td>0</td><td>0</td><td>".$p['otros']."</td></tr>";
                   }
                   else
                   {
                       $cadena .= "<tr><td>".$p['u']."</td><td>".$p['uni']."</td><td>".$p['respondidas']."</td><td>".$p['no_respondidas']."</td><td>".$p['sin_responder']."</td><td>".$p['cant']."</td></tr>";
                   }
                   break;
                }
                case "puj":
                {
                    //$cadena .= "<tr><td>".$p['pin']."</td><td>Pontificia Universidad Javeriana</td><td>".$p['fecha_de_creacion_pin']."</td><td>".$p['fecha_de_fin_de_diligenciada_la_encuesta']."</td></tr>";                                        
                    if ($p['fecha_de_creacion_pin'] != '')
                   {
                       $cadena .= "<tr><td>".$p['pin']."</td><td>Pontificia Universidad Javeriana</td><td>".$p['fecha_de_creacion_pin']."</td><td>".$p['fecha_de_fin_de_diligenciada_la_encuesta']."</td></tr>";
                   }
                   else if($p['tipo'] == 'f1')
                   {
                        $cadena .= "<tr><td>".$p['u']."</td><td>".$p['f']."</td><td>".$p['respondidas']."</td><td>".$p['no_respondidas']."</td><td>".$p['sin_responder']."</td><td>".$p['cant']."</td></tr>";                       
                   }
                   else if($p['tipo'] == 'p1')
                   {
                        $cadena .= "<tr><td>".$p['f']."</td><td>".$p['p']."</td><td>".$p['respondidas']."</td><td>".$p['no_respondidas']."</td><td>".$p['sin_responder']."</td><td>".$p['cant']."</td></tr>";                       
                   }
                   else if($p['tipo'] == 'genero0')
                   {
                        $cadena .= "<tr><td>".$p['u']."</td><td>".$p['g']."</td><td>".$p['respondidas_f']."</td><td>".$p['no_respondidas_f']."</td><td>0</td><td>".$p['cant']."</td></tr>";                                           
                   }
                   else if($p['tipo'] == 'genero1')
                   {                        
                        $cadena .= "<tr><td>".$p['u']."</td><td>".$p['g']."</td><td>".$p['respondidas_m']."</td><td>".$p['no_respondidas_m']."</td><td>0</td><td>".$p['cant']."</td></tr>";
                   }
                   else if($p['tipo'] == 'genero2')
                   {                        
                        $cadena .= "<tr><td>".$p['u']."</td><td>".$p['g']."</td><td>0</td><td>0</td><td>0</td><td>".$p['otros']."</td></tr>";
                   }
                   else if($p['tipo'] == 'genero00')
                   {
                        $cadena .= "<tr><td>".$p['u']."</td><td>".$p['facultad']."</td><td>".$p['g']."</td><td>".$p['respondidas_f']."</td><td>".$p['no_respondidas_f']."</td><td>".$p['cant']."</td></tr>";                                           
                   }
                   else if($p['tipo'] == 'genero10')
                   {                        
                        $cadena .= "<tr><td>".$p['u']."</td><td>".$p['facultad']."</td><td>".$p['g']."</td><td>".$p['respondidas_m']."</td><td>".$p['no_respondidas_m']."</td><td>".$p['cant']."</td></tr>";
                   }
                   else if($p['tipo'] == 'genero20')
                   {                        
                        $cadena .= "<tr><td>".$p['u']."</td><td>".$p['facultad']."</td><td>".$p['g']."</td><td>0</td><td>0</td><td>0</td><td>".$p['otros']."</td></tr>";
                   }
                   else
                   {
                       $cadena .= "<tr><td>".$p['u']."</td><td>".$p['uni']."</td><td>".$p['respondidas']."</td><td>".$p['no_respondidas']."</td><td>".$p['sin_responder']."</td><td>".$p['cant']."</td></tr>";
                   }
                    break;
                }
                case "usc":
                {
                    //$cadena .= "<tr><td>".$p['pin']."</td><td>Universidad Santiago de Cali</td><td>".$p['fecha_de_creacion_pin']."</td><td>".$p['fecha_de_fin_de_diligenciada_la_encuesta']."</td></tr>";                    
                     if ($p['fecha_de_creacion_pin'] != '')
                   {
                       $cadena .= "<tr><td>".$p['pin']."</td><td>Universidad Santiago de Cali</td><td>".$p['fecha_de_creacion_pin']."</td><td>".$p['fecha_de_fin_de_diligenciada_la_encuesta']."</td></tr>";
                   }
                   else if($p['tipo'] == 'f1')
                   {
                        $cadena .= "<tr><td>".$p['u']."</td><td>".$p['f']."</td><td>".$p['respondidas']."</td><td>".$p['no_respondidas']."</td><td>".$p['sin_responder']."</td><td>".$p['cant']."</td></tr>";                       
                   }
                   else if($p['tipo'] == 'p1')
                   {
                        $cadena .= "<tr><td>".$p['f']."</td><td>".$p['p']."</td><td>".$p['respondidas']."</td><td>".$p['no_respondidas']."</td><td>".$p['sin_responder']."</td><td>".$p['cant']."</td></tr>";                       
                   }
                   else if($p['tipo'] == 'genero0')
                   {
                        $cadena .= "<tr><td>".$p['u']."</td><td>".$p['g']."</td><td>".$p['respondidas_f']."</td><td>".$p['no_respondidas_f']."</td><td>0</td><td>".$p['cant']."</td></tr>";                                           
                   }
                   else if($p['tipo'] == 'genero1')
                   {                        
                        $cadena .= "<tr><td>".$p['u']."</td><td>".$p['g']."</td><td>".$p['respondidas_m']."</td><td>".$p['no_respondidas_m']."</td><td>0</td><td>".$p['cant']."</td></tr>";
                   }
                   else if($p['tipo'] == 'genero2')
                   {                        
                        $cadena .= "<tr><td>".$p['u']."</td><td>".$p['g']."</td><td>0</td><td>0</td><td>0</td><td>".$p['otros']."</td></tr>";
                   }
                   else if($p['tipo'] == 'genero00')
                   {
                        $cadena .= "<tr><td>".$p['u']."</td><td>".$p['facultad']."</td><td>".$p['g']."</td><td>".$p['respondidas_f']."</td><td>".$p['no_respondidas_f']."</td><td>".$p['cant']."</td></tr>";                                           
                   }
                   else if($p['tipo'] == 'genero10')
                   {                        
                        $cadena .= "<tr><td>".$p['u']."</td><td>".$p['facultad']."</td><td>".$p['g']."</td><td>".$p['respondidas_m']."</td><td>".$p['no_respondidas_m']."</td><td>".$p['cant']."</td></tr>";
                   }
                   else if($p['tipo'] == 'genero20')
                   {                        
                        $cadena .= "<tr><td>".$p['u']."</td><td>".$p['facultad']."</td><td>".$p['g']."</td><td>0</td><td>0</td><td>0</td><td>".$p['otros']."</td></tr>";
                   }
                   else
                   {
                       $cadena .= "<tr><td>".$p['u']."</td><td>".$p['uni']."</td><td>".$p['respondidas']."</td><td>".$p['no_respondidas']."</td><td>".$p['sin_responder']."</td><td>".$p['cant']."</td></tr>";
                   }
                    break;
                }
            }    
endforeach;
$cadena .= "</tbody></table>";
//$cadena .= '<center><div><img src="img20.png" alt="attribute" width="500" height="70" border="0" ></div></center>';
$pdf->writeHTML($cadena, false, false, false, true, '');
$pdf->SetDisplayMode('fullpage'); 
$pdf->Output('codigos_de_acceso.pdf', 'I');
        
//    $pdf->SetFont('Arial', 'I', 12);
    //$pdf->Output('prueba.pdf', 'd');  
//    $pdf->Output();  
