<?php 
require_once("header.php");
require_once("session_check.php");

//CODE FOR CHANGE STATUS TO INACTIVE
if(isset($_GET['action']) && $_GET['action'] == "inactive")
{
	$sql_update = "UPDATE `og_subcategory` SET `subcategory_status` = 'Inactive' WHERE `subcategory_id` = '".$_GET['subcategory_id']."'";
	$exe_update = mysql_query($sql_update) or die(mysql_error());
	
	$_SESSION['change_succ_msg'] = 'Subcategory de-activated successfully.';
	header("location: subcategory_list.php?category_id=".$_GET['category_id']);
	exit;
}

//CODE FOR CHANGE STATUS TO ACTIVE
if(isset($_GET['action']) && $_GET['action'] == "active")
{
	$sql_update = "UPDATE `og_subcategory` SET `subcategory_status` = 'Active' WHERE `subcategory_id` = '".$_GET['subcategory_id']."'";
	$exe_update = mysql_query($sql_update) or die(mysql_error());
	
	$_SESSION['change_succ_msg'] = 'Subcategory activated successfully.';
	header("location: subcategory_list.php?category_id=".$_GET['category_id']);
	exit;
}

//CODE FOR DELETE SUBCATEGORY
if(isset($_GET['action']) && $_GET['action'] == "delete")
{
	mysql_query("DELETE FROM `og_subcategory` WHERE `subcategory_id` = '".$_GET['subcategory_id']."'") or die(mysql_error());
	
	$_SESSION['del_succ_msg'] = 'Subcategory deleted successfully.';
	header("location: subcategory_list.php?category_id=".$_GET['category_id']);
	exit;
}
?>

<?php
$getCategory = mysql_fetch_array(mysql_query("SELECT * FROM `og_category` WHERE `category_id` = '".$_GET['category_id']."'"));
$category_name = stripslashes($getCategory['category_name']);
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
				<div style="text-align:right;"><button class="btn" type="button" name="back" onclick="window.location.href='add_edit_subcategory.php?category_id=<?php echo $_GET['category_id']?>'">Add Subcategory</button></div>                    
				<div class="head clearfix">
					<div class="isw-grid"></div>
					<h1>Subcategory List For <?php echo $category_name;?></h1>                               
				</div>
				<div class="block-fluid table-sorting clearfix">
					<table cellpadding="0" cellspacing="0" width="100%" class="table" id="tSortable">
						<thead>
							<tr>
								<th width="10%">Serial No.</th>
								<th width="30%">Subcategory</th>
								<th width="20%">Icon</th>                                    
								<th width="10%">Status</th>
								<th width="30%">Action</th>
							</tr>
						</thead>
						<tbody>
						<?php
						$subcategory_counter = 1;
						$sql_record = "SELECT * FROM `og_subcategory` WHERE `category_id` = '".$_GET['category_id']."' ORDER BY `subcategory_id` DESC";
						$exe_record = mysql_query($sql_record) or die();
						$num_record = mysql_num_rows($exe_record);
						if($num_record>0)
						{
							while($fetch_record = mysql_fetch_array($exe_record))
							{
								$subcategory_name = stripslashes($fetch_record['subcategory_name']);
								$subcategory_photo = stripslashes($fetch_record['subcategory_photo']);
								$subcategory_status = $fetch_record['subcategory_status'];
							?>
							<tr>
								<td><?php echo $subcategory_counter;?></td>
								<td><?php echo $subcategory_name;?></td>
								<td><img src="../uploads/subcategory/<?php echo $subcategory_photo;?>" border="0" alt="" width="100" heightt="100" /></td>
								<td><?php if($subcategory_status == 'Active') { ?><a href="subcategory_list.php?subcategory_id=<?php echo $fetch_record['subcategory_id']?>&category_id=<?php echo $_GET['category_id']?>&action=inactive" title="Click to inactive" onclick="return confirm('Are you sure you want to inactive this subcategory?');"><ul class="the-icons clearfix"><li><i class="isb-unlock"></i></li></ul></a><?php } else { ?><a href="subcategory_list.php?subcategory_id=<?php echo $fetch_record['subcategory_id']?>&category_id=<?php echo $_GET['category_id']?>&action=active" title="Click to active" onclick="return confirm('Are you sure you want to active this subcategory?');"><ul class="the-icons clearfix"><li><i class="isb-lock"></i></li></ul></a><?php } ?></td>
								<td><a href="add_edit_subcategory.php?subcategory_id=<?php echo $fetch_record['subcategory_id']?>&category_id=<?php echo $_GET['category_id']?>&action=edit" title="Edit" style="float:left; display:block; margin:0 5px 0 0;"><ul class="the-icons clearfix"><i class="isb-edit"></i></ul></a><a href="subcategory_list.php?subcategory_id=<?php echo $fetch_record['subcategory_id']?>&category_id=<?php echo $_GET['category_id']?>&action=delete" title="Delete" onclick="return confirm('Are you sure you want to delete this subcategory?');" style="float:left; display:block; margin:0 5px 0 0;"><ul class="the-icons clearfix"><i class="isb-delete"></i></ul></a></td>
							</tr>
							<?php
							$subcategory_counter++;
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
						<tr><td colspan="5" align="center"><font color="#FF0000">No subcategory found</font></td></tr>
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