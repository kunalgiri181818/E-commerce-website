<?php 
require_once("header.php");
require_once("session_check.php");

//CODE FOR ADD DELIVERY SCHEDULE
if(isset($_POST['add']))
{
	$sql_insert = "INSERT INTO `og_delivery_slot` SET `slot_name` = '".addslashes($_POST['slot_name'])."',`slot_time` = '".addslashes($_POST['slot_time'])."',`slot_status` = 'Active'";
	$exe_insert = mysql_query($sql_insert) or die(mysql_error());
	
	$_SESSION['add_succ_msg'] = 'Delivery schedule added successfully.';
	header("location: schedule_list.php");
	exit;
}

//CODE FOR UPDATE DELIVERY SCHEDULE
if(isset($_POST['edit']))
{
	$sql_update = "UPDATE `og_delivery_slot` SET `slot_name` = '".addslashes($_POST['slot_name'])."',`slot_time` = '".addslashes($_POST['slot_time'])."' WHERE `slot_id` = '".$_REQUEST['slot_id']."'";
	$exe_update = mysql_query($sql_update) or die(mysql_error());
	
	$_SESSION['edit_succ_msg'] = 'Delivery schedule updated successfully.';
	header("location: schedule_list.php");
	exit;
}

//FETCH DATA FROM DATABASE
if(isset($_REQUEST['action']) && $_REQUEST['action'] == "edit") 
{
	$fetch_record = mysql_fetch_array(mysql_query("SELECT * FROM `og_delivery_slot` WHERE `slot_id` = '".$_REQUEST['slot_id']."'"));
	$slot_name = stripslashes($fetch_record['slot_name']);
	$slot_time = stripslashes($fetch_record['slot_time']);
}
?>

<script language="javascript" type="text/javascript">
function frm_validation()
{
	if(document.getElementById('slot_name').value == '')
	{
		alert("Please enter slot name");
		document.getElementById('slot_name').focus();
		return false;
	}
	
	if(document.getElementById('slot_time').value == '')
	{
		alert("Please enter slot time");
		document.getElementById('slot_time').focus();
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
					<?php if(isset($_REQUEST['action']) && $_REQUEST['action'] == "edit") { ?>
					<h1>Update Delivery Schedule</h1>
					<?php } else { ?>
					<h1>Add Delivery Schedule</h1>
					<?php } ?>
				</div>
				<form action="" method="post" enctype="multipart/form-data" onsubmit="return frm_validation();">
				<input type="hidden" name="slot_id" id="slot_id" value="<?php echo $fetch_record['slot_id'];?>" />
				<div class="block-fluid">
					<div class="row-form clearfix">
						<div class="span3">Slot Name <font color="#FF0000">*</font></div>
						<div class="span9"><input type="text" name="slot_name" id="slot_name" value="<?php echo $slot_name;?>" /></div>
					</div>
					<div class="row-form clearfix">
						<div class="span3">Slot Time <font color="#FF0000">*</font></div>
						<div class="span9"><input type="text" name="slot_time" id="slot_time" value="<?php echo $slot_time;?>" /></div>
					</div>
					<div class="row-form clearfix">
						<div class="span3">&nbsp;</div>
						<div class="span9">
						<?php if(isset($_REQUEST['action']) && $_REQUEST['action'] == "edit") { ?>
							<button class="btn" type="submit" name="edit">Save</button>
						<?php } else { ?>
							<button class="btn" type="submit" name="add">Save</button>
						<?php } ?>
							<button class="btn" type="button" name="back" onclick="window.location.href='schedule_list.php'">Back To Delivery Schedule List</button>
						</div>
					</div>
				</div>
				</form>
			</div>
		</div>
	</div>
</div> 

<?php require_once("footer.php"); ?>