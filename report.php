<?php
include('global.php');
$query = "SELECT Tname,Pname,student.Pid,student.Sid,Sname,s11,s12,s13,s14,s15,s21,s22,s23,s24,s25,s26,s27,s28,s29,s210,s31,s32,s33,s34,s35,s36,
		  w11,w12,w13,w14,w15,w21,w22,w23,w24,w25,w26,w27,w28,w29,w210,w31,w32,w33,w34,w35,w36,total FROM project,score,student,teacher
		  WHERE score.Sid=student.Sid AND student.Pid=project.pid AND teacher.Tid=student.Tid AND teacher.Tid=project.Tid";
$result = mysql_query($query);
header("Content-Type:text/html; charset=utf-8");
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
date_default_timezone_set('Europe/London');
define('EOL',(PHP_SAPI == 'cli') ? PHP_EOL : '<br />');
/** Include PHPExcel */
require_once dirname(__FILE__) . '/../Classes/PHPExcel.php';
// Create new PHPExcel object
echo date('H:i:s') , " Create new PHPExcel object" , EOL;
$objPHPExcel = new PHPExcel();
// Set document properties
echo date('H:i:s') , " Set document properties" , EOL;
$objPHPExcel->getProperties()->setCreator("Maarten Balliauw")
							 ->setLastModifiedBy("Maarten Balliauw")
							 ->setTitle("PHPExcel Test Document")
							 ->setSubject("PHPExcel Test Document")
							 ->setDescription("Test document for PHPExcel, generated using PHP classes.")
							 ->setKeywords("office PHPExcel php")
							 ->setCategory("Test result file");

// Add some data
echo date('H:i:s') , " Add some data" , EOL;
		$objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A1', '分項')
            ->setCellValue('B1', '實務專題評分指標')
            ->setCellValue('C1', '權重')
            ->setCellValue('D1', '此欄請老師評分')
			->setCellValue('E1', '得分');
		while($row=mysql_fetch_array($result)){
			for($i=0;$i<15;$i++){
				echo $row[$i].' ';
			}
			echo '</br>';
			$objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('D2', '8.='.$row[8])
            ->setCellValue('D3', $row[9])
            ->setCellValue('D4', $row[10])
            ->setCellValue('D5', $row[11])
			->setCellValue('D6', '得分');
		}
$objPHPExcel->getActiveSheet()->getComment('E11')->setAuthor('PHPExcel');

$objPHPExcel->getActiveSheet()->setCellValue('A8',"Hello\nWorld");
$objPHPExcel->getActiveSheet()->getRowDimension(8)->setRowHeight(-1);
$objPHPExcel->getActiveSheet()->getStyle('A8')->getAlignment()->setWrapText(true);

// Rename worksheet
echo date('H:i:s') , " Rename worksheet" , EOL;
$objPHPExcel->getActiveSheet()->setTitle('Project');

// Set active sheet index to the first sheet, so Excel opens this as the first sheet
$objPHPExcel->setActiveSheetIndex(0);

// Save Excel 2007 file
echo date('H:i:s') , " Write to Excel2007 format" , EOL;
$callStartTime = microtime(true);

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
//決定檔案名稱
$objWriter->save('123.xlsx');

$callEndTime = microtime(true);
$callTime = $callEndTime - $callStartTime;

echo date('H:i:s') , " File written to " , str_replace('.php', '.xlsx', pathinfo(__FILE__, PATHINFO_BASENAME)) , EOL;
echo 'Call time to write Workbook was ' , sprintf('%.4f',$callTime) , " seconds" , EOL;
// Echo memory usage
echo date('H:i:s') , ' Current memory usage: ' , (memory_get_usage(true) / 1024 / 1024) , " MB" , EOL;

// Save Excel 95 file
echo date('H:i:s') , " Write to Excel5 format" , EOL;
$callStartTime = microtime(true);

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
$objWriter->save(str_replace('.php', '.xls', __FILE__));
$callEndTime = microtime(true);
$callTime = $callEndTime - $callStartTime;

echo date('H:i:s') , " File written to " , str_replace('.php', '.xls', pathinfo(__FILE__, PATHINFO_BASENAME)) , EOL;
echo 'Call time to write Workbook was ' , sprintf('%.4f',$callTime) , " seconds" , EOL;
// Echo memory usage
echo date('H:i:s') , ' Current memory usage: ' , (memory_get_usage(true) / 1024 / 1024) , " MB" , EOL;

// Echo memory peak usage
echo date('H:i:s') , " Peak memory usage: " , (memory_get_peak_usage(true) / 1024 / 1024) , " MB" , EOL;

// Echo done
echo date('H:i:s') , " Done writing files" , EOL;
echo 'Files have been created in ' , getcwd() , EOL;
