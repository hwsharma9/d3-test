<!DOCTYPE html>
<html>
<head>
	<title>plugin</title>
	<script type="text/javascript" src="d3/jquery.js"></script>
	<link rel="stylesheet" href="d3/bootstrap-4.2.1/css/bootstrap.css">
	<script type="text/javascript" src="d3/bootstrap-4.2.1/js/bootstrap.js"></script>
</head>
<body>
	<div class="container">
		<form>
			<div class="form-group">
				<div class="row">
					<div class="col-md-6">
						<label for="inputEmail3" class="col-md-2 form-control-label">Name</label>
						<div class="col-md-10">
							<input type="text" class="form-control" id="inputEmail3" placeholder="Name">
						</div>
					</div>
					<div class="col-md-6"></div>
				</div>
			</div>
		</form>
	</div>
	<script type="text/javascript">
		(function ( $ ) {
			$.fn.hilight = function( options ) {
				var defaults = {
					display:"none"
				};
			    var opts = $.extend( {}, defaults, options );
				this.on("keyup",function(e){
					var value = $(this).val();
					var that = this;
					if (value) {
						$.ajax({
							url:'http://localhost/harsh/search.php',
							type:'GET',
							data:{cpv:value},
							success:function(result){
								createHtml(result,that);
							}
						});
					}else{
						$(that).closest("div").find(".hoverHtml").html('');
						$(that).closest("div").find(".hoverHtml").hide();
					}
				});

				function createHtml(data,that) {
					var data = JSON.parse(data);
					var html = '<table class="table" border="1px" width="100%">\
									<tr align="center"><th colspan="2">Testing</th></tr>\
									<tr>\
										<td>\
											<table class="table-responsive table-wrapper-scroll-y table table-bordered table-striped autocom" style="height:200px;">';
											$.each(data,function(k,v){
										html += '</tr>\
													<td class="col-md-11">Text '+v.userFirstName+'</td>\
													<td class="col-md-1"><input type="checkbox" class="addCPV" data-cpvid="'+v.userID+'" /></td>\
												</tr>';
											});
									html += '</table>\
										</td>\
										<td>\
											<table class="table-responsive table-wrapper-scroll-y table table-bordered table-striped selected_cpv" style="height:200px;">\
											</table>\
											<button type="button" id="cancleHoverHtml">Cancle</button>\
										</td>\
									</tr>\
								</table>';
					if (!$(that).closest("div").find(".hoverHtml").length) {
						$(that).closest("div").append('<div class="hoverHtml"></div>');
						// console.log(JSON.stringify(data));
					}
					$(that).closest("div").find(".hoverHtml").html(html);
					opts.display = "block";
					$(that).closest("div").find(".hoverHtml").css({"display":opts.display});
				}
				/*this.on("click",function(e){
					if (!$(this).closest("div").find(".hoverHtml").length) {
						$(this).closest("div").append(html);
					}
					opts.display = "block";
					$(this).closest("div").find(".hoverHtml").css({"display":opts.display});
				});*/
				$("body").on("click","#cancleHoverHtml",function(){
					$(this).closest(".hoverHtml").css({"display":opts.display});
					$(this).closest(".hoverHtml").hide();
				});
				$("body").on("click",".addCPV",function(){
						var id=$(this).data("cpvid");
						var value=$(this).closest("tr").find("td:nth-child(1)").text();
					if ($(this).is(":checked")) {
						if(!$(".selected_cpv .cpv_"+id).length) {
							var selected_cpv_html = '<tr class="cpv_'+id+'"><td class="col-md-11">'+value+'</td><td class="col-md-1"><a href="javascript:void(0)" class="btn btn-danger btn-xs remove_cpv" data-cpvid="'+id+'">X</a></td></tr>';
							$(".selected_cpv").prepend(selected_cpv_html);
						}
					}else{
						$(".selected_cpv .cpv_"+id).remove();
					}
				});
				$("body").on("click",".remove_cpv",function(){
					var id=$(this).data("cpvid");
					$(".autocom").find("[data-cpvid="+id+"]").prop("checked",false);
					$(this).closest("tr").remove();
				});
			};
		}( jQuery ));
		$("#inputEmail3").hilight();
	</script>
</body>
</html>