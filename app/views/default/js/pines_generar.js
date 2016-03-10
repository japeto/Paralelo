//SCRIPT QUE PERMITE CONSTRUIR LAS OPCIONES PARA CADA PREGUNTA
$(document).ready(function()
{    
    console.log("-->"+$("#id_encuesta").val())
    $('#generar').click(function (){   
        $.ajax({
            url:"../../../../../indice_encuestas.php",
            type: "POST",
            data:"id_encuesta_responder="+$("#id_encuesta").val()+"&cantidad="+$("#cantidad").val()+"&codigo_universidad="+$("#id_university").val(),
            success: function(opciones){   
                console.log(opciones);
                var v = parseInt(opciones);
                if (v === 1){                                                                                                      
                    $(location).attr('href',"pines_generados.php");
                }                
            }
        });  
    });    

});