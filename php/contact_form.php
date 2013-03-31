<?php
$name = "";
$email = "";
$inquiry = "";
$error = false;
if(isset($_POST['name'])){
	$name = $_POST['name'];
}else{
	$error = true;
}
if(isset($_POST['email'])){	
	$email = $_POST['email'];
}else{
	$error = true;
}
if(isset($_POST['inquiry'])){
	$inquiry = $_POST['inquiry'];
}else{
	$error = true;
}

if($name == "" || $email == "" || $inquiry == ""){
	$error = true;
}

if($error){
	echo '1';	
}else{
	$to      = "gfzapp@gmail.com";
	$subject = 'Inquiry from: ' . $name;
	$message = 'Message: ' . $inquiry;
	$headers = 'From:' . $email . "\r\n" .
			'Reply-To: ' . $email . "\r\n" .
			'X-Mailer: PHP/' . phpversion();
	
	if(mail($to, $subject, $message, $headers)){
		echo "0";
	}else{
		echo "1";
	}
}
?>