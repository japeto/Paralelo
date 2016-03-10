$(document).ready(function() 
{
    $('.selectpicker').selectpicker();
     cargarCombo() ;
     
    $('#modulo_editable').change(function ()
    {
        $("#nombre_modulo").val( $("#modulo_editable option:selected").html() );
        $("#id_modulo").val( $(this).val() );
        $.ajax({
            url:"../../../../../indice_encuestas.php",
            type: "POST",
            data:"id_modulo_pregunta="+$(this).val(),
            success: function(opciones)
            {   
                $("#pregunta_inicio_salto_edicion").html(opciones);            
                $('#pregunta_inicio_salto_edicion').selectpicker('refresh');                
            }
        });
        
        $.ajax({
            url:"../../../../../indice_encuestas.php",
            type: "POST",
            data:"id_modulo_pregunta1="+$(this).val(),
            success: function(opciones)
            {   
                $("#pregunta_fin_salto_edicion").html(opciones);            
                $('#pregunta_fin_salto_edicion').selectpicker('refresh');                
            }
        });
    });
    
    
    $('#pregunta_inicio_salto_edicion').change(function ()
    {        
        $("#pregunta_inicio_salto").val( $(this).val() );
        $.ajax({
            url:"../../../../../indice_encuestas.php",
            type: "POST",
            data:"id_pregunta1="+$(this).val(),
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

function cargarCombo()
{
    $.ajax({
            url:"../../../../../indice_encuestas.php",
            type: "POST",
            data:"id_modulo_encuesta="+$('#id_encuesta').val(),
            success: function(opciones)
            {   
                console.log(opciones);
                $("#modulo_editable").html(opciones);            
                $('#modulo_editable').selectpicker('refresh');
            }
        });  
}
