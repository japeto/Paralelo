$(document).ready(function(e) 
{ 
    $( "#titulo_encuesta" ).focus();
    $('#adicion').click(function ()
    {
        console.log('entro a adicionar encuestas');
        $.ajax({
        url:"../../../../../indice_encuestas.php",
        type: "POST",
        data:"titulo="+$('#titulo_encuesta').val()+"&id_usuario="+$('#id_usuario').val()+"&estado="+$('#estado').val(),
        success: function(retorno)
        {               
            var v = parseInt(retorno);                   
            if (v === 1)
            {
                $(location).attr('href',"../../../../../indice_encuestas.php?action=modulo");
            }
        }
    });  
    })
});