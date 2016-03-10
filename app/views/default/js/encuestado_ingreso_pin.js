
$(document).ready(function()
{       
    $( "#pin_encuestado" ).focus();
    pruebaSession();
//    $('#pin_encuestado').keypress(function(e) 
//    {       
//        console.log(e.which);
//        if (e.which == 13) 
//        {
//            entrar();
//        }
//    });
   
   $("#ingreso_pin").button().click(function ()
   {
        entrar();
   });/*FIN FUNCION CLIC*/

});/*FIN READY*/

function entrar()
{
    
       $.ajax({
           url:"../../../../../indice_encuestado.php",
           type: "POST",
           //data:"consentimiento=Acepto"+"&pin="+$( "#pin_encuestado" ).val(),
           data:"id_encuesta="+$( "#id_encuesta" ).val()+"&pin="+$( "#pin_encuestado" ).val(),           
           
           success: function(retorno)
           {               
               var v = parseInt(retorno);
                if (v === 1)
                {
                    $(location).attr('href',"../../../../../indice_encuestado.php?action=responder");
                }
                else
                {
                    alert('USTED No realizará la encuesta\n GRACIAS POR PARTICIPAR');
                }
               
           },
   });/*FIN AJAX*/
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
        }
    });  
   
}
/*******************************************************************************************************************************/
