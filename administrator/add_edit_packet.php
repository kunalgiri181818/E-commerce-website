<?php 
require_once("header.php");
require_once("session_check.php");

//CODE FOR ADD PACKET
if(isset($_POST['add']))
{
	$price_difference = $_POST['original_price']-$_POST['price'];
	$discount = ceil(($price_difference*100)/$_POST['original_price']);
	
	$sql_insert = "INSERT INTO `og_product_packets` SET `product_id` = '".addslashes($_POST['hid_product_id'])."',`packet_size` = '".addslashes($_POST['packet_size'])."',`discount` = '".$discount."',`original_price` = '".addslashes($_POST['original_price'])."',`price` = '".addslashes($_POST['price'])."'";
	$exe_insert = mysql_query($sql_insert) or die(mysql_error());
	
	$_SESSION['add_succ_msg'] = 'Packet added successfully.';
	header("location: packet_list.php?product_id=".$_POST['hid_product_id']."&page=".$_REQUEST['page']);
	exit;
}

//CODE FOR UPDATE PACKET
if(isset($_POST['edit']))
{
	$price_difference = $_POST['original_price']-$_POST['price'];
	$discount = ceil(($price_difference*100)/$_POST['original_price']);
	
	$sql_update = "UPDATE `og_product_packets` SET `product_id` = '".addslashes($_POST['hid_product_id'])."',`packet_size` = '".addslashes($_POST['packet_size'])."',`discount` = '".$discount."',`original_price` = '".addslashes($_POST['original_price'])."',`price` = '".addslashes($_POST['price'])."' WHERE `packet_id` = '".$_POST['hid_packet_id']."'";
	$exe_update = mysql_query($sql_update) or die(mysql_error());
	
	$_SESSION['edit_succ_msg'] = 'Packet updated successfully.';
	header("location: packet_list.php?product_id=".$_POST['hid_product_id']."&page=".$_REQUEST['page']);
	exit;
}

//FETCH DATA FROM DATABASE
if(isset($_REQUEST['action']) && $_REQUEST['action'] == "edit") 
{
	$fetch_record = mysql_fetch_array(mysql_query("SELECT * FROM `og_product_packets` WHERE `packet_id` = '".$_REQUEST['packet_id']."'"));
	$packet_size = stripslashes($fetch_record['packet_size']);
	$discount = stripslashes($fetch_record['discount']);
	$original_price = stripslashes($fetch_record['original_price']);
}
?>

<?php 
$fetch_product = mysql_fetch_array(mysql_query("SELECT * FROM `og_products` WHERE `product_id` = '".$_REQUEST['product_id']."'"));
?>

<script language="javascript" type="text/javascript">
function frm_validation()
{
	if(document.getElementById('packet_size').value == '')
	{
		alert("Please enter packet size");
		document.getElementById('packet_size').focus();
		return false;
	}
	
	if(document.getElementById('original_price').value == '')
	{
		alert("Please enter original price");
		document.getElementById('original_price').focus();
		return false;
	}
	
	if(document.getElementById('price').value == '')
	{
		alert("Please enter sale price");
		document.getElementById('price').focus();
		return false;
	}
}
</script>

<?php require_once("left_panel.php");?>
<div class="content">
	<div class="workplace">
		<div class="row-fluid">
			<div class="span12">
				<div class="head clearfix">
					<div class="isw-documents"></div>
					<?php if(isset($_REQUEST['action']) && $_REQUEST['action'] == "edit") { ?>
					<h1>Update Packet For <?php echo $fetch_product['product_name_english'];?></h1>
					<?php } else { ?>
					<h1>Add Packet For <?php echo $fetch_product['product_name_english'];?></h1>
					<?php } ?>
				</div>
				<form action="" method="post" enctype="multipart/form-data" onsubmit="return frm_validation();">
				<input type="hidden" name="hid_packet_id" id="hid_packet_id" value="<?php echo $_REQUEST['packet_id'];?>" />
				<input type="hidden" name="hid_product_id" id="hid_product_id" value="<?php echo $_GET['product_id'];?>" />
				<div class="block-fluid">
					<div class="row-form clearfix">
						<div class="span3">Packet Size <font color="#FF0000">*</font></div>
						<div class="span9"><input type="text" name="packet_size" id="packet_size" value="<?php echo $packet_size;?>" /></div>                            
					</div>
					<div class="row-form clearfix">
						<div class="span3">Original Price <font color="#FF0000">*</font></div>
						<div class="span9">Rs.<input type="text" name="original_price" id="original_price" value="<?php echo $original_price;?>" style="width:50%;" /></div>
					</div>	
					<div class="row-form clearfix">
						<div class="span3">Sale Price <font color="#FF0000">*</font></div>
						<div class="span9">Rs.<input type="text" name="price" id="price" value="<?php echo $price;?>" style="width:50%;" /></div>
					</div>
					<div class="row-form clearfix">
						<div class="span3">&nbsp;</div>
						<div class="span9">
						<?php if(isset($_REQUEST['action']) && $_REQUEST['action'] == "edit") { ?>
							<button class="btn" type="submit" name="edit">Save</button>
						<?php } else { ?>
							<button class="btn" type="submit" name="add">Save</button>
						<?php } ?>
							<button class="btn" type="button" name="back" onclick="window.location.href='packet_list.php?product_id=<?php echo $_GET['product_id']?>&page=<?php echo $_REQUEST['page'];?>'">Back To Packet List For <?php echo $fetch_product['product_name_english'];?></button>
						</div>
					</div>
				</div>
				</form>
			</div>
		</div>
	</div>
</div> 

<?php require_once("footer.php"); ?>