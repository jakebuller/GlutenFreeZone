<?php
include("php/gfz_manage_products.php");
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
	$(document).on('click', '#products-table tr', function(e) {
		if(e.ctrlKey){
			//multi select
			multiProductSelect($(this));
		}else{
			//single select
			productSelect($(this));
		}	
	});

function populateProductForm(upc) {
	$("#nameInput").val( $("#name_" + upc).text() );
	$("#upcInput").val( $("#code_" + upc).text() );
	var str = $("#ingredients_" + upc).text().replace( /, /g, ",\n" ).replace(".", "");
	$("#ingredientsInput").val( str );
}

function multiProductSelect(elem){
	console.log("hello");
	var upc = elem.attr("id");
	var elemId = "#" + upc;
	
	if( $(elemId).hasClass("clicked") ) {
		$(elemId).removeClass("clicked");
	} else {
		populateProductForm(upc);
		$(elemId).addClass("clicked");
	}
}

function productSelect(elem){
	$("#products-table tr").removeClass("clicked");
	populateProductForm(elem.attr("id"));
	$(elem).addClass("clicked");
}

function addProduct() {
	$("#nameInput").val( "" );
	$("#upcInput").val( "");
	$("#ingredientsInput").val( "" );	
	$("#products-table tr").removeClass("clicked");	
}

function refreshTable() {
	$.ajax({
		url: "http://hopper.wlu.ca/~bull6280/gfz/php/gfz_manage_products.php",
		data: {"action":"getTable"},
		type: "post",
		success: function(result) {
			$("#tableBody").html(result);
		}
	});
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
	
	$.ajax({
		url: "http://hopper.wlu.ca/~bull6280/gfz/php/gfz_manage_products.php",
		data: {"action":"delete", "upcCodes":upcCodes},
		type: "post",
		success: function(result) {
			refreshTable();
		}
	});
}

function saveProductChanges() {
	var name = $("#nameInput").val();
	var upc = $("#upcInput").val();
	var ingredients = $("#ingredientsInput").val();
	$.ajax({
		url: "http://hopper.wlu.ca/~bull6280/gfz/php/gfz_manage_products.php",
		data: {"action":"update", "upcCode":upc, "product":name, "ingredients":ingredients},
		type: "post",
		success: function(result) {
			refreshTable();
		}
	});
}
</script>

<div class="container">
	<div class="title">
		<h1>Manage Products</h1>
	</div>
  <div class="table-title">
	<h2>Products</h2>    
	</div>
  <div class="table-title">
		<h2>Product Info</h2>    
	</div>  
  <br />
  <div id="table-wrapper">
    <table id="products-table">
      <thead>
        <tr>
          <th>UPC</th>
          <th>Name</th>
      </thead>
      <tbody id="tableBody">
        <?php
        getProductDetailsAsTable();
        ?>
      </tbody>
    </table>
  <div id="button-wrapper">
    <input id="delete-product" type="button" value="Delete Product(s)" onclick="deleteProducts()" />
    <input id="add-product" type="button" value="Add Procuct" onclick="addProduct()" />
  </div>       
  </div>
       
  
	<div id="product-wrapper">
		<table id="table-info">
    	<tr>
				<td>Product Name:</td><td><input id="nameInput" type="text" /></td>
      </tr>
      <tr>
				<td>UPC Code:</td><td><input id="upcInput" type="text" /></td>
      </tr>
      <tr>
				<td>Ingredients:</td><td><textarea id="ingredientsInput" type="text" /></td>
			</tr>        
     	<tr>
				<td>&nbsp;</td><td><input type="button" id="save" value="Save Changes" onclick="saveProductChanges()" /></td>
    	</tr>
    </table>
	</div>
</div>  