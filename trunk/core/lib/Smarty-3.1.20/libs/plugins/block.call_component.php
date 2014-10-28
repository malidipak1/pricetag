<?php

function smarty_block_call_component($params, $content, &$smarty, &$repeat = true)
{
    if (is_null($content)) {
		echo "call_component..dipak";
		return "";
    }
    $outputReturn = array();
    $component = null;
    $method = null;
    $arrParam= array();

    foreach ($params as $_key => $_val) {
        switch ($_key) {
            case 'component':
                $$_key = (string) $_val;
                break;

            case 'method':
                $$_key = (string) $_val;
                break;

			case 'param':
            	$arrParam = $_val; 
				break;
				
            default:
                trigger_error("{call_component} unknown attribute '" . $_key . "'");
        }
    }

    $classFileName = Config::get('COMPONENT_DIR') . "component." . $component . ".php";
    
    $className = ucfirst($component) . "Component";

    if(file_exists($classFileName )) {
    	require_once $classFileName;
	    if(class_exists($className)) {
	    	$objComponent = null;
	    	
	    	$objComponent = new $className();
	    	
    		if(method_exists($objComponent, $method)) {
	    		//$_output = call_user_method($method, $objComponent, $arrParam);
	    		$outputReturn = $objComponent->$method();
	    	}
	    } else {
	    	trigger_error("{call_component} class $className could not find", E_USER_WARNING);
	    }
    } else {
    	throw new SmartyException("[plugin] {call_component} cannot find the resource'" .$classFileName . "'");
    }
    //$smarty->assign("TestVar", "Value is my name");
    //echo "<pre>";
    //print_r($smarty);
 	foreach ($outputReturn as $key => $val) {
 		echo "assigning vars " . $key . "-->" . $val;
 		
 		$smarty->assign($key, $val);
 	}

    return $content;
}
