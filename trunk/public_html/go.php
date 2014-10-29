<?php
require_once '../core/lib/class.db.mysql.php';
require_once '../core/lib/class.model.php';
require_once '../core/lib/class.utilities.php';
require_once '../core/models/model.product.php';

define ( 'DB_NAME', 'pricetag' );
define ( 'DB_HOST', 'localhost' );
define ( 'DB_PASSWD', '' );
define ( 'DB_USER', 'root' );

ini_set("error_reporting", true);
ini_set("display_errors", 1);

$url = "http://localhost:8090/pricetag/public_html/";

$param = explode("/", $_GET['params']);

if($param[0] == 'go') {
	
	$arrParam = array('prod_code' => $param[1]);
	$objProductModel = new ProductModel();
	$prodDetails = $objProductModel->getRow($arrParam);
	
	print_r($prodDetails['prod_link']);
	switch ($prodDetails['prod_owner'] ) {
		
		case 1:
			$url = $prodDetails['prod_link'];
			break;
		
		default:		
			//$url = "";
	}
	
	
} 
header( "Location: " . $url);
die;


?>