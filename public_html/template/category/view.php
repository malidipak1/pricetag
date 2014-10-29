<?php 
require_once Config::get('COMPONENT_DIR') . 'component.category.php';

$catId = $_GET['id'];
$objCat = new CategoryComponent();
$arrReturn = $objCat->getCategoryDetails($catId);
echo "<pre>";
print_r($arrReturn);
$catLevel = $arrReturn['main_category']['level'];
$arrSubCategory = $arrReturn['sub_category']['result'];



	if($catLevel == 1 || $catLevel == 2) {
		include_once Config::get('TEMPLATE_DIR') . 'category/cat_wise_product.php';
	} else if ($catLevel == 3) {
		include_once Config::get('TEMPLATE_DIR') . 'category/prod_list.php';
	}
	
?>

