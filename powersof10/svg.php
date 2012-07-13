<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>SVG Test</title>
	<link rel="stylesheet" type="text/css" href="/dragdealer/dragdealer.css" />
	<script src="/dragdealer/dragdealer.js"></script>
	<script type="text/javascript">
		function onLoad(){
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
<?php $centerX="400"; $centerY="400"; $boxWidth="30"; $boxHeight="30";?>

<svg xmlns="http://www.w3.org/2000/svg" version="1.1" height="800px" width="800px" style="border: 1px solid grey;">
	<g transform="scale(1)" id="box" style="stroke: red; stroke-width: .1%; fill: none;">
		<rect x="0" y="0" width="100" height="100"/>
		<g transform="scale(2)" id="box" style="stroke: blue; stroke-width: .1%; fill: none;">
			<rect x="0" y="0" width="100" height="100"/>
			<g transform="scale(2)" id="box" style="stroke: red; stroke-width: .1%; fill: none;">
				<rect x="0" y="0" width="100" height="100"/>
				<g transform="scale(2)" id="box" style="stroke: black; stroke-width: .1%; fill: none;">
					<rect x="0" y="0" width="100" height="100"/>
				</g>
			</g>
		</g>
	</g>
</svg>


<div id="my-slider" class="dragdealer">
	<div class="red-bar handle">drag me</div>
</div>

</body>
</html>
