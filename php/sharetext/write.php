<?php
include_once '_setting.php';
//echo 'write list file<br>';
$fileList = array();
//$files = glob('home/dir/*.txt');
$files = glob("data/*.txt");
foreach ($files as $file) {
	$fileList[filemtime($file)] = $file;
}
ksort($fileList);
$fileList = array_reverse($fileList, TRUE);



$url_request=SITE_URL;
$url=$url_request;
//echo $url;die;
$stringlist_file="";
$i=0;
foreach ($fileList as $key => $value) {
	if($i==0){
	$stringlist_file=$value;	
}else{
	$stringlist_file=$stringlist_file. ",". $value ;
}
	$i++;
	
	//$removedata =str_replace("data/","",$value);
	//echo "<a href=".$url."index.php?name=".$removedata.">".$removedata."</a><br>";
}
//echo $stringlist_file;

//write list file to file
$file_save1 = "list_data.txt";
//while (!feof($file)) {
//	$old = fgets($file);
//}
//$text = "<br />" . "&#9658;" . "<br>" . trim($_POST["textdata"]);
file_put_contents($file_save1, $stringlist_file);
//fclose($file_save1);
//fclose($file);
//echo "write ok";