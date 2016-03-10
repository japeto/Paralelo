$(document).ready(function(e) 
{ 
	bkLib.onDomLoaded(function() 
	{ 
		new nicEditor().panelInstance('consentimiento_info');	
	});
});
/*
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
*/
function Ok()
    {
	console.log("entro a ok");
	$('.error4').remove();		
	var dato = nicEditors.findEditor('consentimiento_info').getContent();
        nicEditors.findEditor('consentimiento_info').saveContent();
        
    /*$ruta = "consentimiento/"; 
    $destino = $ruta. $_FILES['archivo']['name']; 
    copy ($_FILES['archivo']['tmp_name'], $destino)  */

	if( $("#title").val() === "" )
        {
            $("#title").focus().after("<div class='error4'>Ingrese el titulo de la encuesta</div>");
            return false;
        }
        if( dato === '<br>')
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
 
 
