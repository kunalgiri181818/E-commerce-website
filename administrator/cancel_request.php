<?php 
require_once("header.php");
require_once("session_check.php");

//FETCH DATA FROM DATABASE
$fetch_record = mysql_fetch_array(mysql_query("SELECT * FROM `bm_orders` WHERE `orderid` = '".$_REQUEST['order_id']."'"));
?>

<?php require_once("left_panel.php");?>
<div class="content">
	<div class="workplace">
		<div class="row-fluid">
			<div class="span12">
				<div class="head clearfix">
					<div class="isw-documents"></div>					
					<h1>Reason For Cancellation</h1>					
				</div>
				<form action="" method="post" enctype="multipart/form-data">
				<div class="block-fluid">
					<div class="row-form clearfix">
						<div class="span3">Comment</div>
						<div class="span9"><?php echo nl2br(stripslashes($fetch_record['comment']));?></div>                            
					</div>					
					<div class="row-form clearfix">
						<div class="span3">&nbsp;</div>
						<div class="span9">						
							<button class="btn" type="button" name="back" onclick="window.location.href='order_list.php?action=accept&order_id=<?php echo $_REQUEST['order_id'];?>'">Cancel Request Accept</button>&nbsp;<button class="btn" type="button" name="back" onclick="window.location.href='order_list.php?action=decline&order_id=<?php echo $_REQUEST['order_id'];?>'">Cancel Request Decline</button>&nbsp;<button class="btn" type="button" name="back" onclick="window.location.href='order_list.php'">Back To Orders List</button>
						</div>
					</div>
				</div>
				</form>
			</div>
		</div>
	</div>
</div> 

<?php require_once("footer.php"); ?>