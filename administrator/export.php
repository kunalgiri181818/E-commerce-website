<?php
require_once("../config.php");
	
if(isset($_REQUEST['export']))
{
	if(isset($_REQUEST['st_date']) && isset($_REQUEST['en_date']))
	{
		if($_REQUEST['st_date']!="" && $_REQUEST['en_date']!="")
		{
			$start_date_export = explode("/",$_REQUEST['st_date']);
			$start_date = $start_date_export[2]."-".$start_date_export[0]."-".$start_date_export[1];
			
			$end_date_export = explode("/",$_REQUEST['en_date']);
			$end_date = $end_date_export[2]."-".$end_date_export[0]."-".$end_date_export[1];
			
			$SQL = "SELECT * FROM `og_orders` WHERE (`is_cancel` = 'No' OR `is_cancel` = 'Pending') AND `transaction_completed` = 'Yes' AND `post_date` BETWEEN '".$start_date."' AND '".$end_date."' ORDER BY `order_id` ASC";
		}
		if($_REQUEST['st_date']!="" && $_REQUEST['en_date']=="")
		{
			$start_date_export = explode("/",$_REQUEST['st_date']);
			$start_date = $start_date_export[2]."-".$start_date_export[0]."-".$start_date_export[1];
			
			$SQL = "SELECT * FROM `og_orders` WHERE (`is_cancel` = 'No' OR `is_cancel` = 'Pending') AND `transaction_completed` = 'Yes' AND `post_date` BETWEEN '".$start_date."' AND '".date('Y-m-d')."' ORDER BY `order_id` ASC";
		}
		if($_REQUEST['st_date']=="" && $_REQUEST['en_date']!="")
		{
			$end_date_export = explode("/",$_REQUEST['end_date']);
			$end_date = $end_date_export[2]."-".$end_date_export[0]."-".$end_date_export[1];
			
			$SQL = "SELECT * FROM `og_orders` WHERE (`is_cancel` = 'No' OR `is_cancel` = 'Pending') AND `transaction_completed` = 'Yes' AND `post_date` BETWEEN '2019-12-31' AND '".$end_date."' ORDER BY `order_id` ASC";
		}
		if($_REQUEST['st_date']=="" && $_REQUEST['en_date']=="")
		{
			$SQL = "SELECT * FROM `og_orders` WHERE (`is_cancel` = 'No' OR `is_cancel` = 'Pending') AND `transaction_completed` = 'Yes' ORDER BY `order_id` ASC";
		}
	}
	else
	{
		$SQL = "SELECT * FROM `og_orders` WHERE (`is_cancel` = 'No' OR `is_cancel` = 'Pending') AND `transaction_completed` = 'Yes' ORDER BY `order_id` DESC";
	}
	
    $result = mysql_query($SQL);
    $i=0;
	while ($row = mysql_fetch_array($result)) {
		$data[] = array("Order ID" => $row['orderid'], "First Name" => $row['fname'], "Last Name" => $row['lname'], "Email" => $row['email'], "Phone" => $row['phone'], "address" => stripslashes($row['address']), "City" => stripslashes($row['city']), "State" => stripslashes($row['state']), "Zipcode" => stripslashes($row['zip']), "Grand Total" => stripslashes($row['grand_total']), "Delivery Date" => 'd-m-Y',strtotime($row['pickup_date']), "Delivery Time" => stripslashes($row['pickup_time']), "Order Date" => date('Y-m-d h:i A',strtotime($row['post_date'])));
	$i++;		
	}
	
	function filterData(&$str)
	{
		$str = preg_replace("/\t/", "\\t", $str);
		$str = preg_replace("/\r?\n/", "\\n", $str);
		if(strstr($str, '"')) $str = '"' . str_replace('"', '""', $str) . '"';
	}
	
	// file name for download
	$fileName = "export_data" . date('Ymd') . ".xls";
	
	// headers for download
	header("Content-Disposition: attachment; filename=\"$fileName\"");
	header("Content-Type: application/vnd.ms-excel");
	
	$flag = false;
	foreach($data as $row) {
		if(!$flag) {
			// display column names as first row
			echo implode("\t", array_keys($row)) . "\n";
			$flag = true;
		}
		// filter data
		array_walk($row, 'filterData');
		echo implode("\t", array_values($row)) . "\n";
	}
	
	exit;
}
?>