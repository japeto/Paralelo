/**
 * Text lines
 *
 * @module
 *
 * @param {object} options - setting of text lines
 * @param {object[]} options.format - n-th object is used to format n-th line
 * @param {string} options.format.textField - name of property will be used in function text()
 * @param {string} options.format.classed - classes used to apply to [text](http://www.w3.org/TR/SVG/text.html#TextElement)
 * @param {string} options.format.style - style used to apply to [text](http://www.w3.org/TR/SVG/text.html#TextElement)
 * @param {string} options.format.attr - attribute used to apply to [text](http://www.w3.org/TR/SVG/text.html#TextElement)
 * @param {object[]} options.centralFormat - like #format but used to format central-bubble
 */
d3.svg.BubbleChart.define("lines", function (options) {
  /*
   * @param
   *  options = {
   *    format: [ //n-th object is used to format n-th line
   *      {
   *        textField: #string, name of property will be used in function text(), @link
   *        classed: #object, @link
   *        style: #object, @link
   *        attr: #object, @link
   *      }
   *    ],
   *    centralFormat: [ //@see #format, but used to format central-bubble
   *    ]
   *  }
   * */


  var div = d3.select(".bubbleChart")
        .append("div")            //declare the tooltip div 
        .attr("class", "tooltip") // apply the 'tooltip' class
        .style("opacity", 0);  
  
  var self = this;


    function wrap() {

        var self = d3.select(this),
            textLength = self.node().getComputedTextLength(),
            text = self.text(),
            lineNumber = 0,
            lineHeight = 1.1, // ems
            line = [];

        var circle = d3.select("circle");

        // console.log(text)
        // console.log(text.split(/\s+/))
        // console.log(text.split(" "))
        // console.log(text.split(/\s+/).reverse())
        // console.log(text.split(" ").reverse())
        
        // words = text.split(/\s+/).reverse(), word='';
        words = text.split(" ").reverse(), word='';
        // console.log(words)
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

   


  self.setup = (function () {
    var original = self.setup;
    return function () {
      var fn = original.apply(this, arguments);
      var node = self.getNodes();
      var elements;
      $.each(options.format, function (i, f) {

        var circle = d3.select("circle");

        node.append("text")
          .classed(f.classed)
          .style(f.style)
          .attr(f.attr)
          .attr("lengthAdjust", function(d, i) { return "spacing"; })
          .style("font-size", function(d) { return Math.min(d.r, (2 * d.r - 20) / 200 * 24) + "px"; })
          .text(function (d) {
            // temptext = ((f.textField === "count") ?  d.item.value : d.item[f.textField])
            // return temptext
            if (f.textField === "count"){
                if(d.item.value.length > 10){
                  return d.item.value.substring(0,8)+'...';
                }else{
                  return d.item.value;
                }
              // return d.item.value;
            }else{
                if(d.item[f.textField].length > 20){
                  return d.item[f.textField].substring(0,20)+'...';
                }else{
                  return d.item[f.textField];
                }
              // return d.item[f.textField];
            }
          })
          // }).each(wrap);
    

        node.on("mouseover", function(d){
            div.style("visibility", "visible")
              div.transition()
              .duration(500)  
              .style("opacity", 0);
              div.transition()
              .duration(200)  
              .style("opacity", .8);  
              div.html(((f.textField === "text") ? d.item[f.textField] : "" ))
              .style("left", (d3.select(this).attr("cx")) + "px")      
              .style("top", (d3.select(this).attr("cy")) + "px");
          })
        node.on("mousemove", function(d){
            // return div.style("left", (d3.select(this).attr("cx")) + "px")      
              // .style("top", (d3.select(this).attr("cy")) + "px");
        })
        node.on("mouseout", function(){
          return div.style("visibility", "hidden");
        })
        node.on("click", function(){
          // return div.style("visibility", "hidden");
        })
      });


      

      return fn;
    };
  })();

  self.reset = (function (node) {
    var original = self.reset;
    return function (node) {
      var fn = original.apply(this, arguments);
      $.each(options.format, function (i, f) {
        var tNode = d3.select(node.selectAll("text")[0][i]);
        tNode.classed(f.classed).text(function (d) {
          // temptext = ((f.textField === "count") ?  d.item.value : d.item[f.textField]);
          // return temptext;
            if (f.textField === "count"){
                if(d.item.value.length > 10){
                  return d.item.value.substring(0,8)+'...';
                }else{
                  return d.item.value;
                }
              // return d.item.value;
            }else{
                if(d.item[f.textField].length > 20){
                  return d.item[f.textField].substring(0,20)+'...';
                }else{
                  return d.item[f.textField];
                }
              // return d.item[f.textField];
            }
        })
        .transition().duration(self.getOptions().transitDuration)
        .style(f.style)
        // .style("font-size","1px")
        .style("font-size", function(d) { return Math.min(d.r, (2 * d.r - 20) / 200 * 24) + "px"; })
        .attr(f.attr)
        // .each(wrap)

      });
      return fn;
    };
  })();

  self.moveToCentral = (function (node) {
    var original = self.moveToCentral;
    return function (node) {
      var fn = original.apply(this, arguments);
      $.each(options.centralFormat, function (i, f) {
        var tNode = d3.select(node.selectAll("text")[0][i]);
        tNode.transition().duration(self.getOptions().transitDuration)
          .style(f.style)
          .style("font-size", function(d) { return Math.min(d.r, (2 * d.r - 20) / 200 * 24) + "px"; })
          // .style("opacity",1)
          .attr(f.attr)
        f.classed !== undefined && tNode.classed(f.classed);
        f.textField !== undefined && tNode.text(function (d) {
          // temptext = ((f.textField === "count") ?  d.item.value : d.item[f.textField])
          // return temptext
            if (f.textField === "count"){
                if(d.item.value.length > 10){
                  return d.item.value.substring(0,8)+'...';
                }else{
                  return d.item.value;
                }
              // return d.item.value;
            }else{
                if(d.item[f.textField].length > 20){
                  return d.item[f.textField].substring(0,20)+'...';
                }else{
                  return d.item[f.textField];
                }
              // return d.item[f.textField];
            }
        })
          // tNode.each(wrap);
      });
      return fn;
    };
  })();
});