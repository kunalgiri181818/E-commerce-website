<?php 
require_once("header.php");
require_once("session_check.php");

//CODE FOR DELETE PHOTO 2
if(isset($_GET['action']) && $_GET['action'] == "delete1")
{
	unlink("../uploads/product/".$_REQUEST['photo_name']);
	
	$sql_update = "UPDATE `og_products` SET `product_photo2` = '' WHERE `product_id` = '".$_GET['product_id']."'";
	$exe_update = mysql_query($sql_update) or die(mysql_error());
	
	$_SESSION['deli_succ_msg'] = 'Product Photo 2 deleted successfully.';
	header("location: add_edit_product.php?product_id=".$_GET['product_id']."&page=".$_REQUEST['page']."&action=edit");
	exit;
}

//CODE FOR DELETE PHOTO 3
if(isset($_GET['action']) && $_GET['action'] == "delete2")
{
	unlink("../uploads/product/".$_REQUEST['photo_name']);
	
	$sql_update = "UPDATE `og_products` SET `product_photo3` = '' WHERE `product_id` = '".$_GET['product_id']."'";
	$exe_update = mysql_query($sql_update) or die(mysql_error());
	
	$_SESSION['deli_succ_msg'] = 'Product Photo 3 deleted successfully.';
	header("location: add_edit_product.php?product_id=".$_GET['product_id']."&page=".$_REQUEST['page']."&action=edit");
	exit;
}

//CODE FOR DELETE PHOTO 4
if(isset($_GET['action']) && $_GET['action'] == "delete3")
{
	unlink("../uploads/product/".$_REQUEST['photo_name']);
	
	$sql_update = "UPDATE `og_products` SET `product_photo4` = '' WHERE `product_id` = '".$_GET['product_id']."'";
	$exe_update = mysql_query($sql_update) or die(mysql_error());
	
	$_SESSION['deli_succ_msg'] = 'Product Photo 4 deleted successfully.';
	header("location: add_edit_product.php?product_id=".$_GET['product_id']."&page=".$_REQUEST['page']."&action=edit");
	exit;
}

//CODE FOR ADD PRODUCT
if(isset($_POST['add']))
{
	//UPLOAD IMAGE
	if($_FILES['product_photo']['name']!="")
	{	
		$photopath = pathinfo($_FILES['product_photo']['name']);
		$extension = $photopath['extension'];
		$source = $_FILES['product_photo']['tmp_name'];
		$product_photo = time().".".$extension;
		$destination = "../uploads/product/".$product_photo;
		move_uploaded_file($source,$destination);
	}
	else
	{
		$product_photo = '';
	}
	
	//UPLOAD IMAGE
	if($_FILES['product_photo2']['name']!="")
	{	
		$photopath = pathinfo($_FILES['product_photo2']['name']);
		$extension = $photopath['extension'];
		$source = $_FILES['product_photo2']['tmp_name'];
		$product_photo2 = md5(time()).".".$extension;
		$destination = "../uploads/product/".$product_photo2;
		move_uploaded_file($source,$destination);
	}
	else
	{
		$product_photo2 = '';
	}
	
	//UPLOAD IMAGE
	if($_FILES['product_photo3']['name']!="")
	{	
		$photopath = pathinfo($_FILES['product_photo3']['name']);
		$extension = $photopath['extension'];
		$source = $_FILES['product_photo3']['tmp_name'];
		$product_photo3 = rand(99,99999).".".$extension;
		$destination = "../uploads/product/".$product_photo3;
		move_uploaded_file($source,$destination);
	}
	else
	{
		$product_photo3 = '';
	}
	
	//UPLOAD IMAGE
	if($_FILES['product_photo4']['name']!="")
	{	
		$photopath = pathinfo($_FILES['product_photo4']['name']);
		$extension = $photopath['extension'];
		$source = $_FILES['product_photo4']['tmp_name'];
		$product_photo4 = rand(99999,999999).".".$extension;
		$destination = "../uploads/product/".$product_photo4;
		move_uploaded_file($source,$destination);
	}
	else
	{
		$product_photo4 = '';
	}
	
	$sql_insert = "INSERT INTO `og_products` SET `category_id` = '".addslashes($_POST['category_id'])."',`subcategory_id` = '".addslashes($_POST['subcategory_id'])."',`product_name_english` = '".addslashes($_POST['product_name_english'])."',`product_details` = '".addslashes($_POST['product_details'])."',`product_photo` = '".$product_photo."',`product_photo2` = '".$product_photo2."',`product_photo3` = '".$product_photo3."',`product_photo4` = '".$product_photo4."',`product_status` = 'Active'";
	$exe_insert = mysql_query($sql_insert) or die(mysql_error());
	
	$_SESSION['add_succ_msg'] = 'Product added successfully.';
	header("location: product_list.php?page=".$_REQUEST['page']);
	exit;
}

//CODE FOR UPDATE PRODUCT
if(isset($_POST['edit']))
{
	//UPLOAD IMAGE
	if($_FILES['product_photo']['name']!="")
	{	
		unlink("../uploads/product/".$_POST['hid_product_photo']);
		
		$photopath = pathinfo($_FILES['product_photo']['name']);
		$extension = $photopath['extension'];
		$source = $_FILES['product_photo']['tmp_name'];
		$product_photo = time().".".$extension;
		$destination = "../uploads/product/".$product_photo;
		move_uploaded_file($source,$destination);
	}
	else
	{
		$product_photo = $_POST['hid_product_photo'];
	}
	
	//UPLOAD IMAGE
	if($_FILES['product_photo2']['name']!="")
	{	
		if($_POST['hid_product_photo2']!="")
		{
			unlink("../uploads/product/".$_POST['hid_product_photo2']);
		}

		$photopath = pathinfo($_FILES['product_photo2']['name']);
		$extension = $photopath['extension'];
		$source = $_FILES['product_photo2']['tmp_name'];
		$product_photo2 = md5(time()).".".$extension;
		$destination = "../uploads/product/".$product_photo2;
		move_uploaded_file($source,$destination);
	}
	else
	{
		$product_photo2 = $_POST['hid_product_photo2'];
	}	
	
	//UPLOAD IMAGE
	if($_FILES['product_photo3']['name']!="")
	{	
		if($_POST['hid_product_photo3']!="")
		{
			unlink("../uploads/product/".$_POST['hid_product_photo3']);
		}
		
		$photopath = pathinfo($_FILES['product_photo3']['name']);
		$extension = $photopath['extension'];
		$source = $_FILES['product_photo3']['tmp_name'];
		$product_photo3 = rand(99,99999).".".$extension;
		$destination = "../uploads/product/".$product_photo3;
		move_uploaded_file($source,$destination);
	}
	else
	{
		$product_photo3 = $_POST['hid_product_photo3'];
	}
	
	//UPLOAD IMAGE
	if($_FILES['product_photo4']['name']!="")
	{	
		if($_POST['hid_product_photo4']!="")
		{
			unlink("../uploads/product/".$_POST['hid_product_photo4']);
		}
		
		$photopath = pathinfo($_FILES['product_photo4']['name']);
		$extension = $photopath['extension'];
		$source = $_FILES['product_photo4']['tmp_name'];
		$product_photo4 = rand(99999,999999).".".$extension;
		$destination = "../uploads/product/".$product_photo4;
		move_uploaded_file($source,$destination);
	}
	else
	{
		$product_photo4 = $_POST['hid_product_photo4'];
	}
	
	$sql_update = "UPDATE `og_products` SET `category_id` = '".addslashes($_POST['category_id'])."',`subcategory_id` = '".addslashes($_POST['subcategory_id'])."',`product_name_english` = '".addslashes($_POST['product_name_english'])."',`product_details` = '".addslashes($_POST['product_details'])."',`product_photo` = '".$product_photo."',`product_photo2` = '".$product_photo2."',`product_photo3` = '".$product_photo3."',`product_photo4` = '".$product_photo4."' WHERE `product_id` = '".$_POST['hid_product_id']."'";
	$exe_update = mysql_query($sql_update) or die(mysql_error());
	
	$_SESSION['edit_succ_msg'] = 'Product updated successfully.';
	header("location: product_list.php?page=".$_REQUEST['page']);
	exit;
}

//FETCH DATA FROM DATABASE
if(isset($_REQUEST['action']) && $_REQUEST['action'] == "edit") 
{
	$fetch_record = mysql_fetch_array(mysql_query("SELECT * FROM `og_products` WHERE `product_id` = '".$_REQUEST['product_id']."'"));
	$category_id = stripslashes($fetch_record['category_id']);
	$subcategory_id = stripslashes($fetch_record['subcategory_id']);
	$product_id = stripslashes($fetch_record['product_id']);
	$product_name_english = stripslashes($fetch_record['product_name_english']);
	$product_photo = stripslashes($fetch_record['product_photo']);
	$product_photo2 = stripslashes($fetch_record['product_photo2']);
	$product_photo3 = stripslashes($fetch_record['product_photo3']);
	$product_photo4 = stripslashes($fetch_record['product_photo4']);
	$product_details = stripslashes($fetch_record['product_details']);
}
?>

<script language="javascript" type="text/javascript">
function frm_validation()
{
	if(document.getElementById('category_id').value == '')
	{
		alert("Please select category");
		return false;
	}
	
	if(document.getElementById('product_name_english').value == '')
	{
		alert("Please enter name");
		document.getElementById('product_name_english').focus();
		return false;
	}
	
	if(document.getElementById('product_photo').value == '' && document.getElementById('hid_product_photo').value == '')
	{
		alert("Please upload photo");
		return false;
	}	
}
</script>

<script language="javascript" type="text/javascript">
function getSubcategory(myval)
{
	var str = {category_id:myval};
	$.ajax({
		type: "post",
		url: "ajax_get_subcategory.php",
		data: str,
		success: function(data) 
		{
			$('#subcat_area').html(data);
		}
	});
}
</script>

<?php require_once("left_panel.php");?>
<div class="content">
	<div class="workplace">
		<?php if(isset($_SESSION['deli_succ_msg'])) { ?>
			<div class="alert alert-success">                
			<b><?php echo $_SESSION['deli_succ_msg'];?></b>
			</div> 
		<?php
		unset($_SESSION['deli_succ_msg']);
		}
		?>
		<div class="row-fluid">
			<div class="span12">
				<div class="head clearfix">
					<div class="isw-documents"></div>
					<?php if(isset($_REQUEST['action']) && $_REQUEST['action'] == "edit") { ?>
					<h1>Update Product</h1>
					<?php } else { ?>
					<h1>Add Product</h1>
					<?php } ?>
				</div>
				<form action="" method="post" enctype="multipart/form-data" onsubmit="return frm_validation();">
				<input type="hidden" name="hid_product_id" id="hid_product_id" value="<?php echo $product_id;?>" />
				<input type="hidden" name="hid_product_photo" id="hid_product_photo" value="<?php echo $product_photo;?>" />
				<input type="hidden" name="hid_product_photo2" id="hid_product_photo2" value="<?php echo $product_photo2;?>" />
				<input type="hidden" name="hid_product_photo3" id="hid_product_photo3" value="<?php echo $product_photo3;?>" />
				<input type="hidden" name="hid_product_photo4" id="hid_product_photo4" value="<?php echo $product_photo4;?>" />
				<div class="block-fluid">
					<div class="row-form clearfix">
						<div class="span3">Category <font color="#FF0000">*</font></div>
						<div class="span9">
						<select name="category_id" id="category_id" onchange="getSubcategory(this.value);">
						<option value="">Select</option>
						<?php
						$sql_category = "SELECT * FROM `og_category` WHERE `category_status` = 'Active' ORDER BY `category_id` ASC";
						$exe_category = mysql_query($sql_category) or die();
						while($arr_category = mysql_fetch_array($exe_category))
						{
						?>
						<option value="<?php echo stripslashes($arr_category['category_id']);?>" <?php if($arr_category['category_id'] == $category_id) { ?>selected<?php } ?>><?php echo stripslashes($arr_category['category_name']);?></option>
						<?php
						}
						?>
						</select>
						</div>                            
					</div>
					<?php if(isset($_REQUEST['action']) && $_REQUEST['action'] == "edit") { ?>
					<div class="row-form clearfix" id="subcat_area">
						<div class="span3">Subcategory</div>
						<div class="span9">
						<select name="subcategory_id" id="subcategory_id">
						<?php
						$sql_category2 = "SELECT * FROM `og_subcategory` WHERE `category_id` = '".$category_id."' ORDER BY `subcategory_id` ASC";
						$exe_category2 = mysql_query($sql_category2) or die();
						while($arr_category2 = mysql_fetch_array($exe_category2))
						{
						?>
						<option value="<?php echo stripslashes($arr_category2['subcategory_id']);?>" <?php if($arr_category2['subcategory_id'] == $subcategory_id) { ?>selected<?php } ?>><?php echo stripslashes($arr_category2['subcategory_name']);?></option>
						<?php
						}
						?>
						</select>
						</div>                            
					</div>
					<?php } else { ?>
					<div class="row-form clearfix" id="subcat_area">
					</div>
					<?php } ?>
					<div class="row-form clearfix">
						<div class="span3">Product Name <font color="#FF0000">*</font></div>
						<div class="span9"><input type="text" name="product_name_english" id="product_name_english" value="<?php echo $product_name_english;?>" />
						</div>                            
					</div>
					<div class="row-form clearfix">
						<div class="span3">Product Details</div>
						<div class="span9"><textarea name="product_details" id="product_details"><?php echo $product_details;?></textarea></div>
					</div>					
					<div class="row-form clearfix">
						<div class="span3">Product Photo 1 <font color="#FF0000">*</font></div>
						<div class="span9"><input type="file" name="product_photo" id="product_photo" />
						<?php if(isset($_REQUEST['action']) && $_REQUEST['action'] == "edit") { ?>
						<br />
						<img src="../uploads/product/<?php echo $product_photo;?>" alt="" height="100" width="100" />
						<?php } ?>
						</div>                            
					</div>
					<div class="row-form clearfix">
						<div class="span3">Product Photo 2</div>
						<div class="span9"><input type="file" name="product_photo2" id="product_photo2" />
						<?php if(isset($_REQUEST['action']) && $_REQUEST['action'] == "edit") { ?>
						<?php if($product_photo2!="") { ?>
						<br />
						<img src="../uploads/product/<?php echo $product_photo2;?>" alt="" height="100" width="100" />
						<br>
						<a href="add_edit_product.php?product_id=<?php echo $_REQUEST['product_id'];?>&page=<?php echo $_REQUEST['page'];?>&photo_name=<?php echo $product_photo2;?>&action=delete1" style="color:#ff0000;" onclick="return confirm('Are you sure you want to delete this photo?');">Delete</a>
						<?php } ?>
						<?php } ?>
						</div>                            
					</div>
					<div class="row-form clearfix">
						<div class="span3">Product Photo 3</div>
						<div class="span9"><input type="file" name="product_photo3" id="product_photo3" />
						<?php if(isset($_REQUEST['action']) && $_REQUEST['action'] == "edit") { ?>
						<?php if($product_photo3!="") { ?>
						<br />
						<img src="../uploads/product/<?php echo $product_photo3;?>" alt="" height="100" width="100" />
						<br>
						<a href="add_edit_product.php?product_id=<?php echo $_REQUEST['product_id'];?>&page=<?php echo $_REQUEST['page'];?>&photo_name=<?php echo $product_photo3;?>&action=delete2" style="color:#ff0000;" onclick="return confirm('Are you sure you want to delete this photo?');">Delete</a>
						<?php } ?>
						<?php } ?>
						</div>                            
					</div>
					<div class="row-form clearfix">
						<div class="span3">Product Photo 4</div>
						<div class="span9"><input type="file" name="product_photo4" id="product_photo4" />
						<?php if(isset($_REQUEST['action']) && $_REQUEST['action'] == "edit") { ?>
						<?php if($product_photo4!="") { ?>
						<br />
						<img src="../uploads/product/<?php echo $product_photo4;?>" alt="" height="100" width="100" />
						<br>
						<a href="add_edit_product.php?product_id=<?php echo $_REQUEST['product_id'];?>&page=<?php echo $_REQUEST['page'];?>&photo_name=<?php echo $product_photo4;?>&action=delete3" style="color:#ff0000;" onclick="return confirm('Are you sure you want to delete this photo?');">Delete</a>
						<?php } ?>
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
							<button class="btn" type="button" name="back" onclick="window.location.href='product_list.php?page=<?php echo $_REQUEST['page'];?>'">Back To Products List</button>
						</div>
					</div>
				</div>
				</form>
			</div>
		</div>
	</div>
</div> 

<?php require_once("footer.php"); ?>