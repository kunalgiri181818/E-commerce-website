<?php 
require_once("header.php");
require_once("session_check.php");

//CODE FOR CHANGE STATUS TO INACTIVE
if(isset($_GET['action']) && $_GET['action'] == "inactive")
{
	$sql_update = "UPDATE `og_brands` SET `brand_status` = 'Inactive' WHERE `brand_id` = '".$_GET['brand_id']."'";
	$exe_update = mysql_query($sql_update) or die(mysql_error());
	
	$_SESSION['change_succ_msg'] = 'Brand de-activated successfully.';
	header("location: brand_list.php");
	exit;
}

//CODE FOR CHANGE STATUS TO ACTIVE
if(isset($_GET['action']) && $_GET['action'] == "active")
{
	$sql_update = "UPDATE `og_brands` SET `brand_status` = 'Active' WHERE `brand_id` = '".$_GET['brand_id']."'";
	$exe_update = mysql_query($sql_update) or die(mysql_error());
	
	$_SESSION['change_succ_msg'] = 'Brand activated successfully.';
	header("location: brand_list.php");
	exit;
}

//CODE FOR DELETE BRAND
if(isset($_GET['action']) && $_GET['action'] == "delete")
{
	$sql_brand_image = "SELECT * FROM `og_brands` WHERE `brand_id` = '".$_GET['brand_id']."'";
	$exe_brand_image = mysql_query($sql_brand_image) or die(mysql_error());
	while($arr_brand_image = mysql_fetch_array($exe_brand_image))
	{
		if($arr_brand_image['brand_image']!="")
		{
			unlink("../uploads/brand/".$arr_brand_image['brand_image']);
		}
	}
	mysql_query("DELETE FROM `og_brands` WHERE `brand_id` = '".$_GET['brand_id']."'") or die(mysql_error());
	
	$_SESSION['del_succ_msg'] = 'Brand deleted successfully.';
	header("location: brand_list.php");
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
					<h1>Brands List</h1>                               
				</div>
				<div class="block-fluid table-sorting clearfix">
					<table cellpadding="0" cellspacing="0" width="100%" class="table" id="tSortable">
						<thead>
							<tr>
								<th width="10%">Serial No.</th>
								<th width="50%">Brand</th>
								<th width="15%">Status</th>
								<th width="15%">Action</th>
								<th width="10%">&nbsp;</th>
							</tr>
						</thead>
						<tbody>
						<?php
						$brand_counter = 1;
						$sql_record = "SELECT * FROM `og_brands` ORDER BY `brand_id` DESC";
						$exe_record = mysql_query($sql_record) or die();
						$num_record = mysql_num_rows($exe_record);
						if($num_record>0)
						{
							while($fetch_record = mysql_fetch_array($exe_record))
							{
								$brand_image = $fetch_record['brand_image'];
								$brand_name = $fetch_record['brand_name'];
								$brand_status = $fetch_record['brand_status'];
								?>
								<tr>
									<td><?php echo $brand_counter;?></td>
									<td><img src="../uploads/brand/<?php echo $brand_image;?>" width="100" height="100" border="0" alt="" /><br><?php echo $brand_name;?></td>
									<td><?php if($brand_status == 'Active') { ?><a href="brand_list.php?brand_id=<?php echo $fetch_record['brand_id']?>&action=inactive" title="Click to inactive" onclick="return confirm('Are you sure you want to inactive this brand?');"><ul class="the-icons clearfix"><li><i class="isb-unlock"></i></li></ul></a><?php } else { ?><a href="brand_list.php?brand_id=<?php echo $fetch_record['brand_id']?>&action=active" title="Click to active" onclick="return confirm('Are you sure you want to active this brand?');"><ul class="the-icons clearfix"><li><i class="isb-lock"></i></li></ul></a><?php } ?></td>
									<td><a href="add_edit_brand.php?brand_id=<?php echo $fetch_record['brand_id']?>&action=edit" title="Edit" style="float:left; display:block; margin:0 5px 0 0;"><ul class="the-icons clearfix"><i class="isb-edit"></i></ul></a><a href="brand_list.php?brand_id=<?php echo $fetch_record['brand_id']?>&action=delete" title="Delete" onclick="return confirm('Are you sure you want to delete this brand?');" style="float:left; display:block; margin:0 5px 0 0;"><ul class="the-icons clearfix"><i class="isb-delete"></i></ul></a></td>
									<td>&nbsp;</td>
								</tr>
							<?php
							$brand_counter++;
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
						<tr><td colspan="5" align="center"><font color="#FF0000">No braand found</font></td></tr>
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