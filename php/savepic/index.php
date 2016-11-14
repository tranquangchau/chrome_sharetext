<?php
//http://localhost/chrome/savepic/?link=http://www.w3schools.com/images/colorpicker.gif
//var_dump($_REQUEST);die;
if(isset($_REQUEST['link'])){
	$url = $_REQUEST['link'];
	$path_parts = pathinfo($url);
	$filename = $path_parts['basename'];

	$img = 'pic/'.time()."_".$filename;
	if (file_put_contents($img, file_get_contents($url)) !== false){
		echo "ok";	
	}else{
		echo "error";	
	}	
}
die;