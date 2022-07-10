<?php 
require_once("header.php");
require_once("session_check.php");

//CODE FOR ADD ZIPCODE
if(isset($_POST['add']))
{
	$sql_insert = "INSERT INTO `og_zipcode` SET `available_zipcode` = '".addslashes($_POST['zipcode'])."',`zipcode_status` = 'Active'";
	$exe_insert = mysql_query($sql_insert) or die(mysql_error());
	
	$_SESSION['add_succ_msg'] = 'Zipcode added successfully.';
	header("location: zip_list.php");
	exit;
}

//CODE FOR UPDATE ZIPCODE
if(isset($_POST['edit']))
{
	$sql_update = "UPDATE `og_zipcode` SET `available_zipcode` = '".addslashes($_POST['zipcode'])."' WHERE `zipcode_id` = '".$_REQUEST['zipcode_id']."'";
	$exe_update = mysql_query($sql_update) or die(mysql_error());
	
	$_SESSION['edit_succ_msg'] = 'Zipcode updated successfully.';
	header("location: zip_list.php");
	exit;
}

//FETCH DATA FROM DATABASE
if(isset($_REQUEST['action']) && $_REQUEST['action'] == "edit") 
{
	$fetch_record = mysql_fetch_array(mysql_query("SELECT * FROM `og_zipcode` WHERE `zipcode_id` = '".$_REQUEST['zipcode_id']."'"));
	$zipcode = stripslashes($fetch_record['available_zipcode']);
}
?>

<script language="javascript" type="text/javascript">
function frm_validation()
{
	if(document.getElementById('zipcode').value == '')
	{
		alert("Please enter zipcode");
		document.getElementById('zipcode').focus();
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
					<h1>Update Zipcode</h1>
					<?php } else { ?>
					<h1>Add Zipcode</h1>
					<?php } ?>
				</div>
				<form action="" method="post" enctype="multipart/form-data" onsubmit="return frm_validation();">
				<input type="hidden" name="zipcode_id" id="zipcode_id" value="<?php echo $fetch_record['zipcode_id'];?>" />
				<div class="block-fluid">
					<div class="row-form clearfix">
						<div class="span3">Zipcode <font color="#FF0000">*</font></div>
						<div class="span9"><input type="text" name="zipcode" id="zipcode" value="<?php echo $zipcode;?>" /></div>                            
					</div>
					<div class="row-form clearfix">
						<div class="span3">&nbsp;</div>
						<div class="span9">
						<?php if(isset($_REQUEST['action']) && $_REQUEST['action'] == "edit") { ?>
							<button class="btn" type="submit" name="edit">Save</button>
						<?php } else { ?>
							<button class="btn" type="submit" name="add">Save</button>
						<?php } ?>
							<button class="btn" type="button" name="back" onclick="window.location.href='zip_list.php'">Back To Zipcode List</button>
						</div>
					</div>
				</div>
				</form>
			</div>
		</div>
	</div>
</div> 

<?php require_once("footer.php"); ?>