/**
* drawmap es la funcion que permite graficar en el div el mapa y las areas
* donde estan las universidades participantes de la encuesta
* @see TopoJSon
*
* @method drawmap
* @param {String} es la ruta donde esta el json a pintar como mapa
* @param {Object} referencia al div donde se desea pintar
* @param {json} estructura de las marcas que van sobre el mapa
*/
function drawmap(divrender, marks) {

  // centro y diametro del div
  var centered,diameter = $(divrender).width();

  // ancho y alto del contenedor
  var svg = d3.select(divrender).append("svg")
    .attr("width", diameter)
    .attr("height", diameter*1.02);

  //funcion graficadora del d3-toppojson
  d3.json("../../js/jmap/valle-cauca.json", function(error, co) {
    
    //saco los departamentos
    var subunits = topojson.feature(co, co.objects.mpios);

    // posicion del mapa - scala - centro - rotacion.
    var projection = d3.geo.mercator()
      .scale(diameter*3)
      .translate([diameter / 2, (diameter / 2)+20])
      .center([-69,46])
      .rotate([2,3,2]);

    // establezco la proyeccion a los departamentos
    var path = d3.geo.path()
      .projection(projection);

    //agrego un contenedor a la pagina para el tooltip
    var div = d3.select("body")
      .append("div")            
      .attr("class", "tooltip") 
      .style("opacity", 0);        

    //cuadricula 
    var graticule = d3.geo.graticule()
        .step([2, 2]);

    //g es area para pintar del svg
    svg.append("g")
      .selectAll("path")
      .data(graticule.lines)
      .enter().append("path")
      .attr("d", path)
      .attr("class", "graticule");      

    //pinto los departamentos y municipios
    svg.append("path")
      .datum(subunits)
      .attr("width", diameter)
      .attr("d", path);


    // pinto los poligonos de los que estan en el archivo
    // areas que crean los municipios
    svg.selectAll(".mpio")
      .data(topojson.feature(co, co.objects.mpios).features)      // saca cada uno de los archivos
      .enter().append("path")                                     // lo agrego al grafico
      // .attr("class", function(d) { return "mpio " + "_" + d.id; })// la clase del css que obtiene cada municipio
      .attr("class", function(d) { return "mpio " + "_" + d.properties.name; })// la clase del css que obtiene cada municipio
      .attr("d", path)
      .on("mouseover", function(d){                                     //agrego el evento del mouse sobre el municipio

        var countdepto =verdepto(d.properties.name);
        
        // console.log(d.properties.name)

        if(countdepto > 0){
          div.style("visibility", "visible")
            div.transition()
            .duration(500)  
            .style("opacity", 0);
          div.transition()
            .duration(200)  
            .style("opacity", .9);  
          // div .html(''+d.properties.name+'')
          div.html(countdepto+" personas contestaron <br/><b>"+d.properties.name+"</b>")
            .style("left", (d3.event.pageX) + "px")      
            .style("top", (d3.event.pageY - 28) + "px");
        }else{
          div.style("visibility", "visible")
            div.transition()
            .duration(500)  
            .style("opacity", 0);
          div.transition()
            .duration(200)  
            .style("opacity", .9);  
          // div .html(''+d.properties.name+'')
          div.html(""+d.properties.name+"")
            .style("left", (d3.event.pageX) + "px")      
            .style("top", (d3.event.pageY - 28) + "px");
        }

      })
      .on("mousemove", function(){                                    //agrego el evento cuando el mouse se mueve
          return div.style("top", (d3.event.pageY-10)+"px").style("left",(d3.event.pageX+10)+"px");
      })
      .on("mouseout", function(){                                    //agrego el evento del mouse cuando se sale del municipio
          return div.style("visibility", "hidden");
      })      
      .on("click", clicked);                                        //agrego el evento cuando dan clic en el municipio

    // agrego los bordes de los municipios
    svg.append("path")
      .datum(topojson.mesh(co, co.objects.mpios, function(a, b) { return a !== b; }))
      .attr("d", path)
      .attr("class", "mpio-borde");

    // agrego los bordes de los departamentos
    svg.append("path")
      .datum(topojson.mesh(co, co.objects.depts, function(a, b) { return a !== b;}))
      .attr("class", "deptoborde")
      .attr("d", path);

    //// para poner el nombre de los departamentos
    // svg.selectAll(".subunit-label")
    //     .data(topojson.feature(co, co.objects.mpios).features)
    //   .enter().append("text")
    //     .attr("class", function(d) { return "subunit-label " + d.id; })
    //     .attr("transform", function(d) {return "translate(" + path.centroid(d) + ")"; })
    //     .attr("dy", ".35em")
    //     .attr("dx", "-30")
    //     .style("opacity", .1)
    //     .text(function(d) { return d.properties.name; });

    //// para poner el nombre de los departamentos
    // svg.selectAll("text")
    //     .data(topojson.feature(co, co.objects.mpios).features)
    //   .enter().append("text")
    //     .attr("transform", function(d) { return "translate(" + path.centroid(d) + ")"; })
    //     .attr("dy", ".35em")
    //     .text(function(d) { return d.properties.name; });

    //// circulos puestos en los departamentos
    // svg.append("g").selectAll("circle")
    //   .data(topojson.feature(co, co.objects.mpios).features)
    //   .enter().append("circle")
    //   .attr("class", function(d) { return "bubble " + "_" + d.properties.name; })// la clase del css que obtiene cada municipio
    //   .attr("transform", function(d) { return "translate(" + path.centroid(d) + ")"; })
    //   .attr("r", function(d) { return 6; });
    //.attr("r", function(d) { return Math.sqrt(path.area(d) / Math.PI)*0.3; });  

    svg.append("g").selectAll("circle")
      .data(marks)
      .enter().append("circle")
      // la clase del css que obtiene cada municipio
      .attr("class", function(d) { return "bubble " + d.name; })
      .attr("transform", function(d) {return "translate(" + projection([d.long,d.lat]) + ")";})
      .attr("r", function(d) { return 8; })
      .on("mouseover", function(d){            //evento si el mouse pasa por encima del circulo
        // console.log(d.prefijo)
        if (c3totalpines(d.prefijo)> -1){
          var mensajetooltip = "<b>"+d.name+"</b>"+"<br/>";
              mensajetooltip += "<br/>";
              mensajetooltip += "<b>Pines </b>"+c3totalpines(d.prefijo)+"<br/>";
              mensajetooltip += "<b>Pines generados </b>"+c3pinesgenerados(d.prefijo)+"<br/>";
              mensajetooltip += "<b>Pines utilizados </b>"+c3pinesutilizados(d.prefijo)+"<br/>";
              mensajetooltip += "<br/>";
              mensajetooltip += "<b>Usuarios </b>"+c3totalpines("u."+d.prefijo)+"<br/>";
              mensajetooltip += "<b>Usuarios generados </b>"+c3pinesgenerados("u."+d.prefijo)+"<br/>";
              mensajetooltip += "<b>Usuarios votantes </b>"+c3pinesutilizados("u."+d.prefijo)+"<br/>";
        }else{
          var mensajetooltip = "<b>SEDE "+d.name+"</b>"+"<br/>";
              mensajetooltip += "<br/>";
              mensajetooltip += "Para ver los datos, debes seleccionar una encuesta";
        }
          div.style("visibility", "visible")
          div.transition()
          .duration(500)  
          .style("opacity", 0);
          div.transition()
          .duration(200)  
          .style("opacity", .9);  
          div.html(mensajetooltip)
          .style("left", (d3.event.pageX) + "px")      
          .style("top", (d3.event.pageY - 28) + "px");
      })
      //evento si el mouse se mueve sobre el circulo
      .on("mousemove", function(){return div.style("top", (d3.event.pageY-10)+"px").style("left",(d3.event.pageX+10)+"px");})
      //evento si el mouse sale del circulo
      .on("mouseout", function(){return div.style("visibility", "hidden");})
      .on("click", function(d) {

          d3.selectAll(".mpio")
            .classed(".mpio " + "._" + d.name, function(d2) { 
              if(d2.properties.name == d.name){
                clicked(d2);
                d3.event.stopPropagation();
              }
              // console.log(d2);
          });

      });

        
    // svg.selectAll(".mark")
    //     .data(marks)
    //     .enter()
    //     .append("image")
    //     .attr('class','mark')
    //     .attr('width', 20)
    //     .attr('height', 20)
    //     .attr("xlink:href",'https://cdn3.iconfinder.com/data/icons/softwaredemo/PNG/24x24/DrawingPin1_Blue.png')
    //     //.attr("xlink:href",'http://findicons.com/files/icons/2222/gloss_basic/32/pin_red.png')
    //     //.attr("xlink:href",'http://findicons.com/files/icons/2534/aroma/24/pin_blue.png')
    //     //.attr("xlink:href",'https://cdn2.iconfinder.com/data/icons/perfect-flat-icons-2/512/Location_marker_pin_map_gps.png')
    //     .on("mouseover", function(d){
    //       div.style("visibility", "visible")
    //       div.transition()
    //       .duration(500)  
    //       .style("opacity", 0);
    //       div.transition()
    //       .duration(200)  
    //       .style("opacity", .9);  
    //       div.html(d.data)
    //       .style("left", (d3.event.pageX) + "px")      
    //       .style("top", (d3.event.pageY - 28) + "px");
    //       // console.log($("#dinamica").height())
    //     })
    //     .on("mousemove", function(){return div.style("top", (d3.event.pageY-10)+"px").style("left",(d3.event.pageX+10)+"px");})
    //     .on("mouseout", function(){return div.style("visibility", "hidden");})
    //     .attr("transform", function(d) {return "translate(" + projection([d.long,d.lat]) + ")";});    

    // svg.selectAll(".mark").style("visibility", "hidden");

      // una vez de clic sobre algun departamento esta funcion
      // se ejecutara.
      function clicked(d) {
        var posx, posy, scale; // variables posicion x, posicion y, valor de escala

        if (d && centered !== d) {
          var centroid = path.centroid(d);    // cada departamento tiene un centro-- denominada centroid
          //obtengo las coordenadas de acuerdo a las posiciones
          posx = centroid[0];
          posy = centroid[1];
          //pongo un valor de escala
          scale = 8;
          // quien se esta centrando
          centered = d;
          //oculto los circulos
          svg.selectAll("circle").style("visibility", "hidden");

          d3.selectAll(".mpio")
            .classed(".mpio " + "._" + d.properties.name, function() { 
              return !d3.select(this).classed("active");   // cambio la clase y le pongo activa
          });

          

        var countdepto =verdepto(d.properties.name);

        // console.log(d.properties.name)

        if(countdepto > 0){
          div.style("visibility", "visible")
            div.transition()
            .duration(500)  
            .style("opacity", 0);
          div.transition()
            .duration(200)  
            .style("opacity", .9);  
          // div .html(''+d.properties.name+'')
          div.html(countdepto+" personas contestaron <br/><b>"+d.properties.name+"</b>")
            .style("left", (d3.event.pageX) + "px")      
            .style("top", (d3.event.pageY - 28) + "px");
        }else{
          div.style("visibility", "visible")
            div.transition()
            .duration(500)  
            .style("opacity", 0);
          div.transition()
            .duration(200)  
            .style("opacity", .9);  
          // div .html(''+d.properties.name+'')
          div.html(""+d.properties.name+"")
            .style("left", (d3.event.pageX) + "px")      
            .style("top", (d3.event.pageY - 28) + "px");
        }



          // if(d.properties.name == "CALI"){
            // svg.selectAll(".mark")
            // .transition()
            // .delay(1900)
            // .style("visibility", "visible");  
          // }



        } else {
          // posicion en el centro del dibujo
          posx = diameter / 2;
          posy = diameter / 2;
          scale = 1;
          // nadie se esta centrando
          centered = null;
          // hago visibles los circulos
          svg.selectAll("circle")            
            .transition()
            .delay(1900)
            .style("visibility", "visible");
          // if(d.properties.name == "CALI"){
            // svg.selectAll(".mark")
            // .style("visibility", "hidden"); 
          // }      
        }

        svg.selectAll("path")
        .classed("active", centered && function(d) { return d === centered; });
        // if(d.properties.name == "CALI"){
          svg.selectAll("path").transition()
          .duration(2000) // velocidad de acercamiento al municipio
          .attr("transform", "translate(" + diameter / 2 + "," + diameter / 2 + ") scale(" + scale + ") translate(" + -posx + "," + -posy + ")")
          .style("stroke-width", 0.5 / scale + "px");
        // }

      }  


    // actualiza el tamaño una vez se ha cambiado de la ventana
    // esto lo hace responsivo.
    $(window).resize(function() {
        diameter = $(divrender).width();
        svg.attr("width", diameter);
        svg.attr("height", diameter*1.2);

        projection = d3.geo.mercator()
        .scale(diameter*3)
        .translate([diameter / 2, diameter / 2])
        .center([-69,46])
        .rotate([2,3,2]);  

        path = d3.geo.path()
        .projection(projection);
      
    });    
  });
}

