 var contador=0;
$(document).ready(function()
{    
   $( "#user" ).focus();
$( "#login" ).click(
        function() 
        {             
            ++contador;
            $.ajax({
                url:"../../../../../indice_principal.php",
                type: "POST",
                data:"login_a_buscar="+$( "#user" ).val()+"&pass_a_buscar="+$( "#pass" ).val(),
                success: function(retorno)
                {  

                    var v = parseInt(retorno);
                    
                    if (v === 1)//existe el usuario                    
                    {                        
                        $.ajax({
                            url:"../../../../../indice_principal.php",
                            type: "POST",
                            data:"login="+$( "#user" ).val()+"&pass="+$( "#pass" ).val(),
                            success: function(retorno)
                            {
                                //console.log("el retorno"+retorno);
                                var v1 = parseInt(retorno);
                               if (v1 === 1)
                               {                                                                                                      
                                   $(location).attr('href',"../../../../../indice_principal.php?action=admin");
                               }
                               else if (v1 === 2)
                               {                                                                                                      
                                   $(location).attr('href',"../../../../../indice_principal.php?action=editor");
                               }
                               else if (v1 === 3)
                               {                                                                                                      
                                   $(location).attr('href',"../../../../../indice_principal.php?action=encuestado");
                               }
                               else if (v1 === 4)
                               {                                                                                                      
                                   $(location).attr('href',"../../../../../indice_principal.php?action=registrar");
                               }
                               else if (v1 === 0)
                               {
                                   $(location).attr('href',"../../../../../indice_principal.php?action=no_registro");
                               }
                           }
                        });
                    }
                    else if (v === 0)
                    {
                         if ((contador >= 1) && (contador <= 3))
                         {
                             $(location).attr('href',"../../../../../indice_principal.php?action=registrar");                        
                             contador = 0;
                         }                         
                    }
                },
            }); 
        });
       
   	
});