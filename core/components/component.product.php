<?php
require_once Config::get('MODEL_DIR') . 'model.product.php';

Class ProductComponent {


	public function getProductByCategory($catName = '', $catLevel = 1) {
		$return_array = array();
		
		$objProdModel = new ProductModel();
		$return_array['product_list'] = $objProdModel->getProductByCategory($catName, $catLevel);


		return $return_array;
	}

	public function getCategoryByBrand($catId = 0) {
		$return_array = array();

		$objCatModel = new CategoryModel();
		$return_array['product_list'] = $objCatModel->getCategoriesByParent($catId);


		return $return_array;
	}

}