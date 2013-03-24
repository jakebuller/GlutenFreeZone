<?php
include("../includes/functions.php"); 
$email = "";
$password = "";

if(isset($_POST['email'])){
	$email = $_POST['email'];
	if(isset($_POST['password'])){
		$password = $_POST['password'];		
		if(validateLogin($email, $password)){
			echo "0";
		}else{
			echo "1";
		}
	}else{
		echo "1";
	}
}else{
	echo "1";
}
?>