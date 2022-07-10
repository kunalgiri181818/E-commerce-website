<?php 
$connection = mysql_connect("localhost","websap_morning","f8x-bzdMQnuy"); //DATABASE CONNECTION
if(!$connection)
{
	die("Database not connected!");
}

$db_selection = mysql_select_db("websap_morning",$connection); //DATABASE SELECTION
if(!$db_selection)
{
	die("Database not selected!");
}

define('SITE_URL','http://www.morningbazar.co.in/');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Invoice</title>
<style>
body {
  color: #000000;
  font-size: 15px;
  font-family: 'Open Sans', sans-serif;
}
</style>
<script language="javascript" type="text/javascript">
function myprint()
{
	document.getElementById('t_id').style.display = 'none';
	window.print();
}
</script>
</head>

<body>
<?php
//FETCH DATA FROM DATABASE
$fetch_record = mysql_fetch_array(mysql_query("SELECT * FROM `og_orders` WHERE `unique_id` = '".$_REQUEST['unique_id']."'"));
$arrAdmin = mysql_fetch_array(mysql_query("SELECT * FROM `og_administrator` WHERE `admin_id` = '1'"));
?>

<table width="100%" border="0" cellspacing="2" cellpadding="2">
	<tr>
		<td style="text-align:center;" colspan="2"><strong style="font-size:23px;">Morning Bazar</strong></td>
	</tr>
	<tr>
		<td width="83%"><?php echo $fetch_record['fname'];?>&nbsp;&nbsp;<?php echo $fetch_record['lname'];?></td>
		<td width="17%"><?php echo date('d/m/Y',time());?></td>
	</tr>
	<tr>
		<td colspan="2"><?php echo nl2br($fetch_record['address']);?></td>
	</tr>
	<tr>
		<td colspan="2"><?php echo $fetch_record['phone'];?></td>
	</tr>
	<tr>
		<td colspan="2"><?php echo $fetch_record['email'];?></td>
	</tr>
</table>
<br />
<table width="100%" border="1" cellspacing="0" cellpadding="4">
	<tr>
		<td colspan="5" align="center"><strong style="font-size:18px;">Order Details</strong></td>
	</tr>
	<tr>
		<td colspan="5" align="center">Order ID : <?php echo $fetch_record['orderid'];?></td>
	</tr>
	<tr style="background-color:#CCCCCC;">
		<td width="13%"><strong>Serial No.</strong></td>
		<td width="33%"><strong>Product Name</strong></td>
		<td width="20%"><strong>Unit Price</strong></td>
		<td width="17%"><strong>Quantity</strong></td>
		<td width="17%"><strong>Subtotal</strong></td>
	</tr>
	<?php
	$order_counter = 1;
	$sqlOrder = "SELECT * FROM `og_final_cart` WHERE `unique_id` = '".$_GET['unique_id']."' ORDER BY `cart_id` ASC";
	$exeOrder = mysql_query($sqlOrder) or die(mysql_error());
	$numOrder = mysql_num_rows($exeOrder);
	if($numOrder>0)
	{
		while($arr_final = mysql_fetch_array($exeOrder))
		{
			$getProduct = mysql_fetch_array(mysql_query("SELECT * FROM `og_products` WHERE `product_id` = '".$arr_final['product_id']."'"));
			$get_product_packet = mysql_fetch_array(mysql_query("SELECT * FROM `og_product_packets` WHERE `packet_id` = '".$arr_final['packet_id']."'"));
		?>
	<tr>
		<td><?php echo $order_counter;?></td>
		<td><?php echo stripslashes($getProduct['product_name_english']);?> (<?php echo $get_product_packet['packet_size'];?>)</td>
		<td>Rs. <?php echo $arr_final['unit_price'];?></td>
		<td><?php echo $arr_final['quantity'];?> </td>
		<td>Rs. <?php echo $arr_final['subtotal'];?></td>
	</tr>
		<?php
		$order_counter++;
		}
	}
	?>
	<tr>
		<td colspan="5">&nbsp;</td>
	</tr>
	<tr>
		<td colspan="3" align="right">Total Cost :</td>
		<td colspan="2">Rs. <?php echo $fetch_record['total_price'];?></td>
	</tr>
	<tr>
		<td colspan="3" align="right">Delivery Charge :</td>
		<td colspan="2">Rs. <?php echo $fetch_record['delivery_charge'];?></td>
	</tr>
	<tr>
		<td colspan="3" align="right">Grand Total :</td>
		<td colspan="2">Rs. <?php echo $fetch_record['grand_total'];?></td>
	</tr>
</table>
<br />
<table width="100%" border="0" cellspacing="2" cellpadding="2">
	<tr>
		<td><strong><?php echo $arrAdmin['company_name'];?></strong></td>
	</tr>
	<tr>
		<td>Address : <?php echo nl2br($arrAdmin['contact_address']);?></td>
	</tr>
	<tr>
		<td>Contact No. : <?php echo $arrAdmin['contact_no1'];?></td>
	</tr>
	<tr>
		<td>Contact No. : <?php echo $arrAdmin['contact_no2'];?></td>
	</tr>
	<tr>
		<td>Email : <?php echo $arrAdmin['contact_email'];?></td>
	</tr>
</table>
<br />
<table width="100%" border="0" cellspacing="2" cellpadding="2" id="t_id">
	<tr>
		<td><a href="javascript:void(0);" onclick="myprint();">Print</a></td>
	</tr>
</table>
</body>
</html>

