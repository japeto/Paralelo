var  id_modulo='', id_pregunta='', id_consulta = '', arreglo = Array(), datos;

$(document).ready(function(e) 
{       
    
    bkLib.onDomLoaded(
    function()
       { 
        new nicEditor().panelInstance('modulo_info');     
            //$('#title').hide();  
            $('#title1').hide();  
            $('#title2').hide();

            $('#modulo_editable').change(function ()
            {   
                if( $(this).val() !== "0" )
                {   
                    cargarModuloaAEditar($(this).val(), $("#id_encuesta").val(), $("#id_usuario").val(), 'modulo_info');
                    $("#titulo").val( $("#modulo_editable option:selected").html() );
                    $("#id_modulo").val( $(this).val() );
                    //$('#title').show();     
                    $('#title1').show();
                    $('#title2').show();
                } 
                else
                {
                    //$('#title').hide();
                    $('#title1').hide();
                    $('#title2').hide();                    
                } 
            });          
    }); 
    $('.selectpicker').selectpicker();
    cargarCombo();
    
});/*FIN READY*/
 
function cargarModuloaAEditar(id_modulo, id_encuesta, id_usuario, id_caja)
{
    console.log(id_encuesta+", "+id_usuario);
	$.ajax({
            url:"../../../../../indice_encuestas.php",
            type: "POST",
            dataType: 'JSON',
            data:"id_modulo_encuesta_que_cambia="+id_modulo+"&id_encuesta_cambia="+id_encuesta+"&id_usuario_encuesta_cambia="+id_usuario,            
            success: function(retorno)
            {                   
                nicEditors.findEditor(id_caja).setContent(retorno[0]['descripcion']); 
                $("#numero_modulo").val(retorno[0]['num_modulo']); 
            }
        });   
}
function cargarCombo()
{
    $.ajax({
        url:"../../../../../indice_encuestas.php",
        type: "POST",
        data:"id_modulo_encuesta="+$('#id_encuesta').val(),
        success: function(opciones)
        {               
            $("#modulo_editable").html(opciones);            
            $('#modulo_editable').selectpicker('refresh');
        }
    });  
}

function Ok()
{
    $('.error4').remove();		
    var dato = nicEditors.findEditor('modulo_info').getContent();
    nicEditors.findEditor('modulo_info').saveContent();
    
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
    }*/
    $("#title").keyup(function()
    {
        if( $(this).val() !== "" )
        {
            $(".error4").fadeOut();
            return false;
        }     
    });
        document.formname.submit();
	}
 