$(document).ready(function(){
	$("#grafica").empty();
	$("#grafica").html("<center><img  src='../../images/hex-loader2.gif' class='img-responsive'>Cargando...</center>").delay(1000).queue(function() {
		$("#grafica").empty();
		var d=buscarEncuestas();
			fullTree(d,"#grafica");
    });

});

/***************************************************************************************************************************************************************************************************************************/
/***************************************************************************************************************************************************************************************************************************/
function buscarEncuestas(){
	// var consulta = "select encuesta.id_encuesta,encuesta.titulo,modulo.id_modulo,modulo.descripcion,pregunta.texto_pregunta from modulos_encuesta,modulo,encuesta,pregunta where modulos_encuesta.id_modulo=modulo.id_modulo and encuesta.id_encuesta in (select id_encuesta from encuesta) and modulo.id_modulo=pregunta.id_modulo order by (encuesta.id_encuesta,modulo.id_modulo)";
	var consulta = "select id_encuesta,titulo from encuesta where estado = 'Activada' order by(id_encuesta)";
	// console.log(consulta);
	datos = $.ajax({
		url:"../../../../../indice_analiticas_avanzadas.php",
		// url:"../../../../../indice_analiticas.php",
		type:'post',
		dataType:'json',
		async:false,
		data:"sql_analisis4="+consulta,
		success:function(){},
	}).responseText;
	// datos = JSON.parse(JSON.stringify(JSON.parse(datos)[0]));
	// console.log(datos)
	var temp=[];
	var treeData = JSON.parse(datos);
	JSON.parse(datos).forEach(function(node) {
		consulta = "select * from modulo,modulos_encuesta where id_encuesta = "+node.id_encuesta+" and modulos_encuesta.id_modulo=modulo.id_modulo order by(modulo.id_modulo)";
		// consulta = "select * from modulo,modulos_encuesta where id_encuesta = 1 and modulos_encuesta.id_modulo=modulo.id_modulo order by(modulo.id_modulo)";
		var tablaencuesta= "encuesta"+node.id_encuesta
		datos = $.ajax({
			url:"../../../../../indice_analiticas_avanzadas.php",
			// url:"../../../../../indice_analiticas.php",
			type:'post',
			dataType:'json',
			async:false,
			data:"sql_analisis4="+consulta,
			success:function(){},
		}).responseText;

		// console.log("{"+datos+"}");
		if(datos=="null\n"|| datos=="null"){
			temp.push({"name" : node.titulo, "value" : node.id_encuesta,"parent" : "SURVEY ENCUESTA","value" : "","cant":0});
			return;
		}else{
			temp.push({"name" : node.titulo, "value" : node.id_encuesta,"parent" : "SURVEY ENCUESTA","value" : JSON.parse(datos).length+" modulos","cant":JSON.parse(datos).length});
		}
		var padre=node.titulo;
		// console.log("padre e: "+padre)
		var mtemp=[];
		JSON.parse(datos).forEach(function(node) {
			consulta = "select * from pregunta where id_modulo="+node.id_modulo+" order by(id_pregunta)";
			// consulta = "select * from modulo,modulos_encuesta where id_encuesta = 1 and modulos_encuesta.id_modulo=modulo.id_modulo order by(modulo.id_modulo)";
			datos = $.ajax({
				url:"../../../../../indice_analiticas_avanzadas.php",
				// url:"../../../../../indice_analiticas.php",
				type:'post',
				dataType:'json',
				async:false,
				data:"sql_analisis4="+consulta,
				success:function(){},
			}).responseText;

			if(datos=="null\n" || datos=="null"){
				mtemp.push({"name" : node.descripcion, "value" : node.id_modulo,"parent" : padre,"value" : "","cant":0});
				return;
			}else{
				mtemp.push({"name" : node.descripcion, "value" : node.id_modulo,"parent" : padre, "value" : JSON.parse(datos).length+" preguntas","cant":JSON.parse(datos).length});
			}
			padre=node.descripcion;
			// console.log("padre m: "+padre)
			var ptemp=[];
			JSON.parse(datos).forEach(function(node) {
				consulta = "select count(pregunta"+node.num_pregunta+") from "+tablaencuesta+"";
				total = $.ajax({
					url:"../../../../../indice_analiticas_avanzadas.php",
					// url:"../../../../../indice_analiticas.php",
					type:'post',
					dataType:'json',
					async:false,
					data:"sql_analisis4="+consulta,
					success:function(){},
				}).responseText;
				// console.log(consulta,total)

				consulta = "select count(pregunta"+node.num_pregunta+") from "+tablaencuesta+" where pregunta"+node.num_pregunta+" !='' ";
				contestadas = $.ajax({
					url:"../../../../../indice_analiticas_avanzadas.php",
					// url:"../../../../../indice_analiticas.php",
					type:'post',
					dataType:'json',
					async:false,
					data:"sql_analisis4="+consulta,
					success:function(){},
				}).responseText;

				consulta = "select count(pregunta"+node.num_pregunta+") from "+tablaencuesta+" where pregunta"+node.num_pregunta+" ='' ";
				blanco = $.ajax({
					url:"../../../../../indice_analiticas_avanzadas.php",
					// url:"../../../../../indice_analiticas.php",
					type:'post',
					dataType:'json',
					async:false,
					data:"sql_analisis4="+consulta,
					success:function(){},
				}).responseText;
				if(JSON.parse(total)[0].count==undefined){
					ptemp.push({"name" :node.texto_pregunta,"tooltip": node.texto_pregunta+'<br/><b>Total:(-)</b><br/><b>Contestaron:(-)</b><br/><b>En blanco:(-)</b>', "value" : node.id_pregunta,"parent" : padre, "value" :"","cant":0})	
				}else{
					ptemp.push({"name" :node.texto_pregunta,"tooltip": node.texto_pregunta+'<br/><b>Contestaron:</b>'+JSON.parse(contestadas)[0].count+' personas <br/><b>En blanco:</b>'+JSON.parse(blanco)[0].count+' personas<br/><b>Total:</b> '+JSON.parse(total)[0].count+' personas', "value" : node.id_pregunta,"parent" : padre, "value" :"","cant":0})
				}
			});
			mtemp[(mtemp.length-1)]['children']=ptemp;

		});
		temp[(temp.length-1)]['children']=mtemp;
	});	

	// console.log(temp);
	
	var treeMap = '{ "name" : "SURVEY ENCUESTA", "parent" :null,"value" : "","children" :';
	return treeMap+JSON.stringify(temp)+"}";

}
