<?php
include("includes/header.php");
?>
<div id="main-content" class="box-shadow">
	<div id="home-content" class="page">
		<table id="home-table">
			<tr>
				<td>
					<img src="images/sign_in.png" />
				</td>
				<td>
					<h2>
						Sign up now to be the first to know when the app is released!
					</h2>
					<form method="POST" action="php/gfz_signup.php">
						<label>Email Address: </label>						
						<input type="text" name="email"/>			
						<br/>
						<label>Desired Password: </label>										
						<input type="password" name="password"/>
						<br/>
						<label>Desired Password: </label>										
						<input type="password" name="password-retype"/>
						<br/>
						<label>Why do you want to use  this app?: </label>				
						<br/>
						<input type="checkbox" name="celiac">I have Celiac</input>
						<input type="checkbox" name="celiac">Gluten Free Diet</input>
						<input type="checkbox" name="celiac">Other</input>						
						<br/>
						<br/>					
						<div style="width: 160px; margin:auto;">
							<input id="signup-submit" type="submit" value="Sign Up!"/>
						</div>
					</form>
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