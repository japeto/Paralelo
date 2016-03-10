$(document).ready(function () 
{  
//    var emailreg = /^[a-zA-Z0-9_\.\-]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$/;
//    var textoreg = /^[a-zA-Z0-9_\ \-]+$/;
     $('.boton').click(function ()
    {       
        $('.error2').remove();                      
        
        if ( ( $('#param').val() === '') /*||  ( !textoreg.test($('.nombre').val()) ) */)
        {
            $("#param").focus().after("<div class='error2'>Ingrese su nombre de usuario o login</div>").css("border", "1px solid red");
            return false;
        }
         if ( ( $('#pass1').val() === '') /*||  ( !textoreg.test($('.nombre').val()) ) */)
        {
            $("#pass1").focus().after("<div class='error2'>Ingrese la nueva contraseña</div>").css("border", "1px solid red");
            return false;
        }
        if ( ( $('#pass2').val() === '') /*||  ( !textoreg.test($('.nombre').val()) ) */)
        {
            $("#pass2").focus().after("<div class='error2'>Ingrese repita la nueva contrtaseña</div>").css("border", "1px solid red");
            return false;
        }
        if ( ( $('#pass1').val() !== $('#pass2').val()) /*||  ( !textoreg.test($('.nombre').val()) ) */)
        {
            $("#pass1").focus().after("<div class='error2'>la contraseña no coincide</div>").css("border", "1px solid red");
        }
    });     
    
    $("#pass1, #pass2").keyup(function()
    {
        if( $(this).val() !== "" )
        {
            $(".error2").fadeOut();
            return false;
        }        
    });
});

