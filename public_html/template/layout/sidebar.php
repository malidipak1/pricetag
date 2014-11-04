<?php require_once Config::get('COMPONENT_DIR') . 'component.category.php';?>
<div class="divider">&#160;</div>
				<?php 
					$objCat = new CategoryComponent();
					$result = $objCat->getParentCategories();	
			//print_r($result['result']);		
				?>
				<div class="catcont">
					<h2>BROWSE</h2>
					<?php foreach ($result['result'] as $catDetails) { 
						$catLink = Config::get('WEBSITE_URL') . "category/view/id/" . $catDetails['category_id'] . "/name/" . urlencode($catDetails['category_name']) . "/";
						?>
						
						<cite class="mar7"><img src="<?=Config::get('WEBSITE_URL')?>images/catarr.jpg" />&#160;
						<a href="<?=$catLink?>"> <?=$catDetails['category_name']?></a></cite>
					<?php }?>
					</div>