<?php

Class CategoryModel extends Model{
	
	public function __construct() {
		$this->table = "categories";
		parent::__construct();
	}
	
	public function getCategoryList($param) {
		//$sql = "SELECT * FROM `categories` ";
		$arrResult = $this->getAll(array());
		return $arrResult;
	}
	
	public function getCategory($catId = 0) {
		
		$arrParam = array('category_id' => $catId);
		$arrResult = $this->getRow($arrParam);
		return $arrResult;
	}
	
	
	public function getCategoriesByParent($parentcatId = 0) {
		$arrCatTree = array();
		$arrParam = array('parent_cat_id' => $parentcatId);
		$arrResult = $this->getAll($arrParam);
		
		return $arrResult;;
	}
	
	
}

?>