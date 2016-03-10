/**
 * central-click.js
 */
function dibujar_pregunta(num_pregunta,tablaencuesta){

    consulta = "select pregunta"+num_pregunta+",count(pregunta"+num_pregunta+") from "+tablaencuesta+" where pregunta"+num_pregunta+" !='' group by pregunta"+num_pregunta+" ";
    contestadas = $.ajax({
      url:"../../../../../indice_analiticas_avanzadas.php",
      // url:"../../../../../indice_analiticas.php",
      type:'post',
      dataType:'json',
      async:false,
      data:"sql_analisis4="+consulta,
      success:function(response){},
    }).responseText;

    var contestadas = JSON.parse(contestadas);
    var datos = []
    for( var index =0 ;index < contestadas.length; index++){
        datos.push(Object.keys(contestadas[index]).map(key => contestadas[index][key]))
    }

    // console.log(consulta,contestadas,datos) 

    // consulta = "select count(pregunta"+num_pregunta+") from "+tablaencuesta+" where pregunta"+num_pregunta+" ='' group by pregunta"+num_pregunta+" ";
    // blanco = $.ajax({
    //   url:"../../../../../indice_analiticas_avanzadas.php",
    //   // url:"../../../../../indice_analiticas.php",
    //   type:'post',
    //   dataType:'json',
    //   async:false,
    //   data:"sql_analisis4="+consulta,
    //   success:function(){},
    // }).responseText;
    // blanco = JSON.parse(blanco)[0]
    // console.log(consulta,blanco)


    $("#grafica2").empty();
    if(! num_pregunta ){
      $("#grafica2").html("<center><p>La pregunta seleccionada no posee datos para graficar.</p><center>");
      return;
    }

    var chart = c3.generate({
      bindto: '#grafica2',
      data: {
        columns: datos,
        // columns:[ /*['total',total],*/ ['contestadas',contestadas.count], ['blanco',blanco.count]],
        type : 'bar',
        labels: true
      },legend: {
        position: 'bottom'
      },zoom: {
        enabled: false
      },
      axis: {
        x: {
          show: true,
          type: 'category',   
          tick: {
            format: function (x) { return ''; }
          }            
        },
        y: {
          label: 'Cantidad de estudiantes',
        }
      },tooltip: {
        format: {
          title: function (d) { return 'Participación'},
          value: function (value, ratio, id) {return 'votaron: '+value+' personas';}
        },
        position: function(data, width, height, element) {
          var containerWidth, x, y;
          containerWidth = $("#grafica2").width();
          x=y=0
          return {
            top: y,
            left: x
          };
        }        
      }
    });    
}

d3.svg.BubbleChart.define("central-click", function (options) {
  var self = this;


function wrap() {

        var self = d3.select(this),
            textLength = self.node().getComputedTextLength(),
            text = self.text(),
            lineNumber = 0,
            lineHeight = 1.1, // ems
            line = [];

        var circle = d3.select("circle");

        words = text.split(/\s+/).reverse(),word='';
        if(textLength > (circle.attr("r")*3)){

          x=d3.select(self.node()).attr("x")
          y=d3.select(self.node()).attr("y")
          dy = parseFloat(d3.select(self.node()).attr("dy"))
          if(dy == 0){
            dy = -20
          }
          self.text(null);
          lineNumber = dy
          self = self.append("tspan").attr("x", x).attr("y", y).attr("dy", lineNumber + "px");

          while (word = words.pop()) {
            line.push(word);                        
            self.text(line.join(" "))
            if (self.node().getComputedTextLength() > (circle.attr("r")*3)) {
              if(dy < 0){ lineNumber-=dy; }else{ lineNumber+=dy; }
              line.pop();
              self.text(line.join(" "));
              line = [word];
              self = self.append("tspan").attr("x", x).attr("y", y).attr("dy",lineNumber+"px").text(word);
            }
          }
        }
    } 

  var div = d3.select(".bubbleChart")
        .append("div")            //declare the tooltip div 
        .attr("class", "tooltip2") // apply the 'tooltip' class
        .style("opacity", 0);  


  self.setup = (function (node) {
    var original = self.setup;
    return function (node) {
      var fn = original.apply(this, arguments);
      self.event.on("click", function(node) {
        if (node.selectAll("text.central-click")[0].length === 1) {
          $(".tooltip").hide();
          var element= parseInt(node.selectAll("text.central-click")[0].parentNode.id)
          if(self.items[element].children !=  undefined){
            $("#grafica1").empty();
            $("#grafica2").html(self.items[element].parrafo)
            // console.log(self.items[0].tipo)
            navegacion = self.items
            new Bubbles(self.items[element].children,"#grafica1","#grafica2");

          }else{
            dibujar_pregunta(self.items[element].num_pregunta, self.items[element].tablaencuesta)

            // console.log(node.selectAll("text.central-click"))

             var tNode = d3.select( node.selectAll("text.central-click")[0].parentNode );
             var child = node.selectAll("text.central-click")[0];
             var childtxt = child[0].__data__ .item.text;
                tNode.on("mouseover", function(d){
                  // console.log("este es");
                    div.style("visibility", "visible")
                      div.transition()
                      .duration(500)  
                      .style("opacity", 0);
                      div.transition()
                      .duration(200)  
                      .style("opacity", .8);

                    div.html( childtxt )
                      .style("left", (d3.select(this).attr("cx")) + "px")      
                      .style("top", (d3.select(this).attr("cy")) + "px");

                  })
                tNode.on("mousemove", function(d){
                    return div.style("left", (d3.select(this).attr("cx")) + "px")      
                      .style("top", (d3.select(this).attr("cy")) + "px");
                })
                tNode.on("mouseout", function(){
                  return div.style("visibility", "hidden");
                })



              // tNode.each(wrap)
            
          }
        }
      });
      return fn;
    };
  })();

  self.reset = (function (node) {
    var original = self.reset;
    return function (node) {
      var fn = original.apply(this, arguments);
      node.select("text.central-click").remove();
      node.selectAll("text").each(wrap);
      return fn;
    };
  })();

  self.moveToCentral = (function (node) {
    var original = self.moveToCentral;
    return function (node) {
      var fn = original.apply(this, arguments);
      var transition = self.getTransition().centralNode;
      transition.each("end", function() {
        // console.log(options.text)
        node.append("text").classed({"central-click": true})
          .attr(options.attr)
          .style(options.style)
          .attr("x", function (d) {return d.cx;})
          .attr("y", function (d) {return d.cy;})
          .text(options.text)
          .style("opacity", 0).transition().duration(self.getOptions().transitDuration / 2)
          .style("opacity", "0.8")
          .each(wrap);
      });
      return fn;
    };
  })();
});