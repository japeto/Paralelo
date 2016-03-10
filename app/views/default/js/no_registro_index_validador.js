$(document).ready(function () 
{  
//    var emailreg = /^[a-zA-Z0-9_\.\-]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$/;
//    var textoreg = /^[a-zA-Z0-9_\ \-]+$/;
     $('.boton').click(function ()
    {       
        $('.error2').remove();                      
        if ( ( $('#user').val() === '') /*||  ( !textoreg.test($('.nombre').val()) ) */)
        {
            $("#user").focus().before("<span class='error2'>Ingrese el nombre de usuario</span>");
            return false;                
        }        
        if ( ( $('#pass').val() === '') /*||  ( !textoreg.test($('.nombre').val()) ) */)
        {
            $("#pass").focus().before("<span class='error2'>Ingrese la contraseña</span>");
            return false;
        }        
    });     
    
    $("#user, #pass").keyup(function()
    {
        if( $(this).val() !== "" )
        {
            $(".error2").fadeOut();
            return false;
        }        
    });
});

