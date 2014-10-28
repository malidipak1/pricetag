<?php
require_once '../core/lib/class.db.mysql.php';
require_once '../core/models/model.cron.import.php';

class CronComponent {
	
	
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
					}
					
					$productId = $data [0];
					$title = $data [1];
					$imageUrlStr = $data [2];
					
					$mrpStr = explode ( ",", $data [3] );
					$priceStr = explode ( ",", $data [4] );
					$mrp = $mrpStr [0];
					$price = $priceStr [0];
					
					$productUrl = $data [5];
					
					$arrCatObj = json_decode ( $data [6] );
					
					$category1 = "";
					$category2 = "";
					$category3 = "";
					/* if ($arrCatObj [0] != null) {
						foreach ( $arrCatObj [0] as $key => $catObj ) {
							$categories .= $catObj->title . "~";
						}
						$categories = trim ( $categories, "~" );
					} */
					
					if(!empty($arrCatObj [0][0]))
						$category1 = $arrCatObj [0][0]->title;
					if(!empty($arrCatObj [0][0]))
						$category2 = $arrCatObj [0][1]->title;
					if(!empty($arrCatObj [0][0]))
						$category3 = $arrCatObj [0][2]->title;
					
					$productBrand = $data [7];
					$deliveryTime = $data [8];
					$inStock = $data [9];
					
					$codAvailable = ($data [10] == "false") ? 0 : 1;
					$emiAvailable = ($data [11] == "false") ? 0 : 1;
					
					$arrOfferObj = json_decode ( $data [12] );
					$offer = "";
					if ($arrOfferObj [0] != null)
						$offer = $arrOfferObj [0]->title;
					$discount = $data [13];
					
					$cashBackStr = explode ( ",", $data [14] );
					$cashBack = $cashBackStr [0];
					
					$arrData = array (
							':prod_code' => $productId,
							':prod_name' => $title,
							':prod_mrp' => $mrp,
							':prod_price' => $price,
							':prod_desc' => '',
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
					$objImport->importProduct ( $arrData );
					$flag = true;
				}
				//$objImport->close ();
			}
			fclose ( $handle );
		}
		return $flag;
	}
}
?>