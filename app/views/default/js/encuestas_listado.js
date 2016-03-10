$(document).ready(function(e) 
{ 
    cargarEnTabla();
    cargarListado();
});

function cargarEnTabla(){
    $.ajax({
        url:"../../../../../indice_encuestado.php",
        type: "POST",
        data:"listaEncuestas=' '",
        success: function(opciones){               
            $("#listadoencuestas").append(opciones);
            // console.log(opciones)
        }
    });  
}
function redireccion(value){
    $.ajax({
        url:"../../../../../indice_encuestado.php",
        type: "POST",
        data:"id_encuesta_a_diligenciar="+value,
        success: function(opciones){
            location.href = '../encuestado/consentimiento.php'
        }
    }); 
}



function cargarListado()
{
    $('.selectpicker').selectpicker();
    $.ajax({
        url:"../../../../../indice_encuestas.php",
        type: "POST",
        data:"id_user="+$("#id_usuario").val(),
        success: function(opciones){               
            $("#listado").html(opciones);
            console.log(opciones)
        }
    });  
}



 