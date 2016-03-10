var  id_modulo='', id_pregunta='', id_consulta = '', arreglo = Array(), datos;

$(document).ready(function(e) 
{   
    bkLib.onDomLoaded(
    function()
       { 
        new nicEditor().panelInstance('text_pregunta');     
            $('#add').hide();  
            $('#edit').hide();  
            $('#del').hide();  
            $('#title').hide();      
            $('#title1').hide();  
            $('#title2').hide();
            $('#title3').hide();
            $('#opcion_edicion').change(function ()
            {
                    switch (parseInt($(this).val()))
                    {
                        case 1:/*adicionar preguntas**/
                        {
                            $('#add').show();
                            $('#edit').hide();
                            $('#del').hide(); 
                            break;
                        }
                        case 2:/**editar preguntas*/
                        {
                            $('#add').hide();
                            $('#edit').show();
                            $('#del').hide(); 
                            
                            $('#pregunta_editable').change(function ()
                            {   
                                
                                if( $(this).val() !== "0" )
                                {   
                                    $("#title2").empty();
                                    $("#title3").empty();
                                    $("#id_pregunta").val( $(this).val() );                       
                                    cargarPreguntaaAEditar($(this).val(), $("#id_modulo").val(), $("#id_encuesta").val(), $("#id_usuario").val(), 'text_pregunta');
                                    $("#titulo").val( $("#pregunta_editable option:selected").html() );                                                                        $('#title').show();
                                    $('#title1').show();
                                    $('#title2').show();                
                                } 
                                else
                                {                                    
                                    $('#title').hide();
                                    $('#title1').hide();
                                    $('#title2').hide();  
                                    $('#title3').hide();  
                                 } 
                             }); 
                             break;
                        }
                        case 3:/*eliminar pregutnas*/
                        {
                            $('#add').hide();
                            $('#edit').hide();
                            $('#del').show();
                            break;
                        }
                        default :
                        {
                            $('#add').hide();  
                            $('#edit').hide();  
                            $('#del').hide();
                           break;
                        }
                    }
            });  
            
                     
    }); 
    $('.selectpicker').selectpicker();
    cargarCombo();
    
});/*FIN READY*/
 
function cargarPreguntaaAEditar(id_pregunta, id_modulo, id_encuesta, id_usuario, id_caja)
{
    //console.log(id_encuesta+", "+id_usuario);
	$.ajax({
            url:"../../../../../indice_encuestas.php",
            type: "POST",
            dataType: 'JSON',
            data:"id_pregunta_encuesta_que_cambia="+id_pregunta+"&id_modulo_encuesta_que_cambia="+id_modulo+"&id_encuesta_a_cambiar="+id_encuesta+"&id_usuario_encuesta_a_cambia="+id_usuario,            
            success: function(retorno)
            {                   
                nicEditors.findEditor(id_caja).setContent(retorno[0]['texto_pregunta']);  
                $("#id_modulo").val(retorno[0]['id_modulo']);
                $("#tipo_pregunta").val(retorno[0]['id_tipo']);
                switch (parseInt(retorno[0]['id_tipo']))
                {
                    case 1:/*pregunta tipo 1*/
                        {
                            /*CON ESTE AJAX SE BUSCA LA CANTIDAD DE COLUMNAS Y DE FILAS COMO SE ORGANIZA UNA PREGUNTA TIPO 1 O 2**/ 
                           $.ajax({
                                    url:"../../../../../indice_encuestas.php",
                                    type: "POST",
                                    dataType: 'JSON',
                                    data:"id_pregunta_1_2_col_fila="+id_pregunta,
                                    success: function(opciones)
                                    {                   
                                        //console.log(opciones)
                                        $('#id_pregunta_presentacion').val(opciones[0]['id']);                                        
                                        $('#columnas_tipo1_2').val(opciones[0]['cantidad_columnas']);
                                        $('#filas_tipo1_2').val(opciones[0]['cantidad_filas']);                                                                                                                               
                                    }
                                });  /*fin ajax consigue las opciones**/ 
                           $.ajax({
                                    url:"../../../../../indice_encuestas.php",
                                    type: "POST",
                                    dataType: 'JSON',
                                    data:"id_pregunta_opciones_que_cambia="+id_pregunta,
                                    success: function(opciones)
                                    {                   
                                        $("#title2").append("<label>Editar opciones</label>");
                                        for (var i = 0; i < opciones.length; i++) 
                                        {
                                           //$("#title2").append("<label>Opcion "+(i+1)+"</label><input type='text' class='form-control op' id='opcion"+i+"' name='opciones_editar[]' value='"+opciones[i]['etiqueta_opcion']+"'>");
                                           $("#title2").append("<label>Opcion "+(i+1)+"</label><input  type='hidden' id='codigos' name='ids[]'  value='"+opciones[i]['id_opcion']+"'/><textarea class='form-control opc' id='opcion"+opciones[i]['id_opcion']+"' name='opciones_editar[]' >"+opciones[i]['etiqueta_opcion']+"</textarea>");
                                        }                        
                                    }
                                });  /*fin ajax consigue las opciones**/
                            break;
                        }
                    case 2:/*pregunta tipo 2*/
                        {
                            /*CON ESTE AJAX SE BUSCA LA CANTIDAD DE COLUMNAS Y DE FILAS COMO SE ORGANIZA UNA PREGUNTA TIPO 1 O 2**/ 
                           $.ajax({
                                    url:"../../../../../indice_encuestas.php",
                                    type: "POST",
                                    dataType: 'JSON',
                                    data:"id_pregunta_1_2_col_fila="+id_pregunta,
                                    success: function(opciones)
                                    {                   
                                        //console.log(opciones)
                                        $('#id_pregunta_presentacion').val(opciones[0]['id']);                                        
                                        $('#columnas_tipo1_2').val(opciones[0]['cantidad_columnas']);
                                        $('#filas_tipo1_2').val(opciones[0]['cantidad_filas']);                                                                                                                               
                                    }
                                });  /*fin ajax consigue las opciones**/ 
                                
                           $.ajax({
                                    url:"../../../../../indice_encuestas.php",
                                    type: "POST",
                                    dataType: 'JSON',
                                    data:"id_pregunta_opciones_que_cambia="+id_pregunta,
                                    success: function(opciones)
                                    {                   
                                        $("#title2").append("<label>Editar opciones</label>");
                                        for (var i = 0; i < opciones.length; i++) 
                                        {
                                           //$("#title2").append("<label>Opcion "+(i+1)+"</label><input type='text' class='form-control op' id='opcion"+i+"' name='opciones_editar[]' value='"+opciones[i]['etiqueta_opcion']+"'>");
                                           $("#title2").append("<label>Opcion "+(i+1)+"</label><input  type='hidden' id='codigos' name='ids[]'  value='"+opciones[i]['id_opcion']+"'/><textarea class='form-control op' id='opcion"+opciones[i]['id_opcion']+"' name='opciones_editar[]' >"+opciones[i]['etiqueta_opcion']+"</textarea>");
                                        }                        
                                    }
                                });  /*fin ajax consigue las opciones**/
                            break;
                        }
                    case 3:/*pregunta tipo 3*/
                        {
                           
                            break;
                        }
                    case 4:/*pregunta tipo 4*/
                        {
                           
                            break;
                        }
                    case 5:/*pregunta tipo 5*/
                        {
                            
                            $('#title3').show();
                            /*CON ESTE AJAX SE BUSCA LA CANTIDAD DE COLUMNAS Y DE FILAS DE LA TABLA**/ 
                            $.ajax({
                                    url:"../../../../../indice_encuestas.php",
                                    type: "POST",
                                    dataType: 'JSON',
                                    data:"id_pregunta_tabla_col_fila="+id_pregunta,
                                    success: function(opciones)
                                    {                   
                                        $('#id_pregunta_tipo_tabla').val(opciones[0]['id']);                                        
                                        $('#columnas_tipo5').val(opciones[0]['cantidad_columnas']);
                                        $('#filas_tipo5').val(opciones[0]['cantidad_filas']);                                                                                                                               
                                    }
                                });  /*fin ajax consigue las opciones**/                           
                           
                         /*CON ESTE AJAX SE BUSCA LAS OPCIONES DE LAS COLUMNAS DE LA TABLA**/                                    
                               $.ajax({
                                   url:"../../../../../indice_encuestas.php",
                                   type: "POST",
                                   dataType: 'JSON',
                                   data:"id_pregunta_tipo_tabla_opciones_columna_editar="+id_pregunta,
                                   success: function(opciones)
                                   {                   
                                       $("#title3").append("<label>Editar opciones de las columnas</label>");
                                       for (var i = 0; i < opciones.length; i++) 
                                       {
                                           //$("#title3").append("<label>Opcion "+(i+1)+"</label><input type='text' class='form-control op' id='opcion"+i+"' name='opciones_fila_editar[]' value='"+opciones[i]['opcion_columna']+"'>");
                                           $("#title3").append("<label>Opcion Columna"+(i+1)+"</label><input  type='hidden' id='codigos' name='ids_col[]'  value='"+opciones[i]['id']+"'/><textarea class='form-control op' id='opcion"+i+"' name='opciones_editar_col[]' >"+opciones[i]['opcion_columna']+"</textarea>");
                                       }                        
                                   }
                               });  /*fin ajax consigue las opciones**/
                            /*CON ESTE AJAX SE BUSCA LAS OPCIONES DE LAS FILAS DE LA TABLA**/    
                           $.ajax({
                                    url:"../../../../../indice_encuestas.php",
                                    type: "POST",
                                    dataType: 'JSON',
                                    data:"id_pregunta_opciones_que_cambia="+id_pregunta,
                                    success: function(opciones)
                                    {                   
                                        $("#title2").append("<label>Editar opciones</label>");
                                        for (var i = 0; i < opciones.length; i++) 
                                        {
                                          // $("#title2").append("<label>Opcion "+(i+1)+"</label><input type='text' class='form-control op' id='opcion"+i+"' name='opciones_editar[]' value='"+opciones[i]['etiqueta_opcion']+"'>");
                                          $("#title2").append("<label>Opcion Fila "+(i+1)+"</label><input  type='hidden' id='codigos' name='ids[]'  value='"+opciones[i]['id_opcion']+"'/><textarea class='form-control opc' id='opcion"+opciones[i]['id_opcion']+"' name='opciones_editar[]' >"+opciones[i]['etiqueta_opcion']+"</textarea>");
                                        }                        
                                    }
                                });  /*fin ajax consigue las opciones**/
                                   
                                 //$('#title3').append();  
                            break;
                        }
                    case 6:/*pregunta tipo 6*/
                        {
                           
                            break;
                        }
                    case 7:/*pregunta tipo 7*/
                        {
                           
                            break;
                        }
                    case 8:/*pregunta tipo 8*/
                        {
                           
                            break;
                        }
                    case 9:/*pregunta tipo 9*/
                        {
                           
                            break;
                        }
                     case 10:/*pregunta tipo 10*/
                        {
                          $.ajax({
                                    url:"../../../../../indice_encuestas.php",
                                    type: "POST",
                                    dataType: 'JSON',
                                    data:"id_pregunta_opciones_que_cambia="+id_pregunta,
                                    success: function(opciones)
                                    {                   
                                        $("#title2").append("<label>Editar opciones</label>");
                                        for (var i = 0; i < opciones.length; i++) 
                                        {
                                           //$("#title2").append("<label>Opcion "+(i+1)+"</label><input type='text' class='form-control op' id='opcion"+i+"' name='opciones_editar[]' value='"+opciones[i]['etiqueta_opcion']+"'>");
                                           $("#title2").append("<label>Opcion "+(i+1)+"</label><input  type='hidden' id='codigos' name='ids[]'  value='"+opciones[i]['id_opcion']+"'/><textarea class='form-control op' id='opcion"+opciones[i]['id_opcion']+"' name='opciones_editar[]' >"+opciones[i]['etiqueta_opcion']+"</textarea>");
                                        }                        
                                    }
                                });  /*fin ajax consigue las opciones**/
                            break;
                        }
                }
                
            }
        });   /*fin ajex consigue la pregunta*/
}

function cargarCombo()
{
    $.ajax({
        url:"../../../../../indice_encuestas.php",
        type: "POST",
        //data:"id_pregunta_encuesta_que_cambia=1"+"&id_modulo_encuesta_que_cambia="+$("#id_modulo").val()+"&id_encuesta_a_cambiar="+$("#id_encuesta").val()+"&id_usuario_encuesta_a_cambia="+$("#id_usuario").val(),            
        data:"id_modulo_pregunta="+$("#id_modulo").val(),            
        success: function(opciones)
        {               
            $("#pregunta_editable").html(opciones);            
            $('#pregunta_editable').selectpicker('refresh');
        }
    });  
}

function Ok()
{
    $('.error4').remove();		
    //var dato = nicEditors.findEditor('modulo_info').getContent();
    var dato = nicEditors.findEditor('text_pregunta').getContent();
    
    //nicEditors.findEditor('modulo_info').saveContent();
    nicEditors.findEditor('text_pregunta').saveContent();
    
    if( dato === '<br>' )
    {
         $("#modulo_info").focus().after("<div class='error4'>Ingrese informacion adicional</div>");
         return false;                
    }
    /*
    if( $("#titulo_encuesta_editar").val() === "" )
    {
        $("#titulo_encuesta_editar").focus().before("<span class='error4'>Ingrese el titulo de la encuesta</span>");
        return false;
    }*/
    $("#title").keyup(function()
    {
        if( $(this).val() !== "" )
        {
            $(".error4").fadeOut();
            return false;
        }     
    });
        document.formname.submit();
	}
 