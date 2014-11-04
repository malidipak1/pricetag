<div class="actprodcat">
		<div class="prodcont">
<?php
require_once Config::get('COMPONENT_DIR') . 'component.product.php';

foreach ($arrSubCategory as $catDetails) {
	$subCatId = $catDetails['category_id'];
	$subCatName = $catDetails['category_name'];
	$catLevel =  $catDetails['level'];

	$objProduct = new ProductComponent();
	$arrTopProd =  $objProduct->getProductTopByCategory($subCatName, $catLevel, 5);
	
	$result = $arrTopProd['product_list']['result'];
	unset($arrTopProd['product_list']['result']);
	$page = $arrTopProd['product_list']['page'];
	$firstPage = $arrTopProd['product_list']['first_page'];
	$lastPage = $arrTopProd['product_list']['last_page'];
	$offset = $arrTopProd['product_list']['offset'];
	$perPage = $arrTopProd['product_list']['per_page'];
	$recLeft = $arrTopProd['product_list']['record_left'];
	$totalCount = $arrTopProd['product_list']['total_count'];
	$catLink = Config::get('WEBSITE_URL') . "category/view/id/" . $subCatId . "/name/" . urlencode($subCatName) . "/";
?>
			<div style="float: left;width: 80%;"> <a href="<?=$catLink?>"><?=$subCatName?></a> (<?=$totalCount?> Products)</div>
				<?php foreach ($result as $prodDetails) {
					$prodImg = explode(",", $prodDetails['prod_img']);
					if(strlen($prodDetails['prod_name']) <= 52) {
						$prodTitle = $prodDetails['prod_name'];
					} else {
						$prodTitle = substr($prodDetails['prod_name'], 0, 52) . "...";
					}
				?>
					<div class="prodiv">
						<img src="<?=$prodImg[0]?>" /><br/>
						<cite class="ttl" title="<?=$prodDetails['prod_name']?>"><?=$prodTitle?></cite><br/>
						<cite class="ttl">
							<?php if(!empty($prodDetails['prod_mrp'])) {?><strike class="f12">Rs.<?=$prodDetails['prod_mrp']?></strike><?php } ?>
							<b>Rs. <?=$prodDetails['prod_price']?></b>
						</cite><br/><br/>
						<input type="button" value="PLACE ORDER" style="background:#ed1c24;border-radius:6px;border: medium none;cursor: pointer;outline: medium none;width: 120px;font:bold 14px arial, verdana, sans-serif, FreeSans;color:#fff;padding:5px 10px;">
					</div>
				<?php } ?>
				<div class="clear">&nbsp;</div>
			
<?php } ?>		
	</div>