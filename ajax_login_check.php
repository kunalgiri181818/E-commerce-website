<?php 
ob_start();
session_start();
ini_set("display_errors", 0);

require_once("config.php");
$session_id = session_id();
?>

<?php
$sql_check = "SELECT * FROM `og_users` WHERE `phone` = '".$_REQUEST['login_phone']."' AND `password` = '".md5($_REQUEST['login_password'])."'";
$exe_check = mysql_query($sql_check) or die(mysql_error());
$num_check = mysql_num_rows($exe_check);
if($num_check>0)
{
	$arr_check = mysql_fetch_array($exe_check);
	if($arr_check['is_active'] == 'Yes')
	{
		$_SESSION['USER_FNAME'] = $arr_check['fname'];
		$_SESSION['USER_LNAME'] = $arr_check['lname'];
		$_SESSION['USER_ID'] = $arr_check['user_id'];
		
		$sql_update = "UPDATE `og_temp_cart` SET `user_id` = '".$arr_check['user_id']."' WHERE `unique_id` = '".$session_id."'";
		$exe_update = mysql_query($sql_update) or die(mysql_error());
		
		echo 'succ';
	}
	else
	{
		echo 'fail2';
	}
}
else
{
	echo 'fail';
}
?>