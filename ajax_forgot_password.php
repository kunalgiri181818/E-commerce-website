<?php 
ob_start();
session_start();
ini_set("display_errors", 0);

require_once("config.php");

//FETCH SITE SETTINGS
$fetch_settings = mysql_fetch_array(mysql_query("SELECT * FROM `og_administrator` WHERE `admin_id` = '1'"));
$contact_email = stripslashes($fetch_settings['contact_email']);
?>

<?php
$sqlForgot = "SELECT * FROM `og_users` WHERE `email` = '".$_POST['femail']."'";
$exeForgot = mysql_query($sqlForgot) or die(mysql_error());
$numForgot = mysql_num_rows($exeForgot);
if($numForgot>0)
{
	$arrForgot = mysql_fetch_array($exeForgot);
	$name = stripslashes($arrForgot['fname'])." ".stripslashes($arrForgot['lname']); 
	$email = stripslashes($arrForgot['email']);
	$new_password = rand(100000,999999);
	
	$sqlUpdate = "UPDATE `og_users` SET `password` = '".md5($new_password)."',`original_password` = '".$new_password."' WHERE `email` = '".$email."'";
	$exeUpdate = mysql_query($sqlUpdate) or die(mysql_error());
	
	$subject = 'Forgot Password';	
	$message = '<table border="0" width="100%" cellspacing="2" cellpadding="2">
				<tr>
					<td>Dear '.$name.',</td>
				</tr>
				<tr>
					<td>&nbsp;</td>
				</tr>
				<tr>
					<td>We are sorry that you misplaced your password, but not to worry. We have reset your password.</td>
				</tr>
				<tr>
					<td>New Password : '.$new_password.'</td>
				</tr>
				<tr>
					<td>&nbsp;</td>
				</tr>
				<tr>
					<td>Thanks & Regards,<br>'.$fetch_settings['company_name'].' Team</td>
				</tr>
				</table>';

	$headers = "From: ".$fetch_settings['company_name']."<info@morningbazar.co.in>" . "\r\n" .
	"Reply-To: info@morningbazar.co.in" . "\r\n" .
	"X-Mailer: PHP/" . phpversion();
	$headers .= 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	mail($email,$subject,$message,$headers);

	echo 'succ';
}
else
{
	echo 'fail';
}
?>