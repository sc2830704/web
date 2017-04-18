<?php

include('global.php');
if(isset($_GET['Sid'])){
	$Sid = $_GET['Sid'];	
}else{
	die('錯誤505');
}
if(isset($_GET['order'])){
	$order = $_GET['order'];	
}else{
	die('錯誤505');
}
$query_group = "SELECT Semester,Working_project.Group,Working_project.No FROM Working_project WHERE Sid='$Sid'";
$result = mysql_query($query_group);
$row = mysql_fetch_array($result);
$group = $row[0].$row[1].$row[2];
if($order==1){
	$query = "SELECT faculty.name_ch,Working_project.Pid,Working_project.Sid,Student.Sid,Sname,s11_1,s12_1,s13_1,s14_1,s15_1,s21_1,s22_1,s23_1,s24_1,s25_1,s26_1,s27_1,s28_1,
	s29_1,s210_1,s31_1,s32_1,s33_1,s34_1,s35_1,s36_1,w11_1,w12_1,w13_1,w14_1,w15_1,w21_1,w22_1,w23_1,w24_1,w25_1,w26_1,w27_1,w28_1,w29_1,w210_1,w31_1,w32_1,w33_1,w34_1,w35_1,
	w36_1 FROM Working_project,Score,Student,faculty WHERE Score.Sid='$Sid' AND Score.Sid=Student.Sid AND Student.Sid=Working_project.Sid AND faculty.username=Student.Tid";

}else{
	$query = "SELECT faculty.name_ch,Working_project.Pid,Working_project.Sid,Student.Sid,Sname,s11_2,s12_2,s13_2,s14_2,s15_2,s21_2,s22_2,s23_2,s24_2,s25_2,s26_2,s27_2,s28_2,
	s29_2,s210_2,s31_2,s32_2,s33_2,s34_2,s35_2,s36_2,w11_2,w12_2,w13_2,w14_2,w15_2,w21_2,w22_2,w23_2,w24_2,w25_2,w26_2,w27_2,w28_2,w29_2,w210_2,w31_2,w32_2,w33_2,w34_2,w35_2
	,w36_2,score_2,total FROM Working_project,Score,Student,faculty WHERE Score.Sid='$Sid' AND Score.Sid=Student.Sid AND Student.Sid=Working_project.Sid AND faculty.username=Student.Tid";

}
$result = mysql_query($query);

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
// Set document properties
$objPHPExcel->getProperties()->setCreator("臺科大電子系")
							 ->setLastModifiedBy("臺科大電子系")
							 ->setTitle("專題評分表")
							 ->setSubject("評分表")
							 ->setDescription("Test document for Office 2007 XLSX, generated using PHP classes.")
							 ->setKeywords("office 2007 openxml php")
							 ->setCategory("ET Project file");
	$objPHPExcel->getActiveSheet()
				->mergeCells('A5:A9')	//合併表格
				->mergeCells('A11:A20')
				->mergeCells('A22:A27')
				->setCellValue('A1','指導老師')
				->setCellValue('A2','題目')
				->setCellValue('A3','組員')
				->setCellValue('C1','組別')
				->setCellValue('D1',$group)
				->setCellValue('A5','基礎能力')
				->setCellValue('A11','專業核心能力')
				->setCellValue('A22','應用能力')
				->setCellValue('A29','總分')
				->getStyle('A5')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER)	//設定垂直置中
					->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER)	//設定水平置中
				->getActiveSheet()->getStyle('A11')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER)		//設定垂直置中
					->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER)	//設定水平置中
				->getActiveSheet()->getStyle('A22')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER)		//設定垂直置中
					->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER)		//設定水平置中
				->getActiveSheet()->getStyle('A29')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER)		//設定垂直置中
					->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);		//設定水平置中
	$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(15);
	$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(50);

	$objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A4', '分項')
            ->setCellValue('B4', '實務專題評分指標')
            ->setCellValue('C4', '權重')
            ->setCellValue('D4', '此欄請老師評分')
			->setCellValue('E4', '得分')
			->getStyle('A4')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER)	//設定垂直置中
					->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER)	//設定水平置中;
			->getActiveSheet()->getStyle('B4')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER)	//設定垂直置中
					->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER)	//設定水平置中		
			->getActiveSheet()->getStyle('C4')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER)	//設定垂直置中
					->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER)	//設定水平置中	
			->getActiveSheet()->getStyle('D4')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER)	//設定垂直置中
					->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER)	//設定水平置中			
			->getActiveSheet()->getStyle('E4')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER)	//設定垂直置中
					->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);	//設定水平置中			
	$objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('B5', '1.工具及設備使用之能力')
            ->setCellValue('B6', '2.使用電腦與網際網路能力')
            ->setCellValue('B7', '3.具運用數學的方法解決電子工程相關方面問題之能力')
            ->setCellValue('B8', '4.具專題製作及撰寫報告之能力')
			->setCellValue('B9', '5.具有良好的外語能力')	
			->setCellValue('B10', '小計');
	$objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('B11', '1.設計電子電路能力')
            ->setCellValue('B12', '2.程式設計能力')
            ->setCellValue('B13', '3.使用儀器與量測方法之能力')
            ->setCellValue('B14', '4.嵌入式系統之設計能力')
			->setCellValue('B15', '5.使用系統及元組件之能力')	
			->setCellValue('B16', '6.系統及元組件之設計能力')	
            ->setCellValue('B17', '7.系統及元組件之製作能力')
            ->setCellValue('B18', '8.系統及元組件之模擬與分析能力')
			->setCellValue('B19', '9.訊號分析處理與應用之能力')	
			->setCellValue('B20', '10.系統整合及測試之能力')
			->setCellValue('B21', '小計');	
	$objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('B22', '1.具熟悉溝通、協調專業知識之要領')
            ->setCellValue('B23', '2.具專業閱讀與手冊查閱能力')
            ->setCellValue('B24', '3.具工作安全與衛生知識')
            ->setCellValue('B25', '4.具相關法規常識')
			->setCellValue('B26', '5.了解產業發展概況')	
			->setCellValue('B27', '6.具專利文件閱讀能力')
			->setCellValue('B28', '小計');			
		while($row=mysql_fetch_array($result)){
			$Sname = $row[4];
			$weight_tot1=0;
			$weight_tot2=0;
			$weight_tot3=0;
			$score_tot1=0;
			$score_tot2=0;
			$score_tot3=0;
			//設定基本資料
			$objPHPExcel->setActiveSheetIndex(0)
				->setCellValue('B1',$row[0])
				->setCellValue('B2',$row[1])
				->setCellValue('B3',$row[3].$row[4]);
			
			//設定基礎能力 權重、得分、小計
			for($i=5;$i<=9;$i++){
				$weight_name = 'C'.($i);
				$score_name = 'D'.($i);
				$total_name = 'E'.($i);
				$weight = ($row[$i+21]*100); //每一項的權重
				$score = $row[$i];	//每一項的評分
				$weight_tot1 = $weight_tot1 + $weight; //計算總權重
				$score_tot1 = $score_tot1 + $weight*$score/100;	//計算總得分
				$objPHPExcel->setActiveSheetIndex(0)
				->setCellValue($score_name,$score)
				->setCellValue($weight_name,$weight)
				->setCellValue($total_name,$weight*$score/100);
				
			}
			//設定專業核心能力 權重、得分、小計
			for($i=10;$i<=19;$i++){
				$score_name = 'D'.($i+1);
				$weight_name = 'C'.($i+1);
				$total_name = 'E'.($i+1);
				$score = $row[$i];
				$weight = ($row[$i+21]*100);
				$weight_tot2 = $weight_tot2 + $weight; //計算總權重
				$score_tot2 = $score_tot2 + $weight*$score/100;	//計算總得分
				$objPHPExcel->setActiveSheetIndex(0)
				->setCellValue($score_name,$score)
				->setCellValue($weight_name,$weight)
				->setCellValue($total_name,$weight*$score/100);
			}
			//設定應用能力 權重、得分、小計
			for($i=20;$i<=25;$i++){
				$score_name = 'D'.($i+2);
				$weight_name = 'C'.($i+2);
				$total_name = 'E'.($i+2);
				$score = $row[$i];
				$weight = ($row[$i+21]*100);
				$weight_tot3 = $weight_tot3 + $weight; //計算總權重
				$score_tot3 = $score_tot3 + $weight*$score/100;	//計算總得分
				$objPHPExcel->setActiveSheetIndex(0)
				->setCellValue($score_name,$score)
				->setCellValue($weight_name,$weight)
				->setCellValue($total_name,$weight*$score/100);
			}
			
				$objPHPExcel->setActiveSheetIndex(0)
				->setCellValue('C10',$weight_tot1)
				->setCellValue('C21',$weight_tot2)
				->setCellValue('C28',$weight_tot3);
				$objPHPExcel->setActiveSheetIndex(0)
				->setCellValue('E10',$score_tot1)
				->setCellValue('E21',$score_tot2)
				->setCellValue('E28',$score_tot3)
				->setCellValue('E29',$score_tot1+$score_tot2+$score_tot3);
		}

// Rename worksheet
$objPHPExcel->getActiveSheet()->setTitle('project score');


// Set active sheet index to the first sheet, so Excel opens this as the first sheet
$objPHPExcel->setActiveSheetIndex(0);

$file_name = $Sid.'_'.$Sname;
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
