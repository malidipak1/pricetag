<?php
require_once Config::get('MODEL_DIR') . 'model.coupon.php';

class CouponComponent {
	
	public function addEditCoupon() {
		$return_array = array();
		if(!empty($_POST)) {
			$couponTitle = $_POST['coupon_title'];
			$couponDesc = $_POST['coupon_desc'];
			$couponLink = $_POST['coupon_link'];
			$couponCode = $_POST['coupon_code'];
			
			$objModel = new CouponModel();
			$return_array['form_flag'] = $objModel->addCoupon($couponTitle, $couponDesc, $couponLink, $couponCode);
			
		}
		return $return_array;
	}
	
}