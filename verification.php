<?php
	include("includes/header.php");
	if(!isset($_COOKIE['gfz_verify'])){
		header("Location: index.php");
	}
?>
<script type="text/javascript">
	$(document).ready(function(){
		$("#verify-form").ajaxForm(function(data){
		console.log(data);
			if(data == '0'){
				$("#error").html('<h3>Verification Successful!</h3><p>Your account has been successfully verified!<br/> Welcome to Gluten Free Zone!</p><div class="centered"><input onclick="javascript:window.location.href=\'index.php\'" type="button" value="Continue"/></div>');
				$("#error").modal();
				
			}else if( data == '1'){				
				$("#error").modal();
			}
		});
		
		$("#submit-code").click(function(){			
			var code = $("#code").val();
			if(code == ""){
				$("#error").modal();
			}else{
				$("#verify-form").submit();
			}
		});			
	});
</script>
<div id="error" style="display:none">
	<p>The verification code you entered is invalid, please enter the code that was emailed to you.</p>
</div>
<div id="main-content">	
<div class="box box-shadow">
		<div class="header depth">					
			Enter your verification code!
		</div>					
		<div id="verification-content"> 
			<form method="POST" id="verify-form" action="php/gfz_verify_account.php">
				<div id="verify-label">
					<label>Verification Code: </label>
					<input type="text" id="code" name="code"/>		
					<input type="hidden" id="email" name="email" value="<?php echo $_COOKIE['gfz_verify']; ?>"/>
				</div>
				<div id="signup-submit-container">
					<input id="submit-code" type="button" value="Verify"/>
				</div>								
			</form>					
		</div>
	</div>
</div>
<?php
	include("includes/footer.php");
?>