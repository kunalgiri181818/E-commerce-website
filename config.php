<?php 
$connection = mysql_connect("localhost","kunaldev_phpecom","S5vK*kw&FQvX");

//DATABASE CONNECTION
if(!$connection)
{
	die("Database not connected!");
}

$db_selection = mysql_select_db("kunaldev_phpecom",$connection); //DATABASE SELECTION
if(!$db_selection)
{
	die("Database not selected!");
}

define('SITE_URL','https://php.kunaldeveloper.in/');
?>