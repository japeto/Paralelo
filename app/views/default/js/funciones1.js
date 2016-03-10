
$(document).ready(function()
{    
    
    var emailreg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;	

    $(".boton").click(function(){  
		$(".error").fadeOut().remove();
		
        if ($(".nombre").val() === "") {  
			$(".nombre").focus().after('<span class="error">Ingrese su nombre de usuario (login)</span>');  
			return false;  
		}  
        if ($(".contrasena").val() === "") {  
			$(".contrasena").focus().after('<span class="error">Ingrese su contraseña</span>');  
			return false;  
		}  
//        if ($("#pass").val() == "" || !emailreg.test($(".email").val())) {
//			$(".email").focus().after('<span class="error">Ingrese un email correcto</span>');  
//			return false;  
//		}  
//        if ($(".asunto").val() == "") {  
//			$(".asunto").focus().after('<span class="error">Ingrese un asunto</span>');  
//			return false;  
//		}  
//        if ($(".mensaje").val() == "") {  
//			$(".mensaje").focus().after('<span class="error">Ingrese un mensaje</span>');   
//			return false;  
//		}  
    });  
    	$(".nombre, .contrasena,").bind('blur keyup', function(){  
        if ($(this).val() != "") {  			
			$('.error').fadeOut();
			return false;  
		}  
	});	
//	$(".nombre, .contrasena, .mensaje").bind('blur keyup', function(){  
//        if ($(this).val() != "") {  			
//			$('.error').fadeOut();
//			return false;  
//		}  
//	});	
//	$(".email").bind('blur keyup', function(){  
//        if ($(".email").val() != "" && emailreg.test($(".email").val())) {	
//			$('.error').fadeOut();  
//			return false;  
//		}  
//	});
});