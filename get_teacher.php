<?php
	//回應input.php資料的api
	header("Content-Type:text/html; charset=utf-8");
	$tid = $_POST["tid"];
	$semester = $_POST["semester"];
	include("global.php");
	$query_tname="SELECT Pname,Pid FROM faculty,Topics_Project WHERE faculty.username='$tid' AND faculty.username=Topics_Project.Tid AND Topics_Project.Semester=$semester";
		$result = mysql_query($query_tname);
		$count=0;
		while($row = mysql_fetch_array($result)){
			$pname[$count] = $row[0];
			$count++;
		}
	if(isset($pname)){
		echo json_encode($pname);
	}
	else{ 
		echo json_encode(null);
	}
?>