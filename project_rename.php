<?php
	//回應input.php資料的api
	header("Content-Type:text/html; charset=utf-8");
	$group = $_POST["group"];
	$semester = $_POST["semester"];
	$no = $_POST["no"];
	$pid = $_POST["pid"];
	include("global.php");
	$query_tname="UPDATE Working_project SET pid='$pid' WHERE Working_project.Semester = '$semester' AND Working_project.Group='$group' AND Working_project.No = '$no'";
	$result = mysql_query($query_tname);
	if($result){
		echo json_encode('修改成功');
	}else{
		echo json_encode('修改失敗');
	}
	
?>