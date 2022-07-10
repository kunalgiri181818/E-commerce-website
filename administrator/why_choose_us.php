<?php 
require_once("header.php");
require_once("session_check.php");

//CODE FOR UPDATE CONTENT
if(isset($_POST['save']))
{
	$sql_update = "UPDATE `og_why_choose` SET `choose_title` = '".addslashes($_POST['choose_title1'])."',`choose_text` = '".addslashes($_POST['choose_text1'])."' WHERE `choose_id` = '1'";
	$exe_update = mysql_query($sql_update) or die(mysql_error());
	
	$sql_update2 = "UPDATE `og_why_choose` SET `choose_title` = '".addslashes($_POST['choose_title2'])."',`choose_text` = '".addslashes($_POST['choose_text2'])."' WHERE `choose_id` = '2'";
	$exe_update2 = mysql_query($sql_update2) or die(mysql_error());
	
	$sql_update3 = "UPDATE `og_why_choose` SET `choose_title` = '".addslashes($_POST['choose_title3'])."',`choose_text` = '".addslashes($_POST['choose_text3'])."' WHERE `choose_id` = '3'";
	$exe_update3 = mysql_query($sql_update3) or die(mysql_error());
	
	$sql_update4 = "UPDATE `og_why_choose` SET `choose_title` = '".addslashes($_POST['choose_title4'])."',`choose_text` = '".addslashes($_POST['choose_text4'])."' WHERE `choose_id` = '4'";
	$exe_update4 = mysql_query($sql_update4) or die(mysql_error());
	
	$_SESSION['save_succ_msg'] = 'Content updated successfully.';
	header("location: why_choose_us.php");
	exit;
}

//FETCH DATA FROM DATABASE
$fetch_record = mysql_fetch_array(mysql_query("SELECT * FROM `og_why_choose` WHERE `choose_id` = '1'"));
$choose_title1 = stripslashes($fetch_record['choose_title']);
$choose_text1 = stripslashes($fetch_record['choose_text']);
$fetch_record2 = mysql_fetch_array(mysql_query("SELECT * FROM `og_why_choose` WHERE `choose_id` = '2'"));
$choose_title2 = stripslashes($fetch_record2['choose_title']);
$choose_text2 = stripslashes($fetch_record2['choose_text']);
$fetch_record3 = mysql_fetch_array(mysql_query("SELECT * FROM `og_why_choose` WHERE `choose_id` = '3'"));
$choose_title3 = stripslashes($fetch_record3['choose_title']);
$choose_text3 = stripslashes($fetch_record3['choose_text']);
$fetch_record4 = mysql_fetch_array(mysql_query("SELECT * FROM `og_why_choose` WHERE `choose_id` = '4'"));
$choose_title4 = stripslashes($fetch_record4['choose_title']);
$choose_text4 = stripslashes($fetch_record4['choose_text']);
?>

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
				<form action="" method="post" enctype="multipart/form-data" onsubmit="return frm_validation();">
				<div class="head clearfix">
					<div class="isw-documents"></div>
					<h1>Why Choose Us</h1>
				</div>
				<div>&nbsp;</div>
				<div class="head clearfix">
					<div class="isw-documents"></div>
					<h1>Line 1</h1>
				</div>
				<div class="block-fluid">
					<div class="row-form clearfix">
						<div class="span3">Title</div>
						<div class="span9"><input type="text" name="choose_title1" id="choose_title1" value="<?php echo $choose_title1;?>" /></div>
					</div> 
					<div class="row-form clearfix">
						<div class="span3">Text</div>
						<div class="span9"><input type="text" name="choose_text1" id="choose_text1" value="<?php echo $choose_text1;?>" /></div>
					</div> 
				</div>
				<div>&nbsp;</div>
				<div class="head clearfix">
					<div class="isw-documents"></div>
					<h1>Line 2</h1>
				</div>
				<div class="block-fluid">
					<div class="row-form clearfix">
						<div class="span3">Title</div>
						<div class="span9"><input type="text" name="choose_title2" id="choose_title2" value="<?php echo $choose_title2;?>" /></div>
					</div> 
					<div class="row-form clearfix">
						<div class="span3">Text</div>
						<div class="span9"><input type="text" name="choose_text2" id="choose_text2" value="<?php echo $choose_text2;?>" /></div>
					</div> 
				</div>
				<div>&nbsp;</div>
				<div class="head clearfix">
					<div class="isw-documents"></div>
					<h1>Line 3</h1>
				</div>
				<div class="block-fluid">
					<div class="row-form clearfix">
						<div class="span3">Title</div>
						<div class="span9"><input type="text" name="choose_title3" id="choose_title3" value="<?php echo $choose_title3;?>" /></div>
					</div> 
					<div class="row-form clearfix">
						<div class="span3">Text</div>
						<div class="span9"><input type="text" name="choose_text3" id="choose_text3" value="<?php echo $choose_text3;?>" /></div>
					</div>
				</div>
				<div>&nbsp;</div>
				<div class="head clearfix">
					<div class="isw-documents"></div>
					<h1>Line 4</h1>
				</div>
				<div class="block-fluid">
					<div class="row-form clearfix">
						<div class="span3">Title</div>
						<div class="span9"><input type="text" name="choose_title4" id="choose_title4" value="<?php echo $choose_title4;?>" /></div>
					</div> 
					<div class="row-form clearfix">
						<div class="span3">Text</div>
						<div class="span9"><input type="text" name="choose_text4" id="choose_text4" value="<?php echo $choose_text4;?>" /></div>
					</div>				
					<div class="row-form clearfix">
						<div class="span3">&nbsp;</div>
						<div class="span9"><button class="btn" type="submit" name="save">Save</button></div>
					</div>
				</div>
				</form>
			</div>
		</div>
	</div>
</div>   

<?php require_once("footer.php"); ?>