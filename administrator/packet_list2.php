<?php 
require_once("header.php");
require_once("session_check.php");

//CODE FOR DELETE PACKET
if(isset($_GET['action']) && $_GET['action'] == "delete")
{
	mysql_query("DELETE FROM `og_product_packets` WHERE `packet_id` = '".$_GET['packet_id']."'") or die(mysql_error());
	
	$_SESSION['del_succ_msg'] = 'Packet deleted successfully.';
	header("location: packet_list2.php?product_id=".$_REQUEST['product_id']);
	exit;
}
?>

<?php 
$fetch_product = mysql_fetch_array(mysql_query("SELECT * FROM `og_products` WHERE `product_id` = '".$_REQUEST['product_id']."'"));
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
		<div class="row-fluid">
			<div class="span12">                    
				<div class="head clearfix">
					<div class="isw-grid"></div>
					<h1>Packets List For <?php echo $fetch_product['product_name_english'];?></h1>                               
				</div>
				<p style="text-align:right;"><button class="btn" type="button" name="back" onclick="window.location.href='add_edit_packet2.php?packet_id=<?php echo $fetch_record['packet_id']?>&product_id=<?php echo $_REQUEST['product_id']?>'">Add Packet</button></p>
				<div class="block-fluid table-sorting clearfix">
					<table cellpadding="0" cellspacing="0" width="100%" class="table" id="tSortable">
						<thead>
							<tr>
								<th width="20%">Serial No.</th>
								<th width="20%">Packet</th>
								<th width="20%">Original Price</th>
								<th width="20%">Sale Price</th>
								<th width="20%">Action</th>
							</tr>
						</thead>
						<tbody>
						<?php
						$packet_counter = 1;
						$sql_record = "SELECT * FROM `og_product_packets` WHERE `product_id` = '".$_REQUEST['product_id']."' ORDER BY `packet_id` DESC";
						$exe_record = mysql_query($sql_record) or die();
						$num_record = mysql_num_rows($exe_record);
						if($num_record>0)
						{
							while($fetch_record = mysql_fetch_array($exe_record))
							{
								$packet_size = stripslashes($fetch_record['packet_size']);
								$original_price = $fetch_record['original_price'];
								$discount = $fetch_record['discount'];
								$price = $fetch_record['price'];
							?>
							<tr>
								<td><?php echo $packet_counter;?></td>
								<td><?php echo $packet_size;?></td>
								<td>Rs. <?php echo $original_price;?><br><b>Discount -</b> <?php echo $discount;?>%</td>
								<td>Rs. <?php echo $price;?></td>
								<td><a href="add_edit_packet2.php?packet_id=<?php echo $fetch_record['packet_id']?>&product_id=<?php echo $_REQUEST['product_id']?>&action=edit" title="Edit" style="float:left; display:block; margin:0 5px 0 0;"><ul class="the-icons clearfix"><i class="isb-edit"></i></ul></a><a href="packet_list2.php?packet_id=<?php echo $fetch_record['packet_id']?>&product_id=<?php echo $_REQUEST['product_id']?>&action=delete" title="Delete" onclick="return confirm('Are you sure you want to delete this record?');" style="float:left; display:block; margin:0 5px 0 0;"><ul class="the-icons clearfix"><i class="isb-delete"></i></ul></a></td>
							</tr>
							<?php
							$packet_counter++;
							}
						}
						else
						{
						?>
						<tr>
						    <td><font color="#FF0000">No record found</font></td>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
					    </tr>
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