<?php 
require_once("header.php");
require_once("session_check.php");

//CODE FOR SEND EMAIL
if(isset($_POST['edit']))
{
	//SEND EMAIL TO USER
	$subject = stripslashes($_POST['subject']);	
	$message = '<table border="0" width="100%" cellspacing="2" cellpadding="2">
				<tr>
					<td>'.nl2br(stripslashes($_POST['body'])).'</td>
				</tr>
				<tr>
					<td>&nbsp;</td>
				</tr>
				<tr>
					<td>Thanks & Regards,<br>Go Veggies Team</td>
				</tr>
				</table>';
				
	$headers = "From: Shoppers Basket<info@rajtutorialgroup.com>" . "\r\n" .
	"Reply-To: info@rajtutorialgroup.com" . "\r\n" .
	"X-Mailer: PHP/" . phpversion();
	$headers .= 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

	mail($_POST['hid_email'],$subject,$message,$headers);
	
	$_SESSION['sent_succ_msg'] = 'Email sent successfully.';
	header("location: auser_list.php");
	exit;
}
?>

<script language="javascript" type="text/javascript">
function frm_validation()
{
	if(document.getElementById('subject').value == '')
	{
		alert("Please enter subject");
		document.getElementById('subject').focus();
		return false;
	}
	
	if(document.getElementById('body').value == '')
	{
		alert("Please enter message");
		document.getElementById('body').focus();
		return false;
	}
}
</script>

<?php require_once("left_panel.php");?>

<?php
//FETCH DATA FROM DATABASE
$fetch_record = mysql_fetch_array(mysql_query("SELECT * FROM `og_users` WHERE `user_id` = '".$_REQUEST['user_id']."'"));
?>
<div class="content">
	<div class="workplace">
		<div class="row-fluid">
			<div class="span12">
				<div class="head clearfix">
					<div class="isw-documents"></div>
					<h1>Send Email To <?php echo $fetch_record['fname'];?>&nbsp;<?php echo $fetch_record['lname'];?></h1>
				</div>
				<form action="" method="post" enctype="multipart/form-data" onsubmit="return frm_validation();">
				<input type="hidden" name="hid_email" id="hid_email" value="<?php echo $fetch_record['email'];?>" />
				<input type="hidden" name="hid_user_id" id="hid_user_id" value="<?php echo $fetch_record['user_id'];?>" />
				<div class="block-fluid">
					<div class="row-form clearfix">
						<div class="span3">Subject <font color="#FF0000">*</font></div>
						<div class="span9"><input type="text" name="subject" id="subject" value="" /></div>                            
					</div>
					<div class="row-form clearfix">
						<div class="span3">Message <font color="#FF0000">*</font></div>
						<div class="span9"><textarea name="body" id="body" style="height:300px;"></textarea></div>                            
					</div>
					<div class="row-form clearfix">
						<div class="span3">&nbsp;</div>
						<div class="span9">
						<button class="btn" type="submit" name="edit">Send</button>
						</div>
				   </div>
				</div>
				</form>
			</div>
		</div>
	</div>
</div>   

<?php require_once("footer.php"); ?>