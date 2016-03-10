
var spromesa;
$(document).ready(function(){

	$("#grafica1").empty();
	$("#grafica1").html("<center><img  src='../../images/hex-loader2.gif' class='img-responsive'>Cargando...</center>").delay(1000).queue(function() {
		$("#grafica1").empty();
		spromesa = new Bubbles(JSON.parse(crearResumenJSON()),"#grafica1","#grafica2");
    });
});

/***************************************************************************************************************************************************************************************************************************/
function omitirAcentos(text) {

    var acentos = "ÃÀÁÄÂÈÉËÊÌÍÏÎÒÓÖÔÙÚÜÛãàáäâèéëêìíïîòóöôùúüûÑñÇç/";
    var original = "AAAAAEEEEIIIIOOOOUUUUaaaaaeeeeiiiioooouuuunncc";
    for (var i = 0; i < acentos.length; i++) {

        text = text.replace(acentos.charAt(i), original.charAt(i));
    }

    return text;
}

function crearResumenJSON(){
	var consulta = "select id_encuesta,titulo from encuesta where estado = 'Activada' order by(id_encuesta)";

	datos = $.ajax({
		url:"../../../../../indice_analiticas_avanzadas.php",
		// url:"../../../../../indice_analiticas.php",
		type:'post',
		dataType:'json',
		async:false,
		data:"sql_analisis4="+consulta,
		success:function(){},
	}).responseText;

	var temp=[];
	var treeData = JSON.parse(datos);
	JSON.parse(datos).forEach(function(node,index) {
		consulta = "select * from modulo,modulos_encuesta where id_encuesta = "+node.id_encuesta+" and modulos_encuesta.id_modulo=modulo.id_modulo order by(modulo.id_modulo)";
		var tablaencuesta= "encuesta"+node.id_encuesta
		// console.log("consulta "+consulta)
		var tablaencuesta= "encuesta"+node.id_encuesta
		// var id_encuesta = node.id_encuesta;
		datos = $.ajax({
			url:"../../../../../indice_analiticas_avanzadas.php",
			type:'post',
			dataType:'json',
			async:false,
			data:"sql_analisis4="+consulta,
			success:function(){},
		}).responseText;
		// console.log("id1 "+index+" * "+node.titulo)
		
		if(datos=="null\n"|| datos=="null"){
			temp.push({"text" : node.titulo, "value" : node.id_encuesta,"ver":"Ver modulos","parent" : "SURVEY ENCUESTA","value" : "Sin modulos","count":0,"id":index, "parrafo": "<p>Aquí se visualiza la información de los módulos o secciones correspondientes de la encuesta que se seleccionó mostrando la cantidad de preguntas que contiene. Para ver su contenido se da clic en el link ver preguntas. </p>",tipo:"encuestas"});
			return;
		}else{
			temp.push({"text" : node.titulo, "value" : node.id_encuesta,"ver":"Ver modulos","parent" : "SURVEY ENCUESTA","value" : JSON.parse(datos).length+" modulos","count":JSON.parse(datos).length,"id":index, "parrafo": "<p>Aquí se visualiza la información de los módulos o secciones correspondientes de la encuesta que se seleccionó mostrando la cantidad de preguntas que contiene. Para ver su contenido se da clic en el link ver preguntas. </p>",tipo:"encuestas"});
		}
		var padre=node.titulo;
		var mtemp=[];
		JSON.parse(datos).forEach(function(node,index) {
			consulta = "select * from pregunta where id_modulo="+node.id_modulo+" order by(id_pregunta)";
			datos = $.ajax({
				url:"../../../../../indice_analiticas_avanzadas.php",
				type:'post',
				dataType:'json',
				async:false,
				data:"sql_analisis4="+consulta,
				success:function(){},
			}).responseText;
			// console.log("id2 "+index+" * "+node.descripcion)
			if(datos=="null\n" || datos=="null"){
				mtemp.push({"text" : node.descripcion, "value" : node.id_modulo,"ver":"Ver preguntas","parent" : padre,"value" : "Sin preguntas","count":0,"id":index,tipo:"modulos"});
				return;
			}else{
				mtemp.push({"text" : node.descripcion, "value" : node.id_modulo,"ver":"Ver preguntas","parent" : padre, "value" : JSON.parse(datos).length+" preguntas","count":JSON.parse(datos).length,"id":index ,"parrafo": "<p>Aquí se visualiza la información de las preguntas correspondiente al módulo que se seleccionó. Para ver su contenido se da clic ver datos y se mostrará gráficas de tipo barras indicando la cantidad de personas que respondieron esa pregunta y cuantas no la respondieron.</p>",tipo:"modulos"});
			}
			padre=node.descripcion;
			var ptemp=[];
			JSON.parse(datos).forEach(function(node,index) {
				ptemp.push({"text" : node.texto_pregunta, "value" : node.id_pregunta,"ver":"Ver datos","parent" : padre, "value" :"","count":1,"id":index ,"tablaencuesta":tablaencuesta,"num_pregunta":node.num_pregunta ,"parrafo": "<p>Aquí se visualiza la información de las preguntas correspondiente al módulo que se seleccionó. Para ver su contenido se da clic ver datos y se mostrará gráficas de tipo barras indicando la cantidad de personas que respondieron esa pregunta y cuantas no la respondieron.</p>", tipo:"preguntas" });
			});
			mtemp[(mtemp.length-1)]['children']=ptemp;
		});
		// console.log(temp[(temp.length-1)].text+" * "+mtemp[(mtemp.length-2)].children)
		// console.log(mtemp)
		// console.log(temp)
		temp[(temp.length-1)]['children']=mtemp;
	});	
	
	var treeMap = '{ "text" : "SURVEY PROMESA","ver":"Ver encuestas", "parent" : "null","id":0,"value" : "Bienvenid@","count":-1,"children" :';
	return treeMap+JSON.stringify(temp)+', "parrafo": "<p align=justify>Aquí se visualizan las encuestas activas en el sistema indicando cuantos módulos o secciones contienen, para ver su contenido debes dar clic en la que desees consultar en el link ver módulos.</p>", "tipo":"encuestas" }';

}

// $(document).ready(function(){

// 	$("#grafica1").empty();
// 	$("#grafica2").empty();

// 	var alldata = [];
// 	alldata.push(c3totalencuesta());
// 	// alldata.push(c3PastelPregunta24());
// 	// alldata.push(c3PastelPregunta17());
// 	// alldata.push(c3PastelPregunta16());

// 	// alldata.push(c3PastelPregunta28());
// 	// alldata.push(c3PastelPregunta30());
// 	// alldata.push(c3PastelPregunta30b());

// 	// alldata.push(c3PastelPregunta30c());
// 	// alldata.push(c3PastelPregunta30d());
// 	// alldata.push(c3PastelPregunta30e());

// 	// alldata.push(c3PastelPregunta30f());
// 	// alldata.push(c3PastelPregunta37());
// 	// alldata.push(c3PastelPregunta55());

// 	// alldata.push(c3PastelPregunta58());
// 	// alldata.push(c3PastelPregunta71());
// 	// alldata.push(c3PastelPregunta93());

// 	// //~ c3PastelPregunta94();
// 	// alldata.push(c3PastelPregunta99());
// 	// alldata.push(c3PastelPregunta107());
// 	// alldata.push(c3PastelPregunta113());

// 	new Bubbles(alldata,"#grafica1","#grafica2");
// });

// /***************************************************************************************************************************************************************************************************************************/
// /***************************************************************************************************************************************************************************************************************************/
// function c3totalencuesta(){
// 	var consulta = "SELECT pin_u, count(pin_u) as cantidad FROM hecho_respuestas_encuesta1  WHERE (pin_u IS NOT NULL) GROUP BY (pin_u) ORDER BY(pin_u);";
// 	console.log(consulta);
// 	datos = $.ajax({
// 		url:"../../../../../indice_analiticas_avanzadas.php",
// 		type:'post',
// 		dataType:'json',
// 		async:false,
// 		data:"sql_analisis1="+consulta,
// 		success:function(){},
// 	}).responseText;
// 	datos = JSON.parse(JSON.stringify(JSON.parse(datos)[0]));
// 	datos.names= {};
// 	datos.title="Participación estudiantil según universidad, Cali 2014.";
// 	return datos;
// }
// function c3PastelPregunta24(){
// 	var consulta = "SELECT pregunta24, count(pregunta24) as cantidad FROM hecho_respuestas_encuesta1  WHERE (pregunta24 IS NOT NULL) GROUP BY (pregunta24) ORDER BY (pregunta24);";
// 	console.log(consulta);
// 	datos = $.ajax({
// 		url:"../../../../../indice_analiticas_avanzadas.php",
// 		type:'post',
// 		dataType:'json',
// 		async:false,
// 		data:"sql_analisis="+consulta+"&id_pre=24",
// 		success:function(){},
// 	}).responseText;
// 		console.log("lo que llega "+datos);
// 	datos = JSON.parse(JSON.stringify(JSON.parse(datos)[0]));
// 	datos.names= { 
// 		1:'Estrato uno', 
// 		2:'Estrato dos', 
// 		3:'Estrato tres', 
// 		4:'Estrato cuatro', 
// 		5:'Estrato cinco', 
// 		6:'Estrato seis', 
// 		7:'No sabe/NR', 
// 		8:'No respondio'
//     };
// 	datos.title="Clasificación socioeconómica según estrato estudiantes universitarios Cali, 2014.";
// 	console.log(datos);
// 	return datos;
// }
// function c3PastelPregunta17(){
// 	var consulta = "SELECT pregunta17a, count(pregunta17a) as cantidad FROM hecho_respuestas_encuesta1 WHERE (pregunta17a ='1') GROUP BY(pregunta17a) UNION SELECT pregunta17b, count(pregunta17b) FROM hecho_respuestas_encuesta1 WHERE (pregunta17b ='2') GROUP BY(pregunta17b) UNION SELECT pregunta17c, count(pregunta17c) FROM hecho_respuestas_encuesta1 WHERE (pregunta17c ='3') GROUP BY(pregunta17c) UNION SELECT pregunta17d, count(pregunta17d) FROM hecho_respuestas_encuesta1 WHERE (pregunta17d ='4') GROUP BY(pregunta17d) UNION SELECT pregunta17e, count(pregunta17e) FROM hecho_respuestas_encuesta1 WHERE (pregunta17e ='5') GROUP BY(pregunta17e) UNION SELECT pregunta17f, count(pregunta17f) FROM hecho_respuestas_encuesta1 WHERE (pregunta17f ='6') GROUP BY(pregunta17f) UNION SELECT pregunta17g, count(pregunta17g) FROM hecho_respuestas_encuesta1 WHERE (pregunta17g ILIKE '%Otro acudiente%') GROUP BY(pregunta17g) UNION SELECT pregunta17h, count(pregunta17h) FROM hecho_respuestas_encuesta1 WHERE (pregunta17h ILIKE '%No respondio%') GROUP BY(pregunta17h) ORDER BY(pregunta17a);";
// 	console.log(consulta);
// 	datos = $.ajax({
// 		url:"../../../../../indice_analiticas_avanzadas.php",
// 		type:'post',
// 		dataType:'json',
// 		async:false,
// 		data:"sql_analisis2="+consulta+"&id_pre1=17",
// 		success:function(){},
// 	}).responseText;
// 	console.log("lo que llega "+datos);
// 	datos = JSON.parse(JSON.stringify(JSON.parse(datos)[0]))
// 	datos.names={ 
// 			1:'Padre', 
// 			2:'Madre', 
// 			3:'Ambos Padres', 
// 			4:'Padre(s) y Propios', 
// 			5:'Solo propios', 
// 			6:'Prestamo', 
// 			7:'Otro acudiente', 
// 			8:'No respondiò'
//         };
// 	datos.title="Procedencia de ingresos económicos para  sostenimiento de estudiantes universitarios Cali, 2014.";
// 	return datos;
	
// }
// function c3PastelPregunta16(){
// 	var consulta = "SELECT pregunta16, count(pregunta16) as cantidad FROM hecho_respuestas_encuesta1  WHERE (pregunta16 IS NOT NULL) GROUP BY (pregunta16) ORDER BY (pregunta16)";
// 	console.log(consulta);
// 	datos = $.ajax({
// 		url:"../../../../../indice_analiticas_avanzadas.php",
// 		type:'post',
// 		dataType:'json',
// 		async:false,
// 		data:"sql_analisis="+consulta+"&id_pre=16",
// 		success:function(){},
// 	}).responseText;
// 	console.log("lo que llega "+datos);
// 	datos = JSON.parse(JSON.stringify(JSON.parse(datos)[0]))
// 	datos.names={ 
// 			1:'Nunca', 
// 			2:'Casi nunca', 
// 			3:'A veces', 
// 			4:'Casi siempre', 
// 			5:'Siempre', 
// 			6:'No respondio'
//         };
// 	datos.title="Percepción de riesgo académico en estudiantes universitarios Cali, 2014";	
// 	return datos;
// }

// function c3PastelPregunta28(){
// 	var consulta = "SELECT pregunta28a, count(pregunta28a) as cantidad FROM hecho_respuestas_encuesta1 WHERE (pregunta28a ='1') GROUP BY(pregunta28a) UNION SELECT pregunta28b, count(pregunta28b) FROM hecho_respuestas_encuesta1 WHERE (pregunta28b ='2') GROUP BY(pregunta28b) UNION SELECT pregunta28c, count(pregunta28c) FROM hecho_respuestas_encuesta1 WHERE (pregunta28c ='3') GROUP BY(pregunta28c) UNION SELECT pregunta28d, count(pregunta28d) FROM hecho_respuestas_encuesta1 WHERE (pregunta28d ='4') GROUP BY(pregunta28d) UNION SELECT pregunta28e, count(pregunta28e) FROM hecho_respuestas_encuesta1 WHERE (pregunta28e ='5') GROUP BY(pregunta28e) UNION SELECT pregunta28f, count(pregunta28f) FROM hecho_respuestas_encuesta1 WHERE (pregunta28f ='6') GROUP BY(pregunta28f) ORDER BY(pregunta28a);";
// 	//var consulta = "SELECT pregunta28a, count(pregunta28a) as cantidad FROM hecho_respuestas_encuesta1 WHERE (pregunta28a ILIKE '%Profesional y otros%') GROUP BY(pregunta28a) UNION SELECT pregunta28b, count(pregunta28b) FROM hecho_respuestas_encuesta1 WHERE (pregunta28b ILIKE '%Amigos%') GROUP BY(pregunta28b) UNION SELECT pregunta28d, count(pregunta28d) FROM hecho_respuestas_encuesta1 WHERE (pregunta28d ILIKE '%No acudi a nadie%') GROUP BY(pregunta28d) UNION SELECT pregunta28e, count(pregunta28e) FROM hecho_respuestas_encuesta1 WHERE (pregunta28e ILIKE '%No aplica%') GROUP BY(pregunta28e) UNION SELECT pregunta28f, count(pregunta28f) FROM hecho_respuestas_encuesta1 WHERE (pregunta28f ILIKE '%No respondio%') GROUP BY(pregunta28f) ORDER BY(pregunta28a);";
// 	console.log(consulta);
// 	datos = $.ajax({
// 		url:"../../../../../indice_analiticas_avanzadas.php",
// 		type:'post',
// 		dataType:'json',
// 		async:false,
// 		data:"sql_analisis2="+consulta+"&id_pre1=28",
// 		success:function(){},
// 	}).responseText;
// 	console.log("lo que llega "+datos);
// 	datos = JSON.parse(JSON.stringify(JSON.parse(datos)[0]))
// 	datos.names={ 
// 			1:'Profesional y otros', 
// 			2:'Amigos', 
// 			3:'Familiar', 
// 			4:'No acudí a nadie', 
// 			5:'No aplica', 
// 			6:'No respondiò'
//         };
// 	datos.title="Dialogo previo sobre sexualidad antes del inicio de relaciones  sexuales Estudiantes universitarios Cali, 2014";	
// 	return datos;
// }
// function c3PastelPregunta30(){
// 	var consulta = "SELECT pregunta30a, count(pregunta30a) as cantidad FROM hecho_respuestas_encuesta1 WHERE (pregunta30a = '1') GROUP BY(pregunta30a) UNION SELECT pregunta30a, count(pregunta30a) FROM hecho_respuestas_encuesta1 WHERE (pregunta30a = '2') GROUP BY(pregunta30a) UNION SELECT pregunta30a, count(pregunta30a) FROM hecho_respuestas_encuesta1 WHERE (pregunta30a = '3') GROUP BY(pregunta30a) ORDER BY (pregunta30a)";
// 	console.log(consulta);
// 	datos = $.ajax({
// 		url:"../../../../../indice_analiticas_avanzadas.php",
// 		type:'post',
// 		dataType:'json',
// 		async:false,
// 	   data:"sql_analisis2="+consulta+"&id_pre1=30",
// 		success:function(){},
// 	}).responseText;
// 	console.log("lo que llega "+datos);
// 	datos = JSON.parse(JSON.stringify(JSON.parse(datos)[0]))
// 	datos.names={ 
// 			1:'Si', 
// 			2:'No', 
// 			3:'No sabe', 
// 			4:'No respondio'
//         };
// 	datos.title="Concertación con la pareja en temas de sexualidad estudiantes universitarios Cali, 2014 /n Evitar o posponer una práctica  sexual";	
// 	return datos;
// }
// function c3PastelPregunta30b(){
// 	var consulta = "SELECT pregunta30b, count(pregunta30b) as cantidad FROM hecho_respuestas_encuesta1 WHERE (pregunta30b = '1') GROUP BY(pregunta30b) UNION SELECT pregunta30b, count(pregunta30b) FROM hecho_respuestas_encuesta1 WHERE (pregunta30b = '2') GROUP BY(pregunta30b) UNION SELECT pregunta30b, count(pregunta30b) FROM hecho_respuestas_encuesta1 WHERE (pregunta30b = '3') GROUP BY(pregunta30b) ORDER BY (pregunta30b)";
// 	console.log(consulta);
// 	datos = $.ajax({
// 		url:"../../../../../indice_analiticas_avanzadas.php",
// 		type:'post',
// 		dataType:'json',
// 		async:false,
// 	   data:"sql_analisis3="+consulta+"&id_pre2=30&id_letra=b",
// 		success:function(){},
// 	}).responseText;
// 	console.log("lo que llega "+datos);
// 	datos = JSON.parse(JSON.stringify(JSON.parse(datos)[0]))
// 	datos.names={ 
// 		1:'Si', 
// 		2:'No', 
// 		3:'No sabe', 
// 		4:'No respondio'
//     };
// 	datos.title="Concertación con la pareja en temas de sexualidad estudiantes universitarios Cali, 2014 /n Cosas que te gustan o te disgustan en las prácticas sexuales";
// 	return datos;
// }
// function c3PastelPregunta30c(){
// 	var consulta = "SELECT pregunta30c, count(pregunta30c) as cantidad FROM hecho_respuestas_encuesta1 WHERE (pregunta30c = '1') GROUP BY(pregunta30c) UNION SELECT pregunta30c, count(pregunta30c) FROM hecho_respuestas_encuesta1 WHERE (pregunta30c = '2') GROUP BY(pregunta30c) UNION SELECT pregunta30c, count(pregunta30c) FROM hecho_respuestas_encuesta1 WHERE (pregunta30c = '3') GROUP BY(pregunta30c) ORDER BY (pregunta30c)";
// 	console.log(consulta);
// 	datos = $.ajax({
// 		url:"../../../../../indice_analiticas_avanzadas.php",
// 		type:'post',
// 		dataType:'json',
// 		async:false,
// 	   data:"sql_analisis3="+consulta+"&id_pre2=30&id_letra=c",
// 		success:function(){},
// 	}).responseText;
// 	console.log("lo que llega "+datos);
// 	datos = JSON.parse(JSON.stringify(JSON.parse(datos)[0]))
// 	datos.names={ 
// 		1:'Si', 
// 		2:'No', 
// 		3:'No sabe', 
// 		4:'No respondio'
//     };
// 	datos.title="Concertación con la pareja en temas de sexualidad estudiantes universitarios Cali, 2014 /n Formas de evitar el embarazo";
// 	return datos;
// }
// function c3PastelPregunta30d(){
// 	var consulta = "SELECT pregunta30d, count(pregunta30d) as cantidad FROM hecho_respuestas_encuesta1 WHERE (pregunta30d = '1') GROUP BY(pregunta30d) UNION SELECT pregunta30d, count(pregunta30d) FROM hecho_respuestas_encuesta1 WHERE (pregunta30d = '2') GROUP BY(pregunta30d) UNION SELECT pregunta30d, count(pregunta30d) FROM hecho_respuestas_encuesta1 WHERE (pregunta30d = '3') GROUP BY(pregunta30d) ORDER BY (pregunta30d)";
// 	console.log(consulta);
// 	datos = $.ajax({
// 		url:"../../../../../indice_analiticas_avanzadas.php",
// 		type:'post',
// 		dataType:'json',
// 		async:false,
// 	   data:"sql_analisis3="+consulta+"&id_pre2=30&id_letra=d",
// 		success:function(){},
// 	}).responseText;
// 	console.log("lo que llega "+datos);
// 	datos = JSON.parse(JSON.stringify(JSON.parse(datos)[0]))
// 	datos.names={ 
// 		1:'Si', 
// 		2:'No', 
// 		3:'No sabe', 
// 		4:'No respondio'
//     };
// 	datos.title="Concertación con la pareja en temas de sexualidad estudiantes universitarios Cali, 2014 /n Formas de evitar el embarazo";
// 	return datos;
// }
// function c3PastelPregunta30e(){
// 	var consulta = "SELECT pregunta30e, count(pregunta30e) as cantidad FROM hecho_respuestas_encuesta1 WHERE (pregunta30e = '1') GROUP BY(pregunta30e) UNION SELECT pregunta30e, count(pregunta30e) FROM hecho_respuestas_encuesta1 WHERE (pregunta30e = '2') GROUP BY(pregunta30e) UNION SELECT pregunta30e, count(pregunta30e) FROM hecho_respuestas_encuesta1 WHERE (pregunta30e = '3') GROUP BY(pregunta30e) ORDER BY (pregunta30e)";
// 	console.log(consulta);
// 	datos = $.ajax({
// 		url:"../../../../../indice_analiticas_avanzadas.php",
// 		type:'post',
// 		dataType:'json',
// 		async:false,
// 	   data:"sql_analisis3="+consulta+"&id_pre2=30&id_letra=e",
// 		success:function(){},
// 	}).responseText;
// 	console.log("lo que llega "+datos);
// 	datos = JSON.parse(JSON.stringify(JSON.parse(datos)[0]))
// 	datos.names={ 
// 		1:'Si', 
// 		2:'No', 
// 		3:'No sabe', 
// 		4:'No respondio'
//     };
// 	datos.title="Concertación con la pareja en temas de sexualidad estudiantes universitarios Cali, 2014 /n Uso de preservativos o métodos de barrera  para evitar infecciones de transmisión sexual (VIH/SIDA)";
// 	return datos;
// }

// function c3PastelPregunta30f(){
// 	var consulta = "SELECT pregunta30f, count(pregunta30f) as cantidad FROM hecho_respuestas_encuesta1 WHERE (pregunta30f = '1') GROUP BY(pregunta30f) UNION SELECT pregunta30f, count(pregunta30f) FROM hecho_respuestas_encuesta1 WHERE (pregunta30f = '2') GROUP BY(pregunta30f) UNION SELECT pregunta30f, count(pregunta30f) FROM hecho_respuestas_encuesta1 WHERE (pregunta30f = '3') GROUP BY(pregunta30f) ORDER BY (pregunta30f)";
// 	console.log(consulta);
// 	datos = $.ajax({
// 		url:"../../../../../indice_analiticas_avanzadas.php",
// 		type:'post',
// 		dataType:'json',
// 		async:false,
// 	   data:"sql_analisis3="+consulta+"&id_pre2=30&id_letra=f",
// 		success:function(){},
// 	}).responseText;
// 	console.log("lo que llega "+datos);
// 	datos = JSON.parse(JSON.stringify(JSON.parse(datos)[0]))
// 	datos.names={ 
// 		1:'Si', 
// 		2:'No', 
//     };
// 	datos.title="Concertación con la pareja en temas de sexualidad estudiantes universitarios Cali, 2014 /n El pasado sexual de ambos (número de parejas, prácticas sexuales)";
// 	return datos;
// }
// function c3PastelPregunta37(){
// 	var consulta = "SELECT pregunta37, count(pregunta37) as cantidad FROM hecho_respuestas_encuesta1  WHERE (pregunta37 IS NOT NULL) GROUP BY (pregunta37) ORDER BY (pregunta37);";
// 	console.log(consulta);
// 	datos = $.ajax({
// 		url:"../../../../../indice_analiticas_avanzadas.php",
// 		type:'post',
// 		dataType:'json',
// 		async:false,
// 		data:"sql_analisis="+consulta+"&id_pre=37",
// 		success:function(){},
// 	}).responseText;
// 	console.log("lo que llega "+datos);
// 	datos = JSON.parse(JSON.stringify(JSON.parse(datos)[0]))

// 	datos.names={ 
// 		1:'Si', 
// 		2:'No', 
// 		3:'No respondio'
//     };
// 	datos.title="Inicio de vida sexual en estudiantes universitarios Cali, 2014";
// 	return datos;
// }
// function  c3PastelPregunta55(){
// 	var consulta = "SELECT pregunta55, count(pregunta55) as cantidad FROM hecho_respuestas_encuesta1  WHERE (pregunta55 IS NOT NULL) GROUP BY (pregunta55) ORDER BY (pregunta55);";
// 	console.log(consulta);
// 	datos = $.ajax({
// 		url:"../../../../../indice_analiticas_avanzadas.php",
// 		type:'post',
// 		dataType:'json',
// 		async:false,
// 		data:"sql_analisis="+consulta+"&id_pre=55",
// 		success:function(){},
// 	}).responseText;
// 	console.log("lo que llega "+datos);
// 	datos = JSON.parse(JSON.stringify(JSON.parse(datos)[0]))
// 	datos.names={ 
// 		1:'Si', 
// 		2:'No', 
// 		3:'No respondio'
//     };
// 	datos.title="Frecuencia declarada de infecciones de transmisión sexual en estudiantes universitarios Cali, 2014";
// 	return datos;
// }
// function c3PastelPregunta58(){
// 	var consulta = "SELECT pregunta58, count(pregunta58) as cantidad FROM hecho_respuestas_encuesta1  WHERE (pregunta58 IS NOT NULL) GROUP BY (pregunta58) ORDER BY (pregunta58);";
// 	console.log(consulta);
// 	datos = $.ajax({
// 		url:"../../../../../indice_analiticas_avanzadas.php",
// 		type:'post',
// 		dataType:'json',
// 		async:false,
// 		data:"sql_analisis="+consulta+"&id_pre=58",
// 		success:function(){},
// 	}).responseText;
// 	console.log("lo que llega "+datos);
// 	datos = JSON.parse(JSON.stringify(JSON.parse(datos)[0]))

// 	datos.names={ 
// 		1:'Si', 
// 		2:'No', 
// 		3:'No respondio'
//     };
// 	datos.title="Frecuencia declarada de realización de la prueba del VIH?  en estudiantes universitarios Cali, 2014";
// 	return datos;
// }
// function c3PastelPregunta71(){
// 	var consulta = "SELECT pregunta71, count(pregunta71) as cantidad FROM hecho_respuestas_encuesta1  WHERE (pregunta71 IS NOT NULL) GROUP BY (pregunta71) ORDER BY (pregunta71);";
// 	console.log(consulta);
// 	datos = $.ajax({
// 		url:"../../../../../indice_analiticas_avanzadas.php",
// 		type:'post',
// 		dataType:'json',
// 		async:false,
// 		data:"sql_analisis="+consulta+"&id_pre=71",
// 		success:function(){},
// 	}).responseText;
// 	console.log("lo que llega "+datos);
// 	datos = JSON.parse(JSON.stringify(JSON.parse(datos)[0]))

// 	datos.names={ 
// 		1:'Si', 
// 		2:'No', 
// 		3:'No aplica en mi caso', 
// 		4:'No respondio'
//     };
// 	datos.title="Frecuencia de uso de métodos anticonceptivos estudiantes universitarios Cali, 2014";
// 	return datos;

// }
// function c3PastelPregunta93(){
// 	var consulta = "SELECT pregunta93, count(pregunta93) as cantidad FROM hecho_respuestas_encuesta1  WHERE (pregunta93 IS NOT NULL) GROUP BY (pregunta93) ORDER BY (pregunta93);";
// 	console.log(consulta);
// 	datos = $.ajax({
// 		url:"../../../../../indice_analiticas_avanzadas.php",
// 		type:'post',
// 		dataType:'json',
// 		async:false,
// 		data:"sql_analisis="+consulta+"&id_pre=93",
// 		success:function(){},
// 	}).responseText;
// 	console.log("lo que llega "+datos);
// 	datos = JSON.parse(JSON.stringify(JSON.parse(datos)[0]))

// 	datos.names={ 
// 		1:'Si', 
// 		2:'No', 
// 		3:'No respondio'
//     };
// 	datos.title="Participación en grupos juveniles estudiantes universitarios Cali, 2014";
// 	return datos;
// }

// function c3PastelPregunta94(){
// 	var consulta = "SELECT pregunta94, count(pregunta94) as cantidad FROM hecho_respuestas_encuesta1  WHERE (pregunta94 IS NOT NULL) GROUP BY (pregunta94) ORDER BY (pregunta94);";
// 	console.log(consulta);
// 	datos = $.ajax({
// 		url:"../../../../../indice_analiticas_avanzadas.php",
// 		type:'post',
// 		dataType:'json',
// 		async:false,
// 		data:"sql_analisis="+consulta+"&id_pre=94",
// 		success:function(){},
// 	}).responseText;
// 	console.log("lo que llega "+datos);
// 	datos = JSON.parse(JSON.stringify(JSON.parse(datos)[0]))

// 	datos.names={ 
// 		1:'Si', 
// 		2:'No', 
// 		3:'No sabe', 
// 		4:'No respondio'
//     };
// 	datos.title="Percepción de manifestaciones Homofóbicas en el entorno estudiantes universitarios Cali, 2014";
// 	return datos;
// }
// function c3PastelPregunta99(){
// 	var consulta = "SELECT pregunta99, count(pregunta99) as cantidad FROM hecho_respuestas_encuesta1  WHERE (pregunta99 IS NOT NULL) GROUP BY (pregunta99) ORDER BY (pregunta99);";
// 	console.log(consulta);
// 	datos = $.ajax({
// 		url:"../../../../../indice_analiticas_avanzadas.php",
// 		type:'post',
// 		dataType:'json',
// 		async:false,
// 		data:"sql_analisis="+consulta+"&id_pre=99",
// 		success:function(){},
// 	}).responseText;
// 	console.log("lo que llega "+datos);
// 	datos = JSON.parse(JSON.stringify(JSON.parse(datos)[0]))

// 	datos.names={ 
// 		1:'Si', 
// 		2:'No', 
// 		3:'No sabe', 
// 		4:'No respondio'
//     };
// 	datos.title="Venta de preservativos en campus universitarios Cali, 2014";
// 	return datos;
// }
// function c3PastelPregunta107(){
// 	var consulta = "SELECT pregunta107, count(pregunta107) as cantidad FROM hecho_respuestas_encuesta1  WHERE (pregunta107 IS NOT NULL) GROUP BY (pregunta107) ORDER BY (pregunta107);";
// 	console.log(consulta);
// 	datos = $.ajax({
// 		url:"../../../../../indice_analiticas_avanzadas.php",
// 		type:'post',
// 		dataType:'json',
// 		async:false,
// 		data:"sql_analisis="+consulta+"&id_pre=107",
// 		success:function(){},
// 	}).responseText;
// 	console.log("lo que llega "+datos);
// 	datos = JSON.parse(JSON.stringify(JSON.parse(datos)[0]))

// 	datos.names={ 
// 		1:'Si', 
// 		2:'No', 
// 		3:'No sabe', 
// 		4:'No respondio'
//     };
// 	datos.title="Frecuencia declarada sobre espacios o programas de apoyo u orientación en temas relacionados con la sexualidad, universidades Cali, 2014";
// 	return datos;
// }
// function c3PastelPregunta113(){
// 	var consulta = "SELECT pregunta113, count(pregunta113) as cantidad FROM hecho_respuestas_encuesta1  WHERE (pregunta113 IS NOT NULL) GROUP BY (pregunta113) ORDER BY (pregunta113);";
// 	console.log(consulta);
// 	datos = $.ajax({
// 		url:"../../../../../indice_analiticas_avanzadas.php",
// 		type:'post',
// 		dataType:'json',
// 		async:false,
// 		data:"sql_analisis="+consulta+"&id_pre=113",
// 		success:function(){},
// 	}).responseText;
// 	datos = JSON.parse(JSON.stringify(JSON.parse(datos)[0]))

// 	datos.names={ 
// 		1:'Si', 
// 		2:'No', 
// 		3:'No sabe', 
// 		4:'No respondio'
//     };
// 	datos.title="Frecuencia de consulta a  establecimiento de salud para obtener atención en salud sexual y reproductiva en el último año. estudiantes universitarios Cali, 2014";
// 	return datos;
// }

