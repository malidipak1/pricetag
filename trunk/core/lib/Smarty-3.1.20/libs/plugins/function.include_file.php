<?php
function smarty_function_include_file($params, $template)
{
	 if (empty($params['template'])) {
        trigger_error("[plugin] include_file parameter 'template' cannot be empty", E_USER_NOTICE);
        return;
    }
    
	$component = '';
	$template_file = '';

	foreach ($params as $_key => $_val) {
		switch ($_key) {
			case 'component' :
				$component = (string)$_val;
				break;
			
			case 'template' :
				$template_file = (string)$_val;	
				break;
				
			default:
				trigger_error("textformat: unknown attribute '$_key'");
		}
	}
	
	if($component == '') {
		$fileName =  dirname($template->template_resource) . Config::get('DIR_SEPERATOR') . $template_file . ".php";
	} else {
		$fileName =  Config::get('TEMPLATE_DIR') . $component . Config::get('DIR_SEPERATOR') . $template_file . ".php";
	}
	
	//print_r($template);
	if(file_exists($fileName)) {
		 include ($fileName);
	} else {
		throw new SmartyException("{include_file} cannot find the resource '" . $params['component'] . "' and '" . $params['template'] . "'");
	}
	
}?>