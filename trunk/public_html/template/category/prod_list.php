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
				<?php 
				$paginationDisplay = "";
				$pagingUrl = Config::get('PAGING_URL');
				
				if($lastPage != 1) {
					
					$centerPages = "";
					$sub1 = $page - 1;
					$sub2 = $page - 2;
					$add1 = $page + 1;
					$add2 = $page + 2;
					if ($page == 1) {
						$centerPages .= '&nbsp; <div class="pagNumActive">' . $page . '</div> &nbsp;';
						$centerPages .= '&nbsp; <a href="' .$pagingUrl . '?page=' . $add1 . '">' . $add1 . '</a> &nbsp;';
					} else if ($page == $lastPage) {
						$centerPages .= '&nbsp; <a href="' .$pagingUrl . '?page=' . $sub1 . '">' . $sub1 . '</a> &nbsp;';
						$centerPages .= '&nbsp; <div class="pagNumActive">' . $page . '</div> &nbsp;';
					} else if ($page > 2 && $page < ($lastPage - 1)) {
						$centerPages .= '&nbsp; <a href="' .$pagingUrl . '?page=' . $sub2 . '">' . $sub2 . '</a> &nbsp;';
						$centerPages .= '&nbsp; <a href="' .$pagingUrl . '?page=' . $sub1 . '">' . $sub1 . '</a> &nbsp;';
						$centerPages .= '&nbsp; <div class="pagNumActive">' . $page . '</div> &nbsp;';
						$centerPages .= '&nbsp; <a href="' .$pagingUrl . '?page=' . $add1 . '">' . $add1 . '</a> &nbsp;';
						$centerPages .= '&nbsp; <a href="' .$pagingUrl . '?page=' . $add2 . '">' . $add2 . '</a> &nbsp;';
					} else if ($page > 1 && $page < $lastPage) {
						$centerPages .= '&nbsp; <a href="' .$pagingUrl . '?page=' . $sub1 . '">' . $sub1 . '</a> &nbsp;';
						$centerPages .= '&nbsp; <div class="pagNumActive">' . $page . '</div> &nbsp;';
						$centerPages .= '&nbsp; <a href="' .$pagingUrl . '?page=' . $add1 . '">' . $add1 . '</a> &nbsp;';
					}
					
					
					$paginationDisplay = 'Page <strong>' . $page . '</strong> of ' . $lastPage. '&nbsp;  &nbsp;  &nbsp; ';
					if($page != 1) {
						
						$previous = $page - 1;
						$paginationDisplay .= "<a href=\"$pagingUrl?page=$previous\">Previous</a>";
					}
					
					$paginationDisplay .= '<div class="paginationNumbers">' . $centerPages . '</div>';
					
					if ($page != $lastPage) {
						$nextPage = $page + 1;
						$paginationDisplay .= "<a href=\"$pagingUrl?page=$nextPage\">Next</a>";
					}
				}
				/* if( $recLeft < $perPage ) {
					$last = $page - 2;
					echo "<a href=\"$pagingUrl?page=$last\">Last 10 Records</a>";
				} else if( $page > 0 ) {
					$last = $page - 2;
					echo "<a href=\"$pagingUrl?page=$last\">Last 10 Records</a> | ";
					echo "<a href=\"$pagingUrl?page=$page\">Next 10 Records</a>";
				} else if( $page == 0 ) {
					echo "<a href=\"$pagingUrl?page=$page\">Next 10 Records</a>";
				} */?>
				<!-- <div><?php echo $paginationDisplay; ?></div> -->
				<div style="margin-left:58px; margin-right:58px; padding:6px; background-color:#FFF; border:#999 1px solid;"><?php echo $paginationDisplay; ?></div> 
				</div>