<?php
class AdminModel extends Model{
	
	public function __construct() {
		parent::__construct();
	}
	
	public function getUserLogin($userName, $passwd) {
		$sql = "select * from user where user_name = '" . $userName . "'";
		$result = $this->executeQuery($sql);
		return ($result['result'][0]);
	}
	
}