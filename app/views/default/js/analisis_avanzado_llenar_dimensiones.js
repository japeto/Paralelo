/*SCRIPT QUE PERMITE */
$(document).ready(function()
{    
    $('.selectpicker').selectpicker();
           
    //enviarConsulta();
    $("#dim_seleccionado").change(function()
    {                
        var consul = "";                
        consul = "SELECT pin FROM "+$("#dim_seleccionado").val()+";";
        console.log(consul);
        //enviarConsulta(consul);
    })
});


function enviarConsulta(consulta)
{
    $.ajax({
        url:"../../../../../indice_analiticas.php",
        type: "POST",
        data:"sql="+consulta,
        beforeSend: function () 
        {
            $("#answer").html("Procesando, espere por favor...");
        },
        success: function(opciones)
        {               
            $("#answer").html(opciones);                        
        }
    });  
}