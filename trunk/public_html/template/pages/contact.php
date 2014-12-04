<?php 
require_once Config::get('COMPONENT_DIR') . 'component.pages.php';
$flag = false;
if(!empty($_POST)) {
	$objContact = new PagesComponent(); 
	$flag = $objContact->contactUs($_POST);
}
?>

<div class="home">
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
	<div class="contactform">
					<?php if ($flag) {?>
						<div class="error">Thank you for your interest. We will get back
			to you shortly as soon as possible.</div>
		<div class="clear">&nbsp;</div>
					<?php } else {?>
						
						<form action="#" method="post" id="contactform" class="contactform">
			<div class="error"></div>
			<div class="cu_field">
				<label for="cu_name">Name:</label> <input type="text" name="cu_name" id="cu_name">
			</div>
			<div class="cu_field">
				<label for="cu_email">Email:</label> <input type="text" name="cu_email" id="cu_email">
			</div>
			<div class="cu_field">
				<label for="cu_sub">Subject:</label> <input type="text" name="cu_sub" id="cu_sub">
			</div>
			<div class="cu_field">
				<label for="cu_msg">Message:</label>
				<textarea name="cu_msg" id="cu_msg"></textarea>
			</div>
			<div class="cu_field">
				<label for="cu_submit">&nbsp;</label> <input type="submit" onclick="return contVal();" value="Submit" class="button biggest darker" id="cu_submit">
			</div>
		</form>
						<?php }?>
					</div>
</div>