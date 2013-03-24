<?php
include("../includes/db.php");

function validateLogin($email, $password){
	$pass_hash = sha1($password);
	$query = "SELECT * FROM gfz_users WHERE email_address='$email' AND password='$pass_hash'";	
	$result = mysql_query($query);
	if(!$result){
		$message  = 'Invalid query: ' . mysql_error() . "\n";
    $message .= 'Whole query: ' . $query;
    return false;
	}
	if(mysql_num_rows($result) != 1){
		return false;
	}else{
		return true;
	}
}
?>