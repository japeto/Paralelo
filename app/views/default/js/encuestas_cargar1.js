$(document).ready(function(e) 
{ 
  $('.selectpicker').selectpicker();
    cargarCombo();
});

function cargarCombo()
{
    $.ajax({
        url:"../../../../../indice_encuestado.php",
        type: "POST",
        data:"val=1",
        success: function(opciones)
        {               
            $("#encuesta_editable").html(opciones);            
            $('#encuesta_editable').selectpicker('refresh');
        }
    });  
}
 
 