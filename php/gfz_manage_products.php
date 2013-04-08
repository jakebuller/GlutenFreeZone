<?php
include("../includes/db.php");

function getProductDetails() {
	$query = "SELECT upc AS upcCode, product_name AS productName, ingredients FROM gfz_products ORDER BY upc ASC";
	$result = mysql_query($query);
	
	if(!$result) {
		echo mysql_error();
		return false;
	}
	
	$rows = array();
	while( $row = mysql_fetch_assoc($result) ) {
		$rows[] = $row;
	}
	
	return json_encode($rows);
}

function getProductDetailsAsTable() {
	$products = json_decode(getProductDetails(), true);
	for($i = 0; $i < count($products); $i++) {
		echo printRow($products[$i]);
	}
}

function printRow($product) {
	$upc = $product["upcCode"];
	$ret = "<tr class='clickable' id='" . $upc . "'>";
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

function deleteProducts() {

	if(!isset($_POST['upcCodes'])){
		echo '1';
		return false;
	}

	$upcCodes = $_POST['upcCodes'];

	$query = "DELETE FROM gfz_products WHERE upc IN (" . $upcCodes . ")";
	$result = mysql_query($query);

	if(!$result) {
		echo mysql_error();
		return false;
	}
	echo "Complete.";
	return true;
}

function updateProduct() {
	if(!isset($_POST['upcCode']) || !isset($_POST['product']) || !isset($_POST['ingredients'] ) ) {
		echo '2';
		return false;
	}
	
	$upcCode = $_POST['upcCode'];
	$name = $_POST['product'];
	$ingredients = $_POST['ingredients'];

	$query = "REPLACE INTO gfz_products (upc, product_name, ingredients, last_updated) VALUES ('" . $upcCode . "', '" . $name . "', '" . $ingredients . "', NOW() )";
	$result = mysql_query($query);
	
	if(!$result) {
		echo mysql_error();
		return false;
	}
	
	echo "Success";
	return true;
}

if(isset($_POST['action'])) {
	$action = $_POST['action'];
	switch($action) {
		case 'delete' : deleteProducts(); break;
		case 'update' : updateProduct(); break;
		case 'getTable' : getProductDetailsAsTable(); break;
	}
}
?>