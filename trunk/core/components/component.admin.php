<?php
require_once Config::get('MODEL_DIR') . 'model.admin.php';

class AdminComponent {
	
	public function login($userName, $passwd) {
		$userId = 0;
		$objAdmin = new AdminModel();
		$arrUser = $objAdmin->getUserLogin($userName, $passwd);

		if($arrUser['passwd'] == $passwd && $arrUser['status'] == 1) {
			$userId = $arrUser['user_id'];
		}
		return $userId;
	}
	
}

?>