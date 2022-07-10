<style>
    .menuzord .menuzord-menu > li.active > a, .menuzord .menuzord-menu > li:hover > a, .menuzord .menuzord-menu ul.dropdown li:hover > a{
        background: #febd59 none repeat scroll 0 0 !important;
        .parallax{
        height: 40% !important;
    }
    }
</style>

<?php
ob_start();
session_start();
$current_page = basename($_SERVER['PHP_SELF']);

date_default_timezone_set('Asia/Kolkata');

require_once("config.php");
require_once("meta.php");

$session_id = session_id();

//FETCH SITE SETTINGS
$fetch_settings = mysql_fetch_array(mysql_query("SELECT * FROM `og_administrator` WHERE `admin_id` = '1'"));
$company_name = stripslashes($fetch_settings['company_name']);
$contact_address = stripslashes($fetch_settings['contact_address']);
$contact_email = $fetch_settings['contact_email'];
$contact_no1 = $fetch_settings['contact_no1'];
$contact_no2 = $fetch_settings['contact_no2'];

/*$twitter_link = $fetch_settings['twitter_link'];
$facebook_link = $fetch_settings['facebook_link'];
$linkedin_link = $fetch_settings['linkedin_link'];
$google_plus_link = $fetch_settings['google_plus_link'];
$youtube_link = $fetch_settings['youtube_link'];
$whatsapp_no = $fetch_settings['whatsapp_no'];*/

$fetchTotalQuantityH = mysql_fetch_array(mysql_query("SELECT SUM(`quantity`) AS `TOTAL_QUANTITY` FROM `og_temp_cart` WHERE `unique_id` = '".$session_id."'"));
$header_items = $fetchTotalQuantityH['TOTAL_QUANTITY'];
if($header_items!="")
{
    $display_top_item = $header_items;
}
else
{
    $display_top_item = 0;
}
?>

<!DOCTYPE html>
<html dir="ltr" lang="en">
	<head>
		<!-- Meta Tags -->
		<meta name="viewport" content="width=device-width,initial-scale=1.0"/>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
		<meta name="description" content="<?php echo $meta_description;?>" />
		<meta name="keywords" content="<?php echo $meta_keywords;?>" />
		<meta name="author" content="" />
		
		<!-- Page Title -->
		<!--
		<title><?php echo $meta_title;?></title> -->
		
		<title>Prismhub</title>
		
		<!-- Favicon and Touch Icons -->
		<link href="images/logo.png" rel="shortcut icon" type="image/png">
		
		<!-- Stylesheet -->
		<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
		
		<!-- Stylesheet -->
		<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
		<link href="css/jquery-ui.min.css" rel="stylesheet" type="text/css">
		<link href="css/animate.css" rel="stylesheet" type="text/css">
		<link href="css/css-plugin-collections.css" rel="stylesheet"/>
		<!-- CSS | menuzord megamenu skins -->
		<link id="menuzord-menu-skins" href="css/menuzord-skins/menuzord-rounded-boxed.css" rel="stylesheet"/>
		<!-- CSS | Main style file -->
		<link href="css/style-main.css" rel="stylesheet" type="text/css">
		<!-- CSS | Preloader Styles -->
		<link href="css/preloader.css" rel="stylesheet" type="text/css">
		<!-- CSS | Custom Margin Padding Collection -->
		<link href="css/custom-bootstrap-margin-padding.css" rel="stylesheet" type="text/css">
		<!-- CSS | Responsive media queries -->
		<link href="css/responsive.css" rel="stylesheet" type="text/css">
		<!-- CSS | Style css. This is the file where you can place your own custom css code. Just uncomment it and use it. -->
		<!-- <link href="css/style.css" rel="stylesheet" type="text/css"> -->
		
		<!-- Revolution Slider 5.x CSS settings -->
		<link  href="js/revolution-slider/css/settings.css" rel="stylesheet" type="text/css"/>
		<link  href="js/revolution-slider/css/layers.css" rel="stylesheet" type="text/css"/>
		<link  href="js/revolution-slider/css/navigation.css" rel="stylesheet" type="text/css"/>
		
		<!-- CSS | Theme Color -->
		<link href="css/colors/theme-skin-color-set-1.css" rel="stylesheet" type="text/css">
		
		<!-- external javascripts -->
		<script src="js/jquery-2.2.4.min.js"></script>

		<link rel="stylesheet" href="dist/css/lightbox.css">
		<script src="dist/js/lightbox-plus-jquery.min.js"></script>

		<script src="js/jquery-ui.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<!-- JS | jquery plugin collection for this theme -->
		<script src="js/jquery-plugin-collection.js"></script>
		
		<!-- Revolution Slider 5.x SCRIPTS -->
		<script src="js/revolution-slider/js/jquery.themepunch.tools.min.js"></script>
		<script src="js/revolution-slider/js/jquery.themepunch.revolution.min.js"></script>
		
		<link rel="stylesheet" type="text/css" href="css/slider.css">
		
		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
		</head>
		<body class="">
			<div id="wrapper" class="clearfix">
				<header id="header" class="header">
					<div class="header-top bg-theme-color-2 sm-text-center" style="background-color: #febd59 !important">
						<div class="container">
							<div class="row">
						  		<div class="col-md-9">
									<div class="widget no-border m-0">
										<ul class="list-inline">
											<li class="m-0 pl-10 pr-10"> <i class="fa fa-phone text-white"></i> <a class="" href="#"><?php echo $contact_no1;?></a></li>
											<li class="m-0 pl-10 pr-10"> <i class="fa fa-phone text-white"></i> <a class="" href="#"><?php echo $contact_no2;?></a></li>
											<li class="m-0 pl-10 pr-10"> <i class="fa fa-envelope-o text-white"></i> <a class="" href="mailto:<?php echo $contact_email;?>"><?php echo $contact_email;?></a></li>
										</ul>
									</div>
						  		</div>
						  		<div class="col-md-3">
									<div class="widget no-border m-0">
										<ul class="list-inline">
											<?php if(isset($_SESSION['USER_ID'])) { ?>
											<li class="m-0 pl-10 pr-10"><a href="view-cart.php"><i class="fa fa-shopping-basket text-white"></i> (<?php echo $display_top_item;?>)</a>
											<li class="m-0 pl-10 pr-10"><a href="my-account.php"><i class="fa fa-user text-white"></i> My Account</a>
											<li class="m-0 pl-10 pr-10"><a href="logout.php"><i class="fa fa-power-off text-white"></i> Logout</a>
											<?php } else { ?>
											<li class="m-0 pl-10 pr-10"><a href="view-cart.php"><i class="fa fa-shopping-cart text-white"></i> (<?php echo $display_top_item;?>)</a>
											<li class="m-0 pl-10 pr-10"> <i class="fa fa-sign-in text-white"></i> <a href="javascript:void();" data-toggle="modal" data-target="#myModalLogin">Login</a></li>
											<li class="m-0 pl-10 pr-10"> <i class="fa fa-registered text-white"></i> <a href="javascript:void();" data-toggle="modal" data-target="#myModalReg">Registration</a></li>
											<?php } ?>
										</ul>
									</div>
						  		</div>
							</div>
						</div>
    				</div>
					<div class="header-nav">
						<div class="header-nav-wrapper navbar-scrolltofixed bg-white">
							<div class="container">
								<nav id="menuzord-right" class="menuzord default">
									<a class="menuzord-brand pull-left flip" id="desktop" href="index.php">
										<img src="images/logo.png" alt="" style="width:65%; padding-top:1px; padding-bottom:1px;">
									</a>
									<ul class="menuzord-menu">
										<li <?php if($current_page == 'index.php') { ?>class="active"<?php } ?>><a href="index.php">Home</a></li>
										<li <?php if($current_page == 'about-us.php') { ?>class="active"<?php } ?>><a href="about-us.php">About Us</a></li>
										<li <?php if($current_page == 'category.php' || $current_page == 'subcategory.php' || $current_page == 'product-list.php') { ?>class="active"<?php } ?>><a href="category.php">Product Category</a></li>
										<li <?php if($current_page == 'reviews.php') { ?>class="active"<?php } ?>><a href="reviews.php">Reviews</a></li>
										<li <?php if($current_page == 'contact-us.php') { ?>class="active"<?php } ?>><a href="contact-us.php">Contact Us</a></li>
									</ul>
								</nav>
							</div>
						</div>
					</div>
				</header>
  
			  	<!-- Start main-content -->
				<div class="main-content">
				    <?php if($current_page == 'index.php') { ?>
					<!-- Section: home -->
					<section id="home">
						<!-- Slider Revolution Start -->
	  					<div class="banner">
							<div class="slider-container" id="caption-slide">
								<div class="slider">
								<?php
								$sql_banner = "SELECT * FROM `og_banners` WHERE `banner_status` = 'Active' ORDER BY `banner_id` ASC";
								$exe_banner = mysql_query($sql_banner) or die(mysql_error());
								while($arr_banner = mysql_fetch_array($exe_banner))
								{
									?>								
									<div class="slide"> <img src="uploads/banner/<?php echo $arr_banner['banner_image'];?>" alt=""> <span class="caption">&nbsp;</span></div>
									<?php
								}
								?>
								</div>
								<div class="switch" id="prev"><span style="background-image:url('images/prev.png');"></span></div>
								<div class="switch" id="next"><span style="background-image:url('images/next.png');"></span></div>
								</div>
							</div>
	  					<!-- end .rev_slider_wrapper -->
					<!-- Slider Revolution Ends -->
					</section>
					<?php } ?> 