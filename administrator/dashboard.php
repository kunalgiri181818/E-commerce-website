<?php 
require_once("header.php");
require_once("session_check.php");

$num_total_orders = mysql_num_rows(mysql_query("SELECT * FROM `og_orders` WHERE `is_cancel` = 'No' AND `transaction_completed` = 'Yes'"));
$num_total_products = mysql_num_rows(mysql_query("SELECT * FROM `og_products` WHERE `product_status` = 'Active'"));
$num_total_users = mysql_num_rows(mysql_query("SELECT * FROM `og_users` WHERE `is_active` = 'Yes'"));

$january_orders = mysql_num_rows(mysql_query("SELECT * FROM `og_orders` WHERE (`is_cancel` = 'No' OR `is_cancel` = 'Pending') AND `transaction_completed` = 'Yes' AND `post_date` BETWEEN '2021-01-01' AND '2021-01-31'"));
$february_orders = mysql_num_rows(mysql_query("SELECT * FROM `og_orders` WHERE (`is_cancel` = 'No' OR `is_cancel` = 'Pending') AND `transaction_completed` = 'Yes' AND `post_date` BETWEEN '2021-02-01' AND '2021-02-30'"));
$march_orders = mysql_num_rows(mysql_query("SELECT * FROM `og_orders` WHERE (`is_cancel` = 'No' OR `is_cancel` = 'Pending') AND `transaction_completed` = 'Yes' AND `post_date` BETWEEN '2021-03-01' AND '2021-03-31'"));
$april_orders = mysql_num_rows(mysql_query("SELECT * FROM `og_orders` WHERE (`is_cancel` = 'No' OR `is_cancel` = 'Pending') AND `transaction_completed` = 'Yes' AND `post_date` BETWEEN '2021-04-01' AND '2021-04-31'"));
$may_orders = mysql_num_rows(mysql_query("SELECT * FROM `og_orders` WHERE (`is_cancel` = 'No' OR `is_cancel` = 'Pending') AND `transaction_completed` = 'Yes' AND `post_date` BETWEEN '2021-05-01' AND '2021-05-31'"));
$june_orders = mysql_num_rows(mysql_query("SELECT * FROM `og_orders` WHERE (`is_cancel` = 'No' OR `is_cancel` = 'Pending') AND `transaction_completed` = 'Yes' AND `post_date` BETWEEN '2021-06-01' AND '2021-06-31'"));
$july_orders = mysql_num_rows(mysql_query("SELECT * FROM `og_orders` WHERE (`is_cancel` = 'No' OR `is_cancel` = 'Pending') AND `transaction_completed` = 'Yes' AND `post_date` BETWEEN '2021-07-01' AND '2021-07-31'"));
$august_orders = mysql_num_rows(mysql_query("SELECT * FROM `og_orders` WHERE (`is_cancel` = 'No' OR `is_cancel` = 'Pending') AND `transaction_completed` = 'Yes' AND `post_date` BETWEEN '2021-08-01' AND '2021-08-31'"));
$september_orders = mysql_num_rows(mysql_query("SELECT * FROM `og_orders` WHERE (`is_cancel` = 'No' OR `is_cancel` = 'Pending') AND `transaction_completed` = 'Yes' AND `post_date` BETWEEN '2021-09-01' AND '2021-09-31'"));
$october_orders = mysql_num_rows(mysql_query("SELECT * FROM `og_orders` WHERE (`is_cancel` = 'No' OR `is_cancel` = 'Pending') AND `transaction_completed` = 'Yes' AND `post_date` BETWEEN '2021-10-01' AND '2021-10-31'"));
$november_orders = mysql_num_rows(mysql_query("SELECT * FROM `og_orders` WHERE (`is_cancel` = 'No' OR `is_cancel` = 'Pending') AND `transaction_completed` = 'Yes' AND `post_date` BETWEEN '2021-11-01' AND '2021-11-31'"));
$december_orders = mysql_num_rows(mysql_query("SELECT * FROM `og_orders` WHERE (`is_cancel` = 'No' OR `is_cancel` = 'Pending') AND `transaction_completed` = 'Yes' AND `post_date` BETWEEN '2021-12-01' AND '2021-12-31'"));

$dataPoints = array(
	array("y" => $january_orders, "label" => "January"),
	array("y" => $february_orders, "label" => "February"),
	array("y" => $march_orders, "label" => "March"),
	array("y" => $april_orders, "label" => "April"),
	array("y" => $may_orders, "label" => "May"),
	array("y" => $june_orders, "label" => "June"),
	array("y" => $july_orders, "label" => "July"),
	array("y" => $august_orders, "label" => "August"),
	array("y" => $september_orders, "label" => "September"),
	array("y" => $october_orders, "label" => "October"),
	array("y" => $november_orders, "label" => "November"),
	array("y" => $december_orders, "label" => "December")
);
?>

<script>
window.onload = function () {
 
var chart = new CanvasJS.Chart("chartContainer", {
	title: {
		text: "Orders Chart"
	},
	axisY: {
		title: "Number of Orders"
	},
	data: [{
		type: "line",
		dataPoints: <?php echo json_encode($dataPoints); ?>
	}]
});
chart.render();
}
</script>

<?php require_once("left_panel.php");?>
<div class="content">
	<div class="workplace">
		<div class="row-fluid">
			<div class="span12">
				<div class="block-fluid">
					<div class="row-form clearfix">
						<a href="order_list.php"><div class="span4" style="background-color:#1261A0;">
							<p style="text-align:center; color:#FFFFFF; font-size:24px; margin-top:10px;"><?php echo $num_total_orders;?></p>
							<p style="text-align:center; color:#FFFFFF;">Total Orders</p>
						</div></a>
						<a href="product_list.php"><div class="span4" style="background-color:#E1AD01;">
							<p style="text-align:center; color:#FFFFFF; font-size:24px; margin-top:10px;"><?php echo $num_total_products;?></p>
							<p style="text-align:center; color:#FFFFFF;">Total Products</p>
						</div></a>
						<a href="user_list.php"><div class="span4" style="background-color:#FF6600;">
							<p style="text-align:center; color:#FFFFFF; font-size:24px; margin-top:10px;"><?php echo $num_total_users;?></p>
							<p style="text-align:center; color:#FFFFFF;">Total Users</p>
						</div></a>
					</div>
					<div class="row-form clearfix">
						<div id="chartContainer" style="height: 370px; width: 100%;"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

<?php require_once("footer.php"); ?>