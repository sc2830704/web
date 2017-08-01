<?php
if(!isset($_SESSION))	session_start();
include("global.php");

if (!$link)  die('Not connected : ' . mysql_error());
 	
	if(isset($_POST['semester'])){
		$semester = $_POST['semester'];
		$Tname_arr = array();
		$Tid_arr = array();
		$count = 0;

		# Query Tname,Tid
		$query = "	SELECT name_ch,username FROM faculty";
		$result = mysql_query($query,$link);

		# Input Tname,Tid in array
		while($row = mysql_fetch_array($result)){
			$Tname_arr[$count] = $row[0];
			$Tid_arr[$count] = $row[1];
			$count++;
	}
}


?>

<html>
	<head>
		<title>實務專題列表</title>
		<meta http-equiv="Content-type" content="text/html" charset="utf-8">
		<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/pure-min.css">
	</head>

	<body>
		<center>
		<h2><?php 
				if(isset($_POST['semester'])){
					$choose_semester = $_POST['semester'];		# user choosen semester
					echo $choose_semester;
				} 
			?>電子系實務專題列表</h2>		
				
        	<form class="pure-form pure-form-stacked" align="center" method="post" action="view_project.php">
				<div class="pure-form" align="center"> 
					<div class="pure-u-1 pure-u-md-1-3">
						<div>請選擇學年度<select name="semester">		
							<option value = 'default'>請選擇</option>
	                		<option value = "<?php echo ($now_year-1)."1"; ?>"><?php echo ($now_year-1)."1" ?></option>
	                		<option value = "<?php echo ($now_year-1)."2"; ?>"><?php echo ($now_year-1)."2" ?></option>
	　              			<option value = "<?php echo ($now_year)."1"; ?>"><?php echo $now_year."1" ?></option>
							<option value = "<?php echo ($now_year)."2"; ?>"><?php echo $now_year."2" ?></option>
						</select>
					</div></div>
					<button type="submit">提交</button>
				</div>
			</form>

			<table class="pure-table">
				 <thead>
					<tr>
						<th>教師姓名</th>
						<th>專題列表</th>
					</tr>
				</thead>
				<tbody>
					<?php 
						if(isset($_POST['semester'])){
							
							for($i=0;$i<sizeof($Tid_arr);$i++){
								echo '<tr><td>'.$Tname_arr[$i].'</td>';
								$query1 = "	SELECT * 
											FROM topics_project 
											WHERE Semester='{$_POST['semester']}' AND Tid='{$Tid_arr[$i]}'";
								$result1 = mysql_query($query1,$link);
								// while ( $row = mysql_fetch_array($result1))	print_r($row);

								if (mysql_num_rows($result1) == 0) {	# Haven't proposed project
									echo '<td><font color="red">未提出</font></td>';
								} 
								else{									# have proposed project
									echo '<td><a href=\'topdf.php?Tid='.$Tid_arr[$i].'&Which_year='.$choose_semester.'\';>下載</a></td>';	
								}
								echo '</tr>';
							}
						}
					?>		
				</tbody>
			</table>
		</center>

	<br>
	<div align="center"><a type="button" href="back_main.php" class="pure-button pure-button-primary">回主選單</a></div>
	</body>
</html>