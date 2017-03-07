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

$sql ="UPDATE Score 
	  SET s11='$_GET[s1_1]', s12='$_GET[s1_2]', s13='$_GET[s1_3]', s14='$_GET[s1_4]', s15='$_GET[s1_5]', s21='$_GET[s2_1]',s22='$_GET[s2_2]',s23='$_GET[s2_3]',s24='$_GET[s2_4]',s25='$_GET[s2_5]',s26='$_GET[s2_6]',s27='$_GET[s2_7]',s28='$_GET[s2_8]',s29='$_GET[s2_9]',s210='$_GET[s2_10]',s31='$_GET[s3_1]',s32='$_GET[s3_2]',s33='$_GET[s3_3]',s34='$_GET[s3_4]',s35='$_GET[s3_5]',s36='$_GET[s3_6]',
	  	  w11='$_GET[w1_1]', w12='$_GET[w1_2]', w13='$_GET[w1_3]', w14='$_GET[w1_4]', w15='$_GET[w1_5]', w21='$_GET[w2_1]',w22='$_GET[w2_2]',w23='$_GET[w2_3]',w24='$_GET[w2_4]',w25='$_GET[w2_5]',w26='$_GET[w2_6]',w27='$_GET[w2_7]',w28='$_GET[w2_8]',w29='$_GET[w2_9]',w210='$_GET[w2_10]',w31='$_GET[w3_1]',w32='$_GET[w3_2]',w33='$_GET[w3_3]',w34='$_GET[w3_4]',w35='$_GET[w3_5]',w36='$_GET[w3_6]',
	  	  total='$_GET[total_s]'
	  WHERE Score.Sid='$_GET[Sid]'";

mysql_query($sql,$link);    //send to db

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