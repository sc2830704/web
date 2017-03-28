<?php
	include("global.php");
	//回應input.php資料的api
	header("Content-Type:text/html; charset=utf-8");
	$group = $_POST["group"];
	$semester = $_POST["semester"];
	$no = $_POST["no"];
	$delete_prj="DELETE FROM Working_project WHERE Working_project.Semester = '$semester' AND Working_project.Group='$group' AND Working_project.No = '$no'";
	
	$get_sid = "SELECT Sid FROM Working_project WHERE Working_project.Semester = '$semester' AND Working_project.Group='$group' AND Working_project.No = '$no'";
	$result = mysql_query($get_sid);
	$count = 0;
	$sids = array();
	while($row = mysql_fetch_array($result)){
		$sids[$count] = $row[0];
		$count++;
	}
	foreach($sids as $sid){
		$delete_score = "DELETE FROM Score WHERE Sid='$sid'";
		$result2 = mysql_query($delete_score);
		$delete_std   = "DELETE FROM Student WHERE Sid='$sid'";
		$result3 = mysql_query($delete_std);
	}
	$result = mysql_query($delete_prj);
	if($result and $result2 and $result3){
		echo json_encode('刪除成功');
	}else{
		echo json_encode('刪除失敗');
	}
?>