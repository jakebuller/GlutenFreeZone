<?php

require("PHPMailer/class.phpmailer.php");

$mail = new PHPMailer();

$mail->IsSMTP();  // telling the class to use SMTP
$mail->Host     = "localhost"; // SMTP server

$mail->From     = "contact@firstinterview.ca";
$mail->AddAddress($email);

$mail->IsHTML(true);

$mail->Subject  = "Welcome to FirstInterview";
$mail->Body     = '<html><body bgcolor="#ededed"><table width="100%" border="0" cellspacing="0" cellpadding="20" bgcolor="#ededed">
		  <tr>
			<td>
				<table width="600" border="0" align="center" cellpadding="5" cellspacing="0" style="border:1px solid #dddddd; font-family:Arial, Helvetica, sans-serif">
				  <tr>
					<td bgcolor="#FFFFFF" style="padding:0">
						<table width="100%" border="0" cellspacing="0" cellpadding="10" style="border-bottom:5px solid #509be2">
						  <tr>
							<td align="left"><img src="https://www.firstinterview.ca/email_templates/images/logo.jpg" width="170" height="38" alt="FirstInterview.ca" /></td>
							<td align="right"><p style="margin:0; font-size:13px; color:#509be2; padding-top:25px; font-style:italic">More than a job posting site.</p></td>
						  </tr>
						</table>
					</td>
				  </tr>
				  <tr>
					<td bgcolor="#FFFFFF" style="padding:15px;">
						<h2 style="margin:0 0 15px; font-size:16px; color:#509be2;">Welcome '. $first_name .' '. $last_name .',</h2>
		
						<p style="margin:10px 0; font-size:13px; color:#2d2d2d; line-height:20px;">Your profile has been created using your linked in profile information. To log in please use this temporary password: ' . $password . '</p>
						
						<a href="https://www.firstinterview.ca/va.php?uid=' . $random_hash .'">https://www.firstinterview.ca/va.php?uid=' . $random_hash .'</a>
		
						<p style="margin:10px 0; font-size:13px; color:#2d2d2d; line-height:20px;">If you have any questions, feel free to send an email to contact@firstinterview.ca.</p>
		
						<p style="margin:10px 0; font-size:13px; color:#2d2d2d; line-height:20px;">The FirstInterview.ca Team</p>
					</td>
				  </tr>
				</table>
			</td>
		  </tr>
		</table></body></html>';
$mail->WordWrap = 50;

if(!$mail->Send()) {
  echo '1';
} else {
  echo '0';
}

?>