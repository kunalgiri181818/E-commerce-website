<?php 
require_once("../config.php");

$sql_products = "SELECT * FROM `og_products`";
$exe_products = mysql_query($sql_products) or die(mysql_error());
while($arr_products = mysql_fetch_array($exe_products))
{
	$sql_final_cart = "SELECT * FROM `og_final_cart` WHERE `product_id` = '".$arr_products['product_id']."'";
	$exe_final_cart = mysql_query($sql_final_cart) or die(mysql_error());
	$num_final_cart = mysql_num_rows($exe_final_cart);
	
	$sql_update = "UPDATE `og_products` SET `sale` = '".$num_final_cart."' WHERE `product_id` = '".$arr_products['product_id']."'";
	$exe_update = mysql_query($sql_update) or die(mysql_error());
}
?>