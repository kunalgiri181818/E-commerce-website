<?php 
require_once("header.php");
require_once("session_check.php");

//FETCH DATA FROM DATABASE
$fetch_record = mysql_fetch_array(mysql_query("SELECT * FROM `og_orders` WHERE `unique_id` = '".$_REQUEST['unique_id']."'"));
?>

<?php require_once("left_panel.php");?>
<div class="content">
	<div class="workplace">
		<div class="row-fluid">
			<div class="span12">
				<div class="head clearfix">
					<div class="isw-documents"></div>					
					<h1>Customer Details</h1>					
				</div>
				<form action="" method="post" enctype="multipart/form-data">
				<div class="block-fluid">
					<div class="row-form clearfix">
						<div class="span3">Order ID</div>
						<div class="span9"><?php echo stripslashes($fetch_record['orderid']);?></div>                            
					</div>
					<div class="row-form clearfix">
						<div class="span3">First Name</div>
						<div class="span9"><?php echo stripslashes($fetch_record['fname']);?></div>                            
					</div>
					<div class="row-form clearfix">
						<div class="span3">Last Name</div>
						<div class="span9"><?php echo stripslashes($fetch_record['lname']);?></div>                            
					</div>
					<div class="row-form clearfix">
						<div class="span3">Email Address</div>
						<div class="span9"><?php echo stripslashes($fetch_record['email']);?></div>                            
					</div>
					<div class="row-form clearfix">
						<div class="span3">Phone No.</div>
						<div class="span9"><?php echo stripslashes($fetch_record['phone']);?></div>                            
					</div>
					<div class="row-form clearfix">
						<div class="span3">Address</div>
						<div class="span9"><?php echo stripslashes($fetch_record['address']);?></div>                            
					</div>
					<div class="row-form clearfix">
						<div class="span3">City</div>
						<div class="span9"><?php echo stripslashes($fetch_record['city']);?></div>                            
					</div>
					<div class="row-form clearfix">
						<div class="span3">State</div>
						<div class="span9"><?php echo stripslashes($fetch_record['state']);?></div>                            
					</div>
					<div class="row-form clearfix">
						<div class="span3">Zipcode</div>
						<div class="span9"><?php echo stripslashes($fetch_record['zip']);?></div>                            
					</div>
				</div>
				<div>&nbsp;</div>
				<div class="head clearfix">
					<div class="isw-documents"></div>					
					<h1>Order Details</h1>					
				</div>
				<div class="block-fluid">
				<?php
				$item_counter = 1;
				$sql_final = "SELECT * FROM `og_final_cart` WHERE `unique_id` = '".$_REQUEST['unique_id']."'";
				$exe_final = mysql_query($sql_final) or die(mysql_error());
				while($arr_final = mysql_fetch_array($exe_final))
				{
					$get_product = mysql_fetch_array(mysql_query("SELECT * FROM `og_products` WHERE `product_id` = '".$arr_final['product_id']."'"));
					$get_product_packet = mysql_fetch_array(mysql_query("SELECT * FROM `og_product_packets` WHERE `packet_id` = '".$arr_final['packet_id']."'"));
					?>
					<div class="row-form clearfix">
						<div class="span3">Item <?php echo $item_counter;?></div>
						<div class="span9"><b><?php echo stripslashes($get_product['product_name_english']);?> (<?php echo stripslashes($get_product_packet['packet_size']);?>) :</b>  Rs. <?php echo $arr_final['unit_price'];?> X <?php echo $arr_final['quantity'];?> = Rs. <?php echo $arr_final['subtotal'];?></div>                              
					</div>
					<?php
					$item_counter++;
				}
				?>
					<div class="row-form clearfix">
						<div class="span3">&nbsp;</div>
						<div class="span9">&nbsp;</div>                            
					</div>
					<div class="row-form clearfix">
						<div class="span3">Total Cost</div>
						<div class="span9">Rs. <?php echo stripslashes($fetch_record['total_price']);?></div>                            
					</div>
					<div class="row-form clearfix">
						<div class="span3">Delivery Charge</div>
						<div class="span9">Rs. <?php echo stripslashes($fetch_record['delivery_charge']);?></div>                            
					</div>
					<div class="row-form clearfix">
						<div class="span3"><b>Grand Total</b></div>
						<div class="span9"><b>Rs. <?php echo stripslashes($fetch_record['grand_total']);?></b></div>                            
					</div>
					<div class="row-form clearfix">
						<div class="span3"><b>Order Date</b></div>
						<div class="span9"><b><?php echo date('d-m-Y, h:i A',strtotime($fetch_record['post_date']));?></b></div>                            
					</div>
					<div class="row-form clearfix">
						<div class="span3"><b>Delivery Date</b></div>
						<div class="span9"><b><?php echo date('d-m-Y',strtotime($fetch_record['pickup_date']));?></b></div>                            
					</div>
					<div class="row-form clearfix">
						<div class="span3"><b>Delivery Time</b></div>
						<div class="span9"><b><?php echo stripslashes($fetch_record['pickup_time']);?></b></div>                            
					</div>
					<div class="row-form clearfix">
						<div class="span3">&nbsp;</div>
						<div class="span9">						
							<button class="btn" type="button" name="back" onclick="window.location.href='order_list.php'">Back To Orders List</button>&nbsp;&nbsp;<button class="btn" type="button" name="back" onclick="window.location.href='invoice.php?unique_id=<?php echo $_REQUEST['unique_id'];?>&user_id=<?php echo $fetch_record['user_id'];?>'">Invoice</button>
						</div>
					</div>
				</div>
				</form>
			</div>
		</div>
	</div>
</div> 

<?php require_once("footer.php"); ?>