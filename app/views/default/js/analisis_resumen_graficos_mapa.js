$(document).ready(function(){
	var id_encuesta=0, id_pregunta=0;
    $("#pregunta_seleccionada").selectpicker('hide');

    var marks = [{long: -68.5  , lat: 49.6, data:"Personas de la sede buenaventura <br/><b>Seleccione la encuesta</b>",value:0,name:"BUENAVENTURA",prefijo:"uvbu"},
            {long: -66.4, lat: 46.5, data:"Personas de la sede norte del cauca <br/><b>Seleccione la encuesta</b>",value:0,name:"SANTANDER",prefijo:"uvno"},
            {long: -66.23, lat: 48.33, data:"Personas de la sede yumbo<br/><b>Seleccione la encuesta</b>",value:0,name:"YUMBO",prefijo:"uvyu"},
            {long: -64.82, lat: 48.2, data:"Personas de la sede palmira<br/><b>Seleccione la encuesta</b>",value:0,name:"PALMIRA",prefijo:"uvpa"},
            {long: -64.03, lat: 49.2, data:"Personas de la sede buga<br/><b>Seleccione la encuesta</b>",value:0,name:"BUGA",prefijo:"uvbg"},
            {long: -63.6, lat: 49.7, data:"Personas de la sede tulua<br/><b>Seleccione la encuesta</b>",value:0,name:"TULUA",prefijo:"uvtu"},
            {long: -63.73, lat: 50.76, data:"Personas de la sede zarzal<br/><b>Seleccione la encuesta</b>",value:0,name:"ZARZAL",prefijo:"uvza"},
            {long: -62.58, lat: 50.56, data:"Personas de la sede caicedonia<br/><b>Seleccione la encuesta</b>",value:0,name:"CAICEDONIA",prefijo:"uvca"},
            {long: -63.01, lat: 51.81, data:"Personas de la sede cartago<br/><b>Seleccione la encuesta</b>",value:0,name:"CARTAGO",prefijo:"uvcr"},
            {long: -66.42, lat: 47.67, data:"Personas de la sede Univalle_Melendez<br/><b>Seleccione la encuesta</b>",value:0,name:"Univalle_Melendez",prefijo:"uvme"},
            {long: -66.54, lat: 48.1, data:"Personas de la sede Univalle_San_Fernando<br/><b>Seleccione la encuesta</b>",value:0,name:"Univalle_San_Fernando",prefijo:"uvsf"},
            {long: -66.5, lat: 47.89, data:"Personas de la U_Santiago<br/><b>Seleccione la encuesta</b>",value:0,name:"U_Santiago",prefijo:"usc"},
            {long: -66.7, lat: 47.65,data:"Personas de U_Javeriana que votaron<br/><b>Seleccione la encuesta</b>",value:0,name:"U_Javeriana",prefijo:"puj"}];

    $("#grafica").empty();
    drawmap("#grafica",marks);

    $('#encuesta_seleccionada').change(function (){       
        if( $(this).val() !== "0" ){            
            id_encuesta=$(this).val();
            tieneUbicacion();
        }
    });

    $('#pregunta_seleccionada').change(function (){
        if( $(this).val() !== "0" ){
            id_pregunta=$(this).val();
            $("#grafica").empty();
            drawmap("#grafica",marks);
        }
    });      

});

/***************************************************************************************************************************************************************************************************************************/
function verdepto(departamento){


    var consulta = "select count(pregunta"+id_pregunta+") from encuesta"+id_encuesta+" where UPPER(pregunta"+id_pregunta+") like '#"+departamento+"'";
    // console.log(consulta)

    cantidad=$.ajax({
        url:"../../../../../indice_encuestas.php",
        type: "POST",
        async:false,
        data:"sql2="+consulta,
        success: function(response){
            // console.log(response)
        }
    }).responseText; 
    if (id_pregunta == 0){
        return -1;
    }else{
        cantidad = JSON.parse(cantidad)[0].count;
    }
    return cantidad;
}

function tieneUbicacion(){
    var consulta = "SELECT * FROM MODULOS_ENCUESTA,PREGUNTA WHERE MODULOS_ENCUESTA.ID_ENCUESTA = "+id_encuesta+" AND MODULOS_ENCUESTA.ID_MODULO = PREGUNTA.ID_MODULO  AND PREGUNTA.ID_TIPO='7';"
    // console.log(consulta)
    cantidad=$.ajax({
        url:"../../../../../indice_encuestas.php",
        type: "POST",
        async:false,
        data:"sql2="+consulta,
        success: function(response){
            // console.log(response)
            var result = JSON.parse(response);
            $("#pregunta_seleccionada").empty()
            $("#pregunta_seleccionada").append('<option value ="0">Seleccione una pregunta</option>')
            for (idpregunta in result){
                console.log(result[idpregunta]);
                $("#pregunta_seleccionada").append('<option value ="'+result[idpregunta].num_pregunta+'">'+result[idpregunta].texto_pregunta+'</option>')
            }
            $("#pregunta_seleccionada").selectpicker('refresh');
            $("#pregunta_seleccionada").selectpicker('show');
        }
    });
}


/***************************************************************************************************************************************************************************************************************************/

function c3totalpines(prefijo){
    var consulta = "SELECT pin FROM encuesta"+id_encuesta+" WHERE (pin LIKE '%"+prefijo+"%') ORDER BY(pin);"
    // console.log(consulta)
    cantidad=$.ajax({
        url:"../../../../../indice_encuestas.php",
        type: "POST",
        async:false,
        data:"sql1="+consulta,
        success: function(){}
    }).responseText; 
    if (id_encuesta ==0){
        return -1;
    }
    return cantidad;
}
function c3pinesgenerados(prefijo){
    var consulta = "SELECT pin FROM encuesta"+id_encuesta+" WHERE (consentimiento is null) AND (pin LIKE '%"+prefijo+"%') ORDER BY(pin);"
    // console.log(consulta)
    cantidad=$.ajax({
        url:"../../../../../indice_encuestas.php",
        type: "POST",
        async:false,
        data:"sql1="+consulta,
        success: function(){}
    }).responseText;
    if (id_encuesta ==0){
        return -1;
    }
    return cantidad;        
}
function c3pinesutilizados(prefijo){
    var consulta = "SELECT pin FROM encuesta"+id_encuesta+" WHERE (consentimiento = 'Acepto') AND (pin LIKE '%"+prefijo+"%') ORDER BY(pin);"
    // console.log(consulta)
    cantidad=$.ajax({
        url:"../../../../../indice_encuestas.php",
        type: "POST",
        async:false,
        data:"sql1="+consulta,
        success: function(){}
    }).responseText;
    if (id_encuesta ==0){
        return -1;
    }
    return cantidad;
}
