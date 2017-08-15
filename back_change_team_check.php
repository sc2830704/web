<?php

if(!isset($_SESSION)){
    session_start();
}

include("global.php");
$NewTeaID = $_POST['TeacherName'];
$StuID = $_POST['StudentID'];

# ------------query StuName, OldTeaID-------------#

$sql1 = "SELECT *
		FROM student
		WHERE Sid = '$StuID'";
$result1 = mysql_query($sql1,$link);

if (mysql_num_rows($result1) == 0) { 	# Check stuID 
	echo "學號輸入錯誤"; 
	exit; 
} 
while ( $row = mysql_fetch_array($result1)){
	$StuName = $row[1]; 
	$OldTeaID = $row[2];
}

# ------------query OldTeaName-------------#

$sqlOldTname = "SELECT *
		FROM faculty
		WHERE username = '$OldTeaID'";
$result2 = mysql_query($sqlOldTname,$link);
while ( $row = mysql_fetch_array($result2)){
	$OldTeaName = $row[4];
}

# ------------query OldTeaName-------------#

$sqlNewTname = "SELECT *
		FROM faculty
		WHERE username = '$NewTeaID'";
$result3 = mysql_query($sqlNewTname,$link);

if (mysql_num_rows($result3) == 0) { 	# Check NewTeaID 
	echo "未選擇指導教授"; 
	exit; 
} 

while ( $row = mysql_fetch_array($result3)){
	$NewTeaName = $row[4];
}

# ------------query NewPrjName-------------#

$sqlNewTeaProject = "SELECT DISTINCT Pid
		FROM working_project
		WHERE Tid = '$NewTeaID'";
$result4 = mysql_query($sqlNewTeaProject,$link);

?>

<script language="JavaScript">

// check choosing prj
function check(){ 

	if(document.form1.NewPrj.value == "default") {
        alert("未選擇專題");
        return false;
	} 
	else {
    	var form1 = document.getElementById("form1");
		form1.submit();
	}
}

</script>

<html>
<head>
    <title>學生換組作業</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link rel=stylesheet type="text/css" href="style.css">
</head>

<body bgcolor="#ffffcc" style="font-family:Microsoft JhengHei;">
<h2 align="center">學生換組作業</h2>

<form id="form1" name="form1" method="post" action="back_change_team_query.php">
    <!--以下table-->
    <table border="1" align="center" width="80%"  cellpadding="2">  <!-- edge width = 1 -->
    
    <tr>
        <td align="center">欲換組的學生</td>
        <td><?php echo $StuName;?></td>
    </tr>

    <tr>
        <td align="center">學生學號</td>
        <td><?php echo $StuID;?></td>
    </tr>

    <tr>
        <td align="center">更換前之老師</td>
        <td><?php echo $OldTeaName;?></td>
    </tr>

    <tr>
        <td align="center">更換後之老師</td>
        <td><?php echo $NewTeaName;?></td>
    </tr>

    <tr>
		<td align="center">更換之專題名稱</td>
        <td><select style="width:450px;height:30px;font-size:20px;" name="NewPrj" id = "NewPrj">	<!--選擇教授選單-->
        <option value='default'>請選擇</option>
        <?php 
			 while ( $row = mysql_fetch_array($result4))
			 {
				$NewTeaProject = $row[0];
				echo "<option value=$NewTeaProject>"; 
				echo $NewTeaProject;
				echo "</option>"; 
			 }
		 ?>
		 </select>	
		 </td>
	</tr>
	</table>

<center><button type="submit" name="submit" onclick="return check()" style="width:120px;height:40px;font-size:20px">確定</button></center>
</form>

<?php

# ------------saving information of query in session------------#
$_SESSION['NewTeaID'] = $NewTeaID;
$_SESSION['StuName'] = $StuName;
$_SESSION['StuID'] = $StuID;
$_SESSION['NewTeaName'] = $NewTeaName;

?>

</body>
</html>