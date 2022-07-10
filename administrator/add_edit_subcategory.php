<?php 
require_once("header.php");
require_once("session_check.php");

//CODE FOR ADD SUBCATEGORY
if(isset($_POST['add']))
{
	//UPLOAD IMAGE
	if($_FILES['subcategory_photo']['name']!="")
	{	
		$photopath = pathinfo($_FILES['subcategory_photo']['name']);
		$extension = $photopath['extension'];
		$source = $_FILES['subcategory_photo']['tmp_name'];
		$subcategory_photo = time().".".$extension;
		$destination = "../uploads/subcategory/".$subcategory_photo;
		move_uploaded_file($source,$destination);
	}
	else
	{
		$subcategory_photo = '';
	}
	
	$sql_insert = "INSERT INTO `og_subcategory` SET `category_id` = '".addslashes($_POST['hid_category_id'])."',`subcategory_name` = '".addslashes($_POST['subcategory_name'])."',`subcategory_photo` = '".$subcategory_photo."',`subcategory_status` = 'Active'";
	$exe_insert = mysql_query($sql_insert) or die(mysql_error());
	
	$_SESSION['add_succ_msg'] = 'Subcategory added successfully.';
	header("location: subcategory_list.php?category_id=".$_POST['hid_category_id']);
	exit;
}

//CODE FOR UPDATE SUBCATEGORY
if(isset($_POST['edit']))
{
	//UPLOAD IMAGE
	if($_FILES['subcategory_photo']['name']!="")
	{	
		unlink("../uploads/subcategory/".$_POST['hid_subcategory_photo']);
		
		$photopath = pathinfo($_FILES['subcategory_photo']['name']);
		$extension = $photopath['extension'];
		$source = $_FILES['subcategory_photo']['tmp_name'];
		$subcategory_photo = time().".".$extension;
		$destination = "../uploads/subcategory/".$subcategory_photo;
		move_uploaded_file($source,$destination);
	}
	else
	{
		$subcategory_photo = $_POST['hid_subcategory_photo'];
	}
	
	$sql_update = "UPDATE `og_subcategory` SET `category_id` = '".addslashes($_POST['hid_category_id'])."',`subcategory_name` = '".addslashes($_POST['subcategory_name'])."',`subcategory_photo` = '".$subcategory_photo."' WHERE `subcategory_id` = '".$_REQUEST['subcategory_id']."'";
	$exe_update = mysql_query($sql_update) or die(mysql_error());
	
	$_SESSION['edit_succ_msg'] = 'Subcategory updated successfully.';
	header("location: subcategory_list.php?category_id=".$_POST['hid_category_id']);
	exit;
}

//FETCH DATA FROM DATABASE
if(isset($_REQUEST['action']) && $_REQUEST['action'] == "edit") 
{
	$fetch_record = mysql_fetch_array(mysql_query("SELECT * FROM `og_subcategory` WHERE `subcategory_id` = '".$_REQUEST['subcategory_id']."'"));
	$subcategory_name = stripslashes($fetch_record['subcategory_name']);
	$subcategory_photo = stripslashes($fetch_record['subcategory_photo']);
}
?>

<?php
$getCategory = mysql_fetch_array(mysql_query("SELECT * FROM `og_category` WHERE `category_id` = '".$_GET['category_id']."'"));
$category_name = stripslashes($getCategory['category_name']);
?>

<script language="javascript" type="text/javascript">
function frm_validation()
{
	if(document.getElementById('subcategory_name').value == '')
	{
		alert("Please enter subcategory");
		document.getElementById('subcategory_name').focus();
		return false;
	}
	
	if(document.getElementById('subcategory_photo').value == '' && document.getElementById('hid_subcategory_photo').value == '')
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
					<div class="isw-documents"></div>
					<?php if(isset($_REQUEST['action']) && $_REQUEST['action'] == "edit") { ?>
					<h1>Update Subcategory For <?php echo $category_name;?></h1>
					<?php } else { ?>
					<h1>Add Subcategory For <?php echo $category_name;?></h1>
					<?php } ?>
				</div>
				<form action="" method="post" enctype="multipart/form-data" onsubmit="return frm_validation();">
				<input type="hidden" name="subcategory_id" id="subcategory_id" value="<?php echo $fetch_record['subcategory_id'];?>" />
				<input type="hidden" name="hid_subcategory_photo" id="hid_subcategory_photo" value="<?php echo $fetch_record['subcategory_photo'];?>" />
				<input type="hidden" name="hid_category_id" id="hid_category_id" value="<?php echo $_GET['category_id'];?>" />
				<div class="block-fluid">
					<div class="row-form clearfix">
						<div class="span3">Subcategory <font color="#FF0000">*</font></div>
						<div class="span9"><input type="text" name="subcategory_name" id="subcategory_name" value="<?php echo $subcategory_name;?>" /></div>                            
					</div>
					<div class="row-form clearfix">
						<div class="span3">Icon <font color="#FF0000">*</font></div>
						<div class="span9"><input type="file" name="subcategory_photo" id="subcategory_photo" />
						<?php if(isset($_REQUEST['action']) && $_REQUEST['action'] == "edit") { ?>
						<br /><img src="../uploads/subcategory/<?php echo $subcategory_photo;?>" border="0" alt="" width="100" heightt="100" />
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
							<button class="btn" type="button" name="back" onclick="window.location.href='subcategory_list.php?category_id=<?php echo $_GET['category_id']?>'">Back To Subcategory List For <?php echo $category_name;?></button>
						</div>
					</div>
				</div>
				</form>
			</div>
		</div>
	</div>
</div> 

<?php require_once("footer.php"); ?>