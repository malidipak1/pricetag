<?php 
require_once Config::get('COMPONENT_DIR') . 'component.category.php';


$objCat = new CategoryComponent();
$arrReturn = $objCat->getCategoryTree(	);
echo "<pre>";
		
		
	print_r($arrReturn);
	




?>