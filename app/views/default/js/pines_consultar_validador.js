$(document).ready(function () 
{  
//    var emailreg = /^[a-zA-Z0-9_\.\-]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$/;
//    var textoreg = /^[a-zA-Z0-9_\ \-]+$/;
     $('.boton').click(function ()
    {       
        $('.error4').remove();               
        
        if( ( $('#id_consulta').val() === "0") /*||  ( !textoreg.test($('.nombre').val()) ) */)
        {            
            $("#id_consulta").focus().after("<div class='error4'>Seleccione la consulta</div>");
            return false;                
        }        
        if( $("#id_university").val() === "0" )
        {
            $("#id_university").focus().before("<div class='error4'>Seleccione la instituci&oacute;n</div>");
            return false;
        }                
//        if ( ( $('#show_rango1').val() === '') /*||  ( !textoreg.test($('.nombre').val()) ) */)
//        {
//            $("#show_rango1").focus().before("<span class='error4'>Ingrese la fecha de inicio</span>");
//            return false;                
//        }
//        if ( ( $('#show_rango2').val() === '') /*||  ( !textoreg.test($('.nombre').val()) ) */)
//        {
//            $("#show_rango2").focus().before("<span class='error4'>Ingrese la fecha de fin </span>");
//            return false;                
//        }
    });     
    
    $("#show_rango1, #show_rango2").change(function()
    {
        if( $(this).val() !== "" )
        {
            $(".error4").fadeOut();
            return false;
        }        
    });
    $("#id_consulta, #id_university").change(function()
    {
        if( $(this).val() !== "0" )
        {
            $(".error4").fadeOut();
            return false;
        }        
    });
    
});

