<?php 
require_once Config::get('COMPONENT_DIR') . 'component.product.php';
$prodId = $_GET['id'];
$objProd = new ProductComponent();
$result = $objProd->getProductDetails($prodId);

$prodDetails = $result;
$prodImg = explode(",", $prodDetails['prod_img']);
//print_r($result);
$imgCOD = ($prodDetails['is_cod'] == 1) ? "yes.png": "no.png";
$imgEMI = ($prodDetails['is_emi'] == 1) ? "yes.png": "no.png";

$imgCOD = Config::get('WEBSITE_URL') . "images/" . $imgCOD;
$imgEMI = Config::get('WEBSITE_URL') . "images/" . $imgEMI;
?>


<div class="main">
    <div class="content">
    	<div class="content_top">
    		<div class="back-links">
    		<p><a href="<?=Config::get('WEBSITE_URL')?>">Home</a> &gt;&gt; <a href="#">Electronics</a></p>
    	    </div>
    		<div class="sort">&nbsp;</div>
    		<div class="show">&nbsp;</div>
    		<div class="page-no">&nbsp;</div>
    		<div class="clear"></div>
    	</div>
    	<div class="section group">
				<div class="cont-desc span_1_of_2">				
					<div class="grid images_3_of_2">
						<img alt="<?=$result['prod_name']?>" src="<?=$prodImg[0]?>">
					</div>
				<div class="desc span_3_of_2">
					<h2><?=$result['prod_name']?></h2>
					<p>&nbsp;<!-- Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do  eiusmod tempor incididunt ut labore. Lorem ipsum dolor sit amet, 
						consectetur adipisicing elit, sed do eiusmod tempor incididunt ut  labore. --></p>					
					<div class="price">
						<p>Price: <?php if(!empty($prodDetails['prod_mrp'])) {?><strike>Rs. <?=$prodDetails['prod_mrp']?></strike><?php } ?>
						<span>Rs. <?=$prodDetails['prod_price']?></span></p>
					</div>
					<div class="available">
						<p><!-- Available Options : --> &nbsp;</p>
						<ul>
							<li><img width="15px" src="<?=$imgCOD?>" />&nbsp; COD</li>
							<li><img width="15px" src="<?=$imgEMI?>" />&nbsp; EMI</li>
							<li> &nbsp;</li>
						</ul>
					</div> 
					 <div class="share">&nbsp;
					<!--	<p>Share Product :</p>
						<ul>
					    	<li><a href="#"><img alt="" src="img/youtube.png"></a></li>
					    	<li><a href="#"><img alt="" src="img/facebook.png"></a></li>
					    	<li><a href="#"><img alt="" src="img/twitter.png"></a></li>
					    	<li><a href="#"><img alt="" src="img/linkedin.png"></a></li>
			    		</ul>-->
					</div> 
				<div class="add-cart">
					<!-- <div class="rating">
						<p>Rating:<img alt="" src="img/rating.png"><span>[3 of 5 Stars]</span></p>
					</div> -->
					<div class="button"><span><a target="_blank" href="<?=Config::get('WEBSITE_URL')?>go/<?=$result['prod_code']?>">Visit Store</a></span></div>
					<div class="clear"></div>
				</div>
			</div>
			<div class="ad728x90" style="text-align:center">&nbsp;</div>
			
			<div class="product-desc">
				<h2>Product Details</h2>
				<p><?=$result['prod_desc']?></p>
	    	</div>
	     <div class="product-tags">
		<!--	<h2>Product Tags</h2>
			<h4>Add Your Tags:</h4>
			<div class="input-box">
				<input type="text">
			</div>
			<div class="button"><span><a href="#">Add Tags</a></span></div>
			-->
	    </div>	 
	  
	</div>
				<div class="rightsidebar span_3_of_1">
					<h2>CATEGORIES</h2>
					<ul>
				      <li><a href="http://localhost:8090/pricetag/public_html/category/view/id/2/name/Mobiles+Phones/">Mobile Phones</a></li>
				      <li><a href="#">Desktop</a></li>
				      <li><a href="#">Laptop</a></li>
				      <li><a href="#">Accessories</a></li>
				      <li><a href="#">Software</a></li>
				      
    				</ul>
    				<div class="subscribe">
    					<h2>Newsletters Signup</h2>
    						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod.......</p>
						    <div class="signup">
							    <form>
							    	<input type="text" onblur="if (this.value == '') {this.value = 'E-mail address';" onfocus="this.value = '';" value="E-mail address"><input type="submit" value="Sign up">
							    </form>
						    </div>
      				</div>
      				 <div class="community-poll">
      				 	<h2>Community POll</h2>
      				 	<p>What is the main reason for you to purchase products online?</p>
      				 	<div class="poll">
      				 		<form>
      				 			<ul>
									<li>
									<input type="radio" value="1" class="radio" name="vote">
									<span class="label"><label>More convenient shipping and delivery </label></span>
									</li>
									<li>
									<input type="radio" value="2" class="radio" name="vote">
									<span class="label"><label for="vote_2">Lower price</label></span>
									</li>
									<li>
									<input type="radio" value="3" class="radio" name="vote">
									<span class="label"><label for="vote_3">Bigger choice</label></span>
									</li>
									<li>
									<input type="radio" value="5" class="radio" name="vote">
									<span class="label"><label for="vote_5">Payments security </label></span>
									</li>
									<li>
									<input type="radio" value="6" class="radio" name="vote">
									<span class="label"><label for="vote_6">30-day Money Back Guarantee </label></span>
									</li>
									<li>
									<input type="radio" value="7" class="radio" name="vote">
									<span class="label"><label for="vote_7">Other.</label></span>
									</li>
									</ul>
      				 		</form>
      				 	</div>
      				 </div>
 				</div>
 		</div>
 		
 		<!-- Start of Simillar Product -->
 		
 		<div class="content_top">
    		<div class="heading">
    			<h3>Similar Product</h3>
    		</div>
    	   <div class="clear"></div>
    	</div>
 		
 		<div class="section group">
				<div class="grid_1_of_4 images_1_of_4">
					 <a href="smart_store/web/preview-3.html"><img src="img/new-pic1.jpg" alt=""></a>
					 <div class="discount">
					 <span class="percentage">40%</span>
					</div>
					 <h2>Lorem Ipsum is simply </h2>
					 <p><span class="strike">$438.99</span><span class="price">$403.66</span></p>
				     <div class="button"><span><img src="img/cart.jpg" alt=""><a href="smart_store/web/preview-3.html" class="cart-button">Add to Cart</a></span> </div>
				     <div class="button"><span><a href="smart_store/web/preview-3.html" class="details">Details</a></span></div>
				</div>
				<div class="grid_1_of_4 images_1_of_4">
					<a href="smart_store/web/preview-4.html"><img src="img/new-pic2.jpg" alt=""></a>
					 <div class="discount">
					 <span class="percentage">22%</span>
					</div>
					 <h2>Lorem Ipsum is simply </h2>
					 <p><span class="strike">$667.22</span><span class="price">$621.75</span></p>
				      <div class="button"><span><img src="img/cart.jpg" alt=""><a href="smart_store/web/preview-4.html" class="cart-button">Add to Cart</a></span></div>
				     <div class="button"><span><a href="smart_store/web/preview-4.html" class="details">Details</a></span></div>
				</div>
				<div class="grid_1_of_4 images_1_of_4">
					<a href="smart_store/web/preview-2.html"><img src="img/feature-pic2.jpg" alt=""></a>
					<div class="discount">
					 <span class="percentage">55%</span>
					</div>
					 <h2>Lorem Ipsum is simply </h2>
					 <p><span class="strike">$457.22</span><span class="price">$428.02</span></p>
				      <div class="button"><span><img src="img/cart.jpg" alt=""><a href="smart_store/web/preview-2.html" class="cart-button">Add to Cart</a></span> </div>
				     <div class="button"><span><a href="smart_store/web/preview-2.html" class="details">Details</a></span></div>
				</div>
				<div class="grid_1_of_4 images_1_of_4">
				 <img src="img/new-pic3.jpg" alt="">
				  <div class="discount">
					 <span class="percentage">66%</span>
					</div>
					 <h2>Lorem Ipsum is simply </h2>					 
					 <p><span class="strike">$643.22</span><span class="price">$457.88</span></p>
				      <div class="button"><span><img src="img/cart.jpg" alt=""><a href="#" class="cart-button">Add to Cart</a></span> </div>
				     <div class="button"><span><a href="#" class="details">Details</a></span></div>
				</div>
			</div>
 		
 		<!-- End of Simillar Product -->
 	</div>
	</div>