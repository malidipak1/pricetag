<?php

Class FlipkartModel {
	
	public function __construct() {
		
	}
	
	public function import($data = array()) {
		
		echo $sql = "INSERT INTO `products`( `prod_code`, `prod_name`, `prod_mrp`, `prod_price`, `prod_desc`, `prod_img`, `prod_brand`, `prod_cat`, `prod_link`, `is_cod`,
						 `is_emi`, `offer`, `discount`, `cash_back`) VALUES ('" . $data['prod_code'] . "', '". $data['prod_name'] . "', '". $data['prod_mrp'] . "', '". 
						$data['prod_price'] . "','" . $data['prod_desc'] ."', '". $data['prod_img'] . "', '". $data['prod_brand'] . "', '". $data['prod_cat'] . "', '". 
						$data['prod_link'] . "', '". $data['is_cod'] . "', '". $data['is_emi'] . "', '". $data['offer'] . "', '". $data['discount'] . "', '". 
						$data['cash_back'] . "')";
	
	}
}

?>