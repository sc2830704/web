<?php
include('global.php');
if(isset($_GET['semester'])){
	$semester = $_GET['semester'];
}else{
	$semester = $year_semester;
}
$query_workprj = 
"SELECT DISTINCT Semester,Working_project.Group,Working_project.No,Working_project.Pid FROM Working_project WHERE Semester='$semester' ORDER BY Working_project.No";
$result = mysql_query($query_workprj);
$count = 0;

error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
date_default_timezone_set('Europe/London');
if (PHP_SAPI == 'cli')
	die('This example should only be run from a Web Browser');
/** Include PHPExcel */
require_once dirname(__FILE__) . '/../Classes/PHPExcel.php';
// Create new PHPExcel object
$objPHPExcel = new PHPExcel();
$topic = array();
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
	$objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A'.($i+3),$topic[$i])
			->setCellValue('B'.($i+3),$group[$i])
			->setCellValue('C'.($i+3),$std[0])
			->setCellValue('D'.($i+3),$std[1])
			->setCellValue('E'.($i+3),$std[2])
			->setCellValue('F'.($i+3),$tname);
			
	
	
		
}
$objPHPExcel->getProperties()->setCreator("臺科大電子系")
							 ->setLastModifiedBy("臺科大電子系")
							 ->setTitle("專題評分表")
							 ->setSubject("評分表")
							 ->setDescription("Test document for Office 2007 XLSX, generated using PHP classes.")
							 ->setKeywords("office 2007 openxml php")
							 ->setCategory("ET Project file");
$objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A2', '專題題目')
            ->setCellValue('B2', '組別')
            ->setCellValue('C2', '組員1')
            ->setCellValue('D2', '組員2')
			->setCellValue('E2', '組員3')
			->setCellValue('F2', '指導老師')
			->getStyle('G1')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER)	//設定垂直置中
					->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER)	//設定水平置中;	
			->getActiveSheet()->getStyle('L1')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER)	//設定垂直置中
					->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER)	//設定水平置中;						
			->getActiveSheet()->getStyle('V1')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER)	//設定垂直置中
					->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER)	//設定水平置中;		
			->getActiveSheet()->getStyle('AB1')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER)	//設定垂直置中
					->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);	//設定水平置中;
$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(30);
$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(20);
$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(20);
$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(20);
// Rename worksheet
$objPHPExcel->getActiveSheet()->setTitle('project score');


// Set active sheet index to the first sheet, so Excel opens this as the first sheet
$objPHPExcel->setActiveSheetIndex(0);

$file_name = '專題一覽表';
// Redirect output to a client’s web browser (Excel2007)
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="'.$file_name.'.xlsx"');
header('Cache-Control: max-age=0');
// If you're serving to IE 9, then the following may be needed
header('Cache-Control: max-age=1');

// If you're serving to IE over SSL, then the following may be needed
header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
header ('Pragma: public'); // HTTP/1.0

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save('php://output');
exit;


?>