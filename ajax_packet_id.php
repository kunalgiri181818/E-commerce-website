<?php
ob_start();
session_start();
 
require_once("config.php");
$session_id = session_id();

echo $_SESSION['packet_id'] = $_REQUEST['pack_id'];
?>