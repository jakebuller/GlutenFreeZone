<?php
include("../includes/db.php");

$user_id = "";
$scan_id = "";

$error = false;

if(isset($_POST['user_id'])){
	$user_id = $_POST['user_id'];
}else{
	$error = true;
}
if(isset($_POST['scan_id'])){
	$scan_id= $_POST['scan_id'];	
}else{
	$error = true;
}


if(!$error){
	$query = "UPDATE gfz_scans SET display='false' WHERE id='$scan_id' AND user_id='$user_id'";
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