$(document).ready(function(e){ 
    cargarDatos();
});

function cargarDatos(){
    $.ajax({
        url:"../../../../../indice_encuestado.php",
        type: "POST",
        data:"datos_encuesta="+$("#id_encuesta").val(),
        success: function(response){               
            // console.log(response);
        }
    });  
}