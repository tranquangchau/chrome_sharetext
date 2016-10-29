<?php 
if (!isset($_SESSION)) {
	session_start();
}

if (isset($_SESSION["screen"])) {
	echo $_SESSION["screen"].'<br/>';
	unset($_SESSION['screen']);
}

if (isset($_POST['textdata'])) {
	//var_dump($_POST);
            if (isset($_POST['textdata'])) {
				$submit_data=$_POST["textdata"];
				$submit_filename=$_POST['filename'];               
                if (!empty($submit_data) && !empty($submit_filename)) {			
					$name_file=utf8convert($submit_filename);
					//var_dump($submit_data,$name_file);
                    if (!empty($name_file)) {
						//echo 'run';
                        $new_file = false;
						$content_filnae="";
                        if (!file_exists("./data/" . $name_file . ".txt")) {
                            $file = tmpfile();
                            $new_file = true;
							$content_filnae=$_POST['filename']."<br>"; //get only name full
                        }
						
                        $file = fopen("./data/" . $name_file . ".txt", "a+");
                        //while (!feof($file)) {
                           // $old = file_get_contents($file);
                        //}
						date_default_timezone_set('Asia/Ho_Chi_Minh');
						$date = date('m/d/Y h:i:s a', time());
						
                        $text =$content_filnae. "<br />" . "&#9658; <span class='dateadd'>" .$date. "</span><br><div class='subcontent'>" . trim($submit_data).'</div>';
                        file_put_contents("./data/" . $name_file . ".txt", $text, FILE_APPEND | LOCK_EX);
                        fclose($file);
                        if ($new_file) {
                            include 'write.php';
                        }
						//include_once '_back.php';						
						echo 'ok';
											
                    }
                }else{					
					include_once '_back.php';
					echo 'No data input';
				}
            }
			
}elseif(isset($_POST['login'])){
			
	include_once 'user.php';
	$User = new User;
	$checklogin = $User->check_login();
	if ($checklogin) {
		echo 'dang nhap thanhc ogn';
		return true; //di toi home.
	} else {
		$u = $_POST['uname'];
		$p = $_POST['pass'];
		$set = $User->set_ok($u, $p);
		if ($set) {
			echo 'dang nhap thanh cong';
			header('Location: '.$_SERVER['REQUEST_URI']);
	exit();
			return true; //dang nhap thanh cong
			//di toi home
		} else {
			$_SESSION["screen"]='dang nhap sai';
			header('Location: '.$_SERVER['REQUEST_URI']);
			//header('Location: ' . SITE_URL);
	exit();
	}
	}
	?>
	
	
	<?php
	
	}elseif (isset($_REQUEST['action'] )) {
		if($_REQUEST['action']=== 'logout'){
			include_once 'user.php';
			$User = new User;
			$checklogin = $User->logout();
			//header('Location: '.$_SERVER['REQUEST_URI']);
			//exit();
			include_once 'login.php';
		}
}else{
	?>

	<?php
	include_once 'user.php';
	//$u=$_POST['uname'];
	//$p=$_POST['pass'];	
	
	$User = new User;

//var_dump($_REQUEST);
        $exitlogin = $User->check_login();
//var_dump($_SESSION);die;
        if (!$exitlogin) {
            include_once 'login.php';
        } else {
            include_once 'form.php';
        }
	
}


?>



<?php 
function utf8convert($str) {
                if(!$str) return false;
                $utf8 = array(
            'a'=>'á|à|ả|ã|ạ|ă|ắ|ặ|ằ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ|Á|À|Ả|Ã|Ạ|Ă|Ắ|Ặ|Ằ|Ẳ|Ẵ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',
            'd'=>'đ|Đ',
            'e'=>'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ|É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',
            'i'=>'í|ì|ỉ|ĩ|ị|Í|Ì|Ỉ|Ĩ|Ị',
            'o'=>'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ|Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',
            'u'=>'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự|Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',
            'y'=>'ý|ỳ|ỷ|ỹ|ỵ|Ý|Ỳ|Ỷ|Ỹ|Ỵ',
                                                );
                foreach($utf8 as $ascii=>$uni) $str = preg_replace("/($uni)/i",$ascii,$str);
$str = strtolower( trim($str, '-') );
$str = preg_replace(array('`[^a-z0-9]`i','`[-]+`'), '-', $str);
				return $str;
}
?>	