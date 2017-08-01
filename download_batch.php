<?php 
include('global.php');
if(isset($_GET['semester'])){
	$semester = $_GET['semester'];
}else{
	die("ERROR 505");
}
if(isset($_GET['order'])){
	$order = $_GET['order'];	
}else{
	die('ERROR 505');
}
//get sid
$query = 'SELECT Sid FROM score WHERE Semester=\''.$semester.'\'';
$result = mysql_query($query);
$count = 0;
while($row = mysql_fetch_array($result)){
	$sids[$count] = $row[0];
	$count++;
}
//download to server
$endpoint = "localhost/et/admin/project/web/download.php?";
$ch = curl_init();
foreach($sids as $sid){
	$url = $endpoint."order=".$order."&Sid=".$sid."&method=0";
	curl_setopt($ch,CURLOPT_URL,$url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$data =curl_exec($ch);
}
curl_close($ch);




//打包壓縮檔

$files = array();
foreach($sids as $sid){
	array_push($files,'../'.$sid.'.xlsx');
}
$zipname = $semester.'-'.$order.'.zip';
$zip = new ZipArchive;
$zip->open($zipname, ZipArchive::CREATE);
foreach ($files as $file) {
  //$new_filename = substr($file,strrpos($file,'\\') + 1);
  $zip->addFile($file);
}
$zip->close();

header('Content-Type: application/zip');
header('Content-disposition: attachment; filename='.$zipname);
header('Content-Length: ' . filesize($zipname));
readfile($zipname);

foreach ($files as $file) {
  unlink($file);
}
unlink($zipname);

?>

<script>
	
</script>