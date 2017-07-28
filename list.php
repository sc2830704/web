<?php
include('global.php');
$query_semester = 'SELECT DISTINCT Semester FROM Score';
$result = mysql_query($query_semester);
$count = 0;
while($row = mysql_fetch_array($result)){
	$semesters[$count] = $row[0];
	$count++;
}
if(isset($_POST['semester'])){
	$semester = $_POST['semester'];
	$query = 'SELECT Student.Sid,sname,score_1,score_2 FROM Score,Student WHERE Semester=\''.$_POST['semester'].'\' And Student.Sid=Score.Sid ORDER BY Sid ASC';
	$result = mysql_query($query);
	$count = 0;
	$time = time();
	$score_1 = array();
	$score_2 = array();
	while($row = mysql_fetch_array($result)){
		$Sid[$count] = $row[0];
		$sname[$count] = $row[1];
		if(is_numeric($row[2])){
		    $score_1[$count] = $row[2];
		}else{
			$score_1[$count]=-1;
		}
		if(is_numeric($row[3])){
		    $score_2[$count] = $row[3];
		}else{
			$score_2[$count]=-1;
		}
		$count++;
	}
	
}

?>
<html>
	<head>
		<meta http-equiv="Content-type" content="text/html" charset="utf-8">
		<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/pure-min.css">
	</head>
	<body>
		<div align="center">
			<h1>評分表</h1></br>
			<label for="semester">學年度</label>
			<form class="pure-form pure-form-stacked" align="center" method="post" action="list.php">
				<fieldset>
					<div class="pure-form" align="center"> 
						<div class="pure-u-1 pure-u-md-1-3">
							<select name="semester">
								<option>請選擇</option>
								<?php foreach($semesters as $se){
									echo '<option value='.$se;
									if($se==$semester){echo ' selected="selected"';}//在選擇的option中加入 selected="selected"
									echo '>'.$se.'</option>';}?>
							</select>
						</div>
						<button type="submit">提交</button>
					</div>
				</fieldset>
			</form>
			
			<table class="pure-table">
				 <thead>
					<tr>
						<th>學號</th>
						<th>姓名</th>
						<th>第一次成績</th>
						<th>第二次成績</th>
					</tr>
				</thead>
				<tbody>
					<?php 
						for($i=0;$i<sizeof($Sid);$i++){
								echo '<tr> <td>'.$Sid[$i].'</td> <td>'.$sname[$i].'</td>';
								if($score_1[$i]<0)
									{echo '<td><font color="red">未評分</font></td>';}
								else
									{echo '<td><a href=\'download.php?Sid='.$Sid[$i].'&order=1&method=1\';>下載</a></td>';}
								if($score_2[$i]<0)
									{echo '<td><font color="red">未評分</font></td>';}
								else
									{echo '<td><a href=\'download.php?Sid='.$Sid[$i].'&order=2&method=1\';>下載</a></td>';}
								echo '</tr>';
						}
						
					?>		
				</tbody>
			</table>
		</div>
		</br>
		
	</body>
	
	<div align="center">
		<a type="button" onClick="location.href='download_score-list.php?semester=<?php echo $semester;?>&order=1'" class="pure-button pure-button-primary">下載成績總覽表-上學期</a>  
	</div></br>
	<div align="center">
		<a type="button" onClick="location.href='download_score-list.php?semester=<?php echo $semester;?>&order=2'" class="pure-button pure-button-primary">下載成績總覽表-下學期</a>  
	</div></br>
	
	<div align="center">
		<a type="button" onClick="location.href='download_batch.php?semester=<?php echo $semester;?>&order=1'" class="pure-button pure-button-primary">打包下載-上學期(.zip)</a>  
	</div></br>
	<div align="center">
		<a type="button" onClick="location.href='download_batch.php?semester=<?php echo $semester;?>&order=2'" class="pure-button pure-button-primary">打包下載-下學期(.zip)</a>  
	</div></br>
	<div align="center"><a type="button" href="back_main.php" class="pure-button pure-button-primary">回主選單</a></div>
</html>
