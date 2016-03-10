$(document).ready(function(e) 
{   
    $('#modulo_editable').change(function ()
    {
        $("#nombre_modulo").val( $("#modulo_editable option:selected").html() );
        $("#id_modulo").val( $(this).val() );
        $.ajax({
            url:"../../../../../indice_encuestas.php",
            type: "POST",
            data:"id_modulo_pregunta="+$('#modulo_editable').val(),
            success: function(opciones)
            {   
                $("#pregunta_inicio_salto_edicion").html(opciones);            
                $('#pregunta_inicio_salto_edicion').selectpicker('refresh');                
            }
        });
        
        $.ajax({
            url:"../../../../../indice_encuestas.php",
            type: "POST",
            data:"id_modulo_pregunta1="+$('#modulo_editable').val(),
            success: function(opciones)
            {   
                $("#pregunta_fin_salto_edicion").html(opciones);            
                $('#pregunta_fin_salto_edicion').selectpicker('refresh');                
            }
        });
    });
    
});