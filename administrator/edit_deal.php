<?php 
require_once("header.php");
require_once("session_check.php");

//CODE FOR UPDATE DEAL DATE
if(isset($_POST['edit']))
{
	$sql_update = "UPDATE `og_administrator` SET `deal_date` = '".addslashes($_POST['deal_date'])."' WHERE `admin_id` = '1'";
	$exe_update = mysql_query($sql_update) or die(mysql_error());
	
	$_SESSION['edit_succ_msg'] = 'Deal date posted successfully.';
	header("location: edit_deal.php");
	exit;
}

//FETCH DATA FROM DATABASE
$fetch_record = mysql_fetch_array(mysql_query("SELECT * FROM `og_administrator` WHERE `admin_id` = '1'"));
$deal_date = stripslashes($fetch_record['deal_date']);
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
					<div class="isw-documents"></div>
					<h1>Deal Date</h1>
				</div>
				<form action="" method="post" enctype="multipart/form-data" onsubmit="return frm_validation();">
				<div class="block-fluid">
					<div class="row-form clearfix">
						<div class="span3">Last Date of Discount</div>
						<div class="span9"><input type="text" name="deal_date" id="deal_date" value="<?php echo $deal_date;?>" /><br><font color="#FF0000;">[e.g - 2020-02-28]</font>
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