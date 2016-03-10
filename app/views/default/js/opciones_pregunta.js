//SCRIPT QUE PERMITE CONSTRUIR LAS OPCIONES PARA CADA PREGUNTA
$(document).ready(function()
{    
    $( "#datepicker" ).datepicker();
    $("#caja1").hide();
    $("#caja2").hide();
    $("#caja3").hide();
    $("#id_tipo_pregunta").change(function ()
    {        
        
        crearOpciones($("#id_tipo_pregunta").val()); 
        $('.selectpicker').selectpicker();        
        seleccionCombo('combo');
        
    });
    
    $('textarea').textcomplete([{
    match: /(^|\s)(\w{2,})$/,
    search: function (term, callback) {
        var words = ['google', 'facebook', 'github', 'microsoft', 'yahoo'];
        callback($.map(words, function (word) {
            return word.indexOf(term) === 0 ? word : null;
        }));
    },
    replace: function (word) {
        return word + ' ';
    }
}]);
});


function crearOpciones(tipo)
{
    var t = parseInt(tipo);
    
    switch (t)
    {
       case 1:
           {
               $("#caja1").show();
               $("#caja2").show();
               $("#caja3").show();
                $('#area_opciones').empty();
                $('#otras_opciones').empty();
                $('#vista_previa').html("<div>Texto Pregunta<br><input type='radio' value='true' checked>Opcion respuesta<br><input type='radio' value='opcion1'>Opcion respuesta<br><input type='radio' value='opcion1'>Opcion respuesta</div>");
                //$('#area_opciones').html("<div><label>Ingrese las opciones de respuesta</label><textarea class='form-control' id='opciones' placeholder='para ingresar las opciones escriba la primera y luego presione la tecla enter' rows='4' cols='50' tabindex='2'></textarea></div>");
                $('#etq').show();
                $('#opciones').show();                
                $('#area_opciones').append("<input type='checkbox' id='presentacion' name='presenta' value='true'>Desea cambiar el estilo como se presentar&aacute; las opciones de esta pregunta?<br>");
                revisarPresentacion();
                break;
            }
        case 2:
            {
                $("#caja1").show();
               $("#caja2").show();
               $("#caja3").show();
                $('#area_opciones').empty();
                $('#otras_opciones').empty();
                $('#vista_previa').html("<div>Texto Pregunta<br><input type='checkbox' value='true' checked>Opcion respuesta<br><input type='checkbox' value='true' >Opcion respuesta<br><input type='checkbox' value='true' checked>Opcion respuesta</div>");
                //$('#area_opciones').html("<textarea class='form-control' id='opciones' placeholder='Ingrese las opciones de respuesta una por cada linea' rows='4' cols='50'></textarea>");
                $('#etq').show();
                $('#opciones').show();
                $('#area_opciones').append("<input type='checkbox' id='presentacion' name='presenta' value='true'>Desea cambiar el estilo como se presentar&aacute; las opciones de esta pregunta?<br>");
                revisarPresentacion();
                break;
            }
        case 3:
            {
                $("#caja1").show();
               $("#caja2").show();
               $("#caja3").show();
                $('#otras_opciones').empty();
                $('#area_opciones').empty();
                $('#vista_previa').html("<div>Texto Pregunta<br><input type='text' class='form-control'value='Respuesta'/></div>");                
                $('#etq').hide();
                $('#opciones').hide();
                
                break;
            }
        case 4:
            {
                $("#caja1").show();
               $("#caja2").show();
               $("#caja3").show();
                $('#area_opciones').empty();
            $('#otras_opciones').empty();
            $('#etq').hide();
            $('#opciones').hide();
            $('#vista_previa').html("Texto Pregunta<br><input type='text' class='form-control' id='datepicker' value='2014-08-31'/>");
            fecha("datepicker");
            
            
            /*$('#area_opciones').html("<input type='text' class='form-control' id='fecha'/>");
            fecha("fecha");*/
            
            break;
            }
        case 5:
            {
                $("#caja1").show();
               $("#caja2").show();
               $("#caja3").show();
                $('#area_opciones').empty();
                $('#otras_opciones').empty();
                $('#etq').hide();
                $('#opciones').hide();
            $('#vista_previa').html("<table class='table table-condensed'>\n\
                                    <thead id='cabeza'><tr id='cols'><td>Enuciado</td><td>Si</td><td>No</td><tr></thead>\n\
                                    <tbody id='cuerpo'><tr class='fil'><td>Opcion</td><td><input type='radio' value='true' ></td><td><input type='radio' value='true' checked></td><tr></tbody>\n\
                                    <tr class='fil'><td>Opcion</td><td><input type='radio' value='true' checked></td><td><input type='radio' value='true' ></td><tr>\n\
                                    <tr class='fil'><td>Opcion</td><td><input type='radio' value='true' ></td><td><input type='radio' value='true' ></td><tr>\n\
                                    </table>");
            $('#area_opciones').html("<div id='cambiarcolumnas'><select class='selectpicker form-control combo' id='numero_columnas' data-width='' data-live-search='true' data-style='btn btn-primary' data-size='5' tabindex='2'>\n\
                                      <option value='0'>Seleccione el numero de columnas</option>\n\\n\
                                      <option value='2'>2 Columnas</option>\n\\n\
                                      <option value='3'>3 Columnas</option>\n\\n\
                                      <option value='4'>4 Columnas</option>\n\\n\
                                      <option value='5'>5 Columnas</option>\n\\n\
                                      <option value='6'> M&aacute;s de 5 Columnas</option>\n\
                                      </select></div><br>\n\
                                      <div>Ingrese las opciones de las columnas<textarea class='form-control' id='opciones_columna' placeholder='Ingrese las opciones de respuesta para las columnas una por linea' rows='3' cols='50'></textarea></div><br>\n\
                                      <div id='cambiarfilas'><select class='selectpicker form-control combo' id='numero_filas' data-width='' data-live-search='true' data-style='btn btn-primary' data-size='5' tabindex='2'>\n\
                                      <option value='0'>Seleccione el numero de filas</option>\n\\n\
                                      <option value='2'>2 Filas</option>\n\\n\
                                      <option value='3'>3 Filas</option>\n\\n\
                                      <option value='4'>4 Filas</option>\n\\n\
                                      <option value='5'>5 Filas</option>\n\\n\
                                      <option value='6'> M&aacute;s de 5 Filas</option>\n\
                                      </select></div><br>\n\
                                      <div>Ingrese los enunciados de las filas<textarea class='form-control' id='opciones_fila' placeholder='Ingrese las opciones de respuesta para las filas una por linea' rows='3' cols='50'></textarea></div>");
                autocomple('opciones_columna')                    ;
                break;            
                                }
        case 6:
            {
                $("#caja1").show();
               $("#caja2").show();
               $("#caja3").show();
            $('#area_opciones').empty();
            $('#otras_opciones').empty();
            $('#etq').hide();
            $('#opciones').hide();
            $('#vista_previa').html("<table class='table table-condensed'>\n\
                                    <thead><tr><td colspan='2'>De acuerdo al siguiente enunciado responda</td><tr></thead>\n\
                                    <tbody><tr><td><label>Texto Pregunta</label><br><input type='radio' value='true' checked>Opcion respuesta<br><input type='radio' value='opcion1'>Opcion respuesta<br><input type='radio' value='opcion1'>Opcion respuesta</td><tr>\n\
                                    <tr><td>Texto Pregunta<br><input type='radio' value='true' checked>Opcion respuesta<br><input type='radio' value='opcion1'>Opcion respuesta<br><input type='radio' value='opcion1'>Opcion respuesta</td><tr></tbody>\n\
                                    </table>");
            break;
        }
        case 7:
            {
                $("#caja1").show();
               $("#caja2").show();
               $("#caja3").show();
                $('#area_opciones').empty();
                $('#otras_opciones').empty();
                $('#etq').hide();
                $('#opciones').hide(); 
                
                $('#otras_opciones').empty();
            $('#vista_previa').html("<div><select class='selectpicker form-control combo' data-width='' data-live-search='true' data-style='btn btn-primary' data-size='5'>\n\
                                      <option value='0'>Seleccione un departamento</option>\n\\n\
                                      <option value='1'>Valle</option>\n\
                                    </select></div><br>");
            $('#vista_previa').append("<div><select class='selectpicker form-control combo' data-width='' data-live-search='true' data-style='btn btn-primary' data-size='5'>\n\
                                      <option value='0'>Seleccione un municipio</option>\n\\n\
                                      <option value='1'>Cali</option>\n\\n\
                                      <option value='2'>Palmira</option>\n\\n\
                                      <option value='3'>Yumbo</option>\n\
                                      </select></div><br>");
            break;
        }
        case 8:
            {
                $("#caja1").show();
               $("#caja2").show();
               $("#caja3").show();
                $('#area_opciones').empty();
                $('#otras_opciones').empty();
                $('#etq').hide();
                $('#opciones').hide();
            $('#vista_previa').html("<div><select class='selectpicker form-control combo' data-width='' data-live-search='true' data-style='btn btn-primary' data-size='5'>\n\
                                      <option value='0'>Seleccione una facultad</option>\n\\n\
                                      <option value='1'>Ingenieria</option>\n\
                                    </select></div><br>");
            $('#vista_previa').append("<div><select class='selectpicker form-control combo' data-width='' data-live-search='true' data-style='btn btn-primary' data-size='5'>\n\
                                      <option value='0'>Seleccione una carrera</option>\n\\n\
                                      <option value='1'>Ingenieria de sistemas</option>\n\\n\
                                      <option value='2'>Ingenieria Industrial</option>\n\\n\
                                      <option value='3'>Ingeniria Civil</option>\n\
                                      </select></div><br>");
            break;
        }
         case 9:
             {
                 $("#caja1").show();
               $("#caja2").show();
               $("#caja3").show();
                $('#area_opciones').empty();
                $('#otras_opciones').empty();
                $('#etq').hide();
                $('#opciones').hide();
                //$('#vista_previa').html('tipo 9');
            $('#vista_previa').html("<div><select class='selectpicker form-control combo' data-width='' data-live-search='true' data-style='btn btn-primary' data-size='5'>\n\
                                      <option value='0'>Seleccione un numero</option>\n\\n\
                                      <option value='1'>1</option>\n\\n\
                                      <option value='2'>2</option>\n\\n\
                                      <option value='3'>3</option>\n\
                                      </select></div><br>");
            break;
        }
         case 10:
              {
                  $("#caja1").show();
               $("#caja2").show();
               $("#caja3").hide();
                  $('#vista_previa').hide();
                  $('#area_opciones').empty();
                  $('#otras_opciones').empty();
                  //$('#vista_previa').html("<div><label>Texto Pregunta</label><br><input type='radio' value='true' checked>Opcion respuesta<br><input type='radio' value='opcion1'>Opcion respuesta<br><input type='radio' value='opcion1'>Opcion respuesta</div>");              
                  $('#etq').show();
                  $('#opciones').show();                
                  //$('#area_opciones').append("<label><input type='checkbox' id='presentacion' name='presenta' value='true'>Desea cambiar el estilo como se presentar&aacute; las opciones de esta pregunta?</label><br>");                  
                  break;
              }            
        default:
        {
            console.log('No exite el tipo de pregunta');
            break;
        }
      } 
    
}

function fecha(nombre)
{    
    $( '#'+nombre).datepicker({
                                            showOn: "button",
                                            buttonImage: "../../images/calendar.gif",
                                            buttonImageOnly: true,
                                            dateFormat: "MM dd  'de' yy",                                            
                                       }); 

                                       
}

function revisarPresentacion()
{
    $("#presentacion").click(function()
    {
        var check1 = $('#presentacion:checked').val();                 
        if  (check1 === 'true')
        {
           console.log('se ha hecho verdad');
           $('#otras_opciones').append("<div id='cambiarfilas'><select class='selectpicker form-control combo' id='numero_fil_pregunta' data-width='' data-live-search='true' data-style='btn btn-primary' data-size='5' tabindex='2'>\n\
                                      <option value='0'>Seleccione el numero de Filas</option>\n\\n\
                                      <option value='2'>2 Filas</option>\n\\n\
                                      <option value='3'>3 Filas</option>\n\\n\
                                      <option value='4'>4 Filas</option>\n\\n\
                                      <option value='5'>5 Filas</option>\n\\n\\n\
                                      </select>\n\
                                        <div id='boxfilas'></div>\n\
                                      </div><br>\n\
                                      <div id='cambiarfilas'><select class='selectpicker form-control combo' id='numero_cols_pregunta' data-width='' data-live-search='true' data-style='btn btn-primary' data-size='5' tabindex='2'>\n\
                                      <option value='0'>Seleccione el numero de Columnas</option>\n\\n\
                                      <option value='2'>2 Columnas</option>\n\\n\
                                      <option value='3'>3 Columnas</option>\n\\n\
                                      <option value='4'>4 Columnas</option>\n\\n\
                                      <option value='5'>5 Columnas</option>\n\
                                      </select>\n\
                                      <div id='boxcolumnas'></div>\n\
                                      </div><br>");
            activarCombo();
            adicionarBox('numero_cols_pregunta', 'numero_fil_pregunta');
        }
        else
        {
            $('#otras_opciones').empty();
        }
    });
}

function activarCombo()
{
    $('.selectpicker').selectpicker();
}

function adicionarBox(nomCol, nomFil)
{
    $( '#'+nomCol).change(function()/*funcion que depende del numero de columnas del combo*/
                       {   
                            var columnas = parseInt($( '#'+nomCol).val());
                            var filas = parseInt($( '#'+nomFil).val());                                                        
                            var fil = "<div><table class='table table-condesed'><thead><tr><th colspan='"+columnas+"'>Texto Pregunta</th></tr></thead>";                            
                            
                            if (filas !== 0)
                            {
                                fil = fil + '<tbody>';
                                for (var i= 0; i< filas; ++i)
                                {
                                    fil = fil + '<tr>';
                                    for (var k= 0; k< columnas; ++k)
                                    {                                    
                                        fil = fil +"<td><input type='checkbox' value='true' >opcion</td>";
                                    }
                                    fil = fil + '</tr>';
                                }
                                fil = fil + '</tbody></table></div>';
                            }
                            else
                            {
                                fil = fil + '<tbody>';   
                                for (var i= 0; i< 1; ++i)
                                {
                                    fil = fil + '<tr>';
                                    for (var k= 0; k< columnas; ++k)
                                    {                                    
                                        fil = fil +"<td><input type='checkbox' value='true' >opcion</td>";
                                    }
                                    fil = fil + '</tr>';
                                }
                                fil = fil + '</tbody></table></div>';
                            }
                            
                            $('#vista_previa').html(fil);
                        });
/*********************************************************************************************************************/
$( '#'+nomFil).change(function()/*funcion que depende del numero de filas del combo*/
                       {   
                            var columnas = parseInt($( '#'+nomCol).val());
                            var filas = parseInt($( '#'+nomFil).val());                                                        
                            var fil = "";
                            
                            if (columnas !== 0)
                            {
                                fil = "<div><table class='table table-condesed'><thead><tr><th colspan='"+columnas+"'>Texto Pregunta</th></tr></thead>";
                                fil = fil + '<tbody>';
                                for (var i= 0; i< filas; ++i)
                                {
                                    fil = fil + '<tr>';
                                    for (var k= 0; k< columnas; ++k)
                                    {                                    
                                        fil = fil +"<td><input type='checkbox' value='true' >opcion</td>";
                                    }
                                    fil = fil + '</tr>';
                                }
                                fil = fil + '</tbody></table></div>';
                            }
                            else
                            {
                                fil = "<div><table class='table table-condesed'><thead><tr><th>Texto Pregunta</th></tr></thead>";
                                fil = fil + '<tbody>';   
                                for (var i= 0; i< filas; ++i)
                                {
                                    fil = fil + '<tr>';
                                    for (var k= 0; k< 1; ++k)
                                    {                                    
                                        fil = fil +"<td><input type='checkbox' value='true' >opcion</td>";
                                    }
                                    fil = fil + '</tr>';
                                }
                                fil = fil + '</tbody></table></div>';
                            }
                            
                            $('#vista_previa').html(fil);
                        });
}



function validarComboFilasYColumnas()
{
    
}

function ComboFilasRespuestaUnicaYMultiple()
{
    $('.selectpicker').selectpicker();
}



function comboColumnas(nombre)
{   
    
    $( '#'+nombre).change(function()
                            {                               
                                                                
                                var vfilas = parseInt($("#numero_filas").val());
                                
                                if (vfilas === 0) 
                                {
                                    vfilas = 2;
                                }
                                var v = parseInt($("#"+nombre).val());
                                
                                $('#cols').empty();
                                $('.fil').empty();
                                var cols = "<td>Enunciado</td>";
                                var fil = "", fil1 = "";
                                                                
                                for (var i= 0; i< v; ++i)
                                {
                                    cols = cols + "<td>opcion"+i+"</td>";
                                    
                                    fil1 = fil1 + "<td>Opcion"+i+"</td>";
                                    
                                   fil = fil1;
                                    
                                    fil1='';
                                    
                                    for (var k= 0; k< v; ++k)
                                    {                                    
                                        fil = fil +"<td><input type='radio' value='true' ></td>";
                                    }
                                }
                                $("#cabeza").empty();
                                $("#cuerpo").empty();
                                
                                $("#cabeza").html("<tr id='cols'>"+cols+"</tr>");
                                for (var j= 0; j< vfilas; ++j)
                                {   
                                    
                                    $("#cuerpo").append("<tr class='fil'>"+fil+"</tr>");
                                                                        
                                }                                
                                if (v === 6)
                                {
                                    //$("#cambiarcolumnas").empty();
                                    $("#cambiarcolumnas").append("Ingrese la cantidad de Columnas<input type='text' class='form-control' placeholder='Ingrese la cantidad de Columnas' id='numero_columnas_extra'/><br>");                                    
                                }
                                
                            });                                        
}

function comboFilas(nombre)
{   
    console.log('entra a filas');
    $( '#'+nombre).change(function()
                            {                                
                                var vcolumnas = parseInt($("#numero_columnas").val());
                                var v = parseInt($("#"+nombre).val());
                                
                                $('#cols').empty();
                                $('.fil').empty();
                                var cols = "<td>Enunciado</td>";
                                var fil = "", fil1 = "";
                                                                
                                for (var i= 0; i< vcolumnas; ++i)
                                {
                                    cols = cols + "<td>opcion"+i+"</td>";
                                    
                                    fil1 = fil1 + "<td>Opcion"+i+"</td>";
                                    
                                    fil = fil1;
                                    
                                    fil1='';
                                    
                                    for (var k= 0; k< vcolumnas; ++k)
                                    {                                    
                                        fil = fil +"<td><input type='radio' value='true' ></td>";
                                    }
                                }
                                
                                
                                $("#cabeza").empty();
                                $("#cuerpo").empty();
                                $("#cabeza").html("<tr id='cols'>"+cols+"</tr>");
                                for (var j= 0; j< v; ++j)
                                {   
                                    
                                    $("#cuerpo").append("<tr class='fil'>"+fil+"</tr>");                                    
                                }
                                
                                if (v === 6)
                                {
                                    //$("#cambiarfilas").empty();
                                    $("#cambiarfilas").append("Ingrese la cantidad de Columnas<input type='text' class='form-control' placeholder='Ingrese la cantidad de filas' id='numero_filas_extra'/><br>");
                                }
                                
                            });                                        
}
function seleccionCombo(nombre)
{   
    
    $( '.'+nombre).each(function()
                            {                                
                                var id = $(this).attr('id');
                                if (id === 'numero_columnas')
                                {
                                    comboColumnas("numero_columnas");
                                }
                                if (id === 'numero_filas')
                                {
                                    comboFilas("numero_filas");
                                }
                            });                                        
}

function autocomple(text1, text2)
{
    $(text1).textcomplete([{
    match: /(^|\s)(\w{2,})$/,
    search: function (term, callback) {
        var words = ['google', 'facebook', 'github', 'microsoft', 'yahoo'];
        callback($.map(words, function (word) {
            return word.indexOf(term) === 0 ? word : null;
        }));
    },
    replace: function (word) {
        return word + ' ';
    }
}]);
}