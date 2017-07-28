<?php include("global.php"); ?>
<html>
<head>
    <title>電子工程系實務專題題目</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link rel=stylesheet type="text/css" href="style.css">
</head>
 
<body bgcolor="#ffffcc" style="font-family:Microsoft JhengHei;">

<?php
    if(!isset($_SESSION)){
        session_start();
    }
    else echo "no session";
?>

<?php
        if (!$link)  die('Not connected : ' . mysql_error());
        
        $query = "  SELECT username,name_ch
                    FROM faculty
                 ";
        $result = mysql_query($query,$link);
?>

<h2 align="center">電子工程系實務專題題目</h2>

<!--以下form-->
<form id="form1″ name="form1″ method="post" action="back_project_topic_check.php">
    <!--以下table-->
    <table border="1" align="center" width="80%"  cellpadding="3">  <!-- edge width = 1 -->
    
    <!--select teacher name-->
    <tr>
        <td align="center">老師姓名</td>
        <td>  
            <select style="width:150px;height:30px;font-size:20px;" name="dropdown" >;  
                <option value='default'>請選擇</option>
                 <?php 
                     while ( $row = mysql_fetch_array($result))
                     {
                        echo "<option value=$row[0]>"; 
                        echo $row[1]; 
                        echo "</option>"; 
                     }
                 ?>
                </select>
        </td>
    </tr>


    <!--select year-->
    <tr>
        <td align="center">年度</td>
        <td>  
            <select style="width:150px;height:30px;font-size:20px;" name="which_year" >;  
                <option value = 'default'>請選擇</option>
                <option value = "<?php echo ($now_year-1); ?>"><?php echo ($now_year-1)?></option>
　              <option value = "<?php echo ($now_year); ?>"><?php echo $now_year ?></option>
            </select>
        </td>
    </tr>
    <!--select semester-->
    <tr>
        <td align="center">學期</td>
        <td>  
            <select style="width:150px;height:30px;font-size:20px;" name="which_semester" >;  
                <option value = 'default'>請選擇</option>
                <option value = "1">1</option>
　              <option value = "2">2</option>
            </select>
        </td>
    </tr>

    <!-- select category -->
    <tr>
        <td align="center">專題類別</td>
        <td>
            <input type="checkbox" value="計算機軟體" name="category_1">計算機軟體&nbsp;&nbsp;    <!--&nbsp;為空白-->
            <input type="checkbox" value="計算機硬體" name="category_2">計算機硬體<br/>
            <input type="checkbox" value="數位訊號處理" name="category_3">數位訊號處理
            <input type="checkbox" value="電力電子" name="category_4">電力電子<br/>
            <input type="checkbox" value="嵌入式系統" name="category_5">嵌入式系統&nbsp;&nbsp;
            <input type="checkbox" value="微波" name="category_6">微波<br/>
            <input type="checkbox" value="通訊" name="category_7">通訊&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="checkbox" value="元件及材料" name="category_8">元件及材料<br/>
            <input type="checkbox" value="光電" name="category_9">光電&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="checkbox" value="網路系統" name="category_10">網路系統<br/>
            <input type="checkbox" value="VLSI" name="category_11">VLSI<br/>
            <input type="checkbox" value="其他" name="category_12">其他(請輸入)&nbsp;<input type="text" name="other">
        </td> 
    </tr>

    <!--input project name-->
    <tr>
        <td align="center">專題名稱</td>
        <td><input cols="100" rows="5" name="topic"></input></td>  
    </tr>

    <!--input project name-->
    <tr>
        <td align="center">內容概述</td>
        <td><textarea type="text" name="textarea_1"></textarea></td>  
    </tr>

    <!--input condition-->
    <tr>
        <td align="center">參加者須具備之條件</td>
        <td><textarea cols="100" rows="5" name="textarea_2"></textarea></td>
    </tr>

    <!--input num of student-->
    <tr>
        <td align="center">參加人數之限制</td>
        <td><input type="text" name="textarea_3"></input></td>
        <!--下拉式選單-->
        <!--
        <td>
            <select name="YourLocation">
                <option value="1">1人</option>
                <option value="2">2人</option>
                <option value="3">3人</option>
            </select>
        -->
        </td>
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