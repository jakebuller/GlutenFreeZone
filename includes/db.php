<?php
$dbhost = 'localhost';
$dbname = 'bull6280';
$dbuser = 'bull6280';
$dbpasswd = 'jakebuller';

$link = mysql_connect($dbhost, $dbuser, $dbpasswd);
if (!$link) {
    die('Could not connect: ' . mysql_error());
}

$db_selected = mysql_select_db($dbname, $link);
if (!$db_selected) {
    die ('Can\'t use ' . $dbname. ' : ' . mysql_error());
}

?>