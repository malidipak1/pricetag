<?php
class Application {

	
	
	public function loadConfig() {
		require_once 'class.config.php';
		Config::load();
	}
	
	
	public function loadApplication () {
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