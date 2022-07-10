<?php require_once("header.php");?>

<?php
if(isset($_POST['send']))
{	
	$sql_update = "UPDATE `og_users` SET `fname` = '".addslashes($_POST['fname'])."',`lname` = '".addslashes($_POST['lname'])."',`email` = '".addslashes($_POST['email'])."',`phone` = '".addslashes($_POST['phone'])."',`address` = '".addslashes($_POST['address'])."',`city` = '".addslashes($_POST['city'])."',`state` = '".addslashes($_POST['state'])."',`zip` = '".addslashes($_POST['zip'])."' WHERE `user_id` = '".$_SESSION['USER_ID']."'";
	$exe_update = mysql_query($sql_update) or die(mysql_error());
	
	$_SESSION['ep_succ_msg'] = 'Profile updated successfully.';
	header("location: edit-profile.php");
	exit;
}

$getUser = mysql_fetch_array(mysql_query("SELECT * FROM `og_users` WHERE `user_id` = '".$_SESSION['USER_ID']."'"));
?>

		<script language="javascript" type="text/javascript">
		function form_validation()
		{
			if(document.getElementById('address').value == "")
			{
				alert("Please enter address");
				document.getElementById('address').focus();
				return false;
			}
			
			if(document.getElementById('state').value == "")
			{
				alert("Please enter state");
				document.getElementById('state').focus();
				return false;
			}
			
			if(document.getElementById('city').value == "")
			{
				alert("Please enter city");
				document.getElementById('city').focus();
				return false;
			}
		   
			if(document.getElementById('zip').value == "")
			{
				alert("Please enter pincode");
				document.getElementById('zip').focus();
				return false;
			}
			
			return true;
		}
		</script>

		<!-- content area start -->
		<div class="main-content bg-lighter">
			<section class="inner-header parallax" style="background-image: url('images/bg/user.jpg');">
				<div class="container">
					<div class="section-content">
						<div class="row">
							<div class="col-md-12">
								<h2 class="title text-white text-center" style="text-align:center;">Edit Profile</h2>
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
							<?php if(isset($_SESSION['ep_succ_msg'])) { ?>
							<p class="mb-20"><img src="images/tick.png" alt="" /> <?php echo $_SESSION['ep_succ_msg'];?></p>
							<?php 
							unset($_SESSION['ep_succ_msg']);
							} 
							?>	
							<form id="" action="" method="post" enctype="multipart/form-data" class="contact-form text-right" onsubmit="return form_validation();">
							<div class="row">
								<div class="col-lg-12 form-group">
									<input name="fname" id="fname" placeholder="Enter first name *" class="common-input form-control" type="text" value="<?php echo stripslashes($getUser['fname']);?>">
								</div>
								<div class="col-lg-12 form-group">
									<input name="lname" id="lname" placeholder="Enter last name *" class="common-input form-control" type="text" value="<?php echo stripslashes($getUser['lname']);?>">
								</div>
								<div class="col-lg-12 form-group">
									<input name="email" id="email" placeholder="Enter email *" class="common-input form-control" type="text" value="<?php echo stripslashes($getUser['email']);?>">
								</div>
								<div class="col-lg-12 form-group">
									<input name="phone" id="phone" placeholder="Enter phone *" class="common-input form-control" type="text" value="<?php echo stripslashes($getUser['phone']);?>">
								</div>
								<div class="col-lg-12 form-group">
									<textarea name="address" id="address" class="common-input form-control" placeholder="Enter address *"><?php echo stripslashes($getUser['address']);?></textarea>
								</div>
								<div class="col-lg-12 form-group">
									<input name="state" id="state" placeholder="Enter state *" class="common-input form-control" type="text" value="<?php echo stripslashes($getUser['state']);?>">
								</div>
								<div class="col-lg-12 form-group">
									<input name="city" id="city" placeholder="Enter city *" class="common-input form-control" type="text" value="<?php echo stripslashes($getUser['city']);?>">
								</div>
								<div class="col-lg-12 form-group">
									<input name="zip" id="zip" placeholder="Enter pincode *" class="common-input form-control" type="text" value="<?php echo stripslashes($getUser['zip']);?>">
								</div>
								<div class="col-lg-12 form-group">
									<button class="btn btn-flat btn-theme-colored mb-sm-30 border-left-theme-color-2-4px" type="submit" style="float: left;">Save</button>
								</div>
							</div>
							<input type="hidden" name="send" id="send" value="1" />
							</form>	
						</div>
					</div>
				</div>	
			</section>
		</div>
		<!-- content area end -->

<?php require_once("footer.php");?>