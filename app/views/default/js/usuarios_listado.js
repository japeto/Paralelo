$(document).ready(function(e) 
{   
    cargarListado();
});

function cargarListado()
{
    $.ajax({
        url:"../../../../../indice_usuario.php",
        type: "POST",
        data:"valor_user="+1,
        success: function(opciones)
        {               
            $("#listadoUsuarios").html(opciones);
        }
    });  
}


 