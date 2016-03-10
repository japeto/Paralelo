$(document).ready(function(){     

    graficoPastelPregunta46();
    graficoPastelPregunta46_1();
    graficoPastelPregunta24();
    graficoPastelPregunta17();
    graficoPastelPregunta16_1();
    graficoPastelPregunta16();
    /*graficoPastelPregunta28();
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
    graficoPastelPregunta113();*/
    
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
        console.log("lo que llega "+datos);
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
                         },
                  });
}


/********************************************************************************************************************************************/ 
function graficoPastelPregunta16_1()
{
        $("#grafica6").empty();
        /*var consulta = "SELECT pregunta16, count(pregunta16) as cantidad FROM hecho_respuestas_encuesta1  WHERE (pregunta16 IS NOT NULL) GROUP BY (pregunta16) ORDER BY (pregunta16)";
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
        datos = JSON.parse(datos);*/
        // legendLabels = ['Nunca', 'Casi nunca', 'A veces', 'Casi siempre', 'Siempre', 'No respondio'];
        // legendLabels = ['Si', 'No', 'No aplica'];
        // var plot2 = jQuery.jqplot('grafica6', /*datos*/[[["Si", 760], ["No", 1170]]],
        //         {
        //     title: 'Prediccion riesgo académico en estudiantes universitarios Cali, 2014 J48',
        //             seriesDefaults: 
        //             {                        
        //                 renderer: jQuery.jqplot.PieRenderer,
        //                 rendererOptions: 
        //                 {   
        //                     showDataLabels: true
        //                 }
        //             },
        //             legend: { show:true, location: 'e', labels: legendLabels       }
        //         });
        datos = JSON.parse(JSON.stringify([["Si", 760], ["No", 1170]]))
        console.log(datos)
        var chart = c3.generate({
            bindto: '#grafica6',
            data: {
                columns: datos,
                type: 'pie',
                labels: true
            },
                legend: {
                    show: true
                },
                tooltip: {
                    format: {
                        title: function (d) { return 'Prediccion riesgo académico en estudiantes universitarios Cali, 2014 J48'},
                        value: function (value, ratio, id) {return 'votaron: '+value+' personas';}
                    }
                }
        });
        /*$("#grafica6").before("<div class='panel panel-default'><div class='panel-heading'><h4 class='panel-title'>Prediccion riesgo académico en estudiantes universitarios Cali, 2014 J48</h4></div></div>");*/
}
/**********************************************************************************************************************************/
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
        // console.log("lo que llega "+datos);
        // datos = JSON.parse(datos);
        // legendLabels = ['Nunca', 'Casi nunca', 'A veces', 'Casi siempre', 'Siempre', 'No respondio'];
        // var plot2 = jQuery.jqplot('grafica3', datos,
        //         {
        //     title: 'Percepción de riesgo académico en estudiantes universitarios Cali, 2014',
        //             seriesDefaults: 
        //             {                        
        //                 renderer: jQuery.jqplot.PieRenderer,
        //                 rendererOptions: 
        //                 {   
        //                     showDataLabels: true
        //                 }
        //             },
        //             legend: { show:true, location: 'e', labels: legendLabels       }
        //         });
        datos = JSON.parse(JSON.stringify(JSON.parse(datos)[0]))
        console.log(datos)
        var chart = c3.generate({
            bindto: '#grafica3',
            data: {
                columns: datos,
                type: 'pie',
                labels: true,       
                names:{ 
                    1:'Nunca', 
                    2:'Casi nunca', 
                    3:'A veces', 
                    4:'Casi siempre', 
                    5:'Siempre', 
                    6:'No respondio'
                }
            },
                legend: {
                    show: true
                },
                tooltip: {
                    format: {
                        title: function (d) { return 'Uso de preservativo o metodo de barrerra estudiantes universitarios Cali, 2014.'},
                        value: function (value, ratio, id) {return 'votaron: '+value+' personas';}
                    }
                }
        });
        /*$("#grafica3").before("<div class='panel panel-default'><div class='panel-heading'><h4 class='panel-title'>Percepción de riesgo académico en estudiantes universitarios Cali, 2014</h4></div></div>");*/
}



function graficoPastelPregunta17()
{
        $("#grafica5").empty();
       /* //var consulta = "SELECT pregunta17a, count(pregunta17a) as cantidad FROM hecho_respuestas_encuesta1 WHERE (pregunta17a ILIKE '%Padre%') GROUP BY(pregunta17a) UNION SELECT pregunta17b, count(pregunta17b) FROM hecho_respuestas_encuesta1 WHERE (pregunta17b ILIKE '%Madre%') GROUP BY(pregunta17b) UNION SELECT pregunta17c, count(pregunta17c) FROM hecho_respuestas_encuesta1 WHERE (pregunta17c ILIKE '%Ambos padres%') GROUP BY(pregunta17c) UNION SELECT pregunta17d, count(pregunta17d) FROM hecho_respuestas_encuesta1 WHERE (pregunta17d ILIKE '%Padres y propios%') GROUP BY(pregunta17d) UNION SELECT pregunta17e, count(pregunta17e) FROM hecho_respuestas_encuesta1 WHERE (pregunta17e ILIKE '%Solo propios%') GROUP BY(pregunta17e) UNION SELECT pregunta17f, count(pregunta17f) FROM hecho_respuestas_encuesta1 WHERE (pregunta17f ILIKE '%Prestamo%') GROUP BY(pregunta17f) UNION SELECT pregunta17g, count(pregunta17g) FROM hecho_respuestas_encuesta1 WHERE (pregunta17g ILIKE '%Otro acudiente%') GROUP BY(pregunta17g) UNION SELECT pregunta17h, count(pregunta17h) FROM hecho_respuestas_encuesta1 WHERE (pregunta17h ILIKE '%No respondio%') GROUP BY(pregunta17h) ORDER BY(pregunta17a);";
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
        datos = JSON.parse(datos);*/
        //legendLabels = ['Padre', 'Madre', 'Ambos Padres', 'Padre(s) y Propios', 'Solo propios', 'Prestamo', 'Otro acudiente', 'No respondiò'];
        // legendLabels = ['Si', 'No', 'No respondio'];
        // var plot2 = jQuery.jqplot('grafica5', [[["Si", 873], ["No", 1057]]],{
        //  //title: "Procedencia de ingresos económicos para  sostenimiento de estudiantes universitarios Cali, 2014",
        //  title: "Predicion del uso de preservativo en la primera relacion sexual estudiantes universitarios Cali, 2014. K-means",
        //     seriesDefaults: 
        //     {                        
        //         renderer: jQuery.jqplot.PieRenderer,
        //         rendererOptions: 
        //         {   
        //             showDataLabels: true
        //         }
        //     },                    
        //     legend: { show:true, location: 'e' , labels: legendLabels}
        // });
        datos = JSON.parse(JSON.stringify([["Si", 873], ["No", 1057]]))
        console.log(datos)
        var chart = c3.generate({
            bindto: '#grafica5',
            data: {
                columns: datos,
                type: 'pie',
                labels: true,       
                names:{ 
                    1:'Si', 
                    2:'No', 
                    3:'No respondio', 
                }
            },
                legend: {
                    show: true
                },
                tooltip: {
                    format: {
                        title: function (d) { return 'Procedencia de ingresos económicos para  sostenimiento de estudiantes universitarios Cali, 2014'},
                        value: function (value, ratio, id) {return 'votaron: '+value+' personas';}
                    }
                }
        });
        /*$("#grafica5").before("<div class='panel panel-default'><div class='panel-heading'><h4 class='panel-title'>Procedencia de ingresos económicos para  sostenimiento de estudiantes universitarios Cali, 2014</h4></div></div>");*/
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
        // console.log("lo que llega "+datos);
        // datos = JSON.parse(datos);
        // legendLabels = ['Profesional y otros', 'Amigos', 'Familiar', 'No acudí a nadie', 'No aplica', 'No respondiò'];
        // var plot3 = $.jqplot('grafica4', datos, 
        //          {
        //      title: "Dialogo previo sobre sexualidad antes del inicio de relaciones  sexuales Estudiantes universitarios Cali, 2014",
        //              seriesDefaults: 
        //              {                         
        //                 renderer:$.jqplot.DonutRenderer,                        
        //                 rendererOptions:
        //                 {        
        //                     sliceMargin: 3,                    
        //                     startAngle: -90,
        //                     showDataLabels: true,        
        //                     dataLabels: 'value'
        //                 }
        //             },
        //             legend: { show:true, location: 'e', labels: legendLabels }
        //         });
        datos = JSON.parse(JSON.stringify(JSON.parse(datos)[0]))
        console.log(datos)
        var chart = c3.generate({
            bindto: '#grafica4',
            data: {
                columns: datos,
                type: 'pie',
                labels: true,
                        names:{ 
                    1:'Profesional y otros', 
                    2:'Amigos', 
                    3:'Familiar', 
                    4:'No acudí a nadie', 
                    5:'No aplica',  
                    6:'No respondiò'
                }
            },
                legend: {
                    show: true
                },
                tooltip: {
                    format: {
                        title: function (d) { return 'Dialogo previo sobre sexualidad antes del inicio de relaciones  sexuales Estudiantes universitarios Cali, 2014'},
                        value: function (value, ratio, id) {return 'votaron: '+value+' personas';}
                    }
                }
        });
        /*$("#grafica4").before("<div class='panel panel-default'><div class='panel-heading'><h4 class='panel-title'>Dialogo previo sobre sexualidad antes del inicio de relaciones  sexuales Estudiantes universitarios Cali, 2014</h4></div></div>");*/
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
        $("#grafica4").empty();
        /*var consulta = "SELECT pregunta24, count(pregunta24) as cantidad FROM hecho_respuestas_encuesta1  WHERE (pregunta24 IS NOT NULL) GROUP BY (pregunta24) ORDER BY (pregunta24);";
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
        datos = JSON.parse(datos);*/
        // legendLabels = ['Si', 'No'];
        // var plot2 = jQuery.jqplot('grafica4', [[["Si", 426], ["No", 664]]],
        //         {
        //     title: "Predicion del uso de preservativo en la primera relacion sexual estudiantes universitarios Cali, 2014. J48",
        //             seriesDefaults: 
        //             {                        
        //                 renderer: jQuery.jqplot.PieRenderer,
        //                 rendererOptions: 
        //                 {   
        //                     showDataLabels: true
        //                 }
        //             },
        //             legend: { show:true, location: 'e', labels: legendLabels }
        //         });
        datos = JSON.parse(JSON.stringify([["Si", 426], ["No", 664]]))
        console.log(datos)
        var chart = c3.generate({
            bindto: '#grafica4',
            data: {
                columns: datos,
                type: 'pie',
                labels: true
            },
                legend: {
                    show: true
                },
                tooltip: {
                    format: {
                        title: function (d) { return 'Uso de preservativo o metodo de barrerra estudiantes universitarios Cali, 2014.'},
                        value: function (value, ratio, id) {return 'votaron: '+value+' personas';}
                    }
                }
        });
        /*$("#grafica4").before("<div class='panel panel-default'><div class='panel-heading'><h4 class='panel-title'>Predicion del uso de preservativo en la primera relacion sexual estudiantes universitarios Cali, 2014. J48</h4></div></div>");*/
}
/************************************************************************************************************************************************************************************************************/

function graficoPastelPregunta46()
{
        $("#grafica1").empty();
        var consulta = "SELECT pregunta46, count(pregunta46) as cantidad FROM hecho_respuestas_encuesta1  WHERE (pregunta46 IS NOT NULL) GROUP BY (pregunta46) ORDER BY (pregunta46)";
        console.log(consulta);                
        datos = $.ajax({
            url:"../../../../../indice_analiticas_avanzadas.php",
            type:'post',
            dataType:'json',
            async:false,
            data:"sql_analisis="+consulta+"&id_pre=46",
            success:function(){},                                                            
        }).responseText; 
        console.log("lo que llega "+datos);
        // datos = JSON.parse(datos);
        // legendLabels = ['Si', 'No', 'No respondio'];
        
        // var plot2 = jQuery.jqplot('grafica1', datos,
        //         {
            
        //     title: 'Uso de preservativo o metodo de barrerra estudiantes universitarios Cali, 2014',
        //             seriesDefaults: 
        //             {                        
        //                 renderer: jQuery.jqplot.PieRenderer,
        //                 rendererOptions: 
        //                 {   
        //                     showDataLabels: true
        //                 }
        //             },
        //             legend: { show:true, location: 'e', labels: legendLabels       }
        //         });
        datos = JSON.parse(JSON.stringify(JSON.parse(datos)[0]))
        console.log(datos)
        var chart = c3.generate({
            bindto: '#grafica1',
            data: {
                columns: datos,
                type: 'pie',
                labels: true
            },
                legend: {
                    show: true
                },
                tooltip: {
                    format: {
                        title: function (d) { return 'Uso de preservativo o metodo de barrerra estudiantes universitarios Cali, 2014.'},
                        value: function (value, ratio, id) {return 'votaron: '+value+' personas';}
                    }
                }
        });
        /*$("#grafica1").before("<div class='panel panel-default'><div class='panel-heading'><h4 class='panel-title'>Uso de preservativo o metodo de barrerra estudiantes universitarios Cali, 2014.</h4></div></div>");*/
}


function graficoPastelPregunta46_1()
{
        $("#grafica2").empty();
        var consulta = "SELECT pregunta46, count(pregunta46) as cantidad FROM hecho_respuestas_encuesta1  WHERE (pregunta46 IS NOT NULL) GROUP BY (pregunta46) ORDER BY (pregunta46)";
        console.log(consulta);                
        datos = $.ajax({
            url:"../../../../../indice_analiticas_avanzadas.php",
            type:'post',
            dataType:'json',
            async:false,
            data:"sql_analisis="+consulta+"&id_pre=46",
            success:function(){},                                                            
        }).responseText; 
        console.log("lo que llega "+datos);
        // datos = JSON.parse(datos);
        // legendLabels = ['Si', 'No', 'No respondio'];
        
        // var plot2 = jQuery.jqplot('grafica2', datos,
        //         {
            
        //     title: 'Uso de preservativo o metodo de barrerra estudiantes universitarios Cali, 2014',
        //             seriesDefaults: 
        //             {                        
        //                 renderer: jQuery.jqplot.PieRenderer,
        //                 rendererOptions: 
        //                 {   
        //                     showDataLabels: true
        //                 }
        //             },
        //             legend: { show:true, location: 'e', labels: legendLabels       
        //         }
        //         });
        datos = JSON.parse(JSON.stringify(JSON.parse(datos)[0]))
        console.log(datos)
        var chart = c3.generate({
            bindto: '#grafica2',
            data: {
                columns: datos,
                type: 'pie',
                labels: true
            },
                legend: {
                    show: true
                },
                tooltip: {
                    format: {
                        title: function (d) { return 'Uso de preservativo o metodo de barrerra estudiantes universitarios Cali, 2014.'},
                        value: function (value, ratio, id) {return 'votaron: '+value+' personas';}
                    }
                }
        });
       /* $("#grafica2").before("<div class='panel panel-default'><div class='panel-heading'><h4 class='panel-title'>Uso de preservativo o metodo de barrerra estudiantes universitarios Cali, 2014.</h4></div></div>");*/
}