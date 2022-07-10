<?php 
require_once("header.php");
require_once("session_check.php");

//CODE FOR CHANGE STATUS TO INACTIVE
if(isset($_GET['action']) && $_GET['action'] == "inactive")
{
	$sql_update = "UPDATE `og_delivery_slot` SET `slot_status` = 'Inactive' WHERE `slot_id` = '".$_GET['slot_id']."'";
	$exe_update = mysql_query($sql_update) or die(mysql_error());
	
	$_SESSION['change_succ_msg'] = 'Delivery schedule de-activated successfully.';
	header("location: schedule_list.php");
	exit;
}

//CODE FOR CHANGE STATUS TO ACTIVE
if(isset($_GET['action']) && $_GET['action'] == "active")
{
	$sql_update = "UPDATE `og_delivery_slot` SET `slot_status` = 'Active' WHERE `slot_id` = '".$_GET['slot_id']."'";
	$exe_update = mysql_query($sql_update) or die(mysql_error());
	
	$_SESSION['change_succ_msg'] = 'Delivery schedule activated successfully.';
	header("location: schedule_list.php");
	exit;
}

//CODE FOR DELETE DELIVERY SCHEDULE
if(isset($_GET['action']) && $_GET['action'] == "delete")
{
	mysql_query("DELETE FROM `og_delivery_slot` WHERE `slot_id` = '".$_GET['slot_id']."'") or die(mysql_error());
	
	$_SESSION['del_succ_msg'] = 'Delivery schedule deleted successfully.';
	header("location: schedule_list.php");
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
				<div class="head clearfix">
					<div class="isw-grid"></div>
					<h1>Delivery Schedule List</h1>                               
				</div>
				<div class="block-fluid table-sorting clearfix">
					<table cellpadding="0" cellspacing="0" width="100%" class="table" id="tSortable">
						<thead>
							<tr>
								<th width="10%">Serial No.</th>
								<th width="25%">Slot Name</th>
								<th width="25%">Slot Time</th>                                    
								<th width="10%">Status</th>
								<th width="30%">Action</th>
							</tr>
						</thead>
						<tbody>
						<?php
						$slot_counter = 1;
						$sql_record = "SELECT * FROM `og_delivery_slot` ORDER BY `slot_id` DESC";
						$exe_record = mysql_query($sql_record) or die();
						$num_record = mysql_num_rows($exe_record);
						if($num_record>0)
						{
							while($fetch_record = mysql_fetch_array($exe_record))
							{
								$slot_name = stripslashes($fetch_record['slot_name']);
								$slot_time = stripslashes($fetch_record['slot_time']);
								$slot_status = $fetch_record['slot_status'];
							?>
							<tr>
								<td><?php echo $slot_counter;?></td>
								<td><?php echo $slot_name;?></td>
								<td><?php echo $slot_time;?></td>
								<td><?php if($slot_status == 'Active') { ?><a href="schedule_list.php?slot_id=<?php echo $fetch_record['slot_id']?>&action=inactive" title="Click to inactive" onclick="return confirm('Are you sure you want to inactive this schedule?');"><ul class="the-icons clearfix"><li><i class="isb-unlock"></i></li></ul></a><?php } else { ?><a href="schedule_list.php?slot_id=<?php echo $fetch_record['slot_id']?>&action=active" title="Click to active" onclick="return confirm('Are you sure you want to inactive this schedule?');"><ul class="the-icons clearfix"><li><i class="isb-lock"></i></li></ul></a><?php } ?></td>
								<td><a href="add_edit_schedule.php?slot_id=<?php echo $fetch_record['slot_id']?>&action=edit" title="Edit" style="float:left; display:block; margin:0 5px 0 0;"><ul class="the-icons clearfix"><i class="isb-edit"></i></ul></a><a href="schedule_list.php?slot_id=<?php echo $fetch_record['slot_id']?>&action=delete" title="Delete" onclick="return confirm('Are you sure you want to delete this schedule?');" style="float:left; display:block; margin:0 5px 0 0;"><ul class="the-icons clearfix"><i class="isb-delete"></i></ul></a></td>
							</tr>
							<?php
							$slot_counter++;
							}
						}
						else
						{
						?>
						<tr><td colspan="5" align="center"><font color="#FF0000">No delivery schedule found</font></td></tr>
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