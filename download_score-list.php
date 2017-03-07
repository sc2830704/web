<?php
header("Content-Type:text/html;charset=utf-8");
include('global.php');
if(isset($_GET['semester'])){
	$semester = $_GET['semester'];
}else{
	$semester = $year_semester;
}
if(isset($_GET['order'])){
	if($_GET['order']==1){
		$query_score_list = 
		"SELECT Working_project.Semester,Working_project.Group,Working_project.No,Working_project.Pid,Student.Sname,faculty.name_ch,
		s11_1,s12_1,s13_1,s14_1,s15_1,s21_1,s22_1,s23_1,s24_1,s25_1,s26_1,s27_1,s28_1,s29_1,s210_1,s31_1,s32_1,s33_1,s34_1,s35_1,s36_1,
		w11_1,w12_1,w13_1,w14_1,w15_1,w21_1,w22_1,w23_1,w24_1,w25_1,w26_1,w27_1,w28_1,w29_1,w210_1,w31_1,w32_1,w33_1,w34_1,w35_1,w36_1,score_1,Student.sid
		FROM Working_project,Student,Score,faculty
		WHERE Working_project.Semester='$semester' AND Student.Sid = Working_project.Sid AND Score.Sid=Student.Sid AND faculty.username = Student.tid
		ORDER BY Working_project.No";
	}else{
		$query_score_list = 
		"SELECT Working_project.Semester,Working_project.Group,Working_project.No,Working_project.Pid,Student.Sname,faculty.name_ch,
		s11_2,s12_2,s13_2,s14_2,s15_2,s21_2,s22_2,s23_2,s24_2,s25_2,s26_2,s27_2,s28_2,s29_2,s210_2,s31_2,s32_2,s33_2,s34_2,s35_2,s36_2,
		w11_2,w12_2,w13_2,w14_2,w15_2,w21_2,w22_2,w23_2,w24_2,w25_2,w26_2,w27_2,w28_2,w29_2,w210_2,w31_2,w32_2,w33_2,w34_2,w35_2,w36_2,score_2,Student.sid
		FROM Working_project,Student,Score,faculty
		WHERE Working_project.Semester='$semester' AND Student.Sid = Working_project.Sid AND Score.Sid=Student.Sid AND faculty.username = Student.tid AND score_2 IS NOT NULL
		ORDER BY Working_project.No";
	}
}else{
	die('錯誤505');
}

$result = mysql_query($query_score_list);
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
$i=0;
while($row = mysql_fetch_array($result)){
	if(is_numeric($row[48])){
		$group = $row[0].$row[1].$row[2];
		$objPHPExcel->setActiveSheetIndex(0)
				->setCellValue('A'.($i+3),$row[3])
				->setCellValue('B'.($i+3),$group)
				->setCellValue('C'.($i+3),$row[49].$row[4])
				->setCellValue('D'.($i+3),$row[5])
				->setCellValue('E'.($i+3),$row[6])
				->setCellValue('F'.($i+3),$row[7])
				->setCellValue('G'.($i+3),$row[8])
				->setCellValue('H'.($i+3),$row[9])
				->setCellValue('I'.($i+3),$row[10])
				->setCellValue('J'.($i+3),$row[11])
				->setCellValue('K'.($i+3),$row[12])
				->setCellValue('L'.($i+3),$row[13])
				->setCellValue('M'.($i+3),$row[14])
				->setCellValue('N'.($i+3),$row[15])
				->setCellValue('O'.($i+3),$row[16])
				->setCellValue('P'.($i+3),$row[17])
				->setCellValue('Q'.($i+3),$row[18])
				->setCellValue('R'.($i+3),$row[19])
				->setCellValue('S'.($i+3),$row[20])
				->setCellValue('T'.($i+3),$row[21])
				->setCellValue('U'.($i+3),$row[22])
				->setCellValue('V'.($i+3),$row[23])
				->setCellValue('W'.($i+3),$row[24])
				->setCellValue('X'.($i+3),$row[25])
				->setCellValue('Y'.($i+3),$row[26])
				->setCellValue('Z'.($i+3),$row[48]);
	}
	
	$i++;
}
$objPHPExcel->getProperties()->setCreator("臺科大電子系")
							 ->setLastModifiedBy("臺科大電子系")
							 ->setTitle($semester."專題評分表")
							 ->setSubject("評分表")
							 ->setDescription("Test document for Office 2007 XLSX, generated using PHP classes.")
							 ->setKeywords("office 2007 openxml php")
							 ->setCategory("ET Project file");
$objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A2', '專題題目')
            ->setCellValue('B2', '組別')
            ->setCellValue('C2', '學生')
			->setCellValue('D2', '指導老師')
			->setCellValue('E2', '1')
			->setCellValue('F2', '2')
			->setCellValue('G2', '3')
			->setCellValue('H2', '4')
			->setCellValue('I2', '5')
			->setCellValue('J2', '1')
			->setCellValue('K2', '2')
			->setCellValue('L2', '3')
			->setCellValue('M2', '4')
			->setCellValue('N2', '5')
			->setCellValue('O2', '6')
			->setCellValue('P2', '7')
			->setCellValue('Q2', '8')
			->setCellValue('R2', '9')
			->setCellValue('S2', '#')
			->setCellValue('T2', '1')
			->setCellValue('U2', '2')
			->setCellValue('V2', '3')
			->setCellValue('W2', '4')
			->setCellValue('X2', '5')
			->setCellValue('Y2', '6')
			->mergeCells('E1:I1')	//合併表格
			->mergeCells('J1:S1')
			->mergeCells('T1:Y1')
			->mergeCells('Z1:Z2')	
            ->setCellValue('E1', '基礎能力')
			->setCellValue('J1', '專業核心能力')
			->setCellValue('T1', '應用能力')	
			->setCellValue('Z1', '總分')
			->getStyle('E1')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER)	//設定垂直置中
					->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER)	//設定水平置中;	
			->getActiveSheet()->getStyle('J1')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER)	//設定垂直置中
					->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER)	//設定水平置中;						
			->getActiveSheet()->getStyle('T1')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER)	//設定垂直置中
					->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER)	//設定水平置中;		
			->getActiveSheet()->getStyle('Z1')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER)	//設定垂直置中
					->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);	//設定水平置中;
$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(30);
$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(20);
// Rename worksheet
$objPHPExcel->getActiveSheet()->setTitle('project score');


// Set active sheet index to the first sheet, so Excel opens this as the first sheet
$objPHPExcel->setActiveSheetIndex(0);

$file_name = '成績總覽表';
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