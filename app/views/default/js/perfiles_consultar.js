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
                consul = "SELECT id, nombre, activo FROM perfil WHERE (activo = 1) AND (nombre <> 'Administrador') ORDER BY(nombre);";
                enviarConsulta(consul);
                break;
            }
            case 2 :
            {
                consul = "SELECT id, nombre, activo FROM perfil WHERE (activo <> 1) ;";
                enviarConsulta(consul);
                break;
            }
            case 3 :
            {
                consul = "SELECT id, nombre, activo FROM perfil WHERE (nombre <> 'Administrador') ORDER BY(nombre);";
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
        url:"../../../../../indice_usuario.php",
        type: "POST",
        data:"sql="+consulta,
        success: function(opciones)
        {               
            $("#answer").html(opciones);                        
        }
    });  
}