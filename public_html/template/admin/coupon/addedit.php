<?php
require_once Config::get('COMPONENT_DIR') . 'component.coupon.php';
$couponId = 0;
if(!empty($_GET['couponid'])) {
	$couponId = $_GET['couponid'];
}
$objCoupon = new CouponComponent();
$return_array = $objCoupon->addEditCoupon($couponId);
$arrSites = $return_array['site_list']['result'];
$couponRow = $return_array['coupon_row'];
?>
<div id="page-wrapper">

            <div class="container-fluid">

            <?php if(isset($return_array['form_flag']) && $return_array['form_flag']) {?>
            	<div class="row">
                    <div class="col-lg-12">
                        <div class="alert alert-info alert-dismissable">
                            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">x</button>
                            <i class="fa fa-info-circle"></i>  <strong>Coupon Added Successfully!</strong> Click here for <a class="alert-link" href="<?=UrlConfig::get('ADMIN_COUPON_LIST')?>"> list</a> view!
                        </div>
                    </div>
                </div>
            <?php } ?>
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Manage Coupons
                            <small>Add / Edit</small>
                        </h1>
                        
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-lg-6">
					
                        <form role="form" method="post">

                            <div class="form-group">
                                <label>Coupon Title</label>
                                <input class="form-control" name="coupon_title" value="<?=$couponRow['coupon_title']?>">
                                <!-- <p class="help-block">Example block-level help text here.</p> -->
                            </div>

                            <div class="form-group">
                                <label>Coupon Description</label>
                              	<textarea rows="3" name="coupon_desc" class="form-control"><?=$couponRow['coupon_desc']?></textarea>
                            </div>

                            <div class="form-group">
                                <label>Coupon Link</label>
                                <input class="form-control" name="coupon_link"  value="<?=$couponRow['coupon_link']?>>
                            </div>
                            
                            <div class="form-group">
                                <label>Coupon Code</label>
                                <input class="form-control" name="coupon_code" value="<?=$couponRow['coupon_code']?>">
                            </div>
                            
                            <input type="hidden" name="coupon_id" value="<?=$couponRow['coupon_id']?>">
                            <button  class="btn btn-default" type="submit">Add Coupon</button>
                            <button class="btn btn-default" type="reset">Reset </button>

                        </form>

                    </div>

                </div>
                
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->