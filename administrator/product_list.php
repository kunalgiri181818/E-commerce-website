<?php 
require_once("header.php");
require_once("session_check.php");

//CODE FOR CHANGE STATUS TO INACTIVE
if(isset($_GET['action']) && $_GET['action'] == "inactive")
{
	$sql_update = "UPDATE `og_products` SET `stock_available` = 'No' WHERE `product_id` = '".$_GET['product_id']."'";
	$exe_update = mysql_query($sql_update) or die(mysql_error());
	
	$_SESSION['change_succ_msg'] = 'Status changed to Out of Stock.';
	header("location: product_list.php?page=".$_REQUEST['page']);
	exit;
}

//CODE FOR CHANGE STATUS TO ACTIVE
if(isset($_GET['action']) && $_GET['action'] == "active")
{
	$sql_update = "UPDATE `og_products` SET `stock_available` = 'Yes' WHERE `product_id` = '".$_GET['product_id']."'";
	$exe_update = mysql_query($sql_update) or die(mysql_error());
	
	$_SESSION['change_succ_msg'] = 'Status changed to In Stock.';
	header("location: product_list.php?page=".$_REQUEST['page']);
	exit;
}

//CODE FOR DELETE PRODUCT
if(isset($_GET['action']) && $_GET['action'] == "delete")
{
	$sql_blog_image = "SELECT * FROM `og_products` WHERE `product_id` = '".$_GET['product_id']."'";
	$exe_blog_image = mysql_query($sql_blog_image) or die(mysql_error());
	while($arr_blog_image = mysql_fetch_array($exe_blog_image))
	{
		if($arr_blog_image['product_photo']!="")
		{
			unlink("../uploads/product/".$arr_blog_image['product_photo']);
			unlink("../uploads/product/".$arr_blog_image['product_photo2']);
			unlink("../uploads/product/".$arr_blog_image['product_photo3']);
			unlink("../uploads/product/".$arr_blog_image['product_photo4']);
		}
	}
	
	mysql_query("DELETE FROM `og_temp_cart` WHERE `product_id` = '".$_GET['product_id']."'") or die(mysql_error());
	mysql_query("DELETE FROM `og_final_cart` WHERE `product_id` = '".$_GET['product_id']."'") or die(mysql_error());
	mysql_query("DELETE FROM `og_product_packets` WHERE `product_id` = '".$_GET['product_id']."'") or die(mysql_error());
	mysql_query("DELETE FROM `og_products` WHERE `product_id` = '".$_GET['product_id']."'") or die(mysql_error());
	
	$_SESSION['del_succ_msg'] = 'Product deleted successfully.';
	header("location: product_list.php?page=".$_REQUEST['page']);
	exit;
}
?>

<style>
.page_no_area{
	width:100%;
	height:auto;
	text-align:right;
	padding-right:10px;
	float:right;
	margin-bottom:50px;
	margin-bottom:30px;
}

.page_no_area ul{
	padding:0px;
	margin:0px;
	list-style:none;
}

.page_no_area ul li{
	display:inline;
	color:#FFFFFF;
    font-size: 14px;
	margin-right: 5px;
}

.page_no_area ul li a{
	/*height:20px;
	width:20px;*/
	/*display:inline-block;*/
	color:#FFFFFF;
	font-size: 14px;
	text-align:center;
	text-decoration:none;
	background-color: #395E88;
	padding: 8px;
}

.page_no_area ul li a:hover{
	/*height:20px;
	width:20px;*/
	/*display:inline-block;*/
	color:#000;
	font-size: 14px;
	text-align:center;
	text-decoration:none;
	background-color: #CCCCCC;
	border:#008FD5;
	padding: 8px;
}

a.page_nomain{
	/*height:20px;
	width:20px;*/
	/*display:inline-block;*/
	color:#000 !important;
	font-size: 14px;
	text-align:center;
	text-decoration:none;
	background-color:#CCCCCC !important;
	padding: 8px;
}
</style>

<script language="javascript" type="text/javascript">
function getSubcategory(myval)
{
	var str = {category_id:myval};
	$.ajax({
		type: "post",
		url: "ajax_get_search_subcategory.php",
		data: str,
		success: function(data) 
		{
			$('#subcat_area').html(data);
		}
	});
}
</script>

<?php require_once("left_panel.php");?>
<div class="content">
	<div class="workplace">
		<?php if(isset($_SESSION['add_succ_msg'])) { ?>
			<div class="alert alert-success">                
			<b><?php echo $_SESSION['add_succ_msg'];?></b>
			</div> 
		<?php
		unset($_SESSION['add_succ_msg']);
		}
		?>
		
		<?php if(isset($_SESSION['edit_succ_msg'])) { ?>
			<div class="alert alert-success">                
			<b><?php echo $_SESSION['edit_succ_msg'];?></b>
			</div> 
		<?php
		unset($_SESSION['edit_succ_msg']);
		}
		?>
		
		<?php if(isset($_SESSION['del_succ_msg'])) { ?>
			<div class="alert alert-success">                
			<b><?php echo $_SESSION['del_succ_msg'];?></b>
			</div> 
		<?php
		unset($_SESSION['del_succ_msg']);
		}
		?>
		
		<?php if(isset($_SESSION['change_succ_msg'])) { ?>
			<div class="alert alert-success">                
			<b><?php echo $_SESSION['change_succ_msg'];?></b>
			</div> 
		<?php
		unset($_SESSION['change_succ_msg']);
		}
		?>
		<div class="row-fluid">
			<div class="span12">
				<form action="" method="get">
				<div class="head clearfix">
					<div class="isw-grid"></div>
					<h1>Search Products</h1>                               
				</div>
				<div class="block-fluid table-sorting clearfix">
					<div class="row-form clearfix">
						<div class="span3"><input type="text" name="pname" id="pname" value="<?php echo $_REQUEST['pname'];?>" placeholder="Product Name" style="width:100%;" /></div> 
						<div class="span3"><select name="category_id" id="category_id" onchange="getSubcategory(this.value);" style="width:100%;">
							<option value="">Category</option>
							<?php
							$sql_category = "SELECT * FROM `og_category` WHERE `category_status` = 'Active' ORDER BY `category_id` ASC";
							$exe_category = mysql_query($sql_category) or die();
							while($arr_category = mysql_fetch_array($exe_category))
							{
							?>
							<option value="<?php echo stripslashes($arr_category['category_id']);?>" <?php if($arr_category['category_id'] == $_REQUEST['category_id']) { ?>selected<?php } ?>><?php echo stripslashes($arr_category['category_name']);?></option>
							<?php
							}
							?>
							</select>
						</div>                     
						<div class="span3" id="subcat_area"><select name="subcategory_id" id="subcategory_id" style="width:100%;">
							<option value="">Subcategory</option>						
							</select>
						</div>                    
						<div class="span3"><select name="stock_available" id="stock_available" style="width:100%;">
							<option value="">Stock Availability</option>						
							<option value="Yes" <?php if($_REQUEST['stock_available'] == 'Yes') { ?>selected<?php } ?>>Yes</option>
							<option value="No" <?php if($_REQUEST['stock_available'] == 'No') { ?>selected<?php } ?>>No</option>
							</select>
						</div> 
						<div class="span12">&nbsp;</div>					
						<div class="span12" style="text-align:center;"><button class="btn btn-inverse" type="submit" name="search">Search</button>&nbsp;&nbsp;<button class="btn btn-inverse" type="button" name="reset" onclick="window.location.href='product_list.php'">Reset</button></div>
					</div>					
				</div>
				</form>
				<div>&nbsp;</div>
				<div class="head clearfix">
					<div class="isw-grid"></div>
					<h1>Products List</h1>                               
				</div>
				<div class="block-fluid table-sorting clearfix">
					<table cellpadding="0" cellspacing="0" width="100%" class="table" id="tSortable">
						<thead>
							<tr>
								<th width="20%">Product Name</th>
								<th width="15%">Product Photo</th>
								<th width="15%">Category</th>
								<th width="15%">Subcategory</th>
								<th width="15%">Stock Availability</th>
								<th width="20%">Action</th>
							</tr>
						</thead>
						<tbody>						
						<?php
						$product_counter = 1;
						$adjacents = 3;
						$query = "SELECT COUNT(*) as `num` FROM `og_products` WHERE `product_status` = 'Active'";
							
						/* Get data. */
						if($_REQUEST['pname']!="")
						{
							$query .= " AND `product_name_english` LIKE '%".$_REQUEST['pname']."%'";
						}
						if($_REQUEST['category_id']!="")
						{
							$query .= " AND `category_id` = '".$_REQUEST['category_id']."'";
						}
						if($_REQUEST['subcategory_id']!="")
						{
							$query .= " AND `subcategory_id` = '".$_REQUEST['subcategory_id']."'";
						}
						if($_REQUEST['stock_available']!="")
						{
							$query .= " AND `stock_available` = '".$_REQUEST['stock_available']."'";
						}
						
						//$query = "SELECT COUNT(*) as `num` FROM `og_products` WHERE `offer`<>'Yes' AND `product_status` = 'Active'";
						$total_pages = mysql_fetch_array(mysql_query($query));
						$total_pages = $total_pages['num'];
						?>
						<?php
						if($total_pages>0)
						{
							/* Setup vars for query. */
							$targetpage = SITE_URL."administrator/product_list.php?page=";		//your file name  (the name of this file)
							$targetpageh = SITE_URL."administrator/product_list.php?page=";
							$limit = 20; 			//how many items to show per page
							$page = $_GET["page"];
							if($page) 
							$start = ($page - 1) * $limit; 			//first item to display on this page
							else
							$start = 0;								//if no page var is given, set start to 0
						
							$sql_blog = "SELECT * FROM `og_products` WHERE `product_status` = 'Active'";
							
							/* Get data. */
							if($_REQUEST['pname']!="")
							{
								$sql_blog .= " AND `product_name_english` LIKE '%".$_REQUEST['pname']."%'";
							}
							if($_REQUEST['category_id']!="")
							{
								$sql_blog .= " AND `category_id` = '".$_REQUEST['category_id']."'";
							}
							if($_REQUEST['subcategory_id']!="")
							{
								$sql_blog .= " AND `subcategory_id` = '".$_REQUEST['subcategory_id']."'";
							}
							if($_REQUEST['stock_available']!="")
							{
								$sql_blog .= " AND `stock_available` = '".$_REQUEST['stock_available']."'";
							}
							$sql_blog .= " ORDER BY `product_id` DESC LIMIT $start, $limit";
							
							$result = mysql_query($sql_blog);
							
							if ($page == 0) $page = 1;					//if no page var is given, default to 1.
							$prev = $page - 1;							//previous page is page - 1
							$next = $page + 1;							//next page is page + 1
							$lastpage = ceil($total_pages/$limit);		//lastpage is = total pages / items per page, rounded up.
							$lpm1 = $lastpage - 1;						//last page minus 1
							
							/* 
							Now we apply our rules and draw the pagination object. 
							We're actually saving the code to a variable in case we want to draw it more than once.
							*/
							$pagination = "";
							if($lastpage > 1)
							{	
							$pagination .= "<div class=\"page_no_area\"><ul>";
							
							//pages	
							if ($lastpage < 7 + ($adjacents * 2))	//not enough pages to bother breaking it up
							{	
							for ($counter = 1; $counter <= $lastpage; $counter++)
							{
							if ($counter == $page)
								$pagination.= "<li><a href=\"#\" class=\"page_nomain\">$counter</a></li>";
							else
								$pagination.= "<li><a href=\"$targetpage$counter\">$counter</a></li>";					
							}
							}
							elseif($lastpage > 5 + ($adjacents * 2))	//enough pages to hide some
							{
							//close to beginning; only hide later pages
							if($page < 1 + ($adjacents * 2))		
							{
							for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
							{
								if ($counter == $page)
									$pagination.= "<li><a href=\"#\" class=\"page_nomain\">$counter</a></li>";
								else
									$pagination.= "<li><a href=\"$targetpage$counter\">$counter</a></li>";					
							}
							$pagination.= "...";
							$pagination.= "<li><a href=\"$targetpage$lpm1\">$lpm1</a></li>";
							$pagination.= "<li><a href=\"$targetpage$lastpage\">$lastpage</a></li>";		
							}
							//in middle; hide some front and some back
							elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
							{
							$pagination.= "<li><a href=\"$targetpage1\">1</a></li>";
							$pagination.= "<li><a href=\"$targetpage2\">2</a></li>";
							$pagination.= "...";
							for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
							{
								if ($counter == $page)
									$pagination.= "<li><a href=\"#\" class=\"page_nomain\">$counter</a></li>";
								else
									$pagination.= "<li><a href=\"$targetpage$counter\">$counter</a></li>";					
							}
							$pagination.= "...";
							$pagination.= "<li><a href=\"$targetpage$lpm1\">$lpm1</a></li>";
							$pagination.= "<li><a href=\"$targetpage$lastpage\">$lastpage</a></li>";		
							}
							//close to end; only hide early pages
							else
							{
							$pagination.= '<li><a href="https://www.shoppersbasket.in/administrator/product_list.php?page=1">1</a></li>';
							$pagination.= '<li><a href="https://www.shoppersbasket.in/administrator/product_list.php?page=2">2</a></li>';
							$pagination.= "...";
							for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
							{
								if ($counter == $page)
									$pagination.= "<li><a href=\"#\" class=\"page_nomain\">$counter</a></li>";
							
								else
									$pagination.= "<li><a href=\"$targetpage$counter\">$counter</a></li>";					
							}
							}
							}
							
							$pagination.= "</ul></nav></div>";	
							}
							while($fetch_record = mysql_fetch_array($result))
							{
								$product_name_english = stripslashes($fetch_record['product_name_english']);
								$stock_available = $fetch_record['stock_available'];								
								
								$fetch_category = mysql_fetch_array(mysql_query("SELECT * FROM `og_category` WHERE `category_id` = '".$fetch_record['category_id']."'"));
								$fetch_subcategory = mysql_fetch_array(mysql_query("SELECT * FROM `og_subcategory` WHERE `subcategory_id` = '".$fetch_record['subcategory_id']."'"));
							?>
							<tr>
								<td><?php echo $product_name_english;?></td>
								<td><img src="../uploads/product/<?php echo $fetch_record['product_photo'];?>" alt="" height="100" width="100" /></td>
								<td><?php echo stripslashes($fetch_category['category_name']);?></td>
								<td><?php echo stripslashes($fetch_subcategory['subcategory_name']);?></td>
								<td><?php if($stock_available == 'Yes') { ?><a href="product_list.php?product_id=<?php echo $fetch_record['product_id']?>&action=inactive&page=<?php echo $_REQUEST['page'];?>" title="Click to out of stock" onclick="return confirm('Are you sure you want to out of stock this record?');" style="color:green;">In Stock</a><?php } else { ?><a href="product_list.php?product_id=<?php echo $fetch_record['product_id']?>&action=active&page=<?php echo $_REQUEST['page'];?>" title="Click to in stock" onclick="return confirm('Are you sure you want to in stock this record?');" style="color:red;">Out of Stock</a><?php } ?></td>
								<td><a href="add_edit_product.php?product_id=<?php echo $fetch_record['product_id']?>&action=edit&page=<?php echo $_REQUEST['page'];?>" title="Edit" style="float:left; display:block; margin:0 5px 0 0;"><ul class="the-icons clearfix"><i class="isb-edit"></i></ul></a><a href="product_list.php?product_id=<?php echo $fetch_record['product_id']?>&action=delete&page=<?php echo $_REQUEST['page'];?>" title="Delete" onclick="return confirm('Are you sure you want to delete this record?');" style="float:left; display:block; margin:0 5px 0 0;"><ul class="the-icons clearfix"><i class="isb-delete"></i></ul></a><button class="btn" type="button" name="back" onclick="window.location.href='packet_list.php?product_id=<?php echo $fetch_record['product_id']?>&page=<?php echo $_REQUEST['page'];?>'">Packets</button></td>
							</tr>							
							<?php
							$product_counter++;
							}
						}
						else
						{
						?>
						<tr>
							<td><font color="#FF0000">No product found</font></td>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
						</tr>
						<?php
						}
						?>						
						</tbody>
					</table>
					<div style="text-align:right;"><?php echo $pagination;?></div>
				</div>
			</div>                                
		</div>
	 </div>
</div>

<?php require_once("footer.php"); ?>