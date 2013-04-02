<?php
include("php/gfz_analytics.php");
?>
<h2>GFZ Analytics!</h2>
<div>
<?php

	echo "total scans: " . getTotalScans();
	echo "<br/>";	
	echo "total users: " . getTotalUsers();
	echo "<br/>";	
	echo "avg #scans/user: " . getAvgScansPerUser();	
	echo "<br/>";	
	echo "Number of unique UPC's scanned: " . getNumUniqueCodeScans();
	echo "<br/>";	
	echo "# of logins in the last week: " . 	getNumLoginsLastWeek();
	echo "<br/>";	
	echo "# of scans in the last week: " . 	getNumScansLastWeek();	
	echo "<br/>";	
	echo "# of active users: " . 	getNumActiveUsers();
	
?>
</div>