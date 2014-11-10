<?php
require_once Config::get('COMPONENT_DIR') . 'component.coupon.php';

	$objCoupon = new CouponComponent();
	$return_array = $objCoupon->addEditCoupon();	

?>
<div id="page-wrapper">

            <div class="container-fluid">

            <?php if($return_array['form_flag']) {?>
            	<div class="row">
                    <div class="col-lg-12">
                        <div class="alert alert-info alert-dismissable">
                            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">x</button>
                            <i class="fa fa-info-circle"></i>  <strong>Coupon Added Successfully!</strong> Click here for <a class="alert-link" href="<?=?>"> list</a> view!
                        </div>
                    </div>
                </div>
            <?php } ?>
            
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Manage Coupons
                            <small>Add</small>
                        </h1>
                        
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-lg-6">

                        <form role="form" method="post">

                            <div class="form-group">
                                <label>Coupon Title</label>
                                <input class="form-control" name="coupon_title">
                                <!-- <p class="help-block">Example block-level help text here.</p> -->
                            </div>

                            <div class="form-group">
                                <label>Coupon Description</label>
                              	<textarea rows="3" name="coupon_desc" class="form-control"></textarea>
                            </div>

                            <div class="form-group">
                                <label>Coupon Link</label>
                                <input class="form-control" name="coupon_link">
                            </div>
                            
                            <div class="form-group">
                                <label>Coupon Code</label>
                                <input class="form-control" name="coupon_code">
                            </div>
                            
                            <button class="btn btn-default" type="submit">Add Coupon</button>
                            <button class="btn btn-default" type="reset">Reset </button>

                        </form>

                    </div>

                </div>
                
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->