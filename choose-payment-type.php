<?php 
require_once("header.php");
require_once("constants.php");

if(isset($_POST['send']))
{
	$sqlUpdate = "UPDATE `og_orders` SET `payment_type` = '".$_POST['payment_type']."' WHERE `order_id` = '".$_POST['hid_order_id']."'";
	$exeUpdate = mysql_query($sqlUpdate) or die(mysql_error());

	if($_POST['payment_type'] == 'COD')
	{
		header("location: order-thankyou.php?order_id=".$_POST['hid_order_id']);
	}
	else
	{
		header("location: payment.php?order_id=".$_POST['hid_order_id']);
	}
}
?>

			<!-- page template area start -->
			<div class="main-content bg-lighter">
    			<section class="inner-header parallax" style="background-image: url('images/bg/category.jpg');">
      				<div class="container">
						<div class="section-content">
							<div class="row">
								<div class="col-md-12">
									<h2 class="title text-white text-center" style="text-align:center;">Choose Payment Type</h2>
								</div>
							</div>
						</div>
					</div>
				</section>
				
    			<section id="about">
    				<div class="container pb-20 pt-20">
    					<div class="row pt-0">
    						<div class="col-md-12">
								<h4>Choose Your Payment Type</h4>
								<form id="contact_form" name="contact_form" class="" action="" method="post">
								<input type="hidden" name="hid_order_id" id="hid_order_id" value="<?php echo $_GET['order_id'];?>"> 
    							<div class="row">
    								<div class="col-sm-12">
    									<div class="form-group">
    										<input name="payment_type" id="payment_type" type="radio" value="COD" checked> COD (Cash On Delivery)<br>
											<input name="payment_type" id="payment_type" type="radio" value="Online"> Online
    									</div>
    								</div>
    							</div>
                                <div class="row">
        							<div class="col-sm-12">
            							<div class="form-group">
            								<input type="hidden" name="send" id="send" value="1" />
            								<button type="submit" class="btn btn-flat btn-theme-colored mb-sm-30 border-left-theme-color-2-4px">Submit</button>
            							</div>
            						</div>
            					</div>
    						</form>
    					</div>
    				</div>
    			</section>
    		</div>
			<!-- page template area end -->

<?php require_once("footer.php");?>