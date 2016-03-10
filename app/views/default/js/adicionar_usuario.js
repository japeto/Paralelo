$(document).ready(function()
{    

    $.ajax({
        url:"../../../../../indice_usuario.php",
        type: "POST",
        data:"cargarPerfilesOpciones=' '",
        success: function(opciones){               
            $("#tipousaurio").append(opciones);
            // console.log(opciones)
        }
    }); 


   $( "#name" ).focus();
   $( "#add" ).click(function(){
    $.ajax({
        url:"../../../../../indice_usuario.php",
        type: "POST",
        data:"nombre="+$( "#name" ).val()+"&apellido="+$( "#last_name" ).val()+"&correo1="+$( "#email" ).val()+"&usuario="+$( "#login" ).val()+"&contrasena10="+$( "#pass1" ).val()+"&contrasena2="+$( "#pass2" ).val()+"&activo="+$('input[name="activado"]:checked').val()+"&tipousaurio"+$("#tipousaurio").val(),
        success: function(retorno){                    
            console.log(retorno);
            var v= parseInt(retorno)
            if (v === 1 ){
                // alert("El usuario se ha registrado correctamente\n  A continuación puede iniciar sesión");
                $(location).attr('href',"../../../../../indice_usuario.php?action=sesion");
            }else{
                // alert("El usuario ya existe\n Sino recuerda su clave debe tratar de recuperarla haciendo clic en Olvid&eacute; mi contraseña");
            }            
        },
    }); 
    });

   $("#btncancelar").click(function(){
        $("#tablausuarios").empty();
        $("#cantidad").val("");
        $("#cantidad").attr('disabled',false);
        $("#btnvariosusuarios").attr('disabled',false);
        $("#btnenviar").hide();
        $("#btncancelar").hide();
   });
   $("#btnvariosusuarios").click(function(){
    if($("#cantidad").val() != ""){
        console.log( $("#cantidad").val() )
        $("#cantidad").attr('disabled',true);
        $("#btnvariosusuarios").attr('disabled',true);
        for(var uid=0;uid < parseInt($("#cantidad").val()); uid++){
            $("#tablausuarios").append('<tbody>'+
                '<tr class="inputs">'+
                        '<td><input type="text" id="nombre'+(uid+1)+'" class="form-control" placeholder="Nombres"></td>'+
                        '<td><input type="text" id="apellido'+(uid+1)+'" class="form-control" placeholder="Apellidos"></td>'+
                        '<td><input type="text" id="usuario'+(uid+1)+'" class="form-control" placeholder="Usuario"></td>'+
                        '<td><input type="text" id="contrasena'+(uid+1)+'" class="form-control" placeholder="Contraseña"></td>'+
                        '<td><input type="text" id="Repetir'+(uid+1)+'" class="form-control" placeholder="Repetir Contraseña"></td>'+
                        '<td><input type="text" id="correo'+(uid+1)+'" class="form-control" placeholder="Correo"></td>'+
                    '</tr>'+
                '</tbody>');
        }
        $("#btnenviar").show();
        $("#btncancelar").show();
    }
   });

   $("#btnenviar").click(function(){
        var nuevos = []
        for(var uid=0;uid < parseInt($("#cantidad").val()); uid++){
            if( $("#nombre"+(uid+1)+"").val() != "" && $("#usuario"+(uid+1)+"").val() != "" ){
                var usuarioindex = [$("#nombre"+(uid+1)+"").val(),
                                    $("#apellido"+(uid+1)+"").val(),
                                    $("#usuario"+(uid+1)+"").val(),
                                    $("#contrasena"+(uid+1)+"").val(),
                                    // $("#Repetir"+(uid+1)+"").val(),
                                    $("#correo"+(uid+1)+"").val()]
                nuevos.push(usuarioindex)
            }
        }

        $.ajax({
            url:"../../../../../indice_usuario.php",
            type: "POST",
            data:"id_encuesta_responder="+$("#id_encuesta").val()+"&cantidad="+$("#cantidad").val()+"&codigo_universidad="+$("#id_university").val()+"&nuevos_usuarios="+JSON.stringify( nuevos ),
            success: function(response){   
                console.log(response);
                var v = parseInt(response);
                console.log(">>>>>>>>>>>>>>>>>> ujum "+response);
                // if (v === 1){    
                    // console.log(">>>>>>>>>>>>>>>>>> ujum");
                    // $(location).attr('href',"pines_generados.php");
                // }                
            }
        }); 


        // console.log(JSON.stringify( nuevos ));
   });

});
