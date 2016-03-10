$(document).ready(function(e) 
{ 
  $('.selectpicker').selectpicker();
    cargarCombo();
});

function cargarCombo()
{
    $.ajax({
        url:"../../../../../indice_encuestas.php",
        type: "POST",
        data:"id_encuesta_usuario="+$('#id_usuario').val(),
        success: function(opciones)
        {               
            $("#encuesta_editable").html(opciones);            
            $('#encuesta_editable').selectpicker('refresh');
        }
    });  
}


 
 
