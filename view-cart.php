<?php require_once("header.php");?>

<?php
//DELETE ITEM FROM CART
if(isset($_GET['action']) && $_GET['action'] == 'delete')
{
	$sql_delete = "DELETE FROM `og_temp_cart` WHERE `cart_id` = '".$_REQUEST['cart_id']."'";
	$exe_delete = mysql_query($sql_delete) or die(mysql_error());
	
	$_SESSION['del_succ_msg'] = 'Item deleted successfully from your cart.';
	header("location: view-cart.php");
	exit;
}

//UPDATE ITEM FROM CART
if(isset($_POST['send']))
{
	if(count($_POST['qty'])>0)
	{
		for($k=0;$k<count($_POST['qty']);$k++)
		{
			$updated_quantity = $_POST['qty'][$k];
			$updated_subtotal = $updated_quantity*$_POST['unit_price'][$k];
			$sql_update = "UPDATE `og_temp_cart` SET `quantity` = '".$updated_quantity."',`subtotal` = '".$updated_subtotal."' WHERE `cart_id` = '".$_POST['cart_id'][$k]."'";
			$exe_update = mysql_query($sql_update) or die(mysql_error());
		}
	}
	
	$_SESSION['edit_succ_msg'] = 'Your cart has been updated successfully.';
	header("location: view-cart.php");
	exit;
}
?>
  
			<!-- page template area start -->
			<div class="main-content bg-lighter">
    			<section class="inner-header parallax" style="background-image: url('images/bg/category.jpg');">
      				<div class="container">
						<div class="section-content">
							<div class="row">
								<div class="col-md-12">
									<h2 class="title text-white text-center" style="text-align:center;">My Basket</h2>
								</div>
							</div>
						</div>
					</div>
				</section>
				
				<section id="about">
					<div class="container pb-20 pt-20">
						<div class="section-content">
							<div class="row">
								<div class="col-md-12">
									<?php if(isset($_SESSION['del_succ_msg'])) { ?>
									<p class="mb-20" style="text-align:center;"><img src="images/tick.png" alt="" /> <?php echo $_SESSION['del_succ_msg'];?></p>
									<?php
									unset($_SESSION['del_succ_msg']);
									}
									?>
									<?php if(isset($_SESSION['edit_succ_msg'])) { ?>
									<p class="mb-20" style="text-align:center;"><img src="images/tick.png" alt="" /> <?php echo $_SESSION['edit_succ_msg'];?></p>
									<?php
									unset($_SESSION['edit_succ_msg']);
									}
									?>
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
													<th></th>
												</tr>
											</thead>
											<tbody>
											<?php
											$sql_cart = "SELECT * FROM `og_temp_cart` WHERE `unique_id` = '".$session_id."' AND `packet_id` <> 0";
											$exe_cart = mysql_query($sql_cart) or die(mysql_error());
											$num_cart = mysql_num_rows($exe_cart);
											if($num_cart>0)
											{
												while($arr_cart = mysql_fetch_array($exe_cart))
												{
													$fetch_product = mysql_fetch_array(mysql_query("SELECT * FROM `og_products` WHERE `product_id` = '".$arr_cart['product_id']."'"));
													$fetch_product_packet = mysql_fetch_array(mysql_query("SELECT * FROM `og_product_packets` WHERE `packet_id` = '".$arr_cart['packet_id']."'"));
												?>
												<tr class="cart_item">
													<td class="product-thumbnail"><img alt="member" src="<?php echo SITE_URL;?>uploads/product/<?php echo stripslashes($fetch_product['product_photo']);?>" width="70" height="70"></td>
													<td class="product-name"><?php echo stripslashes($fetch_product['product_name_english']);?> (<?php echo $fetch_product_packet['packet_size'];?>)</td>
													<td class="product-price"><span class="amount">Rs. <?php echo stripslashes($arr_cart['unit_price']);?></span></td>
													<td class="product-quantity"><div class="quantity buttons_added">
													<select name="qty[]" id="qty">
													<?php for($h=1;$h<=20;$h++) { ?>
													<option value="<?php echo $h;?>" <?php if($arr_cart['quantity'] == $h) { ?>selected<?php } ?>><?php echo $h;?></option>
													<?php } ?>
													</select>
													</div></td>
													<td class="product-subtotal"><span class="amount">Rs. <?php echo stripslashes($arr_cart['subtotal']);?></span></td>
													<td class="product-remove"><a title="Remove this item" class="remove" href="view-cart.php?cart_id=<?php echo stripslashes($arr_cart['cart_id']);?>&action=delete" onclick="return confirm('Are you sure you want to delete this item from your basket?');"><img src="images/cross.png" alt="" /></a></td><input type="hidden" name="cart_id[]" id="cart_id" value="<?php echo stripslashes($arr_cart['cart_id']);?>" /><input type="hidden" name="unit_price[]" id="unit_price" value="<?php echo stripslashes($arr_cart['unit_price']);?>" />
												</tr>
												<?php
											}
											?>
												<tr class="cart_item">
													<td colspan="7" style="text-align:right;"><button type="submit" class="btn btn-flat btn-theme-colored mb-sm-30 border-left-theme-color-2-4px">Update Cart</button>&nbsp;&nbsp;<button type="button" class="btn btn-flat btn-theme-colored2 mb-sm-30 border-left-theme-color-2-4px" onclick="window.location.href='category.php'">Continue Shopping</button>&nbsp;&nbsp;<?php if(isset($_SESSION['USER_ID'])) { ?><button type="button" class="btn btn-flat btn-theme-colored3 mb-sm-30 border-left-theme-color-2-4px" onclick="window.location.href='checkout.php'" style="border-radius:5px;">Checkout</button><?php } else { ?><a class="btn btn-colored btn-theme-colored3 btn-lg font-14" href="javascript:void();" data-toggle="modal" data-target="#myModalLogin" style="border-radius:5px;">Checkout</a><?php } ?></td>
												</tr>
											<?php
										}
										else
										{
										?>
										<tr class="cart_item">
											<td colspan="7" style="text-align:center;"><font color="#FF0000">Your cart is empty!</font></td>
										</tr>
										<?php
										}
										?>
											</tbody>
										</table>
										<input type="hidden" name="send" id="send" value="1" />
									</form>
									</div>
								</div>
								<?php
								$sum_item = mysql_fetch_array(mysql_query("SELECT SUM(`quantity`) as `qtyy` FROM `og_temp_cart` WHERE `unique_id` = '".$session_id."'"));
								$grands_item = $sum_item['qtyy'];
								if($grands_item!="")
								{
									$grands_item = $grands_item;
								}
								else
								{
									$grands_item = 0;
								}
								
								$sum_total = mysql_fetch_array(mysql_query("SELECT SUM(`subtotal`) as `stot` FROM `og_temp_cart` WHERE `unique_id` = '".$session_id."'"));
								$total_price = $sum_total['stot'];
								
								$arrAdmin = mysql_fetch_array(mysql_query("SELECT * FROM `og_administrator` WHERE `admin_id` = '1'"));
								$delivery_charge = $arrAdmin['delivery_charge'];
								$delivery_charge_limit = $arrAdmin['delivery_charge_limit'];
								
								if($total_price<$delivery_charge_limit)
								{
									$grand_total = $total_price+$delivery_charge;
									$delivery_charge_display = $delivery_charge;
								}
								else
								{
									$grand_total = $total_price;
									$delivery_charge_display = '0.00';
								}
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
														<td>Rs. <?php echo $total_price;?></td>
													</tr>
													<tr>
														<td>Delivery Charge</td>
														<td>Rs. <?php echo $delivery_charge_display;?></td>
													</tr>
													<tr>
														<td><strong>Grand Total</strong></td>
														<td><strong>Rs. <?php echo number_format($grand_total,2);?></strong></td>
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
