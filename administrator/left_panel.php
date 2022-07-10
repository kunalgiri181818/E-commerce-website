<?php
$current_page = basename($_SERVER['PHP_SELF']);
?>
<div class="header">
	<a class="logo" href="#"><img src="img/logo.png" alt="" title=""/ style="width: 10%"></a>
	<ul class="header_menu">
		<li class="list_icon"><a href="#">&nbsp;</a></li>
	</ul>    
</div>
<div class="menu">                
	<div class="breadLine">            
		<div class="arrow"></div>
		<div class="adminControl active">
			Hi, Administrator
		</div>
	</div>
	<div class="admin">
		<ul class="control">                
			<li><span class="icon-share-alt"></span> <a href="logout.php">Logout</a></li>
		</ul>
	</div>
	<ul class="navigation">
	    <li <?php if($current_page == 'dashboard.php') { ?>class = "active"<?php } ?>>
			<a href="dashboard.php">
				<span class="isw-documents"></span><span class="text">Dashboard</span>
			</a>
		</li> 
		<li <?php if($current_page == 'site_settings.php') { ?>class = "active"<?php } ?>>
			<a href="site_settings.php">
				<span class="isw-documents"></span><span class="text">Site Settings</span>
			</a>
		</li> 
		<li <?php if($current_page == 'change_password.php') { ?>class = "active"<?php } ?>>
			<a href="change_password.php">
				<span class="isw-archive"></span><span class="text">Change Password</span>                 
			</a>
		</li>
		<li class="openable <?php if($current_page == 'add_edit_zip.php' || $current_page == 'zip_list.php') { ?>active<?php } ?>">
			<a href="#">
				<span class="isw-list"></span><span class="text">Zipcode Management</span>
			</a>
			<ul>
				<li <?php if($current_page == 'add_edit_zip.php') { ?>class = "active"<?php } ?>>
					<a href="add_edit_zip.php">
						<span class="icon-pencil"></span><span class="text">Add Zipcode</span>
					</a>
				</li>                                                                                          
				<li <?php if($current_page == 'zip_list.php') { ?>class = "active"<?php } ?>>
					<a href="zip_list.php">
						<span class="icon-list"></span><span class="text">Zipcode List</span>
					</a>     
			   </li>
			</ul>                                
		</li>
		<li class="openable <?php if($current_page == 'add_edit_banner.php' || $current_page == 'banner_list.php') { ?>active<?php } ?>">
			<a href="#">
				<span class="isw-list"></span><span class="text">Home Banner Management</span>
			</a>
			<ul>
				<li <?php if($current_page == 'add_edit_banner.php') { ?>class = "active"<?php } ?>>
					<a href="add_edit_banner.php">
						<span class="icon-pencil"></span><span class="text">Add Banner</span>
					</a>
				</li>                                                                                          
				<li <?php if($current_page == 'banner_list.php') { ?>class = "active"<?php } ?>>
					<a href="banner_list.php">
						<span class="icon-list"></span><span class="text">Banner List</span>
					</a>     
			   </li>
			</ul>                                
		</li>
		<li class="openable <?php if($current_page == 'add_edit_offer.php' || $current_page == 'offer_list.php') { ?>active<?php } ?>">
			<a href="#">
				<span class="isw-list"></span><span class="text">Offer Management</span>
			</a>
			<ul>
				<li <?php if($current_page == 'add_edit_offer.php') { ?>class = "active"<?php } ?>>
					<a href="add_edit_offer.php">
						<span class="icon-pencil"></span><span class="text">Add Offer</span>
					</a>
				</li>                                                                                          
				<li <?php if($current_page == 'offer_list.php') { ?>class = "active"<?php } ?>>
					<a href="offer_list.php">
						<span class="icon-list"></span><span class="text">Offer List</span>
					</a>     
			   </li>
			</ul>                                
		</li>
		<li <?php if($current_page == 'edit_about.php') { ?>class = "active"<?php } ?>>
			<a href="edit_about.php">
				<span class="isw-documents"></span><span class="text">About Us</span>
			</a>
		</li>
		<li <?php if($current_page == 'edit_terms.php') { ?>class = "active"<?php } ?>>
			<a href="edit_terms.php">
				<span class="isw-documents"></span><span class="text">Terms & Conditions</span>
			</a>
		</li>
		<li <?php if($current_page == 'edit_privacy.php') { ?>class = "active"<?php } ?>>
			<a href="edit_privacy.php">
				<span class="isw-documents"></span><span class="text">Privacy Policy</span>
			</a>
		</li>
		<li <?php if($current_page == 'edit_cancel.php') { ?>class = "active"<?php } ?>>
			<a href="edit_cancel.php">
				<span class="isw-documents"></span><span class="text">Order Cancellation</span>
			</a>
		</li>
		<li <?php if($current_page == 'edit_return.php') { ?>class = "active"<?php } ?>>
			<a href="edit_return.php">
				<span class="isw-documents"></span><span class="text">Return & Refund</span>
			</a>
		</li>
		<li <?php if($current_page == 'why_choose_us.php') { ?>class = "active"<?php } ?>>
			<a href="why_choose_us.php">
				<span class="isw-documents"></span><span class="text">Why Choose Us</span>
			</a>
		</li>
		<li class="openable <?php if($current_page == 'add_edit_category.php' || $current_page == 'category_list.php' || $current_page == 'add_edit_subcategory.php' || $current_page == 'subcategory_list.php') { ?>active<?php } ?>">
			<a href="#">
				<span class="isw-list"></span><span class="text">Category Management</span>
			</a>
			<ul>
				<li <?php if($current_page == 'add_edit_category.php') { ?>class = "active"<?php } ?>>
					<a href="add_edit_category.php">
						<span class="icon-pencil"></span><span class="text">Add Category</span>
					</a>
				</li>                                                                                          
				<li <?php if($current_page == 'category_list.php') { ?>class = "active"<?php } ?>>
					<a href="category_list.php">
						<span class="icon-list"></span><span class="text">Category List</span>
					</a>     
			   </li>
			</ul>                                
		</li>
		<li class="openable <?php if($current_page == 'add_edit_product.php' || $current_page == 'product_list.php' || $current_page == 'add_edit_packet.php' || $current_page == 'packet_list.php') { ?>active<?php } ?>">
			<a href="#">
				<span class="isw-list"></span><span class="text">Product Management</span>
			</a>
			<ul>
				<li <?php if($current_page == 'add_edit_product.php') { ?>class = "active"<?php } ?>>
					<a href="add_edit_product.php">
						<span class="icon-pencil"></span><span class="text">Add Product</span>
					</a>
				</li>                                                                                          
				<li <?php if($current_page == 'product_list.php') { ?>class = "active"<?php } ?>>
					<a href="product_list.php">
						<span class="icon-list"></span><span class="text">Product List</span>
					</a>     
			   </li>
			</ul>                                
		</li>
		<li class="openable <?php if($current_page == 'add_edit_schedule.php' || $current_page == 'schedule_list.php') { ?>active<?php } ?>">
			<a href="#">
				<span class="isw-list"></span><span class="text">Delivery Schedule Management</span>
			</a>
			<ul>
				<li <?php if($current_page == 'add_edit_schedule.php') { ?>class = "active"<?php } ?>>
					<a href="add_edit_schedule.php">
						<span class="icon-pencil"></span><span class="text">Add Delivery Schedule</span>
					</a>
				</li>                                                                                          
				<li <?php if($current_page == 'schedule_list.php') { ?>class = "active"<?php } ?>>
					<a href="schedule_list.php">
						<span class="icon-list"></span><span class="text">Delivery Schedule List</span>
					</a>     
			   </li>
			</ul>                                
		</li>
		<li <?php if($current_page == 'order_list.php' || $current_page == 'order_details.php' || $current_page == 'suggestion.php' || $current_page == 'cancel_request.php') { ?>class = "active"<?php } ?>>
			<a href="order_list.php">
				<span class="isw-list"></span><span class="text">Order List</span>                 
			</a>
		</li>
		<li <?php if($current_page == 'user_list.php' || $current_page == 'send_email_all.php' || $current_page == 'send_email_individual.php') { ?>class = "active"<?php } ?>>
			<a href="user_list.php">
				<span class="isw-list"></span><span class="text">User List</span>                 
			</a>
		</li>
		<li <?php if($current_page == 'enquiry_list.php') { ?>class = "active"<?php } ?>>
			<a href="enquiry_list.php">
				<span class="isw-list"></span><span class="text">Enquiry List</span>                 
			</a>
		</li>
	</ul>
</div>
