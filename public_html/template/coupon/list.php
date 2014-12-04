<?php 
require_once Config::get('COMPONENT_DIR') . 'component.coupon.php';
$objComp = new CouponComponent();
$arrResp = $objComp->getAllCouponList();

//print_r($arrResp);
$arrCoupon = $arrResp['result']['result'];
//echo "<br><br><br>";
//print_r($arrCoupon);
?>


<div class="main">
    <div class="content">
 	
 	    <div class="content_top">
    		<div class="heading">
    			<h3><a href="#">Coupons for </a> (Products)</h3>
    		</div>
    	   <div class="clear"></div>
    	</div>
 
 		<div class="section group">
 		
 		<div>
 		<?php foreach ($arrCoupon as $couponDetail) { ?>
 		<div class="grid_1_of_4 coupon_box" >
 			<a href="#"><img src="#" alt="#"></a>
					 <h2><?=$couponDetail['coupon_title']?></h2>
					 <p><?=$couponDetail['coupon_desc']?></p>
					 <p>
					<!--  <span class="code">Rs. 100</span></p> -->
				     <div class="txt-rt button"><span><a href="<?=$couponDetail['coupon_link']?>">Coupon Code</a></span></div>
 		</div>
 		<?php }?>
 		
 		</div>
 		<div class="rightsidebar span_3_of_1">
 		dipak
 		</div>
 		
 		</div>
 		
    </div>
 </div>