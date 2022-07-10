<?php
ob_start();
session_start();
 
require_once("config.php");
$session_id = session_id();

$fetch_product_packet = mysql_fetch_array(mysql_query("SELECT * FROM `og_product_packets` WHERE `packet_id` = '".$_SESSION['packet_id']."'"));

$sqlCart = "SELECT * FROM `og_temp_cart` WHERE `product_id` = '".$_REQUEST['product_id']."' AND `packet_id` = '".$_SESSION['packet_id']."' AND `unique_id` = '".$session_id."'";
$exeCart = mysql_query($sqlCart) or die(mysql_error());
$numCart = mysql_num_rows($exeCart);
if($numCart>0)
{
	$arr_cart = mysql_fetch_array($exeCart);
	$new_quantity = $arr_cart['quantity']+1;
	$new_subtotal = $fetch_product_packet['price']*$new_quantity;
	
	$sql_update = "UPDATE `og_temp_cart` SET `user_id` = '".$_SESSION['USER_ID']."',`unit_price` = '".$fetch_product['product_price']."',`quantity` = '".$new_quantity."',`subtotal` = '".$new_subtotal."' WHERE `product_id` = '".$_GET['product_id']."' AND `packet_id` = '".$_SESSION['packet_id']."' AND `unique_id` = '".$session_id."'";
	$exe_update = mysql_query($sql_update) or die(mysql_error());
}
else
{
	$sub_total = $fetch_product_packet['price']*1;

	$sql_insert = "INSERT INTO `og_temp_cart` SET `user_id` = '".$_SESSION['USER_ID']."',`product_id` = '".$_REQUEST['product_id']."',`packet_id` = '".$_SESSION['packet_id']."',`unit_price` = '".$fetch_product_packet['price']."',`quantity` = '1',`subtotal` = '".$sub_total."',`unique_id` = '".$session_id."'";
	$exe_insert = mysql_query($sql_insert) or die(mysql_error());
}

echo 'success';
?>