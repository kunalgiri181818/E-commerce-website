<?php require_once("header.php");?>

<?php
$sqlOrder2 = mysql_fetch_array(mysql_query("SELECT * FROM `og_orders` WHERE `user_id` = '".$_SESSION['USER_ID']."' AND `unique_id` = '".$session_id."'"));
$full_name = $sqlOrder2['fname']." ".$sqlOrder2['lname'];
//$expDate = explode(" ",$sqlOrder2['post_date']);
//$o_date = $expDate[0].":".$expDate[1];

$arrAdmin = mysql_fetch_array(mysql_query("SELECT * FROM `og_administrator` WHERE `admin_id` = '1'"));

//Mail send to administrator
$subject = 'A New Order Posted';	
$message = '<table border="0" width="100%" cellspacing="2" cellpadding="2">
			<tr>
				<td>A new order has been posted. Details are below : </td>
			</tr>				
			<tr>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td><b>Customer Details</b></td>
			</tr>
			<tr>
				<td>First Name : '.$sqlOrder2['fname'].'</td>
			</tr>
			<tr>
				<td>Last Name : '.$sqlOrder2['lname'].'</td>
			</tr>
			<tr>
				<td>Email Address : '.$sqlOrder2['email'].'</td>
			</tr>
			<tr>
				<td>Phone No. : '.$sqlOrder2['phone'].'</td>
			</tr>
			<tr>
				<td>Address : '.$sqlOrder2['address'].'</td>
			</tr>
			<tr>
				<td>City : '.$sqlOrder2['city'].'</td>
			</tr>
			<tr>
				<td>State : '.$sqlOrder2['state'].'</td>
			</tr>
			<tr>
				<td>Pincode : '.$sqlOrder2['zip'].'</td>
			</tr>
			<tr>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td><b>Order Details</b></td>
			</tr>';
$order_counter = 1;
$sqlOrder = "SELECT * FROM `og_temp_cart` WHERE `user_id` = '".$_SESSION['USER_ID']."' AND `unique_id` = '".$session_id."' ORDER BY `cart_id` ASC";
$exeOrder = mysql_query($sqlOrder) or die(mysql_error());
$numOrder = mysql_num_rows($exeOrder);
if($numOrder>0)
{
	while($arrOrder = mysql_fetch_array($exeOrder))
	{
		$getProduct = mysql_fetch_array(mysql_query("SELECT * FROM `og_products` WHERE `product_id` = '".$arrOrder['product_id']."'"));
		$get_product_packet = mysql_fetch_array(mysql_query("SELECT * FROM `og_product_packets` WHERE `packet_id` = '".$arrOrder['packet_id']."'"));
$message .= '<tr>
				<td>Item '.$order_counter.' : '.stripslashes($getProduct['product_name_english']).' ('.$get_product_packet['packet_size'].') - Rs.'.$arrOrder['unit_price'].' X '.$arrOrder['quantity'].' = Rs.'.$arrOrder['subtotal'].'</td>
			</tr>';
	$order_counter++;
	}
}
$message .= '<tr>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td>Total Cost : Rs.'.$sqlOrder2['total_price'].'</td>
			</tr>
			<tr>
				<td>Delivery Charge : Rs.'.$sqlOrder2['delivery_charge'].'</td>
			</tr>
			<tr>
				<td><b>Grand Total : Rs.'.$sqlOrder2['grand_total'].'</b></td>
			</tr>
			</table>';

$headers = "From: ".$full_name."<info@morningbazar.co.in>" . "\r\n" .
"Reply-To: info@morningbazar.co.in" . "\r\n" .
"X-Mailer: PHP/" . phpversion();
$headers .= 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
mail($arrAdmin['contact_email'],$subject,$message,$headers);

//Mail send to user
$subject2 = 'Order Confirmation';	
$message2 = '<table border="0" width="100%" cellspacing="2" cellpadding="2">
			<tr>
				<td>Hi '.$sqlOrder2['fname'].' '.$sqlOrder2['lname'].',</td>
			</tr>
			<tr>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td>Your order details are below:</td>
			</tr>';
$order_counter = 1;
$sqlOrder = "SELECT * FROM `og_temp_cart` WHERE `user_id` = '".$_SESSION['USER_ID']."' AND `unique_id` = '".$session_id."' ORDER BY `cart_id` ASC";
$exeOrder = mysql_query($sqlOrder) or die(mysql_error());
$numOrder = mysql_num_rows($exeOrder);
if($numOrder>0)
{
	while($arrOrder = mysql_fetch_array($exeOrder))
	{
		$getProduct = mysql_fetch_array(mysql_query("SELECT * FROM `og_products` WHERE `product_id` = '".$arrOrder['product_id']."'"));
		$get_product_packet = mysql_fetch_array(mysql_query("SELECT * FROM `og_product_packets` WHERE `packet_id` = '".$arrOrder['packet_id']."'"));
$message2 .= '<tr>
				<td>Item '.$order_counter.' : '.stripslashes($getProduct['product_name_english']).' ('.$get_product_packet['packet_size'].') - Rs.'.$arrOrder['unit_price'].' X '.$arrOrder['quantity'].' = Rs.'.$arrOrder['subtotal'].'</td>
			</tr>';
	$order_counter++;
	}
}
$message2 .= '<tr>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td>Total Cost : Rs.'.$sqlOrder2['total_price'].'</td>
			</tr>
			<tr>
				<td>Delivery Charge : Rs.'.$sqlOrder2['delivery_charge'].'</td>
			</tr>
			<tr>
				<td><b>Grand Total : Rs.'.$sqlOrder2['grand_total'].'</b></td>
			</tr>
			<tr>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td>Thanks & Regards,<br>'.$arrAdmin['company_name'].' Team</td>
			</tr>
			</table>';

$headers2 = "From: ".$arrAdmin['company_name']."<info@morningbazar.co.in>" . "\r\n" .
"Reply-To: info@morningbazar.co.in" . "\r\n" .
"X-Mailer: PHP/" . phpversion();
$headers2 .= 'MIME-Version: 1.0' . "\r\n";
$headers2 .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
mail($sqlOrder2['email'],$subject2,$message2,$headers2);

$sqlCart = "SELECT * FROM `og_temp_cart` WHERE `user_id` = '".$_SESSION['USER_ID']."' AND `unique_id` = '".$session_id."' ORDER BY `cart_id` ASC";
$exeCart = mysql_query($sqlCart) or die(mysql_error());
$numCart = mysql_num_rows($exeCart);
if($numCart>0)
{
	while($arrCart = mysql_fetch_array($exeCart))
	{
		$sqlInsert = "INSERT INTO `og_final_cart` SET `user_id` = '".$_SESSION['USER_ID']."',`order_id` = '".$sqlOrder2['orderid']."',`product_id` = '".$arrCart['product_id']."',`packet_id` = '".$arrCart['packet_id']."',`quantity` = '".$arrCart['quantity']."',`unit_price` = '".$arrCart['unit_price']."',`subtotal` = '".$arrCart['subtotal']."',`unique_id` = '".$session_id."'";
		$exeInsert = mysql_query($sqlInsert) or die(mysql_error());
	}
}

$sqlEdit = "UPDATE `og_orders` SET `payment_status` = 'Paid',`transaction_completed` = 'Yes' WHERE `user_id` = '".$_SESSION['USER_ID']."' AND `unique_id` = '".$session_id."'";
$exeEdit = mysql_query($sqlEdit) or die(mysql_error());

$sqlDelete = "DELETE FROM `og_temp_cart` WHERE `user_id` = '".$_SESSION['USER_ID']."' AND `unique_id` = '".$session_id."'";
$exeDelete = mysql_query($sqlDelete) or die(mysql_error());
?>

			<!-- page template area start -->
			<div class="main-content bg-lighter">
    			<section class="inner-header parallax" style="background-image: url('images/bg/category.jpg');">
      				<div class="container">
						<div class="section-content">
							<div class="row">
								<div class="col-md-12">
									<h2 class="title text-white text-center" style="text-align:center;">Payment Successful</h2>
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
									<p style="text-align:center;">Thanks for your payment. Your transaction has been successful.</p>
								</div>
							</div>
						</div>
					</div>
				</section>
			</div>
			<!-- page template area end -->
  
<?php require_once("footer.php");?>