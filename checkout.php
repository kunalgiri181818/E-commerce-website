<?php require_once("header.php");?>

<?php
if(isset($_POST['send']))
{	
	$fetchTotal = mysql_fetch_array(mysql_query("SELECT SUM(`subtotal`) AS `TOTAL_PRICE` FROM `og_temp_cart` WHERE `user_id` = '".$_SESSION['USER_ID']."' AND `unique_id` = '".$session_id."'"));
	$total_price = $fetchTotal['TOTAL_PRICE'];
	
	$fetchTotalQuantity = mysql_fetch_array(mysql_query("SELECT SUM(`quantity`) AS `TOTAL_QUANTITY` FROM `og_temp_cart` WHERE `user_id` = '".$_SESSION['USER_ID']."' AND `unique_id` = '".$session_id."'"));
	$total_quantity = $fetchTotalQuantity['TOTAL_QUANTITY'];
	
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
	
	$sql_check_order = "SELECT * FROM `og_orders` ORDER BY `order_id` DESC LIMIT 0,1";
	$exe_check_order = mysql_query($sql_check_order) or die(mysql_error());
	$num_check_order = mysql_num_rows($exe_check_order);
	if($num_check_order>0)
	{
		$arr_check_order = mysql_fetch_array($exe_check_order);
		$new_order_no =  $arr_check_order['order_no']+1;
		$new_orderid =  'MB'.$new_order_no;
	}
	else
	{
		$new_order_no =  509;
		$new_orderid =  'MB509';
	}
	
	$sqlInsert = "INSERT INTO `og_orders` SET `user_id` = '".$_SESSION['USER_ID']."',`unique_id` = '".$session_id."',`fname` = '".addslashes($_POST['fname'])."',`lname` = '".addslashes($_POST['lname'])."',`email` = '".addslashes($_POST['email'])."',`phone` = '".addslashes($_POST['phone'])."',`address` = '".addslashes($_POST['address'])."',`city` = '".addslashes($_POST['city'])."',`state` = '".addslashes($_POST['state'])."',`zip` = '".addslashes($_POST['zip'])."',`total_quantity` = '".$total_quantity."',`total_price` = '".$total_price."',`delivery_charge` = '".$delivery_charge_display."',`grand_total` = '".$grand_total."',`order_no` = '".$new_order_no."',`orderid` = '".$new_orderid."',`pickup_date` = '".$_POST['pickup_date']."',`pickup_time` = '".$_POST['pickup_time']."',`post_date` = '".date('Y-m-d H:i:s',time())."'";
	$exeInsert = mysql_query($sqlInsert) or die(mysql_error());
	$last_id = mysql_insert_id();
	
	header("location: choose-payment-type.php?order_id=".$last_id);
}

if(isset($_SESSION['USER_ID'])) 
{
	$arrUser = mysql_fetch_array(mysql_query("SELECT * FROM `og_users` WHERE `user_id` = '".$_SESSION['USER_ID']."'"));
	$fname = stripslashes($arrUser['fname']);
	$lname = stripslashes($arrUser['lname']);
	$email = stripslashes($arrUser['email']);
	$phone = stripslashes($arrUser['phone']);
	$address = stripslashes($arrUser['address']);
	$state = stripslashes($arrUser['state']);
	$city = stripslashes($arrUser['city']);
	$zip = stripslashes($arrUser['zip']);
}
else
{
	$fname = '';
	$lname = '';
	$email = '';
	$phone = '';
	$address = '';
	$state = '';
	$city = '';
	$zip = '';
}
?>

			<script language="javascript" type="text/javascript">
			function echeck(str) 
			{
					var at="@"
					var dot="."
					var lat=str.indexOf(at)
					var lstr=str.length
					var ldot=str.indexOf(dot)
					if (str.indexOf(at)==-1){
						alert("Invalid email address");
					   return false;
					}
			
			
					if (str.indexOf(at)==-1 || str.indexOf(at)==0 || str.indexOf(at)==lstr){
						alert("Invalid email address");
					   return false;
					}
			
			
					if (str.indexOf(dot)==-1 || str.indexOf(dot)==0 || str.indexOf(dot)==lstr){
						alert("Invalid email address");
						return false;
					}
			
			
					 if (str.indexOf(at,(lat+1))!=-1){
						alert("Invalid email address");
						return false;
					 }
			
			
					 if (str.substring(lat-1,lat)==dot || str.substring(lat+1,lat+2)==dot){
						alert("Invalid email address");
						return false;
					 }
			
			
					 if (str.indexOf(dot,(lat+2))==-1){
						alert("Invalid email address");
						return false;
					 }
					
			
					 if (str.indexOf(" ")!=-1){
						alert("Invalid email address");
						return false;
					 }
					 return true;					
			}
			
			function form_validation()
			{
				if(document.getElementById('fname').value == "")
				{
					alert("Please enter first name");
					document.getElementById('fname').focus();
					return false;
				}
				
				if(document.getElementById('lname').value == "")
				{
					alert("Please enter last name");
					document.getElementById('lname').focus();
					return false;
				}
				
				if(document.getElementById('phone').value == "")
				{
					alert("Please enter contact number");
					document.getElementById('phone').focus();
					return false;
				}

				if(document.getElementById('email').value == "")
				{
					alert("Please enter email");
					document.getElementById('email').focus();
					return false;
				}
			   
				if(echeck(document.getElementById('email').value)==false){
					document.getElementById('email').focus();
					return false;
				}
				
				if(document.getElementById('address').value == "")
				{
					alert("Please enter address");
					document.getElementById('address').focus();
					return false;
				}
				
				if(document.getElementById('city').value == "")
				{
					alert("Please enter city");
					document.getElementById('city').focus();
					return false;
				}
				
				if(document.getElementById('state').value == "")
				{
					alert("Please enter state");
					document.getElementById('state').focus();
					return false;
				}
				
				if(document.getElementById('zip').value == "")
				{
					alert("Please enter pincode");
					document.getElementById('zip').focus();
					return false;
				}
				
				if(document.getElementById('pickup_date').value == "")
				{
					alert("Please select delivery date");
					return false;
				}
				
				if(document.getElementById('pickup_time').value == "")
				{
					alert("Please select delivery time");
					return false;
				}
			}
			
			function myFunction(dval)
			{
			    var today = new Date();
                var dd = String(today.getDate()).padStart(2, '0');
                var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
                var yyyy = today.getFullYear();
                
                today = yyyy + '-' + mm + '-' + dd;
                //alert(today);
                //alert(dval);

                if(dval == "")
			    {
			        $('#today').hide();
    			    $('#tomorrow').hide();
			    }
			    else
			    {
    			    if(dval == today)
    			    {
    			        $('#today').show();
    			        $('#tomorrow').hide();
    			    }
    			    else
    			    {
    			        $('#tomorrow').show();
    			        $('#today').hide();
    			    }
			    }
			}
			</script>

			<!-- page template area start -->
			<div class="main-content bg-lighter">
    			<section class="inner-header parallax" style="background-image: url('images/bg/category.jpg');">
      				<div class="container">
						<div class="section-content">
							<div class="row">
								<div class="col-md-12">
									<h2 class="title text-white text-center" style="text-align:center;">Checkout</h2>
								</div>
							</div>
						</div>
					</div>
				</section>
				
    			<section id="about">
    				<div class="container pb-20 pt-20">
    					<div class="row pt-0">
    						<div class="col-md-8">
								<?php if(isset($_SESSION['msg_succ'])) { ?>
								<p class="mb-20"><img src="images/cross.png" alt="" /> <?php echo $_SESSION['msg_fail'];?></p>
								<?php 
								unset($_SESSION['msg_succ']);
								} 
								?>	
    							<form id="contact_form" name="contact_form" class="" action="" method="post" onSubmit="return form_validation();">
    							<div class="row">
    								<div class="col-sm-6">
    									<div class="form-group">
    										<input name="fname" id="fname" class="form-control" type="text" value="<?php echo $fname;?>" placeholder="Enter First Name *">
    									</div>
    								</div>
									<div class="col-sm-6">
    									<div class="form-group">
    										<input name="lname" id="lname" class="form-control" type="text" value="<?php echo $lname;?>" placeholder="Enter Last Name *">
    									</div>
    								</div>
    							</div>
    							<div class="row">
    								<div class="col-sm-6">
    									<div class="form-group">
    										<input name="phone" id="phone" class="form-control" type="text" value="<?php echo $phone;?>" placeholder="Enter Phone *">
    									</div>
    								</div>
    								<div class="col-sm-6">
    									<div class="form-group">
    										<input name="email" id="email" class="form-control" type="text" value="<?php echo $email;?>" placeholder="Enter Email *">
    									</div>
    								</div>
    							</div>
    							<div class="form-group">
    								<textarea name="address" id="address" class="form-control required" rows="5" placeholder="Enter Address *"><?php echo $address;?></textarea>
    							</div>
								<div class="row">
    								<div class="col-sm-4">
    									<div class="form-group">
    										<input name="city" id="city" class="form-control" type="text" value="<?php echo $city;?>" placeholder="Enter City *">
    									</div>
    								</div>
    								<div class="col-sm-4">
    									<div class="form-group">
    										<input name="state" id="state" class="form-control" type="text" value="<?php echo $state;?>" placeholder="Enter State *">
    									</div>
    								</div>
									<div class="col-sm-4">
    									<div class="form-group">
    										<input name="zip" id="zip" class="form-control" type="text" value="<?php echo $zip;?>" placeholder="Enter Pincode *">
    									</div>
    								</div>
    							</div>
    							<div class="row">
        							<div class="col-sm-12">
								        <div class="form-group">
                                    	    <select name="pickup_date" id="pickup_date" class="form-control" onchange="myFunction(this.value);">
                                    	        <option value="">Select Delivery Date</option>
                                    	        <option value="<?php echo date('Y-m-d',time());?>">Today</option>
                                    	        <option value="<?php echo date("Y-m-d", strtotime("+1 day"));?>">Tomorrow</option>
                                    	    </select>
                                    	</div>
                                    </div>
                                </div>
    							<div class="row" id="today" style="display:none">
        							<div class="col-sm-12">
								        <div class="form-group">
        								<?php
        								$current_time = date('H:i:s',time());
        
                                    	if($current_time>='06:00:00' && $current_time<='09:59:00')
                                    	{
                                    	    ?>
                                    	    <select name="pickup_time" id="pickup_time" class="form-control">
                                    	        <option value="">Select Delivery Time</option>
                                    	        <option value="7:00am-11:00am">7:00am-11:00am</option>
                                    	        <option value="6:00pm-9:00pm">6:00pm-9:00pm</option>
                                    	    </select>
                                    	    <?php
                                    	}    	
                                    	if($current_time>='10:01:00' && $current_time<='18:59:00')
                                    	{
                                    	    ?>
                                    	    <select name="pickup_time" id="pickup_time" class="form-control">
                                    	        <option value="">Select Delivery Time</option>
                                    	        <option value="4:00pm-7:00pm">4:00pm-7:00pm</option>
                                    	    </select>
                                    		<?php
                                    	}
                                    	?>
                                    	</div>
                                    </div>
                                </div>
                                <div class="row" id="tomorrow" style="display:none">
        							<div class="col-sm-12">
								        <div class="form-group">
                                    	    <select name="pickup_time" id="pickup_time" class="form-control">
                                    	        <option value="">Select Delivery Time</option>
                                    	        <option value="7:00am-11:00am">7:00am-11:00am</option>
                                    	        <option value="6:00pm-9:00pm">6:00pm-9:00pm</option>
                                    	    </select>
                                    	</div>
                                    </div>
                                </div>
                                <div class="row">
        							<div class="col-sm-12">
            							<div class="form-group">
            								<input type="hidden" name="send" id="send" value="1" />
            								<button type="submit" class="btn btn-flat btn-theme-colored mb-sm-30 border-left-theme-color-2-4px">Place Order</button>
            								<button type="reset" class="btn btn-flat btn-theme-colored2 mb-sm-30 border-left-theme-color-2-4px" onclick="window.location.href='view-cart.php'">Back</button>
            							</div>
            						</div>
            					</div>
    						</form>
    					</div>
    					<div class="col-md-4"><img class="img-fullwidth" alt="" src="images/checkout.jpg"></div>
    				</div>
    			</section>
    		</div>
			<!-- page template area end -->

<?php require_once("footer.php");?>