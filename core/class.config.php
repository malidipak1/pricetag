<?php
Class Config {
	
	public static $config = array();
	
	public static function load() {

		self::$config['APP_NAME'] = "pricetag";
		echo self::$config['CORE_DIR'] = dirname(__FILE__);
		echo self::$config['PUBLIC_HTML_DIR'] = dir(__FILE__);
		
		
		
 		self::$config['WEBSITE_IMG'] = "";
		
	}
	
	public static function get($key) {
		if($key != null){
			return self::$config[$key];
		} else {
			return "";
		}
	}
}
?>