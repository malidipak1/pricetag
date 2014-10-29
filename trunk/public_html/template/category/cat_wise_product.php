<?php
require_once Config::get('COMPONENT_DIR') . 'component.product.php';


foreach ($arrSubCategory as $catDetails) {
	$subCatId = $catDetails['category_id'];
	$subCatName = $catDetails['category_name'];
	$catLevel =  $catDetails['level'];
print_r($catDetails);

	$objProduct = new ProductComponent();
	$arrTopProd =  $objProduct->getProductTopByCategory($subCatName, $catLevel, 5);
	print_r($arrTopProd['product_list']);
	
}

?>