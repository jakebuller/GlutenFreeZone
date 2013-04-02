<script type="text/javascript">
	$(document).ready(function(){
		$("#signup-table input").keypress(function(e){		
			if(e.which == 13) {
				signupSubmit();
				e.preventDefault();
				return false;
			}			
			return true;		
		});
		
		$("#signup-submit").click(function(){
			signupSubmit();
		});
		$("#signup-table").ajaxForm(function(data){			
			switch(data){
				case '0':
					//this shouldn't happened
					$("#signup-fail").html("<h2>Success!</h2><p>Your account has been created, you will recieve an email with a verification code to confirm your account. </p><a href='verification.php'><input type='button' value='Ok'/></a>");
					$("#signup-fail").modal();
					//window.location.href = "verification.php";
					break;
				case '1':		
					console.log('signup failed');
					$("#signup-fail").html("<h2>Something went wrong!</h2>");					
					$("#signup-fail").modal();
					break;
				case '2':
					//verification
					console.log('this email address is already in use!');
					$("#signup-fail").html("<h2>Email in use!</h2><p>The email address is already in use, please select another email address and try again</p>");
					$("#signup-fail").modal();
					break;
				case '3':
					//weird!
					console.log('this is weird, nothing returns 3');
					break;
				case '4':
					console.log('something went wrong with the signup');
					break;
				default:
					console.log('didnt match any cases');
					break;
			}
		});
	});
	
	function signupSubmit(){
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
	}
</script>

	<div id="home-content" class="page">
		<div id="about">
		<h3 class="depth">
			Welcome to Gluten Free Zone!
		</h3>
		<h4 class="depth">
			So, what is Gluten Free Zone?
		</h4>
		It's difficult to determine whether or not a product contains gluten so let Gluten Free Zone be your solution. 
		Gluten Free Zone makes shopping easier with the use of our smartphone application. 
		The application allows you to simply scan a products existing bar code and will inform you whether or not the product contains gluten. 
		Its that simple! 
		<br/>
		Shop Confidently, Eat Comfortably
		</div>
		<table id="home-table">
			<tr>
				<td>
					<img src="images/sign_in.png" />
				</td>
				<td>					
					<div id="signup-box" class="box-shadow">
						<div id="signup-header" class="depth">					
							Sign Up Now!
						</div>
						<div id="signup-content"> 
							<form method="POST" id="signup-table" action="php/gfz_create_account.php">
								<table>
									<tr>
										<td><label>First Name: </label></td>
										<td><input type="text" id="first_name" name="first_name" tabindex="4"/></td>
									</tr>
									<tr>
										<td><label>Last Name: </label></td>
										<td><input type="text" id="last_name" name="last_name" tabindex="4"/></td>
									</tr>                                  
									<tr>
										<td><label>Email Address (required): </label></td>
										<td><input type="text" id="email" name="email" tabindex="4"/></td>
									</tr>
									<tr>
										<td><label>Desired Password (required): </label></td>
										<td><input type="password" id="password" name="password" tabindex="5"/></td>
									</tr>
									<tr>
										<td><label>Re-Type Password (required): </label></td>
										<td><input type="password" id="password-retype" name="password-retype" tabindex="6"/></td>
									</tr>
									<tr>
										<td><label>Why do you want to use this app(check all that apply)?: </label></td>										
										<td>
											<input type="checkbox" name="celiac"  tabindex="7">I have Celiac</input>
											<br/>
											<input type="checkbox" name="diet" tabindex="8">Gluten Free Diet</input>
											<br/>
											<input type="checkbox" name="other" tabindex="9">Other</input>																
										</td>
									</tr>
								</table>
								<div id="signup-submit-container">
									<input id="signup-submit" type="button" value="Sign Up!" tabindex="10"/>
								</div>								
							</form>					
						</div>
					</div>
				</td>
			</tr>
		</table>
		<div id="appstore-container">
			<img src="images/appstore.png" id="appstore"/>
		</div>
	</div>