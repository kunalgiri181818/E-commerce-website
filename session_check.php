<?php
ob_start();
session_start();

if(!isset($_SESSION['USER_ID']))
{
	header("Location: index.php");
}
?>