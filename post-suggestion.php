<?php require_once("header.php");?>

<?php
if(isset($_POST['send']))
{	
	$sql_update = "INSERT INTO `og_suggestions` SET `user_id` = '".$_SESSION['USER_ID']."',`order_id` = '".$_REQUEST['orderid']."',`comment` = '".addslashes($_POST['comment'])."',`post_date` = '".date('Y-m-d H:i:s',time())."'";
	$exe_update = mysql_query($sql_update) or die(mysql_error());
	
	$_SESSION['pp_succ_msg'] = 'Comment posted successfully.';
	header("location: post-suggestion.php");
	exit;
}
?>

		<script language="javascript" type="text/javascript">
		function form_validation()
		{
			if(document.getElementById('comment').value == "")
			{
				alert("Please enter comment");
				document.getElementById('comment').focus();
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
								<h2 class="title text-white text-center" style="text-align:center;">Post Comment</h2>
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
							<div class="row">
							<?php if(isset($_SESSION['pp_succ_msg'])) { ?>
							<p class="mb-20"><img src="images/tick.png" alt="" /> <?php echo $_SESSION['pp_succ_msg'];?></p>
							<?php 
							unset($_SESSION['pp_succ_msg']);
							} 
							?>	
							<form id="" action="" method="post" enctype="multipart/form-data" class="contact-form text-right" onsubmit="return form_validation();">
							<div class="row">
								<div class="col-lg-12 form-group">
									<textarea name="comment" id="comment" class="common-input form-control" placeholder="Enter comment *"></textarea>
								</div>
								<div class="col-lg-12 form-group" style="text-align:left;">
									<button class="btn btn-flat btn-theme-colored mb-sm-30 border-left-theme-color-2-4px" type="submit">Submit</button>&nbsp;&nbsp;<button class="btn btn-flat btn-theme-colored2 mb-sm-30 border-left-theme-color-2-4px" type="button" onclick="window.location.href='my-orders.php'">Back</button>
								</div>
							</div>
							<input type="hidden" name="send" id="send" value="1" />
							</form>	
							</div>
						</div>
					</div>
				</div>	
			</section>
		</div>
		<!-- content area end -->

<?php require_once("footer.php");?>