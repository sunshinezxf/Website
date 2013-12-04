<?php
class member {
	private $username;
	private $password;
	public function member($username, $password) {
		$this->username = $username;
		$this->password = $password;
	}
	
	public function _get_username(){
		return $this->username;
	}
}

?>