//SCRIPT QUE PERMITE CONSTRUIR LAS OPCIONES PARA CADA PREGUNTA

var id_consulta = '', id_universidad ='', id_facultad = '', facultad = '',id_programa = '', finalizado = '', codigo_a_buscar = '', genero ='', texto_genero='';

$(document).ready(function()
{    
    
    activar();    
    $('.selectpicker').selectpicker();
    $('#university').hide(); 
    $('#code').hide();
    $('#date').hide();
    $('#fac').hide();
    $('#prog').hide();
    $('#radios').hide();
    $('#gen').hide();
    $('#tipo_fin').hide();
    
    id_consulta = parseInt( $("#id_consulta").val() );
    id_universidad =  $("#id_university").val();
    id_facultad =  $("#id_facultad").val();
    id_programa =  $("#id_programa").val();
    
    $('input:radio[name=final]').change(function ()
    {
        //console.log($('input:radio[name=final]:checked').val());
        finalizado = $('input:radio[name=final]:checked').val();
    });
    
    $('input:radio[name=genero]').change(function ()
    {
        //console.log($('input:radio[name=final]:checked').val());
        genero = $('input:radio[name=genero]:checked').val();        
    });
     
            
    /*copiar todo esto*/
    $("#id_consulta").change(function()
   {
            switch ($("#id_consulta").val())
            {
				case '1':
				{
					$('#date').show();
					$('#university').show();
			                $('#fac').hide();
			                $('#pro').hide();
                                        $('#gen').hide();
                                        $('#tipo_fin').hide();
					break;
				}
				case '2':
				{
					$('#date').show();
					$('#university').show();
			                $('#fac').hide();
			                $('#pro').hide();
                                        $('#gen').hide();
                                        $('#tipo_fin').hide();
					break;
				}
				case '3':
				{
					$('#date').show();
					$('#university').show();
			                $('#fac').hide();
			                $('#pro').hide();
                                        $('#gen').hide();
                                        $('#tipo_fin').hide();
					break;
				}
				case '4':
				{
					$('#date').show();
					$('#radios').hide();
			                $('#fac').hide();
			                $('#pro').hide();
                                        $('#gen').hide();
                                        $('#tipo_fin').hide();
					break;
				}
				case '5':
				{
					$('#date').show();
					$('#radios').hide();
			                $('#fac').hide();
			                $('#pro').hide();
                                        $('#gen').hide();
                                        $('#tipo_fin').hide();
					break;
				}
		                case '6':
		                {
					$('#date').hide();
					console.log('caso 6');					
					$('#radios').show();
		                        $('#university').hide();
			                $('#fac').hide();
                                        $('#gen').hide();
                                        $('#tipo_fin').show();
                    			break;    
		                }
		                case '7':
		                {
					$('#date').hide();
					$('#radios').show();
		                    	$('#university').show();
			                $('#fac').hide();
                                        $('#gen').hide();
                                        $('#tipo_fin').show();
                    			break;    
		                }
		                case '8':
		                {
					$('#date').hide();
					$('#radios').show();
		                        $('#university').show();
			                $('#fac').show();
                                        $('#gen').hide();
                                        $('#tipo_fin').show();
		                    break;    
		                }
		                case '9':
		                {
					$('#date').hide();
					$('#radios').hide();
					$('#date').hide();
			                $('#code').show();
					$('#university').hide();
			                $('#fac').hide();
			                $('#pro').hide();
                                        $('#gen').hide();
                                        $('#tipo_fin').hide();
			                break;    
		                }
                                case '10':
		                {
                                        //console.log('caso 10');					
                                        $('#radios').show();
                                        $('#gen').show();
					$('#date').hide();
                                        $('#code').hide();
		                        $('#university').show();
			                $('#fac').hide();
                                        $("#activo").text("nuevo");                                        
                                        $('#tipo_fin').hide();
                    			break;  
		                }
                                 case '11':
		                {					
                                        $('#gen').show();
					$('#radios').show();
		                    	$('#university').show();
			                $('#fac').hide();
                                        $('#date').hide();       
                                        $('#tipo_fin').hide();
                                        $('#code').hide();
                    			break;  			                
		                }
                                 case '12':
		                {
                                    $('#radios').show();
		                    $('#university').show();
			            $('#fac').show();
                                    $('#gen').show();
                                    $('#date').hide();					
                                    $('#tipo_fin').hide();
                                    $('#code').hide();
		                    break;    
		                }
		                default :
		                {
		                    $('#university').hide(); 
		                    $('#fac').hide(); 
		                    $('#prog').hide();
		                    $('#code').hide();                    
		                    $('#date').hide();   
                                    $('#gen').hide();
					break;               
		                }
            }            
            
            id_consulta = parseInt( $("#id_consulta").val() );
        });
        
        
   $("#id_university").change(function()
        {
            id_universidad =  $("#id_university").val();
            cargarComboFac(id_universidad);
                        
        });
   $("#id_facultad").change(function()
        {
            id_facultad =  $("#id_facultad").val();
            cargarComboPlan(id_facultad);
            facultad =  omitirAcentos($("#id_facultad option:selected").text());
                        
        });
   $("#id_programa").change(function()
        {
            id_programa =  $("#id_programa").val();
        });
        
    
    $("#clear").click(function()
    {        
         $('#id_consulta').selectpicker('refresh');
         $('#id_university').selectpicker('refresh');
         //$("#id_consulta option[value='0']").attr("selected", "selected");
    });
    
    $("#consulta").click(function()
    {   
        
        var fecha_inicio = $("#rango1").val();
        var fecha_fin = $("#rango2").val();
        
        var consul = "";        
        
        console.log(id_consulta +", "+id_universidad+","+id_facultad+" ,"+facultad+","+id_programa+", "+finalizado);
        
//        if ((id !== 0) && (id_universidad !== "0"))
//        {
            switch (id_consulta)
            {
                case 1:/*lista las constraseñas que no tiene acepto*/
                { 
                    $('#codigo').hide();
                    if ((id_universidad !== "0") && (fecha_inicio !== "") && (fecha_fin !== ""))
                    {
                        consul = "SELECT pin, pin as u, fecha_de_creacion_pin FROM encuesta1 WHERE (consentimiento is null) AND (pin LIKE '%"+id_universidad+"%') AND (fecha_de_creacion_pin BETWEEN '"+fecha_inicio+"' AND '"+fecha_fin+"') ORDER BY(pin); ";
                        console.log(consul);
                    }
                    else if ((id_universidad !== "0"))
                    {
                        consul = "SELECT pin, pin as u, fecha_de_creacion_pin FROM encuesta1 WHERE (consentimiento is null) AND (pin LIKE '%"+id_universidad+"%') ORDER BY(pin); ";
                        console.log(consul);
                    }
                    else
                    {
                        consul = "SELECT pin, pin as u, fecha_de_creacion_pin FROM encuesta1 WHERE (consentimiento is null) ORDER BY(pin);";
                        console.log(consul);
                    }                    
                    enviarConsulta(consul, id_consulta);
                    break;
                }
                case 2:/*lista de contrasemas utilizadas tienen acepto pero no fecha de fin*/
                {          
                    $('#codigo').hide();
                   if ((id_universidad !== "0") && (fecha_inicio !== "") && (fecha_fin !== ""))
                   {
                      consul = "SELECT pin, pin as u, fecha_de_creacion_pin, fecha_de_fin_de_diligenciada_la_encuesta FROM encuesta1 WHERE (consentimiento = 'Acepto') AND (pin LIKE '%"+id_universidad+"%') AND (fecha_de_inicio_de_diligenciada_la_encuesta BETWEEN '"+fecha_inicio+"' AND '"+fecha_fin+"') ORDER BY(pin);";
                      console.log(consul);
                   }
                   else if (id_universidad !== "0") 
                   {
                      consul = "SELECT pin, pin as u, fecha_de_creacion_pin, fecha_de_fin_de_diligenciada_la_encuesta FROM encuesta1 WHERE (consentimiento = 'Acepto') AND (pin LIKE '%"+id_universidad+"%') ORDER BY(pin);";
                      console.log(consul);
                   }
                   else
                   {
                       consul = "SELECT pin, pin as u, fecha_de_creacion_pin, fecha_de_fin_de_diligenciada_la_encuesta FROM encuesta1 WHERE (consentimiento = 'Acepto')  ORDER BY(pin);";
                       console.log(consul);
                   }                    
                    enviarConsulta(consul, id_consulta);
                    break;
                }
                case 3:/*lista de contraenas utilizados tienen acepto con fecha de fin**/
                {
                    $('#codigo').hide();
                    if ((id_universidad !== "0") && (fecha_inicio !== "") && (fecha_fin !== ""))
                    {
                        consul = "SELECT pin, pin as u, fecha_de_creacion_pin, fecha_de_fin_de_diligenciada_la_encuesta FROM encuesta1 WHERE (consentimiento = 'Acepto') AND (pin LIKE '%"+id_universidad+"%') AND (fecha_de_inicio_de_diligenciada_la_encuesta BETWEEN '"+fecha_inicio+"' AND '"+fecha_fin+"') AND (fecha_de_fin_de_diligenciada_la_encuesta IS NOT NULL) ORDER BY(pin);";
                        console.log(consul);
                    }
                    else if(id_universidad !== "0")
                    {
                        consul = "SELECT pin, pin as u, fecha_de_creacion_pin, fecha_de_fin_de_diligenciada_la_encuesta FROM encuesta1 WHERE (consentimiento = 'Acepto') AND (pin LIKE '%"+id_universidad+"%') AND (fecha_de_fin_de_diligenciada_la_encuesta IS NOT NULL) ORDER BY(pin);";
                        console.log(consul, id);
                    }                                        
                    else
                    {
                        consul = "SELECT pin, pin as u, fecha_de_creacion_pin, fecha_de_fin_de_diligenciada_la_encuesta FROM encuesta1 WHERE (consentimiento = 'Acepto') AND (fecha_de_fin_de_diligenciada_la_encuesta IS NOT NULL) ORDER BY(pin);";
                        console.log(consul);
                    }
                    enviarConsulta(consul, id_consulta);
                    break;
                }
                case 4:/*lista de contraenas utilizadas tienen acepto sin fecha de fin**/
                {
                    $('#codigo').hide();
                    if ((id_universidad !== "0") && (fecha_inicio !== "") && (fecha_fin !== ""))
                    {
                        consul = "SELECT pin, pin as u, fecha_de_creacion_pin, fecha_de_fin_de_diligenciada_la_encuesta FROM encuesta1 WHERE (consentimiento = 'Acepto') AND (pin LIKE '%"+id_universidad+"%') AND (fecha_de_inicio_de_diligenciada_la_encuesta BETWEEN '"+fecha_inicio+"' AND '"+fecha_fin+"') AND (fecha_de_fin_de_diligenciada_la_encuesta IS NULL) ORDER BY(pin);";
                        console.log(consul);
                    }
                    else if(id_universidad !== "0")
                    {
                        consul = "SELECT pin, pin as u, fecha_de_creacion_pin, fecha_de_fin_de_diligenciada_la_encuesta FROM encuesta1 WHERE (consentimiento = 'Acepto') AND (pin LIKE '%"+id_universidad+"%') AND (fecha_de_fin_de_diligenciada_la_encuesta IS NULL) ORDER BY(pin);";
                        console.log(consul);
                    }                                        
                    else
                    {
                        consul = "SELECT pin, pin as u, fecha_de_creacion_pin, fecha_de_fin_de_diligenciada_la_encuesta FROM encuesta1 WHERE (consentimiento = 'Acepto') AND (fecha_de_fin_de_diligenciada_la_encuesta IS NULL) ORDER BY(pin);";
                        console.log(consul);
                    }
                    enviarConsulta(consul, id_consulta);
                    break;
                }
                case 5:/*lista de contraenas utilizadas tienen acepto con fecha de fin**/
                {
                    $('#codigo').hide();
                    if ((id_universidad !== "0") && (fecha_inicio !== "") && (fecha_fin !== ""))
                    {
                        consul = "SELECT pin, pin as u, fecha_de_creacion_pin, fecha_de_fin_de_diligenciada_la_encuesta FROM encuesta1 WHERE (pin LIKE '%"+id_universidad+"%') AND (fecha_de_creacion_pin BETWEEN '"+fecha_inicio+"' AND '"+fecha_fin+"') ORDER BY(pin);";
                        console.log(consul);
                    }
                    else if(id_universidad !== "0")
                    {
                        consul = "SELECT pin, pin as u, fecha_de_creacion_pin, fecha_de_fin_de_diligenciada_la_encuesta FROM encuesta1 WHERE (pin LIKE '%"+id_universidad+"%') ORDER BY(pin);";
                        console.log(consul);
                    }                                        
                    else
                    {
                        consul = "SELECT pin, pin as u, fecha_de_creacion_pin, fecha_de_fin_de_diligenciada_la_encuesta FROM encuesta1 ORDER BY(pin);";
                        console.log(consul);
                    }
                    enviarConsulta(consul, id_consulta);
                    break;
                }
                case 6:/*Total codigos por universidad*/
                {
                    console.log("entro al caso 6");                    
                    if (finalizado === '1')/*tienen acepto*/
                    {
                        console.log("entra al si");
                        consul = "SELECT pin as u, consentimiento, fecha_de_fin_de_diligenciada_la_encuesta FROM encuesta1 WHERE (consentimiento = 'Acepto') AND (fecha_de_fin_de_diligenciada_la_encuesta IS NOT NULL) AND (pregunta1 IS NOT NULL) AND (pregunta2 IS NOT NULL) AND (pregunta3 IS NOT NULL) AND (pregunta4 IS NOT NULL) AND (pregunta5 IS NOT NULL) AND (pregunta6 IS NOT NULL) AND (pregunta7 IS NOT NULL) AND (pregunta8 IS NOT NULL) AND (pregunta9 IS NOT NULL) AND (pregunta10 IS NOT NULL) AND (pregunta11 IS NOT NULL) AND (pregunta12 IS NOT NULL) AND (pregunta13 IS NOT NULL) AND  (pregunta14 IS NOT NULL) AND  (pregunta15 IS NOT NULL) AND (pregunta16 IS NOT NULL) AND (pregunta17 IS NOT NULL) AND (pregunta18 IS NOT NULL) AND  (pregunta19 IS NOT NULL) AND  (pregunta20 IS NOT NULL) AND (pregunta21 IS NOT NULL) AND (pregunta22 IS NOT NULL) AND (pregunta23 IS NOT NULL) AND (pregunta24 IS NOT NULL) AND  (pregunta25 IS NOT NULL) AND (pregunta26 IS NOT NULL) AND (pregunta27 IS NOT NULL) AND (pregunta28 IS NOT NULL) AND  (pregunta29 IS NOT NULL) AND  (pregunta30 IS NOT NULL) AND  (pregunta31 IS NOT NULL) AND (pregunta32 IS NOT NULL) AND (pregunta33 IS NOT NULL) AND  (pregunta34 IS NOT NULL) AND  (pregunta35 IS NOT NULL) AND  (pregunta36 IS NOT NULL) AND (pregunta37 IS NOT NULL) AND (pregunta38 IS NOT NULL) AND  (pregunta39 IS NOT NULL) AND  (pregunta40 IS NOT NULL) AND  (pregunta41 IS NOT NULL) AND (pregunta42 IS NOT NULL) AND (pregunta43 IS NOT NULL) AND (pregunta44 IS NOT NULL) AND (pregunta45 IS NOT NULL) AND (pregunta46 IS NOT NULL) AND (pregunta47 IS NOT NULL) AND (pregunta48 IS NOT NULL) AND (pregunta49 IS NOT NULL) AND (pregunta50 IS NOT NULL) AND (pregunta51 IS NOT NULL) AND (pregunta52 IS NOT NULL) AND (pregunta53 IS NOT NULL) AND (pregunta54 IS NOT NULL) AND (pregunta55 IS NOT NULL) AND (pregunta56 IS NOT NULL) AND (pregunta57 IS NOT NULL) AND (pregunta58 IS NOT NULL) AND (pregunta59 IS NOT NULL) AND (pregunta60 IS NOT NULL) AND (pregunta61 IS NOT NULL) AND (pregunta62 IS NOT NULL) AND (pregunta63 IS NOT NULL) AND (pregunta64 IS NOT NULL) AND (pregunta65 IS NOT NULL) AND (pregunta66 IS NOT NULL) AND (pregunta67 IS NOT NULL) AND (pregunta68 IS NOT NULL) AND (pregunta69 IS NOT NULL) AND (pregunta70 IS NOT NULL) AND (pregunta71 IS NOT NULL) AND (pregunta72 IS NOT NULL) AND (pregunta73 IS NOT NULL) AND (pregunta74 IS NOT NULL) AND (pregunta75 IS NOT NULL) AND (pregunta76 IS NOT NULL) AND (pregunta77 IS NOT NULL) AND (pregunta78 IS NOT NULL) AND (pregunta79 IS NOT NULL) AND (pregunta80 IS NOT NULL) AND (pregunta81 IS NOT NULL) AND (pregunta82 IS NOT NULL) AND (pregunta83 IS NOT NULL) AND (pregunta84 IS NOT NULL) AND (pregunta85 IS NOT NULL) AND (pregunta86 IS NOT NULL) AND (pregunta87 IS NOT NULL) AND (pregunta88 IS NOT NULL) AND (pregunta89 IS NOT NULL) AND (pregunta90 IS NOT NULL) AND (pregunta91 IS NOT NULL) AND (pregunta92 IS NOT NULL) AND (pregunta93 IS NOT NULL) AND (pregunta94 IS NOT NULL) AND (pregunta95 IS NOT NULL) AND (pregunta96 IS NOT NULL) AND (pregunta97 IS NOT NULL) AND (pregunta98 IS NOT NULL) AND (pregunta99 IS NOT NULL) AND (pregunta100 IS NOT NULL) AND (pregunta101 IS NOT NULL) AND (pregunta102 IS NOT NULL) AND (pregunta103 IS NOT NULL) AND (pregunta104 IS NOT NULL) AND (pregunta105 IS NOT NULL) AND (pregunta106 IS NOT NULL) AND (pregunta107 IS NOT NULL) AND (pregunta108 IS NOT NULL) AND (pregunta109 IS NOT NULL) AND (pregunta110 IS NOT NULL) AND (pregunta111 IS NOT NULL) AND (pregunta112 IS NOT NULL) AND (pregunta113 IS NOT NULL) AND (pregunta114 IS NOT NULL) AND (pregunta115 IS NOT NULL) AND (pregunta116 IS NOT NULL) AND (pregunta117 IS NOT NULL) AND (pregunta118 IS NOT NULL) AND (pregunta119 IS NOT NULL) ORDER BY(pin);";
                        console.log(consul);
                    }
                    else if(finalizado ==='0')/*tienen acepto pero no termino*/
                    {
                        console.log("entra al sino si");
                        consul = "SELECT pin as u, consentimiento, fecha_de_fin_de_diligenciada_la_encuesta FROM encuesta1 WHERE (consentimiento = 'Acepto') AND (fecha_de_fin_de_diligenciada_la_encuesta IS NULL) ORDER BY(pin);";
                        console.log(consul);
                    }
                    else if(finalizado ==='2')/*no tienen acepto*/
                    {
                        console.log("entra al sino si");
                        consul = "SELECT pin as u, consentimiento, fecha_de_fin_de_diligenciada_la_encuesta FROM encuesta1 WHERE (consentimiento IS NULL) AND (fecha_de_fin_de_diligenciada_la_encuesta IS NULL) AND (pregunta1 IS NULL) AND (pregunta2 IS NULL) AND (pregunta3 IS NULL) AND (pregunta4 IS NULL) AND (pregunta5 IS NULL) AND (pregunta6 IS NULL) AND (pregunta7 IS NULL) AND (pregunta8 IS NULL) AND (pregunta9 IS NULL) AND (pregunta10 IS NULL) AND (pregunta11 IS NULL) AND (pregunta12 IS NULL) AND (pregunta13 IS NULL) AND  (pregunta14 IS NULL) AND  (pregunta15 IS NULL) AND (pregunta16 IS NULL) AND (pregunta17 IS NULL) AND (pregunta18 IS NULL) AND  (pregunta19 IS NULL) AND  (pregunta20 IS NULL) AND (pregunta21 IS NULL) AND (pregunta22 IS NULL) AND (pregunta23 IS NULL) AND (pregunta24 IS NULL) AND  (pregunta25 IS NULL) AND (pregunta26 IS NULL) AND (pregunta27 IS NULL) AND (pregunta28 IS NULL) AND  (pregunta29 IS NULL) AND  (pregunta30 IS NULL) AND  (pregunta31 IS NULL) AND (pregunta32 IS NULL) AND (pregunta33 IS NULL) AND  (pregunta34 IS NULL) AND  (pregunta35 IS NULL) AND  (pregunta36 IS NULL) AND (pregunta37 IS NULL) AND (pregunta38 IS NULL) AND  (pregunta39 IS NULL) AND  (pregunta40 IS NULL) AND  (pregunta41 IS NULL) AND (pregunta42 IS NULL) AND (pregunta43 IS NULL) AND (pregunta44 IS NULL) AND (pregunta45 IS NULL) AND (pregunta46 IS NULL) AND (pregunta47 IS NULL) AND (pregunta48 IS NULL) AND (pregunta49 IS NULL) AND (pregunta50 IS NULL) AND (pregunta51 IS NULL) AND (pregunta52 IS NULL) AND (pregunta53 IS NULL) AND (pregunta54 IS NULL) AND (pregunta55 IS NULL) AND (pregunta56 IS NULL) AND (pregunta57 IS NULL) AND (pregunta58 IS NULL) AND (pregunta59 IS NULL) AND (pregunta60 IS NULL) AND (pregunta61 IS NULL) AND (pregunta62 IS NULL) AND (pregunta63 IS NULL) AND (pregunta64 IS NULL) AND (pregunta65 IS NULL) AND (pregunta66 IS NULL) AND (pregunta67 IS NULL) AND (pregunta68 IS NULL) AND (pregunta69 IS NULL) AND (pregunta70 IS NULL) AND (pregunta71 IS NULL) AND (pregunta72 IS NULL) AND (pregunta73 IS NULL) AND (pregunta74 IS NULL) AND (pregunta75 IS NULL) AND (pregunta76 IS NULL) AND (pregunta77 IS NULL) AND (pregunta78 IS NULL) AND (pregunta79 IS NULL) AND (pregunta80 IS NULL) AND (pregunta81 IS NULL) AND (pregunta82 IS NULL) AND (pregunta83 IS NULL) AND (pregunta84 IS NULL) AND (pregunta85 IS NULL) AND (pregunta86 IS NULL) AND (pregunta87 IS NULL) AND (pregunta88 IS NULL) AND (pregunta89 IS NULL) AND (pregunta90 IS NULL) AND (pregunta91 IS NULL) AND (pregunta92 IS NULL) AND (pregunta93 IS NULL) AND (pregunta94 IS NULL) AND (pregunta95 IS NULL) AND (pregunta96 IS NULL) AND (pregunta97 IS NULL) AND (pregunta98 IS NULL) AND (pregunta99 IS NULL) AND (pregunta100 IS NULL) AND (pregunta101 IS NULL) AND (pregunta102 IS NULL) AND (pregunta103 IS NULL) AND (pregunta104 IS NULL) AND (pregunta105 IS NULL) AND (pregunta106 IS NULL) AND (pregunta107 IS NULL) AND (pregunta108 IS NULL) AND (pregunta109 IS NULL) AND (pregunta110 IS NULL) AND (pregunta111 IS NULL) AND (pregunta112 IS NULL) AND (pregunta113 IS NULL) AND (pregunta114 IS NULL) AND (pregunta115 IS NULL) AND (pregunta116 IS NULL) AND (pregunta117 IS NULL) AND (pregunta118 IS NULL) AND (pregunta119 IS NULL) ORDER BY(pin);";
                        console.log(consul);
                    }
                    else if(finalizado ==='3')/*todas las anteriores unidas*/
                    {
                        console.log("entra al sino si");
                        consul = "SELECT pin as u, consentimiento, fecha_de_fin_de_diligenciada_la_encuesta FROM encuesta1 WHERE (consentimiento = 'Acepto') AND (fecha_de_fin_de_diligenciada_la_encuesta IS NOT NULL) AND (pregunta1 IS NOT NULL) AND (pregunta2 IS NOT NULL) AND (pregunta3 IS NOT NULL) AND (pregunta4 IS NOT NULL) AND (pregunta5 IS NOT NULL) AND (pregunta6 IS NOT NULL) AND (pregunta7 IS NOT NULL) AND (pregunta8 IS NOT NULL) AND (pregunta9 IS NOT NULL) AND (pregunta10 IS NOT NULL) AND (pregunta11 IS NOT NULL) AND (pregunta12 IS NOT NULL) AND (pregunta13 IS NOT NULL) AND  (pregunta14 IS NOT NULL) AND  (pregunta15 IS NOT NULL) AND (pregunta16 IS NOT NULL) AND (pregunta17 IS NOT NULL) AND (pregunta18 IS NOT NULL) AND  (pregunta19 IS NOT NULL) AND  (pregunta20 IS NOT NULL) AND (pregunta21 IS NOT NULL) AND (pregunta22 IS NOT NULL) AND (pregunta23 IS NOT NULL) AND (pregunta24 IS NOT NULL) AND  (pregunta25 IS NOT NULL) AND (pregunta26 IS NOT NULL) AND (pregunta27 IS NOT NULL) AND (pregunta28 IS NOT NULL) AND  (pregunta29 IS NOT NULL) AND  (pregunta30 IS NOT NULL) AND  (pregunta31 IS NOT NULL) AND (pregunta32 IS NOT NULL) AND (pregunta33 IS NOT NULL) AND  (pregunta34 IS NOT NULL) AND  (pregunta35 IS NOT NULL) AND  (pregunta36 IS NOT NULL) AND (pregunta37 IS NOT NULL) AND (pregunta38 IS NOT NULL) AND  (pregunta39 IS NOT NULL) AND  (pregunta40 IS NOT NULL) AND  (pregunta41 IS NOT NULL) AND (pregunta42 IS NOT NULL) AND (pregunta43 IS NOT NULL) AND (pregunta44 IS NOT NULL) AND (pregunta45 IS NOT NULL) AND (pregunta46 IS NOT NULL) AND (pregunta47 IS NOT NULL) AND (pregunta48 IS NOT NULL) AND (pregunta49 IS NOT NULL) AND (pregunta50 IS NOT NULL) AND (pregunta51 IS NOT NULL) AND (pregunta52 IS NOT NULL) AND (pregunta53 IS NOT NULL) AND (pregunta54 IS NOT NULL) AND (pregunta55 IS NOT NULL) AND (pregunta56 IS NOT NULL) AND (pregunta57 IS NOT NULL) AND (pregunta58 IS NOT NULL) AND (pregunta59 IS NOT NULL) AND (pregunta60 IS NOT NULL) AND (pregunta61 IS NOT NULL) AND (pregunta62 IS NOT NULL) AND (pregunta63 IS NOT NULL) AND (pregunta64 IS NOT NULL) AND (pregunta65 IS NOT NULL) AND (pregunta66 IS NOT NULL) AND (pregunta67 IS NOT NULL) AND (pregunta68 IS NOT NULL) AND (pregunta69 IS NOT NULL) AND (pregunta70 IS NOT NULL) AND (pregunta71 IS NOT NULL) AND (pregunta72 IS NOT NULL) AND (pregunta73 IS NOT NULL) AND (pregunta74 IS NOT NULL) AND (pregunta75 IS NOT NULL) AND (pregunta76 IS NOT NULL) AND (pregunta77 IS NOT NULL) AND (pregunta78 IS NOT NULL) AND (pregunta79 IS NOT NULL) AND (pregunta80 IS NOT NULL) AND (pregunta81 IS NOT NULL) AND (pregunta82 IS NOT NULL) AND (pregunta83 IS NOT NULL) AND (pregunta84 IS NOT NULL) AND (pregunta85 IS NOT NULL) AND (pregunta86 IS NOT NULL) AND (pregunta87 IS NOT NULL) AND (pregunta88 IS NOT NULL) AND (pregunta89 IS NOT NULL) AND (pregunta90 IS NOT NULL) AND (pregunta91 IS NOT NULL) AND (pregunta92 IS NOT NULL) AND (pregunta93 IS NOT NULL) AND (pregunta94 IS NOT NULL) AND (pregunta95 IS NOT NULL) AND (pregunta96 IS NOT NULL) AND (pregunta97 IS NOT NULL) AND (pregunta98 IS NOT NULL) AND (pregunta99 IS NOT NULL) AND (pregunta100 IS NOT NULL) AND (pregunta101 IS NOT NULL) AND (pregunta102 IS NOT NULL) AND (pregunta103 IS NOT NULL) AND (pregunta104 IS NOT NULL) AND (pregunta105 IS NOT NULL) AND (pregunta106 IS NOT NULL) AND (pregunta107 IS NOT NULL) AND (pregunta108 IS NOT NULL) AND (pregunta109 IS NOT NULL) AND (pregunta110 IS NOT NULL) AND (pregunta111 IS NOT NULL) AND (pregunta112 IS NOT NULL) AND (pregunta113 IS NOT NULL) AND (pregunta114 IS NOT NULL) AND (pregunta115 IS NOT NULL) AND (pregunta116 IS NOT NULL) AND (pregunta117 IS NOT NULL) AND (pregunta118 IS NOT NULL) AND (pregunta119 IS NOT NULL) UNION SELECT pin as u, consentimiento, fecha_de_fin_de_diligenciada_la_encuesta FROM encuesta1 WHERE (consentimiento = 'Acepto') AND (fecha_de_fin_de_diligenciada_la_encuesta IS NULL) UNION SELECT pin as u, consentimiento, fecha_de_fin_de_diligenciada_la_encuesta FROM encuesta1 WHERE (consentimiento IS NULL) AND (fecha_de_fin_de_diligenciada_la_encuesta IS NULL) AND (pregunta1 IS NULL) AND (pregunta2 IS NULL) AND (pregunta3 IS NULL) AND (pregunta4 IS NULL) AND (pregunta5 IS NULL) AND (pregunta6 IS NULL) AND (pregunta7 IS NULL) AND (pregunta8 IS NULL) AND (pregunta9 IS NULL) AND (pregunta10 IS NULL) AND (pregunta11 IS NULL) AND (pregunta12 IS NULL) AND (pregunta13 IS NULL) AND  (pregunta14 IS NULL) AND  (pregunta15 IS NULL) AND (pregunta16 IS NULL) AND (pregunta17 IS NULL) AND (pregunta18 IS NULL) AND  (pregunta19 IS NULL) AND  (pregunta20 IS NULL) AND (pregunta21 IS NULL) AND (pregunta22 IS NULL) AND (pregunta23 IS NULL) AND (pregunta24 IS NULL) AND  (pregunta25 IS NULL) AND (pregunta26 IS NULL) AND (pregunta27 IS NULL) AND (pregunta28 IS NULL) AND  (pregunta29 IS NULL) AND  (pregunta30 IS NULL) AND  (pregunta31 IS NULL) AND (pregunta32 IS NULL) AND (pregunta33 IS NULL) AND  (pregunta34 IS NULL) AND  (pregunta35 IS NULL) AND  (pregunta36 IS NULL) AND (pregunta37 IS NULL) AND (pregunta38 IS NULL) AND  (pregunta39 IS NULL) AND  (pregunta40 IS NULL) AND  (pregunta41 IS NULL) AND (pregunta42 IS NULL) AND (pregunta43 IS NULL) AND (pregunta44 IS NULL) AND (pregunta45 IS NULL) AND (pregunta46 IS NULL) AND (pregunta47 IS NULL) AND (pregunta48 IS NULL) AND (pregunta49 IS NULL) AND (pregunta50 IS NULL) AND (pregunta51 IS NULL) AND (pregunta52 IS NULL) AND (pregunta53 IS NULL) AND (pregunta54 IS NULL) AND (pregunta55 IS NULL) AND (pregunta56 IS NULL) AND (pregunta57 IS NULL) AND (pregunta58 IS NULL) AND (pregunta59 IS NULL) AND (pregunta60 IS NULL) AND (pregunta61 IS NULL) AND (pregunta62 IS NULL) AND (pregunta63 IS NULL) AND (pregunta64 IS NULL) AND (pregunta65 IS NULL) AND (pregunta66 IS NULL) AND (pregunta67 IS NULL) AND (pregunta68 IS NULL) AND (pregunta69 IS NULL) AND (pregunta70 IS NULL) AND (pregunta71 IS NULL) AND (pregunta72 IS NULL) AND (pregunta73 IS NULL) AND (pregunta74 IS NULL) AND (pregunta75 IS NULL) AND (pregunta76 IS NULL) AND (pregunta77 IS NULL) AND (pregunta78 IS NULL) AND (pregunta79 IS NULL) AND (pregunta80 IS NULL) AND (pregunta81 IS NULL) AND (pregunta82 IS NULL) AND (pregunta83 IS NULL) AND (pregunta84 IS NULL) AND (pregunta85 IS NULL) AND (pregunta86 IS NULL) AND (pregunta87 IS NULL) AND (pregunta88 IS NULL) AND (pregunta89 IS NULL) AND (pregunta90 IS NULL) AND (pregunta91 IS NULL) AND (pregunta92 IS NULL) AND (pregunta93 IS NULL) AND (pregunta94 IS NULL) AND (pregunta95 IS NULL) AND (pregunta96 IS NULL) AND (pregunta97 IS NULL) AND (pregunta98 IS NULL) AND (pregunta99 IS NULL) AND (pregunta100 IS NULL) AND (pregunta101 IS NULL) AND (pregunta102 IS NULL) AND (pregunta103 IS NULL) AND (pregunta104 IS NULL) AND (pregunta105 IS NULL) AND (pregunta106 IS NULL) AND (pregunta107 IS NULL) AND (pregunta108 IS NULL) AND (pregunta109 IS NULL) AND (pregunta110 IS NULL) AND (pregunta111 IS NULL) AND (pregunta112 IS NULL) AND (pregunta113 IS NULL) AND (pregunta114 IS NULL) AND (pregunta115 IS NULL) AND (pregunta116 IS NULL) AND (pregunta117 IS NULL) AND (pregunta118 IS NULL) AND (pregunta119 IS NULL) ORDER BY(u)";
                        console.log(consul);
                    }
                    else
                    {
                        console.log("entra al sino");
                        consul = "SELECT pin as u, consentimiento, fecha_de_inicio_de_diligenciada_la_encuesta FROM encuesta1 WHERE (fecha_de_inicio_de_diligenciada_la_encuesta IS NOT NULL) ORDER BY(pin);";
                        console.log(consul);
                    }
                    enviarConsulta(consul, id_consulta);
                    break;
                }
                case 7:/*Total codigos por facultad*/
                {
                    console.log("entro al caso 7"); 
                    if (finalizado === '1')/*tienen acepto*/
                    {
                        console.log("entra al si");
                        consul = "SELECT pin as u, pregunta4 as p, consentimiento, fecha_de_fin_de_diligenciada_la_encuesta FROM encuesta1 WHERE (pin LIKE '%"+id_universidad+"%') AND (consentimiento = 'Acepto') AND (fecha_de_fin_de_diligenciada_la_encuesta IS NOT NULL) AND (pregunta1 IS NOT NULL) AND (pregunta2 IS NOT NULL) AND (pregunta3 IS NOT NULL) AND (pregunta4 IS NOT NULL) AND (pregunta5 IS NOT NULL) AND (pregunta6 IS NOT NULL) AND (pregunta7 IS NOT NULL) AND (pregunta8 IS NOT NULL) AND (pregunta9 IS NOT NULL) AND (pregunta10 IS NOT NULL) AND (pregunta11 IS NOT NULL) AND (pregunta12 IS NOT NULL) AND (pregunta13 IS NOT NULL) AND  (pregunta14 IS NOT NULL) AND  (pregunta15 IS NOT NULL) AND (pregunta16 IS NOT NULL) AND (pregunta17 IS NOT NULL) AND (pregunta18 IS NOT NULL) AND  (pregunta19 IS NOT NULL) AND  (pregunta20 IS NOT NULL) AND (pregunta21 IS NOT NULL) AND (pregunta22 IS NOT NULL) AND (pregunta23 IS NOT NULL) AND (pregunta24 IS NOT NULL) AND  (pregunta25 IS NOT NULL) AND (pregunta26 IS NOT NULL) AND (pregunta27 IS NOT NULL) AND (pregunta28 IS NOT NULL) AND  (pregunta29 IS NOT NULL) AND  (pregunta30 IS NOT NULL) AND  (pregunta31 IS NOT NULL) AND (pregunta32 IS NOT NULL) AND (pregunta33 IS NOT NULL) AND  (pregunta34 IS NOT NULL) AND  (pregunta35 IS NOT NULL) AND  (pregunta36 IS NOT NULL) AND (pregunta37 IS NOT NULL) AND (pregunta38 IS NOT NULL) AND  (pregunta39 IS NOT NULL) AND  (pregunta40 IS NOT NULL) AND  (pregunta41 IS NOT NULL) AND (pregunta42 IS NOT NULL) AND (pregunta43 IS NOT NULL) AND (pregunta44 IS NOT NULL) AND (pregunta45 IS NOT NULL) AND (pregunta46 IS NOT NULL) AND (pregunta47 IS NOT NULL) AND (pregunta48 IS NOT NULL) AND (pregunta49 IS NOT NULL) AND (pregunta50 IS NOT NULL) AND (pregunta51 IS NOT NULL) AND (pregunta52 IS NOT NULL) AND (pregunta53 IS NOT NULL) AND (pregunta54 IS NOT NULL) AND (pregunta55 IS NOT NULL) AND (pregunta56 IS NOT NULL) AND (pregunta57 IS NOT NULL) AND (pregunta58 IS NOT NULL) AND (pregunta59 IS NOT NULL) AND (pregunta60 IS NOT NULL) AND (pregunta61 IS NOT NULL) AND (pregunta62 IS NOT NULL) AND (pregunta63 IS NOT NULL) AND (pregunta64 IS NOT NULL) AND (pregunta65 IS NOT NULL) AND (pregunta66 IS NOT NULL) AND (pregunta67 IS NOT NULL) AND (pregunta68 IS NOT NULL) AND (pregunta69 IS NOT NULL) AND (pregunta70 IS NOT NULL) AND (pregunta71 IS NOT NULL) AND (pregunta72 IS NOT NULL) AND (pregunta73 IS NOT NULL) AND (pregunta74 IS NOT NULL) AND (pregunta75 IS NOT NULL) AND (pregunta76 IS NOT NULL) AND (pregunta77 IS NOT NULL) AND (pregunta78 IS NOT NULL) AND (pregunta79 IS NOT NULL) AND (pregunta80 IS NOT NULL) AND (pregunta81 IS NOT NULL) AND (pregunta82 IS NOT NULL) AND (pregunta83 IS NOT NULL) AND (pregunta84 IS NOT NULL) AND (pregunta85 IS NOT NULL) AND (pregunta86 IS NOT NULL) AND (pregunta87 IS NOT NULL) AND (pregunta88 IS NOT NULL) AND (pregunta89 IS NOT NULL) AND (pregunta90 IS NOT NULL) AND (pregunta91 IS NOT NULL) AND (pregunta92 IS NOT NULL) AND (pregunta93 IS NOT NULL) AND (pregunta94 IS NOT NULL) AND (pregunta95 IS NOT NULL) AND (pregunta96 IS NOT NULL) AND (pregunta97 IS NOT NULL) AND (pregunta98 IS NOT NULL) AND (pregunta99 IS NOT NULL) AND (pregunta100 IS NOT NULL) AND (pregunta101 IS NOT NULL) AND (pregunta102 IS NOT NULL) AND (pregunta103 IS NOT NULL) AND (pregunta104 IS NOT NULL) AND (pregunta105 IS NOT NULL) AND (pregunta106 IS NOT NULL) AND (pregunta107 IS NOT NULL) AND (pregunta108 IS NOT NULL) AND (pregunta109 IS NOT NULL) AND (pregunta110 IS NOT NULL) AND (pregunta111 IS NOT NULL) AND (pregunta112 IS NOT NULL) AND (pregunta113 IS NOT NULL) AND (pregunta114 IS NOT NULL) AND (pregunta115 IS NOT NULL) AND (pregunta116 IS NOT NULL) AND (pregunta117 IS NOT NULL) AND (pregunta118 IS NOT NULL) AND (pregunta119 IS NOT NULL) ORDER BY(pin);";
                        console.log(consul);
                    }
                    else if(finalizado ==='0')/*tienen acepto pero no termino*/
                    {
                        console.log("entra al si");
                        consul = "SELECT pin as u, pregunta4 as p, consentimiento, fecha_de_fin_de_diligenciada_la_encuesta FROM encuesta1 WHERE (pin LIKE '%"+id_universidad+"%') AND (consentimiento = 'Acepto') AND (fecha_de_fin_de_diligenciada_la_encuesta IS NULL) ORDER BY(pin);";
                        console.log(consul);
                    }
                    else if(finalizado ==='2')/*no tienen acepto*/
                    {
                        console.log("entra al si");
                        consul = "SELECT pin as u, pregunta4 as p, consentimiento, fecha_de_fin_de_diligenciada_la_encuesta FROM encuesta1 WHERE (pin LIKE '%"+id_universidad+"%') AND (consentimiento IS NULL) AND (fecha_de_fin_de_diligenciada_la_encuesta IS NULL) AND (pregunta1 IS NULL) AND (pregunta2 IS NULL) AND (pregunta3 IS NULL) AND (pregunta4 IS NULL) AND (pregunta5 IS NULL) AND (pregunta6 IS NULL) AND (pregunta7 IS NULL) AND (pregunta8 IS NULL) AND (pregunta9 IS NULL) AND (pregunta10 IS NULL) AND (pregunta11 IS NULL) AND (pregunta12 IS NULL) AND (pregunta13 IS NULL) AND  (pregunta14 IS NULL) AND  (pregunta15 IS NULL) AND (pregunta16 IS NULL) AND (pregunta17 IS NULL) AND (pregunta18 IS NULL) AND  (pregunta19 IS NULL) AND  (pregunta20 IS NULL) AND (pregunta21 IS NULL) AND (pregunta22 IS NULL) AND (pregunta23 IS NULL) AND (pregunta24 IS NULL) AND  (pregunta25 IS NULL) AND (pregunta26 IS NULL) AND (pregunta27 IS NULL) AND (pregunta28 IS NULL) AND  (pregunta29 IS NULL) AND  (pregunta30 IS NULL) AND  (pregunta31 IS NULL) AND (pregunta32 IS NULL) AND (pregunta33 IS NULL) AND  (pregunta34 IS NULL) AND  (pregunta35 IS NULL) AND  (pregunta36 IS NULL) AND (pregunta37 IS NULL) AND (pregunta38 IS NULL) AND  (pregunta39 IS NULL) AND  (pregunta40 IS NULL) AND  (pregunta41 IS NULL) AND (pregunta42 IS NULL) AND (pregunta43 IS NULL) AND (pregunta44 IS NULL) AND (pregunta45 IS NULL) AND (pregunta46 IS NULL) AND (pregunta47 IS NULL) AND (pregunta48 IS NULL) AND (pregunta49 IS NULL) AND (pregunta50 IS NULL) AND (pregunta51 IS NULL) AND (pregunta52 IS NULL) AND (pregunta53 IS NULL) AND (pregunta54 IS NULL) AND (pregunta55 IS NULL) AND (pregunta56 IS NULL) AND (pregunta57 IS NULL) AND (pregunta58 IS NULL) AND (pregunta59 IS NULL) AND (pregunta60 IS NULL) AND (pregunta61 IS NULL) AND (pregunta62 IS NULL) AND (pregunta63 IS NULL) AND (pregunta64 IS NULL) AND (pregunta65 IS NULL) AND (pregunta66 IS NULL) AND (pregunta67 IS NULL) AND (pregunta68 IS NULL) AND (pregunta69 IS NULL) AND (pregunta70 IS NULL) AND (pregunta71 IS NULL) AND (pregunta72 IS NULL) AND (pregunta73 IS NULL) AND (pregunta74 IS NULL) AND (pregunta75 IS NULL) AND (pregunta76 IS NULL) AND (pregunta77 IS NULL) AND (pregunta78 IS NULL) AND (pregunta79 IS NULL) AND (pregunta80 IS NULL) AND (pregunta81 IS NULL) AND (pregunta82 IS NULL) AND (pregunta83 IS NULL) AND (pregunta84 IS NULL) AND (pregunta85 IS NULL) AND (pregunta86 IS NULL) AND (pregunta87 IS NULL) AND (pregunta88 IS NULL) AND (pregunta89 IS NULL) AND (pregunta90 IS NULL) AND (pregunta91 IS NULL) AND (pregunta92 IS NULL) AND (pregunta93 IS NULL) AND (pregunta94 IS NULL) AND (pregunta95 IS NULL) AND (pregunta96 IS NULL) AND (pregunta97 IS NULL) AND (pregunta98 IS NULL) AND (pregunta99 IS NULL) AND (pregunta100 IS NULL) AND (pregunta101 IS NULL) AND (pregunta102 IS NULL) AND (pregunta103 IS NULL) AND (pregunta104 IS NULL) AND (pregunta105 IS NULL) AND (pregunta106 IS NULL) AND (pregunta107 IS NULL) AND (pregunta108 IS NULL) AND (pregunta109 IS NULL) AND (pregunta110 IS NULL) AND (pregunta111 IS NULL) AND (pregunta112 IS NULL) AND (pregunta113 IS NULL) AND (pregunta114 IS NULL) AND (pregunta115 IS NULL) AND (pregunta116 IS NULL) AND (pregunta117 IS NULL) AND (pregunta118 IS NULL) AND (pregunta119 IS NULL) ORDER BY(pin);";
                        console.log(consul);
                        
                    }
                    else if(finalizado ==='3')/*todas las anteriores unidas*/
                    {
                        console.log("entra al sino");                        
                        consul = "SELECT pin as u, pregunta4 as p, consentimiento, fecha_de_fin_de_diligenciada_la_encuesta FROM encuesta1 WHERE (pin LIKE '%"+id_universidad+"%') AND (consentimiento = 'Acepto') AND (fecha_de_fin_de_diligenciada_la_encuesta IS NOT NULL) AND (pregunta1 IS NOT NULL) AND (pregunta2 IS NOT NULL) AND (pregunta3 IS NOT NULL) AND (pregunta4 IS NOT NULL) AND (pregunta5 IS NOT NULL) AND (pregunta6 IS NOT NULL) AND (pregunta7 IS NOT NULL) AND (pregunta8 IS NOT NULL) AND (pregunta9 IS NOT NULL) AND (pregunta10 IS NOT NULL) AND (pregunta11 IS NOT NULL) AND (pregunta12 IS NOT NULL) AND (pregunta13 IS NOT NULL) AND  (pregunta14 IS NOT NULL) AND  (pregunta15 IS NOT NULL) AND (pregunta16 IS NOT NULL) AND (pregunta17 IS NOT NULL) AND (pregunta18 IS NOT NULL) AND  (pregunta19 IS NOT NULL) AND  (pregunta20 IS NOT NULL) AND (pregunta21 IS NOT NULL) AND (pregunta22 IS NOT NULL) AND (pregunta23 IS NOT NULL) AND (pregunta24 IS NOT NULL) AND  (pregunta25 IS NOT NULL) AND (pregunta26 IS NOT NULL) AND (pregunta27 IS NOT NULL) AND (pregunta28 IS NOT NULL) AND  (pregunta29 IS NOT NULL) AND  (pregunta30 IS NOT NULL) AND  (pregunta31 IS NOT NULL) AND (pregunta32 IS NOT NULL) AND (pregunta33 IS NOT NULL) AND  (pregunta34 IS NOT NULL) AND  (pregunta35 IS NOT NULL) AND  (pregunta36 IS NOT NULL) AND (pregunta37 IS NOT NULL) AND (pregunta38 IS NOT NULL) AND  (pregunta39 IS NOT NULL) AND  (pregunta40 IS NOT NULL) AND  (pregunta41 IS NOT NULL) AND (pregunta42 IS NOT NULL) AND (pregunta43 IS NOT NULL) AND (pregunta44 IS NOT NULL) AND (pregunta45 IS NOT NULL) AND (pregunta46 IS NOT NULL) AND (pregunta47 IS NOT NULL) AND (pregunta48 IS NOT NULL) AND (pregunta49 IS NOT NULL) AND (pregunta50 IS NOT NULL) AND (pregunta51 IS NOT NULL) AND (pregunta52 IS NOT NULL) AND (pregunta53 IS NOT NULL) AND (pregunta54 IS NOT NULL) AND (pregunta55 IS NOT NULL) AND (pregunta56 IS NOT NULL) AND (pregunta57 IS NOT NULL) AND (pregunta58 IS NOT NULL) AND (pregunta59 IS NOT NULL) AND (pregunta60 IS NOT NULL) AND (pregunta61 IS NOT NULL) AND (pregunta62 IS NOT NULL) AND (pregunta63 IS NOT NULL) AND (pregunta64 IS NOT NULL) AND (pregunta65 IS NOT NULL) AND (pregunta66 IS NOT NULL) AND (pregunta67 IS NOT NULL) AND (pregunta68 IS NOT NULL) AND (pregunta69 IS NOT NULL) AND (pregunta70 IS NOT NULL) AND (pregunta71 IS NOT NULL) AND (pregunta72 IS NOT NULL) AND (pregunta73 IS NOT NULL) AND (pregunta74 IS NOT NULL) AND (pregunta75 IS NOT NULL) AND (pregunta76 IS NOT NULL) AND (pregunta77 IS NOT NULL) AND (pregunta78 IS NOT NULL) AND (pregunta79 IS NOT NULL) AND (pregunta80 IS NOT NULL) AND (pregunta81 IS NOT NULL) AND (pregunta82 IS NOT NULL) AND (pregunta83 IS NOT NULL) AND (pregunta84 IS NOT NULL) AND (pregunta85 IS NOT NULL) AND (pregunta86 IS NOT NULL) AND (pregunta87 IS NOT NULL) AND (pregunta88 IS NOT NULL) AND (pregunta89 IS NOT NULL) AND (pregunta90 IS NOT NULL) AND (pregunta91 IS NOT NULL) AND (pregunta92 IS NOT NULL) AND (pregunta93 IS NOT NULL) AND (pregunta94 IS NOT NULL) AND (pregunta95 IS NOT NULL) AND (pregunta96 IS NOT NULL) AND (pregunta97 IS NOT NULL) AND (pregunta98 IS NOT NULL) AND (pregunta99 IS NOT NULL) AND (pregunta100 IS NOT NULL) AND (pregunta101 IS NOT NULL) AND (pregunta102 IS NOT NULL) AND (pregunta103 IS NOT NULL) AND (pregunta104 IS NOT NULL) AND (pregunta105 IS NOT NULL) AND (pregunta106 IS NOT NULL) AND (pregunta107 IS NOT NULL) AND (pregunta108 IS NOT NULL) AND (pregunta109 IS NOT NULL) AND (pregunta110 IS NOT NULL) AND (pregunta111 IS NOT NULL) AND (pregunta112 IS NOT NULL) AND (pregunta113 IS NOT NULL) AND (pregunta114 IS NOT NULL) AND (pregunta115 IS NOT NULL) AND (pregunta116 IS NOT NULL) AND (pregunta117 IS NOT NULL) AND (pregunta118 IS NOT NULL) AND (pregunta119 IS NOT NULL) UNION SELECT pin as u, pregunta4 as p, consentimiento, fecha_de_fin_de_diligenciada_la_encuesta FROM encuesta1 WHERE (pin LIKE '%"+id_universidad+"%') AND (consentimiento = 'Acepto') AND (fecha_de_fin_de_diligenciada_la_encuesta IS NULL) UNION SELECT pin as u, pregunta4 as p, consentimiento, fecha_de_fin_de_diligenciada_la_encuesta FROM encuesta1 WHERE (pin LIKE '%"+id_universidad+"%') AND (consentimiento IS NULL) AND (fecha_de_fin_de_diligenciada_la_encuesta IS NULL) AND (pregunta1 IS NULL) AND (pregunta2 IS NULL) AND (pregunta3 IS NULL) AND (pregunta4 IS NULL) AND (pregunta5 IS NULL) AND (pregunta6 IS NULL) AND (pregunta7 IS NULL) AND (pregunta8 IS NULL) AND (pregunta9 IS NULL) AND (pregunta10 IS NULL) AND (pregunta11 IS NULL) AND (pregunta12 IS NULL) AND (pregunta13 IS NULL) AND  (pregunta14 IS NULL) AND  (pregunta15 IS NULL) AND (pregunta16 IS NULL) AND (pregunta17 IS NULL) AND (pregunta18 IS NULL) AND  (pregunta19 IS NULL) AND  (pregunta20 IS NULL) AND (pregunta21 IS NULL) AND (pregunta22 IS NULL) AND (pregunta23 IS NULL) AND (pregunta24 IS NULL) AND  (pregunta25 IS NULL) AND (pregunta26 IS NULL) AND (pregunta27 IS NULL) AND (pregunta28 IS NULL) AND  (pregunta29 IS NULL) AND  (pregunta30 IS NULL) AND  (pregunta31 IS NULL) AND (pregunta32 IS NULL) AND (pregunta33 IS NULL) AND  (pregunta34 IS NULL) AND  (pregunta35 IS NULL) AND  (pregunta36 IS NULL) AND (pregunta37 IS NULL) AND (pregunta38 IS NULL) AND  (pregunta39 IS NULL) AND  (pregunta40 IS NULL) AND  (pregunta41 IS NULL) AND (pregunta42 IS NULL) AND (pregunta43 IS NULL) AND (pregunta44 IS NULL) AND (pregunta45 IS NULL) AND (pregunta46 IS NULL) AND (pregunta47 IS NULL) AND (pregunta48 IS NULL) AND (pregunta49 IS NULL) AND (pregunta50 IS NULL) AND (pregunta51 IS NULL) AND (pregunta52 IS NULL) AND (pregunta53 IS NULL) AND (pregunta54 IS NULL) AND (pregunta55 IS NULL) AND (pregunta56 IS NULL) AND (pregunta57 IS NULL) AND (pregunta58 IS NULL) AND (pregunta59 IS NULL) AND (pregunta60 IS NULL) AND (pregunta61 IS NULL) AND (pregunta62 IS NULL) AND (pregunta63 IS NULL) AND (pregunta64 IS NULL) AND (pregunta65 IS NULL) AND (pregunta66 IS NULL) AND (pregunta67 IS NULL) AND (pregunta68 IS NULL) AND (pregunta69 IS NULL) AND (pregunta70 IS NULL) AND (pregunta71 IS NULL) AND (pregunta72 IS NULL) AND (pregunta73 IS NULL) AND (pregunta74 IS NULL) AND (pregunta75 IS NULL) AND (pregunta76 IS NULL) AND (pregunta77 IS NULL) AND (pregunta78 IS NULL) AND (pregunta79 IS NULL) AND (pregunta80 IS NULL) AND (pregunta81 IS NULL) AND (pregunta82 IS NULL) AND (pregunta83 IS NULL) AND (pregunta84 IS NULL) AND (pregunta85 IS NULL) AND (pregunta86 IS NULL) AND (pregunta87 IS NULL) AND (pregunta88 IS NULL) AND (pregunta89 IS NULL) AND (pregunta90 IS NULL) AND (pregunta91 IS NULL) AND (pregunta92 IS NULL) AND (pregunta93 IS NULL) AND (pregunta94 IS NULL) AND (pregunta95 IS NULL) AND (pregunta96 IS NULL) AND (pregunta97 IS NULL) AND (pregunta98 IS NULL) AND (pregunta99 IS NULL) AND (pregunta100 IS NULL) AND (pregunta101 IS NULL) AND (pregunta102 IS NULL) AND (pregunta103 IS NULL) AND (pregunta104 IS NULL) AND (pregunta105 IS NULL) AND (pregunta106 IS NULL) AND (pregunta107 IS NULL) AND (pregunta108 IS NULL) AND (pregunta109 IS NULL) AND (pregunta110 IS NULL) AND (pregunta111 IS NULL) AND (pregunta112 IS NULL) AND (pregunta113 IS NULL) AND (pregunta114 IS NULL) AND (pregunta115 IS NULL) AND (pregunta116 IS NULL) AND (pregunta117 IS NULL) AND (pregunta118 IS NULL) AND (pregunta119 IS NULL);";
                        console.log(consul);
                    }
                    else
                    {
                        console.log("entra al sino");                        
                        consul = "SELECT pin as u, pregunta4 as p, consentimiento, fecha_de_fin_de_diligenciada_la_encuesta FROM encuesta1 WHERE (fecha_de_inicio_de_diligenciada_la_encuesta IS NOT NULL) ORDER BY(pin);";
                        console.log(consul);
                    }
                    enviarConsulta(consul, id_consulta, id_universidad, 0 , 0);
                    break;
                }
                case 8:/*Total codigos por programa academico*/
                {
                    console.log("entro al caso 8"); 
                    if (finalizado === '1')/*tienen acepto*/
                    {
                        consul = "SELECT pin as u, pregunta4 as p, consentimiento, fecha_de_fin_de_diligenciada_la_encuesta FROM encuesta1 WHERE (pin LIKE '%"+id_universidad+"%') AND (pregunta4 ILIKE '%"+facultad+"%') AND (consentimiento = 'Acepto') AND (fecha_de_fin_de_diligenciada_la_encuesta IS NOT NULL) AND (pregunta1 IS NOT NULL) AND (pregunta2 IS NOT NULL) AND (pregunta3 IS NOT NULL) AND (pregunta4 IS NOT NULL) AND (pregunta5 IS NOT NULL) AND (pregunta6 IS NOT NULL) AND (pregunta7 IS NOT NULL) AND (pregunta8 IS NOT NULL) AND (pregunta9 IS NOT NULL) AND (pregunta10 IS NOT NULL) AND (pregunta11 IS NOT NULL) AND (pregunta12 IS NOT NULL) AND (pregunta13 IS NOT NULL) AND  (pregunta14 IS NOT NULL) AND  (pregunta15 IS NOT NULL) AND (pregunta16 IS NOT NULL) AND (pregunta17 IS NOT NULL) AND (pregunta18 IS NOT NULL) AND  (pregunta19 IS NOT NULL) AND  (pregunta20 IS NOT NULL) AND (pregunta21 IS NOT NULL) AND (pregunta22 IS NOT NULL) AND (pregunta23 IS NOT NULL) AND (pregunta24 IS NOT NULL) AND  (pregunta25 IS NOT NULL) AND (pregunta26 IS NOT NULL) AND (pregunta27 IS NOT NULL) AND (pregunta28 IS NOT NULL) AND  (pregunta29 IS NOT NULL) AND  (pregunta30 IS NOT NULL) AND  (pregunta31 IS NOT NULL) AND (pregunta32 IS NOT NULL) AND (pregunta33 IS NOT NULL) AND  (pregunta34 IS NOT NULL) AND  (pregunta35 IS NOT NULL) AND  (pregunta36 IS NOT NULL) AND (pregunta37 IS NOT NULL) AND (pregunta38 IS NOT NULL) AND  (pregunta39 IS NOT NULL) AND  (pregunta40 IS NOT NULL) AND  (pregunta41 IS NOT NULL) AND (pregunta42 IS NOT NULL) AND (pregunta43 IS NOT NULL) AND (pregunta44 IS NOT NULL) AND (pregunta45 IS NOT NULL) AND (pregunta46 IS NOT NULL) AND (pregunta47 IS NOT NULL) AND (pregunta48 IS NOT NULL) AND (pregunta49 IS NOT NULL) AND (pregunta50 IS NOT NULL) AND (pregunta51 IS NOT NULL) AND (pregunta52 IS NOT NULL) AND (pregunta53 IS NOT NULL) AND (pregunta54 IS NOT NULL) AND (pregunta55 IS NOT NULL) AND (pregunta56 IS NOT NULL) AND (pregunta57 IS NOT NULL) AND (pregunta58 IS NOT NULL) AND (pregunta59 IS NOT NULL) AND (pregunta60 IS NOT NULL) AND (pregunta61 IS NOT NULL) AND (pregunta62 IS NOT NULL) AND (pregunta63 IS NOT NULL) AND (pregunta64 IS NOT NULL) AND (pregunta65 IS NOT NULL) AND (pregunta66 IS NOT NULL) AND (pregunta67 IS NOT NULL) AND (pregunta68 IS NOT NULL) AND (pregunta69 IS NOT NULL) AND (pregunta70 IS NOT NULL) AND (pregunta71 IS NOT NULL) AND (pregunta72 IS NOT NULL) AND (pregunta73 IS NOT NULL) AND (pregunta74 IS NOT NULL) AND (pregunta75 IS NOT NULL) AND (pregunta76 IS NOT NULL) AND (pregunta77 IS NOT NULL) AND (pregunta78 IS NOT NULL) AND (pregunta79 IS NOT NULL) AND (pregunta80 IS NOT NULL) AND (pregunta81 IS NOT NULL) AND (pregunta82 IS NOT NULL) AND (pregunta83 IS NOT NULL) AND (pregunta84 IS NOT NULL) AND (pregunta85 IS NOT NULL) AND (pregunta86 IS NOT NULL) AND (pregunta87 IS NOT NULL) AND (pregunta88 IS NOT NULL) AND (pregunta89 IS NOT NULL) AND (pregunta90 IS NOT NULL) AND (pregunta91 IS NOT NULL) AND (pregunta92 IS NOT NULL) AND (pregunta93 IS NOT NULL) AND (pregunta94 IS NOT NULL) AND (pregunta95 IS NOT NULL) AND (pregunta96 IS NOT NULL) AND (pregunta97 IS NOT NULL) AND (pregunta98 IS NOT NULL) AND (pregunta99 IS NOT NULL) AND (pregunta100 IS NOT NULL) AND (pregunta101 IS NOT NULL) AND (pregunta102 IS NOT NULL) AND (pregunta103 IS NOT NULL) AND (pregunta104 IS NOT NULL) AND (pregunta105 IS NOT NULL) AND (pregunta106 IS NOT NULL) AND (pregunta107 IS NOT NULL) AND (pregunta108 IS NOT NULL) AND (pregunta109 IS NOT NULL) AND (pregunta110 IS NOT NULL) AND (pregunta111 IS NOT NULL) AND (pregunta112 IS NOT NULL) AND (pregunta113 IS NOT NULL) AND (pregunta114 IS NOT NULL) AND (pregunta115 IS NOT NULL) AND (pregunta116 IS NOT NULL) AND (pregunta117 IS NOT NULL) AND (pregunta118 IS NOT NULL) AND (pregunta119 IS NOT NULL) ORDER BY(p)";
                    }
                    else if(finalizado ==='0')/*tienen acepto pero no termino*/
                    {
                        consul = "SELECT pin as u, pregunta4 as p, consentimiento, fecha_de_fin_de_diligenciada_la_encuesta FROM encuesta1 WHERE (pin LIKE '%"+id_universidad+"%') AND (pregunta4 ILIKE '%"+facultad+"%') AND (consentimiento = 'Acepto') AND (fecha_de_fin_de_diligenciada_la_encuesta IS NULL) ORDER BY(p)";
					}
                    else if(finalizado ==='2')/*no tienen acepto*/
                    {
                        consul ="SELECT pin as u, pregunta4 as p, consentimiento, fecha_de_fin_de_diligenciada_la_encuesta FROM encuesta1 WHERE (pin LIKE '%"+id_universidad+"%') AND (pregunta4 ILIKE '%"+facultad+"%') AND (consentimiento IS NULL) AND (fecha_de_fin_de_diligenciada_la_encuesta IS NULL) AND (pregunta1 IS NULL) AND (pregunta2 IS NULL) AND (pregunta3 IS NULL) AND (pregunta4 IS NULL) AND (pregunta5 IS NULL) AND (pregunta6 IS NULL) AND (pregunta7 IS NULL) AND (pregunta8 IS NULL) AND (pregunta9 IS NULL) AND (pregunta10 IS NULL) AND (pregunta11 IS NULL) AND (pregunta12 IS NULL) AND (pregunta13 IS NULL) AND  (pregunta14 IS NULL) AND  (pregunta15 IS NULL) AND (pregunta16 IS NULL) AND (pregunta17 IS NULL) AND (pregunta18 IS NULL) AND  (pregunta19 IS NULL) AND  (pregunta20 IS NULL) AND (pregunta21 IS NULL) AND (pregunta22 IS NULL) AND (pregunta23 IS NULL) AND (pregunta24 IS NULL) AND  (pregunta25 IS NULL) AND (pregunta26 IS NULL) AND (pregunta27 IS NULL) AND (pregunta28 IS NULL) AND  (pregunta29 IS NULL) AND  (pregunta30 IS NULL) AND  (pregunta31 IS NULL) AND (pregunta32 IS NULL) AND (pregunta33 IS NULL) AND  (pregunta34 IS NULL) AND  (pregunta35 IS NULL) AND  (pregunta36 IS NULL) AND (pregunta37 IS NULL) AND (pregunta38 IS NULL) AND  (pregunta39 IS NULL) AND  (pregunta40 IS NULL) AND  (pregunta41 IS NULL) AND (pregunta42 IS NULL) AND (pregunta43 IS NULL) AND (pregunta44 IS NULL) AND (pregunta45 IS NULL) AND (pregunta46 IS NULL) AND (pregunta47 IS NULL) AND (pregunta48 IS NULL) AND (pregunta49 IS NULL) AND (pregunta50 IS NULL) AND (pregunta51 IS NULL) AND (pregunta52 IS NULL) AND (pregunta53 IS NULL) AND (pregunta54 IS NULL) AND (pregunta55 IS NULL) AND (pregunta56 IS NULL) AND (pregunta57 IS NULL) AND (pregunta58 IS NULL) AND (pregunta59 IS NULL) AND (pregunta60 IS NULL) AND (pregunta61 IS NULL) AND (pregunta62 IS NULL) AND (pregunta63 IS NULL) AND (pregunta64 IS NULL) AND (pregunta65 IS NULL) AND (pregunta66 IS NULL) AND (pregunta67 IS NULL) AND (pregunta68 IS NULL) AND (pregunta69 IS NULL) AND (pregunta70 IS NULL) AND (pregunta71 IS NULL) AND (pregunta72 IS NULL) AND (pregunta73 IS NULL) AND (pregunta74 IS NULL) AND (pregunta75 IS NULL) AND (pregunta76 IS NULL) AND (pregunta77 IS NULL) AND (pregunta78 IS NULL) AND (pregunta79 IS NULL) AND (pregunta80 IS NULL) AND (pregunta81 IS NULL) AND (pregunta82 IS NULL) AND (pregunta83 IS NULL) AND (pregunta84 IS NULL) AND (pregunta85 IS NULL) AND (pregunta86 IS NULL) AND (pregunta87 IS NULL) AND (pregunta88 IS NULL) AND (pregunta89 IS NULL) AND (pregunta90 IS NULL) AND (pregunta91 IS NULL) AND (pregunta92 IS NULL) AND (pregunta93 IS NULL) AND (pregunta94 IS NULL) AND (pregunta95 IS NULL) AND (pregunta96 IS NULL) AND (pregunta97 IS NULL) AND (pregunta98 IS NULL) AND (pregunta99 IS NULL) AND (pregunta100 IS NULL) AND (pregunta101 IS NULL) AND (pregunta102 IS NULL) AND (pregunta103 IS NULL) AND (pregunta104 IS NULL) AND (pregunta105 IS NULL) AND (pregunta106 IS NULL) AND (pregunta107 IS NULL) AND (pregunta108 IS NULL) AND (pregunta109 IS NULL) AND (pregunta110 IS NULL) AND (pregunta111 IS NULL) AND (pregunta112 IS NULL) AND (pregunta113 IS NULL) AND (pregunta114 IS NULL) AND (pregunta115 IS NULL) AND (pregunta116 IS NULL) AND (pregunta117 IS NULL) AND (pregunta118 IS NULL) AND (pregunta119 IS NULL) ORDER BY(p);";
                    }
                    else if(finalizado ==='3')/*todas las anteriores unidas*/
                    {                        
                        consul = "SELECT pin as u, pregunta4 as p, consentimiento, fecha_de_fin_de_diligenciada_la_encuesta FROM encuesta1 WHERE (pin LIKE '%"+id_universidad+"%') AND (pregunta4 ILIKE '%"+facultad+"%') AND (consentimiento = 'Acepto') AND (fecha_de_fin_de_diligenciada_la_encuesta IS NOT NULL) UNION SELECT pin as u, pregunta4 as p, consentimiento, fecha_de_fin_de_diligenciada_la_encuesta FROM encuesta1 WHERE (pin LIKE '%"+id_universidad+"%') AND (pregunta4 ILIKE '%"+facultad+"%') AND (consentimiento = 'Acepto') AND (fecha_de_fin_de_diligenciada_la_encuesta IS NULL) UNION SELECT pin as u, pregunta4 as p, consentimiento, fecha_de_fin_de_diligenciada_la_encuesta FROM encuesta1 WHERE (pin LIKE '%"+id_universidad+"%') AND (pregunta4 ILIKE '%"+facultad+"%') AND (consentimiento IS NULL) AND (fecha_de_fin_de_diligenciada_la_encuesta IS NULL) ORDER BY(p);";
                        console.log(consul);
                    }
                    else
                    {
                        consul = "SELECT pin as u, pregunta4 as p, consentimiento, fecha_de_fin_de_diligenciada_la_encuesta FROM encuesta1 WHERE (fecha_de_inicio_de_diligenciada_la_encuesta IS NOT NULL) ORDER BY(pin);";
                        console.log(consul);
                    }
                    enviarConsulta(consul, id_consulta, id_universidad, id_facultad , id_programa);
                    break;
                }
                case 9:
                {
                    console.log("entro al caso 9");
                    consul = "SELECT pin, consentimiento, fecha_de_inicio_de_diligenciada_la_encuesta, fecha_de_fin_de_diligenciada_la_encuesta FROM encuesta1 WHERE (pin LIKE %27%25"+$("#codigo_a_buscar").val()+"%25%27);";
                    console.log(consul);
                    enviarConsulta(consul, id_consulta, 0, 0 ,0);
                    break;
                }
                case 10:/*Total codigos por universidad por genero*/
                {
                    console.log("--->"+genero);
                    if (genero === '1')
                    {
                        consul = "SELECT pin as u, pregunta4 as p, consentimiento, fecha_de_fin_de_diligenciada_la_encuesta, pregunta1 FROM encuesta1 WHERE (pin LIKE '%"+id_universidad+"%') AND (pregunta1 ILIKE '%Masculino%') AND (consentimiento = 'Acepto') AND (fecha_de_fin_de_diligenciada_la_encuesta IS NOT NULL) AND (pregunta1 IS NOT NULL) AND (pregunta2 IS NOT NULL) AND (pregunta3 IS NOT NULL) AND (pregunta4 IS NOT NULL) AND (pregunta5 IS NOT NULL) AND (pregunta6 IS NOT NULL) AND (pregunta7 IS NOT NULL) AND (pregunta8 IS NOT NULL) AND (pregunta9 IS NOT NULL) AND (pregunta10 IS NOT NULL) AND (pregunta11 IS NOT NULL) AND (pregunta12 IS NOT NULL) AND (pregunta13 IS NOT NULL) AND  (pregunta14 IS NOT NULL) AND  (pregunta15 IS NOT NULL) AND (pregunta16 IS NOT NULL) AND (pregunta17 IS NOT NULL) AND (pregunta18 IS NOT NULL) AND  (pregunta19 IS NOT NULL) AND  (pregunta20 IS NOT NULL) AND (pregunta21 IS NOT NULL) AND (pregunta22 IS NOT NULL) AND (pregunta23 IS NOT NULL) AND (pregunta24 IS NOT NULL) AND  (pregunta25 IS NOT NULL) AND (pregunta26 IS NOT NULL) AND (pregunta27 IS NOT NULL) AND (pregunta28 IS NOT NULL) AND  (pregunta29 IS NOT NULL) AND  (pregunta30 IS NOT NULL) AND  (pregunta31 IS NOT NULL) AND (pregunta32 IS NOT NULL) AND (pregunta33 IS NOT NULL) AND  (pregunta34 IS NOT NULL) AND  (pregunta35 IS NOT NULL) AND  (pregunta36 IS NOT NULL) AND (pregunta37 IS NOT NULL) AND (pregunta38 IS NOT NULL) AND  (pregunta39 IS NOT NULL) AND  (pregunta40 IS NOT NULL) AND  (pregunta41 IS NOT NULL) AND (pregunta42 IS NOT NULL) AND (pregunta43 IS NOT NULL) AND (pregunta44 IS NOT NULL) AND (pregunta45 IS NOT NULL) AND (pregunta46 IS NOT NULL) AND (pregunta47 IS NOT NULL) AND (pregunta48 IS NOT NULL) AND (pregunta49 IS NOT NULL) AND (pregunta50 IS NOT NULL) AND (pregunta51 IS NOT NULL) AND (pregunta52 IS NOT NULL) AND (pregunta53 IS NOT NULL) AND (pregunta54 IS NOT NULL) AND (pregunta55 IS NOT NULL) AND (pregunta56 IS NOT NULL) AND (pregunta57 IS NOT NULL) AND (pregunta58 IS NOT NULL) AND (pregunta59 IS NOT NULL) AND (pregunta60 IS NOT NULL) AND (pregunta61 IS NOT NULL) AND (pregunta62 IS NOT NULL) AND (pregunta63 IS NOT NULL) AND (pregunta64 IS NOT NULL) AND (pregunta65 IS NOT NULL) AND (pregunta66 IS NOT NULL) AND (pregunta67 IS NOT NULL) AND (pregunta68 IS NOT NULL) AND (pregunta69 IS NOT NULL) AND (pregunta70 IS NOT NULL) AND (pregunta71 IS NOT NULL) AND (pregunta72 IS NOT NULL) AND (pregunta73 IS NOT NULL) AND (pregunta74 IS NOT NULL) AND (pregunta75 IS NOT NULL) AND (pregunta76 IS NOT NULL) AND (pregunta77 IS NOT NULL) AND (pregunta78 IS NOT NULL) AND (pregunta79 IS NOT NULL) AND (pregunta80 IS NOT NULL) AND (pregunta81 IS NOT NULL) AND (pregunta82 IS NOT NULL) AND (pregunta83 IS NOT NULL) AND (pregunta84 IS NOT NULL) AND (pregunta85 IS NOT NULL) AND (pregunta86 IS NOT NULL) AND (pregunta87 IS NOT NULL) AND (pregunta88 IS NOT NULL) AND (pregunta89 IS NOT NULL) AND (pregunta90 IS NOT NULL) AND (pregunta91 IS NOT NULL) AND (pregunta92 IS NOT NULL) AND (pregunta93 IS NOT NULL) AND (pregunta94 IS NOT NULL) AND (pregunta95 IS NOT NULL) AND (pregunta96 IS NOT NULL) AND (pregunta97 IS NOT NULL) AND (pregunta98 IS NOT NULL) AND (pregunta99 IS NOT NULL) AND (pregunta100 IS NOT NULL) AND (pregunta101 IS NOT NULL) AND (pregunta102 IS NOT NULL) AND (pregunta103 IS NOT NULL) AND (pregunta104 IS NOT NULL) AND (pregunta105 IS NOT NULL) AND (pregunta106 IS NOT NULL) AND (pregunta107 IS NOT NULL) AND (pregunta108 IS NOT NULL) AND (pregunta109 IS NOT NULL) AND (pregunta110 IS NOT NULL) AND (pregunta111 IS NOT NULL) AND (pregunta112 IS NOT NULL) AND (pregunta113 IS NOT NULL) AND (pregunta114 IS NOT NULL) AND (pregunta115 IS NOT NULL) AND (pregunta116 IS NOT NULL) AND (pregunta117 IS NOT NULL) AND (pregunta118 IS NOT NULL) AND (pregunta119 IS NOT NULL) ORDER BY(p);";
                        console.log(consul);
                    }
                    else if(genero === '2')
                    {                        
                        consul = "SELECT pin as u, pregunta4 as p, consentimiento, fecha_de_fin_de_diligenciada_la_encuesta, pregunta1 FROM encuesta1 WHERE (pin LIKE '%"+id_universidad+"%') AND (pregunta1 ILIKE '%Femenino%') AND (consentimiento = 'Acepto') AND (fecha_de_fin_de_diligenciada_la_encuesta IS NOT NULL) AND (pregunta1 IS NOT NULL) AND (pregunta2 IS NOT NULL) AND (pregunta3 IS NOT NULL) AND (pregunta4 IS NOT NULL) AND (pregunta5 IS NOT NULL) AND (pregunta6 IS NOT NULL) AND (pregunta7 IS NOT NULL) AND (pregunta8 IS NOT NULL) AND (pregunta9 IS NOT NULL) AND (pregunta10 IS NOT NULL) AND (pregunta11 IS NOT NULL) AND (pregunta12 IS NOT NULL) AND (pregunta13 IS NOT NULL) AND  (pregunta14 IS NOT NULL) AND  (pregunta15 IS NOT NULL) AND (pregunta16 IS NOT NULL) AND (pregunta17 IS NOT NULL) AND (pregunta18 IS NOT NULL) AND  (pregunta19 IS NOT NULL) AND  (pregunta20 IS NOT NULL) AND (pregunta21 IS NOT NULL) AND (pregunta22 IS NOT NULL) AND (pregunta23 IS NOT NULL) AND (pregunta24 IS NOT NULL) AND  (pregunta25 IS NOT NULL) AND (pregunta26 IS NOT NULL) AND (pregunta27 IS NOT NULL) AND (pregunta28 IS NOT NULL) AND  (pregunta29 IS NOT NULL) AND  (pregunta30 IS NOT NULL) AND  (pregunta31 IS NOT NULL) AND (pregunta32 IS NOT NULL) AND (pregunta33 IS NOT NULL) AND  (pregunta34 IS NOT NULL) AND  (pregunta35 IS NOT NULL) AND  (pregunta36 IS NOT NULL) AND (pregunta37 IS NOT NULL) AND (pregunta38 IS NOT NULL) AND  (pregunta39 IS NOT NULL) AND  (pregunta40 IS NOT NULL) AND  (pregunta41 IS NOT NULL) AND (pregunta42 IS NOT NULL) AND (pregunta43 IS NOT NULL) AND (pregunta44 IS NOT NULL) AND (pregunta45 IS NOT NULL) AND (pregunta46 IS NOT NULL) AND (pregunta47 IS NOT NULL) AND (pregunta48 IS NOT NULL) AND (pregunta49 IS NOT NULL) AND (pregunta50 IS NOT NULL) AND (pregunta51 IS NOT NULL) AND (pregunta52 IS NOT NULL) AND (pregunta53 IS NOT NULL) AND (pregunta54 IS NOT NULL) AND (pregunta55 IS NOT NULL) AND (pregunta56 IS NOT NULL) AND (pregunta57 IS NOT NULL) AND (pregunta58 IS NOT NULL) AND (pregunta59 IS NOT NULL) AND (pregunta60 IS NOT NULL) AND (pregunta61 IS NOT NULL) AND (pregunta62 IS NOT NULL) AND (pregunta63 IS NOT NULL) AND (pregunta64 IS NOT NULL) AND (pregunta65 IS NOT NULL) AND (pregunta66 IS NOT NULL) AND (pregunta67 IS NOT NULL) AND (pregunta68 IS NOT NULL) AND (pregunta69 IS NOT NULL) AND (pregunta70 IS NOT NULL) AND (pregunta71 IS NOT NULL) AND (pregunta72 IS NOT NULL) AND (pregunta73 IS NOT NULL) AND (pregunta74 IS NOT NULL) AND (pregunta75 IS NOT NULL) AND (pregunta76 IS NOT NULL) AND (pregunta77 IS NOT NULL) AND (pregunta78 IS NOT NULL) AND (pregunta79 IS NOT NULL) AND (pregunta80 IS NOT NULL) AND (pregunta81 IS NOT NULL) AND (pregunta82 IS NOT NULL) AND (pregunta83 IS NOT NULL) AND (pregunta84 IS NOT NULL) AND (pregunta85 IS NOT NULL) AND (pregunta86 IS NOT NULL) AND (pregunta87 IS NOT NULL) AND (pregunta88 IS NOT NULL) AND (pregunta89 IS NOT NULL) AND (pregunta90 IS NOT NULL) AND (pregunta91 IS NOT NULL) AND (pregunta92 IS NOT NULL) AND (pregunta93 IS NOT NULL) AND (pregunta94 IS NOT NULL) AND (pregunta95 IS NOT NULL) AND (pregunta96 IS NOT NULL) AND (pregunta97 IS NOT NULL) AND (pregunta98 IS NOT NULL) AND (pregunta99 IS NOT NULL) AND (pregunta100 IS NOT NULL) AND (pregunta101 IS NOT NULL) AND (pregunta102 IS NOT NULL) AND (pregunta103 IS NOT NULL) AND (pregunta104 IS NOT NULL) AND (pregunta105 IS NOT NULL) AND (pregunta106 IS NOT NULL) AND (pregunta107 IS NOT NULL) AND (pregunta108 IS NOT NULL) AND (pregunta109 IS NOT NULL) AND (pregunta110 IS NOT NULL) AND (pregunta111 IS NOT NULL) AND (pregunta112 IS NOT NULL) AND (pregunta113 IS NOT NULL) AND (pregunta114 IS NOT NULL) AND (pregunta115 IS NOT NULL) AND (pregunta116 IS NOT NULL) AND (pregunta117 IS NOT NULL) AND (pregunta118 IS NOT NULL) AND (pregunta119 IS NOT NULL) ORDER BY(p);";
                        console.log(consul);
                    }
                    else if(genero === '3')
                    {                        
                        consul = "SELECT pin as u, pregunta4 as p, consentimiento, fecha_de_fin_de_diligenciada_la_encuesta, pregunta1 FROM encuesta1 WHERE (pin LIKE '%"+id_universidad+"%')  AND (consentimiento = 'Acepto') AND (fecha_de_fin_de_diligenciada_la_encuesta IS NOT NULL) AND (pregunta1 IS NOT NULL) AND (pregunta2 IS NOT NULL) AND (pregunta3 IS NOT NULL) AND (pregunta4 IS NOT NULL) AND (pregunta5 IS NOT NULL) AND (pregunta6 IS NOT NULL) AND (pregunta7 IS NOT NULL) AND (pregunta8 IS NOT NULL) AND (pregunta9 IS NOT NULL) AND (pregunta10 IS NOT NULL) AND (pregunta11 IS NOT NULL) AND (pregunta12 IS NOT NULL) AND (pregunta13 IS NOT NULL) AND  (pregunta14 IS NOT NULL) AND  (pregunta15 IS NOT NULL) AND (pregunta16 IS NOT NULL) AND (pregunta17 IS NOT NULL) AND (pregunta18 IS NOT NULL) AND  (pregunta19 IS NOT NULL) AND  (pregunta20 IS NOT NULL) AND (pregunta21 IS NOT NULL) AND (pregunta22 IS NOT NULL) AND (pregunta23 IS NOT NULL) AND (pregunta24 IS NOT NULL) AND  (pregunta25 IS NOT NULL) AND (pregunta26 IS NOT NULL) AND (pregunta27 IS NOT NULL) AND (pregunta28 IS NOT NULL) AND  (pregunta29 IS NOT NULL) AND  (pregunta30 IS NOT NULL) AND  (pregunta31 IS NOT NULL) AND (pregunta32 IS NOT NULL) AND (pregunta33 IS NOT NULL) AND  (pregunta34 IS NOT NULL) AND  (pregunta35 IS NOT NULL) AND  (pregunta36 IS NOT NULL) AND (pregunta37 IS NOT NULL) AND (pregunta38 IS NOT NULL) AND  (pregunta39 IS NOT NULL) AND  (pregunta40 IS NOT NULL) AND  (pregunta41 IS NOT NULL) AND (pregunta42 IS NOT NULL) AND (pregunta43 IS NOT NULL) AND (pregunta44 IS NOT NULL) AND (pregunta45 IS NOT NULL) AND (pregunta46 IS NOT NULL) AND (pregunta47 IS NOT NULL) AND (pregunta48 IS NOT NULL) AND (pregunta49 IS NOT NULL) AND (pregunta50 IS NOT NULL) AND (pregunta51 IS NOT NULL) AND (pregunta52 IS NOT NULL) AND (pregunta53 IS NOT NULL) AND (pregunta54 IS NOT NULL) AND (pregunta55 IS NOT NULL) AND (pregunta56 IS NOT NULL) AND (pregunta57 IS NOT NULL) AND (pregunta58 IS NOT NULL) AND (pregunta59 IS NOT NULL) AND (pregunta60 IS NOT NULL) AND (pregunta61 IS NOT NULL) AND (pregunta62 IS NOT NULL) AND (pregunta63 IS NOT NULL) AND (pregunta64 IS NOT NULL) AND (pregunta65 IS NOT NULL) AND (pregunta66 IS NOT NULL) AND (pregunta67 IS NOT NULL) AND (pregunta68 IS NOT NULL) AND (pregunta69 IS NOT NULL) AND (pregunta70 IS NOT NULL) AND (pregunta71 IS NOT NULL) AND (pregunta72 IS NOT NULL) AND (pregunta73 IS NOT NULL) AND (pregunta74 IS NOT NULL) AND (pregunta75 IS NOT NULL) AND (pregunta76 IS NOT NULL) AND (pregunta77 IS NOT NULL) AND (pregunta78 IS NOT NULL) AND (pregunta79 IS NOT NULL) AND (pregunta80 IS NOT NULL) AND (pregunta81 IS NOT NULL) AND (pregunta82 IS NOT NULL) AND (pregunta83 IS NOT NULL) AND (pregunta84 IS NOT NULL) AND (pregunta85 IS NOT NULL) AND (pregunta86 IS NOT NULL) AND (pregunta87 IS NOT NULL) AND (pregunta88 IS NOT NULL) AND (pregunta89 IS NOT NULL) AND (pregunta90 IS NOT NULL) AND (pregunta91 IS NOT NULL) AND (pregunta92 IS NOT NULL) AND (pregunta93 IS NOT NULL) AND (pregunta94 IS NOT NULL) AND (pregunta95 IS NOT NULL) AND (pregunta96 IS NOT NULL) AND (pregunta97 IS NOT NULL) AND (pregunta98 IS NOT NULL) AND (pregunta99 IS NOT NULL) AND (pregunta100 IS NOT NULL) AND (pregunta101 IS NOT NULL) AND (pregunta102 IS NOT NULL) AND (pregunta103 IS NOT NULL) AND (pregunta104 IS NOT NULL) AND (pregunta105 IS NOT NULL) AND (pregunta106 IS NOT NULL) AND (pregunta107 IS NOT NULL) AND (pregunta108 IS NOT NULL) AND (pregunta109 IS NOT NULL) AND (pregunta110 IS NOT NULL) AND (pregunta111 IS NOT NULL) AND (pregunta112 IS NOT NULL) AND (pregunta113 IS NOT NULL) AND (pregunta114 IS NOT NULL) AND (pregunta115 IS NOT NULL) AND (pregunta116 IS NOT NULL) AND (pregunta117 IS NOT NULL) AND (pregunta118 IS NOT NULL) AND (pregunta119 IS NOT NULL) ORDER BY(p);";
                        console.log(consul);
                    }
                    enviarConsulta(consul, id_consulta, id_universidad, 0 ,0);
                    break;
                }
                case 11:/*Total codigos por universidad por facultad*/
                {
                    console.log("--->"+genero);
                    if (genero === '1')
                    {
                        consul = "SELECT pin as u, pregunta4 as p, consentimiento, fecha_de_fin_de_diligenciada_la_encuesta, pregunta1 FROM encuesta1 WHERE (pin LIKE '%"+id_universidad+"%') AND (pregunta4 ILIKE '%"+facultad+"%') AND (pregunta1 ILIKE '%Masculino%') AND (consentimiento = 'Acepto') AND (fecha_de_fin_de_diligenciada_la_encuesta IS NOT NULL) AND (pregunta1 IS NOT NULL) AND (pregunta2 IS NOT NULL) AND (pregunta3 IS NOT NULL) AND (pregunta4 IS NOT NULL) AND (pregunta5 IS NOT NULL) AND (pregunta6 IS NOT NULL) AND (pregunta7 IS NOT NULL) AND (pregunta8 IS NOT NULL) AND (pregunta9 IS NOT NULL) AND (pregunta10 IS NOT NULL) AND (pregunta11 IS NOT NULL) AND (pregunta12 IS NOT NULL) AND (pregunta13 IS NOT NULL) AND  (pregunta14 IS NOT NULL) AND  (pregunta15 IS NOT NULL) AND (pregunta16 IS NOT NULL) AND (pregunta17 IS NOT NULL) AND (pregunta18 IS NOT NULL) AND  (pregunta19 IS NOT NULL) AND  (pregunta20 IS NOT NULL) AND (pregunta21 IS NOT NULL) AND (pregunta22 IS NOT NULL) AND (pregunta23 IS NOT NULL) AND (pregunta24 IS NOT NULL) AND  (pregunta25 IS NOT NULL) AND (pregunta26 IS NOT NULL) AND (pregunta27 IS NOT NULL) AND (pregunta28 IS NOT NULL) AND  (pregunta29 IS NOT NULL) AND  (pregunta30 IS NOT NULL) AND  (pregunta31 IS NOT NULL) AND (pregunta32 IS NOT NULL) AND (pregunta33 IS NOT NULL) AND  (pregunta34 IS NOT NULL) AND  (pregunta35 IS NOT NULL) AND  (pregunta36 IS NOT NULL) AND (pregunta37 IS NOT NULL) AND (pregunta38 IS NOT NULL) AND  (pregunta39 IS NOT NULL) AND  (pregunta40 IS NOT NULL) AND  (pregunta41 IS NOT NULL) AND (pregunta42 IS NOT NULL) AND (pregunta43 IS NOT NULL) AND (pregunta44 IS NOT NULL) AND (pregunta45 IS NOT NULL) AND (pregunta46 IS NOT NULL) AND (pregunta47 IS NOT NULL) AND (pregunta48 IS NOT NULL) AND (pregunta49 IS NOT NULL) AND (pregunta50 IS NOT NULL) AND (pregunta51 IS NOT NULL) AND (pregunta52 IS NOT NULL) AND (pregunta53 IS NOT NULL) AND (pregunta54 IS NOT NULL) AND (pregunta55 IS NOT NULL) AND (pregunta56 IS NOT NULL) AND (pregunta57 IS NOT NULL) AND (pregunta58 IS NOT NULL) AND (pregunta59 IS NOT NULL) AND (pregunta60 IS NOT NULL) AND (pregunta61 IS NOT NULL) AND (pregunta62 IS NOT NULL) AND (pregunta63 IS NOT NULL) AND (pregunta64 IS NOT NULL) AND (pregunta65 IS NOT NULL) AND (pregunta66 IS NOT NULL) AND (pregunta67 IS NOT NULL) AND (pregunta68 IS NOT NULL) AND (pregunta69 IS NOT NULL) AND (pregunta70 IS NOT NULL) AND (pregunta71 IS NOT NULL) AND (pregunta72 IS NOT NULL) AND (pregunta73 IS NOT NULL) AND (pregunta74 IS NOT NULL) AND (pregunta75 IS NOT NULL) AND (pregunta76 IS NOT NULL) AND (pregunta77 IS NOT NULL) AND (pregunta78 IS NOT NULL) AND (pregunta79 IS NOT NULL) AND (pregunta80 IS NOT NULL) AND (pregunta81 IS NOT NULL) AND (pregunta82 IS NOT NULL) AND (pregunta83 IS NOT NULL) AND (pregunta84 IS NOT NULL) AND (pregunta85 IS NOT NULL) AND (pregunta86 IS NOT NULL) AND (pregunta87 IS NOT NULL) AND (pregunta88 IS NOT NULL) AND (pregunta89 IS NOT NULL) AND (pregunta90 IS NOT NULL) AND (pregunta91 IS NOT NULL) AND (pregunta92 IS NOT NULL) AND (pregunta93 IS NOT NULL) AND (pregunta94 IS NOT NULL) AND (pregunta95 IS NOT NULL) AND (pregunta96 IS NOT NULL) AND (pregunta97 IS NOT NULL) AND (pregunta98 IS NOT NULL) AND (pregunta99 IS NOT NULL) AND (pregunta100 IS NOT NULL) AND (pregunta101 IS NOT NULL) AND (pregunta102 IS NOT NULL) AND (pregunta103 IS NOT NULL) AND (pregunta104 IS NOT NULL) AND (pregunta105 IS NOT NULL) AND (pregunta106 IS NOT NULL) AND (pregunta107 IS NOT NULL) AND (pregunta108 IS NOT NULL) AND (pregunta109 IS NOT NULL) AND (pregunta110 IS NOT NULL) AND (pregunta111 IS NOT NULL) AND (pregunta112 IS NOT NULL) AND (pregunta113 IS NOT NULL) AND (pregunta114 IS NOT NULL) AND (pregunta115 IS NOT NULL) AND (pregunta116 IS NOT NULL) AND (pregunta117 IS NOT NULL) AND (pregunta118 IS NOT NULL) AND (pregunta119 IS NOT NULL) ORDER BY(p);";
                        console.log(consul);
                    }
                    else if(genero === '2')
                    {                        
                        consul = "SELECT pin as u, pregunta4 as p, consentimiento, fecha_de_fin_de_diligenciada_la_encuesta, pregunta1 FROM encuesta1 WHERE (pin LIKE '%"+id_universidad+"%') AND (pregunta4 ILIKE '%"+facultad+"%') (pregunta1 ILIKE '%Femenino%') AND (consentimiento = 'Acepto') AND (fecha_de_fin_de_diligenciada_la_encuesta IS NOT NULL) AND (pregunta1 IS NOT NULL) AND (pregunta2 IS NOT NULL) AND (pregunta3 IS NOT NULL) AND (pregunta4 IS NOT NULL) AND (pregunta5 IS NOT NULL) AND (pregunta6 IS NOT NULL) AND (pregunta7 IS NOT NULL) AND (pregunta8 IS NOT NULL) AND (pregunta9 IS NOT NULL) AND (pregunta10 IS NOT NULL) AND (pregunta11 IS NOT NULL) AND (pregunta12 IS NOT NULL) AND (pregunta13 IS NOT NULL) AND  (pregunta14 IS NOT NULL) AND  (pregunta15 IS NOT NULL) AND (pregunta16 IS NOT NULL) AND (pregunta17 IS NOT NULL) AND (pregunta18 IS NOT NULL) AND  (pregunta19 IS NOT NULL) AND  (pregunta20 IS NOT NULL) AND (pregunta21 IS NOT NULL) AND (pregunta22 IS NOT NULL) AND (pregunta23 IS NOT NULL) AND (pregunta24 IS NOT NULL) AND  (pregunta25 IS NOT NULL) AND (pregunta26 IS NOT NULL) AND (pregunta27 IS NOT NULL) AND (pregunta28 IS NOT NULL) AND  (pregunta29 IS NOT NULL) AND  (pregunta30 IS NOT NULL) AND  (pregunta31 IS NOT NULL) AND (pregunta32 IS NOT NULL) AND (pregunta33 IS NOT NULL) AND  (pregunta34 IS NOT NULL) AND  (pregunta35 IS NOT NULL) AND  (pregunta36 IS NOT NULL) AND (pregunta37 IS NOT NULL) AND (pregunta38 IS NOT NULL) AND  (pregunta39 IS NOT NULL) AND  (pregunta40 IS NOT NULL) AND  (pregunta41 IS NOT NULL) AND (pregunta42 IS NOT NULL) AND (pregunta43 IS NOT NULL) AND (pregunta44 IS NOT NULL) AND (pregunta45 IS NOT NULL) AND (pregunta46 IS NOT NULL) AND (pregunta47 IS NOT NULL) AND (pregunta48 IS NOT NULL) AND (pregunta49 IS NOT NULL) AND (pregunta50 IS NOT NULL) AND (pregunta51 IS NOT NULL) AND (pregunta52 IS NOT NULL) AND (pregunta53 IS NOT NULL) AND (pregunta54 IS NOT NULL) AND (pregunta55 IS NOT NULL) AND (pregunta56 IS NOT NULL) AND (pregunta57 IS NOT NULL) AND (pregunta58 IS NOT NULL) AND (pregunta59 IS NOT NULL) AND (pregunta60 IS NOT NULL) AND (pregunta61 IS NOT NULL) AND (pregunta62 IS NOT NULL) AND (pregunta63 IS NOT NULL) AND (pregunta64 IS NOT NULL) AND (pregunta65 IS NOT NULL) AND (pregunta66 IS NOT NULL) AND (pregunta67 IS NOT NULL) AND (pregunta68 IS NOT NULL) AND (pregunta69 IS NOT NULL) AND (pregunta70 IS NOT NULL) AND (pregunta71 IS NOT NULL) AND (pregunta72 IS NOT NULL) AND (pregunta73 IS NOT NULL) AND (pregunta74 IS NOT NULL) AND (pregunta75 IS NOT NULL) AND (pregunta76 IS NOT NULL) AND (pregunta77 IS NOT NULL) AND (pregunta78 IS NOT NULL) AND (pregunta79 IS NOT NULL) AND (pregunta80 IS NOT NULL) AND (pregunta81 IS NOT NULL) AND (pregunta82 IS NOT NULL) AND (pregunta83 IS NOT NULL) AND (pregunta84 IS NOT NULL) AND (pregunta85 IS NOT NULL) AND (pregunta86 IS NOT NULL) AND (pregunta87 IS NOT NULL) AND (pregunta88 IS NOT NULL) AND (pregunta89 IS NOT NULL) AND (pregunta90 IS NOT NULL) AND (pregunta91 IS NOT NULL) AND (pregunta92 IS NOT NULL) AND (pregunta93 IS NOT NULL) AND (pregunta94 IS NOT NULL) AND (pregunta95 IS NOT NULL) AND (pregunta96 IS NOT NULL) AND (pregunta97 IS NOT NULL) AND (pregunta98 IS NOT NULL) AND (pregunta99 IS NOT NULL) AND (pregunta100 IS NOT NULL) AND (pregunta101 IS NOT NULL) AND (pregunta102 IS NOT NULL) AND (pregunta103 IS NOT NULL) AND (pregunta104 IS NOT NULL) AND (pregunta105 IS NOT NULL) AND (pregunta106 IS NOT NULL) AND (pregunta107 IS NOT NULL) AND (pregunta108 IS NOT NULL) AND (pregunta109 IS NOT NULL) AND (pregunta110 IS NOT NULL) AND (pregunta111 IS NOT NULL) AND (pregunta112 IS NOT NULL) AND (pregunta113 IS NOT NULL) AND (pregunta114 IS NOT NULL) AND (pregunta115 IS NOT NULL) AND (pregunta116 IS NOT NULL) AND (pregunta117 IS NOT NULL) AND (pregunta118 IS NOT NULL) AND (pregunta119 IS NOT NULL) ORDER BY(p);";
                        console.log(consul);
                    }
                    else if(genero === '3')
                    {                        
                        consul = "SELECT pin as u, pregunta4 as p, consentimiento, fecha_de_fin_de_diligenciada_la_encuesta, pregunta1 FROM encuesta1 WHERE (pin LIKE '%"+id_universidad+"%') AND (pregunta4 ILIKE '%"+facultad+"%') AND (consentimiento = 'Acepto') AND (fecha_de_fin_de_diligenciada_la_encuesta IS NOT NULL) AND (pregunta1 IS NOT NULL) AND (pregunta2 IS NOT NULL) AND (pregunta3 IS NOT NULL) AND (pregunta4 IS NOT NULL) AND (pregunta5 IS NOT NULL) AND (pregunta6 IS NOT NULL) AND (pregunta7 IS NOT NULL) AND (pregunta8 IS NOT NULL) AND (pregunta9 IS NOT NULL) AND (pregunta10 IS NOT NULL) AND (pregunta11 IS NOT NULL) AND (pregunta12 IS NOT NULL) AND (pregunta13 IS NOT NULL) AND  (pregunta14 IS NOT NULL) AND  (pregunta15 IS NOT NULL) AND (pregunta16 IS NOT NULL) AND (pregunta17 IS NOT NULL) AND (pregunta18 IS NOT NULL) AND  (pregunta19 IS NOT NULL) AND  (pregunta20 IS NOT NULL) AND (pregunta21 IS NOT NULL) AND (pregunta22 IS NOT NULL) AND (pregunta23 IS NOT NULL) AND (pregunta24 IS NOT NULL) AND  (pregunta25 IS NOT NULL) AND (pregunta26 IS NOT NULL) AND (pregunta27 IS NOT NULL) AND (pregunta28 IS NOT NULL) AND  (pregunta29 IS NOT NULL) AND  (pregunta30 IS NOT NULL) AND  (pregunta31 IS NOT NULL) AND (pregunta32 IS NOT NULL) AND (pregunta33 IS NOT NULL) AND  (pregunta34 IS NOT NULL) AND  (pregunta35 IS NOT NULL) AND  (pregunta36 IS NOT NULL) AND (pregunta37 IS NOT NULL) AND (pregunta38 IS NOT NULL) AND  (pregunta39 IS NOT NULL) AND  (pregunta40 IS NOT NULL) AND  (pregunta41 IS NOT NULL) AND (pregunta42 IS NOT NULL) AND (pregunta43 IS NOT NULL) AND (pregunta44 IS NOT NULL) AND (pregunta45 IS NOT NULL) AND (pregunta46 IS NOT NULL) AND (pregunta47 IS NOT NULL) AND (pregunta48 IS NOT NULL) AND (pregunta49 IS NOT NULL) AND (pregunta50 IS NOT NULL) AND (pregunta51 IS NOT NULL) AND (pregunta52 IS NOT NULL) AND (pregunta53 IS NOT NULL) AND (pregunta54 IS NOT NULL) AND (pregunta55 IS NOT NULL) AND (pregunta56 IS NOT NULL) AND (pregunta57 IS NOT NULL) AND (pregunta58 IS NOT NULL) AND (pregunta59 IS NOT NULL) AND (pregunta60 IS NOT NULL) AND (pregunta61 IS NOT NULL) AND (pregunta62 IS NOT NULL) AND (pregunta63 IS NOT NULL) AND (pregunta64 IS NOT NULL) AND (pregunta65 IS NOT NULL) AND (pregunta66 IS NOT NULL) AND (pregunta67 IS NOT NULL) AND (pregunta68 IS NOT NULL) AND (pregunta69 IS NOT NULL) AND (pregunta70 IS NOT NULL) AND (pregunta71 IS NOT NULL) AND (pregunta72 IS NOT NULL) AND (pregunta73 IS NOT NULL) AND (pregunta74 IS NOT NULL) AND (pregunta75 IS NOT NULL) AND (pregunta76 IS NOT NULL) AND (pregunta77 IS NOT NULL) AND (pregunta78 IS NOT NULL) AND (pregunta79 IS NOT NULL) AND (pregunta80 IS NOT NULL) AND (pregunta81 IS NOT NULL) AND (pregunta82 IS NOT NULL) AND (pregunta83 IS NOT NULL) AND (pregunta84 IS NOT NULL) AND (pregunta85 IS NOT NULL) AND (pregunta86 IS NOT NULL) AND (pregunta87 IS NOT NULL) AND (pregunta88 IS NOT NULL) AND (pregunta89 IS NOT NULL) AND (pregunta90 IS NOT NULL) AND (pregunta91 IS NOT NULL) AND (pregunta92 IS NOT NULL) AND (pregunta93 IS NOT NULL) AND (pregunta94 IS NOT NULL) AND (pregunta95 IS NOT NULL) AND (pregunta96 IS NOT NULL) AND (pregunta97 IS NOT NULL) AND (pregunta98 IS NOT NULL) AND (pregunta99 IS NOT NULL) AND (pregunta100 IS NOT NULL) AND (pregunta101 IS NOT NULL) AND (pregunta102 IS NOT NULL) AND (pregunta103 IS NOT NULL) AND (pregunta104 IS NOT NULL) AND (pregunta105 IS NOT NULL) AND (pregunta106 IS NOT NULL) AND (pregunta107 IS NOT NULL) AND (pregunta108 IS NOT NULL) AND (pregunta109 IS NOT NULL) AND (pregunta110 IS NOT NULL) AND (pregunta111 IS NOT NULL) AND (pregunta112 IS NOT NULL) AND (pregunta113 IS NOT NULL) AND (pregunta114 IS NOT NULL) AND (pregunta115 IS NOT NULL) AND (pregunta116 IS NOT NULL) AND (pregunta117 IS NOT NULL) AND (pregunta118 IS NOT NULL) AND (pregunta119 IS NOT NULL) ORDER BY(p);";
                        console.log(consul);
                    }
                    enviarConsulta(consul, id_consulta, id_universidad, id_facultad ,0);
                    id_universidad = '';
                    id_facultad = '';
                    break;
                }
                case 12:/*Total codigos por universidad por facultad*/
                {
                    break;
                }
                default :
                {
//                    consul = "SELECT pin FROM encuesta1;"                   
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


function enviarConsulta(consulta, id_consul, id_uni, id_fac, id_pro)
{
    $.ajax({
        url:"../../../../../indice_encuestas.php",
        type: "POST",
        data:"sql_listado="+consulta+"&id_consulta="+id_consul+"&id_uni="+id_uni+"&id_fac="+id_fac+"&id_pro="+id_pro,
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
            url:"../../../../../indice_encuestado.php",
            type: "POST",
            data:"id_facultad="+id_fac,
            success: function(opciones)
            {               
                $("#id_programa").html(opciones);            
                $('#id_programa').selectpicker('refresh');
            }
        });  
    
}


function omitirAcentos(text) {

    var acentos = "ÃÀÁÄÂÈÉËÊÌÍÏÎÒÓÖÔÙÚÜÛãàáäâèéëêìíïîòóöôùúüûÑñÇç/";
    var original = "AAAAAEEEEIIIIOOOOUUUUaaaaaeeeeiiiioooouuuunncc";
    for (var i = 0; i < acentos.length; i++) {

        text = text.replace(acentos.charAt(i), original.charAt(i));
    }

    return text;
}