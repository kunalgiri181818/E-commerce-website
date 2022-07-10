<?php require_once("header.php");?>
  
			<!-- page template area start -->
			<div class="main-content bg-lighter">
    			<section class="inner-header parallax" style="background-image: url('images/bg/user.jpg');">
      				<div class="container">
						<div class="section-content">
							<div class="row">
								<div class="col-md-12">
									<h2 class="title text-white text-center" style="text-align:center;">Order Details</h2>
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
								<div class="table-responsive">
								<form action="" method="post" enctype="multipart/form-data">
									<table class="table table-striped table-bordered tbl-shopping-cart">
										<thead>
											<tr style="background-color:#0D9845; color:#FFFFFF;">
												<th>Product Photo</th>
												<th>Product Name</th>
												<th>Price</th>
												<th>Quantity</th>
												<th>Sub Total</th>
											</tr>
										</thead>
										<tbody>
										<?php
										$sql_cart = "SELECT * FROM `og_final_cart` WHERE `order_id` = '".$_REQUEST['orderid']."'";
										$exe_cart = mysql_query($sql_cart) or die(mysql_error());
										$num_cart = mysql_num_rows($exe_cart);
										if($num_cart>0)
										{
											while($arr_cart = mysql_fetch_array($exe_cart))
											{
												$fetch_product = mysql_fetch_array(mysql_query("SELECT * FROM `og_products` WHERE `product_id` = '".$arr_cart['product_id']."'"));
												$fetch_product_packet = mysql_fetch_array(mysql_query("SELECT * FROM `og_product_packets` WHERE `product_id` = '".$arr_cart['product_id']."'"));
											?>
											<tr class="cart_item">
												<td class="product-thumbnail"><img alt="member" src="<?php echo SITE_URL;?>uploads/product/<?php echo stripslashes($fetch_product['product_photo']);?>" width="70" height="70"></td>
												<td class="product-name"><?php echo stripslashes($fetch_product['product_name_english']);?> (<?php echo $fetch_product_packet['packet_size'];?>)</td>
												<td class="product-price"><span class="amount">Rs. <?php echo stripslashes($arr_cart['unit_price']);?></span></td>
												<td class="product-quantity"><?php echo stripslashes($arr_cart['quantity']);?></td>
												<td class="product-subtotal"><span class="amount">Rs. <?php echo stripslashes($arr_cart['subtotal']);?></span></td>
											</tr>
											<?php
										}
									}
									?>
										</tbody>
									</table>
									<input type="hidden" name="send" id="send" value="1" />
								</form>
								</div>
								<?php
								$sum_item = mysql_fetch_array(mysql_query("SELECT SUM(`quantity`) as `qtyy` FROM `og_final_cart` WHERE `order_id` = '".$_REQUEST['orderid']."'"));
								$grands_item = $sum_item['qtyy'];
								
								$order = mysql_fetch_array(mysql_query("SELECT * FROM `og_orders` WHERE `orderid` = '".$_REQUEST['orderid']."'"));
								$admin = mysql_fetch_array(mysql_query("SELECT * FROM `og_administrator` WHERE `admin_id` = '1'"));
								?>
								
								<?php if($grands_item>0) { ?>
								<div class="col-md-12 mt-30">
									<div class="row">
										<div class="col-md-12">
											<h4>Cart Totals</h4>
											<table class="table table-bordered">
												<tbody>
													<tr>
														<td>Total Amount</td>
														<td>Rs. <?php echo $order['total_price'];?></td>
													</tr>
													<tr>
														<td>Delivery Charge</td>
														<td>Rs. <?php echo $order['delivery_charge'];?></td>
													</tr>
													<tr>
														<td><strong>Grand Total</strong></td>
														<td><strong>Rs. <?php echo $order['grand_total'];?></strong></td>
													</tr>
												</tbody>
											</table>
										</div>
									</div>
								</div>
								<?php } ?>
							</div>
						</div>
					</div>
    			</section>
			</div>
			<!-- page template area end -->
  
<?php require_once("footer.php");?>
