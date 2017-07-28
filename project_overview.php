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
	$query_workprj = 
	"SELECT DISTINCT Semester,Working_project.Group,Working_project.No,Working_project.Pid FROM Working_project WHERE Semester='$semester' ORDER BY Working_project.Group, Working_project.No";
	$result = mysql_query($query_workprj);
	$count = 0;
	while($row = mysql_fetch_array($result)){
		$semes[$count] = $row[0];
		$class[$count] = $row[1];
		$no[$count] = $row[2];
		$group[$count] = $row[0].$row[1].$row[2];
		$topic[$count] = $row[3];
		$count++;
	}
	
	
}


?>

<html>
	<head>
		<meta http-equiv="Content-type" content="text/html" charset="utf-8">
		<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/pure-min.css">
		<link rel="stylesheet" type="text/css" href="http://www.jeasyui.com/easyui/themes/default/easyui.css">
		<link rel="stylesheet" type="text/css" href="http://www.jeasyui.com/easyui/themes/icon.css">
		<link rel="stylesheet" type="text/css" href="http://www.jeasyui.com/easyui/themes/color.css">
		<link rel="stylesheet" type="text/css" href="http://www.jeasyui.com/easyui/demo/demo.css">
		<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
		<script src="http://www.jeasyui.com/easyui/jquery.easyui.min.js"></script>
		<script language="javascript">
					function rename_prj(row,group){
						$.messager.prompt("修改專題名稱","請輸入新專題名稱",function(newname){
							var no = group.toString().substring(5,group.length);
							var semester = group.toString().substring(0,4);
							if(newname){
								$.post(
									"project_rename.php",
									"group="+group[4]+"&semester="+semester+"&no="+no+"&pid="+newname,
									function(responseStr){
										//document.getElementById("p1").innerHTML=responseStr;
										var res = $.parseJSON(responseStr);
										//alert(res[0]+'12'+res[1]);
										
										$.messager.alert("修改專題名稱",res);
										row.innerHTML = newname;
								});	
							}
							
						});
					}
					function delete_prj(group){
						var no = group.toString().substring(5,group.length);
						var semester = group.toString().substring(0,4);
						$.messager.confirm("確認?","確定刪除該專題?",function(t){
							if(t){
								$.post(
									"project_delete.php",
									"group="+group[4]+"&semester="+semester+"&no="+no,
									function(responseStr){
										//document.getElementById("p1").innerHTML=responseStr;
										var res = $.parseJSON(responseStr);
										//alert(res[0]+'12'+res[1]);
										
										$.messager.alert("修改專題名稱",res);
										setTimeout(function(){
											location.reload();
										},1000);
										
								});	
							}
							
						});
					}
					function chose_selected(index){
						//將選擇老師的selector切換成'請選擇' 
						var semester= document.getElementById("semester");					
						semester.options[index].selected=true;						
					}
                    function changeColor(row)
                    {
                        document.getElementById(row).style.backgroundColor='#CCCCFF';
                        cursor: hand;
                    }                        
                    function resetColor(row)
                    {
                        document.getElementById(row).style.backgroundColor='';
                    }
        </script>
	</head>
	<body>
	
		<div align="center">
			<h1>專題一覽</h1></br>
			<form class="pure-form pure-form-stacked" align="center" method="post" action="project_overview.php">
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
			<table id="table" class="pure-table">
				 <thead>
					<tr>
						<th>專題題目</th>
						<th>組別</th>
						<th>組員1</th>
						<th>組員2</th>
						<th>組員3</th>
						<th>指導老師</th>
						<th>刪除</th>
					</tr>
				</thead>
				<tbody>
					<?php 			
			
						for($i=0;$i<sizeof($group);$i++){
							
							//query 每一個group的組員
							$query_student = "SELECT Student.Sid,Sname,name_ch FROM Student,Working_project,faculty
							WHERE Working_project.Sid=Student.Sid 
							AND Working_project.Semester='$semes[$i]' 
							AND Working_project.Group = '$class[$i]'
							AND Working_project.No = '$no[$i]'
                            AND username = Student.Tid"; 
							$result = mysql_query($query_student);
							$count = 0;
							$sid=array();
							$sname=array();
							$tname=array();
							//依序將query到的組員顯示再table的同一個row中
							//新增query老師中文姓名
							while($row = mysql_fetch_array($result)){
								$sid[$count] = $row[0];
								$sname[$count] = $row[1];
								$tname = $row[2];
								$count++;
							}
							echo '<tr>
							<td STYLE="cursor:pointer;" id="row'.$i.'" onClick="rename_prj(row'.$i.',\''.$group[$i].'\')"
							onMouseOver="changeColor(\'row'.$i.'\')" onMouseOut="resetColor(\'row'.$i.'\')">'.$topic[$i].'</td> <td>'.$group[$i].'</td>' ;
							echo '<td>'.$sid[0].$sname[0].'</td>';
							
							echo '<td>';
							if(empty($sid[1])) {echo'-';}
							else {echo $sid[1].$sname[1];}
							echo '</td>';
							
							echo '<td>';
							if(empty($sid[2])) {echo'-';}
							else {echo $sid[2].$sname[2];}
							echo '</td>';
							
							echo '<td>';
							echo $tname;
							echo '</td>';
							echo '<td>';
							echo '<input  type="image"  name="submit_Btn" src="../image/delete.png"  onClick="delete_prj(\''.$group[$i].'\')" >';
							echo '</td>';
							
							echo '</tr>';
							
								
						}
					?>		
				</tbody>
			</table>
		</div>
		</br>
		<div align="center">
			<!--<a type="button" onClick="location.href='download_score-list.php?semester=<?php echo $semester;?>'" class="pure-button pure-button-primary">下載成績總覽表</a>-->
			<a type="button" onClick="location.href='download_overview.php?semester=<?php echo $semester;?>'" class="pure-button pure-button-primary">下載專題一覽表-EXCEL</a>
		</div>
		</br>
		<div align="center">
			<!--<a type="button" onClick="location.href='download_score-list.php?semester=<?php echo $semester;?>'" class="pure-button pure-button-primary">下載成績總覽表</a>-->
			<a type="button" onClick="location.href='download_overview-pdf.php?semester=<?php echo $semester;?>'" class="pure-button pure-button-primary">下載專題一覽表-PDF</a>
		</div>
		</br>
		<div align="center"><a type="button" href="back_main.php" class="pure-button pure-button-primary">回主選單</a></div>
		<?php
			echo "<script>chose_selected(1)</script>";
		?>
	</body>
</html>
