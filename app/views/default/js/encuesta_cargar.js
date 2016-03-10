$(document).ready(function()
{    
    cargar_Modulo();        
});
/*******************************************************************************************************************************/
//function cargarMiEncuesta()
//{    
//    $.ajax({
//        url:"../../../../../indice_encuestas.php",
//        type: "POST",
//        data:"id_mi_encuesta="+$("#id_encuesta").val()+"&id_mi_modulo="+$("#id_modulo").val(),
//        success: function(opciones)
//        {               
//            $("#contenedor").html(opciones);   
//            
//        }
//    });  
//}
function cargar_Modulo()
{    
    var i;
    $.ajax({
        url:"../../../../../indice_encuestas.php",
        type: "POST",
        data:"id_mi_encuesta="+$("#id_encuesta").val()+"&id_mi_modulo="+$("#id_modulo_actual").val(),
        success: function(opciones)
        {
            $("#contenedor").html(opciones);            
            
            fecha("fecha2");
            activarCombos();
            cargarComboDpto();
            cargaComboMunicipio();
            cargarComboFac();
            cargarComboPlan();             
            cantidad_de_Modulos();
            botonSiguiente();
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
            $(location).attr('href',"mostrar_encuesta.php?id_encuesta="+$("#id_encuesta").val()+"&nombre="+$("#id_encuesta").val()+"&id_modulo="+num);            
            cargar_Modulo();                        
        }
        else
        {
           $(location).attr('href',"mostrar_encuesta.php?id_encuesta="+$("#id_encuesta").val()+"&nombre="+$("#id_encuesta").val()+"&id_modulo="+num);
        }
    });
}

function activarCombos()
{    
    $('.selectpicker').selectpicker();       
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
                                             yearRange: "1996:2050"
                                       }); 

                                       
}


/*******************************************************************************************************************************/
function cantidad_de_Modulos()
{    
    $.ajax({
        url:"../../../../../indice_encuestas.php",
        type: "POST",
        data:"id_encuesta10="+$("#id_encuesta").val(),
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
        url:"../../../../../indice_encuestas.php",
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
            url:"../../../../../indice_encuestas.php",
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
        url:"../../../../../indice_encuestas.php",
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
            url:"../../../../../indice_encuestas.php",
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