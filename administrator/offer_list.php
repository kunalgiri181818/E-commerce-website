<?php 
require_once("header.php");
require_once("session_check.php");

//CODE FOR CHANGE STATUS TO INACTIVE
if(isset($_GET['action']) && $_GET['action'] == "inactive")
{
	$sql_update = "UPDATE `og_offers` SET `offer_status` = 'Inactive' WHERE `offer_id` = '".$_GET['offer_id']."'";
	$exe_update = mysql_query($sql_update) or die(mysql_error());
	
	$_SESSION['change_succ_msg'] = 'Offer de-activated successfully.';
	header("location: offer_list.php");
	exit;
}

//CODE FOR CHANGE STATUS TO ACTIVE
if(isset($_GET['action']) && $_GET['action'] == "active")
{
	$sql_update = "UPDATE `og_offers` SET `offer_status` = 'Active' WHERE `offer_id` = '".$_GET['offer_id']."'";
	$exe_update = mysql_query($sql_update) or die(mysql_error());
	
	$_SESSION['change_succ_msg'] = 'Offer activated successfully.';
	header("location: offer_list.php");
	exit;
}

//CODE FOR DELETE OFFER
if(isset($_GET['action']) && $_GET['action'] == "delete")
{
	$sql_offer_image = "SELECT * FROM `og_offers` WHERE `offer_id` = '".$_GET['offer_id']."'";
	$exe_offer_image = mysql_query($sql_offer_image) or die(mysql_error());
	while($arr_offer_image = mysql_fetch_array($exe_offer_image))
	{
		if($arr_offer_image['offer_image']!="")
		{
			unlink("../uploads/offer/".$arr_offer_image['offer_image']);
		}
	}
	mysql_query("DELETE FROM `og_offers` WHERE `offer_id` = '".$_GET['offer_id']."'") or die(mysql_error());
	
	$_SESSION['del_succ_msg'] = 'Offer deleted successfully.';
	header("location: offer_list.php");
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
		
		<?php if(isset($_SESSION['change_succ_msg'])) { ?>
			<div class="alert alert-success">                
			<b><?php echo $_SESSION['change_succ_msg'];?></b>
			</div> 
		<?php
		unset($_SESSION['change_succ_msg']);
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
		<div class="row-fluid">
			<div class="span12">                    
				<div class="head clearfix">
					<div class="isw-picture"></div>
					<h1>Offers List</h1>                               
				</div>
				<div class="block-fluid table-sorting clearfix">
					<table cellpadding="0" cellspacing="0" width="100%" class="table" id="tSortable">
						<thead>
							<tr>
								<th width="10%">Serial No.</th>
								<th width="50%">Offer</th>
								<th width="15%">Status</th>
								<th width="15%">Action</th>
								<th width="10%">&nbsp;</th>
							</tr>
						</thead>
						<tbody>
						<?php
						$offer_counter = 1;
						$sql_record = "SELECT * FROM `og_offers` ORDER BY `offer_id` DESC";
						$exe_record = mysql_query($sql_record) or die();
						$num_record = mysql_num_rows($exe_record);
						if($num_record>0)
						{
							while($fetch_record = mysql_fetch_array($exe_record))
							{
								$offer_image = $fetch_record['offer_image'];
								$offer_status = $fetch_record['offer_status'];
								?>
								<tr>
									<td><?php echo $offer_counter;?></td>
									<td><img src="../uploads/offer/<?php echo $offer_image;?>" width="200" height="200" border="0" alt="" /></td>
									<td><?php if($offer_status == 'Active') { ?><a href="offer_list.php?offer_id=<?php echo $fetch_record['offer_id']?>&action=inactive" title="Click to inactive" onclick="return confirm('Are you sure you want to inactive this offer?');"><ul class="the-icons clearfix"><li><i class="isb-unlock"></i></li></ul></a><?php } else { ?><a href="offer_list.php?offer_id=<?php echo $fetch_record['offer_id']?>&action=active" title="Click to active" onclick="return confirm('Are you sure you want to active this offer?');"><ul class="the-icons clearfix"><li><i class="isb-lock"></i></li></ul></a><?php } ?></td>
									<td><a href="add_edit_offer.php?offer_id=<?php echo $fetch_record['offer_id']?>&action=edit" title="Edit" style="float:left; display:block; margin:0 5px 0 0;"><ul class="the-icons clearfix"><i class="isb-edit"></i></ul></a><a href="offer_list.php?offer_id=<?php echo $fetch_record['offer_id']?>&action=delete" title="Delete" onclick="return confirm('Are you sure you want to delete this offer?');" style="float:left; display:block; margin:0 5px 0 0;"><ul class="the-icons clearfix"><i class="isb-delete"></i></ul></a></td>
									<td>&nbsp;</td>
								</tr>
							<?php
							$offer_counter++;
							}
						}
						else
						{
						?>
						<tr><td colspan="5" align="center"><font color="#FF0000">No offer found</font></td></tr>
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