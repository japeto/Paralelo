$(document).ready(function () 
{  
//    var emailreg = /^[a-zA-Z0-9_\.\-]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$/;
//    var textoreg = /^[a-zA-Z0-9_\ \-]+$/;
     $('.boton').click(function ()
    {       
        $('.error2').remove();
        $('.error4').remove();        
        
         if( $("#id_university").val() === "0" )
        {
            $("#id_university").focus().before("<span class='error4'>Seleccione la universidad</span>");
            return false;
        }                

        if( ( $('#id_encuesta').val() === "0") /*||  ( !textoreg.test($('.nombre').val()) ) */)
       {
            $("#id_encuesta").focus().before("<span class='error4'>Seleccione la encuesta</span>");
            return false;                
        }
        if ( ( $('#cantidad').val() === '') /*||  ( !textoreg.test($('.nombre').val()) ) */)
        {
            $("#cantidad").focus().before("<span class='error2'>Ingrese la cantidad a generar </span>");
            return false;                
        }
    });     
    
    $("#cantidad").keyup(function()
    {
        if( $(this).val() !== "" )
        {
            $(".error2").fadeOut();
            return false;
        }        
    });
    $("#id_encuesta, #id_university").change(function()
    {
        if( $(this).val() !== "0" )
        {
            $(".error4").fadeOut();
            return false;
        }        
    });
    
});

