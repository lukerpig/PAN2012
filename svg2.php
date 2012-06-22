<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>SVG Test</title>
	<link rel="stylesheet" type="text/css" href="/dragdealer/dragdealer.css" />
	<script src="/dragdealer/dragdealer.js"></script>
	<script src="http://d3js.org/d3.v2.js"></script>
	<script type="text/javascript">
	
		svgW=1200;
		var svgOpt = {
			w: svgW,
			h: svgW*9/16
		}
		var boxOpt = {
			w: 16,
			h: 9
		}
		
		var totalRatio = boxOpt.w + boxOpt.h;
		var widthRatio = boxOpt.w/totalRatio, heightRatio = boxOpt.h/totalRatio;
		
		function getHeight() { return this.a*heightRatio; }
		function getWidth() { return this.a*widthRatio; }
		
		var data = [
		{
			a: 10,
			h: getHeight,
			w: getWidth
		},
		{
			a: 20,
			h: getHeight,
			w: getWidth
		},
		{
			a: 60,
			h: getHeight,
			w: getWidth
		},
		{
			a: 500,
			h: getHeight,
			w: getWidth
		},
		{
			a: 600,
			h: getHeight,
			w: getWidth
		},
		{
			a: 1600,
			h: getHeight,
			w: getWidth
		}
	];
		function onLoad(){
			var svg = d3.select("body").append("svg")
							.attr("height", svgOpt.h+"px")
							.attr("width", svgOpt.w+"px");
				
			var numbers= svg.append("g").selectAll("rect").data(data);
			numbers.enter().append("rect")
				.attr("x", 
					function(d,i){
						var w = 0;
						for (var j = 0; j < i; j++) {
							var margin = data[j].w()*.2;
							w += data[j].w()+margin;
						} 
						return w;
					}
					)
				.attr("y",function(d,i){return svgOpt.h-50 -d.h()})
				.attr("height", function(d,i){return d.h()})
				.attr("width", function(d,i){return d.w()});
				
				
				console.log("?");
			var slider = new Dragdealer('my-slider',
				{
					steps: 7,
					x: .5,
					animationCallback: function(x, y)
					{
						console.log(x*12);
					}
				}); 
				
		}
	</script>
</head>

<body onload="onLoad()">







<div id="my-slider" class="dragdealer">
	<div class="red-bar handle">drag me</div>
</div>

</body>
</html>
