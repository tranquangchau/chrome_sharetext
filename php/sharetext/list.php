<?php

$handle = file_get_contents("list_data.txt");
//var_dump($handle);

$array = explode(",",$handle);
//var_dump($array);
   
$url_request=SITE_URL; 
$url=$url_request;
//echo $url;die;
foreach ($array as $key => $value) {
	//echo $value . "\n";
	$removedata =str_replace("data/","",$value);
	echo "<a href=".$url."index.php?name=".$removedata.">".$removedata."</a><br>";
}