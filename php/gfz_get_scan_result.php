<?php
include("../includes/db.php");
include("../includes/functions.php");

$gluten = array("gluten", "wheat", "barley", "malt", "dextrin", "rye");

$email = "";
$display = "true";
$ip = $_SERVER['REMOTE_ADDR'];
$longitude = "0";
$latitude = "0";
$upc = "";

$error = false;

if(isset($_POST['email'])){ 
	$email = $_POST['email'];
}else{
	$error = true;
}
if(isset($_POST['ip'])){
	$user_id = $_POST['ip'];
}
if(isset($_POST['longitude'])){
	$longitude = $_POST['longitude'];
}
if(isset($_POST['latitude'])){
	$latitude = $_POST['latitude'];
}
if(isset($_POST['upc'])){
	$upc = $_POST['upc'];
}else{
	$error = true;
}


if(!$error){
	$user_id = getUserId($email);
	$safe = '1';
	// get the scan results
	$user_restrictions = getUserRestrictions($user_id);
	//user has no restrictions so the product is safe
	if($user_restrictions == false){ return true; }
	$product_ingredients = strtolower(getProductIngredients($upc));
	$product_name = getProductName($upc);
	if($product_ingredients == "" || $product_ingredients == null){
		$safe = '2';
		echo "2:" . $upc;
	}else{
		$safe = '1';
		
		foreach ($gluten as &$item) {	
			$pos = strpos($product_ingredients, $item);		
			if ($pos !== false) {
				$safe = '0';
				break;
			}
		}
		
		echo $safe.":" . $product_name;
	}
	//add the scan to the database
	$query = "INSERT INTO gfz_scans (user_id, result, display, ip, longitude, latitude, upc) VALUES ('$user_id', '$safe', '$display', '$ip', '$longitude', '$latitude', '$upc')";
	$result = mysql_query($query);
	$query = "UPDATE gfz_users SET num_scans=num_scans+1 WHERE id='$user_id'";
	$result = mysql_query($query);	
	
}else{
	echo "2";
}
?>