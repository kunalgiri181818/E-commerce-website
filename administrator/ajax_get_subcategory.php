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
	<div class="span3">Subcategory</div>
	<div class="span9">
	<select name="subcategory_id" id="subcategory_id">
	<?php
	$sql_category2 = "SELECT * FROM `og_subcategory` WHERE `category_id` = '".$_REQUEST['category_id']."' ORDER BY `subcategory_id` ASC";
	$exe_category2 = mysql_query($sql_category2) or die();
	while($arr_category2 = mysql_fetch_array($exe_category2))
	{
	?>
	<option value="<?php echo stripslashes($arr_category2['subcategory_id']);?>"><?php echo stripslashes($arr_category2['subcategory_name']);?></option>
	<?php
	}
	?>
	</select>
	</div>
	<?php
	}
	else
	{
	?>
	<?php
	}
	?>