<?php require_once("header.php");?>

<?php
$arrSuggestion = mysql_fetch_array(mysql_query("SELECT * FROM `og_suggestions` WHERE `order_id` = '".$_REQUEST['orderid']."'"));
?>

		<!-- content area start -->
		<div class="main-content bg-lighter">
			<section class="inner-header parallax" style="background-image: url('images/bg/user.jpg');">
				<div class="container">
					<div class="section-content">
						<div class="row">
							<div class="col-md-12">
								<h2 class="title text-white text-center" style="text-align:center;">View Comment</h2>
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
								<p><?php echo nl2br(stripslashes($arrSuggestion['comment']));?></p>
								<p><strong><?php echo date('F d, Y',strtotime($arrSuggestion['post_date']));?></strong></p>
								<p><button type="button" class="btn btn-flat btn-theme-colored mb-sm-30 border-left-theme-color-2-4px" onclick="window.location.href='my-orders.php'">Back</button></p>
							</div>
						</div>
					</div>
				</div>	
			</section>
		</div>
		<!-- content area end -->

<?php require_once("footer.php");?>