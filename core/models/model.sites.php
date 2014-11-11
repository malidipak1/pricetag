<?php

class SitesModel extends Model {
	
	public function __construct(){
		$this->table = "product_owner";
		parent::__construct();
	}
	
	public function getSiteDetailById($id) {
		$arrParam = array('owner_id' => $id);
		$arrSite = $this->getRow($arrParam);
		return $arrSite;
	}
	
	public function function_name($param) {
		;
	}
	
}

?>