<?php

Class CategoryModel extends Model{
	
	public function __construct() {
		$this->table = "categories";
		parent::__construct();
	}
	
	public function getCategoryList($param = array()) {
		
		
		$arrResult = $this->getAll($param);
		
		//print_r($arrResult);
		
		return $arrResult;
	}
	
	public function getCategory($catId = 0) {
		
		$arrParam = array('category_id' => $catId, 'active' => 1);
		$arrResult = $this->getRow($arrParam);
		return $arrResult;
	}
	
	
	public function getCategoriesByParent($parentcatId = 0) {
		$arrCatTree = array();
		$arrParam = array('parent_cat_id' => $parentcatId, 'active' => 1);
		$arrResult = $this->getAll($arrParam);
		
		return $arrResult;;
	}
	
	
}

?>