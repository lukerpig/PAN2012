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
			a: 16,
			h: getHeight,
			w: getWidth
		},
		{
			a: 32,
			h: getHeight,
			w: getWidth
		},
		{
			a: 64,
			h: getHeight,
			w: getWidth
		},
		{
			a: 128,
			h: getHeight,
			w: getWidth
		},
		{
			a: 256,
			h: getHeight,
			w: getWidth
		},
		{
			a: 512,
			h: getHeight,
			w: getWidth
		},
		{
			a: 2024,
			h: getHeight,
			w: getWidth
		}
	];
	
		function onLoad(){
			var svg = d3.select("body").append("svg")
							.attr("height", svgOpt.h+"px")
							.attr("width", svgOpt.w+"px")
		var g= svg.append("g").attr("class","zoomer")
					//.attr("transform","translate(0,-200) scale(2.5)")
					
			var numbers = g.selectAll("rect").data(data);
			numbers.enter().append("rect")
				.attr("x", 
						function(d,i){
							var w = 0;
							for (var j = 0; j < i; j++) {
								var margin = (i < data.length) ? data[j+1].w()*.02 : 0;
								w += data[j].w()+margin;
							} 
							return w;
						}
					)
				.attr("y",function(d,i){return svgOpt.h-50-d.h()})
				.attr("height", function(d,i){return d.h()})
				.attr("width", function(d,i){return d.w()});
				
			sizeSvg();
			function sizeSvg() {
				//12300/1.03, 200: 1.01, 66.7
				//1300/	1.03, 21: 1.01, 7
				//1: 0, 2: 312.5, 4: 468.75, 8: 546.875
				var scale = 16;
				var ratio = 1/scale;
				console.log(ratio + "ratio");
				g.attr("transform","scale("+scale+") translate(0,"+- 585.9375+")");
				console.log(svgOpt.h);
			}
			
			var slider = new Dragdealer('my-slider',
				{
					steps: 30,
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
