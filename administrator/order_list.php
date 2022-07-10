<?php 
require_once("header.php");
require_once("session_check.php");

//CODE FOR CHANGE STATUS TO ACTIVE
if(isset($_GET['action']) && $_GET['action'] == "active")
{
	$sql_update = "UPDATE `og_orders` SET `delivery_status` = 'Delivered',`payment_status` = 'Paid' WHERE `unique_id` = '".$_GET['unique_id']."'";
	$exe_update = mysql_query($sql_update) or die(mysql_error());

	$_SESSION['change_succ_msg'] = 'Delivery status changed successfully.';
	header("location: order_list.php");
	exit;
}

//CODE FOR CANCEL ORDER
if(isset($_GET['action']) && $_GET['action'] == "accept")
{
	mysql_query("UPDATE `og_orders` SET `is_cancel` = 'Yes' WHERE `orderid` = '".$_GET['order_id']."'") or die(mysql_error());
	
	$_SESSION['del_succ_msg'] = 'Order cancelled successfully.';
	header("location: order_list.php");
	exit;
}

//CODE FOR DECLINE ORDER
if(isset($_GET['action']) && $_GET['action'] == "decline")
{
	mysql_query("UPDATE `og_orders` SET `is_cancel` = 'No' WHERE `orderid` = '".$_GET['order_id']."'") or die(mysql_error());
	
	$_SESSION['del_succ_msg'] = 'Order cancellation request not accepted.';
	header("location: order_list.php");
	exit;
}

//CODE FOR DELETE ORDER
if(isset($_GET['action']) && $_GET['action'] == "delete")
{
	mysql_query("DELETE FROM `og_temp_cart` WHERE `unique_id` = '".$_GET['unique_id']."'") or die(mysql_error());
	mysql_query("DELETE FROM `og_final_cart` WHERE `unique_id` = '".$_GET['unique_id']."'") or die(mysql_error());
	mysql_query("DELETE FROM `og_orders` WHERE `unique_id` = '".$_GET['unique_id']."'") or die(mysql_error());
	
	$_SESSION['del_succ_msg'] = 'Order deleted successfully.';
	header("location: order_list.php");
	exit;
}
?>

<?php require_once("left_panel.php");?>
<div class="content">
	<div class="workplace">
		<?php if(isset($_SESSION['add_succ_msg'])) { ?>
			<div class="alert alert-success">                
			<b><?php echo $_SESSION['add_succ_msg'];?></b>
			</div> 
		<?php
		unset($_SESSION['add_succ_msg']);
		}
		?>
		
		<?php if(isset($_SESSION['edit_succ_msg'])) { ?>
			<div class="alert alert-success">                
			<b><?php echo $_SESSION['edit_succ_msg'];?></b>
			</div> 
		<?php
		unset($_SESSION['edit_succ_msg']);
		}
		?>
		
		<?php if(isset($_SESSION['del_succ_msg'])) { ?>
			<div class="alert alert-success">                
			<b><?php echo $_SESSION['del_succ_msg'];?></b>
			</div> 
		<?php
		unset($_SESSION['del_succ_msg']);
		}
		?>
		
		<?php if(isset($_SESSION['change_succ_msg'])) { ?>
			<div class="alert alert-success">                
			<b><?php echo $_SESSION['change_succ_msg'];?></b>
			</div> 
		<?php
		unset($_SESSION['change_succ_msg']);
		}
		?>
		<div class="row-fluid">
			<div class="span12">
			    <form action="" method="get">
				<div class="head clearfix">
					<div class="isw-grid"></div>
					<h1>Search Orders</h1>                               
				</div>
				<div class="row-form clearfix">
					<div class="span2">Start Date</div>
					<div class="span3"><input type="text" name="start_date" id="datepicker" value="<?php echo $_REQUEST['start_date'];?>" style="width:100px;" /></div>                            
					<div class="span2">End Date</div>
					<div class="span3"><input type="text" name="end_date" id="datepicker2" value="<?php echo $_REQUEST['end_date'];?>" style="width:100px;" /></div>   
					<div class="span2"><button class="btn btn-inverse" type="submit" name="search">Search</button>&nbsp;&nbsp;<button class="btn btn-inverse" type="button" name="reset" onclick="window.location.href='order_list.php'">Reset</button></div>                            
				</div>
				<div>&nbsp;</div>
				</form>                    
				<div class="head clearfix">
					<div class="isw-grid"></div>
					<h1>Orders List</h1>                               
				</div>
				<div class="block-fluid table-sorting clearfix">
					<?php if(isset($_REQUEST['search'])) { ?>
				    <div>&nbsp;</div>
					<form action="export.php" method="get">
					<input type="hidden" name="st_date" id="st_date" value="<?php echo $_REQUEST['start_date'];?>" />
					<input type="hidden" name="en_date" id="en_date" value="<?php echo $_REQUEST['end_date'];?>" />
					<div style="text-align:right; margin-right:10px;"><button class="btn btn-inverse" type="submit" name="export">Export</button></div>
					</form>
					<?php } ?>
					<table cellpadding="0" cellspacing="0" width="100%" class="table" id="tSortable">
						<thead>
							<tr>
								<th width="10%">Serial No.</th>
								<th width="22%">Customer Name</th>
								<th width="25%">Order ID & Order Date</th>
								<th width="13%">Delivery Status</th>
								<th width="30%">Action</th>
							</tr>
						</thead>
						<tbody>
						<?php
						$sr_no = 1;
						if(isset($_REQUEST['search']))
						{
							if($_REQUEST['start_date']!="" && $_REQUEST['end_date']!="")
							{
								$start_date_export = explode("/",$_REQUEST['start_date']);
								$start_date = $start_date_export[2]."-".$start_date_export[0]."-".$start_date_export[1];
								
								$end_date_export = explode("/",$_REQUEST['end_date']);
								$end_date = $end_date_export[2]."-".$end_date_export[0]."-".$end_date_export[1];
								
								$sql_record = "SELECT * FROM `og_orders` WHERE (`is_cancel` = 'No' OR `is_cancel` = 'Pending') AND `transaction_completed` = 'Yes' AND `post_date` BETWEEN '".$start_date."' and '".$end_date."' ORDER BY `order_id` DESC";
							}
							if($_REQUEST['start_date']!="" && $_REQUEST['end_date']=="")
							{
								$start_date_export = explode("/",$_REQUEST['start_date']);
								$start_date = $start_date_export[2]."-".$start_date_export[0]."-".$start_date_export[1];
								
								$sql_record = "SELECT * FROM `og_orders` WHERE (`is_cancel` = 'No' OR `is_cancel` = 'Pending') AND `transaction_completed` = 'Yes' AND `post_date` BETWEEN '".$start_date."' and '".date('Y-m-d')."' ORDER BY `order_id` DESC";
							}
							if($_REQUEST['start_date']=="" && $_REQUEST['end_date']!="")
							{
								$end_date_export = explode("/",$_REQUEST['end_date']);
								$end_date = $end_date_export[2]."-".$end_date_export[0]."-".$end_date_export[1];
								
								$sql_record = "SELECT * FROM `og_orders` WHERE (`is_cancel` = 'No' OR `is_cancel` = 'Pending') AND `transaction_completed` = 'Yes' AND `post_date` BETWEEN '2019-12-31' and '".$end_date."' ORDER BY `order_id` DESC";
							}
							if($_REQUEST['start_date']=="" && $_REQUEST['end_date']=="")
							{
								$sql_record = "SELECT * FROM `og_orders` WHERE (`is_cancel` = 'No' OR `is_cancel` = 'Pending') AND `transaction_completed` = 'Yes' ORDER BY `order_id` DESC";
							}							
						}
						else
						{
							$sql_record = "SELECT * FROM `og_orders` WHERE (`is_cancel` = 'No' OR `is_cancel` = 'Pending') AND `transaction_completed` = 'Yes' ORDER BY `order_id` DESC";
						}
						$exe_record = mysql_query($sql_record) or die();
						$num_record = mysql_num_rows($exe_record);
						if($num_record>0)
						{
							while($fetch_record = mysql_fetch_array($exe_record))
							{
								$orderid = stripslashes($fetch_record['orderid']);
								$name = stripslashes($fetch_record['fname'])." ".stripslashes($fetch_record['lname']);
								$phone = stripslashes($fetch_record['phone']);
								$grand_total = stripslashes($fetch_record['grand_total']);
								$post_date = date('F d, Y h:i A',strtotime($fetch_record['post_date']));
								$pickup_date = date('d-m-Y',strtotime($fetch_record['pickup_date']));
								$pickup_time = $fetch_record['pickup_time'];
								$delivery_status = $fetch_record['delivery_status'];
							?>
							<tr>
								<td><?php echo $sr_no;?></td>
								<td><?php echo $name;?><br /><strong>Phone No : </strong><?php echo $phone;?><br /><strong>Total Cost : </strong>Rs. <?php echo $grand_total;?></td>
								<td><b>Order ID :</b> <?php echo $orderid;?><br><b>Order Date :</b> <?php echo $post_date;?><?php if($fetch_record['is_cancel'] == 'Pending') { ?><br><button class="btn btn-inverse" type="button" name="cancel" onclick="window.location.href='cancel_request.php?order_id=<?php echo $fetch_record['orderid']?>'">Request For Cancel Order</button><?php } ?><br><b>Delivery Date :</b> <?php echo $pickup_date;?><br><b>Delivery Time :</b> <?php echo $pickup_time;?></td>
								<td><?php if($delivery_status == 'Delivered') { ?><a href="#" style="color:#009900;">Delivered</a><?php } else { ?><a href="order_list.php?unique_id=<?php echo $fetch_record['unique_id']?>&order_id=<?php echo $fetch_record['orderid']?>&user_id=<?php echo $fetch_record['user_id']?>&action=active" title="Click to active" onclick="return confirm('Are you sure you want to change delivery status?');" style="color:#FF0000;">Pending</a><?php } ?></td>
								<td><button class="btn" type="button" name="back" onclick="window.location.href='order_details.php?unique_id=<?php echo $fetch_record['unique_id']?>'">View Details</button>&nbsp;&nbsp;<button class="btn" type="button" name="back" onclick="window.location.href='suggestion.php?order_id=<?php echo $fetch_record['orderid']?>'">View Review</button>&nbsp;&nbsp;<a href="order_list.php?unique_id=<?php echo $fetch_record['unique_id']?>&action=delete" title="Delete" onclick="return confirm('Are you sure you want to delete this record?');" style="float:left; display:block; margin:0 5px 0 0;"><ul class="the-icons clearfix"><i class="isb-delete"></i></ul></a></td>
							</tr>
							<?php
							$sr_no++;
							}
						}
						else
						{
						?>
						<tr>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
						</tr>
						<tr><td colspan="5" align="center"><font color="#FF0000">No record found</font></td></tr>
						<?php
						}
						?>
						</tbody>
					</table>
				</div>
			</div>                                
		</div>
	</div>
</div>

<?php require_once("footer.php"); ?>