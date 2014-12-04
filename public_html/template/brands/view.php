<?php
require_once Config::get('COMPONENT_DIR') . 'component.product.php';

	$brandName = $_GET['id'];
	$objProduct = new ProductComponent();
	$arrTopProd =  $objProduct->getProductByBrand($brandName);
//print_r($arrTopProd);
	//die;
	$result = $arrTopProd['product_list']['result'];
	unset($arrTopProd['product_list']['result']);
	$page = $arrTopProd['product_list']['page'];
	$firstPage = $arrTopProd['product_list']['first_page'];
	$lastPage = $arrTopProd['product_list']['last_page'];
	$offset = $arrTopProd['product_list']['offset'];
	$perPage = $arrTopProd['product_list']['per_page'];
	//$recLeft = $arrTopProd['product_list']['record_left'];
	$totalCount = $arrTopProd['product_list']['total_count'];
	//$catLink = Config::get('WEBSITE_URL') . "category/view/id/" . $subCatId . "/name/" . urlencode($subCatName) . "/";
	?>
	
 <div class="main">
    <div class="content">
    
    	<div class="content_top">
    		<div class="heading">
    			<h3><a href="#"><?=$brandName?></a> (<?=$totalCount?> Products)</h3>
    		</div>
    	   <div class="clear"></div>
    	</div>
    	  <div class="section group">
    	  
    	      	<?php foreach ($result as $prodDetails) {
					$prodImg = explode(",", $prodDetails['prod_img']);
					if(strlen($prodDetails['prod_name']) <= 52) {
						$prodTitle = $prodDetails['prod_name'];
					} else {
						$prodTitle = substr($prodDetails['prod_name'], 0, 52) . "...";
					}
					$prodUrl = Config::get('WEBSITE_URL') . "product/view/id/" . $prodDetails['prod_id'] . "/name/" . Utilities::urlencode($prodDetails['prod_name']);
				?>
    			<div class="grid_1_of_4 images_1_of_4">
					 <a href="<?=$prodUrl?>"><img src="<?=$prodImg[0]?>" alt="<?=$prodDetails['prod_name']?>"></a>
					 <h2><?=$prodTitle?></h2>
					 <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
					 <p>
					 <?php if(!empty($prodDetails['prod_mrp'])) {?><span class="strike">Rs. <?=$prodDetails['prod_mrp']?></span><?php } ?>
					<span class="price">Rs. <?=$prodDetails['prod_price']?></span></p>
					  <!-- <div class="button"><span><img src="img/cart.jpg" alt=""><a href="" class="cart-button">Add to Cart</a></span> </div> -->
				     <div class="button"><span><a href="<?=$prodUrl?>" class="details">Details</a></span></div>
				</div>
				
				<?php } ?>
			</div>
	<div class="clear">&nbsp;</div>
			<div id="container">
				<div class="pagination"><?=Utilities::getPagination($page, $lastPage)?></div>
			</div>
			
    </div>
 </div>