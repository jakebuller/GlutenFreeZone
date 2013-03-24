<!DOCTYPE>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="css/gfz.css">
<title>Gluten Free Zone</title>
<script type="text/javascript">
	$(document).ready(function(){
		console.log("hi");
		$("#home").click(function(){		
			showPage("home-content", "home");
		});
		$("#hiw").click(function(){			
			showPage("how-it-works", "hiw");
		});
		$("#team").click(function(){
			showPage("our-team", "team");
		});
		$("#contact").click(function(){
			showPage("contact-us", "contact");
		});						
	});
	
	function showPage(id, link){
		console.log(id);
		$(".menu-link").removeClass("active");
		$("#" + link).addClass("active");
		$(".page").hide();
		$("#" + id).fadeIn("slow");	
	}
</script>
</head>
<body>
<div id="header">
	<div id="header-content">
    <div id="gfz-header">
      <div id="header-left">
        <a href="index.php"><img src="images/logo-web.png" id="gfz-logo"/></a>				
      </div>
      <div id="header-right">
				<form method="POST" action="php/gfz_login.php">
					<label>Email: </label>
					<br/>
					<input type="text" name="email"/>			
					<br/>
					<label>Password: </label>				
					<br/>
					<input type="password" name="password"/>
					<br/>
					<br/>					
					<input id="login-submit" type="submit" value="Sign In"/>
				</form>
      </div>
    </div>		
		<div id="menu">
			<table id="menu-table">
				<tr>
					<td class="menu-link active" id="home">
						Home
					</td>
					<td>
						<img src="images/menu-border.png" class="menu-border"/>
					</td>																					
					<td class="menu-link" id="hiw">
						How It Works
					</td>										
					<td>
						<img src="images/menu-border.png" class="menu-border"/>
					</td>									
					<td class="menu-link" id="team">
						Our Team
					</td>				
					<td>
						<img src="images/menu-border.png" class="menu-border"/>
					</td>									
					<td class="menu-link" id="contact">
						Contact Us
					</td>					
				</tr>
			</table>
		</div>
  </div>
</div>  