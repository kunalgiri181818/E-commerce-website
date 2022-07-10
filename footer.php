		</div>
			<footer id="footer" class="footer bg-black-222" style="border:0;">
				<div class="container pt-40 pb-20">
					<div class="row">
                    	<div class="col-sm-6 col-md-2">
							<div class="widget dark">
								<h5 class="widget-title">Quick Links</h5>
								<ul class="list-border">
									<li><i class="fa fa-angle-right text-white"></i> <a href="about-us.php" style="color:#FFFFFF;">About Us</a></li>
									<li><i class="fa fa-angle-right text-white"></i> 
									<?php if(isset($_SESSION['USER_ID'])) { ?>									
									<a href="my-account.php" style="color:#FFFFFF;">My Account</a>
									<?php } else { ?>
									<a href="javascript:void();" data-toggle="modal" data-target="#myModalLogin" style="color:#FFFFFF;">My Account</a>
									<?php } ?>
									</li>
									<li><i class="fa fa-angle-right text-white"></i> <a href="view-cart.php" style="color:#FFFFFF;">My Basket</a></li>
									<li><i class="fa fa-angle-right text-white"></i> <a href="contact-us.php" style="color:#FFFFFF;">Contact Us</a></li>
								</ul>
							</div>
						</div>
						<div class="col-sm-6 col-md-2">
							<div class="widget dark">
								<h5 class="widget-title">&nbsp;</h5>
								<ul class="list-border">
									<li><i class="fa fa-angle-right text-white"></i> <a href="terms.php" style="color:#FFFFFF;">Terms & Conditions</a></li>
									<li><i class="fa fa-angle-right text-white"></i> <a href="privacy.php" style="color:#FFFFFF;">Privacy Policy</a></li>
									<li><i class="fa fa-angle-right text-white"></i> <a href="cancel.php" style="color:#FFFFFF;">Order Cancellation</a></li>
									<li><i class="fa fa-angle-right text-white"></i> <a href="return.php" style="color:#FFFFFF;">Return & Refund</a></li>
								</ul>
							</div>
						</div>						
						<div class="col-sm-6 col-md-5">
							<div class="widget dark">
								<h5 class="widget-title">Our Contacts</h5>
								<ul class="list-border">
									<li style="text-align:left;"><i class="fa fa-map-marker text-white"></i> <a href="#" style="color:#FFFFFF;"><?php echo $contact_address;?></a></li>
									<li><i class="fa fa-phone text-white"></i> <a href="#" style="color:#FFFFFF;"> <?php echo $contact_no1;?></a></li>
									<li><i class="fa fa-phone text-white"></i> <a href="#" style="color:#FFFFFF;"> <?php echo $contact_no2;?></a></li>
									<li><i class="fa fa-envelope-o text-white"></i> <a href="#" style="color:#FFFFFF;"><?php echo $contact_email;?></a></li>
								</ul>
							</div>
						</div>
						<div class="col-sm-6 col-md-3">
							<div class="widget dark">
								<!--<h5 class="widget-title">Connect With Us</h5>
								<ul class="styled-icons icon-dark mt-20">
									<li class="wow fadeInLeft" data-wow-duration="1.5s" data-wow-delay=".1s" data-wow-offset="10"><a href="#" data-bg-color="#3B5998" target="_blank"><i class="fa fa-facebook"></i></a></li>
									<li class="wow fadeInLeft" data-wow-duration="1.5s" data-wow-delay=".2s" data-wow-offset="10"><a href="#" data-bg-color="#1EA1F3" target="_blank"><i class="fa fa-twitter"></i></a></li>
									<li class="wow fadeInLeft" data-wow-duration="1.5s" data-wow-delay=".4s" data-wow-offset="10"><a href="#" data-bg-color="#DC483B" target="_blank"><i class="fa fa-google-plus"></i></a></li>
									<li class="wow fadeInLeft" data-wow-duration="1.5s" data-wow-delay=".5s" data-wow-offset="10"><a href="#" data-bg-color="#0077B5" target="_blank"><i class="fa fa-linkedin"></i></a></li>
									<li class="wow fadeInLeft" data-wow-duration="1.5s" data-wow-delay=".5s" data-wow-offset="10"><a href="#" data-bg-color="#C22E2A" target="_blank"><i class="fa fa-youtube"></i></a></li>
								</ul>
								<div>&nbsp;</div>-->
								<h5 class="widget-title">Business Hours</h5>
								<ul class="list-border">									
									<li><i class="fa fa-clock-o text-white"></i> <a href="#" style="color:#FFFFFF;">Open Daily 08:00 AM - 08:00 PM</a></li>
								</ul>
								<div>&nbsp;</div>
								<h5 class="widget-title">Download Our App</h5>
								<ul class="list-border">									
									<li><a href="#" target="_blank"><img src="images/app.png" alt="" /></a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>			
			
				<div class="footer-bottom bg-black-222">
					<div class="container pt-10 pb-10">
						<div class="row">
							<div class="col-md-12">
								<p class="font-14 text-black-777 m-0" style="text-align:center;">&copy; 2021 Prismhub Online Solution Pvt Ltd. All Rights Reserved.</p>
							</div>
						</div>
					</div>
				</div>
			</footer>
			<a class="scrollToTop" href="#"><i class="fa fa-angle-up"></i></a>
		</div>


		<!-- Footer Scripts --> 
		<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/flexslider/2.7.2/jquery.flexslider.min.js"></script>-->
		<!-- JS | Custom script for all pages --> 
		<script src="js/custom.js"></script>

		<!-- SLIDER REVOLUTION 5.0 EXTENSIONS  
		(Load Extensions only on Local File Systems ! 
		The following part can be removed on Server for On Demand Loading) --> 
		<script type="text/javascript" src="js/revolution-slider/js/extensions/revolution.extension.actions.min.js"></script> 
		<!--<script type="text/javascript" src="js/revolution-slider/js/extensions/revolution.extension.carousel.min.js"></script>--> 
		<script type="text/javascript" src="js/revolution-slider/js/extensions/revolution.extension.kenburn.min.js"></script> 
		<script type="text/javascript" src="js/revolution-slider/js/extensions/revolution.extension.layeranimation.min.js"></script> 
		<script type="text/javascript" src="js/revolution-slider/js/extensions/revolution.extension.migration.min.js"></script> 
		<script type="text/javascript" src="js/revolution-slider/js/extensions/revolution.extension.navigation.min.js"></script> 
		<script type="text/javascript" src="js/revolution-slider/js/extensions/revolution.extension.parallax.min.js"></script> 
		<script type="text/javascript" src="js/revolution-slider/js/extensions/revolution.extension.slideanims.min.js"></script> 
		<script type="text/javascript" src="js/slider.js"></script>
		
		<script>
		$("#slider-container").sliderUi({
			speed: 500,
			cssEasing: "cubic-bezier(0.285, 1.015, 0.165, 1.000)"
		});
		$("#caption-slide").sliderUi({
			caption: false
		});
		</script>
		
		<script>
		$( document ).ready(function() {
		   var owl = $('.owl-carousel');
			owl.owlCarousel({
				items:1,
				loop:true,
				//margin:10,
				autoplay:true,
				autoplayTimeout:3000,
				autoplayHoverPause:true
			});
			$('.play').on('click',function(){
				owl.trigger('play.owl.autoplay',[3000])
			})
			$('.stop').on('click',function(){
				owl.trigger('stop.owl.autoplay')
			})
		});
		</script>

		<script language="javascript" type="text/javascript">
		function open_reg()
		{
			$('#myModalLogin').modal('hide');
			$("#myModalReg").modal();
		}
		
		function open_forgot()
		{
			$('#myModalLogin').modal('hide');
			$("#myModalforgot").modal();
		}
		
		function open_reg_form()
		{
			$('#myModalReg').modal('hide');
			$("#myModalReg2").modal();
		}
		
		function reg_employee_validation()
		{
			if(document.getElementById('rfname').value == "")
			{
				alert("Please enter first name");
				document.getElementById('rfname').focus();
				return false;			
			}
			
			if(document.getElementById('rlname').value == "")
			{
				alert("Please enter last name");
				document.getElementById('rlname').focus();
				return false;			
			}
		
			if(document.getElementById('remail').value == "")
			{
				alert("Please enter email");
				document.getElementById('remail').focus();
				return false;
			}
			
			if(document.getElementById('rphone').value == "")
			{
				alert("Please enter contact no.");
				document.getElementById('rphone').focus();
				return false;
			}
   
			if(document.getElementById('rpassword').value == "")
			{
				alert("Please enter password");
				document.getElementById('rpassword').focus();
				return false;
			}
			
			if(document.getElementById('cpassword').value == "")
			{
				alert("Please enter confirm password");
				document.getElementById('cpassword').focus();
				return false;
			}
			
			if(document.getElementById('cpassword').value != document.getElementById('rpassword').value)
			{
				alert("Password and confirm password both should be same");
				document.getElementById('cpassword').focus();
				return false;
			}
			
			regemployeedata();
		}
				
		function logindata()
		{
			var login_phone = $('#login_phone').val();
			var login_password = $('#login_password').val();
			
		   	var str = {login_phone:login_phone,login_password:login_password};
			$.ajax({
				type: "post",
				url: "ajax_login_check.php",
				data: str,
				success: function(data) 
				{
					if(data.trim() == 'succ')
					{
						window.location.href = "my-account.php";
					}
					else if(data.trim() == 'fail2')
					{
						$('#login_error_msg').html('<img src="images/cross.png" alt=""> You haven\'t activated your account yet.');
					}
					else
					{
						$('#login_error_msg').html('<img src="images/cross.png" alt=""> Invalid login credentials. Please try again!.');
					}
				}
			});
		}
		
		function fpdata()
		{
			var femail = $('#femail').val();
			
		   	var str = {femail:femail};
			$.ajax({
				type: "post",
				url: "ajax_forgot_password.php",
				data: str,
				success: function(data) 
				{
					if(data.trim() == 'succ')
					{
						$('#fp_succ_msg').html('<img src="images/tick.png" alt=""> Reset password link has been sent to your inbox.');
						$('#fp_error_msg').html('');
					}
					else
					{
						$('#fp_error_msg').html('<img src="images/cross.png" alt=""> Email not found. Please try again!.');
						$('#fp_succ_msg').html('');
					}
				}
			});
		}
		
		function regemployeedata()
		{
			var remail = $('#remail').val();
			var rpassword = $('#rpassword').val();
			var rfname = $('#rfname').val();
			var rlname = $('#rlname').val();
			var rphone = $('#rphone').val();
			
		   	var str = {remail:remail,rpassword:rpassword,rfname:rfname,rlname:rlname,rphone:rphone};
			$.ajax({
				type: "post",
				url: "ajax_registration.php",
				data: str,
				success: function(data) 
				{
					if(data.trim() == 'succ')
					{
						//$('#myModalReg').modal('hide');
						//$("#myModalRegThanks").modal();
						window.location.href = "my-account.php";
					}
					else
					{
						$('#reg_error_msg').html('<img src="images/cross.png" alt=""> Email or Phone No. already exists. Please try with another email or phone no.!');
					}
				}
			});
		}
		</script>
        
		<!-- login popup start -->
		<div id="myModalLogin" class="modal fade" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title" style="text-align:center; color:#555555;"><strong>Login To Access Your Account</strong></h4>
					</div>
					<div class="modal-body">
						<p style="text-align:center;" id="login_error_msg"></p>
						<div class="form-group">
							<input type="text" name="login_phone" id="login_phone" class="form-control" placeholder="Enter Phone Number">
						</div>
						<div class="form-group">
							<input type="password" name="login_password" id="login_password" class="form-control" placeholder="Enter Password">
						</div>
					</div>
					<div class="modal-footer" style="text-align:center;">
						<button type="button" class="btn btn-flat btn-theme-colored mb-sm-30 border-left-theme-color-2-4px" onclick="logindata();">Login</button>
					</div>
					<div>
						<p style="text-align:center;"><a href="javascript:void(0);" onClick="open_forgot();" style="color:#555555;">Forgot Password</a></p>
						<p style="text-align:center;"><a href="javascript:void(0);" onClick="open_reg();" style="color:#555555;">Create New Account</a></p>
					</div>
				</div>
			</div>
		</div>
		<!-- login popup end -->
		
		<!-- forgot password popup start -->
		<div id="myModalforgot" class="modal fade" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title" style="text-align:center; color:#555555;"><strong>Forgot Password</strong></h4>
					</div>
					<div class="modal-body">
						<p style="text-align:center;" id="fp_error_msg"></p>
						<p style="text-align:center;" id="fp_succ_msg"></p>
						<div class="form-group">
							<input type="text" name="femail" id="femail" class="form-control" placeholder="Enter Email Address">
						</div>
					</div>
					<div class="modal-footer" style="text-align:center;">
						<button type="button" class="btn btn-flat btn-theme-colored mb-sm-30 border-left-theme-color-2-4px" onclick="fpdata();">Submit</button>
					</div>
				</div>
			</div>
		</div>
		<!-- forgot password popup end -->
		
		<!-- registration zipcode display popup start -->
		<div id="myModalReg" class="modal fade" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title" style="text-align:center; color:#2196F3; text-transform:uppercase;"></h4>
					</div>
					<div class="modal-body">
						<p style="text-align:center;"><strong>We are supplying our products in the following Pincodes :</strong></p>
						<p style="text-align:center; color:#FF0000;">
						<?php
						$zip_counter = 1;
						$sql_zip = "SELECT * FROM `og_zipcode` WHERE `zipcode_status` = 'Active'";
						$exe_zip = mysql_query($sql_zip) or die(mysql_error());
						while($arr_zip = mysql_fetch_array($exe_zip))
						{
						?>
						<?php echo $arr_zip['available_zipcode'];?>
						<?php
						$zip_counter++;
						}
						?>
						</p>
					</div>
					<div class="modal-footer" style="text-align:center;">
						<button type="button" class="btn btn-flat btn-theme-colored mb-sm-30 border-left-theme-color-2-4px" onclick="open_reg_form();">Proceed To Registration</button>&nbsp;&nbsp;<button type="button" class="btn btn-flat btn-theme-colored2 mb-sm-30 border-left-theme-color-2-4px" onclick="window.location.href='index.php'">Cancel</button>
					</div>
				</div>
			</div>
		</div>
		<!-- registration zipcode display popup end -->
		
		<!-- registration popup start -->
		<div id="myModalReg2" class="modal fade" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title" style="text-align:center; color:#555555;"><strong>Create New Account</strong></h4>
					</div>
					<div class="modal-body">
						<p style="text-align:center;" id="reg_error_msg"></p>
						<div class="form-group">
							<input type="text" name="rfname" id="rfname" class="form-control" placeholder="Enter First Name *">
						</div>
						<div class="form-group">
							<input type="text" name="rlname" id="rlname" class="form-control" placeholder="Enter Last Name *">
						</div>
						<div class="form-group">
							<input type="text" name="remail" id="remail" class="form-control" placeholder="Enter Email Address *">
						</div>
						<div class="form-group">
							<input type="text" name="rphone" id="rphone" class="form-control" placeholder="Enter Phone No. *">
						</div>
						<div class="form-group">
							<input type="password" name="rpassword" id="rpassword" class="form-control" placeholder="Enter Password *">
						</div>
						<div class="form-group">
							<input type="password" name="cpassword" id="cpassword" class="form-control" placeholder="Enter Confirm Password *">
						</div>
					</div>
					<div class="modal-footer" style="text-align:center;">
						<button type="button" class="btn btn-flat btn-theme-colored mb-sm-30 border-left-theme-color-2-4px" onclick="reg_employee_validation();">Join Now</button>
					</div>
				</div>
			</div>
		</div>
		<!-- registration popup end -->
		
		<!-- registration success popup start -->
		<!--<div id="myModalRegThanks" class="modal fade" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title" style="text-align:center; color:#555555; text-transform:uppercase;"><strong>Thanks For Registration</strong></h4>
					</div>
					<div class="modal-body">
						<p style="text-align:center;">Thanks for create a new account. We have already sent a confirmation email to your inbox. Please click on the activation link to activate your account.</p>
					</div>
				</div>
			</div>
		</div>-->
		<!-- registration success popup end -->
	</body>
</html>

<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    <script type="text/javascript">
    jQuery(document).on('click', '#razor-pay-now', function (e) {
    var total = (jQuery('form#razorpay-frm-payment').find('input#amount').val() * 100);
    var merchant_order_id = jQuery('form#razorpay-frm-payment').find('input#merchant_order_id').val();
    var merchant_surl_id = jQuery('form#razorpay-frm-payment').find('input#surl').val();
    var merchant_furl_id = jQuery('form#razorpay-frm-payment').find('input#furl').val();
    var card_holder_name_id = jQuery('form#razorpay-frm-payment').find('input#billing-name').val();
    var merchant_total = total;
    var merchant_amount = jQuery('form#razorpay-frm-payment').find('input#amount').val();
    var currency_code_id = jQuery('form#razorpay-frm-payment').find('input#currency').val();
    var key_id = "rzp_live_QQ1JRZ8hSehO4z";
    var store_name = 'Prismhub';
    var store_description = 'Payment';
    var store_logo = 'http://php.webprojectdemos.com/images/logo.png';
    var email = jQuery('form#razorpay-frm-payment').find('input#billing-email').val();
    var phone = jQuery('form#razorpay-frm-payment').find('input#billing-phone').val();
    
    jQuery('.text-danger').remove();

    if(card_holder_name_id=="") {
      jQuery('input#billing-name').after('<small class="text-danger">Please enter full mame.</small>');
      return false;
    }
    if(email=="") {
      jQuery('input#billing-email').after('<small class="text-danger">Please enter valid email.</small>');
      return false;
    }
    if(phone=="") {
      jQuery('input#billing-phone').after('<small class="text-danger">Please enter valid phone.</small>');
      return false;
    }
    
    var razorpay_options = {
        key: key_id,
        amount: merchant_total,
        name: store_name,
        description: store_description,
        image: store_logo,
        netbanking: true,
        currency: currency_code_id,
        prefill: {
            name: card_holder_name_id,
            email: email,
            contact: phone
        },
        notes: {
            soolegal_order_id: merchant_order_id,
        },
        handler: function (transaction) {
            jQuery.ajax({
                url:'callback.php',
                type: 'post',
                data: {razorpay_payment_id: transaction.razorpay_payment_id, merchant_order_id: merchant_order_id, merchant_surl_id: merchant_surl_id, merchant_furl_id: merchant_furl_id, card_holder_name_id: card_holder_name_id, merchant_total: merchant_total, merchant_amount: merchant_amount, currency_code_id: currency_code_id}, 
                dataType: 'json',
                success: function (res) {
                    if(res.msg){
                        alert(res.msg);
                        return false;
                    } 
                    window.location = res.redirectURL;
                }
            });
        },
        "modal": {
            "ondismiss": function () {
                // code here
            }
        }
    };
    // obj        
    var objrzpv1 = new Razorpay(razorpay_options);
    objrzpv1.open();
        e.preventDefault();
            
    });
    </script>