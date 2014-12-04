<?php
require_once Config::get('COMPONENT_DIR') . 'component.coupon.php';
$objCompCoupon = new CouponComponent();
$result = $objCompCoupon->getAllCouponList();

$list = $result['result'];
unset($result['result']);

?>
<div id="page-wrapper">

            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Manage Coupons
                            <small>list</small>
                        </h1>
                        
                    </div>
                </div>
                
                <div class="row">
                   <div class="col-lg-10">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-money fa-fw"></i> Coupon List</h3>
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover table-striped">
                                        <thead>
                                            <tr>
                                                <th>Coupon #</th>
                                                <th>Coupon For</th>
                                                <th>Coupon Title</th>
                                                <th>Coupon Code</th>
                                                <th>Updated On</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach ($list['result'] as $couponDetails) {?>
                                            <tr>
                                                <td><?=$couponDetails['coupon_id']?></td>
                                                <td><?=$couponDetails['coupon_site']?></td>
                                                <td><?=$couponDetails['coupon_title']?></td>
                                                <td><?=$couponDetails['coupon_code']?></td>
                                                <td><?=$couponDetails['updated_date']?></td>
                                                <td><a href="<?=UrlConfig::get('ADMIN_COUPON_ADDEDIT')?>?couponid=<?=$couponDetails['coupon_id']?>">edit</a></td>
                                            </tr>
                                        <?php } ?>
                                          
                                        </tbody>
                                    </table>
                                </div>
                                <div class="text-right">
                                    <a href="#">View All Transactions <i class="fa fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->