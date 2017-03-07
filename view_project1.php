<?php

	if(!isset($_SESSION))  session_start();
	else echo "NO SESSION";

	include("global.php");


	$dropdown = $_POST['dropdown'];
	$query = "   SELECT *
                 FROM Project
                 WHERE Project.Tid='{$dropdown}'";
    $query1 = "	 SELECT tname
                 FROM Teacher
                 WHERE Teacher.Tid='{$dropdown}'";
    

    $result = mysql_query($query,$link);
    $result1 = mysql_query($query1,$link);
    while ( $row1 = mysql_fetch_array($result1)) $name = $row1['tname'];
	
		
	// while ( $row1 = mysql_fetch_array($result1))	print_r($row1);

?>
<html>
<head>
    <title>實務專題列表</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link rel=stylesheet type="text/css" href="style.css">
</head>
 
<body bgcolor="#ffffcc" style="font-family: DFKai-sb ;">

<h2 align="center">電子系 <?php echo $now_year  ?> 年第 <?php echo $now_semester ?> 學期實務專題列表</h2>

<?php
echo "<div style='margin-left:10%'>";
echo "指導教授：".$name." 教授";
echo "</div>";

while ( $row = mysql_fetch_array($result))
	{	
		echo "<table border='1' align='center' width='80%' cellpadding='3'>";
		echo 	"<tr>";
        echo 		"<td  width='300' align='center'>專題類別</td>";
        echo 		"<td width='300'>".$row['category']."</td>";  
    	echo 	"</tr>";
    	echo 	"<tr>";
        echo 		"<td align='center'>專題名稱</td>";
        echo 		"<td>".$row['Pname']."</td> ";
    	echo 	"</tr>";

    	echo 	"<tr>";
        echo 		"<td align='center'>參加者須具備之條件</td>";
        echo 		"<td>".$row['factor']."</td>";
    	echo 	"</tr>";

    	echo 	"<tr>";
        echo 		"<td align='center'>參加人數之限制</td>";
        echo 		"<td>".$row['num_of_member']."</td>";
    	echo 	"</tr>";

    	echo "</table>";
    	echo "<br/><br/>";
	}	
?>
