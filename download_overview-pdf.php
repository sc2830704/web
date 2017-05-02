<?php

include("global.php");
require_once('../TCPDF-master/tcpdf.php');
if(isset($_GET['semester'])){
	$semester = $_GET['semester'];
}else{
	$semester = $year_semester;
}
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetPrintHeader(false);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/../TCPDF-master/examples/lang/eng.php')) {
 require_once(dirname(__FILE__).'/../TCPDF-master/examples/lang/eng.php');
 $pdf->setLanguageArray($l);
}

// set font
$pdf->SetFont('helvetica', 'B', 20);

// add a page
$pdf->AddPage();
//query project
$query_workprj = 
"SELECT DISTINCT Semester,Working_project.Group,Working_project.No,Working_project.Pid FROM Working_project WHERE Semester='$semester' ORDER BY Working_project.No";
$result = mysql_query($query_workprj);
$count = 0;
$table_data;
while($row = mysql_fetch_array($result)){
	$semes[$count] = $row[0];
	$class[$count] = $row[1];
	$no[$count] = $row[2];
	$group[$count] = $row[0].$row[1].$row[2];
	$topic[$count] = $row[3];
	$count++;
}
for($i=0;$i<sizeof($topic);$i++){
	//query 每一個group的組員
	$query_student = "SELECT Student.Sid,Sname,faculty.name_ch FROM Student,Working_project,faculty 
	WHERE Working_project.Sid=Student.Sid 
	AND Working_project.Semester='$semes[$i]' 
	AND Working_project.Group = '$class[$i]'
	AND Working_project.No = '$no[$i]'
	AND faculty.username=Student.Tid"; 
	$result = mysql_query($query_student);
	$count = 0;
	$std=array(); //清空std
	//依序將query到的組員顯示再table的同一個row中
	while($row = mysql_fetch_array($result)){
		$sid[$count] = $row[0];
		$sname[$count] = $row[1];
		$std[$count] = $row[0].' '.$row[1];
		$tname = $row[2];
		$count ++;
	}
	if(empty($std[0])) $std[0]='-';
	if(empty($std[1])){$std[1]='-';};
	if(empty($std[2])){$std[2]='-';};
	$table_data = $table_data . "<tr>
     		<td width=\"100\">{$topic[$i]}</td>
     		<td width=\"100\">{$group[$i]}</td>
     		<td width=\"100\">{$std[0]}</td>
     		<td width=\"100\">{$std[1]}</td>
     		<td width=\"100\">{$std[2]}</td>
     		<td width=\"100\">{$tname}</td>
	 	</tr>";
	
		
}

	// add a page
	// only print on first page

	$pdf->SetTitle('台灣科技大學電子系'.$semester.'年度專題一覽表');
	// set font
	$pdf->SetFont('msungstdlight', '', 25);
	$txt = '台灣科技大學電子系'.$semester.'年度專題一覽表';
	$pdf->Write(0, $txt, '', 0, 'L', true, 0, false, false, 0);
	$pdf->SetFont('msungstdlight', '', 16);
	//html
	$txt = "<br/>";
	$pdf->writeHTML($txt, true, false, false, false, '');
	$pdf->SetFont('msungstdlight', '', 10);

	
	$tbl = 
	"
	<table border=\"1\" align=\"center\" width=\"80%\" cellpadding=\"3\">
		<tr>
			<th width=\"100\">專題題目</th>
			<th width=\"100\">組別</th>
			<th width=\"100\">組員1</th>
			<th width=\"100\">組員2</th>
			<th width=\"100\">組員3</th>
     		<th width=\"100\">指導老師</th>
		</tr>
	". $table_data .
	" 	
	</table>
	<br/><br/>
	";
	$pdf->writeHTML($tbl, true, false, false, false, '');



$file_name = $semester.'年度專題一覽表.pdf';
ob_end_clean();
$pdf->Output($file_name,'I')


?>