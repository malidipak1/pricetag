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

	public function getProductByBrand($brand = '') {
		$return_array = array();

		$objProdModel = new ProductModel();
		$objProdModel->isPaging = true;
		$return_array['product_list'] = $objProdModel->getProductByBrand($brand);


		return $return_array;
	}

	public function getProductTopByCategory($catName = '', $catLevel='1', $limit = 10) {
		$return_array = array();

		$objProdModel = new ProductModel();
		$objProdModel->isPaging = true;
		$objProdModel->pagingPerPage = 4;
		$return_array['product_list'] = $objProdModel->getProductTopByCategory($catName, $catLevel, $limit);


		return $return_array;
	}
	
	public function getProductDetails($prodId) {
		$return_array = array();
		$objProdModel = new ProductModel();
		$return_array = $objProdModel->getProductDetail($prodId);
		return $return_array;
	}
	
}