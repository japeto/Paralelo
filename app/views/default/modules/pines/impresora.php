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
$pdf->SetMargins(5, 15, 5);
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
$pdf->setCellPaddings(0, 1, 0, 0);

// set cell margins
$pdf->setCellMargins(2, 2, 2, 2);



//*************
  ob_end_clean();//rompimiento de pagina
//*************   
//  $pdf->writeHTMLCell($w=85, $h=55, $x='', $y='', print_r($cellMargins), $border=1, $ln=0, $fill=0, $reseth=true, $align='C', $autopadding=true);

for($i = 0; $i<count($mis_pines); $i++)
{
      $pdf->writeHTMLCell($w=50, $h=40, $x='', $y='', '<p><strong>SURVEY PROMESA</strong></p><p>Contrase&ntilde;a de acceso:</p><center><h1>'.$mis_pines[$i]['pin'].'</h1></center><p>Ingresa a: eisc.univalle.edu.co/promsa<br></p>', $border=1, $ln=0, $fill=0, $reseth=true, $align='C', $autopadding=true);
      $pdf->writeHTMLCell($w=50, $h=40, $x='', $y='', '<p><strong>SURVEY PROMESA</strong></p><p>Contrase&ntilde;a de acceso:</p><center><h1>'.$mis_pines[$i = $i + 1]['pin'].'</h1></center><p>Ingresa a: eisc.univalle.edu.co/promesa<br></p>', $border=1, $ln=0, $fill=0, $reseth=true, $align='C', $autopadding=true);
      $pdf->writeHTMLCell($w=50, $h=40, $x='', $y='', '<p><strong>SURVEY PROMESA</strong></p><p>Contrase&ntilde;a de acceso:</p><center><h1>'.$mis_pines[$i = $i + 1]['pin'].'</h1></center><p>Ingresa a: eisc.univalle.edu.co/promesa<br></p>', $border=1, $ln=0, $fill=0, $reseth=true, $align='C', $autopadding=true);
      $pdf->writeHTMLCell($w=50, $h=40, $x='', $y='', '<p><strong>SURVEY PROMESA</strong></p><p>Contrase&ntilde;a de acceso:</p><center><h1>'.$mis_pines[$i = $i + 1]['pin'].'</h1></center><p>Ingresa a: eisc.univalle.edu.co/promesa<br></p>', $border=1, $ln=0, $fill=0, $reseth=true, $align='C', $autopadding=true);
      $pdf->writeHTMLCell($w=50, $h=40, $x='', $y='', '<p><strong>SURVEY PROMESA</strong></p><p>Contrase&ntilde;a de acceso:</p><center><h1>'.$mis_pines[$i = $i + 1]['pin'].'</h1></center><p>Ingresa a: eisc.univalle.edu.co/promesa<br></p>', $border=1, $ln=1, $fill=0, $reseth=true, $align='C', $autopadding=true);
      //$pdf->
      //$i = $i + 1;
      $pdf->Ln(2.95);
}
$pdf->Output('codigos_de_acceso.pdf', 'I');
        
//    $pdf->SetFont('Arial', 'I', 12);
    //$pdf->Output('prueba.pdf', 'd');  
//    $pdf->Output();  
