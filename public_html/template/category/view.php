<?php 
require_once Config::get('COMPONENT_DIR') . 'component.category.php';

$catId = $_GET['id'];
$objCat = new CategoryComponent();
$arrReturn = $objCat->getCategoryDetails($catId);
//echo "<pre>";
//print_r($arrReturn);
$catLevel = $arrReturn['main_category']['level'];
$arrSubCategory = $arrReturn['sub_category']['result'];

//echo count($arrSubCategory );
	if($catLevel == 1) {
		include_once Config::get('TEMPLATE_DIR') . 'category/cat_wise_product.php';
	} else if($catLevel == 2) {
		include_once Config::get('TEMPLATE_DIR') . 'category/cat_wise_product.php';
		/* if(count($arrSubCategory) == 1) {
			
		} else {
			
		} */
	} else if ($catLevel == 3) {
		include_once Config::get('TEMPLATE_DIR') . 'category/prod_list.php';
	}
	
?><!-- <div class="actprodcat">
				<div class="prodcont">
					<div class="prodiv">
						<img src="http://imshopping.rediff.com/imgshop/180-180/shopping/pixs/17974/-/-1733771-1-19b9f._apple-ipad-with-retina-display-with-wi-fi-16gb-white.jpg" /><br/>
						<cite class="ttl">Apple Ipad With Retina Display With Wi-fi 16GB - White</cite><br/>
						<cite class="ttl"><strike class="f12">Rs.28,900</strike> <b>Rs. 25,500</b></cite><br/><br/>
						<input type="button" value="PLACE ORDER" style="background:#ed1c24;border-radius:6px;border: medium none;cursor: pointer;outline: medium none;width: 120px;font:bold 14px arial, verdana, sans-serif, FreeSans;color:#fff;padding:5px 10px;">
					</div>
					<div class="prodiv">
						<img src="http://imshopping.rediff.com/imgshop/180-180/shopping/pixs/17974/-/-1733771-1-19b9f._apple-ipad-with-retina-display-with-wi-fi-16gb-white.jpg" /><br/>
						<cite class="ttl">Apple Ipad With Retina Display With Wi-fi 16GB - White</cite><br/>
						<cite class="ttl"><strike class="f12">Rs.28,900</strike> <b>Rs. 25,500</b></cite><br/><br/>
						<input type="button" value="PLACE ORDER" style="background:#ed1c24;border-radius:6px;border: medium none;cursor: pointer;outline: medium none;width: 120px;font:bold 14px arial, verdana, sans-serif, FreeSans;color:#fff;padding:5px 10px;">
					</div>
					<div class="prodiv">
						<img src="http://imshopping.rediff.com/imgshop/180-180/shopping/pixs/17974/-/-1733771-1-19b9f._apple-ipad-with-retina-display-with-wi-fi-16gb-white.jpg" /><br/>
						<cite class="ttl">Apple Ipad With Retina Display With Wi-fi 16GB - White</cite><br/>
						<cite class="ttl"><strike class="f12">Rs.28,900</strike> <b>Rs. 25,500</b></cite><br/><br/>
						<input type="button" value="PLACE ORDER" style="background:#ed1c24;border-radius:6px;border: medium none;cursor: pointer;outline: medium none;width: 120px;font:bold 14px arial, verdana, sans-serif, FreeSans;color:#fff;padding:5px 10px;">
					</div>
					<div class="prodiv">
						<img src="http://imshopping.rediff.com/imgshop/180-180/shopping/pixs/17974/-/-1733771-1-19b9f._apple-ipad-with-retina-display-with-wi-fi-16gb-white.jpg" /><br/>
						<cite class="ttl">Apple Ipad With Retina Display With Wi-fi 16GB - White</cite><br/>
						<cite class="ttl"><strike class="f12">Rs.28,900</strike> <b>Rs. 25,500</b></cite><br/><br/>
						<input type="button" value="PLACE ORDER" style="background:#ed1c24;border-radius:6px;border: medium none;cursor: pointer;outline: medium none;width: 120px;font:bold 14px arial, verdana, sans-serif, FreeSans;color:#fff;padding:5px 10px;">
					</div>
					<div class="prodiv">
						<img src="http://imshopping.rediff.com/imgshop/180-180/shopping/pixs/17974/-/-1733771-1-19b9f._apple-ipad-with-retina-display-with-wi-fi-16gb-white.jpg" /><br/>
						<cite class="ttl">Apple Ipad With Retina Display With Wi-fi 16GB - White</cite><br/>
						<cite class="ttl"><strike class="f12">Rs.28,900</strike> <b>Rs. 25,500</b></cite><br/><br/>
						<input type="button" value="PLACE ORDER" style="background:#ed1c24;border-radius:6px;border: medium none;cursor: pointer;outline: medium none;width: 120px;font:bold 14px arial, verdana, sans-serif, FreeSans;color:#fff;padding:5px 10px;">
					</div>
					<div class="prodiv">
						<img src="http://imshopping.rediff.com/imgshop/180-180/shopping/pixs/17974/-/-1733771-1-19b9f._apple-ipad-with-retina-display-with-wi-fi-16gb-white.jpg" /><br/>
						<cite class="ttl">Apple Ipad With Retina Display With Wi-fi 16GB - White</cite><br/>
						<cite class="ttl"><strike class="f12">Rs.28,900</strike> <b>Rs. 25,500</b></cite><br/><br/>
						<input type="button" value="PLACE ORDER" style="background:#ed1c24;border-radius:6px;border: medium none;cursor: pointer;outline: medium none;width: 120px;font:bold 14px arial, verdana, sans-serif, FreeSans;color:#fff;padding:5px 10px;">
					</div>
					<div class="prodiv">
						<img src="http://imshopping.rediff.com/imgshop/180-180/shopping/pixs/17974/-/-1733771-1-19b9f._apple-ipad-with-retina-display-with-wi-fi-16gb-white.jpg" /><br/>
						<cite class="ttl">Apple Ipad With Retina Display With Wi-fi 16GB - White</cite><br/>
						<cite class="ttl"><strike class="f12">Rs.28,900</strike> <b>Rs. 25,500</b></cite><br/><br/>
						<input type="button" value="PLACE ORDER" style="background:#ed1c24;border-radius:6px;border: medium none;cursor: pointer;outline: medium none;width: 120px;font:bold 14px arial, verdana, sans-serif, FreeSans;color:#fff;padding:5px 10px;">
					</div>
				</div>-->
