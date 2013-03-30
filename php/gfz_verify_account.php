<?php
session_start();
include("../includes/functions.php"); 
if(isset($_POST['email']) && isset($_POST['code'])){
	$email = $_POST['email'];
	$code = $_POST['code'];
	if(setUserVerification($email, $code)){
		setCookie("gfz_session", $email, time()+3600, '/');
		echo '0';
	}else{
		echo '1';
	}
}else{
	echo '1';
}
?>