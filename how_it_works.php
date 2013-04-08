<script>
	var images = ["scan_safe.png", "scan_not_safe.png"];
	var cur = 0;
	$(document).ready(function(){
		window.setInterval(pictureChange, 3000);		
	});
	
	function pictureChange(){
		cur = (cur + 1)%images.length;
		$("#scan").hide();
		$("#scan").attr("src", "images/" + images[cur]);
		$("#scan").fadeIn("slow");
	}
</script>
<div id="how-it-works">
	<h1>How It Works!</h1>
	<p>Gluten Free Zone is an easy to use smartphone application. Simply follow the steps below!</p>
	<hr/>
	<table id="hiw-table">
		<tr>
			<td>
				<h2>1. Sign In</h2>
			</td>
			<td>
				<h2>2. Scan a Product</h2>
			</td>
			<td>
				<h2>3. See Results!</h2>
			</td>			
		</tr>	
		<tr>
			<td>
				<img src="images/sign_in.png" class="hiw-image"/>
			</td>
			<td>
				<img src="images/scan_product.png" class="hiw-image" />
			</td>
			<td>
				<img id="scan" src="images/scan_safe.png" class="hiw-image" />
			</td>			
		</tr>			
	</table>	
</div>	