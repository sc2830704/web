<?php
include("auth_check.php");
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/pure-min.css">
		<style>
		.button-customized{
			 color:white;
			 background:#757575;
		}
		</style>
	</head>
	<body>
		<div align="center" style="padding:100px;border:1px;" >
			<p style="font-family:Microsoft JhengHei;"><font size=8 color=#123456>電子工程系專題實務管理系統</font></p>
			</br>
			<a href='back_project_topic.php'><h3>新增專題</h3></a></br>
			<a href='input.php'><h3>輸入專題資料</h3></a></br>
			<a href='back_change_team.php'><h3>換組作業</h3></a></br>
			<a href='project_overview.php'><h3>專題一覽表</h3></a></br>	
			<a href='list.php'><h3>下載評分表</h3></a></br>
			<a href="view_project.php"><h3>實務專題列表</h3></a></br>
		</div>
	</body>
</html>