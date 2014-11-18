<?php 
require_once Config::get('COMPONENT_DIR') . 'component.product.php';
$prodId = $_GET['id'];
$objProd = new ProductComponent();
$result = $objProd->getProductDetails($prodId);

$prodDetails = $result;
$prodImg = explode(",", $prodDetails['prod_img']);
//print_r($result);
?><div class="actprodcat">
	<title><?=$prodDetails['prod_name']?></title>
				<div class="prodcont">
					<div class="breadcrum"><?=$prodDetails['prod_cat_1']?> >> <?=$prodDetails['prod_cat_2']?> >> <?=$prodDetails['prod_cat_3']?></div>
					<div class="h_divider">&#160;</div>
					<div class="clear"></div>
					<div class="proddetails">
					<div class="cont-desc span_1_of_2">				
					<div class="grid images_3_of_2">
						<a target="_blank" href="<?=Config::get('WEBSITE_URL')?>go/<?=$prodDetails['prod_code']?>"><img title="<?=$prodDetails['prod_name']?>" alt="<?=$prodDetails['prod_name']?>" src="<?=$prodImg[0]?>" /></a>
					</div>
					
				<div class="desc span_2_of_2">
					<h2><?=$prodDetails['prod_name']?> </h2>
					<p><?=$prodDetails['prod_desc']?></p>					
					
					<!-- <div class="available">
						<p>Available Options :</p>
					<ul>
						<li>Color:
							<select>
							<option>Silver</option>
							<option>Black</option>
							<option>Dark Black</option>
							<option>Red</option>
						</select></li>
						<li>Size:<select>
							<option>Large</option>
							<option>Medium</option>
							<option>small</option>
							<option>Large</option>
							<option>small</option>
						</select></li>
						<li>Quality:<select>
							<option>1</option>
							<option>2</option>
							<option>3</option>
							<option>4</option>
							<option>5</option>
						</select></li>
					</ul>
					</div> -->
					<!-- <div class="share">
						<p>Share Product :</p>
						<ul>
					    	<li><a href="#"><img alt="" src="images/youtube.png"></a></li>
					    	<li><a href="#"><img alt="" src="images/facebook.png"></a></li>
					    	<li><a href="#"><img alt="" src="images/twitter.png"></a></li>
					    	<li><a href="#"><img alt="" src="images/linkedin.png"></a></li>
			    		</ul>
					</div> -->
	
			</div>
		<!-- <div class="product-desc">
			<h2>Product Details</h2>
			<div style="text-align:center" class="ad728x90"><!-- Google ads -- ></div>
			<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
	        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
	    </div>
	    <div class="product-tags">
			<h2>Product Tags</h2>
			<h4>Add Your Tags:</h4>
			<div class="input-box">
				<input type="text" value="">
			</div>
			<div class="button"><span><a href="#">Add Tags</a></span></div>
	    </div>-->	
	    <div style="text-align:center" class="ad728x90"><!-- Google ads --></div>			
	</div>
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
						<!--  <a target="_blank" href="<?=Config::get('WEBSITE_URL')?>go/<?=$prodDetails['prod_code']?>"><img title="<?=$prodDetails['prod_name']?>" alt="<?=$prodDetails['prod_name']?>" src="<?=$prodImg[0]?>" /></a><br/>
						<h1><cite class="ttl"><?=$prodDetails['prod_name']?></cite></h1><br/>
						<cite class="ttl"><strike class="f12">Rs.<?=$prodDetails['prod_mrp']?></strike> <b>Rs. <?=$prodDetails['prod_price']?></b></cite><br/><br/>
						 <input type="button" value="PLACE ORDER" style="background:#ed1c24;border-radius:6px;border: medium none;cursor: pointer;outline: medium none;width: 120px;font:bold 14px arial, verdana, sans-serif, FreeSans;color:#fff;padding:5px 10px;">-->
					</div>
					
				</div>