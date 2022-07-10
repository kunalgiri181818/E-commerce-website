<?php
if($current_page == 'product-list.php')
{
    $fetch_cat = mysql_fetch_array(mysql_query("SELECT * FROM `og_category` WHERE `category_id` = '".$_REQUEST['category_id']."'"));
    
    $meta_title = stripslashes($fetch_cat['category_name']).' | Morning Bazar';
    $meta_keywords = '';
    $meta_description = '';
}
else
{
    if($current_page == 'index.php')
    {
    	$meta_title = 'Morning Bazar';
    	$meta_keywords = '';
    	$meta_description = '';
    }
    if($current_page == 'about-us.php')
    {
    	$meta_title = 'About Us | Morning Bazar';
    	$meta_keywords = '';
    	$meta_description = '';
    }
    if($current_page == 'contact-us.php')
    {
    	$meta_title = 'Contact Us | Morning Bazar';
    	$meta_keywords = '';
    	$meta_description = '';
    }
    if($current_page == 'category.php')
    {
    	$meta_title = 'Product Category | Morning Bazar';
    	$meta_keywords = '';
    	$meta_description = '';
    }
	if($current_page == 'subcategory.php')
    {
    	$meta_title = 'Product Subcategory | Morning Bazar';
    	$meta_keywords = '';
    	$meta_description = '';
    }
    if($current_page == 'return.php')
    {
    	$meta_title = 'Return & Refund | Morning Bazar';
    	$meta_keywords = '';
    	$meta_description = '';
    }
    if($current_page == 'terms.php')
    {
    	$meta_title = 'Terms & Conditions | Morning Bazar';
    	$meta_keywords = '';
    	$meta_description = '';
    }
    if($current_page == 'privacy.php')
    {
    	$meta_title = 'Privacy Policy | Morning Bazar';
    	$meta_keywords = '';
    	$meta_description = '';
    }
    if($current_page == 'cancel.php')
    {
    	$meta_title = 'Order Cancellation | Morning Bazar';
    	$meta_keywords = '';
    	$meta_description = '';
    }
    if($current_page == 'reviews.php')
    {
    	$meta_title = 'Our Reviews | Morning Bazar';
    	$meta_keywords = '';
    	$meta_description = '';
    }
    if($current_page == 'view-cart.php')
    {
    	$meta_title = 'My Basket | Morning Bazar';
    	$meta_keywords = '';
    	$meta_description = '';
    }
    if($current_page == 'checkout.php')
    {
    	$meta_title = 'Checkout | Morning Bazar';
    	$meta_keywords = '';
    	$meta_description = '';
    }
    if($current_page == 'order-thankyou.php')
    {
    	$meta_title = 'Order Successful | Morning Bazar';
    	$meta_keywords = '';
    	$meta_description = '';
    }
    if($current_page == 'my-account.php')
    {
    	$meta_title = 'My Account | Morning Bazar';
    	$meta_keywords = '';
    	$meta_description = '';
    }
    if($current_page == 'edit-profile.php')
    {
    	$meta_title = 'Edit Profile | Morning Bazar';
    	$meta_keywords = '';
    	$meta_description = '';
    }
    if($current_page == 'change-password.php')
    {
    	$meta_title = 'Change Password | Morning Bazar';
    	$meta_keywords = '';
    	$meta_description = '';
    }
    if($current_page == 'my-orders.php')
    {
    	$meta_title = 'My Orders | Morning Bazar';
    	$meta_keywords = '';
    	$meta_description = '';
    }
    if($current_page == 'order-details.php')
    {
    	$meta_title = 'Order Details | Morning Bazar';
    	$meta_keywords = '';
    	$meta_description = '';
    }
    if($current_page == 'view-suggestion.php')
    {
    	$meta_title = 'View Comment | Morning Bazar';
    	$meta_keywords = '';
    	$meta_description = '';
    }
    if($current_page == 'post-suggestion.php')
    {
    	$meta_title = 'Post Comment | Morning Bazar';
    	$meta_keywords = '';
    	$meta_description = '';
    }
    if($current_page == 'choose-payment-type.php')
    {
    	$meta_title = 'Choose Payment Type | Morning Bazar';
    	$meta_keywords = '';
    	$meta_description = '';
    }
    if($current_page == 'payment.php')
    {
    	$meta_title = 'Payment | Morning Bazar';
    	$meta_keywords = '';
    	$meta_description = '';
    }
    if($current_page == 'success.php')
    {
    	$meta_title = 'Payment Successful | Morning Bazar';
    	$meta_keywords = '';
    	$meta_description = '';
    }
    if($current_page == 'failed.php')
    {
    	$meta_title = 'Payment Failed | Morning Bazar';
    	$meta_keywords = '';
    	$meta_description = '';
    }
}
?>