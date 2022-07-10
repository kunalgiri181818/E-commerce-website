<?php 
require_once("header.php");
require_once("session_check.php");

//CODE FOR CHANGE STATUS TO INACTIVE
if(isset($_GET['action']) && $_GET['action'] == "inactive")
{
	$sql_update = "UPDATE `og_category` SET `category_status` = 'Inactive' WHERE `category_id` = '".$_GET['category_id']."'";
	$exe_update = mysql_query($sql_update) or die(mysql_error());
	
	$_SESSION['change_succ_msg'] = 'Category de-activated successfully.';
	header("location: category_list.php");
	exit;
}

//CODE FOR CHANGE STATUS TO ACTIVE
if(isset($_GET['action']) && $_GET['action'] == "active")
{
	$sql_update = "UPDATE `og_category` SET `category_status` = 'Active' WHERE `category_id` = '".$_GET['category_id']."'";
	$exe_update = mysql_query($sql_update) or die(mysql_error());
	
	$_SESSION['change_succ_msg'] = 'Category activated successfully.';
	header("location: category_list.php");
	exit;
}

//CODE FOR DELETE CATEGORY
if(isset($_GET['action']) && $_GET['action'] == "delete")
{
	mysql_query("DELETE FROM `og_category` WHERE `category_id` = '".$_GET['category_id']."'") or die(mysql_error());
	
	$_SESSION['del_succ_msg'] = 'Category deleted successfully.';
	header("location: category_list.php");
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
					<h1>Category List</h1>                               
				</div>
				<div class="block-fluid table-sorting clearfix">
					<table cellpadding="0" cellspacing="0" width="100%" class="table" id="tSortable">
						<thead>
							<tr>
								<th width="10%">Serial No.</th>
								<th width="30%">Category</th>
								<th width="20%">Icon</th>                                    
								<th width="10%">Status</th>
								<th width="30%">Action</th>
							</tr>
						</thead>
						<tbody>
						<?php
						$category_counter = 1;
						$sql_record = "SELECT * FROM `og_category` ORDER BY `category_id` DESC";
						$exe_record = mysql_query($sql_record) or die();
						$num_record = mysql_num_rows($exe_record);
						if($num_record>0)
						{
							while($fetch_record = mysql_fetch_array($exe_record))
							{
								$category_name = stripslashes($fetch_record['category_name']);
								$category_photo = stripslashes($fetch_record['category_photo']);
								$category_status = $fetch_record['category_status'];
							?>
							<tr>
								<td><?php echo $category_counter;?></td>
								<td><?php echo $category_name;?></td>
								<td><img src="../uploads/category/<?php echo $category_photo;?>" border="0" alt="" width="100" heightt="100" /></td>
								<td><?php if($category_status == 'Active') { ?><a href="category_list.php?category_id=<?php echo $fetch_record['category_id']?>&action=inactive" title="Click to inactive" onclick="return confirm('Are you sure you want to inactive this category?');"><ul class="the-icons clearfix"><li><i class="isb-unlock"></i></li></ul></a><?php } else { ?><a href="category_list.php?category_id=<?php echo $fetch_record['category_id']?>&action=active" title="Click to active" onclick="return confirm('Are you sure you want to active this category?');"><ul class="the-icons clearfix"><li><i class="isb-lock"></i></li></ul></a><?php } ?></td>
								<td><a href="add_edit_category.php?category_id=<?php echo $fetch_record['category_id']?>&action=edit" title="Edit" style="float:left; display:block; margin:0 5px 0 0;"><ul class="the-icons clearfix"><i class="isb-edit"></i></ul></a><a href="category_list.php?category_id=<?php echo $fetch_record['category_id']?>&action=delete" title="Delete" onclick="return confirm('Are you sure you want to delete this category?');" style="float:left; display:block; margin:0 5px 0 0;"><ul class="the-icons clearfix"><i class="isb-delete"></i></ul></a>&nbsp;&nbsp;<button class="btn" type="button" name="back" onclick="window.location.href='subcategory_list.php?category_id=<?php echo $fetch_record['category_id']?>'">Subcategory List</button></td>
							</tr>
							<?php
							$category_counter++;
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
						<tr><td colspan="5" align="center"><font color="#FF0000">No category found</font></td></tr>
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