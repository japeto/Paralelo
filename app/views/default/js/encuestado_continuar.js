var check1 = '', check2 ='';
var datos = Array();
$(document).ready(function()
{    
	cargarConsentimiento();    

});/*FIN READY*/
/*******************************************************************************************************************************/

function cargarConsentimiento()
{
    $.ajax({
        url:"../../../../../indice_encuestado.php",
        type: "POST",
        data:"consentimiento_id_encuesta="+$("#id_encuesta").val(),
        datatype:'json',
        success: function(opciones)
        {               
			// console.log("respuesta--->"+opciones);
			datos= $.parseJSON(opciones);			
            $("#title").html("<center><h1>"+datos[0]["titulo"]+"</h1></center>");   
            $("#texto").html(datos[0]["consentimiento_informado"]);   
            $('#pin_encuestado').focus();
			$('#aceptar').attr('disabled', true);                            
			revisar1();
			revisar2();
			boton();
        }
    }); 
}

function revisar1()
{
	$("#revisar1").click(function()
    {
        check1 = $('#revisar1:checked').val();                 
        if ( (check1 === 'true')  && (check2 === 'true') )
        {
            $('#aceptar').attr('disabled', false);
        }
        else
        {
            $('#aceptar').attr('disabled', true);
        }
    });
	}
	
function revisar2()
{
	$("#revisar2").click(function()
    {        
        check2 = $('#revisar2:checked').val(); 
                
        if ( (check1 === 'true')  && (check2 === 'true') )
        {
            $('#aceptar').attr('disabled', false);
        }
        else
        {
            $('#aceptar').attr('disabled', true);
        }
        
    });
}
	
function boton()
{
	$("#aceptar").button().click(function ()
   {
       console.log("SI  entra");
       $(location).attr('href',"../../../../../indice_encuestado.php?action=ingreso");
   });
}
	
