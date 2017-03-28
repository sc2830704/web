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

// echo $_GET['Sid']."<br>";
$query = "SELECT score.score_1,score.score_2
		  FROM score
		  where Score.Sid='$_GET[Sid]'";

$result = mysql_query($query,$link); 		  
$row = mysql_fetch_assoc($result);
$score_1 = $row['score_1'];
$score_2 = $row['score_2'];

// print $score_1."<br>";
// print $score_2."<br>";

$s11 = $_GET['s1_1'];
$s12 = $_GET['s1_2'];
$s13 = $_GET['s1_3'];
$s14 = $_GET['s1_4'];
$s15 = $_GET['s1_5'];
$s21 = $_GET['s2_1'];
$s22 = $_GET['s2_2'];
$s23 = $_GET['s2_3'];
$s24 = $_GET['s2_4'];
$s25 = $_GET['s2_5'];
$s26 = $_GET['s2_6'];
$s27 = $_GET['s2_7'];
$s28 = $_GET['s2_8'];
$s29 = $_GET['s2_9'];
$s210 = $_GET['s2_10'] ;
$s31 = $_GET['s3_1'] ;
// $s32 = ;
// $s33 = ;
// $s34 = ;
// $s35 = ;
// $s36 = ;




# first score
if(is_null($score_1)){
	$sql ="UPDATE Score 
	  SET s11_1='$s11', s12_1='$s12', s13_1='$s13', s14_1='$s14', s15_1='$s15', s21_1='$s21',s22_1='$s22',s23_1='$s23',s24_1='$s24 ',s25_1='$s25 ',s26_1='$s26',s27_1='$s27',s28_1='$s28',s29_1='$s29',s210_1='$s210 ',s31_1='$s31 ',s32_1='$_GET[s3_2]',s33_1='$_GET[s3_3]',s34_1='$_GET[s3_4]',s35_1='$_GET[s3_5]',s36_1='$_GET[s3_6]',
	  	  w11_1='$_GET[w1_1]', w12_1='$_GET[w1_2]', w13_1='$_GET[w1_3]', w14_1='$_GET[w1_4]', w15_1='$_GET[w1_5]', w21_1='$_GET[w2_1]',w22_1='$_GET[w2_2]',w23_1='$_GET[w2_3]',w24_1='$_GET[w2_4]',w25_1='$_GET[w2_5]',w26_1='$_GET[w2_6]',w27_1='$_GET[w2_7]',w28_1='$_GET[w2_8]',w29_1='$_GET[w2_9]',w210_1='$_GET[w2_10]',w31_1='$_GET[w3_1]',w32_1='$_GET[w3_2]',w33_1='$_GET[w3_3]',w34_1='$_GET[w3_4]',w35_1='$_GET[w3_5]',w36_1='$_GET[w3_6]',
	  	  score_1='$_GET[total_s]'
	  WHERE Score.Sid='$_GET[Sid]'";

	mysql_query($sql,$link);    //send to db
}

# Second score
else if(is_null($score_2)){
	$sql ="UPDATE Score 
	  SET s11_2='$_GET[s1_1]', s12_2='$_GET[s1_2]', s13_2='$_GET[s1_3]', s14_2='$_GET[s1_4]', s15_2='$_GET[s1_5]', s21_2='$_GET[s2_1]',s22_2='$_GET[s2_2]',s23_2='$_GET[s2_3]',s24_2='$_GET[s2_4]',s25_2='$_GET[s2_5]',s26_2='$_GET[s2_6]',s27_2='$_GET[s2_7]',s28_2='$_GET[s2_8]',s29_2='$_GET[s2_9]',s210_2='$_GET[s2_10]',s31_2='$_GET[s3_1]',s32_2='$_GET[s3_2]',s33_2='$_GET[s3_3]',s34_2='$_GET[s3_4]',s35_2='$_GET[s3_5]',s36_2='$_GET[s3_6]',
	  	  w11_2='$_GET[w1_1]', w12_2='$_GET[w1_2]', w13_2='$_GET[w1_3]', w14_2='$_GET[w1_4]', w15_2='$_GET[w1_5]', w21_2='$_GET[w2_1]',w22_2='$_GET[w2_2]',w23_2='$_GET[w2_3]',w24_2='$_GET[w2_4]',w25_2='$_GET[w2_5]',w26_2='$_GET[w2_6]',w27_2='$_GET[w2_7]',w28_2='$_GET[w2_8]',w29_2='$_GET[w2_9]',w210_2='$_GET[w2_10]',w31_2='$_GET[w3_1]',w32_2='$_GET[w3_2]',w33_2='$_GET[w3_3]',w34_2='$_GET[w3_4]',w35_2='$_GET[w3_5]',w36_2='$_GET[w3_6]',
	  	  score_2='$_GET[total_s]'
	  WHERE Score.Sid='$_GET[Sid]'";

	mysql_query($sql,$link);    //send to db

}

$sql_update_weight = "UPDATE teacher_weight
				  SET w11='$_GET[w1_1]', w12='$_GET[w1_2]', w13='$_GET[w1_3]', w14='$_GET[w1_4]', w15='$_GET[w1_5]', w21='$_GET[w2_1]',w22='$_GET[w2_2]',w23='$_GET[w2_3]',w24='$_GET[w2_4]',w25='$_GET[w2_5]',w26='$_GET[w2_6]',w27='$_GET[w2_7]',w28='$_GET[w2_8]',w29='$_GET[w2_9]',w210='$_GET[w2_10]',w31='$_GET[w3_1]',w32='$_GET[w3_2]',w33='$_GET[w3_3]',w34='$_GET[w3_4]',w35='$_GET[w3_5]',w36='$_GET[w3_6]'
				  WHERE teacher_weight.user='{$_SESSION["tid"]}'";

mysql_query($sql_update_weight,$link);

?>

<html>
<head>
    <title>填寫完成</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link rel=stylesheet type="text/css" href="style.css">
	<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/pure-min.css">
</head>
 
<body bgcolor="#ffffcc" style="font-family:Microsoft JhengHei;">
<h2 align="center">填寫完成</h2>
<center><p></p></center>
<center><a href="index.php"><input type="button" value="點擊以轉跳首頁" name="Button2" style="width:200px;height:40px;font-size:20px;font-family:Microsoft JhengHei;"></a></center>	<!--回到待評分同學頁面-->

</body>
 
</html>