$(document).ready(function(e) 
{   
    cargarListado();
});

function cargarListado()
{
    $.ajax({
        url:"../../../../../indice_usuario.php",
        type: "POST",
        data:"valor="+1,
        success: function(opciones)
        {               
            $("#listadoPerfiles").html(opciones);
        }
    });  
}


 