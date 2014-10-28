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
}
?>