<?php
require_once Config::get('MODEL_DIR') . 'model.pages.php';
class PagesComponent {
	
	public function contactUs($param  = array()) {
		$objPage = new PagesModel();
		
		$arrParam = array(':name' => $param['fname'], ':email' => $param['email'], ':subject' => $param['subject'], ':requirement' => $param['comm']);
		
		return $objPage->contactUs($arrParam);
	}
}