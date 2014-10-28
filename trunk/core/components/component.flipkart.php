<?php
/**
 * @author Dipak Mali
 * @copyright @DipakMali
 * @version 1.0
 * @since 15 Oct 2014
 * 
 */

require_once Config::get('MODEL_DIR') . 'model.flipkart.php';

class FlipkartComponent {
	
	public function importData($param = '') {
		
		$file = Config::get('FLIPKART_FILE_PATH') ."flipkart-prod.csv";
		$row = 1;
		if (($handle = fopen ( $file, "r" )) !== FALSE) {
			while ( ($data = fgetcsv ( $handle )) !== FALSE ) {
				$num = count ( $data );
				echo "<p> $num fields in line $row: <br /></p>\n";
				$row ++;
				$productId = $data [0];
				$title = $data [1];
				$imageUrlStr = $data [2];
				
				$mrpStr = explode ( ",", $data [3] );
				$priceStr = explode ( ",", $data [4] );
				$mrp = $mrpStr [0];
				$price = $priceStr [0];
				
				$productUrl = $data [5];
				
				$arrCatObj = json_decode ( $data [6] );
				$categories = "";
				if ($arrCatObj [0] != null) {
					foreach ( $arrCatObj [0] as $key => $catObj ) {
						$categories .= $catObj->title . " | ";
					}
					$categories = trim ( $categories, " | " );
				}
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
						'prod_code' => $productId,
						'prod_name' => $title,
						'prod_mrp' => $mrp,
						'prod_price' => $price,
						'prod_desc' => '',
						'prod_img' => $imageUrlStr,
						'prod_brand' => $productBrand,
						'prod_cat' => $categories,
						'prod_link' => $productUrl,
						'is_cod' => $codAvailable,
						'is_emi' => $emiAvailable,
						'offer' => $offer,
						'discount' => $discount,
						'cash_back' => $cashBack 
				);
				
				
				$objFlipModel = new FlipkartModel();
				$objFlipModel->import($arrData);
				
				
			}
			fclose ( $handle );
		}
	}
}

?>