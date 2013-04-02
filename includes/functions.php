<?php
include("../includes/db.php");

function validateLogin($email, $password){
	$pass_hash = sha1($password);
	$query = "SELECT * FROM gfz_users WHERE email_address='$email' AND password='$pass_hash'";	
	$result = mysql_query($query);
	if(!$result){
    return false;
	}
	if(mysql_num_rows($result) != 1){
		return false;
	}else{
		return true;
	}
}

function setUserVerification($email, $code){
	$query = "SELECT * FROM gfz_users WHERE email_address='$email'";	
	$result = mysql_query($query);
	if(!$result){	
    return false;
	}
	$rows = mysql_fetch_array($result);
	$val = $rows['verification_code'];	
	if($val == $code){
		$query = "UPDATE gfz_users SET verified=1 WHERE email_address='$email'";
		$result = mysql_query($query);
		if(!$result){
			return false;
		}else{
			return true;
		}		
	}else{
		return false;
	}	
}

function verifyUser($email){
	$query = "SELECT * FROM gfz_users WHERE email_address='$email'";	
	$result = mysql_query($query);
	if(!$result){	
    return false;
	}
	$rows = mysql_fetch_array($result);
	$v = $rows['verified'];
	if($v == 1){
		return true;
	}else{
		return false;
	}	
}

function createUser($first_name, $last_name, $email, $password, $reasons, $device){
	if(!checkEmailAvailable($email)){
		return '2';
	}
	$pass_hash = sha1($password);
	$code = generateRandomString(20);
	$restrictions = '{"restrictions": { "name": "gluten" }}';
	$query = "INSERT INTO gfz_users (first_name, last_name, email_address, password, reasons, device, verified, verification_code, restrictions) VALUES ('$first_name', '$last_name', '$email', '$pass_hash', '$reasons', '$device', 0, '$code', '$restrictions')";	
	$result = mysql_query($query);
	if(!$result){
    return '1';
	}
	return '0';
}

function checkEmailAvailable($email){	
	$query = "SELECT * FROM gfz_users WHERE email_address='$email'";		
	$result = mysql_query($query);
	if(!$result){
    return false;
	}
	if(mysql_num_rows($result) > 0){
		return $false;
	}else{
		return true;
	}
}

function getUserLevel($email){	
	$query = "SELECT * FROM gfz_users WHERE email_address='$email'";		
	$result = mysql_query($query);
	if(!$result){
    return false;
	}
	$rows = mysql_fetch_array($result);
	$id = $rows['user_level'];
	return $id;
}

function getUserId($email){	
	$query = "SELECT id FROM gfz_users WHERE email_address='$email'";		
	$result = mysql_query($query);
	if(!$result){
    return false;
	}	
	$rows = mysql_fetch_array($result);
	$id = $rows['id'];
	return $id;
}

function getUserRestrictions($id){	
	$query = "SELECT restrictions FROM gfz_users WHERE id='$id'";		
	$result = mysql_query($query);
	if(!$result){
    return false;
	}	
	$rows = mysql_fetch_array($result);
	$res = $rows['restrictions'];
	return $res;
}

function getProductIngredients($upc){	
	$query = "SELECT ingredients FROM gfz_products WHERE upc='$upc'";
	$result = mysql_query($query);
	if(!$result){
    return false;
	}	
	$rows = mysql_fetch_array($result);
	$res = $rows['ingredients'];
	return $res;
}

//builds a json string of full product information
function getProductName($upc){
	$query = "SELECT product_name FROM gfz_products WHERE upc='$upc'";
	$result = mysql_query($query);
	if(!$result){
    return false;
	}	
	$rows = mysql_fetch_array($result);
	$res = $rows['product_name'];
	return $res;
}

function generateRandomString($length) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, strlen($characters) - 1)];
    }
    return $randomString;
}

function getSession(){
	if(isset($_COOKIE['gfz_session'])){
		$email = $_COOKIE['gfz_session'];
		return $email;
	}else{
		return false;
	}
}

function setLastLogin($email){
	$timestamp = date('Y-m-d H.i.s');
	$query = "UPDATE gfz_users SET last_login='$timestamp' WHERE email_address='$email'";
	$result = mysql_query($query);
}

?>