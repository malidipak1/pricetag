<?php
class Controller {
	
	private $module = null;
	private $component = null;
	private $template = null;
	
	public function run () {
		
		$param = array();
		$param = explode("/", $_GET['params']);
		unset($_GET['params']);
	
		if($param[0] == "admin") 
		{
			$this->module = $param[0];
			$this->component = $param[1];
			$this->template = $param[2];
			
			for ($i = 3; $i < count($param); $i = $i+2) {
				$key = $param[$i];
				$val = (empty($param[$i+1])) ? "" : $param[$i+1];
				
				$_GET[$key] = $val;
 			}
		} else {
			$this->component = $param[0];
			$this->template = $param[1];
				
			for ($i = 2; $i < count($param); $i = $i+2) {
				$key = $param[$i];
				$val = (empty($param[$i+1])) ? "" : $param[$i+1];
			
				$_GET[$key] = $val;
			}
		} 
		
		$this->loadModule();
		
		/* echo "<pre>";
		print_r($param);
		print_r($_GET);
		print_r($this); */
		
	}
	
	public function loadSmarty () {
		
		$objSmarty = new Smarty();
		$objSmarty->setCacheDir(Config::get('CACHE_DIR'));
		$objSmarty->setCompileDir(Config::get('TEMPLATE_COMPILE_DIR'));
		//$objSmarty->setPluginsDir($plugins_dir);
		$objSmarty->setTemplateDir(Config::get('TEMPLATE_DIR'));
		
		$objSmarty->assign("dipak", 'Dipak Mali');
		
		return $objSmarty;	
	}
	
	public function loadModule() {
		//$objSmarty = $this->loadSmarty();
		
		if(empty($this->module)) {
			echo $filename = Config::get('TEMPLATE_DIR') . $this->component . Config::get('DIR_SEPERATOR') . $this->template . ".php";
			if(file_exists($filename)) {
				include_once (Config::get('LAYOUT_DIR') . 'base-header.php');
				//$objSmarty->display($filename);
				include_once ($filename);
				include_once (Config::get('LAYOUT_DIR') . 'base-footer.php');
			} else {
				echo "404 page not found!"; 
			}
			
		} else {
			echo "code for module specific page...dipak";
		}
	}
	
	public static function load() {
		$controller = new Controller();
		$controller->run();
	}
}
?>