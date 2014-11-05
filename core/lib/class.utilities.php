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
	
	static function urlencode($str) {
		$str = str_replace("/", "", $str);
		return urlencode($str);
	}
	
	
	static function getPagination ($page, $lastPage = 1) {
		$paginationDisplay = "";
		$pagingUrl = Config::get('PAGING_URL');
		
		if($lastPage != 1) {
				
			$centerPages = "";
			$sub1 = $page - 1;
			$sub2 = $page - 2;
			$add1 = $page + 1;
			$add2 = $page + 2;
		
			if ($page == 1) {
				$centerPages .= '&nbsp; <div class="page active">&nbsp;' . $page . '&nbsp;</div> &nbsp;';
				$centerPages .= '&nbsp; <a  class="page" href="' .$pagingUrl . '?page=' . $add1 . '">&nbsp;' . $add1 . '&nbsp;</a> &nbsp;';
			} else if ($page == $lastPage) {
				$centerPages .= '&nbsp; <a  class="page" href="' .$pagingUrl . '?page=' . $sub1 . '">&nbsp;' . $sub1 . '&nbsp;</a> &nbsp;';
				$centerPages .= '&nbsp; <div class="page active">&nbsp;' . $page . '&nbsp;</div> &nbsp;';
			} else if ($page > 2 && $page < ($lastPage - 1)) {
				$centerPages .= '&nbsp; <a  class="page" href="' .$pagingUrl . '?page=' . $sub2 . '">&nbsp;' . $sub2 . '&nbsp;</a> &nbsp;';
				$centerPages .= '&nbsp; <a  class="page" href="' .$pagingUrl . '?page=' . $sub1 . '">&nbsp;' . $sub1 . '&nbsp;</a> &nbsp;';
				$centerPages .= '&nbsp; <div class="page active">&nbsp;' . $page . '&nbsp;</div> &nbsp;';
				$centerPages .= '&nbsp; <a  class="page" href="' .$pagingUrl . '?page=' . $add1 . '">&nbsp;' . $add1 . '&nbsp;</a> &nbsp;';
				$centerPages .= '&nbsp; <a class="page" href="' .$pagingUrl . '?page=' . $add2 . '">&nbsp;' . $add2 . '&nbsp;</a> &nbsp;';
			} else if ($page > 1 && $page < $lastPage) {
				$centerPages .= '&nbsp; <a class="page" href="' .$pagingUrl . '?page=' . $sub1 . '">&nbsp;' . $sub1 . '&nbsp;</a> &nbsp;';
				$centerPages .= '&nbsp; <div class="page active">&nbsp;' . $page . '&nbsp;</div> &nbsp;';
				$centerPages .= '&nbsp; <a class="page" href="' .$pagingUrl . '?page=' . $add1 . '">&nbsp;' . $add1 . '&nbsp;</a> &nbsp;';
			}
				
			$paginationDisplay = 'Page <strong>' . $page . '</strong> of ' . $lastPage. '&nbsp;  &nbsp;  &nbsp; ';
				
			if($page != 1) {
				$previous = 1;//$page - 1;
				$paginationDisplay .= '<a class="page" href="' .$pagingUrl . '?page=' . $previous . '">&nbsp;first&nbsp;</a>';
			}
			$paginationDisplay .=  $centerPages ;
			if ($page != $lastPage) {
				//$nextPage = $page + 1;
				$paginationDisplay .= '<a class="page" href="'. $pagingUrl . '?page=' . $lastPage . '">&nbsp;last&nbsp;</a>';
			}
		}
		return $paginationDisplay;
	}
	
}
?>