<!--connect to DB-->
<?php
header("Content-Type:text/html; charset=utf-8");
include("global.php");
if(!isset($_SESSION)){
	session_start();
}
if (!$link) {
    die('Not connected : ' . mysql_error());
}

$Tname = $_GET['Tname'];
$Tid = $_GET['Tid'];
$topic = $_GET['topic'];
$category_1 = $_GET['category_1'];
$category_2= $_GET['category_2'];
$category_3= $_GET['category_3'];
$category_4= $_GET['category_4'];
$category_5= $_GET['category_5'];
$category_6= $_GET['category_6'];
$category_7= $_GET['category_7'];
$category_8= $_GET['category_8'];
$category_9= $_GET['category_9'];
$category_10= $_GET['category_10'];
$category_11= $_GET['category_11'];
$category_12= $_GET['category_12'];
$other= $_GET['other'];
$description= $_GET['description'];
$factor= $_GET['factor'];
$num_of_member= $_GET['num_of_member'];
$semester= $_GET['semester'];

// insert project information to db
$query =" INSERT INTO Topics_Project(Pid,Tid,Pname,category,description,factor,num_of_member,Semester) 
          VALUES (('".$topic."'),('".$Tid."'),('".$topic."'),('".$category_1."".$category_2."".$category_3."".$category_4."".$category_5."".$category_6."".$category_7."".$category_8."".$category_9."".$category_10."".$category_11."".$category_12."".$other."'),('".$description."'),('".$factor."'),('".$num_of_member."'),('".$semester."'))
       ";

mysql_query($query) or die(mysql_error());

?>

<html>
<head>
    <title>填寫完成</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link rel=stylesheet type="text/css" href="style.css">
	<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/pure-min.css">
</head>
 
<body bgcolor="#ffffcc" style="font-family: DFKai-sb ;">
<h2 align="center">填寫完成</h2>
<center><p></p></center>
<center><a href="back_main.php"><input type="button" value="點擊以轉跳首頁" name="Button2" style="width:200px;height:40px;font-size:20px"></a></center>	<!--back to back main-->

</body>
 
</html>