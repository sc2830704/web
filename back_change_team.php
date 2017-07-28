<?php 
	include("global.php"); 
	if(!isset($_SESSION))	
		session_start();
	else echo "no session";

	# Query teacher list
	if (!$link)  die('Not connected : ' . mysql_error());
	 	
	 	$query = "	SELECT name_ch,username
				 	FROM faculty
				 ";
		$result = mysql_query($query,$link);
	// while ( $row = mysql_fetch_array($result))	print_r($row) 
?>

<html>
<head>
    <title>學生換組作業</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link rel=stylesheet type="text/css" href="style.css">
</head>

<body bgcolor="#ffffcc" style="font-family:Microsoft JhengHei;">

<h2 align="center">學生換組作業</h2>

<form id="form1" name="form1"  method="post" action="back_change_team_check.php">
	<center>
	<div>欲換組之學生學號：<input type="text"; style="width:150px;height:30px;font-size:20px"; name="StudentID">
	</div></br>

	<div>更換後之指導教授：<select style="width:150px;height:30px;font-size:20px;" name="TeacherName">	<!--選擇教授選單-->
		<option value='default'>請選擇</option>		
		 <?php 
			 while ( $row = mysql_fetch_array($result))
			 {
				echo "<option value=$row[1]>"; 
				echo $row[0]; 
				echo "</option>"; 
			 }
		 ?>
	 </select></br></br></div>

</form>


<center><button type="submit" name="submit" style="width:120px;height:40px;font-size:20px">確定</button></center>
</body>
</html>