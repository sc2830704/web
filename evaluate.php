<?php
	if(!isset($_SESSION))	session_start();
	include("global.php");
?>

<html>
	<head>
		<title>實務專題評分表</title>
		<meta http-equiv="Content-Type" content="text/html"; charset="utf-8">
		<link rel=stylesheet type="text/css" href="style.css">
	</head>

	<body bgcolor="#ffffcc" style="font-family: DFKai-sb ;">
		<h2 align="center">電子系 <?php echo $now_year  ?> 年第 <?php echo $now_semester ?> 學期實務專題評分表</h2>
		<form id="form1" name="form1"  method="post" action="/et/admin/score_check.php">
		<div style="margin-left:10%">請選取欲評分之學生姓名: <select style="width:150px;height:30px;font-size:20px;" name="dropdown" >;

				<option value="default">請選擇</option>;
				<?php
					if (!$link)  die('Not connected : ' . mysql_error());
				 	$str="	SELECT Sname
				 			FROM Student,Score
				 			WHERE Score.total='0' AND Student.Tid ='{$_SESSION["tid"]}' AND Score.Sid = Student.Sid
				 	  	 "; 
				 	$id="	SELECT Student.Sid
				 			FROM Student,Score
				 			WHERE Score.total='0' AND Student.Tid ='{$_SESSION["tid"]}' AND Score.Sid = Student.Sid
				 	  	 ";  	 
				 	  	//已經被評分的不會顯示, 尚未評分的同學的Score.total='0'
				 	$result = mysql_query($str,$link);
				 	$result1 = mysql_query($id,$link);

				?>

				 <?php 
				 //下拉式選單
				 //error_reporting(0);
				 //$row['Sid'] = mysql_fetch_assoc($result) 
				 while ( $row['Sname'] = mysql_fetch_assoc($result))
				 {

				 	$row['Sid'] = mysql_fetch_assoc($result1);
				 	foreach($row['Sid'] as $value)
				 	{	
				 		foreach($row['Sname'] as $name)
				 		{
				 ?>
				 		<option value="<?php echo $value; ?>"  > <?php echo $name ?> </option>

				 <?php	
				 		}
					} 
				 }	
				 ?>
				</select>

			<?php  

				if(mysql_num_rows($result)<1) echo "全部學生都已經評分完畢，請按上一頁返回"; 
			?>
			</div>
			<br/>
			

			<!--以下table-->
			<table border="1" align="center" width="80%"  cellpadding="3">  <!--邊框的寬度=1像素-->
				<tr>
					<td align="center">分項</td>
					<td align="center">實務專題評量指標</td>
					<td align="center">權重<br/><font color="blue">(可自行調整)</font></td>
					<td align="center"><font color="red">此欄請老師評分<br/>(採百分制)</font></td>
					<!--<td align="center">得分</td>-->
				</tr>


				<!--以下基礎能力-->
				<!--1-1w為第一項能力之第一項指標的權重-->
				<!--1-1s為第一項能力之第一項指標的評分-->
				<tr>        
					<td rowspan="5" align="center">基礎能力</td>  
					<td>1.工具及設備使用之能力</td>
					<td><center><input type="text" name="w1_1" value="5" class="short_textbox">  % </center></td>     
					<td><center><input type="text" name="s1_1" value="" class="long_textbox"></center></td>
				</tr>

				<tr>
					<td>2.使用電腦與網際網路能力</td>    
					<td><center><input type="text" name="w1_2" value="5" class="short_textbox">  % </center></td>     
					<td><center><input type="text" name="s1_2" value="" class="long_textbox"></center></td>
				</tr>

				<tr>
					<td>3.具運用數學的方法解決電子工程相關方面問題之能力</td>
					<td><center><input type="text" name="w1_3" value="5" class="short_textbox">  % </center></td>     
					<td><center><input type="text" name="s1_3" value="" class="long_textbox"></center></td>
				</tr>

				<tr>
					<td>4.具專題製作及撰寫報告之能力</td>    
					<td><center><input type="text" name="w1_4" value="5" class="short_textbox">  % </center></td>     
					<td><center><input type="text" name="s1_4" value="" class="long_textbox"></center></td>
				</tr>

				<tr>
					<td>5.具有良好的外語能力</td>    
					<td><center><input type="text" name="w1_5" value="5" class="short_textbox">  % </center></td>     
					<td><center><input type="text" name="s1_5" value="" class="long_textbox"></center></td>
				</tr>
			<!--
				<tr bgcolor="#FFCCCC">
					<td align="right"><font color="blue">小計</font></td>    <td></td>  <td></td>     
				</tr>
			-->

				<!--以下專業核心能力-->
				<tr>
					<td rowspan="10" align="center">專業核心能力</td>    
					<td>1.設計電子電路能力</td>  
					<td><center><input type="text" name="w2_1" value="5" class="short_textbox">  % </center></td>     
					<td><center><input type="text" name="s2_1" value="" class="long_textbox"></center></td>
				</tr>

				<tr>
					<td>2.程式設計能力</td>    
					<td><center><input type="text" name="w2_2" value="5" class="short_textbox">  % </center></td>     
					<td><center><input type="text" name="s2_2" value="" class="long_textbox"></center></td>
				</tr>

				<tr>
					<td>3.使用儀器與量測方法之能力</td>    
					<td><center><input type="text" name="w2_3" value="5" class="short_textbox">  % </center></td>     
					<td><center><input type="text" name="s2_3" value="" class="long_textbox"></center></td>
				</tr>

				<tr>
					<td>4.嵌入式系統之設計能力</td>    
					<td><center><input type="text" name="w2_4" value="5" class="short_textbox">  % </center></td>     
					<td><center><input type="text" name="s2_4" value="" class="long_textbox"></center></td>
				</tr>

				<tr>
					<td>5.使用系統及元組件之能力</td>    
					<td><center><input type="text" name="w2_5" value="5" class="short_textbox">  % </center></td>     
					<td><center><input type="text" name="s2_5" value="" class="long_textbox"></center></td>
				</tr>

				<tr>
					<td>6.系統及元組件之設計能力</td>    
					<td><center><input type="text" name="w2_6" value="5" class="short_textbox">  % </center></td>     
					<td><center><input type="text" name="s2_6" value="" class="long_textbox"></center></td>
				</tr>

				<tr>
					<td>7.系統及元組件之製作能力</td>    
					<td><center><input type="text" name="w2_7" value="5" class="short_textbox">  % </center></td>     
					<td><center><input type="text" name="s2_7" value="" class="long_textbox"></center></td>
				</tr>

				<tr>
					<td>8.系統及元組件之模擬與分析能力</td>    
					<td><center><input type="text" name="w2_8" value="5" class="short_textbox">  % </center></td>     
					<td><center><input type="text" name="s2_8" value="" class="long_textbox"></center></td>
				</tr>

				<tr>
					<td>9.訊號分析處理與應用之能力</td>    
					<td><center><input type="text" name="w2_9" value="5" class="short_textbox">  % </center></td>     
					<td><center><input type="text" name="s2_9" value="" class="long_textbox"></center></td>
				</tr>

				<tr>
					<td>10.系統整合及測試之能力</td>    
					<td><center><input type="text" name="w2_10" value="5" class="short_textbox">  % </center></td>     
					<td><center><input type="text" name="s2_10" value="" class="long_textbox"></center></td>
				</tr>
			<!--
				<tr bgcolor="#FFCCCC">
					<td align="right"><font color="blue">小計</font></td>    <td></td>  <td></td>    
				</tr>
				-->


				<!--以下應用能力-->
				<tr>
					<td rowspan="6" align="center">應用能力</td>    
					<td>1.具熟悉溝通、協調專業知識之要領</td>  
					<td><center><input type="text" name="w3_1" value="5" class="short_textbox">  % </center></td>     
					<td><center><input type="text" name="s3_1" value="" class="long_textbox"></center></td>
				</tr>

				<tr>
					<td>2.具專業閱讀與手冊查閱能力</td>    
					<td><center><input type="text" name="w3_2" value="4" class="short_textbox">  % </center></td>     
					<td><center><input type="text" name="s3_2" value="" class="long_textbox"></center></td>
				</tr>

				<tr>
					<td>3.具工作安全與衛生知識</td>    
					<td><center><input type="text" name="w3_3" value="4" class="short_textbox">  % </center></td>     
					<td><center><input type="text" name="s3_3" value="" class="long_textbox"></center></td>
				</tr>

				<tr>
					<td>4.具相關法規常識</td>    
					<td><center><input type="text" name="w3_4" value="4" class="short_textbox">  % </center></td>     
					<td><center><input type="text" name="s3_4" value="" class="long_textbox"></center></td>
				</tr>

				<tr>
					<td>5.了解產業發展概況</td>    
					<td><center><input type="text" name="w3_5" value="4" class="short_textbox">  % </center></td>     
					<td><center><input type="text" name="s3_5" value="" class="long_textbox"></center></td>
				</tr>

				<tr>
					<td>6.具專利文件閱讀能力</td>    
					<td><center><input type="text" name="w3_6" value="4" class="short_textbox">  % </center></td>     
					<td><center><input type="text" name="s3_6" value="" class="long_textbox"></center></td>
				</tr>
				<!--
					<tr bgcolor="#FFCCCC">
						<td align="right"><font color="blue">小計</font></td>    <td></td>  <td></td>     
					</tr>
				-->
				<!--總分-->
				 <tr>
					<td colspan="3" align="right">總分<font color="red">(以84分為上限)</font></td>    <td></td> 
				</tr>

			</table>
			<!--以上table-->
			<br/>
			<center>
				<button type="submit" name="submit" style="width:120px;height:40px;font-size:20px">填寫完畢</button> 
				<input type="reset"  name="reset" value="重新填寫" style="width:120px;height:40px;font-size:20px">
				<br/><br/>
			</center>

		</form>
		<!--以上form-->	
		
	</body>
</html>