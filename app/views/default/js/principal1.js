$(document).ready(function(){        
  
  $("#panelacceso").hide(); 
  /**carga el *valor inicial*/    
  /*$( "#tipo_usar" ).click(function(){            
    $( "#tipo_usar" ).dialog( "open" );             
  });*/

  $("#validarlog").hide(); 
    
  var clone;
  $( "#login" ).click(function(){  
    //~ clone = $("#content").clone();
    $("#content").hide(/*"slow"*/); 
    $("#panelacceso").show(); 
  });

  var usuario = $( "#user" ), contrasena = $( "#pass" ), todosLosCampos = $( [] ).add( usuario, contrasena);

  $("#btnlogin").click( function(){
     $('.error2').remove();    
        if ( ( $('#user').val() === '') ){
            $("#user").focus().after("<p class='error2'>Ingrese un nombre usuario </p>").css("border", "1px solid red");
            $("#user").reload();
            if ( ( $('#pass').val() === '') ){
               $("#pass").focus().after("<p class='error2'>Ingrese una contraseña </p>").css("border", "1px solid red");
               return false;                
            }
            return false;                
        }else{
          if ( ( $('#pass').val() === '') ){
            $("#pass").focus().after("<p class='error2'>Ingrese una contraseña </p>").css("border", "1px solid red");
            return false;                
          }
        }
        if ( ( $('#pass').val() != '') && ( $('#user').val() != '') ){  
          $('#pass').css("border", "1px solid blue");
          $('#user').css("border", "1px solid blue");
          $.ajax({
            url:"../../../indice_principal.php",
            type: "POST",
            data:"login="+$( "#user" ).val()+"&pass="+$( "#pass" ).val(),
            success: function(retorno){
              console.log("el retorno"+retorno);         
              var v = parseInt(retorno);
              if (v === 1){                                                                                                      
              $(location).attr('href',"../../../indice_principal.php?action=admin");
              }else if (v === 2){                                                                                                      
              $(location).attr('href',"../../../indice_principal.php?action=editor");
              }else if (v === 3){                                                                                                      
              $(location).attr('href',"../../../indice_principal.php?action=encuestado");
              }else if (v === 4){                                                                                                      
              $(location).attr('href',"../../../indice_principal.php?action=registrar");
              }else if (v === 0){
                  $("#validarlog").show();
                  $("#user").css("border", "1px solid red");
                  $("#pass").css("border", "1px solid red");
                  }
            }
          });
        }; 
  });

$("#btnlogin2").click( function(){
     $('.error2').remove();    
        if ( ( $('#user').val() === '') ){
            $("#user").focus().after("<p class='error2'>Ingrese un nombre usuario </p>").css("border", "1px solid red");
            $("#user").reload();
            if ( ( $('#pass').val() === '') ){
               $("#pass").focus().after("<p class='error2'>Ingrese una contraseña </p>").css("border", "1px solid red");
               return false;                
            }
            return false;                
        }else{
          if ( ( $('#pass').val() === '') ){
            $("#pass").focus().after("<p class='error2'>Ingrese una contraseña </p>").css("border", "1px solid red");
            return false;                
          }
        }
        if ( ( $('#pass').val() != '') && ( $('#user').val() != '') ){  
          $('#pass').css("border", "1px solid blue");
          $('#user').css("border", "1px solid blue");
          $.ajax({
            url:"../../../../../indice_principal.php",
            type: "POST",
            data:"login="+$( "#user" ).val()+"&pass="+$( "#pass" ).val(),
            success: function(retorno){
              console.log("el retorno"+retorno);         
              var v = parseInt(retorno);
              if (v === 1){                                                                                                      
              $(location).attr('href',"../../../../../indice_principal.php?action=admin");
              }else if (v === 2){                                                                                                      
              $(location).attr('href',"../../../../../indice_principal.php?action=editor");
              }else if (v === 3){                                                                                                      
              $(location).attr('href',"../../../../../indice_principal.php?action=encuestado");
              }else if (v === 4){                                                                                                      
              $(location).attr('href',"../../../../../indice_principal.php?action=registrar");
              }else if (v === 0){
                  $("#validarlog").show();
                  $("#user").css("border", "1px solid red");
                  $("#pass").css("border", "1px solid red");
                  }
            }
          });
        }; 
  });
  
  $("#canlogin").click( function(){
    $("#panelacceso").hide(/*"slow"*/); 
    $("#content").show(); 
  });
  $( "#response" ).click(function() {
     /*$("#content").load("../../../indice_encuestado.php?action=iniciar", function() {
      loadSeePreliminary();
      });*/
    $(location).attr('href',"../../../indice_encuestado.php?action=iniciar");
  });

});

