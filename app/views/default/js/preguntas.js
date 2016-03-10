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
        data:"valor1="+1,
        success: function(opciones)
        {               
            $("#id_tipo_pregunta").html(opciones);            
            $('#id_tipo_pregunta').selectpicker('refresh');
        }
    });  
}


 