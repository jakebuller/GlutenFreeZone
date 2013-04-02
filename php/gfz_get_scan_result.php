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
	$user_id = $_POST['email'];
}else{
	$error = true;
}
if(isset($_POST['ip'])){
	$user_id = $_POST['ip'];
}else{
	$error = true;
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
	
	
	// get the scan results
	$user_restrictions = getUserRestrictions($user_id);
	//user has no restrictions so the product is safe
	if($user_restrictions == false){ return true; }
	$product_ingredients = strtolower(getProductIngredients($upc));	
		
	$safe = '1';
	
	foreach ($gluten as &$item) {	
		$pos = strpos($product_ingredients, $item);		
		if ($pos !== false) {
			$safe = '0';
			break;
		}
	}
	
	//add the scan to the database
	$query = "INSERT INTO gfz_scans (user_id, result, display, ip, longitude, latitude, upc) VALUES ('$user_id', '$safe', '$display', '$ip', '$longitude', '$latitude', '$upc')";
	echo $query;
	$result = mysql_query($query);
	if(!$result){
		echo "1";
	}else{
		echo "0";
	}
	$query = "UPDATE gfz_users SET num_scans=num_scans+1 WHERE id='$user_id'";
	$result = mysql_query($query);	
}else{
	echo "2";
}
?>