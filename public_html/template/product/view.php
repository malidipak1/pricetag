<?php 
require_once Config::get('COMPONENT_DIR') . 'component.product.php';
$prodId = $_GET['id'];
$objProd = new ProductComponent();
$result = $objProd->getProductDetails($prodId);

$prodDetails = $result;
$prodImg = explode(",", $prodDetails['prod_img']);
print_r($result);
?><div class="actprodcat">
	<title><?=$prodDetails['prod_name']?></title>
				<div class="prodcont">
					<div class="breadcrum"><?=$prodDetails['prod_cat_1']?> >> <?=$prodDetails['prod_cat_2']?> >> <?=$prodDetails['prod_cat_3']?></div>
					<div class="h_divider">&#160;</div>
					<div class="proddetails">
						<a target="_blank" href="<?=Config::get('WEBSITE_URL')?>go/<?=$prodDetails['prod_code']?>"><img title="<?=$prodDetails['prod_name']?>" alt="<?=$prodDetails['prod_name']?>" src="<?=$prodImg[0]?>" /></a><br/>
						<h1><cite class="ttl"><?=$prodDetails['prod_name']?></cite></h1><br/>
						<cite class="ttl"><strike class="f12">Rs.<?=$prodDetails['prod_mrp']?></strike> <b>Rs. <?=$prodDetails['prod_price']?></b></cite><br/><br/>
						<!-- <input type="button" value="PLACE ORDER" style="background:#ed1c24;border-radius:6px;border: medium none;cursor: pointer;outline: medium none;width: 120px;font:bold 14px arial, verdana, sans-serif, FreeSans;color:#fff;padding:5px 10px;">-->
					</div>
					
				</div>