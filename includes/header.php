<?php
include("functions.php");
?>
<!DOCTYPE>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="http://malsup.github.com/jquery.form.js"></script>
<script src="js/jquery.simplemodal-1.4.4.js"></script>
<link rel="stylesheet" type="text/css" href="css/gfz.css">
<link rel="stylesheet" type="text/css" href="css/basic.css">
<title>Gluten Free Zone</title>
<script type="text/javascript">
	$(document).ready(function(){
		$("#signout").click(function(){						
			$.ajax({
				url: "php/gfz_logout.php",
				type: "post",				
				success: function(){
					window.location.href = "index.php?loggedin=false";
				}				
			});
		});		
		$("#login-form").ajaxForm(function(data){
			switch(data){
				case '0':
					window.location.href = "index.php?loggedin=true"
					break;
				case '1':		
					$("#login-fail").modal();
					break;
				case '2':
					//verification
					window.location.href = "verification.php";
			}
		});
		$(".menu-link").click(function(){
			$(".menu-link").removeClass("active");
			$(this).addClass("active");						
			var id = $(this).attr('id');			
			showPage(id);			
		});
	});
	
	function showPage(id){		
		$("#main-content").hide();
		$.get(id + '.php', function(data) {			
			$('#main-content').html(data);			
			$("#main-content").fadeIn('fast');
		});
	}
</script>
</head>
<body>
<div id="login-fail" style="display:none">
	<p style="color:#fff; font-weight: bold; font-size: 22px;">Invalid Email Address or Password!</p>
</div>
<div id="header">
	<div id="header-content">
    <div id="gfz-header">
      <div id="header-left">
        <a href="index.php"><img src="images/logo-web.png" id="gfz-logo"/></a>				
      </div>
      <div id="header-right">

<?php	
	if(getSession()){
?>			
<div id="user-info">
	<table id="info-table">
		<tr>
			<td id="user">Welcome back, <?php echo $_COOKIE['gfz_session']; ?></td>
		</tr>
		<tr>
			<td id="signout">Sign Out</td>
		</tr>
	</table>
</div>
<?php }else{?>
				<form method="POST" id="login-form" action="php/gfz_login.php">
					<label>Email: </label>
					<br/>
					<input type="text" name="email" tabindex="1"/>			
					<br/>
					<label>Password: </label>				
					<br/>
					<input type="password" name="password" tabindex="2"/>
					<br/>
					<br/>					
					<input id="login-submit" type="submit" value="Sign In" tabindex="3"/>
				</form>
					
<?php }	?>
      </div>
    </div>		
		<div id="menu">
			<table id="menu-table">
				<tr>
					<td class="menu-link active depth" id="home">
						Home
					</td>
					<td>
						<img src="images/menu-border.png" class="menu-border"/>
					</td>																					
					<td class="menu-link depth" id="how_it_works">
						How It Works
					</td>										
					<td>
						<img src="images/menu-border.png" class="menu-border"/>
					</td>									
					<td class="menu-link depth" id="our_team">
						Our Team
					</td>				
					<td>
						<img src="images/menu-border.png" class="menu-border"/>
					</td>									
					<td class="menu-link depth" id="contact">
						Contact Us
					</td>       
					<?php	
            if(getSession()){
							$email = getSession();
							$user_level = getUserLevel($email);
							if($user_level == 2){								
          ?>			             
					<td>
						<img src="images/menu-border.png" class="menu-border"/>
					</td>									          
					<td class="menu-link depth" id="products">
						Products
					</td>          					
					<td>
						<img src="images/menu-border.png" class="menu-border"/>
					</td>									          
					<td class="menu-link depth" id="analytics">
						Analytics
					</td>       
					<?php	
							}
						}
          ?>			                                          
				</tr>
			</table>
		</div>
  </div>
</div>  