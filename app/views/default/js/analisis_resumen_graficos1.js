
$(document).ready(function()
{     
    graficoBarraTotalEncuestas();
    graficoPastelPregunta24();
    graficoPastelPregunta17();
    graficoPastelPregunta16();
    graficoPastelPregunta28();
    graficoPastelPregunta30();
    graficoPastelPregunta30b();
    graficoPastelPregunta30c();
    graficoPastelPregunta30d();
    graficoPastelPregunta30e();
    graficoPastelPregunta30f();
    graficoPastelPregunta37();
    graficoPastelPregunta55();
    graficoPastelPregunta58();
    graficoPastelPregunta71();
    graficoPastelPregunta93();
    graficoPastelPregunta94();
    graficoPastelPregunta99();
    graficoPastelPregunta107();
    graficoPastelPregunta113();
                
      
//    graficoPastelPregunta16_uvme();
//    graficoPastelPregunta16_usc();
  
    
});

/********************************************************************************************************************************************/ 
function graficoBarraTotalEncuestas()
{
        $("#grafica0").empty();
        var consulta = "SELECT pin_u, count(pin_u) as cantidad FROM hecho_respuestas_encuesta1  WHERE (pin_u IS NOT NULL) GROUP BY (pin_u) ORDER BY(pin_u);";
        console.log(consulta);                
        datos = $.ajax({
            url:"../../../../../indice_analiticas_avanzadas.php",
            type:'post',
            dataType:'json',
            async:false,
            data:"sql_analisis1="+consulta,
            success:function(){},                                                            
        }).responseText; 
        console.log("lo que llega "+datos+" hasta aqui llega");
        //alert(datos);
        datos = JSON.parse(datos);
        legendLabels = ['Universidad Javeriana', 'Universidad Santiago de Cali', 'Universidad del Valle, Sede Melendez', 'Universidad del Valle, Sede San Fernando'];
                var plot1 = $.jqplot('grafica0', datos, 
                {
                    title: 'Participación estudiantil según universidad, Cali 2014.',
                    //series:[{renderer:$.jqplot.BarRenderer}],
                    seriesDefaults:{
                                       renderer:$.jqplot.BarRenderer,
                                        pointLabels: { show:true, location:'nw', edgeTolerance:-15 },
									},
                    axesDefaults:
                    {
                                tickRenderer: $.jqplot.CanvasAxisTickRenderer ,
                                /*tickOptions: 
                                {          
                                    angle: -30,
                                    fontSize: '7pt'
                                }*/
                    },                    
                    axes:{
                               xaxis: 
                               {
                                   renderer: $.jqplot.CategoryAxisRenderer
                               }
                         },
                 legend: { show:true, location: 'e',        }
                  });
}


/********************************************************************************************************************************************/ 
function graficoPastelPregunta16()
{
        $("#grafica3").empty();
        var consulta = "SELECT pregunta16, count(pregunta16) as cantidad FROM hecho_respuestas_encuesta1  WHERE (pregunta16 IS NOT NULL) GROUP BY (pregunta16) ORDER BY (pregunta16)";
        console.log(consulta);                
        datos = $.ajax({
            url:"../../../../../indice_analiticas_avanzadas.php",
            type:'post',
            dataType:'json',
            async:false,
            data:"sql_analisis="+consulta+"&id_pre=16",
            success:function(){},                                                            
        }).responseText; 
        console.log("lo que llega "+datos);
        datos = JSON.parse(datos);
        legendLabels = ['Nunca', 'Casi nunca', 'A veces', 'Casi siempre', 'Siempre', 'No respondio'];
        var plot2 = jQuery.jqplot('grafica3', datos,
                {
            
            title: 'Percepción de riesgo académico en estudiantes universitarios Cali, 2014',
                    seriesDefaults: 
                    {                        
                        renderer: jQuery.jqplot.PieRenderer,
                        rendererOptions: 
                        {   
                            showDataLabels: true
                        }
                    },
                    legend: { show:true, location: 'e', labels: legendLabels       }
                });
}
/**********************************************************************************************************************************/
function graficoPastelPregunta17()
{
        $("#grafica2").empty();
        //var consulta = "SELECT pregunta17a, count(pregunta17a) as cantidad FROM hecho_respuestas_encuesta1 WHERE (pregunta17a ILIKE '%Padre%') GROUP BY(pregunta17a) UNION SELECT pregunta17b, count(pregunta17b) FROM hecho_respuestas_encuesta1 WHERE (pregunta17b ILIKE '%Madre%') GROUP BY(pregunta17b) UNION SELECT pregunta17c, count(pregunta17c) FROM hecho_respuestas_encuesta1 WHERE (pregunta17c ILIKE '%Ambos padres%') GROUP BY(pregunta17c) UNION SELECT pregunta17d, count(pregunta17d) FROM hecho_respuestas_encuesta1 WHERE (pregunta17d ILIKE '%Padres y propios%') GROUP BY(pregunta17d) UNION SELECT pregunta17e, count(pregunta17e) FROM hecho_respuestas_encuesta1 WHERE (pregunta17e ILIKE '%Solo propios%') GROUP BY(pregunta17e) UNION SELECT pregunta17f, count(pregunta17f) FROM hecho_respuestas_encuesta1 WHERE (pregunta17f ILIKE '%Prestamo%') GROUP BY(pregunta17f) UNION SELECT pregunta17g, count(pregunta17g) FROM hecho_respuestas_encuesta1 WHERE (pregunta17g ILIKE '%Otro acudiente%') GROUP BY(pregunta17g) UNION SELECT pregunta17h, count(pregunta17h) FROM hecho_respuestas_encuesta1 WHERE (pregunta17h ILIKE '%No respondio%') GROUP BY(pregunta17h) ORDER BY(pregunta17a);";
        var consulta = "SELECT pregunta17a, count(pregunta17a) as cantidad FROM hecho_respuestas_encuesta1 WHERE (pregunta17a ='1') GROUP BY(pregunta17a) UNION SELECT pregunta17b, count(pregunta17b) FROM hecho_respuestas_encuesta1 WHERE (pregunta17b ='2') GROUP BY(pregunta17b) UNION SELECT pregunta17c, count(pregunta17c) FROM hecho_respuestas_encuesta1 WHERE (pregunta17c ='3') GROUP BY(pregunta17c) UNION SELECT pregunta17d, count(pregunta17d) FROM hecho_respuestas_encuesta1 WHERE (pregunta17d ='4') GROUP BY(pregunta17d) UNION SELECT pregunta17e, count(pregunta17e) FROM hecho_respuestas_encuesta1 WHERE (pregunta17e ='5') GROUP BY(pregunta17e) UNION SELECT pregunta17f, count(pregunta17f) FROM hecho_respuestas_encuesta1 WHERE (pregunta17f ='6') GROUP BY(pregunta17f) UNION SELECT pregunta17g, count(pregunta17g) FROM hecho_respuestas_encuesta1 WHERE (pregunta17g ILIKE '%Otro acudiente%') GROUP BY(pregunta17g) UNION SELECT pregunta17h, count(pregunta17h) FROM hecho_respuestas_encuesta1 WHERE (pregunta17h ILIKE '%No respondio%') GROUP BY(pregunta17h) ORDER BY(pregunta17a);";
        console.log(consulta);                
        datos = $.ajax({
            url:"../../../../../indice_analiticas_avanzadas.php",
            type:'post',
            dataType:'json',
            async:false,
            data:"sql_analisis2="+consulta+"&id_pre1=17",
            success:function(){},                                                            
        }).responseText; 
        console.log("lo que llega "+datos);
        datos = JSON.parse(datos);
        legendLabels = ['Padre', 'Madre', 'Ambos Padres', 'Padre(s) y Propios', 'Solo propios', 'Prestamo', 'Otro acudiente', 'No respondiò'];
         var plot2 = jQuery.jqplot('grafica2', datos,
                {
                 title: "Procedencia de ingresos económicos para  sostenimiento de estudiantes universitarios Cali, 2014",
                    seriesDefaults: 
                    {                        
                        renderer: jQuery.jqplot.PieRenderer,
                        rendererOptions: 
                        {   
                            showDataLabels: true
                        }
                    },                    
                    legend: { show:true, location: 'e' , labels: legendLabels}
                });
}

/**********************************************************************************************************************************/

function graficoPastelPregunta28()
{
        $("#grafica4").empty();
        var consulta = "SELECT pregunta28a, count(pregunta28a) as cantidad FROM hecho_respuestas_encuesta1 WHERE (pregunta28a ='1') GROUP BY(pregunta28a) UNION SELECT pregunta28b, count(pregunta28b) FROM hecho_respuestas_encuesta1 WHERE (pregunta28b ='2') GROUP BY(pregunta28b) UNION SELECT pregunta28c, count(pregunta28c) FROM hecho_respuestas_encuesta1 WHERE (pregunta28c ='3') GROUP BY(pregunta28c) UNION SELECT pregunta28d, count(pregunta28d) FROM hecho_respuestas_encuesta1 WHERE (pregunta28d ='4') GROUP BY(pregunta28d) UNION SELECT pregunta28e, count(pregunta28e) FROM hecho_respuestas_encuesta1 WHERE (pregunta28e ='5') GROUP BY(pregunta28e) UNION SELECT pregunta28f, count(pregunta28f) FROM hecho_respuestas_encuesta1 WHERE (pregunta28f ='6') GROUP BY(pregunta28f) ORDER BY(pregunta28a);";
        //var consulta = "SELECT pregunta28a, count(pregunta28a) as cantidad FROM hecho_respuestas_encuesta1 WHERE (pregunta28a ILIKE '%Profesional y otros%') GROUP BY(pregunta28a) UNION SELECT pregunta28b, count(pregunta28b) FROM hecho_respuestas_encuesta1 WHERE (pregunta28b ILIKE '%Amigos%') GROUP BY(pregunta28b) UNION SELECT pregunta28d, count(pregunta28d) FROM hecho_respuestas_encuesta1 WHERE (pregunta28d ILIKE '%No acudi a nadie%') GROUP BY(pregunta28d) UNION SELECT pregunta28e, count(pregunta28e) FROM hecho_respuestas_encuesta1 WHERE (pregunta28e ILIKE '%No aplica%') GROUP BY(pregunta28e) UNION SELECT pregunta28f, count(pregunta28f) FROM hecho_respuestas_encuesta1 WHERE (pregunta28f ILIKE '%No respondio%') GROUP BY(pregunta28f) ORDER BY(pregunta28a);";
        console.log(consulta);                
        datos = $.ajax({
            url:"../../../../../indice_analiticas_avanzadas.php",
            type:'post',
            dataType:'json',
            async:false,
            data:"sql_analisis2="+consulta+"&id_pre1=28",
            success:function(){},                                                            
        }).responseText; 
        console.log("lo que llega "+datos);
        datos = JSON.parse(datos);
        legendLabels = ['Profesional y otros', 'Amigos', 'Familiar', 'No acudí a nadie', 'No aplica', 'No respondiò'];
        var plot3 = $.jqplot('grafica4', datos, 
                 {
             title: "Dialogo previo sobre sexualidad antes del inicio de relaciones  sexuales Estudiantes universitarios Cali, 2014",
                     seriesDefaults: 
                     {                         
                        renderer:$.jqplot.DonutRenderer,                        
                        rendererOptions:
                        {        
                            sliceMargin: 3,                    
                            startAngle: -90,
                            showDataLabels: true,        
                            dataLabels: 'value'
                        }
                    },
                    legend: { show:true, location: 'e', labels: legendLabels }
                });
        /*
         var plot2 = jQuery.jqplot('grafica4', datos,
                {
            title: "Dialogo previo sobre sexualidad antes del inicio de relaciones  sexuales Estudiantes universitarios Cali, 2014",
                    seriesDefaults: 
                    {                        
                        renderer: jQuery.jqplot.PieRenderer,
                        rendererOptions: 
                        {   
                            showDataLabels: true
                        }
                    },
                    legend: { show:true, location: 'e' }
                });*/
}

//function graficoPastelPregunta16_uvme()
//{
//        $("#grafica2").empty();
//        //var consulta = "SELECT pregunta16, count(pregunta16) as cantidad FROM hecho_respuestas_encuesta1  WHERE (pregunta16 IS NOT NULL) AND (pin ILIKE '%uvme%') GROUP BY (pregunta16) ORDER BY (pregunta16)";
//        var consulta = "SELECT pregunta16, count(pregunta16) as cantidad FROM hecho_respuestas_encuesta1  WHERE (pregunta16 IS NOT NULL) AND ((pin ILIKE '%uvme%') OR (pin ILIKE '%uvsf%'))  GROUP BY (pregunta16) ORDER BY (pregunta16);";
//        
//        console.log(consulta);                
//        datos = $.ajax({
//            url:"../../../../../indice_analiticas_avanzadas.php",
//            type:'post',
//            dataType:'json',
//            async:false,
//            data:"sql_analisis="+consulta+"&id_pre=16",
//            success:function(){},                                                            
//        }).responseText; 
//        console.log("lo que llega "+datos);
//        datos = JSON.parse(datos);
//        
//         var plot2 = jQuery.jqplot('grafica2', datos,
//                {
//            title: 'Clasificación socioeconómica según estrato estudiantes universitarios Cali, 2014. - UVME',
//                    seriesDefaults: 
//                    {                        
//                        renderer: jQuery.jqplot.PieRenderer,
//                        rendererOptions: 
//                        {   
//                            showDataLabels: true
//                        }
//                    },
//                    legend: { show:true, location: 'e' }
//                });
//}
//
//function graficoPastelPregunta16_usc()
//{
//        $("#grafica3").empty();
//        var consulta = "SELECT pregunta16, count(pregunta16) as cantidad FROM hecho_respuestas_encuesta1  WHERE (pregunta16 IS NOT NULL) AND (pin ILIKE '%usc%')  GROUP BY (pregunta16) ORDER BY (pregunta16)";
//        console.log(consulta);                
//        datos = $.ajax({
//            url:"../../../../../indice_analiticas_avanzadas.php",
//            type:'post',
//            dataType:'json',
//            async:false,
//            data:"sql_analisis="+consulta+"&id_pre=16",
//            success:function(){},                                                            
//        }).responseText; 
//        console.log("lo que llega "+datos);
//        datos = JSON.parse(datos);
//        
//         var plot2 = jQuery.jqplot('grafica3', datos,
//                {
//            title: 'Clasificación socioeconómica según estrato estudiantes universitarios Cali, 2014. - USC',
//                    seriesDefaults: 
//                    {                        
//                        renderer: jQuery.jqplot.PieRenderer,
//                        rendererOptions: 
//                        {   
//                            showDataLabels: true
//                        }
//                    },
//                    legend: { show:true, location: 'e' }
//                });
//}



function graficoPastelPregunta24()
{
        $("#grafica1").empty();
        var consulta = "SELECT pregunta24, count(pregunta24) as cantidad FROM hecho_respuestas_encuesta1  WHERE (pregunta24 IS NOT NULL) GROUP BY (pregunta24) ORDER BY (pregunta24);";
        console.log(consulta);                
        datos = $.ajax({
            url:"../../../../../indice_analiticas_avanzadas.php",
            type:'post',
            dataType:'json',
            async:false,
            data:"sql_analisis="+consulta+"&id_pre=24",
            success:function(){},                                                            
        }).responseText; 
        console.log("lo que llega "+datos);
        datos = JSON.parse(datos);
        legendLabels = ['Estrato uno', 'Estrato dos', 'Estrato tres', 'Estrato cuatro', 'Estrato cinco', 'Estrato seis', 'No sabe/NR', 'No respondio'];

        var plot2 = jQuery.jqplot('grafica1', datos,
                {
            title: "Clasificación socioeconómica según estrato estudiantes universitarios Cali, 2014.",
                    seriesDefaults: 
                    {                        
                        renderer: jQuery.jqplot.PieRenderer,
                        rendererOptions: 
                        {   
                            showDataLabels: true
                        }
                    },
                    legend: { show:true, location: 'e', labels: legendLabels }
                });
}

/************************************************************************************************************************************************************************************************************/
function graficoPastelPregunta30()
{
        $("#grafica5").empty();
        var consulta = "SELECT pregunta30a, count(pregunta30a) as cantidad FROM hecho_respuestas_encuesta1 WHERE (pregunta30a = '1') GROUP BY(pregunta30a) UNION SELECT pregunta30a, count(pregunta30a) FROM hecho_respuestas_encuesta1 WHERE (pregunta30a = '2') GROUP BY(pregunta30a) UNION SELECT pregunta30a, count(pregunta30a) FROM hecho_respuestas_encuesta1 WHERE (pregunta30a = '3') GROUP BY(pregunta30a) ORDER BY (pregunta30a)";
        console.log(consulta);                
        datos = $.ajax({
            url:"../../../../../indice_analiticas_avanzadas.php",
            type:'post',
            dataType:'json',
            async:false,           
           data:"sql_analisis2="+consulta+"&id_pre1=30",
            success:function(){},                                                            
        }).responseText; 
        console.log("lo que llega "+datos);
        datos = JSON.parse(datos);
                legendLabels = ['Si', 'No', 'No sabe', 'No respondio'];
        var plot3 = $.jqplot('grafica5', datos, 
                 {
             title: "Concertación con la pareja en temas de sexualidad estudiantes universitarios Cali, 2014 /n Evitar o posponer una práctica  sexual ",
                     seriesDefaults: 
                     {                         
                        renderer:$.jqplot.DonutRenderer,                        
                        rendererOptions:
                        {        
                            sliceMargin: 3,                    
                            startAngle: -90,
                            showDataLabels: true,        
                            dataLabels: 'value'
                        }
                    }, legend: { show:true, location: 'e', labels: legendLabels }
                });
        
        /*
         var plot2 = jQuery.jqplot('grafica5', datos,
                {
            title: "Concertación con la pareja en temas de sexualidad estudiantes universitarios Cali, 2014 /n Evitar o posponer una práctica  sexual ",
                    seriesDefaults: 
                    {                        
                        renderer: jQuery.jqplot.PieRenderer,
                        rendererOptions: 
                        {   
                            showDataLabels: true
                        }
                    },
                    legend: { show:true, location: 'e' }
                });*/
}

function graficoPastelPregunta30b()
{
        $("#grafica6").empty();
        var consulta = "SELECT pregunta30b, count(pregunta30b) as cantidad FROM hecho_respuestas_encuesta1 WHERE (pregunta30b = '1') GROUP BY(pregunta30b) UNION SELECT pregunta30b, count(pregunta30b) FROM hecho_respuestas_encuesta1 WHERE (pregunta30b = '2') GROUP BY(pregunta30b) UNION SELECT pregunta30b, count(pregunta30b) FROM hecho_respuestas_encuesta1 WHERE (pregunta30b = '3') GROUP BY(pregunta30b) ORDER BY (pregunta30b)";
        console.log(consulta);                
        datos = $.ajax({
            url:"../../../../../indice_analiticas_avanzadas.php",
            type:'post',
            dataType:'json',
            async:false,           
           data:"sql_analisis3="+consulta+"&id_pre2=30&id_letra=b",
            success:function(){},                                                            
        }).responseText; 
        console.log("lo que llega "+datos);
        datos = JSON.parse(datos);
                        legendLabels = ['Si', 'No', 'No sabe', 'No respondio'];
        var plot3 = $.jqplot('grafica6', datos, 
                 {
             title: "Concertación con la pareja en temas de sexualidad estudiantes universitarios Cali, 2014 /n Cosas que te gustan o te disgustan en las prácticas sexuales",
                     seriesDefaults: 
                     {                         
                        renderer:$.jqplot.DonutRenderer,                        
                        rendererOptions:
                        {        
                            sliceMargin: 3,                    
                            startAngle: -90,
                            showDataLabels: true,        
                            dataLabels: 'value'
                        }
                    }
                    , legend: { show:true, location: 'e', labels: legendLabels }
                });
        /*
         var plot2 = jQuery.jqplot('grafica6', datos,
                {
            title: "Concertación con la pareja en temas de sexualidad estudiantes universitarios Cali, 2014 /n Cosas que te gustan o te disgustan en las prácticas sexuales",
                    seriesDefaults: 
                    {                        
                        renderer: jQuery.jqplot.PieRenderer,
                        rendererOptions: 
                        {   
                            showDataLabels: true
                        }
                    },
                    legend: { show:true, location: 'e' }
                });*/
}

function graficoPastelPregunta30c()
{
        $("#grafica7").empty();
        var consulta = "SELECT pregunta30c, count(pregunta30c) as cantidad FROM hecho_respuestas_encuesta1 WHERE (pregunta30c = '1') GROUP BY(pregunta30c) UNION SELECT pregunta30c, count(pregunta30c) FROM hecho_respuestas_encuesta1 WHERE (pregunta30c = '2') GROUP BY(pregunta30c) UNION SELECT pregunta30c, count(pregunta30c) FROM hecho_respuestas_encuesta1 WHERE (pregunta30c = '3') GROUP BY(pregunta30c) ORDER BY (pregunta30c)";
        console.log(consulta);                
        datos = $.ajax({
            url:"../../../../../indice_analiticas_avanzadas.php",
            type:'post',
            dataType:'json',
            async:false,           
           data:"sql_analisis3="+consulta+"&id_pre2=30&id_letra=c",
            success:function(){},                                                            
        }).responseText; 
        console.log("lo que llega "+datos);
        datos = JSON.parse(datos);
        
         legendLabels = ['Si', 'No', 'No sabe', 'No respondio'];
        plot2 = $.jqplot('grafica7', datos, {
            title: "Concertación con la pareja en temas de sexualidad estudiantes universitarios Cali, 2014 /n Formas de evitar el embarazo",
            seriesDefaults: {
                renderer:$.jqplot.BarRenderer,
                pointLabels: { show: true }
            },
            axes: {
                xaxis: {
                    renderer: $.jqplot.CategoryAxisRenderer,
                    ticks: legendLabels
                }
            }
        });   
        /*
        var plot1 = $.jqplot('grafica7', datos, 
                {
                    title: "Concertación con la pareja en temas de sexualidad estudiantes universitarios Cali, 2014 /n Acuerdos de fidelidad",
                    //series:[{renderer:$.jqplot.BarRenderer}],
                    seriesDefaults:{
                                       renderer:$.jqplot.BarRenderer,
                                    pointLabels: { show:true, location:'nw', edgeTolerance:-15 },
									},
                    axesDefaults:
                    {
                                tickRenderer: $.jqplot.CanvasAxisTickRenderer ,
                                tickOptions: 
                                {          
                                    angle: -30,
                                    fontSize: '7pt'
                                }
                    },                    
                    axes:{
                               xaxis: 
                               {
                                   renderer: $.jqplot.CategoryAxisRenderer
                               }
                         }
                  });*/
        /*
         var plot2 = jQuery.jqplot('grafica7', datos,
                {
            title: "Concertación con la pareja en temas de sexualidad estudiantes universitarios Cali, 2014 /n Acuerdos de fidelidad",
                    seriesDefaults: 
                    {                        
                        renderer: jQuery.jqplot.PieRenderer,
                        rendererOptions: 
                        {   
                            showDataLabels: true
                        }
                    },
                    legend: { show:true, location: 'e' }
                });*/
}

function graficoPastelPregunta30d()
{
        $("#grafica8").empty();
        var consulta = "SELECT pregunta30d, count(pregunta30d) as cantidad FROM hecho_respuestas_encuesta1 WHERE (pregunta30d = '1') GROUP BY(pregunta30d) UNION SELECT pregunta30d, count(pregunta30d) FROM hecho_respuestas_encuesta1 WHERE (pregunta30d = '2') GROUP BY(pregunta30d) UNION SELECT pregunta30d, count(pregunta30d) FROM hecho_respuestas_encuesta1 WHERE (pregunta30d = '3') GROUP BY(pregunta30d) ORDER BY (pregunta30d)";
        console.log(consulta);                
        datos = $.ajax({
            url:"../../../../../indice_analiticas_avanzadas.php",
            type:'post',
            dataType:'json',
            async:false,           
           data:"sql_analisis3="+consulta+"&id_pre2=30&id_letra=d",
            success:function(){},                                                            
        }).responseText; 
        console.log("lo que llega "+datos);
        datos = JSON.parse(datos);
        legendLabels = ['Si', 'No', 'No sabe', 'No respondio'];
        plot2 = $.jqplot('grafica8', datos, {
            title: "Concertación con la pareja en temas de sexualidad estudiantes universitarios Cali, 2014 /n Formas de evitar el embarazo",
            seriesDefaults: {
                renderer:$.jqplot.BarRenderer,
                pointLabels: { show: true }
            },
            axes: {
                xaxis: {
                    renderer: $.jqplot.CategoryAxisRenderer,
                    ticks: legendLabels
                }
            }
        });   
        /*var plot1 = $.jqplot('grafica8', datos, 
                {
                    title: "Concertación con la pareja en temas de sexualidad estudiantes universitarios Cali, 2014 /n Formas de evitar el embarazo",
                    //series:[{renderer:$.jqplot.BarRenderer}],
                    seriesDefaults:{
                                       renderer:$.jqplot.BarRenderer,
                                    pointLabels: { show:true, location:'nw', edgeTolerance:-15 },
									},
                    axesDefaults:
                    {
                                tickRenderer: $.jqplot.CanvasAxisTickRenderer ,
                                tickOptions: 
                                {          
                                    angle: -30,
                                    fontSize: '7pt'
                                }
                    },                    
                    axes:{
                               xaxis: 
                               {
                                   renderer: $.jqplot.CategoryAxisRenderer
                               }
                         }
                  });*/
        /*
         var plot2 = jQuery.jqplot('grafica8', datos,
                {
            title: "Concertación con la pareja en temas de sexualidad estudiantes universitarios Cali, 2014 /n Formas de evitar el embarazo",
                    seriesDefaults: 
                    {                        
                        renderer: jQuery.jqplot.PieRenderer,
                        rendererOptions: 
                        {   
                            showDataLabels: true
                        }
                    },
                    legend: { show:true, location: 'e' }
                });*/
}

function graficoPastelPregunta30e()
{
        $("#grafica9").empty();
        var consulta = "SELECT pregunta30e, count(pregunta30e) as cantidad FROM hecho_respuestas_encuesta1 WHERE (pregunta30e = '1') GROUP BY(pregunta30e) UNION SELECT pregunta30e, count(pregunta30e) FROM hecho_respuestas_encuesta1 WHERE (pregunta30e = '2') GROUP BY(pregunta30e) UNION SELECT pregunta30e, count(pregunta30e) FROM hecho_respuestas_encuesta1 WHERE (pregunta30e = '3') GROUP BY(pregunta30e) ORDER BY (pregunta30e)";
        console.log(consulta);                
        datos = $.ajax({
            url:"../../../../../indice_analiticas_avanzadas.php",
            type:'post',
            dataType:'json',
            async:false,           
           data:"sql_analisis3="+consulta+"&id_pre2=30&id_letra=e",
            success:function(){},                                                            
        }).responseText; 
        console.log("lo que llega "+datos);
        datos = JSON.parse(datos);
        legendLabels = ['Si', 'No', 'No sabe', 'No respondio'];
        plot2 = $.jqplot('grafica9', datos, {
            title: "Concertación con la pareja en temas de sexualidad estudiantes universitarios Cali, 2014 /n Uso de preservativos o métodos de barrera  para evitar infecciones de transmisión sexual (VIH/SIDA)",
            seriesDefaults: {
                renderer:$.jqplot.BarRenderer,
                pointLabels: { show: true }
            },
            axes: {
                xaxis: {
                    renderer: $.jqplot.CategoryAxisRenderer,
                    ticks: legendLabels
                }
            }
        });    
        /*var plot1 = $.jqplot('grafica9', datos, 
                {
                    title: "Concertación con la pareja en temas de sexualidad estudiantes universitarios Cali, 2014 /n Uso de preservativos o métodos de barrera  para evitar infecciones de transmisión sexual (VIH/SIDA)",
                    //series:[{renderer:$.jqplot.BarRenderer}],
                    seriesDefaults:{
                                       renderer:$.jqplot.BarRenderer,
                                    pointLabels: { show:true, location:'nw', edgeTolerance:-15 },
									},
                    axesDefaults:
                    {
                                tickRenderer: $.jqplot.CanvasAxisTickRenderer ,
                                tickOptions: 
                                {          
                                    angle: -30,
                                    fontSize: '7pt'
                                }
                    },                    
                    axes:{
                               xaxis: 
                               {
                                   renderer: $.jqplot.CategoryAxisRenderer
                               }
                         }
                  });*/
        /*
         var plot2 = jQuery.jqplot('grafica9', datos,
                {
            title: "Concertación con la pareja en temas de sexualidad estudiantes universitarios Cali, 2014 /n Uso de preservativos o métodos de barrera  para evitar infecciones de transmisión sexual (VIH/SIDA)",
                    seriesDefaults: 
                    {                        
                        renderer: jQuery.jqplot.PieRenderer,
                        rendererOptions: 
                        {   
                            showDataLabels: true
                        }
                    },
                    legend: { show:true, location: 'e' }
                });*/
}

function graficoPastelPregunta30f()
{
        $("#grafica10").empty();
        var consulta = "SELECT pregunta30f, count(pregunta30f) as cantidad FROM hecho_respuestas_encuesta1 WHERE (pregunta30f = '1') GROUP BY(pregunta30f) UNION SELECT pregunta30f, count(pregunta30f) FROM hecho_respuestas_encuesta1 WHERE (pregunta30f = '2') GROUP BY(pregunta30f) UNION SELECT pregunta30f, count(pregunta30f) FROM hecho_respuestas_encuesta1 WHERE (pregunta30f = '3') GROUP BY(pregunta30f) ORDER BY (pregunta30f)";
        console.log(consulta);                
        datos = $.ajax({
            url:"../../../../../indice_analiticas_avanzadas.php",
            type:'post',
            dataType:'json',
            async:false,           
           data:"sql_analisis3="+consulta+"&id_pre2=30&id_letra=f",
            success:function(){},                                                            
        }).responseText; 
        console.log("lo que llega "+datos);
        datos = JSON.parse(datos);
         legendLabels = ['Si', 'No', 'No sabe', 'No respondio'];
         var plot2 = jQuery.jqplot('grafica10', datos,
                {
            title: "Concertación con la pareja en temas de sexualidad estudiantes universitarios Cali, 2014 /n El pasado sexual de ambos (número de parejas, prácticas sexuales)",
                    seriesDefaults: 
                    {                        
                        renderer: jQuery.jqplot.PieRenderer,
                        rendererOptions: 
                        {   
                            showDataLabels: true
                        }
                    },
                    legend: { show:true, location: 'e', labels: legendLabels }
                });
}

function graficoPastelPregunta37()
{
        $("#grafica11").empty();
        var consulta = "SELECT pregunta37, count(pregunta37) as cantidad FROM hecho_respuestas_encuesta1  WHERE (pregunta37 IS NOT NULL) GROUP BY (pregunta37) ORDER BY (pregunta37);";
        console.log(consulta);                
        datos = $.ajax({
            url:"../../../../../indice_analiticas_avanzadas.php",
            type:'post',
            dataType:'json',
            async:false,
            data:"sql_analisis="+consulta+"&id_pre=37",
            success:function(){},                                                            
        }).responseText; 
        console.log("lo que llega "+datos);
        datos = JSON.parse(datos);
        legendLabels = ['Si', 'No', 'No respondio'];
         var plot2 = jQuery.jqplot('grafica11', datos,
                {
            title: "Inicio de vida sexual en estudiantes universitarios Cali, 2014",
                    seriesDefaults: 
                    {                        
                        renderer: jQuery.jqplot.PieRenderer,
                        rendererOptions: 
                        {   
                            showDataLabels: true
                        }
                    },
                    legend: { show:true, location: 'e', labels: legendLabels }
                });
}


function graficoPastelPregunta55()
{
        $("#grafica12").empty();
        var consulta = "SELECT pregunta55, count(pregunta55) as cantidad FROM hecho_respuestas_encuesta1  WHERE (pregunta55 IS NOT NULL) GROUP BY (pregunta55) ORDER BY (pregunta55);";
        console.log(consulta);                
        datos = $.ajax({
            url:"../../../../../indice_analiticas_avanzadas.php",
            type:'post',
            dataType:'json',
            async:false,
            data:"sql_analisis="+consulta+"&id_pre=55",
            success:function(){},                                                            
        }).responseText; 
        console.log("lo que llega "+datos);
        datos = JSON.parse(datos);
        legendLabels = ['Si', 'No', 'No respondio'];
         var plot2 = jQuery.jqplot('grafica12', datos,
                {
            title: "Frecuencia declarada de infecciones de transmisión sexual en estudiantes universitarios Cali, 2014",
                    seriesDefaults: 
                    {                        
                        renderer: jQuery.jqplot.PieRenderer,
                        rendererOptions: 
                        {   
                            showDataLabels: true
                        }
                    },
                    legend: { show:true, location: 'e', labels: legendLabels }
                });
}


function graficoPastelPregunta58()
{
        $("#grafica13").empty();
        var consulta = "SELECT pregunta58, count(pregunta58) as cantidad FROM hecho_respuestas_encuesta1  WHERE (pregunta58 IS NOT NULL) GROUP BY (pregunta58) ORDER BY (pregunta58);";
        console.log(consulta);                
        datos = $.ajax({
            url:"../../../../../indice_analiticas_avanzadas.php",
            type:'post',
            dataType:'json',
            async:false,
            data:"sql_analisis="+consulta+"&id_pre=58",
            success:function(){},                                                            
        }).responseText; 
        console.log("lo que llega "+datos);
        datos = JSON.parse(datos);
        legendLabels = ['Si', 'No', 'No respondio'];
        var plot3 = $.jqplot('grafica13', datos, 
                 {
                 title: "Frecuencia declarada de realización de la prueba del VIH?  en estudiantes universitarios Cali, 2014",
                     seriesDefaults: 
                     {                         
                        renderer:$.jqplot.DonutRenderer,                        
                        rendererOptions:
                        {        
                            sliceMargin: 3,                    
                            startAngle: -90,
                            showDataLabels: true,        
                            dataLabels: 'value'
                        }
                    },
                    legend: { show:true, location: 'e', labels: legendLabels }
                });
        /*
         var plot2 = jQuery.jqplot('grafica13', datos,
                {
            title: "Frecuencia declarada de realización de la prueba del VIH?  en estudiantes universitarios Cali, 2014",
                    seriesDefaults: 
                    {                        
                        renderer: jQuery.jqplot.PieRenderer,
                        rendererOptions: 
                        {   
                            showDataLabels: true
                        }
                    },
                    legend: { show:true, location: 'e' }
                });*/
}


function graficoPastelPregunta71()
{
        $("#grafica14").empty();
        var consulta = "SELECT pregunta71, count(pregunta71) as cantidad FROM hecho_respuestas_encuesta1  WHERE (pregunta71 IS NOT NULL) GROUP BY (pregunta71) ORDER BY (pregunta71);";
        console.log(consulta);                
        datos = $.ajax({
            url:"../../../../../indice_analiticas_avanzadas.php",
            type:'post',
            dataType:'json',
            async:false,
            data:"sql_analisis="+consulta+"&id_pre=71",
            success:function(){},                                                            
        }).responseText; 
        console.log("lo que llega "+datos);
        datos = JSON.parse(datos);
        legendLabels = ['Si', 'No', 'No aplica en mi caso', 'No respondio'];
        var plot3 = $.jqplot('grafica14', datos, 
                 {
                 title: "Frecuencia de uso de métodos anticonceptivos estudiantes universitarios Cali, 2014",
                     seriesDefaults: 
                     {                         
                        renderer:$.jqplot.DonutRenderer,                        
                        rendererOptions:
                        {        
                            sliceMargin: 3,                    
                            startAngle: -90,
                            showDataLabels: true,        
                            dataLabels: 'value'
                        }
                    },
                    legend: { show:true, location: 'e', labels: legendLabels }
                });
        
        /*
         var plot2 = jQuery.jqplot('grafica14', datos,
                {
            title: "Frecuencia de uso de métodos anticonceptivos estudiantes universitarios, Cali 2014",
                    seriesDefaults: 
                    {                        
                        renderer: jQuery.jqplot.PieRenderer,
                        rendererOptions: 
                        {   
                            showDataLabels: true
                        }
                    },
                    legend: { show:true, location: 'e' }
                });*/
}


function graficoPastelPregunta93()
{
        $("#grafica15").empty();
        var consulta = "SELECT pregunta93, count(pregunta93) as cantidad FROM hecho_respuestas_encuesta1  WHERE (pregunta93 IS NOT NULL) GROUP BY (pregunta93) ORDER BY (pregunta93);";
        console.log(consulta);                
        datos = $.ajax({
            url:"../../../../../indice_analiticas_avanzadas.php",
            type:'post',
            dataType:'json',
            async:false,
            data:"sql_analisis="+consulta+"&id_pre=93",
            success:function(){},                                                            
        }).responseText; 
        console.log("lo que llega "+datos);
        datos = JSON.parse(datos);
        legendLabels = ['Si', 'No', 'No respondio'];
        var plot3 = $.jqplot('grafica15', datos, 
                 {
                 title: "Participación en grupos juveniles estudiantes universitarios Cali, 2014",
                     seriesDefaults: 
                     {                         
                        renderer:$.jqplot.DonutRenderer,                        
                        rendererOptions:
                        {        
                            sliceMargin: 3,                    
                            startAngle: -90,
                            showDataLabels: true,        
                            dataLabels: 'value'
                        }
                    },
                    legend: { show:true, location: 'e', labels: legendLabels }
                });
        /*
         var plot2 = jQuery.jqplot('grafica15', datos,
                {
            title: "Participación en grupos juveniles estudiantes universitarios Cali, 2014",
                    seriesDefaults: 
                    {                        
                        renderer: jQuery.jqplot.PieRenderer,
                        rendererOptions: 
                        {   
                            showDataLabels: true
                        }
                    },
                    legend: { show:true, location: 'e' }
                });*/
}


function graficoPastelPregunta94()
{
        $("#grafica16").empty();
        var consulta = "SELECT pregunta94, count(pregunta94) as cantidad FROM hecho_respuestas_encuesta1  WHERE (pregunta94 IS NOT NULL) GROUP BY (pregunta94) ORDER BY (pregunta94);";
        console.log(consulta);                
        datos = $.ajax({
            url:"../../../../../indice_analiticas_avanzadas.php",
            type:'post',
            dataType:'json',
            async:false,
            data:"sql_analisis="+consulta+"&id_pre=94",
            success:function(){},                                                            
        }).responseText; 
        console.log("lo que llega "+datos);
        datos = JSON.parse(datos);
        legendLabels = ['Si', 'No', 'No sabe', 'No respondio'];
         var plot2 = jQuery.jqplot('grafica16', datos,
                {
            title: "Percepción de manifestaciones Homofóbicas en el entorno estudiantes universitarios Cali, 2014",
                    seriesDefaults: 
                    {                        
                        renderer: jQuery.jqplot.PieRenderer,
                        rendererOptions: 
                        {   
                            showDataLabels: true
                        }
                    },
                    legend: { show:true, location: 'e', labels: legendLabels }
                });
}


function graficoPastelPregunta99()
{
        $("#grafica16").empty();
        var consulta = "SELECT pregunta99, count(pregunta99) as cantidad FROM hecho_respuestas_encuesta1  WHERE (pregunta99 IS NOT NULL) GROUP BY (pregunta99) ORDER BY (pregunta99);";
        console.log(consulta);                
        datos = $.ajax({
            url:"../../../../../indice_analiticas_avanzadas.php",
            type:'post',
            dataType:'json',
            async:false,
            data:"sql_analisis="+consulta+"&id_pre=99",
            success:function(){},                                                            
        }).responseText; 
        console.log("lo que llega "+datos);
        datos = JSON.parse(datos);
        legendLabels = ['Si', 'No', 'No sabe', 'No respondio'];
        plot2 = $.jqplot('grafica16', datos, {
            title: "Venta de preservativos en campus universitarios Cali, 2014",
            seriesDefaults: {
                renderer:$.jqplot.BarRenderer,
                pointLabels: { show: true }
            },
            axes: {
                xaxis: {
                    renderer: $.jqplot.CategoryAxisRenderer,
                    ticks: legendLabels
                }
            }
        });       
         /*var plot1 = $.jqplot('grafica16', datos, 
                {
                    title: "Venta de preservativos en campus universitarios Cali, 2014",
                    //series:[{renderer:$.jqplot.BarRenderer}],
                    seriesDefaults:{
                                       renderer:$.jqplot.BarRenderer,
                                    pointLabels: { show:true, location:'nw', edgeTolerance:-15 },
				},
                     legend: {
                                show: true,
                                location: 'e',
                                labels: legendLabels 
                                //placement: 'outside'
                            } ,
                    axesDefaults:
                    {
                                tickRenderer: $.jqplot.CanvasAxisTickRenderer ,
                                tickOptions: 
                                {          
                                    angle: -30,
                                    fontSize: '7pt'
                                }
                    },
                    
                    axes:{
                               xaxis: 
                               {
                                   renderer: $.jqplot.CategoryAxisRenderer
                               }
                         }
                  });*/
        /*
         var plot2 = jQuery.jqplot('grafica16', datos,
                {
            title: "Venta de preservativos en campus universitarios Cali, 2014",
                    seriesDefaults: 
                    {                        
                        renderer: jQuery.jqplot.PieRenderer,
                        rendererOptions: 
                        {   
                            showDataLabels: true
                        }
                    },
                    legend: { show:true, location: 'e' }
                });*/
}


function graficoPastelPregunta107()
{
        $("#grafica17").empty();
        var consulta = "SELECT pregunta107, count(pregunta107) as cantidad FROM hecho_respuestas_encuesta1  WHERE (pregunta107 IS NOT NULL) GROUP BY (pregunta107) ORDER BY (pregunta107);";
        console.log(consulta);                
        datos = $.ajax({
            url:"../../../../../indice_analiticas_avanzadas.php",
            type:'post',
            dataType:'json',
            async:false,
            data:"sql_analisis="+consulta+"&id_pre=107",
            success:function(){},                                                            
        }).responseText; 
        console.log("lo que llega "+datos);
        datos = JSON.parse(datos);
        legendLabels = ['Si', 'No', 'No sabe', 'No respondio'];
        plot2 = $.jqplot('grafica17', datos, {
            title: "Frecuencia declarada sobre espacios o programas de apoyo u orientación en temas relacionados con la sexualidad, universidades Cali, 2014",
            seriesDefaults: {
                renderer:$.jqplot.BarRenderer,
                pointLabels: { show: true }
            },
            axes: {
                xaxis: {
                    renderer: $.jqplot.CategoryAxisRenderer,
                    ticks: legendLabels
                }
            }
        });    
        /*var plot1 = $.jqplot('grafica17', datos, 
                {
                    title: "Frecuencia declarada sobre espacios o programas de apoyo u orientación en temas relacionados con la sexualidad, universidades Cali, 2014",
                    //series:[{renderer:$.jqplot.BarRenderer}],
                    seriesDefaults:{
                                       renderer:$.jqplot.BarRenderer,
                                    pointLabels: { show:true, location:'nw', edgeTolerance:-15 },
									},
                    axesDefaults:
                    {
                                tickRenderer: $.jqplot.CanvasAxisTickRenderer ,
                                tickOptions: 
                                {          
                                    angle: -30,
                                    fontSize: '7pt'
                                }
                    },
                    
                    axes:{
                               xaxis: 
                               {
                                   renderer: $.jqplot.CategoryAxisRenderer
                               }
                         }
                  });*/
        /*
         var plot2 = jQuery.jqplot('grafica17', datos,
                {
            title: "Frecuencia declarada sobre espacios o programas de apoyo u orientación en temas relacionados con la sexualidad, universidades Cali, 2014",
                    seriesDefaults: 
                    {                        
                        renderer: jQuery.jqplot.PieRenderer,
                        rendererOptions: 
                        {   
                            showDataLabels: true
                        }
                    },
                    legend: { show:true, location: 'e' }
                });*/
}


function graficoPastelPregunta113()
{
        $("#grafica18").empty();
        var consulta = "SELECT pregunta113, count(pregunta113) as cantidad FROM hecho_respuestas_encuesta1  WHERE (pregunta113 IS NOT NULL) GROUP BY (pregunta113) ORDER BY (pregunta113);";
        console.log(consulta);                
        datos = $.ajax({
            url:"../../../../../indice_analiticas_avanzadas.php",
            type:'post',
            dataType:'json',
            async:false,
            data:"sql_analisis="+consulta+"&id_pre=113",
            success:function(){},                                                            
        }).responseText; 
        console.log("lo que llega "+datos);
        datos = JSON.parse(datos);
        legendLabels = ['Si', 'No', 'No sabe', 'No respondio'];
        plot2 = $.jqplot('grafica18', datos, {
            title: "Frecuencia de consulta a  establecimiento de salud para obtener atención en salud sexual y reproductiva en el último año. estudiantes universitarios Cali, 2014",
            seriesDefaults: {
                renderer:$.jqplot.BarRenderer,
                pointLabels: { show: true }
            },
            axes: {
                    xaxis: 
                    {
                        renderer: $.jqplot.CategoryAxisRenderer,
                        ticks: legendLabels
                    }
                }
        });    
        /*var plot1 = $.jqplot('grafica18', datos, 
                {
                    title: "Frecuencia declarada sobre espacios o programas de apoyo u orientación en temas relacionados con la sexualidad, universidades Cali, 2014",
                    //series:[{renderer:$.jqplot.BarRenderer}],
                    seriesDefaults:{
                                       renderer:$.jqplot.BarRenderer,
                                    pointLabels: { show:true, location:'nw', edgeTolerance:-15 },
									},
                    axesDefaults:
                    {
                                tickRenderer: $.jqplot.CanvasAxisTickRenderer ,
                                tickOptions: 
                                {          
                                    angle: -30,
                                    fontSize: '7pt'
                                }
                    },
                    
                    axes:{
                               xaxis: 
                               {
                                   renderer: $.jqplot.CategoryAxisRenderer
                               }
                         }
                  });*/
        /*
         var plot2 = jQuery.jqplot('grafica18', datos,
                {
            title: "Frecuencia declarada sobre espacios o programas de apoyo u orientación en temas relacionados con la sexualidad, universidades Cali, 2014",
                    seriesDefaults: 
                    {                        
                        renderer: jQuery.jqplot.PieRenderer,
                        rendererOptions: 
                        {   
                            showDataLabels: true
                        }
                    },
                    legend: { show:true, location: 'e' }
                });*/
}


