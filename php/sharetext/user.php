<?php

Class User{
    private $username = '';
    private $password = '';

    function __construct() {
        
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
        if ($username!="chau" && $password!="123") {
            return false;
        }
        return true;
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
