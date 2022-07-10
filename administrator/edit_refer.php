<?php 
require_once("header.php");
require_once("session_check.php");

//CODE FOR UPDATE CONTENT
if(isset($_POST['edit']))
{
    //UPLOAD IMAGE
	if($_FILES['content_photo']['name']!="")
	{	
		unlink("../uploads/banner/".$_POST['hid_content_photo']);
		
		$photopath = pathinfo($_FILES['content_photo']['name']);
		$extension = $photopath['extension'];
		$source = $_FILES['content_photo']['tmp_name'];
		$content_photo = time().".".$extension;
		$destination = "../uploads/banner/".$content_photo;
		move_uploaded_file($source,$destination);
	}
	else
	{
		$content_photo = $_POST['hid_content_photo'];
	}

	$sql_update = "UPDATE `og_contents` SET `content_title` = '".addslashes($_POST['content_title'])."',`content` = '".addslashes($_POST['content'])."',`content_photo` = '".$content_photo."' WHERE `content_id` = '6'";
	$exe_update = mysql_query($sql_update) or die(mysql_error());
	
	$_SESSION['save_succ_msg'] = 'Content updated successfully.';
	header("location: edit_refer.php");
	exit;
}

//FETCH DATA FROM DATABASE
$fetch_record = mysql_fetch_array(mysql_query("SELECT * FROM `og_contents` WHERE `content_id` = '6'"));
$content_title = stripslashes($fetch_record['content_title']);
$content = stripslashes($fetch_record['content']);
$content_photo = stripslashes($fetch_record['content_photo']);
?>

<script language="javascript" type="text/javascript">
function frm_validation()
{
	if(document.getElementById('content_title').value == '')
	{
		alert("Please enter title");
		document.getElementById('content_title').focus();
		return false;
	}
	
	if(document.getElementById('content').value == '')
	{
		alert("Please enter content");
		document.getElementById('content').focus();
		return false;
	}
}
</script>

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
				<div class="head clearfix">
					<div class="isw-documents"></div>
					<h1>Refer & Earn</h1>
				</div>
				<form action="" method="post" enctype="multipart/form-data" onsubmit="return frm_validation();">
				    <input type="hidden" name="hid_content_photo" id="hid_content_photo" value="<?php echo $fetch_record['content_photo'];?>" />
				<div class="block-fluid">
					<div class="row-form clearfix">
						<div class="span3">Title <font color="#FF0000">*</font></div>
						<div class="span9"><input type="text" name="content_title" id="content_title" value="<?php echo $content_title;?>" /></div>
					</div>
					<div class="row-form clearfix">
						<div class="span3">Content <font color="#FF0000">*</font></div>
						<div class="span9"><textarea name="content" id="content" style="height:300px;"><?php echo $content;?></textarea></div>                            
					</div>
					<div class="row-form clearfix">
						<div class="span3">Banner <font color="#FF0000">*</font></div>
						<div class="span9"><input type="file" name="content_photo" id="content_photo" /><br />
						<br /><img src="../uploads/banner/<?php echo $content_photo;?>" border="0" alt="" width="450" height="200" />
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