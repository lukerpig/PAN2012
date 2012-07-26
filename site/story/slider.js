Slider = {};

Slider.initialize = function() {
	
	var heightData = [];
	d3.selectAll(".answer-content")
		.attr("id", function(d, i) { return "ac"+(i+1); })
		.each(function(d,i) { heightData.push({ id: (i+1), height: this.offsetHeight}); })
		.style("display","none")
		.style("height", "0px");

	console.log(heightData);
	
	console.log(d3.selectAll(".question"));
	
	d3.selectAll(".question")
		.data(heightData)
		.attr("id", function (d, i) { return "q"+d.id; })
		.on("click", slide);
		
	
	d3.selectAll(".answer")
		.attr("id", function(d, i) { return "a"+(i+1); });

	
	function slide(d, i) {
		
		var display = d3.selectAll("#ac"+d.id).style("display");
		//alert("d.id: " + d.id + " d.height: " + d.height + " i: " + i + " display: " + display);
		if (display == "none") {
			d3.selectAll("#ac"+d.id)
			.style("height", "0px")
			.style("display", null)
			.transition(1000)
			.style("height", d.height + "px")
			//.each("end", function(d, i) { d3.select(this).style("display", null); });
			
			
		} else {
			d3.selectAll("#ac"+d.id)
			.style("top", "-" + d.height + "px")
			.transition(1000)
			.style("top", "0")
			.each("end", function(d, i) { d3.select(this).style("top", null).style("display", "none"); });
			
		}
			
	}
	
};

