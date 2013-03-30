<?php
include("includes/header.php");
?>
<script type="text/javascript">
$(document).ready(function(){
	showPage("home");
	$('#signup-table').ajaxForm(function(data) {				
		if(data == '0'){
			window.location.href = "verification.php";
		}else{
			switch (data){
			case '1':
				//error
				$("#signup-fail").html("<p>An error occured while submitting your request, pleas try again. If this issue persists please email support@gfz.ca</p>");
				break;
			case '2':
				//email is taken
				$("#signup-fail").html("<p>This email address is already in use, please try again with a different email address</p>");
				break;
			case '3':
				//an error occured
				$("#signup-fail").html("<p>An error occured while submitting your request, pleas try again. If this issue persists please email support@gfz.ca</p>");
				break;			
			case '4':
				//shouldnt happen
				break;
			}
			$("#signup-fail").modal();
		}
	});
	
	$("#signup-submit").click(function(){
		var results = validateCreateAccountForm();		
		if(results.length == 0){			
			$("#signup-table").submit();			
		}else{			
			$("#signup-fail").html("<h2>Please fix the following issues:</h2><ul>");
			for (var i = 0; i < results.length; i++) {
				$("#signup-fail").append("<li>" + results[i] + "</li>");
			}
			$("#signup-fail").append("</ul>");
			$("#signup-fail").modal();			
		}
	});
});

function validateCreateAccountForm(){
	var issues = [];
	var email = $("#email").val();
	var password = $("#password").val();
	var retypepassword = $("#password-retype").val();
	if(email != ""){		
		var regex = /.+\@.+\..+/;
		if(!regex.test(email)){				
			issues.push("Please enter a valid email address");
		}
	}else{
		issues.push("Please enter a valid email address");
	}
	if(password != ""){
		if(password.length < 4){
			issues.push("The password you selected is too short (must be longer than 4 characters)");
		}
	}else{
		issues.push("Please choose a password");
	}
	if(retypepassword != ""){
		if(password != retypepassword){
			issues.push("The passwords you entered do not match");
		}
	}else{
		issues.push("Please retype your password");
	}	
	return issues;
}
</script>
<div id="signup-fail" style="display:none">
	<p>The following fields need to be filled in: </p>
</div>
<div id="main-content">

</div>  
<?php
include("includes/footer.php");
?>