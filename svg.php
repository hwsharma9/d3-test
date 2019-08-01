<!DOCTYPE html>
<html>
<head>
	<title>d3</title>
	<script type="text/javascript" src="d3/jquery.js"></script>
	<script type="text/javascript" src="d3/d3.min.js"></script>
	<link rel="stylesheet" href="d3/bootstrap-4.2.1/css/bootstrap.css">
	<script type="text/javascript" src="d3/bootstrap-4.2.1/js/bootstrap.js"></script>
	<style type="text/css">
		.primary{
			background-color: yellow;
		}
	</style>
</head>
<body>
	<div class="container">
		<svg height="300" width="300"></svg>
	</div>
	<script type="text/javascript">
		var data = [];
		for(var i = 0;i<100;i++) {
			data.push({x:Math.random()*300,y:Math.random()*300,"title":"title no "+i});
		}
		var svg = d3.select("svg");
		svg.selectAll("circle").data(data).enter().append("circle")
		.attr("cx",function(d){
			return d.x;
		})
		.attr("cy",function(d){
			return d.y;
		})
		.attr("r",5)
		.style("fill", "#222")
		.style("opacity", .5)
		.on("mouseover",function(d){
			d3.selectAll("circle")
			.attr("r",5)
			.style("fill", "#222")
			.style("opacity", .5);
			d3.select(this)
			.attr("r",10)
			.style("fill","red")
			.style("cpecity",0);
		})
		.on("click",function(d){
			alert(d.title);
		});
	</script>
</body>
</html>