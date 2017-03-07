<?php
	include("global.php");
	//回應input.php資料的api
	header("Content-Type:text/html; charset=utf-8");
	$group = $_POST["group"];
	$semester = $_POST["semester"];
	$no = $_POST["no"];
	$delete_prj="DELETE FROM Working_project WHERE Working_project.Semester = '$semester' AND Working_project.Group='$group' AND Working_project.No = '$no'";
	$result = true;
	
	if(!$result){
		echo '刪除失敗';
	}
	$get_sid = "SELECT Sid FROM Working_project WHERE Working_project.Semester = '$semester' AND Working_project.Group='$group' AND Working_project.No = '$no'";
	$result = mysql_query($get_sid);
	$count = 0;
	echo $semester.$group.$no;
	while($row = mysql_fetch_array($result)){
		$sids[$account] = $row[$account];
		$count++;
		echo 'sid:'.$sids[$account];
	}	
	foreach($sids as $sid){
		$delete_score = "DELETE FROM Score WHERE Sid='$sid'";
		$result2 = mysql_query($delete_score);
		$delete_std   = "DELETE FROM Student WHERE Sid='$sid'";
		$result3 = mysql_query($delete_std);
	}
	if($result2){
		echo '刪除成功2';
	}else{
		echo '刪除失敗2';
	}
	if($result3){
		echo '刪除成功3';
	}else{
		echo '刪除失敗3';
	}
?>