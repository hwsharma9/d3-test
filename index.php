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
		<ul class="list-unstyled">
		</ul>
	</div>
<div class="modal fade" id="testModal">
	<div class="modal-dialog modal-primary" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title"></h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					<span class="sr-only">Close</span>
				</button>
			</div>
			<div class="modal-body">
				<p></p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary">Save changes</button>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
	<script type="text/javascript">
		var data = [
						{ 'title': 'Pride and Prejudice', 'author': 'Jane Austen', 'words': 120000, 'published': 1813 },
						{ 'title': 'Cryptonomicon', 'author': 'Neal Stephenson', 'words': 415000, 'published': 1999 },
						{ 'title': 'Great Gatsby', 'author': 'F. Scott Fitzgerald', 'words': 47094, 'published': 1925 },
						{ 'title': 'Song of Solomon', 'author': 'Toni Morrison', 'words': 92400, 'published': 1977 },
						{ 'title': 'White Teeth', 'author': 'Zadie Smith', 'words': 169000, 'published': 2000 }
					];
		d3.select(".container ul")
		.selectAll("li")
		.data(data)
		// .data('http://localhost/harsh/data.json')
		// .data("https://restcountries.eu/rest/v2/name/united")
		.enter().append("li")
	    .text(function(d,i) { console.log(d); return d.title +"!"; })

	    // p.enter().append("p").html(function(d){ console.log(d); return 'this is no = '+d})
	    .classed("test",true)
	    .on("mouseover",function(value,index){
	    	d3.selectAll(".test").classed("primary",false);
	    	d3.select(this).classed("primary",true);
	    })
	    .on("mouseout",function(value,index){
	    	d3.selectAll(".test").classed("primary",false);
	    })
	    .on("click",function(value,index){
	    	$("#testModal .modal-title").text(value.title);
	    	$("#testModal .modal-body p").html("Title = " + value.title + "<br>Author = "+value.author+" ("+value.words+" Pages)<br> Published at = "+value.published);
	    	$("#testModal").modal("show");
	    });
	</script>
</body>
</html>