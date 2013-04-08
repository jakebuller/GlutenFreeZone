<?php
include("php/gfz_analytics.php");
?>
<script>
	$(document).ready(function(){
		getData();
		$("#refresh").click(function(){
			getData();
		});
	});
	
	function getData(){
		$.ajax({
			url: "php/gfz_get_analytics.php",
			type: "post",
			success: function(result) {
				$("#analytics-wrapper").hide()
				$("#analytics-wrapper").html(result);
				$("#analytics-wrapper").slideDown();
			}
		});
	}
</script>
<h2>GFZ Analytics!</h2>
<div id="refresh-wrapper">
<input type="button" id="refresh" value="Refresh Data" />
</div>
<div id="analytics-wrapper">

</div>