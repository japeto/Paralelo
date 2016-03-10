$(document).ready(function(e) 
{       
});

function cargarListado(valor)
{
    $.ajax({
        url:"../../../../../indice_usuario.php",
        type: "POST",
        data:"id_user="+valor,
        success: function(opciones)
        {   
            console.log(opciones);        
            var v = $.parseJSON(opciones);  
            $("#nombre").val(v["nombre"]);
            $("#apellidos").val(v["apellidos"]);
            $("#email").val(v["email"]);
            
        }
    });  
}


 