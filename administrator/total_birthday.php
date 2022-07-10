<?php
require_once("../config.php");

$user_counter = 0;
$total_birthday_user = 0;
$sql_record = "SELECT * FROM `og_users` WHERE `date_of_birth` <> '0000-00-00' ORDER BY `user_id` DESC";
$exe_record = mysql_query($sql_record) or die();
$num_record = mysql_num_rows($exe_record);
if($num_record>0)
{
	while($fetch_record = mysql_fetch_array($exe_record))
	{
		$explode = explode("-",$fetch_record['date_of_birth']);	
		$birthday_month = $explode[1];
		$current_month = date('m',time());
		$birthday_day = $explode[2];
		$current_day = date('d',time());
		
		if(($birthday_month == $current_month) && ($birthday_day == $current_day))
		{
			$user_counter = 1;
			$total_birthday_user = $total_birthday_user+$user_counter;
		}
		else
		{
			$user_counter = 0;

		}
		$user_counter++;
	}
}
?>