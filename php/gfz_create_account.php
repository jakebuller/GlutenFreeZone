<?php
	include("../includes/functions.php");
	
	if(isset($_POST['email']) && isset($_POST['password'])){
		$first_name = "";
		$last_name = "";
		$email = $_POST['email'];
		$password = $_POST['password'];
		$pass_hash = sha1($password);
		$reasons = "";
		$device = "";
		if(isset($_POST['first_name'])){
			$first_name = $_POST['first_name'];
		}
		if(isset($_POST['last_name'])){
			$last_name = $_POST['last_name'];
		}
		if(isset($_POST['celiac'])){
			$reasons .= "celiac,";
		}
		if(isset($_POST['diet'])){
			$reasons .= "diet,";
		}
		if(isset($_POST['other'])){
			$reasons .= "other,";
		}
		if(isset($_POST['device'])){
			$device = $_POST['device'];
		}
		
		echo createUser($first_name, $last_name, $email, $password, $reasons, $device);		
	}else{
		echo "4";
	}

?>