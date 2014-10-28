<?php


Class CronProductImport extends Model{
	
	public function __construct() {
		parent::__construct();		
	}
	
	public function updateProduct($data = array()) {
		$sql = "UPDATE `products` SET `prod_name`=:prod_name,`prod_mrp`=:prod_mrp,`prod_price`=:prod_price,`prod_desc`=:prod_desc,
				`prod_img`=:prod_img,`prod_brand`=:prod_brand,`prod_cat_1`=:prod_cat_1,`prod_cat_2`=:prod_cat_2,`prod_cat_3`=:prod_cat_3,`prod_link`=:prod_link,`is_cod`=:is_cod,`is_emi`=:is_emi,`offer`=:offer,
				`discount`=:discount,`cash_back`=:cash_back, `prod_owner`=:prod_owner WHERE `prod_code`=:prod_code";
		
		$stmt = $this->dbConn->prepare($sql);
		
		foreach ($data as $key => $val) {
			$stmt->bindValue($key, $val); // should not use bindParam();
		}
		$stmt->execute();
		echo "Updated product..." . $data[':prod_code'];
	}
	
	
	public function insertProduct($data = array()) {
		
		if(!empty($data[':prod_code'])) {
			$sql = "INSERT INTO `products`( `prod_code`, `prod_name`, `prod_mrp`, `prod_price`, `prod_desc`, `prod_img`, `prod_brand`, `prod_cat_1`, `prod_cat_2`, `prod_cat_3`, `prod_link`, `is_cod`,
					`is_emi`, `offer`, `discount`, `cash_back`, `prod_owner`) VALUES (:prod_code, :prod_name, :prod_mrp, :prod_price, :prod_desc, :prod_img, :prod_brand, 
					:prod_cat_1, :prod_cat_2, :prod_cat_3, :prod_link, :is_cod, :is_emi, :offer, :discount, :cash_back, :prod_owner)";
			
			$stmt = $this->dbConn->prepare($sql);
			
			foreach ($data as $key => $val) {
				$stmt->bindValue($key, $val); // should not use bindParam();
			}
			$stmt->execute();
			echo "Inserted product..." . $data[':prod_code'];
		}
	}
	
	
	public function importProduct ($data = array()) {
		
		$result = $this->getProduct($data[':prod_code']);
		
		if(empty($result['prod_code'])) {
			$this->insertProduct($data);
		} else {
			$this->updateProduct($data);
		}
	}
	
	public function getProduct($prod_code) {
		$arrReturn = array();
		$sql = "select * from products where prod_code = '" . $prod_code . "'";
		
		$stmt = $this->dbConn->query($sql);
		$arrReturn = $stmt->fetch(PDO::FETCH_ASSOC);
		
		return $arrReturn;
	}
}

?>