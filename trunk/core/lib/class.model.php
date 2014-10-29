<?php

Class Model {
	
	protected $dbConn = null;
	public $isPaging = false;
	
	protected  $table = "";
	
	public function __construct() {
		$this->dbConn = DbMysql::getConnection();
	}
	
	public function getAll($param = array()) {

		$whereClause = '';
		foreach ($param as $key => $value) {
			$whereClause .= " " . $key . " = '" . $value . "' " ;	
		}
		
		if ($whereClause == '') {
			$whereClause = " 1=1 ";
		}
		$sql = "SELECT * FROM " . $this->table . " where " . $whereClause;
		$arrReturn = array();
		
		if($this->isPaging) {
			$perPage = Config::get('PER_PAGE');
			$totalCount = $this->getCount($param);
			$arrOffset = Utilities::getPagingOffset();
			$page = $arrOffset['page'];
			$offSet = $arrOffset['offset'];
			
			$arrReturn['total_count'] = $totalCount;
			$arrReturn['page'] = $page;
			$arrReturn['offset'] = $offSet;
			$arrReturn['per_page'] = $perPage;
			
			$recLeft = $totalCount - ($page * $perPage);
			$arrReturn['record_left'] = $recLeft;
			
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
		$whereClause = '';
		foreach ($param as $key => $value) {
			$whereClause .= " " . $key . " = '" . $value . "' " ;
		}
		if ($whereClause == '') {
			$whereClause = " 1=1 ";
		}
		
		$sql = "SELECT * FROM " . $this->table . " where " . $whereClause;
		
		$stmt = $this->dbConn->query($sql);
		$arrReturn = $stmt->fetch(PDO::FETCH_ASSOC);
		return $arrReturn;;
	}
	
	public function getCount($param = array()) {
		
		$whereClause = '';
		foreach ($param as $key => $value) {
			$whereClause .= " " . $key . " = '" . $value . "' " ;
		}
		if ($whereClause == '') {
			$whereClause = " 1=1 ";
		}
		
		$sql = "SELECT count(1) as count FROM " . $this->table . " where " . $whereClause;
		$stmt = $this->dbConn->query($sql);
		$result = $stmt->fetch(PDO::FETCH_ASSOC);
		return $result['count'];
		
	}
	
	
}

?>