<?php
require 'app/controller/mvc.controller_encuesta.php';
require 'conectado.php';
 $mvc = new mvc_controller_encuesta(); //se instancia al controlador

 if (isset($_GET['action']))
 {
         if( $_GET['action'] === 'modulo' ) //muestra el modulo del buscador
         {
             $mvc->modulo();
         }
         if( $_GET['action'] === 'pregunta' ) //muestra el modulo del buscador
         {
             $mvc->pregunta();
         }
         if( $_GET['action'] === 'menu' ) //muestra el modulo del buscador
         {
             $mvc->menu();
         }

 }//FIN ISSET

 if (isset($_POST['id_perfil']) && isset($_POST['nombre']) && isset($_POST['apellido']) && isset($_POST['contrasena1']))
 {
     $mvc->miPerfil($_POST['id_perfil'], $_POST['nombre'], $_POST['apellido'], $_POST['contrasena1']);
 }

 if (isset($_POST['sql_encuesta']))
 {
    $mvc->consultarEncuestas($_POST['sql_encuesta']);
 }
 if (isset($_GET['id_encuesta_editar']) )
 {
     $mvc->editarEncuesta($_GET['id_encuesta_editar'], 'Editar');
 }
 if (isset($_GET['id_encuesta_activar']) )
 {
     $mvc->activarEncuesta($_GET['id_encuesta_activar'], 'Activada');
 }
 if (isset($_GET['id_encuesta_desactivar']) )
 {
     $mvc->desactivarEncuestas($_GET['id_encuesta_desactivar'], 'Desactivada');
 }


 /*carga el combo lista de categorias*/
 if (isset($_POST['valor']) )
 {
     $mvc->cargarCombo($_POST['valor']);
 }
 /*carga los tipos de pregunta*/
 if (isset($_POST['valor1']) )
 {
     $mvc->cargarComboTipo_Pregunta($_POST['valor1']);
 }
 /*carga todas las encuestas registradas*/
 if (isset($_POST['valor2']) )
 {
     $mvc->cargarTodas_las_Encuestas($_POST['valor2']);
 }
 /*carga las encuestas de un usuario que desea editar*/
 if (isset($_POST['id_encuesta_usuario']) )
 {
     $mvc->cargarComboEncuestaEditar($_POST['id_encuesta_usuario']);
 }
 if (isset($_POST['id_encuesta_usuario1']) )
 {
     $mvc->cargarComboEncuestaEditar1($_POST['id_encuesta_usuario1']);
 }
 /*carga los modulos de una encuesta a editar*/
 if (isset($_POST['id_modulo_encuesta']) )
 {
     $mvc->cargarComboModuloEncuestaEditar($_POST['id_modulo_encuesta']);
 }
 /*carga los modulos de una encuesta a visualizar*/
 if (isset($_POST['id_modulo_encuesta1']) )
 {
     $mvc->cargarComboModuloEncuestaVer($_POST['id_modulo_encuesta1']);
 }
 /*Activar un modulo*/
if (isset($_POST['id_modulo_activar']) && isset($_POST['nombre_modulo_activar'])){
    $_SESSION['id_modulo'] = $_POST['id_modulo_activar'];
    $_SESSION['nombre_modulo'] = $_POST['nombre_modulo_activar'];
} 
 if (isset($_POST['id_modulo_pregunta']) )
 {
     $mvc->cargarComboPreguntaEncuestaEditar($_POST['id_modulo_pregunta']);
 }

 if (isset($_POST['id_modulo_pregunta1']) )
 {
     $mvc->cargarComboPreguntaFinEncuestaEditar($_POST['id_modulo_pregunta1']);
 }

 if (isset($_POST['id_modulo_pregunta2']) && isset($_POST['id_tipo_pregunta2']))
 {
     $mvc->cargarComboPreguntaEncuestaEditar1($_POST['id_modulo_pregunta2'], $_POST['id_tipo_pregunta2']);
 }

 if (isset($_POST['id_pregunta1']) )
 {
     $mvc->cargarComboOpcionesPreguntaInicio($_POST['id_pregunta1']);
 }

 
 if (isset($_POST['id_encuesta_que_cambia']) && isset($_POST['id_usuario_que_cambia']))
 {
     $mvc->consultar_Encuesta_a_Editar($_POST['id_encuesta_que_cambia'], $_POST['id_usuario_que_cambia']);
 }
 
 if (isset($_POST['id_modulo_encuesta_que_cambia']) && isset($_POST['id_encuesta_cambia']) && isset($_POST['id_usuario_encuesta_cambia']))
 {
     $mvc->consultar_Modulo_a_Editar($_POST['id_modulo_encuesta_que_cambia'], $_POST['id_encuesta_cambia'], $_POST['id_usuario_encuesta_cambia']);
 }

 if (isset($_POST['id_pregunta_encuesta_que_cambia']) && isset($_POST['id_modulo_encuesta_que_cambia']) && isset($_POST['id_encuesta_a_cambiar']) && isset($_POST['id_usuario_encuesta_a_cambia']))
 {
     $mvc->consultar_Pregunta_a_Editar($_POST['id_pregunta_encuesta_que_cambia'], $_POST['id_modulo_encuesta_que_cambia'], $_POST['id_encuesta_a_cambiar'], $_POST['id_usuario_encuesta_a_cambia']);
 }

 if (isset($_POST['id_pregunta_opciones_que_cambia']) )
 {
     $mvc->consultar_Opciones_a_Editar($_POST['id_pregunta_opciones_que_cambia']);
 }
 
 
 if (isset($_POST['id_pregunta_1_2_col_fila']) )
 {
     $mvc->consultar_pregunta_1_2_columnas_filas_editar($_POST['id_pregunta_1_2_col_fila']);
 }
 if (isset($_POST['id_pregunta_tabla_col_fila']) )
 {
     $mvc->consultar_pregunta_tabla_columnas_filas_editar($_POST['id_pregunta_tabla_col_fila']);
 }
if (isset($_POST['id_pregunta_tipo_tabla_opciones_columna_editar']) )
 {
     $mvc->consultar_opciones_pregunta_tipo_tabla_a_Editar($_POST['id_pregunta_tipo_tabla_opciones_columna_editar']);
 }
 
 
  /*se redirecciona a preguntas editar*/
 if (isset($_POST['id_encuesta_a_editar']) && isset($_POST['nombre_encuesta_a_editar']) && isset($_POST['id_modulo_encuesta_a_editar']) && isset($_POST['nombre_modulo_a_editar']) && isset($_POST['opcion']))
 {
     $mvc->redireccionarAdicionarPreguntas($_POST['id_encuesta_a_editar'], $_POST['nombre_encuesta_a_editar'], $_POST['id_modulo_encuesta_a_editar'], $_POST['nombre_modulo_a_editar'], $_POST['opcion']);
 }
 /*borra la tabla de pines*/
 if (isset($_POST['valor3']) && isset($_POST['id_encuesta_respuesta']))
 {
    $mvc->borrarTablaPines($_POST['valor3'], $_POST['id_encuesta_respuesta']);
 }
 /*carga el combo box encuestas*/
 if (isset($_POST['id_user'])  )
 {
     $mvc->cargarListadoEncuestas($_POST['id_user']);
 }
 /*generar pines para encuesta*/
 if (isset($_POST['id_encuesta_responder']) && isset($_POST['cantidad']) && isset($_POST['codigo_universidad']))
 {
    $mvc->generarPines($_POST['id_encuesta_responder'], $_POST['cantidad'], $_POST['codigo_universidad']);
 }
 if (isset($_POST['sql']))
 {
    $mvc->consultarPines($_POST['sql']);
 }
 if (isset($_POST['sql1']))
 {
    $mvc->contarPines($_POST['sql1']);
 } 

 if (isset($_POST['sql2'])){
    
    $entrada = $_POST['sql2'];
    if (strpos($entrada, '#') !== false){
        $entrada = str_replace ('#',"%",$entrada);
    }

    // $mvc->consultar_preguntas_ubicacion($_POST['sql2']);
    $mvc->consultar_preguntas_ubicacion($entrada);
 } 


 if ( isset($_POST['sql_listado']) && isset($_POST['id_consulta']) && isset($_POST['id_uni']) && isset($_POST['id_fac']) && isset($_POST['id_pro']) )
 {

    $mvc->ListadoPines( $_POST['sql_listado'], $_POST['id_consulta'] , $_POST['id_uni'] , $_POST['id_fac'] , $_POST['id_pro']);
 }

 /*GUARDA la encuesta*/
 if ( isset($_POST['titulo_encuesta']) && isset($_POST['id_usuario']) && isset($_POST['estado']) && isset($_POST['bandera']) && isset($_POST['consentimiento']))
 {
     $mvc->guardarEncuestas( $_POST['titulo_encuesta'], $_POST['id_usuario'] , $_POST['estado'], $_POST['bandera'], $_POST['consentimiento']);
     
 }
 /*GUARDA un modulo*/
 if ( isset($_POST['id_encuesta']) && isset($_POST['nombre_modulo']) && isset($_POST['bandera'])){

    $mvc->guardarModulo( $_POST['id_encuesta'], $_POST['nombre_modulo'], $_POST['bandera']);
 }
 /*GUARDA una pregunta*/
 if (isset($_POST['id_encuesta_a_adicionar_pregunta']) && isset($_POST['id_modulo_encuesta_adicionar_pregunta']) && isset($_POST['text']) && isset($_POST['id_tipo_pregunta']) && isset($_POST['options']) && isset($_POST['cantidad_columnas']) && isset($_POST['opciones_columna']) && isset($_POST['cantidad_filas']) && isset($_POST['fil_pregunta_tipo1']) && isset($_POST['col_pregunta_tipo1']) )
 {
    $mvc->guardarPregunta($_POST['id_encuesta_a_adicionar_pregunta'], $_POST['id_modulo_encuesta_adicionar_pregunta'], $_POST['text'],$_POST['id_tipo_pregunta'], $_POST['options'] , $_POST['cantidad_columnas'], $_POST['opciones_columna'], $_POST['cantidad_filas'], $_POST['fil_pregunta_tipo1'], $_POST['col_pregunta_tipo1']);
    //echo $_POST['id_encuesta_a_adicionar_pregunta'].", ".$_POST['id_modulo_encuesta_adicionar_pregunta'].", ".$_POST['text'].", ".$_POST['id_tipo_pregunta'].", ".$_POST['options'].", ".$_POST['cantidad_columnas'].", ".$_POST['opciones_columna'].", ".$_POST['cantidad_filas'].", ".$_POST['fil_pregunta_tipo1'].", ".$_POST['col_pregunta_tipo1'];
 }

 /*Guarda Saltos*/
 if (isset($_POST['id_encuesta_a_saltar']) && isset($_POST['id_modulo_encuesta_a_saltar']) && isset($_POST['id_pregunta_de_salto']) && isset($_POST['opcion_salto']) && isset($_POST['num_pregunta']) && isset($_POST['bandera1']))
 {
    $mvc->guardarVinculos($_POST['id_encuesta_a_saltar'], $_POST['id_modulo_encuesta_a_saltar'], $_POST['id_pregunta_de_salto'],$_POST['opcion_salto'], $_POST['num_pregunta'], $_POST['bandera1']);
    //echo $_POST['id_encuesta_a_saltar'].", ".$_POST['id_modulo_encuesta_a_saltar'].", ".$_POST['id_pregunta_de_salto'].",".$_POST['opcion_salto'].",".$_POST['num_pregunta'];
 }
 /*carga la vista previa de la encuesta*/
 if (isset($_POST['id_encuesta1']) && isset($_POST['id_modulo1']) )
 {
    $mvc->vistaPreviaEncuesta($_POST['id_encuesta1'], $_POST['id_modulo1']);
 }
 
 
 
 
 /*EDITAR la encuesta*/
 if ( isset($_POST['nombre_encuesta_a_editar']) && isset($_POST['id_usuario_encuesta_editar']) && isset($_POST['consentimiento_encuesta_editar']) &&  isset($_POST['estado']) &&  isset($_POST['bandera']) && isset($_POST['consentimiento_encuesta_editar']) && isset($_POST['id_encuesta_editar']))
 {
     $mvc->guardarEncuestas( $_POST['nombre_encuesta_a_editar'], $_POST['id_usuario_encuesta_editar'], $_POST['estado'], $_POST['bandera'], $_POST['consentimiento_encuesta_editar'],  $_POST['id_encuesta_editar']);
 }
 /*EDITA un modulo*/
 if ( isset($_POST['id_modulo_encuesta_editar']) && isset($_POST['num_modulo_encuesta_editar']) && isset($_POST['titulo_modulo']) && isset($_POST['bandera_modulo']))
 {
     $mvc->guardarModulo( $_POST['id_modulo_encuesta_editar'], $_POST['titulo_modulo'], $_POST['bandera_modulo'], $_POST['num_modulo_encuesta_editar']);     
     // echo $_POST['id_encuesta_modulo_editar']."". $_POST['titulo_modulo']."".$_POST['bandera_modulo'];
 }
 /*EDITA una pregunta*/
 //if (isset($_POST['id_pregunta_encuesta_editar']) && isset($_POST['id_modulo_encuesta_editar']) && isset($_POST['id_pregunta_editar']) && isset($_POST['texto_de_pregunta']) && isset($_POST['ids']) && isset($_POST['opciones_editar']) && isset($_POST['ids_col']) && isset($_POST['opciones_editar_col']) && isset($_POST['tipo_pregunta_editar']) && isset($_POST['id_registro_pregunta_tipo_tabla']) && isset($_POST['cantidad_columnas_tipo5_editar']) && isset($_POST['cantidad_filas_tipo5_editar']) && isset($_POST['id_registro_pregunta_presentacion']) && isset($_POST['cantidad_columnas_organizar_tipo1_2']) && isset($_POST['cantidad_filas_organizar_tipo1_2']) && isset($_POST['numero_pregunta_vinculada']) && isset($_POST['bandera_pregunta']))
 //echo $_POST['id_pregunta_encuesta_editar'].",".$_POST['id_modulo_encuesta_editar'].",". $_POST['id_pregunta_editar'].",".$_POST['texto_de_pregunta'].",".$_POST['ids'].",".$_POST['opciones_editar'].",".$_POST['ids_col'].",".$_POST['opciones_editar_col'].",".$_POST['tipo_pregunta_editar'].",".$_POST['id_registro_pregunta_tipo_tabla'].",".$_POST['cantidad_columnas_tipo5_editar'].",".$_POST['cantidad_filas_tipo5_editar'].",".$_POST['opciones_columna_tipo5_editar'].",".$_POST['id_registro_pregunta_presentacion'].",".$_POST['cantidad_columnas_organizar_tipo1_2'].",".$_POST['cantidad_filas_organizar_tipo1_2'].",".$_POST['numero_pregunta_vinculada'].",".$_POST['bandera_pregunta'];
 //if (isset($_POST['id_pregunta_encuesta_editar']) && isset($_POST['id_modulo_encuesta_editar']) && isset($_POST['id_pregunta_editar']) && isset($_POST['texto_de_pregunta']) && isset($_POST['ids']) && isset($_POST['opciones_editar']) && isset($_POST['tipo_pregunta_editar']) && isset($_POST['id_registro_pregunta_tipo_tabla']) && isset($_POST['cantidad_columnas_tipo5_editar']) && isset($_POST['cantidad_filas_tipo5_editar']) && isset($_POST['id_registro_pregunta_presentacion']) && isset($_POST['cantidad_columnas_organizar_tipo1_2']) && isset($_POST['cantidad_filas_organizar_tipo1_2']) && isset($_POST['numero_pregunta_vinculada']) && isset($_POST['bandera_pregunta']))
 if (isset($_POST['id_pregunta_encuesta_editar']) && isset($_POST['id_modulo_encuesta_editar']) && isset($_POST['id_pregunta_editar']) && isset($_POST['texto_de_pregunta']) && isset($_POST['tipo_pregunta_editar']) && isset($_POST['id_registro_pregunta_tipo_tabla']) && isset($_POST['cantidad_columnas_tipo5_editar']) && isset($_POST['cantidad_filas_tipo5_editar']) && isset($_POST['id_registro_pregunta_presentacion']) && isset($_POST['cantidad_columnas_organizar_tipo1_2']) && isset($_POST['cantidad_filas_organizar_tipo1_2']) && isset($_POST['numero_pregunta_vinculada']) && isset($_POST['bandera_pregunta']))
 {
    $mvc->guardarPregunta1($_POST['id_pregunta_encuesta_editar'], $_POST['id_modulo_encuesta_editar'], $_POST['id_pregunta_editar'], $_POST['texto_de_pregunta'], $_POST['ids'], $_POST['opciones_editar'], $_POST['ids_col'], $_POST['opciones_editar_col'], $_POST['tipo_pregunta_editar'], $_POST['id_registro_pregunta_tipo_tabla'], $_POST['cantidad_columnas_tipo5_editar'], $_POST['cantidad_filas_tipo5_editar'], $_POST['id_registro_pregunta_presentacion'], $_POST['cantidad_columnas_organizar_tipo1_2'], $_POST['cantidad_filas_organizar_tipo1_2'], $_POST['numero_pregunta_vinculada'], $_POST['numero_modulo_encuesta_editar'], $_POST['bandera_pregunta']);
    //echo $_POST['id_pregunta_encuesta_editar'].",".$_POST['id_modulo_encuesta_editar'].",". $_POST['id_pregunta_editar'].",".$_POST['texto_de_pregunta'].",".$_POST['ids'].",".$_POST['opciones_editar'].",".$_POST['ids_col'].",".$_POST['opciones_editar_col'].",".$_POST['tipo_pregunta_editar'].",".$_POST['id_registro_pregunta_tipo_tabla'].",".$_POST['cantidad_columnas_tipo5_editar'].",".$_POST['cantidad_filas_tipo5_editar'].",".$_POST['opciones_columna_tipo5_editar'].",".$_POST['id_registro_pregunta_presentacion'].",".$_POST['cantidad_columnas_organizar_tipo1_2'].",".$_POST['cantidad_filas_organizar_tipo1_2'].",".$_POST['numero_pregunta_vinculada'].",".$_POST['bandera_pregunta'];
 }

 
 
 
 /*carga la encuesta para ser respondida*/
 if (isset($_POST['id_mi_encuesta']) && isset($_POST['id_mi_modulo']))
 {
    $mvc->cargarEncuesta($_POST['id_mi_encuesta'], $_POST['id_mi_modulo']);
 }
 if (isset($_POST['id_universidad']) )
 {
     $mvc->cargarComboFacultad($_POST['id_universidad']);
 }
 /*carga los programas academicos*/
 if (isset($_POST['id_facultad']) )
 {
     $mvc->cargarComboProgramaAcademico($_POST['id_facultad']);
 }
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
  if (isset($_POST['id_encuesta10']))
 {
    $mvc->cantidadModulosEncuesta($_POST['id_encuesta10']);
 }
?>
