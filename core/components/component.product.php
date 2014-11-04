<?php
require_once Config::get('MODEL_DIR') . 'model.product.php';

Class ProductComponent {

	
	public function getProductByCategory($catName = '', $catLevel = 1) {
		$return_array = array();
		
		$objProdModel = new ProductModel();
		$objProdModel->isPaging = true;
		$return_array['product_list'] = $objProdModel->getProductByCategory($catName, $catLevel);
		
		
		return $return_array;
	}

	public function getCategoryByBrand($catId = 0) {
		$return_array = array();

		$objCatModel = new ProductModel();
		$return_array['product_list'] = $objCatModel->getCategoriesByParent($catId);


		return $return_array;
	}

	public function getProductTopByCategory($catName = '', $catLevel='1', $limit = 10) {
		$return_array = array();

		$objCatModel = new ProductModel();
		$objCatModel->isPaging = true;
		$objCatModel->pagingPerPage = 4;
		$return_array['product_list'] = $objCatModel->getProductTopByCategory($catName, $catLevel, $limit);


		return $return_array;
	}
	
	
}