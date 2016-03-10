$(document).ready(function(){
$.ajax({
        url:"get_session.php",        
        success: function(retorno)
        {               
            var session_var = $.parseJSON(retorno);                       
            $('#modbody').append("<label class='pull-left'>"
			+session_var ["nombre_modulo"]+"</label>"
			+"<a id='"+"btn"+session_var ["nombre_modulo"]+"' onclick='selecmodulo()' class='btn btn-primary pull-right'>+</a>");
        }
    }); 



	$('#btnagregarModulo').click(function(){
		/*$('#modbody').append("<div class='container'><h2>"+$('#textmodul').val()+"</h2><div class='pull-left'>nuevo modulo de encuesta</div><div class=''><a id='btn"+$('#textmodul').val()+"' class='btn btn-primary pull-right'>+</a></div></div>");*/
		$('#modbody').append("<label class='pull-left'>"
			+$('#textmodul').val()+"</label>"
			+"<a id='"+"btn"+$('#textmodul').val()+"' onclick='selecmodulo()' class='btn btn-primary pull-right'>+</a>");
		$('#textmodul').val("");
	});
});

function selecmodulo(){
	alert ("este"+this.id)
}