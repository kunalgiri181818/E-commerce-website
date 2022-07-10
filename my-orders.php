<?php require_once("header.php");?>

<?php
//DELETE ITEM FROM CART
if(isset($_GET['orderid']))
{
	$sqlOrder = "UPDATE `og_orders` SET `is_cancel` = 'Yes' WHERE `user_id` = '".$_SESSION['USER_ID']."' AND `orderid` = '".$_GET['orderid']."'";
	$exeOrder = mysql_query($sqlOrder) or die(mysql_error());
	
	$_SESSION['del_succ_msg'] = 'Successfully deleted your order.';
	header("location: my-orders.php");
	exit;
}
?>


			<script language="javascript" type="text/javascript">
			function ConfirmDelete(oid)
			{
			  var x = confirm("Are you sure you want to delete?");
			  if (x)
				 window.location.href = 'my-orders.php?orderid='+oid;
			  else
				return false;
			}
			</script>

			<!-- page template area start -->
			<div class="main-content bg-lighter">
    			<section class="inner-header parallax" style="background-image: url('images/bg/user.jpg');">
      				<div class="container">
						<div class="section-content">
							<div class="row">
								<div class="col-md-12">
									<h2 class="title text-white text-center" style="text-align:center;">My Orders</h2>
								</div>
							</div>
						</div>
					</div>
				</section>
				
				<section id="about">
					<div class="container pb-20 pt-20">		
						<div class="row">
							<div class="col-lg-4">
								<?php require_once("user_left_panel.php");?>
							</div>
							<div class="col-lg-8">
							<?php if(isset($_SESSION['del_succ_msg'])) { ?>
							<p class="mb-20"><img src="images/tick.png" alt="" /> <?php echo $_SESSION['del_succ_msg'];?></p>
							<?php
							unset($_SESSION['del_succ_msg']);
							}
							?>
							<?php
							$sql_order = "SELECT * FROM `og_orders` WHERE `user_id` = '".$_SESSION['USER_ID']."' AND `is_cancel` = 'No' AND `transaction_completed` = 'Yes' ORDER BY `order_id` DESC";
							$exe_order = mysql_query($sql_order) or die(mysql_error());
							while($arr_order = mysql_fetch_array($exe_order))
							{								
								$suggestion_posted = mysql_num_rows(mysql_query("SELECT * FROM `og_suggestions` WHERE `user_id` = '".$_SESSION['USER_ID']."' AND `order_id` = '".$arr_order['orderid']."'"));
								?>	
								<div class="col-md-6" data-nav="false" style="border: 1px solid #CCC;">								
									<div class="item">
										<div class="pt-10 pb-10" style="text-align:left; background-color:#fff;">
											<div style="background-color:#0D9845; color:#FFF; padding:10px;"><i class="fa fa-clock-o text-white"></i> <?php echo date('F d, Y',strtotime($arr_order['post_date']));?></div>
											<p style="margin-bottom:0;">Order ID : <?php echo $arr_order['orderid'];?></p>
											<p style="margin-bottom:0;">Total Items : <?php echo $arr_order['total_quantity'];?></p>
											<p style="margin-bottom:0;">Total Price : Rs.<?php echo $arr_order['grand_total'];?></p>
											<p style="margin-bottom:0;">Payment Type : <?php echo $arr_order['payment_type'];?></p>
											<p style="margin-bottom:0;">Payment Status : <?php echo $arr_order['payment_status'];?></p>
											<p style="margin-bottom:0;">Delivery Status : <?php echo $arr_order['delivery_status'];?></p>
											<p style="text-align:center;"><button type="button" class="btn btn-flat btn-theme-colored mb-sm-30 border-left-theme-color-2-4px" style="padding:6px 14px;" onclick="window.location.href='order-details.php?orderid=<?php echo $arr_order['orderid'];?>'">View Details</button>&nbsp;&nbsp;<button type="button" class="btn btn-flat btn-theme-colored2 mb-sm-30 border-left-theme-color-2-4px" onclick="ConfirmDelete('<?php echo $arr_order['orderid'];?>');" style="padding:6px 14px;">Delete</button>&nbsp;&nbsp;<?php if($suggestion_posted == 0) { ?><button type="button" class="btn btn-flat btn-theme-colored3 mb-sm-30 border-left-theme-color-2-4px" onclick="window.location.href='post-suggestion.php?orderid=<?php echo $arr_order['orderid'];?>'" style="padding:6px 14px; border-radius:5px;">Post Comment</button><?php } else { ?><button type="button" class="btn btn-flat btn-theme-colored3 mb-sm-30 border-left-theme-color-2-4px" onclick="window.location.href='view-suggestion.php?orderid=<?php echo $arr_order['orderid'];?>'" style="padding:6px 14px; border-radius:5px;">View Comment</button><?php } ?></p>
										</div>	
									</div>
								</div>
							<?php
							}
							?>										
							</div>
						</div>
					</div>
				</section>
			</div>
			<!-- page template area end -->
  
<?php require_once("footer.php");?>