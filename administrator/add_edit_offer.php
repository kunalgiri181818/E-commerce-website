<?php 
require_once("header.php");
require_once("session_check.php");

//CODE FOR ADD OFFER
if(isset($_POST['add']))
{
	//UPLOAD IMAGE
	if($_FILES['offer_image']['name']!="")
	{	
		$photopath = pathinfo($_FILES['offer_image']['name']);
		$extension = $photopath['extension'];
		$source = $_FILES['offer_image']['tmp_name'];
		$offer_image = time().".".$extension;
		$destination = "../uploads/offer/".$offer_image;
		move_uploaded_file($source,$destination);
	}
	else
	{
		$offer_image = '';
	}
	
	$sql_insert = "INSERT INTO `og_offers` SET `offer_image` = '".$offer_image."',`offer_status` = 'Active'";
	$exe_insert = mysql_query($sql_insert) or die(mysql_error());
	
	$_SESSION['add_succ_msg'] = 'Offer added successfully.';
	header("location: offer_list.php");
	exit;
}

//CODE FOR UPDATE OFFER
if(isset($_POST['edit']))
{
	//UPLOAD IMAGE
	if($_FILES['offer_image']['name']!="")
	{	
		unlink("../uploads/offer/".$_POST['hid_offer_image']);
		
		$photopath = pathinfo($_FILES['offer_image']['name']);
		$extension = $photopath['extension'];
		$source = $_FILES['offer_image']['tmp_name'];
		$offer_image = time().".".$extension;
		$destination = "../uploads/offer/".$offer_image;
		move_uploaded_file($source,$destination);
	}
	else
	{
		$offer_image = $_POST['hid_offer_image'];
	}
	
	$sql_update = "UPDATE `og_offers` SET `offer_image` = '".$offer_image."' WHERE `offer_id` = '".$_REQUEST['offer_id']."'";
	$exe_update = mysql_query($sql_update) or die(mysql_error());
	
	$_SESSION['edit_succ_msg'] = 'Offer updated successfully.';
	header("location: offer_list.php");
	exit;
}

//FETCH DATA FROM DATABASE
if(isset($_REQUEST['action']) && $_REQUEST['action'] == "edit") 
{
	$fetch_record = mysql_fetch_array(mysql_query("SELECT * FROM `og_offers` WHERE `offer_id` = '".$_REQUEST['offer_id']."'"));
	$offer_image = stripslashes($fetch_record['offer_image']);
}
?>

<script language="javascript" type="text/javascript">
function frm_validation()
{
	if(document.getElementById('offer_image').value == '' && document.getElementById('hid_offer_image').value == '')
	{
		alert("Please upload offer");
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
					<div class="isw-picture"></div>
					<?php if(isset($_REQUEST['action']) && $_REQUEST['action'] == "edit") { ?>
					<h1>Update Offer</h1>
					<?php } else { ?>
					<h1>Add Offer</h1>
					<?php } ?>
				</div>
				<form action="" method="post" enctype="multipart/form-data" onsubmit="return frm_validation();">
				<input type="hidden" name="offer_id" id="offer_id" value="<?php echo $fetch_record['offer_id'];?>" />
				<input type="hidden" name="hid_offer_image" id="hid_offer_image" value="<?php echo $fetch_record['offer_image'];?>" />
				<div class="block-fluid">
					<div class="row-form clearfix">
						<div class="span3">Offer <font color="#FF0000">*</font></div>
						<div class="span9"><input type="file" name="offer_image" id="offer_image" />
						<?php if(isset($_REQUEST['action']) && $_REQUEST['action'] == "edit") { ?>
						<br /><img src="../uploads/offer/<?php echo $offer_image;?>" border="0" alt="" width="200" height="200" />
						<?php } ?>
						</div>                            
					 </div>
					 <div class="row-form clearfix">
						<div class="span3">&nbsp;</div>
						<div class="span9">
						<?php if(isset($_REQUEST['action']) && $_REQUEST['action'] == "edit") { ?>
						<button class="btn" type="submit" name="edit">Save</button>
						<?php } else { ?>
						<button class="btn" type="submit" name="add">Save</button>
						<?php } ?>
						<button class="btn" type="button" name="back" onclick="window.location.href='offer_list.php'">Back To Offers List</button>
						</div>
					</div>
				</div>
				</form>
			</div>
		</div>
	</div>
</div> 

<?php require_once("footer.php"); ?>