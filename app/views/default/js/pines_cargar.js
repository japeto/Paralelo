//SCRIPT QUE PERMITE CONSTRUIR LAS OPCIONES PARA CADA PREGUNTA
$(document).ready(function()
{    
    $('.selectpicker').selectpicker();
    cargarCombo();
});


function cargarCombo()
{
    $.ajax({
        url:"../../../../../indice_encuestas.php",
        type: "POST",
        data:"valor2="+1,
        success: function(opciones)
        {               
            $("#id_encuesta").html(opciones);            
            $('#id_encuesta').selectpicker('refresh');
        }
    });  
}