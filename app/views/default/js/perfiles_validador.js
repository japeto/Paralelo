$(document).ready(function () 
{  
//    var emailreg = /^[a-zA-Z0-9_\.\-]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$/;
//    var textoreg = /^[a-zA-Z0-9_\ \-]+$/;
     $('.boton').click(function ()
    {       
        $('.error2').remove();        
              
        if ( ( $('#perfil').val() === '') /*||  ( !textoreg.test($('.nombre').val()) ) */)
        {
            $("#perfil").focus().after("<div class='error2'>Ingrese el nuevo nombre del perfil </div>");
            return false;                
        }        
    });     
    
    $("#perfil").keyup(function()
    {
        if( $(this).val() !== "" )
        {
            $(".error2").fadeOut();
            return false;
        }        
    });
});

