<?php 
ob_start();
session_start();
ini_set("display_errors", 0);

require_once("../config.php");
?>

	<?php 
	$numsubcat = mysql_num_rows(mysql_query("SELECT * FROM `og_subcategory` WHERE `category_id` = '".$_REQUEST['category_id']."' ORDER BY `subcategory_id` ASC"));
	if($numsubcat>0)
	{
	?>
	<select name="subcategory_id" id="subcategory_id" style="width:100%;">
	<option value="">Subcategory</option>	
	<?php
	$sql_category2 = "SELECT * FROM `og_subcategory` WHERE `category_id` = '".$_REQUEST['category_id']."' ORDER BY `subcategory_id` ASC";
	$exe_category2 = mysql_query($sql_category2) or die();
	while($arr_category2 = mysql_fetch_array($exe_category2))
	{
	?>
	<option value="<?php echo stripslashes($arr_category2['subcategory_id']);?>" <?php if($arr_category2['subcategory_id'] == $_REQUEST['subcategory_id']) { ?>selected<?php } ?>><?php echo stripslashes($arr_category2['subcategory_name']);?></option>
	<?php
	}
	?>
	</select>
	<?php
	}
	else
	{
	?>
	<?php
	}
	?>