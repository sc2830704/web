<?php
header("Content-Type:text/html; charset=utf-8");
include("global.php");
if(!isset($_SESSION)){
	session_start();
}

getData($_SESSION['MM_Username'],$link);

?>

<?php
	function getData($user,$link){
		$query = "SELECT faculty.name_ch,faculty.username FROM faculty WHERE faculty.username = '{$_SESSION['MM_Username']}'";
		$result = mysql_query($query,$link);
		$count = mysql_num_rows($result);
		$c = 0;
		$idArray = array();
		while($row = mysql_fetch_array($result)){
			$_SESSION['tname'] = $row[0];
			$_SESSION['tid'] = $row[1];		
			$c=$c+1;
		}
		echo $row[0]."</br>";
	}
?>

<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html"; charset="utf-8">
		<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/pure-min.css">
	</head>
	<body>
		<div align="center" style="padding:100px;border:1px;">
			<p style="font-family:Microsoft JhengHei;"><font size=8 color=#123456>電子工程系專題實務評分系統</font></p>
			<a href="score_evaluate.php"><input class="pure-button pure-button-primary"  type="button" value="專題評分"></a>
			<p><a href="project_topic.php"><button type="submit" class="pure-button pure-button-primary">提題目</button></a>
		</div>
	</body>
</html>