<?php
class Utilities {
	
	
	static function readDirectory($dir = "root_dir/here") {
		$listDir = array ();
		if ($handler = opendir ( $dir )) {
			while ( ($sub = readdir ( $handler )) !== FALSE ) {
				if ($sub != "." && $sub != ".." && $sub != "Thumb.db") {
					if (is_file ( $dir . "/" . $sub )) {
						$listDir [] = $sub;
					} elseif (is_dir ( $dir . "/" . $sub )) {
						$listDir [$sub] = self::readDirectory ( $dir . "/" . $sub );
					}
				}
			}
			closedir ( $handler );
		}
		return $listDir;
	}
	
	static function getPagingOffset() {
		$arrResult = array();
		
		if (isset($_GET['page'])) { 
			$page = preg_replace('#[^0-9]#i', '', $_GET['page']); // filter everything but numbers for security(new)
		} else { // If the pn URL variable is not present force it to be value of page number 1
			$page = 1;
		}
		
		$perPage = Config::get('PER_PAGE');
		/* if( isset($_GET{'page'} ) ) {
			$page = $_GET{'page'};
			$offset = $perPage * ($page-1) ;
		} else {
			$page = 0;
			$offset = 0;
		} */
		$offset = $perPage * ($page-1) ;
		$arrResult['page'] = $page;
		$arrResult['offset'] = $offset;
		
		return $arrResult;
	}
	
	
}
?>