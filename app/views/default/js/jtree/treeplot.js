/**
 * Tree class.
 * @param {String} url
 * @constructor
 */
function Tree(string) {
  
    // $(window).resize(function() {
    //     location.reload();
    // }); 

    /**
     * Data url.
     * @member {String}
     */
    // this.url = url;
    /**
     * Data String.
     * @member {String}
     */    
    this.jsonstring = string;
    /**
     * Root node of the tree.
     * @member {Object}
     */
    this.root;
    /**
     * Tree collapse level.
     * @member {Integer}
     */
    this.cutOffDepth = -1;
    /**
     * Graph canvas.
     * @member {Selection}
     */
    this.canvas;
    /**
     * SVG element height.
     * @member {Number}
     */
    this.height;
    /**
     * SVG element width.
     * @member {Number}
     */
    this.width;
    /**
     * Label position.
     * @member {String}
     */
    this.labelPosition = "default";
    /**
     * Animation duration.
     * @member {Integer}
     */
    this.duration = 750;
    /**
     * Radial progress diagram inner radius.
     * @member {Number}
     */
    this.innerRadius = 40;
    /**
     * Radial progress diagram outer radius.
     * @member {Number}
     */
    this.outerRadius = 50;
    /**
     * Radial progress diagram inner font size coefficient.
     */
    this.fontSizeCoef = 0.5;
    /**
     * Is graph rendered.
     * @member {Boolean}
     */
    this.isRendered = false;
    /**
     * Graph canvas margins.
     */
    this.margin = {
        top : 20,
        right : 120,
        bottom : 20,
        left : 120
    }
    /**
    * is big tree
    */
    this.bigtree=false;
    /**
    * id div 
    */
    this.selector="";
}


/**
 * Set tree cutoff level/depth.
 * @param cutOffDepth
 * @returns {Tree}
 */
Tree.prototype.setCutOffDepth = function(cutOffDepth) {

    this.cutOffDepth = cutOffDepth;
    return this;
}

/**
 * Set tree bigtree
 * @param cutOffDepth
 * @returns {Tree}
 */
Tree.prototype.setBigTree = function(isbig) {
    this.bigtree=isbig;
    return this;
}

/**
 * Set tree bigtree
 * @param cutOffDepth
 * @returns {Tree}
 */
Tree.prototype.setSelector = function(selector) {
    this.selector=selector;
    return this;
}


/**
 * Set animation duration time.
 * @param {Number} duration
 * @returns {Tree}
 */
Tree.prototype.setAnimationDuration = function(duration) {

    this.duration = duration;
    return this;
}


/**
 * Set canvas top margin.
 * @param {Number} margin
 * @returns {Tree}
 */
Tree.prototype.setTopMargin = function(margin) {

    this.margin.top = margin;
    return this;
}


/**
 * Set canvas right margin.
 * @param {Number} margin
 * @returns {Tree}
 */
Tree.prototype.setRightMargin = function(margin) {

    this.margin.right = margin;
    return this;
}


/**
 * Set canvas bottom margin.
 * @param {Number} margin
 * @returns {Tree}
 */
Tree.prototype.setBottomMargin = function(margin) {

    this.margin.bottom = margin;
    return this;
}


/**
 * Set canvas left margin.
 * @param {Number} margin
 * @returns {Tree}
 */
Tree.prototype.setLeftMargin = function(margin) {

    this.margin.left = margin;
    return this;
}


/**
 * Set radial progress diagram inner font size coefficient.
 * @param {Number} coef
 * @returns {Tree}
 */
Tree.prototype.setFontSizeCoef = function(coef) {

    this.fontSizeCoef = coef;
    return this;
}


/**
 * Set radial progress diagram inner radius.
 * @param innerRadius
 * @returns {Tree}
 */
Tree.prototype.setInnerRadius = function(innerRadius) {

    this.innerRadius = innerRadius;
    return this;
}


/**
 * Set radial progress diagram outer radius.
 * @param outerRadius
 * @returns {Tree}
 */
Tree.prototype.setOuterRadius = function(outerRadius) {

    this.outerRadius = outerRadius;
    return this;
}


/**
 * Set label position.
 * Available options are "top", "bottom" and default.
 * @param {String} labelPosition
 * @returns {Tree}
 */
Tree.prototype.setLabelPosition = function(labelPosition) {

    this.labelPosition = labelPosition;
    return this;
}

function expand(d) {
    if (d._children) {
        d.children = d._children;
        d.children.forEach(expand);
        d._children = null;
    }
}

function collapse(d) {
    if (d.children) {
        d._children = d.children;
        //d._children.forEach(collapse);
        d.children = null;
    }
}
// Define the zoom function for the zoomable tree
function zoom() {
    // console.log(d3.select("#grafica svg").style("height")+ " >>> "+$("#grafica").height()+">>>>"+d3.event.scale );
    d3.select("#grafica svg").select("g").attr("transform", "translate(" + d3.event.translate + ") scale(" + d3.event.scale + ")");
    //this.canvas.attr("transform", "translate(" + this.margin.left + ", " + this.margin.top + ")");
}
// define the zoomListener which calls the zoom function on the "zoom" event constrained within the scaleExtents
var zoomListener = d3.behavior.zoom().scaleExtent([0.1, 3]).on("zoom", zoom);    


// Function to center node when clicked/dropped so node doesn't get lost when collapsing/moving with large amount of children.

Tree.prototype.centerNode =function(source) {
    
    scale = zoomListener.scale();
    x = -source.y0;
    y = -source.x0;
    x = x * scale + this.margin.left;
    y = y * scale + $(this.selector).height()/2;
    // console.log("translate(" + x + "," + y + ")")
    // console.log(this.selector)
    d3.select(this.selector+" svg").select("g").transition()
        .duration(this.duration)
        .attr("transform", "translate(" + x + "," + y + ")scale(" + scale + ")");
    zoomListener.scale(scale);
    zoomListener.translate([x, y]);
}

/**
 * Update graph.
 * @param {Object} source
 */
Tree.prototype.update = function(source) {
    /*
     * Compute the new tree layout.
     */
    var nodes = this.tree.nodes(this.root).reverse();
    // console.log(nodes.length)
    // if(nodes.length > 100){
        // $(this.selector).height($(this.selector).height()*(nodes.length/50))
        // this.svg.attr("height", $(this.selector).height()*(nodes.length/50));
        // this.tree.nodeSize([nodes.length/2, nodes.length]);
    // }
    /*
     * Preprocess tree.
     */
    nodes = nodes.filter(function(d, i) {
        /*
         * Append identifiers to nodes.
         */
        d.id = d.id || ++ i;
        /*
         * Apply cut off threshold on initial update.
         */
        if (this.isRendered === false && this.cutOffDepth > -1) {
            if (d.depth <= this.cutOffDepth) {
                if (d.depth == this.cutOffDepth) {
                    d._children = d.children;
                    d.children = null;
                }
                return true;
            }
        } else {
            return true;
        }
    }, this);

    this.isRendered = true;

    var links = this.tree.links(nodes);
    /*
     * Normalize for fixed-depth.
     */
    nodes.forEach(function(d) {
        d.y = d.depth * 180;
    });
    // if(nodes.length > 100){
        // $(this.selector).height($(this.selector).height()*(nodes.length/50))
        // this.svg.attr("height", $(this.selector).height()*(nodes.length/50));
        // this.tree.nodeSize([nodes.length/2, nodes.length]);
    // }    
    /*
     * Update the nodes.
     */
    var node = this.canvas.selectAll("g.node").data(nodes, function(d) {
        return d.id;
    });
    /*
     * Stash reference to this object.
     */
    var self = this;

    var div = d3.select("body")
      .append("div")  //declare the tooltip div 
      .attr("class", "tooltip") // apply the 'tooltip' class
      .style("opacity", 0);  

    /*
     * Enter any new nodes at the parent's previous position.
     */
    var nodeEnter = node.enter()
        .append("g")
        .attr("class", "node")
        .attr("id", function(d){ return d.name;})
        .attr("transform", function(d) {
            return "translate(" + source.y0 + ", " + source.x0 + ")";
        }).on("click", function(d) {
            self.clickEventHandler(d);
        });
    /*
     * Add background arc.
     */
    if(!this.bigtree){
        nodeEnter.append("path")
            .attr("class", "radial-progress-backround")
            .attr("d", this.backgroundArc)
        /*
         * Add non transparent background circle.
         */
        nodeEnter.append("circle")
            .style("opacity", 0)
            .attr("class", "node-inner")
            .attr("r", this.innerRadius)
        /*
         * Add outer progress arc.
         */
        nodeEnter.append("path")
            .attr("class", "radial-progress-outter")
            // .attr("d", this.valueArc(this.id));
    }else{
        nodeEnter.append("path")
            .attr("d", this.backgroundArc)
        /*
         * Add non transparent background circle.
         */
        nodeEnter.append("circle")
            .style("opacity", 0)
            .style("fill", function(d){ 
                d.color = randomcolor(); 
                return d.color;
            })
            .attr("r", 8);
        // nodeEnter.append("circle")
        //     .style("opacity",1)
        //     .style("fill", function(d){
        //         return "rgb(255,255,255)";
        //     })
        //     .attr("r", 10);
           
    }
    nodeEnter.on("mouseover", function(d){
        if(d.tooltip != undefined){
            content = d.tooltip;    
        }else{
           content = ''+d.name+' <br/ ><b> contestaron '+d.value+' personas  </b>'; 
        }
        div.style("visibility", "visible")
          div.transition()
          .duration(500)  
          .style("opacity", 0);
          div.transition()
          .duration(200)  
          .style("opacity", .9);  
          div.html(content)
          // .style('width',$(this.selector).width()*0.9)
          .style("left", (d3.event.pageX) + "px")      
          .style("top", (d3.event.pageY - 28) + "px");
      })
    nodeEnter.on("mousemove", function(){
        return div.style("top", (d3.event.pageY-10)+"px")
                  .style("left",(d3.event.pageX+10)+"px");
                  // .style('width',$(thi;
    })
    nodeEnter.on("mouseout", function(){return div.style("visibility", "hidden");})         
    /*
     * Append node labels.
     */
    if(this.bigtree){
        nodeEnter.append("text")
            .attr("class", "node-label")
            .style("opacity", 0)
            .attr("y", function(d) {
                return self.getLabelYPosition(d);
            }).attr("x", function(d) {
                return self.getLabelXPosition(d);
            }).attr("text-anchor", function(d) {
                return self.getLabelAnchor(d);
            }).text(function(d) {
                    if(d.name.length< 60 ){
                        return d.name;    
                    }    
            });
    }
    /*
     * Append node values.
     */
    // nodeEnter.append("text")
    //     .attr("class", "node-value")
    //     .attr("font-size", this.fontSize)
    //     .style("opacity", 0)
    //     .attr("y", 0)
    //     .attr("dy", this.fontSize / 4)
    //     .attr("x", 0)
    //     .attr("text-anchor", "middle")
    //     .text("0");
    /*
     * Transition nodes to their new position.
     */
    var nodeUpdate = node.transition()
        .duration(this.duration)
        .attr("transform", function(d) {
            return "translate(" + d.y + ", " + d.x + ")";
        });
    /*
     * Animate outer progress arc.
     */
    nodeEnter.select(".radial-progress-outter")
        .transition()
        .duration(this.duration)
        .attrTween("d", function(d) {
            var i = d3.interpolate(0, (d.value > 100 ? 100 : d.value) * 3.6);
            return function(t) {
                return self.valueArc.endAngle(i(t) * (Math.PI / 180))();
            };
        })
    /*
     * Change node elements opacity.
     */
    nodeUpdate.select("circle").style("opacity", 1);
    nodeUpdate.select(".node-label").style("opacity", 1);
    /*
     * Run node value animation.
     */
    if(!this.bigtree){
     nodeEnter.select(".node-value")
        .transition()
        .duration(this.duration)
        .style("opacity", 1)
        .tween("text", function(d) {
            if (d.value ===""){
                return function(t) {
                    // this.textContent = "-";
                };
            }else{
                var i = d3.interpolate(0, d.value > 100 ? 100 : d.value);
                return function(t) {
                    // this.textContent = Math.round(i(t))  + " \n  personas";
                };
            }
        }).each("end", function(d) {
            if (d.value > 100) {
                /*
                 * Animate value more than 100%.
                 */
                d3.select(this)
                    .transition()
                    .duration(self.duration).tween("text", function(d) {
                        var i = d3.interpolate(100, d.value);
                        return function(t) {
                            // this.textContent = Math.round(i(t))  +  "\n personas";
                        };
                    });
                /*
                 * Create inner ring arc.
                 */
                var innerArc = d3.svg.arc()
                    .outerRadius(self.innerRadius)
                    .innerRadius(self.innerRadius - (self.outerRadius - self.innerRadius))
                    .startAngle(0);
                /*
                 * Append inner ring arc and run transition.
                 */
                d3.select(d3.select(this).node().parentNode).append("path")
                    .attr("class", "radial-progress-inner")
                    .attr("d", innerArc)
                    .transition()
                    .duration(self.duration)
                    .attrTween("d", function(d) {
                        var i = d3.interpolate(0, d.value <= 100 ? ((d.value - 100) * 3.6) : 0);
                        return function(t) {
                            return innerArc.endAngle(i(t) * (Math.PI / 180))();
                        };
                    })
            }
        });
    }
    /*
     * Transition exiting nodes to the parent's new position.
     */
    var nodeExit = node.exit()
        .transition()
        .duration(this.duration)
        .attr("transform", function(d) {
            return "translate(" + source.y + ", " + source.x + ")";
        }).remove();
    /*
     * Fade collapsed nodes.
     */
    nodeExit.selectAll("text").style("opacity", 0);
    nodeExit.selectAll("path").style("opacity", 0);
    nodeExit.select("circle").style("opacity", 0);
    /*
     * Update the links.
     */
    var link = this.canvas.selectAll("path.link")
        .data(links, function(d) {
            return d.target.id;
        });
    /*
     * Enter any new links at the parent's previous position.
     */
    link.enter().insert("path", "g")   
        .style("stroke-linecap","round")
        .style("stroke", function(d){
            if(d.target.color == undefined){
                return randomcolor(); 
            }else{
                return d.target.color;
            }
            
        })
        .style("stroke-width", function(d){ 
            if(d.target.cant==undefined){
                return 60;
            }else{
                if(parseInt(d.target.cant) > 10){
                    return 30;
                }
                if(d.target.cant==""){
                    return 20;
                }else{
                    return d.target.cant*8;
                }
            }
            
        })
        .attr("class", "link")
        .on("mouseover", function(d){
            d3.select(this).attr("class", "linkhover")
        })
        .on("mousemove", function(){
        })
        .on("mouseout", function(d){
            d3.select(this).attr("class", "link")
        })
        .attr("d", function(d) {
            var o = {
                x : source.x0,
                y : source.y0
            };
            return self.diagonal({
                source : o,
                target : o
            });
        });  
    /*
     * Transition links to their new position.
     */
    link.transition()
        .duration(this.duration)
        .attr("d", self.diagonal);
    /*
     * Transition exiting nodes to the parent's new position.
     */
    link.exit().transition().duration(this.duration).attr("d", function(d) {
        var o = {
            x : source.x,
            y : source.y
        };
        return self.diagonal({
            source : o,
            target : o
        });
    }).remove();
    var self = this;
    /*
     * Stash the old positions for transition.
     */
    nodes.forEach(function(d) {
        d.x0 = d.x;
        d.y0 = d.y;
        if(d.name=="SURVEY ENCUESTA" && ! ("_children" in d)){
            // console.log(d);
            self.clickEventHandler(d)
            self.clickEventHandler(d)
        }
    });
}

function randomcolor(){
    colorrgb = []
    for (var i=0; i<3; i++){
        colorrgb.push(Math.floor(Math.random()*256))
    }
    return 'rgb('+colorrgb.toString()+')'
};
function randomsize(){
    return ((Math.random()*30)+10);
};

/**
 * Get node label x position.
 * @param {Object} node
 * @returns {Number}
 */
Tree.prototype.getLabelXPosition = function(node) {

    var labelShift = this.outerRadius + 5;

    if (this.labelPosition == "top") {
        return 0;
    } else if (this.labelPosition == "bottom") {
        return 0;
    } else {
        return node.children || node._children ? - labelShift : labelShift;
    }
}


/**
 * Get node label y position.
 * @param {Object} node
 * @returns {Number}
 */
Tree.prototype.getLabelYPosition = function(node) {

    var labelShift = this.outerRadius + 5;

    if (this.labelPosition == "top") {
        return - labelShift;
    } else if (this.labelPosition == "bottom") {
        return labelShift + this.fontSize / 2;
    } else {
        return 0;
    }
}


/**
 * Get node label anchor.
 * @param {Object} node
 * @returns {String}
 */
Tree.prototype.getLabelAnchor = function(node) {

    if (this.labelPosition == "top") {
        return "middle";
    } else if (this.labelPosition == "bottom") {
        return "middle";
    } else {
        return node.children || node._children ? "end" : "start";
    }
}

/**
 * Node click event handler.
 * Toggle children on click.
 * @param {Object} d
 */
Tree.prototype.clickEventHandler = function(d) {
    // console.log(d)
    var isRequireUpdate = ("children" in d && d.children) ||
        ("_children" in d && d._children);
        // console.log(d)
    if (d.children) {
        d._children = d.children;
        d.children = null;
    } else {
        d.children = d._children;
        // d.children.forEach(expand);
        d._children = null;
    }

    if (isRequireUpdate) {       
        this.update(d);
        this.centerNode(d)
    }
}


/**
 * Set SVG element height.
 * @param {Number} height
 * @returns {Tree}
 */
Tree.prototype.setHeight = function(height) {

    this.height = height;
    return this;
}

/**
 * Render graph.
 * @param {String} selector
 */
Tree.prototype.render = function(selector) {
    /*
     * Create radial diagram value arc.
     */
    this.valueArc = d3.svg.arc()
        .innerRadius(this.innerRadius)
        .outerRadius(this.outerRadius)
        .startAngle(0);
    /*
     * Create radial diagram background arc.
     */
    this.backgroundArc = d3.svg.arc()
        .innerRadius(this.innerRadius)
        .outerRadius(this.outerRadius)
        .startAngle(0)
        .endAngle(Math.PI * 2);
    /*
     * Calculate value label font size.
     */
    this.fontSize = this.innerRadius * this.fontSizeCoef - 5;
    /*
     * Get graph container and calculate its size.
     */
    var container = d3.select(selector);
    var dimension = container.node().getBoundingClientRect();
    /*
     * Set chart width.
     */
    this.width  = dimension.width - this.margin.right - this.margin.left;
    
    if(this.width < 120){
        this.margin.right=60;
        this.margin.left=60;
    }
    if(this.width < 50){
        this.margin.right=10;
        this.margin.left=20;
    }    
    this.width  = dimension.width - this.margin.right - this.margin.left;

    /*
     * Set chart height.
     */
    if (! this.height) {
        this.height = 400 - this.margin.top - this.margin.bottom;
    }
    /*
     * Create tree layout.
     */
    // this.tree = d3.layout.tree().size([this.height, this.width]);
    this.tree = d3.layout.tree()
        .separation(function(a, b) { return 5; })
        .nodeSize([8, 10]);
        // .size([this.height, this.width]);//
    /*
     * Create diagonal generator.
     */
    this.diagonal = d3.svg.diagonal().projection(function(d) {
        return [d.y, d.x];
    });
    /*
     * Create SVG element.
     */
    this.svg = container.append("svg")
        // .attr("width", this.width + this.margin.right + this.margin.left)
        .attr("width", "100%")
        // .attr("height", this.height + this.margin.top + this.margin.bottom)
        .attr("height", "100%")
        .call(zoomListener);
    /*
     * Create graph canvas.
     */
    this.canvas = this.svg.append("g");
    this.canvas.attr("transform", "translate(" + this.margin.left + ", " + this.margin.top + ") scale("+0.12+")");
    /*
     * Stash reference to this object.
     */
    var self = this; 
    /*
     * Get root node and update it.
     */
    self.root = JSON.parse(self.jsonstring);
    self.root.x0 = this.height / 2;
    self.root.y0 = 0;
    /*
     * Run chart re/rendering.
     */
    self.update(self.root);
    self.centerNode(self.root);

    $("#zoomin").click(function(){
        var scale = zoomListener.scale()+0.2;
        self.canvas.attr("transform", "translate("+zoomListener.translate()+")scale("+scale+")");
        zoomListener.scale(scale);
        self.centerNode(self.root);
    });

    $("#zoomout").click(function(){
        var scale = zoomListener.scale()-0.2;
        if(scale > 0){
            self.canvas.attr("transform", "translate("+zoomListener.translate()+")scale("+scale+")");
            zoomListener.scale(scale);
            self.centerNode(self.root);
        }
    });       

    return this;
}

function fullTree(string,selector){ 

    $(selector).height($(selector).width())

    var tree = new Tree(string)
        .setCutOffDepth(1)
        .setBigTree(true)
        .setLabelPosition("left")
        .setHeight($(selector).width())
        .setOuterRadius(4)
        .setInnerRadius(2)
        .setFontSizeCoef(2.0)
        .setAnimationDuration(800)
        .setSelector(selector)
        .render(selector);
}