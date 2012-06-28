<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>SVG Test</title>
	<link rel="stylesheet" type="text/css" href="/dragdealer/dragdealer.css" />
	<script src="/dragdealer/dragdealer.js"></script>
	<script src="http://d3js.org/d3.v2.js"></script>
	<script type="text/javascript">
	
		svgW=1200, ratH=9, ratW=16;
		var svgOpt = {
			w: svgW,
			h: svgW*ratH/ratW
		}
		var boxOpt = {
			w: 16,
			h: 9
		}
		
		var totalRatio = boxOpt.w + boxOpt.h;
		var widthRatio = boxOpt.w/totalRatio, heightRatio = boxOpt.h/totalRatio;
		
		function getHeight() { return this.a*heightRatio/100000000; }
		function getWidth() { return this.a*widthRatio/100000000; }
		
		var data = [
		{
			a: 1,
			h: getHeight,
			w: getWidth
		},
		{
			a: 20,
			h: getHeight,
			w: getWidth
		},
		{
			a: 300,
			h: getHeight,
			w: getWidth
		},
		{
			a: 4000,
			h: getHeight,
			w: getWidth
		},
		{
			a: 90000,
			h: getHeight,
			w: getWidth
		},
		{
			a: 900000,
			h: getHeight,
			w: getWidth
		},
		{
			a: 1000000,
			h: getHeight,
			w: getWidth
		},
		{
			a: 10000000,
			h: getHeight,
			w: getWidth
		},
		{
			a: 100000000,
			h: getHeight,
			w: getWidth
		},
		{
			a: 1000000000,
			h: getHeight,
			w: getWidth
		},
		{
			a: 10000000000,
			h: getHeight,
			w: getWidth
		},
		{
			a: 100000000000,
			h: getHeight,
			w: getWidth
		},
		{
			a: 1000000000000,
			h: getHeight,
			w: getWidth
		},
		{
			a: 10000000000000000000,
			h: getHeight,
			w: getWidth
		},
		{
			a: 100000000000000,
			h: getHeight,
			w: getWidth
		},
		{
			a: 1000000000000000,
			h: getHeight,
			w: getWidth
		}
	];
	
		function onLoad(){ 
			var svg = d3.select("body").append("svg")
							.attr("xmlns","http://www.w3.org/2000/svg")
							.attr("version","1.1")
							.attr("height", svgOpt.h+"px")
							.attr("viewBox","0 0 "+svgOpt.w+" "+svgOpt.h+"")
							.attr("preserveAspectRatio","xMinYMax")
							.attr("id","svg-box")
							.style("width","100%")
							.style("max-width","1200px")
							.style("border","1px solid red");
			var svgElem = document.getElementById("svg-box");
			var svgH = svgElem.offsetHeight; var svgW = svgElem.offsetWidth;
			svgHeight();
			var g= svg.append("g").attr("class","zoomer")
					
			var numbers = g.selectAll("rect").data(data);
			numbers.enter().append("rect")
				.attr("x", 
						function(d,i){
							var w = 0;
							for (var j = 0; j < i; j++) {
								var margin = (i < data.length) ? data[j+1].w()*.005 : 0;
								w += data[j].w()+margin;
							} 
							return w;
						}
					)
				.attr("y","0")
				.attr("height", function(d,i){return d.h()})
				.attr("width", function(d,i){return d.w()});
				
			//Size SVG
			sizeSvg();
			function sizeSvg() {
				var size = 10000000;
				var scale = 200000000;
				g.attr("transform","translate(0,"+(-50+svgOpt.h)+") scale("+scale+","+-scale+")");
			}
			
			//WINDOW RESIZE
			window.addEventListener('resize', windowResize, false);
			var ww = window.innerWidth;
			
			function windowResize(){
				var ww2=window.innerWidth;
				if(ww2!=ww){ww = ww2;	svgHeight();}
			}
			
			function svgHeight(){
				svgW = svgElem.offsetWidth;
				svgH = svgElem.offsetWidth*ratH/ratW;
				svg.style("height",svgH+"px");
			}
			
			//SLIDER
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
<!--<svg>
<g transform="translate(0,200), scale(13.13,-13.13)">
<rect x="0" y="0" width="2" height="1" />
</g>
</svg>​-->

<body onload="onLoad()">

<div id="my-slider" class="dragdealer">
	<div class="red-bar handle">drag me</div>
</div>

</body>
</html>
