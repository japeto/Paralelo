//SCRIPT QUE PERMITE CONSTRUIR LAS OPCIONES PARA CADA PREGUNTA
$(document).ready(function()
{    
    $('#restart').click(function ()
    {               
        $.ajax({
            url:"../../../../../indice_encuestas.php",
            type: "POST",
            data:"valor3=1"+"&id_encuesta_respuesta="+$("#id_encuesta").val(),
            success: function(opciones)
            {   
                console.log(opciones);
                alert(opciones);
            }
        });  
    });

});