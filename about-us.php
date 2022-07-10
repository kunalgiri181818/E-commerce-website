<?php require_once("header.php");?>

<?php
$fetch_content = mysql_fetch_array(mysql_query("SELECT * FROM `og_contents` WHERE `content_id` = '1'"));
$content_title = stripslashes($fetch_content['content_title']);
$content = nl2br(stripslashes($fetch_content['content']));
?>

			<!-- page template area start -->
			<div class="main-content bg-lighter">
    			<section class="inner-header parallax" style="background-image: url('images/bg/about.jpg');">
      				<div class="container">
						<div class="section-content">
							<div class="row">
								<div class="col-md-12">
									<h2 class="title text-white text-center" style="text-align:center;"><?php echo $content_title;?></h2>
								</div>
							</div>
						</div>
					</div>
				</section>
				
				<section id="about">
					<div class="container pb-20 pt-20">
						<div class="section-content">
							<div class="row mt-10">
								<div class="col-sm-12 col-md-12 mb-sm-20 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.5s">
									<div class="col-md-12">
										<p><?php echo $content;?></p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</section>
			</div>
			<!-- page template area end -->
  
<?php require_once("footer.php");?>