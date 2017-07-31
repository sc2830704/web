<?php
	if(!isset($_SESSION))	session_start();
	include("global.php");
?>

<html>
	<head>
		<title>實務專題列表</title>
		<meta http-equiv="Content-Type" content="text/html"; charset="utf-8">
		<link rel=stylesheet type="text/css" href="style.css">
	</head>

	<?php
		if (!$link)  die('Not connected : ' . mysql_error());
	 	
	 	$query = "	SELECT name_ch,username
				 	FROM faculty
				 ";
		$result = mysql_query($query,$link);
		// while ( $row = mysql_fetch_array($result))	print_r($row) 
	?>


	<body bgcolor="#ffffcc" style="font-family: Microsoft JhengHei ;">
		<h2 align="center">電子系實務專題列表</h2>
		<form id="form1" name="form1"  method="post" action="topdf.php">
			<center>
			<div>請選取欲瀏覽之教授姓名：<select style="width:150px;height:30px;font-size:20px;" name="dropdown" >;	<!--選擇教授選單-->
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
				<div>請選取學年度：<select style="width:150px;height:30px;font-size:20px;" name="which_year" >;  	<!--選擇學期選單-->
                		<option value = 'default'>請選擇</option>
                		<option value = "<?php echo ($now_year-1)."1"; ?>"><?php echo ($now_year-1)."1" ?></option>
                		<option value = "<?php echo ($now_year-1)."2"; ?>"><?php echo ($now_year-1)."2" ?></option>
　              			<option value = "<?php echo ($now_year)."1"; ?>"><?php echo $now_year."1" ?></option>
						<option value = "<?php echo ($now_year)."2"; ?>"><?php echo $now_year."2" ?></option>
            	</select></div>
			</center>

			<br/>
			<center>
				<button type="submit" name="submit" style="width:120px;height:40px;font-size:20px">提交</button> 
				<br/><br/>
			</center>

		</form>
		<!--以上form-->	
		
	</body>
</html>