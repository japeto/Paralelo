
function Bubble(json,divrender) {

  // var diameter = 500;
  var svg = d3.select(divrender).append("svg")
    .attr("width", $(divrender).width())
    .attr("height", $(divrender).width());

  var bubble = d3.layout.pack()
    .size([$(divrender).width(), $(divrender).height()])
    .value(function(d) {return d.size; })
    .padding(25);

  var nodes = bubble.nodes(processData(json))
    .filter(function(d) { return !d.children; });

  var vis = svg.selectAll("circle")
    .data(nodes);

    var div = d3.select("body")
      .append("div")  //declare the tooltip div 
      .attr("class", "tooltip") // apply the 'tooltip' class
      .style("opacity", 0);  

  var color = d3.scale.category20();

  vis.enter().append("circle")
    .attr("transform", function(d) { return "translate(" + d.x + "," + d.y + ")"; })
    .attr("r", function(d) { return d.r; })
    .attr("fill",function(d,i){return color(i);})

    .on("mouseover", function(d){
        // console.log(d);
        var content=''+d.name+'';
        if(d.value >0){
            content = ''+d.name+' <br/ ><b> '+d.value+' personas</b>';
        }

        div.style("visibility", "visible")
          div.transition()
          .duration(500)  
          .style("opacity", 0);
          div.transition()
          .duration(200)  
          .style("opacity", .9);  
          div.html(content)
          .style("left", (d3.event.pageX) + "px")      
          .style("top", (d3.event.pageY - 28) + "px");
      })
    .on("mousemove", function(){return div.style("top", (d3.event.pageY-10)+"px").style("left",(d3.event.pageX+10)+"px");})
    .on("mouseout", function(){return div.style("visibility", "hidden");}) 


  // var nameLabel = vis.enter().append("text")
  //   .html(function(d) {
  //     return d.name;
  //   })
  //   .attr("text-anchor", "middle")
  //   .attr("x", function(d) { return d.x; })
  //   .attr("y", function(d) { return d.y; })
  //   .attr("font-family", "sans-serif")
  //   .attr("font-size", "13px")
  //   .attr("fill", "black");

  // var valueLabel = vis.enter().append("text")
  //   .html(function(d) {
  //     return d.value; // d.size, d.percentage
  //   })
  //   .attr("text-anchor", "middle")
  //   .attr("x", function(d) { return d.x; })
  //   .attr("y", function(d) { return d.y; })
  //   .attr("dx", 0)
  //   .attr("dy", 20)
  //   .attr("font-family", "sans-serif")
  //   .attr("font-size", "12px")
  //   .attr("fill", "white");

  function processData(data) {
    var obj = data.question;
    var newDataSet = [];
    for(var prop in obj) {
      newDataSet.push({name: prop, className: prop.toLowerCase(), size: obj[prop]});
    }
    return {children: newDataSet};

  }
}



function Bubbles_old(data,divrender,clickrender) {

  console.log(data)

  var diameter = $(divrender).width(),
  format = d3.format(",d"),
  color = d3.scale.category20c();

  $(window).resize(function() {
    diameter = $(divrender).width();
    svg.attr("width", diameter);
    svg.attr("height", diameter * 600 / 600);
  });  


  var bubble = d3.layout.pack()
    .sort(null)
    .size([diameter, diameter])
    .padding(1);


  var svg = d3.select(divrender).append("svg")
    .attr("width", diameter)
    .attr("height", diameter)
    .attr("class", "bubbles")

  var tooltip = d3.select("body")
    .append("div")
    .style("position", "absolute")
    .style("z-index", "10")
    .style("visibility", "hidden")
    .style("color", "white")
    .style("padding", "8px")
    .style("background-color", "rgba(0, 0, 0, 0.75)")
    .style("border-radius", "6px")
    .style("font", "12px sans-serif")
    .text("tooltip");

  var json ='{"name": "datos","children": [';
  for (var i = 0; i<data.length ; i++) {
    json+='{"name": "pregunta '+i+'", "size": '+(i+40)+', "id":'+i+'},';
  };
  json+='{"name": "", "size": 0}]}';


  // console.log("1:"+json);

  var force = d3.layout.force()
      .linkDistance(50)
      .gravity(1)
      .charge(function(d) { return -Math.pow(d.r,2)/8; })
      .size([diameter, diameter]);

  var drag = d3.behavior.drag()
      .origin(function(d) { return d; })
      .on("dragstart", dragstarted)
      .on("drag", dragged)
      .on("dragend", dragended);     

  var node = svg.selectAll(".node")
    .data(bubble.nodes(classes(datapaint))
    .filter(function(d) { return !d.children; }))
    .enter().append("g")
    .attr("class", "node")
    .call(drag);

      force.on("tick", function(e) {
        node
            .attr("cx", function(d) { return d.x = Math.max(d.r, Math.min(diameter - d.r, d.x)); })
            .attr("cy", function(d) { return d.y = Math.max(d.r, Math.min(diameter - d.r, d.y)); });
      }); 
  
  svg.style("opacity", 1e-6) 
    .transition() 
    .duration(1000) 
    .style("opacity", 1); 

  var color = d3.scale.category20();

  node.append("circle")
  .attr("r", function(d) { return d.r; })
  .style("class", "node-single")
  .attr("fill",function(d,i){ return color(i);})//return "rgb(200,200,200)";})
  .on("mouseover", function(d) {
            d3.select(this).classed("node-active", true);
            d3.select(this).transition().duration(750).attr("r", d.r * 1.2);
    tooltip.text(d.className + ":da click para ver el detalle" );
    tooltip.style("visibility", "visible");
  })
  .on("mousemove", function() {
    return tooltip.style("top", (d3.event.pageY-10)+"px").style("left",(d3.event.pageX+10)+"px");
  })
  .on("mouseout", function(){
    d3.select(this).style("class", "node-single")
    d3.select(this).classed("node-active", false);
    d3.select(this).transition().attr("r",function(d) { return d.r; });
    return tooltip.style("visibility", "hidden");
  })
  .on("click", function(d) { 
    // var chart = c3.generate({
    //   bindto: clickrender,
    //   data: {
    //     columns: data[d.id],
    //     type: 'bar',
    //     labels: true,
    //     names:data[d.id].names
    //   },
    //   legend: {
    //     show: true
    //   },
    //   tooltip: {
    //     format: {
    //       title: function (d) { return ''}
    //       ,value: function (value, ratio, id) {return 'votaron: '+value+' personas';}
    //     }
    //   }
    // });
    // $("#title").html(data[d.id].title);
    // d3.select(this).style("fill", function(){ return randomcolor(); });  
  });  

  force.on("tick", function() {
      node.attr("transform", function(d) { return "translate(" + d.x + "," + d.y + ")"; });
  });
  node.attr("transform", function(d) { return "translate(" + d.x + "," + d.y + ")"; });

  node.attr("cx", function(d) { return d.x = Math.max(d.r, Math.min(diameter - d.r, d.x)); })
     .attr("cy", function(d) { return d.y = Math.max(d.r, Math.min(diameter - d.r, d.y)); });  

  // setInterval(function() {
  //   console.log("voy")
  //   node.attr("cx", function(d) { return d.x = Math.max(d.r, Math.min(diameter - d.r, d.x)); })
  //   .attr("cy", function(d) { return d.y = Math.max(d.r, Math.min(diameter - d.r, d.y)); });      
  // },800);

  node.append("text")
    .attr("dy", ".3em")
    .style("text-anchor", "middle")
    .style("pointer-events", "none")
    .text(function(d) { return d.className.substring(0, d.r / 3); });

  function classes(root) {
    var classes = [];
    function recurse(name, node) {
      if (node.children){
        node.children.forEach(function(child) { recurse(node.name, child); });
      }else{
        classes.push({packageName: name, className: node.name, value: node.size, id: node.id});
      }
    }
    recurse(null, root);
    return {children: classes};
  }
  function dragstarted(d) {
    d3.event.sourceEvent.stopPropagation();
    d3.select(this).classed("dragging", true);
    force.start();
  }

  function dragged(d) {  
    d3.select(this).attr("cx", d.x = d3.event.x).attr("cy", d.y = d3.event.y);  
  }

  function dragended(d) {  
    d3.select(this).classed("dragging", false);
  }

  function gravity(alpha) {
      return function (d) {
          d.y += (d.cy - d.y) * alpha;
          d.x += (d.cx - d.x) * alpha;
      };
  }   

  function collide(alpha) {
      var padding = 6
      var quadtree = d3.geom.quadtree(dot);
      return function (d) {
          var r = d.r + radiusp.domain()[1] + padding,
              nx1 = d.x - r,
              nx2 = d.x + r,
              ny1 = d.y - r,
              ny2 = d.y + r;
          quadtree.visit(function (quad, x1, y1, x2, y2) {
              if (quad.point && (quad.point !== d)) {
                  var x = d.x - quad.point.x,
                      y = d.y - quad.point.y,
                      l = Math.sqrt(x * x + y * y),
                      r = d.r + quad.point.r + (d.color !== quad.point.color) * padding;
                  if (l < r) {
                      l = (l - r) / l * alpha;
                      d.x -= x *= l;
                      d.y -= y *= l;
                      quad.point.x += x;
                      quad.point.y += y;
                  }
              }
              return x1 > nx2 || x2 < nx1 || y1 > ny2 || y2 < ny1;
          });
      };
  }  
  d3.select(self.frameElement).style("height", diameter + "px");
}


function randomcolor(){
    colorrgb = []
    for (var i=0; i<3; i++){
        colorrgb.push(Math.floor(Math.random()*256))
    }
    return 'rgb('+colorrgb.toString()+')'
}

var resultado;
var divrender;
var navegacion;
var indice;

function rangoGrupos(active,start, end){
  $(divrender).empty();
  $("#grafica2").empty();
  
  $(".active").removeClass("active");
  $(active).addClass("active");

  var datos=[];
  resultado.slice(start, end).map(function(k){ datos.push(k); })
  pintaBolas(datos)
}

function pintaBolas(entrada){
  var bubbleChart = new d3.svg.BubbleChart({
      supportResponsive: true,
      //container: => use @default
      size: $(divrender).width(),
      //viewBoxSize: => use @default
      innerRadius: $(divrender).width() / 3.5,
      //outerRadius: => use @default
      radiusMin: $(divrender).width()*0.09,
      // radiusMax: use @default
      //intersectDelta: use @default
      //intersectInc: use @default
      //circleColor: use @default   
      data: {
        items: entrada,
        eval: function (item) {
          // console.log(item.count); 
          return item.count;
        },
        classed: function (item) {
          // console.log(item.text.split(" ").join("")); 
          return item.text.split(" ").join("");
        }
      },
      plugins: [
        {
          name: "central-click",
          options: {
            text: entrada[0].ver,
            style: {
              "font-size": "10px",
              "font-style": "italic",
              "font-family": "Source Sans Pro, sans-serif",
              //"font-weight": "700",
              "text-anchor": "middle",
              "fill": "blue"
            },
            attr: {dy: "90px"},
             centralClick: function() {
             }
          }
        },
        {
          name: "lines",
          options: {
            format: [
              {// Line #0
                textField: "count",
                classed: {count: true},
                style: {
                  "font-size": "3px",
                  "font-family": "Source Sans Pro, sans-serif",
                  "text-anchor": "middle",
                  fill: "white"
                },
                attr: {
                  dy: "10px",
                  x: function (d) {return d.cx;},
                  y: function (d) {return d.cy;}
                }
              },
              {// Line #1
                textField: "text",
                classed: {text: true},
                style: {
                  "font-size": "14px",
                  "font-family": "Source Sans Pro, sans-serif",
                  "text-anchor": "middle",
                  fill: "white"
                },
                attr: {
                  dy: "20px",
                  x: function (d) {return d.cx;},
                  y: function (d) {return d.cy;}
                }
              }
            ],
            centralFormat: [
              {// Line #0
                style: {"font-size": "50px"},
                attr: {dy: "-60px"}
              },
              {// Line #1
                style: {"font-size": "20px"},
                attr: {dy: "20px"}
              }
            ]
          }
        }]
    });  
}

navegacion = "aqui";
function volver(){
  $("#grafica1").empty();
  $("#grafica2").html(navegacion.parrafo)
  // console.log(indice+" == encuestas"+(indice == "encuestas") )


  if(indice == "modulos"){
    console.log("#####################")
    navegacion = spromesa.children
    new Bubbles(spromesa.children,"#grafica1","#grafica2");
  }else{
    new Bubbles(navegacion,"#grafica1","#grafica2");
    $("btnstart").hide();
  }
  
}
function Bubbles(entrada,areadibujo,clickrender) {

  // var datos= ((entrada.length == undefined) ? [entrada] : entrada )
  var datos=[];
  resultado=entrada;
  divrender = areadibujo;
  // si no es de tipo arreglo, es de tipo objeto
  if(entrada.length == undefined){
    //como es de tipo objeto lo convierto en arreglo
    datos= [entrada]
    //lo envio a pintar
    pintaBolas(datos);

  }else{  // es de tipo arreglo
    // console.log(entrada[0])
      // hago la paginacion de 7 en 7
      $("#paginacion").empty();
      // $( "#paginacion" ).append("<li id='start'><a><i class='fa fa-home fa-fw'></i></a></li>");
      $( "#paginacion" ).append("<li id='btnstart'><a onclick=volver()><i class='fa fa-angle-double-left fa-fw'></i> Atras</a></li>");

      indice = entrada[0].tipo;
      for(var i=0; i < Math.ceil( entrada.length / 7 ); i++){
        $( "#paginacion" ).append("<li id='pag"+i+"'><a style='cursor:pointer;' onclick=rangoGrupos('#pag"+i+"',"+(i*7)+","+(i*7+7)+")"+"> "+entrada[0].tipo+" ["+(i*7)+","+(i*7+7)+"]</a></li>");
      }
      // $( "#paginacion" ).append("<li id='start'><a><i class='fa fa-angle-double-right fa-fw'></i></a></li>");
      $("#paginacion").show();

      entrada.slice(0, 7).map(function(k){ datos.push(k);})
      pintaBolas(datos);
      $("#pag0").addClass("active");
  }
  return entrada;
}


