<?php 
ob_start();
session_start();
ini_set("display_errors", 0);

require_once("config.php");
$session_id = session_id();

date_default_timezone_set("Asia/Kolkata");

//FETCH SITE SETTINGS
$fetch_settings = mysql_fetch_array(mysql_query("SELECT * FROM `og_administrator` WHERE `admin_id` = '1'"));
$contact_email = stripslashes($fetch_settings['contact_email']);
?>

<?php
$sqlExists = "SELECT * FROM `og_users` WHERE `email` = '".$_POST['remail']."'";
$exeExists = mysql_query($sqlExists) or die(mysql_error());
$numExists = mysql_num_rows($exeExists);
if($numExists==0)
{
	$sqlInsert = "INSERT INTO `og_users` SET `fname` = '".addslashes($_POST['rfname'])."',`lname` = '".addslashes($_POST['rlname'])."',`email` = '".addslashes($_POST['remail'])."',`password` = '".md5($_POST['rpassword'])."',`original_password` = '".$_POST['rpassword']."',`phone` = '".addslashes($_POST['rphone'])."',`is_active` = 'Yes',`registration_date` = '".date('Y-m-d H:i:s',time())."'";
	$exeInsert = mysql_query($sqlInsert) or die(mysql_error());
	$last_id = mysql_insert_id();
	
	$_SESSION['USER_FNAME'] = $_POST['rfname'];
	$_SESSION['USER_LNAME'] = $_POST['rlname'];
	$_SESSION['USER_ID'] = $last_id;
	
	$subject = 'Registration Successful';	
	$message = '<table border="0" width="100%" cellspacing="2" cellpadding="2">
				<tr>
					<td>Dear '.stripslashes($_POST['rfname']).' '.stripslashes($_POST['rlname']).',</td>
				</tr>
				<tr>
					<td>&nbsp;</td>
				</tr>
				<tr>
					<td>Thanks for your registration. Your login credentials are below :</td>
				</tr>
				<tr>
					<td>Phone No : '.$_POST['rphone'].'<br>Password : '.$_POST['rpassword'].'</td>
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
	mail($_POST['remail'],$subject,$message,$headers);
	
	$sql_update = "UPDATE `og_temp_cart` SET `user_id` = '".$last_id."' WHERE `unique_id` = '".$session_id."'";
	$exe_update = mysql_query($sql_update) or die(mysql_error());

	echo 'succ';
}
else
{
	echo 'fail';
}
?>