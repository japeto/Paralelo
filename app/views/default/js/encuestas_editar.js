var  id_modulo='', id_pregunta='', id_consulta = '', arreglo = Array(), datos;

$(document).ready(function(e) 
{   
    bkLib.onDomLoaded(
    function()
       { 
        new nicEditor().panelInstance('consentimiento_info');     
            $('#title').hide();  
            $('#title1').hide();  
            $('#title2').hide();

            $('#encuesta_editable').change(function ()
            {   
                if( $(this).val() !== "0" )
                {   
                    cargarEncuestaAEditar($(this).val(), $("#id_usuario").val(), 'consentimiento_info');
                    $("#titulo").val( $("#encuesta_editable option:selected").html() );
                    $("#id_encuesta").val( $(this).val() );
                    $('#title').show();     
                    $('#title1').show();
                    $('#title2').show();
                } 
                else
                {
                    $('#title').hide();
                    $('#title1').hide();
                    $('#title2').hide();                    
                } 
            });          
    }); 
    $('.selectpicker').selectpicker();
    cargarCombo();
    
});/*FIN READY*/
 
function cargarEncuestaAEditar(id_encuesta, id_usuario, id_caja)
{
    console.log(id_encuesta+", "+id_usuario);
	$.ajax({
            url:"../../../../../indice_encuestas.php",
            type: "POST",
            dataType: 'JSON',
            data:"id_encuesta_que_cambia="+id_encuesta+"&id_usuario_que_cambia="+id_usuario,            
            success: function(retorno)
            {   
                $("#titulo_encuesta_editar").val(retorno[0]['titulo']);                
                nicEditors.findEditor(id_caja).setContent(retorno[0]['consentimiento_informado']);
                $("#estate").val(retorno[0]['estado']);                
            }
        });   
}
function cargarCombo()
{
    $.ajax({
        url:"../../../../../indice_encuestas.php",
        type: "POST",
        data:"id_encuesta_usuario1="+$('#id_usuario').val(),
        success: function(opciones)
        {               
            $("#encuesta_editable").html(opciones);            
            $('#encuesta_editable').selectpicker('refresh');
        }
    });  
}

function Ok()
{
    $('.error4').remove();		
    var dato = nicEditors.findEditor('consentimiento_info').getContent();
    nicEditors.findEditor('consentimiento_info').saveContent();
    
    if( $("#titulo_encuesta_editar").val() === "" )
    {
        $("#titulo_encuesta_editar").focus().after("<div class='error4'>Ingrese el titulo de la encuesta</div>");
        return false;
    }
    if( dato === '<br>' )
    {
         $("#consentimiento_info").focus().after("<div class='error4'>Ingrese informacion adicional</div>");
         return false;                
    }
    $("#consentimiento_info, #title").keyup(function()
    {
        if( $(this).val() !== "" )
        {
            $(".error4").fadeOut();
            return false;
        }     
    });
        document.formname.submit();
	}
 