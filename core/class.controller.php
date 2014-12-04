<?php
class Controller {
	
	private $module = null;
	private $component = null;
	private $template = null;
	
	public function run () {
		session_start();
		$param = array();
		if(empty($_GET['params'])) {
			$param = explode("/", Config::get('HOME_PAGE'));
		} else {
			$param = explode("/", $_GET['params']);
			unset($_GET['params']);
		}
		
		if($param[0] == "admin") 
		{
			$this->module = $param[0];
			
			if(empty($_SESSION['user_id'])) {
				$this->component = "user";
				$this->template = "login";
			} else  if(empty($param[1])) {
				$this->component = "pages";
				$this->template = "dashboard";
			} else {
				$this->component = $param[1];
				$this->template = $param[2];
			}
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
			$filename = Config::get('TEMPLATE_DIR') . $this->component . Config::get('DIR_SEPERATOR') . $this->template . ".php";
			if(!file_exists($filename)) {
				//$objSmarty->display($filename);
				$filename = Config::get('TEMPLATE_DIR') . "error" . Config::get('DIR_SEPERATOR') . "404.php";;
			}
			include_once (Config::get('LAYOUT_DIR') . 'new-header.php');
			include_once ($filename);
			include_once (Config::get('LAYOUT_DIR') . 'new-footer.php');
		
		} if ($this->module == "admin"){
		
			
			$filename = Config::get('TEMPLATE_DIR') ."admin" . Config::get('DIR_SEPERATOR') . $this->component . Config::get('DIR_SEPERATOR') . $this->template . ".php";
			if(!file_exists($filename)) {
				//$objSmarty->display($filename);
				$filename = Config::get('TEMPLATE_DIR') . "error" . Config::get('DIR_SEPERATOR') . "404.php";;
			}
			include_once (Config::get('LAYOUT_DIR') . 'admin_header.php');
			include_once ($filename);
			include_once (Config::get('LAYOUT_DIR') . 'admin_footer.php');
			
			/* echo "Admin Area Pages..<br>";
			echo "code for module specific page...dipak"; */
		}
	} 
	
	public static function load() {
		$controller = new Controller();
		$controller->run();
	}
}
?>