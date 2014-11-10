<?php 
require_once  Config::get('COMPONENT_DIR') . 'component.admin.php';
//session_start();
$userLogin = false;
if($_POST) {
	$userName = $_POST['user_name'];
	$passwd = $_POST['passwd'];
	
	$objAdminComp = new AdminComponent();
	$userId = $objAdminComp->login($userName, $passwd);
	if($userId != 0) {
		$_SESSION['user_id'] = $userId;
		$_SESSION['user_name'] = $userName;
		$userLogin = true;
	}
}
?> 
<?php if($userLogin) {?>
<script type="text/javascript">
window.location = "<?=Config::get('WEBSITE_URL')?>admin/pages/dashboard";
</script>
<?php }?>
  
  
        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row ">
                    <div class="col-lg-6">
                        <h1 class="page-header">
                            Login 
                            <small></small>
                        </h1>
                        <form role="form" method="post">
                            <div class="form-group input-group">
                                <span class="input-group-addon">*</span>
                                <input type="text" placeholder="Username" class="form-control" name="user_name" id="user_name">
                            </div>

                            <div class="form-group input-group">
                                <span class="input-group-addon">*</span>
                                <input type="password" placeholder="Password" class="form-control" name="passwd" id="passwd">
                            </div>

                            <div class="form-group input-group">
                                <button class="btn btn-default" type="submit">Submit</button>&nbsp;&nbsp;
                                <button class="btn btn-default" type="reset">Reset</button>
                            </div>

                        </form>
                      
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->