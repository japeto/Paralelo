var  id_modulo='', id_pregunta='', id_consulta = '', arreglo = Array(), datos;

$(document).ready(function(e) 
{   
            $('#add').hide();  
            $('#edit').hide();  
            $('#del').hide();  
            $('#title').hide();      
            $('#title1').hide();  
            $('#title2').hide();
            $('#title3').hide();
            $('#opcion_edicion').change(function ()
            {
                    switch (parseInt($(this).val()))
                    {
                        case 1:/*adicionar preguntas**/
                        {
                            $('#add').show();
                            $('#edit').hide();
                            $('#del').hide(); 
                            break;
                        }
                        case 2:/**editar preguntas*/
                        {
                            $('#add').hide();
                            $('#edit').show();
                            $('#del').hide(); 
                            /*
                            $('#pregunta_editable').change(function ()
                            {   
                                
                                if( $(this).val() !== "0" )
                                {   
                                    $("#title2").empty();
                                    $("#title3").empty();
                                    $("#id_pregunta").val( $(this).val() );                       
                                    cargarPreguntaaAEditar($(this).val(), $("#id_modulo").val(), $("#id_encuesta").val(), $("#id_usuario").val(), 'text_pregunta');
                                    $("#titulo").val( $("#pregunta_editable option:selected").html() );                                                                        $('#title').show();
                                    $('#title1').show();
                                    $('#title2').show();                
                                } 
                                else
                                {                                    
                                    $('#title').hide();
                                    $('#title1').hide();
                                    $('#title2').hide();  
                                    $('#title3').hide();  
                                 } 
                             }); */
                             break;
                        }
                        case 3:/*eliminar pregutnas*/
                        {
                            $('#add').hide();
                            $('#edit').hide();
                            $('#del').show();
                            break;
                        }
                        default :
                        {
                            $('#add').hide();  
                            $('#edit').hide();  
                            $('#del').hide();
                           break;
                        }
                    }
            });  
    $('.selectpicker').selectpicker();
    cargarCombo();
    
});/*FIN READY*/
 

function cargarCombo()
{
    $.ajax({
        url:"../../../../../indice_encuestas.php",
        type: "POST",
        //data:"id_pregunta_encuesta_que_cambia=1"+"&id_modulo_encuesta_que_cambia="+$("#id_modulo").val()+"&id_encuesta_a_cambiar="+$("#id_encuesta").val()+"&id_usuario_encuesta_a_cambia="+$("#id_usuario").val(),            
        data:"id_modulo_pregunta="+$("#id_modulo").val(),            
        success: function(opciones)
        {               
            $("#pregunta_editable").html(opciones);            
            $('#pregunta_editable').selectpicker('refresh');
        }
    });  
}

function Ok()
{/*
    $('.error4').remove();		
    var dato = nicEditors.findEditor('text_pregunta1').getContent();
    nicEditors.findEditor('text_pregunta1').saveContent();
    
    if( dato === '<br>' )
    {
         $("#modulo_info").focus().after("<span class='error4'>Ingrese informacion adicional</span>");
         return false;                
    }
    /*
    if( $("#titulo_encuesta_editar").val() === "" )
    {
        $("#titulo_encuesta_editar").focus().before("<span class='error4'>Ingrese el titulo de la encuesta</span>");
        return false;
    }
    $("#title").keyup(function()
    {
        if( $(this).val() !== "" )
        {
            $(".error4").fadeOut();
            return false;
        }     
    });
        document.formname1.submit();*/
	}
 