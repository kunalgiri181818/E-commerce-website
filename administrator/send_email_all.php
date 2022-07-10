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
				
	$headers = "From: Go Veggies<info@rajtutorialgroup.com>" . "\r\n" .
	"Reply-To: info@rajtutorialgroup.com" . "\r\n" .
	"X-Mailer: PHP/" . phpversion();
	$headers .= 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

	$sql_record = "SELECT * FROM `og_users` ORDER BY `user_id` DESC";
	$exe_record = mysql_query($sql_record) or die();
	while($fetch_record = mysql_fetch_array($exe_record))
	{	
		mail($fetch_record['email'],$subject,$message,$headers);
	}
	
	$_SESSION['sent_succ_msg'] = 'Emails sent successfully.';
	header("location: user_list.php");
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

<div class="content">
	<div class="workplace">
		<div class="row-fluid">
			<div class="span12">
				<div class="head clearfix">
					<div class="isw-documents"></div>
					<h1>Send Email To All Users</h1>
				</div>
				<form action="" method="post" enctype="multipart/form-data" onsubmit="return frm_validation();">
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