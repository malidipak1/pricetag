<?php
class Application {

	public function loadConfig() {
		require_once 'class.config.php';
		Config::load();
	}
	public function run() {
		echo "Test";
		$this->loadConfig();		
		
		require_once 'class.controller.php';
		Controller::load();
	}
}
?>