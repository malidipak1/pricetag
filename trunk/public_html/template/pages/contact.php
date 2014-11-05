<?php 
require_once Config::get('COMPONENT_DIR') . 'component.pages.php';
$flag = false;
if(!empty($_POST)) {
	$objContact = new UserComponent(); 
	$flag = $objContact->contactUs($_POST);
}
?>

<div class="prodcont">
<script>
	var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/; 
		
	function contVal()
	{
		if(document.contform.fname.value == "")
		{
			alert("Please Enter Your Name.");
			document.forms['contform'].fname.value = "";
			document.forms['contform'].fname.focus();
			return false;
		}

		if(document.contform.email.value == "")
		{
			alert("Please Enter Your email ID.");
			document.forms['contform'].email.value = "";
			document.forms['contform'].email.focus();
			return false;
		}else if (document.contform.email.value != "" && !(document.contform.email.value.match(mailformat))) {			 
			alert("You have entered an invalid email address!");  
			document.forms['contform'].email.focus();  
			return false;  			
		}

		if(document.contform.subject.value == "")
		{
			alert("Please Enter Subject.");
			document.forms['contform'].subject.value = "";
			document.forms['contform'].subject.focus();
			return false;
		}
		if(document.contform.comm.value == "")
		{
			alert("Please Enter your requirement.");
			document.forms['contform'].comm.value = "";
			document.forms['contform'].comm.focus();
			return false;
		}

		document.forms['contform'].submit();
		
		return true;
	}
	</script>

					<h3>Contact Us</h3>
					<div class="marT10 contact_us">
					<?php if ($flag) {?>
						<div class="error">Thank you for your interest. We will get back to you shortly as soon as possible. </div>
						<div class="clear">&nbsp;</div>
					<?php } else {?>
						
						<form action="" method="post" name="contform" id="contform">
						  <div>
							<div>
							  <input class="input" type="text" name="fname" id="fname"  placeholder="Enter Name">
							</div>
							<div class="marT10">
							  <input class="input" type="text" name="email" id="email"  placeholder="Enter Email id">
							</div>	
							<div class="marT10">
							  <input class="input" type="text" name="subject" id="subject"  placeholder="Enter Subject">
							</div>							
							<div class="marT10">
							  <textarea class="text" cols="12" rows="50" name="comm" id="comm" placeholder="Enter your requirement" ></textarea>
							</div>
							<div class="marT10 floatR">
							  <input type="button" value="PLACE YOUR REQUEST" class="btn"  onclick="return contVal();">
							</div>
						  </div>					  
						</form>
						<?php }?>
					</div>
				</div>