<?php

class PagesModel extends Model {
	
	public function __construct() {
		parent::__construct();
	}
	
	public function contactUs($data = array()) {
		$flag = false;
		if(!empty($data[':email'])) {
			$sql = "INSERT INTO `pricetag`.`contact_us` ( `name`, `email`, `subject`, `requirement`) VALUES ( :name, :email, :subject, :requirement)";
			$stmt = $this->dbConn->prepare($sql);
			
			foreach ($data as $key => $val) {
				$stmt->bindValue($key, $val); // should not use bindParam();
			}
			$stmt->execute();
			$flag = true;
		}
		return $flag;
	}
	
}

?>