//SCRIPT QUE PERMITE CONSTRUIR LAS OPCIONES PARA CADA PREGUNTA
$(document).ready(function()
{    
    activar();
    $('.selectpicker').selectpicker();
    
    $("#consulta").click(function()
    {        
        //var id = parseInt($("#id_consulta").val())
        var id = parseInt( $("#id_consulta").val() );
        var id_universidad = $("#id_university").val();
        var id_encuestas = $("#id_encuesta").val();
        var fecha_inicio = $("#rango1").val();
        var fecha_fin = $("#rango2").val();
        var consul = "";        
        console.log(id +", "+id_universidad);
        
//        if ((id !== 0) && (id_universidad !== "0"))
//        {
            switch (id)
            {
                case 1:
                { 
                    if ((id_universidad !== "0") && (fecha_inicio !== "") && (fecha_fin !== ""))
                    {
                        consul = "SELECT pin FROM encuesta1 WHERE (consentimiento is null) AND (pin LIKE '%"+id_universidad+"%') AND (fecha_de_creacion_pin BETWEEN '"+fecha_inicio+"' AND '"+fecha_fin+"') ORDER BY(pin); ";
                        console.log(consul);
                    }
                    else if ((id_universidad !== "0"))
                    {
                        consul = "SELECT pin FROM encuesta1 WHERE (consentimiento is null) AND (pin LIKE '%"+id_universidad+"%') ORDER BY(pin);; ";
                        console.log(consul);
                    }
                    else
                    {
                        consul = "SELECT pin FROM encuesta1 WHERE (consentimiento is null) ORDER BY(pin);;";
                    }                    
                    enviarConsulta(consul);
                    break;
                }
                case 2:
                {                 
                   if ((id_universidad !== "0") && (fecha_inicio !== "") && (fecha_fin !== ""))
                   {
                      consul = "SELECT pin FROM encuesta1 WHERE (consentimiento = 'Acepto') AND (pin LIKE '%"+id_universidad+"%') AND (fecha_de_creacion_pin BETWEEN '"+fecha_inicio+"' AND '"+fecha_fin+"') ORDER BY(pin);";
                   }
                   else if (id_universidad !== "0") 
                   {
                      consul = "SELECT pin FROM encuesta1 WHERE (consentimiento = 'Acepto') AND (pin LIKE '%"+id_universidad+"%') ORDER BY(pin);";
                   }
                   else
                   {
                       consul = "SELECT pin FROM encuesta1 WHERE (consentimiento = 'Acepto') ORDER BY(pin);";
                   }                    
                    enviarConsulta(consul);
                    break;
                }
                case 3:
                {
                    if ((id_universidad !== "0") && (fecha_inicio !== "") && (fecha_fin !== ""))
                    {
                        consul = "SELECT pin FROM encuesta1 WHERE (pin LIKE '%"+id_universidad+"%') AND (fecha_de_creacion_pin BETWEEN '"+fecha_inicio+"' AND '"+fecha_fin+"') ORDER BY(pin);";
                    }
                    else if(id_universidad !== "0")
                    {
                        consul = "SELECT pin FROM encuesta1 WHERE (pin LIKE '%"+id_universidad+"%') ORDER BY(pin);";
                    }                                        
                    else
                    {
                        consul = "SELECT pin FROM encuesta1 ORDER BY(pin);";
                    }
                    enviarConsulta(consul);
                    break;
                }
                default :
                {
//                    consul = "SELECT pin FROM id_encuesta;"                   
//                    enviarConsulta(consul);
//                    break;
                }
            }
//        }
//        else
//        {
//            alert("Debe seleccionar al menos uno de los dos combos");
//        }

    })
});

function enviarConsulta(consulta)
{
    $.ajax({
        url:"../../../../../indice_encuestas.php",
        type: "POST",
        data:"sql="+consulta,
        success: function(opciones)
        {               
            $("#answer").html(opciones);                        
        }
    });  
}

function activar()
{
      
    $.datepicker.regional['es'] = {
        closeText: 'Cerrar',
        prevText: '<Ant',
        nextText: 'Sig>',
        currentText: 'Hoy',
        monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
        monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
        dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
        dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
        dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
        weekHeader: 'Sm',
        dateFormat: 'dd/mm/yy',
        firstDay: 1,
        isRTL: false,
        showMonthAfterYear: false,
        yearSuffix: ''
    };
    $.datepicker.setDefaults($.datepicker.regional['es']);
    
    $( '#rango1').datepicker({
                                        defaultDate: "-1w",
                                        changeMonth: true,
                                        numberOfMonths: 1,
                                        showOn: "button",
                                        buttonImage: "../../images/calendar.gif",
                                        buttonImageOnly: true,                                        
                                        altField: "#show_rango1",
                                        dateFormat: 'yy/mm/dd',
                                        altFormat: "d 'de' MM 'de' yy",                                        
                                        onClose: function( selectedDate ) 
                                        {
                                            $( '#rango2' ).datepicker( "option", "minDate", selectedDate );
                                        }
                                    });

      $( '#rango2' ).datepicker({
                                            defaultDate: "+1w",
                                            changeMonth: true,
                                            numberOfMonths: 1,
                                            showOn: "button",
                                            buttonImage: "../../images/calendar.gif",
                                            buttonImageOnly: true,                                            
                                            altField: "#show_rango2",
                                            dateFormat: 'yy/mm/dd',
                                            altFormat: "d 'de' MM 'de' yy",
                                            onClose: function( selectedDate ) 
                                            {
                                                $(  '#rango1' ).datepicker( "option", "maxDate", selectedDate );
                                            }
                                        });      
}
