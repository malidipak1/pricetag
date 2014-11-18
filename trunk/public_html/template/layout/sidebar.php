<?php require_once Config::get('COMPONENT_DIR') . 'component.category.php';?>
<!-- <div class="divider">&#160;</div>
<div class="catcont">
<div class="rightsidebar span_3_of_1">
					<h2>CATEGORIES</h2>
					<ul>
				      <li><aq href="#">Mobile Phones</a></li>
				      <li><aq href="#">Desktop</a></li>
				      <li><aq href="#">Laptop</a></li>
				      <li><a href="#">Accessories</a></li>
				      <li><a href="#">Software</a></li>
				       <li><a href="#">Sports &amp; Fitness</a></li>
				       <li><a href="#">Footwear</a></li>
				       <li><a href="#">Jewellery</a></li>
				       <li><a href="#">Clothing</a></li>
				       <li><a href="#">Home Decor &amp; Kitchen</a></li>
				       <li><a href="#">Beauty &amp; Healthcare</a></li>
				       <li><a href="#">Toys, Kids &amp; Babies</a></li>
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
</div>-->

 <div class="divider">&#160;</div>
				<?php 
					$objCat = new CategoryComponent();
					$result = $objCat->getParentCategories();	
			//print_r($result['result']);		
				?>
				<div class="catcont">
					<h2>BROWSE</h2>
					<?php foreach ($result['result'] as $catDetails) { 
						$catLink = Config::get('WEBSITE_URL') . "category/view/id/" . $catDetails['category_id'] . "/name/" . Utilities::urlencode($catDetails['category_name']) . "/";
						?>
						
						<cite class="mar7"><img src="<?=Config::get('WEBSITE_URL')?>images/catarr.jpg" />&#160;
						<a href="<?=$catLink?>"> <?=$catDetails['category_name']?></a></cite>
					<?php }?>
					</div>