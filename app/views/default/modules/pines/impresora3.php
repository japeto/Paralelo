    <?php
    require_once('tcpdf/tcpdf.php');
    require_once 'conectado.php';
    
    $mis_pines = $_SESSION['codigos'];  
    

$pdf = new TCPDF('L', 'mm', 'Letter', true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Tramas');
$pdf->SetTitle('Generacion_de_contraseñas');

$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
//set margins
//$pdf->SetHeaderMargin(10);
$pdf->SetMargins(17, 10, 17);
//$pdf->SetFooterMargin(5);

//set auto page breaks/
$pdf->SetAutoPageBreak(TRUE, 15);

// set default font subsetting mode
//$pdf->setFontSubsetting(true);
$pdf->SetFont('Helvetica', '', 8, '', true);

// Add a page 
// This method has several options, check the source code documentation for more information.
$pdf->setPrintHeader(false); //no imprime la cabecera ni la linea 
$pdf->setPrintFooter(false); // imprime el pie ni la linea 
$pdf->AddPage();
// set cell padding
$pdf->setCellPaddings(0, 0, 2, 0);

// set cell margins
$pdf->setCellMargins(0.5, 0.5, 0.5, 0.5);
//*************
  ob_end_clean();//rompimiento de pagina
//*************   
  $cadena = '';
  $cadena .= '<table border="1" cellpadding="2" cellspacing="10" align="center">';
  $cadena .= '<thead><tr><th colspan="4">CONTRASEÑAS GENERADAS</th></tr></thead>';
  $cadena .= '<tbody><tr><td colspan="4">se reportan "'.count($mis_pines).'" contraseñas de acceso</td></tr>';
//for($i = 0; $i<count($mis_pines); $i++)
  //$pdf->writeHTML("<tr>", $ln=false, $fill=false, $reseth=false, $cell=true, $align='');
  foreach ($mis_pines as $p):
      
    $uni = substr($p['u'], 0, -6);    
            switch ($uni)
            {   
                case "uvsf":
                {                       
                    $cadena .= "<tr><td>".$p['pin']."</td><td>Universidad del valle sede San Fernando</td><td>".$p['fecha_de_creacion_pin']."</td><td>".$p['fecha_de_fin_de_diligenciada_la_encuesta']."</td></tr>";
                    break;
                }                
                case "uvme":
                {
                    $cadena .= "<tr><td>".$p['pin']."</td><td>Universidad del valle sede Melendez</td><td>".$p['fecha_de_creacion_pin']."</td><td>".$p['fecha_de_fin_de_diligenciada_la_encuesta']."</td></tr>";                    
                    break;
                }
                case "puj":
                {
                    $cadena .= "<tr><td>".$p['pin']."</td><td>Pontificia Universidad Javeriana</td><td>".$p['fecha_de_creacion_pin']."</td><td>".$p['fecha_de_fin_de_diligenciada_la_encuesta']."</td></tr>";                                        
                    break;
                }
                case "usc":
                {
                    $cadena .= "<tr><td>".$p['pin']."</td><td>Universidad Santiago de Cali</td><td>".$p['fecha_de_creacion_pin']."</td><td>".$p['fecha_de_fin_de_diligenciada_la_encuesta']."</td></tr>";                    
                    break;
                }
            }    
endforeach;
$cadena .= "</tbody></table>";
$pdf->writeHTML($cadena, false, false, false, true, '');
$pdf->Output('codigos_de_acceso.pdf', 'I');
        
//    $pdf->SetFont('Arial', 'I', 12);
    //$pdf->Output('prueba.pdf', 'd');  
//    $pdf->Output();  
