//SCRIPT QUE PERMITE CONSTRUIR LAS OPCIONES PARA CADA PREGUNTA
$(document).ready(function()
{    
    $('.selectpicker').selectpicker();
    cargarCombo();
   
    $("#opcion_descarga").change(function()
    {        
        
        //$('#id_encuesta').selectpicker('refresh');
        //$('#id_encuesta').empty()
        switch (parseInt( $("#opcion_descarga").val() ))
        {
            
            case 1 :
            {
                $("#id_encuesta").change(function()
                {        
                    var id = parseInt($("#id_encuesta").val())
                    var consul = "";
                                       
                    switch (id)
                    {
                        case 1 :
                            {
                                consul = "SELECT pin, pregunta1, pregunta2, pregunta3, pregunta4, pregunta5, pregunta6, pregunta7, pregunta8, pregunta9, pregunta10, pregunta11, pregunta12, pregunta13, pregunta14, pregunta15, pregunta16, pregunta17, pregunta18, pregunta19, pregunta20, pregunta21, pregunta22, pregunta23, pregunta24, pregunta25, pregunta26, pregunta27, pregunta28, pregunta29, pregunta30, pregunta31, pregunta32, pregunta33, pregunta34, pregunta35, pregunta36, pregunta37, pregunta38, pregunta39, pregunta40, pregunta41, pregunta42, pregunta43, pregunta44, pregunta45, pregunta46, pregunta47, pregunta48, pregunta49, pregunta50, pregunta51, pregunta52, pregunta53, pregunta54, pregunta55, pregunta56, pregunta57, pregunta58, pregunta59, pregunta60, pregunta61, pregunta62, pregunta63, pregunta64, pregunta65, pregunta66, pregunta67, pregunta68, pregunta69, pregunta70, pregunta71, pregunta72, pregunta73, pregunta74, pregunta75, pregunta76, pregunta77, pregunta78, pregunta79, pregunta80, pregunta81, pregunta82, pregunta83, pregunta84, pregunta85, pregunta86, pregunta87, pregunta88, pregunta89, pregunta90, pregunta91, pregunta92, pregunta93, pregunta94, pregunta95, pregunta96, pregunta97, pregunta98, pregunta99, pregunta100, pregunta101, pregunta102, pregunta103, pregunta104, pregunta105, pregunta106, pregunta107, pregunta108, pregunta109, pregunta110, pregunta111, pregunta112, pregunta113, pregunta114, pregunta115, pregunta116, pregunta117, pregunta118, pregunta119  FROM encuesta"+id+" WHERE (consentimiento IS NOT NULL) ORDER BY(pin) LIMIT 50;";
                                console.log(consul);
                                enviarConsulta(consul);
                                break;
                            }            
                        default :
                            {
                                console.log("no exite un tipo");
                                break;
                            }            
                    }             
                });
              break;
            }
            case 2 :
            {
                $("#id_encuesta").change(function()
                {        
                    var id = parseInt($("#id_encuesta").val())
                    var consul = "";
                                       
                    switch (id)
                    {
                        case 1 :
                            {
                                consul = "SELECT pin, pregunta1, pregunta2, pregunta3, pregunta4, pregunta5, pregunta6, pregunta7, pregunta8, pregunta9, pregunta10, pregunta11, pregunta12, pregunta13, pregunta14, pregunta15, pregunta16, pregunta17, pregunta18, pregunta19, pregunta20, pregunta21, pregunta22, pregunta23, pregunta24, pregunta25, pregunta26, pregunta27, pregunta28, pregunta29, pregunta30, pregunta31, pregunta32, pregunta33, pregunta34, pregunta35, pregunta36, pregunta37, pregunta38, pregunta39, pregunta40, pregunta41, pregunta42, pregunta43, pregunta44, pregunta45, pregunta46, pregunta47, pregunta48, pregunta49, pregunta50, pregunta51, pregunta52, pregunta53, pregunta54, pregunta55, pregunta56, pregunta57, pregunta58, pregunta59, pregunta60, pregunta61, pregunta62, pregunta63, pregunta64, pregunta65, pregunta66, pregunta67, pregunta68, pregunta69, pregunta70, pregunta71, pregunta72, pregunta73, pregunta74, pregunta75, pregunta76, pregunta77, pregunta78, pregunta79, pregunta80, pregunta81, pregunta82, pregunta83, pregunta84, pregunta85, pregunta86, pregunta87, pregunta88, pregunta89, pregunta90, pregunta91, pregunta92, pregunta93, pregunta94, pregunta95, pregunta96, pregunta97, pregunta98, pregunta99, pregunta100, pregunta101, pregunta102, pregunta103, pregunta104, pregunta105, pregunta106, pregunta107, pregunta108, pregunta109, pregunta110, pregunta111, pregunta112, pregunta113, pregunta114, pregunta115, pregunta116, pregunta117, pregunta118, pregunta119  FROM encuesta"+id+" WHERE (consentimiento IS NOT NULL) ORDER BY(pin) LIMIT 100;";
                                console.log(consul);
                                enviarConsulta(consul);
                                break;
                            }            
                        default :
                            {
                                console.log("no exite un tipo");
                                break;
                            }            
                    }             
                });
              break;   
            }
            case 3 :
            {

                $("#id_encuesta").change(function()
                {        
                    var id = parseInt($("#id_encuesta").val())
                    var consul = "";
                                       
                    switch (id)
                    {
                        case 1 :
                            {
                                consul = "SELECT pin, pregunta1, pregunta2, pregunta3, pregunta4, pregunta5, pregunta6, pregunta7, pregunta8, pregunta9, pregunta10, pregunta11, pregunta12, pregunta13, pregunta14, pregunta15, pregunta16, pregunta17, pregunta18, pregunta19, pregunta20, pregunta21, pregunta22, pregunta23, pregunta24, pregunta25, pregunta26, pregunta27, pregunta28, pregunta29, pregunta30, pregunta31, pregunta32, pregunta33, pregunta34, pregunta35, pregunta36, pregunta37, pregunta38, pregunta39, pregunta40, pregunta41, pregunta42, pregunta43, pregunta44, pregunta45, pregunta46, pregunta47, pregunta48, pregunta49, pregunta50, pregunta51, pregunta52, pregunta53, pregunta54, pregunta55, pregunta56, pregunta57, pregunta58, pregunta59, pregunta60, pregunta61, pregunta62, pregunta63, pregunta64, pregunta65, pregunta66, pregunta67, pregunta68, pregunta69, pregunta70, pregunta71, pregunta72, pregunta73, pregunta74, pregunta75, pregunta76, pregunta77, pregunta78, pregunta79, pregunta80, pregunta81, pregunta82, pregunta83, pregunta84, pregunta85, pregunta86, pregunta87, pregunta88, pregunta89, pregunta90, pregunta91, pregunta92, pregunta93, pregunta94, pregunta95, pregunta96, pregunta97, pregunta98, pregunta99, pregunta100, pregunta101, pregunta102, pregunta103, pregunta104, pregunta105, pregunta106, pregunta107, pregunta108, pregunta109, pregunta110, pregunta111, pregunta112, pregunta113, pregunta114, pregunta115, pregunta116, pregunta117, pregunta118, pregunta119  FROM encuesta"+id+" WHERE (consentimiento IS NOT NULL) ORDER BY(pin) LIMIT 1000;";
                                console.log(consul);
                                enviarConsulta(consul);
                                break;
                            }            
                        default :
                            {
                                console.log("no exite un tipo");
                                break;
                            }            
                    }             
                });
                break;
            }
            case 3 :
            {

                $("#id_encuesta").change(function()
                {        
                    var id = parseInt($("#id_encuesta").val())
                    var consul = "";
                                       
                    switch (id)
                    {
                        case 1 :
                            {
                                consul = "SELECT pin, pregunta1, pregunta2, pregunta3, pregunta4, pregunta5, pregunta6, pregunta7, pregunta8, pregunta9, pregunta10, pregunta11, pregunta12, pregunta13, pregunta14, pregunta15, pregunta16, pregunta17, pregunta18, pregunta19, pregunta20, pregunta21, pregunta22, pregunta23, pregunta24, pregunta25, pregunta26, pregunta27, pregunta28, pregunta29, pregunta30, pregunta31, pregunta32, pregunta33, pregunta34, pregunta35, pregunta36, pregunta37, pregunta38, pregunta39, pregunta40, pregunta41, pregunta42, pregunta43, pregunta44, pregunta45, pregunta46, pregunta47, pregunta48, pregunta49, pregunta50, pregunta51, pregunta52, pregunta53, pregunta54, pregunta55, pregunta56, pregunta57, pregunta58, pregunta59, pregunta60, pregunta61, pregunta62, pregunta63, pregunta64, pregunta65, pregunta66, pregunta67, pregunta68, pregunta69, pregunta70, pregunta71, pregunta72, pregunta73, pregunta74, pregunta75, pregunta76, pregunta77, pregunta78, pregunta79, pregunta80, pregunta81, pregunta82, pregunta83, pregunta84, pregunta85, pregunta86, pregunta87, pregunta88, pregunta89, pregunta90, pregunta91, pregunta92, pregunta93, pregunta94, pregunta95, pregunta96, pregunta97, pregunta98, pregunta99, pregunta100, pregunta101, pregunta102, pregunta103, pregunta104, pregunta105, pregunta106, pregunta107, pregunta108, pregunta109, pregunta110, pregunta111, pregunta112, pregunta113, pregunta114, pregunta115, pregunta116, pregunta117, pregunta118, pregunta119  FROM encuesta"+id+" WHERE (consentimiento IS NOT NULL) ORDER BY(pin);";
                                console.log(consul);
                                enviarConsulta(consul);
                                break;
                            }            
                        default :
                            {
                                console.log("no exite un tipo");
                                break;
                            }            
                    }             
                });
                break;
            }
        }
    });
    
    //enviarConsulta();
    
});


function enviarConsulta(consulta)
{
    $.ajax({
        url:"../../../../../indice_analiticas.php",
        type: "POST",
        data:"sql="+consulta,
        beforeSend: function () 
        {
            $("#answer").empty();
            $("#answer").html("Procesando, espere por favor...");
        },
        success: function(opciones)
        {               
            $("#answer").html(opciones);                        
        }
    });  
}

function cargarCombo()
{
    $.ajax({
        url:"../../../../../indice_analiticas.php",
        type: "POST",
        data:"valor2="+1,
        success: function(opciones)
        {               
            $("#id_encuesta").html(opciones);            
            $('#id_encuesta').selectpicker('refresh');
        }
    });  
}
