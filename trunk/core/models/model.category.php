<?php

Class CategoryModel extends Model{
	
	public function __construct() {
		parent::__construct();
	}
	
	public function getCategoryList($param) {
		$sql = "SELECT * FROM `categories` ";
		$arrResult = $this->getAll($sql);
		return $arrResult;
	}
	
	public function getCategory($catId = 0) {
		$sql = "SELECT * FROM `categories` where category_id = ". $catId;
		$arrResult = $this->getRow($sql);
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