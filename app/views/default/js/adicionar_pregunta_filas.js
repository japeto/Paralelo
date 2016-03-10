$(document).ready(function(e) 
{   
    $('#pregunta_inicio_salto_edicion').change(function ()
    {        
        $("#pregunta_inicio_salto").val( $(this).val() );
        $.ajax({
            url:"../../../../../indice_encuestas.php",
            type: "POST",
            data:"id_pregunta1="+$('#pregunta_inicio_salto_edicion').val(),
            success: function(opciones)
            {   
                $("#opcion_salto_edicion").html(opciones);            
                $('#opcion_salto_edicion').selectpicker('refresh');
            }
        });
    });
    
    
    $('#opcion_salto_edicion').change(function ()
    {        
        $("#opcion_salto").val( $("#opcion_salto_edicion option:selected").html() );
        $("#id_opcion_salto").val( $(this).val() );       
    });
    
    $('#pregunta_fin_salto_edicion').change(function ()
    {   
        $("#pregunta_fin_salto").val( $(this).val() );       
    });
    
});