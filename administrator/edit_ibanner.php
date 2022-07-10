<?php 
require_once("header.php");
require_once("session_check.php");

//CODE FOR UPDATE BANNER
if(isset($_POST['edit']))
{
	//UPLOAD IMAGE 1
	if($_FILES['banner_image1']['name']!="")
	{	
		unlink("../uploads/banner/".$_POST['hid_banner_image1']);
		
		$photopath = pathinfo($_FILES['banner_image1']['name']);
		$extension = $photopath['extension'];
		$source = $_FILES['banner_image1']['tmp_name'];
		$banner_image1 = time().".".$extension;
		$destination = "../uploads/banner/".$banner_image1;
		move_uploaded_file($source,$destination);
	}
	else
	{
		$banner_image1 = $_POST['hid_banner_image1'];
	}
	
	//UPLOAD IMAGE 2
	if($_FILES['banner_image2']['name']!="")
	{	
		unlink("../uploads/banner/".$_POST['hid_banner_image2']);
		
		$photopath = pathinfo($_FILES['banner_image2']['name']);
		$extension = $photopath['extension'];
		$source = $_FILES['banner_image2']['tmp_name'];
		$banner_image2 = md5(time()).".".$extension;
		$destination = "../uploads/banner/".$banner_image2;
		move_uploaded_file($source,$destination);
	}
	else
	{
		$banner_image2 = $_POST['hid_banner_image2'];
	}
	
	//UPLOAD IMAGE 3
	if($_FILES['banner_image3']['name']!="")
	{	
		unlink("../uploads/banner/".$_POST['hid_banner_image3']);
		
		$photopath = pathinfo($_FILES['banner_image3']['name']);
		$extension = $photopath['extension'];
		$source = $_FILES['banner_image3']['tmp_name'];
		$banner_image3 = rand(99,999).".".$extension;
		$destination = "../uploads/banner/".$banner_image3;
		move_uploaded_file($source,$destination);
	}
	else
	{
		$banner_image3 = $_POST['hid_banner_image3'];
	}
	
	//UPLOAD IMAGE 4
	if($_FILES['banner_image4']['name']!="")
	{	
		unlink("../uploads/banner/".$_POST['hid_banner_image4']);
		
		$photopath = pathinfo($_FILES['banner_image4']['name']);
		$extension = $photopath['extension'];
		$source = $_FILES['banner_image4']['tmp_name'];
		$banner_image4 = rand(999,9999).".".$extension;
		$destination = "../uploads/banner/".$banner_image4;
		move_uploaded_file($source,$destination);
	}
	else
	{
		$banner_image4 = $_POST['hid_banner_image4'];
	}
	
	$sql_update = "UPDATE `og_inner_banners` SET `banner_image1` = '".$banner_image1."',`banner_image2` = '".$banner_image2."',`banner_image3` = '".$banner_image3."',`banner_image4` = '".$banner_image4."' WHERE `banner_id` = '1'";
	$exe_update = mysql_query($sql_update) or die(mysql_error());
	
	$_SESSION['edit_succ_msg'] = 'Banner updated successfully.';
	header("location: edit_ibanner.php");
	exit;
}

//FETCH DATA FROM DATABASE
$fetch_record = mysql_fetch_array(mysql_query("SELECT * FROM `og_inner_banners` WHERE `banner_id` = '1'"));
$banner_image1 = stripslashes($fetch_record['banner_image1']);
$banner_image2 = stripslashes($fetch_record['banner_image2']);
$banner_image3 = stripslashes($fetch_record['banner_image3']);
$banner_image4 = stripslashes($fetch_record['banner_image4']);
?>

<?php require_once("left_panel.php");?>
<div class="content">
	<div class="workplace">
		<?php if(isset($_SESSION['edit_succ_msg'])) { ?>
			<div class="alert alert-success">                
			<b><?php echo $_SESSION['edit_succ_msg'];?></b>
			</div> 
		<?php
		unset($_SESSION['edit_succ_msg']);
		}
		?>
		<div class="row-fluid">
			<div class="span12">
				<div class="head clearfix">
					<div class="isw-picture"></div>
					<h1>Inner Page Banner</h1>
				</div>
				<form action="" method="post" enctype="multipart/form-data" onsubmit="return frm_validation();">
				<input type="hidden" name="hid_banner_image1" id="hid_banner_image1" value="<?php echo $fetch_record['banner_image1'];?>" />
				<input type="hidden" name="hid_banner_image2" id="hid_banner_image2" value="<?php echo $fetch_record['banner_image2'];?>" />
				<input type="hidden" name="hid_banner_image3" id="hid_banner_image3" value="<?php echo $fetch_record['banner_image3'];?>" />
				<input type="hidden" name="hid_banner_image4" id="hid_banner_image4" value="<?php echo $fetch_record['banner_image4'];?>" />
				<div class="block-fluid">
					<div class="row-form clearfix">
						<div class="span3">Most Selling Products Banner <font color="#FF0000">*</font></div>
						<div class="span9"><input type="file" name="banner_image1" id="banner_image1" />
						<br /><img src="../uploads/banner/<?php echo $banner_image1;?>" border="0" alt="" width="400" height="200" />
						</div>                            
					 </div>
					 <div class="row-form clearfix">
						<div class="span3">Combo Offer Products Banner <font color="#FF0000">*</font></div>
						<div class="span9"><input type="file" name="banner_image2" id="banner_image2" />
						<br /><img src="../uploads/banner/<?php echo $banner_image2;?>" border="0" alt="" width="400" height="200" />
						</div>                            
					 </div>
					 <div class="row-form clearfix">
						<div class="span3">Seasonal Products Banner <font color="#FF0000">*</font></div>
						<div class="span9"><input type="file" name="banner_image3" id="banner_image3" />
						<br /><img src="../uploads/banner/<?php echo $banner_image3;?>" border="0" alt="" width="400" height="200" />
						</div>                            
					 </div>
					 <div class="row-form clearfix">
						<div class="span3">Deal Products Banner <font color="#FF0000">*</font></div>
						<div class="span9"><input type="file" name="banner_image4" id="banner_image4" />
						<br /><img src="../uploads/banner/<?php echo $banner_image4;?>" border="0" alt="" width="400" height="200" />
						</div>                            
					 </div>
					 <div class="row-form clearfix">
						<div class="span3">&nbsp;</div>
						<div class="span9">
						<button class="btn" type="submit" name="edit">Save</button>
						</div>
					</div>
				</div>
				</form>
			</div>
		</div>
	</div>
</div> 

<?php require_once("footer.php"); ?>