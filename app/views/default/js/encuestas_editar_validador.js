$(document).ready(function () 
{  
//    var emailreg = /^[a-zA-Z0-9_\.\-]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$/;
//    var textoreg = /^[a-zA-Z0-9_\ \-]+$/;
    $('.boton').click(function ()
    {       
        $('.error4').remove();               
        
        if( ( $('#encuesta_editable').val() === "0") /*||  ( !textoreg.test($('.nombre').val()) ) */)
        {            
            $("#encuesta_editable").focus().after("<span class='error4'>Debe seleccionar la encuesta a editar</span>");
            return false;                
        }        
        if( $("#modulo_editable").val() === "0" )
        {
            $("#modulo_editable").focus().before("<span class='error4'>Debe seleccionar el modulo a editar</span>");
            return false;
        }                
         if( $("#opcion_edicion").val() === "0" )
        {
            $("#opcion_edicion").focus().before("<span class='error4'>Debe seleccione una opcion de edicicn</span>");
            return false;
        }         
    });     
        
    $("#encuesta_editable, #modulo_editable, #opcion_edicion").change(function()
    {
        if( $(this).val() !== "0" )
        {
            $(".error4").fadeOut();
            return false;
        }        
    });
    
});

