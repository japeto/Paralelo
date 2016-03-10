<?php
 require 'app/controller/mvc.controller_analisis.php';
 require 'conectado.php';
 $mvc = new mvc_controller_analisis(); //se instancia al controlador  

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
 
 if (isset($_POST['sql']))
 {   
    $mvc->consultarRespuestas($_POST['sql']);      
 }

 
 //if ( isset($_POST['encuesta_a_graficar']) && isset($_POST['modulo_a_graficar']) && isset($_POST['pregunta_a_graficar']) && isset($_POST['universidad_a_graficar']) && isset($_POST['facultad_a_graficar']) && isset($_POST['programa_a_graficar']))
 if ( isset($_POST['sql_analisis']) && isset($_POST['id_pre']) )
 {   
    $mvc->Grafico($_POST['sql_analisis'], $_POST['id_pre']);      
 }

?>
