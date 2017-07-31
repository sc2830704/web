<?php
header("Content-Type:text/html; charset=utf-8");
include("global.php");
if(!isset($_SESSION)){
	session_start();
}
if (!$link) {
    die('Not connected : ' . mysql_error());
}

$NewPrj = $_POST['NewPrj'];
$StuName = $_SESSION['StuName'];
$StuID = $_SESSION['StuID'];
$NewTeaName = $_SESSION['NewTeaName'];
$NewTeaID = $_SESSION['NewTeaID'];


# change teacher
$sql1 = "UPDATE student
		 SET Tid = '$NewTeaID'
		 WHERE Sid = '$StuID'";
$result1 = mysql_query($sql1,$link);

# finding project name by ID
$sql2 = "SELECT *
		 FROM working_project
		 WHERE Pid = '$NewPrj'";
$result2 = mysql_query($sql2,$link);
while ( $row = mysql_fetch_array($result2)){
	$Seme = $row[0];
	$group = $row[1];
	$No = $row[2];
}

# change teacher
$sql3 = "UPDATE working_project
		 SET Tid = '$NewTeaID', Pid = '$NewPrj', Semester = '$Seme', working_project.Group = '$group', working_project.No = '$No'
		 WHERE Sid = '$StuID'";
$result3 = mysql_query($sql3,$link);	

?>

<html>
<head>
    <title>換組完成</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link rel=stylesheet type="text/css" href="style.css">
	<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/pure-min.css">
</head>
 
<body bgcolor="#ffffcc" style="font-family: Microsoft JhengHei ;">
<h2 align="center">填寫完成</h2>
<div align="center"><?php echo "成功將 ".$StuName.$StuID." 轉移到 ".$NewTeaName."教授 之 ".$NewPrj." (".$Seme.$group.$No.")" ?></h2>
<center><p></p></center>
<center><a href="back_main.php"><input type="button" value="點擊以轉跳首頁" name="Button2" style="width:200px;height:40px;font-size:20px"></a></center>	<!--back to back main-->

</body>
 
</html>