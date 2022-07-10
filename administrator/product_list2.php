<?php 
require_once("header.php");
require_once("session_check.php");

//CODE FOR CHANGE STATUS TO INACTIVE
if(isset($_GET['action']) && $_GET['action'] == "inactive")
{
	$sql_update = "UPDATE `og_products` SET `product_status` = 'Inactive' WHERE `product_id` = '".$_GET['product_id']."'";
	$exe_update = mysql_query($sql_update) or die(mysql_error());
	
	$_SESSION['change_succ_msg'] = 'Product de-activated successfully.';
	header("location: product_list.php");
	exit;
}

//CODE FOR CHANGE STATUS TO ACTIVE
if(isset($_GET['action']) && $_GET['action'] == "active")
{
	$sql_update = "UPDATE `og_products` SET `product_status` = 'Active' WHERE `product_id` = '".$_GET['product_id']."'";
	$exe_update = mysql_query($sql_update) or die(mysql_error());
	
	$_SESSION['change_succ_msg'] = 'Product activated successfully.';
	header("location: product_list.php");
	exit;
}

//CODE FOR DELETE PRODUCT
if(isset($_GET['action']) && $_GET['action'] == "delete")
{
	$sql_blog_image = "SELECT * FROM `og_products` WHERE `product_id` = '".$_GET['product_id']."'";
	$exe_blog_image = mysql_query($sql_blog_image) or die(mysql_error());
	while($arr_blog_image = mysql_fetch_array($exe_blog_image))
	{
		if($arr_blog_image['product_photo']!="")
		{
			unlink("../uploads/product/".$arr_blog_image['product_photo']);
		}
	}

	mysql_query("DELETE FROM `og_product_packets` WHERE `product_id` = '".$_GET['product_id']."'") or die(mysql_error());
	mysql_query("DELETE FROM `og_temp_cart` WHERE `product_id` = '".$_GET['product_id']."'") or die(mysql_error());
	mysql_query("DELETE FROM `og_final_cart` WHERE `product_id` = '".$_GET['product_id']."'") or die(mysql_error());
	mysql_query("DELETE FROM `og_products` WHERE `product_id` = '".$_GET['product_id']."'") or die(mysql_error());
	
	$_SESSION['del_succ_msg'] = 'Product deleted successfully.';
	header("location: product_list.php");
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
					<h1>Products List</h1>                               
				</div>
				<div class="block-fluid table-sorting clearfix">
					<table cellpadding="0" cellspacing="0" width="100%" class="table" id="tSortable">
						<thead>
							<tr>
								<th width="10%">Serial No.</th>
								<th width="30%">Product Name</th>
								<th width="30%">Category</th>
								<th width="10%">Status</th>
								<th width="20%">Action</th>
							</tr>
						</thead>
						<tbody>
						<?php
						$product_counter = 1;
						$sql_record = "SELECT * FROM `og_products` WHERE `offer`!='Yes' ORDER BY `product_id` DESC";
						$exe_record = mysql_query($sql_record) or die();
						$num_record = mysql_num_rows($exe_record);
						if($num_record>0)
						{
							while($fetch_record = mysql_fetch_array($exe_record))
							{
								$product_name_english = stripslashes($fetch_record['product_name_english']);
								$product_status = $fetch_record['product_status'];
								
								$fetch_category = mysql_fetch_array(mysql_query("SELECT * FROM `og_category` WHERE `category_id` = '".$fetch_record['category_id']."'"));
								$fetch_subcategory = mysql_fetch_array(mysql_query("SELECT * FROM `og_subcategory` WHERE `subcategory_id` = '".$fetch_record['subcategory_id']."'"));
							?>
							<tr>
								<td><?php echo $product_counter;?></td>
								<td><?php echo $product_name_english;?><br /><img src="../uploads/product/<?php echo $fetch_record['product_photo'];?>" alt="" height="100" width="100" /></td>
								<td><?php echo stripslashes($fetch_category['category_name']);?> >> <?php echo stripslashes($fetch_subcategory['subcategory_name']);?></td>
								<td><?php if($product_status == 'Active') { ?><a href="product_list.php?product_id=<?php echo $fetch_record['product_id']?>&action=inactive" title="Click to inactive" onclick="return confirm('Are you sure you want to inactive this record?');"><ul class="the-icons clearfix"><li><i class="isb-unlock"></i></li></ul></a><?php } else { ?><a href="product_list.php?product_id=<?php echo $fetch_record['product_id']?>&action=active" title="Click to active" onclick="return confirm('Are you sure you want to active this record?');"><ul class="the-icons clearfix"><li><i class="isb-lock"></i></li></ul></a><?php } ?></td>
								<td><a href="add_edit_product.php?product_id=<?php echo $fetch_record['product_id']?>&action=edit" title="Edit" style="float:left; display:block; margin:0 5px 0 0;"><ul class="the-icons clearfix"><i class="isb-edit"></i></ul></a><a href="product_list.php?product_id=<?php echo $fetch_record['product_id']?>&action=delete" title="Delete" onclick="return confirm('Are you sure you want to delete this record?');" style="float:left; display:block; margin:0 5px 0 0;"><ul class="the-icons clearfix"><i class="isb-delete"></i></ul></a><button class="btn" type="button" name="back" onclick="window.location.href='packet_list.php?product_id=<?php echo $fetch_record['product_id']?>'">Packets</button></td>
							</tr>
							<?php
							$product_counter++;
							}
						}
						else
						{
						?>
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