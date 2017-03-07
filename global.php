<?php
$server = "localhost";
$username = "root";
$password = "admin";
$dbname = "et";
$link = mysql_connect($server, $username, $password);
if (!$link) {
	die ('Can\'t not connect to 140.118.122.159\phpMyAdmin : ' . mysql_error());
}
mysql_query("SET NAMES 'utf8'");
$db_selected = mysql_select_db($dbname, $link);
if (!$db_selected) {
	die ('Can\'t not connect to '.$dbname.' : ' . mysql_error());
}

$now_month = date("m");

if ($now_month >= 9) $now_year = date("Y")-1911; 
else if ($now_month < 9) $now_year = date("Y")-1912;

if ( 9 <= $now_month || $now_month < 2 ) $now_semester = 1;
else if ( 2 <= $now_month && $now_month <= 8) $now_semester = 2;
$year_semester = $now_year.$now_semester;
?>