<script type="text/javascript">
	$("#contact-form").ajaxForm(function(data){
		if(data == '0'){
		$("#signup-fail").html("<h2>Sent!</h2><p>Your inquiry has been sent! Thank you for contact us</p><input type='button' value='Ok' onclick=\"javascript:window.location.href='index.php'\"/>");
		$("#signup-fail").modal();
		}else{
			$("#signup-fail").html("<h2>Oops!</h2><p>We were unable to complete your request. Please verify all fields are filled in and try again.</p>");
		$("#signup-fail").modal();
		}
	});
</script>
<form id="contact-form" action="php/contact_form.php" method="POST">
	<h2>Questions or Comments? We'd love to hear from you!</h2>
	<input type="text" id="name" name="name" placeholder="Your Name (required)"/>
  <br />
  <input type="text" id="email" name="email" placeholder="Email Address (required)"/>
  <br />
  <textarea id="inquiry" name="inquiry" placeholder="Your Inquiry"></textarea>
  <br />
  <input type="submit" id="submit" name="submit"/>  
</form>