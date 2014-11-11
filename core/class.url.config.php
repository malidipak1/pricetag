<?php
Class UrlConfig {
	
	private static $urlConfig = array();
	
	public static function load() {

		self::$urlConfig['ADMIN_LOGIN'] = Config::get('ADMIN_PANEL_URL') . "user/login";
		self::$urlConfig['ADMIN_HOME'] = Config::get('ADMIN_PANEL_URL') . "pages/dashboard";
		
		
		self::$urlConfig['ADMIN_COUPON_ADDEDIT'] = Config::get('ADMIN_PANEL_URL') . "coupon/addedit";
		self::$urlConfig['ADMIN_COUPON_LIST'] = Config::get('ADMIN_PANEL_URL') . "coupon/list";
		
	}
	
	public static function get($key) {
		if($key != null){
			return self::$urlConfig[$key];
		} else {
			return "";
		}
	}
}
?>