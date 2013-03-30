<?php
session_start();
include("../includes/functions.php"); 
$email = "";

if(isset($_POST['email'])){
	$email = $_POST['email'];
	$count = 10;
	if(isset($_POST['count'])){
		$count = $_POST['count'];
	}
	
	
	//$history = getHistory($email, $count);
	$history = '{
   "history":{
	 "count": 2,
      "1":{
         "user_id":1,
         "date":"Monday March 25, 2013",
         "product_title":"PC Blue Menu Granola",
         "result":true
      },
	   "2":{
         "user_id":1,
         "date":"Tuesday March 26, 2013",
         "product_title":"Kraft Dinner",
         "result":false
      }
   }
}';
	echo $history;
}else{
	echo "1";
}
?>