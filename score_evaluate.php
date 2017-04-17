<?php
	if(!isset($_SESSION))	session_start();
	include("global.php");

	# choosing students in different semester
	// $now_month = 1;	# for test
	if($now_month==1 ||$now_month==2 || $now_month==3 ){
		$y1 = (int)($now_year-1);
		$y2 = (int)($now_year);
		$stu1 = (string)$y1."2";
		$stu2 = (string)$y2."1";
	}
	else if($now_month==5 ||$now_month==6 || $now_month==7){
		$y = (int)($now_year);
		$y = (int)($now_year);
		$stu1 = (string)$y."1";
		$stu2 = (string)$y."2";
	}
	else{
		echo '<body bgcolor="#ffffcc" style="font-family:Microsoft JhengHei;">';
		echo "上學期評分時間：1月~3月<br>";
		echo "下學期評分時間：5月~7月<br>";
		echo "現在非評分時間!";
		echo '</body>';
		exit;
	}
?>

<?php 
	if (!$link)  die('Not connected : ' . mysql_error());
	$query = "	SELECT *
	 			FROM teacher_weight
	 			WHERE teacher_weight.user = '{$_SESSION["tid"]}'"; 
	$result = mysql_query($query,$link);
 	$row = mysql_fetch_assoc($result);
 	$tmp_w11 = $row['w11']*100;
 	$tmp_w12 = $row['w12']*100;
 	$tmp_w13 = $row['w13']*100;
 	$tmp_w14 = $row['w14']*100;
 	$tmp_w15 = $row['w15']*100;
 	$tmp_w21 = $row['w21']*100;
 	$tmp_w22 = $row['w22']*100;
 	$tmp_w23 = $row['w23']*100;
 	$tmp_w24 = $row['w24']*100;
 	$tmp_w25 = $row['w25']*100;
 	$tmp_w26 = $row['w26']*100;
 	$tmp_w27 = $row['w27']*100;
 	$tmp_w28 = $row['w28']*100;
 	$tmp_w29 = $row['w29']*100;
 	$tmp_w210 = $row['w210']*100;
 	$tmp_w31 = $row['w31']*100;
 	$tmp_w32 = $row['w32']*100;
 	$tmp_w33 = $row['w33']*100;
 	$tmp_w34 = $row['w34']*100;
 	$tmp_w35 = $row['w35']*100;
 	$tmp_w36 = $row['w36']*100;

?>

<html>
	<head>
		<title>實務專題評分表</title>
		<meta http-equiv="Content-Type" content="text/html"; charset="utf-8">
		<link rel=stylesheet type="text/css" href="style.css">
		<!--<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/pure-min.css">-->
	</head>

	<script language="JavaScript">
		function eval_score(){ 
			w1_1 = document.getElementById('w1_1').value; 
			s1_1 = document.getElementById('s1_1').value; 
			w1_2 = document.getElementById('w1_2').value; 
			s1_2 = document.getElementById('s1_2').value;
			w1_3 = document.getElementById('w1_3').value; 
			s1_3 = document.getElementById('s1_3').value; 
			w1_4 = document.getElementById('w1_4').value; 
			s1_4 = document.getElementById('s1_4').value; 
			w1_5 = document.getElementById('w1_5').value; 
			s1_5 = document.getElementById('s1_5').value; 

			(w1_1!="")?w1_1=parseFloat(w1_1,10):w1_1 = 0; 
			(s1_1!="")?s1_1=parseFloat(s1_1,10):s1_1 = 0; 
			(w1_2!="")?w1_2=parseFloat(w1_2,10):w1_2 = 0; 
			(s1_2!="")?s1_2=parseInt(s1_2,10):s1_2 = 0; 
			(w1_3!="")?w1_3=parseInt(w1_3,10):w1_3 = 0; 
			(s1_3!="")?s1_3=parseInt(s1_3,10):s1_3 = 0; 
			(w1_4!="")?w1_4=parseInt(w1_4,10):w1_4 = 0; 
			(s1_4!="")?s1_4=parseInt(s1_4,10):s1_4 = 0; 
			(w1_5!="")?w1_5=parseInt(w1_5,10):w1_5 = 0; 
			(s1_5!="")?s1_5=parseInt(s1_5,10):s1_5 = 0; 

			w2_1 = document.getElementById('w2_1').value; 
			s2_1 = document.getElementById('s2_1').value; 
			w2_2 = document.getElementById('w2_2').value; 
			s2_2 = document.getElementById('s2_2').value;
			w2_3 = document.getElementById('w2_3').value; 
			s2_3 = document.getElementById('s2_3').value; 
			w2_4 = document.getElementById('w2_4').value; 
			s2_4 = document.getElementById('s2_4').value; 
			w2_5 = document.getElementById('w2_5').value; 
			s2_5 = document.getElementById('s2_5').value; 
			w2_6 = document.getElementById('w2_6').value; 
			s2_6 = document.getElementById('s2_6').value; 
			w2_7 = document.getElementById('w2_7').value; 
			s2_7 = document.getElementById('s2_7').value;
			w2_8 = document.getElementById('w2_8').value; 
			s2_8 = document.getElementById('s2_8').value; 
			w2_9 = document.getElementById('w2_9').value; 
			s2_9 = document.getElementById('s2_9').value; 
			w2_10 = document.getElementById('w2_10').value; 
			s2_10 = document.getElementById('s2_10').value; 

			(w2_1!="")?w2_1=parseFloat(w2_1,10):w2_1 = 0; 
			(s2_1!="")?s2_1=parseFloat(s2_1,10):s2_1 = 0; 
			(w2_2!="")?w2_2=parseFloat(w2_2,10):w2_2 = 0; 
			(s2_2!="")?s2_2=parseFloat(s2_2,10):s2_2 = 0; 
			(w2_3!="")?w2_3=parseFloat(w2_3,10):w2_3 = 0; 
			(s2_3!="")?s2_3=parseFloat(s2_3,10):s2_3 = 0; 
			(w2_4!="")?w2_4=parseFloat(w2_4,10):w2_4 = 0; 
			(s2_4!="")?s2_4=parseFloat(s2_4,10):s2_4 = 0; 
			(w2_5!="")?w2_5=parseFloat(w2_5,10):w2_5 = 0; 
			(s2_5!="")?s2_5=parseFloat(s2_5,10):s2_5 = 0; 
			(w2_6!="")?w2_6=parseFloat(w2_6,10):w2_6 = 0; 
			(s2_6!="")?s2_6=parseFloat(s2_6,10):s2_6 = 0; 
			(w2_7!="")?w2_7=parseFloat(w2_7,10):w2_7 = 0; 
			(s2_7!="")?s2_7=parseFloat(s2_7,10):s2_7 = 0; 
			(w2_8!="")?w2_8=parseFloat(w2_8,10):w2_8 = 0; 
			(s2_8!="")?s2_8=parseFloat(s2_8,10):s2_8 = 0; 
			(w2_9!="")?w2_9=parseFloat(w2_9,10):w2_9 = 0; 
			(s2_9!="")?s2_9=parseFloat(s2_9,10):s2_9 = 0; 
			(w2_10!="")?w2_10=parseFloat(w2_10,10):w2_10 = 0; 
			(s2_10!="")?s2_10=parseFloat(s2_10,10):s2_10 = 0;

			w3_1 = document.getElementById('w3_1').value; 
			s3_1 = document.getElementById('s3_1').value; 
			w3_2 = document.getElementById('w3_2').value; 
			s3_2 = document.getElementById('s3_2').value;
			w3_3 = document.getElementById('w3_3').value; 
			s3_3 = document.getElementById('s3_3').value; 
			w3_4 = document.getElementById('w3_4').value; 
			s3_4 = document.getElementById('s3_4').value; 
			w3_5 = document.getElementById('w3_5').value; 
			s3_5 = document.getElementById('s3_5').value; 
			w3_6 = document.getElementById('w3_6').value; 
			s3_6 = document.getElementById('s3_6').value; 

			(w3_1!="")?w3_1=parseFloat(w3_1,10):w3_1 = 0; 
			(s3_1!="")?s3_1=parseFloat(s3_1,10):s3_1 = 0; 
			(w3_2!="")?w3_2=parseFloat(w3_2,10):w3_2 = 0; 
			(s3_2!="")?s3_2=parseFloat(s3_2,10):s3_2 = 0; 
			(w3_3!="")?w3_3=parseFloat(w3_3,10):w3_3 = 0; 
			(s3_3!="")?s3_3=parseFloat(s3_3,10):s3_3 = 0; 
			(w3_4!="")?w3_4=parseFloat(w3_4,10):w3_4 = 0; 
			(s3_4!="")?s3_4=parseFloat(s3_4,10):s3_4 = 0; 
			(w3_5!="")?w3_5=parseFloat(w3_5,10):w3_5 = 0; 
			(s3_5!="")?s3_5=parseFloat(s3_5,10):s3_5 = 0; 
			(w3_6!="")?w3_6=parseFloat(w3_6,10):w3_6 = 0;
			(s3_6!="")?s3_6=parseFloat(s3_6,10):s3_6 = 0; 

			tmp_score1 = (w1_1*s1_1 + w1_2*s1_2 + w1_3*s1_3 + w1_4*s1_4 + w1_5*s1_5)*0.01; 
			tmp_weight1 = w1_1 + w1_2 + w1_3 + w1_4 + w1_5;
			tmp_score2 = (w2_1*s2_1 + w2_2*s2_2 + w2_3*s2_3 + w2_4*s2_4 + w2_5*s2_5 + w2_6*s2_6 + w2_7*s2_7 + w2_8*s2_8 + w2_9*s2_9 + w2_10*s2_10)*0.01; 
			tmp_weight2 = w2_1 + w2_2 + w2_3 + w2_4 + w2_5 + w2_6 + w2_7 + w2_8 + w2_9 + w2_10;
			tmp_score3 = (w3_1*s3_1 + w3_2*s3_2 + w3_3*s3_3 + w3_4*s3_4 + w3_5*s3_5 + w3_6*s3_6)*0.01; 
			tmp_weight3 = w3_1 + w3_2 + w3_3 + w3_4 + w3_5 + w3_6;

			document.getElementById('tmp_score1').innerHTML = tmp_score1; 
			document.getElementById('tmp_weight1').innerHTML = tmp_weight1;
			document.getElementById('tmp_score2').innerHTML = tmp_score2; 
			document.getElementById('tmp_weight2').innerHTML = tmp_weight2;
			document.getElementById('tmp_score3').innerHTML = tmp_score3; 
			document.getElementById('tmp_weight3').innerHTML = tmp_weight3;
			document.getElementById('total_score').innerHTML = tmp_score1 + tmp_score2 + tmp_score3; 
			document.getElementById('total_weight').innerHTML = tmp_weight1 + tmp_weight2 + tmp_weight3;

		} 

		function check(){ 
			total_score = parseFloat(document.getElementById("total_score").innerHTML);

			if (total_score >= 84)
			{
				if(confirm("提醒：您所打的分數為："+total_score+"\n"+"若是已經提列優異專題的同學，請按確認已送出"))
				{
					var form1 = document.getElementById("form1");
					form1.submit();
				}
			}

		}

		function setValue() {
        	document.getElementById('w1_1').value = "<?php echo $tmp_w11; ?>"; 
        	document.getElementById('w1_2').value = "<?php echo $tmp_w12 ?>";
        	document.getElementById('w1_3').value = "<?php echo $tmp_w13 ?>";
        	document.getElementById('w1_4').value = "<?php echo $tmp_w14 ?>";
        	document.getElementById('w1_5').value = "<?php echo $tmp_w15 ?>";
        	document.getElementById('w2_1').value = "<?php echo $tmp_w21 ?>";
        	document.getElementById('w2_2').value = "<?php echo $tmp_w22 ?>";
        	document.getElementById('w2_3').value = "<?php echo $tmp_w23 ?>";
        	document.getElementById('w2_4').value = "<?php echo $tmp_w24 ?>";
        	document.getElementById('w2_5').value = "<?php echo $tmp_w25 ?>";
        	document.getElementById('w2_6').value = "<?php echo $tmp_w26 ?>";
        	document.getElementById('w2_7').value = "<?php echo $tmp_w27 ?>";
        	document.getElementById('w2_8').value = "<?php echo $tmp_w28 ?>";
        	document.getElementById('w2_9').value = "<?php echo $tmp_w29 ?>";
        	document.getElementById('w2_10').value = "<?php echo $tmp_w210 ?>";
        	document.getElementById('w3_1').value = "<?php echo $tmp_w31 ?>";
        	document.getElementById('w3_2').value = "<?php echo $tmp_w32 ?>";
        	document.getElementById('w3_3').value = "<?php echo $tmp_w33 ?>";
        	document.getElementById('w3_4').value = "<?php echo $tmp_w34 ?>";
        	document.getElementById('w3_5').value = "<?php echo $tmp_w35 ?>";
        	document.getElementById('w3_6').value = "<?php echo $tmp_w36 ?>";
    	}

	
	</script>


	<?php
		if (!$link)  die('Not connected : ' . mysql_error());

		// Student.Sname
	 	$str="	SELECT Student.Sname
	 			FROM Student,Score
	 			WHERE Score.score_2 IS NULL AND Student.Tid ='{$_SESSION["tid"]}' AND Score.Semester='$stu1' AND Score.Sid = Student.Sid
	 			UNION
	 			SELECT Student.Sname
	 			FROM Student,Score
	 			WHERE Score.score_1 IS NULL AND Student.Tid ='{$_SESSION["tid"]}' AND Score.Semester='$stu2' AND Score.Sid = Student.Sid"; 

	 	$result = mysql_query($str,$link);  	 
		

	 	// Student.Sid
	 	$id="	SELECT Student.Sid
	 			FROM Student,Score
	 			WHERE Score.score_2 IS NULL AND Student.Tid ='{$_SESSION["tid"]}' AND Score.Semester='$stu1'AND Score.Sid = Student.Sid
	 			UNION
	 			SELECT Student.Sid
	 			FROM Student,Score
	 			WHERE Score.score_1 IS NULL AND Student.Tid ='{$_SESSION["tid"]}' AND Score.Semester='$stu2'AND Score.Sid = Student.Sid"; 
	 			
	 	$result1 = mysql_query($id,$link); 	 
		
	 	//已經被評分的不會顯示, 尚未評分的同學的Score.total='0'
	 	
	 	

	 // 	echo "<br>";
	 // 	while ( $row['Sname'] = mysql_fetch_assoc($result)){
	 // 	 	print_r($row['Sname']);
	 // 	}
	 // 	echo "<br>";
		// while ( $row['Sid'] = mysql_fetch_assoc($result1)){
	 // 	 	print_r($row['Sid']);
	 // 	} 	 	

	?>

	<body bgcolor="#ffffcc" style="border:1px;font-family:Microsoft JhengHei;" >
		<h2 align="center">電子系 <?php echo $now_year  ?> 年第 <?php echo $now_semester ?> 學期實務專題評分表</h2>

		<form id="form1" name="form1"  method="post" action="score_check.php">
		<div style="margin-left:10%">請選取欲評分之學生姓名: <select style="width:150px;height:30px;font-size:8;" name="dropdown" >;

		<option value="default" name = "student_list">請選擇</option>;

		 <?php 	
		 	
		 	//下拉式選單
			 while ( $row['Sname'] = mysql_fetch_assoc($result))
			 {
			 	$row['Sid'] = mysql_fetch_assoc($result1);
			 	foreach($row['Sid'] as $value){
			 		foreach($row['Sname'] as $name){
			 			echo "<option value='$value'>$name </option>";
			 		}	
			 	}	
			 }	

		 ?>
		</select><input type="button" name="load_weight" id="load_weight" value="讀取上次權重" style="width:150px;height:30px;font-size:20px" onclick="setValue(); eval_score();"></input>

		<?php 	// 評完分
			if(mysql_num_rows($result)<1) 
			{
				echo "全部學生都已經評分完畢，請按上一頁返回";
			}

		?>
		</div>
		<p>

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
					<td><center><input type="text" name="w1_1" id="w1_1" value="5" class="short_textbox" onchange="eval_score()">  % </center></td>     
					<td><center><input type="text" name="s1_1" id="s1_1" value="" class="long_textbox" onchange="eval_score()" placeholder="0 ~ 100"></center></td>
				</tr>

				<tr>
					<td>2.使用電腦與網際網路能力</td>    
					<td><center><input type="text" name="w1_2" id="w1_2" value="5" class="short_textbox" onchange="eval_score()">  % </center></td>     
					<td><center><input type="text" name="s1_2" id="s1_2" value="" class="long_textbox" onchange="eval_score()" ></center></td>
				</tr>

				<tr>
					<td>3.具運用數學的方法解決電子工程相關方面問題之能力</td>
					<td><center><input type="text" name="w1_3" id="w1_3" value="5" class="short_textbox" onchange="eval_score()">  % </center></td>     
					<td><center><input type="text" name="s1_3" id="s1_3" value="" class="long_textbox" onchange="eval_score()" ></center></td>
				</tr>

				<tr>
					<td>4.具專題製作及撰寫報告之能力</td>    
					<td><center><input type="text" name="w1_4" id="w1_4" value="5" class="short_textbox" onchange="eval_score()">  % </center></td>     
					<td><center><input type="text" name="s1_4" id="s1_4" value="" class="long_textbox" onchange="eval_score()"　></center></td>
				</tr>

				<tr>
					<td>5.具有良好的外語能力</td>    
					<td><center><input type="text" name="w1_5" id="w1_5" value="5" class="short_textbox" onchange="eval_score()">  % </center></td>     
					<td><center><input type="text" name="s1_5" id="s1_5" value="" class="long_textbox" onchange="eval_score()" ></center></td>
				</tr>
			
				<tr align="right">
					<td><font font size="5" color="#FF0000">小計</font></td>	
					<td></td>  
					<td><font font size="5" color="#FF0000"> <span  id="tmp_weight1"> </span>%</font></td>	
					<td><font font size="5" color="#FF0000"><span id="tmp_score1"> </span>分</font></td>  
				</tr>
			

				<!--以下專業核心能力-->
				<tr>
					<td rowspan="10" align="center">專業核心能力</td>    
					<td>1.設計電子電路能力</td>  
					<td><center><input type="text" name="w2_1" id="w2_1" value="5" class="short_textbox" onchange="eval_score()">  % </center></td>     
					<td><center><input type="text" name="s2_1" id="s2_1" value="" class="long_textbox" onchange="eval_score()"></center></td>
				</tr>

				<tr>
					<td>2.程式設計能力</td>    
					<td><center><input type="text" name="w2_2" id="w2_2" value="5" class="short_textbox" onchange="eval_score()">  % </center></td>     
					<td><center><input type="text" name="s2_2" id="s2_2" value="" class="long_textbox" onchange="eval_score()"></center></td>
				</tr>

				<tr>
					<td>3.使用儀器與量測方法之能力</td>    
					<td><center><input type="text" name="w2_3" id="w2_3" value="5" class="short_textbox" onchange="eval_score()">  % </center></td>     
					<td><center><input type="text" name="s2_3" id="s2_3" value="" class="long_textbox" onchange="eval_score()"></center></td>
				</tr>

				<tr>
					<td>4.嵌入式系統之設計能力</td>    
					<td><center><input type="text" name="w2_4" id="w2_4" value="5" class="short_textbox" onchange="eval_score()">  % </center></td>     
					<td><center><input type="text" name="s2_4" id="s2_4" value="" class="long_textbox" onchange="eval_score()"></center></td>
				</tr>

				<tr>
					<td>5.使用系統及元組件之能力</td>    
					<td><center><input type="text" name="w2_5" id="w2_5" value="5" class="short_textbox" onchange="eval_score()">  % </center></td>     
					<td><center><input type="text" name="s2_5" id="s2_5" value="" class="long_textbox" onchange="eval_score()"></center></td>
				</tr>

				<tr>
					<td>6.系統及元組件之設計能力</td>    
					<td><center><input type="text" name="w2_6" id="w2_6" value="5" class="short_textbox" onchange="eval_score()">  % </center></td>     
					<td><center><input type="text" name="s2_6" id="s2_6" value="" class="long_textbox" onchange="eval_score()"></center></td>
				</tr>

				<tr>
					<td>7.系統及元組件之製作能力</td>    
					<td><center><input type="text" name="w2_7" id="w2_7" value="5" class="short_textbox" onchange="eval_score()">  % </center></td>     
					<td><center><input type="text" name="s2_7" id="s2_7" value="" class="long_textbox" onchange="eval_score()"></center></td>
				</tr>

				<tr>
					<td>8.系統及元組件之模擬與分析能力</td>    
					<td><center><input type="text" name="w2_8" id="w2_8" value="5" class="short_textbox" onchange="eval_score()">  % </center></td>     
					<td><center><input type="text" name="s2_8" id="s2_8" value="" class="long_textbox" onchange="eval_score()"></center></td>
				</tr>

				<tr>
					<td>9.訊號分析處理與應用之能力</td>    
					<td><center><input type="text" name="w2_9" id="w2_9" value="5" class="short_textbox" onchange="eval_score()">  % </center></td>     
					<td><center><input type="text" name="s2_9" id="s2_9" value="" class="long_textbox" onchange="eval_score()"></center></td>
				</tr>

				<tr>
					<td>10.系統整合及測試之能力</td>    
					<td><center><input type="text" name="w2_10" id="w2_10" value="5" class="short_textbox" onchange="eval_score()">  % </center></td>     
					<td><center><input type="text" name="s2_10" id="s2_10" value="" class="long_textbox" onchange="eval_score()"></center></td>
				</tr>
			
				<tr align="right">
					<td><font font size="5" color="#FF0000">小計</font></td>	
					<td></td>  
					<td><font font size="5" color="#FF0000"> <span  id="tmp_weight2"> </span>%</font></td>	
					<td><font font size="5" color="#FF0000"><span id="tmp_score2"> </span>分</font></td>  
				</tr>
				


				<!--以下應用能力-->
				<tr>
					<td rowspan="6" align="center">應用能力</td>    
					<td>1.具熟悉溝通、協調專業知識之要領</td>  
					<td><center><input type="text" name="w3_1" id="w3_1" value="5" class="short_textbox" onchange="eval_score()">  % </center></td>     
					<td><center><input type="text" name="s3_1" id="s3_1" value="" class="long_textbox" onchange="eval_score()"></center></td>
				</tr>

				<tr>
					<td>2.具專業閱讀與手冊查閱能力</td>    
					<td><center><input type="text" name="w3_2" id="w3_2" value="4" class="short_textbox" onchange="eval_score()">  % </center></td>     
					<td><center><input type="text" name="s3_2" id="s3_2" value="" class="long_textbox" onchange="eval_score()"></center></td>
				</tr>

				<tr>
					<td>3.具工作安全與衛生知識</td>    
					<td><center><input type="text" name="w3_3" id="w3_3" value="4" class="short_textbox" onchange="eval_score()">  % </center></td>     
					<td><center><input type="text" name="s3_3" id="s3_3" value="" class="long_textbox" onchange="eval_score()"></center></td>
				</tr>

				<tr>
					<td>4.具相關法規常識</td>    
					<td><center><input type="text" name="w3_4" id="w3_4" value="4" class="short_textbox" onchange="eval_score()">  % </center></td>     
					<td><center><input type="text" name="s3_4" id="s3_4" value="" class="long_textbox" onchange="eval_score()"></center></td>
				</tr>

				<tr>
					<td>5.了解產業發展概況</td>    
					<td><center><input type="text" name="w3_5" id="w3_5" value="4" class="short_textbox" onchange="eval_score()">  % </center></td>     
					<td><center><input type="text" name="s3_5" id="s3_5" value="" class="long_textbox" onchange="eval_score()"></center></td>
				</tr>

				<tr>
					<td>6.具專利文件閱讀能力</td>    
					<td><center><input type="text" name="w3_6" id="w3_6" value="4" class="short_textbox" onchange="eval_score()">  % </center></td>     
					<td><center><input type="text" name="s3_6" id="s3_6" value="" class="long_textbox" onchange="eval_score()"></center></td>
				</tr>
				
				<tr align="right">
					<td><font font size="5" color="#FF0000">小計</font></td>	
					<td></td>  
					<td><font font size="5" color="#FF0000"> <span  id="tmp_weight3"> </span>%</font></td>	
					<td><font font size="5" color="#FF0000"><span id="tmp_score3"> </span>分</font></td>
				</tr>
				
				<!--總分-->
				 <tr align="right">
					<td colspan="2"><font color="red" font size="5">總分(以84分為上限)</font></td> 
					<td><font font size="5" color="#FF0000"> <span  id="total_weight" > </span>%</font></td>	
					<td><font font size="5" color="#FF0000"><span id="total_score" > </span>分</font></td>
				</tr>

			</table>
			<!--以上table-->

			<div style="margin-left:10%">
			請依實際的專題製作內容調整各指標之權重 (預設為4~5%)，<font color = 'red'>總分數請勿超過84分。</font>
			已經提列優異專題的同學，則以<font color = 'blue'>委員會所評定的分數</font>填列。
			</div>
			<br/>
			<center>
				<input type="submit" name="submit" value="填寫完畢" onclick="check()" style="width:120px;height:40px;font-size:20px" >
				<input type="reset"  name="reset" value="重新填寫" style="width:120px;height:40px;font-size:20px">
				<br/><br/>
			</center>

		</form>
		<!--以上form-->	
		
	</body>
</html>