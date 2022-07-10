<?php 
require_once("header.php");
require_once("session_check.php");

//CODE FOR ADD CATEGORY
if(isset($_POST['add']))
{
	//UPLOAD IMAGE
	if($_FILES['category_photo']['name']!="")
	{	
		$photopath = pathinfo($_FILES['category_photo']['name']);
		$extension = $photopath['extension'];
		$source = $_FILES['category_photo']['tmp_name'];
		$category_photo = time().".".$extension;
		$destination = "../uploads/category/".$category_photo;
		move_uploaded_file($source,$destination);
	}
	else
	{
		$category_photo = '';
	}
	
	$sql_insert = "INSERT INTO `og_category` SET `category_name` = '".addslashes($_POST['category_name'])."',`category_photo` = '".$category_photo."',`category_status` = 'Active'";
	$exe_insert = mysql_query($sql_insert) or die(mysql_error());
	
	$_SESSION['add_succ_msg'] = 'Category added successfully.';
	header("location: category_list.php");
	exit;
}

//CODE FOR UPDATE CATEGORY
if(isset($_POST['edit']))
{
	//UPLOAD IMAGE
	if($_FILES['category_photo']['name']!="")
	{	
		unlink("../uploads/category/".$_POST['hid_category_photo']);
		
		$photopath = pathinfo($_FILES['category_photo']['name']);
		$extension = $photopath['extension'];
		$source = $_FILES['category_photo']['tmp_name'];
		$category_photo = time().".".$extension;
		$destination = "../uploads/category/".$category_photo;
		move_uploaded_file($source,$destination);
	}
	else
	{
		$category_photo = $_POST['hid_category_photo'];
	}
	
	$sql_update = "UPDATE `og_category` SET `category_name` = '".addslashes($_POST['category_name'])."',`category_photo` = '".$category_photo."' WHERE `category_id` = '".$_REQUEST['category_id']."'";
	$exe_update = mysql_query($sql_update) or die(mysql_error());
	
	$_SESSION['edit_succ_msg'] = 'Category updated successfully.';
	header("location: category_list.php");
	exit;
}

//FETCH DATA FROM DATABASE
if(isset($_REQUEST['action']) && $_REQUEST['action'] == "edit") 
{
	$fetch_record = mysql_fetch_array(mysql_query("SELECT * FROM `og_category` WHERE `category_id` = '".$_REQUEST['category_id']."'"));
	$category_name = stripslashes($fetch_record['category_name']);
	$category_photo = stripslashes($fetch_record['category_photo']);
}
?>

<script language="javascript" type="text/javascript">
function frm_validation()
{
	if(document.getElementById('category_name').value == '')
	{
		alert("Please enter category");
		document.getElementById('category_name').focus();
		return false;
	}
	
	if(document.getElementById('category_photo').value == '' && document.getElementById('hid_category_photo').value == '')
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
					<h1>Update Category</h1>
					<?php } else { ?>
					<h1>Add Category</h1>
					<?php } ?>
				</div>
				<form action="" method="post" enctype="multipart/form-data" onsubmit="return frm_validation();">
				<input type="hidden" name="category_id" id="category_id" value="<?php echo $fetch_record['category_id'];?>" />
				<input type="hidden" name="hid_category_photo" id="hid_category_photo" value="<?php echo $fetch_record['category_photo'];?>" />
				<div class="block-fluid">
					<div class="row-form clearfix">
						<div class="span3">Category <font color="#FF0000">*</font></div>
						<div class="span9"><input type="text" name="category_name" id="category_name" value="<?php echo $category_name;?>" /></div>                            
					</div>
					<div class="row-form clearfix">
						<div class="span3">Icon <font color="#FF0000">*</font></div>
						<div class="span9"><input type="file" name="category_photo" id="category_photo" />
						<?php if(isset($_REQUEST['action']) && $_REQUEST['action'] == "edit") { ?>
						<br /><img src="../uploads/category/<?php echo $category_photo;?>" border="0" alt="" width="100" heightt="100" />
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
							<button class="btn" type="button" name="back" onclick="window.location.href='category_list.php'">Back To Category List</button>
						</div>
					</div>
				</div>
				</form>
			</div>
		</div>
	</div>
</div> 

<?php require_once("footer.php"); ?>