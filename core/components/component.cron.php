<?php
require_once INCLUDE_DIR . '/core/lib/class.db.mysql.php';
require_once INCLUDE_DIR . '/core/models/model.cron.import.php';

class CronComponent {
	
	
	static function plotCategories() {
		$objImport = new CronProductImport ();
		$objImport->inActivateCategories();
		
		$arrCat = $objImport->getDistinctCategories();
		
		foreach ($arrCat as $row) {
	
			$objImport->insertCategory($row['prod_cat_1'], '', 1);
			
			if(!empty($row['prod_cat_2'])) {
				$objImport->insertCategory($row['prod_cat_2'], $row['prod_cat_1'], 2);
			}
			
			if(!empty($row['prod_cat_3'])) {
				$objImport->insertCategory($row['prod_cat_3'], $row['prod_cat_2'], 3);
			}
		}
	}
	
	
	static function snapdealImport ($file = '') {
		$flag = false;
		
		$row = 0;
		if (is_file ( $file )) {
			if (($handle = fopen ( $file, "r" )) !== FALSE) {
		
				//$objImport = new CronProductImport ();
		
				while ( ($data = fgetcsv ( $handle )) !== FALSE ) {
					$row ++;
					if ($row == 1) {
						continue;
					}
						
					$productId = $data [0];
					$title = $data [1];
					$prodDesc = $data[2];
					$productBrand = $data [3];
					$productUrl = $data [4];
					$imageUrlStr = $data [5];
					$category1 =  $data[9];
					$category2 = $data [7];
					$category3 = "";
					$mrp = $data[10];
					$price = $data[10];
					
					$deliveryTime = null;
					$inStock = null;
					$codAvailable = 0;
					$emiAvailable = 0;
					$offer = null;
					$discount = null;
					$cashBack = null;
						
					$arrData = array (
							':prod_code' => $productId,
							':prod_name' => $title,
							':prod_mrp' => $mrp,
							':prod_price' => $price,
							':prod_desc' => $prodDesc,
							':prod_img' => $imageUrlStr,
							':prod_brand' => $productBrand,
							':prod_cat_1' => $category1,
							':prod_cat_2' => $category2,
							':prod_cat_3' => $category3,
							':prod_link' => $productUrl,
							':is_cod' => $codAvailable,
							':is_emi' => $emiAvailable,
							':offer' => $offer,
							':discount' => $discount,
							':cash_back' => $cashBack,
							':prod_owner' => 2
					);
					print_r($arrData);
					//$objImport->importProduct ( $arrData );
					//$flag = true;
				}
				//$objImport->close ();
			}
			fclose ( $handle );
		}
		
		return flag;
	}
	
	
	static function flipkartImport($file = '') {
		$flag = false;
		$row = 0;
		if (is_file ( $file )) {
			if (($handle = fopen ( $file, "r" )) !== FALSE) {
				
				$objImport = new CronProductImport ();
				
				while ( ($data = fgetcsv ( $handle )) !== FALSE ) {
					// $num = count ( $data );
					$row ++;
					if ($row == 1) {
						continue;
					} /* else {
						break;
					} */
					
					//print_r($data);
					
					$count = 0;
					$productId = $data [$count++];
					$title = $data [$count++];
					$desc = $data[$count++];
					$imageUrlStr = $data [$count++];
					
					$mrpStr = explode ( ",", $data [$count++] );
					$priceStr = explode ( ",", $data [$count++] );
					$mrp = $mrpStr [0];
					$price = $priceStr [0];
					
					$productUrl = $data [$count++];
					
					$catStr = $data [$count++];
					$arrCatObj = json_decode ( $catStr );
						
					$category1 = "";
					$category2 = "";
					$category3 = "";
					/* if ($arrCatObj [0] != null) {
					 foreach ( $arrCatObj [0] as $key => $catObj ) {
					 $categories .= $catObj->title . "~";
					 }
					 $categories = trim ( $categories, "~" );
					 } */
						
					if(JSON_ERROR_NONE == json_last_error()) { 
						if(!empty($arrCatObj [0][0]))
							$category1 = $arrCatObj [0][0]->title;
						if(!empty($arrCatObj [0][0]))
							$category2 = $arrCatObj [0][1]->title;
						if(!empty($arrCatObj [0][0]))
							$category3 = $arrCatObj [0][2]->title;
					} else {
						$catStr = explode(";", $catStr);
						$arrCatObj = explode(">",$catStr[0]);
						
						if(!empty($arrCatObj[0]))
							$category1 = $arrCatObj [0];
						if(!empty($arrCatObj [1]))
							$category2 = $arrCatObj [1];
						if(!empty($arrCatObj [2]))
							$category3 = $arrCatObj [2];
					}
					$productBrand = $data [$count++];
					$deliveryTime = $data [$count++];
					$inStock = $data [$count++];
					
					$codAvailable = ($data [$count++] == "false") ? 0 : 1;
					$emiAvailable = ($data [$count++] == "false") ? 0 : 1;
					
					$arrOfferObj = json_decode ( $data [$count++] );
					$offer = "";
					if ($arrOfferObj [0] != null)
						$offer = $arrOfferObj [0]->title;
					$discount = $data [$count++];
					
					$cashBackStr = explode ( ",", $data [$count++] );
					$cashBack = $cashBackStr [0];
					
					$size = $data [$count++];
					$color = $data [$count++];
					
					
					$arrData = array (
							':prod_code' => $productId,
							':prod_name' => $title,
							':prod_mrp' => $mrp,
							':prod_price' => $price,
							':prod_desc' => $desc,
							':prod_img' => $imageUrlStr,
							':prod_brand' => $productBrand,
							':prod_cat_1' => $category1,
							':prod_cat_2' => $category2,
							':prod_cat_3' => $category3,
							':prod_link' => $productUrl,
							':is_cod' => $codAvailable,
							':is_emi' => $emiAvailable,
							':offer' => $offer,
							':discount' => $discount,
							':cash_back' => $cashBack,
							':prod_owner' => 1
					);
					
					if(($inStock == "true" || $inStock == true) && !empty($category1)) { 
						$objImport->importProduct ( $arrData );
						$flag = true;
					}
				}
				//$objImport->close ();
			}
			fclose ( $handle );
		}
		return $flag;
	}
}
?>