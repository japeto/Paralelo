$(document).ready(function()
{    
   /*$( "#nombre_modulo" ).focus();
   $( "#adicion" ).click(
        function() 
        {
            $.ajax({
                url:"../../../../../indice_encuestas.php",
                type: "POST",
                data:"id_encuesta="+$( "#id_encuesta" ).val()+"&nombre_modulo="+$( "#nombre_modulo" ).val(),
                success: function(retorno)
                {                      
                    var v = parseInt(retorno);
                    if (v === 1)
                    {                   
                       $(location).attr('href',"../../../../../indice_encuestas.php?action=pregunta");
                    }                    
                },
                error : function(xhr, status)
                {
                    console.log(status);
                }
            }); 
        });  */ 	
    $("#adicion").click(function (){       
        $('.error10').remove();  
        if ($('#nom').val() === '' ){
            $("#nom").focus().after("<div class='error10'>Ingrese un nombre de módulo</div>");
            return false;                
        }    
    });     
    
    $("#nom").keyup(function(){
        if( $(this).val() !== "" ){
            $(".error10").fadeOut();
            return false;
        }        
    });

});