<?php
include("../includes/db.php");

function getProductDetails() {
	$query = "SELECT upc AS upcCode, product_name AS productName, ingredients FROM gfz_products";
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

function deleteProducts() {

	if(!isset($_POST['upcCodes'])){
		echo '1';
		return false;
	}

	//$upcCodes = explode( ",", $_POST['upcCodes']);
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

if(isset($_POST['action'])) {
	$action = $_POST['action'];
	switch($action) {
		case 'delete' : deleteProducts(); break;
		case 'update' : updateProducts(); break;
	}
}
?>