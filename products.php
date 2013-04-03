<?php
include("php/gfz_manage_products.php");

function formatProductsInTable() {
	$products = json_decode(getProductDetails(), true);
	for($i = 0; $i < count($products); $i++) {
		echo printRow($products[$i]);
	}
}

function printRow($product) {
	$upc = $product["upcCode"];
	$ret = "<tr class='clickable' id='" . $upc . "' onclick='productClick(this)'>";
	$ret .= "<td id='code_" . $upc . "'>" . $product["upcCode"] . "</td>";
	$ret .= "<td><span id='name_" . $upc . "'>" . $product["productName"] . "</span>";
	$ret .= hideIngredients($product["ingredients"], $upc);
	$ret .= "</td>";
	$ret .= "</tr>";
	
	return $ret;
}

function hideIngredients($ingredients, $upc) {
	$ret = "<div id='ingredients_" . $upc . "' style='display: none'>";
	$ret .= $ingredients;
	$ret .= "</div>";
	
	return $ret;
}

?>

<style type="text/css">
	.clickable {
		cursor: pointer;
	}
	
	.clicked {
		background-color: #66FF66;
	}
</style>

<script type="text/javascript">
function populateProductForm(upc) {
	$("#nameInput").val( $("#name_" + upc).text() );
	$("#upcInput").val( $("#code_" + upc).text() );
	var str = $("#ingredients_" + upc).text().replace( /, /g, ",\n" ).replace(".", "");
	$("#ingredientsInput").val( str );
}

function productClick(elem) {
	var upc = elem.id;
	var elemId = "#" + upc;
	
	if( $(elemId).hasClass("clicked") ) {
		$(elemId).removeClass("clicked");
	} else {
		populateProductForm(upc);
		$(elemId).addClass("clicked");
	}
}

function deleteProducts() {
	var numUpcs = 0;
	var upcCodes = "";
	$(".clicked").each( function() {
		upcCodes += $(this).attr("id") + ", ";
		numUpcs++;
	});
	
	if(numUpcs > 0) {
		upcCodes = upcCodes.substring(0, upcCodes.lastIndexOf(","));
	}
	
	console.log(upcCodes);
	
	$.ajax({
		url: "http://hopper.wlu.ca/~bull6280/gfz/php/gfz_manage_products.php",
		data: {"action":"delete", "upcCodes":upcCodes},
		type: "post",
		success: function(result) {
			console.log(result);
		}
	});
}

function saveProductChanges() {
	console.log($("#nameInput").val());
	console.log($("#upcInput").val());
	console.log($("#ingredientsInput").val());
}
</script>

<div class="container">
	<div class="title">
		<h1>Manage Products</h1>
	</div>
	<div style="float:left">
		<h2>Products</h2>
		<div style="border: 1px solid #d4d4d4">
			<table>
				<thead>
					<tr>
						<th>UPC</th>
						<th>Name</th>
				</thead>
				<tbody>
					<?php
					formatProductsInTable();
					?>
				</tbody>
			</table>
		</div>
		<input type="button" value="Delete Product(s)" onclick="deleteProducts()" />
	</div>
	<div style="float:left">
		<span>
			Product Name:<input id="nameInput" type="text" /><br/>
			UPC Code:<input id="upcInput" type="text" /><br/>
			Ingredients:<textarea id="ingredientsInput" type="text" /><br/>
		</span>
		<input type="button" value="Save Changes" onclick="saveProductChanges()" />
	</div>
</div>