<?php
include("global.php");
require_once('../TCPDF-master/tcpdf.php');
$dropdown = $_POST['dropdown'];
$whichsemester = $_POST['which_year'];
$seme = substr($whichsemester,-1,1);
$year = substr($whichsemester,0,-1);

//query project
$query = "   SELECT *
             FROM Topics_Project
             WHERE Topics_Project.Tid='{$dropdown}' and Topics_Project.Semester='{$whichsemester}'";

// query teacher chinese name
$query1 = "	 SELECT name_ch
             FROM faculty
             WHERE faculty.username='{$dropdown}'";

$result = mysql_query($query,$link);
$num_rows = mysql_num_rows($result);
if ($num_rows==0)	die("該教授尚未輸入專題題目，請返回上一頁") ;

$result1 = mysql_query($query1,$link);
while ( $row1 = mysql_fetch_array($result1)) $Tname = $row1['name_ch'];

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

$i = 1;
while ( $row = mysql_fetch_array($result))
{	
	// add a page
	$pdf->AddPage();

	// only print on first page
	if($i==1)
	{
		$pdf->SetTitle($year.$seme.$Tname.'實務專題列表');
		// set font
		$pdf->SetFont('msungstdlight', '', 25);
		$txt = '電子系 '.$year.'年第 '.$seme.' 學期實務專題列表';
		$pdf->Write(0, $txt, '', 0, 'L', true, 0, false, false, 0);
		$pdf->SetFont('msungstdlight', '', 20);
		$txt = "指導教授：".$Tname." 教授";
		$pdf->Write(0, $txt, '', 0, 'L', true, 0, false, false, 0);
		$txt = "<br/>";
		$pdf->writeHTML($txt, true, false, false, false, '');
		$i=0;
	}	
	$pdf->SetFont('msungstdlight', '', 15);

	$tbl = 
	"
	<table border=\"1\" align=\"center\" width=\"80%\" cellpadding=\"3\">
		<tr>
     		<td  width=\"300\" align=\"center\">專題名稱</td>
     		<td width=\"300\">{$row['Pname']}</td>
	 	</tr>
	 	<tr>
     		<td  width=\"300\" align=\"center\">專題類別</td>
     		<td width=\"300\">{$row['category']}</td>
	 	</tr>
 	 	<tr>
     		<td  width=\"300\" align=\"center\">內容概述</td>
     		<td width=\"300\">{$row['description']}</td>
	 	</tr>
	 	<tr>
     		<td  width=\"300\" align=\"center\">參加者須具備之條件</td>
     		<td width=\"300\">{$row['factor']}</td>
	 	</tr>
	 	<tr>
     		<td  width=\"300\" align=\"center\">參加人數之限制</td>
     		<td width=\"300\">{$row['num_of_member']}</td>
	 	</tr>
	</table>
	<br/><br/>
	";
	$pdf->writeHTML($tbl, true, false, false, false, '');
}
$file_name = $year.$seme."_".$dropdown.'_project.pdf';
ob_end_clean();
$pdf->Output($file_name,'I');