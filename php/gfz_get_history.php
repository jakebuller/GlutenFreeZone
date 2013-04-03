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
	 "count": 8,
      "0":{
         "user_id":1,
         "date":"Monday April 1, 2013",
         "product_title":"Vitamin Water, Acai Berry",
		 "scan_id": "8",
         "result":"1"
      },
	   "1":{
         "user_id":1,
         "date":"Monday April1, 2013",
         "product_title":"Nestle Parlour Ice Cream, Vanilla",
		 "scan_id": "7",
         "result":"0"
      },
	  "2":{
         "user_id":1,
         "date":"Saturday March 30, 2013",
         "product_title":"Campbells Chunky Clam Chowder",
		 "scan_id": "6",
         "result":"0"
      },
	  "3":{
         "user_id":1,
         "date":"Saturday March 30, 2013",
         "product_title":"Campbells Chunky Burger Soup",
		 "scan_id": "5",
         "result":"1"
      },
	  "4":{
         "user_id":1,
         "date":"Saturday March 23, 2013",
         "product_title":"Cadbury Caramilk 52g",
		 "scan_id": "4",		 
         "result":"1"
      },
	  "5":{
         "user_id":1,
         "date":"Friday March 22, 2013",
         "product_title":"Dr. Oetker Chocolate Pudding",
		 "scan_id": "3",		 
         "result":"0"
      },	  
	  "6":{
         "user_id":1,
         "date":"Friday March 23, 2013",
         "product_title":"Dempsters Light Rye",
		 "scan_id": "2",		 
         "result":"0"
      },
	  "7":{
         "user_id":1,
         "date":"Monday March 19, 2013",
         "product_title":"Honey Buns",
		 "scan_id": "1",		 
         "result":"1"
      }	 
   }
}';
	echo $history;
}else{
	echo "1";
}
?>