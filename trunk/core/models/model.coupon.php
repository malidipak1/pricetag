<?php

class CouponModel extends Model{
	
	public function __construct() {
		$this->table = "coupons";
		parent::__construct();
	}
	
	public function addCoupon($title, $desc, $code, $link) {
		
		if(!(empty($title) || empty($link))) {
		
			$data = array(':coupon_title' => $title, 
							':coupon_desc' => $desc,
							':coupon_code' => $code,
							':coupon_link' => $link
						);
			
			$sql = "INSERT INTO `pricetag`.`coupons` (`coupon_title`, `coupon_desc`, `coupon_code`, `coupon_link`) " .
					" VALUES (:coupon_title, :coupon_desc, :coupon_code, :coupon_link)";
			
			return $this->executeUpdate($sql, $data);
		}
	}

	public function updateCoupon($id, $title,  $desc, $code, $link) {
		if(!(empty(id) || empty($title) || empty($link))) {
		
			$data = array(':coupon_id' => $id,
							':coupon_title' => $title, 
							':coupon_desc' => $desc,
							':coupon_code' => $code,
							':coupon_link' => $link
						);
			
			$sql = "UPDATE `coupons` SET `coupon_title`=:coupon_title,`coupon_desc`=:coupon_desc,`coupon_code`=:coupon_code,`coupon_link`=:coupon_link " .
					 " WHERE `coupon_id`=:coupon_id";
					
			return $this->executeUpdate($sql, $data);
		}
	}
	

	
}

?>