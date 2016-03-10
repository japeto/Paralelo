<?php
 require 'app/controller/mvc.controller_analisis_avanzado.php';
 require 'conectado.php';
 $mvc = new mvc_controller_analisis_avanzado(); //se instancia al controlador  

// if (isset($_GET['action']))     
// {      
//         if( $_GET['action'] === 'sesion' ) //muestra el modulo "historia de Bolivia"
//         {
//             $mvc->iniciar_sesion();
//         }
// }//FIN ISSET
 
 if (isset($_POST['valor2']) )
 {   
     $mvc->cargarTodas_las_Encuestas($_POST['valor2']);  
 }
 
 if (isset($_POST['sql']))
 {   
    $mvc->consultarRespuestas($_POST['sql']);      
 }
 
 if (isset($_POST['sql1']))
 {   
    $mvc->partirRespuestas($_POST['sql1']);      
 }

 
 //if ( isset($_POST['encuesta_a_graficar']) && isset($_POST['modulo_a_graficar']) && isset($_POST['pregunta_a_graficar']) && isset($_POST['universidad_a_graficar']) && isset($_POST['facultad_a_graficar']) && isset($_POST['programa_a_graficar']))
if ( isset($_POST['sql_analisis']) && isset($_POST['id_pre']) )
 {   
    $mvc->Grafico1($_POST['sql_analisis'], $_POST['id_pre']);      
 }

 if ( isset($_POST['sql_analisis1']) )
 {   
    $mvc->Grafico2($_POST['sql_analisis1']);      
 }
 
 if ( isset($_POST['sql_analisis2']) && isset($_POST['id_pre1']))
 {   
    $mvc->Grafico3($_POST['sql_analisis2'], $_POST['id_pre1']);      
 }
 
 if ( isset($_POST['sql_analisis3']) && isset($_POST['id_pre2']) && isset($_POST['id_letra']))
 {   
    $mvc->Grafico4($_POST['sql_analisis3'], $_POST['id_pre2'], $_POST['id_letra']);      
 }

 if ( isset($_POST['sql_analisis4']) )
 {   
    $mvc->cargarResumenGrafico($_POST['sql_analisis4']);
 }

?>
