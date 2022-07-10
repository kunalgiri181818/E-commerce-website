<?php require_once("header.php");?>

<?php
if(isset($_POST['send']))
{	
	$sql_check = "SELECT * FROM `og_users` WHERE `password` = '".md5($_POST['old_password'])."' AND `user_id` = '".$_SESSION['USER_ID']."'";
	$exe_check = mysql_query($sql_check) or die(mysql_error());
	$num_check = mysql_num_rows($exe_check);
	if($num_check>0)
	{
		$sql_update = "UPDATE `og_users` SET `password` = '".md5($_POST['confirm_password'])."',`original_password` = '".$_POST['confirm_password']."' WHERE `user_id` = '".$_SESSION['USER_ID']."'";
		$exe_update = mysql_query($sql_update) or die(mysql_error());
		
		$_SESSION['cp_succ_msg'] = 'Password changed successfully.';
		header("location: change-password.php");
		exit;
	}
	else
	{
		$_SESSION['cp_fail_msg'] = 'Old password not found in database.';
		header("location: change-password.php");
		exit;
	}
}
?>

		<script language="javascript" type="text/javascript">
		function form_validation()
		{
			if(document.getElementById('old_password').value == "")
			{
				alert("Please enter old password");
				document.getElementById('old_password').focus();
				return false;
			}
			
			if(document.getElementById('new_password').value == "")
			{
				alert("Please enter new password");
				document.getElementById('new_password').focus();
				return false;
			}
		   
			if(document.getElementById('confirm_password').value == "")
			{
				alert("Please enter confirm password");
				document.getElementById('confirm_password').focus();
				return false;
			}

			if(document.getElementById('confirm_password').value != document.getElementById('new_password').value)
			{
				alert("New password and confirm password should be same");
				document.getElementById('confirm_password').focus();
				return false;
			}
		}
		</script>

		<!-- content area start -->
		<div class="main-content bg-lighter">
			<section class="inner-header parallax" style="background-image: url('images/bg/user.jpg');">
				<div class="container">
					<div class="section-content">
						<div class="row">
							<div class="col-md-12">
								<h2 class="title text-white text-center" style="text-align:center;">Change Password</h2>
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
							<?php if(isset($_SESSION['cp_succ_msg'])) { ?>
							<p class="mb-20"><img src="images/tick.png" alt="" /> <?php echo $_SESSION['cp_succ_msg'];?></p>
							<?php 
							unset($_SESSION['cp_succ_msg']);
							} 
							?>	
							<?php if(isset($_SESSION['cp_fail_msg'])) { ?>
							<p class="mb-20"><img src="images/cross.png" alt="" /> <?php echo $_SESSION['cp_fail_msg'];?></p>
							<?php 
							unset($_SESSION['cp_fail_msg']);
							} 
							?>
							<form id="" action="" method="post" class="contact-form text-right" onsubmit="return form_validation();">
							<div class="row">
								<div class="col-lg-12 form-group">
									<input name="old_password" id="old_password" placeholder="Enter old password *" class="common-input form-control" type="password">
								</div>
								<div class="col-lg-12 form-group">
									<input name="new_password" id="new_password" placeholder="Enter new password *" class="common-input form-control" type="password">
								</div>
								<div class="col-lg-12 form-group">
									<input name="confirm_password" id="confirm_password" placeholder="Enter confirm password *" class="common-input form-control" type="password">
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