<?php require_once("header.php");?>

			<!-- page template area start -->
			<div class="main-content bg-lighter">
    			<section class="inner-header parallax" style="background-image: url('images/bg/about.jpg');">
      				<div class="container">
						<div class="section-content">
							<div class="row">
								<div class="col-md-12">
									<h2 class="title text-white text-center" style="text-align:center;">Reviews</h2>
								</div>
							</div>
						</div>
					</div>
				</section>
	
				<section id="about">
					<div class="container pb-20 pt-20">
						<div class="section-content">
							<div class="row mt-10">
							<?php
							$sql_comments = "SELECT * FROM `og_testimonials` WHERE `testimonial_status` = 'Active' ORDER BY `testimonial_id` DESC";
							$exe_comments = mysql_query($sql_comments) or die(mysql_error());
							while($arr_comments = mysql_fetch_array($exe_comments))
							{
							?>
								<div class="col-sm-12 col-md-12 mb-sm-20 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.5s" style="border:1px solid #dedede; background-color:#eaeaea;">
									<p style="padding-top:5px;"><?php echo nl2br(stripslashes($arr_comments['comment']));?></p>
									<div class="col-sm-12 col-md-12" style="padding-bottom:5px;">
										<div class="col-sm-12 col-md-1">
											<?php if($arr_comments['photo']!="") { ?>
											<img src="uploads/feedback/<?php echo $arr_comments['photo'];?>" alt="" width="60" height="60" style="border-radius: 50%;">
											<?php } else { ?>
											<img src="images/no.jpg" alt="" width="60" height="60" style="border-radius: 50%;">
											<?php } ?>
										</div>
										<div class="col-sm-12 col-md-11">
											<b><?php echo $arr_comments['name'];?></b><br /><b><font color="#632A00"><i class="fa fa-phone"></i> <b><?php echo $arr_comments['phone'];?></b></font></b>
										</div>
									</div>
								</div>
								<div style="clear:both;">&nbsp;</div>
							<?php
							}
							?>
							</div>
						</div>
					</div>					
				</section>
			</div>
			<!-- page template area end -->
			
<?php require_once("footer.php");?>