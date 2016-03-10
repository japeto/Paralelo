var listadoItems = new Array();
var id_box = '', id_check = '', id_box_year='';

var     preguntas = new Array(), 
        tipo_pregunta = new Array(), 
        numRespuesta = new Array(), 
        radio = new Array(), 
        radio_tabla = new Array(), 
        preguntas_vinculadass = new Array(),
        preguntas_radio = new Array(), 
        preguntas_check = new Array(), 
        cajas_abiertas = new Array(), 
        cajas_fe = new Array(), 
        preguntas_tabla = new Array(), 
        pregunta_combo_ubicacion = new Array(), 
        pregunta_combo_universidad = new Array(),  
        pregunta_combo_semestre = new Array();
        preguntas_cual = new Array();
        pregunta_anio_mes = new Array();
 
$(document).ready(function()
{   
    
    $('#recoger').prop("disabled", "");
    $('#sig_mod').attr("disabled", true);
    
    cantidad_de_Modulos();    
    cargar_Modulo();   
    activarCombos();    
    //ponerRespuesta();
    
});/*FIN FUNCION READY*/

/*FUNCION QUE PERMITE CARGARME LA ENCUESTA COMPLETA POR MODULOS*/
function cargar_Modulo()
{    
    var i;
    $.ajax({
        url:"../../../../../indice_encuestado.php",
        type: "POST",
        data:"id_mi_encuesta="+$("#id_encuesta").val()+"&id_mi_modulo="+$("#id_modulo_actual").val()+"&pin1="+$("#pin").val(),
        beforeSend: function () 
        {
            $("#contenedor").html("Procesando, espere por favor...");
        },
        success: function(opciones)
        {
            $("#contenedor").html(opciones);            
            fecha("fecha2");
            $('#recoger').prop("disabled", "");
            $('#sig_mod').attr("disabled", true);
            $('#ant_mod').attr("disabled", true);
                
            activarCombos();
            cargarComboDpto();
            cargaComboMunicipio();
            cargarComboFac();
            cargarComboPlan(); 
            //pregunta222();     
            pruebaSession();
            
            botonSiguiente();
            botonGuardar();
//            for (i=0; i<cajas_fe.length; i++)
//            {  
//                fecha(cajas_fe[i].id);
//            } 
                
            }
    });  
}


function botonSiguiente()/*FUNCION QUE ACTIVA EL BOTON Siguiente*/
{
    $("#sig_mod").click(function ()
    {        
        var num = parseInt($("#id_modulo_actual").val());
        var total = parseInt($("#cantidad_total_modulos").val());    
        num = num + 1;
        if (num < total)
        {            
            $("#id_modulo_actual").val(num);
            $(location).attr('href',"encuesta_pag1.php?mod="+num);            
            cargar_Modulo();
            pruebaSession();            
            listadoItems = new Array();
        }
        else
        {
           $(location).attr('href',"encuesta_pag1.php?mod="+num);
        }
    });
}

function botonGuardar()/*FUNCION QUE ACTIVA EL BOTON GUARDAR*/
{
     $("#recoger").click(function ()
    {       
       recogerRespuestas();
       $('#sig_mod').attr("disabled", false);       
       $('#recoger').prop("disabled", "disabled"); 
     });/*FIN DE LA FUNCION*/   
    
}
function recogerRespuestas()
{
    var i, j, k, l, m, n, num_pregunta, num_pregunta_tabla;
        var selected = "", valor_radio = "", respuesta_tabla= '';
        
/*****************************************CAPTURA DE LAS RESPUESTA DE RADIO***************************************************/
   if(preguntas_radio !== null)
   {       
       var valor = "";
       for (i=0; i<preguntas_radio.length; i++)
        {   
            valor_radio = $("input[name='"+preguntas_radio[i].name+"[]']:checked").val();            
            if (valor_radio !== undefined)
            {                         
                switch (valor_radio) 
                { 
                    case "anos":
                    {
                        console.log("anos");     
                        for (k=0; k<pregunta_anio_mes.length; k++)
                        {
                            if(pregunta_anio_mes[k].name === preguntas_radio[i].name)
                            {
                                valor += $("#"+pregunta_anio_mes[k].id).val()+" años ";
                            }
                        }
                        valor = valor.substring(0, valor.length - 5);
                        valor += "meses";
                        
                        listadoItems.push( {"numero_pregunta": preguntas_radio[i].numero,"respuesta": valor, "pregunta_tipo":valor} );        
                        break;
                    }
                    case "Otro":
                    {
                        for (j=0; j<preguntas_cual.length; j++)
                        {                       
                            if(preguntas_cual[j].name === preguntas_radio[i].name)
                            {
                               console.log($("#"+preguntas_cual[j].id).val()); 
                               listadoItems.push( {"numero_pregunta": preguntas_radio[i].numero,"respuesta": $("#"+preguntas_cual[j].id).val(),"pregunta_tipo":$("#"+preguntas_cual[j].id).val()} );        
                            }
                        }
                        break;                    
                    }
                    default :
                    {
                        listadoItems.push( {"numero_pregunta": preguntas_radio[i].numero,"respuesta": valor_radio,"pregunta_tipo":valor_radio} );        
                    }
                }
                
            }
            else
            {
                listadoItems.push( {"numero_pregunta": preguntas_radio[i].numero,"respuesta": "No respondio","pregunta_tipo":8888} );        
            }
        } 
   }    
    
/*****************************************************************************************************************************/        
   if(preguntas_vinculadass !== null)
   {       
       
       for (i=0; i<preguntas_vinculadass.length; i++)
        {   
       
            valor_radio = $("input[name='"+preguntas_vinculadass[i].name+"[]']:checked").val();            
            if (valor_radio !== undefined)            {              
                
                listadoItems.push( {"numero_pregunta": preguntas_vinculadass[i].numero_pregunta,"respuesta": valor_radio} );        
            }
            else
            {
                listadoItems.push( {"numero_pregunta": preguntas_vinculadass[i].numero_pregunta,"respuesta": "No respondio"} );        
            }
        } 
   }   
   
       
/***************************************************CAPTURA LAS RESPUESTA DE CHECKBOX******************************************/     
   if(preguntas_check !== null)
   {
        for (i=0; i<preguntas_check.length; i++)
        {   
            $("input[name='"+preguntas_check[i].name+"[]']:checked").each(function()
            {            
                var info = $(this).val();
                
                switch (info) 
                { 
                    case "Otro":
                    {
                        for (j=0; j<preguntas_cual.length; j++)
                        {                       
                            if(preguntas_cual[j].name === preguntas_check[i].name)
                            {                               
                               selected += info+" :"+$("#cajitas"+ preguntas_cual[j].id).val()+ ",";                             
                            }
                        }
                        break;                    
                    }
                    case "Otra":
                    {
                     
                        for (j=0; j<preguntas_cual.length; j++)
                        {                       
                            if(preguntas_cual[j].name === preguntas_check[i].name)
                            {
                               console.log($("#cajitas"+preguntas_cual[j].id).val()); 
                               selected += info+" :"+$("#cajitas"+ preguntas_cual[j].id).val()+ ",";                               
                            }
                        }
                        break;                    
                    }
                    case "Otros":
                    {
                     
                        for (j=0; j<preguntas_cual.length; j++)
                        {                       
                            if(preguntas_cual[j].name === preguntas_check[i].name)
                            {
                               console.log($("#cajitas"+preguntas_cual[j].id).val()); 
                               selected += info+" :"+$("#cajitas"+ preguntas_cual[j].id).val()+ ",";                               
                            }
                        }
                        break;                    
                    }
                    case "Otras":
                    {
                     
                        for (j=0; j<preguntas_cual.length; j++)
                        {                       
                            if(preguntas_cual[j].name === preguntas_check[i].name)
                            {
                               console.log($("#cajitas"+preguntas_cual[j].id).val()); 
                               selected += info+" :"+$("#cajitas"+ preguntas_cual[j].id).val()+ ",";                               
                            }
                        }
                        break;                    
                    }
                    default :
                    {
                        //listadoItems.push( {"numero_pregunta": preguntas_check[i].numero,"respuesta": valor_radio} );        
                       selected += info + ","; 
                    }
                }
            });
            
            selected = selected.substring(0, selected.length-1);
            
            if(selected !== '')
            {
                listadoItems.push( {"numero_pregunta": preguntas_check[i].numero,"respuesta": selected,"pregunta_tipo":selected} );                        
            } 
            else
            {
                listadoItems.push( {"numero_pregunta": preguntas_check[i].numero,"respuesta": "No respondio", "pregunta_tipo":8888} );        
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
                   listadoItems.push( {"numero_pregunta": cajas_abiertas[k].numero,"respuesta": $('#'+cajas_abiertas[k].id).val(),"pregunta_tipo":$('#'+cajas_abiertas[k].id).val()} );
                }
                else
                {
                    listadoItems.push( {"numero_pregunta": cajas_abiertas[k].numero,"respuesta": "No respondio","pregunta_tipo":8888} );        
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
                   listadoItems.push( {"numero_pregunta": cajas_fe[l].numero,"respuesta": $('#'+cajas_fe[l].id).val(),"pregunta_tipo":$('#'+cajas_fe[l].id).val()} );
                }
                else
                {
                    listadoItems.push( {"numero_pregunta": cajas_fe[l].numero,"respuesta": "No respondio","pregunta_tipo":8888} );        
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
                    listadoItems.push( {"numero_pregunta": pregunta_combo_universidad[0].numero,"respuesta": $("#facultad option:selected").html()+","+$("#programa option:selected").html(),"pregunta_tipo":$("#facultad option:selected").html()+","+$("#programa option:selected").html() } );                    
                }
                else
                {
                    listadoItems.push( {"numero_pregunta": pregunta_combo_universidad[0].numero,"respuesta": "No respondio","pregunta_tipo":"No respondio"});        
                }
                
            }
///*****************************************************************************************************************************/        
///***************************************************CAPTURA LAS RESPUESTAS DE DEPARTAMENTO*********************************************/
            if (pregunta_combo_ubicacion !== null)
            {
                if (($("#departamento").val() !== '0') && ($("#municipio").val() !== '0'))
                {
                    listadoItems.push( {"numero_pregunta": pregunta_combo_ubicacion[0].numero,"respuesta": $("#departamento option:selected").html()+","+$("#municipio option:selected").html(),"pregunta_tipo":$("#departamento option:selected").html()+","+$("#municipio option:selected").html()} );
                }  
                else
                {
                    listadoItems.push( {"numero_pregunta": pregunta_combo_ubicacion[0].numero,"respuesta": "No respondio","pregunta_tipo":"No respondio"} );        
                }
            }
///*****************************************************************************************************************************/        
///***************************************************CAPTURA LAS RESPUESTAS DE SEMESTRE *********************************************/
            if (pregunta_combo_semestre !== null)
            {
                if ($("#semestre").val() !== '0')
                {
                    listadoItems.push( {"numero_pregunta": pregunta_combo_semestre[0].numero,"respuesta": $("#semestre option:selected").html(),"pregunta_tipo":$("#semestre option:selected").html()} );
                }                
                else
                {
                    listadoItems.push( {"numero_pregunta": pregunta_combo_semestre[0].numero,"respuesta": "No respondio","pregunta_tipo":8888} );
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
                        respuesta_tabla += $('#'+radio_tabla[n].id).val()+",";                        
                    }
                }
            }
            if (respuesta_tabla !== '')
            {
                listadoItems.push( {"numero_pregunta": num_pregunta_tabla,"respuesta": respuesta_tabla,"pregunta_tipo":respuesta_tabla} );
            }
            else
            {
                listadoItems.push( {"numero_pregunta": num_pregunta_tabla,"respuesta": "No respondio","pregunta_tipo":8888} );
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
   
       if (listadoItems.length > 0)
       {           
           var datos = JSON.stringify(listadoItems);           
            $.ajax(
            {
                url:"../../../../../indice_encuestado.php",
                type: "POST",
                data: {mis_respuestas : datos, id_encuesta_respondida : $("#id_encuesta").val()},                 
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
    //$('#cajita1').hide();
    //$('#cajita2').hide();    
    $('.otro_cual').hide();
    $('.cajatiempo').hide();
    
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
                                            //showOn: "button",
                                            //buttonImage: "../../images/calendar.gif",
                                            //buttonImageOnly: false,
                                            //buttonText: "Escoge la fecha",
                                            //altField: "#alternate",                                            
                                            dateFormat: 'yy-mm-dd',
                                            //altFormat: "d 'de' MM 'de' yy",
                                             changeMonth: true,
                                             changeYear: true,
                                             yearRange: "1988:1997"
                                       }); 

                                       
}



function pruebaSession()
{  
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
            preguntas_cual = session_var ["pregunta_cual"];
            pregunta_anio_mes = session_var ["pregunta_anios_meses"];
            //console.log(preguntas_radio);            
            console.log(preguntas_cual);            
            preguntasVinculadas();                        
            preguntasOtroCual();
            preguntasOtroCualCheck();
            preguntaAnios();
            
        }
    });  
   
}


function omitirAcentos(text) {

    var acentos = "ÃÀÁÄÂÈÉËÊÌÍÏÎÒÓÖÔÙÚÜÛãàáäâèéëêìíïîòóöôùúüûÑñÇç/";
    var original = "AAAAAEEEEIIIIOOOOUUUUaaaaaeeeeiiiioooouuuunncc";
    for (var i = 0; i < acentos.length; i++) {

        text = text.replace(acentos.charAt(i), original.charAt(i));
    }

    return text;
}
function desactivarCajaanios()
{
    //console.log(id_box);     
    $('.cajatiempo').hide();  
}

function desactivarCaja()
{
    //console.log(id_box);
    $('#cajitas'+id_box).hide();      
}
function desactivarCajaCheck()
{
    //console.log(id_check);
    $('#cajitas'+id_check).hide();    
}

function preguntasOtroCual()
{    
    if(preguntas_cual !== null)
    {   
        for (var i=0; i<preguntas_cual.length; i++)
        {               
            $("input[name='"+preguntas_cual[i].name+"[]']:radio").change(            
            function() 
            {   
                for (var j = 0; j < preguntas_cual.length; j++) 
                {       
                        var valor = $("input:radio[name='"+preguntas_cual[j].name+"[]']:checked").val();
                        var id = $(this).attr("id");                        
                        //var id1 = $("input:text[name='"+preguntas_cual[j].name_caja+"']").attr('id');                                                
                            if ((valor === 'Otro') ||  (valor === 'Otra'))
                            {
                                id_box = $(this).attr("id");
                                $("#cajitas"+id).show();
                                $("#cajitas"+id).focus();
                                break;
                            }                       
                            else
                            {
                                desactivarCaja();
                            }                            
                        
                }/*FIN FOR CHANGE*/
            });/*FIN CHANGE*/
        }/*fin for preguntas*/
    }

}

function preguntaAnios()
{    
    if(pregunta_anio_mes !== null)
    {   
        console.log("entro al if");
        for (var i=0; i<pregunta_anio_mes.length; i++)
        {               
            console.log("entro al for");
            $("input[name='"+pregunta_anio_mes[i].name+"[]']:radio").change(            
            function() 
            {   
                console.log("entro al change");
                for (var j = 0; j < pregunta_anio_mes.length; j++) 
                {       
                        var valor = $("input:radio[name='"+pregunta_anio_mes[j].name+"[]']:checked").val();
                        
                        var id = $(this).attr("id");                        
                        console.log("-->"+valor+" "+id);
                        //var id1 = $("input:text[name='"+preguntas_cual[j].name_caja+"']").attr('id');                                                
                            if (valor === 'anos')
                            {
                                id_box_year = $(this).attr("id");                                
                                $(".cajatiempo").show();
                                $("#cajita"+id).focus();
                                break;
                            }                       
                            else
                            {
                                desactivarCajaanios();
                            }                            
                        
                }/*FIN FOR CHANGE*/
            });/*FIN CHANGE*/
        }/*fin for preguntas*/
    }

}


function preguntasOtroCualCheck()
{    
    if(preguntas_cual !== null)
    {   
        for (var i=0; i<preguntas_cual.length; i++)
        {               
            $("input[name='"+preguntas_cual[i].name+"[]']:checkbox").change(            
            function() 
            {   
                for (var j = 0; j < preguntas_cual.length; j++) 
                {       
                        var valor = $("input:checkbox[name='"+preguntas_cual[j].name+"[]']:checked").val();
                        var id = $(this).attr("id"); 
                        if ((valor === 'Otro') ||  (valor === 'Otra') ||  (valor === 'Otros') ||  (valor !== 'Otros') ||  (valor === 'Otra') ||  (valor !== 'Otro'))
                            {
                                id_check = $(this).attr("id");                                                               
                                $("#cajitas"+id).show();
                                $("#cajitas"+id).focus();
                                break;                                
                            }
                            else
                            {
                                desactivarCajaCheck(id_check);
                            }
                }/*FIN FOR CHANGE*/
            });/*FIN CHANGE*/
        }/*fin for preguntas*/
    }

}

function preguntasVinculadas()
{
    if(preguntas_vinculadass !== null)
    {   
        for (var i=0; i<preguntas_vinculadass.length; i++)
        {   
            $("input[name= '"+preguntas_vinculadass[i].name+"[]']:radio").change(            
            function() 
            {   
                for (var i = 0; i < preguntas_vinculadass.length; i++) 
                {                        
                        var valorOpcion = $(this).val();                         
                        var opciones = preguntas_vinculadass[i].opciones.split(",");                        
                        if ($(this).attr('name') === preguntas_vinculadass[i].name+"[]") 
                        {   
                            for (var j = 0; j < opciones.length; j++)
                            {
                                console.log(valorOpcion+" ==="+ opciones[j]);
                                if (valorOpcion === opciones[j])
                                {                                    
                                    var pregunta_inicio = parseInt(preguntas_vinculadass[i].numero_pregunta) + 1;

                                        console.log("INICIO BLOQUEAR DESDE" + pregunta_inicio + " Y HASTA" + preguntas_vinculadass[i].pregunta_vinculada);

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
        }/*fin for preguntas*/
    }

}




function ponerRespuesta() 
{

console.log('entro a poner respuestas');
    var respuestasMarcadas = new Array();

$.ajax({
        url:"get_session.php",  
        cache: false,
        success: function(retorno)
        {               
            var session_var = $.parseJSON(retorno);           
            
//            radio = session_var ["radios"];            
//            preguntas_radio = session_var ["pregunta_radio"];            
//            preguntas_vinculadass = session_var ["preguntas_vinculadas"];            
//            preguntas_check = session_var ["pregunta_check"];            
//            cajas_abiertas = session_var ["cajas_abierta"];            
//            cajas_fe = session_var ["cajas_fecha"];            
//            preguntas_tabla = session_var ["preguntas_tabla"];
//            radio_tabla = session_var ["radios_tabla"];            
//            pregunta_combo_ubicacion = session_var ["preguntas_combo_ubicacion"];            
//            pregunta_combo_universidad = session_var ["preguntas_combo_universidad"];            
//            pregunta_combo_semestre = session_var ["preguntas_combo_semestre"];
            
            pin = session_var ["encuestado"];
            tipo_pregunta = session_var ["tipo_de_respuesta"];
            numRespuesta = session_var ["numero_de_respuesta"];
            console.log(tipo_pregunta); 

                
/*************************************************************************************************************************************/ 
            var datos = JSON.stringify(numRespuesta); 
            $.ajax({
                      url:"../../../../../indice_encuestado.php",
                      type: "POST",
                      dataType: 'JSON',
                      //data:"id_encuesta_a_verificar="+$("#id_encuesta").val()+"&preguntas_a_completar="+numRespuesta+"&pin="+pin,
                      data:{id_encuesta_a_verificar:$("#id_encuesta").val(), preguntas_a_completar: datos, pin: pin},
                      success: function(data) 
                      {
                          console.log(data);
                          for (var i = 0; i < numRespuesta.length; i++)
                          {
                              if (tipo_pregunta[i] == 1) 
                              {//radiobutton
                                if (data[i] == null)
                                {
                                    
                                }
                                else 
                                {
                                    console.log(data[i]);
                                    $("input:radio[name=radios" + numRespuesta[i] + "[]]").filter("[value='" + data[i] + "']").prop("checked", true).checkboxradio("refresh");
                                    $("input:radio[name=radios" + numRespuesta[i] + "[]]").checkboxradio('disable');
                                    
                                    if (document.getElementById("texto_pregunta" + numRespuesta[i])) 
                                    {
                                        $("#texto_pregunta" + numRespuesta[i]).val(data[i]);
                                        $("#texto_pregunta" + numRespuesta[i]).textinput('disable');
                                    }
                                }
                            }
//                            if (tipoPregunta[i] == 2) 
//                            {//checkbox multiple respuesta
//                                if (data[i] == null) 
//                                {                                    
//                                } 
//                                else 
//                                {
//                                    console.log(data[i]);
//                                    var str = data[i];
//                                    var res = str.split(",");
//                                    for (var k = 0; k < res.length; k++) 
//                                    {
//                                        console.log(res[k]);                                        
//                                        if ($("input:checkbox[name=checkbox-" + numRespuesta[i] + "[]]").filter("[value='" + res[k] + "']").index() == -1) 
//                                        {
//                                    //$("input:checkbox[name=checkbox-" + numRespuesta[i] + "[]]").filter("[value='Otra']").attr('checked', true).checkboxradio("refresh");
//                                    //$("input:checkbox[name=checkbox-" + numRespuesta[i] + "[]]").filter("[value='Otras']").attr('checked', true).checkboxradio("refresh");
//                                    //$("input:checkbox[name=checkbox-" + numRespuesta[i] + "[]]").filter("[value='Otro']").attr('checked', true).checkboxradio("refresh");
//                                   // $("input:checkbox[name=checkbox-" + numRespuesta[i] + "[]]").filter("[value='Otros']").attr('checked', true).checkboxradio("refresh");
//                                    $("#texto_pregunta" + numRespuesta[i]).val(res[k]);
//                                    $("#texto_pregunta" + numRespuesta[i]).textinput('disable');
//
//                                } else {
//                                    //console.log("no entra");
//                                    $("input:checkbox[name=checkbox-" + numRespuesta[i] + "[]]").filter("[value='" + res[k] + "']").attr('checked', true).checkboxradio("refresh");
//
//                                }
//                            }
//
//
//                            $("input:checkbox[name=checkbox-" + numRespuesta[i] + "[]]").checkboxradio('disable');
//                        }
//
//                    }
//                    if (tipoPregunta[i] == 3)
//                    {//Area de texto
//                        if (data[i] == null || data[i] == "") 
//                        {
//
//                        }
//                        else 
//                        {
//                            console.log(data[i]);
//                            $("#pregunta" + numRespuesta[i]).val(data[i]);
//                            $("#pregunta" + numRespuesta[i]).textinput('disable');
//                        }
//                    }
//
//                    if (tipoPregunta[i] == 4)
//                    {//FECHA TEXTO DATEPICKER
//                        if (data[i] == null) 
//                        {
//
//                        } 
//                        else 
//                        {
//                            console.log(data[i]);
//                            $("#pregunta" + numRespuesta[i]).val(data[i]);
//                            //console.log($("#pregunta" + numRespuesta[i]).datepicker("option", "disabled", true));
//                            if (document.getElementById("pregunta" + numRespuesta[i])) 
//                            {
//                                document.getElementById("pregunta" + numRespuesta[i]).disabled = true;
//                            }
//                        }
//                    }
//
//                    if (tipoPregunta[i] == 5) 
//                    {//tablas
//                        if (data[i] == null) 
//                        {
//
//                        }
//                        else 
//                        {
//                            console.log(data[i]);
//                            var str = data[i];
//                            var res = str.split(",");
//                            for (var k = 0; k < res.length; k++) 
//                            {
//                                $("input:radio[name=radio-tabla" + numRespuesta[i] + "Opc" + (k + 1) + "]").filter("[value='" + res[k] + "']").prop("checked", true).checkboxradio("refresh");
//                                $("input:radio[name=radio-tabla" + numRespuesta[i] + "Opc" + (k + 1) + "]").checkboxradio('disable');
//                            }
//                        }
//                    }
//                    if (tipoPregunta[i] == 7)
//                    {//Ubicacion
//                        if (data[i] == null) 
//                        {
//
//                        }
//                        else 
//                        {
//                            console.log(data[i]);
//                            if (data[i] == "No respondio") 
//                            {
//                                $("#select-choice-deptos").empty();
//                                $("#select-choice-deptos").prop('disabled', 'disabled');
//                                $("#select-choice-municipios").prop('disabled', 'disabled');
//                            }
//                            else
//                            {
//                                var str = data[i];
//                                var res = str.split(",");
//                                console.log(res[0]);
//                                console.log(res[1]);
//                                //Doble comilla option[value='" +res[0] + "'] para q una los espacios
//                                $("#select-choice-deptos option[value='" + res[0] + "']").attr("selected", true);
//                                $("#select-choice-deptos").selectmenu("refresh", true);
//                                //  $("#select-choice-deptos").click();
//
//                                //$("#select-choice-municipios").click();
//                                $("#select-choice-municipios").append('<option value="' + res[1] + '" id="' + res[1] + '">' + res[1] + '</option>');
//                                $("#select-choice-municipios").selectmenu("refresh", true);
//                                $("#select-choice-municipios option[value='" + res[1] + "']").attr("selected", true);
//                            }
//                            $("#select-choice-deptos").selectmenu("refresh", true);
//                            $("#select-choice-municipios").selectmenu("refresh", true);
//                            $("#select-choice-deptos").prop('disabled', 'disabled');
//                            $("#select-choice-municipios").prop('disabled', 'disabled');
//                        }
//                    }
//
//                    if (tipoPregunta[i] == 8) 
//                    {//Universidad
//                        if (data[i] == null) 
//                        {
//
//                        }
//                        else 
//                        {
//                            console.log(data[i]);
//                            if (data[i] == "No respondio") 
//                            {
//                                $("#select-choice-facultad").empty();
//                                $("#select-choice-facultad").prop('disabled', 'disabled');
//                                $("#select-choice-programa").prop('disabled', 'disabled');
//                            }
//                            else
//                            {
//                                var str = data[i];
//                                var res = str.split(",");
//                                console.log(res[0]);
//                                console.log(res[1]);
//                                //Doble comilla option[value='" +res[0] + "'] para q una los espacios
//                                $("#select-choice-facultad option[value='" + res[0] + "']").attr("selected", true);
//                                $("#select-choice-facultad").selectmenu("refresh", true);
//                            
//                            
//                                $("#select-choice-programa").append('<option value="' + res[1] + '" id="' + res[1] + '">' + res[1] + '</option>');
//                                $("#select-choice-programa").selectmenu("refresh", true);
//                                $("#select-choice-programa option[value='" + res[1] + "']").attr("selected", true);
//                            }
//                            $("#select-choice-facultad").selectmenu("refresh", true);
//                            $("#select-choice-programa").selectmenu("refresh", true);
//                            $("#select-choice-facultad").prop('disabled', 'disabled');
//                            $("#select-choice-programa").prop('disabled', 'disabled');
//                        }
//                    }
//
//                    if (tipoPregunta[i] == 9)
//                    {//Semestre
//                        if (data[i] == null) 
//                        {
//
//                        }
//                        else 
//                        {
//                            console.log(data[i]);
//                            if (data[i] == "11 o mas") 
//                            {
//                                $("#select-choice-semestre-" + numRespuesta[i] + " option[value=11]").attr("selected", true);
//                            }
//                            else 
//                            {
//                                $("#select-choice-semestre-" + numRespuesta[i] + " option[value=" + data[i] + "]").attr("selected", true);
//                            }
//                            $("#select-choice-semestre-" + numRespuesta[i]).selectmenu("refresh", true);
//                            $('#select-choice-semestre-' + numRespuesta[i]).prop('disabled', 'disabled');
//                        }
//                    }
//
//                    if (tipoPregunta[i] == 10) 
//                    {//combinada
//                        if (data[i] == null) 
//                        {
//
//                        }
//                        else 
//                        {
//                            console.log(data[i]);
//                            if (data[i] == "No respondio") 
//                            {
//
//                                $("input:radio[name=radio-choice" + numRespuesta[i] + "]").checkboxradio('disable');
//                                $("#pregunta" + numRespuesta[i] + "Opc2").val(data[i]);
//                                $("#pregunta" + numRespuesta[i] + "Opc2").textinput('disable');
//                                $("#pregunta" + numRespuesta[i] + "Opc3").val(data[i]);
//                                $("#pregunta" + numRespuesta[i] + "Opc3").textinput('disable');
//                            }
//                            else 
//                            {
//
//                                //Si respondio con las areas de texto la coma debe aparecer
//                                if (data[i].indexOf(',') != -1)
//                                {// alert("el caracter "," es encontrado");
//                                    $("input:radio[name=radio-choice" + numRespuesta[i] + "]").checkboxradio('disable');
//                                    var str = data[i].split(",");
//                                    $("#pregunta" + numRespuesta[i] + "Opc2").val(str[0].substring(0, 1));
//                                    $("#pregunta" + numRespuesta[i] + "Opc2").textinput('disable');
//                                    $("#pregunta" + numRespuesta[i] + "Opc3").val(str[1].substring(0, 1));
//                                    $("#pregunta" + numRespuesta[i] + "Opc3").textinput('disable');
//                                }
//                                else 
//                                {
//                                    $("input:radio[name=radio-choice" + numRespuesta[i] + "]").filter("[value='" + data[i] + "']").prop("checked", true).checkboxradio("refresh");
//                                    $("input:radio[name=radio-choice" + numRespuesta[i] + "]").checkboxradio('disable');
//                                    $("#pregunta" + numRespuesta[i] + "Opc2").val(data[i]);
//                                    $("#pregunta" + numRespuesta[i] + "Opc2").textinput('disable');
//                                    $("#pregunta" + numRespuesta[i] + "Opc3").val(data[i]);
//                                    $("#pregunta" + numRespuesta[i] + "Opc3").textinput('disable');
//                                }
//                            }
//
//                        }/*sin  else null*/
//
//                    }/*fin  si tipo 10*/
//
                }/*fin for*/


            }/*fin success ajax 2*/
        });/*fin ajax 2*/
        
        
        
    }/*fin funcion succes ajax 1*/
 });/*fin ajax 1*/      
   
}
