<?php
require_once Config::get('COMPONENT_DIR') . 'component.product.php';

$catId = $arrReturn['main_category']['category_id'];
$catName =  $arrReturn['main_category']['category_name'];
$catLevel = $arrReturn['main_category']['level'];

$objProduct = new ProductComponent();
$arrTopProd =  $objProduct->getProductByCategory($catName, $catLevel);

$result = $arrTopProd['product_list']['result'];
unset($arrTopProd['product_list']['result']);
$page = $arrTopProd['product_list']['page'];
$firstPage = $arrTopProd['product_list']['first_page'];
$lastPage = $arrTopProd['product_list']['last_page'];
$offset = $arrTopProd['product_list']['offset'];
$perPage = $arrTopProd['product_list']['per_page'];
$recLeft = $arrTopProd['product_list']['record_left'];
//print_r($arrTopProd['product_list']);
?><div class="actprodcat">
		<div class="prodcont">
		<?php foreach ($result as $prodDetails) {
			$prodImg = explode(",", $prodDetails['prod_img']);
			if(strlen($prodDetails['prod_name']) <= 52) {
				$prodTitle = $prodDetails['prod_name'];
			} else {
				$prodTitle = substr($prodDetails['prod_name'], 0, 52) . "...";
			}
			$prodUrl = Config::get('WEBSITE_URL') . "product/view/id/" . $prodDetails['prod_id'] . "/name/" . Utilities::urlencode($prodDetails['prod_name']);
		?>
			<div class="prodiv">
				<a href="<?=$prodUrl?>"><img  alt="<?=$prodDetails['prod_name']?>" title="<?=$prodDetails['prod_name']?>" src="<?=$prodImg[0]?>" /></a><br/>
				<cite class="ttl" title="<?=$prodDetails['prod_name']?>"><a href="<?=$prodUrl?>"><?=$prodTitle?></a></cite><br/>
				<cite class="ttl">
					<?php if(!empty($prodDetails['prod_mrp'])) {?><strike class="f12">Rs.<?=$prodDetails['prod_mrp']?></strike><?php } ?>
					<b>Rs. <?=$prodDetails['prod_price']?></b>
				</cite><br/><br/>
				<!-- <input type="button" value="PLACE ORDER" style="background:#ed1c24;border-radius:6px;border: medium none;cursor: pointer;outline: medium none;width: 120px;font:bold 14px arial, verdana, sans-serif, FreeSans;color:#fff;padding:5px 10px;">-->
			</div>
		<?php } ?>
			<div class="clear">&nbsp;</div>
			<div id="container">
				<div class="pagination"><?=Utilities::getPagination($page, $lastPage)?></div>
			</div>
		</div>