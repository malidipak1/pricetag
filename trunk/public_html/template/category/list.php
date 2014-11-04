<?php 
require_once Config::get('COMPONENT_DIR') . 'component.category.php';

$objCat = new CategoryComponent();
$arrReturn = $objCat->getCategoryTree();
//echo "<pre>";
//print_r($arrReturn);
//die;?>
<div class="actprodcat">
	<div class="prodcont">
<?php 
	
foreach ($arrReturn as $catKey => $arrSubCat) {
	$catName = explode("-", $catKey);
	$catLink = Config::get('WEBSITE_URL') . "category/view/id/" . $catName[0] . "/name/" . urlencode($catName[1]) . "/";
?>
<div class="categoryList">
	<cite class="l1"><a href="<?=$catLink?>"><?=$catName[1]?></a></cite><br/>
<?php 	
	//echo " --> " . $catKey;
	foreach ($arrSubCat as $subCatKey => $arrCatList) {
		$subCatName = explode("-", $subCatKey);
		$subCatLink = Config::get('WEBSITE_URL') . "category/view/id/" . $subCatName[0] . "/name/" . urlencode($subCatName[1]) . "/";
?>
		<cite class="l2"><a href="<?=$subCatLink?>"><?=$subCatName[1]?></a></cite><br/>
<?php 	
		foreach ($arrCatList as $strCatDetails) {
			$strCatName = explode("-", $strCatDetails);
			$strCatLink = Config::get('WEBSITE_URL') . "category/view/id/" . $strCatName[0] . "/name/" . urlencode($strCatName[1]) . "/";
?>	
				<cite class="l3"><a href="<?=$strCatLink?>"><?=$strCatName[1]?></a></cite><br/>
<?php 
		}
	}
?></div>
<?php }?>
</div>
	