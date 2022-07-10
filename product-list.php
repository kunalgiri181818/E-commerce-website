<?php require_once("header.php");?>

<script language="javascript" type="text/javascript">
function pack(pack_id)
{
    var str = {pack_id:pack_id};
    $.ajax({
		type: "post",
		url: "ajax_packet_id.php",
		data: str,
		success: function(data) 
		{
		    $('#hid_packet_id').val(data);
		}
	});
}

function add_cart(product_id,packet_id)
{
	var str = {product_id:product_id,packet_id:packet_id};
	$.ajax({
		type: "post",
		url: "ajax_add_to_cart.php",
		data: str,
		success: function(data) 
		{
		    window.location.href = 'view-cart.php';
		}
	});
}
</script>

<?php
if(isset($_REQUEST['subcategory_id']))
{
	$fetch_category = mysql_fetch_array(mysql_query("SELECT * FROM `og_subcategory` WHERE `subcategory_id` = '".$_REQUEST['subcategory_id']."'"));
	$cname = stripslashes($fetch_category['subcategory_name']);
}
else
{
	$fetch_category = mysql_fetch_array(mysql_query("SELECT * FROM `og_category` WHERE `category_id` = '".$_REQUEST['category_id']."'"));
	$cname = stripslashes($fetch_category['category_name']);
}
?>

			<!-- page template area start -->
			<div class="main-content bg-lighter">
    			<section class="inner-header parallax" style="background-image: url('images/bg/category.jpg');">
      				<div class="container">
						<div class="section-content">
							<div class="row">
								<div class="col-md-12">
									<h2 class="title text-white text-center" style="text-align:center;"><?php echo $cname;?></h2>
								</div>
							</div>
						</div>
					</div>
				</section>
				
				<section id="about">
					<div class="container pb-20 pt-20">
						<div class="row multi-row-clearfix">
							<form action="add_to_cart.php" method="get">
							<div class="col-md-12">
							<?php
							if(isset($_REQUEST['subcategory_id']))
							{
								$sql_product = "SELECT * FROM `og_products` WHERE `category_id` = '".$_REQUEST['category_id']."' AND `subcategory_id` = '".$_REQUEST['subcategory_id']."' AND `product_status` = 'Active'";
							}
							else
							{
								$sql_product = "SELECT * FROM `og_products` WHERE `category_id` = '".$_REQUEST['category_id']."' AND `product_status` = 'Active'";
							}
							$exe_product = mysql_query($sql_product) or die(mysql_error());
							while($arr_product = mysql_fetch_array($exe_product))
							{
								$get_min_price = mysql_fetch_array(mysql_query("SELECT MIN(`price`) AS `m_price`,`packet_size` FROM `og_product_packets` WHERE `product_id` = '".$arr_product['product_id']."'"));
								?>		
								<div class="col-md-3" data-nav="false">								
									<div class="item">
										<div class="mb-30">
											<a href="#"><div class="thumb" style="border:1px solid #DEDEDE;">
												<img class="img-fullwidth" alt="" src="uploads/product/<?php echo $arr_product['product_photo'];?>">
											</div></a>
											<div class="pt-5 pb-5" style="text-align:center; background-color:#DEDEDE;">
												<h4 class="" style="color:#333333; margin-bottom:0;"><a href="#" style="color:#333333;"><?php echo stripslashes($arr_product['product_name_english']);?></a><input type="hidden" name="product_id" id="product_id" value="<?php echo $arr_product['product_id'];?>" /></h4>
												<div style="text-align:center; color:#ff0000; font-weight:bold;">Rs.<?php echo $get_min_price['m_price'];?>(<?php echo $get_min_price['packet_size'];?>)</div>
												<p style="margin-bottom:0;"><select name="packet_id" id="packet_id" onchange="pack(this.value);">
												    <option value="">Select Packet Size</option>
												<?php
												$sql_product_price = "SELECT * FROM `og_product_packets` WHERE `product_id` = '".$arr_product['product_id']."'";
												$exe_product_price = mysql_query($sql_product_price) or die(mysql_error());
												while($arr_product_price = mysql_fetch_array($exe_product_price))
												{
													?>
													<option value="<?php echo $arr_product_price['packet_id'];?>"><?php echo $arr_product_price['packet_size'];?>&nbsp;&nbsp;Rs.<?php echo $arr_product_price['price'];?></option>
													<?php
												}
												?>
												</select>
												</p>
												<input type="hidden" name="hid_packet_id" id="hid_packet_id" value="">
												<p style="text-align:center;"><button type="button" class="btn btn-flat btn-theme-colored mt-10 mb-sm-30 border-left-theme-color-2-4px" onclick="add_cart('<?php echo $arr_product['product_id'];?>','1');">Add To Basket</button></p>
											</div>	
										</div>
									</div>
								</div>
								<?php
							}
							?>
							</div>
							</form>
						</div>
					</div>
				</section>
			</div>
			<!-- page template area end -->
  
<?php require_once("footer.php");?>