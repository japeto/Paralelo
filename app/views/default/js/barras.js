var datos, medida;
google.load("visualization", "1", {packages:["corechart"]});
$(document).ready(function()
{
     $('#lista').change(function()        
                         {
                             var valor = $('#lista').val();                             
                             if(valor === 'pregunta1')
                             {   
                                 datos = $.ajax({
                                                    url:'app/views/default/modules/analiticas/datosbarras.php',
                                                    type:'post',
                                                    dataType:'json',
                                                    async:false,
                                                    success:function(){},                                                            
                                                }).responseText; 
                                                
                             datos = JSON.parse(datos); 
                             medida = 'Cantidad';
                             google.setOnLoadCallback(dibujarGrafico());
                             }//FIN SI                           
                             else if(valor === 'pregunta2')
                             {
                                 datos = $.ajax({
                                                    url:'app/views/default/modules/analiticas/datosbarras1.php',
                                                    type:'post',
                                                    dataType:'json',
                                                    async:false,
                                                    success:function(){},                                                            
                                                }).responseText;
                             datos = JSON.parse(datos);   
                             medida = 'PH%';
                             google.setOnLoadCallback(dibujarGrafico());
                             }
                             else if(valor === 'luz')
                             {
                                 datos = $.ajax({
                                                    url:'datosluz',
                                                    type:'post',
                                                    dataType:'json',
                                                    async:false,
                                                    success:function(){},                                                            
                                            }).responseText;
                             datos = JSON.parse(datos);
                             medida = 'Lux';
                             google.setOnLoadCallback(dibujarGrafico());
                             }
                             else if(valor === 'voltaje')
                             {
                                 datos = $.ajax({
                                                    url:'datosvoltaje',
                                                    type:'post',
                                                    dataType:'json',
                                                    async:false,
                                                    success:function(){},                                                            
                                            }).responseText;
                             datos = JSON.parse(datos);  
                             medida = 'Volts';
                             google.setOnLoadCallback(dibujarGrafico());
                             }
                         });//FIN CHANGE
                             
});    
        
      	function dibujarGrafico()
        {
        	var data = google.visualization.arrayToDataTable(datos);            
        	var options = {
          	title: 'GRAFICO 1',
          	hAxis: {title: 'VARIABLE', titleTextStyle: {color: 'green'}},
          	vAxis: {title: medida, titleTextStyle: {color: '#FF0000'}},
          	backgroundColor:'#ffffee',
          	legend:{position: 'bottom', textStyle: {color: 'red', fontSize: 13}},
          	is3D: true,
          	width:600,
                height:400
        	};
                var grafico = new google.visualization.ColumnChart(document.getElementById('grafica'));
                grafico.draw(data, options);        
      	};                 
