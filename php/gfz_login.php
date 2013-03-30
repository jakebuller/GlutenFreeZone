<?php
session_start();
include("../includes/functions.php"); 
$email = "";
$password = "";

if(isset($_POST['email'])){
	$email = $_POST['email'];
	if(isset($_POST['password'])){
		$password = $_POST['password'];		
		if(validateLogin($email, $password)){					
			if(verifyUser($email)){				
				echo "0";
				// store session data in a cookie
				setCookie("gfz_session", $email, time()+3600, '/');
			}else{
				setCookie("gfz_verify", $email, time()+360, '/');
				echo "2";
			}
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