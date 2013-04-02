<?php
include("../includes/db.php");

function getTotalScans(){
	$query = "SELECT COUNT(*) AS total FROM gfz_scans";	
	$result = mysql_query($query);
	if(!$result){
	
    return false;
	}
	$data = mysql_fetch_array($result);
	return $data['total'];
}

function getTotalUsers(){
	$query = "SELECT COUNT(*) AS total FROM gfz_users";	
	$result = mysql_query($query);
	if(!$result){
	
    return false;
	}
	$data = mysql_fetch_array($result);
	return $data['total'];
}

function getAvgScansPerUser(){
	$query = "SELECT AVG(num_scans) AS average FROM gfz_users";
	$result = mysql_query($query);
	if(!$result){	
    return false;
	}
	$data = mysql_fetch_array($result);
	return $data['average'];
}

function getNumUniqueCodeScans(){
	$query = "SELECT DISTINCT upc FROM gfz_scans";
	$result = mysql_query($query);
	if(!$result){	
    return false;
	}
	$data = mysql_num_rows($result);
	return $data;
}

function getNumLoginsLastWeek(){
	$current_date = date('Y-m-d H.i.s');
	$last_week = date('Y-m-d H.i.s ', strtotime("-1 week")); //1 week ago
	$query = "SELECT * FROM gfz_users WHERE last_login BETWEEN '$last_week' AND '$current_date'";
	$result = mysql_query($query);
	if(!$result){	
		echo mysql_error();
    return false;
	}
	$data = mysql_num_rows($result);	
	return $data;
}

function getNumScansLastWeek(){
	$current_date = date('Y-m-d H.i.s');
	$last_week = date('Y-m-d H.i.s ', strtotime("-1 week")); //1 week ago
	$query = "SELECT COUNT(*) AS week_scans FROM gfz_scans  WHERE scan_timestamp BETWEEN '$last_week' AND '$current_date'";
	$result = mysql_query($query);
	if(!$result){	
		echo mysql_error();
    return false;
	}
	$data = mysql_fetch_array($result);
	return $data['week_scans'];	
}

function getNumActiveUsers(){
	$current_date = date('Y-m-d H.i.s');
	$last_week = date('Y-m-d H.i.s ', strtotime("-1 week")); //1 week ago
	$query = "SELECT DISTINCT user_id FROM gfz_scans";
	$result = mysql_query($query);
	if(!$result){	
		echo mysql_error();
    return false;
	}
	$active_users = 0;
	
	while ($row = mysql_fetch_array($result)) {
		$user_id = $row['user_id'];
		$query = "SELECT * FROM gfz_scans WHERE scan_timestamp between '$last_week' AND '$current_date' AND user_id = '$user_id' ORDER BY scan_timestamp DESC LIMIT 1";
		$res = mysql_query($query);
		if($res){	
			if( mysql_num_rows($res) > 0 ){
				$active_users++;
			}
		}
	}
	
	return $active_users;
}

?>