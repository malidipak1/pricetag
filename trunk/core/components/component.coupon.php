<?php
require_once Config::get('MODEL_DIR') . 'model.coupon.php';
require_once Config::get('MODEL_DIR') . 'model.sites.php';

class CouponComponent {
	
	public function addEditCoupon($couponId = 0) {
		$return_array = array();
		
		$objSiteModel = new SitesModel();
		$return_array['site_list'] = $objSiteModel->getAll();
		
		$objModel = new CouponModel();
		if(!empty($_POST)) {
		
			$couponId = $_POST['coupon_id'];
			$couponTitle = $_POST['coupon_title'];
			$couponDesc = $_POST['coupon_desc'];
			$couponLink = $_POST['coupon_link'];
			$couponCode = $_POST['coupon_code'];
			$couponSite = $_POST['coupon_site'];
			if($couponId <= 0) {
				$return_array['form_flag'] = $objModel->addCoupon($couponTitle, $couponDesc,$couponCode, $couponLink, $couponSite);
			} else {
				$return_array['form_flag'] = $objModel->updateCoupon($couponId, $couponTitle, $couponDesc,$couponCode, $couponLink, $couponSite);
			}			
		} 
		
		if ($couponId > 0) {
			$arrParam = array('coupon_id' => $couponId);
			$return_array['coupon_row'] = $objModel->getRow($arrParam);
		}
		return $return_array;
	}
	
	public function getAllCouponList() {
		$return_array = array();
		
		$objModel = new CouponModel();
		$objModel->isPaging = true;
		$objModel->pagingPerPage = 30;
		
		$return_array['result'] = $objModel->getAll();
		
		return $return_array;
	}
	
	public function getCouponDetails($id) {
		;
	}
}