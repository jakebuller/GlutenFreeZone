<?php
session_start();
include("../includes/functions.php"); 
$email = "";

/*if(isset($_POST['email'])){
	$email = $_POST['email'];
	$count = 10;
	if(isset($_POST['count'])){
		$count = $_POST['count'];
	}
	*/
	$email = "jake.r.buller@gmail.com";
	$user_id = getUserId($email);
	$query = "SELECT * FROM gfz_scans LEFT JOIN gfz_products ON gfz_scans.upc=gfz_products.upc WHERE user_id = '$user_id' ORDER BY scan_timestamp DESC LIMIT 50";
	$result = mysql_query($query);
	if($result){		
		$count = mysql_num_rows($result);
		$json = '{"history": { "count":'. $count .',';
		$cur = 0;	
		while ($row = mysql_fetch_array($result)) {
				$json .= '"'.$cur.'":{';
				$json .= '"date":"'.$row['scan_timestamp'].'",';
				$json .= '"product_title":"'.$row['product_name'].'",';
				$json .= '"scan_id":"'.$row['id'].'",';
				$json .= '"result":"'.$row['result'] .'"';
				$json .= '}';
				if($cur < $count -1){
					$json .= ',';
				}
				$cur++;
		}			
		$json .= '}}';		
		echo $json;
	}else{
		echo mysql_error();
	}
//	echo $history;
	/*
}else{
	echo "1";
}
*/
?>