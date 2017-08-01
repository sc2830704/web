﻿<?php

if(!isset($_SESSION)){
    session_start();
}

include("global.php");

//declare variable
if ( isset($_POST['category_1']))  $category_1= (string)$_POST['category_1'].","; else $category_1="";
if ( isset($_POST['category_2']))  $category_2= (string)$_POST['category_2'].","; else $category_2="";
if ( isset($_POST['category_3']))  $category_3= (string)$_POST['category_3'].","; else $category_3="";
if ( isset($_POST['category_4']))  $category_4= (string)$_POST['category_4'].","; else $category_4="";
if ( isset($_POST['category_5']))  $category_5= (string)$_POST['category_5'].","; else $category_5="";
if ( isset($_POST['category_6']))  $category_6= (string)$_POST['category_6'].","; else $category_6="";
if ( isset($_POST['category_7']))  $category_7= (string)$_POST['category_7'].","; else $category_7="";
if ( isset($_POST['category_8']))  $category_8= (string)$_POST['category_8'].","; else $category_8="";
if ( isset($_POST['category_9']))  $category_9= (string)$_POST['category_9'].","; else $category_9="";
if ( isset($_POST['category_10'])) $category_10= (string)$_POST['category_10'].","; else $category_10="";
if ( isset($_POST['category_11']))  $category_11= (string)$_POST['category_11'].","; else $category_11="";
if ( isset($_POST['category_12']))  $category_12= (string)$_POST['category_12'].","; else $category_12="";
if ( isset($_POST['other']))  $other= (string)$_POST['other']; else $other="";

$topic = $_POST['topic'];
$description = $_POST['textarea_1'];
$factor = $_POST['textarea_2'];
$num_of_member = $_POST['textarea_3'];
$teacher_id = $_POST['dropdown'];

// 防未填寫
if($which_year=='default'){
    echo "年份未填";
    exit;
}    
else $which_year = $_POST['which_year'];

if($now_semester=='default'){
    echo "學期未填";
    exit;
}    
else $now_semester = $_POST['which_semester'];
$semester = $which_year.$now_semester;
  
//query Teacher Name
$query_Tname = "SELECT faculty.name_ch
                FROM faculty
                WHERE faculty.username='{$teacher_id}'";
$result_query_Tname = mysql_query($query_Tname,$link);
while ( $row1 = mysql_fetch_array($result_query_Tname)){
   $Tname = $row1['name_ch']; 
} 

?>

<html>
<head>
    <title>電子工程系實務專題題目</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link rel=stylesheet type="text/css" href="style.css">
</head>
 
<body bgcolor="#ffffcc" style="font-family: Microsoft JhengHei ;">

<h2 align="center">電子工程系實務專題題目</h2>

<!--以下form-->
<form id="form1″ name="form1" method="post" action="topic_check.php">
    <!--以下table-->
    <table border="1" align="center" width="80%"  cellpadding="3"> 
    <tr>
        <td align="center">老師姓名</td>
        <td align="center"><?php echo $Tname; ?></td> 
    </tr>
    <tr>
        <td align="center">專題名稱</td>
        <td><?php echo $topic; ?></td>  
    </tr>
    <tr>
        <td align="center">專題類別</td>
        <td>
            <?php
                //輸出勾選項目
                echo $category_1;    if ( isset($_POST['category_1'])) echo '<br>';
                echo $category_2;    if ( isset($_POST['category_2'])) echo '<br>';
                echo $category_3;    if ( isset($_POST['category_3'])) echo '<br>';
                echo $category_4;    if ( isset($_POST['category_4'])) echo '<br>';
                echo $category_5;    if ( isset($_POST['category_5'])) echo '<br>';
                echo $category_6;    if ( isset($_POST['category_6'])) echo '<br>';
                echo $category_7;    if ( isset($_POST['category_7'])) echo '<br>';
                echo $category_8;    if ( isset($_POST['category_8'])) echo '<br>';
                echo $category_9;    if ( isset($_POST['category_9'])) echo '<br>';
                echo $category_10;   if ( isset($_POST['category_10'])) echo '<br>';
                echo $category_11;   if ( isset($_POST['category_11'])) echo '<br>';
                echo $category_12;   if ( isset($_POST['category_12'])) echo '<br>';
                if ( !empty($_POST['other'])) echo ':'.$other;
            ?>
        </td> 
    </tr>
    <tr>
        <td align="center">內容概述</td>
        <td><?php echo $_POST['textarea_1']; ?></td>  
    </tr>
    <tr>
        <td align="center">參加者須具備之條件</td>
        <td><?php echo $_POST['textarea_2']; ?></td>
    </tr>
    <tr>
        <td align="center">參加人數之限制</td>
        <td><?php echo $_POST['textarea_3']; ?></td>
        </td>
    </tr>
    </table>
    <!--以上table-->
    <br/>
    <center>
        <a href = "back_project_query.php?Tid=<?php echo $teacher_id ;?>&Tname=<?php echo $Tname ;?>&Sid=<?php echo $Sid ;?>&topic=<?php echo $topic; ?>&category_1=<?php echo $category_1; ?>&category_2=<?php echo $category_2; ?>&category_3=<?php echo $category_3; ?>&category_4=<?php echo $category_4; ?>&category_5=<?php echo $category_5; ?>&category_6=<?php echo $category_6; ?>&category_7=<?php echo $category_7; ?>&category_8=<?php echo $category_8; ?>&category_9=<?php echo $category_9; ?>&category_10=<?php echo $category_10; ?>&category_11=<?php echo $category_11; ?>&category_12=<?php echo $category_12; ?>&other=<?php echo $other; ?>&description=<?php echo $description; ?>&factor=<?php echo $factor; ?>&num_of_member=<?php echo $num_of_member; ?>&semester=<?php echo $semester; ?>">
            <input type="button" value="點選後送出" name="Button1" style="width:120px;height:40px;font-size:20px">
        </a>

        <!--back to back_project_topic page--> 
        <a href="/et/admin/back_project_topic.php"><input type="button" value="返回以修改" onclick="history.back()" name="Button2" style="width:120px;height:40px;font-size:20px"></a>   <!--返回上一頁以修改-->
        <br/><br/>
    </center>

</form>
<!--以上form-->

</body>
 
</html>
