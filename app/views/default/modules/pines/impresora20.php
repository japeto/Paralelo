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
//$pdf->SetHeaderMargin(10);
$pdf->SetMargins(15, 10, 15);
//$pdf->SetFooterMargin(10);

//set auto page breaks/
$pdf->SetAutoPageBreak(TRUE, 15);

// set default font subsetting mode
//$pdf->setFontSubsetting(true);
$pdf->SetFont('Helvetica', '', 9, '', true);

// Add a page 
// This method has several options, check the source code documentation for more information.
$pdf->setPrintHeader(true); //no imprime la cabecera ni la linea 
$pdf->setPrintFooter(true); // imprime el pie ni la linea 
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
      $pdf->writeHTMLCell($w=170, $h=245, $x='', $y='', '<div><img src="logo.png" alt="attribute" width="35" height="40" border="0" ><p>Proyecto: Tramas, Acciones y Sentidos en Sexualidad.<br> <strong>Encuesta: Reconociendo mi Salud Sexual y Reproductiva – II 2014</strong></p>'
          . '<br><p>Contrase&ntilde;a de acceso:</p><div><center><h1>'.$mis_pines[$i]['pin'].'</h1></center></div><p>Este c&oacute;digo es personal e intransferible y y deber&aacute;s conservarlo en caso de hacer una pausa en el diligenciamiento de la encuesta y continuarlo en otro momento, antes de 7 d&iacute;as.</p>
              <p>Instrucciones para diligenciar la encuesta desde un computador</p><ol>
             <li>Abre el navegador de tu computadora, preferiblemente FireFox o Google Chrome.</li>
             <li>Ingresa a la siguiente direcci&oacute;n web : http://eisc.univalle.edu.co/tramas, Acepta el cuadro inicial.</li>
             <li>Lee el consentimiento informado.</li>
             <li>Haz clic en los las siguientes casillas: </li>
             <li><strong>Despu&eacute;s de haber le&iacute;do y comprendido la informaci&oacute;n anteriormente expuesta acepto participar en este proyecto.</strong></li>
             <li><strong>Declaro que he sido informado de las condiciones de participaci&oacuten en esta investigaci&oacute;n y reconozco que mi participaci&oacute;n es voluntaria.</strong></li>
             <li>Haz clic en continuar.</li>
             <li>Ingresa c&oacute;digo pin impreso en este documento</li>
             <li>Haz clic en aceptar para comenzar</li>
             </ol><p>Instrucciones para diligenciar la encuesta desde un dispositivo m&oacute;vil</p>
             <ol>
             <li>Abre el navegador de tu dispositivo m&oacute;vil.</li>
             <li>Ingresa a la siguiente direcci&oacute;n: http://eisc.univalle.edu.co/m.tramas </li>
             <li>En la parte superior izquierda en el men&uacute; presionar Encuesta. </li>
             <li>Si vas a diligenciar la encuesta por primera vez haz click en: iniciar encuesta</li>
             <li>Ingresa c&oacute;digo pin impreso en este documento</li>
             <li>Lee el consentimiento informado.</li>             
             <li>Acepta los t&eacute;rminos</li>                                       
             <li>Haz clic en aceptar para comenzar</li>
             </ol><p>Aspectos importantes</p><ul>
             <li>En el aplicativo web para guardar tus respuestas debes hacer clic en el bot&oacute;n "Guardar" y luego hacer clic en el bot&oacute;n "Siguiente modulo"</li>
             <li>En el aplicativo m&oacute;vil para guardar tus respuestas, haz clic en el bot&oacute;n "siguiente"</li>
             <li>En caso de hacer una pausa en el diligenciamiento de la encuesta en el aplicativo web despu&eacute;s hacer clic en guardar y hacer clic en "Siguiente modulo" puedes cerrar la sesi&oacute;n y continuar en otro momento</li>
             <li>En caso de hacer una pausa en el diligenciamiento de la encuesta en el aplicativo m&oacute;vil despu&eacute;s hacer clic en "siguiente", puedes cerrar la sesi&oacute;n y continuar en otro momento</li>
             <li>Recuerda que en el aplicativo web al igual que en el aplicativo m&oacute;vil debes responder al menos un modulo de la encuesta.</li>
             <li>En el aplicativo m&oacute;vil para continuar diligenciando las encuesta debe hacer clic en encuesta y luego haz clic en continuar e ingresar el pin nuevamente.</li>                                       
             <li>En el aplicativo web para continuar diligenciando la encuesta debes seguir los mismos pasos que utiliaste para diligenciarla por primera vez.</li>
             </ul><img src="encabezado.png" alt="attribute" width="600" height="40" border="0" ></div>', 
              $border=0, $ln=1, $fill=0, $reseth=true, $align='C', $autopadding=true);
      //$pdf->
      //$i = $i + 1;
      $pdf->Ln(2.59);
}
$pdf->Output('codigos_de_acceso.pdf', 'I');
        
//    $pdf->SetFont('Arial', 'I', 12);
    //$pdf->Output('prueba.pdf', 'd');  
//    $pdf->Output();  
