<?php
include("includes/header.php");
?>
<div id="main-content">
	<div id="home-content" class="page">
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
							<form method="POST" id="signup-table" action="php/gfz_signup.php">
								<table>
									<tr>
										<td><label>Email Address: </label></td>
										<td><input type="text" name="email"/></td>
									</tr>
									<tr>
										<td><label>Desired Password: </label></td>
										<td><input type="password" name="password"/></td>
									</tr>
									<tr>
										<td><label>Re-Type Password: </label></td>
										<td><input type="password" name="password-retype"/></td>
									</tr>
									<tr>
										<td><label>Why do you want to use this app(check all that apply)?: </label></td>										
										<td>
											<input type="checkbox" name="celiac">I have Celiac</input>
											<br/>
											<input type="checkbox" name="celiac">Gluten Free Diet</input>
											<br/>
											<input type="checkbox" name="celiac">Other</input>																
										</td>
									</tr>
								</table>
								<div id="signup-submit-container">
									<input id="signup-submit" type="submit" value="Sign Up!"/>
								</div>								
							</form>					
						</div>
					</div>
				</td>
			</tr>
		</table>
	</div>
	<div id="how-it-works" class="page" style="display:none;">
		HIW
	</div>
	<div id="our-team" class="page" style="display:none;">
		Team
	</div>
	<div id="contact-us" class="page" style="display:none;">
		contact
	</div>
</div>  
<?php
include("includes/footer.php");
?>