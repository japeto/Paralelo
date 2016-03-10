var listadoItems = new Array();
//var radio = new Array(), radio_tabla = new Array(), preguntas_radio = new Array(), checkb = new Array(), preguntas_check = new Array(), cajas_abiertas = new Array(), cajas_fe = new Array(), preguntas_tabla = new Array();
var radio = new Array(), radio_tabla = new Array(), preguntas_vinculadass = new Array(),preguntas_radio = new Array(), preguntas_check = new Array(), cajas_abiertas = new Array(), cajas_fe = new Array(), preguntas_tabla = new Array(), pregunta_combo_ubicacion = new Array(), pregunta_combo_universidad = new Array(),  pregunta_combo_semestre = new Array();
$(document).ready(function()
{   
    
    $('#recoger').prop("disabled", "");
    $('#sig_mod').attr("disabled", true);
    $('#ant_mod').attr("disabled", true);
//    cantidad_de_Modulos();
//    cantidad_de_Preguntas();
//    cargar_Modulo();   
//    activarCombos();
    

              
    //preguntasVinculadas();    
    $("#sig_mod").click(function ()
    {        
        var num = parseInt($("#id_modulo_actual").val());
        var total = parseInt($("#cantidad_total_modulos").val());
    
        if (num < total)
        {
            num = num + 1;            
            $("#id_modulo_actual").val(num);
            $(location).attr('href',"encuesta_pag1.php?mod="+num);            
            cargar_Modulo();
            pruebaSession();
            listadoItems = new Array();
        } 
        else
        {
            $("#contenedor").html("<center><h2>HAS TERMINADO LA ENCUESTA</h2><h3>Muchas gracias por tu colaboracion</h3></center>");             
        }
    });
    
   /******************************************************************************************************************************************************/   
    $("#ant_mod").click(function ()
    {   
        detener(1);
        cargar_Modulo_falso();        
    });
 /******************************************************************************************************************************************************/    
   $("#recoger").click(function ()
    {       
        //detener() ;
       recogerRespuestas();
       $('#sig_mod').attr("disabled", false);
       $('#ant_mod').attr("disabled", false); 
       $('#recoger').prop("disabled", "disabled"); 
     });/*FIN DE LA FUNCION*/   
    
});/*FIN FUNCION READY*/


function recogerRespuestas()
{
    var i, j, k, l, m, n, num_pregunta, num_pregunta_tabla;
        var selected = "", valor_radio = "", respuesta_tabla= '';
        
/*****************************************CAPTURA DE LAS RESPUESTA DE RADIO***************************************************/
   if(preguntas_radio !== null)
   {       
       for (i=0; i<preguntas_radio.length; i++)
        {   
            valor_radio = $("input[name='"+preguntas_radio[i].name+"[]']:checked").val();            
            if (valor_radio !== undefined)
            {              
                listadoItems.push( {"numero_pregunta": preguntas_radio[i].numero,"respuesta": valor_radio} );        
            }
            else
            {
                listadoItems.push( {"numero_pregunta": preguntas_radio[i].numero,"respuesta": "No Respondio"} );        
            }
        } 
   }    
    
/*****************************************************************************************************************************/        
        
/***************************************************CAPTURA LAS RESPUESTA DE CHECKBOX******************************************/     
   if(preguntas_check !== null)
   {
        for (i=0; i<preguntas_check.length; i++)
        {   
            $("input[name='"+preguntas_check[i].name+"[]']:checked").each(function()
            {            
                selected += $(this).val() + ",";
            });
            selected = selected.substring(0, selected.length-1);
            if(selected !== '')
            {
                listadoItems.push( {"numero_pregunta": preguntas_check[i].numero,"respuesta": selected} );                        
            } 
            else
            {
                listadoItems.push( {"numero_pregunta": preguntas_check[i].numero,"respuesta": "No Respondio"} );        
            }
            selected ='';
            num_pregunta = 0;
        }   
   } 
    
 /*****************************************************************************************************************************/               
        

/***************************************************CAPTURA LAS RESPUESTAS ABIERTA**********************************************/
        if(cajas_abiertas !== null)
        {
            for (k=0; k<cajas_abiertas.length; k++)
            {         
                if ( $('#'+cajas_abiertas[k].id).val() !== '')
                {  
                   listadoItems.push( {"numero_pregunta": cajas_abiertas[k].numero,"respuesta": $('#'+cajas_abiertas[k].id).val()} );
                }
                else
                {
                    listadoItems.push( {"numero_pregunta": cajas_abiertas[k].numero,"respuesta": "No Respondio"} );        
                }
            }  
        }    

///*******************************************************************************************************************************/        

///***************************************************CAPTURA LAS RESPUESTAS DE FECHA*********************************************/
        if(cajas_fe !== null)
        {
            for (l=0; l<cajas_fe.length; l++)
            {         
                if ( $('#'+cajas_fe[l].id).val() !== '')
                {                 
                   listadoItems.push( {"numero_pregunta": cajas_fe[l].numero,"respuesta": $('#'+cajas_fe[l].id).val()} );
                }
                else
                {
                    listadoItems.push( {"numero_pregunta": cajas_fe[l].numero,"respuesta": "No Respondio"} );        
                }
            } 
        }
         
///*****************************************************************************************************************************/        
//       
///***************************************************CAPTURA LAS RESPUESTAS DE CARRERA*********************************************/
            if (pregunta_combo_universidad !== null)
            {
                if (($("#facultad").val() !== '0') && ($("#programa").val() !== '0'))
                {
                    listadoItems.push( {"numero_pregunta": pregunta_combo_universidad[0].numero,"respuesta": $("#facultad option:selected").html()+", "+$("#programa option:selected").html()} );                    
                }
                else
                {
                    listadoItems.push( {"numero_pregunta": pregunta_combo_universidad[0].numero,"respuesta": "No Respondio"} );        
                }
                
            }
///*****************************************************************************************************************************/        
///***************************************************CAPTURA LAS RESPUESTAS DE DEPARTAMENTO*********************************************/
            if (pregunta_combo_ubicacion !== null)
            {
                if (($("#departamento").val() !== '0') && ($("#municipio").val() !== '0'))
                {
                    listadoItems.push( {"numero_pregunta": pregunta_combo_ubicacion[0].numero,"respuesta": $("#departamento option:selected").html()+", "+$("#municipio option:selected").html()} );
                }  
                else
                {
                    listadoItems.push( {"numero_pregunta": pregunta_combo_ubicacion[0].numero,"respuesta": "No Respondio"} );        
                }
            }
///*****************************************************************************************************************************/        
///***************************************************CAPTURA LAS RESPUESTAS DE *********************************************/
            if (pregunta_combo_semestre !== null)
            {
                if ($("#semestre").val() !== '0')
                {
                    listadoItems.push( {"numero_pregunta": pregunta_combo_semestre[0].numero,"respuesta": $("#semestre option:selected").html()} );
                }                
                else
                {
                    listadoItems.push( {"numero_pregunta": pregunta_combo_semestre[0].numero,"respuesta": "No Respondio"} );
                }
            }
///*****************************************************************************************************************************/        
///***************************************************CAPTURA LAS RESPUESTAS PREGUNTAS TIPO TABLA********************************/
                     
      if (preguntas_tabla !== null)
      {
          for (m=0; m<preguntas_tabla.length; m++)
          {
            num_pregunta_tabla = preguntas_tabla[m].id_pregunta; 
            respuesta_tabla = '';
            
           for (n=0; n<radio_tabla.length; n++)
            {                
                if ( $('#'+radio_tabla[n].id).is(':checked') === true)
                {                                                   
                    if (preguntas_tabla[m].id_pregunta === radio_tabla[n].numero)
                    {
                        respuesta_tabla += $('#'+radio_tabla[n].id).val()+", ";                        
                    }
                }
            }
            if (respuesta_tabla !== '')
            {
                listadoItems.push( {"numero_pregunta": num_pregunta_tabla,"respuesta": respuesta_tabla} );
            }
            else
            {
                listadoItems.push( {"numero_pregunta": num_pregunta_tabla,"respuesta": "No respondio"} );
            }
            
           }
      }        
        
///*****************************************************************************************************************************/        
//
//  for (j=0; j<listadoItems.length; j++)
//  {                   
//       console.log("--->"+listadoItems[j].numero_pregunta+"---"+listadoItems[j].respuesta);
//  }
//     
///********************************************************************************************************************************/                
   //console.log("cantidad de respuyestas"+listadoItems.length);
       if (listadoItems.length > 0)
       {           
           var datos = JSON.stringify(listadoItems);           
            $.ajax(
            {
                url:"../../../../../indice_encuestado.php",
                type: "POST",
                data: {mis_respuestas : datos},                 
                cache: false,
                success: function(retorno)
                {   
                    console.log(retorno);
                }
            });  
        }  
    
}

/*******************************************************************************************************************************/
function cantidad_de_Modulos()
{    
    $.ajax({
        url:"../../../../../indice_encuestado.php",
        type: "POST",
        data:"id_encuesta1="+$("#id_encuesta").val(),
        success: function(opciones)
        {               
            $("#cantidad_total_modulos").val(opciones);
        }
    });  
}
function cantidad_de_Preguntas()
{    
    $.ajax({
        url:"../../../../../indice_encuestado.php",
        type: "POST",
        data:"id_modulo1="+$("#id_modulo_actual").val(),
        success: function(retorno)
        {               
            $("#cantidad_total_preguntas_modulo").val(retorno);
            
        }
    });  
}



/*FUNCION QUE PERMITE CARGARME LA ENCUESTA COMPLETA POR MODULOS*/
function cargar_Modulo()
{    
    var i;
    $.ajax({
        url:"../../../../../indice_encuestado.php",
        type: "POST",
        data:"id_mi_encuesta="+$("#id_encuesta").val()+"&id_mi_modulo="+$("#id_modulo_actual").val()+"&cantidad_registros_por_pagina=5"+"&registro_donde_comienza="+$("#id_pregunta_actual").val(),
        success: function(opciones)
        {               
            $("#contenedor").html(opciones);            
            fecha("fecha2");
            $('#recoger').prop("disabled", "");
            $('#sig_mod').attr("disabled", true);
            $('#ant_mod').attr("disabled", true);
            //preguntasVinculadas();
            activarCombos();
            cargarComboDpto();
            cargaComboMunicipio();
            cargarComboFac();
            cargarComboPlan(); 
            pregunta222();     
             pruebaSession();
//            for (i=0; i<cajas_fe.length; i++)
//            {  
//                fecha(cajas_fe[i].id);
//            }            
            
        }
    });  
}

/*****************************************************************************************************************************************/
/*FUNCION QUE CARGA EL COMBO DEPARTAMENTOS*/
function cargarComboDpto()
{    
    $.ajax({
        url:"../../../../../indice_encuestado.php",
        type: "POST",
        data:"un_valor=1",
        success: function(opciones)
        {               
            $("#departamento").html(opciones);            
            $('#departamento').selectpicker('refresh');
        }
    });  
}
function cargaComboMunicipio()
{       
    $('#departamento').change( function ()
    {
            $.ajax({
            url:"../../../../../indice_encuestado.php",
            type: "POST",
            data:"id_dpto="+$("#departamento").val() ,
            success: function(opciones)
            {               
                $("#municipio").html(opciones);            
                $('#municipio').selectpicker('refresh');
            }
        });  
    })
    
}
/*****************************************************************************************************************************************/


/*FUNCION QUE CARGA EL COMBO FACULTADES*/
function cargarComboFac()
{       
    //console.log("--->"+$("#id_universidad").val());
    $.ajax({
        url:"../../../../../indice_encuestado.php",
        type: "POST",
        data:"id_universidad="+$("#id_universidad").val(),
        success: function(opciones)
        {               
            $("#facultad").html(opciones);            
            $('#facultad').selectpicker('refresh');
        }
    });  
}
/*FUNCION QUE CARGA EL COMBO PLANES DE ESTUDIO (CARRERAS)*/
function cargarComboPlan()
{
    $('#facultad').change( function ()
    {
            $.ajax({
            url:"../../../../../indice_encuestado.php",
            type: "POST",
            data:"id_facultad="+$("#facultad").val() ,
            success: function(opciones)
            {               
                $("#programa").html(opciones);            
                $('#programa').selectpicker('refresh');
            }
        });  
    })
}
/******************************************************************************************************************************************/
function pruebaSession()
{    
    console.log("entro a pruebasession");
    $.ajax({
        url:"get_session.php",        
        success: function(retorno)
        {               
            var session_var = $.parseJSON(retorno);           
            
            radio = session_var ["radios"];            
            preguntas_radio = session_var ["pregunta_radio"];            
            preguntas_vinculadass = session_var ["preguntas_vinculadas"];            
            preguntas_check = session_var ["pregunta_check"];            
            cajas_abiertas = session_var ["cajas_abierta"];            
            cajas_fe = session_var ["cajas_fecha"];            
            preguntas_tabla = session_var ["preguntas_tabla"];
            radio_tabla = session_var ["radios_tabla"];            
            pregunta_combo_ubicacion = session_var ["preguntas_combo_ubicacion"];            
            pregunta_combo_universidad = session_var ["preguntas_combo_universidad"];            
            pregunta_combo_semestre = session_var ["preguntas_combo_semestre"];
            /*******************************************************************/
            
            preguntasVinculadas();
        }
    });  
   
}

function pregunta222()
{   
    $('#221').click( function ()
    {         
             $('#cajita1').hide();
             $('#cajita2').hide();         
    }); 
    $('#222').click( function ()
    {
         var v = $("input:radio[name='radios22[]']:checked").val();             
         if (v === 'anos')
         {
             $('#cajita1').show();
             $('#cajita1').focus();
         }          
    }); 
    
    $('#223').click( function ()
    {
         var v = $("input:radio[name='radios22[]']:checked").val();                  
         if (v === 'meses')
         {
             $('#cajita2').show();
             $('#cajita2').focus();
         }            
    }); 
    
}
/*FUNCION QUE CONVIERTE UN COMBO EN BOOSTRAPT*/
function activarCombos()
{    
    $('.selectpicker').selectpicker();
    $('#cajita1').hide();
    $('#cajita2').hide();    
}

function omitirAcentos(text) {

    var acentos = "ÃÀÁÄÂÈÉËÊÌÍÏÎÒÓÖÔÙÚÜÛãàáäâèéëêìíïîòóöôùúüûÑñÇç";
    var original = "AAAAAEEEEIIIIOOOOUUUUaaaaaeeeeiiiioooouuuunncc";
    for (var i = 0; i < acentos.length; i++) {

        text = text.replace(acentos.charAt(i), original.charAt(i));
    }

    return text;
}

function preguntasVinculadas()
{
    if(preguntas_vinculadass !== null)
    {        
        for (i=0; i<preguntas_vinculadass.length; i++)
        {   
            $("input[name= '"+preguntas_vinculadass[i].name+"[]']:radio").change(            
            function() 
            {        
                console.log('entro a change');
                for (var i = 0; i < preguntas_vinculadass.length; i++) 
                {                        
                        var valorOpcion = $(this).val();                         
                        var opciones = preguntas_vinculadass[i].opciones.split(",");
                        if ($(this).attr('name') == preguntas_vinculadass[i].name+"[]") 
                        {                            

                            for (j = 0; j < opciones.length; j++)
                            {
                                if (valorOpcion == opciones[j])
                                {
                                    var pregunta_inicio = parseInt(preguntas_vinculadass[i].numero_pregunta) + 1;

                                        console.log("INICIO BLOQUEAR DESDE" + pregunta_inicio + " Y HASTA" + preguntas_vinculadass[i].pregunta_vinculada[i]);

                                        for (var k = pregunta_inicio; k < preguntas_vinculadass[i].pregunta_vinculada; k++) 
                                        {
                                                $("#"+k).hide();  
                                        }
                                        break;
                                }
                                else 
                                {
                                        var pregunta_inicio = parseInt(preguntas_vinculadass[i].numero_pregunta) + 1;
                                        for (var k = pregunta_inicio; k < preguntas_vinculadass[i].pregunta_vinculada; k++) 
                                        {
                                                $("#"+k).show();  
                                        }
                                }


                            }
                        }
                    
                }/*FIN FOR CHANGE*/               
                        
            });/*FIN CHANGE*/
        }
    }

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