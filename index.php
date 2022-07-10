
<?php include_once("header.php");?>

<script language="javascript" type="text/javascript">
function pack(pack_id)
{
    var str = {pack_id:pack_id};
    $.ajax({
		type: "post",
		url: "ajax_packet_id.php",
		data: str,
		success: function(data) 
		{
		    $('#hid_packet_id').val(data);
		}
	});
}

function add_cart(product_id,packet_id)
{
	var str = {product_id:product_id,packet_id:packet_id};
	$.ajax({
		type: "post",
		url: "ajax_add_to_cart.php",
		data: str,
		success: function(data) 
		{
		    window.location.href = 'view-cart.php';
		}
	});
}
</script>

<?php
$fetch_content = mysql_fetch_array(mysql_query("SELECT * FROM `og_contents` WHERE `content_id` = '1'"));
$content_title = stripslashes($fetch_content['content_title']);
$content = stripslashes($fetch_content['content']);
?>

			<!-- page template area start -->
			<!--
			<section id="about">
				<div class="container mt-10 pb-20 pt-20">
					<div class="section-content">
						<div class="row">
							<div class="col-sm-12 col-md-12 mb-sm-20 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.5s">
								<div class="col-md-8">
									<h3 class="title mt-0 mb-10" style="color:#555555; text-align:left;">Welcome To Morning Bazar</h3>
									<?php echo $content;?>
									<p style="text-align:right;"><a class="btn btn-colored btn-theme-colored btn-lg font-14 mt-0" href="about-us.php">Read More</a></p>
								</div>
								<div class="col-md-4">
									<p><img class="" alt="" src="images/about.jpg"></p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			
			<!--banner slider-->
			
			
			<!--
			
			<section>
			    
			</section>
			
			
			
			<section id="about">
				<div class="container mt-20 pb-20 pt-20">
					<div class="section-content">
						<div class="col-md-12">
							<div class="col-md-3 col-xs-6" data-nav="false" style="background:#0D9845;">	
								<div>
									<div class="mb-0 pt-15">
										<div class="thumb" style="text-align:center;">
											<img class="" alt="" src="images/rupee.png">
										</div>
										<div class="pt-5 pb-5">
											<h4 style="text-align:center; color:#fff;">Lowest Price Guaranteed</h4>
											<p style="text-align:center; color:#fff;">Price are very reasonable</p>
										</div>	
									</div>
								</div>
							</div>
							<div class="col-md-3 col-xs-6" data-nav="false" style="background:#048036; margin-bottom:10px;">
								<div>
									<div class="mb-0 pt-15">
										<div class="thumb" style="text-align:center;">
											<img class="" alt="" src="images/safety.png">
										</div>
										<div class="pt-5 pb-5" style="text-align:center;">
											<h4 style="text-align:center; color:#fff;">Easy Returns & Refunds</h4>
											<p style="text-align:center; color:#fff;">No questions asked</p>
										</div>	
									</div>
								</div>
							</div>
							<div class="col-md-3 col-xs-6" data-nav="false" style="background:#0D9845;">
								<div>
									<div class="mb-0 pt-15">
										<div class="thumb" style="text-align:center;">
											<img class="" alt="" src="images/return.png">
										</div>
										<div class="pt-5 pb-5">
											<h4 style="text-align:center; color:#fff;">Sealed With Safety</h4>
											<p style="text-align:center; color:#fff;">Delivered safely in a sealed bag</p>
										</div>	
									</div>
								</div>
							</div>
							<div class="col-md-3 col-xs-6" data-nav="false" style="background:#5DBB63;">
								<div>
									<div class="mb-0 pt-15">
										<div class="thumb" style="text-align:center;">
											<img class="" alt="" src="images/doorstep.png">
										</div>
										<div class="pt-5 pb-5" style="text-align:center;">
											<h4 style="text-align:center; color:#fff;">Quality Check & Return</h4>
											<p style="text-align:center; color:#fff;">For instant quality check and returns</p>
										</div>	
									</div>
								</div>
							</div>
						</div>
					</div>						
				</div>
			</section>-->
			
			<section>
				<div class="container mt-0 pb-20 pt-20">
				    <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="section__title--2 text-center">
                            <h2 class="cont">Our Product Categories</h2>
                            <p class="text-center p_h">It is a long established fact that a reader will be distracted by<br> the readable content </p>
                        </div>
                    </div>
                </div>
                </div>
				   <!-- <div class="row">
    				    <div class="col-md-12">
    				        <div class="col-xs-12">
    					        <h3 class="title" style="text-align:left; margin-top: 0px;
                                margin-bottom: 0;
                                color: #fff;
                                font-size: 1em;
                                line-height: 1.5;
                                margin-right: 100px;
                                background: #ff6600;
                                padding: 15px 25px 15px 10px;
                                position: relative;
                                display: inline-block;
                                z-index: 5;
                                border-radius: 0 5px 0 0;
                                font-weight: 600;">Top Categories</h3>
    					    </div>
        				</div>
        			</div>-->
					<div class="row multi-row-clearfix">
						<div class="col-md-12">
						    <div class="owl-carousel-4col" data-nav="true" >
						<?php
						$sql_category = "SELECT * FROM `og_category` WHERE `category_status` = 'Active'";
						$exe_category = mysql_query($sql_category) or die(mysql_error());
						while($arr_category = mysql_fetch_array($exe_category))
						{
							$num_subcat = mysql_num_rows(mysql_query("SELECT * FROM `og_subcategory` WHERE `category_id` = '".$arr_category['category_id']."' AND `subcategory_status` = 'Active'"));
							?>	
								<div class="item" >
									<div class="mb-30">
										<?php if($num_subcat>0) { ?>
											<a href="subcategory.php?category_id=<?php echo $arr_category['category_id'];?>">
											<?php } else { ?>
											<a href="product-list.php?category_id=<?php echo $arr_category['category_id'];?>">
											<?php } ?>
											<div class="thumb" style="border:1px solid #DEDEDE;">
											<img class="" alt="" src="uploads/category/<?php echo $arr_category['category_photo'];?>">
										</div></a>
										<div class="pt-5 pb-5" style="text-align:center; background-color:#DEDEDE;">
											<h4 class="" style="color:#555555;">
											<?php if($num_subcat>0) { ?>
											<a href="subcategory.php?category_id=<?php echo $arr_category['category_id'];?>" style="color:black;">
											<?php } else { ?>
											<a href="product-list.php?category_id=<?php echo $arr_category['category_id'];?>" style="color:black;">
											<?php } ?>
											<?php echo stripslashes($arr_category['category_name']);?></a></h4>
										</div>	
									</div>
								</div>
								<?php
							}
							?>
							</div>
						</div>
					</div>
				</div>
			</section>
			
			<section>
			    
				<div class="container mt-0 pb-20 pt-20">
				    <!--<div class="row">
    				    <div class="col-md-12">
    				        <div class="col-xs-12">
    					        <h3 class="title" style="text-align:left; margin-top: 0px;
                                margin-bottom: 0;
                                color: #fff;
                                font-size: 1em;
                                line-height: 1.5;
                                margin-right: 100px;
                                background: #ff6600;
                                padding: 15px 25px 15px 10px;
                                position: relative;
                                display: inline-block;
                                z-index: 5;
                                border-radius: 0 5px 0 0;
                                font-weight: 600;">Fresh Fish & Chicken</h3>
    					    </div>
        				</div>
        			</div>-->
        			<div class="container" style="margin-top: -40px">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="section__title--2 text-center">
                            <h2 class="cont">Our Products</h2>
                            <p class="text-center p_h">It is a long established fact that a reader will be distracted by<br> the readable content </p>
                        </div>
                    </div>
                </div>
					<div class="row multi-row-clearfix">
						<div class="col-md-12">
						    <div class="owl-carousel-4col" data-nav="true">
						<?php
						$sql_product = "SELECT * FROM `og_products` WHERE `category_id` IN('4','5') AND `product_status` = 'Active'";
						$exe_product = mysql_query($sql_product) or die(mysql_error());
						while($arr_product = mysql_fetch_array($exe_product))
						{
							$get_min_price = mysql_fetch_array(mysql_query("SELECT MIN(`price`) AS `m_price`,`packet_size` FROM `og_product_packets` WHERE `product_id` = '".$arr_product['product_id']."'"));
							?>	
								<div class="item">
									<div class="mb-30">
										<a href="#"><div class="thumb" style="border:1px solid #DEDEDE;">
											<img class="img-fullwidth" alt="" src="uploads/product/<?php echo $arr_product['product_photo'];?>">
										</div></a>
										<div class="pt-5 pb-5" style="text-align:center; background-color:#DEDEDE;">
											<h4 class="" style="color:#333333; margin-bottom:0;"><a href="#" style="color:black;"><?php echo stripslashes($arr_product['product_name_english']);?></a><input type="hidden" name="product_id" id="product_id" value="<?php echo $arr_product['product_id'];?>" /></h4>
												<div style="text-align:center; color:#ff0000; font-weight:bold;">Rs.<?php echo $get_min_price['m_price'];?>(<?php echo $get_min_price['packet_size'];?>)</div>
												<p style="margin-bottom:0;"><select name="packet_id" id="packet_id" onchange="pack(this.value);");>
												<option value="">Select Packet Size</option>
											<?php
											$sql_product_price = "SELECT * FROM `og_product_packets` WHERE `product_id` = '".$arr_product['product_id']."'";
											$exe_product_price = mysql_query($sql_product_price) or die(mysql_error());
											while($arr_product_price = mysql_fetch_array($exe_product_price))
											{
												?>
												<option value="<?php echo $arr_product_price['packet_id'];?>"><?php echo $arr_product_price['packet_size'];?>&nbsp;&nbsp;Rs.<?php echo $arr_product_price['price'];?></option>
												<?php
											}
											?>
											</select>
											</p>
											<input type="hidden" name="hid_packet_id" id="hid_packet_id" value="">
											<p style="text-align:center;"><button type="button" class="btn btn-flat btn-theme-colored mt-10 mb-sm-30 border-left-theme-color-2-4px" onclick="add_cart('<?php echo $arr_product['product_id'];?>','1');">Add To Basket</button></p>
										</div>	
									</div>
								</div>
								<?php
							}
							?>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!--
			<section>
				<div class="container mt-0 pb-20 pt-20">
				    <div class="row">
    				    <div class="col-md-12">
    				        <div class="col-xs-12">
    					        <h3 class="title" style="text-align:left; margin-top: 0px;
                                margin-bottom: 0;
                                color: #fff;
                                font-size: 1em;
                                line-height: 1.5;
                                margin-right: 100px;
                                background: #ff6600;
                                padding: 15px 25px 15px 10px;
                                position: relative;
                                display: inline-block;
                                z-index: 5;
                                border-radius: 0 5px 0 0;
                                font-weight: 600;">Featured Brands</h3>
    					    </div>
        				</div>
        			</div>
					<div class="row multi-row-clearfix">
						<div class="col-md-12">
						    <div class="owl-carousel-4col" data-nav="true">
						<?php
						$sql_brand = "SELECT * FROM `og_brands` WHERE `brand_status` = 'Active'";
						$exe_brand = mysql_query($sql_brand) or die(mysql_error());
						while($arr_brand = mysql_fetch_array($exe_brand))
						{
							?>	
								<div class="item">
									<div class="mb-30">
										<a href="#">
											<div class="thumb" style="border:1px solid #fcd8a4;">
											<img class="" alt="" src="uploads/brand/<?php echo $arr_brand['brand_image'];?>">
										</div></a>
									</div>
								</div>
								<?php
							}
							?>
							</div>
						</div>
					</div>
				</div>
			</section>
			-->
			
			<!-- Start Product Area 
        <section style="background-image:url(images/hero2.png);">
            <div class="container">
                    <div class="col-xs-6">
                        <p class=" ab">About us</p>
                        <p class="abou">freeze-drying foods</p>
                        <p class="ab_p">
                            The fruit Frutastic offers is immediately freeze-dried after harvesting, so up to 98% of the vitamins, minerals and other nutrients are saved. These crispy fruit pieces are the ideal healthy snack but can also be used for other applications such as ice cream, dessert, muesli, pastries or cocktails. They are also rich in fiber and are the equivalent of 4 to 10 times fresh fruit (depending on the moisture content of the fruit).
                        </p>
                        <button class="btn btn-danger c_bu">READ MORE</button>
                    </div>
                    <div class="col-xs-6">
                        <div class="fl_l">
                            <img src="images/fruit.png" class="im_1">
                        </div>
                    </div>
                </div>
            </div>
        </section>


        our products-->
			
			
			
			
			<section id="about" style="background-image:url(images/hero2.png);">
				<div class="container mt-10 ">
					<div class="section-content">
						<div class="row">
							<div class="col-sm-12 col-md-12 mb-sm-20 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.5s">
                                <div class="col-sm-6">
                                    <p class=" ab">About us</p>
                                    <p class="abou"><?php echo $content_title;?></p>
                                    <p class="ab_p">
                                        <?php echo $content;?>
                                    </p>
                                    <button class="btn btn-danger c_bu">READ MORE</button>
                                </div>
                                <div class="col-sm-6">
                                    <img src="images/fruit.png" class="im_1">
                                </div>
						    </div>
					    </div>
				    </div>
				</div>
			</section>
			
			
			<section>
			    
			    
			    <!--our products-->

                <section style="background-image:url(images/get.jpg);" class="backg" >
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-12" style="margin-top:20px; margin-bottom: 30px">
                                <div class="section__title--2 text-center">
                                    <h2 class="cont">Our Product is</h2>
                                </div>
                            </div>
                        </div>
                        
                        <!-- mobile version section for our product is -->
                        
                        <div class="hd_n">
                            <div class=" wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.5s">
                                <div>
                                    <img src="images/prod.png" alt="product details" >
                                </div>
                            </div>
                        
                        
                        
                        </div>
                        
                        <!-- end mobile version section for our product is -->
                        
                        <div class="row hd_m">
                            <div class="col-sm-12 col-md-12 mb-sm-20 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.5s">
                                <div class="col-md-2"></div>
                                <div class="col-md-2">
                                    <div style="float:left;">
                                        <div class="w25">
                                            <img src="images/icons/1.png">
                                        </div>
                                        <div class="w75">
                                            <p class="wt">Natural</p>
                                        </div>
                                    </div>
                                    <div style="float:left; padding-top: 20px;">
                                        <div class="w25">
                                            <img src="images/icons/2.png">
                                        </div>
                                        <div class="w75">
                                            <p class="wt1" >Low<br>calories</p>
                                        </div>
                                    </div>
                                    <div style="float:left; padding-top: 20px;">
                                        <div class="w25">
                                            <img src="images/icons/3.png" style="height: 50px; float: right;">
                                        </div>
                                        <div class="w75">
                                            <p class="wt" style="padding-left: 30px !important">lactose<br>free</p>
                                        </div>
                                    </div>
                                    <div style="float:left; padding-top: 20px;">
                                        <div class="w25">
                                            <img src="images/icons/4.png">
                                        </div>
                                        <div class="w75">
                                            <p class="wt" style="padding-left: 23px !important">Healthy</p>
                                        </div>
                                    </div>
                                    <div style="float:left; padding-top: 20px;">
                                        <div class="w25">
                                            <img src="images/icons/5.png">
                                        </div>
                                        <div class="w75">
                                            <p class="wt">Vegan</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <img src="images/poster1.png" style="padding-bottom: 20px !important; ">
                                </div>
                                <div class="col-md-2">
                                    <div style="float:left;">
                                        <div class="w75">
                                            <p class="wt21">No added<br>sugars</p>
                                        </div>
                                        <div class="w25">
                                            <img src="images/icons/6.png">
                                        </div>
                                        
                                    </div>
                                    <div style="float:left; padding-top: 20px;">
                                        <div class="w75">
                                            <p class="wt2">100% Fruit</p>
                                        </div>
                                        <div class="w25">
                                            <img src="images/icons/7.png">
                                        </div>
                                        
                                    </div>
                                    <div style="float:left; padding-top: 20px;">
                                        <div class="w75">
                                            <p class="wt2">kosher</p>
                                        </div>
                                        <div class="w25">
                                            <img src="images/icons/8.png" style="height: 50px; float: right;">
                                        </div>
                                        
                                    </div>
                                    <div style="float:left; padding-top: 20px;">
                                        <div class="w75">
                                            <p class="wt2">High in<br>Fibres</p>
                                        </div>
                                        <div class="w25">
                                            <img src="images/icons/9.png">
                                        </div>
                                        
                                    </div>
                                    <div style="float:left; padding-top: 20px;">
                                        <div class="w75">
                                            <p class="wt2">Low in GI</p>
                                        </div>
                                        <div class="w25">
                                            <img src="images/icons/10.png">
                                        </div>
                                        
                                    </div>
                                </div>
                                </div>
                            <div class="col-md-2"></div>
        
                            
                        </div>
                    </div>
                </section>
			    
			    
			    
			    
			</section>
			
			
			<!--
			
					
			<section>
				<div class="container mt-0 pb-20 pt-20">
					<h3 class="title" style="text-align:left; margin-top: 0px;
                                margin-bottom: 0;
                                color: #fff;
                                text-transform: uppercase;
                                font-size: 1em;
                                line-height: 1.5;
                                margin-right: 100px;
                                background: #ff6600;
                                padding: 15px 25px 15px 10px;
                                position: relative;
                                display: inline-block;
                                z-index: 5;
                                border-radius: 0 5px 0 0;
                                font-weight: 600;">Latest Offers</h3>
					<div class="row multi-row-clearfix">
						<div class="col-md-12">
						<div class="owl-carousel-4col" data-nav="true">
						<?php
						$sql_offer = "SELECT * FROM `og_offers` WHERE `offer_status` = 'Active'";
						$exe_offer = mysql_query($sql_offer) or die(mysql_error());
						while($arr_offer = mysql_fetch_array($exe_offer))
						{
							?>	
							<div class="item">
								<div class="mb-30">
									<a href="#"><div class="thumb" style="border:1px solid #fcd8a4;">
										<img class="img-fullwidth" alt="" src="uploads/offer/<?php echo $arr_offer['offer_image'];?>">
									</div></a>										
								</div>
							</div>
							<?php
						}
						?>
							</div>
						</div>
					</div>
				</div>
			</section>
			
			
			
			
			<div>&nbsp;</div>
			
			<section>
				<div class="container pt-20 pb-20">
					<div class="section-content">
						<div class="col-xs-12 pr-0 col-sm-6 col-md-6 mb-20">
							<div class="maxwidth400" style="background-color:#98bf67;">
								<div class="row">
									<div class="col-md-6">
										<div class="thumb">
											<img class="img-fullwidth mb-sm-0" src="images/cde.jpg" alt="">
										</div>
									</div>
									<div class="col-md-6 p-0 pl-sm-50">
										<h4 class="mt-0 mb-5 mt-10"><a href="#" class="text-white" style="text-transform:uppercase;">Delivery Schedule</a></h4>
										<p class="mb-0 font-14 text-white mr-5 pr-20" style="text-align:left;">
										<?php
										$slot_counter = 1;
										$sql_slot = "SELECT * FROM `og_delivery_slot` WHERE `slot_status` = 'Active' ORDER BY `slot_id` ASC";
										$exe_slot = mysql_query($sql_slot) or die(mysql_error());
										while($arr_slot = mysql_fetch_array($exe_slot))
										{
										    echo '<b>'.$arr_slot['slot_name'].'</b><br>'.$arr_slot['slot_time'].'<br>';
                                            $slot_counter++;
                                        }
                                        ?>
                                        <br><font color="#ff0000">No Express Delivery Available</font>
                                        </p>
									</div>
								</div>
							</div>
						</div>
						<div class="col-xs-12 pr-0 col-sm-6 col-md-6 mb-20">
							<div class="maxwidth400" style="background-color:#ffae00;">
								<div class="row">
									<div class="col-md-6">
										<div class="thumb">
											<img class="img-fullwidth mb-sm-0" src="images/def.png" alt="">
										</div>
									</div>
									<div class="col-md-6 p-0 pl-sm-50">
										<h4 class="mt-0 mb-5 mt-10"><a href="#" class="text-white" style="text-transform:uppercase;">Refer Friends</a></h4>
										<p class="mb-0 font-14 text-white mr-5 pr-20" style="text-align:justify;">Kinly Refer this Website and Android Application to your friends and get Rs.100 Cashback. You will get Cashback when your referred friends order our products of Rs.500 or above.</p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			
			
			
			
			<section class="divider parallax overlay-theme-colored-7" data-parallax-ratio="0.7">
      			<div class="container">
        			<div class="row">
						<img class="img-fullwidth" alt="" src="images/grocery.png">
        			</div>
      			</div>
    		</section>
			
			<section class="divider parallax" data-background-ratio="0.5" data-bg-img="images/bg/testimonial.png">
				<div class="container pt-60 pb-60">
					<div class="row">
			  			<div class="col-md-8 col-md-offset-2">
				  			<h2 class="mt-0 pb-0 text-center text-white" style="text-align:center;">Our Happy Customers</h2>
							<div class="owl-carousel-1col" data-dots="true">
						    <?php
							$sql_comments = "SELECT * FROM `og_testimonials` WHERE `testimonial_status` = 'Active' ORDER BY `testimonial_id` DESC";
							$exe_comments = mysql_query($sql_comments) or die(mysql_error());
							while($arr_comments = mysql_fetch_array($exe_comments))
							{
    							?>
								<div class="item">
									<div class="testimonial-wrapper text-center">
										<div class="content pt-10">
											<p class="lead text-white" style="text-align:center;"><?php echo nl2br(stripslashes($arr_comments['comment']));?></p>
											<?php if($arr_comments['photo']!="") { ?>
											<p><img src="uploads/feedback/<?php echo $arr_comments['photo'];?>" alt="" width="60" height="60" style="border-radius: 50%;"></p>
											<?php } else { ?>
											<p><img src="images/no.jpg" alt="" width="60" height="60" style="border-radius: 50%;"></p>
											<?php } ?>
											<h4 class="author text-white mb-0" style="text-align:center;"><?php echo $arr_comments['name'];?></h4>
											<h6 class="title text-white mt-0 mb-15" style="text-align:center;"><i class="fa fa-phone text-white"></i> <?php echo $arr_comments['phone'];?></h6>
										</div>
									</div>
								</div>
								<?php
						    }
						    ?>
							</div>
						</div>
					</div>
				</div>
			</section> -->
			
			<!--<section>
				<div class="container mt-0 pb-20 pt-20">
				    <div class="row">
    				    <div class="col-md-12">
    				        <div class="col-xs-12">
    					        <h3 class="title" style="text-align:left; margin-top: 0px;
                                margin-bottom: 0;
                                color: #fff;
                                text-transform: uppercase;
                                font-size: 1em;
                                line-height: 1.5;
                                margin-right: 100px;
                                background: #ff6600;
                                padding: 15px 25px 15px 10px;
                                position: relative;
                                display: inline-block;
                                z-index: 5;
                                border-radius: 0 5px 0 0;
                                font-weight: 600;">Featured Brands</h3>
    					    </div>
        				</div>
        			</div>
					<div class="row multi-row-clearfix">
						<div class="col-md-12">
						    <div class="owl-carousel-3col" data-nav="true">
						<?php
						$sql_category = "SELECT * FROM `og_category` WHERE `category_status` = 'Active'";
						$exe_category = mysql_query($sql_category) or die(mysql_error());
						while($arr_category = mysql_fetch_array($exe_category))
						{
							?>	
								<div class="item">
									<div class="mb-30">
										<a href="product-list.php?category_id=<?php echo $arr_category['category_id'];?>"><div class="thumb" style="border:1px solid #DEDEDE;">
											<img class="" alt="" src="uploads/category/<?php echo $arr_category['category_photo'];?>" style="height:250px; display:block; margin-left:auto; margin-right:auto;">
										</div></a>
										<div class="p-10 pt-10 pb-10" style="text-align:center; background-color:#dedede;">
											<h4 class="" style="color:#555555;"><a href="product-list.php?category_id=<?php echo $arr_category['category_id'];?>" style="color:#555555;"><?php echo stripslashes($arr_category['category_name']);?></a></h4>
										</div>	
									</div>
								</div>
							
							<?php
						}
						?></div>
							</div>
						</div>
					</div>
				</div>
			</section>
			
    		<section id="about">
				<div class="why-choose-area">
					<div class="container">
						<div class="row" style="background:#fff; padding-top:25px;">
							<div class="col-md-12 mb-35">
								<h3 class="title mt-0" style="text-align:center;">Why Choose Morning Bazar</h3>
							</div>
							<div class="col-md-12 col-lg-3">
								<div class="single-choose-organic text-center mb-40">
									<div class="organic-icon">
										<img src="images/badge.png" alt="" height="50" width="50">
									</div>
									<div class="oraganic-content">
										<h4>Quality</h4>
										<p>You can trust</p>
									</div>
								</div>
								<div class="single-choose-organic text-center mb-40">
									<div class="organic-icon">
										<img src="images/clock.png" alt="" height="50" width="50">
									</div>
									<div class="oraganic-content">
										<h4>On Time Delivery</h4>
										<p>5% value back if we are late</p>
									</div>
								</div>
							</div>
							<div class="col-md-12 col-lg-6">
								<div class="organic-img img-full">
									<img src="images/shop.png" alt="">
								</div>
							</div>
							<div class="col-md-12 col-lg-3">
								<div class="single-choose-organic text-center mb-40">
									<div class="organic-icon">
										<img src="images/free.png" alt="" height="50" width="50">
									</div>
									<div class="oraganic-content">
										<h4>Free Delivery</h4>
										<p>On orders above Rs.500</p>
									</div>
								</div>
								<div class="single-choose-organic text-center mb-40">
									<div class="organic-icon">
										<img src="images/cash.png" alt="" height="50" width="50">
									</div>
									<div class="oraganic-content">
										<h4>Price</h4>
										<p>Very reasonable price</p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<div>&nbsp;</div>
			<section class="divider parallax overlay-theme-colored-7" data-parallax-ratio="0.7" style="background-color:#5dbb63;">
      			<div class="container">
        			<div class="row">
          				<div class="col-md-8 col-md-offset-2">
            				<div class="section-content text-center">
								<h3 class="title mt-0 mb-20" style="text-align:center; color:#FFFFFF;">Do you have any enquiry?</h3>
								<h4 style="text-align:center; color:#FFFFFF;">If you have any enquiry regarding our service, simply call our 24 hour emergecny number.</h4>
								<a href="contact-us.php" class="btn btn-default mt-10 btn-md"> Contact Us</a> 
							</div>
          				</div>
        			</div>
      			</div>
    		</section>
    		<section id="about">
				<div class="container pb-20 pt-20">
					<div class="row multi-row-clearfix">
						<div class="col-md-12">
							<div class="col-md-4" data-nav="false">								
								<div class="item" style="border:4px solid #01519B; margin-bottom:10px;">
									<div class="mb-20 mt-20" style="text-align:center;">
										<span>
											<img class="" alt="" src="images/accurate.png">
										</span>	
										<span style="color:#01519B; font-weight:bold;">
											ACCURATE WEIGHT
										</span>								
									</div>
								</div>
							</div>
							<div class="col-md-4" data-nav="false">								
								<div class="item" style="border:4px solid #1abc9c; margin-bottom:10px;">
									<div class="mb-20 mt-20" style="text-align:center;">
										<span>
											<img class="" alt="" src="images/sort.png">
										</span>	
										<span style="color:#1abc9c; font-weight:bold;">
											SORTED VEGETABLES
										</span>								
									</div>
								</div>
							</div>
							<div class="col-md-4" data-nav="false">								
								<div class="item" style="border:4px solid #d35400; margin-bottom:10px;">
									<div class="mb-20 mt-20" style="text-align:center;">
										<span>
											<img class="" alt="" src="images/deli.png">
										</span>	
										<span style="color:#d35400; font-weight:bold;">
											HOME DELIVERY
										</span>								
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>-->
			<!-- page template area end -->
			
			
			 <!-- Start Product Area -->
        <section style="background-image:url(images/her1.jpg);" class="backg hd_m">
            <div class="container">
                <div class="row" >
                    <div class="col-sm-12 col-md-12 mb-sm-20 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.5s">
                        <div class="col-xs-6">
                            <div class="fl_l">
                            </div>
                        </div>
    
                        <div class="col-xs-6">
                            <h2 class="cont">Contact Us</h2>
                            <p class="cont_exp">Experience the pure fruits </p>
                            <p class="cont_p">
                                It is a long established fact that a reader will be distracted by the readable content 
                            </p>
                            <button class="btn btn-danger c_bu">CONTACT US</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section style="background-image:url(images/her1.jpg);" class="backg hd_n" >
            <div class="container">
                <div class="row" >
                    <div class="col-sm-12 col-md-12 mb-sm-20 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.5s">
                        <div class="col-xs-12">
                            <h2 class="cont1">Contact Us</h2>
                            <p class="cont_exp1">Experience the pure fruits </p>
                            <p class="cont_p1">
                                It is a long established fact that a reader will be distracted by the readable content 
                            </p>
                            <button class="btn btn-danger c_bu">CONTACT US</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <!--------------------FRUTATISTRUSTED---------------------------->
        <section style="background-image:url(images/btestt.jpg);" class="backg">
            <div class="container">
                    <div class="row" style="padding-top: 0px">
                        <div class="col-xs-12">
                            <div class="section__title--2 text-center">
                                <h2 class="cont">Frutatis Trusted</h2>
                                <p class="text-center p_h">It is a long established fact that a reader will be<br> distracted by the readable content  </p>
                            </div>
                        </div>
                    </div>
                    <div style="padding-top: 20px">
                        <div class="last1">                
                        <div class="row">
                        <div class="col-md-4">
                            <img src="images/icons/a1.png" class="iconn">
                            <p class="l_d">Secure</p>
                            <p class="lastt">Packages and web page editors now<br> use Lorem Ipsum as their default model</p>
                        </div>
                        <div class="col-md-4">
                            <img src="images/icons/a2.png" class="iconn">
                            <p class="l_d">Customer Focused</p>
                            <p class="lastt">Packages and web page editors now<br> use Lorem Ipsum as their default model</p>
                        </div>
                        <div class="col-md-4">
                            <img src="images/icons/a3.png" class="iconn">
                            <p class="l_d">Well Priced</p>
                            <p class="lastt">Packages and web page editors now<br> use Lorem Ipsum as their default model</p>
                        </div>
                    </div>

                    </div>
                    


                </div>
            </div>
        </section>

        <!--ALL PRODUCT COMMENT OUT-->
			
			
			
			
			
			
			
			
			
  
<?php require_once("footer.php");?>