<?php 
$connection = mysql_connect("localhost","dreamofx_organic","12qwaszx@123"); //DATABASE CONNECTION
if(!$connection)
{
	die("Database not connected!");
}

$db_selection = mysql_select_db("dreamofx_organic",$connection); //DATABASE SELECTION
if(!$db_selection)
{
	die("Database not selected!");
}

define('SITE_URL','http://www.rajtutorialgroup.com/thanks_basket/');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="UTF-8">
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
		<td width="20%">Customer Name :</td>
		<td width="80%"><?php echo $fetch_record['fname'];?>&nbsp;&nbsp;<?php echo $fetch_record['lname'];?></td>
	</tr>
	<td>Customer Address : </td>
		<td><?php echo stripslashes($fetch_record['address']);?></td>
	</tr>
</table>
<table width="100%" border="0" cellspacing="2" cellpadding="2">	
	<tr>
		<td width="50%"><b>Order Summary</b><br>Order Id : <?php echo $fetch_record['orderid'];?></td>
	</tr>	
		<td width="50%"><?php echo date("F d, Y",strtotime($fetch_record['post_date']));?></td>	
</table>
<br />
<hr>
<table width="100%" border="0" cellspacing="0" cellpadding="4">	
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
		<td><b><?php echo stripslashes($getProduct['product_name_english']);?></b><br>Quantity :  <?php echo $get_product_packet['packet_size'];?></td>
		<td>(<?php echo $arr_final['quantity'];?> X Rs. <?php echo $arr_final['unit_price'];?>)</td>
		<td>Rs. <?php echo $arr_final['subtotal'];?></td>
	</tr>
		<?php
		$order_counter++;
		}
	}
	?>
	</table>
	<br>
	<hr>
	<table width="100%" border="0" cellspacing="2" cellpadding="2">	
	<tr>
		<td align="left">Total Cost :</td>
		<td align="right">Rs. <?php echo $fetch_record['total_price'];?></td>
	</tr>
	<tr>
		<td align="left">Delivery Charge :</td>
		<td align="right">Rs. <?php echo $fetch_record['delivery_charge'];?></td>
	</tr>
	<tr>
		<td align="left">Grand Total :</td>
		<td align="right">Rs. <?php echo $fetch_record['grand_total'];?></td>
	</tr>
</table>
</body>
</html>

