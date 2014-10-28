<?php 
require_once Config::get('COMPONENT_DIR') . 'component.category.php';

$catId = $_GET['id'];

$objCat = new CategoryComponent();
$arrReturn = $objCat->getCategoryDetails($catId);
echo "<pre>";
print_r($arrReturn);

foreach ($arrReturn as $catDetails) {
	
	
	{}
	
}






?>

