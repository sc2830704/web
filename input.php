<?php
	header("Content-Type:text/html; charset=utf-8");
	include("global.php");
	if (!$link) {
		die('Not connected : ' . mysql_error());
	}
	$query_tname='SELECT username,name_ch FROM faculty';
	//$query_tname='SELECT * FROM Teacher WHERE tname!=\'\' ORDER BY Teacher.Group ASC,Teacher.tname DESC';
	$result = mysql_query($query_tname);
	$count_teacher=0;
	while($row = mysql_fetch_array($result)){
		$tid[$count_teacher] = $row[0];
		$tname[$count_teacher] = $row[1];
		$count_teacher++;
		
	}
	
	
?>
<html>
	<head>
		<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/pure-min.css">
		<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
		<script language="javascript">
                    function chose_teacher()
                    {
						var selectTeacher = document.getElementById("tid");
						var selectSemester = document.getElementById("semester");
						var tid = selectTeacher.options[selectTeacher.selectedIndex].value;
						var semester = selectSemester.options[selectSemester.selectedIndex].value;
						//移除原本select中的option
								var mySelect = document.getElementById("pname");
								for (i=mySelect.options.length; i>0; i--)
								{   //倒過來移除 options
									//if (mySelect.options[i].selected)
											mySelect.remove(i);
								}
						$.post(
							"get_teacher.php",
							"tid="+tid+"&semester="+semester,
							function(responseStr){
								//document.getElementById("p1").innerHTML=responseStr;
								var res = $.parseJSON(responseStr);
								//alert(res[0]+'12'+res[1]);
								
								//根據專題去增加select中的option
								res.forEach(add_prj_option);
							}
						);
                    }
					function chose_semester(){
						//將選擇老師的selector切換成'請選擇' 
						var tea_selector= document.getElementById("tid");					
						tea_selector.options[0].selected=true;
						
						//將選擇prj_selector中的option清除
						var prj_selector = document.getElementById("pname");
						for (i=prj_selector.options.length-1; i>0; i--)
						{   
							prj_selector.remove(i);
						}
						
						
					}					
					function add_prj_option(item,index)
					{
						//先用getElementById取得select的id
						var prj_selector = document.getElementById('pname');
						//根據item新建立option物件
						var new_option = new Option(item);
						//將option加入prj_selector中
						prj_selector.options.add(new_option);
					}
					function faild(){
						alert(新增失敗);
					}
					
					function done(){
						alert(新增成功);
					}
											
                        
        </script>
	</head>
	
	<body>
		<form  class="pure-form" align="center" method="post" action="add_workproject.php" >
			<fieldset>
				<legend>輸入專題資料</legend>
				
					<!--選擇指導學年度下拉選單-->
					<div class="pure-u-1 pure-u-md-1-3">
						<label for="semester" >學年度   </label>
						<select name="semester" id="semester" onChange="chose_semester()">
							<option value='<?php echo($now_year-1).'1';?>'><?php echo($now_year-1).'1';?></option>
							<option value='<?php echo($now_year-1).'2';?>'><?php echo($now_year-1).'2';?></option>
							<option value='<?php echo($now_year).'1';?>'><?php echo($now_year).'1';?></option>
							<option value='<?php echo($now_year).'2';?>'><?php echo($now_year).'2';?></option>
							<!--<option value='1052'>1052</option>-->
						</select>
					</div>
					</br>
					
					<!--選擇指導老師的下拉選單，選擇會透過jquery去拿到老師的專題，改變專題下拉選單的內容-->
					<div class="pure-u-1 pure-u-md-1-3">
						<label for="tname" >指導老師 </label>
						<select name="tid" id="tid"  onChange="chose_teacher()">
							<option>請選擇</option>
							<?php 
								for($i=0;$i<$count_teacher;$i++){
									echo '<option value='.$tid[$i].'>'.$tname[$i].'</option>';
								}
							?>
						</select>
					</div>
					</br>
					<!--選擇專題下拉選單-->
					<div >
						<label for="pname" >專題名稱 </label>
						<select name="pname" id="pname" >
							<option>請選擇</option>
						</select>
					</div>
					</br>
					
					<div>
						<p>
							<label for="sname">學生姓名</label>
							<input name="sname[]" type="text">
							<label for="sname">學生姓名</label>
							<input name="sname[]" type="text">	
							<label for="sname">學生姓名</label>
							<input name="sname[]" type="text">
						</p>
						</br>
						<p>
							<label for="sid">學號</label>
							<input name="sid[]" type="text">		
							<label for="sid">    學號</label>
							<input name="sid[]" type="text">
							<label for="sid">    學號</label>
							<input name="sid[]" type="text">
						</p>
					</div>
					
				   
				</br>
				<button type="submit" class="pure-button pure-button-primary" >提交</button>
			</fieldset>
		</form>
		<div align="center"><a type="button" href="back_main.php" class="pure-button pure-button-primary">回主選單</a></div>
	
	</body>
</html>