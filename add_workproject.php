<?php
	error_reporting(E_ERROR);
	header("Content-Type:text/html;charset=utf-8");
	include("auth_check.php");
	include("global.php");
	if(empty($_POST['sname'])){ echo'<a href="input.php">點擊跳轉</a></br>'; die('新增失敗:請輸入學生姓名');}
	if(empty($_POST['sid'])){ echo'<a href="input.php">點擊跳轉</a></br>'; die('新增失敗:請輸入學生學號');}
	$tid = $_POST['tid'];
	$sname = $_POST['sname'];
	$sid = $_POST['sid'];
	$pname = $_POST['pname'];
	$semester = $_POST['semester'];
	
	//用project query專題的pid
	$query_pid = "SELECT pid FROM Topics_Project WHERE pname='$pname'";
	$result = mysql_query($query_pid);
	$row = mysql_fetch_array($result);
	$pid = $row[0];
	if(empty($pid)){header("Refresh:3;url=input.php?add=faild"); echo '新增失敗:該專題不存在</br>'; echo'<a href="input.php">點擊跳轉</a>'; exit;}
	
	//先找出Group
	$query_group = "SELECT class FROM faculty,account WHERE account.user='$tid' and faculty.username = account.user ";
	$result = mysql_query($query_group);
	$row = mysql_fetch_array($result);
	$group = classToGroup($row[0]);
	$count = 0;
	//透過Group找出目前流水號(No)
	$query_working_project = "SELECT MAX(Working_project.No) FROM Working_project WHERE Working_project.group = '$group'";
	//$query_working_project = "SELECT Working_project.Group,COUNT(Semester) FROM Working_project WHERE Semester='$semester' Group BY Working_project.Group";
	$result = mysql_query($query_working_project);
	while($row=mysql_fetch_array($result)){
		$no=$row[0]+1;
	}
	//$no++;
	
	//檢查輸入的學生是否已經存在專題，如果有則回傳錯誤訊息
	foreach($sid as $id){
		$query_check = "SELECT COUNT(*),Sname,Sid FROM Student WHERE Student.Sid =".$id;
		$result = mysql_query($query_check);
		if($row = mysql_fetch_array($result)){
			if($row[0]>0){
				echo '錯誤:學生'.$row[2].' '.$row[1].'已存在專題名單中，請檢察是否輸入錯誤學生姓名或學號</br>';
				echo '<a href="input.php">回上一頁</a>';
				EXIT;
			}
			else{
				echo "ok";
			}
		}
		
	}
	foreach($sid as $id){
		//如果有資料
		if(!empty($id)){
			
			
			//新增student的資料，要先新增student因為score有constraint
			$query_student = "INSERT INTO Student (Sid,Sname,Tid) VALUES ('$sid[$count]','$sname[$count]','$tid')";
			
			$result = mysql_query($query_student);
			if(!$result){ echo '新增學生失敗' . mysql_error(); EXIT;}
				//新增score的資料
			$query_score = "INSERT INTO Score (Sid,Semester) VALUES ('$sid[$count]','$semester')";
			$result = mysql_query($query_score);
			if(!$result){echo '新增失敗:已經輸入過該學生資料</br>'; echo'<a href="input.php">回上一頁</a>'; EXIT;}
			//else{header("Refresh:2;url=input.php?add=ok"); echo '新增成功</br>'; echo'<a href="input.php">回上一頁</a>';
			//新增working project的資料

			
			
			//INSERT資料到Workin_project
			
			$query_working_project = "INSERT INTO Working_project(Semester,Working_project.Group,Working_project.No,Pid,Sid,Tid) VALUES('$semester','$group','$no','$pid', '$sid[$count]', '$tid')";
			$result = mysql_query($query_working_project);
			if(!$result){echo '新增失敗</br>'; echo'<a href="input.php">點擊跳轉</a>'; EXIT;}
			else{header("Refresh:2;url=input.php?add=ok"); echo '新增成功'; echo'<a href="input.php">點擊跳轉</a></br>';
				
			}
			
		}
		$count++;
		
	}
	
	//$query_student = "INSERT INTO Student (Sid,Sname,Tid,Pid) VALUES ('$sid','$sname','$tid','$pid')";
	function classToGroup($class) {
		switch($class){
			 case 1:
				return "B";
			case 2:
				return "A";
			case 3:
				return "C";
			default:
				return "N";
		}
	}
	
?>