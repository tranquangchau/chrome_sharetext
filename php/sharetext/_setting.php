<?php
if(!defined('SITE_URL')){
	if($_SERVER['SERVER_NAME']=='localhost'){
		echo '<span style="float:right">local</span><br/>';
		define("SITE_URL", "http://localhost/chrome/sharetext/");
	}else{
		echo '<span style="float:right">server</span><br/>';
		define("SITE_URL", "http://server/sharetext/");
	}       
}