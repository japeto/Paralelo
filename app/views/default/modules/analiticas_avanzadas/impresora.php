<?php
//session_start();
//require_once 'lib/PHPExcel/PHPExcel.php';
//$fila = $_SESSION['codigos']
//echo "nada";
/*
$objPHPExcel = new PHPExcel();


$objPHPExcel->getProperties()->setCreator("Cattivo")->setLastModifiedBy("Cattivo")->setTitle("Documento Excel de Prueba")->setSubject("Documento Excel de Prueba")->setDescription("Demostracion sobre como crear archivos de Excel desde PHP.")->setKeywords("Excel Office 2007 openxml php")->setCategory("Pruebas de Excel");

//$objPHPExcel->setActiveSheetIndex(0)->setCellValue('A1', 'Valor 1')->setCellValue('B1', 'Valor 2')->setCellValue('C1', 'Total')->setCellValue('A2', '10')->setCellValue('C2', '=sum(A2:B2)');

 $i = 1; //Numero de fila donde se va a comenzar a rellenar*/ 
 //print_r($fila);
 /*foreach ($fila as $f):
     $objPHPExcel->setActiveSheetIndex(0)->setCellValue('A'.$i, $f['pregunta1'])->setCellValue('B'.$i, $f['pregunta2'])->setCellValue('C'.$i, $f['pregunta3'])->setCellValue('D'.$i, $f['pregunta4']);
     $i++;
 endforeach;
$objPHPExcel->getActiveSheet()->setTitle('Respuestas');
 
// Establecer la hoja activa, para que cuando se abra el documento se muestre primero.
$objPHPExcel->setActiveSheetIndex(0);

header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="pruebaReal.xlsx"');
header('Cache-Control: max-age=0');
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save('php://output');
exit;*/



session_start();
header("Content-type: application/vnd.ms-excel; name='Excel2007'");
header("Content-Disposition: filename=ficheroExcel.xls");
header('Cache-Control: max-age=0');
//header("Pragma: no-cache");
//header("Expires: 0");
echo $_SESSION['datos_a_enviar'];
?>


