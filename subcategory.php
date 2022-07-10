<?php require_once("header.php");?>

<?php
$fetch_category = mysql_fetch_array(mysql_query("SELECT * FROM `og_category` WHERE `category_id` = '".$_REQUEST['category_id']."'"));
?>

			<!-- page template area start -->
			<div class="main-content bg-lighter">
    			<section class="inner-header parallax" style="background-image: url('images/bg/category.jpg');">
      				<div class="container">
						<div class="section-content">
							<div class="row">
								<div class="col-md-12">
									<h2 class="title text-white text-center" style="text-align:center;"><?php echo stripslashes($fetch_category['category_name']);?></h2>
								</div>
							</div>
						</div>
					</div>
				</section>
				
				<section id="about">
					<div class="container pb-20 pt-20">
						<div class="row multi-row-clearfix">
							<div class="col-md-12">
							<?php
							$sql_category = "SELECT * FROM `og_subcategory` WHERE `category_id` = '".$_REQUEST['category_id']."' AND `subcategory_status` = 'Active'";
							$exe_category = mysql_query($sql_category) or die(mysql_error());
							while($arr_category = mysql_fetch_array($exe_category))
							{
								?>	
								<div class="col-md-3 col-xs-6" data-nav="false">								
									<div class="item">
										<div class="mb-30">
											<a href="product-list.php?subcategory_id=<?php echo $arr_category['subcategory_id'];?>&category_id=<?php echo $_REQUEST['category_id'];?>"><div class="thumb" style="border:1px solid #fcd8a4;">
												<img class="img-fullwidth" alt="" src="uploads/subcategory/<?php echo $arr_category['subcategory_photo'];?>">
											</div></a>
											<div class="pt-5 pb-5" style="text-align:center; background-color:#fcd8a4;">
												<h4 class="" style="color:#333333;"><a href="product-list.php?subcategory_id=<?php echo $arr_category['subcategory_id'];?>&category_id=<?php echo $_REQUEST['category_id'];?>" style="color:#333333;"><?php echo stripslashes($arr_category['subcategory_name']);?></a></h4>
											</div>	
										</div>
									</div>
								</div>
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