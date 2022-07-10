<?php 
require_once("header.php");
require_once("session_check.php");

//CODE FOR ADD BRAND
if(isset($_POST['add']))
{
	//UPLOAD IMAGE
	if($_FILES['brand_image']['name']!="")
	{	
		$photopath = pathinfo($_FILES['brand_image']['name']);
		$extension = $photopath['extension'];
		$source = $_FILES['brand_image']['tmp_name'];
		$brand_image = time().".".$extension;
		$destination = "../uploads/brand/".$brand_image;
		move_uploaded_file($source,$destination);
	}
	else
	{
		$brand_image = '';
	}
	
	$sql_insert = "INSERT INTO `og_brands` SET `brand_name` = '".addslashes($_POST['brand_name'])."',`brand_image` = '".$brand_image."',`brand_status` = 'Active'";
	$exe_insert = mysql_query($sql_insert) or die(mysql_error());
	
	$_SESSION['add_succ_msg'] = 'Brand added successfully.';
	header("location: brand_list.php");
	exit;
}

//CODE FOR UPDATE BRAND
if(isset($_POST['edit']))
{
	//UPLOAD IMAGE
	if($_FILES['brand_image']['name']!="")
	{	
		unlink("../uploads/brand/".$_POST['hid_brand_image']);
		
		$photopath = pathinfo($_FILES['brand_image']['name']);
		$extension = $photopath['extension'];
		$source = $_FILES['brand_image']['tmp_name'];
		$brand_image = time().".".$extension;
		$destination = "../uploads/brand/".$brand_image;
		move_uploaded_file($source,$destination);
	}
	else
	{
		$brand_image = $_POST['hid_brand_image'];
	}
	
	$sql_update = "UPDATE `og_brands` SET `brand_name` = '".addslashes($_POST['brand_name'])."',`brand_image` = '".$brand_image."' WHERE `brand_id` = '".$_REQUEST['brand_id']."'";
	$exe_update = mysql_query($sql_update) or die(mysql_error());
	
	$_SESSION['edit_succ_msg'] = 'Brand updated successfully.';
	header("location: brand_list.php");
	exit;
}

//FETCH DATA FROM DATABASE
if(isset($_REQUEST['action']) && $_REQUEST['action'] == "edit") 
{
	$fetch_record = mysql_fetch_array(mysql_query("SELECT * FROM `og_brands` WHERE `brand_id` = '".$_REQUEST['brand_id']."'"));
	$brand_name = stripslashes($fetch_record['brand_name']);
	$brand_image = stripslashes($fetch_record['brand_image']);
}
?>

<script language="javascript" type="text/javascript">
function frm_validation()
{
	if(document.getElementById('brand_name').value == '')
	{
		alert("Please enter name");
		document.getElementById('brand_name').focus();
		return false;
	}
	
	if(document.getElementById('brand_image').value == '' && document.getElementById('hid_brand_image').value == '')
	{
		alert("Please upload icon");
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
					<h1>Update Brand</h1>
					<?php } else { ?>
					<h1>Add Brand</h1>
					<?php } ?>
				</div>
				<form action="" method="post" enctype="multipart/form-data" onsubmit="return frm_validation();">
				<input type="hidden" name="brand_id" id="brand_id" value="<?php echo $fetch_record['brand_id'];?>" />
				<input type="hidden" name="hid_brand_image" id="hid_brand_image" value="<?php echo $fetch_record['brand_image'];?>" />
				<div class="block-fluid">
					<div class="row-form clearfix">
						<div class="span3">Name <font color="#FF0000">*</font></div>
						<div class="span9"><input type="text" name="brand_name" id="brand_name" value="<?php echo $brand_name;?>" />
						</div>                            
					</div>
					<div class="row-form clearfix">
						<div class="span3">Icon <font color="#FF0000">*</font></div>
						<div class="span9"><input type="file" name="brand_image" id="brand_image" /></font>
						<?php if(isset($_REQUEST['action']) && $_REQUEST['action'] == "edit") { ?>
						<br /><img src="../uploads/brand/<?php echo $brand_image;?>" border="0" alt="" width="100" height="100" />
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
						<button class="btn" type="button" name="back" onclick="window.location.href='brand_list.php'">Back To Brands List</button>
						</div>
					</div>
				</div>
				</form>
			</div>
		</div>
	</div>
</div> 

<?php require_once("footer.php"); ?>