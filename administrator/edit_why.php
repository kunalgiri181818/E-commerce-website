<?php 
require_once("header.php");
require_once("session_check.php");

//CODE FOR UPDATE CONTENT
if(isset($_POST['edit']))
{
	$sql_update = "UPDATE `og_contents` SET `content_title` = '".addslashes($_POST['content_title'])."',`content` = '".addslashes($_POST['content'])."' WHERE `content_id` = '10'";
	$exe_update = mysql_query($sql_update) or die(mysql_error());
	
	$_SESSION['save_succ_msg'] = 'Content updated successfully.';
	header("location: edit_why.php");
	exit;
}

//FETCH DATA FROM DATABASE
$fetch_record = mysql_fetch_array(mysql_query("SELECT * FROM `og_contents` WHERE `content_id` = '10'"));
$content_title = stripslashes($fetch_record['content_title']);
$content = stripslashes($fetch_record['content']);
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
					<h1>Why you choose Go Veggies</h1>
				</div>
				<form action="" method="post" enctype="multipart/form-data" onsubmit="return frm_validation();">
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