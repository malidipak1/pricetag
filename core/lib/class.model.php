<?php

Class Model {
	
	protected $dbConn = null;
	public $isPaging = false;
	
	public $pagingPerPage = 0;
	protected  $table = "";
	
	public function __construct() {
		$this->dbConn = DbMysql::getConnection();
	}
	
	public function getAll($param = array()) {

		$whereClause = $this->getWhereClause($param);		
		
		$sql = "SELECT * FROM " . $this->table . " where " . $whereClause;
		$arrReturn = array();
		
		if($this->isPaging) {
			if($this->pagingPerPage == 0) {
				$perPage = Config::get('PER_PAGE');
			} else {
				$perPage = $this->pagingPerPage;
			}
			$totalCount = $this->getCount($param);
			$arrOffset = Utilities::getPagingOffset();
			$page = $arrOffset['page'];
			$offSet = $arrOffset['offset'];
			
			$recLeft = $totalCount - ($page * $perPage);
			
			$arrReturn['total_count'] = $totalCount;
			$arrReturn['page'] = $page;
			$arrReturn['offset'] = $offSet;
			$arrReturn['per_page'] = $perPage;
			$arrReturn['record_left'] = $recLeft;
			$arrReturn['first_page'] = 1;
			$arrReturn['last_page'] = ceil($totalCount / $perPage);
			
			/* if( $page > 0 ) {
				$last = $page - 2;
				echo "<a href=\"$_PHP_SELF?page=$last\">Last 10 Records</a> |";
				echo "<a href=\"$_PHP_SELF?page=$page\">Next 10 Records</a>";
			} else if( $page == 0 ) {
				echo "<a href=\"$_PHP_SELF?page=$page\">Next 10 Records</a>";
			} else if( $left_rec < $perPage ) {
				$last = $page - 2;
				echo "<a href=\"$_PHP_SELF?page=$last\">Last 10 Records</a>";
			} */
			
			$sql .= " limit " . $offSet . ", " . $perPage;
		}
		//echo $sql;
		$stmt = $this->dbConn->query($sql);
		
		$arrReturn['result'] = $stmt->fetchAll(PDO::FETCH_ASSOC);
		return $arrReturn;
	}

	public function getRow($param = array()) {
		$arrReturn = array();
		$whereClause = $this->getWhereClause($param);
		
		$sql = "SELECT * FROM " . $this->table . " where " . $whereClause;
		$stmt = $this->dbConn->query($sql);
		$arrReturn = $stmt->fetch(PDO::FETCH_ASSOC);
		return $arrReturn;;
	}
	
	public function getCount($param = array()) {
		
		$whereClause = $this->getWhereClause($param);
		
		$sql = "SELECT count(1) as count FROM " . $this->table . " where " . $whereClause;
		$stmt = $this->dbConn->query($sql);
		$result = $stmt->fetch(PDO::FETCH_ASSOC);
		return $result['count'];
		
	}
	
	private function getWhereClause ($param = array()) {
		$whereClause = '';
		
		$flag = false;
		foreach ($param as $key => $value) {
			if($flag) {
				$whereClause .= " and " . $key . " = '" . $value . "' " ;
			} else {
				$whereClause .= " " . $key . " = '" . $value . "' " ;
				$flag = true;
			}
		}
		
		if ($whereClause == '') {
			$whereClause = " 1=1 ";
		}
		
		return $whereClause;
	}
	
}

?>