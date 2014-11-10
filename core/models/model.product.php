<?php

Class ProductModel extends Model{
	
	public function __construct() {
		$this->table = "products";
		parent::__construct();
	}
	
	public function getProductByCategory($catName = '', $catLevel = 0) {
		
		$arrParam = array();
		switch($catLevel) {
			case '1' : 
				$arrParam = array('prod_cat_1' => $catName);
				break;
				
			case '2' : 
				$arrParam =	array('prod_cat_2' => $catName);
				break;

			case '3' :
				$arrParam = array('prod_cat_3' => $catName);
				break;
		}
		$arrResult = $this->getAll($arrParam);
		return $arrResult;
	}
	
	public function getCategoriesByParent($parentcatId = 0) {
		$arrCatTree = array();
		$arrParam = array("parent_cat_id => $parentcatId");
		$arrResult = $this->getAll($arrParam);
		
		return $arrResult;;
	}
	
	public function getProductTopByCategory($catName = '', $catLevel = '1', $limit = 10) {
		$arrCatProd = array();
		
		$arrParam = array();
		switch($catLevel) {
			case '1' :
				$arrParam = array('prod_cat_1' => $catName);
				break;
		
			case '2' :
				$arrParam =	array('prod_cat_2' => $catName);
				break;
		
			case '3' :
				$arrParam = array('prod_cat_3' => $catName);
				break;
		}
		
		$arrCatProd = $this->getAll($arrParam);
		
		return $arrCatProd;;
	}
	
	public function getProductDetail($prodId) {
		$arrProduct = array();
		$arrParam = array('prod_id' => $prodId);
		
		$arrProduct = $this->getRow($arrParam);
		
		return $arrProduct;
		
	}
	
	public function getProductByBrand($brandId = '') {
		$arrProduct = array();
		
		$sql = "select * from products where prod_brand like '"  . $brandId . "'";
		$arrProduct = $this->executeQuery($sql);
		
		return $arrProduct;
		
	}
	
	
}

?>