<?php 
ob_start();
session_start();
ini_set("display_errors", 0);

require_once("config.php");
$session_id = session_id();
?>

<?php
$sql_update = "UPDATE `og_users` SET `is_active` = 'Yes' WHERE `user_id` = '".$_REQUEST['user_id']."'";
$exe_update = mysql_query($sql_update) or die(mysql_error());

$getUser = mysql_fetch_array(mysql_query("SELECT * FROM `og_users` WHERE `user_id` = '".$_REQUEST['user_id']."'"));

$_SESSION['USER_FNAME'] = $getUser['fname'];
$_SESSION['USER_LNAME'] = $getUser['lname'];
$_SESSION['USER_ID'] = $_REQUEST['user_id'];

header("Location: my-account.php");
?>