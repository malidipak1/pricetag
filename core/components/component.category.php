<?php

require_once Config::get('MODEL_DIR') . 'model.category.php';

Class CategoryComponent {

	
	public function getCategoryDetails($catId = 0) {
		$return_array = array();
		
		$objCatModel = new CategoryModel();
		
		$arrCat = $objCatModel->getCategory($catId); 
		$return_array['main_category'] = $arrCat;
		
		
		$arrCatList = $objCatModel->getCategoriesByParent($catId);
		
		$return_array['sub_category'] = $arrCatList;
		
		return $return_array;
	}
	
	public function getCategoryTree() {
		$return_array = array();
	
		$objCatModel = new CategoryModel();
		$arrParentCat = $objCatModel->getCategoriesByParent(0);
	
		foreach ($arrParentCat as $catDetails) {
		
			$catId = $catDetails['category_id'];
			$catName = $catDetails['category_name'];
		
			$arrL2Result  = $objCatModel->getCategoriesByParent($catId);
		
			foreach ($arrL2Result as $l2CatDetails) {
				$l2CatId = $l2CatDetails['category_id'];
				$l2CatName = $l2CatDetails['category_name'];
				
				$arrL3Result  = $objCatModel->getCategoriesByParent($l2CatId);
				$l3FinalArr = array();
				foreach ($arrL3Result as $l3CatDetails) {
					$l3CatId = $l3CatDetails['category_id'];
					$l3CatName = $l3CatDetails['category_name'];
					$l3FinalArr[] = $l3CatId ."-" . $l3CatName;
				}
				
				//print_r($l3FinalArr);
				$arrL2[$l2CatId . "-" .$l2CatName] = $l3FinalArr;
				//print_r($arrL2);
			}
		
		
			$return_array[$catId . "-" . $catName] = $arrL2;
		
		}
		
		return $return_array;
	}
	
}

?>