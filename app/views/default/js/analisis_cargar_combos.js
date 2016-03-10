
var datos, medida, tipo_de_grafico='', id_encuesta ='', id_modulo='', id_pregunta='', id_consulta = '', id_universidad ='', id_facultad = '', facultad = '',id_programa = '', programa = '', finalizado = '';

$(document).ready(function()
{   
    $('.selectpicker').selectpicker();
    $('#code').hide();
    $('#date').hide();
    $('#fac').hide();
    $('#prog').hide();
    cargarCombo();
       
    $('#grafico_seleccionado').change(function (){
        tipo_de_grafico = $(this).val();
        $("#grafica").empty();
    });
    
    $('#encuesta_seleccionada').change(function (){       
        if( $(this).val() !== "0" ){            
            // $("#grafica").empty();
            id_encuesta=$(this).val();
            cargarComboModulos(id_encuesta);        
            $(".error6").fadeOut();            
        } 
        
    });
    $('#modulo_seleccionado').change(function (){
        $("#grafica").empty();
         cargarComboModuloPregunta($(this).val());
    }); 
    
    $('#pregunta_seleccionada').change(function (){     
        if( $(this).val() !== "0" ){            
            $("#grafica").empty();
            id_pregunta = $(this).val();            
            $(".error6").fadeOut();            
        }
        
    }); 
          
        
   $("#id_university").change(function(){           
        if( $(this).val() !== "0" ){                
            $("#grafica").empty();
            id_universidad =  $("#id_university").val();
            cargarComboFac(id_universidad);
            $('#fac').show();               
        }                        
    });
   $("#id_facultad").change(function(){
            if( $(this).val() !== "0" ){
                id_facultad =  $("#id_facultad").val();
                facultad =  $("#id_facultad option:selected").text();
                cargarComboPlan(id_facultad);            
                $('#prog').show();
            }           
        });
        
   $("#id_programa").change(function(){
            if( $(this).val() !== "0" ){
                $("#grafica").empty();
                id_programa =  $("#id_programa").val();
                programa =  $.trim($("#id_programa option:selected").text());
            }            
        });
        
    
    $("#clear").click(function(){   
        $("#grafica").empty();
        $('#grafico_seleccionado').selectpicker('refresh'); 
        $('#encuesta_seleccionada').selectpicker('refresh'); 
        $('#encuesta_seleccionada').selectpicker('refresh');          
        $('#modulo_seleccionado').selectpicker('refresh');          
        $('#id_university').selectpicker('refresh');
        $('#pregunta_seleccionada').selectpicker('refresh');                           
        $('#id_facultad').selectpicker('refresh');
        $('#id_programa').selectpicker('refresh');
    });    
        
    $("#grafico_seleccionado, #modulo_seleccionado").change(function(){
        if( $(this).val() !== "0" ){            
            $("#grafica").empty();
            $(".error6").fadeOut();
            return false;
        }        
    });
 
 /********************************************************************************************************************/     
    $("#consulta").click(function(){
        
        $('.error6').remove(); 
        if( $("#grafico_seleccionado").val() === "0" )
        {
            $("#grafico_seleccionado").focus().after("<span class='error6'>Seleccione el tipo de grafico</span>");
            return false;
        }        
        if( $("#encuesta_seleccionada").val() === "0" )
        {
            $("#encuesta_seleccionada").focus().after("<span class='error6'>Seleccione la encuesta</span>");
            return false;
        } 
        if( $("#modulo_seleccionado").val() === "0" )
        {
            $("#modulo_seleccionado").focus().after("<span class='error6'>Seleccione el modulo</span>");
            return false;
        } 
        
        if( $("#pregunta_seleccionada").val() === "0" )
        {
            $("#pregunta_seleccionada").focus().after("<span class='error6'>Seleccione la pregunta</span>");
            return false;
        }     
        
        console.log(facultad +", "+programa);
        $("#grafica").empty();
        var consulta = "SELECT pregunta"+id_pregunta+", count(pregunta"+id_pregunta+") as cantidad FROM encuesta"+id_encuesta+"  WHERE (pregunta"+id_pregunta+" IS NOT NULL) AND (pin ILIKE '%"+id_universidad+"%') AND (pregunta4 ILIKE '%"+omitirAcentos(facultad)+"%') AND (pregunta4 ILIKE '%"+omitirAcentos(programa)+"%') AND (pregunta1 IS NOT NULL) AND (pregunta2 IS NOT NULL) AND (pregunta3 IS NOT NULL) AND (pregunta4 IS NOT NULL) AND (pregunta5 IS NOT NULL) AND (pregunta6 IS NOT NULL) AND (pregunta7 IS NOT NULL) AND (pregunta8 IS NOT NULL) AND (pregunta9 IS NOT NULL) AND (pregunta10 IS NOT NULL) AND (pregunta11 IS NOT NULL) AND (pregunta12 IS NOT NULL) AND (pregunta13 IS NOT NULL) AND  (pregunta14 IS NOT NULL) AND  (pregunta15 IS NOT NULL) AND (pregunta16 IS NOT NULL) AND (pregunta17 IS NOT NULL) AND (pregunta18 IS NOT NULL) AND  (pregunta19 IS NOT NULL) AND  (pregunta20 IS NOT NULL) AND (pregunta21 IS NOT NULL) AND (pregunta22 IS NOT NULL) AND (pregunta23 IS NOT NULL) AND (pregunta24 IS NOT NULL) AND  (pregunta25 IS NOT NULL) AND (pregunta26 IS NOT NULL) AND (pregunta27 IS NOT NULL) AND (pregunta28 IS NOT NULL) AND  (pregunta29 IS NOT NULL) AND  (pregunta30 IS NOT NULL) AND  (pregunta31 IS NOT NULL) AND (pregunta32 IS NOT NULL) AND (pregunta33 IS NOT NULL) AND  (pregunta34 IS NOT NULL) AND  (pregunta35 IS NOT NULL) AND  (pregunta36 IS NOT NULL) AND (pregunta37 IS NOT NULL) AND (pregunta38 IS NOT NULL) AND  (pregunta39 IS NOT NULL) AND  (pregunta40 IS NOT NULL) AND  (pregunta41 IS NOT NULL) AND (pregunta42 IS NOT NULL) AND (pregunta43 IS NOT NULL) AND (pregunta44 IS NOT NULL) AND (pregunta45 IS NOT NULL) AND (pregunta46 IS NOT NULL) AND (pregunta47 IS NOT NULL) AND (pregunta48 IS NOT NULL) AND (pregunta49 IS NOT NULL) AND (pregunta50 IS NOT NULL) AND (pregunta51 IS NOT NULL) AND (pregunta52 IS NOT NULL) AND (pregunta53 IS NOT NULL) AND (pregunta54 IS NOT NULL) AND (pregunta55 IS NOT NULL) AND (pregunta56 IS NOT NULL) AND (pregunta57 IS NOT NULL) AND (pregunta58 IS NOT NULL) AND (pregunta59 IS NOT NULL) AND (pregunta60 IS NOT NULL) AND (pregunta61 IS NOT NULL) AND (pregunta62 IS NOT NULL) AND (pregunta63 IS NOT NULL) AND (pregunta64 IS NOT NULL) AND (pregunta65 IS NOT NULL) AND (pregunta66 IS NOT NULL) AND (pregunta67 IS NOT NULL) AND (pregunta68 IS NOT NULL) AND (pregunta69 IS NOT NULL) AND (pregunta70 IS NOT NULL) AND (pregunta71 IS NOT NULL) AND (pregunta72 IS NOT NULL) AND (pregunta73 IS NOT NULL) AND (pregunta74 IS NOT NULL) AND (pregunta75 IS NOT NULL) AND (pregunta76 IS NOT NULL) AND (pregunta77 IS NOT NULL) AND (pregunta78 IS NOT NULL) AND (pregunta79 IS NOT NULL) AND (pregunta80 IS NOT NULL) AND (pregunta81 IS NOT NULL) AND (pregunta82 IS NOT NULL) AND (pregunta83 IS NOT NULL) AND (pregunta84 IS NOT NULL) AND (pregunta85 IS NOT NULL) AND (pregunta86 IS NOT NULL) AND (pregunta87 IS NOT NULL) AND (pregunta88 IS NOT NULL) AND (pregunta89 IS NOT NULL) AND (pregunta90 IS NOT NULL) AND (pregunta91 IS NOT NULL) AND (pregunta92 IS NOT NULL) AND (pregunta93 IS NOT NULL) AND (pregunta94 IS NOT NULL) AND (pregunta95 IS NOT NULL) AND (pregunta96 IS NOT NULL) AND (pregunta97 IS NOT NULL) AND (pregunta98 IS NOT NULL) AND (pregunta99 IS NOT NULL) AND (pregunta100 IS NOT NULL) AND (pregunta101 IS NOT NULL) AND (pregunta102 IS NOT NULL) AND (pregunta103 IS NOT NULL) AND (pregunta104 IS NOT NULL) AND (pregunta105 IS NOT NULL) AND (pregunta106 IS NOT NULL) AND (pregunta107 IS NOT NULL) AND (pregunta108 IS NOT NULL) AND (pregunta109 IS NOT NULL) AND (pregunta110 IS NOT NULL) AND (pregunta111 IS NOT NULL) AND (pregunta112 IS NOT NULL) AND (pregunta113 IS NOT NULL) AND (pregunta114 IS NOT NULL) AND (pregunta115 IS NOT NULL) AND (pregunta116 IS NOT NULL) AND (pregunta117 IS NOT NULL) AND (pregunta118 IS NOT NULL) AND (pregunta119 IS NOT NULL) GROUP BY (pregunta"+id_pregunta+") ORDER BY (pregunta"+id_pregunta+")";
        console.log(consulta);
        
        //enviarConsulta(consulta);
        datos = $.ajax({
            url:"../../../../../indice_analiticas.php",
            type:'post',
            dataType:'json',
            async:false,
            data:"sql_analisis="+consulta+"&id_pre="+id_pregunta,
            success:function(){},                                                            
        }).responseText; 
        console.log("lo que llega "+datos);
        
        // datos = JSON.parse(datos);    
        datos = JSON.parse(JSON.stringify(JSON.parse(datos)[0]))
        id_universidad = 0;
        facultad='';
        programa='';       
        switch(tipo_de_grafico){
            case '1':{
                var plot1 = c3.generate({
                    bindto: '#grafica',
                    data: {
                        columns:datos,
                        type : 'bar',
                        labels: true
                    },legend: {
                        position: 'bottom'
                    },zoom: {
                        enabled: false
                    },
                    axis: {
                        x: {
                            // label: 'Universidades',
                            show: true,
                            type : 'categorized',
                            tick: {
                                format: function (x) { return ''; }
                            },                              
                        },
                        y: {
                            // label: 'Cantidad de estudiantes',
                        }
                    },tooltip: {
                        format: {
                            // title: function (d) { return 'Participación estudiantil según universidad'},
                            value: function (value, ratio, id) {return 'votaron: '+value+' personas';}
                        }
                    }
                });
                break;
            }/*fin caso 1*/
            case '2':
            {
                var plot2 = c3.generate({
                    bindto: '#grafica',
                    data: {
                    columns: datos,
                    type: 'pie',
                    labels: true,
                    },
                    legend: {
                        show: true
                    },
                    tooltip: {
                        format: {
                            // title: function (d) { return 'Clasificación socioeconómica según estrato estudiantes universitarios Cali, 2014.'},
                            value: function (value, ratio, id) {return 'votaron: '+value+' personas';}
                        }
                    }
                });
                break;
            }/*fin caso 2*/
            case '3':
            {
                 var plot3 = c3.generate({
                    bindto: '#grafica',
                    data: {
                    columns: datos,
                    type: 'donut',
                    labels: true
                    },
                    legend: {
                        show: true
                    },
                    tooltip: {
                    format: {
                        value: function (value, ratio, id) {return 'votaron: '+value+' personas';}
                    }
                }
                });
                break;
            }/*fin caso 3*/
            case '4':
            {
                $("#grafica").height($("#grafica").width())
                $("#grafica").empty();
                $("#zoomin").show();
                $("#zoomout").show();
                var cadena=[];
                for (var i = 0;i < datos.length;i++) {
                    cadena.push({"name" : datos[i][0], "value" : datos[i][1] ,"parent" : "Pregunta","cant" : 0});
                };                
                // console.log(JSON.stringify(cadena));
                var string = '{ "name" : "'+"Pregunta"+'", "parent" : "null","value" : "Pregunta seleccionada","cant":0,"children" :';
                    string += JSON.stringify(cadena);
                    string += '}';
                // console.clear()
                // console.log(string)
                var tree = new Tree(string)
                    .setCutOffDepth(1)
                    .setLabelPosition("top")
                    .setHeight($("#grafica").height())
                    .setOuterRadius(15)
                    .setInnerRadius(5)
                    .setFontSizeCoef(0.9)
                    .setAnimationDuration(1000)
                    .setSelector("#grafica")
                    .render("#grafica");

                break;
            }/*fin caso 4*/
            case '5':
            {
                $("#grafica").empty();
                $("#zoomin").hide();
                $("#zoomout").hide();
                  var json = '{"question": {';
                    for (var i = 0;i < datos.length-1 ;i++) {
                        json+='"'+datos[i][0]+'":'+datos[i][1]+', ';
                    };
                    json+='"'+datos[datos.length-1][0]+'":'+datos[datos.length-1][1]+'}}';

                    console.log(json);

                    new Bubble(JSON.parse(json),"#grafica");
                break;
            } /*fin caso 5*/
        };            
    
        
        });/*cierra el clic*/
    
});
/********************************************************************************************************************************************/ 

function omitirAcentos(text) {

    var acentos = "ÃÀÁÄÂÈÉËÊÌÍÏÎÒÓÖÔÙÚÜÛãàáäâèéëêìíïîòóöôùúüûÑñÇç/";
    var original = "AAAAAEEEEIIIIOOOOUUUUaaaaaeeeeiiiioooouuuunncc";
    for (var i = 0; i < acentos.length; i++) {

        text = text.replace(acentos.charAt(i), original.charAt(i));
    }

    return text;
}

function enviarConsulta(consulta)
{
    $.ajax({
        url:"../../../../../indice_analiticas.php",
        type: "POST",
        data:"sql_analisis="+consulta,
        success: function(opciones)
        {               
            $("#answer").html(opciones);                        
        }
    });  
}


function cargarComboModuloPregunta(id_modulo)
{
    $.ajax({
            url:"../../../../../indice_encuestas.php",
            type: "POST",
            async: false,
            data:"id_modulo_pregunta2="+id_modulo+"&id_tipo_pregunta2="+$('#id_tipo_pregunta_grafico').val(),
            beforeSend: function(xhr) {
                $("#pregunta_seleccionada").html("<option value ='00'>Espere por favor</value>");            
            },
            success: function(opciones){  
                // console.log(opciones);
                $("#pregunta_seleccionada").html(opciones);            
                $('#pregunta_seleccionada').selectpicker('refresh');
            }
      });       
    }
    
    
function cargarComboModulos(id_encuesta){
    $.ajax({
            url:"../../../../../indice_encuestas.php",
            type: "POST",
            data:"id_modulo_encuesta="+id_encuesta,
            async:false,
            beforeSend: function(xhr) {
                $("#modulo_seleccionado").html("<option value ='0'>Espere por favor</value>");            
            },
            success: function(opciones){   
                $("#modulo_seleccionado").html(opciones);            
                $('#modulo_seleccionado').selectpicker('refresh');
            }
        });
    }
    
    
 function cargarComboFac(id_u)
{       
            $.ajax({
                    url:"../../../../../indice_encuestado.php",
                    type: "POST",
                    //data:"id_universidad="+$("#id_university").val(),
                    data:"id_universidad="+id_u,
                    success: function(opciones)
                    {               
                        $("#id_facultad").html(opciones);            
                        $('#id_facultad').selectpicker('refresh');
                    }
                });  
    
}
function cargarComboPlan(id_fac)
{    
            $.ajax({
            url:"../../../../../indice_encuestas.php",
            type: "POST",
            data:"id_facultad="+id_fac,
            success: function(opciones)
            {               
                $("#id_programa").html(opciones);            
                $('#id_programa').selectpicker('refresh');
            }
        });  
    
}

function cargarCombo()
{
    $.ajax({
        url:"../../../../../indice_encuestas.php",
        type: "POST",
        data:"valor2="+1,
        success: function(opciones)
        {               
            $("#encuesta_seleccionada").html(opciones);            
            $('#encuesta_seleccionada').selectpicker('refresh');
        }
    });  
}
