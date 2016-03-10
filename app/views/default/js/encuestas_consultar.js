//SCRIPT QUE PERMITE CONSTRUIR LAS OPCIONES PARA CADA PREGUNTA
$(document).ready(function()
{    
    $('.selectpicker').selectpicker();        
    
    //enviarConsulta();
    $("#id_consulta").change(function()
    {        
        var id = parseInt($("#id_consulta").val())
        var consul = "";
        
        switch (id)
        {
            case 1 :
            {
                consul = "SELECT id_encuesta, titulo, id_usuario, estado FROM encuesta WHERE (estado = 'Editar') ORDER BY(titulo);";
                enviarConsulta(consul);
                break;
            }
            case 2 :
            {
                consul = "SELECT id_encuesta, titulo, id_usuario, estado FROM encuesta WHERE (estado = 'Activada') ORDER BY(titulo);";
                enviarConsulta(consul);
                break;
            }
            case 3 :
            {
                consul = "SELECT id_encuesta, titulo, id_usuario, estado FROM encuesta WHERE (estado = 'Desactivada') ORDER BY(titulo);";
                enviarConsulta(consul);
                break;
            }
            case 4 :
            {
                consul = "SELECT id_encuesta, titulo, id_usuario, estado FROM encuesta ORDER BY(titulo);";
                enviarConsulta(consul);
                break;
            }
            default :
            {
              console.log("no exite un tipo");
            }            
        }             
        
        //console.log(cadena);
    })
});


function enviarConsulta(consulta)
{
    $.ajax({
        url:"../../../../../indice_encuestas.php",
        type: "POST",
        data:"sql_encuesta="+consulta,
        success: function(opciones)
        {               
            $("#answer").html(opciones);                        
        }
    });  
}