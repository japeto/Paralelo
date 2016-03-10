$(document).ready(function () 
{  
//    var emailreg = /^[a-zA-Z0-9_\.\-]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$/;
//    var textoreg = /^[a-zA-Z0-9_\ \-]+$/;
     $('.boton').click(function ()
    {       
        $('.error2').remove();        
              
        if ( ( $('#usuario').val() === '') /*||  ( !textoreg.test($('.nombre').val()) ) */)
        {
            $("#usuario").focus().before("<span class='error2'>Ingrese el nuevo nombre </span>");
            return false;                
        }        
        if ( ( $('#apellidos').val() === '') /*||  ( !textoreg.test($('.nombre').val()) ) */)
        {
            $("#apellidos").focus().before("<span class='error2'>Ingrese el nuevo apellido</span>");
            return false;
        }
        if ( ( $('#email').val() === '') /*||  ( !textoreg.test($('.nombre').val()) ) */)
        {
            $("#email").focus().before("<span class='error2'>Ingrese el nuevo email</span>");
            return false;
        }
        if ( ( $('#pass1').val() === '') /*||  ( !textoreg.test($('.nombre').val()) ) */)
        {
            $("#pass1").focus().before("<span class='error2'>Ingrese la nueva contraseña</span>");
            return false;
        }
        if ( ( $('#pass2').val() === '') /*||  ( !textoreg.test($('.nombre').val()) ) */)
        {
            $("#pass2").focus().before("<span class='error2'>Ingrese repita la nueva contrtaseña</span>");
            return false;
        }
        if ( ( $('#pass1').val() !== $('#pass2').val()) /*||  ( !textoreg.test($('.nombre').val()) ) */)
        {
            $("#pass1").focus().after("<span class='error2'>la contraseña no coincide</span>");
            return false;
        }
    });     
    
    $("#usuario, #apellidos, #email, #pass1, #pass2").keyup(function()
    {
        if( $(this).val() !== "" )
        {
            $(".error2").fadeOut();
            return false;
        }        
    });
});

