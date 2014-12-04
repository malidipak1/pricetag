<?php
class Application {
	
	
	public function loadConfig() {
		require_once 'class.config.php';
		require_once 'class.url.config.php';
		Config::load();
		UrlConfig::load();
	}
	
	
	public function loadApplication () {
		require_once Config::get('LIBRARY_DIR') . "class.utilities.php";
		require_once Config::get('LIBRARY_DIR') . "class.model.php";
		require_once Config::get('LIBRARY_DIR') . 'class.db.mysql.php';
		require_once Config::get('SMARTY_LIB_DIR') . "Smarty.class.php";
	}
	
	
	public function run() {
		$this->loadConfig();		
		$this->loadApplication();
		
		require_once 'class.controller.php';
		Controller::load();
	}
}
?>