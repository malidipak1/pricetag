<?php

Class ProductModel extends Model{
	
	public function __construct() {
		parent::__construct();
	}
	
	public function getProductByCategory($catName = '', $catLevel = 1) {
		
		$whereClause = "";
		switch($catLevel) {
			case '1' : 
				$whereClause = " prod_cat_1 = '" . $catName . "'";
				break;
				
			case '2' : 
				$whereClause = " prod_cat_2 = '" . $catName . "'";
				break;

			case '3' :
				$whereClause = " prod_cat_3 = '" . $catName . "'";
				break;
				
			default : 
				$whereClause = " 1=1 ";
		}
		
		
		$sql = "SELECT * FROM `products` where " . $whereClause;
		$arrResult = $this->getAll($sql);
		return $arrResult;
	}
	
	public function getCategoriesByParent($parentcatId = 0) {
		$arrCatTree = array();
		echo $sql = "SELECT * FROM `categories` where parent_cat_id = " . $parentcatId ;
		$arrResult = $this->getAll($sql);
		
		return $arrResult;;
	}
	
	
}

?>