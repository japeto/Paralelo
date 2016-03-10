$(document).ready(function () 
{  
//    var emailreg = /^[a-zA-Z0-9_\.\-]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$/;
//    var textoreg = /^[a-zA-Z0-9_\ \-]+$/;
     $('.boton').click(function ()
    {       
        $('.error2').remove();        
              
        if ( ( $('#name').val() === '') /*||  ( !textoreg.test($('.nombre').val()) ) */)
        {
            $("#name").focus().after("<div class='error2'>Ingrese un nombre </div>");
            return false;                
        }        
        if ( ( $('#last').val() === '') /*||  ( !textoreg.test($('.nombre').val()) ) */)
        {
            $("#last").focus().after("<div class='error2'>Ingrese un apellido</div>");
            return false;
        }
        if ( ( $('#pass1').val() === '') /*||  ( !textoreg.test($('.nombre').val()) ) */)
        {
            $("#pass1").focus().after("<div class='error2'>Ingrese una contraseña</div>");
            if ( ( $('#pass2').val() === '') /*||  ( !textoreg.test($('.nombre').val()) ) */)
            {
                $("#pass2").focus().after("<div class='error2'>Ingrese nuevamente la contraseña</div>");
                return false;
            }
            return false;
        }
        /*else{
            if ( ( $('#pass1').val() != '') )
            {
                if ( ( $('#pass2').val() === ''))
                {
                    $("#pass2").focus().after("<div class='error2'>Ingrese nuevamente la contraseña</div>");
                    return false;
                }
                return false;
            }
        }*/
        
        if ( ( $('#pass1').val() !== $('#pass2').val()) /*||  ( !textoreg.test($('.nombre').val()) ) */)
        {
            $("#pass2").focus().after("<div class='error2'>las contraseñas no coinciden</div>");
            return false;
        }
    });     
    
    $("#name, #last, #pass1, #pass2").keyup(function()
    {
        if( $(this).val() !== "" )
        {
            $(".error2").fadeOut();
            return false;
        }        
    });
});

