<?php 
require_once("header.php");
require_once("constants.php");
?>

<?php
$arrUser = mysql_fetch_array(mysql_query("SELECT * FROM `og_orders` WHERE `payment_type` = 'Online' AND `payment_status` = 'Pending' ORDER BY `order_id` DESC LIMIT 0,1"));
$fname = stripslashes($arrUser['fname']);
$lname = stripslashes($arrUser['lname']);
$name = $fname." ".$lname;
$email = stripslashes($arrUser['email']);
$phone = stripslashes($arrUser['phone']);
$amount = stripslashes($arrUser['grand_total']);
?>

			<!-- page template area start -->
			<div class="main-content bg-lighter">
    			<section class="inner-header parallax" style="background-image: url('images/bg/category.jpg');">
      				<div class="container">
						<div class="section-content">
							<div class="row">
								<div class="col-md-12">
									<h2 class="title text-white text-center" style="text-align:center;">Billing Details</h2>
								</div>
							</div>
						</div>
					</div>
				</section>
				
    			<section id="about">
    				<div class="container pb-20 pt-20">
    					<div class="row pt-0">
    						<div class="col-md-8">
								<form name="razorpay_frm_payment" class="razorpay-frm-payment" id="razorpay-frm-payment" method="post">
								<input type="hidden" name="merchant_order_id" id="merchant_order_id" value="<?php echo $arrUser['orderid'];?>"> 
								<input type="hidden" name="language" value="EN"> 
								<input type="hidden" name="currency" id="currency" value="INR"> 
								<input type="hidden" name="surl" id="surl" value="http://www.morningbazar.co.in/success.php"> 
								<input type="hidden" name="furl" id="furl" value="http://www.morningbazar.co.in/failed.php">
    							<div class="row">
    								<div class="col-sm-6">
    									<div class="form-group">
    										<input name="amount" id="amount" class="form-control" type="text" value="<?php echo $amount;?>" readonly="readonly">
    									</div>
    								</div>
									<div class="col-sm-6">
    									<div class="form-group">
    										<input name="billing_name" id="billing-name" class="form-control" type="text" value="<?php echo $name;?>" placeholder="Enter Name *">
    									</div>
    								</div>
    							</div>
    							<div class="row">
    								<div class="col-sm-6">
    									<div class="form-group">
    										<input name="billing_phone" id="billing-phone" class="form-control" type="text" value="<?php echo $phone;?>" placeholder="Enter Phone *">
    									</div>
    								</div>
    								<div class="col-sm-6">
    									<div class="form-group">
    										<input name="billing_email" id="billing-email" class="form-control" type="text" value="<?php echo $email;?>" placeholder="Enter Email *">
    									</div>
    								</div>
    							</div>
                                <div class="row">
        							<div class="col-sm-12">
            							<div class="form-group">
            								<input type="hidden" name="send" id="send" value="1" />
            								<button type="submit" id="razor-pay-now edit korechi" class="btn btn-flat btn-theme-colored mb-sm-30 border-left-theme-color-2-4px">Pay Now</button>
            							</div>
            						</div>
            					</div>
    						</form>
    					</div>
    					<div class="col-md-4"><img class="img-fullwidth" alt="" src="images/pay.jpg"></div>
    				</div>
    			</section>
    		</div>
			<!-- page template area end -->

<?php require_once("footer.php");?>