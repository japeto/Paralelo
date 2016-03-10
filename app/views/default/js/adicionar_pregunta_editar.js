var id_encuesta, id_modulo;
$(document).ready(function()
{
    var flag;
    $('#opciones').hide();
    $('#etq').hide();
    $( "#nombre_pregunta" ).focus();    
    obtenerSession();
/*$("#preguntamodificar").hide();  */


$( "#terminarEdicion" ).click(
        function ()
        { 
            
            /*confirmar=confirm("Desea establecer saltos entre las preguntas?"); 
            if (confirmar)
            {
                $(location).attr('href',"vincular_preguntas.php");
            }
            else
            {        
                $(location).attr('href',"listado.php");
            }*/
        });
/*******************************************************************************************************************************/
$( "#adicionarPregunta" ).click(
        function() 
        {     

            /*$( "#pregunta" ).dialog( "open" );     */ 
            /*$("#idmofificarpregunta").hide();*/
           /* $("#preguntamodificar").show();  */    
           $(location).attr('href',"editar_pregunta1.php");            
        });

$("#cancelar1").click(function() 
        {     
            /*$("#preguntamodificar").hide();*/
            /*$("#idmofificarpregunta").show();*/
            $(location).attr('href',"editar_pregunta.php");
        });

//var usuario = $( "#user" ), contrasena = $( "#pass" ), todosLosCampos = $( [] ).add( usuario, contrasena);
    $("#guardarmodificado").click(function(){ 
    /*alert("funciona");*/                                                  

    var tipo_pregunta = parseInt($( "#id_tipo_pregunta" ).val());

    obtenerSession();
    switch (tipo_pregunta)
    {
    case 1:
    {                                                                                  
    if ( ( $( "#texto_pregunta" ).val() !== '') && ($( "#opciones" ).val() !== '') )
    {
    var check1 = $("#presentacion").prop("checked");

    if ( check1 === true)
    {                                                                                        
            if ( ( $( "#numero_fil_pregunta" ).val() !== '0') && ($( "#numero_cols_pregunta" ).val() !== '0') )
            {
                $.ajax({
                    url:"../../../../../indice_encuestas.php",
                    type: "POST",                                                                                     
                    data:"id_encuesta_a_adicionar_pregunta="+$( "#id_encuesta" ).val()
                            +"&id_modulo_encuesta_adicionar_pregunta="+$( "#id_modulo" ).val()
                            /*+"&id_modulo_encuesta_adicionar_pregunta=1"*/
                            +"&text="+$( "#texto_pregunta" ).val()
                            +"&id_tipo_pregunta="+$( "#id_tipo_pregunta" ).val()
                            +"&options="+$( "#opciones" ).val()
                            +"&cantidad_columnas=0"
                            +"&opciones_columna=0"
                            +"&cantidad_filas=0"
                            +"&fil_pregunta_tipo1="+$( "#numero_fil_pregunta" ).val()
                            +"&col_pregunta_tipo1="+$( "#numero_cols_pregunta" ).val(),
                    success: function(retorno)
                    {    
                        console.log(retorno);
                        //cargarEncuesta();                                                                                                  
                        obtenerSession();
                    },
                });
            }
            else
            {
                $("#mensajeaddpregunta1").show();
                $("#mensajeaddpregunta1").html('Usted ha elegido cambiar la forma como se presentar&aacute; las opciones de respuesta para esta pregunta \n Por favor seleccione los valores para las filas y las columnas');
                
            }
        
    }
    else
    {                                                                                            
        $.ajax({
            url:"../../../../../indice_encuestas.php",
            type: "POST",                                                                                     
            data:"id_encuesta_a_adicionar_pregunta="+$( "#id_encuesta" ).val()
                    +"&id_modulo_encuesta_adicionar_pregunta="+$( "#id_modulo" ).val()
                    +"&text="+$( "#texto_pregunta" ).val()
                    +"&id_tipo_pregunta="+$( "#id_tipo_pregunta" ).val()
                    +"&options="+$( "#opciones" ).val()
                    +"&cantidad_columnas=0"
                    +"&opciones_columna=0"
                    +"&cantidad_filas=0"
                    +"&fil_pregunta_tipo1=0"
                    +"&col_pregunta_tipo1=0",
            success: function(retorno)
            {    
                console.log(retorno);
                obtenerSession();
            },
        });
    }
}
else
{
    $("#mensajeaddpregunta1").show();
    $("#mensajeaddpregunta1").html('Debe completar la informacion');
    
}
break;
}
case 2:
{
 if ( ( $( "#texto_pregunta" ).val() !== '') && ($( "#opciones" ).val() !== '') )
{
    var check1 = $("#presentacion").prop("checked");
    
    if ( check1 === true)
    {                                                                                        
            if ( ( $( "#numero_fil_pregunta" ).val() !== '0') && ($( "#numero_cols_pregunta" ).val() !== '0') )
            {
                    $.ajax({
                    url:"../../../../../indice_encuestas.php",
                    type: "POST",                                                                                     
                    data:"id_encuesta_a_adicionar_pregunta="+$( "#id_encuesta" ).val()
                            +"&id_modulo_encuesta_adicionar_pregunta="+$( "#id_modulo" ).val()
                            +"&text="+$( "#texto_pregunta" ).val()
                            +"&id_tipo_pregunta="+$( "#id_tipo_pregunta" ).val()
                            +"&options="+$( "#opciones" ).val()
                            +"&cantidad_columnas=0"
                            +"&opciones_columna=0"
                            +"&cantidad_filas=0"
                            +"&fil_pregunta_tipo1="+$( "#numero_fil_pregunta" ).val()
                            +"&col_pregunta_tipo1="+$( "#numero_cols_pregunta" ).val(),
                    success: function(retorno)
                    {    
                        console.log(retorno);
                        obtenerSession();
                    },
                });
               
            }
            else
            {   $("#mensajeaddpregunta").show();
                $("#mensajeaddpregunta").html('Usted ha elegido cambiar la forma como se presentar&aacute; las opciones de respuesta para esta pregunta. Por favor seleccione los valores para las filas y las columnas');
                
            }
        
    }
    else
    {                                                                                            
        $.ajax({
            url:"../../../../../indice_encuestas.php",
            type: "POST",                                                                                     
            data:"id_encuesta_a_adicionar_pregunta="+$( "#id_encuesta" ).val()
                    +"&id_modulo_encuesta_adicionar_pregunta="+$( "#id_modulo" ).val()
                    +"&text="+$( "#texto_pregunta" ).val()
                    +"&id_tipo_pregunta="+$( "#id_tipo_pregunta" ).val()
                    +"&options="+$( "#opciones" ).val()
                    +"&cantidad_columnas=0&opciones_columna=0&cantidad_filas=0&fil_pregunta_tipo1=0&col_pregunta_tipo1=0",
            success: function(retorno)
            {    
                console.log(retorno);
                obtenerSession();
            },
        });
        $("#preguntamodificar").hide();
            $("#idmofificarpregunta").show();
    }
}
else
{
    $("#mensajeaddpregunta1").show();
    $("#mensajeaddpregunta1").html('Debe completar la informacion');
}

break;
}
case 3:
{                                                                                   
if ( $( "#texto_pregunta" ).val() !== '') 
{
    $.ajax({
        url:"../../../../../indice_encuestas.php",
        type: "POST",                                                                                     
        data:"id_encuesta_a_adicionar_pregunta="+$( "#id_encuesta" ).val()
                +"&id_modulo_encuesta_adicionar_pregunta="+$( "#id_modulo" ).val()
                +"&text="+$( "#texto_pregunta" ).val()
                +"&id_tipo_pregunta="+$( "#id_tipo_pregunta" ).val()
                +"&options=''&cantidad_columnas=0&opciones_columna=0&cantidad_filas=0&fil_pregunta_tipo1=0&col_pregunta_tipo1=0",
        success: function(retorno)
        {    
            console.log(retorno);
            obtenerSession();
        },
    });                                                                                           
  }
  else
  {
      $("#mensajeaddpregunta1").show();
      $("#mensajeaddpregunta1").html('Debe completar la informacion');
  }
  break;
}
case 4:
{
 if ( $( "#texto_pregunta" ).val() !== '') 
{
    $.ajax({
        url:"../../../../../indice_encuestas.php",
        type: "POST",                                                                                     
        data:"id_encuesta_a_adicionar_pregunta="+$( "#id_encuesta" ).val()
                +"&id_modulo_encuesta_adicionar_pregunta="+$( "#id_modulo" ).val()
                +"&text="+$( "#texto_pregunta" ).val()
                +"&id_tipo_pregunta="+$( "#id_tipo_pregunta" ).val()
                +"&options=''&cantidad_columnas=0&opciones_columna=0&cantidad_filas=0&fil_pregunta_tipo1=0&col_pregunta_tipo1=0",
        success: function(retorno)
        {    
            console.log(retorno);
            obtenerSession();
        },
    });                                                                                          
  }
  else
  {
      $("#mensajeaddpregunta1").show();
      $("#mensajeaddpregunta1").html('Debe completar la informacion');
  }
  break;
}
case 5:
{
if ( ( $( "#texto_pregunta" ).val() !== '') && ( $( "#opciones_fila" ).val() !== '') && ( $( "#opciones_columna" ).val() !== '') && ( $( "#numero_columnas" ).val() !== '0') && ( $( "#numero_filas" ).val() !== '0'))
{
    var columnas = parseInt( $( "#numero_columnas" ).val() );
    var filas = parseInt( $( "#numero_filas" ).val() );
    
    var total_columnas = 0;
    var total_filas = 0;
    if (( columnas >= 1) &&  ( columnas <= 5))
    {
       total_columnas = $( "#numero_columnas" ).val(); 
    }
    else
    {
        total_columnas = $( "#numero_columnas_extra" ).val();
    }  
    
    if (( filas >= 1) &&  ( filas <= 5))
    {
       total_filas = $( "#numero_columnas" ).val(); 
    }
    else
    {
        total_filas = $( "#numero_columnas_extra" ).val();
    } 
    
        $.ajax({
        url:"../../../../../indice_encuestas.php",
        type: "POST",                                                                                     
        data:"id_encuesta_a_adicionar_pregunta="+$( "#id_encuesta" ).val()
                +"&id_modulo_encuesta_adicionar_pregunta="+$( "#id_modulo" ).val()
                +"&text="+$( "#texto_pregunta" ).val()
                +"&id_tipo_pregunta="+$( "#id_tipo_pregunta" ).val()
                +"&options="+$( "#opciones_fila" ).val()
                //+"&cantidad_columnas="+$( "#numero_columnas" ).val()
                +"&cantidad_columnas="+total_columnas
                +"&opciones_columna="+$( "#opciones_columna" ).val()
                //+"&cantidad_filas="+$( "#numero_filas" ).val()
                +"&cantidad_filas="+total_filas
                +"&fil_pregunta_tipo1=0"
                +"&col_pregunta_tipo1=0",
        success: function(retorno)
        {    
            console.log(retorno);
            obtenerSession();
        },
    });
}
else
  {
      $("#mensajeaddpregunta1").show();
      $("#mensajeaddpregunta1").html('Debe completar la informacion');
  }
break;
}
case 6:
{
if ( $( "#texto_pregunta" ).val() !== '') 
{
    $.ajax({
        url:"../../../../../indice_encuestas.php",
        type: "POST",                                                                                     
        data:"id_encuesta_a_adicionar_pregunta="+$( "#id_encuesta" ).val()
                +"&id_modulo_encuesta_adicionar_pregunta="+$( "#id_modulo" ).val()
                +"&text="+$( "#texto_pregunta" ).val()
                +"&id_tipo_pregunta="+$( "#id_tipo_pregunta" ).val()
                +"&options=''&cantidad_columnas=0&opciones_columna=0&cantidad_filas=0&fil_pregunta_tipo1=0&col_pregunta_tipo1=0",
        success: function(retorno)
        {    
            console.log(retorno);
            obtenerSession();
        },
    });                                                                                     
  }
  else
  {
      $("#mensajeaddpregunta1").show();
      $("#mensajeaddpregunta1").html('Debe completar la informacion');
  }                                                                                      
break;
}
case 7:
{
if ( $( "#texto_pregunta" ).val() !== '') 
{
    $.ajax({
        url:"../../../../../indice_encuestas.php",
        type: "POST",                                                                                     
        data:"id_encuesta_a_adicionar_pregunta="+$( "#id_encuesta" ).val()
                +"&id_modulo_encuesta_adicionar_pregunta="+$( "#id_modulo" ).val()
                +"&text="+$( "#texto_pregunta" ).val()
                +"&id_tipo_pregunta="+$( "#id_tipo_pregunta" ).val()
                +"&options=''&cantidad_columnas=0&opciones_columna=0&cantidad_filas=0&fil_pregunta_tipo1=0&col_pregunta_tipo1=0",
        success: function(retorno)
        {    
            console.log(retorno);
            obtenerSession();
        },
    });                                                                                         
  }
  else
  {
     $("#mensajeaddpregunta1").show();
     $("#mensajeaddpregunta1").html('Debe completar la informacion');
  }                                                                                      
break; 
}
case 8:
{
if ( $( "#texto_pregunta" ).val() !== '') 
{
    $.ajax({
        url:"../../../../../indice_encuestas.php",
        type: "POST",                                                                                     
        data:"id_encuesta_a_adicionar_pregunta="+$( "#id_encuesta" ).val()
                +"&id_modulo_encuesta_adicionar_pregunta="+$( "#id_modulo" ).val()
                +"&text="+$( "#texto_pregunta" ).val()
                +"&id_tipo_pregunta="+$( "#id_tipo_pregunta" ).val()
                +"&options=''&cantidad_columnas=0&opciones_columna=0&cantidad_filas=0&fil_pregunta_tipo1=0&col_pregunta_tipo1=0",
        success: function(retorno)
        {    
            console.log(retorno);
            obtenerSession();
        },
    });                                                                                    
  }
  else
  {
     $("#mensajeaddpregunta1").show();
     $("#mensajeaddpregunta1").html('Debe completar la informacion');
  }                                                                                      
break;
}
case 9:
{
if ( $( "#texto_pregunta" ).val() !== '') 
{
    $.ajax({
        url:"../../../../../indice_encuestas.php",
        type: "POST",                                                                                     
        data:"id_encuesta_a_adicionar_pregunta="+$( "#id_encuesta" ).val()
                +"&id_modulo_encuesta_adicionar_pregunta="+$( "#id_modulo" ).val()
                +"&text="+$( "#texto_pregunta" ).val()
                +"&id_tipo_pregunta="+$( "#id_tipo_pregunta" ).val()
                +"&options=''&cantidad_columnas=0&opciones_columna=0&cantidad_filas=0&fil_pregunta_tipo1=0&col_pregunta_tipo1=0",
        success: function(retorno)
        {    
            console.log(retorno);
            obtenerSession();
        },
    });                                                                                         
  }
  else
  {
      $("#mensajeaddpregunta1").show();
      $("#mensajeaddpregunta1").html('Debe completar la informacion');
  }                                                                                      
break;
}
case 10:
{                                                                                       
$.ajax({
            url:"../../../../../indice_encuestas.php",
            type: "POST",                                                                                     
            data:"id_encuesta_a_adicionar_pregunta="+$( "#id_encuesta" ).val()
                    +"&id_modulo_encuesta_adicionar_pregunta="+$( "#id_modulo" ).val()
                    +"&text="+$( "#texto_pregunta" ).val()
                    +"&id_tipo_pregunta="+$( "#id_tipo_pregunta" ).val()
                    +"&options="+$( "#opciones" ).val()
                    +"&cantidad_columnas=0"
                    +"&opciones_columna=0"
                    +"&cantidad_filas=0"
                    +"&fil_pregunta_tipo1=0"
                    +"&col_pregunta_tipo1=0",
            success: function(retorno)
            {    
                console.log(retorno);
                obtenerSession();
            },
        });                                          
break; 
}
default:
{
    $("#mensajeaddpregunta1").show();
    $("#mensajeaddpregunta1").html('Tipo no encontrado');
}
}/*fin swicht*/                                                                       

});


/**************************************************************************************************************************************************************************/        

$( "#adicionarModulo" ).click(
        function() 
        {            
            $( "#modulo" ).dialog( "open" );            
        });
    
    $( "#modulo" ).dialog({                                    
                                    autoOpen: false,
                                    open: function ()
                                    {
                                        $(this).load('modulo_form.php');
                                    }, 
                                    height: 300,
                                    width: 900,
                                    modal: true,                                    
                                    buttons: { boton0: {text:'Guardar', class:'btn btn-primary boton', id:'save', tabindex:'2', click:function() {                                                   
                                                                        if ($( "#nombre_modulo" ).val() !== '')
                                                                        {
                                                                            $.ajax({
                                                                                url:"../../../../../indice_encuestas.php",
                                                                                type: "POST",
                                                                                data:"id_encuesta="+$( "#id_encuesta" ).val()+"&nombre_modulo="+$( "#nombre_modulo" ).val()+"&bandera=editar",
                                                                                success: function(retorno)
                                                                                {    
                                                                                    console.log(retorno);
                                                                                    var rta = parseInt(retorno);
                                                                                    if (rta === 1)
                                                                                    {                                                                                        
                                                                                        obtenerSession();                                                                                                                                                                                 
                                                                                    }
                                                                                },
                                                                            });
                                                                            $( this ).dialog( "close" );
                                                                        }
                                                                        else
                                                                        {
                                                                            alert("Debe Ingresar el nombre del modulo");
                                                                        }
                                                                                                                                                                                             
                                                                    }/*fin funcion*/
                                                                },/**fin arreglo botones*/
                                   boton2: {text:'Limpiar', class:'btn btn-primary', click: function(){$("#nombre_modulo").val("")}}},
                                   close: function() {}
                                });//FIN DEL DIALOGO
});//FIN FUNCION READY

function obtenerSession()/*obtiene la session del usuario*/
{  
    $.ajax({
        url:"get_session.php",        
        success: function(retorno)
        {               
            var session_var = $.parseJSON(retorno);                       
            $("#id_encuesta").val( session_var ["id_encuesta_a_editar"] );
            $("#id_modulo").val(session_var ["id_modulo_encuesta_a_editar"]);
            $("#nom").html("<center><h3><label id='name1'>Modulo: "+session_var ["nombre_modulo_encuesta_a_editar"]+"</label><h3></center>");
            cargarEncuesta(); /*carga una vista previa de la encuesta*/           
        }
    });  
   
}
function cargarEncuesta()
{           
    $.ajax({
        url:"../../../../../indice_encuestas.php",
        type: "POST",
        data:"id_encuesta1="+$("#id_encuesta").val()+"&id_modulo1="+$("#id_modulo").val(),
        success: function(opciones)
        {               
            $("#informacion").html(opciones);
            fecha("fecha2");
        }
    });  
}

function fecha(nombre)
{    
    $.datepicker.regional['es'] = {
        closeText: 'Cerrar',
        prevText: '<Ant',
        nextText: 'Sig>',
        currentText: 'Hoy',
        monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
        monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
        dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
        dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
        dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
        weekHeader: 'Sm',
        dateFormat: 'dd/mm/yy',
        firstDay: 1,
        isRTL: false,
        showMonthAfterYear: false,
        yearSuffix: ''
    };
    $.datepicker.setDefaults($.datepicker.regional['es']);
    $( '#'+nombre).datepicker({
                                            showOn: "button",
                                            buttonImage: "../../images/calendar.gif",
                                            buttonImageOnly: true,
                                            buttonText: "Select date",
                                            altField: "#alternate",                                            
                                            dateFormat: 'yy/mm/dd',
                                            altFormat: "d 'de' MM 'de' yy",
                                             changeMonth: true,
                                             changeYear: true,
                                             yearRange: "1900:2050"
                                       }); 

                                       
}