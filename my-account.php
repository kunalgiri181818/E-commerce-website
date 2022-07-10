<?php require_once("header.php");?>

<?php
$getUser = mysql_fetch_array(mysql_query("SELECT * FROM `og_users` WHERE `user_id` = '".$_SESSION['USER_ID']."'"));
?>

		<!-- content area start -->
		<div class="main-content bg-lighter">
			<section class="inner-header parallax" style="background-image: url('images/bg/user.jpg');">
				<div class="container">
					<div class="section-content">
						<div class="row">
							<div class="col-md-12">
								<h2 class="title text-white text-center" style="text-align:center;">My Account</h2>
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
							<form id="myForm" action="" method="post" class="contact-form text-right" onsubmit="return form_validation();">
							<div class="row">
								<p style="text-align:left;">
									<b>First Name :</b> <?php echo stripslashes($getUser['fname']);?>
								</p>
								<p style="text-align:left;">
									<b>Last Name :</b> <?php echo stripslashes($getUser['lname']);?>
								</p>
								<p style="text-align:left;">
									<b>Email :</b> <?php echo stripslashes($getUser['email']);?>
								</p>
								<p style="text-align:left;">
									<b>Phone No :</b> <?php echo stripslashes($getUser['phone']);?>
								</p>
								<p style="text-align:left;">
									<b>Address :</b> <?php echo nl2br(stripslashes($getUser['address']));?>
								</p>
								<p style="text-align:left;">
									<b>City :</b> <?php echo stripslashes($getUser['city']);?>
								</p>
								<p style="text-align:left;">
									<b>State :</b> <?php echo stripslashes($getUser['state']);?>
								</p>
								<p style="text-align:left;">
									<b>Pincode :</b> <?php echo stripslashes($getUser['zip']);?>
								</p>
							</div>
							</form>	
						</div>
					</div>
				</div>	
			</section>
		</div>
		<!-- content area end -->

<?php require_once("footer.php");?>