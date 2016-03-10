<?php

 require 'app/controller/mvc.controller_encuestado.php';    
 require 'conectado.php';
 $mvc = new mvc_controller_encuestado(); //se instancia al controlador  

 if (isset($_GET['action']))     
 {      
         if( $_GET['action'] === 'responder' ) //muestra el modulo del buscador
         {             
             $mvc->responder();
         }
         if( $_GET['action'] === 'no_responder' ) //muestra el modulo del buscador
         {             
             $mvc->no_responder();
         }
         if( $_GET['action'] === 'iniciar' ) //muestra la pagina incial del modulo
         {
             $mvc->iniciar();
         }
         if( $_GET['action'] === 'ingreso' ) //muestra la pagina incial del modulo
         {
            
             $mvc->ingreso();
         }
 }//FIN ISSET 
 
 
 
 /*carga las facultades*/
 if (isset($_POST['id_universidad']) )
 {   
     $mvc->cargarComboFacultad($_POST['id_universidad']);  
 }
 
 
 /*carga los programas academicos*/
 if (isset($_POST['id_facultad']) )
 {   
     $mvc->cargarComboProgramaAcademico($_POST['id_facultad']);  
 }
 
/*********************************************************************************/
 /*carga el combobox encuestas*/
 if (isset($_POST['val']) )
 {   
     $mvc->cargarComboEncuesta($_POST['val']);  
 }
/*carga la lista de encuesta en la tabla*/
if (isset($_POST['listaEncuestas']) ){   
     $mvc->cargarListaEncuesta();  
}
 
 /*carga el combobox encuestas*/
 if (isset($_POST['id_encuesta_a_diligenciar']) ){
     $mvc->redireccionarEncuesta($_POST['id_encuesta_a_diligenciar']);  
 }

 if (isset($_POST['consentimiento_id_encuesta']) )
 {   
     $mvc->cargarConsentimientoEncuesta($_POST['consentimiento_id_encuesta']);  
 }
 /*********************************************************************************/

 
 
 /*carga los departamentos*/
 if (isset($_POST['un_valor']) )
 {   
     $mvc->cargarComboDepartamento($_POST['un_valor']);  
 }
 
 /*carga los municipios*/
 if (isset($_POST['id_dpto']) )
 {   
     $mvc->cargarComboMunicipio($_POST['id_dpto']);  
 }
 
 if (isset($_POST['valor2']) )
 {   
     $mvc->cargar_Total_Encuestas($_POST['valor2']);  
 }
 
 
 //if (isset($_POST['consentimiento']) && isset($_POST['pin']) )
 if (isset($_POST['id_encuesta']) && isset($_POST['pin']) ){        
     ///$mvc->validarPIN($_POST['consentimiento'], $_POST['pin']);  
    // echo "string";
    // return;
    $mvc->verificarPIN($_POST['id_encuesta'], $_POST['pin']);  

    // echo "string[".$_POST['id_encuesta']."][".$_POST['pin']."]";
 }
 
 
// if (isset($_POST['consentimiento']) && isset($_POST['pin']))
// {   
//     $mvc->insertarConsentimiento($_POST['consentimiento'], $_POST['pin']);  
// }
 
 if (isset($_POST['datos_encuesta']))
 {   
    $mvc->cargardatosEncuesta($_POST['datos_encuesta']);      
    // echo "string".$_POST['datos_encuesta'];
 }

 if (isset($_POST['id_encuesta1']))
 {   
    $mvc->cantidadModulosEncuesta($_POST['id_encuesta1']);      
 }
 
 
 if (isset($_POST['id_modulo1']))
 {   
    $mvc->cantidadPreguntasModuloEncuesta($_POST['id_modulo1']);      
 }
 
 /*FUNCION QUE PERMITE CARGAR LAS RESPUESTAS DE UNA ENCUESTA*/
 if (isset($_POST['id_encuesta_a_verificar']) && isset($_POST['preguntas_a_completar']) && isset($_POST['pin']) )
 {   
    $mvc->ObtenerRespuestasEncuesta($_POST['id_encuesta_a_verificar'], $_POST['preguntas_a_completar'], $_POST['pin']);      
 }
 
 
 /*FUNCION QUE PERMITE CARGAR EL MODULO DE UNA ENCUESTA*/
 if (isset($_POST['id_mi_encuesta']) && isset($_POST['id_mi_modulo']) && isset($_POST['pin1']))
 {   
    $mvc->cargandoMiEncuesta($_POST['id_mi_encuesta'], $_POST['id_mi_modulo'], $_POST['pin1']);      
 }
 
 
 /*FUNCION QUE PERMITE CAPTURAR LAS RESPUESTAS DE UN MODULO*/
 if (isset($_POST['mis_respuestas']) && isset($_POST['id_encuesta_respondida']))
 {        
     $mvc->guardarRespuestasEncuesta($_POST['mis_respuestas'], $_POST['id_encuesta_respondida']);      
 }
 
?>
