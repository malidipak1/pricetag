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
		$perPage = Config::get('PER_PAGE');
		if( isset($_GET{'page'} ) ) {
			$page = $_GET{'page'} - 1;
			$offset = $perPage * $page ;
		} else {
			$page = 0;
			$offset = 0;
		}
		
		$arrResult['page'] = $page;
		$arrResult['offset'] = $offset;
		
		return $arrResult;
	}
	
	
}
?>