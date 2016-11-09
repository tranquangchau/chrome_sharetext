<html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
pre{white-space: pre-wrap;font-family: serif;}
.dateadd{
	float:right;
}
.subcontent{
	background:#EBEDEF;
}
.one_file{
	border-width:1px;	
	margin-bottom: -16px;
}
.one_file:nth-child(even) {border-left-style: solid;}
.one_file:nth-child(odd) {border-right-style: solid;}
</style>
<body>

<?php
include_once '_setting.php';
include_once '_back.php';

$filename='';
if (isset($_GET['filename'])){
	$filename=$_GET['filename'].'.txt';
	$link_file='data/'.$filename;
	$file = fopen($link_file, "r");
	while (!feof($file)) {
        echo fgets($file);
    }
	echo '<br/></pre>';
    fclose($file);
	
}else{
	if(isset($_REQUEST['user'])){
		if($_REQUEST['user']=='chau'){
			$url_request = "http://" . $_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];	
			$handle = file_get_contents("list_data.txt");
			$array = explode(",",$handle);
			//var_dump(($_SERVER));
			for($i=1;$i<=sizeof($array);$i++){
				$name_remove=str_replace('.txt','',$array[$i-1]);
				$name_remove=str_replace('data/','',$name_remove);
				echo '<a href="'.$url_request.'&filename='.$name_remove.'">'.$array[$i-1].'</a><br/>';
			}
		}else{
			include_once 'recheck_use.php';
		}		
	}else{
		include_once 'recheck_use.php';
	}
	
}
?>
	</body>
</html>
<?php
/*
	- Process
1: truyen vao page
2: get sum all page
3: limit record page
4: get file name
4: show content filename


?page=1&limit=4
?page=2&limit=4
?page=4&limit=4  *

4*4 16-20.
*/