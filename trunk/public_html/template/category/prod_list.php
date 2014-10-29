<?php
require_once Config::get('COMPONENT_DIR') . 'component.product.php';

$catId = $arrReturn['main_category']['category_id'];
$catName =  $arrReturn['main_category']['category_name'];
$catLevel = $arrReturn['main_category']['level'];

$objProduct = new ProductComponent();
$arrTopProd =  $objProduct->getProductByCategory($catName, $catLevel);

print_r($arrTopProd);

?>