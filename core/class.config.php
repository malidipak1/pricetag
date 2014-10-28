<?php
Class Config {
	
	private static $config = array();
	
	public static function load() {

		
		self::$config['DIR_SEPERATOR'] = DIRECTORY_SEPARATOR;
		self::$config['APP_DIR'] = dirname(dirname(__FILE__)) . self::$config['DIR_SEPERATOR'];
		self::$config['CORE_DIR'] = dirname(__FILE__) . self::$config['DIR_SEPERATOR'];
		self::$config['PUBLIC_HTML_DIR'] = self::$config['APP_DIR'] . "public_html" . self::$config['DIR_SEPERATOR'];
		
		self::$config['LIBRARY_DIR'] = self::$config['CORE_DIR'] . "lib" . self::$config['DIR_SEPERATOR'];
		self::$config['SMARTY_LIB_DIR'] = self::$config['LIBRARY_DIR'] . "Smarty-3.1.20" . self::$config['DIR_SEPERATOR'] . "libs" . self::$config['DIR_SEPERATOR'];
		
		self::$config['COMPONENT_DIR'] = self::$config['CORE_DIR'] . "components" . self::$config['DIR_SEPERATOR'];
		self::$config['MODEL_DIR'] = self::$config['CORE_DIR'] . "models" . self::$config['DIR_SEPERATOR'];
		
		self::$config['TEMPLATE_DIR'] = self::$config['PUBLIC_HTML_DIR'] . "template" .self::$config['DIR_SEPERATOR'];
		self::$config['TEMPLATE_COMPILE_DIR'] = self::get('CORE_DIR') . "templates_c" . self::$config['DIR_SEPERATOR'];
		self::$config['CACHE_DIR'] = self::get('CORE_DIR') . "cache" . self::$config['DIR_SEPERATOR'];
		
 		self::$config['WEBSITE_IMG'] = "";
		
 		self::$config['LAYOUT_DIR'] = Config::get('TEMPLATE_DIR') . "layout" . self::$config['DIR_SEPERATOR'];
 		
 		
 		//self::loadCronProp();
	}
	
	/* public static function loadCronProp () {
		self::$config['FLIPKART_FILE_PATH'] = "C:\\Users\\dipakm\\Documents\\Dipak\\Personal\\flipkart_prr\\flipkart\\";
	} */
	
	public static function get($key) {
		if($key != null){
			return self::$config[$key];
		} else {
			return "";
		}
	}
}
?>