<?php

Class User{
    private $username = '';
    private $password = '';
	
	private $check_uname="";
	private $check_pass="";
	

    function __construct() {
		if($_SERVER['SERVER_NAME']=='localhost'){
			$this->check_uname="u1";
			$this->check_pass="p2";
		}else{
			$this->check_uname="u2";
			$this->check_pass="p1";
		}
    }	

    public function set_ok($username, $password) {
        if ($this->_check_info($username, $password)) {
            $this->username = $username;
            $this->password = $password;
            $this->save_session();
            return true;
        } else {
            return false;
        }
    }

    public function logout() {
        $this->distroy_session();
    }

    /**
     * 
     * @return boolean
     */
    public function check_login() {
        if (empty($_SESSION["username"]) || empty($_SESSION["password"])) {
            return false;
        }
        return true;
    }
	public function check_user(){
		if($username==$this->check_uname){
			return true;
		}else{
			return false;
		}
		
	}

    /**
     * 
     * @param type $username
     * @param type $password
     * @return boolean
     */
    private function _check_info($username, $password) {
        if (!$username || !$password) {
            return false;
        }		
        if ($username==$this->check_uname && $password==$this->check_pass) {
            return true;
        }
        return false;
    }

    /**
     * 
     */
    private function save_session() {
        $_SESSION["username"] = $this->username;
        $_SESSION["password"] = $this->password;
    }

    /**
     * 
     */
    private function distroy_session() {
        session_unset();
        session_destroy();
    }

}
