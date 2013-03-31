<?php
include("../includes/db.php");

$user_id = "";
$result = "";
$display = "true";
$ip = $_SERVER['REMOTE_ADDR'];
$longitude = "";
$latitude = "";
$upc = "";

$error = false;
if(isset($_POST['user_id'])){
	$user_id = $_POST['user_id'];
}else{
	$error = true;
}
if(isset($_POST['result'])){
	$result = $_POST['result'];	
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
	$query = "INSERT INTO gfz_scans (user_id, result, display, ip, longitude, latitude, upc) VALUES ('$user_id', '$result', '$display', '$ip', '$longitude', '$latitude', '$upc')";
	$result = mysql_query($query);
	if(!$result){
		echo "1";
	}else{
		echo "0";
	}
}else{
	echo "2";
}
?>