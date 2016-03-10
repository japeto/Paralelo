$(document).ready(function(){

	$("#aceptainsert").click(function(){
	    $.ajax({
	        url:"../../../../../indice_usuario.php",
	        type: "POST",
	        data:"insertarMiPin=' '",
	        success: function(opciones){
	        	console.log(opciones)
	        	$("#continuarinsert").attr("disabled",false);
	        	$("#continuarinsert").focus();
	        }
	    }); 
	});

});