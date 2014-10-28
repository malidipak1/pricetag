<?php

Class Model {
	
	protected $dbConn = null;
	
	public function __construct() {
		$this->dbConn = DbMysql::getConnection();
	}
	
	public function getAll($sql, $param = '') {
		$arrReturn = array();
		
		$stmt = $this->dbConn->query($sql);
		$arrReturn = $stmt->fetchAll(PDO::FETCH_ASSOC);
		return $arrReturn;;
	}

	public function getRow($sql, $param = '') {
		$arrReturn = array();
	
		$stmt = $this->dbConn->query($sql);
		$arrReturn = $stmt->fetch(PDO::FETCH_ASSOC);
		return $arrReturn;;
	}
	
	
}

?>