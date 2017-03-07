<?php

function Error_remind()
{
    echo ('
            <body bgcolor="#ffffcc" style="font-family:Microsoft JhengHei;">
                <a href="http://localhost/score_evaluate.php"><input type="button" value="返回" onclick="history.back()" name="Button2" style="width:120px;height:40px;font-size:20px"></a>
            </body>
        ');
    exit;
}

if(!isset($_SESSION))  session_start();
else echo "NO SESSION";

include("global.php");
//declare variable
$score1_1= (int)$_POST['s1_1'];
$score1_2= (int)$_POST['s1_2'];
$score1_3= (int)$_POST['s1_3'];
$score1_4= (int)$_POST['s1_4'];
$score1_5= (int)$_POST['s1_5'];
$score2_1= (int)$_POST['s2_1'];
$score2_2= (int)$_POST['s2_2'];
$score2_3= (int)$_POST['s2_3'];
$score2_4= (int)$_POST['s2_4'];
$score2_5= (int)$_POST['s2_5'];
$score2_6= (int)$_POST['s2_6'];
$score2_7= (int)$_POST['s2_7'];
$score2_8= (int)$_POST['s2_8'];
$score2_9= (int)$_POST['s2_9'];
$score2_10= (int)$_POST['s2_10'];
$score3_1= (int)$_POST['s3_1'];
$score3_2= (int)$_POST['s3_2'];
$score3_3= (int)$_POST['s3_3'];
$score3_4= (int)$_POST['s3_4'];
$score3_5= (int)$_POST['s3_5'];
$score3_6= (int)$_POST['s3_6'];

$weight1_1= (int)$_POST['w1_1']*0.01;
$weight1_2= (int)$_POST['w1_2']*0.01;
$weight1_3= (int)$_POST['w1_3']*0.01;
$weight1_4= (int)$_POST['w1_4']*0.01;
$weight1_5= (int)$_POST['w1_5']*0.01;
$weight2_1= (int)$_POST['w2_1']*0.01;
$weight2_2= (int)$_POST['w2_2']*0.01;
$weight2_3= (int)$_POST['w2_3']*0.01;
$weight2_4= (int)$_POST['w2_4']*0.01;
$weight2_5= (int)$_POST['w2_5']*0.01;
$weight2_6= (int)$_POST['w2_6']*0.01;
$weight2_7= (int)$_POST['w2_7']*0.01;
$weight2_8= (int)$_POST['w2_8']*0.01;
$weight2_9= (int)$_POST['w2_9']*0.01;
$weight2_10= (int)$_POST['w2_10']*0.01;
$weight3_1= (int)$_POST['w3_1']*0.01;
$weight3_2= (int)$_POST['w3_2']*0.01;
$weight3_3= (int)$_POST['w3_3']*0.01;
$weight3_4= (int)$_POST['w3_4']*0.01;
$weight3_5= (int)$_POST['w3_5']*0.01;
$weight3_6= (int)$_POST['w3_6']*0.01;
$total_weight = (int)$_POST['w1_1']+(int)$_POST['w1_2']+(int)$_POST['w1_3']+(int)$_POST['w1_4']+(int)$_POST['w1_5']+(int)$_POST['w2_1']+(int)$_POST['w2_2']+(int)$_POST['w2_3']+(int)$_POST['w2_4']+(int)$_POST['w2_5']+(int)$_POST['w2_6']+(int)$_POST['w2_7']+(int)$_POST['w2_8']+(int)$_POST['w2_9']+(int)$_POST['w2_10']+(int)$_POST['w3_1']+(int)$_POST['w3_2']+(int)$_POST['w3_3']+(int)$_POST['w3_4']+(int)$_POST['w3_5']+(int)$_POST['w3_6'];

//------------以下防呆------------

//%數表格未填
if( (isset($_POST['w1_1'])||isset($_POST['w1_2'])||isset($_POST['w1_3'])||isset($_POST['w1_4'])||isset($_POST['w1_5'])||isset($_POST['w2_1'])||isset($_POST['w2_2'])||isset($_POST['w2_3'])||isset($_POST['w2_4'])||isset($_POST['w2_5'])||isset($_POST['w2_6'])||isset($_POST['w2_7'])||isset($_POST['w2_8'])||isset($_POST['w2_9'])||isset($_POST['w2_10'])||isset($_POST['w3_1'])||isset($_POST['w3_2'])||isset($_POST['w3_3'])||isset($_POST['w3_4'])||isset($_POST['w3_5'])||isset($_POST['w3_6']) )==False)
{
     echo '權重欄位未正確填寫，請點選以下按鈕返回<br>';
     Error_remind();
}

// incorrect total_weight
if($total_weight>100)
{
    echo '您的權重加總為：<font color="#FF0000">'. $total_weight . ' %</font><br>';
    echo '權重加總上限為：<font color="#FF0000">100 %</font><br>';
    echo '權重加總不正確，請點選以下按鈕返回<br>';
    Error_remind();
}
else if ($total_weight<100)
{
    echo '您的權重加總為：<font color="#FF0000">'. $total_weight . ' %</font><br>';
    echo '權重加總上限為：<font color="#FF0000">100 %</font><br>';
    echo '權重加總不正確，請點選以下按鈕返回<br>';
    Error_remind();
}

/*
//分數欄位未填
if( empty($_POST['s1_1'])||empty($_POST['s1_2'])||empty($_POST['s1_3'])||empty($_POST['s1_4'])||empty($_POST['s1_5'])||empty($_POST['s2_1'])||empty($_POST['s2_2'])||empty($_POST['s2_3'])||empty($_POST['s2_4'])||empty($_POST['s2_5'])||empty($_POST['s2_6'])||empty($_POST['s2_7'])||empty($_POST['s2_8'])||empty($_POST['s2_9'])||empty($_POST['s2_10'])||empty($_POST['s3_1'])||empty($_POST['s3_2'])||empty($_POST['s3_3'])||empty($_POST['s3_4'])||empty($_POST['s3_5'])||empty($_POST['s3_6']))
{
     echo '分數欄位未正確填寫，請返回上一頁<br>';
     exit;
}


//分數>100或<0

*/

//未選取欲評分學生
$dropdown = $_POST['dropdown'];
if($dropdown=="default")    
{
    echo '未選取欲評分學生，請點選以下按鈕返回<br>';
    Error_remind();
}

//------------以上防呆------------

//%數小計
$sum_p1 = ($weight1_1+$weight1_2+$weight1_3+$weight1_4+$weight1_5);
$sum_p2 = ($weight2_1+$weight2_2+$weight2_3+$weight2_4+$weight2_5+$weight2_6+$weight2_7+$weight2_8+$weight2_9+$weight2_10);
$sum_p3 = ($weight3_1+$weight3_2+$weight3_3+$weight3_4+$weight3_5+$weight3_6);

//分數小計
$sum_s1 = ($score1_1*$weight1_1+$score1_2*$weight1_2+$score1_3*$weight1_3+$score1_4*$weight1_4+$score1_5*$weight1_5);
$sum_s2 = ($score2_1*$weight2_1+$score2_2*$weight2_2+$score2_3*$weight2_3+$score2_4*$weight2_4+$score2_5*$weight2_5+$score2_6*$weight2_6+$score2_7*$weight2_7+$score2_8*$weight2_8+$score2_9*$weight2_9+$score2_10*$weight2_10);
$sum_s3 = ($score3_1*$weight3_1+$score3_2*$weight3_2+$score3_3*$weight3_3+$score3_4*$weight3_4+$score3_5*$weight3_5+$score3_6*$weight3_6);

//execute total_score
$total_s = ($score1_1*$weight1_1+$score1_2*$weight1_2+$score1_3*$weight1_3+$score1_4*$weight1_4+$score1_5*$weight1_5+$score2_1*$weight2_1+$score2_2*$weight2_2+$score2_3*$weight2_3+$score2_4*$weight2_4+$score2_5*$weight2_5+$score2_6*$weight2_6+$score2_7*$weight2_7+$score2_8*$weight2_8+$score2_9*$weight2_9+$score2_10*$weight2_10+$score3_1*$weight3_1+$score3_2*$weight3_2+$score3_3*$weight3_3+$score3_4*$weight3_4+$score3_5*$weight3_5+$score3_6*$weight3_6);
?>

<!--show table-->
<html>
<head>
    <title>實務專題評分表</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link rel=stylesheet type="text/css" href="style.css">
</head>
 
<body bgcolor="#ffffcc" style="font-family:Microsoft JhengHei;">

<h2 align="center">電子系 <?php echo $now_year  ?> 年第 <?php echo $now_semester ?> 學期實務專題評分表</h2>

<!--<div style="margin-left:170px">-->
<table border="1" align="center" width="80%"  cellpadding="1" s>
    <tr>
        <td align="center">指導老師</td>    <td align="center">專題題目</td>    <td align="center">組別</td>  <td align="center">學生姓名</td>     
    </tr>

    <?php
        $Sname = 'default';
        $query = "   SELECT faculty.name_ch, Working_project.Pid, Student.Sname
                     FROM faculty,Working_project,Student
                     WHERE Student.Tid = faculty.username AND Working_project.Sid = Student.Sid AND Student.Sid = '{$dropdown}' AND  Working_project.Sid = '{$dropdown}'";
        $result = mysql_query($query,$link);

        $query1 = "  SELECT Working_project.Semester,Working_project.Group,Working_project.No
                    FROM Working_project
                    WHERE Working_project.Sid = '{$dropdown}'";
        $result1 = mysql_query($query1,$link);

        while($row1 = mysql_fetch_array($result1))
        {
            $No = $row1[0].$row1[1].$row1[2];
        }
        
        while($row = mysql_fetch_array($result))
        {
            // print_r($row);
            echo '<tr>'.
              '<td align="center">'. $row[0]."教授" .'</td>'.
              '<td align="center">'. $row[1].'</td>'.
              '<td align="center">'. $No.'</td>';
             $Sname  = $row[2];
             $Sid = $dropdown;
        }
        if ($Sname == 'default') 
        {
            echo "沒有這位學生資料，請聯絡網頁負責人";
            exit;
        }    
        echo  '<td align="center">'.$Sname.'</td></tr>';
    ?>

</table>

<br/>

<table border="1" align="center" width="80%"  cellpadding="3">  <!--邊框的寬度=1像素-->
    <tr>
        <td align="center">分項</td>
        <td align="center">實務專題評量指標</td>
        <td align="center">權重<br/><font color="blue">(可自行調整)</font></td>
        <td align="center"><font color="red">此欄請老師評分<br/>(採百分制)</font></td>
    </tr>

    <tr>        
        <td rowspan="6" align="center">基礎能力</td>  
        <td>1.工具及設備使用之能力</td>
        <td><center><?php echo $_POST['w1_1']  ?> % </center></td>     
        <td><center><?php echo $_POST['s1_1']  ?></center></td>
    </tr>

    <tr>
        <td>2.使用電腦與網際網路能力</td>    
        <td><center><?php echo $_POST['w1_2']  ?> % </center></td>     
        <td><center><?php echo $_POST['s1_2']  ?></center></td>
    </tr>

    <tr>
        <td>3.具運用數學的方法解決電子工程相關方面問題之能力</td>
        <td><center><?php echo $_POST['w1_3']  ?> % </center></td>     
        <td><center><?php echo $_POST['s1_3']  ?></center></td>
    </tr>

    <tr>
        <td>4.具專題製作及撰寫報告之能力</td>    
        <td><center><?php echo $_POST['w1_4']  ?> % </center></td>     
        <td><center><?php echo $_POST['s1_4']  ?></center></td>
    </tr>

    <tr>
        <td>5.具有良好的外語能力</td>    
        <td><center><?php echo $_POST['w1_5']  ?> % </center></td>     
        <td><center><?php echo $_POST['s1_5']  ?></center></td>
    </tr>

    <tr bgcolor="#FFCCCC">
        <td align="right"><font color="blue">小計</font></td>    <td><center><?php echo $sum_p1*100  ?> % </center></td>  <td><center><?php echo $sum_s1  ?></center></td>     
    </tr>


    <!--以下專業核心能力-->
    <tr>
        <td rowspan="11" align="center">專業核心能力</td>    
        <td>1.設計電子電路能力</td>  
        <td><center><?php echo $_POST['w2_1']  ?> % </center></td>     
        <td><center><?php echo $_POST['s2_1']  ?></center></td>
    </tr>

    <tr>
        <td>2.程式設計能力</td>    
        <td><center><?php echo $_POST['w2_2']  ?> % </center></td>     
        <td><center><?php echo $_POST['s2_2']  ?></center></td>
    </tr>

    <tr>
        <td>3.使用儀器與量測方法之能力</td>    
        <td><center><?php echo $_POST['w2_3']  ?> % </center></td>     
        <td><center><?php echo $_POST['s2_3']  ?></center></td>
    </tr>

    <tr>
        <td>4.嵌入式系統之設計能力</td>    
        <td><center><?php echo $_POST['w2_4']  ?> % </center></td>     
        <td><center><?php echo $_POST['s2_4']  ?></center></td>
    </tr>

    <tr>
        <td>5.使用系統及元組件之能力</td>    
        <td><center><?php echo $_POST['w2_5']  ?> % </center></td>     
        <td><center><?php echo $_POST['s2_5']  ?></center></td>
    </tr>

    <tr>
        <td>6.系統及元組件之設計能力</td>    
        <td><center><?php echo $_POST['w2_6']  ?> % </center></td>     
        <td><center><?php echo $_POST['s2_6']  ?></center></td>
    </tr>

    <tr>
        <td>7.系統及元組件之製作能力</td>    
        <td><center><?php echo $_POST['w2_7']  ?> % </center></td>     
        <td><center><?php echo $_POST['s2_7']  ?></center></td>
    </tr>

    <tr>
        <td>8.系統及元組件之模擬與分析能力</td>    
        <td><center><?php echo $_POST['w2_8']  ?> % </center></td>     
        <td><center><?php echo $_POST['s2_8']  ?></center></td>
    </tr>

    <tr>
        <td>9.訊號分析處理與應用之能力</td>    
        <td><center><?php echo $_POST['w2_9']  ?> % </center></td>     
        <td><center><?php echo $_POST['s2_9']  ?></center></td>
    </tr>

    <tr>
        <td>10.系統整合及測試之能力</td>    
        <td><center><?php echo $_POST['w2_10']  ?> % </center></td>     
        <td><center><?php echo $_POST['s2_10']  ?></center></td>
    </tr>

    <tr bgcolor="#FFCCCC">
        <td align="right"><font color="blue">小計</font></td>     <td><center><?php echo $sum_p2*100  ?> % </center></td>  <td><center><?php echo $sum_s2  ?></center></td>         
    </tr>


    <!--以下應用能力-->
    <tr>
        <td rowspan="7" align="center">應用能力</td>    
        <td>1.具熟悉溝通、協調專業知識之要領</td>  
        <td><center><?php echo $_POST['w3_1']  ?> % </center></td>     
        <td><center><?php echo $_POST['s3_1']  ?></center></td>
    </tr>

    <tr>
        <td>2.具專業閱讀與手冊查閱能力</td>    
        <td><center><?php echo $_POST['w3_2']  ?> % </center></td>     
        <td><center><?php echo $_POST['s3_2']  ?></center></td>
    </tr>

    <tr>
        <td>3.具工作安全與衛生知識</td>    
        <td><center><?php echo $_POST['w3_3']  ?> % </center></td>     
        <td><center><?php echo $_POST['s3_3']  ?></center></td>
    </tr>

    <tr>
        <td>4.具相關法規常識</td>    
        <td><center><?php echo $_POST['w3_4']  ?> % </center></td>     
        <td><center><?php echo $_POST['s3_4']  ?></center></td>

    </tr>

    <tr>
        <td>5.了解產業發展概況</td>    
        <td><center><?php echo $_POST['w3_5']  ?> % </center></td>     
        <td><center><?php echo $_POST['s3_5']  ?></center></td>
        
    </tr>

    <tr>
        <td>6.具專利文件閱讀能力</td>    
        <td><center><?php echo $_POST['w3_6']  ?> % </center></td>     
        <td><center><?php echo $_POST['s3_6']  ?></center></td>
       
    </tr>

    <tr bgcolor="#FFCCCC">
        <td align="right"><font color="blue">小計</font></td>     <td><center><?php echo $sum_p3*100  ?> % </center></td>  <td><center><?php echo $sum_s3  ?></center></td>         
    </tr>

     <tr>
        <td colspan="3" align="right">總分<font color="red">(以84分為上限)</font></td>    <td><center><?php echo (string)$total_s  ?></center></td> 
    </tr>
    
    </table>

    <center>
        <br/>
        <a href="score_query.php?Sid=<?php echo $Sid ;?>&s1_1=<?php echo $score1_1; ?>&s1_2=<?php echo $score1_2; ?>&s1_3=<?php echo $score1_3; ?>&s1_4=<?php echo $score1_4; ?>&s1_5=<?php echo $score1_5; ?>&s2_1=<?php echo $score2_1; ?>&s2_2=<?php echo $score2_2; ?>&s2_3=<?php echo $score2_3; ?>&s2_4=<?php echo $score2_4; ?>&s2_5=<?php echo $score2_5; ?>&s2_6=<?php echo $score2_6; ?>&s2_7=<?php echo $score2_7; ?>&s2_8=<?php echo $score2_8; ?>&s2_9=<?php echo $score2_9; ?>&s2_10=<?php echo $score2_10; ?>&s3_1=<?php echo $score3_1; ?>&s3_2=<?php echo $score3_2; ?>&s3_3=<?php echo $score3_3; ?>&s3_4=<?php echo $score3_4; ?>&s3_5=<?php echo $score3_5; ?>&s3_6=
        <?php echo $score3_6; ?>&w1_1=<?php echo $weight1_1; ?>&w1_2=<?php echo $weight1_2; ?>&w1_3=<?php echo $weight1_3; ?>&w1_4=<?php echo $weight1_4; ?>&w1_5=<?php echo $weight1_5; ?>&w2_1=<?php echo $weight2_1; ?>&w2_2=<?php echo $weight2_2; ?>&w2_3=<?php echo $weight2_3; ?>&w2_4=<?php echo $weight2_4; ?>&w2_5=<?php echo $weight2_5; ?>&w2_6=<?php echo $weight2_6; ?>&w2_7=<?php echo $weight2_7; ?>&w2_8=<?php echo $weight2_8; ?>&w2_9=<?php echo $weight2_9; ?>&w2_10=<?php echo $weight2_10; ?>&w3_1=<?php echo $weight3_1; ?>&w3_2=<?php echo $weight3_2; ?>&w3_3=<?php echo $weight3_3; ?>&w3_4=<?php echo $weight3_4; ?>&w3_5=<?php echo $weight3_5; ?>&w3_6=<?php echo $weight3_6?>&total_s=<?php echo $total_s; ?>">
            <input type="button" value="點選後送出" name="Button1" style="width:120px;height:40px;font-size:20px;font-family:Microsoft JhengHei;">
        </a>    <!--點擊送出，以get方法傳送值給query.php-->

        <a href="http://localhost/table.html"><input type="button" value="返回以修改" onclick="history.back()" name="Button2" style="width:120px;height:40px;font-size:20px;font-family:Microsoft JhengHei;"></a>   <!--返回上一頁以修改-->
        <br/><br/>
    </center>

</form>
<!--以上form-->

</body>
 
</html>