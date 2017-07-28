<?php 

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
$query = 'SELECT Student.Sid FROM Score WHERE Semester=\''.$_POST['semester'];
$result = mysql_query($query);
$count = 0;
while($row = mysql_fetch_array($result)){
	$sid[$count] = $row[0];
	$count++;
}
$query_state = "SELECT Sid FROM Score WHERE sll IS null";
$result = mysql_query($query_state);	

$files = array('readme.txt', 'test.html');
$zipname = 'file.zip';
$zip = new ZipArchive;
$zip->open($zipname, ZipArchive::CREATE);
foreach ($files as $file) {
  $zip->addFile($file);
}
$zip->close();

header('Content-Type: application/zip');
header('Content-disposition: attachment; filename='.$zipname);
header('Content-Length: ' . filesize($zipname));
readfile($zipname);

?>