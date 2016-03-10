$(document).ready(function(e) 
{   
    cargarListado();
});

function cargarListado()
{
    $.ajax({
        url:"../../../../../indice_usuario.php",
        type: "POST",
        data:"id_perfil="+$("#id_perfil").val(),
        success: function(opciones)
        {               
            $("#perfil").val(opciones);
        }
    });  
}


 