<?php 
require_once("header.php");
require_once("session_check.php");

//CODE FOR CHANGE STATUS TO INACTIVE
if(isset($_GET['action']) && $_GET['action'] == "inactive")
{
	$sql_update = "UPDATE `og_zipcode` SET `zipcode_status` = 'Inactive' WHERE `zipcode_id` = '".$_GET['zipcode_id']."'";
	$exe_update = mysql_query($sql_update) or die(mysql_error());
	
	$_SESSION['change_succ_msg'] = 'Zipcode de-activated successfully.';
	header("location: zip_list.php");
	exit;
}

//CODE FOR CHANGE STATUS TO ACTIVE
if(isset($_GET['action']) && $_GET['action'] == "active")
{
	$sql_update = "UPDATE `og_zipcode` SET `zipcode_status` = 'Active' WHERE `zipcode_id` = '".$_GET['zipcode_id']."'";
	$exe_update = mysql_query($sql_update) or die(mysql_error());
	
	$_SESSION['change_succ_msg'] = 'Zipcode activated successfully.';
	header("location: zip_list.php");
	exit;
}

//CODE FOR DELETE ZIPCODE
if(isset($_GET['action']) && $_GET['action'] == "delete")
{
	mysql_query("DELETE FROM `og_zipcode` WHERE `zipcode_id` = '".$_GET['zipcode_id']."'") or die(mysql_error());
	
	$_SESSION['del_succ_msg'] = 'Zipcode deleted successfully.';
	header("location: zip_list.php");
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
					<h1>Zipcode List</h1>                               
				</div>
				<div class="block-fluid table-sorting clearfix">
					<table cellpadding="0" cellspacing="0" width="100%" class="table" id="tSortable">
						<thead>
							<tr>
								<th width="10%">Serial No.</th>
								<th width="40%">Zipcode</th>
								<th width="10%">Status</th>
								<th width="20%">Action</th>
								<th width="20%">&nbsp;</th>                                    
							</tr>
						</thead>
						<tbody>
						<?php
						$zip_counter = 1;
						$sql_record = "SELECT * FROM `og_zipcode` ORDER BY `zipcode_id` DESC";
						$exe_record = mysql_query($sql_record) or die();
						$num_record = mysql_num_rows($exe_record);
						if($num_record>0)
						{
							while($fetch_record = mysql_fetch_array($exe_record))
							{
								$available_zipcode = stripslashes($fetch_record['available_zipcode']);
								$zipcode_status = $fetch_record['zipcode_status'];
							?>
							<tr>
								<td><?php echo $zip_counter;?></td>
								<td><?php echo $available_zipcode;?></td>
								<td><?php if($zipcode_status == 'Active') { ?><a href="zip_list.php?zipcode_id=<?php echo $fetch_record['zipcode_id']?>&action=inactive" title="Click to inactive" onclick="return confirm('Are you sure you want to inactive this zipcode?');"><ul class="the-icons clearfix"><li><i class="isb-unlock"></i></li></ul></a><?php } else { ?><a href="zip_list.php?zipcode_id=<?php echo $fetch_record['zipcode_id']?>&action=active" title="Click to active" onclick="return confirm('Are you sure you want to active this zipcode?');"><ul class="the-icons clearfix"><li><i class="isb-lock"></i></li></ul></a><?php } ?></td>
								<td><a href="add_edit_zip.php?zipcode_id=<?php echo $fetch_record['zipcode_id']?>&action=edit" title="Edit" style="float:left; display:block; margin:0 5px 0 0;"><ul class="the-icons clearfix"><i class="isb-edit"></i></ul></a><a href="zip_list.php?zipcode_id=<?php echo $fetch_record['zipcode_id']?>&action=delete" title="Delete" onclick="return confirm('Are you sure you want to delete this zipcode?');" style="float:left; display:block; margin:0 5px 0 0;"><ul class="the-icons clearfix"><i class="isb-delete"></i></ul></a></td>
								<td>&nbsp;</td>
							</tr>
							<?php
							$zip_counter++;
							}
						}
						else
						{
						?>
						<tr><td colspan="5" align="center"><font color="#FF0000">No zipcode found</font></td></tr>
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