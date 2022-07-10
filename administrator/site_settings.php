<?php 
require_once("header.php");
require_once("session_check.php");

//CODE FOR UPDATE SETTINGS
if(isset($_POST['save']))
{
	$sql_update = "UPDATE `og_administrator` SET `admin_username` = '".addslashes($_POST['admin_username'])."',`contact_address` = '".addslashes($_POST['contact_address'])."',`contact_email` = '".$_POST['contact_email']."',`contact_no1` = '".$_POST['contact_no1']."',`contact_no2` = '".$_POST['contact_no2']."',`whatsapp_no` = '".$_POST['whatsapp_no']."',`delivery_charge` = '".addslashes($_POST['delivery_charge'])."',`delivery_charge_limit` = '".addslashes($_POST['delivery_charge_limit'])."' WHERE `admin_id` = '1'";
	$exe_update = mysql_query($sql_update) or die(mysql_error());
	
	$_SESSION['save_succ_msg'] = 'Site settings updated successfully.';
	header("location: site_settings.php");
	exit;
}

//FETCH DATA FROM DATABASE
$fetch_record = mysql_fetch_array(mysql_query("SELECT * FROM `og_administrator` WHERE `admin_id` = '1'"));
$admin_username = stripslashes($fetch_record['admin_username']);

$contact_address = stripslashes($fetch_record['contact_address']);
$contact_email = stripslashes($fetch_record['contact_email']);
$contact_no1 = stripslashes($fetch_record['contact_no1']);
$contact_no2 = stripslashes($fetch_record['contact_no2']);
$whatsapp_no = stripslashes($fetch_record['whatsapp_no']);

$delivery_charge = stripslashes($fetch_record['delivery_charge']);
$delivery_charge_limit = stripslashes($fetch_record['delivery_charge_limit']);
?>

<?php require_once("left_panel.php");?>
<div class="content">
	<div class="workplace">
		<?php if(isset($_SESSION['save_succ_msg'])) { ?>
		<div class="alert alert-success">                
		<b><?php echo $_SESSION['save_succ_msg'];?></b>
		</div> 
		<?php
		unset($_SESSION['save_succ_msg']);
		}
		?>
		<div class="row-fluid">
			<div class="span12">
				<form action="" method="post" enctype="multipart/form-data" onsubmit="return frm_validation();">
				<div class="head clearfix">
					<div class="isw-documents"></div>
					<h1>Site Settings</h1>
				</div>
				<div class="block-fluid">
					<div class="row-form clearfix">
						<div class="span3">Admin Username <font color="#FF0000">*</font></div>
						<div class="span9"><input type="text" name="admin_username" id="admin_username" value="<?php echo $admin_username;?>" /></div>
					</div> 
					<div class="row-form clearfix">
						<div class="span3">Contact Address <font color="#FF0000">*</font></div>
						<div class="span9"><textarea name="contact_address" id="contact_address"><?php echo $contact_address;?></textarea></div>
					</div>
					<div class="row-form clearfix">
						<div class="span3">Contact Email <font color="#FF0000">*</font></div>
						<div class="span9"><input type="text" name="contact_email" id="contact_email" value="<?php echo $contact_email;?>" /></div>
					</div>
					<div class="row-form clearfix">
						<div class="span3">Contact No. 1 <font color="#FF0000">*</font></div>
						<div class="span9"><input type="text" name="contact_no1" id="contact_no1" value="<?php echo $contact_no1;?>" /></div>
					</div>
					<div class="row-form clearfix">
						<div class="span3">Contact No. 2</div>
						<div class="span9"><input type="text" name="contact_no2" id="contact_no2" value="<?php echo $contact_no2;?>" /></div>
					</div>
					<div class="row-form clearfix">
						<div class="span3">Whatsapp No.</div>
						<div class="span9"><input type="text" name="whatsapp_no" id="whatsapp_no" value="<?php echo $whatsapp_no;?>" /></div>
					</div>
					<div class="row-form clearfix">
						<div class="span3">Amount Limit For Delivery Charge</div>
						<div class="span9"><input type="text" name="delivery_charge_limit" id="delivery_charge_limit" value="<?php echo $delivery_charge_limit;?>" /></div>
					</div>
					<div class="row-form clearfix">
						<div class="span3">Delivery Charge</div>
						<div class="span9"><input type="text" name="delivery_charge" id="delivery_charge" value="<?php echo $delivery_charge;?>" /></div>
					</div>
					<div class="row-form clearfix">
						<div class="span3">&nbsp;</div>
						<div class="span9"><button class="btn" type="submit" name="save">Save</button></div>
					</div>
				</div>
				</form>
			</div>
		</div>
	</div>
</div>   

<?php require_once("footer.php"); ?>